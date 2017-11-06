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
class normalWithDrawalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $tcntypes = tcnmaster::all();
      return view('admin.withdraw.normalWithDrawList',compact('tcntypes')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {




      if(Auth::guard('admin')->check())
      $LogInId=Auth::guard('admin')->user()->id;
      else
      $LogInId=0;

      $date=date('Y-m-d');
      $dateTime =date('Y-m-d H:i:s');
 





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
         $details=$details->select('tcnrequests.id as tcnId','tcnrequests.*','mem.name as name','mem.code as code','wd.id as withDrawId','wd.*');

        $details=$details->get();

       $count=count($details);

        return  view('admin.withdraw.normalWithDrawAjax',compact('request','details','count'));
      }





      if($request->process=='cancelRequest')
      {
        //return $request->withDrawId;

        $update1 = DB::table('tcnrequests')->where('id', $request->tcnId)->update(['withDrawStatus' => 'Cancel']);

        $update2 = DB::table('withdrawalrequests')->where('id', $request->withDrawId)->update(['status' => 'Cancel','approvalId' => $LogInId, 'approvalDate' => $dateTime, 'remarks' => $request->remarks]);

      }





      if($request->process=='getHeeraAccount')
      {
        return $table = DB::table('banks')->where('accountNumber', $request->heeraAccountNumber)->where('typeOfAccount','heera account')->count();

      }








        if($request->process=='getMembers')
        {
          $table = DB::table('memberregistrations')->join('tcnrequests','tcnrequests.userId','=','memberregistrations.userId');

          $table=$table-> whereNotIn('tcnrequests.withDrawId',['0']);
          $table=$table-> whereNotIn('tcnrequests.withDrawStatus',[' ']);
          
          if($request->tcnType!='All')
          $table=$table->where('tcnrequests.tcn_id',$request->tcnType);

          if($request->status!='All')
          $table=$table->where('tcnrequests.withDrawStatus',$request->status);

          $table=$table->select('memberregistrations.code as username','memberregistrations.userId');

          $table=$table->groupBy('memberregistrations.userId');

          $table=$table->get();
       
       return $table;

        }
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      if(Auth::guard('admin')->check())
      $LogInId=Auth::guard('admin')->user()->id;
      else
      $LogInId=0;

      $dateTime=date('Y-m-d H:i:s'); 
      $date=date('Y-m-d');

      $update1 = DB::table('tcnrequests')->where('id', $request->tcnId)->update(['withDrawStatus' => 'Paid','status' => 'Removed']);
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


      
      return redirect('admin/normalWithDraw');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
  // return 'This Is Your WithDrawal Approve Page, Its Will Comming Soon with Updated Info ';

    if (strpos($id, 'view') !== false)
    {
    $id=explode('@@@',$id);
    $view=true;
    $id= $id[1];
    }

    $tcnrequest = tcnrequest::all()->where('id',$id);
    foreach($tcnrequest as $tcnrequests);

    $bank = bank::all()->where('id',$tcnrequests->benefitId);
    foreach($bank as $banks);

    $memberregistration = memberregistration::all()->where('userId',$tcnrequests->userId);
    foreach($memberregistration as $members);

    $addres = address::all()->where('userId',$members->userId)->where('typeOfAddress','permanent');
    foreach($addres as $address);

    $withDraw = withdrawalrequest::all()->where('id',$tcnrequests->withDrawId);
    foreach($withDraw as $withDraws);

    if($view===true)
    {
    return view('admin.withDraw.normalWithDrawView',compact('tcnrequests','banks','address','members','withDraws'));
    }


    if($withDraw->withDraw=='Applied')
    {
    return view('admin.withDraw.normalWithDrawApprove',compact('tcnrequests','banks','address','members','withDraws'));
    }
    else
        {
            Alert::error('This WithDrawal Request Is already '.$withDraw->status.' ', 'Warning!');
            return redirect()->back();
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
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


    public function Ajax(Request $request)
    {

    }
}
