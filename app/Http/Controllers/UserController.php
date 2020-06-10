<?php

namespace App\Http\Controllers;

use App\User;

use App\Traits\UploadTrait;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Symfony\Component\HttpFoundation\File\UploadedFile;

class UserController extends Controller
{
    public function index()
    {
        // $users =  User::paginate();
        // //$users =  User::all();
        // //$users = User::orderby('created_at', 'desc')->simplePaginate(5);
        // //$users = User::orderby('id', 'desc')->simplePaginate(5);
        // //$users =  User::simplePaginate(8);
        // return view('users.index')->with('users', $users);

        $users = DB::table('users')->where('id', '<>', 1)->orderBy('created_at', 'desc')->paginate(12);
        return view('users.index')->with('users', $users);

        // $users = DB::table('users')->distinct()->get();
        // return view('users.index')->with('users', $users);
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
}
