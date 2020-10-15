<?php

namespace App\Console\Commands;

use App\Models\FormSubmission;
use Illuminate\Console\Command;
use Spatie\MediaLibraryPro\Models\TemporaryUpload;

class DeleteOldModelsCommand extends Command
{
    protected $signature = 'delete-old-models';

    protected $description = 'Delete old models';

    public function handle()
    {
        $cutOff = now()->subMinutes(10);

        FormSubmission::where('created_at', '<', $cutOff)->get()->each->delete();
        TemporaryUpload::where('created_at', '<', $cutOff)->get()->each->delete();

        $this->info("Old models deleted!");
    }
}
