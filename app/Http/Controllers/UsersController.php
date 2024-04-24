<?php

namespace App\Http\Controllers;

use DB;
use App\Models\Roles;
use App\Models\Society;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class UsersController extends Controller
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


        $items = User::select('users.*', DB::raw('SUM(commissions.amount) As commision'),'u.name as director')->leftJoin('commissions', 'commissions.user', '=', 'users.id')->leftJoin('users as u', 'u.id', '=', 'users.society')
        ->where('users.role_id',  2)
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
        $title = 'View TL';
        return view('admin.members.index', compact('items', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // $roles = Roles::limit(3)->get();
        // $societies = Society::all();
        $create = true;
        $societies = User::where('role_id', 5)->where('status', 1)->get();
        $title = 'TL Create';
        return view('admin.members.create', compact('create', 'title', 'societies'));
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
            'society' => 'required',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->PAN = $request->PAN;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->society = $request->society;
        $user->role_id = 2;

        $user->save();
        // User::create($request->post());

        return redirect()->route('members.index')->with('message', 'TL Created Successfully');
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
        $societies = User::where('role_id', 5)->where('status', 1)->get();
        $edit = true;
        $title = 'TL Edit';
        return view('admin.members.create', compact('member', 'roles', 'societies', 'edit', 'title'));
    }
    public function getTl(Request $request)
    {
        $out = '';
        $id = $request->d_id;
        $societies = User::where('society', $id)->where('status', 1)->get();
        foreach($societies as $row){
            $out.= '<option value="'. $row->id. '">'. $row->name. ' (' . $row->id . ')</option>';
        }

        echo $out;
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
            'PAN' => 'required',
            'society' => 'required',
        ]);
        if ($request->password != '') {
            $user->password = Hash::make($request->password);
        }

        $user->name = $request->name;
        $user->phone = $request->phone;
         $user->PAN = $request->PAN;
        $user->society = $request->society;
        $user->email = $request->email;
        $user->update();
        return redirect()->route('members.index')->with('message', 'TL Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('members.index')->with('message', 'TL Deleted Successfully');
    }

    public function status(Request $request)
    {
        $user = User::findOrFail($request->user_id);
        $user->status = $request->status;
        $user->save();

        return redirect()->back();
    }
}
