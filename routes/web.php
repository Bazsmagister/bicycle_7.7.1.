
<?php

use App\User;
use App\Helpers;
use App\Events\BicycleUpdated;
use App\Http\Controllers\UserController;
use App\Notifications\rentIsOver;
use Illuminate\Foundation\Inspiring;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Route;
use Symfony\Component\Process\Process;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Storage;

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

 Route::get('mapWithKeys', function () {
     $userCollections = User::all();
     //dd($userCollections);
     $userCollectionskey = $userCollections ->mapWithKeys(function ($user) {
         return [$user['name'] => $user['created_at']];
     });

     $userCollectionsmap = $userCollectionskey->all();
     //dd($userCollectionsmap);
     //print_r($userCollections);
     //echo $userCollections;
     //dd($userCollections);
     return view('UserNameDateMapWithKeys', compact('userCollectionsmap'));
 });

 //it gives a view about the mail.
 Route::get('mail', function () {

    //  $rent = App\Rent::latest()->first();
     //  // $rent = App\Rent::find(30);
     //  dd($rent);
     //  return (new App\Notifications\newRentIsMade($rent))
     //             ->toMail($rent->user);


     $service = App\Service::latest()->first();
     dd($service);
     return (new App\Notifications\newServiceCreated($service))
                ->toMail($service->user);
 });



Route::get('/', function () {
    //Storage::put('text.txt', 'hello');

    /*   auth()->loginUsingId(1);
     $myRents =auth()->user()->rents;
     //dd($myRents);
     foreach ($myRents as $myRent) {
         echo $myRent->rentStarted_at, "\n";
         echo $myRent->created_at, "\n";
         echo $myRent->bicycle_id;
     } */

    /*   echo $myRents->rentStarted_at;
      echo $myRents->created_at;
      echo $myRents->bicycle_id; */

    // dd($myRents);

    echo(Inspiring::quote()), "\n";

    $result = shell_exec("python " . storage_path() . "/python/python.py 2>&1"); //this works
    echo($result);

    $result2 = shell_exec("python " . public_path() . "/storage/python/python.py 2>&1"); //this works too
    echo($result2);

    //$command ="python ".public_path() . "/storage/python/python.py";
    //$command ="python ".public_path() . "\storage\python\python.py";
    //$command =public_path() . "\storage\python\python.py";

    //On Linux works,
    //$command ='python C:/Users/Legion/code/bicycle_7.7.1/public/storage/python/python.py'; //need python
    //$command ='python '. public_path() . "/storage/python/python.py"; //need python
    //DD($command);
    //$proc = Process::fromShellCommandline($command, null, [])->mustRun()->getOutput(); //getErrorOutput();
    //echo $proc;


    //On win 10  not works
    /*     $process = new Process(['python ', 'C:/Users/Legion/code/bicycle_7.7.1/public/storage/python/python.py']);
        //dd($process);
        echo $process->mustRun()->getOutput();
        var_dump($process->getOutput()); */
    //echo $process->getOutput();

    // dump(Inspiring::quote());
    // echo(Inspiring::quote());
    // var_dump(Inspiring::quote());
    // print_r(Inspiring::quote());


    /*    $logfilename = 'cron_'. now()->format('Y_m_d') . '.txt';
       dump($logfilename); */



    // $user = App\User::find(1);
    // //dd($user);
    // foreach ($user->notifications as $notification) {
    //     echo $notification->type;
    // }

    //$user = App\User::find(1);
    /*   $user = auth()->user();


      foreach ($user->unreadNotifications as $notification) {
          echo $notification ->type;
          echo $notification ->id;

          //echo $notification ->keytype;
          //echo $notification['table'];

          //dd($notification);
          echo $notification ->created_at;
          // echo $notification->data['expires'];
          echo $notification->data['link'];
          echo $notification->data['data2']; */


    // echo $notification->data['data'] -> ['link'];
    //}


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


    //BicycleUpdated::dispatch();

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

Route::post('users/findId', 'UserController@findId');

Route::get('indexDeletedAlso', 'UserController@indexDeletedAlso');

 Route::get('OnlyDeletedUsers', 'UserController@onlyDeletedUsers');
//Route::post('OnlyDeletedUsers', 'UserController@onlyDeletedUsers');



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


Route::resource('bicycles', 'BicycleController');

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

Route::get('/myRents', 'UserController@myRents');


// Route::get('autocomplete', 'UserController@autocomplete')->name('autocomplete');
// Route::get('autocompletebike', 'BicycleController@autocompletebike')->name('autocompletebike');

Route::get('autocompleteUser', 'UserController@autocompleteUser')->name('autocompleteUser');
Route::get('autocompleteBike', 'BicycleController@autocompleteBike')->name('autocompleteBike');


Route::post('restoreDeletedUser/{id}', 'UserController@restoreDeletedUser')->name('restoreDeletedUser');
// Route::get('restoreDeletedUser/{id}', 'UserController@restoreDeletedUser')->name('restoreDeletedUser');


Route::resource('services', 'ServiceController');
