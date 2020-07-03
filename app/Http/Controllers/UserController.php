<?php

namespace App\Http\Controllers;

use App\User;

use Exception;

use App\Traits\UploadTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UserController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth');
    }

    public function index()
    {
        $activeUserCount = User::count();
        //dd($activeUserCount);
        $users =  User::paginate(10); //in view: <div class="panel-heading">Page {{ $users->currentPage() }} of {{ $users->lastPage() }} and    {!! $users->links() !!}
        //$users =  User::all();
        //$users = User::orderby('created_at', 'desc')->simplePaginate(8);
        // //$users = User::orderby('id', 'desc')->simplePaginate(5);
        // //$users =  User::simplePaginate(8);
        return view('users.index')->with('users', $users)->with('activeUserCount', $activeUserCount);

        //Works:
        // $activeUserCount = User::count();
        // $users =  User::paginate(10); //in view: <div class="panel-heading">Page {{ $users->currentPage() }} of {{ $users->lastPage() }} and    {!! $users->links() !!}
        // return view('users.index')->with('users', $users)->with('activeUserCount', $activeUserCount);

        // $users =  User::paginate(10); //in view: <div class="panel-heading">Page {{ $users->currentPage() }} of {{ $users->lastPage() }} and    {!! $users->links() !!}
        // return view('users.index')->with('users', $users);

        // $users = DB::table('users')->where('id', '<>', 1)->orderBy('created_at', 'desc')->paginate(12);
        // return view('users.index')->with('users', $users);

        // $users = DB::table('users')->distinct()->get();
        // return view('users.index')->with('users', $users);
    }


    // public function autocompleteUser(Request $request)
    // {
    //     $data = User::select("name")

    //             ->where("name", "LIKE", "%{$request->input('query')}%")

    //             ->select('name',)->distinct()//?

    //             ->get();

    //     return response()->json($data);
    // }

    public function autocompleteUser(Request $request)
    {
        $data = User::select("name", "id")

                ->where("name", "LIKE", "%{$request->input('query')}%")

                ->select('name', 'id')->distinct()//?

                ->get();

        return response()->json($data);
        dd($data);
    }


    public function show($id)
    {
        return view('users.show', ['user' => User::findOrFail($id)]);
    }

    // public function show($id)
    // {
    //     $user = User::findOrFail($id); //Find post of id = $id

    //     return view('users.profile', compact('user'));
    // }

    public function create()
    {
        return view('users.create');
    }

    public function store(Request $request)
    {

    //Validating name and email field
        // $this->validate($request, [
        //     'name'=>'required|max:100',
        //     // 'email' =>'required|email',
        //     'email' =>'required',
        //     'password' => 'required',
        //     'phone' => 'numeric'
        //     ]);

        // $name = $request['name'];
        // $email = $request['email'];
        // $password = $request['password'];
        // $password = $request['phone'];


        // $user = User::create($request->only('name', 'email', 'password', 'phone'));

        // //Display a successful message upon save
        // return redirect()->route('users.index')
        //     ->with('flash_message', 'User,
        //      '. $user->name.' created');

        $user=  User::create([
        'name' => request('name'),
        'email' => request('email'),
        'password' => bcrypt(request('password')),
        'phone' => request('phone')
    ]);
        //$request->flashExcept('password');


        return redirect()->//route('users.index')
        back()
        ->withInput()
             ->with('message', 'User,
              '. $user->name.' created');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view('users.edit', compact('user'));
    }



    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'name'=>'required|max:100',
            'email'=>'required',
        ]);

        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        return redirect()->route(
            'users.show',
            $user->id
        )->with(
            'message',
            'User, '. $user->name.' updated'
        );
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        // return redirect()->route('users.index')
        //     ->with(
        //         'message',
        //         'User successfully deleted'
        //     );

        //Multi "with" message flashed to the Session)
        return redirect()->route('users.index')
            ->with(
                'message',
                'User successfully deleted'
            )->with('alert-class', 'alert-danger');
    }


    public function update_picture(Request $request, $id)
    {
        DB::beginTransaction();
        try {
            $user = User::find($id);
            if ($request->user_image != "") {
                $user_image = $request->file('user_image');
                $new_name = rand() . '.' . $user_image->getClientOriginalExtension();
                $user_image->move(public_path('storage/users/image'), $new_name);
                // $user_image->move(public_path('images'), $new_name);

                $user->user_image = $new_name;
            }
            $user->save();


            DB::commit();

            // Session::flash('success', 'Picture Successfully Uploaded');
            Session::flash('message', 'Picture Successfully Uploaded');

            return redirect()->route('home');
        } catch (Exception $exception) {
            DB::rollback();
            Session::flash('error', 'Action failed!');
            return redirect()->back();
        }
    }

    public function myRents()
    {
        $myRents =auth()->user()->rents;
        //dd($myRents);
        /*     foreach ($myRents as $myRent) {
                echo $myRent->rentStarted_at, "\n";
                echo $myRent->created_at, "\n";
                echo $myRent->bicycle_id;
            }
         */
        /*   echo $myRents->rentStarted_at;
          echo $myRents->created_at;
          echo $myRents->bicycle_id; */

        //dd($myRents);
        return view('myRents', compact('myRents'));
    }

    public function getDeletedUsers()
    {
        $deletedUsers = User::onlyTrashed()
                //->where('airline_id', 1)
                ->get();
    }

    public function restoreDeletedUser(Request $request)
    {
        // $deletedUsers = User::onlyTrashed()
        //         //->where('airline_id', 1)
        //         ->get();

        //dd($user);

        User::withTrashed()
        ->where('id', request('id')) //doesn't work
        // ->select('id')
        ->restore();
        //dd($user);

        $users = DB::table('users')->where('id', '<>', 1)->orderBy('created_at', 'desc')->paginate(12);



        $deletedUsers = User::onlyTrashed()
                //->where('airline_id', 1)
                ->get();
        //dd($deletedUsers);

        //return view('users.index')->with('users', $users)->with('deletedUsers', $deletedUsers);
        return redirect('users')->with('message', 'user was restored');
    }

    public function indexDeletedAlso()
    {
        // $users =  User::paginate();
        // //$users =  User::all();
        // //$users = User::orderby('created_at', 'desc')->simplePaginate(5);
        // //$users = User::orderby('id', 'desc')->simplePaginate(5);
        // //$users =  User::simplePaginate(8);
        // return view('users.index')->with('users', $users);

        $deletedUsers = User::onlyTrashed()
                //->where('airline_id', 1)
                ->get();
        //dd($deletedUsers);


        $users = DB::table('users')->where('id', '<>', 1)->orderBy('created_at', 'desc')->paginate(12);

        return view('users.indexDeletedAlso')->with('users', $users)->with('deletedUsers', $deletedUsers);

        // $users = DB::table('users')->distinct()->get();
        // return view('users.index')->with('users', $users);
    }

    public function onlyDeletedUsers()
    {
        $deletedUsers = User::onlyTrashed()
                //->where('airline_id', 1)
                ->get();
        //dd($deletedUsers);
        return view('users.onlydeletedusers', compact('deletedUsers'));
    }

    public function findId(Request $request)
    {
        $foundname= request('name');
        $user =  DB::table('users')->where('name', $foundname)->first();
        //dd($user);
        $myid = $user->id;

        //dd($myid);

        return view('services.create', compact('myid', 'foundname'));
    }
}
