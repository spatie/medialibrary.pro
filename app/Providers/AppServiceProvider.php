<?php

namespace App\Providers;

use App\Support\BucketAssets;
use App\Support\Database\EnsureSqliteDatabaseExists;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\ServiceProvider;
use Spatie\Flash\Flash;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        $this->throwOnFailedBucketWrites();
    }

    public function boot(): void
    {
        $this->app->booted(fn () => app(EnsureSqliteDatabaseExists::class)(config('database.default')));

        Model::unguard();

        Flash::levels([
            'success' => 'success',
            'error' => 'error',
        ]);

        $this->serveAssetsFromBucket();
    }

    /*
     * On Laravel Cloud the media and assets buckets are attached to the environment as the
     * `media` and `assets` disks. That replaces their configuration with one that silently
     * ignores failed writes, so a failed upload of media or assets would go unnoticed.
     */
    protected function throwOnFailedBucketWrites(): void
    {
        config()->set('filesystems.disks.media.throw', true);
        config()->set('filesystems.disks.assets.throw', true);
    }

    protected function serveAssetsFromBucket(): void
    {
        $bucketAssetsUrl = BucketAssets::url();

        if (! $bucketAssetsUrl) {
            return;
        }

        URL::useAssetOrigin($bucketAssetsUrl);
    }
}
