<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\Notifications\TcnApplication;
use Illuminate\Support\Facades\Notification;use App\tcnrequest;
use Illuminate\Support\Facades\Route;
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

use Auth;
use Session;
use DataTables;
use Carbon;
use DB;
use Alert;
use Mail;
class tcnRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.tcn.tcnrequest.tcnRequest'); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $logins=Auth::guard('admin')->user();

        if(Auth::guard('admin')->check())
        $LogInId=$logins->id;
        else
        $LogInId=0;

          $date=date('Y-m-d');
          $dateTime=date('Y-m-d H:i:s');



          /**************************TCN REQUEST PAGE**************************/
        if($request->process=='getMember')
        {
            $data=array();
            $table =DB::table('memberregistrations')->join('logins','logins.id','=','memberregistrations.userId')->where('logins.username',$request->userCode)->where('logins.status','Active')->get();
            $data['memCount']=count($table);

            if($data['memCount']==1)
            {
            foreach ($table as $table)
            $data['email']=$table->email;
            $data['userId']=$table->userId;
            $data['tcnCount']=tcnrequest::join('logins','logins.id','=','tcnrequests.userId')->where('logins.username', $request->userCode)->where('addedDate', date('Y-m-d'))->count();
            $data['userCode']=$request->userCode;
            }
            return $data;

        }  

          /**************************CALCULATE TCN UNIT/AMOUNT**************************/

        if($request->process=='calcAmount')
        {   
                $table = tcnmaster::find($request->id);
                if($request->currencyType=='INR') return $table->inr; 
                if($request->currencyType=='USD') return $table->usd;
                if($request->currencyType=='AED') return $table->aed;
                if($request->currencyType=='SAR') return $table->sar;
                if($request->currencyType=='CAD') return $table->cad;
        }



        /**************************DELETE TCN  Request**************************/

        if($request->process=='RequestResponse')
        {   
            $delete=tcnRequest::where('id',$request->id)->delete();
            return;
        }



        if($request->process=='heeraAccountCheck')
        {
            $currencyType=strtolower($request->currencyType);

        $table = DB::table('tcn_allots')->join('banks','banks.id','=','tcn_allots.account_id')->where('tcn_allots.tcn_id', $request->tcnType)->where('currency_type',$currencyType)->get();
        foreach ($table as $table)
            $data['heeraAccountId']=$table->account_id;
            $data['heeraAccountNumber']=$table->accountNumber;
            $data['bankName']=$table->bankName;
            $data['accountHolderName']=$table->accountHolderName;
            $data['ifsc']=$table->ifsc;
        return $data; 

        }

        // if($request->process=='checkTCN')
        // {

        //     return $data=tcnrequest::where('tcn_id', $request->tcnType)->where('userId', $request->userId)->whereNotIn('status',['Removed','Denied'])->count();
        // }
    }



    public function store(Request $request)
    {
    $logins=Auth::guard('admin')->user();

    if(Auth::guard('admin')->check())
    $LogInId=$logins->id;
    else
    $LogInId=0;

    $tcnPlusId=tcnrequest::max('id');
    if($tcnPlusId<1)
        $tcnPlusId='1';
    else
        $tcnPlusId=$tcnPlusId+1;

        $tcnNo=$tcnPlusId+1000000;
   
    $tcnrequest = new tcnrequest;
    $tcnrequest->tcnNo=$tcnNo;
    $tcnrequest->tcnCode='TCN'.$tcnNo;
    $tcnrequest->userId=$request->userId;
    $tcnrequest->currencyType=$request->currencyType;
    $tcnrequest->unit=$request->unit;
    $tcnrequest->amount=$request->amount;
    $tcnrequest->paymentMode=$request->paymentMode;
    $tcnrequest->heeraAccountId=$request->heeraAccountId;
    $tcnrequest->applyingFrom=$request->applyingFrom;
    $tcnrequest->addedId=$LogInId;
    $tcnrequest->addedDate=date('Y-m-d');
    $tcnrequest->approvalId='0';
    $tcnrequest->tcn_id=$request->tcnType;
    $tcnrequest->save();
    $id=$tcnrequest->id;
    
    session()->flash('message','TCN Request Created Successfully');
    session()->flash('memberCode',$request->userCode1);
    session()->flash('email',$request->email);
    session()->flash('tcnCode','TCN'.$tcnNo);
    session()->flash('accountNumber',$request->heeraAccountNumber);
    session()->flash('bankName',$request->bankName);
    session()->flash('accountHolderName',$request->accountHolderName);
    session()->flash('ifsc',$request->accountHolderName);

        $username=User::find($request->userId);
        $type='TCN REQUEST';
        $report='This member is sent a new tcn request.   username: '. $username->username;
        Controller::logReport($type,$report);

    return redirect('admin/tcnRequest');
    }



    public function show($id)
    {
        
        return view('admin.tcn.tcnrequest.tcnRequestList');
    }



    public function edit($id)
    {
        
    }


    public function update(Request $request, $id)
    {
        //
    }



    public function destroy(Request $request)
    {
        return 1;
    }
    public function listTcnNotConfirmDataTable(){

        $reports=tcnRequest::join('memberregistrations As mem','mem.userId','=','tcnrequests.userId')->join('logins','logins.id','=','mem.userId')->where('tcnrequests.status','notConfirm')->select('mem.*','tcnrequests.*','tcnrequests.id as tcnId')->get();

        return DataTables::of($reports)
        ->addColumn('tcn_type', function ($report) {
                return $report->tcn->tcnType;  })
        ->addColumn('action', function ($report) {
                 return '<a onclick="RequestResponse('.$report->tcnId.')" ><i class="glyphicon glyphicon-remove text-danger"></i></a>';  })
        ->editColumn('addedDate',function($report){ return date('d-m-Y',strtotime($report->addedDate));})
        ->make(true);
            

    }


}
