<?php

use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Console Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of your Closure based console
| commands. Each Closure is bound to a command instance allowing a
| simple approach to interacting with each command's IO methods.
|
*/

Artisan::command('inspire', function () {
    $this->comment(Inspiring::quote());
})->describe('Display an inspiring quote');


// Artisan::command('email:send {user}', function (DripEmailer $drip, $user) {
//     $drip->send(User::find($user));
// })->describe('send an email');




Artisan::command('project:init', function () {
    Artisan::call('migrate:refresh');
    echo('migrate refresh done'), "\n";

    Artisan::call('db:seed');
    echo('seed done'), "\n";

    Artisan::call('config:clear');
    echo('config clear done'), "\n";
})->describe('Running commands');
