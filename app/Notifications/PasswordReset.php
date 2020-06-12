<?php

namespace App\Notifications;


use Illuminate\Auth\Notifications\ResetPassword;
use Illuminate\Notifications\Messages\MailMessage;


class PasswordReset extends ResetPassword
{

    public $token;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($token)
    {
        $this->token=$token;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Confirmation d\'inscription')
            ->line('Tu as demandé à réinitialiser ton mot de passe. Cliques sur le beau bouton ci-dessous et ce sera chose faite!')
            ->action('Changer votre mot de passe', route('password.reset', $this->token));
    }
}
