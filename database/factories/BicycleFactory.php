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
        'name' => $faker->unique()->word,
        'bicycle_broughtIn_at' => $faker->dateTimeBetween('yesterday', '-25 hours'),
        'bicycle_startedToServiceIt_at' => $faker->dateTimeBetween('yesterday', '-1 hours'),
        'bicycle_readyToTakeItHome_at' => now(),
    ];
});

/*
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
