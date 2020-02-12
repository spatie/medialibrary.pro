<?php

namespace App\Domain\Docs\Jobs;

use App\Console\UpdateDocumentationCommand;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Support\Facades\Artisan;

class UpdateDocumentationJob implements ShouldQueue
{
    use Dispatchable, Queueable;

    public function handle()
    {
        Artisan::call(UpdateDocumentationCommand::class);
    }
}
