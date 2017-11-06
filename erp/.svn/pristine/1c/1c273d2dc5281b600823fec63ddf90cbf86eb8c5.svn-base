<?php

namespace App\Http\Controllers\admin;

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
        
        return view("admin.withdraw.partialWithdraw");
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
     
       /* $member_data = memberregistration::where('code', $request->member_code)->first();
        $tcn_data = tcnrequest::where('userId', $member_data->userId)->get();
        return view("admin.withdraw.partialWithdraw", compact('tcn_data','member_data'));*/
        $code=$request->member_code;

        $tcn_data=DB::table('memberregistrations')->where('memberregistrations.code','=',$code)
        ->join('tcnrequests', 'memberregistrations.userId', '=','tcnrequests.userId')->where('tcnrequests.status','=','Approved')
        ->join('tcnmasters', 'tcnrequests.tcn_id', '=','tcnmasters.id')

        ->select('memberregistrations.code','memberregistrations.name','memberregistrations.dob','memberregistrations.guardian','memberregistrations.maritalStatus','tcnmasters.tcnType','tcnrequests.unit','tcnrequests.amount','tcnrequests.currencyType','tcnrequests.approvalDate','tcnrequests.id')

        ->get();
        $count=count($tcn_data);
        if($tcn_data->isEmpty()){
        Session::flash('message', 'Member code does not exist!'); 
        return view("admin.withdraw.partialWithdraw");
        }
        else
        foreach($tcn_data as $datas)

        $tcnId=$datas->id;

        $TCNunit=$datas->unit;

        $withdrawal = withdrawalrequest::where('tcnId','=',$tcnId)->where('status','=','Applied')->count();
        
        if($withdrawal==0)
        {
            $withdUnit = withdrawalrequest::where('tcnId','=',$tcnId)->where('status','=','Paid')->sum('unit');    
            $unit=$TCNunit-$withdUnit;
            if($TCNunit>$withdUnit)
            {
            return view("admin.withdraw.partialWithdraw", compact('datas','unit','count'));
            }
            else
            {
            Session::flash('message', 'No balance Unit.. !');
            return view("admin.withdraw.partialWithdraw");
            }

        }
        else
        {

        Session::flash('message', 'Already One  WithDrawal Request is Pending.. !');  
        return view("admin.withdraw.partialWithdraw");

        }  


        // foreach($withdrawal as $withdrawals)
        // $type=$withdrawals->type;

        // if($type=="Normal Withdrawal")
        // {
        // Session::flash('message', 'This Member is already applied Normal Withdrawal!'); 
        // }  

        // if($type=="Partial Withdrawal"){
        // $row=\DB::table('withdrawalrequests')->where('tcnId','=',$tcnId)->where('status','=','Paid')
        // ->select( DB::raw('sum(unit) as total'))
        // ->get();
        // foreach($row as $rows)
        // $wunit=$rows->total;
        // $units=$unit-$wunit;
        // }
        // if(count($units==0)){
        //       Session::flash('message', 'This Member have no balance Amount!');  
        // }


        // return view("admin.withdraw.partialWithdraw", compact('tcn_data','member_data'));
         
           
       
            
    
}

    public function withdraw(Request $request)
    {  
      
       $withdraw = new withdrawalrequest();
       $withdraw->userId= $request->user_id;
       $withdraw->tcnId=$request->tcnid;
       $withdraw->unit = $request->withdrawal_unit;
       $withdraw->amount= $request->withdrawal_amount;
       $withdraw->appliedDate  = date("Y-m-d",strtotime($request->applied_date));
       $withdraw->type= 'Partial Withdrawal';
       $withdraw->status= 'Applied';
       Session::flash('message', 'Withdrawal Applied Successfully!');
       $withdraw->save();
       return view("admin.withdraw.partialWithdraw");

    }


    public function test()
    { 

       $view=withdrawalrequest::join('memberregistrations', 'withdrawalrequests.userId', '=','memberregistrations.userId')
        ->join('tcnrequests', 'withdrawalrequests.tcnId', '=','tcnrequests.id')
        ->join('tcnmasters', 'tcnmasters.id', '=','tcnrequests.tcn_id')
        ->where('withdrawalrequests.status','Applied')->where('withdrawalrequests.type','Partial Withdrawal')
        ->select('memberregistrations.name','tcnmasters.tcnType','withdrawalrequests.unit','withdrawalrequests.amount','withdrawalrequests.appliedDate','withdrawalrequests.id')
        ->get();
    

        return view("admin.withdraw.partialWithdrawview",compact('view'));
        
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
    return view("admin.withdraw.partialWithdrawdetail",compact('datas','balanceunit','balanceamount'));

    }

    public function view($id)
    {
    
         $data=DB::table('withdrawalrequests')->where('withdrawalrequests.id','=',$id)
        ->join('memberregistrations','memberregistrations.userId','=','withdrawalrequests.userId')
        ->join('addresses','memberregistrations.userId','=','addresses.userId')->where('addresses.typeOfAddress','=','permanent')
        ->join('tcnrequests','withdrawalrequests.tcnId','=','tcnrequests.id')
        ->join('tcnmasters','tcnrequests.tcn_id','=','tcnmasters.id')
        ->join('banks','tcnrequests.benefitId','=','banks.id')->where('banks.typeOfAccount','=','TCN Benefit')
        ->select('memberregistrations.code','memberregistrations.name','addresses.address','memberregistrations.mobileNo','tcnmasters.tcnType','tcnrequests.approvalDate','tcnrequests.amount','tcnrequests.currencyType','withdrawalrequests.appliedDate','banks.accountHolderName','banks.bankName','banks.branchName','banks.accountNumber','banks.ifsc','withdrawalrequests.id')
        ->get();

        foreach ($data as $datas)

     $value=DB::table('withdrawalrequests')->where('withdrawalrequests.id','=',$id)->get();
        foreach ($value as $values)

        return view("admin.withdraw.partialWithdrawalcheck",compact('datas','values'));

     
    }
    public function action(Request $request)
    {
        $approveId=Auth::guard('admin')->user()->id;
        $approveBy=Auth::guard('admin')->user()->username;

        $id=$request->withdraw_id;
        $view= withdrawalrequest::find($id);
        $withtcnid=$view->tcnId;
        $withamount=$view->amount;


        $detail= tcnrequest::find($withtcnid);
        $tcnamount=$detail->amount;
        $amount=$tcnamount-$withamount;

        if(isset($request->approve))
        {
      
        $withdraw = withdrawalrequest::find($id);          
        $withdraw->formReceivedBy=$request->received_by;
        $withdraw->currencyType= $request->currency;
        $withdraw->paymentMadeBy=$request->payment;
        $withdraw->approvalId= $approveId;
        $withdraw->approvalby= $approveBy;
        $withdraw->approvalDate= date('Y-m-d H:i:s');


        $withdraw->WithDrawPayedDate=date("Y-m-d",strtotime($request->payed_date));
        $withdraw->online= $request->online;
        $withdraw->chequeNo=$request->check_no;
        $withdraw->bank= $request->bank;
        $withdraw->remarks=$request->remarks;
        $withdraw->status='Paid';
        $withdraw->save();

       /* $tcn = tcnrequest::find($withtcnid);          
        $tcn->amount= $tcnamount-$withamount;
        $tcn->withDrawStatus='Paid';
        $tcn->withDrawId=$id;
        $tcn->save();*/
        Session::flash('message', 'Partial Withdrawal Request is Approved!'); 
        return redirect('admin/partialWithdraw/view');
        }
        
       /* if(isset($request->deny))
        {
        $withdraw = withdrawalrequest::find($id);   
        $withdraw->approvalId= $approveId;
        $withdraw->approvalby= $approveBy;
        $withdraw->approvalDate= date('Y-m-d H:i:s'); 
        $withdraw->status='3';
        $withdraw->save();

        $tcn = tcnrequest::find($withtcnid);          
        $tcn->withDrawStatus='4';
        $tcn->withDrawId=$id;
        $tcn->save();
        return redirect('admin/partialWithdraw/view');
        }*/

    }

    public function deny(Request $request)
    {
        $id=$request->id;
        $withdraw = withdrawalrequest::find($request->id);   
        $withdraw->approvalId= $approveId;
        $withdraw->approvalby= $approveBy;
        $withdraw->approvalDate= date('Y-m-d H:i:s A'); 
        $withdraw->status='Cancel';
        $withdraw->save();
        if($withdraw->save()){
            return response()->json(['result'=>true,'message'=>'success']);
        }
   

    }

    public function viewapprove()
    {
        $approve=DB::table('withdrawalrequests')->where('withdrawalrequests.status','=','Paid')->where('withdrawalrequests.type','=','Partial Withdrawal')
        ->join('memberregistrations','memberregistrations.userId','=','withdrawalrequests.userId')
        ->join('tcnrequests','withdrawalrequests.tcnId','=','tcnrequests.id')
        ->join('tcnmasters','tcnrequests.tcn_id','=','tcnmasters.id')
        ->select('memberregistrations.name','tcnmasters.tcnType','withdrawalrequests.unit','withdrawalrequests.amount','withdrawalrequests.appliedDate','withdrawalrequests.approvalDate')
        ->get();  
        
        return  view("admin.withdraw.partialWithdrawviewapprove",compact('approve'));
       
    }
    public function viewdeny()
    {
        $deny=DB::table('withdrawalrequests')->where('withdrawalrequests.status','=','Cancel')->where('withdrawalrequests.type','=','Partial Withdrawal')
        ->join('memberregistrations','memberregistrations.userId','=','withdrawalrequests.userId')
        ->join('tcnrequests','withdrawalrequests.tcnId','=','tcnrequests.id')
        ->join('tcnmasters','tcnrequests.tcn_id','=','tcnmasters.id')
        ->select('memberregistrations.name','tcnmasters.tcnType','withdrawalrequests.unit','withdrawalrequests.amount','withdrawalrequests.appliedDate')
        ->get();  
        
        return  view("admin.withdraw.partialWithdrawviewdeny",compact('deny'));
       
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
