<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Society;
use App\Models\Renewal;
use App\Models\Commission;
use App\Models\User;
Use DB;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function index()
    {
        $sale = Society::select(DB::raw('SUM(value) As sale') , DB::raw('COUNT(id) As nsale'))
        ->where('status', 1)->first();
        $renew = Renewal::select(DB::raw('SUM(amount) As renewal'), DB::raw('COUNT(id) As nrenewal'))->first();
        $comm = Commission::select(DB::raw('SUM(amount) As commision'), DB::raw('COUNT(id) As ncommision'))->first();

        return view('admin.index', compact('sale', 'renew', 'comm'));

    }
}
