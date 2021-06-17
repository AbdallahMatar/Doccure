<?php

namespace App\Http\Controllers;

use App\Admin;
use App\City;
use App\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $admins = Admin::paginate(5);
        return view('admin.admins.index', ['admins' => $admins]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //

        // $cities = City::wherehas('states', function ($query) {
        //     $query->where('id', '>=', 1);
        // })->with(['states' => function ($query) {
        //     $query->where('id', '>=', 1)
        //     ->where('status', 'Active');
        // }])->where('status', 'Active')->get();


        $cities = City::with(['states' => function ($query) {
            $query->where('status', 'Active');
        }])->where('status', 'Active')->get();

        // $cities = City::has('states', '>=', 1)->where('status', 'Active')->get();

        return view('admin.admins.create', ['cities' => $cities]);
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
            'email' => 'required|email|unique:admins',
            'mobile' => 'required|numeric|unique:admins',
            'password' => 'required',
            'gender' => 'required|string|in:Male,Female',
            'birth_date' => 'required|date',
            'status' => 'in:on',
            // 'admin_image' => 'required|image',
            'admin_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $admin = new Admin();

        $admin->state_id = $request->get('state_id');
        $admin->first_name = $request->get('first_name');
        $admin->last_name = $request->get('last_name');
        $admin->email = $request->get('email');
        $admin->mobile = $request->get('mobile');
        $admin->password = Hash::make($request->get('password'));
        $admin->gender = $request->get('gender');
        $admin->birth_date = $request->get('birth_date');
        $admin->status = $request->has('status') ? 'Active' : 'Blocked';

        if ($request->hasFile('admin_image')) {
            $adminImage = $request->file('admin_image');
            $imageName = time() . '_' . $request->get('first_name') . '.' . $adminImage->getClientOriginalExtension();
            $adminImage->move('images/admin/', $imageName);
            $admin->image = $imageName;
        }

        $isSaved = $admin->save();
        if ($isSaved) {
            toast('Admin Add Successfully', 'success');
            return redirect()->back();
        } else {
            toast('Faild to create Admin', 'error');
            return redirect()->back();
        }
    }





    //     session()->flash('alert-type', 'alert-success');
    //     session()->flash('message', 'Admin created successfully');
    // Alert::success('Success Title', 'Success Message');
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $admin = Admin::findOrFail($id);
        return view('admin.admins.profile', ['admin' => $admin]);
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
        $admin = Admin::findOrFail($id);
//        $cities = City::has('states', '>=', 1)->where('status', 'Active')->get();
        $cities = City::with(['states' => function ($query) {
            $query->where('status', 'Active');
        }])->where('status', 'Active')->get();
        $states = State::where('status', 'Active')->get();
        return view('admin.admins.edit', ['admin' => $admin, 'cities' => $cities, 'states' => $states]);
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
            'id' => 'required|integer|exists:admins',
            'city_id' => 'required|integer|exists:cities,id',
            'state_id' => 'required|integer|exists:states,id',
            'first_name' => 'required|string|min:3|max:10',
            'last_name' => 'required|string|min:3|max:10',
            'email' => 'required|email|unique:admins,email,' . $id,
            'mobile' => 'required|numeric|unique:admins,mobile,' . $id,
            'gender' => 'required|string|in:Male,Female',
            'birth_date' => 'required|date',
            'status' => 'in:on',
            'admin_image' => 'image'
        ]);

        $admin = Admin::find($id);

        $admin->state_id = $request->get('state_id');
        $admin->first_name = $request->get('first_name');
        $admin->last_name = $request->get('last_name');
        $admin->email = $request->get('email');
        $admin->mobile = $request->get('mobile');
        $admin->gender = $request->get('gender');
        $admin->birth_date = $request->get('birth_date');
        $admin->status = $request->has('status') ? 'Active' : 'Blocked';

        if ($request->hasFile('admin_image')) {
            if (File::exists('images/admin/' . $admin->image)) {
                unlink('images/admin/' . $admin->image);
            }
            $adminImage = $request->file('admin_image');
            $imageName = time() . '_' . $request->get('first_name') . '.' . $adminImage->getClientOriginalExtension();
            $adminImage->move('images/admin/', $imageName);
            $admin->image = $imageName;
        }

        $isSaved = $admin->save();
        if ($isSaved) {
            toast('Admin Updated Successfully', 'success');
            return redirect(route('admins.index'));
        } else {
            toast('Faild to update Admin', 'error');
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
        $admin = Admin::whereId($id)->first();
        if ($admin->image != '') {
            if (File::exists('images/admin/' . $admin->image)) {
                unlink('images/admin/' . $admin->image);
            }
        }

        $isDeleted = Admin::destroy($id);
        if ($isDeleted) {
            return response()->json([
                'title' => 'Success',
                'text' => 'Admin Deleted Successfully',
                'icon' => 'success'
            ], 200);
        } else {
            return response()->json([
                'title' => 'Failed',
                'text' => 'Failed to delete admin',
                'icon' => 'error'
            ], 400);
        }
    }

    public function profile($id)
    {
        $admin = Admin::findOrFail($id);
        return view('admin.admins.profile', ['admin' => $admin]);
    }
}
