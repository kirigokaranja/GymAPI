<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProfileController extends Controller
{
    public function getUserDetails($userId){

        $user = User::find($userId);
        return response()->json($user);
    }

    public function updateprofile($userdId){

}
}
