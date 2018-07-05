<?php

namespace App\Http\Controllers;

use App\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SessionsController extends Controller
{
    public function addworkout(Request $request){

        $workout = new Session();
        $workout->date = request('date');
        $workout->exercise_name = request('exname');
        $workout->reps = request('reps');
        $workout->sets = request('sets');
        $workout->status = request('location');
        $workout->user_id = request('user_id');
        $workout->save();

        if ($workout->save()){
            $response = [
                'status' => true,
                'message' => 'Workout added Successfully',
                'user' => $workout
            ];
        }else{
            $response = [
                'status' => false,
                'message' => 'Workout not Added'
            ];
        }

        return response()->json($response);
    }

    public function WorkoutDetails($user_id){

        $workout = Session::where('user_id', $user_id)->get();

        return response()->json($workout);

    }

    public function allDetails(){

        $workout = Session::all();

        return response()->json($workout);
    }
}
