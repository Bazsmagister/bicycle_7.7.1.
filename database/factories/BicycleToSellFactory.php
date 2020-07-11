<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BicycleToSell;
use Faker\Generator as Faker;

$factory->define(BicycleToSell::class, function (Faker $faker) {
    return [
        'name' => "$faker->colorName Bike",


        // 'user_id'=> $faker->numberBetween(1,10),
        //  'user_id' => function () {
        //      return factory(App\User::class)->create()->id;},
        //'user_id' => factory(App\User::class),
        //'broughtIn_at' => $faker->dateTimeBetween('yesterday', '-25 hours'),
        //'startedToService_at' => $faker->dateTimeBetween('yesterday', '-1 hours'),
        //'readyToTakeHome_at' => '',
        'price' => $faker->numberBetween(1000, 10000),
        // 'description' => $faker->paragraph,
         'description' =>  $faker->realText(150),


        'image' => '/storage/bic126kb.png',
    ];
});
