<?php

namespace App\Notifications;

use App\Rent;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class newRentIsMade extends Notification
// class rentIsOver extends Notification implements ShouldQueue
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */

    public $rent;

    public function __construct(Rent $rent)
    {
        $this->rent = $rent;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        //return ['mail'];
        return ['mail', 'database'];
        // return ['mail', 'database', 'broadcast'];
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
                    ->from('test@example.com', 'Example')
                    ->greeting('Hello!')
                    ->line('A new rent has been made. ')
                    //->action('Notification Action', url('/'))
                    ->line('You rent expires at :')



                    ->line('Thank you for using our application! Enjoy your trip :)');


        // return (new MailMessage)->view(
        //     'mail.newRentIsMade',
        //     ['expire' => $this->rent->rentEnds_At]
        // );
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
                'expires'=>$this->rent->rentEnds_at,
                'data2'=>'My Data',
                'link'=>'My Link'
        ];
    }
}
