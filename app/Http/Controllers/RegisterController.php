<?php

namespace App\Http\Controllers;

use App\GymInstructors;
use App\Profile;
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
                'message' =>$validated->errors()
            ];
            return response()->json($response);
        }

         $user = new User();
        $user->remember_token = "0";
         $user->first_name = request('first_name');
         $user->last_name = request('last_name');
         $user->email = request('email');
         $user->password = Hash::make(request('password')) ;
         $user->save();

         if ($user->save()){

             $id = $user->id;
             $profile= new Profile();
             $profile->user_id = $id;
             $profile->save();

             $response = [
                 'status' => true,
                 'message' => 'Registration Successful',
                 'user' => $user
             ];
         }else{
             $response = [
                 'status' => false,
                 'message' => 'Registration Unsuccessful'
             ];
         }

         return response()->json($response);

    }

    public function login(Request $request){
        $user = new User();
        $email = request('email');
        $password = request('password');
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

    public function getUserDetails($userId){

        $user = User::find($userId);
        return response()->json($user);
    }



}
