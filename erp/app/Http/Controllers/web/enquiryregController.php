<?php
namespace App\Http\Controllers\web;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Support\Facades\Session;
use App\enquiryreg;
use App\categorymaster;
use App\tcnrequest;
use App\memberregistration;
use App\tcnmaster;
use DB;
use Auth;
class enquiryregController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    $categorymaster = categorymaster::all();

    return view('web.enquiry.enquiryreg',compact('categorymaster'));

     }
   

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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
        return redirect()->back();


    }
   
   
    public function report()
    {       
       return view('web.enquiry.enquiry_report');  
              
    }

    public function reportview(Request $request)
    {   
        $from = date("Y-m-d",strtotime($request->date));
        $to = date("Y-m-d",strtotime($request->date1));
        $code=Auth::guard('user')->user()->username; 
        $status=$request->status;
        $report=\DB::table('enquiryregs')->where('status','=',$status)
        ->where('membercode','=',$code)
        ->whereBetween('created_at',[$from,$to])
        ->get();
        return view('web.enquiry.enquiry_report',compact('report'));
    }



}
