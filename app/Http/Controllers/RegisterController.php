<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use function PHPSTORM_META\elementType;

class RegisterController extends Controller
{

    function show()
    {
        $fees = User::all();
        return view('users', ['fees' => $fees]);
    }

     public function register(Request $request){

        $validated = Validator::make($request->all(),[
            'email' => 'unique:user_95006,email'
        ]);

        if ($validated->fails()){

            $response = [
                'status' => false,
                'message' =>$Validate->errors()
            ];
            return response()->json($response);
        }

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

    public function login(Request $request){

        $user = new User();
        $email = $request->input('email');
        $password = $request->input('password');
        $user['email'] = $email;

        if ($user = User::where('email', '=', $email)->first()){

            if (Hash::check($password, $user->password)){

                $response = [
                    'status' => true,
                    'message' => 'Login Successful',
                    'user' => $user
                ];
            }else{

                $response = [
                    'status' => false,
                    'message' => 'Login Unsuccessful'
                ];
            }
            return response()->json($response);

        }else{

            $response = [
                'status' => false,
                'message' => 'Invalid email or password'
            ];
            return response()->json($response);
        }

    }

}
