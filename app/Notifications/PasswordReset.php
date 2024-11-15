<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class PasswordReset extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     */

    public $token;

    public function __construct($token)
    {
        $this->token = $token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @return array<int, string>
     */
    public function via(object $notifiable): array
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     */
    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('Reseteo de contraseña')
            ->line('Estás recibiendo este email por que recibimos una solicitud de reseteo de contraseña de tu cuenta en ciiea.setab.gob.mx.')
            ->action('Resetear contraseña', route('password.reset', ['token' => $this->token, 'email' => $notifiable->email]))
            ->line('Este enlace estará activo sólo por 60 minutos.')
            ->line('En caso de no haber solicitado resetear tu contraseña, has caso omiso de este correo.');
    }

    /**
     * Get the array representation of the notification.
     *
     * @return array<string, mixed>
     */
    public function toArray(object $notifiable): array
    {
        return [];
    }
}
