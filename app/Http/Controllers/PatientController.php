<?php

namespace App\Http\Controllers;

use App\City;
use App\Patient;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $patients = Patient::all();
        return view('admin.patient.index', ['patients' => $patients]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cities = City::has('states', '>=', 1)->where('status', 'Active')->get();
        return view('admin.patient.create', ['cities' => $cities]);
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
        $request->validate([
            'city_id' => 'required|integer|exists:cities,id',
            'state_id' => 'required|integer|exists:states,id',
            'first_name' => 'required|string|min:3|max:10',
            'last_name' => 'required|string|min:3|max:10',
            'email' => 'required|email|unique:patients',
            'mobile' => 'required|numeric|unique:patients',
            'password' => 'required',
            'gender' => 'required|string|in:Male,Female',
            'birth_date' => 'required|date',
            'blood_type' => 'required|string',
            'patient_image' => 'required|image',
            'status' => 'in:on'
        ]);

        $patient = new Patient();

        $patient->state_id = $request->get('state_id');
        $patient->first_name = $request->get('first_name');
        $patient->last_name = $request->get('last_name');
        $patient->email = $request->get('email');
        $patient->mobile = $request->get('mobile');
        $patient->password = Hash::make($request->get('password'));
        $patient->gender = $request->get('gender');
        $patient->birth_date = $request->get('birth_date');
        $patient->blood_type = $request->get('blood_type');
        $patient->status = $request->has('status') ? 'Active' : 'Blocked';

        if ($request->hasFile('patient_image')) {
            $patientImage = $request->file('patient_image');
            $imageName = time() . "_" . $request->get('first_name') . '.' . $patientImage->getClientOriginalExtension();
            $patientImage->move('images/patient/', $imageName);
            $patient->image = $imageName;
        }

        $isSaved = $patient->save();
        if ($isSaved) {
            toast('Patient Add Successfully', 'success');
            return redirect()->back();
        } else {
            toast('Faild to create Patient', 'error');
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
        $patient = Patient::findOrFail($id);
        return view('admin.patient.profile', ['patient' => $patient]);
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
        $patient = Patient::findOrFail($id);
        $cities = City::has('states', '>=', 1)->where('status', 'Active')->get();
        $states = State::where('status', 'Active')->get();
        return view('admin.patient.edit', ['patient' => $patient, 'cities' => $cities, 'states' => $states]);
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
        $request->request->add(['id' => $id]);
        $request->validate([
            'id' => 'required|integer|exists:patients',
            'city_id' => 'required|integer|exists:cities,id',
            'state_id' => 'required|integer|exists:states,id',
            'first_name' => 'required|string|min:3|max:10',
            'last_name' => 'required|string|min:3|max:10',
            'email' => 'required|email|unique:patients,email,' . $id,
            'mobile' => 'required|numeric|unique:patients,mobile,' . $id,
            'gender' => 'required|string|in:Male,Female',
            'birth_date' => 'required|date',
            'blood_type' => 'required|string',
            'patient_image' => 'image',
            'status' => 'in:on'
        ]);

        $patient = Patient::find($id);

        $patient->state_id = $request->get('state_id');
        $patient->first_name = $request->get('first_name');
        $patient->last_name = $request->get('last_name');
        $patient->email = $request->get('email');
        $patient->mobile = $request->get('mobile');
        $patient->gender = $request->get('gender');
        $patient->birth_date = $request->get('birth_date');
        $patient->blood_type = $request->get('blood_type');
        $patient->status = $request->has('status') ? 'Active' : 'Blocked';

        if ($request->hasFile('patient_image')) {
            if (File::exists('images/patient/' . $patient->image)) {
                unlink('images/patient/' . $patient->image);
            }
            $patientImage = $request->file('patient_image');
            $imageName = time() . "_" . $request->get('first_name') . '.' . $patientImage->getClientOriginalExtension();
            $patientImage->move('images/patient/', $imageName);
            $patient->image = $imageName;
        }

        $isSaved = $patient->save();
        if ($isSaved) {
            toast('Patient Updated Successfully', 'success');
            return redirect(route('patients.index'));
        } else {
            toast('Faild to update Patient', 'error');
            return redirect()->back();
        }
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
        $patient = Patient::whereId($id)->first();
        if (File::exists('images/patient/' . $patient->image)) {
            unlink('images/patient/' . $patient->image);
        }

        $isDeleted = Patient::destroy($id);
        if ($isDeleted) {
            return response()->json([
                'title' => 'Success',
                'text' => 'Patient Deleted Successfully',
                'icon' => 'success'
            ], '200');
        } else {
            return response()->json([
                'title' => 'Failed',
                'text' => 'Failed to delete patient',
                'icon' => 'error'
            ], '400');
        }
    }
}
