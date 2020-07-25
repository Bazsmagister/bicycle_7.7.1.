<?php

namespace App\Listeners;

use App\Events\BicycleUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class EmailToOwner
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
     * @param  BicycleUpdated  $event
     * @return void
     */
    public function handle(BicycleUpdated $event)
    {
        //
        dd('test');
    }
}
