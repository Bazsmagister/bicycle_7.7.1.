<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class ShowProfile extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /* public function __invoke(Request $request, $id)
    {
        return view('user.profile', ['user' => User::findOrFail($id)]);
    } */

    public function __invoke($id)
    {
        return view('users.profile', ['user' => User::findOrFail($id)]);
    }
}
