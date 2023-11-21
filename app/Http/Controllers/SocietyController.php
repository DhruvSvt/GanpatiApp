<?php

namespace App\Http\Controllers;

use App\Models\Society;
use Illuminate\Http\Request;

class SocietyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $societies = Society::all();
        return view('admin.society.index', compact('societies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $create = true;
        $title = 'Society Create';
        return view('admin.society.create', compact('create', 'title'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'total_appartments' => 'required',
            'city' => 'required',
            'address' => 'required'
        ]);

        Society::create($request->post());

        return redirect()->route('society.index')->with('message', 'Data Added Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Society $society)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $society = Society::findOrFail($id);
        $title = 'Society Edit';
        $edit = true;
        return view('admin.society.create', compact('edit', 'title', 'society'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $society = Society::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'total_appartments' => 'required',
            'city' => 'required',
            'address' => 'required'
        ]);

        $society->update($request->post());

        return redirect()->route('society.index')->with('message', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $society = Society::findOrFail($id);
        $society->delete();
        return redirect()->route('society.index')->with('message', 'Data Deleted Successfully');
    }

    public function status(Request $request)
    {
        $society = Society::findOrFail($request->societyId);
        $society->status = $request->status;
        $society->save();

        return redirect()->back();
    }
}
