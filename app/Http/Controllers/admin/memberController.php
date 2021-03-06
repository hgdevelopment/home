<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\country;
use App\memberregistration;
use App\login;
use App\address;
use App\proofs;
use App\dsa;
use App\bank;
use Carbon\Carbon;
use Auth;
use DB; 
use Mail;
use PDF;

class memberController extends Controller
{ 
/**
* Display a listing of the resource.
*
* @return \Illuminate\Http\Response
*/
public function index()
{ 
    return view('admin.members.index');
}

/** 
* Show the form for creating a new resource.
*
* @return \Illuminate\Http\Response
*/
public function create()
{
    $listTypes= ['country'=>country::all(),
    'proof_type'=>['aadhar', 'license', 'pancard', 'passport','VoterId'],
    'caste'=>['General','OBC','BC','OC','SC','ST'],
    'occupation'=>['Business','Salaried','Student','Housewife','SelfEmployed/Professional','Retired'],
    'education'=>['NON-SSC','SSC-HSC','Graduate','Postgraduate']];

    

    return view('admin.members.createdMember',compact('listTypes'));
}

public function memberCreate()
{   

    if(Controller::userAccessRights('Add Members')!=1)
        return redirect('/');
        
    $listTypes= ['country'=>country::all(),
    'proof_type'=>['aadhar', 'license', 'pancard', 'passport','VoterId'],
    'caste'=>['General','OBC','BC','OC','SC','ST'],
    'occupation'=>['Business','Salaried','Student','Housewife','SelfEmployed/professional','Retired'],
    'education'=>['NON-SSC','SSC-HSC','Graduate','Postgraduate']];

    $dsa=dsa::join('logins','logins.id','=','userId')
    ->select('logins.id as code','dsas.*')
    ->where('status','=','Active')
    ->where('userType','=','DSA')
    ->get();

    $me=dsa::join('logins','logins.id','=','userId')
    ->select('logins.id as code','dsas.*')
    ->where('userType','=','ME')
    ->get();

    //$me=login::where('userType','=','ME')->get();

    $captcha = $this->captcha();

    return view('admin.members.createdMember',compact('listTypes','dsa', 'captcha','me'));
}

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */

public function store(Request $request)
{
    $login = new login;
    $memberregistration = new memberregistration;
    $address = new address;
    $address_per = new address;
    $address_corr = new address;
    $proofs = new proofs;
    $bank = new bank;

    $this->validate($request,[
    'fullname'=>'required',
    'guardian'=>'required',
    'dateofbirth'=>'required',
    'gender'=>'required',
    'religion'=>'required',
    'country'=>'required', 
    'income'=>'required|numeric',
    'incomeid'=>'required',
    'marital'=>'required',
    'mobileno'=>'required|numeric', 
    'conId1'=>'required',
    'aboutheera'=>'required',
    'email'=>'required|email',
    'profilepic'=>'required|image:jpg,png,jpeg',
    'signature'=>'required|image:jpg,png,jpeg',

    'permanent_addr'=>'required',
    'permanent_city'=>'required',
    'permanent_state'=>'required',
    'permanent_country'=>'required',
    'permanent_pin'=>'required|numeric',

    'correspondance_addr'=>'required',
    'correspondance_city'=>'required',
    'correspondance_state'=>'required',
    'correspondance_country'=>'required',
    'correspondance_pin'=>'required|numeric',

    'type_of_proof'=>'required',
    'proof_file'=>'required|image:jpg,png,jpeg',
    'iagree'=>'required',

    ]); 

    $code_member='APPNO'.$this->prefix_generate();
    $login->username=$code_member;
    $login->password=Hash::make('MEM'); 
    $login->userType='MEM';
    $login->status='Not confirm';
    $login->save();
    $userId=$login->id; 

    //photo upload   
    $profilepic = 'HEERA'.time().'.'.$request->profilepic->getClientOriginalExtension();
    $request->profilepic->move(storage_path('img/member_img'), $profilepic);

    //siganture
    $signature = 'SIGNATURE'.time().'.'.$request->signature->getClientOriginalExtension();
    $request->signature->move(storage_path('img/member_img'), $signature);

    //proofs
    $proof_file = 'PROOF'.time().'.'.$request->proof_file->getClientOriginalExtension();
    $request->proof_file->move(storage_path('img/proof'), $proof_file);

    if(Auth::guard('admin')->check())
    $login_id=Auth::guard('admin')->user()->id;
    else
    $login_id=0;

    if($request->assign_member=='Myself')
    {
     $addedById=$login_id;
     $addedByUnder=Auth::guard('admin')->user()->userType;
    }
    else if($request->assign_member=='DSA')
    {
        $addedById=$request->dsaname;
     $addedByUnder=$request->assign_member;
    }
    else if($request->assign_member=='ME')
    {
        $addedById=$request->mename;
        $addedByUnder=$request->assign_member;

    }    

    $memberregistration->userId=$userId;
    $memberregistration->code=$code_member;
    $memberregistration->name=$request->fullname; 
    $memberregistration->religion=$request->religion;
    $memberregistration->noOfChildren=$request->childrens;
    $memberregistration->guardian=$request->guardian;
    $memberregistration->caste=$request->caste;
    $memberregistration->countryId=$request->country;
    $memberregistration->dob=date("Y-m-d", strtotime($request->dateofbirth));
    $memberregistration->education=$request->education;
    $memberregistration->mobileNo=$request->mobileno;
    $memberregistration->mobileId=$request->conId1;
    $memberregistration->maritalStatus=$request->marital;
    $memberregistration->occupation=$request->occupation;
    $memberregistration->email=$request->email;
    $memberregistration->aboutHeera=$request->aboutheera;
    $memberregistration->gender=$request->gender;
    $memberregistration->LandlineNo=$request->landlineno;
    $memberregistration->photo=$profilepic;
    $memberregistration->singnature=$signature;
    $memberregistration->addedByUnder=$addedByUnder;
    $memberregistration->addedByDate=Carbon::now()->format('Y-m-d');
    $memberregistration->incomeAmount=$request->income;
    $memberregistration->addedById=$addedById;
    $memberregistration->addedId=$login_id;
    $memberregistration->incomeCurrencytype=$request->incomeid;
    $memberregistration->reference='';
    $memberregistration->membership_details=json_encode(['inr'=>['type'=>$request->type_amount_inr,'amount'=>$request->amount_inr],
            'aed'=>['type'=>$request->type_amount_aed,'amount'=>$request->amount_aed],
            'usd'=>['type'=>$request->type_amount_usd,'amount'=>$request->amount_usd],
            'sar'=>['type'=>$request->type_amount_sar,'amount'=>$request->amount_sar],
            'cad'=>['type'=>$request->type_amount_cad,'amount'=>$request->amount_cad]
            ]);
    $memberregistration->save();

    $address_per->userId=$userId;
    $address_per->address=$request->permanent_addr;
    $address_per->city=$request->permanent_city;
    $address_per->state=$request->permanent_state;
    $address_per->Country=$request->permanent_country;
    $address_per->pin=$request->permanent_pin;
    $address_per->typeOfAddress='permanent';
    $address_per->save();

    $address_corr->userId=$userId; 
    $address_corr->address=$request->correspondance_addr;
    $address_corr->city=$request->correspondance_city;
    $address_corr->state=$request->correspondance_state;
    $address_corr->Country=$request->correspondance_country;
    $address_corr->pin=$request->correspondance_pin;
    $address_corr->typeOfAddress='correspondance';
    $address_corr->save();

    $address->userId=$userId;
    $address->address=$request->official_addr;
    $address->city=$request->official_city;
    $address->state=$request->official_state;
    $address->Country=$request->official_country;
    $address->pin=$request->official_pin;
    $address->typeOfAddress='official';
    $address->save();

    $proofs->userId=$userId;
    $proofs->typeOfProof=$request->type_of_proof;
    $proofs->proofNumber=$request->proof_number;
    $proofs->file=$proof_file;
    $proofs->save();
    return redirect('/admin/member/createdMemberView/'.$userId.'');
}

