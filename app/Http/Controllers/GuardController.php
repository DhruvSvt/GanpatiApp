<?php

namespace App\Http\Controllers;
use DB;
use App\Models\Roles;
use App\Models\Society;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class GuardController extends Controller
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


        $items = User::select('users.*', DB::raw('SUM(commissions.amount) As commision'),'u.name as director', 'tl.name as tlname')->leftJoin('commissions', 'commissions.user', '=', 'users.id')->leftJoin('users as u', 'u.id', '=', 'users.society')->leftJoin('users as tl', 'tl.id', '=', 'users.tl')
        ->where('users.role_id',  3)
        ->groupBy('users.id')->when(isset($keyword), function ($query) use ($keyword, $allColumns) {
            $query->where(function ($query) use ($keyword, $allColumns) {
                // Dynamically construct the search query
                foreach ($allColumns as $column) {
                    $query->orWhere(
                        'users.' . $column,
                        'LIKE',
                        "%$keyword%"
                    );
                }
            });
        })
            ->latest()
            ->paginate($rows);
        $title = 'View Agent';
        return view('admin.societyGuard.index', compact('items', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $role = Roles::findOrFail(3);
        $societies = User::where('role_id', 5)->get();
        $title = 'Agent Create';
        $create = true;
        return view('admin.societyGuard.create', compact('role', 'societies', 'title', 'create'));
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
            'tl' => 'required',
            'society' => 'required',
            'PAN' => 'required',
            'user_id' => 'required|unique:users,user_id',

        ]);


        $user = new User();
        if ($request->file('profile_dp')) {
            $extension = $request->file('profile_dp')->getClientOriginalExtension();
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg') {
                $image = $request->file('profile_dp');
                $path = $image->store('files', 'public');
                $user->profile_dp  = $path;
            }
        }
        $user->name = $request->name;
        $user->user_id = $request->user_id;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password =        Hash::make($request->password);
        $user->society = $request->society;
        $user->tl = $request->tl;
        $user->PAN = $request->PAN;
        $user->commission = 0;
        $user->role_id = 3;


        $user->save();

        return redirect()->route('guard.index')->with('message', 'Agent Created Successfully');
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
        $role = Roles::findOrFail(3);
        $societies = User::where('role_id', 5)->get();
        $tls = User::where('role_id', 2)->where('society', $member->society)->get();
        $title = 'Guard Edit';
        $edit = true;
        return view('admin.societyGuard.create', compact('role', 'member', 'edit', 'title', 'societies', 'tls'));
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
            'email' => 'required|unique:users,email,' . $id,
            'society' => 'required',
            'tl' => 'required',
            'PAN' => 'required',
            'user_id' => 'required|unique:users,user_id,' . $id,
        ]);

        if ($request->password != '') {
            $user->password = Hash::make($request->password);
        }
        if ($request->file('profile_dp')) {
            $extension = $request->file('profile_dp')->getClientOriginalExtension();
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg') {
                $image = $request->file('profile_dp');
                $path = $image->store('files', 'public');
                $user->profile_dp  = $path;
            }
        }

        $user->name = $request->name;
        $user->user_id = $request->user_id;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->society = $request->society;
        $user->tl = $request->tl;
        $user->PAN = $request->PAN;

        $user->save();
        return redirect()->route('guard.index')->with('message', 'Agent Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('guard.index')->with('message', 'Agent Deleted Successfully');
    }

    public function status(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->status = $request->status;
        $user->save();

        return redirect()->back();
    }
}
