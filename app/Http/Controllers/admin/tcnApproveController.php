<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\Notifications\TcnApplication;
use Illuminate\Support\Facades\Notification;
use App\tcnrequest;
use App\tcnmaster;
use App\bank;
use App\memberregistration;
use App\nominee;
use App\address;
use App\proofs;
use App\country;
use App\paymentdetails;
use App\tcn_allot;
use App\useraccess;
use App\page;
use App\User;
use DataTables;
use Auth;
use Carbon;
use DB;
use Alert;
use Mail;
class tcnApproveController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return 1;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {


      if($request->process=='CheckCode')
      {
        $data='';
        $table =DB::table('memberregistrations')->join('logins','logins.id','=','memberregistrations.userId')->where('logins.username',$request->userCode)->where('logins.status','Active')->get();
        if(count($table)!=1)
          return 1; 

        if(count($table)==1)
        {
        foreach ($table as $table)
        $table1=tcnrequest::join('logins','logins.id','=','tcnrequests.userId')->where('logins.username', $request->userCode)->whereNotIn('tcnrequests.status',[' ','Transfered','Removed'])->count();
        if($table1<1)
          return 2; 
        }
      }


      if($request->process=='tcnDetails')
      {
      $reports=tcnRequest::join('memberregistrations As mem','mem.userId','=','tcnrequests.userId')->join('logins','logins.id','=','mem.userId')->where('mem.code',$request->userCode)->whereNotIn('tcnrequests.status',[' ','notConfirm','Transfered','Removed'])->select('mem.*','tcnrequests.*','tcnrequests.id as tcnId')->get();

        return DataTables::of($reports)
        ->addColumn('tcn_type', function ($report) {
                return $report->tcn->tcnType;  })
        ->addColumn('action', function ($report) {
                 return '<a onclick="RequestResponse('.$report->tcnId.')" class="btn btn-danger" > Edit </a>';  })
        ->editColumn('addedDate',function($report){ return date('d-m-Y',strtotime($report->addedDate));})
        ->make(true);

      }

      if($request->process=='RequestResponse')
      {

        $datas=tcnrequest::where('id',$request->tcnId)->get();
        foreach ($datas as $datas)
       $data['tcnId']=$request->tcnId;
       $data['amount']=$datas->amount;
       $data['tcnType']=$datas->tcn_id;

       $data['currencyType']=$datas->currencyType;
       $data['unit']=$datas->unit;
       $data['transactionNumber']=$datas->transactionNumber;
       $data['paymentId']=$datas->paymentId;
       $data['paymentMode']=$datas->paymentMode;
       $data['paymentReceivedDate']=date('d-m-Y',strtotime($datas->paymentReceivedDate));
       $data['heeraAccountNumber']=$datas->heeraaccount->accountNumber;

        return $data;
      }

        if($request->process=='calcAmount')
        {   
                $table = tcnmaster::find($request->id);
                if($request->currencyType=='INR') return $table->inr; 
                if($request->currencyType=='USD') return $table->usd;
                if($request->currencyType=='AED') return $table->aed;
                if($request->currencyType=='SAR') return $table->sar;
                if($request->currencyType=='CAD') return $table->cad;
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
      
      //*****************TCN PAYMENT DETAILS UPDATE*************//
      $tcn=tcnRequest::find($request->tcnId);

      if($request->currencyType=='INR')
        $inrAmount=$request->amount;
      else
      {
        $perUnit=$tcn->inrAmount/$tcn->unit;
        $inrAmount=$request->unit*$perUnit;  
      }

    $paymentDate=date('Y-m-d H:i:s',strtotime($request->paymentReceivedDate));


    DB::table('tcnrequests')->where('id', $request->tcnId)->update(['unit' => $request->unit,'paymentReceivedDate' => $paymentDate, 'amount' => $request->amount, 'inrAmount' =>$inrAmount, 'paymentMode' => $request->paymentMode, 'transactionNumber' => $request->transactionNumber]);

    DB::table('paymentdetails')->where('id', $request->paymentId)->update(['paymentDate' => $paymentDate,'payment_mode' => $request->paymentMode, 'transactionNumber' => $request->transactionNumber]);
        Alert::success('TCN Payment Details Changed Successfully', 'Success');

    return redirect('admin/tcnApplicationForm/view@@@'.$request->tcnId);
 

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if($id=='Document')
        {
          $tcnrequest = tcnrequest::join('memberregistrations','tcnrequests.userId','=','memberregistrations.userId')
          ->join('tcnmasters','tcnmasters.id','=','tcnrequests.tcn_id')
          ->join('logins','logins.id','=','memberregistrations.userId')
          ->where('tcnrequests.status','Pending')
          ->where('tcnrequests.docVerified','Pending')
          ->select('tcnrequests.id as tcnId','tcnrequests.*','memberregistrations.*')
          ->get();
        $count=count($tcnrequest);


        return view('admin.tcn.tcnapplication.tcnDocument',compact('tcnrequest','count'));

        }

        if($id=='Payment')
        {
          $tcnrequest = tcnrequest::join('memberregistrations','tcnrequests.userId','=','memberregistrations.userId')
          ->join('tcnmasters','tcnmasters.id','=','tcnrequests.tcn_id')
          ->join('logins','logins.id','=','memberregistrations.userId')
          ->where('tcnrequests.docVerified','Verified')
          ->where('tcnrequests.paymentReceived','Pending')
          ->where('tcnrequests.status','Pending')
          ->select('tcnrequests.id as tcnId','tcnrequests.*','memberregistrations.*')
          ->get();
        $count=count($tcnrequest);



        return view('admin.tcn.tcnapplication.tcnPayment',compact('tcnrequest','count'));

        }
        if($id=='TCNPhysicalBenefitList')
        {
          $tcnrequest = tcnrequest::join('memberregistrations','tcnrequests.userId','=','memberregistrations.userId')
          ->join('tcnmasters','tcnmasters.id','=','tcnrequests.tcn_id')
          ->join('logins','logins.id','=','memberregistrations.userId')
          ->where('tcnrequests.status','Approved')
          ->where('tcnrequests.docVerified','Verified')
          ->where('tcnrequests.paymentReceived','Received')
          ->where('tcnrequests.physicalBenefit','No')
          ->select('tcnrequests.id as tcnId','tcnrequests.*','memberregistrations.*')
          ->get();
        $count=count($tcnrequest);

        return view('admin.tcn.tcnapplication.tcnPhysicalBenefitList',compact('tcnrequest','count'));
        }

        if($id=='TCNPaymentEdit')
        {
        return view('admin.tcn.tcnapplication.tcnPaymentEdit');
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
}
