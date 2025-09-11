<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ConfimationMail extends Notification
{
    use Queueable;

    public function __construct()
    {
        // pas besoin de détails
    }

    public function via($notifiable)
    {
        return ['mail'];
    }

    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Confirmation de réception')
            ->greeting('Bonjour,')
            ->line('Nous avons bien reçu votre message.')
            ->line('Notre équipe vous contactera bientôt.')
            ->salutation('Cordialement, L’équipe Support');
    }
}
