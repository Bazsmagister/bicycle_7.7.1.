<?php

//namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function store(Request $request)
    {

        // 1. not safe, no validation, not recommended
        //User::create($request->all());
        // in User Model :protected $fillable = ['name', 'email', 'password', 'phone'];

        //2.a //request()
        // $user = new User();
        // $user->name = request('name');
        // $user->email = request('email');
        // $user->phone = request('phone');
        // $user->password = bcrypt(request('password'));
        // $user->save(); //persist in the database

        //2/b //$request
        // $user = new User();
        // $user->name =  $request->name;
        // $user->email = $request->email;
        // $user->phone = $request->phone;
        // $user->password = bcrypt($request->password);
        // $user->save(); //persist in the database

        // 3 a create: method persist the request in the database.
        //Validating name and email field
        // $this->validate($request, [
        //     'name'=>'required|max:100',
        //     'email' =>'required|email',
        //      'password' => 'required',
        //     'phone' => 'numeric'
        //     ]);

        // $name = $request['name'];
        // $email = $request['email'];
        // $password = $request['password'];
        // $password = $request['phone'];


        // $user = User::create($request->only('name', 'email', 'password', 'phone'));

        //3 b
        // $validatedData = request()->validate([
        //     'name'=>'required|max:100',
        //     'email'=>'required',
        //     'password' => 'required',
        //     'phone' => 'numeric',
        //     ]);

        // $user=  User::create(     //User::firstOrCreate($validatedData);
        //     $validatedData
        // );


        //3 c
        // $this->validate($request, [
        //     'name'=>'required',
        //     'phone' =>'required|numeric',
        //     'email' =>'numeric|email',
        //     'password' => 'requied|min:8',

        //     ]);
        // $userData = [
        //         'name' => $request->name,
        //         'email' => $request -> email,
        //         'phone' => $request ->phone,
        //         'password' => $request->password,
        //     ];
        // $suser = User::firstOrCreate($userData);
    }
}
