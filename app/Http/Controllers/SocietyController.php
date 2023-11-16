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
        return view('admin.society.index',compact('societies'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.society.create');
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

        return redirect()->route('society.index')->with('message','Data Added Successfully');
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
    public function edit(Society $society)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Society $society)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Society $society)
    {
        //
    }
}
