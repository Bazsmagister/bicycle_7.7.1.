<?php

namespace App\Providers;

use App\Events\NewUser;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use App\Listeners\NewUserAdminNotification;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

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



    aRentHasBeenMade::class => [RentListener::class],

     NewUser::class => [NewUserAdminNotification::class],

    //   \App\Events\NewUser::class => [
    //         \App\Listeners\NewUserAdminNotification::class,
    //     ],


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
    public function shouldDiscoverEvents()
    {
        return true;
    }
}
