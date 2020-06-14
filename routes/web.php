
<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Events\BicycleUpdated;

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



Route::get('/', function () {
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
