<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
         //Commands\SendEmails::class,
         Commands\InspireMe::class,

    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        //from SO
        //$schedule = $this->app->make(Schedule::class);

        // $schedule->command('inspire')->hourly();

        $schedule->command('inspire:me')->everyMinute();
        // ->dailyAt('10:02');
        //


        // $schedule->call(function () {
        //     echo('hello');
        // })->dailyAt('10:01');

        //->everyMinute()

        // $schedule->call(function () {
        //     DB::table('rents')->delete();
        // })->everyMinute();

        //->everyFiveMinutes();
        //->dailyAt('13:00');


        //php artisan schedule:run
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
