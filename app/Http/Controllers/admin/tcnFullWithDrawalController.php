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
use Mail;
use Alert;
use Carbon;
use DataTables;
use Excel;
use PDF;
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


  if($id=='Reports')
  {
  //************************* All Reports TCN FULL WITHDRAWAL PAGE***************************
  $tcntypes = tcnmaster::all();
  return view('admin.withdraw.tcnWithDraw.fullWithDrawalReports',compact('tcntypes')); 


  }





  //************************* APPLIED TCN FULL WITHDRAWAL LIST PAGE***************************

  if($id=='Applied')
  {

  $Title='TCN Full WithDrawal Applied'; 

  $details = tcnrequest::join('memberregistrations AS mem','tcnrequests.userId','=','mem.userId')
  ->join('logins','logins.id','=','mem.userId')
  ->join('withdrawalrequests AS wd','wd.tcnId','=','tcnrequests.id')
  ->where('wd.status','Applied')
  ->where('logins.status','Active')
  ->whereIn('wd.type',['Normal Withdrawal','Emergency Withdrawal'])
  ->select('tcnrequests.id as tcnId','tcnrequests.*','mem.name as name','mem.code as code','wd.status as status','wd.id as withDrawId','wd.*')
  ->get();

  $count=count($details);
  return  view('admin.withdraw.tcnWithDraw.fullWithDrawalDetails',compact('Title','details','count','id'));
  }








  //************************* PAID TCN FULL WITHDRAWAL LIST PAGE***************************

  if($id=='Paid')
  {

  $Title='TCN Full WithDrawal Approved';  

  // $details = tcnrequest::join('memberregistrations AS mem','tcnrequests.userId','=','mem.userId')
  // ->join('withdrawalrequests AS wd','wd.tcnId','=','tcnrequests.id')
  // ->where('wd.status','Paid')
  // ->where('wd.type','Normal Withdrawal')
  // ->select('tcnrequests.id as tcnId','tcnrequests.*','mem.name as name','mem.code as code','wd.status as status','wd.id as withDrawId','wd.*')
  // ->get();

  $count=count($details);
  return  view('admin.withdraw.tcnWithDraw.fullWithDrawalDetails',compact('Title','details','count','id'));

  }





  //************************* CANCELLED TCN FULL WITHDRAWAL LIST PAGE***************************

  if($id=='Cancelled')
  {

  $Title='TCN Full WithDrawal Cancelled';  

  $details = tcnrequest::join('memberregistrations AS mem','tcnrequests.userId','=','mem.userId')
  ->join('withdrawalrequests AS wd','wd.tcnId','=','tcnrequests.id')
  ->where('wd.status','Cancel')
  ->whereIn('wd.type',['Normal Withdrawal','Emergency Withdrawal'])
  ->select('tcnrequests.id as tcnId','tcnrequests.*','mem.name as name','mem.code as code','wd.status as status','wd.id as withDrawId','wd.*')
  ->get();

  $count=count($details);
  return  view('admin.withdraw.tcnWithDraw.fullWithDrawalDetails',compact('Title','details','count','id'));

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

  $details = tcnrequest::join('memberregistrations AS mem','tcnrequests.userId','=','mem.userId')->join('withdrawalrequests AS wd','wd.tcnId','=','tcnrequests.id')->join('logins','logins.id','=','mem.userId');

  $details=$details->whereNotIn('wd.type',['Partial Withdrawal']);



  if($request->btn=='btn1')
  {
  if($request->withDrawType!='All')
  $details=$details->where('wd.type',$request->withDrawType);

  if($request->tcnType!='All')
  $details=$details->where('tcnrequests.tcn_id',$request->tcnType);

  if($request->status!='All')
  $details=$details->where('wd.status',$request->status);

  if($request->checkDate=='true')
  $details=$details->whereBetween('wd.approvalDate', [$fDate, $tDate]);
  }
  if($request->btn=='btn2')
  {
  $details=$details->where('mem.code',$request->memberCode);
  }
  $details=$details->select('tcnrequests.id as tcnId','tcnrequests.*','mem.name as name','mem.code as code','wd.status as status','wd.id as withDrawId','wd.approvalDate as approvalDates','wd.*');

  $details=$details->get();

  $count=count($details);

  return  view('admin.withdraw.tcnWithDraw.fullWithDrawalAjax',compact('request','details','count'));
  }




  //*************************ALL TCN FULL WITHDRAWAL REPORTS PAGE***************************

  //*************************BASED ON FILTERED KEYS /ME DSA OI***************************


  if($request->process=='withDrawTcnReports')
  {

  $fDate = $request->fDate.' 00:00:00';
  $tDate = $request->tDate.' 23:59:59';

  $fDate = Carbon::createFromFormat('d-m-Y H:i:s', $fDate)->toDateTimeString();
  $tDate = Carbon::createFromFormat('d-m-Y H:i:s', $tDate)->toDateTimeString();

  $details = tcnrequest::join('memberregistrations AS mem','tcnrequests.userId','=','mem.userId')->join('withdrawalrequests AS wd','wd.tcnId','=','tcnrequests.id')->join('logins','logins.id','=','mem.userId');
  if($request->userType!='All')
  {
   $details=$details->join('logins','logins.id','=','mem.addedById');
   $details=$details->where('logins.userType',$request->userType);;
    
  }

  if($request->withDrawType!='All')
  $details=$details->where('wd.type',$request->withDrawType);

  if($request->tcnType!='All')
  $details=$details->where('tcnrequests.tcn_id',$request->tcnType);

  if($request->status!='All')
  $details=$details->where('wd.status',$request->status);

  if($request->checkDate=='true')
  $details=$details->whereBetween('wd.approvalDate', [$fDate, $tDate]);

  $details=$details->select('tcnrequests.id as tcnId','tcnrequests.*','mem.name as name','mem.code as code','wd.status as status','wd.id as withDrawId','wd.approvalDate as approvalDates','wd.*');

  $details=$details->withTrashed()->get();

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
  ->join('logins','logins.id','=','memberregistrations.userId')
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


  $WithDrawApplied=DB::table('withdrawalrequests')->where('tcnId',$report->tcnId)->where('status','Applied')->get();
  if(count($WithDrawApplied)>0)
  {
  foreach ($WithDrawApplied as $WithDrawApplied)
  return '<span class="text-danger"><a onclick="ViewDetails('.$WithDrawApplied->id.')">'.$WithDrawApplied->type.' Already  Applied</span>';
  }

  $WithDrawPaid=DB::table('withdrawalrequests')->where('tcnId',$report->tcnId)->where('status','Paid')->sum('unit');
  // if($WithDrawPaid=$report->unit)
  // return '<span class="text-danger">No available unit.</span>';

  $unlockdate = strtotime(date("Y-m-d", strtotime($report->paymentReceivedDate)) . " +".$report->tcn->lockingDuration." month");
  $unlockdate = date("Y-m-d", $unlockdate);
  // if($unlockdate>date("Y-m-d"))
  // return '<span class="text-danger">Locking Duration Not Completed.</span>';



  return '<a onclick="RequestResponse('.$report->tcnId.')" class="btn btn-danger" > Apply </a>';  

  })
  ->editColumn('addedDate',function($report){ return date('d-m-Y',strtotime($report->addedDate));})
  ->make(true);

  }





  //************************ELIGIBLE UNIT AMOUNT FOR  APPLY TCN WITHDRAWAL 'S***************************

  if($request->process=='RequestResponse')
  {

  $datas=tcnrequest::where('id',$request->tcnId)->get();
  foreach ($datas as $tcn)

  $members=memberregistration::where('userId',$tcn->userId)->get();
  foreach ($members as $members)

  $totalUnit=$tcn->unit; 

  $perUnit=$tcn->amount/$totalUnit;

  $BalanceUnit=withdrawalrequest::where('tcnId',$request->tcnId)->whereNotIn('status',['Cancel'])->sum('unit');

  $availUnit=$totalUnit-$BalanceUnit;

  $availAmount=$availUnit*$perUnit;

  return view('admin.withdraw.tcnWithDraw.fullWithDrawalAjax',compact('tcn','members','availUnit','availAmount','request'));
  }





  //************************APPROVED WITHDRAWAL LIST WITH FILTER YEAR/MONTH***************************

  if($request->process=='withDrawalPaidDetails')
  {

  $year=$request->year;
  $month=$request->month;
  $tcnType=$request->tcnType;
  $type=$request->type;

  $details = tcnrequest::join('memberregistrations AS mem','tcnrequests.userId','=','mem.userId')
  ->join('logins','logins.id','=','mem.userId')
  ->join('withdrawalrequests AS wd','wd.tcnId','=','tcnrequests.id')
  ->where('wd.status','Paid')
  ->where('logins.status','Active')
  ->whereYear('wd.approvalDate',$year)
  ->whereMonth('wd.approvalDate',$month)
  ->whereNotIn('wd.type',['Partial Withdrawal']);
  if($request->tcnType!='All')
  $details=$details->where('tcnrequests.tcn_id',$tcnType);
  if($request->type!='All')
  $details=$details->where('wd.type',$type);

  $details=$details->select('tcnrequests.id as tcnId','tcnrequests.*','mem.name as name','mem.code as code','wd.status as status','wd.id as withDrawId','wd.*')
  ->get();

  $count=count($details);
  return  view('admin.withdraw.tcnWithDraw.fullWithDrawalAjax',compact('Title','details','count','id','request'));
  }

}




