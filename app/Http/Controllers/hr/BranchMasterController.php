<?php

namespace App\Http\Controllers\hr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\hr_company;
use App\hr_branch;
use App\log;
class BranchMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {



        $branch= hr_branch::whereNull('deleted_at')->get(); 
        $companybranch=hr_branch::join('hr_companies','hr_companies.id','=','hr_branch.company_id')
        ->select('hr_branch.*','hr_companies.company_name as Names')
        ->get();
        return view('hr.master.branch',compact('branch','companybranch'));
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        //
    }

    /**
     * Store a newly created resource in storage. 
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $branch=new hr_branch();
        $this->validate($request,[
            'companyId'=>'required', 
            'branch_name'=>'required|unique:hr_branch,branch_name,NULL,id,deleted_at,NULL'
        ]);

        $branch->branch_name=$request->branch_name;
        $branch->status=1;
        $branch->company_id=$request->companyId;
        $branch->address1=$request->address1;
        $branch->address2=$request->address2;
        $branch->mobileNo=$request->mobileNo;
        $branch->email=$request->email;
        $branch->city=$request->city;
        $branch->state=$request->state;
        $branch->countryId=$request->country;
        $branch->pinNo=$request->pinNo;
        $branch->save();
        
        $log = new log();
        $log->ip_address =  \Request::getClientIp(true);
        $log->user = session('userId');
        $log->actions = "Created branch-".$request->branch_name;
        $log->type ="Branch";
        $query = $log->save();

        return redirect('/hr/master/branch');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $editbranch = hr_branch::where('id',$id)
        ->first(); 
        $company=hr_branch::get();
        return view('hr.master.editBranch',compact('editbranch','company'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id 
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $branch = hr_branch::find($id);
        $branch->branch_name= $request->branch_name;
        $branch->company_id=$request->companyId;
        $branch->address1=$request->address1;
        $branch->address2=$request->address2;
        $branch->email=$request->email;
        $branch->mobileNo=$request->mobileNo;
        $branch->city=$request->city;
        $branch->state=$request->state;
        $branch->countryId=$request->country;
        $branch->pinNo=$request->pinNo;
        $branch->save();

        $log = new log();
        $log->ip_address =  \Request::getClientIp(true);
        $log->user = session('userId');
        $log->actions = "Edited branch-".$request->branch_name;
        $log->type ="Branch";
        $query = $log->save();

        return redirect('/hr/master/branch');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $branch=hr_branch::find($id);
        $branch->delete(); 

        $log = new log();
        $log->ip_address =  \Request::getClientIp(true);
        $log->user = session('userId');
        $log->actions = "Deleted branch-".$branch->branch_name;
        $log->type ="Branch";
        $query = $log->save();
    }
}
 