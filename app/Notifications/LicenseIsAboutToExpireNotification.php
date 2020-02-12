<?php

namespace App\Notifications;

use App\Models\License;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Notifications\Notification;

class LicenseIsAboutToExpireNotification extends Notification
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
                    ->subject('Your Mailcoach license is about to expire')
                    ->greeting('Hi!')
                    ->line("Your Mailcoach license for {$this->license->url} expires on {$this->license->expires_at->format('Y-m-d')}")
                    ->line("Go to your license overview to renew the license and continue receiving updates")
                    ->action('Mailcoach dashboard', url('/'))
                    ->line('Thank you for using Mailcoach!');
    }
}
