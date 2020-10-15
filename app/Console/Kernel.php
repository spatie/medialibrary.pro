<?php

namespace App\Console;

use App\Console\Commands\DeleteOldModelsCommand;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $schedule->command(DeleteOldModelsCommand::class)->everyMinute();
        $schedule->command('media-library:delete-old-temporary-uploads')->everyMinute();
    }

    protected function commands()
    {
        $this->load(__DIR__);
    }
}
