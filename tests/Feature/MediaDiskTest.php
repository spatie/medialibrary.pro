<?php

use Illuminate\Filesystem\AwsS3V3Adapter;
use Illuminate\Support\Facades\Storage;

it('can use a bucket as the media disk', function () {
    config()->set('filesystems.disks.media', [
        'driver' => 's3',
        'key' => 'key',
        'secret' => 'secret',
        'region' => 'auto',
        'bucket' => 'bucket',
        'endpoint' => 'https://example.r2.cloudflarestorage.com',
    ]);

    expect(Storage::disk('media'))->toBeInstanceOf(AwsS3V3Adapter::class)
        ->and(config('media-library.disk_name'))->toBe('media');
});
