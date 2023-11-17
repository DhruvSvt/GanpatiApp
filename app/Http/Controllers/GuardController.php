<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\Society;
use Illuminate\Http\Request;

class GuardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.societyGuard.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role = Roles::findOrFail(3);
        // dd($roles);
        $societies = Society::all();
        return view('admin.societyGuard.create',compact('role','societies'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
