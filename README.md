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
otherwise in factory:
'created_at' => now(),
'updated_at' => now(),

and in migrations use:
\$table->timestamps();

I don't want to protect against mass assiggnement (for a while...)
protected \$guarded = [];

## Migration:

migration:
$table->string('name');
            $table->timestamp('bicycle_broughtIn_at')->nullable();
$table->timestamp('bicycle_startedToServiceIt_at')->nullable();
            $table->timestamp('bicycle_readyToTakeItHome_at')->nullable();

## Factory BicycleFactory.php

relative path to faker:
vendor/fzaninotto/faker/src/Faker/Generator.php

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

## UserSeeder.php

php artisan make:seeder UserSeeder;

        factory(App\User::class, 10)->create();

## Composer dump-autoload

        composer dump-autoload

## php artisan storage:link

The [/home/bazs/code/bicycle_7.7.1/public/storage] link has been connected to [/home/bazs/code/bicycle_7.7.1/storage/app/public].
The links have been created.

## php artisan ui:controllers

Scaffold the authentication controllers

## https://laravel.com/docs/7.x/blade#components

php artisan make:component Alert

The make:component command will place the component in the App\View\Components directory.
The make:component command will also create a view template for the component. The view will be placed in the resources/views/components directory.

php artisan make:component Alert --inline
public function render()
{
// return <<<'blade'
// <div class="alert alert-danger">
// {{ $slot }}
// </div>
// blade;
}

## User Role Permission

spatie/laravel permission

or:
php artisan make:model Permission -m
php artisan make:model Role -m

php artisan make:migration create_permission_user_table --create=permission_user

php artisan make:migration create_role_user_table --create=role_user

php artisan make:seeder RolesTableSeeder

php artisan make:seeder PermissionTableSeeder

php artisan make:migration create_permission_role_table --create=permission_role

app/Role and app/Permission make the methods. belongsToMany

trait:
app/Permissions/HasPermissionsTrait.php

User.php
use App\Permissions\HasPermissionsTrait;

composer dump-autoload

# spatie/laravel-permission

https://github.com/spatie/laravel-permission?fbclid=IwAR3HEl4t7kRcV8fQc6v23_YthrwXKXHs1BZUQH3AKmzicUAhuR5CVyQUwyE

his package can be used in Laravel 5.8 or higher.

composer require spatie/laravel-permission

//Using version ^3.13 for spatie/laravel-permission

php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider"
