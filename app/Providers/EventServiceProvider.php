<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen =
    [
    'App\Events\aRentHasBeenEnded ' => [
        'App\Listeners\EmailToRentUser',
    ],

     'App\Events\BicycleUpdated ' => [
        'App\Listeners\EmailToOwner',
    ],

    aRentHasBeenMade::class => [RentListener::class]


    // [Registered::class => [
    //         SendEmailVerificationNotification::class,],



    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }

    //this wasn't here: 
    public function shouldDiscoverEvents(){
        return true;
    }
}
