<?php

namespace App\Notifications;

use App\Service;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;

class newServiceCreated extends Notification
{
    use Queueable;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     //
    // }

    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
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
                    ->line('A new service has been made. ')
                    //->action('Notification Action', url('/'))
                    ->line('We start working on your bicycle soon! ')
                    ->line('Thank you for using our application! We will inform you when your bicycle is ready :)');
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
            'serviceStarted'=>$this->service->startedToService,
            'readyToTakeIt' =>$this->service->readyToTakeIt,
        ];
    }
}
