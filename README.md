## Rent a bicycle

Laravel 7.7.1

## Make auth in laravel 7

composer require laravel/ui
answer:
Using version ^2.0 for laravel/ui

Caret Version Range (^)# (hiányjel in hungarian)
A háztető vagy kalap (^) egy fordított V alakú graféma:

The ^ operator behaves very similarly but it sticks closer to semantic versioning, and will always allow non-breaking updates. For example ^1.2.3 is equivalent to >=1.2.3 <2.0.0 as none of the releases until 2.0 should break backwards compatibility. For pre-1.0 versions it also acts with safety in mind and treats ^0.3 as >=0.3.0 <0.4.0.

This is the recommended operator for maximum interoperability when writing library code.

Example: ^1.2.3
caret sign is:
answer
Creating the ^ symbol on a U.S. keyboard
To create the caret symbol using a U.S. keyboard hold down the Shift key and press the six number key at the top of the keyboard.

ASCII-ban és Unicode-ban a hivatalos neve circumflex accent (U+005E), amely csak az utóbbi funkcióját tükrözi. Tízes számrendszerben a karakter kódja: 94.

Character Map. find : caret (in desciption also)

shift+ctrl+6 = comment/uncomment html great!!!

## Make auth in laravel 7 with php artisan

php artisan ui vue --auth

npm install && npm run dev

npm run watch
or
npm run watch-poll

## Make a Model

php artisam make:model Bicycle -a
it creates:
Model created successfully.
Factory created successfully.
Created Migration: 2020_04_22_075710_create_bicycles_table
Seeder created successfully.
Controller created successfully.

I don't want to use timestamps:
public \$timestamps = false;

## Migration:

migration:
$table->string('name');
            $table->timestamp('bicycle_broughtIn_at')->nullable();
$table->timestamp('bicycle_startedToServiceIt_at')->nullable();
            $table->timestamp('bicycle_readyToTakeItHome_at')->nullable();

## Factory BicycleFactory.php

$factory->define(Bicycle::class, function (Faker $faker) {
return [
'name' => $faker->unique()->word,
'bicycle_broughtIn_at' => $faker->dateTimeBetween('yesterday', '-25 hours'),
'bicycle_startedToServiceIt_at' => $faker->dateTimeBetween('yesterday', '-1 hours'),
'bicycle_readyToTakeItHome_at' => now(),
];
});

## .env

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bicycle
DB_USERNAME=u  
DB_PASSWORD=u

## .env

sudo mysql
create database bicycle;

## DatabaseSeeder.php

        $this->call(UserSeeder::class);
        $this->call(BicycleSeeder::class);

## BicycleSeeder.php

        factory(App\Bicycle::class, 10)->create();

## UsersSeeder.php

php artisan make:seeder UserSeeder;

        factory(App\User::class, 10)->create();

## Composer dump-autoload

        composer dump-autoload