    /**
    * Display the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
public function show($id)
{

    $this->prefix_generate();
     $viewmember = memberregistration::join('logins','logins.id','=','userId')
    ->select('logins.username as code','memberregistrations.*')
    ->where('memberregistrations.userId','=',$id)
    ->first();  
    $viewmemb = memberregistration::join('addresses','addresses.userId','=','memberregistrations.userId')
    ->where('addresses.userId', $id)
    ->orWhereNull('addresses.userId') 
    ->get();  //for null values
    $viewmem = memberregistration::join('proofs','proofs.userId','=','memberregistrations.userId')
    ->where('proofs.userId', $id)
    ->first();
    $countrys = memberregistration::join('countries','countries.id','=','memberregistrations.countryId')
    ->select('countries.countryName as countryNames')
    ->where('userId', $id)
    ->first();
    $countryname = address::join('countries','countries.id','=','Country')
    ->select('countries.countryName as Names','addresses.typeOfAddress as type')
    ->where('userId', $id)
    ->get();
    $country = country::all();

    $similarrecords=memberregistration::join('logins','memberregistrations.userId','=','logins.id')
    ->select('logins.username as uname','logins.status as logstatus','memberregistrations.*')
    ->where('memberregistrations.name','=',$viewmember->name)
    ->where('memberregistrations.gender','=',$viewmember->gender)
    ->where('memberregistrations.userId','!=',$id)
    ->get();

    return View("admin.members.memberReqView",compact('viewmember','viewmemb','viewmem','country','countrys','countryname','similarrecords'));
}

public function viewMember()
{

    $viewmember = memberregistration::join('logins','logins.id','=','userId')
    ->where('status','=','Pending')
    ->get();

    return view("admin.members.viewMemberRequest",compact('viewmember'));  
}

    /**
    * Show the form for editing the specified resource.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

public function edit($id)
{

    $viewmember = memberregistration::join('logins','logins.id','=','userId')
    ->select('logins.username as code','memberregistrations.*')
    ->where('memberregistrations.userId','=',$id)
    ->first();    
    $viewmemb = memberregistration::join('addresses','addresses.userId','=','memberregistrations.userId')
    ->where('addresses.userId', $id)
    ->get();
    $viewmem = memberregistration::join('proofs','proofs.userId','=','memberregistrations.userId')
    ->where('proofs.userId', $id)
    ->first();
    $countrys = memberregistration::join('countries','countries.id','=','memberregistrations.countryId')
    ->select('countries.countryName as countryNames')
    ->where('userId', $id)
    ->first();
    $country = country::all();

    return view("admin.members.editMemberReq",compact('viewmember','viewmemb','viewmem','countrys','country'));
}

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */

public function update(Request $request, $userId)
{

    $viewmembers= memberregistration::where('userId',$userId)->first();
    $proof = proofs::where('userId', $userId)->first();
    $add = address::where('typeOfAddress','=','official')->where('userId',$userId)->first();
    $address1 = address::where('typeOfAddress','=','permanent')->where('userId',$userId)->first();
    $address2 = address::where('typeOfAddress','=','correspondance')->where('userId',$userId)->first();

    if (!empty($request->photo)) 
    {
        $profilepic = 'Heera'.time().'.'.$request->photo->getClientOriginalExtension();
        $request->photo->move(storage_path('img/member_img'), $profilepic);
        $viewmembers->photo = $profilepic;
    }
    else
    {
        $viewmembers->photo = $request->photo_update;
    }
    if (!empty($request->signature)) 
    {
        $signature = 'SIGNATURE'.time().'.'.$request->signature->getClientOriginalExtension();
        $request->signature->move(storage_path('img/member_img'), $signature);
        $viewmembers->singnature = $signature;
    }
    else
    {
        $viewmembers->singnature = $request->sign_update;
    }
    if (!empty($request->idproof)) 
    {
        $idproofs = 'PROOF'.time().'.'.$request->idproof->getClientOriginalExtension();
        $request->idproof->move(storage_path('img/proof'), $idproofs);
        $proof->file = $idproofs;
    }
    else
    {
        $proof->file = $request->proof_update;
    }

    $type = array(
        "inr" => $request->inr,
        "aed" => $request->aed,
        "usd" => $request->usd,
        "sar" => $request->sar,
        "cad" => $request->cad
        );

    $viewmembers->name = $request->fullname;
    $viewmembers->guardian = $request->guardian;
    $viewmembers->religion = $request->religion;
    $viewmembers->caste = $request->caste;
    $viewmembers->dob = date("Y-m-d", strtotime($request->dateofbirth));
    $viewmembers->education = $request->education;
    $viewmembers->occupation= $request->occupation;
    $viewmembers->maritalStatus = $request->marital;
    $viewmembers->gender = $request->gender;
    $viewmembers->incomeAmount = $request->income;
    $viewmembers->incomeCurrencytype=$request->incomeid;
    $viewmembers->noOfChildren = $request->childrens;
    $viewmembers->countryId = $request->country;
    $viewmembers->mobileId = $request->conId1;
    $viewmembers->mobileNo = $request->mobileno;
    $viewmembers->LandlineNo = $request->landlineno;
    $viewmembers->aboutHeera = $request->aboutheera;
    $viewmembers->email = $request->email;
    $viewmembers->membership_details=json_encode(['inr'=>['type'=>$request->type_amount_inr,'amount'=>$request->amount_inr],
            'aed'=>['type'=>$request->type_amount_aed,'amount'=>$request->amount_aed],
            'usd'=>['type'=>$request->type_amount_usd,'amount'=>$request->amount_usd],
            'sar'=>['type'=>$request->type_amount_sar,'amount'=>$request->amount_sar],
            'cad'=>['type'=>$request->type_amount_cad,'amount'=>$request->amount_cad]
            ]);
    $viewmembers->save();

    //official
    $add->address = $request->official_addr;
    $add->city = $request->official_city;
    $add->state = $request->official_state;
    $add->Country=$request->official_country;
    $add->pin = $request->official_pin;
    $add->typeOfAddress = 'official';
    $add->save();

    //permanent
    $address1->address = $request->per_address;
    $address1->city = $request->per_city;
    $address1->state = $request->per_state;
    $address1->Country=$request->per_country;
    $address1->pin = $request->per_pin;
    $address1->typeOfAddress = 'permanent';
    $address1->save();

    //correspondance
    $address2->address = $request->corr_address;
    $address2->city = $request->corr_city;
    $address2->state = $request->corr_state;
    $address2->Country=$request->corr_country;
    $address2->pin = $request->corr_pin;
    $address2->typeOfAddress = 'correspondance';
    $address2->save();

    $proof->typeOfProof = $request->proofId;
    $proof->proofNumber = $request->proof_number;
    $proof->save();

    return redirect('/admin/member/viewMember');
}

