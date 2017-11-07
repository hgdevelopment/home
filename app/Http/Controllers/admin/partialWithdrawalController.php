<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\withdrawalrequest;
use App\memberregistration;
use App\tcnrequest;
use App\tcnmaster;
use App\bank;
use App\address; 
use DB;
use Auth;
use Excel;
use Mail;
use PDF;
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
        $code=$request->member_code;
        $tcn_data=DB::table('memberregistrations')->where('memberregistrations.code','=',$code)->join('tcnrequests', 'memberregistrations.userId', '=','tcnrequests.userId')->where('tcnrequests.status','=','Approved')->join('tcnmasters', 'tcnrequests.tcn_id', '=','tcnmasters.id')->select('memberregistrations.code','memberregistrations.name','memberregistrations.dob','memberregistrations.guardian','memberregistrations.maritalStatus','tcnmasters.tcnType','tcnrequests.unit','tcnrequests.amount','tcnrequests.currencyType','tcnrequests.approvalDate','tcnrequests.id','tcnrequests.tcnCode','tcnrequests.paymentReceivedDate','tcnmasters.lockingDuration')->get();
        $count=count($tcn_data);
        if($tcn_data->isEmpty())
        {
            Session::flash('message', 'Member code does not exist!'); 
            return redirect("admin/partialWithdraw");
        }
        else
        {
            foreach($tcn_data as $datas)
            {
                $tcnId=$datas->id;
                $TCNunit=$datas->unit;
                $withdrawal = withdrawalrequest::where('tcnId','=',$tcnId)->where('status','=','Applied')->count();   
            }
            
        }
        if($withdrawal==0)
        {
            $withdUnit = withdrawalrequest::where('tcnId','=',$tcnId)->where('status','=','Paid')->sum('unit');    
            if($TCNunit>$withdUnit)
            {
                return view("admin.withdraw.partialWithdraw", compact('tcn_data','count','datas'));
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
 
    }

    public function withdraw(Request $request)
    {  
       $appliedid=Auth::guard('admin')->user()->id; 
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
       return view("admin.withdraw.partialWithdraw");

    }


    public function test()
    { 

       $view=withdrawalrequest::join('memberregistrations', 'withdrawalrequests.userId', '=','memberregistrations.userId')
        ->join('tcnrequests', 'withdrawalrequests.tcnId', '=','tcnrequests.id')
        ->join('tcnmasters', 'tcnmasters.id', '=','tcnrequests.tcn_id')
        ->where('withdrawalrequests.status','Applied')->where('withdrawalrequests.type','Partial Withdrawal')
        ->select('memberregistrations.name','tcnmasters.tcnType','tcnrequests.tcnCode','withdrawalrequests.unit','withdrawalrequests.amount','withdrawalrequests.appliedDate','withdrawalrequests.id','memberregistrations.code')
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
        ->join('banks','tcnrequests.benefitId','=','banks.id')
        ->select('memberregistrations.code','memberregistrations.name','memberregistrations.photo','addresses.address','memberregistrations.mobileNo','tcnmasters.tcnType','tcnrequests.approvalDate','tcnrequests.amount','tcnrequests.currencyType','withdrawalrequests.appliedDate','banks.accountHolderName','banks.bankName','banks.branchName','banks.accountNumber','banks.ifsc','withdrawalrequests.id','tcnrequests.tcnCode')
        ->get();

        foreach ($data as $datas)

        $value=DB::table('withdrawalrequests')->where('withdrawalrequests.id','=',$id)->get();
        foreach ($value as $values)

        return view("admin.withdraw.partialWithdrawalcheck",compact('datas','values'));

     
    }
        public function viewing($id)
    {

        $data=DB::table('withdrawalrequests')->where('withdrawalrequests.id','=',$id)
        ->join('memberregistrations','memberregistrations.userId','=','withdrawalrequests.userId')
        ->join('addresses','memberregistrations.userId','=','addresses.userId')->where('addresses.typeOfAddress','=','permanent')
        ->join('tcnrequests','withdrawalrequests.tcnId','=','tcnrequests.id')
        ->join('tcnmasters','tcnrequests.tcn_id','=','tcnmasters.id')
        ->join('banks','tcnrequests.benefitId','=','banks.id')
        ->select('memberregistrations.code','memberregistrations.name','addresses.address','memberregistrations.mobileNo','tcnmasters.tcnType','tcnrequests.approvalDate','tcnrequests.amount','tcnrequests.currencyType','withdrawalrequests.appliedDate','banks.accountHolderName','banks.bankName','banks.branchName','banks.accountNumber','banks.ifsc','withdrawalrequests.id','tcnrequests.tcnCode')
        ->get();

        foreach ($data as $datas)

        $value=DB::table('withdrawalrequests')->where('withdrawalrequests.id','=',$id)->get();
        foreach ($value as $values)

        return view("admin.withdraw.partialWithdrawalviewing",compact('datas','values'));

     
    }
    public function action(Request $request)
    {
        $approveId=Auth::guard('admin')->user()->id;
        $id=$request->withdraw_id;
        if(isset($request->approve))
        {
      
        $withdraw = withdrawalrequest::find($id);          
        $withdraw->formReceivedBy=$request->received_by;
        $withdraw->currencyType= $request->currency;
        $withdraw->paymentMadeBy=$request->payment;
        $withdraw->approvalId= $approveId;
        $withdraw->approvalby= $request->approved_by;
        $withdraw->approvalDate= date('Y-m-d H:i:s');

        $withdraw->WithDrawPayedDate=date("Y-m-d",strtotime($request->payed_date));
        $withdraw->online= $request->online;
        $withdraw->chequeNo=$request->check_no;
        $withdraw->bank= $request->bank;
        $withdraw->debitAccountNo= $request->debit;
        $withdraw->remarks=$request->remarks;
        $withdraw->status='Paid';
        $withdraw->save();

        $tcnid=$withdraw->tcnId;
        $value=DB::table('tcnrequests')->where('id','=',$tcnid)->get();
        foreach($value as $values)
        $unit=$values->unit;
        $amount=$values->amount;

        $row = DB::table('withdrawalrequests')->where('status','=','Paid')->where('tcnId',$tcnid)->get(
        array(
        'withdrawalrequests.id',
        DB::raw('SUM(withdrawalrequests.unit) as units'),
        DB::raw('SUM(withdrawalrequests.amount) as amount')
        )
        );
        foreach ($row as $rows)
        $withdUnit= $rows->units;
        $withdAmount=$rows->amount; 
        if($withdUnit==$unit && $withdAmount==$amount)
        {
        $withdraw = withdrawalrequest::find($id);
        $withdraw->balance_amount='0'; 
        $withdraw->save(); 

        $tcn = tcnrequest::find($tcnid);
        $tcn->withDrawStatus='1'; 
        $tcn->approvalDate=date('Y-m-d H:i:s');   
        $tcn->approvalId=$approveId;    
        $tcn->status='Removed';
        $tcn->reason='total amount withdrawn';
        $tcn->balanceAmount='0';
        $tcn->save();
        }else
        {
        $tcn = tcnrequest::find($tcnid);
        $tcn->balanceAmount=$amount-$withdAmount; 
        $tcn->save();

        $withdraw = withdrawalrequest::find($id);
        $withdraw->balance_amount=$amount-$withdAmount; 
        $withdraw->save();
        }
        Session::flash('message', 'Partial Withdrawal Request is Approved!');
        Session::flash('pdf_id', $id);

        $view=DB::table('withdrawalrequests')->where('withdrawalrequests.id','=',$id)
        ->join('memberregistrations','withdrawalrequests.userId','=','memberregistrations.userId')
        ->join('tcnrequests','tcnrequests.id','=','withdrawalrequests.tcnId')
        ->select('memberregistrations.email','withdrawalrequests.amount','memberregistrations.name','memberregistrations.code','tcnrequests.amount as tradeamount','withdrawalrequests.balance_amount','withdrawalrequests.appliedDate')
        ->get();
        foreach($view as $views)

        $to=$views->email;
        $data = array( 'heading' =>'PARTIAL WITHDRAWAL APPROVAL',
                        'name' =>$views->name,
                        'ibg' =>$views->code,
                        'amount' =>$views->amount,
                        'applieddate'=>date('d-m-Y',strtotime($views->appliedDate)),
                        'tradeamount' =>$views->tradeamount,
                        'balance' =>$views->balance_amount,
                        'status'=>'approve');
        Mail::send('admin.mail.partialwithdrawapprove',compact('data'), function ($message) use ($to)
        {
            $message->from('heeraerptl@gmail.com', 'Partial Withdrawal Request Approved');
            $message->to($to)->subject('Partial Withdrawal');
        }); 


    
                       
      return redirect('admin/partialWithdraw/pdf/'.$id);
        
        
        } 

    }
    public function get_partial_view_PDF($id){
      return view('admin.withdraw.partialWithdrawdetail_pdf',compact('id'));
    }
    public function get_partial_PDF($id){
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
        $pdf =PDF::loadView('admin.withdraw.pdf.partial_withdrawal_pdf',compact('tcnrequests','banks','address','members','withDraws'));
        return $pdf->stream();
    }

    public function deny($id)
    {
       
        $withdraw = withdrawalrequest::find($id);   
        $withdraw->approvalId= $approveId;
        $withdraw->approvalby= $approveBy;
        $withdraw->approvalDate= date('Y-m-d H:i:s'); 
        $withdraw->status='Cancel';
        $withdraw->save();
        Session::flash('message', 'Partial Withdrawal Request is Cancelled!');

        $view=DB::table('withdrawalrequests')->where('withdrawalrequests.id','=',$id)
        ->join('memberregistrations','withdrawalrequests.userId','=','memberregistrations.userId')
        ->join('tcnrequests','tcnrequests.id','=','withdrawalrequests.tcnId')
         ->select('memberregistrations.email','withdrawalrequests.amount','memberregistrations.name','withdrawalrequests.appliedDate','memberregistrations.code')
        ->get();
        foreach($view as $views)

        $to=$views->email;
        $data = array( 'heading' =>'PARTIAL WITHDRAWAL CANCELLED',
                        'name' =>$views->name,
                        'ibg' =>$views->code,
                        'amount' =>$views->amount,
                        'applieddate'=>date('d-m-Y',strtotime($views->appliedDate)),
                        'tradeamount' =>$views->tradeamount,
                        'status'=>'cancelled');
        Mail::send('admin.mail.partialwithdrawdeny',compact('data'), function ($message) use ($to)
        {
            $message->from('phpdiniya@gmail.com', 'Partial Withdrawal Request Approved');
            $message->to($to)->subject('Partial Withdrawal');
        }); 

        

        return redirect('admin/partialWithdraw/view');
   

    }

    public function viewapprove()
    {
       
        return  view("admin.withdraw.partialWithdrawviewapprove",compact('tcnmaster','Year'));
       
    }
    public function viewapprovesearch(Request $request)
    {
        $year=$request->year;
        $month=$request->month;
        $tcn=$request->tcn;
        if($tcn==""){

        $approve=DB::table('withdrawalrequests')->where('withdrawalrequests.status','=','Paid')->where('withdrawalrequests.type','=','Partial Withdrawal')->whereMonth('withdrawalrequests.approvalDate','=',$month)->whereYear('withdrawalrequests.approvalDate','=',$year)
        ->join('memberregistrations','memberregistrations.userId','=','withdrawalrequests.userId')
        ->join('tcnrequests','withdrawalrequests.tcnId','=','tcnrequests.id')
        ->join('tcnmasters','tcnrequests.tcn_id','=','tcnmasters.id')
        ->select('memberregistrations.name','tcnmasters.tcnType','withdrawalrequests.unit','withdrawalrequests.amount','withdrawalrequests.appliedDate','withdrawalrequests.approvalDate','withdrawalrequests.id','memberregistrations.code','tcnrequests.tcnCode')
        ->get();  
        }else{ 
        $approve=DB::table('withdrawalrequests')->where('withdrawalrequests.status','=','Paid')->where('withdrawalrequests.type','=','Partial Withdrawal')->whereMonth('withdrawalrequests.approvalDate','=',$month)->whereYear('withdrawalrequests.approvalDate','=',$year)
        ->join('memberregistrations','memberregistrations.userId','=','withdrawalrequests.userId')
        ->join('tcnrequests','withdrawalrequests.tcnId','=','tcnrequests.id')->where('tcnrequests.tcn_id','=',$tcn)
        ->join('tcnmasters','tcnrequests.tcn_id','=','tcnmasters.id')
        ->select('memberregistrations.name','tcnmasters.tcnType','withdrawalrequests.unit','withdrawalrequests.amount','withdrawalrequests.appliedDate','withdrawalrequests.approvalDate','withdrawalrequests.id','memberregistrations.code','tcnrequests.tcnCode')
        ->get();  

        }
        return  view("admin.withdraw.partialWithdrawviewapprove",compact('approve','year','month','tcn'));
       
    }



    public function viewdeny()
    {
        $deny=DB::table('withdrawalrequests')->where('withdrawalrequests.status','=','Cancel')->where('withdrawalrequests.type','=','Partial Withdrawal')
        ->join('memberregistrations','memberregistrations.userId','=','withdrawalrequests.userId')
        ->join('tcnrequests','withdrawalrequests.tcnId','=','tcnrequests.id')
        ->join('tcnmasters','tcnrequests.tcn_id','=','tcnmasters.id')
        ->select('memberregistrations.name','tcnmasters.tcnType','withdrawalrequests.unit','withdrawalrequests.amount','withdrawalrequests.appliedDate','withdrawalrequests.approvalDate','memberregistrations.code','tcnrequests.tcnCode')
        ->get();  
        
        return  view("admin.withdraw.partialWithdrawviewdeny",compact('deny'));
       
    }
    public function approveview($id)
    {
      
        $data=DB::table('withdrawalrequests')->where('withdrawalrequests.id','=',$id)
        ->join('memberregistrations','memberregistrations.userId','=','withdrawalrequests.userId')
        ->join('addresses','memberregistrations.userId','=','addresses.userId')->where('addresses.typeOfAddress','=','permanent')
        ->join('tcnrequests','withdrawalrequests.tcnId','=','tcnrequests.id')
        ->join('tcnmasters','tcnrequests.tcn_id','=','tcnmasters.id')
        ->join('banks','tcnrequests.benefitId','=','banks.id')
        ->select('memberregistrations.code','memberregistrations.name','addresses.address','memberregistrations.mobileNo','tcnmasters.tcnType','tcnrequests.approvalDate','tcnrequests.amount','tcnrequests.currencyType','withdrawalrequests.appliedDate','banks.accountHolderName','banks.bankName','banks.branchName','banks.accountNumber','banks.ifsc','withdrawalrequests.id','tcnrequests.tcnCode')
        ->get();

        foreach ($data as $datas)

        $value=DB::table('withdrawalrequests')->where('withdrawalrequests.id','=',$id)->get();
        foreach ($value as $values)

        return view("admin.withdraw.partialWithdrawapprovedetail",compact('datas','values'));
        

     
    }

     public function excel(Request $request){
      $year=$request->hidden_year;
      $month=$request->hidden_month;
      $tcn=$request->hidden_tcn;
      ob_end_clean();
      ob_start();
      if($tcn==""){

        $approve=DB::table('withdrawalrequests')->where('withdrawalrequests.status','=','Paid')->where('withdrawalrequests.type','=','Partial Withdrawal')->whereMonth('withdrawalrequests.approvalDate','=',$month)->whereYear('withdrawalrequests.approvalDate','=',$year)
        ->join('memberregistrations','memberregistrations.userId','=','withdrawalrequests.userId')
        ->join('tcnrequests','withdrawalrequests.tcnId','=','tcnrequests.id')
        ->join('tcnmasters','tcnrequests.tcn_id','=','tcnmasters.id')
        ->join('banks','tcnrequests.benefitId','=','banks.id')
        ->select('banks.accountHolderName','banks.accountNumber','banks.ifsc','banks.bankName','banks.branchName','tcnmasters.tcnType','withdrawalrequests.unit','withdrawalrequests.amount','withdrawalrequests.appliedDate','withdrawalrequests.approvalDate','withdrawalrequests.id','memberregistrations.code','tcnrequests.tcnCode','withdrawalrequests.approvalBy','withdrawalrequests.balance_amount','tcnrequests.amount as tcnamount')
        ->get();  
        }else{ 
        $approve=DB::table('withdrawalrequests')->where('withdrawalrequests.status','=','Paid')->where('withdrawalrequests.type','=','Partial Withdrawal')->whereMonth('withdrawalrequests.approvalDate','=',$month)->whereYear('withdrawalrequests.approvalDate','=',$year)
        ->join('memberregistrations','memberregistrations.userId','=','withdrawalrequests.userId')
        ->join('tcnrequests','withdrawalrequests.tcnId','=','tcnrequests.id')
        ->join('tcnmasters','tcnrequests.tcn_id','=','tcnmasters.id')
        ->join('banks','tcnrequests.benefitId','=','banks.id')->where('banks.typeOfAccount','=','TCN Benefit')
        ->select('banks.accountHolderName','banks.accountNumber','banks.ifsc','banks.bankName','banks.branchName','tcnmasters.tcnType','withdrawalrequests.unit','withdrawalrequests.amount','withdrawalrequests.appliedDate','withdrawalrequests.approvalDate','withdrawalrequests.id','memberregistrations.code','tcnrequests.tcnCode','withdrawalrequests.approvalBy','withdrawalrequests.balance_amount','tcnrequests.amount as tcnamount')
        ->get();  

        }
       
       $excelData=array();
       $i=1;
       foreach ($approve as $data) {
                $excelData[$i]['Sl No'] = $i;
                $excelData[$i]['MEMBER CODE'] = $data->code;
                $excelData[$i]['ACCOUNT HOLDER NAME'] =$data->accountHolderName;
                $excelData[$i]['ACCOUNT NO'] =$data->accountNumber;
                $excelData[$i]['IFSC CODE'] =$data->ifsc;
                $excelData[$i]['BANK'] =$data->bankName;
                $excelData[$i]['BRANCH'] =$data->branchName;
                $excelData[$i]['WITHDRAWAL UNITS'] =$data->unit;
                $excelData[$i]['APPROVED DATE'] =date('d-m-Y',strtotime($data->approvalDate));
                $excelData[$i]['TRADE AMOUNT'] =$data->tcnamount;
                $excelData[$i]['WITHDRAWAL AMOUNT'] =$data->amount;
                $excelData[$i]['BALANCE AMOUNT'] ="".$data->balance_amount;
                $excelData[$i]['WITHDRAWAL APPLIED DATE'] =date('d-m-Y',strtotime($data->appliedDate));
                $excelData[$i]['ADDED BY'] =$data->approvalBy;
                $i++;
            }  
                $lastcell= 'A3:N'.(1+$i);

                $pagename = $year.'-'.$month.'-'.'Partial Withdrawal';


                Excel::create($pagename, function($excel) use ($excelData,$pagename,$lastcell) {
                $excel->sheet('mySheet', function($sheet) use ($excelData,$pagename,$lastcell)
            {
                $sheet->fromArray($excelData);
                $sheet->cell('A1:N1', function($cell) {
                $cell->setFontSize(11);
                $cell->setBackground('#7cde9c');
                $cell->setFontWeight('bold');
                $cell->setAlignment('center');

            });
                $sheet->setFreeze('A2');
                $sheet->prependRow(1, array(
                $pagename
            ));
                $sheet->mergeCells('A1:N1');
                $sheet->cell('A1:N1', function($cell) {
                $cell->setFontSize(12);
                $cell->setBackground('#43a061');
                $cell->setFontWeight('bold');
                $cell->setAlignment('center');

            });
                $sheet->cell($lastcell, function($cell) {
                $cell->setFontSize(12);
                $cell->setFontWeight('thin');
                $cell->setAlignment('center');

                });

                $sheet->setPageMargin(array(
                        0.25, 0.30, 0.25, 0.30
                ));
          });
    })->download('xls');
    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editrequest($id)
    {

       $data=DB::table('withdrawalrequests')->where('withdrawalrequests.id','=',$id)
       ->join('tcnrequests','tcnrequests.id','=','withdrawalrequests.tcnId')
       ->join('tcnmasters','tcnrequests.tcn_id','=','tcnmasters.id')
       ->select('tcnmasters.tcnType','withdrawalrequests.amount as wamount','withdrawalrequests.unit as wunit','tcnrequests.unit','tcnrequests.amount','tcnrequests.id','withdrawalrequests.id as wid')
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
    return view("admin.withdraw.partialWithdraweditdetail",compact('datas','balanceunit','balanceamount'));
    }

    public function updatewithdraw(Request $request)
    {
    
    $withdraw = withdrawalrequest::find($request->wid);
    $withdraw->unit= $request->withdrawal_unit;
    $withdraw->amount= $request->withdrawal_amount;
    $withdraw->save();
    Session::flash('message', 'Partial Withdrawal Updated Successfully!'); 
    return redirect('admin/partialWithdraw/view');
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
