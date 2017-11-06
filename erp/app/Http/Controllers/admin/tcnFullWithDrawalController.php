<?php
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\tcnrequest;
use App\tcnmaster;
use App\bank;
use App\memberregistration;
use App\nominee;
use App\address;
use App\proofs;
use App\country;
use App\paymentdetails;
use App\withdrawalrequest;
use Auth;
use DB;
use Alert;
use Carbon;
use DataTables;
class tcnFullWithDrawalController extends Controller
{


  public function index()
  {

  return view('admin.withdraw.tcnWithDraw.fullWithDrawal'); 

  }





  public function show($id)
  {

    //*************************ALL TCN FULL WITHDRAWAL LIST PAGE***************************

    if($id=='List')
    {
    $tcntypes = tcnmaster::all();
    return view('admin.withdraw.tcnWithDraw.fullWithDrawalList',compact('tcntypes')); 
    }


    //************************* APPLIED TCN FULL WITHDRAWAL LIST PAGE***************************

    if($id=='Applied')
    {

    $Title='TCN Full WithDrawal Applied'; 

    $details = tcnrequest::join('memberregistrations AS mem','tcnrequests.userId','=','mem.userId')
    ->join('logins','logins.id','=','mem.userId')
    ->join('withdrawalrequests AS wd','wd.tcnId','=','tcnrequests.id')
    ->where('wd.status','Applied')
    ->where('wd.type','Normal Withdrawal')
    ->select('tcnrequests.id as tcnId','tcnrequests.*','mem.name as name','mem.code as code','wd.status as status','wd.id as withDrawId','wd.*')
    ->get();

    $count=count($details);
      return  view('admin.withdraw.tcnWithDraw.fullWithDrawalDetails',compact('Title','details','count'));
    }


    //************************* PAID TCN FULL WITHDRAWAL LIST PAGE***************************

    if($id=='Paid')
    {

    $Title='TCN Full WithDrawal Paid';  

    $details = tcnrequest::join('memberregistrations AS mem','tcnrequests.userId','=','mem.userId')
    ->join('withdrawalrequests AS wd','wd.tcnId','=','tcnrequests.id')
    ->where('wd.status','Paid')
    ->where('wd.type','Normal Withdrawal')
    ->select('tcnrequests.id as tcnId','tcnrequests.*','mem.name as name','mem.code as code','wd.status as status','wd.id as withDrawId','wd.*')
    ->get();

    $count=count($details);
      return  view('admin.withdraw.tcnWithDraw.fullWithDrawalDetails',compact('Title','details','count'));

    }


    //************************* CANCELLED TCN FULL WITHDRAWAL LIST PAGE***************************

    if($id=='Cancel')
    {

    $Title='TCN Full WithDrawal Cancel';  

    $details = tcnrequest::join('memberregistrations AS mem','tcnrequests.userId','=','mem.userId')
    ->join('withdrawalrequests AS wd','wd.tcnId','=','tcnrequests.id')
    ->where('wd.status','Cancel')
    ->where('wd.type','Normal Withdrawal')
    ->select('tcnrequests.id as tcnId','tcnrequests.*','mem.name as name','mem.code as code','wd.status as status','wd.id as withDrawId','wd.*')
    ->get();

    $count=count($details);
      return  view('admin.withdraw.tcnWithDraw.fullWithDrawalDetails',compact('Title','details','count'));

    }





    if(strpos($id, 'view') !== false)
    {
    $id=explode('@@@',$id);
    $view=true;
    $id= $id[1];
    }


    $withDraw = withdrawalrequest::all()->where('id',$id);
    foreach($withDraw as $withDraws);

    $tcnrequest = tcnrequest::all()->where('id',$withDraws->tcnId);
    foreach($tcnrequest as $tcnrequests);

    $bank = bank::all()->where('id',$tcnrequests->benefitId);
    foreach($bank as $banks);

    $memberregistration = memberregistration::all()->where('userId',$tcnrequests->userId);
    foreach($memberregistration as $members);

    $addres = address::all()->where('userId',$members->userId)->where('typeOfAddress','permanent');
    foreach($addres as $address);



    //************************* VIEWPAGE  TCN FULL WITHDRAWAL  DETAILs ***************************

    if($view===true)
    {
    return view('admin.withdraw.tcnWithDraw.fullWithDrawalView',compact('tcnrequests','banks','address','members','withDraws'));
    }


    if($withDraws->status=='Applied')
    {
    //************************* PAID ENTRY TCN FULL WITHDRAWAL PAGE***************************
    return view('admin.withdraw.tcnWithDraw.fullWithDrawalPaid',compact('tcnrequests','banks','address','members','withDraws'));
    }
    else
    {
    Alert::error('This WithDrawal Request Is already '.$withDraws->status.' ', 'Warning!');
    return redirect()->back();
    }
    return redirect()->back();
  }



