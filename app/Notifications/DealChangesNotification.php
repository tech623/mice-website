<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class DealChangesNotification extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    private $ID;
    private $USER;
    private $UNIQUEID;
    public function __construct($id, $user, $uniqueid)
    {
        $this->ID = $id;
        $this->USER = $user;
        $this->UNIQUEID = $uniqueid;
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
            ->greeting('Dear '.$this->USER->name.',')
            ->line('The deal '.$this->UNIQUEID.' has been updated. Please click below to view the details:')
            ->subject('Deal Changes')
            ->action('View Deal', route('panel.deals.edit',$this->ID));
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
