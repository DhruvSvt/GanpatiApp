<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Roles;
use App\Models\User;
use Illuminate\Contracts\Session\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Validation\Validator;

class DirectorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keyword = request()->keyword;
        $rows = request()->rows ?? 25;

        if ($rows == 'all') {
            $rows = User::count();
        }

        // Get the table columns
        $allColumns = Schema::getColumnListing((new User())->getTable());


        $items = User::select('users.*', DB::raw('SUM(commissions.amount) As commision'))->leftJoin('commissions', 'commissions.user', '=', 'users.id')
            ->where('users.role_id',  5)
            ->groupBy('users.id')->when(isset($keyword), function ($query) use ($keyword, $allColumns) {
            $query->where(function ($query) use ($keyword, $allColumns) {
                // Dynamically construct the search query
                foreach ($allColumns as $column) {
                    $query->orWhere(
                        'users.'.$column,
                        'LIKE',
                        "%$keyword%"
                    );
                }
            });
        })
            ->latest()
            ->paginate($rows);
        $title = 'View Directors';
        return view('admin.director.index', compact('items', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Director Create';
        $create = true;
        return view('admin.director.create', compact('title', 'create'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:users,email',
            'password' => 'required',
            'PAN' => 'required',
            'user_id' => 'required|unique:users,user_id',
        ]);

        $user = new User();
        if ($request->file('profile_dp')) {
            $extension = $request->file('profile_dp')->getClientOriginalExtension();
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' ) {
                $image = $request->file('profile_dp');
                $path = $image->store('files', 'public');
                $user->profile_dp  = $path;
            }
        }
        $user->name = $request->name;
        $user->user_id = $request->user_id;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password =Hash::make($request->password);
        $user->PAN = $request->PAN;
        $user->commission = 0;
        $user->role_id = 5;


        $user->save();

        return redirect()->route('director.index')->with('success', 'Director Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return redirect()->route('director.index')->with('success', 'Director Created Successfully');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $member = User::findOrFail($id);
        $title = 'Director Edit';
        $edit = true;
        return view('admin.director.edit', compact('member', 'edit', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|unique:users,email,' . $id,
            'PAN' => 'required',
            'user_id' => 'required|unique:users,user_id,' . $id,
        ]);

        $user = User::findOrFail($id);
        if($request->password!=''){
            $user->password = Hash::make($request->password);
        }
        if ($request->file('profile_dp')) {
            $extension = $request->file('profile_dp')->getClientOriginalExtension();
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg' ) {
                $image = $request->file('profile_dp');
                $path = $image->store('files', 'public');
                $user->profile_dp  = $path;
            }
        }

        $user->name = $request->name;
        $user->user_id = $request->user_id;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->PAN = $request->PAN;

        $user->save();
        return redirect()->route('director.index')->with('message', 'Director Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
