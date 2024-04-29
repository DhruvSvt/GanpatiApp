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
        $rid = auth()->user()->role_id;
        $uid = auth()->user()->id;

        $sale = Society::select(DB::raw('SUM(value) As sale') , DB::raw('COUNT(id) As nsale'))
        ->where('status', 1)->when($rid == 2, function ($query) use ($uid) {
                $query->where('societies.tl', $uid);
            })->when($rid == 3, function ($query) use ($uid) {
                $query->where('societies.agent', $uid);
            })->when($rid == 5, function ($query) use ($uid) {
                $query->where('societies.director', $uid);
            })->first();
        $renew = Renewal::select(DB::raw('SUM(amount) As renewal'), DB::raw('COUNT(renewals.id) As nrenewal'))->join('societies', 'societies.id', '=', 'renewals.policy')->when($rid == 2, function ($query) use ($uid) {
            $query->where('societies.tl', $uid);
        })->when($rid == 3, function ($query) use ($uid) {
            $query->where('societies.agent', $uid);
        })->when($rid == 5, function ($query) use ($uid) {
            $query->where('societies.director', $uid);
        })->first();
        $comm = Commission::select(DB::raw('SUM(amount) As commision'), DB::raw('COUNT(id) As ncommision'))->when($rid != 1, function ($query) use ($uid) {
            $query->where('commissions.user', $uid);
        })->first();

        return view('admin.index', compact('sale', 'renew', 'comm'));

    }
}
