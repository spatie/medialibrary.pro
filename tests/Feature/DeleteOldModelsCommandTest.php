<?php

use App\Console\Commands\DeleteOldModelsCommand;
use App\Models\FormSubmission;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Spatie\MediaLibraryPro\Models\TemporaryUpload;

beforeEach(function () {
    Storage::fake('media');
});

it('deletes form submissions and temporary uploads older than ten minutes', function () {
    $this->travelTo(now()->subMinutes(11));

    $oldSubmission = FormSubmission::create(['session_id' => 'old']);
    $oldSubmission->addMedia(UploadedFile::fake()->image('old.jpg'))->toMediaCollection('downloads');
    $oldPath = $oldSubmission->getFirstMedia('downloads')->getPathRelativeToRoot();

    $oldUpload = TemporaryUpload::createForFile(UploadedFile::fake()->image('old-upload.jpg'), 'old', 'old-uuid', 'old-upload.jpg');

    $this->travelBack();

    $recentSubmission = FormSubmission::create(['session_id' => 'recent']);

    $this->artisan(DeleteOldModelsCommand::class)->assertSuccessful();

    expect(FormSubmission::pluck('id')->all())->toBe([$recentSubmission->id])
        ->and(TemporaryUpload::find($oldUpload->id))->toBeNull();

    Storage::disk('media')->assertMissing($oldPath);
});
