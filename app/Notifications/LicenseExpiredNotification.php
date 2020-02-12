<?php

namespace App\Notifications;

use App\Models\License;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;

class LicenseExpiredNotification extends Notification
{
    use Queueable;

    /** @var \App\Models\License */
    private License $license;

    public function __construct(License $license)
    {
        $this->license = $license;
    }

    public function via($notifiable): array
    {
        return ['mail'];
    }

    public function toMail(Notifiable $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->subject('Your Mailcoach license has expired')
                    ->greeting('Hi!')
                    ->line("Your Mailcoach license for {$this->license->url} has expired.")
                    ->line("If you want to keep receiving updates, go to your license overview to renew the license")
                    ->action('Mailcoach dashboard', url('/'))
                    ->line('Thank you for using Mailcoach!');
    }
}
