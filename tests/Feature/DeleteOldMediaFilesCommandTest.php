<?php

use App\Console\Commands\DeleteOldMediaFilesCommand;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    $this->disk = Storage::fake('media');
});

function putMediaFile(string $path, int $minutesOld): void
{
    test()->disk->put($path, 'contents');

    touch(test()->disk->path($path), now()->subMinutes($minutesOld)->getTimestamp());
}

it('deletes media files older than fifteen minutes regardless of the database', function () {
    putMediaFile('old/photo.jpg', 20);
    putMediaFile('old/conversions/photo-preview.jpg', 20);
    putMediaFile('recent/photo.jpg', 5);
    putMediaFile('.gitignore', 60);

    $this->artisan(DeleteOldMediaFilesCommand::class)->assertSuccessful();

    $this->disk->assertMissing(['old/photo.jpg', 'old/conversions/photo-preview.jpg']);
    $this->disk->assertExists(['recent/photo.jpg', '.gitignore']);
});

it('accepts a custom age', function () {
    putMediaFile('photo.jpg', 20);

    $this->artisan(DeleteOldMediaFilesCommand::class, ['--minutes' => 30])->assertSuccessful();

    $this->disk->assertExists('photo.jpg');
});
