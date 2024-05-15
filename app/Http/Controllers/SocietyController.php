<?php

namespace App\Http\Controllers;

use App\Models\Society;
use App\Models\User;
use App\Models\Resident;
use App\Models\Commission;
use App\Models\Renewal;
use App\Models\Member;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Redirect;

class SocietyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


        $keyword = request()->keyword;
        $rows = request()->rows ?? 25;

        if ($rows == 'all') {
            $rows = Society::where('status',  0)->count();
        }

        // Get the table columns
        $allColumns = Schema::getColumnListing((new Society())->getTable());


        $items = Society::select('societies.value', 'societies.agent', 'societies.tl', 'societies.director', 'societies.id','societies.exp_date','societies.start_date','societies.mobile','societies.proposer','residents.name as policy','a.name as agentname', 't.name as tlname', 'd.name as directorname', 'a.user_id as auser_id', 't.user_id as tuser_id', 'd.user_id as duser_id')->join('residents', 'residents.id', '=', 'societies.policy_type')->leftJoin('users as a', 'a.id', '=', 'societies.agent')->leftJoin('users as d', 'd.id', '=', 'societies.director')->leftJoin('users as t', 't.id', '=', 'societies.tl')
        ->where('societies.status',  0)->groupBy('societies.id')->when(isset($keyword), function ($query) use ($keyword, $allColumns) {
            $query->where(function ($query) use ($keyword, $allColumns) {
                // Dynamically construct the search query
                foreach ($allColumns as $column) {
                    $query->orWhere(
                        'societies.' . $column,
                        'LIKE',
                        "%$keyword%"
                    );
                }
                $query->orWhere('a.name','LIKE',"%$keyword%");
                $query->orWhere('t.name', 'LIKE', "%$keyword%");
                $query->orWhere('d.name', 'LIKE', "%$keyword%");
            });
        })
            ->orderBy('societies.id', 'DESC')
            ->paginate($rows);
        $title = ' Not Approved Policies';
        return view('admin.society.index', compact('items', 'title'));


    }
    public function list()
    {
        $rid = auth()->user()->role_id;
        $uid = auth()->user()->id;
        $keyword = request()->keyword;
        $rows = request()->rows ?? 25;

        if ($rows == 'all') {
            $rows = Society::where('status',  1)->count();
        }

        // Get the table columns
        $allColumns = Schema::getColumnListing((new Society())->getTable());


        $items = Society::select('societies.value', 'societies.agent', 'societies.tl', 'societies.director', 'societies.id', 'societies.exp_date', 'societies.start_date', 'societies.mobile', 'societies.proposer', 'residents.name as policy', 'a.name as agentname', 't.name as tlname', 'd.name as directorname', 'a.user_id as auser_id', 't.user_id as tuser_id', 'd.user_id as duser_id')->join('residents', 'residents.id', '=', 'societies.policy_type')->leftJoin('users as a', 'a.id', '=', 'societies.agent')->leftJoin('users as d', 'd.id', '=', 'societies.director')->leftJoin('users as t', 't.id', '=', 'societies.tl')
        ->where('societies.status',  1)->groupBy('societies.id')->when(isset($keyword), function ($query) use ($keyword, $allColumns) {
            $query->where(function ($query) use ($keyword, $allColumns) {
                // Dynamically construct the search query
                foreach ($allColumns as $column) {
                    $query->orWhere(
                        'societies.' . $column,
                        'LIKE',
                        "%$keyword%"
                    );
                }
                $query->orWhere('a.name', 'LIKE', "%$keyword%");
                $query->orWhere('t.name', 'LIKE', "%$keyword%");
                $query->orWhere('d.name', 'LIKE', "%$keyword%");
            });
        })->when($rid == 2, function ($query) use ($uid) {
            $query->where('societies.tl', $uid);
        })->when($rid == 3, function ($query) use ($uid) {
            $query->where('societies.agent', $uid);
        })->when($rid == 5, function ($query) use ($uid) {
            $query->where('societies.director', $uid);
        })
            ->orderBy('societies.id', 'DESC')
            ->paginate($rows);
        $title = 'All Approved Policies';
        return view('admin.society.list', compact('items', 'title'));
    }
    public function renewList()
    {

        $rid = auth()->user()->role_id;
        $uid = auth()->user()->id;

        $keyword = request()->keyword;
        $rows = request()->rows ?? 25;

        if ($rows == 'all') {
            $rows = Society::where('exp_date', '<=', \DB::raw('NOW()'))->count();
        }

        // Get the table columns
        $allColumns = Schema::getColumnListing((new Society())->getTable());


        $items = Society::select('societies.value', 'societies.agent', 'societies.tl', 'societies.director', 'societies.id', 'societies.exp_date', 'societies.start_date', 'societies.mobile', 'societies.proposer', 'residents.name as policy', 'a.name as agentname', 't.name as tlname', 'd.name as directorname', 'a.user_id as auser_id', 't.user_id as tuser_id', 'd.user_id as duser_id')->join('residents', 'residents.id', '=', 'societies.policy_type')->leftJoin('users as a', 'a.id', '=', 'societies.agent')->leftJoin('users as d', 'd.id', '=', 'societies.director')->leftJoin('users as t', 't.id', '=', 'societies.tl')
            ->where('exp_date', '<=', \DB::raw('NOW()'))->groupBy('societies.id')->when(isset($keyword), function ($query) use ($keyword, $allColumns) {
            $query->where(function ($query) use ($keyword, $allColumns) {
                // Dynamically construct the search query
                foreach ($allColumns as $column) {
                    $query->orWhere(
                        'societies.' . $column,
                        'LIKE',
                        "%$keyword%"
                    );
                }
                $query->orWhere('a.name', 'LIKE', "%$keyword%");
                $query->orWhere('t.name', 'LIKE', "%$keyword%");
                $query->orWhere('d.name', 'LIKE', "%$keyword%");
            });
        })->when($rid == 2, function ($query) use ($uid) {
            $query->where('societies.tl', $uid);
        })->when($rid == 3, function ($query) use ($uid) {
            $query->where('societies.agent', $uid);
        })->when($rid == 5, function ($query) use ($uid) {
            $query->where('societies.director', $uid);
        })
            ->orderBy('societies.id', 'DESC')
            ->paginate($rows);
        $title = 'Expired Policies';
        return view('admin.society.renew', compact('items', 'title'));
    }



    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        $agents = User::where(['role_id'=> 3, 'status' => 1])->orderBy('name', 'ASC')->get();
        $tl = User::where(['role_id' => 2, 'status' => 1])->orderBy('name', 'ASC')->get();
        $dr = User::where(['role_id' => 5, 'status' => 1])->orderBy('name', 'ASC')->get();

        $residents = Resident::where(['status' => 1])->orderBy('name', 'ASC')->get();
        $create = true;
        $title = 'Policy Create';
        return view('admin.society.create', compact('create','residents', 'title','agents', 'tl', 'dr'));
    }

    public function societyApprove($id)
    {
        $society = Society::findOrFail($id);
        $title = 'Approve Policies';
        return view('admin.society.approve', compact('society', 'title'));
    }
    public function societyApproveAction(Request $request, $id)
    {
        $society = Society::findOrFail($id);
        $agent = $society->agent;
        $tl = $society->tl;
        $director = $society->director;
        if($agent!=''){
            $amnt = round(($request->agent* $society->value)/100);
            $tdc =  round(($amnt*5)/100);
            $Final_amnt = $amnt - $tdc;
            $user = new Commission();
            $user->user = $agent;
            $user->policy = $id;
            $user->per = $request->agent;
            $user->amount = $amnt;
            $user->TDS = $tdc;
            $user->Final_amnt = $Final_amnt;
            $user->type = 'NEW';
            $user->save();
        }
        if ($tl != '') {
            $amnt = round(($request->tl * $society->value) / 100);
            $tdc =  round(($amnt * 5) / 100);
            $Final_amnt = $amnt - $tdc;
            $user = new Commission();
            $user->user = $tl;
            $user->policy = $id;
            $user->per = $request->tl;
            $user->amount = $amnt;
            $user->TDS = $tdc;
            $user->Final_amnt = $Final_amnt;
            $user->type = 'NEW';
            $user->save();
        }
        if ($director != '') {
            $amnt = round(($request->director * $society->value) / 100);
            $tdc =  round(($amnt * 5) / 100);
            $Final_amnt = $amnt - $tdc;
            $user = new Commission();
            $user->user = $director;
            $user->per = $request->director;
            $user->policy = $id;
            $user->amount = $amnt;
            $user->TDS = $tdc;
            $user->Final_amnt = $Final_amnt;
            $user->type = 'NEW';
            $user->save();
        }

        $society->status = 1;
        $society->save();
        return redirect()->route('society.index')->with('message', 'Policy Approved successfully!');
    }

    public function renewView($id)
    {
        $society = Society::findOrFail($id);
        $title = 'Renew Policies';
        return view('admin.society.renewView', compact('society', 'title'));
    }
    public function renewAction(Request $request, $id)
    {
        $society = Society::findOrFail($id);
        $agent = $society->agent;
        $tl = $society->tl;
        $director = $society->director;
        if ($agent != '') {
            $amnt = round(($request->agent * $request->amount) / 100);
            $tdc =  round(($amnt * 5) / 100);
            $Final_amnt = $amnt - $tdc;
            $user = new Commission();
            $user->user = $agent;
            $user->policy = $id;
            $user->amount = $amnt;
            $user->TDS = $tdc;
            $user->Final_amnt = $Final_amnt;
            $user->type = 'RENEW';
            $user->save();
        }
        if ($tl != '') {
            $amnt = round(($request->tl * $request->amount) / 100);
            $tdc =  round(($amnt * 5) / 100);
            $Final_amnt = $amnt - $tdc;
            $user = new Commission();
            $user->user = $tl;
            $user->policy = $id;
            $user->amount = $amnt;
            $user->TDS = $tdc;
            $user->Final_amnt = $Final_amnt;
            $user->type = 'RENEW';
            $user->save();
        }
        if ($director != '') {
            $amnt = round(($request->director * $request->amount) / 100);
            $tdc =  round(($amnt * 5) / 100);
            $Final_amnt = $amnt - $tdc;
            $user = new Commission();
            $user->user = $director;
            $user->policy = $id;
            $user->amount = $amnt;
            $user->TDS = $tdc;
            $user->Final_amnt = $Final_amnt;
            $user->type = 'RENEW';
            $user->save();
        }
        $society->exp_date = $request->exp_date;
        $society->save();

        $user = new Renewal();
        $user->policy = $id;
        $user->amount = $request->amount;
        $user->save();
        return redirect()->route('society.renewe')->with('message', 'Policy Renewed successfully!');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
       try {

        $user = new Society();

        $user->policy_type = $request->policy_type;
        $user->agent = $request->agent;
        $user->tl = $request->tl;
        $user->director = $request->director;
        $user->value = $request->value;
        $user->exp_date = $request->exp_date;
        $user->start_date = $request->start_date;
        $user->vehicle_no = $request->vehicle_no;
        $user->proposer = $request->proposer;
        $user->address = $request->address;
        $user->dob = $request->dob;
        $user->ocupation = $request->ocupation;
        $user->gender = $request->gender;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->annual_income = $request->annual_income;
        $user->sum_insured = $request->sum_insured;
        $user->last_c_name = $request->last_c_name;
        $user->last_expiry = $request->last_expiry;
        $user->status = 0;




         if($request->file('last_copy'))
        {
            $extension = $request->file('last_copy')->getClientOriginalExtension();
              if($extension=='png' || $extension=='jpg' || $extension == 'jpeg' || $extension == 'pdf'){
             $image = $request->file('last_copy');
             $path = $image->store('files', 'public');
             $user->last_copy  = $path;
              }
        }
        $test = array();
         if($request->hasFile('docs')) {
            $files = $request->file('docs');

            foreach ($files as $key => $file) {
                $extension = $file->getClientOriginalExtension();
              if($extension=='png' || $extension=='jpg' || $extension == 'jpeg' || $extension == 'pdf'){
                     $path = $file->store('files', 'public');
                    $test[$key] = $path;
                }
            }

        }
        $test = implode(",",$test);
        $user->docs = $test;

        $user->save();
        $policyID = $user->id;
        $f_name = $request->input('f_name');

   for($count = 0; $count < collect($f_name)->count(); $count++)
{
    $data = array(
            'f_name' => $request->f_name[$count],
            'f_dob'  => $request->f_dob[$count],
            'f_ht'  => $request->f_ht[$count],
            'f_ocuppation'  => $request->f_ocuppation[$count],
            'f_relation'  => $request->f_relation[$count],
            'f_nominee'  => $request->f_nominee[$count],
            'f_nomineeDOB'  => $request->f_nomineeDOB[$count],
            'f_diabetes'  => $request->f_diabetes[$count],
            'f_bp'  => $request->f_bp[$count],
            'f_predisease'  => $request->f_predisease[$count],
            'policyID' => $policyID
          );
            Member::insert($data);
        }
            return redirect()->route('society.list')->with('message', 'Policy added successfully!');

        } catch (\Exception $e) {
            dd($e->getMessage());
               Session::flash('error', 'Task successfully added!');
               return redirect()->route('society.create');

            //return redirect()->route('society.create')->with('message', 'Data Updated Successfully');
            //  Session::flash('message', "Special message goes here");
            //  return redirect()->back()->with('success', 'your message,here');
            // $em = $e->getMessage();
            // return Redirect::back()->withErrors(['msg' => $em]);
            // return back()->with('error', $em);
      }
    }

    /**
     * Display the specified resource.
     */
    public function show(Society $society)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {

        $society = Society::findOrFail($id);
        $title = 'Policy Edit';
        $edit = true;
        $residents = Resident::where(['status' => 1])->orderBy('name', 'ASC')->get();

        $members = Member::where('policyID', $id)->get();

        return view('admin.society.create', compact('edit', 'title', 'society', 'residents', 'members'));
    }
    public function view($id)
    {
        $society = Society::findOrFail($id);
        $societies = Society::select('societies.*', 'residents.name as policy', 'a.name as agentname', 't.name as tlname', 'd.name as directorname', 'members.*', 'a.user_id as auser_id', 't.user_id as tuser_id', 'd.user_id as duser_id')->Join('members', 'members.policyID', 'societies.id')->join('residents', 'residents.id', '=', 'societies.policy_type')->leftJoin('users as a', 'a.id', '=', 'societies.agent')->leftJoin('users as d', 'd.id', '=', 'societies.director')->leftJoin('users as t', 't.user_id', '=', 't.tl')->where('societies.id', $id)->get();
        $renew = Renewal::where('policy', $id)->get();
        $comm = Commission::select('commissions.*', 'users.name', 'users.user_id')->Join('users', 'users.id', 'commissions.user')->where('commissions.policy', $id)->get();
        $title = 'Policy View';
       return view('admin.society.view', compact('societies', 'title', 'renew', 'comm'));
    }



    public function viewPolicy($id)
    {

        $societies = Society::select('*')->where('id', $id)->first();
        return view('admin.society.view', compact('societies'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $user = Society::findOrFail($id);


        if($user->status != 0){
        if($user->agent!= null){
            $rows = Commission::where('policy',  $id)->where('user',  $user->agent)->first();
            $per = $rows->per;
            $cid = $rows->id;
            $amnt = round(($per* $request->value)/100);
            $tdc =  round(($amnt*5)/100);
            $Final_amnt = $amnt - $tdc;

            Commission::where('id', $cid)
            ->update(['amount' => $amnt,'TDS' => $tdc,'Final_amnt' => $Final_amnt]);
        }
        if ($user->tl != null) {
            $rows = Commission::where('policy',  $id)->where('user',  $user->tl)->first();
            $per = $rows->per;
            $cid = $rows->id;
            $amnt = round(($per * $request->value) / 100);
            $tdc =  round(($amnt * 5) / 100);
            $Final_amnt = $amnt - $tdc;

            Commission::where('id', $cid)
            ->update(['amount' => $amnt, 'TDS' => $tdc, 'Final_amnt' => $Final_amnt]);
        }
        if ($user->director != null) {
            $rows = Commission::where('policy',  $id)->where('user',  $user->director)->first();
            $per = $rows->per;
            $cid = $rows->id;
            $amnt = round(($per * $request->value) / 100);
            $tdc =  round(($amnt * 5) / 100);
            $Final_amnt = $amnt - $tdc;

            Commission::where('id', $cid)
            ->update(['amount' => $amnt, 'TDS' => $tdc, 'Final_amnt' => $Final_amnt]);
        }
        }

        $user->policy_type = $request->policy_type;
        $user->value = $request->value;
        $user->exp_date = $request->exp_date;
        $user->start_date = $request->start_date;
        $user->vehicle_no = $request->vehicle_no;
        $user->proposer = $request->proposer;
        $user->address = $request->address;
        $user->dob = $request->dob;
        $user->ocupation = $request->ocupation;
        $user->gender = $request->gender;
        $user->mobile = $request->mobile;
        $user->email = $request->email;
        $user->annual_income = $request->annual_income;
        $user->sum_insured = $request->sum_insured;
        $user->save();

        $f_name = $request->input('f_name');
        Member::where('policyID', $id)->delete();
        for ($count = 0; $count < collect($f_name)->count(); $count++) {
            $data = array(
                'f_name' => $request->f_name[$count],
                'f_dob'  => $request->f_dob[$count],
                'f_ht'  => $request->f_ht[$count],
                'f_ocuppation'  => $request->f_ocuppation[$count],
                'f_relation'  => $request->f_relation[$count],
                'f_nominee'  => $request->f_nominee[$count],
                'f_nomineeDOB'  => $request->f_nomineeDOB[$count],
                'f_diabetes'  => $request->f_diabetes[$count],
                'f_bp'  => $request->f_bp[$count],
                'f_predisease'  => $request->f_predisease[$count],
                'policyID' => $id
            );
            Member::insert($data);
        }


        return redirect()->back()->with('message', 'Data Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $society = Society::findOrFail($id);
        $society->delete();
        Member::where('policyID',$id)->delete();
        return redirect()->route('society.index')->with('message', 'Data Deleted Successfully');
    }

    public function status(Request $request)
    {
        $society = Society::findOrFail($request->societyId);
        $society->status = $request->status;
        $society->save();

        return redirect()->back();
    }
}
