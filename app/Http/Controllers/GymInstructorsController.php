<?php

namespace App\Http\Controllers;

use App\GymInstructors;
use App\GymLocation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Input;

class GymInstructorsController extends Controller
{

    function show()
    {
        $fees = GymInstructors::all();
        return view('instructor', ['fees' => $fees]);
    }

    public function addInstructor(Request $request){

        $instructor = new GymInstructors();
        $instructor->name = request('name');
        $instructor->contact = request('contact');
        $instructor->email = request('email');
        $instructor->image = request('photo');
        $instructor->gender = request('gender');
        $instructor->bio = request('bio');
        $instructor->gym_id = request('gym_id');
        $instructor->save();

        if ($instructor->save()){
            $response = [
                'status' => true,
                'message' => 'Instructor added Successfully',
                'user' => $instructor
            ];
        }else{
            $response = [
                'status' => false,
                'message' => 'Instructor not Added'
            ];
        }

        return response()->json($response);
    }


    public function instructorDetails(){

        $instructor = GymInstructors::all();
        return response()->json($instructor);
    }
}
