<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\enquiryreg;
use App\categorymaster;
use App\tcnrequest;
use App\memberregistration;
use App\tcnmaster;
use DB;
use Auth;
use Mail;
use App\User;
use App\Notifications\EnquiryAssigned;
use Illuminate\Support\Facades\Notification;

class enquiryregController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    /*  $enquiryreg = enquiryreg::all();
    return view('admin.enquiry.enquiryreg');*/
    $categorymaster = categorymaster::all();

    return view('admin.enquiry.enquiryreg',compact('categorymaster'));

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
        $enquiryreg = new enquiryreg();
        $this->validate($request,[
        'category'=>'required',
        'description'=>'required',
        'membercode'=>'required',
        'suggestion'=>'required',
        'name'=>'required',
        'email'=>'required',
        'mobile'=>'required',
        'date'=>'required',

        ]);
        $member=\DB::table('memberregistrations')->where('code',$request->membercode)->get();
        if($member->isEmpty()){
        Session::flash('message', 'Member code does not exist!'); 
        }else{
        $enquiryreg->category = $request->category;
        $enquiryreg->description= $request->description;
        $enquiryreg->membercode = $request->membercode;
        $enquiryreg->suggestion = $request->suggestion;
        $enquiryreg->name = $request->name;
        $enquiryreg->email = $request->email;
        $enquiryreg->mobile  = $request->mobile;
        $enquiryreg->date  = date("Y-m-d",strtotime($request->date));
        $enquiryreg->status ='open';
        $enquiryreg->save();
        Session::flash('message', 'Enquiry Registered Successfully!'); }
        return redirect('/admin/enquiryreg');
    }
       
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $assign=Auth::guard('admin')->user()->username;
        $login=\DB::table('logins')->where('username',$assign)->get();
        foreach($login as $logins)
        $type=$logins->userType;
        if($type=="OI"){

        $enquiryreg=\DB::table('enquiryregs')->where('status','open')
        ->join('categorymasters', 'enquiryregs.category', '=','categorymasters.id')
        ->select('categorymasters.category_name', 'enquiryregs.membercode','enquiryregs.date','enquiryregs.mobile','enquiryregs.email','enquiryregs.id') 
        ->get();

}
        /*   $enquiryreg = enquiryreg::where('status','open')->get();*/
        return view('admin.enquiry.enquiryregview',compact('enquiryreg'));
        //
    }

 public function solve()
    {
    /*    $enquiryreg = enquiryreg::where('status','close')->get();*/
        $assign=Auth::guard('admin')->user()->username;
        $login=\DB::table('logins')->where('username',$assign)->get();
        foreach($login as $logins)
        $type=$logins->userType;
        if($type=="OI"){
        $enquiryreg=\DB::table('enquiryregs')->where('status','close')
        ->join('categorymasters', 'enquiryregs.category', '=','categorymasters.id')
        ->select('categorymasters.category_name', 'enquiryregs.membercode','enquiryregs.date','enquiryregs.mobile','enquiryregs.email','enquiryregs.id') 
        ->get();
        }
        if($type=="EMP"){
        $enquiryreg=\DB::table('enquiryregs')->where('status','close')->where('assignedto',$assign)
        ->join('categorymasters', 'enquiryregs.category', '=','categorymasters.id')
        ->select('categorymasters.category_name', 'enquiryregs.membercode','enquiryregs.date','enquiryregs.mobile','enquiryregs.email','enquiryregs.id') 
        ->get();
        }

            return view('admin.enquiry.enquirysolveview',compact('enquiryreg'));
        //
    }


    public function solvedview()
    {

        $assign=Auth::guard('admin')->user()->username;
        $login=\DB::table('logins')->where('username',$assign)->get();
        foreach($login as $logins)
        $type=$logins->userType;
        if($type=="OI"){
        $enquiryreg=\DB::table('enquiryregs')->where('status','done')
        ->join('categorymasters', 'enquiryregs.category', '=','categorymasters.id')
        ->select('categorymasters.category_name', 'enquiryregs.membercode','enquiryregs.date','enquiryregs.mobile','enquiryregs.email','enquiryregs.id','enquiryregs.solveddescription','enquiryregs.solvedby') 
        ->get();
        }
        if($type=="EMP"){
        $enquiryreg=\DB::table('enquiryregs')->where('status','done')->where('solvedby',$assign)
        ->join('categorymasters', 'enquiryregs.category', '=','categorymasters.id')
        ->select('categorymasters.category_name', 'enquiryregs.membercode','enquiryregs.date','enquiryregs.mobile','enquiryregs.email','enquiryregs.id','enquiryregs.solveddescription','enquiryregs.solvedby') 
        ->get();
        }

            return view('admin.enquiry.viewsolvedenquiry',compact('enquiryreg'));
        //
    }



    public function view($id)
    {
     /*  $enquiryId=$id;
       $enquiryreg = enquiryreg::where('id', $id)->get();*/
        $enquiryId=$id;
        $enquiryreg=\DB::table('enquiryregs')->where('enquiryregs.id','=',$id)
        ->join('categorymasters', 'enquiryregs.category', '=','categorymasters.id')
        ->select('categorymasters.category_name','categorymasters.employee_code','enquiryregs.id', 'enquiryregs.membercode','enquiryregs.date','enquiryregs.mobile','enquiryregs.email','enquiryregs.status','enquiryregs.description','enquiryregs.suggestion','enquiryregs.name') 
        ->get();

        return view('admin.enquiry.enquiryhandling',compact('enquiryreg','enquiryId'));
        //
    }  

    public function solveview($id)
    {

        $enquiryId=$id;
        //$enquiryreg = enquiryreg::where('id', $id);
        $enquiryreg=\DB::table('enquiryregs')->where('enquiryregs.id','=',$id)
        ->join('categorymasters', 'enquiryregs.category', '=','categorymasters.id')
        ->select('categorymasters.category_name','categorymasters.employee_code','enquiryregs.id', 'enquiryregs.membercode','enquiryregs.date','enquiryregs.mobile','enquiryregs.email','enquiryregs.status','enquiryregs.description','enquiryregs.suggestion','enquiryregs.name') 
        ->get();
        return view('admin.enquiry.enquirysolving',compact('enquiryreg','enquiryId'));
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
        //
    }


    public function insert(Request $request)
    {
         
      /*  return $request->enquiryid;*/
        $assignby=Auth::guard('admin')->user()->username; 
        $enquiryreg = enquiryreg::find($request->enquiryid);
        
      /*  $this->validate($request,[
             'assignedto'=>'required|unique:enquiryregs'
            ]);*/
        $enquiryreg->assignedby=$assignby;
        $enquiryreg->assignedto=$request->assignedto;
        $enquiryreg->status ='close';
        $enquiryreg->save();
        Session::flash('message', 'Enquiry Assigned Successfully!'); 
        $notification_users=User::whereIn('username',[$request->assignedto,$assignby])->get();
        Notification::send($notification_users,new EnquiryAssigned($enquiryreg,
            ['url'=>'/admin/enquirysolving/'.$enquiryreg->id]));
        return redirect('/admin/enquiryregview');

    }
    
    public function insertsolve(Request $request)
    {
      /*  return $request->enquiryid;*/
       
        $solveby=Auth::guard('admin')->user()->username;
        $enquiryreg = enquiryreg::find($request->enquiryid);
        $this->validate($request,[
        'solveddescription'=>'required'
        ]);
        $enquiryreg->solveddescription=$request->solveddescription;
        $enquiryreg->status ='done';
        $enquiryreg->solvedby =$solveby;
        $enquiryreg->save();
        Session::flash('message', 'Enquiry Solved Successfully!');
        $data = array(
            'name' => "Learning Laravel",
        );

    // Mail::send('admin.enquiry.enquiryreg2', $data, function ($message) {

    //     $message->from('heeraerptl@gmail.com', 'Learning Laravel');

    //     $message->to('phpdiniya@gmail.com')->subject('Enquiry Handling');

    // }); 
        return redirect('/admin/enquirysolveview');
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
        /*$enquiryregs = enquiryreg::find($id);
        $enquiryregs->delete();
        return redirect('/enquiryregview');*/
    }


    public function display(Request $request)
    {

        $code=$request->id;
        $tcn=DB::table('memberregistrations')->where('code','=',$code)
        ->join('tcnrequests', 'tcnrequests.userId', '=','memberregistrations.userId')->where('status','=','pending')
        ->join('tcnmasters','tcnrequests.tcn_id','=','tcnmasters.id')
        ->select('tcnrequests.id','tcnmasters.tcnType','tcnrequests.unit','tcnrequests.amount','tcnrequests.currencyType','tcnrequests.addedDate')
        ->get();

        $tcn1=DB::table('memberregistrations')->where('code','=',$code)
        ->join('tcnrequests', 'tcnrequests.userId', '=','memberregistrations.userId')->where('status','=','Approved')
        ->join('tcnmasters','tcnrequests.tcn_id','=','tcnmasters.id')
        ->select('tcnrequests.id','tcnmasters.tcnType','tcnrequests.unit','tcnrequests.amount','tcnrequests.currencyType','tcnrequests.addedDate')
        ->get();

        $tcn2=DB::table('memberregistrations')->where('code','=',$code)
        ->join('withdrawalrequests','withdrawalrequests.userId','=','memberregistrations.userId')->where('type','=','Normal Withdrawal')
        ->join('tcnrequests', 'withdrawalrequests.tcnId', '=','tcnrequests.id')
        ->join('tcnmasters','tcnrequests.tcn_id','=','tcnmasters.id')
        ->get();

        $tcn3=DB::table('memberregistrations')->where('code','=',$code)
        ->join('withdrawalrequests','withdrawalrequests.userId','=','memberregistrations.userId')->where('type','=','Partial Withdrawal')
        ->join('tcnrequests', 'withdrawalrequests.tcnId', '=','tcnrequests.id')
        ->join('tcnmasters','tcnrequests.tcn_id','=','tcnmasters.id')
        ->get();

        $tcn4=DB::table('memberregistrations')->where('code','=',$code)
        ->join('tcnrequests', 'tcnrequests.userId', '=','memberregistrations.userId')->whereNotNull('transferredId')->where('status','=','transfered')
        ->join('tcnmasters','tcnrequests.tcn_id','=','tcnmasters.id')
        ->select('tcnrequests.id','tcnmasters.tcnType','tcnrequests.unit','tcnrequests.amount','tcnrequests.currencyType','tcnrequests.addedDate')
        ->get();   

        return view('admin.enquiry.ajax_View',compact('tcn','tcn1','tcn2','tcn3','tcn4'));
    }

    public function pendingtcn($tcn)
    {

        $tcn1=DB::table('tcnrequests')->where('tcnrequests.id','=',$tcn)
        ->join('memberregistrations', 'tcnrequests.userId', '=','memberregistrations.userId')->get();
      /*  ->join('nominees','nominees.id', '=','tcnrequests.nominee1_id')
        ->join('addresses', 'nominees.addressId', '=','addresses.id')*/
      /*  ->get();*/
        foreach($tcn1 as $data)
        $paymentid=$data->paymentId;
        $user=$data->userId;
        $nominee1=$data->nominee1_id;
        $nominee2=$data->nominee2_id;
        $tcn2=DB::table('paymentdetails')->where('id','=',$paymentid)->get();
        $tcn3=DB::table('nominees')->where('nominees.id','=',$nominee1)
        ->join('addresses', 'nominees.addressId', '=','addresses.id')->get();
        $tcn4=DB::table('nominees')->where('nominees.id','=',$nominee2)
        ->join('addresses', 'nominees.addressId', '=','addresses.id')->get();
        return view('admin.enquiry.pending_tcn',compact('tcn1','tcn2','tcn3','tcn4'));

        //
    }  
    public function report()
    {       
        return view('admin.enquiry.enquiry_report');
              
    }


    public function reportview(Request $request)
    {   

        $from = date("Y-m-d",strtotime($request->date));
        $to = date("Y-m-d",strtotime($request->date1));
        $code=$request->member_code;
        $status=$request->status;

        if(!empty($from && $to && $code && $status))
        {
            $report=\DB::table('enquiryregs')->where('status','=',$status)
            ->where('membercode','=',$code)
            ->whereBetween('created_at',[$from,$to])
            ->get();
        }

        if(empty($from && $to && $code) && !empty($status)) 
        {
           $report=\DB::table('enquiryregs')->where('status','=',$status)->get();
        }

        if(empty($from && $to) && !empty($code && $status)) 
        {
             $report=\DB::table('enquiryregs')->where('status','=',$status)->where('membercode','=',$code)->get();
        }

        return view('admin.enquiry.enquiry_report',compact('report'));
    }


}
