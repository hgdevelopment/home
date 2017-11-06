<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\memberregistration;
use App\country;
use App\nominee;
use App\tcnmaster;
use App\tcnrequest;
//use PDF;
class pageController extends Controller
{
    //
    public $user;

    public function __construct(){
       
    }
    public function index(){
        
    	$this->user = Auth::guard('user')->user();

         $userProfile=memberregistration::where('userId', $this->user->id)->first();
        $tcnStatus=tcnrequest::all()->where('userId',$this->user->id)->groupBy('status');
        // $bank = memberregistration::with('country')->get();
    	 return view('web.member.index',compact('userProfile','tcnStatus'));
    }
    public function profile(){
         $listTypes= ['country'=>country::all(),
                     'proof_type'=>['aadhar', 'license', 'pancard', 'passport','VoterId'],
                     'caste'=>['General','OBC','BC','OC','SC','ST'],
                     'occupation'=>['Business','Salaried','Student','Housewife','Other'],
                     'education'=>['NON-SSC','SSC-HSC','Undergraduate','Postgraduate','SelfEmployed/Professional']];

    	 $this->user = Auth::guard('user')->user();
    	  $userProfile=memberregistration::where('userId', $this->user->id)->with('country','address','proof')->first();
          $tcnStatus=tcnrequest::all()->where('userId',$this->user->id)->groupBy('status');
    	return view('web.member.profile',compact('userProfile','listTypes','tcnStatus'));
    	
    }
    public function tcn(){
        $this->user = Auth::guard('user')->user();

        $userProfile=memberregistration::where('userId', $this->user->id)->first();
        $tcnStatus=tcnrequest::all()->where('userId',$this->user->id)->groupBy('status');
        //pending
        $pendinglist=new tcnrequest;
        $pendinglist=$pendinglist->where('userId',$this->user->id)->where('status','Pending')->with('tcn')->paginate(8,['*'],'pending');
        //active
        $activelist =new tcnrequest;
        $activelist=$activelist->where('userId',$this->user->id)->where('status','Approved')->with('tcn')->paginate(8,['*'],'active');
        //denied
        //active
        $deniedlist =new tcnrequest;
        $deniedlist=$deniedlist->where('userId',$this->user->id)->where('status','Denied')->with('tcn')->paginate(8,['*'],'denied');

        return view('web.member.tcn.tcninfo',compact('userProfile','tcnStatus','pendinglist','activelist','deniedlist'));
        
    }
    public function tcndetails($id){
         $listTypes= ['country'=>country::all(),
                     'proof_type'=>['aadhar', 'license', 'pancard', 'passport','VoterId'],
                     'caste'=>['General','OBC','BC','OC','SC','ST'],
                     'occupation'=>['Business','Salaried','Student','Housewife','Other'],
                     'education'=>['NON-SSC','SSC-HSC','Undergraduate','Postgraduate','Professional']];

         $this->user = Auth::guard('user')->user();
        $userProfile=memberregistration::where('userId', $this->user->id)->with('country','address','proof')->first();

        $tcnStatus=tcnrequest::all()->where('userId',$this->user->id)->groupBy('status');

        $tcnDetails=tcnrequest::find($id);

        return view('web.member.tcn.tcninfoview',compact('userProfile','listTypes','tcnStatus','tcnDetails'));
        
    }

    
}
