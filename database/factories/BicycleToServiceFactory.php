<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use Carbon\Carbon;
use App\BicycleToService;
use Faker\Generator as Faker;

$factory->define(BicycleToService::class, function (Faker $faker) {
    return [
        'name' => "$faker->colorName Bike",
         'user_id'=> $faker->numberBetween(5, 10),
        //  'user_id' => function () {
        //      return factory(App\User::class)->create()->id;},
        //'user_id' => factory(App\User::class),
        'broughtIn_at' => $faker->dateTimeBetween('yesterday', '-25 hours'),
        'startedToService_at' => $faker->dateTimeBetween('yesterday', '-1 hours'),
        'readyToTakeIt_at' => Carbon::tomorrow(),
        'workhours' => $faker->numberBetween(1, 3),
        // 'description' => $faker->paragraph,
         'notes' =>  $faker->realText(150),


    ];
});
