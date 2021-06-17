<?php

namespace App\Http\Controllers;

use App\City;
use App\State;
use Illuminate\Http\Request;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $states = State::with('city')->paginate(5);
        return view('admin.states.index', ['states' => $states]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cities = City::where('status', 'Active')->get();
        return view('admin.states.create', ['cities' => $cities]);
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
            'name' => 'required|string|min:5|max:15',
            'status' => 'in:on|string'
        ]);

        $state = new State();
        $state->name = $request->get('name');
        $state->status = $request->has('status') ? 'Active' : 'InActive';
        $state->city_id = $request->get('city_id');

        $isSaved = $state->save();
        if ($isSaved) {
            // session()->flash('alert-type', 'alert-success');
            // session()->flash('message', 'State Add Successfully');
            toast('State Add Successfully', 'success');
            return redirect()->back();
        } else {
            // session()->flash('alert-type', 'alert-danger');
            // session()->flash('message', 'Faild to create state');
            toast('Faild to create state', 'error');
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
        $cities = City::where('status', 'Active')->get();
        $state = State::findOrFail($id);
        return view('admin.states.edit', ['cities' => $cities, 'state' => $state]);
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
            'id' => 'required|exists:states',
            'city_id' => 'required|integer|exists:cities,id',
            'name' => 'required|string|min:5|max:15',
            'status' => 'in:on|string'
        ]);

        $state = State::findOrFail($id);
        $state->name = $request->get('name');
        $state->status = $request->has('status') ? 'Active' : 'InActive';
        $state->city_id = $request->get('city_id');
        $isUpdated = $state->save();
        if ($isUpdated) {
            // session()->flash('alert-type', 'alert-success');
            // session()->flash('message', 'State Updated Successfully');
            toast('State Updated Successfully', 'success');
            return redirect(route('states.index'));
        } else {
            // session()->flash('alert-type', 'alert-danger');
            // session()->flash('message', 'Faild to update state');
            toast('Faild to update state', 'error');
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
        $isDeleted = State::destroy($id);
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
