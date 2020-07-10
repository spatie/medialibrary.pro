<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $schedule->command(UpdateDocumentationCommand::class)->daily();
    }

    protected function commands()
    {
        $this->load(__DIR__);
    }
}
