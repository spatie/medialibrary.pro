<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Spatie\Mailcoach\Models\Subscriber;

class TagSubscribersThatBoughtMailcoach extends Command
{
    protected $signature = 'app:tag-subscribers';

    protected $description = 'Command description';

    public function handle()
    {
        $this->info('Tagging subscribers...');

        User::each(function (User $user) {
            /** @var Subscriber $subscriber */
            if ($subscriber = Subscriber::where('email', $user->email)->first()) {
                if ($user->purchases->count() === 0) {
                    $subscriber->addTag('bought-mailcoach');
                    $this->comment($subscriber->email . ' tagged');
                }
            }
        });

        $this->info('All done!');
    }
}
