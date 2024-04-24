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
            if (!empty($request->from_date)) {
                $data = Society::select('societies.id', 'value', 'director', 'tl', 'agent', 'exp_date', 'proposer', 'residents.name as policy', DB::raw("DATE_FORMAT(exp_date, '%d-%M-%Y') as exp_date"), DB::raw("DATE_FORMAT(start_date, '%d-%M-%Y') as start_date"))->join('residents', 'residents.id', '=', 'societies.policy_type')->whereBetween('start_date', array($request->from_date, $request->to_date));

            } else {
                $data = Society::select('societies.id', 'value', 'director', 'tl', 'agent', 'exp_date', 'proposer', 'residents.name as policy', DB::raw("DATE_FORMAT(exp_date, '%d-%M-%Y') as exp_date"), DB::raw("DATE_FORMAT(start_date, '%d-%M-%Y') as start_date"))->join('residents', 'residents.id', '=', 'societies.policy_type');
            }
                return Datatables::of($data)
                ->addIndexColumn()

                 ->addColumn('action', function($row){
                    $actionBtn = '<a target="_blank" href="'.route("society.view", $row->id).'" class="btn btn-primary w-100 btn-sm ">View Policy</a>';
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
            if (!empty($request->from_date)) {
                $data = Society::select('societies.id', 'amount', 'director', 'tl', 'agent', 'exp_date', 'proposer', 'residents.name as policy', DB::raw("DATE_FORMAT(exp_date, '%d-%M-%Y') as exp_date"), DB::raw("DATE_FORMAT(start_date, '%d-%M-%Y') as start_date"))->join('residents', 'residents.id', '=', 'societies.policy_type')->join('renewals', 'renewals.policy', '=', 'societies.id')->whereBetween('start_date', array($request->from_date, $request->to_date));
            } else {
                $data = Society::select('societies.id', 'amount', 'director', 'tl', 'agent', 'exp_date', 'proposer', 'residents.name as policy', DB::raw("DATE_FORMAT(exp_date, '%d-%M-%Y') as exp_date"), DB::raw("DATE_FORMAT(start_date, '%d-%M-%Y') as start_date"))->join('residents', 'residents.id', '=', 'societies.policy_type')->join('renewals', 'renewals.policy', '=', 'societies.id');
            }
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
            if (!empty($request->from_date)) {
                $data = Commission::select('commissions.type', 'commissions.policy', 'commissions.amount', 'residents.name as policytype', 'users.id as code', 'users.name as uname', 'display_name', DB::raw("DATE_FORMAT(commissions.created_at, '%d-%M-%Y') as exp_date"))->join('societies', 'societies.id', '=', 'commissions.policy')->join('residents', 'residents.id', '=', 'societies.policy_type')->join('users', 'users.id', '=', 'commissions.user')->join('roles', 'roles.id', '=', 'users.role_id')->whereBetween('commissions.created_at', array($request->from_date, $request->to_date));
            } else {
                $data = Commission::select('commissions.type', 'commissions.policy', 'commissions.amount', 'residents.name as policytype', 'users.id as code','users.name as uname','display_name',DB::raw("DATE_FORMAT(commissions.created_at, '%d-%M-%Y') as exp_date"))->join('societies', 'societies.id', '=', 'commissions.policy')->join('residents', 'residents.id', '=', 'societies.policy_type')->join('users', 'users.id', '=', 'commissions.user')->join('roles', 'roles.id', '=', 'users.role_id');
            }
            return Datatables::of($data)
                ->addIndexColumn()

                ->addColumn('action', function ($row) {
                    $actionBtn = '<a target="_blank" href="' . route("society.view", $row->policy) . '" class="btn btn-primary w-100 btn-sm ">View Policy</a>';
                    return $actionBtn;
                })
                ->editColumn('amount', function ($row) {
                    return  '₹'.$row->amount;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('admin.report.commission');
    }
}
