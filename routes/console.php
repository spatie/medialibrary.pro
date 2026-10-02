<?php

use App\Console\Commands\DeleteOldMediaFilesCommand;
use App\Console\Commands\DeleteOldModelsCommand;
use Illuminate\Support\Facades\Schedule;

Schedule::command(DeleteOldModelsCommand::class)->everyMinute();
Schedule::command('media-library:delete-old-temporary-uploads')->everyMinute();
Schedule::command(DeleteOldMediaFilesCommand::class)->everyFiveMinutes();
