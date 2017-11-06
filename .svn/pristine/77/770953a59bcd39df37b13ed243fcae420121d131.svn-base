<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\nominee;
use App\address;
use App\memberregistration;
use App\tcnrequest;
use Auth;

class nomineeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $user;
    public function index()
    {
      $this->user = Auth::guard('user')->user();
      $userProfile=memberregistration::where('id', $this->user->id)->first();
      $tcnStatus=tcnrequest::all()->where('userId',$this->user->id)->groupBy('status');

      $nominee= nominee::all();
      $editnominee = nominee::all();

      return view('web.member.nominee.nominee',compact('nominee','editnominee','userProfile','tcnStatus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $nominee = nominee::all();
        $this->user = Auth::guard('user')->user();
        $userProfile=memberregistration::where('id', $this->user->id)->first();
        $tcnStatus=tcnrequest::all()->where('userId',$this->user->id)->groupBy('status');
        return view('web.member.nominee.nominee',compact('nominee','userProfile','tcnStatus'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $nominee = new nominee();
       $address = new address();
       $proof = new proofs();
       $this->user = Auth::guard('user')->user();
       $this->validate($request,[ 

        'nominee_name'=>'required', 
        'dateofbirth'=>'required',
        'gender'=>'required',
        'res_address'=>'required',
        'city'=>'required',
        'pin'=>'required',
        'email'=>'required|email',
        'mobile'=>'required|numeric',
        'relation_name'=>'required',
        'photo'=>'required|image:jpg,png,jpeg',
        'signature'=>'required|image:jpg,png,jpeg', 
        'idproof'=>'required|image:jpg,png,jpeg', 

         ]);

       $address->address=$request->res_address;
       $address->state='';
       $address->city=$request->city;
       $address->pin=$request->pin;
       $address->userId=$this->user->id;
       $address->save();
       $aid=$address->id;
        //profile pic
        $profilepic = time().'.'.$request->photo->getClientOriginalExtension();
        $request->photo->move(storage_path('img/nominee'), $profilepic);
        //idproof
        $proof_file = time().'.'.$request->idproof->getClientOriginalExtension();
        $request->idproof->move(storage_path('img/nominee'), $proof_file);
        //signature
        $signaturepic = time().'.'.$request->signature->getClientOriginalExtension();
        $request->signature->move(storage_path('img/nominee'), $signaturepic);

        $proof->file=$proof_file;
        $proof->save();

       $nominee->name=$request->nominee_name;
       $nominee->userId=$this->user->id;
       $nominee->dob=date("Y-m-d", strtotime($request->dateofbirth));
       $nominee->gender=$request->gender;
       $nominee->addressId=$aid;
       $nominee->relationWithApplicant=$request->relation_name;
       $nominee->uploadPhoto=$profilepic;
       $nominee->signature=$signaturepic;
       $nominee->email=$request->email;
       $nominee->mobile=$request->mobile;
       $nominee->save();

       return redirect('/web/nominee');
      
      
      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      $this->user = Auth::guard('user')->user();
      $userProfile=memberregistration::where('id', $this->user->id)->first();
      $tcnStatus=tcnrequest::all()->where('userId',$this->user->id)->groupBy('status');

      $nominee = nominee::find($id);
      return view('web.member.nominee.editnominee',compact('nominee','userProfile','tcnStatus'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $nominee = nominee::all();
      $editnominee = nominee::find($id);
      $nom = nominee::find($id)->address;
      $this->user = Auth::guard('user')->user();
      $userProfile=memberregistration::where('id', $this->user->id)->first();
      $tcnStatus=tcnrequest::all()->where('userId',$this->user->id)->groupBy('status');
      return view('web.member.nominee.editnominee',compact('nominee','editnominee','nom','userProfile','tcnStatus')); 
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
       $nominee = nominee::find($id);
       $address =address::find($id);
       $this->user = Auth::guard('user')->user();
       

       $address->address=$request->res_address;
       $address->userId=$this->user->id;
       $address->city=$request->city;
       $address->pin=$request->pin;
       $address->save();
       $aid=$address->id;
        if($request->hasFile('photo')) {
        $profilepic = time().'.'.$request->photo->getClientOriginalExtension();
        $request->photo->move(storage_path('img/nominee'), $profilepic);
        }
        if($request->hasFile('idproof')) {
        $proof_file = time().'.'.$request->idproof->getClientOriginalExtension();
        $request->idproof->move(storage_path('img/nominee'), $proof_file);
        }
        if($request->hasFile('signature')) {
        $signaturepic = time().'.'.$request->signature->getClientOriginalExtension();
        $request->signature->move(storage_path('img/nominee'), $signaturepic);
        }
       $nominee->userId=$this->user->id;
       $nominee->name=$request->nominee_name;
       $nominee->dob=date("Y-m-d", strtotime($request->dateofbirth));
       $nominee->gender=$request->gender;
       $nominee->addressId=$aid;
       $nominee->relationWithApplicant=$request->relation_name;
       if($request->hasFile('photo')) {
       $nominee->uploadPhoto=$profilepic;
       }
       if($request->hasFile('signature')) {
       $nominee->signature=$signaturepic;
       }
       if($request->hasFile('idproof')) {
       $nominee->proofId=$proof_file;
       }

       $nominee->email=$request->email;
       $nominee->mobile=$request->mobile;
       $nominee->save();

       return redirect('/web/nominee');
      
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       $nominee = nominee::find($id);
       $nominee->delete();
       return redirect('/web/nominee');
    }
}
