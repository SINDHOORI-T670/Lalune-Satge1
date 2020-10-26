<?php
namespace App\Notifications;

use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
class BrokerRegisteredNotification extends Notification {

    public function __construct($user) {
        $this->user = $user;
    }

    public function via($notifiable) {
        return ['mail'];
    }

    public function toMail($notifiable) {
        return (new MailMessage)
            ->success()
            ->subject('Welcome to '.env('APP_NAME'))
            ->line('Dear ' . $this->user->name . ', we are happy to see you here.')
            ->line('These are your Registration Details')
            ->line('Name: ' . $this->user->name)
            ->line('Email: ' . $this->user->email)
            ->line('Password: ' . $this->user->password_text)
            ->action('Go to site', url('/'))
            ->line('Please tell your friends about us.');
    }

}