    /**
    * Remove the specified resource from storage.
    *
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */


    public function pdfMember($id)
    {
        $memberregistration = memberregistration::where('userId',$id)->first();
        $pdf =PDF::loadView('admin.members.pdfs.members',compact('memberregistration'));
        return $pdf->stream();
    }

    public function viewpdf($id)
    {
        //$id=$id;
        return view('admin.members.pdfs.pdfview',compact('id'));
    }

public function destroy($userId)
{    


}

public function approveMember(Request $request)
{

    $id =  Auth::guard('admin')->user()->id;
    $userId = $request->userId;

    $logins = login::where('id','=',$userId)->first();

    $approvemember = memberregistration::where('userId','=',$userId)->first();

    $name=$approvemember->name;

    $password='M'.substr($approvemember->name,0,2).str_random(5);

    $approvemember->approvedDate = Carbon::now();  

    $ibg= $approvemember->id+1000000; 
    
    $approvemember->code = 'IBG'.$ibg;
    $approvemember->approvedId = $id;
    $approvemember->save();

    $logins->password= Hash::make($password);
    $logins->username ='IBG'.$ibg;
    $logins->status = 'Active';
    $logins->save(); 

    $username=$logins->username;
    //approve member email
    $data = array(
    'name' => $name,
    'password'=>$password,
    'username'=>$username
    );

    Mail::send('admin.mail.memberapprove', compact('data'), function ($message) use ($approvemember){
    $message->from('heeraerptl@gmail.com', 'Approve Member Request');
    $message->to($approvemember->email)->subject('HI! YOUR MEMBER REQUEST IS APPROVED');
    });

    // Mail::send('admin.mail.memberapprove', compact('data'), function ($message) {

    // $message->from('heeraerptl@gmail.com', 'Learning Laravel');

    // $message->to('domd047@gmail.com')->subject('Enquiry Handling');

    // });

    // return var_dump($data);
    return redirect('/admin/member/viewMember');
}

public function denyMember(Request $request)
{

    $id =  Auth::guard('admin')->user()->id;
    $Reason = $request->reason;  
    $denyreason = $request->denyreason; 
    $Re=implode(",",$Reason);
    $values=$Re. "," .$denyreason;
    $userId = $request->userId;
    $denymember = memberregistration::where('userId','=',$userId)->first();
    $logins = login::where('id','=',$userId)->first();

    $name=$denymember->name;
    $denymember->deniedDate = Carbon::now();
    $denymember->deniedId = $id;
    $denymember->deniedReason = $values;
    $denymember->save();

    $logins->status = 'Denied';
    $logins->save(); 

    $data = array(
    'name' => $name,
    'deniedReason'=>$values 
    );

    Mail::send('admin.mail.memberdeny', compact('data'), function ($message) use ($denymember){
    $message->from('heeraerptl@gmail.com', 'Member Request Denied');
    $message->to($denymember->email)->subject('SORRY! YOUR MEMBER REQUEST IS DENIED');
    });

}

public function blacklistMember(Request $request)
{

    $id =  Auth::guard('admin')->user()->id;
    $userId=$request->userId;
    $reason = $request->blacklistreason;
    $blacklistmember=memberregistration::where('userId','=',$userId)->first();
    $logins=login::where('id','=',$userId)->first();
    $blacklistmember->blockedId=$id;
    $blacklistmember->blockedreason = $reason;
    $blacklistmember->save();
    $logins->status='Block';
    $logins->save();   
}

//add member functions
public function createdview(Request $request)
{
    $id=$request->id;
    $member = memberregistration::where('userId',$id)->first();
    $memberaddress = address::where('userId',$id)->get();
    $memberproof = proofs::where('userId',$id)->first();
    $memberlogin = memberregistration::join('logins','logins.id','=','userId')->get();
    $countryname = memberregistration::join('countries','countries.id','=','memberregistrations.countryId')->select('countries.countryName as countryNames')->where('userId',$id)->first();
    $countryaddress = address::join('countries','countries.id','=','Country')->select('countries.countryName as Names','addresses.typeOfAddress as type')->where('userId', $id)->get();

    return view('admin.members.createdMemberView',compact('member','memberaddress','memberproof','memberlogin','countryname','countryaddress'));
}



public function editcreated($id)
{

     $memberedit = memberregistration::join('logins','logins.id','=','userId')
    ->select('logins.username as code','memberregistrations.*')
    ->where('memberregistrations.userId','=',$id)
    ->first();    
    $memberaddress = memberregistration::join('addresses','addresses.userId','=','memberregistrations.userId')
    ->where('addresses.userId', $id)
    ->get();
    $memberproof = memberregistration::join('proofs','proofs.userId','=','memberregistrations.userId')
    ->where('proofs.userId', $id)
    ->first();
    $membercountry = memberregistration::join('countries','countries.id','=','memberregistrations.countryId')
    ->select('countries.countryName as countryNames')
    ->where('userId', $id)
    ->first();
    $country = country::all();

    return view("admin.members.editCreatedMember",compact('memberedit','memberaddress','memberproof','membercountry','country')); 
}

public function createdupdate(Request $request, $userId)
{

    $membersave= memberregistration::where('userId',$userId)->first();
    $proof = proofs::where('userId', $userId)->first();
    $add = address::where('typeOfAddress','=','official')->where('userId',$userId)->first();
    $address1 = address::where('typeOfAddress','=','permanent')->where('userId',$userId)->first();
    $address2 = address::where('typeOfAddress','=','correspondance')->where('userId',$userId)->first();

    if (!empty($request->photo)) 
    {
        $profilepic = 'Heera'.time().'.'.$request->photo->getClientOriginalExtension();
        $request->photo->move(storage_path('img/member_img'), $profilepic);
        $membersave->photo = $profilepic;
    }
    else
    {
        $membersave->photo = $request->photo_update;
    }
    if (!empty($request->signature)) 
    {
        $signature = 'SIGNATURE'.time().'.'.$request->signature->getClientOriginalExtension();
        $request->signature->move(storage_path('img/member_img'), $signature);
        $membersave->singnature = $signature;
    }
    else
    {
        $membersave->singnature = $request->sign_update;
    }
    if (!empty($request->idproof)) 
    {
        $idproofs = 'PROOF'.time().'.'.$request->idproof->getClientOriginalExtension();
        $request->idproof->move(storage_path('img/proof'), $idproofs);
        $proof->file = $idproofs;
    }
    else
    {
        $proof->file = $request->proof_update;
    }

     $type = array(
        "inr" => $request->inr,
        "aed" => $request->aed,
        "usd" => $request->usd,
        "sar" => $request->sar,
        "cad" => $request->cad
        );

    $membersave->name = $request->fullname;
    $membersave->guardian = $request->guardian;
    $membersave->religion = $request->religion;
    $membersave->caste = $request->caste;
    $membersave->dob = date("Y-m-d", strtotime($request->dateofbirth));
    $membersave->education = $request->education;
    $membersave->occupation= $request->occupation;
    $membersave->maritalStatus = $request->marital;
    $membersave->gender = $request->gender;
    $membersave->incomeAmount = $request->income;
    $membersave->incomeCurrencytype=$request->incomeid;
    $membersave->noOfChildren = $request->childrens;
    $membersave->countryId = $request->country;
    $membersave->mobileId = $request->conId1;
    $membersave->mobileNo = $request->mobileno;
    $membersave->LandlineNo = $request->landlineno;
    $membersave->aboutHeera = $request->aboutheera;
    $membersave->email = $request->email;
    $membersave->membership_details=json_encode(['inr'=>['type'=>$request->type_amount_inr,'amount'=>$request->amount_inr],
            'aed'=>['type'=>$request->type_amount_aed,'amount'=>$request->amount_aed],
            'usd'=>['type'=>$request->type_amount_usd,'amount'=>$request->amount_usd],
            'sar'=>['type'=>$request->type_amount_sar,'amount'=>$request->amount_sar],
            'cad'=>['type'=>$request->type_amount_cad,'amount'=>$request->amount_cad]
            ]);
    $membersave->save();

    //permanent
    $address1->address = $request->per_address;
    $address1->city = $request->per_city;
    $address1->state = $request->per_state;
    $address1->Country=$request->per_country;
    $address1->pin = $request->per_pin;
    $address1->typeOfAddress = 'permanent';
    $address1->save();

    //correspondance
    $address2->address = $request->corr_address;
    $address2->city = $request->corr_city;
    $address2->state = $request->corr_state;
    $address2->Country=$request->corr_country;
    $address2->pin = $request->corr_pin;
    $address2->typeOfAddress = 'correspondance';
    $address2->save();

    //official
    $add->address = $request->official_addr;
    $add->city = $request->official_city;
    $add->state = $request->official_state;
    $add->Country=$request->official_country;
    $add->pin = $request->official_pin;
    $add->typeOfAddress = 'official';
    $add->save();

    $proof->typeOfProof = $request->proofId;
    $proof->proofNumber = $request->proof_number;
    $proof->save();

    return redirect('admin/member/createdMemberView/'.$userId.'');
}

public function viewcreated($userId)
{
 
    $login=login::where('id',$userId)->first();
    $login->status='Pending';
    $login->save();
    session()->flash('message','Registration Success');
    //Session::flash('message', 'Registration Success');
    return redirect('admin/member/pdfview/'.$userId);
}

//blacklist members functions
public function viewblacklistMember()
{

    $blacklistmember = memberregistration::join('logins','logins.id','=','userId')
    ->where('status','=','Block')
    ->get();

    return view("admin.members.viewBlacklistMember",compact('blacklistmember'));  
}

public function blacklistView($id)
{
    $blacklistmembers = memberregistration::where('userId',$id)->first();
    $blacklistaddress = address::where('userId',$id)->get();
    $blacklistproof = proofs::where('userId',$id)->first();
    $blacklistlogin = memberregistration::join('logins','logins.id','=','userId')->get();
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
    ->where('memberregistrations.name','=',$blacklistmembers->name)
    ->where('memberregistrations.gender','=',$blacklistmembers->gender)
    ->where('memberregistrations.userId','!=',$id)
    ->get();
 
    return view('admin.members.blacklistMemberView',compact('blacklistmembers','blacklistaddress','blacklistproof','blacklistlogin','countryname','countryaddress','similarrecords'));
}

public function editblacklist($id)
{

    $blacklistedit = memberregistration::join('logins','logins.id','=','userId')
    ->select('logins.username as code','memberregistrations.*')
    ->where('memberregistrations.userId','=',$id)
    ->first();    
    $blacklistaddress = memberregistration::join('addresses','addresses.userId','=','memberregistrations.userId')
    ->where('addresses.userId', $id)
    ->get();
    $blacklistproof = memberregistration::join('proofs','proofs.userId','=','memberregistrations.userId')
    ->where('proofs.userId', $id)
    ->first();
    $blacklistcountry = memberregistration::join('countries','countries.id','=','memberregistrations.countryId')
    ->select('countries.countryName as countryNames')
    ->where('userId', $id)
    ->first();
    $country = country::all();

    return view("admin.members.editBlacklistMember",compact('blacklistedit','blacklistaddress','blacklistproof','blacklistcountry','country'));
}

public function blacklistupdate(Request $request, $userId)
    {
    $blacklistmember= memberregistration::where('userId',$userId)->first();
    $proof = proofs::where('userId', $userId)->first();
    $add = address::where('typeOfAddress','=','official')->where('userId',$userId)->first();
    $address1 = address::where('typeOfAddress','=','permanent')->where('userId',$userId)->first();
    $address2 = address::where('typeOfAddress','=','correspondance')->where('userId',$userId)->first();
    $logins= login::where('id', $userId)->first();
    if (!empty($request->photo)) 
    {
        $profilepic = 'Heera'.time().'.'.$request->photo->getClientOriginalExtension();
        $request->photo->move(storage_path('img/member_img'), $profilepic);
        $blacklistmember->photo = $profilepic;
    }
    else
    {
        $blacklistmember->photo = $request->photo_update;
    }
    if (!empty($request->signature)) 
    {
        $signature = 'SIGNATURE'.time().'.'.$request->signature->getClientOriginalExtension();
        $request->signature->move(storage_path('img/member_img'), $signature);
        $blacklistmember->singnature = $signature;
    }
    else
    {
        $blacklistmember->singnature = $request->sign_update;
    }

    if (!empty($request->idproof)) 
    {
        $idproofs = 'PROOF'.time().'.'.$request->idproof->getClientOriginalExtension();
        $request->idproof->move(storage_path('img/proof'), $idproofs);
        $proof->file = $idproofs;
    }
    else
    {
        $proof->file = $request->proof_update;
    }

     $type = array(
        "inr" => $request->inr,
        "aed" => $request->aed,
        "usd" => $request->usd,
        "sar" => $request->sar,
        "cad" => $request->cad
        );


    $blacklistmember->name = $request->fullname;
    $blacklistmember->guardian = $request->guardian;
    $blacklistmember->religion = $request->religion;
    $blacklistmember->caste = $request->caste;
    $blacklistmember->dob = date("Y-m-d", strtotime($request->dateofbirth));
    $blacklistmember->education = $request->education;
    $blacklistmember->occupation= $request->occupation;
    $blacklistmember->maritalStatus = $request->marital;
    $blacklistmember->gender = $request->gender;
    $blacklistmember->incomeAmount = $request->income;
    $blacklistmember->incomeCurrencytype=$request->incomeid;
    $blacklistmember->noOfChildren = $request->childrens;
    $blacklistmember->countryId = $request->country;
    $blacklistmember->mobileNo = $request->mobileno;
    $blacklistmember->mobileId=$request->conId1;
    $blacklistmember->LandlineNo=$request->landlineno;
    $blacklistmember->aboutHeera=$request->aboutheera;
    $blacklistmember->email = $request->email;
    $blacklistmember->membership_details=json_encode(['inr'=>['type'=>$request->type_amount_inr,'amount'=>$request->amount_inr],
            'aed'=>['type'=>$request->type_amount_aed,'amount'=>$request->amount_aed],
            'usd'=>['type'=>$request->type_amount_usd,'amount'=>$request->amount_usd],
            'sar'=>['type'=>$request->type_amount_sar,'amount'=>$request->amount_sar],
            'cad'=>['type'=>$request->type_amount_cad,'amount'=>$request->amount_cad]
            ]);
    $blacklistmember->save();

    //permanent
    $address1->address = $request->per_address;
    $address1->city = $request->per_city;
    $address1->state = $request->per_state;
    $address1->Country=$request->per_country;
    $address1->pin = $request->per_pin;
    $address1->typeOfAddress = 'permanent';
    $address1->save();

    //correspondance
    $address2->address = $request->corr_address;
    $address2->city = $request->corr_city;
    $address2->state = $request->corr_state;
    $address2->Country=$request->corr_country;
    $address2->pin = $request->corr_pin;
    $address2->typeOfAddress = 'correspondance';
    $address2->save();

    //official
    if(count($add) > 0)
    {
        $add->address = $request->official_addr;
        $add->city = $request->official_city;
        $add->state = $request->official_state;
        $add->Country=$request->official_country;
        $add->pin = $request->official_pin;
        $add->typeOfAddress = 'official';
        $add->save();
    }
    $proof->typeOfProof = $request->proofId;
    $proof->proofNumber = $request->proof_number;
    $proof->save();
    $logins->status='Pending'; 
    $logins->save();
    return redirect('/admin/member/blacklistMember');
} 

public function deleteblacklist($id)
{

    $blacklistmember = memberregistration::where('userId','=',$id);
    $blacklistmember->delete();   
    return redirect("admin/members/blacklistMember");  
}

public function prefix_generate()
{

    $memPlusId=memberregistration::max('id');
    if($memPlusId<1)
        $memPlusId='1';
    else
        $memPlusId=$memPlusId+1;
        $appl_code=str_pad($memPlusId,7,"0",STR_PAD_LEFT);
        return $appl_code;
}
    public function generateIBGNo()
    {
        $memPlusId=memberregistration::max('id');
        if($memPlusId<1)
        $memPlusId='1';
        else
        $memPlusId=$memPlusId+1;
     $appl_code=str_pad($memPlusId,7,"0",STR_PAD_LEFT);
        return $appl_code;  
    }
    //for country codes
    public function checkCountryId(Request $request)
    {
        $countryIds = country::where('countries.id', $request->countryName)->select('countries.countryId as conId1')->first();
        return $countryIds->conId1;
    }

function captcha($len = 6){
        $charset = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
        $base = strlen($charset);
        $result = '';
        $now = explode(' ', microtime())[1];
        while ($now >= $base)
        {
            $i = $now % $base;
            $result = $charset[$i] . $result;
            $now /= $base;
        }
        return substr($result, -5);
    }
    public function viewblacklistsubmit($userId)
    {

    $blacklistmembersubmit = login::find($userId);
    $blacklistmembersubmit->status='Pending';
    $blacklistmembersubmit->save();

    return redirect("admin/members/blacklistMember");  
    }
}

