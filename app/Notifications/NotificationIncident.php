<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NotificationIncident extends Notification
{
    use Queueable;

    private $data;

    /**
     * Create a new notification instance.
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return [
            'database',       // Notifications stored in the database
            /*'mail',           // Email notifications
            'broadcast',      // Real-time notifications via WebSocket or Laravel Echo
            'nexmo',          // SMS notifications (formerly Nexmo, now Vonage)
            'slack',          // Notifications sent to a Slack channel
            'fcm',            // Firebase Cloud Messaging (push notifications for mobile apps)
            'push',           // General push notifications (e.g., integrated with OneSignal)
            'sms',            // Local SMS service providers
            'whatsapp',       // WhatsApp API integration (e.g., via Twilio or Vonage)
            'telegram',       // Telegram bot API for messages
            'custom_channel'  // A custom channel (user-defined)*/
        ];
    }

    public function toBroadcast(object $notifiable): BroadcastMessage{
        return new BroadcastMessage([
            'data' => $this->data,
        ]);
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
                    ->line('The introduction to the notification.')
                    ->action('Notification Action', url('/'))
                    ->line('Thank you for using our application!');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [
            'data' => $this->data,
        ];
    }
}
