
<?php

use App\Helpers;
use App\Events\BicycleUpdated;
use App\Notifications\rentIsOver;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

 /* DB::listen(function ($query) {
     var_dump($query->sql, $query->bindings);
 }); */

 //auth()->loginUsingId(1);


Route::get('/', function () {
    $user = App\User::find(1);
    //dd($user);

    foreach ($user->notifications as $notification) {
        echo $notification->type;
    }

    // $user = App\User::find(1);

    // foreach ($user->unreadNotifications as $notification) {
    //     echo $notification->type;
    // }


    //auth()->loginUsingId(1);




    //echo php_ini_loaded_file();
    // $now= date('Y-m-d');
    // $dateStart = date('Y-m-d', strtotime('-5 year'));

    // $dateEnd = date('Y-m-d');
    // dump($now, $dateStart, $dateEnd);

    // myCustomHelper();

    //$names = collect(explode(',', 'michael, esther, peace'));
    /*  $names = explode(',', 'michael, esther, peace');
     $names = collect($names);
     //dd($names);
     $rand = $names->random();
     dd($rand); */
    ////////////////////////
    // echo strtotime("now"), "\n";
    // echo strtotime("10 September 2000"), "\n";
    // echo strtotime("+1 day"), "\n";
    // echo strtotime("+1 week"), "\n";
    // echo strtotime("+1 week 2 days 4 hours 2 seconds"), "\n";
    // echo strtotime("next Thursday"), "\n";
    // echo strtotime("last Monday"), "\n";

    // echo date("jS F, Y", strtotime("11.12.10"));
    // // outputs 10th December, 2011

    // echo date("jS F, Y", strtotime("11/12/10"));
    // // outputs 12th November, 2010

    // echo date("jS F, Y", strtotime("11-12-10"));
    // // outputs 11th December, 2010

    // $maxValue = App\User::max('id');
    // dd($maxValue);

    BicycleUpdated::dispatch();
    //same as
    // event(new BicycleUpdated);

    return view('welcome');
});


// Route::get('user/{id}', 'UserController@show');

// When registering routes for single action controllers, you do not need to specify a method:
//Route::get('users/{id}', 'ShowProfile');

//Route::get('/users', 'UserController@index');

// Route::get('/', function () {
//     $user = $request->user(); //getting the current logged in user
//     dd($user->hasRole('admin','editor')); // and so on
// });


//Route::get('service', 'BicycleController@service');

Route::resource('users', 'UserController');

// Route::group(['middleware' => ['role:super-admin']], function () {

// });

// Route::group(['middleware' => ['role_or_permission:serviceman|edit bicycles']], function () {
// //
// });

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});


//Route::resource('users', 'UserController');


//Route::get('service', 'BicycleController@service');


Route::get('bicyclestorent', 'BicycleController@allRentableBicycles');
// Route::get('newbikes', 'BicycleController@buy');
// Route::get('newbikes', 'BicycleController@buy');


Route::resource('bicycle', 'BicycleController');
Route::get('bicyclestosell', 'BicycleController@sellable');
Route::get('service', 'BicycleController@service');
Route::get('rentabike', 'BicycleController@rent');



// When declaring a resource route, you may specify a subset of actions the controller should handle instead of the full set of default actions
// Route::resource('bicycle', 'BicycleController')->except(['index', 'show']);



Auth::routes();

//Auth::routes(['verify' => true]);


/*named route */
Route::get('/home', 'HomeController@index')->name('home');

// Route::get('/home', function() {
//     $user = Auth::user(); //getting the current logged in user
//      dd($user->name, $user->email, $user->phone) ;
//     // dd($user->name);

//     //it works
//     // dd($user->hasRole('admin', 'editor'));
// });



// Route::get('/roles', 'PermissionController@Permission');


//it works
// Route::get('/roles', function() {
// $user = Auth::user();
// // dd($user->hasRole('developer')); //will return true, if user has role
// // dd($user->givePermissionsTo('create-tasks'));// will return permission, if not null
// dd($user->can('create-tasks')); // will return true, if user has permission
// });


Route::get('/profile', 'ProfileController@index')->name('profile');
Route::post('/profile/update', 'ProfileController@updateProfile')->name('profile.update');


//  Route::post('update_picture/{id}', [
//         'uses' => 'UserController@update_picture',
//         'as' => 'update_picture'
//     ]);

Route::put('update_picture/{id}', 'UserController@update_picture')->name('update_picture');

Route::resource('rents', 'RentController');
