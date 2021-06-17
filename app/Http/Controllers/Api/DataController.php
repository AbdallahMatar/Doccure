<?php

namespace App\Http\Controllers\Api;

use App\City;
use App\Doctor;
use App\Http\Controllers\Controller;
use App\Patient;
use App\Speciality;
use App\State;
use App\User;
use Illuminate\Http\Request;

class DataController extends Controller
{
    //
    public function city()
    {
        $cities = City::all();
        return response()->json([
            'status' => true,
            'message' => 'Success',
            'cities' => $cities
        ]);
    }

    public function state()
    {
        $states = State::all();
        return response()->json([
            'status' => true,
            'message' => 'Success',
            'states' => $states
        ]);
    }

    public function doctor()
    {
        $doctors = Doctor::all();
        return response()->json([
            'status' => true,
            'message' => 'Success',
            'doctors' => $doctors
        ]);
    }

    public function speciality()
    {
        $specialities = Speciality::all();
        return response()->json([
            'status' => true,
            'message' => 'Success',
            'specialities' => $specialities
        ]);
    }

    public function patient()
    {
        $patients = Patient::all();
        return response()->json([
            'status' => true,
            'message' => 'Success',
            'patients' => $patients
        ]);
    }

    public function user()
    {
        $users = User::all();
        return response()->json([
            'status' => true,
            'message' => 'Success',
            'users' => $users
        ]);
    }
}
