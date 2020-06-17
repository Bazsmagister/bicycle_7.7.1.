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

/_Copied File [/vendor/spatie/laravel-permission/config/permission.php] To [/config/permission.php]
Copied File [/vendor/spatie/laravel-permission/database/migrations/create_permission_tables.php.stub] To [/database/migrations/2020_05_29_090505_create_permission_tables.php]
Publishing complete._/

# Seeder

php artisan make:seeder RolesAndPermissionsSeeder

in seeder.php:
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

When you use the built-in functions for manipulating roles and permissions, the cache is automatically reset for you, and relations are automatically reloaded for the current model record:

$user->assignRole('writer');
$user->removeRole('writer');
$user->syncRoles(params);
$role->givePermissionTo('edit articles');
$role->revokePermissionTo('edit articles');
$role->syncPermissions(params);
$permission->assignRole('writer');
$permission->removeRole('writer');
\$permission->syncRoles(params);

# Manual cache reset

To manually reset the cache for this package, you can run the following in your app code:

app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();

Or you can use an Artisan command:

php artisan permission:cache-reset

# draw

https://drawsql.app/templates/laravel-permission

## Timestamps

Excluding Timestamps from JSON

If you want to exclude timestamps from JSON output of role/permission pivots, you can extend the Role and Permission models into your own App namespace and mark the pivot as hidden:

    protected $hidden = ['pivot'];

Adding Timestamps to Pivots

If you want to add timestamps to your pivot tables, you can do it with a few steps: - update the tables by calling \$table->timestamps(); in a migration - extend the Permission and Role models and add ->withTimestamps(); to the BelongsToMany relationshps for roles() and permissions() - update your User models (wherever you use the HasRoles or HasPermissions traits) by adding ->withTimestamps(); to the BelongsToMany relationshps for roles() and permissions()

## Roles vs Permissions

It is generally best to code your app around permissions only. That way you can always use the native Laravel @can and can() directives everywhere in your app.

Roles can still be used to group permissions for easy assignment, and you can still use the role-based helper methods if truly necessary. But most app-related logic can usually be best controlled using the can methods, which allows Laravel’s Gate layer to do all the heavy lifting.

eg: users have roles, and roles have permissions, and your app always checks for permissions, not roles.

## app.php

Spatie\Permission\PermissionServiceProvider::class,

## middlewares

https://docs.spatie.be/laravel-permission/v3/basic-usage/middleware/

in app\http\kernel
'role' => \Spatie\Permission\Middlewares\RoleMiddleware::class,
'permission' => \Spatie\Permission\Middlewares\PermissionMiddleware::class,
'role_or_permission' => \Spatie\Permission\Middlewares\RoleOrPermissionMiddleware::class,

Then you can protect your routes using middleware rules:

Route::group(['middleware' => ['role:super-admin']], function () {
//
});

Route::group(['middleware' => ['permission:publish articles']], function () {
//
});

Route::group(['middleware' => ['role:super-admin','permission:publish articles']], function () {
//
});

Route::group(['middleware' => ['role_or_permission:super-admin|edit articles']], function () {
//
});

Route::group(['middleware' => ['role_or_permission:publish articles']], function () {
//
});

You can protect your controllers similarly, by setting desired middleware in the constructor:

public function \_\_construct()
{
\$this->middleware(['role:super-admin','permission:publish articles|edit articles']);
}

public function \_\_construct()
{
\$this->middleware(['role_or_permission:super-admin|edit articles']);
}

## Grant superadmin

in AuthServiceProvider
\$this->registerPolicies();

        // Implicitly grant "Super Admin" role all permission checks using can()
        Gate::before(function ($user, $ability) {
            if ($user->hasRole('Super-Admin')) {
                return true;
            }
        });

Spatie\Permission\PermissionServiceProvider::class,

## MustVerifyEmail

in app\User.php
class User extends Authenticatable implements MustVerifyEmail
in:
app/routes/web.php
Auth::routes(['verify' => true]);

and simple in your method just call this:

\$user->sendEmailVerificationNotification();

## File-manager to upload photos.

composer require unisharp/laravel-filemanager
php artisan vendor:publish --tag=lfm_config
php artisan vendor:publish --tag=lfm_public
php artisan storage:link

## web

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
\UniSharp\LaravelFilemanager\Lfm::routes();
});

http://127.0.0.1:8000/laravel-filemanager/demo

`

<iframe src="/laravel-filemanager" style="width: 100%; height: 500px; overflow: hidden; border: none;"></iframe>
`

# Scripts

