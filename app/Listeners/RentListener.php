<?php

namespace App\Listeners;

use App\Events\aRentHasBeenMade;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class RentListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  aRentHasBeenMade  $event
     * @return void
     */
    public function handle(aRentHasBeenMade $event)
    {

        //var_dump('check for new rents');
        dump('check for new rents');
    }
}
