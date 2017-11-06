<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\memberregistration;
use App\address;
use App\proofs;
use App\login;
use App\country;
use Auth;
use Carbon\Carbon;
use Mail;

class approvedMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 

        $approvedlogin = memberregistration::join('logins','logins.id','=','userId')
        ->where('status','Active')
        ->get();

        $approvedaddress = address::join('memberregistrations','address','=','memberregistrations.userId')
        ->get();

        $approvedproof = proofs::join('memberregistrations','file','=','memberregistrations.userId')
        ->get();

        return view('admin.members.viewApprovedMemReq',compact('approvedlogin','approvedaddress','approvedproof'));
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
    public function show($id)
    { 

        $approvemember = memberregistration::where('userId',$id)->first();
        $approveaddress = address::where('userId',$id)->get();
        $approveproof = proofs::where('userId',$id)->first();
        $approvelogin = memberregistration::join('logins','logins.id','=','userId')->get();
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
        ->where('memberregistrations.name','=',$approvemember->name)
        ->where('memberregistrations.gender','=',$approvemember->gender)
        ->where('memberregistrations.userId','!=',$id)
        ->get();

        return view('admin.members.approveMemView',compact('approvemember','approveaddress','approveproof','approvelogin','countryname','countryaddress','similarrecords'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $listTypes=['country'=>country::all(),
                     'proof_type'=>['aadhar', 'license', 'pancard', 'passport','VoterId'],
                     'caste'=>['General','OBC','BC','OC','SC','ST'],
                     'occupation'=>['Business','Salaried','Student','Housewife','SelfEmployed/Professional','Retired'],
                     'education'=>['NON-SSC','SSC-HSC','Graduate','Postgraduate']];

        $editmember = memberregistration::where('userId',$id)->first();
        $editaddress = address::where('userId',$id)->get();
        $editproof = proofs::where('userId',$id)->first();
        $countrys = memberregistration::join('countries','countries.id','=','memberregistrations.countryId')
        ->select('countries.id as country_id','countries.countryName as countryNames')
        ->where('userId',$id)
        ->first();
        $country = country::all();
       

        return view('admin.members.editApproveMem',compact('editmember','editaddress','editproof','countrys','country','listTypes'));
       
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
       
        $member = memberregistration::where('userId', $userId)->first();
        //$address = address::where('userId', $userId)->first();
        $proof = proofs::where('userId', $userId)->first();
        $add = address::where('typeOfAddress','=','official')->where('userId',$userId)->first();
        $address1 = address::where('typeOfAddress','=','permanent')->where('userId',$userId)->first();
        $address2 = address::where('typeOfAddress','=','correspondance')->where('userId',$userId)->first(); 

        if (!empty($request->photo)) 
        {
            $profilepic = 'Heera'.time().'.'.$request->photo->getClientOriginalExtension();
            $request->photo->move(storage_path('img/member_img'), $profilepic);
            $member->photo = $profilepic;
        }
        else
        {
            $member->photo = $request->photo_update;
        }
        if (!empty($request->signature)) 
        {
            $signature = 'SIGNATURE'.time().'.'.$request->signature->getClientOriginalExtension();
            $request->signature->move(storage_path('img/member_img'), $signature);
            $member->singnature = $signature;
        }
        else
        {
            $member->singnature = $request->sign_update;
        }
        if (!empty($request->idproof)) 
        {
            $idproofs = 'PROOF'.time().'.'.$request->idproof->getClientOriginalExtension();
            $request->idproof->move(storage_path('img/proof'), $idproofs);
            $proof->file= $idproofs;
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
    
        $member->name= $request->fullname;
        $member->guardian= $request->guardian;
        $member->religion= $request->religion;
        $member->caste= $request->caste;
        $member->dob=date("Y-m-d", strtotime($request->dateofbirth));
        $member->education= $request->education;
        $member->occupation= $request->occupation;
        $member->maritalStatus= $request->marital;
        $member->gender= $request->gender;
        $member->incomeAmount= $request->income;
        $member->incomeCurrencytype=$request->incomeid;
        $member->noOfChildren= $request->childrens;
        $member->aboutHeera=$request->aboutheera;
        $member->countryId= $request->country;
        $member->mobileNo= $request->mobileno;
        $member->mobileId=$request->conId1;
        $member->LandlineNo=$request->landlineno;
        $member->email= $request->email;
        $member->membership_details=json_encode(['inr'=>['type'=>$request->type_amount_inr,'amount'=>$request->amount_inr],
            'aed'=>['type'=>$request->type_amount_aed,'amount'=>$request->amount_aed],
            'usd'=>['type'=>$request->type_amount_usd,'amount'=>$request->amount_usd],
            'sar'=>['type'=>$request->type_amount_sar,'amount'=>$request->amount_sar],
            'cad'=>['type'=>$request->type_amount_cad,'amount'=>$request->amount_cad]
            ]);
        $member->save();

        $address1->address = $request->per_address;
        $address1->city = $request->percity;
        $address1->state = $request->perstate;
        $address1->Country=$request->percountry;
        $address1->pin = $request->perpin;
        $address1->typeOfAddress = 'permanent';
        $address1->save();
        
        $address2->address = $request->corr_address;
        $address2->city = $request->corrcity;
        $address2->state = $request->corrstate; 
        $address2->Country=$request->corrcountry;
        $address2->pin = $request->corrpin;
        $address2->typeOfAddress = 'correspondance';
        $address2->save();

        $add->address = $request->off_address;
        $add->city = $request->offcity;
        $add->state = $request->offstate;
        $add->Country=$request->offcountry;
        $add->pin = $request->offpin;
        $add->typeOfAddress = 'official';
        $add->save();

        $proof->typeOfProof= $request->proofId;
        $proof->proofNumber= $request->proof_number;
        $proof->save();

        return redirect('admin/approve_member'); 
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

    public function denyApproveMem(Request $request)
    {
       
        $id =  Auth::guard('admin')->user()->id;
        $userId = $request->userId;
        $Reason = $request->reason;
        $Denyreason=implode(",",$Reason);
        $denyapprovemember = memberregistration::where('userId','=',$userId)->first();
        $logins = login::where('id','=',$userId)->first();
        $denyapprovemember->deniedDate = Carbon::now();
        if(!empty($request->reason))
        {
           $denyapprovemember->deniedReason = $Denyreason;  
        }
        else
        {
            $denyapprovemember->deniedReason = $request->denyreason; 
        }

        $denyapprovemember->deniedId = $id;
        $denyapprovemember->save();

        $logins->status = 'Denied';
        $logins->save();   
    }

     public function blacklistApproveMem(Request $request)
     {
        $id =  Auth::guard('admin')->user()->id;
        $userId=$request->userId;
        $reason = $request->blacklistreason;
        $blacklistmember=memberregistration::where('userId','=',$userId)->first();
        $logins=login::where('id','=',$userId)->first();
        $blacklistmember->blockedId = $id;
        $blacklistmember->blockedreason = $reason;
        $blacklistmember->save();
        $logins->status='Block';
        $logins->save(); 
     }

    public function checkCountryId(Request $request)
    {
        $countryIds = country::where('countries.id', $request->countryName)->select('countries.countryId as conId1')->first();
        return $countryIds->conId1;
    }



} 
 