 public function create(Request $request)
  {




    if(Auth::guard('admin')->check())
    $LogInId=Auth::guard('admin')->user()->id;
    else
    $LogInId=0;

    $date=date('Y-m-d');
    $dateTime =date('Y-m-d H:i:s');




    //*************************ALL TCN FULL WITHDRAWAL LIST PAGE***************************

    //*************************BASED ON FILTERED KEYS***************************


    if($request->process=='withDrawTcnList')
    {

     $fDate = $request->fDate.' 00:00:00';
     $tDate = $request->tDate.' 23:59:59';

     $fDate = Carbon::createFromFormat('d-m-Y H:i:s', $fDate)->toDateTimeString();
     $tDate = Carbon::createFromFormat('d-m-Y H:i:s', $tDate)->toDateTimeString();

      $details = tcnrequest::join('memberregistrations AS mem','tcnrequests.userId','=','mem.userId')->join('withdrawalrequests AS wd','wd.tcnId','=','tcnrequests.id');

      $details=$details->where('wd.type','Normal Withdrawal');

    if($request->btn=='btn1')
    {
      if($request->tcnType!='All')
      $details=$details->where('tm.id',$request->tcnType);

      if($request->status!='All')
      $details=$details->where('wd.status',$request->status);

      if($request->userId!='All')
      $details=$details->where('tcnrequests.userId',$request->userId);

      if($request->checkDate=='true')
      $details=$details->whereBetween('wd.approvalDate', [$fDate, $tDate]);
    }
    if($request->btn=='btn2')
    {
      $details=$details->where('mem.code',$request->memberCode);
    }
       $details=$details->select('tcnrequests.id as tcnId','tcnrequests.*','mem.name as name','mem.code as code','wd.status as status','wd.id as withDrawId','wd.*');

      $details=$details->get();

     $count=count($details);

      return  view('admin.withdraw.tcnWithDraw.fullWithDrawalAjax',compact('request','details','count'));
    }



    //*************************CANCEL TCN FULL WITHDRAWAL REQUEST***************************


    if($request->process=='cancelRequest')
    {
      //return $request->withDrawId;

      $update2 = DB::table('withdrawalrequests')->where('id', $request->withDrawId)->update(['status' => 'Cancel','approvalId' => $LogInId, 'approvalDate' => $dateTime, 'remarks' => $request->remarks]);

    }



    //*************************DEBIT HEERA ACCOUNT FETCH FOR  TCN FULL WITHDRAWAL REQUEST***************************


    if($request->process=='getHeeraAccount')
    {
      return $table = DB::table('banks')->where('accountNumber', $request->heeraAccountNumber)->where('typeOfAccount','heera account')->count();

    }







    //************************ TCN FULL WITHDRAWAL REQUESTED MEMBER LIST***************************

      if($request->process=='getMembers')
      {
        $table = DB::table('memberregistrations')
        ->join('tcnrequests','tcnrequests.userId','=','memberregistrations.userId')
        ->join('withdrawalrequests','withdrawalrequests.tcnId','=','tcnrequests.id');
        
        if($request->tcnType!='All')
        $table=$table->where('tcnrequests.tcn_id',$request->tcnType);

        if($request->status!='All')
        $table=$table->where('withdrawalrequests.status',$request->status);

        $table=$table->select('memberregistrations.code as username','memberregistrations.userId');

        $table=$table->groupBy('memberregistrations.userId','memberregistrations.code');

        $table=$table->get();
     
     return $table;

      }


    //************************CHECK THIS MWMBER ELIGIBLE FOR FULL WITHDRAW***************************

      if($request->process=='CheckCode')
      {
        

        $table =DB::table('memberregistrations')->join('logins','logins.id','=','memberregistrations.userId')->where('logins.username',$request->userCode)->where('logins.status','Active')->get();

        if(count($table)!=1)
        return $data='NoMember'; 

        if(count($table)==1)
        {
        foreach ($table as $table)
        $table1=tcnrequest::join('logins','logins.id','=','tcnrequests.userId')->where('logins.username', $request->userCode)->where('tcnrequests.status','Approved')->get();

        if(count($table1)<1)
        {
          return $data='NoTCN'; 
        } 
         else
         {
          foreach ($table1 as $table1)
          $WDcount=withdrawalrequest::where('userId',$table->userId)->where('status','Applied')->count();
          if(count($WithDrawApplied)>0)
          return $data='PendingWithDraw'; 
           } 
        }
      }


    //************************ELIGIBLE WITHDRAWAL APPLYING TCN 'S***************************

      if($request->process=='tcnDetails')
      {
      $reports=tcnRequest::join('memberregistrations As mem','mem.userId','=','tcnrequests.userId')->join('logins','logins.id','=','mem.userId')->where('mem.code',$request->userCode)->where('tcnrequests.status','Approved')->select('mem.*','tcnrequests.*','tcnrequests.id as tcnId')->get();

        return DataTables::of($reports)
        ->addColumn('tcn_type', function ($report) {
                return $report->tcn->tcnType;  })
        ->addColumn('action', function ($report) {
                 return '<a onclick="RequestResponse('.$report->tcnId.')" class="btn btn-danger" > Apply </a>';  })
        ->editColumn('addedDate',function($report){ return date('d-m-Y',strtotime($report->addedDate));})
        ->make(true);

      }



    //************************ELIGIBLE UNIT AMOUNT FOR  APPLY TCN WITHDRAWAL 'S***************************

      if($request->process=='RequestResponse')
      {

        $datas=tcnRequest::where('id',$request->tcnId)->get();
        foreach ($datas as $tcn)

        $members=memberregistration::where('userId',$tcn->userId)->get();
        foreach ($members as $members)

        $totalUnit=$tcn->unit; 

        $perUnit=$tcn->amount/$totalUnit;

        $BalanceUnit=withdrawalrequest::where('id',$request->tcnId)->whereNotIn('status',['Cancel'])->sum('unit');

        $availUnit=$totalUnit-$BalanceUnit;

        $availAmount=$availUnit*$perUnit;
          
       // $data['tcnId']=$request->tcnId;
       // $data['tcnType']=$request->tcn->tcnType;

       // $data['tamount']=$datas->amount;
       // $data['aamount']=$datas->amount;

       // $data['tunit']=$totalUnit;
       // $data['aunit']=$availUnit;

       // $data['bank']=$datas->benefit->bankName;
       // $data['branch']=$datas->benefit->branchName;
       // $data['ifsc']=$datas->benefit->ifsc;
       // $data['anumber']=$datas->benefit->accountNumber;
       // $data['name']=$datas->benefit->accountHolderName;


       //$data['paymentMode']=$datas->paymentMode;

        return view('admin.withdraw.tcnWithDraw.fullWithDrawalAjax',compact('tcn','members','availUnit','availAmount','request'));


      }
  }





