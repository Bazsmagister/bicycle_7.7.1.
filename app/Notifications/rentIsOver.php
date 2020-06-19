<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class rentIsOver extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        // return ['mail'];
        return ['mail', 'database'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        //$url = url('/rents/'.$this->rent->id);

        return (new MailMessage)
                    ->from('test@example.com', 'Example')
                    ->greeting('Hello!')
                    ->line('We are sorry to inform you, but your rent is over. You can prolong your rent by clicking that button. It will cost you +500ft / day. Enjoy your trip!')
                    ->action('Prolong my rent now', url('/'))
                    ->line('Thank you for using our application!');
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


    // public function viaQueues()
    // {
    //     return [
    //     'mail' => 'mail-queue',
    //     //'slack' => 'slack-queue',
    // ];
    // }
}
