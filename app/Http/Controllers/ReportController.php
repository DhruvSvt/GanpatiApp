<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Models\Society;
use App\Models\Renewal;
use App\Models\Commission;
use App\Models\User;
use DB;

class ReportController extends Controller
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

    public function sale(Request $request)
    {
        if ($request->ajax()) {
            $fd = $request->from_date;
            $td = $request->to_date;
            $rid = auth()->user()->role_id;
            $uid = auth()->user()->id;


            $data = Society::select('societies.id', 'value', 'exp_date', 'proposer', 'residents.name as policy', DB::raw("DATE_FORMAT(exp_date, '%d-%M-%Y') as exp_date"), DB::raw("DATE_FORMAT(start_date, '%d-%M-%Y') as start_date"), 'a.user_id as auser_id', 't.user_id as tuser_id', 'd.user_id as duser_id')->join('residents', 'residents.id', '=', 'societies.policy_type')->leftJoin('users as a', 'a.id', '=', 'societies.agent')->leftJoin('users as d', 'd.id', '=', 'societies.director')->leftJoin('users as t', 't.id', '=', 'societies.tl')->when(!empty($request->from_date), function ($query) use ($fd, $td) {
                $query->whereBetween('start_date', array($fd, $td));
            })->when($rid == 2, function ($query) use ($uid) {
                $query->where('societies.tl', $uid);
            })->when($rid == 3, function ($query) use ($uid) {
                $query->where('societies.agent', $uid);
            })->when($rid == 5, function ($query) use ($uid) {
                $query->where('societies.director', $uid);
            });


            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($row) {
                    $actionBtn = '<a target="_blank" href="' . route("society.view", $row->id) . '" class="btn btn-primary w-100 btn-sm ">View Policy</a>';
                    return $actionBtn;
                })
                ->editColumn('value', function ($row) {
                    return  '₹' . $row->value;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.report.sale');
    }

    public function renewal(Request $request)
    {
        if ($request->ajax()) {

            $fd = $request->from_date;
            $td = $request->to_date;
            $rid = auth()->user()->role_id;
            $uid = auth()->user()->id;


            $data = Society::select('societies.id', 'amount',  'exp_date', 'proposer', 'residents.name as policy', DB::raw("DATE_FORMAT(exp_date, '%d-%M-%Y') as exp_date"), DB::raw("DATE_FORMAT(start_date, '%d-%M-%Y') as start_date"), 'a.user_id as auser_id', 't.user_id as tuser_id', 'd.user_id as duser_id')->join('residents', 'residents.id', '=', 'societies.policy_type')->join('renewals', 'renewals.policy', '=', 'societies.id')->leftJoin('users as a', 'a.id', '=', 'societies.agent')->leftJoin('users as d', 'd.id', '=', 'societies.director')->leftJoin('users as t', 't.id', '=', 'societies.tl')->when(!empty($request->from_date), function ($query) use ($fd, $td) {
                $query->whereBetween('societies.start_date', array($fd, $td));
            })->when($rid == 2, function ($query) use ($uid) {
                $query->where('societies.tl', $uid);
            })->when($rid == 3, function ($query) use ($uid) {
                $query->where('societies.agent', $uid);
            })->when($rid == 5, function ($query) use ($uid) {
                $query->where('societies.director', $uid);
            });

            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($row) {
                    $actionBtn = '<a target="_blank" href="' . route("society.view", $row->id) . '" class="btn btn-primary w-100 btn-sm ">View Policy</a>';
                    return $actionBtn;
                })
                ->editColumn('amount', function ($row) {
                    return  '₹' . $row->amount;
                })
                ->rawColumns(['action'])
                ->make(true);
        }

        return view('admin.report.renewal');
    }
    public function commission(Request $request)
    {
        if ($request->ajax()) {

            $fd = $request->from_date;
            $td = $request->to_date;
            $rid = auth()->user()->role_id;
            $uid = auth()->user()->id;

            $data = Commission::select('commissions.type', 'commissions.Final_amnt', 'commissions.TDS', 'commissions.policy', 'commissions.amount', 'residents.name as policytype', 'users.user_id as code', 'users.name as uname', 'users.PAN as PAN', 'display_name', 'societies.start_date', DB::raw("DATE_FORMAT(commissions.created_at, '%d-%M-%Y') as exp_date"))->join('societies', 'societies.id', '=', 'commissions.policy')->join('residents', 'residents.id', '=', 'societies.policy_type')->join('users', 'users.id', '=', 'commissions.user')->join('roles', 'roles.id', '=', 'users.role_id')->when(!empty($request->from_date), function ($query) use ($fd, $td) {
                $query->whereBetween('societies.start_date', array($fd, $td));
            })->when($rid != 1, function ($query) use ($uid) {
                $query->where('commissions.user', $uid);
            });


            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($row) {
                    $actionBtn = '<a target="_blank" href="' . route("society.view", $row->policy) . '" class="btn btn-primary w-100 btn-sm ">View Policy</a>';
                    return $actionBtn;
                })
                ->editColumn('amount', function ($row) {
                    return  '₹' . $row->amount;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.report.commission');
    }
}
