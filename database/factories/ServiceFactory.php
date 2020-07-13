<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Service;
use Faker\Generator as Faker;
use Carbon\Carbon;

$factory->define(Service::class, function (Faker $faker) {
    $random =  Carbon::now()->subDays(rand(20, 30));
    $random2 = Carbon::now()->subDays(rand(15, 19));
    $random3 = Carbon::now()->subDays(rand(10, 14));
    $random4 = Carbon::now()->subDays(rand(5, 9));

    return [
        // 'broughtIn_at' => $faker->dateTimeBetween('yesterday', '-25 hours'),
        // 'startedToService_at' => $faker->dateTimeBetween('yesterday', '-1 hours'),
        // //   'readyToTakeHome_at' => 'null',
        // 'user_id' =>  random_int(1, 5),
        // 'bicycle_id' =>  random_int(1, 5),
        // 'serviceman_id' =>  random_int(1, 2),

        'user_id' =>  random_int(5, 9),
        'bicycle_id' =>  random_int(4, 10),
        'serviceman_id' =>  random_int(1, 2),

        // 'isActive' => random_int(0, 1),

        'broughtIn_at' =>        $random,
        'startedToService_at' => $random2,
        'readyToTakeIt_at' =>   $random3,
        'taken_at' =>            $random4,

        'isActive' => $faker->boolean(0),

        // 'broughtIn_at' => Carbon::yesterday(),
        // 'startedToService_at' => Carbon::now(),
        // 'readyToTakeIt_at' => Carbon::tomorrow(),
        // 'taken_at' => Carbon::now()->subDays(2),


        'notes' => $faker->sentence(),
        'status' => $faker->randomElement(['accepted', 'repairing', 'ready', 'taken']),



    ];
});
