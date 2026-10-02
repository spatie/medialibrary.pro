<?php

use App\Console\Commands\DeleteOldMediaFilesCommand;
use App\Console\Commands\DeleteOldModelsCommand;
use Illuminate\Support\Facades\Schedule;

Schedule::command(DeleteOldModelsCommand::class)->dailyAt('03:00');
Schedule::command('media-library:delete-old-temporary-uploads')->dailyAt('03:10');
Schedule::command(DeleteOldMediaFilesCommand::class)->dailyAt('03:20');
