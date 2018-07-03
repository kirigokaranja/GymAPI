<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use function PHPSTORM_META\elementType;

class RegisterController extends Controller
{

    function show()
    {
        $fees = User::all();
        return view('users', ['fees' => $fees]);
    }

     public function register(Request $request){

//    $this->validate($request,[
//
//        'name' =>'required',
//        'email' => 'required|email|unique:users,email',
//        'password' =>'required|min:6|confirmed'
//
//    ]);

         $user = new User();
         $user->first_name = request('first_name');
         $user->last_name = request('last_name');
         $user->email = request('email');
         $user->password = Hash::make(request('password')) ;
         $user->save();

         if ($user->save()){
             $response = [
                 'status' => 'success',
                 'message' => 'it worked',
                 'user' => $user
             ];
         }else{
             $response = [
                 'status' => 'fail',
                 'message' => 'Noooooooooo'
             ];
         }

         return response()->json($response);

    }

}
