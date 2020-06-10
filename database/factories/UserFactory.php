<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        // 'email_verified_at' => now(),
        // 'phone' => $faker->phoneNumber,
        'phone' => $faker->e164PhoneNumber, //
        'password' => bcrypt('$faker->name'), // password
        //'profile_image' => '/storage/bic126kb.png',
        // 'remember_token' => Str::random(10),
    ];
});

/*
 * @property string $phoneNumber
 * @property string $e164PhoneNumber
 * E.164 is an international standard (ITU-T Recommendation), titled The international public telecommunication numbering plan, that defines a numbering plan for the worldwide public switched telephone network (PSTN) and some other data networks.
*/
