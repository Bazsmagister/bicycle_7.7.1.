<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function index()
    {
        // $users =  User::all();
        $users =  User::simplePaginate(8);

        return view('users.index')->with('users', $users);
    }


    public function show($id)
    {
        return view('users.profile', ['user' => User::findOrFail($id)]);
    }
}
