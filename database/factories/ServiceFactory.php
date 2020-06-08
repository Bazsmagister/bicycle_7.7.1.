<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Service;
use Faker\Generator as Faker;

$factory->define(Service::class, function (Faker $faker) {
    return [
        'broughtIn_at' => $faker->dateTimeBetween('yesterday', '-25 hours'),
        'startedToService_at' => $faker->dateTimeBetween('yesterday', '-1 hours'),
        //   'readyToTakeHome_at' => 'null',
        'user_id' =>  random_int(1, 20),
        'bicycle_id' =>  random_int(1, 20),
    ];
});
