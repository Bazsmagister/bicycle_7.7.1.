<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Service;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Service::class, function (Faker $faker) {
    return [
        // 'broughtIn_at' => $faker->dateTimeBetween('yesterday', '-25 hours'),
        // 'startedToService_at' => $faker->dateTimeBetween('yesterday', '-1 hours'),
        // //   'readyToTakeHome_at' => 'null',
        // 'user_id' =>  random_int(1, 5),
        // 'bicycle_id' =>  random_int(1, 5),
        // 'serviceman_id' =>  random_int(1, 2),

        'user_id' =>  random_int(6, 9),
        'bicycle_id' =>  random_int(4, 9),
        'serviceman_id' =>  random_int(1, 2),

        'isActive' => random_int(0, 1),

        'broughtIn_at' => Carbon::yesterday(),
        'startedToService_at' => Carbon::now(),
        'readyToTakeIt_at' => Carbon::tomorrow(),



    ];
});
