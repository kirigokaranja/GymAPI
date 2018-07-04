<?php

namespace App\Http\Controllers;

use App\GymDetail;
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

        $instructor = [
            "instructors" => $instructor,
        ];
        return response()->json($instructor);
    }


    public function addgym(){


        $details = new GymDetail();
        $details->gym_name = request('gym_name');
        $details->opening_time = request('opening_time');
        $details->closing_time = request('closing_time');
        $details->latitude = request('latitude');
        $details->longitude = request('longitude') ;
        $details->save();


        if ($details->save()){



            $response = [
                'status' => true,
                'message' => 'Gym Added Successful',
                'user' => $details
            ];
        }else{
            $response = [
                'status' => false,
                'message' => ' Unsuccessful'
            ];
        }

        return response()->json($response);
    }

    public function showgym(){

        $details = GymDetail::all();

        $details = [
            "details" => $details,
        ];
        return response()->json($details);
    }

    public function gymDetails($gym_id){

        $gym = GymDetail::where('id', $gym_id)->get();

        $gym = [

            "gym" => $gym,
        ];
        return response()->json($gym);

    }

}
