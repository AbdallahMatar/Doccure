<?php

namespace App\Http\Controllers;

use App\City;
use App\Doctor;
use App\Speciality;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $doctors = Doctor::paginate(5);
        return view('admin.doctors.index', ['doctors' => $doctors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
//        $cities = City::has('states', '>=', 1)->where('status', 'Active')->get();
        $cities = City::with(['states' => function ($query) {
            $query->where('status', 'Active');
        }])->where('status', 'Active')->get();
        $specialities = Speciality::where('status', 'Active')->get();

        return view('admin.doctors.create', ['cities' => $cities, 'specialities' => $specialities]);
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
            'first_name' => 'required|string|min:3|max:10',
            'last_name' => 'required|string|min:3|max:10',
            'email' => 'required|email|unique:doctors',
            'mobile' => 'required|numeric|unique:doctors',
            'password' => 'required',
            'city_id' => 'required|integer|exists:cities,id',
            'state_id' => 'required|integer|exists:states,id',
            'speciality_id' => 'required|integer|exists:specialities,id',
            'birth_date' => 'required|date',
            'gender' => 'required|string|in:Male,Female',
            'about' => 'required',
            'doctor_image' => 'required|image',
            'status' => 'in:on',
            'pricing' => 'required|string|in:Free,PerHour',
            'hour_price' => 'required|integer',
            'facebook' => 'string|url',
            'twitter' => 'string|url',
            'linked' => 'string|url'
        ]);

        $doctor = new Doctor();

        $doctor->first_name = $request->get('first_name');
        $doctor->last_name = $request->get('last_name');
        $doctor->email = $request->get('email');
        $doctor->mobile = $request->get('mobile');
        $doctor->password = Hash::make($request->get('password'));
        $doctor->state_id = $request->get('state_id');
        $doctor->speciality_id = $request->get('speciality_id');
        $doctor->birth_date = $request->get('birth_date');
        $doctor->gender = $request->get('gender');
        $doctor->about = $request->get('about');

        if ($request->hasFile('doctor_image')) {
            $specialityImage = $request->file('doctor_image');
            $imageName = time() . '_' . $request->get('first_name') . '.' . $specialityImage->getClientOriginalExtension();
            $specialityImage->move('images/doctor/', $imageName);
            $doctor->image = $imageName;
        }

        $doctor->status = $request->has('status') ? 'Active' : 'Blocked';
        $doctor->pricing = $request->get('pricing');
        $doctor->hour_price = $request->get('hour_price');
        $doctor->facebook_url = $request->get('facebook');
        $doctor->twitter_url = $request->get('twitter');
        $doctor->linked_in_url = $request->get('linked');

        $isSaved = $doctor->save();
        if ($isSaved) {
            toast('Doctor Add Successfully', 'success');
            return redirect()->back();
        } else {
            toast('Faild to create Doctor', 'error');
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
        $doctor = Doctor::findOrFail($id);
        return view('admin.doctors.profile', ['doctor' => $doctor]);
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
        $doctor = Doctor::findOrFail($id);
        $cities = City::has('states', '>=', 1)->where('status', 'Active')->get();
        $states = State::where('status', 'Active')->get();
        $specialities = Speciality::where('status', 'Active')->get();
        return view('admin.doctors.edit', ['doctor' => $doctor, 'cities' => $cities, 'states' => $states, 'specialities' => $specialities]);
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
            'id' => 'required|integer|exists:doctors',
            'first_name' => 'required|string|min:3|max:10',
            'last_name' => 'required|string|min:3|max:10',
            'email' => 'required|email|unique:doctors,email,' . $id,
            'mobile' => 'required|numeric|unique:doctors,mobile,' . $id,
            'city_id' => 'required|integer|exists:cities,id',
            'state_id' => 'required|integer|exists:states,id',
            'speciality_id' => 'required|integer|exists:specialities,id',
            'birth_date' => 'required|date',
            'gender' => 'required|string|in:Male,Female',
            'about' => 'required',
            'doctor_image' => 'image',
            'status' => 'in:on',
            'pricing' => 'required|string|in:Free,PerHour',
            'hour_price' => 'required|integer',
            'facebook' => 'string|url',
            'twitter' => 'string|url',
            'linked' => 'string|url'
        ]);

        $doctor = Doctor::find($id);

        $doctor->first_name = $request->get('first_name');
        $doctor->last_name = $request->get('last_name');
        $doctor->email = $request->get('email');
        $doctor->mobile = $request->get('mobile');
        $doctor->state_id = $request->get('state_id');
        $doctor->speciality_id = $request->get('speciality_id');
        $doctor->birth_date = $request->get('birth_date');
        $doctor->gender = $request->get('gender');
        $doctor->about = $request->get('about');

        if ($request->hasFile('doctor_image')) {
            if (File::exists('images/doctor/' . $doctor->image)) {
                unlink('images/doctor/' . $doctor->image);
            }
            $specialityImage = $request->file('doctor_image');
            $imageName = time() . '_' . $request->get('first_name') . '.' . $specialityImage->getClientOriginalExtension();
            $specialityImage->move('images/doctor/', $imageName);
            $doctor->image = $imageName;
        }

        $doctor->status = $request->has('status') ? 'Active' : 'Blocked';
        $doctor->pricing = $request->get('pricing');
        $doctor->hour_price = $request->get('hour_price');
        $doctor->facebook_url = $request->get('facebook');
        $doctor->twitter_url = $request->get('twitter');
        $doctor->linked_in_url = $request->get('linked');

        $isSaved = $doctor->save();
        if ($isSaved) {
            toast('Doctor Updated Successfully', 'success');
            return redirect(route('doctors.index'));
        } else {
            toast('Faild to update Doctor', 'error');
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
        $doctor = Doctor::whereId($id)->first();
        if (File::exists('images/doctor/' . $doctor->image)) {
            unlink('images/doctor/' . $doctor->image);
        }

        $isDeleted = Doctor::destroy($id);
        if ($isDeleted) {
            return response()->json([
                'title' => 'Success',
                'text' => 'Doctor Deleted Successfully',
                'icon' => 'success'
            ], 200);
        } else {
            return response()->json([
                'title' => 'Failed',
                'text' => 'Failed to delete doctor',
                'icon' => 'error'
            ], 400);
        }
    }
}