  public function store(Request $request)
  {


    //*************************STORE NEW TCN FULL WITHDRAWAL REQUEST***************************

      if(Auth::guard('admin')->check())
      $LogInId=Auth::guard('admin')->user()->id;


        $withdraw = new withdrawalrequest;
        $withdraw ->tcnId=$request->tcnId;
        $withdraw ->userId=$request->userId;
        $withdraw ->unit=$request->unit;
        $withdraw ->amount=$request->amount;
        $withdraw ->appliedDate=date('Y-m-d');
        $withdraw ->appliedId=$LogInId;
        $withdraw ->approvalDate=date('Y-m-d H:i:s');
        $withdraw ->type='Normal Withdrawal';
        $withdraw ->save();
        $id=$withdraw->id;
        return redirect('/admin/tcnFullWithDrawal/view@@@'.$id);



  }

  /**
   * Display the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */


  /**
   * Show the form for editing the specified resource.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function edit($id)
  {
      
    $withDraw = withdrawalrequest::all()->where('id',$id);
    foreach($withDraw as $withDraws);

    $tcnrequest = tcnrequest::all()->where('id',$withDraws->tcnId);
    foreach($tcnrequest as $tcnrequests);

    $bank = bank::all()->where('id',$tcnrequests->benefitId);
    foreach($bank as $banks);

    $memberregistration = memberregistration::all()->where('userId',$tcnrequests->userId);
    foreach($memberregistration as $members);

    $addres = address::all()->where('userId',$members->userId)->where('typeOfAddress','permanent');
    foreach($addres as $address);

    if($withDraws->status=='Applied')
    {
    //************************* PAID ENTRY TCN FULL WITHDRAWAL PAGE***************************
    return view('admin.withdraw.tcnWithDraw.fullWithDrawalPaid',compact('tcnrequests','banks','address','members','withDraws'));
    }
    else
    {
    Alert::error('This WithDrawal Request Is already '.$withDraws->status.' ', 'Warning!');
    return redirect()->back();
    }

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

    //*************************STORE PAID DETAILS FOR TCN FULL WITHDRAWAL REQUEST***************************

    if(Auth::guard('admin')->check())
    $LogInId=Auth::guard('admin')->user()->id;
    else
    $LogInId=0;

    $dateTime=date('Y-m-d H:i:s'); 
    $date=date('Y-m-d');

    $update2 = DB::table('withdrawalrequests')->where('id', $request->withDrawId)->update([
      'status' => 'Paid', 
      'approvalId' => $LogInId, 
      'approvalDate' => $dateTime, 
      'approvalBy' => $request->approveDeclineBy, 
      //'hgReceipts' => $request->hgReceipts, 
      'formReceivedBy' => $request->formReceivedBy, 
      'paymentMadeBy' => $request->paymentMadeBy, 
      'withDrawAppliedDate' => date('Y-m-d',strtotime($request->wdappliedDate)), 
      'withDrawPayedDate' => date('Y-m-d',strtotime($request->wdpayedDate)), 
      //'card' => $request->card, 
      'currencyType' => $request->currencyType, 
      //'receivedOriginalAgreements' => $request->roa, 
      'bank' => $request->bank,
      'online' => $request->online,
      'debitAccountNo' => $request->debitAccountNo, 
      'chequeNo' => $request->chequeNo,
      'remarks' => $request->remarks]);


    Alert::success('TCN WithDrawal Paid Details Saved Successfully', 'Success');

    return redirect('admin/tcnFullWithDrawal/view@@@'.$request->withDrawId);


  }

  /**
   * Remove the specified resource from storage.
   *
   * @param  int  $id
   * @return \Illuminate\Http\Response
   */
  public function destroy($id)
  {
      //
  }


}
