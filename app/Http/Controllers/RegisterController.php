<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
     public function register(Request $request){

    $this->validate($request,[

        'name' =>'required',
        'email' => 'required|email|unique:users,email',
        'password' =>'required|min:6|confirmed'

    ]);

    $user = User::create([

        'first_name' => request('first_name'),
        'last_name' => request('last_name'),
        'email' => request('email'),
        'password' => Hash::make(request('password'))

    ]);

    }
}
