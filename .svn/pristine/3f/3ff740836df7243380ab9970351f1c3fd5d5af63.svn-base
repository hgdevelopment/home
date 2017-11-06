<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\withdrawalrequest;
use App\memberregistration;
use App\tcnrequest;
use DB;
use Auth;
class partialWithdrawalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
        $code=Auth::guard('user')->user()->username; 

        $tcn_data=DB::table('memberregistrations')->where('memberregistrations.code','=',$code)
        ->join('tcnrequests', 'memberregistrations.userId', '=','tcnrequests.userId')->where('tcnrequests.status','=','Approved')
        ->join('tcnmasters', 'tcnrequests.tcn_id', '=','tcnmasters.id')

        ->select('memberregistrations.code','memberregistrations.name','memberregistrations.dob','memberregistrations.guardian','memberregistrations.maritalStatus','tcnmasters.tcnType','tcnrequests.unit','tcnrequests.amount','tcnrequests.currencyType','tcnrequests.approvalDate','tcnrequests.id','tcnrequests.tcnCode','tcnrequests.paymentReceivedDate','tcnmasters.lockingDuration')

        ->get();
      $count=count($tcn_data);

       /* if($tcn_data->isEmpty()){
        Session::flash('message', 'Member code does not exist!'); 
        return view("web.member.tcn.partialWithdraw");
        }
        else*/
        foreach($tcn_data as $datas)

        $tcnId=$datas->id;

        $TCNunit=$datas->unit;

        $withdrawal = withdrawalrequest::where('tcnId','=',$tcnId)->where('status','=','Applied')->count();
        
        if($withdrawal==0)
        {
            $withdUnit = withdrawalrequest::where('tcnId','=',$tcnId)->where('status','=','Paid')->sum('unit');    
                      
            if($TCNunit>$withdUnit)
            {
            return view("web.member.tcn.partialWithdraw", compact('tcn_data','count'));
            }
            else
            {
            Session::flash('message', 'No balance Unit.. !');
            return view("web.member.tcn.partialWithdraw");
            }

        }
        else
        {

        Session::flash('message', 'Already One  WithDrawal Request is Pending.. !');  
        return view("web.member.tcn.partialWithdraw");

        }  
 



       /* return view("web.member.tcn.partialWithdraw");*/
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
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function viewData(Request $request)
    {  
     
     
       /* $code=$request->member_code;

        $tcn_data=DB::table('memberregistrations')->where('memberregistrations.code','=',$code)
        ->join('tcnrequests', 'memberregistrations.userId', '=','tcnrequests.userId')->where('tcnrequests.status','=','Approved')
        ->join('tcnmasters', 'tcnrequests.tcn_id', '=','tcnmasters.id')

        ->select('memberregistrations.code','memberregistrations.name','memberregistrations.dob','memberregistrations.guardian','memberregistrations.maritalStatus','tcnmasters.tcnType','tcnrequests.unit','tcnrequests.amount','tcnrequests.currencyType','tcnrequests.approvalDate','tcnrequests.id','tcnrequests.tcnCode','tcnrequests.paymentReceivedDate','tcnmasters.lockingDuration')

        ->get();
      $count=count($tcn_data);

        if($tcn_data->isEmpty()){
        Session::flash('message', 'Member code does not exist!'); 
        return view("web.member.tcn.partialWithdraw");
        }
        else
        foreach($tcn_data as $datas)

        $tcnId=$datas->id;

        $TCNunit=$datas->unit;

        $withdrawal = withdrawalrequest::where('tcnId','=',$tcnId)->where('status','=','Applied')->count();
        
        if($withdrawal==0)
        {
            $withdUnit = withdrawalrequest::where('tcnId','=',$tcnId)->where('status','=','Paid')->sum('unit');    
                      
            if($TCNunit>$withdUnit)
            {
            return view("web.member.tcn.partialWithdraw", compact('tcn_data','count','datas'));
            }
            else
            {
            Session::flash('message', 'No balance Unit.. !');
            return view("web.member.tcn.partialWithdraw");
            }

        }
        else
        {

        Session::flash('message', 'Already One  WithDrawal Request is Pending.. !');  
        return view("web.member.tcn.partialWithdraw");

        }  */
 
}







    public function withdraw(Request $request)
    {  
       $appliedid=Auth::guard('user')->user()->id; 
       $withdraw = new withdrawalrequest();
       $withdraw->userId= $request->user_id;
       $withdraw->tcnId=$request->tcnid;
       $withdraw->unit = $request->withdrawal_unit;
       $withdraw->amount= $request->withdrawal_amount;
       $withdraw->appliedId= $appliedid;
       $withdraw->appliedDate  = date("Y-m-d");
       $withdraw->approvalId= $appliedid;
       $withdraw->approvalDate  = date("Y-m-d H:i:s");
       $withdraw->type= 'Partial Withdrawal';
       $withdraw->status= 'Applied';
       Session::flash('message', 'Withdrawal Applied Successfully!');
       $withdraw->save();
       return view("web.member.tcn.partialWithdraw");

    }


    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
       
    }


    public function show($id)
    {

  $data=DB::table('tcnrequests')->where('tcnrequests.id','=',$id)
       ->join('tcnmasters','tcnrequests.tcn_id','=','tcnmasters.id')
       ->join('memberregistrations','memberregistrations.userId','=','tcnrequests.userId')
       ->select('tcnmasters.tcnType','tcnrequests.unit','tcnrequests.amount','tcnrequests.id','tcnrequests.userId','tcnrequests.tcn_id')
       ->get();
    foreach($data as $datas)
    $tcnId=$datas->id;
    $TCNunit=$datas->unit;
    $TCNamount=$datas->amount;
    $row = DB::table('withdrawalrequests')->where('status','=','Paid')->where('tcnId',$tcnId)->get(
  array(
    'withdrawalrequests.id',
    DB::raw('SUM(withdrawalrequests.unit) as units'),
    DB::raw('SUM(withdrawalrequests.amount) as amount')
  )
);
    foreach ($row as $rows)
    $withdUnit= $rows->units;
    $withdAmount=$rows->amount;
    $count = withdrawalrequest::where('tcnId','=',$tcnId)->where('status','=','Paid')->count();

    if($count==0)
    {

    $balanceunit=$TCNunit;
    $balanceamount=$TCNamount;
    }else{

    $balanceunit=$TCNunit-$withdUnit;
    $balanceamount=$TCNamount-$withdAmount;
    }
    return view("web.member.tcn.partialWithdrawdetail",compact('datas','balanceunit','balanceamount'));

    }






    public function view($id)
    {
     
     
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
    }
    
}
