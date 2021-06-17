<?php

namespace App\Http\Controllers;

use App\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $specialities = Speciality::paginate(5);
        return view('admin.specialities.index', ['specialities' => $specialities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.specialities.create');
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
            'title' => 'required|string|unique:specialities',
            'description' => 'required',
            'status' => 'in:on',
            'specialities_image' => 'required|image'
        ]);

        $speciality = new Speciality();

        $speciality->title = $request->get('title');
        $speciality->description = $request->get('description');
        $speciality->status = $request->has('status') ? 'Active' : 'InActive';

        if ($request->hasFile('specialities_image')) {
            $specialitiesImage = $request->file('specialities_image');
            $imageName = time() . '_' . $request->get('first_name') . '.' . $specialitiesImage->getClientOriginalExtension();
            $specialitiesImage->move('images/speciality', $imageName);
            $speciality->image = $imageName;
        }

        $isSaved = $speciality->save();
        if ($isSaved) {
            toast('Speciality Add Successfully', 'success');
            return redirect()->back();
        } else {
            toast('Faild to create Speciality', 'error');
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
        $speciality = Speciality::findorFail($id);
        return view('admin.specialities.profile', ['speciality' => $speciality]);
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
        $speciality = Speciality::findOrFail($id);
        return view('admin.specialities.edit', ['speciality' => $speciality]);
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
            'id' => 'required|integer|exists:specialities',
            'title' => 'required|string|unique:specialities,title,' . $id,
            'description' => 'required',
            'status' => 'in:on',
            'specialities_image' => 'image'
        ]);

        $speciality = Speciality::find($id);

        $speciality->title = $request->get('title');
        $speciality->description = $request->get('description');
        $speciality->status = $request->has('status') ? 'Active' : 'InActive';

        if ($request->hasFile('specialities_image')) {
            if (File::exists('images/speciality/' . $speciality->image)) {
                unlink('images/speciality/' . $speciality->image);
            }
            $specialitiesImage = $request->file('specialities_image');
            $imageName = time() . '_' . $request->get('first_name') . '.' . $specialitiesImage->getClientOriginalExtension();
            $specialitiesImage->move('images/speciality', $imageName);
            $speciality->image = $imageName;
        }

        $isSaved = $speciality->save();
        if ($isSaved) {
            toast('Speciality Updated Successfully', 'success');
            return redirect(route('specialities.index'));
        } else {
            toast('Faild to Update Speciality', 'error');
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroy($id)
    {
        //
        $speciality = Speciality::whereId($id)->first();
        if ($speciality->image != '') {
            if (File::exists('images/speciality/' . $speciality->image)) {
                unlink('images/speciality/' . $speciality->image);
            }
        }

        $isDeleted = Speciality::destroy($id);
        if ($isDeleted) {
            return response()->json([
                'title' => 'Success',
                'text' => 'City Deleted Successfully',
                'icon' => 'success'
            ], 200);
        } else {
            return response()->json([
                'title' => 'Failed',
                'text' => 'Faild to delete city',
                'icon' => 'error'
            ], 400);
        }
    }
}
