<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    protected function schedule(Schedule $schedule)
    {
        $schedule->command(UpdateDocumentationCommand::class)->daily();
        $schedule->command('app:calculate-statistics')->everyMinute();
        $schedule->command('app:send-scheduled-campaigns')->everyMinute();
        $schedule->command('app:send-campaign-summary-mail')->hourly();
        $schedule->command('app:send-email-list-summary-mail')->mondays()->at('9:00');
        $schedule->command('app:delete-old-unconfirmed-subscribers')->daily();
    }

    protected function commands()
    {
        $this->load(__DIR__);
    }
}
