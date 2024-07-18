<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Insurance;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class InsuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keyword = request()->keyword;
        $rows = request()->rows ?? 25;

        if ($rows == 'all') {
            $rows = Insurance::count();
        }

        // Get the table columns
        $allColumns = Schema::getColumnListing((new Insurance())->getTable());


        $items = Insurance::select('*')->when(isset($keyword), function ($query) use ($keyword, $allColumns) {
            $query->where(function ($query) use ($keyword, $allColumns) {
                // Dynamically construct the search query
                foreach ($allColumns as $column) {
                    $query->orWhere(
                        $column,
                        'LIKE',
                        "%$keyword%"
                    );
                }
            });
        })
            ->latest()
            ->paginate($rows);
        $title = 'View Policies';
        return view('admin.insurance.index', compact('items', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $category = Category::all();
        $title = 'Policy Create';
        $create = true;
        return view('admin.insurance.create', compact('title', 'create', 'category'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'cid' => 'required',
        ]);


        $user = new Insurance();
        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg') {
                $image = $request->file('image');
                $path = $image->store('web', 'public');
                $user->image  = $path;
            }
        }
        $user->name = $request->name;
        $user->cid = $request->cid;
        $user->sdescr = $request->sdescr;
        $user->description = $request->description;
        $user->slug = Str::slug($request->name, '-');
        $user->save();

        return redirect()->route('insurances.index')->with('message', 'insurance Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Insurance $insurance)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $member = Insurance::findOrFail($id);
        $category = Category::all();
        $title = 'Policy Edit';
        $edit = true;
        return view('admin.insurance.create', compact('title', 'edit', 'category', 'member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Insurance::findOrFail($id);
        $request->validate([
            'name' => 'required',
            'image' => 'required',
            'cid' => 'required',
        ]);


        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg') {
                $image = $request->file('image');
                $path = $image->store('web', 'public');
                $user->image  = $path;
            }
        }

        $user->name = $request->name;
        $user->cid = $request->cid;
        $user->sdescr = $request->sdescr;
        $user->description = $request->description;

        $user->save();
        return redirect()->route('insurances.index')->with('message', 'insurance Updated Successfully');
    }
    public function status(Request $request)
    {
        $user = Insurance::findOrFail($request->user_id);
        $user->status = $request->status;
        $user->save();

        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Insurance $insurance)
    {
        //
    }
}
