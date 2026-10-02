<?php

use App\Console\Commands\DeleteOldMediaFilesCommand;
use App\Console\Commands\DeleteOldModelsCommand;
use App\Models\FormSubmission;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

beforeEach(function () {
    $this->disk = Storage::fake('media');
});

function putMediaFile(string $path, int $minutesOld): void
{
    test()->disk->put($path, 'contents');

    touch(test()->disk->path($path), now()->subMinutes($minutesOld)->getTimestamp());
}

it('deletes media files older than thirty minutes regardless of the database', function () {
    putMediaFile('old/photo.jpg', 40);
    putMediaFile('old/conversions/photo-preview.jpg', 40);
    putMediaFile('recent/photo.jpg', 20);
    putMediaFile('.gitignore', 60);

    $this->artisan(DeleteOldMediaFilesCommand::class)->assertSuccessful();

    $this->disk->assertMissing(['old/photo.jpg', 'old/conversions/photo-preview.jpg']);
    $this->disk->assertExists(['recent/photo.jpg', '.gitignore']);
});

it('accepts a custom age', function () {
    putMediaFile('photo.jpg', 40);

    $this->artisan(DeleteOldMediaFilesCommand::class, ['--minutes' => 60])->assertSuccessful();

    $this->disk->assertExists('photo.jpg');
});

it('keeps the files of submissions that survive the daily model cleanup', function () {
    $this->travelTo(today()->setTime(2, 55));

    $submission = FormSubmission::create(['session_id' => 'recent']);
    $submission->addMedia(UploadedFile::fake()->image('recent.jpg'))->toMediaCollection('downloads');
    $path = $submission->getFirstMedia('downloads')->getPathRelativeToRoot();
    touch($this->disk->path($path), now()->getTimestamp());

    $this->travelTo(today()->setTime(3, 0));
    $this->artisan(DeleteOldModelsCommand::class)->assertSuccessful();

    $this->travelTo(today()->setTime(3, 20));
    $this->artisan(DeleteOldMediaFilesCommand::class)->assertSuccessful();

    expect(FormSubmission::find($submission->id))->not->toBeNull();
    $this->disk->assertExists($path);
});
