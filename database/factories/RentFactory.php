<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Rent;
use Carbon\Carbon;
use Faker\Generator as Faker;

$factory->define(Rent::class, function (Faker $faker) {
    $random =  Carbon::now()->subDays(rand(20, 30));
    $random2 = Carbon::now()->subDays(rand(15, 19));
    $random3 = Carbon::now()->subDays(rand(10, 14));
    $random4 = Carbon::now()->subDays(rand(1, 9));

    return [
        'user_id' =>  random_int(6, 10),
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


        // 'rentStarted_at' => $faker->dateTimeBetween('yesterday', '-25 hours'),
        // 'rentEnds_at' => $faker->dateTimeBetween('yesterday', '-1 hours'),
        // 'is_closed' => $faker ->boolean,





        'rentStarted_at' => Carbon::now()->subDays(rand(10, 14)),
        'rentEnds_at' =>  $faker->dateTimeBetween('-8 days', '+7days'),
        'bicycleReturned_at' =>  $faker->randomElement(["$random4", null]),
        //'rentEnds_at' => Carbon::now()->subDays(rand(0, 9)),
        'is_closed' => $faker ->boolean(1),


        // 'availableToRent' => $faker->boolean,
    ];
});
