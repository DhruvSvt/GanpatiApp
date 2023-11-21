<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use App\Models\Roles;
use App\Models\Society;
use Illuminate\Http\Request;

class ResidentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $residents = Resident::all();
        return view('admin.resident.index', compact('residents'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $societies = Society::all();
        return view('admin.resident.create', compact('societies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required',
            'resident_id' => 'unique:residents,resident_id',
            'society' => 'required',
            'appartment_no' => 'required',
            'resident_type' => 'required',
        ]);

        $request['role_id'] = 4;

        Resident::create($request->all());

        return redirect()->route('resident.index')->with('message', 'Data added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Resident $resident)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $resident = Resident::findOrFail($id);
        $societies = Society::whereStatus(true)->get();
        $title = 'Resident Edit';
        $edit = true;
        return view('admin.resident.create', compact('societies', 'title', 'edit', 'resident'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $resident = Resident::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'resident_id' => 'required',
            'society' => 'required',
            'appartment_no' => 'required',
            'resident_type' => 'required',
        ]);

        $request['role_id'] = 4;

        $resident->update($request->all());

        return redirect()->route('resident.index')->with('message', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $resident = Resident::findOrFail($id);
        $resident->delete();
        return redirect()->route('resident.index')->with('message','Data Deleted Successfully');
    }

    public function status(Request $request)
    {
        $resident = Resident::findOrFail($request->resident_id);
        $resident->status = $request->status;
        $resident->save();

        return redirect()->back();
    }
}
