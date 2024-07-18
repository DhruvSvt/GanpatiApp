<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keyword = request()->keyword;
        $rows = request()->rows ?? 25;

        if ($rows == 'all') {
            $rows = Category::count();
        }

        // Get the table columns
        $allColumns = Schema::getColumnListing((new Category())->getTable());


        $items = Category::select('*')->when(isset($keyword), function ($query) use ($keyword, $allColumns) {
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
        $title = 'View Categories';
        return view('admin.category.index', compact('items', 'title'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $title = 'Category Create';
        $create = true;
        return view('admin.category.create', compact('title', 'create'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'image' => 'required',
        ]);


        $user = new Category();
        if ($request->file('image')) {
            $extension = $request->file('image')->getClientOriginalExtension();
            if ($extension == 'png' || $extension == 'jpg' || $extension == 'jpeg') {
                $image = $request->file('image');
                $path = $image->store('web', 'public');
                $user->image  = $path;
            }
        }
        $user->name = $request->name;
        $user->slug = str::slug($request->name, '-');
        $user->save();

        return redirect()->route('categories.index')->with('message', 'Category Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    public function status(Request $request)
    {
        $user = Category::findOrFail($request->user_id);
        $user->status = $request->status;
        $user->save();

        return redirect()->back();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $member = Category::findOrFail($id);
        $title = 'Category Edit';
        $edit = true;
        return view('admin.category.create', compact('member', 'edit', 'title'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = Category::findOrFail($id);
        $request->validate([
            'name' => 'required'
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

        $user->save();
        return redirect()->route('categories.index')->with('message', 'category Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
