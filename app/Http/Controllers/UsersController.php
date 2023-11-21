<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\Society;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $members = User::all();
        return view('admin.members.index', compact('members'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $roles = Roles::limit(3)->get();
        $societies = Society::all();
        $isCreate = true;
        $title = 'Members Create';
        return view('admin.members.create', compact('roles', 'societies', 'isCreate', 'title'));
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
            'user_id' => 'unique:users,user_id',
            'society' => 'required',
            'role_id' => 'required',
        ]);

        User::create($request->post());

        return redirect()->route('members.index')->with('message', 'Data added Successfully');
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
        $member = User::findOrFail($id);
        $roles = Roles::limit(3)->get();
        $societies = Society::all();
        $isEdit = true;
        $title = 'Members Edit';
        return view('admin.members.create', compact('member', 'roles', 'societies', 'isEdit', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'user_id' => 'required',
            'society' => 'required',
            'role_id' => 'required',
        ]);

        $user->update($request->post());
        return redirect()->route('members.index')->with('message', 'Data updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('members.index')->with('message', 'Data Deleted Successfully');
    }

    public function status(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->status = $request->status;
        $user->save();

        return redirect()->back();
    }
}
