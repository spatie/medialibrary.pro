<?php

use App\Models\FormSubmission;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Spatie\MediaLibraryPro\Models\TemporaryUpload;

beforeEach(function () {
    Storage::fake('media');

    $this->withoutVite();
});

function uploadTemporaryFile(string $name = 'photo.jpg'): array
{
    return test()
        ->postJson('/media-library-pro/uploads', [
            'uuid' => (string) Str::uuid(),
            'name' => $name,
            'file' => UploadedFile::fake()->image($name, 600, 400),
        ])
        ->assertOk()
        ->json();
}

function continueSession(): void
{
    test()->withCookie(config('session.cookie'), session()->getId());
}

it('shows the demo pages', function (string $url, string $component) {
    $this->get($url)->assertOk()->assertSee($component);
})->with([
    ['/demo-attachment', 'media-library-attachment'],
    ['/demo-collection', 'media-library-collection'],
    ['/demo-customized-collection', 'media-library-collection'],
]);

it('accepts a temporary upload and generates a preview', function () {
    $upload = uploadTemporaryFile();

    expect($upload['name'])->toBe('photo.jpg')
        ->and($upload['preview_url'])->toEndWith('photo-preview.jpg')
        ->and(TemporaryUpload::count())->toBe(1);

    $media = TemporaryUpload::first()->getFirstMedia();

    Storage::disk('media')->assertExists($media->getPathRelativeToRoot());
    Storage::disk('media')->assertExists($media->getPathRelativeToRoot('preview'));
});

it('does not persist the attachment demo upload', function () {
    $upload = uploadTemporaryFile();

    continueSession();

    $this->from('/demo-attachment')
        ->post('/demo-attachment', [
            'media' => [$upload['uuid'] => ['uuid' => $upload['uuid'], 'name' => 'photo.jpg', 'order' => 0]],
        ])
        ->assertRedirect('/demo-attachment')
        ->assertSessionHasNoErrors();

    expect(FormSubmission::count())->toBe(0);
});

it('stores the collection demo uploads on the form submission of the session', function () {
    $upload = uploadTemporaryFile();

    continueSession();

    $this->from('/demo-collection')
        ->post('/demo-collection', [
            'downloads' => [$upload['uuid'] => ['uuid' => $upload['uuid'], 'name' => 'My photo', 'order' => 0]],
        ])
        ->assertRedirect('/demo-collection')
        ->assertSessionHasNoErrors();

    $media = FormSubmission::sole()->getFirstMedia('downloads');

    expect($media->name)->toBe('My photo')
        ->and($media->hasGeneratedConversion('preview'))->toBeTrue();

    Storage::disk('media')->assertExists($media->getPathRelativeToRoot('preview'));

    continueSession();

    $this->get('/demo-collection')->assertOk()->assertSee('My photo');
});

it('stores the custom property of the customized collection demo', function () {
    $upload = uploadTemporaryFile();

    continueSession();

    $this->from('/demo-customized-collection')
        ->post('/demo-customized-collection', [
            'downloads' => [$upload['uuid'] => [
                'uuid' => $upload['uuid'],
                'name' => 'My photo',
                'order' => 0,
                'custom_properties' => ['extra_field' => 'Extra value'],
            ]],
        ])
        ->assertRedirect('/demo-customized-collection')
        ->assertSessionHasNoErrors();

    expect(FormSubmission::sole()->getFirstMedia('downloads')->getCustomProperty('extra_field'))->toBe('Extra value');
});

it('validates the collection demo', function () {
    $this->from('/demo-collection')
        ->post('/demo-collection', [
            'downloads' => ['not-existing' => ['uuid' => 'not-existing', 'name' => '', 'order' => 0]],
        ])
        ->assertRedirect('/demo-collection')
        ->assertSessionHasErrors();
});

it('shows flash messages on the demo pages', function () {
    $upload = uploadTemporaryFile();

    continueSession();

    $this->followingRedirects()
        ->from('/demo-attachment')
        ->post('/demo-attachment', [
            'media' => [$upload['uuid'] => ['uuid' => $upload['uuid'], 'name' => 'photo.jpg', 'order' => 0]],
        ])
        ->assertOk()
        ->assertSee('Thanks for uploading your file!');
});

it('renders a csrf token in the demo forms', function (string $url) {
    $this->get($url)->assertOk()->assertSee('name="_token"', false);
})->with([
    '/demo-attachment',
    '/demo-collection',
    '/demo-customized-collection',
]);
