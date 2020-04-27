<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Bicycle;
use Faker\Generator as Faker;
//use Faker\Provider\DateTime;

/*
$factory->define(Bicycle::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'bicycle_broughtIn_at' => $faker->unixTime('now'-100000),
        'bicycle_startedToServiceIt_at' => $faker->unixtime('now'-50000),
        'bicycle_readyToTakeItHome_at' => $faker-> now()
    ];
});
*/

//$faker->dateTimeBetween('now', '+30 years');

/*it works
$factory->define(Bicycle::class, function (Faker $faker) {
    return [
        'name' => $faker->unique()->name,
        'bicycle_broughtIn_at' => $faker->dateTimeBetween('now', '+2 days'),
        'bicycle_startedToServiceIt_at' => $faker->dateTimeBetween('now', '+1 days'),
        'bicycle_readyToTakeItHome_at' => now(),
    ];
});
*/
$factory->define(Bicycle::class, function (Faker $faker) {
    return [
        //'name' => [[$colorName] [$faker->unique()->word]],
        'name' => "$faker->colorName $faker->word",

        // 'user_id'=> $faker->numberBetween(1,10),
        //  'user_id' => function () {
        //      return factory(App\User::class)->create()->id;},
        'user_id' => factory(App\User::class),
        'bicycle_broughtIn_at' => $faker->dateTimeBetween('yesterday', '-25 hours'),
        'bicycle_startedToServiceIt_at' => $faker->dateTimeBetween('yesterday', '-1 hours'),
        'bicycle_readyToTakeItHome_at' => now(),
        'price' => $faker->numberBetween(1000, 10000),
        'description' => $faker->paragraph,
        'is_rentable' => $faker->boolean,
        'is_sellable' => $faker->boolean,
        'is_serviceable' => $faker->boolean,

        // 'image' => '/storage/6e0cbb8c6ae4ed7c406ce4830ba11481.jpg',
        'image' => '/storage/bic.png',

        // 'image' => '/storage/app/public/6e0cbb8c6ae4ed7c406ce4830ba11481.jpg',
        //This uses lorempixel, which is very slow...
        //'image' => $faker->imageUrl(40, 30),

        // 'image' => $faker->image('public/storage/images',640,480, null, false),
        // 'image' => $faker->image('/storage/app/public/images',64,48, null, false),
        // 'image' => $faker->image('/home/bazs/code/bicycle_7.7.1/storage/app/public/images/',640,480, null, true, true, null,false),




        // 'image' => $faker->image('/home/bazs/code/bicycle_7.7.1/storage/app/public',640,480, null, true, true, null),

        // 'image' => $faker->image('public/storage/images',64,48, null, false),
        // 'image' => $faker->image('/storage/app/public',640,480, null, false, true),

        // 'image' => $faker->image('/home/bazs/code/bicycle_7.7.1/public/storage/bic.png'),
        // 'image' => $faker->image('/home/bazs/code/bicycle_7.7.1/public/storage/'),
        // 'image' => $faker->image('/home/bazs/code/bicycle_7.7.1/storage/app/public/'),


        // 'image' => $faker->image(/home/bazs/code/bicycle_7.7.1/storage/app/public/bic.png),

        // 'image' => $faker->imageUrl('/home/bazs/code/bicycle_7.7.1/storage/app/public/bic.png'),



        'created_at' => $faker->dateTimeBetween('yesterday', '-30 hours'),
        'updated_at' => now(),
    ];
});

/*
relative path to faker:
vendor/fzaninotto/faker/src/Faker/Generator.php
@property int       $unixTime
 * @property \DateTime $dateTime
 * @property \DateTime $dateTimeAD
 * @property string    $iso8601
 * @property \DateTime $dateTimeThisCentury
 * @property \DateTime $dateTimeThisDecade
 * @property \DateTime $dateTimeThisYear
 * @property \DateTime $dateTimeThisMonth
 * @property string    $amPm
 * @property string    $dayOfMonth
 * @property string    $dayOfWeek
 * @property string    $month
 * @property string    $monthName
 * @property string    $year
 * @property string    $century
 * @property string    $timezone
 * @method string amPm($max = 'now')
 * @method string date($format = 'Y-m-d', $max = 'now')
 * @method string dayOfMonth($max = 'now')
 * @method string dayOfWeek($max = 'now')
 * @method string iso8601($max = 'now')
 * @method string month($max = 'now')
 * @method string monthName($max = 'now')
 * @method string time($format = 'H:i:s', $max = 'now')
 * @method int unixTime($max = 'now')
 * @method string year($max = 'now')
 * @method \DateTime dateTime($max = 'now', $timezone = null)
 * @method \DateTime dateTimeAd($max = 'now', $timezone = null)
 * @method \DateTime dateTimeBetween($startDate = '-30 years', $endDate = 'now', $timezone = null)
 * @method \DateTime dateTimeInInterval($date = '-30 years', $interval = '+5 days', $timezone = null)
 * @method \DateTime dateTimeThisCentury($max = 'now', $timezone = null)
 * @method \DateTime dateTimeThisDecade($max = 'now', $timezone = null)
 * @method \DateTime dateTimeThisYear($max = 'now', $timezone = null)
 * @method \DateTime dateTimeThisMonth($max = 'now', $timezone = null)
  */
