
<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('service', 'BicycleController@index');
Route::get('rentabike', 'BicycleController@rent');
Route::get('newbikes', 'BicycleController@buy');



Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
