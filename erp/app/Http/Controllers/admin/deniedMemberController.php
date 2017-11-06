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
use carbon;

class deniedMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  
        $member = memberregistration::join('logins','username','=','code')
        ->where('status','Denied')
        ->get();

        $mem = address::join('memberregistrations','address','=','memberregistrations.userId')
        ->get();

        $memb = proofs::join('memberregistrations','file','=','memberregistrations.userId')
        ->get();

        return view('admin.members.viewDeniedMemReq',compact('member','mem','memb'));
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
       //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    { 
       
        $member =  memberregistration::where('userId', $id)->first();
        $mem =  address::where('userId', $id)->get();
        $memb = proofs::where('userId', $id)->first();
        $membe = memberregistration::join('logins','logins.id','=','userId')->get();
        $countryname = memberregistration::join('countries','countries.id','=','memberregistrations.countryId')
        ->select('countries.countryName as countryNames')->where('userId', $id)->first();
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
       
        return view('admin.members.deniedMemView',compact('member','mem','memb','membe','countryname','countryaddress','similarrecords'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $member =  memberregistration::where('userId', $id)->first();
        $mem =  address::where('userId', $id)->get();
        $memb = proofs::where('userId', $id)->first();
        $membe = memberregistration::join('logins','username','=','code')->get();
        $countrys = memberregistration::join('countries','countries.id','=','memberregistrations.countryId')
         ->select('countries.id as country_id','countries.countryName as countryName')
         ->where('userId', $id)
         ->first();
        $country = country::all();
        $member->dob = date("d-m-Y", strtotime($member->dob));

        return view('admin.members.editDeniedMem',compact('member','mem','memb','membe','countrys','country'));

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
        $logins = login::where('id','=',$userId)->first();
        $logins->status ='Pending';
        $logins->save();
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
        $member->LandlineNo=$request->landlineno;
        $member->countryId= $request->country;
        $member->mobileId=$request->conId1;
        $member->mobileNo= $request->mobileno;
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

        return redirect('/admin/viewDeniedMemReq');
    }

    public function checkCountryId(Request $request)
    {
        $countryIds = country::where('countries.id', $request->countryName)->select('countries.countryId as conId1')->first();
        return $countryIds->conId1;
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