//************************EXCEL DOWNLOAD TCN WITHDRAWAL***************************
public function Excel(Request $request)
{



  //_________Payments----------------With Drawal Approved Details Excel-----------____________//

  if($request->excel=='List')
  {
  $year=$request->year1;
  $month=$request->month1;
  $tcnType=$request->tcnType1;
  $type=$request->type1;

  $details = tcnrequest::join('memberregistrations AS mem','tcnrequests.userId','=','mem.userId')
  ->join('withdrawalrequests AS wd','wd.tcnId','=','tcnrequests.id')
  ->join('logins','logins.id','=','mem.userId')
  ->where('wd.status','Paid')
  ->where('logins.status','Active')
  ->whereYear('wd.approvalDate',$year)
  ->whereMonth('wd.approvalDate',$month)
  ->whereNotIn('wd.type',['Partial Withdrawal']);
  if($request->tcnType1!='All')
  $details=$details->where('tcnrequests.tcn_id',$tcnType);
  if($request->type1!='All')
  $details=$details->where('wd.type',$type);

  $details=$details->select('tcnrequests.id as tcnId','tcnrequests.amount as tradeAmount','tcnrequests.*','mem.name as name','mem.code as code','wd.status as status','wd.approvalDate as paidDate','wd.amount as paidAmount','wd.unit as units','wd.id as withDrawId','wd.*')
  ->get();

  $count=count($details);

  ob_end_clean();
  ob_start();

  $excelData=array();
  $i=1;
  foreach ($details as $data)
  {
  $excelData[$i]['Sl No'] = $i;
  $excelData[$i]['MEMBER CODE'] = $data->code;
  $excelData[$i]['ACCOUNT HOLDER NAME'] =$data->benefit->accountHolderName;
  $excelData[$i]['ACCOUNT NO'] =$data->benefit->accountNumber;
  $excelData[$i]['IFSC CODE'] =$data->benefit->ifsc;
  $excelData[$i]['BANK'] =$data->benefit->bankName;
  $excelData[$i]['BRANCH'] =$data->benefit->branchName;
  $excelData[$i]['WITHDRAWAL TYPE'] =$data->type;
  $excelData[$i]['WITHDRAWAL UNITS'] =$data->units;
  $excelData[$i]['CURRENCY'] =$data->currencyType;
  $excelData[$i]['APPROVED DATE'] =date('d-m-Y',strtotime($data->paidDate));
  $excelData[$i]['TRADE AMOUNT'] =$data->tradeAmount;
  $excelData[$i]['WITHDRAWAL AMOUNT'] =$data->paidAmount;
  $excelData[$i]['WITHDRAWAL APPLIED DATE'] =date('d-m-Y',strtotime($data->appliedDate));
  $excelData[$i]['ADDED BY'] =$data->approvalBy;
  $i++;
  } 


  $lastcell= 'A3:N'.(1+$i);
  $M=date('M',strtotime($month));
  $pagename = $year.'-'.$M.'-'.'TCN_Full_Withdrawal';


  Excel::create($pagename, function($excel) use ($excelData,$pagename,$lastcell) {
  $excel->sheet('mySheet', function($sheet) use ($excelData,$pagename,$lastcell)
  {
  $sheet->fromArray($excelData);
  $sheet->cell('A1:N1', function($cell)
  {
  $cell->setFontSize(11);
  $cell->setBackground('#7cde9c');
  $cell->setFontWeight('bold');
  $cell->setAlignment('left');

  });
  $sheet->setFreeze('A2');
  $sheet->prependRow(1, array("TCN FULL WITHDRAWAL"));



  $sheet->mergeCells('A1:N1');
  $sheet->cell('A1:N1', function($cell) 
  {
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


  //_________Reports----------------With Drawal All Details Excel-----------____________//


  if($request->excel=='Report')
  {
  $fDate = $request->fDate1.' 00:00:00';
  $tDate = $request->tDate1.' 23:59:59';

  $fDate = Carbon::createFromFormat('d-m-Y H:i:s', $fDate)->toDateTimeString();
  $tDate = Carbon::createFromFormat('d-m-Y H:i:s', $tDate)->toDateTimeString();

  $details = tcnrequest::join('memberregistrations AS mem','tcnrequests.userId','=','mem.userId')->join('withdrawalrequests AS wd','wd.tcnId','=','tcnrequests.id');
  if($request->userType1!='All')
  {
   $details=$details->join('logins','logins.id','=','mem.addedById');
   $details=$details->where('logins.userType',$request->userType1);;
    
  }

  if($request->withDrawType1!='All')
  $details=$details->where('wd.type',$request->withDrawType1);

  if($request->tcnType1!='All')
  $details=$details->where('tcnrequests.tcn_id',$request->tcnType1);

  if($request->status1!='All')
  $details=$details->where('wd.status',$request->status1);

  if($request->checkDate1=='true')
  $details=$details->whereBetween('wd.approvalDate', [$fDate, $tDate]);

  $details=$details->select('mem.code as code','wd.type as wdtype','wd.unit as wdunits','wd.status as wdstatus','wd.amount as wdAmount','wd.appliedDate as wdappliedDate','wd.approvalDate as wdapprovalDate','tcnrequests.*','mem.name as name','wd.*');
  
  $details=$details->withTrashed()->get();

  $count=count($details);

  ob_end_clean();
  ob_start();

  $excelData=array();
  $i=1;
  foreach ($details as $data)
  {
  $excelData[$i]['Sl No'] = $i;
  $excelData[$i]['MEMBER CODE'] = $data->code;
  $excelData[$i]['ACCOUNT HOLDER NAME'] =$data->benefit->accountHolderName;
  $excelData[$i]['ACCOUNT NO'] =$data->benefit->accountNumber;
  $excelData[$i]['IFSC CODE'] =$data->benefit->ifsc;
  $excelData[$i]['BANK'] =$data->benefit->bankName;
  $excelData[$i]['BRANCH'] =$data->benefit->branchName;
  $excelData[$i]['WITHDRAWAL STATUS'] =$data->wdstatus;
  $excelData[$i]['WITHDRAWAL TYPE'] =$data->wdtype;
  $excelData[$i]['WITHDRAWAL UNITS'] =$data->wdunits;
  $excelData[$i]['CURRENCY'] =$data->currencyType;
  $excelData[$i]['APPROVAL DATE'] =date('d-m-Y',strtotime($data->wdapprovalDate));
  $excelData[$i]['TRADE AMOUNT'] =$data->wdAmount;
  $excelData[$i]['WITHDRAWAL AMOUNT'] =$data->wdAmount;
  $excelData[$i]['APPLIED DATE'] =date('d-m-Y',strtotime($data->wdappliedDate));
  $excelData[$i]['ADDED BY'] =$data->approvalBy;
  $i++;
  } 


  $lastcell= 'A3:P'.(1+$i);
  $M=date('M',strtotime($month));
  $pagename = $year.'-'.$M.'-'.'TCN_Full_Withdrawal';


  Excel::create($pagename, function($excel) use ($excelData,$pagename,$lastcell) {
  $excel->sheet('mySheet', function($sheet) use ($excelData,$pagename,$lastcell)
  {
  $sheet->fromArray($excelData);
  
  $sheet->cell('A1:P1', function($cell)
  {
  $cell->setFontSize(11);
  $cell->setBackground('#7cde9c');
  $cell->setFontWeight('bold');
  $cell->setAlignment('left');

  });
  $sheet->setFreeze('A2');
  $sheet->prependRow(1, array("TCN  WITHDRAWAL DETAILS"));



  $sheet->mergeCells('A1:P1');
  $sheet->cell('A1:P1', function($cell) 
  {
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

}


//************************PDF DOWNLOAD TCN WITHDRAWAL***************************
public function PDF($id)
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



  $pdf =PDF::loadView('admin.withdraw.pdf.tcnwithdrawalpdf',compact('tcnrequests','banks','address','members','withDraws'));
  return $pdf->stream();
}



public function store(Request $request)
{


  //*************************STORE NEW TCN FULL WITHDRAWAL REQUEST***************************

  if(Auth::guard('admin')->check())
  $LogInId=Auth::guard('admin')->user()->id;

  $tcn=tcnRequest::find($request->tcnId);

  if($request->currencyType=='INR')
  $inrAmount=$request->amount;
  else
  {
  $perUnit=$tcn->inrAmount/$tcn->unit;
  $inrAmount=$request->availUnit*$perUnit;  
  }
  $withdraw = new withdrawalrequest;
  $withdraw ->tcnId=$request->tcnId;
  $withdraw ->userId=$request->userId;
  $withdraw ->unit=$request->unit;
  $withdraw ->currencyType=$request->currencyType;
  $withdraw ->amount=$request->amount;
  $withdraw ->inrAmount=$inrAmount;
  $withdraw ->appliedDate=date('Y-m-d H:i:s');
  $withdraw ->appliedId=$LogInId;
  $withdraw ->approvalDate=date('Y-m-d H:i:s');
  $withdraw ->type=$request->type;
  $withdraw ->save();
  $id=$withdraw->id;

  Alert::success('TCN WidtDrawal Request Created Successfully', 'Success!');

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


  $dateTime=date('Y-m-d H:i:s'); 
  $date=date('Y-m-d');

  $update2 = DB::table('withdrawalrequests')->where('id', $request->withDrawId)->update([
  'status' => 'Paid', 
  'approvalId' => $LogInId, 
  'approvalDate' => $dateTime, 
  'approvalBy' => $request->approveDeclineBy, 
  'formReceivedBy' => $request->formReceivedBy, 
  'paymentMadeBy' => $request->paymentMadeBy, 
  'withDrawAppliedDate' => date('Y-m-d',strtotime($request->wdappliedDate)), 
  'withDrawPayedDate' => date('Y-m-d',strtotime($request->wdpayedDate)), 

  'bank' => $request->bank,
  'online' => $request->online,
  'debitAccountNo' => $request->debitAccountNo, 
  'chequeNo' => $request->chequeNo,
  'remarks' => $request->remarks]);

    $tcnId=$request->tcnId;
  $update1 = DB::table('tcnrequests')->where('id', $tcnId)->update(['status'=>'Removed','approvalDate'=>$dateTime,'approvalId' => $LogInId, 'withDrawStatus'=>'1','reason'=>'This TCN is  full WithDrawn Completed ']);

  Alert::success('TCN WithDrawal Paid Details Saved Successfully', 'Success');

  $id=$request->withDrawId;

  $user   =Controller::UserDetails($id);
  $to     =$user->email;
  $data   =[
  'name' => $user->name
  ];


  Mail::send('admin.mail.fullWithDrawal', compact('data'), function ($message) use ($to) {

      $message->from('heeraerptl@gmail.com', 'HEERA ERP');

      $message->to($to)->subject('Your TCN withdrawal request is approved');
  });

  return View('admin.withDraw.tcnWithDraw.tcnwithdrawalpdf',compact('id'));


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
