<?php

namespace App\Http\Controllers;

use App\Appointment;
use App\City;
use App\Doctor;
use App\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // $appointments = Appointment::all();
        // $doctors = Doctor::where('status', 'Active')->get();
        // $cities = City::where('status', 'Active')->get();
        // $patients = Patient::where('status', 'Active')->get();

        // dd($cities);
        return view('admin.appointments.index');
        // return view('admin.appointments.index');
    }

    public function listEvetn()
    {
        $event = Appointment::latest()->get();
        return response()->json($event);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $doctors = Doctor::where('status', 'Active')->get();
        $patients = Patient::where('status', 'Active')->get();
        return response()->json([
            'status' => true,
            'message' => 'success',
            'doctors' => $doctors,
            'patients' => $patients
        ]);
        // dd($doctors);
        // return response()->json($doctors, $patients);
        // return view('admin.appointments.create', ['doctors' => $doctors, 'patients' => $patients]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // $request->validate([
        //     ''
        // ]);
        $appointment = new Appointment();
        $appointment->title = $request->get('title');
        $appointment->start = $request->get('start');
        $appointment->end = $request->get('end');
        $startTime = strtotime($request->get('start'));
        $endTime = strtotime($request->get('end'));
        $time = $startTime - $endTime;
        $minutes = abs(($time / 60));
        $appointment->duration_in_minutes = $minutes;
        $appointment->status = 'Accepted';
        $appointment->price = $request->get('price');
        $appointment->patient_id = $request->get('patient_id');
        $appointment->doctor_id = $request->get('doctor_id');
        // $appointment->price = $request->get('price');

        $isSaved = $appointment->save();
        if ($isSaved) {
            toast('Appointment Add Successfully', 'success');
            return redirect()->back();
        } else {
            toast('Faild to create Appointment', 'error');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $appointment = Appointment::find($id);
        return response()->json($appointment);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
