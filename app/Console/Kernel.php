<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $schedule->command('media-library:delete-old-temporary-uploads');
    }

    protected function commands()
    {
        $this->load(__DIR__);
    }
}
