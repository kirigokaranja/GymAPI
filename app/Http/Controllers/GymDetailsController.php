<?php

namespace App\Http\Controllers\Auth;

use App\GymDetail;
use App\GymLocation;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class GymDetailsController extends Controller
{
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
}
