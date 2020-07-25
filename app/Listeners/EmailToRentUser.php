<?php

namespace App\Listeners;

use App\Events\aRentHasBeenEnded;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EmailToRentUser
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
     * @param  aRentHasBeenEnded  $event
     * @return void
     */
    public function handle(aRentHasBeenEnded $event)
    {
        //
        dump('a rent has been ended');
    }
}
