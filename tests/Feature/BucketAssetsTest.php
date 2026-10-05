<?php

use App\Providers\AppServiceProvider;
use App\Support\BucketAssets;
use Illuminate\Foundation\CloudBootstrapper;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    File::delete(BucketAssets::versionFilePath());

    config()->set('filesystems.disks.assets.bucket', 'medialibrary-pro-assets');
    config()->set('filesystems.disks.assets.url', 'https://assets.example.com');

    Storage::fake('assets');

    File::ensureDirectoryExists(public_path('css'));

    File::put(public_path('css/bucket-assets-test.css'), "@font-face { src: url('/fonts/font.woff2') } .logo { background: url(/images/logo.svg) } .cdn { background: url(//cdn.example.com/image.png) }");
});

afterEach(function () {
    File::delete(BucketAssets::versionFilePath());

    File::delete(public_path('css/bucket-assets-test.css'));
});

it('serves assets from the app when no assets bucket is configured', function () {
    config()->set('filesystems.disks.assets.bucket', null);

    $this->artisan('upload-assets-to-bucket')->assertSuccessful();

    expect(BucketAssets::url())->toBeNull();
    expect(Storage::disk('assets')->allFiles())->toBeEmpty();
    expect(asset('images/header-2400.jpg'))->toBe(url('images/header-2400.jpg'));
});

it('uploads the public files under a versioned prefix', function () {
    $this->artisan('upload-assets-to-bucket')->assertSuccessful();

    $version = BucketAssets::version();
    $disk = Storage::disk('assets');

    expect($version)->toHaveLength(12);
    expect(BucketAssets::url())->toBe("https://assets.example.com/{$version}");

    $disk->assertExists([
        "{$version}/images/header-2400.jpg",
        "{$version}/fontawesome-pro-5.15.1-web/css/all.css",
        "{$version}/fontawesome-pro-5.15.1-web/webfonts/fa-solid-900.woff2",
        "{$version}/apple-touch-icon.png",
        "{$version}/.uploaded",
    ]);

    $disk->assertMissing([
        "{$version}/index.php",
        "{$version}/favicon.ico",
        "{$version}/site.webmanifest",
        "{$version}/fontawesome-pro-5.15.1-web/svgs/solid/image.svg",
        "{$version}/fontawesome-pro-5.15.1-web/js/all.js",
    ]);

    expect($disk->get("{$version}/css/bucket-assets-test.css"))
        ->toBe("@font-face { src: url('/{$version}/fonts/font.woff2') } .logo { background: url(/{$version}/images/logo.svg) } .cdn { background: url(//cdn.example.com/image.png) }");
});

it('does not upload a version that is already in the bucket', function () {
    $this->artisan('upload-assets-to-bucket')->assertSuccessful();

    $version = BucketAssets::version();

    Storage::disk('assets')->delete("{$version}/css/app.css");

    $this->artisan('upload-assets-to-bucket')->assertSuccessful();

    expect(BucketAssets::version())->toBe($version);
    Storage::disk('assets')->assertMissing("{$version}/css/app.css");
});

it('removes versions that were superseded more than two weeks ago', function () {
    $disk = Storage::disk('assets');

    $history = collect(range(1, 7))->map(fn (int $number) => [
        'version' => "old-{$number}",
        'activated_at' => now()->subDays(30 - $number)->toIso8601String(),
    ]);

    $history->each(fn (array $entry) => $disk->put("{$entry['version']}/css/app.css", 'body {}'));

    $disk->put('versions.json', json_encode($history->all()));

    $this->artisan('upload-assets-to-bucket')->assertSuccessful();

    $disk->assertMissing(['old-1/css/app.css', 'old-2/css/app.css', 'old-3/css/app.css']);
    $disk->assertExists(['old-4/css/app.css', 'old-7/css/app.css']);

    expect(collect(json_decode($disk->get('versions.json'), true))->pluck('version')->all())
        ->toBe(['old-4', 'old-5', 'old-6', 'old-7', BucketAssets::version()]);
});

it('points the asset urls of pages to the bucket', function () {
    Http::preventStrayRequests();

    $this->withoutVite();

    $this->artisan('upload-assets-to-bucket')->assertSuccessful();

    app()->getProvider(AppServiceProvider::class)->boot();

    $bucketAssetsUrl = BucketAssets::url();

    $this->get('/')
        ->assertOk()
        ->assertSee("{$bucketAssetsUrl}/images/header-2400.jpg", false)
        ->assertSee("{$bucketAssetsUrl}/images/header-600.jpg 600w", false)
        ->assertSee("{$bucketAssetsUrl}/fontawesome-pro-5.15.1-web/css/all.css", false)
        ->assertSee("{$bucketAssetsUrl}/images/social-card.jpg", false)
        ->assertSee("{$bucketAssetsUrl}/favicon-32x32.png", false)
        ->assertSee('href="/site.webmanifest"', false);
});

it('uses the assets bucket attached on laravel cloud', function () {
    $_SERVER['LARAVEL_CLOUD_DISK_CONFIG'] = json_encode([
        [
            'disk' => 'media',
            'access_key_id' => 'media-key',
            'access_key_secret' => 'media-secret',
            'bucket' => 'attached-media-bucket',
            'url' => 'https://media.example.com',
            'endpoint' => 'https://r2.example.com',
        ],
        [
            'disk' => 'assets',
            'access_key_id' => 'assets-key',
            'access_key_secret' => 'assets-secret',
            'bucket' => 'attached-assets-bucket',
            'url' => 'https://attached-assets.example.com',
            'endpoint' => 'https://r2.example.com',
        ],
    ]);

    CloudBootstrapper::configureDisks(app());

    (new AppServiceProvider(app()))->register();

    unset($_SERVER['LARAVEL_CLOUD_DISK_CONFIG']);

    expect(config('filesystems.disks.assets'))
        ->bucket->toBe('attached-assets-bucket')
        ->key->toBe('assets-key')
        ->url->toBe('https://attached-assets.example.com')
        ->throw->toBeTrue();

    expect(config('filesystems.disks.media'))
        ->bucket->toBe('attached-media-bucket')
        ->throw->toBeTrue();

    File::put(BucketAssets::versionFilePath(), 'abc123');

    expect(BucketAssets::url())->toBe('https://attached-assets.example.com/abc123');
});
