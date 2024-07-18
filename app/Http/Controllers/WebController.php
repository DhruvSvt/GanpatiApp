<?php

namespace App\Http\Controllers;

use App\Models\Commission;
use App\Models\Category;
use App\Models\Insurance;
use App\Models\Enquiry;
use Illuminate\Http\Request;

class WebController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cat = Category::where(['status' => 1])->orderBy('id', 'DESC')->get();
        $title = 'Guruji IMF - Buy Insurance Plans – Health, Term, Life, Car, Bike, Investment';
        $desc = 'Buy insurance policies offered by various insurers in India. Get instant quotes & save huge on premiums | Guruji IMF.';

        return view('web.index', compact('cat', 'desc', 'title'));
    }
    public function policies(Request $request, $slug)
    {
        $cat = Category::where(['slug' => $slug])->first();
        $cid = $cat->id;
        $policies = Insurance::where(['status' => 1, 'cid' => $cid])->orderBy('id', 'DESC')->get();

        $title = 'Guruji IMF - ' . $cat->name;
        $desc = 'Buy ' . $cat->name . '@ Guruji IMF.';

        return view('web.policies', compact('cat', 'desc', 'title', 'policies'));
    }

    public function policy(Request $request, $slug)
    {
        $policies = Insurance::where(['slug' => $slug])->first();

        $title = $policies->name;
        $desc = $policies->sdescr;

        return view('web.policy', compact('desc', 'title', 'policies'));
    }

    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function about()
    {
        $title = 'Guruji IMF - About';
        return view('web.about', compact('title'));
    }
    public function contact()
    {
        $title = 'Guruji IMF - Contact';
        return view('web.contact', compact('title'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Commission $commission)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Commission $commission)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function enquiry(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required'
        ]);

        $user = new Enquiry();

        $user->name = $request->name;
        $user->dob = $request->dob;
        $user->phone = $request->phone;
        $user->gender = $request->gender;
        $user->ptype = $request->ptype;


        $user->save();

        return redirect()->back()->with('message', 'Enquiry Received Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Commission $commission)
    {
        //
    }
}
