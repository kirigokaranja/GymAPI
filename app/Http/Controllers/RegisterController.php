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
         $user->first_name = request('first_name');
         $user->last_name = request('last_name');
         $user->email = request('email');
         $user->password = Hash::make(request('password')) ;
         $user->save();

         $id = $user->id;
         $profile= new Profile();
         $profile->user_id = $id;
         $profile->profilePhoto ='profilePhoto';
         $profile->dob = '10/11/1997';
         $profile->gender = 'gender';
         $profile->weight = 'weight';
         $profile->desired_weight = 'desired_weight';
         $profile->height = 'height';
         $profile->homegym = '1';
         $profile->save();

         if ($user->save() && $profile->save()){



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

    public function getprofileDetails($userId){

        $profile = Profile::find($userId);
        return response()->json($profile);
    }

    public function updateProfile($userId){

        $profile = Profile::find($userId);
        $profile->profilePhoto = request('profilePhoto');
        $profile->dob = request('dob');
        $profile->gender = request('gender');
        $profile->weight = request('weight');
        $profile->desired_weight = request('desired_weight');
        $profile->height = request('height');
        $profile->homegym = request('homegym');
        $profile->save();

        if ($profile->save()){

            $response = [
                'status' => true,
                'message' => 'Update Successful',
                'user' => $profile
            ];
        }else{
            $response = [
                'status' => false,
                'message' => 'Update Unsuccessful'
            ];
        }

        return response()->json($response);

    }

}
