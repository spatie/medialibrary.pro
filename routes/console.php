<?php

use App\Console\Commands\DeleteOldModelsCommand;
use Illuminate\Support\Facades\Schedule;

Schedule::command(DeleteOldModelsCommand::class)->everyMinute();
Schedule::command('media-library:delete-old-temporary-uploads')->everyMinute();