defer doesn't work
{{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}

<script src="{{ asset('js/app.js') }}"></script>

To fix it, simply remove the defer attribute from the script tag.

    The defer attribute is a boolean attribute.

    When present, it specifies that the script is executed when the page has finished parsing.
    Note: The defer attribute is only for external scripts (should only be used if the src attribute is present).

#test jquery

<input id="ddtype" type="text" placeholder="enter here with mouse">
<script type="text/javascript">
    jQuery(document).ready(function(){

            jQuery( "#ddtype" ).change(function() {
                alert( "Handler for .change() called." );
            });

        });

</script>

# enctype="multipart/form-data"

multipart/form-data No characters are encoded. This value is required when you are using forms that have a file upload control

# erreor finder

$data= $request->all();
echo "<pre>";
print_r(\$data);
//die;

multi role blade :

https://docs.spatie.be/laravel-permission/v3/basic-usage/blade-directives/

As discussed in the Best Practices section of the docs, it is strongly recommended to always use permission directives, instead of role directives.
but:

@hasanyrole('super-user|salesman|serviceman')
@endhasanyrole

Blade doesn't recognise @hasanyrole any longer

"I changed some minor (content) things in a template, and did a "php artisan cache:clear" to make sure things would be visible. Since then, I see that blade is no longer parsing @hasanyrole and @endhasanyrole any longer.
This is how the html of the page is outputted now.Next I did replace hasanyrole by hasrole (with only one role) and that worked. Then I replaced back the hasanyrole and everything kept working. I'm happy the error is gone, but a bit puzzled and disturbed by such strange behaviour. If anyone could give a hint where I should start looking if it would occur again, it's still welcome."

Check remote:
git remote -v
!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!

Steps to recreate
1.Did a fresh laravel install, configured the guards
'guards' => [
'employee' => [
'driver' => 'session',
'provider' => 'employees',
],

]

2.configured model
namespace App\Company;

//use Eloquent as Model;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Authenticatable
{
use HasRoles;
use SoftDeletes;
use Notifiable;

public \$table = 'employees';

const CREATED_AT = 'created_at';
const UPDATED_AT = 'updated_at';

protected $dates = ['deleted_at'];
protected $guard_name = 'employee';

3.After creating employee , I assign role

if ($employee==true) {
        $employee->assignRole(\$role);
}

4.I create role and assign permissions

$role = Role::create(['guard_name' => 'employee', 'name' => $request->role_name])
$role->syncPermissions($request->permissions)

    I use artisan to create permissions

php artisan permission:create-permission "manage_parameters" employee

    On my blade file, I check for permission

             @can('manage_parameters','employee')
             <li class="pcoded-hasmenu ">

             </li>
             @endcan

@sokeno
Author
sokeno commented on Jan 18, 2019

Thanks @drbyte for your input, I actually got the fix for it, The fix was to get rid of any defined relationships on my Employee model and add protected \$guard_name = 'employee'; , Thanks

Check role , check @hasanyrole
@hasanyrole('super-admin|serviceman|salesman')

<p>has any role</p>
@else
<p>has not role</p>
@endhasanyrole

public function store(){
$imageName = time().'.'.request()->image->getClientOriginalExtension();
request()->image->move(public_path('images'), $imageName);
}

then use

<embed src="{{ asset("images/$imageName")}}">

In controller@update I can change the folder where it saves the pics.
storage/images...

.env !!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!!
FILESYSTEM_DRIVER=public

form validation( with tailwind)

@error('name')

<p class = "text-red-500">{{$message}}</p>
@enderror

An alternate solution is adding this to the links key in your config/filesystems.php file.

public_path('avatars') => storage_path('app/public/avatars'),

After adding that, then you can run the artisan command again, and it should work.

For the avatar validation, you can use the image rule instead of just file. The dimensions rule maybe be useful as well. Example:

'avatar' => [
'image',
'dimensions:min_width=100,min_height=200',
],

HTML5 supports regexes, so you could use this:

<input id="numbersOnly" pattern="[0-9.]+" type="text">
pattern="[0-9.]+"

Laravel image upload:
https://www.larashout.com/laravel-image-upload-made-easy?fbclid=IwAR1LUIXC1dCLdXQP9F_Ha4sS-i94MFrfSwxpIy2uCF7mIMtsVTCOCxiX0J8

npm install bootstrap-sweetalert

$bicycle->is_availableToRent = 0;
            $bicycle->save();

Laravel Echo REDIS Pusher Channel:

1. app\config\app.php
   uncomment :
   // App\Providers\BroadcastServiceProvider::class,

test:
php artisan route:list
GET|POST|HEAD broadcasting/auth Illuminate\Broadcasting\BroadcastController@authenticate

2. app\config\broadcasting.php
   'default' => env('BROADCAST_DRIVER', 'null'),
   to log or redis or pusher:
   'default' => env('BROADCAST_DRIVER', 'log'),

3.

php artisan make:event BicycleUpdated

4. in
   app\events\Bicycleupdated
   implements ShouldBroadcast contract(interface)

public function broadcastOn()
{
// return new PrivateChannel('channel-name');
return new Channel('orders');
}

5.  web.php
    use App\Events\BicycleUpdated;

    Route::get('/', function () {
    BicycleUpdated::dispatch();
    //same as
    // event(new BicycleUpdated);

        return view('welcome');

    });

6.  pas (php artisan serve)
    hit the route:

check app\storage\logs\laravel.log

[2020-06-12 10:22:30] local.INFO: Broadcasting [App\Events\BicycleUpdated] on channels [orders] with payload:
{
"socket": null
}

7. in BicycleUpdated.php
   if you define a public property than it will load in the broadcast.

# custom helpers:

artisan make:provider HelperServiceProvider
in this register method:

public function register()
{
foreach (glob(app_path().'/Helpers/\*.php') as $filename) {
            require_once($filename);
}
}

Make a Helpers folder in App root.

in app\config\app.php add to providers.
App\Providers\HelperServiceProvider::class,

in composer.json:
"autoload": {
"psr-4": {
"App\\": "app/"
},
"classmap": [
"database/seeds",
"database/factories"
],
"files": [
"app/Helpers/helpers.php"
]
},

composer dumpautoload
