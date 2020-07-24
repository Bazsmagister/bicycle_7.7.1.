
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


Route::get('/loginasauth', function () {
    $user = User::find(5);
    dump($user);
    //Auth::logout();

    Auth::login($user);
    dump('login');
    dump(auth()->user()->id);

    //it shows view, but it doesn't show anything else. Doesn't work!
    return view('home');

    //Doesn't work:
    //return redirect()->route('myactiverents');
    //return redirect()->back();


    //auth()->loginUsingId(4);
});


// Route::get('/', function () {
//     return view('welcome');
// });

//   DB::listen(function ($query) {
//       var_dump($query->sql, $query->bindings);
//   });

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
 Route::get('mailservice', function () {
     $service = App\Service::latest()->first();
     dump($service);
     //dd($service);
     return (new App\Notifications\newServiceCreated($service))
                ->toMail($service->user);
 });

 Route::get('mailrent', function () {
     $rent = App\Rent::latest()->first();
     // $rent = App\Rent::find(30);
     dump($rent);
     return (new App\Notifications\newRentIsMade($rent))
                 ->toMail($rent->user);
 });

 Route::get('helper', function () {
     myCustomHelper();
 });

  Route::get('maxuser', function () {
      $maxValue = App\User::max('id');
      dump($maxValue);
      echo($maxValue);
      var_dump($maxValue);
      print_r($maxValue);
  });


 Route::get('dates', function () {
     $now= date('Y-m-d');
     $dateStart = date('Y-m-d', strtotime('-5 year'));
     $dateEnd = date('Y-m-d');
     dump($now, $dateStart, $dateEnd);

     echo strtotime("now"), "\n";
     echo strtotime("10 September 2000"), "\n";
     echo strtotime("+1 day"), "\n";
     echo strtotime("+1 week"), "\n";
     echo strtotime("+1 week 2 days 4 hours 2 seconds"), "\n";
     echo strtotime("next Thursday"), "\n";
     echo strtotime("last Monday"), "\n";

     echo date("jS F, Y", strtotime("11.12.10"));
     // outputs 10th December, 2011

     echo date("jS F, Y", strtotime("11/12/10"));
     // outputs 12th November, 2010

     echo date("jS F, Y", strtotime("11-12-10"));
     // outputs 11th December, 2010
 });



Route::get('file', function () {
    $file = public_path('try.txt');
    dump($file);
    $fp = fopen($file, "r");
    dump($fp);
    $responsejson = file_get_contents($file);
    dump($responsejson);
    fclose($fp);
    dump($fp); //Closed resource @8

    // File handling example
    // *****************
    // $handle = fopen("/home/bazs/code/bicycle_7.7.1/public/try.txt", "r");
    // dump($handle);
    // $responsejson = file_get_contents("/home/bazs/code/bicycle_7.7.1/public/try.txt");
    // dump($responsejson);
    // fclose($handle);
    // dump($handle); //Closed resource @8
    //*******************
});

Route::get('log ', function () {
    $logfilename = 'cron_'. now()->format('Y_m_d') . '.txt';
    dump($logfilename);
    $fp = fopen($logfilename, "w") or die("Unable to open file!");
    dump($fp);
    $txt = "This need to be written in the file...\n";
    fwrite($fp, $txt);
    $txt='new text';
    fwrite($fp, $txt);

    $responsejson = file_get_contents($logfilename);
    dump($responsejson);
    fclose($fp);
    dump($fp); //Closed resource @8
});

Route::get('notifications', function () {

    // $user = App\User::find(1);
    // dump($user);
    // foreach ($user->notifications as $notification) {
    //     echo $notification->type;
    // }


    $user = auth()->user();

    foreach ($user->unreadNotifications as $notification) {
        echo $notification ->type;
        echo("\n");
        echo $notification ->id;

        echo $notification ->read_at;
        //echo $notification->data;

        dump($notification);
        echo $notification ->created_at;
        echo "Expires: ";
        echo $notification->data['expires'];
        echo $notification->data['link'];
        echo $notification->data['data2'];
    }
});


