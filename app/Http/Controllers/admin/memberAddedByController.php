<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\memberregistration;
use App\address;
use App\proofs;
use App\tcnrequest;
use App\tcnmaster;
use App\withdrawalrequest;
use App\login; 
use App\country;
use Auth;
use DB;
use Carbon\Carbon;

class memberAddedByController extends Controller
{
    
     public function index()
    {
    	$addedmember= memberregistration::where('addedById',Auth::guard('admin')->user()->id)->orderBy('id', 'desc')->get();

    	return view("admin.members.memberAddedBy",compact('addedmember'));
    	
    }

     public function show($id)
    {

        $member = memberregistration::where('userId',$id)->first();
        $address = address::where('userId',$id)->get();
        $proof = proofs::where('userId',$id)->first();
        $login = memberregistration::join('logins','logins.id','=','userId')->get();
        $countryname = memberregistration::join('countries','countries.id','=','memberregistrations.countryId')
        ->select('countries.countryName as countryNames')
        ->where('userId',$id)
        ->first();
        $countryaddress = address::join('countries','countries.id','=','Country')
        ->select('countries.countryName as Names','addresses.typeOfAddress as type')
        ->where('userId', $id)
        ->get();
         $similarrecords=memberregistration::join('logins','memberregistrations.userId','=','logins.id')
        ->select('logins.username as uname','logins.status as logstatus','memberregistrations.*')
        ->where('memberregistrations.name','=',$member->name)
        ->where('memberregistrations.gender','=',$member->gender)
        ->where('memberregistrations.userId','!=',$id)
        ->get();
        return view('admin.members.memberAddedbyView',compact('member','address','proof','login','countryname','countryaddress','similarrecords'));
    }

    public function memberAccount(Request $request)
    {   

        $tcnactive=tcnrequest::where('userId',$request->id)->where('status','Approved')->get();
        $tcnpending=tcnrequest::where('userId',$request->id)->where('status','Pending')->get();
        $tcnwithdrawal=withdrawalrequest::where('userId',$request->id)->where('type','=','Normal Withdrawal')->get();
        $tcnpartial=withdrawalrequest::where('userId',$request->id)->where('type','=','Partial Withdrawal')->get();
        return view('admin.members.memberAccountDetails',compact('tcnpending','tcnactive','tcnwithdrawal','tcnpartial'));
    }

}

    
   
