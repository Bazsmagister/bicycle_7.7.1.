<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\BicycleToRent;
use Faker\Generator as Faker;

$factory->define(BicycleToRent::class, function (Faker $faker) {
    return [
        'name' => "$faker->colorName Bike",

        //'user_id'=> $faker->numberBetween(5, 10),
        //  'user_id' => function () {
        //      return factory(App\User::class)->create()->id;},
        //'user_id' => factory(App\User::class),

        // 'rentStarted_at' => $faker->dateTimeBetween('yesterday', '-25 hours'),
        // 'rentEnds_at' => $faker->dateTimeBetween('yesterday', '-1 hours'),
        'rent_price' => $faker->numberBetween(1000, 3000),
        'description' => $faker->sentence,
        //'description' =>  $faker->realText(150),
        'is_availableToRent' => $faker->boolean,
        'image' => '/storage/bic126kb.png',
    ];
});