Route::get('/', function () {
    echo php_ini_loaded_file();
    echo "\n";

    Storage::put('text.txt', 'hello');

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



    //$names = collect(explode(',', 'michael, esther, peace'));
    /*  $names = explode(',', 'michael, esther, peace');
     $names = collect($names);
     //dd($names);
     $rand = $names->random();
     dd($rand); */
    ////////////////////////



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
Route::post('bicyclesToRent/findId', 'BicycleToRentController@findId');
Route::post('bicyclesToSell/findId', 'BicycleToSellController@findId');


Route::post('bicyclesToRent/showmethebike', 'BicycleToRentController@showmethebike')->name('showmethebike');

Route::post('bicyclesToSell/showmethesellablebike', 'BicycleToSellController@showmethesellablebike')->name('showmethesellablebike');



Route::get('indexDeletedAlso', 'UserController@indexDeletedAlso');

 Route::get('OnlyDeletedUsers', 'UserController@onlyDeletedUsers');
 Route::get('OnlyDeletedUsersAPI', 'UserController@onlyDeletedUsersAPI');



// Route::group(['middleware' => ['role:super-admin']], function () {

// });

// Route::group(['middleware' => ['role_or_permission:serviceman|edit bicycles']], function () {
// //
// });

Route::group(['prefix' => 'laravel-filemanager', 'middleware' => ['web', 'auth']], function () {
    \UniSharp\LaravelFilemanager\Lfm::routes();
});



Route::get('myserviceprogress', 'ServiceController@myserviceprogress');
Route::get('myoldservices', 'ServiceController@myoldservices');
Route::get('myworkshop', 'ServiceController@myworkshop');



Route::get('rentabike', 'BicycleToRentController@rent');



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

Route::get('/myPreviousRents', 'UserController@myPreviousRents');
Route::get('/myActiveRents', 'UserController@myActiveRents')->name('myactiverents');


// Route::get('autocomplete', 'UserController@autocomplete')->name('autocomplete');
// Route::get('autocompletebike', 'BicycleController@autocompletebike')->name('autocompletebike');

Route::get('autocompleteUser', 'UserController@autocompleteUser')->name('autocompleteUser');
Route::get('autocompleteBikeToSell', 'BicycleToSellController@autocompleteBikeToSell')->name('autocompleteBikeToSell');
Route::get('autocompleteBikeToRent', 'BicycleToRentController@autocompleteBikeToRent')->name('autocompleteBikeToRent');



Route::post('restoreDeletedUser/{id}', 'UserController@restoreDeletedUser')->name('restoreDeletedUser');
// Route::get('restoreDeletedUser/{id}', 'UserController@restoreDeletedUser')->name('restoreDeletedUser');


Route::resource('services', 'ServiceController');

Route::resource('bicyclesToSell', 'BicycleToSellController');
// Route::resource('bicycles_to_sell', 'BicycleToSellController');

Route::resource('bicyclesToRent', 'BicycleToRentController');
//Route::get('indexrentable', 'BicycleToRentController@indexrentable');
Route::get('indexavailabletorent', 'BicycleToRentController@indexavailabletorent');


Route::resource('bicyclesToService', 'BicycleToServiceController');

//If your route only needs to return a view, you may use the Route::view method.
//Like the redirect method, this method provides a simple shortcut so that you do not have to define a full route or controller.
//The view method accepts a URI as its first argument and a view name as its second argument.
//In addition, you may provide an array of data to pass to the view as an optional third argument:
            //v1
            Route::view('serviceguest', 'services.serviceguest');

            //v2
            Route::get('serviceguest', function () {
                return view('services.serviceguest');
            });
            //in view:
            //<a href="{{ url('serviceguest')}}">Service (guest v2)</a>

            //v3 with named route
             Route::get('serviceguest', function () {
                 return view('services.serviceguest');
             })->name('serviceguest');


//it works with (int) before $c:
Route::get('/mkuser/{c}', function ($c) {
    return collect(factory(User::class, (int)$c)->create());
});


Route::get('/sendemail', function () {
    Mail::raw('it works', function ($message) {
        $message->to('info@hogyat.hu')->subject('Hello There');
    });
    return redirect()->back()->with('message', 'Email sent');

    //MAIL_MAILER=log
});

//XHRHTTPrequest
Route::post('users/{user}/togglecategory', 'UserController@toggleCategory')->name('toggleCategory');
