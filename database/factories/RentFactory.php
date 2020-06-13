<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rent;
use Faker\Generator as Faker;

$factory->define(Rent::class, function (Faker $faker) {
    return [
        'user_id' =>  random_int(1, 5),
        // 'user_id' => function () {
        //     return factory(App\User::class)->create()->id;
        // },

         'bicycle_id' =>  random_int(1, 5),
        // 'bicycle_id' => function () {
        //     // return factory(App\Bicycle::class)->create()->id->where('is_rentable', 1);
        //     // return (App\Bicycle::class)->select('id')->
        //     // where('is_rentable', 1)->id->get();

        //     // factory(App\Bicycle::class, 5)->create()->each(function ($b) {
        //     //     $bicycle_id = $b->id;
        //     //     //return $bicycle_id;
        //     // });
        //     // return $bicycle_id;
        // },

        'rentStarted_at' => $faker->dateTimeBetween('yesterday', '-25 hours'),
        'rentEnds_at' => $faker->dateTimeBetween('yesterday', '-1 hours'),
        // 'availableToRent' => $faker->boolean,
    ];
});
