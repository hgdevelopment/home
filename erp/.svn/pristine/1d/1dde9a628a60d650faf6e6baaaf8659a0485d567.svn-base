<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\nominee;
use App\country;
use App\bank;
use App\address;
use App\tcnrequest;
use App\tcnmaster;
use App\proofs;
use App\memberregistration;
use Auth;
use Carbon\Carbon;
use DB;
use Alert;
use PDF;

class tcnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct(){
       
    }
    public function index()
    {


        $this->user = Auth::guard('user')->user();

        $table = DB::table('tcnrequests')->where('userId', $this->user->id);
        $table=$table->where('addedDate', date('Y-m-d'));
        $table=$table->get()->count();

        if($table>0)
        {
           Alert::success('This member has already applied for a TCN today. A member is allowed to apply TCN only once in a day.', 'Sorry');

           return redirect('web/dashboard');
        }


        $nominee=nominee::where('userId',$this->user->id)->get();
        $listTypes= ['country'=>country::all(),
                     'proof_type'=>['aadhar', 'license', 'pancard', 'passport','VoterId'],
                     'relationnominee'=>['Father','Mother','Wife','Husband','Son','Daughter','Brother','Sister','Grand Son','Grand Daughter','Grand Mother','Grand Father','Maternal uncle','Paternal uncle','Others']];
        $tcntypes=tcnmaster::all();
        $nomineehtml=app('App\Http\Controllers\web\tcnController')->nomineeDetails(-1,$listTypes);
        $nomineehtml_two=app('App\Http\Controllers\web\tcnController')->nomineeDetails_two(-1,$listTypes);
        
        $proofhtml=app('App\Http\Controllers\web\tcnController')->nomineeProof(-1,$listTypes);
        $proofhtml_two=app('App\Http\Controllers\web\tcnController')->nomineeProof_two(-1,$listTypes);
        $benifitAccount=app('App\Http\Controllers\web\tcnController')->benifitAccount($this->user->id);
        $userProfile=memberregistration::where('userId', $this->user->id)->with('bank')->first();
        return view('web.member.tcn.tcnApplication',compact('userProfile','listTypes','nomineehtml','nomineehtml_two','proofhtml','proofhtml_two','nominee','benifitAccount','tcntypes','nomineehtml_two','proofhtml_two'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //bank account details
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $address = new address;
        $address_two = new address;
        $proofs = new proofs;
        $proofs_two = new proofs;
        $bank = new bank;
        $tcnrequest = new tcnrequest;
        $nominee = new nominee;
        $nominee_two = new nominee;
        $this->user = Auth::guard('user')->user();
            $tcnPlusId=tcnrequest::max('id');

        if($tcnPlusId<1)
            $tcnPlusId='1';
        else
            $tcnPlusId=$tcnPlusId+1;

            $tcnNo=$tcnPlusId+1000000;

$userId=$this->user->id;
        if($request->has('nominee_photo')){
            $this->validate($request,[
                 'nominee_photo'=>'required|image:jpg,png,jpeg',
                 'nominee_signature'=>'required|image:jpg,png,jpeg',
                ]);
        }
        if($request->has('nominee_proof')){
            $this->validate($request,[
                 'nominee_proof'=>'required|image:jpg,png,jpeg',
                ]);
        }
        $this->validate($request,[
            'tcn'=>'required',
            'select_nominee'=>'required',
            'name_nominee'=>'required',
            'dob_nominee'=>'required',
            'relation_applicant'=>'required',
            'nominee_gender'=>'required',
            'nominee_addr'=>'required',
            'city_nominee'=>'required',
            'pin_nominee'=>'required|numeric',
            'mobile_nominee'=>'required|numeric',
            'email_nominee'=>'required|email',
            //
            //
            'type_of_proof'=>'required',
            //'proof_number'=>'required',
            //'issued_at'=>'required',
            //'issued_date'=>'required',
            //
            //'expiry_date'=>'required',
            'curency_type'=>'required',
            'no_of_units'=>'required',
            'amount'=>'required',
            'pay_mode'=>'required',
            'deposite_date'=>'required',
            'payment_type'=>'required',
            'applying_from'=>'required',
            'heera_account'=>'required',

            'benifit_account_bank'=>'required',
            'benifit_account_bank_name'=>'required',
            'benifit_account_bank_branch'=>'required',
            'benifit_account_bank_ifsc'=>'required',
            'benifit_account_bank_holder'=>'required',
            'benifit_account_bank_no'=>'required',
            'doc1'=>'required|image:jpg,png,jpeg',
            'doc2'=>'required|image:jpg,png,jpeg',
            'doc3'=>'required|image:jpg,png,jpeg']);

          $nominee_id=$request->select_nominee;
          //new nominee
          if($request->select_nominee=="-1"){
            //photo upload

            $nominee_photo = 'PHOTO'.time().'.'.$request->nominee_photo->getClientOriginalExtension();
            $request->nominee_photo->move(storage_path('img/nominee'), $nominee_photo);
            //siganture
            $nominee_signature = 'SIGNATURE'.time().'.'.$request->nominee_signature->getClientOriginalExtension();
            $request->nominee_signature->move(storage_path('img/nominee'), $nominee_signature);
            //proof
            $nominee_proof = 'PROOF'.time().'.'.$request->nominee_proof->getClientOriginalExtension();
            $request->nominee_proof->move(storage_path('img/proof'), $nominee_proof);

            $address->userId=$userId;
            $address->address=$request->nominee_addr;
            $address->city=$request->city_nominee;
            $address->state=$request->state_nominee;
            $address->pin=$request->pin_nominee;
            $address->typeOfAddress='nominee';
            $address->save();
            $addr_id=$address->id;
            
            $proofs->userId=$userId;
            $proofs->typeOfProof=$request->type_of_proof;
            $proofs->proofNumber=$request->proof_number;
            // $proofs->placeOfIssue='';
            // $proofs->dateOfIssue='';
            // $proofs->dateOfExpiry='';
            $proofs->file=$nominee_proof;
            $proofs->save();
            $proof_id=$proofs->id;
       
            $nominee->userId=$userId;
            $nominee->name=$request->name_nominee;
            $nominee->dob=Carbon::createFromFormat('d/m/Y', $request->dob_nominee)->format('Y-m-d');
            $nominee->relationWithApplicant=$request->relation_applicant;
            $nominee->addressId=$addr_id;
            $nominee->signature=$nominee_signature;
            $nominee->uploadPhoto=$nominee_photo;
            $nominee->mobile=$request->mobile_nominee;
            $nominee->email=$request->email_nominee;
            $nominee->gender=$request->nominee_gender;
            $nominee->proofId=$proof_id;
            $nominee->uploadPhoto=$nominee_photo;
            $nominee->save();
            $nominee_id=$nominee->id;
          }
          //benifit id
          $benifit_id=$request->benifit_account_bank;
          if($request->benifit_account_bank=='-1'){
            $bank->userId=$userId;
            $bank->bankName=$request->benifit_account_bank_name;
            $bank->branchName=$request->benifit_account_bank_branch;
            $bank->ifsc=$request->benifit_account_bank_ifsc;
            $bank->accountHolderName=$request->benifit_account_bank_holder;
            $bank->accountNumber=$request->benifit_account_bank_no;
            $bank->country='0';
            $bank->typeOfAccount='TCN Benefit';
            $bank->save();
            $benifit_id=$bank->id;
          }


          //new nominee two
          $nominee_id_two=$request->select_nominee_two;
          if($request->select_nominee_two=="-2"){
            //photo upload

            $nominee_photo_two = 'PHOTO_TWO'.time().'.'.$request->nominee_photo_two->getClientOriginalExtension();
            $request->nominee_photo_two->move(storage_path('img/nominee'), $nominee_photo_two);
            //siganture
            $nominee_signature_two = 'SIGNATURE_TWO'.time().'.'.$request->nominee_signature_two->getClientOriginalExtension();
            $request->nominee_signature_two->move(storage_path('img/nominee'), $nominee_signature_two);
            //proof
            $nominee_proof_two = 'PROOF_TWO'.time().'.'.$request->nominee_proof_two->getClientOriginalExtension();
            $request->nominee_proof_two->move(storage_path('img/proof'), $nominee_proof_two);

            $address_two->userId=$userId;
            $address_two->address=$request->nominee_addr_two;
            $address_two->city=$request->city_nominee_two;
            $address_two->state=$request->state_nominee_two;
            $address_two->pin=$request->pin_nominee_two;
            $address_two->typeOfAddress='nominee';
            $address_two->save();
            $addr_id_two=$address_two->id;
            
            $proofs_two->userId=$userId;
            $proofs_two->typeOfProof=$request->type_of_proof_two;
            $proofs_two->proofNumber=$request->proof_number_two;
            // $proofs->placeOfIssue='';
            // $proofs->dateOfIssue='';
            // $proofs->dateOfExpiry='';
            $proofs_two->file=$nominee_proof_two;
            $proofs_two->save();
            $proof_id_two=$proofs_two->id;
       
            $nominee_two->userId=$userId;
            $nominee_two->name=$request->name_nominee_two;
            $nominee_two->dob=Carbon::createFromFormat('d/m/Y', $request->dob_nominee_two)->format('Y-m-d');
            $nominee_two->relationWithApplicant=$request->relation_applicant_two;
            $nominee_two->addressId=$addr_id_two;
            $nominee_two->signature=$nominee_signature_two;
            $nominee_two->uploadPhoto=$nominee_photo_two;
            $nominee_two->mobile=$request->mobile_nominee_two;
            $nominee_two->email=$request->email_nominee_two;
            $nominee_two->gender=$request->nominee_gender_two;
            $nominee_two->proofId=$proof_id_two;
            $nominee_two->uploadPhoto=$nominee_photo_two;
            $nominee_two->save();
            $nominee_id_two=$nominee_two->id;
          }
          //benifit id
          $benifit_id=$request->benifit_account_bank;
          if($request->benifit_account_bank=='-1'){
            $bank->userId=$userId;
            $bank->bankName=$request->benifit_account_bank_name;
            $bank->branchName=$request->benifit_account_bank_branch;
            $bank->ifsc=$request->benifit_account_bank_ifsc;
            $bank->accountHolderName=$request->benifit_account_bank_holder;
            $bank->accountNumber=$request->benifit_account_bank_no;
            $bank->country='0';
            $bank->typeOfAccount='TCN Benefit';
            $bank->save();
            $benifit_id=$bank->id;
          }
        
        
        //DOC1
        $doc1 = 'DOC1'.time().'.'.$request->doc1->getClientOriginalExtension();
        $request->doc1->move(storage_path('img/tcndocs'), $doc1);
        //DOC2
        $doc2 = 'DOC2'.time().'.'.$request->doc2->getClientOriginalExtension();
        $request->doc2->move(storage_path('img/tcndocs'), $doc2);
        //DOC3
        $doc3 = 'DOC3'.time().'.'.$request->doc3->getClientOriginalExtension();
        $request->doc3->move(storage_path('img/tcndocs'), $doc3);

        $tcnrequest->userId=$userId;
        $tcnrequest->tcn_id=$request->tcn;
        $tcnrequest->tcnNo=$tcnNo;
        $tcnrequest->tcnCode='TCN'.$tcnNo;
        $tcnrequest->doc1=$doc1;
        $tcnrequest->doc2=$doc2;
        $tcnrequest->doc3=$doc3; 
        $tcnrequest->currencyType=$request->curency_type;
        $tcnrequest->unit=$request->no_of_units;
        $tcnrequest->amount=$request->amount;
        $tcnrequest->paymentMode=$request->pay_mode;
        $tcnrequest->applyingFrom=$request->applying_from;
        $tcnrequest->depositeDate=Carbon::createFromFormat('d/m/Y', $request->deposite_date)->format('Y-m-d');
        $tcnrequest->transactionNumber=$request->payment_type;
        $tcnrequest->heeraAccountId=$request->heera_account;
        $tcnrequest->addedId='0';
        $tcnrequest->addedDate=date('Y-m-d');
        $tcnrequest->approvalDate=date('Y-m-d H:i:s');
        $tcnrequest->benefitId=$benifit_id;
        $tcnrequest->nominee1_id=$nominee_id;
        $tcnrequest->nominee2_id=$nominee_id_two;
        $tcnrequest->status='Pending';
        $tcnrequest->save();
        return response()->json(['result' => true,'message'=>'TCN Request Submitted Success']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
     $tcnrequest = tcnrequest::where('id',$id)->first();
     $pdf =PDF::loadView('web.member.tcn.pdf.tcn',compact('tcnrequest'));
     return $pdf->stream();
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

        $this->user = Auth::guard('user')->user();
        $tcnrequest = tcnrequest::find($id);
        $nominee=nominee::where('userId',$this->user->id)->get();
        $listTypes= ['country'=>country::all(),
                     'proof_type'=>['aadhar', 'license', 'pancard', 'passport','VoterId'],
                     'relationnominee'=>['Father','Mother','Wife','Husband','Son','Daughter','Brother','Sister','Grand Son','Grand Daughter','Grand Mother','Grand Father','Maternal uncle','Paternal uncle','Others']];
        $tcntypes=tcnmaster::all();
        $nomineehtml=app('App\Http\Controllers\web\tcnController')->nomineeDetails($tcnrequest->nominee1_id,$listTypes);
        $proofhtml=app('App\Http\Controllers\web\tcnController')->nomineeProof($tcnrequest->nominee2_id,$listTypes);
        $benifitAccount=app('App\Http\Controllers\web\tcnController')->benifitAccount($this->user->id);

        $userProfile=memberregistration::where('userId', $this->user->id)->with('bank')->first();
        return view('web.member.tcn.tcnApplicationEdit',compact('userProfile','listTypes','nomineehtml','nomineehtml_two','proofhtml','proofhtml_two','nominee','benifitAccount','tcntypes','tcnrequest'));
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
        //
        $tcnrequest = tcnrequest::find($id);
        $nominee =  nominee::find($tcnrequest->nominee1_id);
        $nominee_two = nominee::find($tcnrequest->nominee2_id);

        $address = address::find($nominee->addressId);
        $proofs =  proofs::find($nominee->proofId);

        $address_two = address::find($nominee_two->addressId);
        $proofs_two = proofs::find($nominee_two->proofId);

        $bank =  bank::find($tcnrequest->benifitId);

        $this->user = Auth::guard('user')->user();
        $userId=$this->user->id;
        //nominee one
        if($request->hasFile('nominee_photo')){
            $this->validate($request,[
                 'nominee_photo'=>'required|image:jpg,png,jpeg',
                ]);
        }
        if($request->hasFile('nominee_signature')){
              $this->validate($request,[
                 'nominee_signature'=>'required|image:jpg,png,jpeg',
                ]);
        }
         //nominee two
        if($request->hasFile('nominee_photo_two')){
            $this->validate($request,[
                 'nominee_photo_two'=>'required|image:jpg,png,jpeg',
                 
                ]);
        }
        if($request->hasFile('nominee_signature_two')){
            $this->validate($request,[
                 'nominee_signature'=>'required|image:jpg,png,jpeg',
                ]);
        }
        // nominee one
        if($request->hasFile('nominee_proof')){
            $this->validate($request,[
                 'nominee_proof'=>'required|image:jpg,png,jpeg',
                ]);
        }
        // nominee two
        if($request->hasFile('nominee_proof_two')){
            $this->validate($request,[
                 'nominee_proof_two'=>'required|image:jpg,png,jpeg',
                ]);
        }
        //documnets
        if($request->hasFile('doc1')){
            $this->validate($request,[
                 'doc1'=>'required|image:jpg,png,jpeg',
                ]);
        }
        if($request->hasFile('doc2')){
            $this->validate($request,[
                 'doc2'=>'required|image:jpg,png,jpeg',
                ]);
        }
        if($request->hasFile('doc3')){
            $this->validate($request,[
                 'doc3'=>'required|image:jpg,png,jpeg',
                ]);
        }
        $this->validate($request,[
            'tcn'=>'required',
            'select_nominee'=>'required',
            'name_nominee'=>'required',
            'dob_nominee'=>'required',
            'relation_applicant'=>'required',
            'nominee_gender'=>'required',
            'nominee_addr'=>'required',
            'city_nominee'=>'required',
            'pin_nominee'=>'required|numeric',
            'mobile_nominee'=>'required|numeric',
            'email_nominee'=>'required|email',
            // 
            // 
            'type_of_proof'=>'required',
            //'proof_number'=>'required',
            // 'issued_at'=>'required',
            // 'issued_date'=>'required',
            // //
            // 'expiry_date'=>'required',
            'curency_type'=>'required',
            'no_of_units'=>'required',
            'amount'=>'required',
            'pay_mode'=>'required',
            'deposite_date'=>'required',
            'payment_type'=>'required',
            'applying_from'=>'required',
            'heera_account'=>'required',

            'benifit_account_bank'=>'required',
            'benifit_account_bank_name'=>'required',
            'benifit_account_bank_branch'=>'required',
            'benifit_account_bank_ifsc'=>'required',
            'benifit_account_bank_holder'=>'required',
            'benifit_account_bank_no'=>'required']);

          $nominee_id=$request->select_nominee;
          //new nominee
          if($request->select_nominee=="-1"){
            //photo upload

            $nominee_photo = 'PHOTO'.time().'.'.$request->nominee_photo->getClientOriginalExtension();
            $request->nominee_photo->move(storage_path('img/nominee'), $nominee_photo);
            //siganture
            $nominee_signature = 'SIGNATURE'.time().'.'.$request->nominee_signature->getClientOriginalExtension();
            $request->nominee_signature->move(storage_path('img/nominee'), $nominee_signature);
            //proof
            $nominee_proof = 'PROOF'.time().'.'.$request->nominee_proof->getClientOriginalExtension();
            $request->nominee_proof->move(storage_path('img/proof'), $nominee_proof);

            $address->userId=$userId;
            $address->address=$request->nominee_addr;
            $address->city=$request->city_nominee;
            $address->state=$request->state_nominee;
            $address->pin=$request->pin_nominee;
            $address->typeOfAddress='nominee';
            $address->save();
            $addr_id=$address->id;
            
            $proofs->userId=$userId;
            $proofs->typeOfProof=$request->type_of_proof;
            $proofs->proofNumber=$request->proof_number;
            // $proofs->placeOfIssue='';
            // $proofs->dateOfIssue='';
            // $proofs->dateOfExpiry='';
            $proofs->file=$nominee_proof;
            $proofs->save();
            $proof_id=$proofs->id;
       
            $nominee->userId=$userId;
            $nominee->name=$request->name_nominee;
            $nominee->dob=Carbon::createFromFormat('d/m/Y', $request->dob_nominee)->format('Y-m-d');
            $nominee->relationWithApplicant=$request->relation_applicant;
            $nominee->addressId=$addr_id;
            $nominee->signature=$nominee_signature;
            $nominee->uploadPhoto=$nominee_photo;
            $nominee->mobile=$request->mobile_nominee;
            $nominee->email=$request->email_nominee;
            $nominee->gender=$request->nominee_gender;
            $nominee->proofId=$proof_id;
            $nominee->uploadPhoto=$nominee_photo;
            $nominee->save();
            $nominee_id=$nominee->id;
          }
          
           //new nominee two
          $nominee_id_two=$request->select_nominee_two;
          if($request->select_nominee_two=="-2"){
            //photo upload

            $nominee_photo_two = 'PHOTO_TWO'.time().'.'.$request->nominee_photo_two->getClientOriginalExtension();
            $request->nominee_photo_two->move(storage_path('img/nominee'), $nominee_photo_two);
            //siganture
            $nominee_signature_two = 'SIGNATURE_TWO'.time().'.'.$request->nominee_signature_two->getClientOriginalExtension();
            $request->nominee_signature_two->move(storage_path('img/nominee'), $nominee_signature_two);
            //proof
            $nominee_proof_two = 'PROOF_TWO'.time().'.'.$request->nominee_proof_two->getClientOriginalExtension();
            $request->nominee_proof_two->move(storage_path('img/proof'), $nominee_proof_two);

            $address_two->userId=$userId;
            $address_two->address=$request->nominee_addr_two;
            $address_two->city=$request->city_nominee_two;
            $address_two->state=$request->state_nominee_two;
            $address_two->pin=$request->pin_nominee_two;
            $address_two->typeOfAddress='nominee';
            $address_two->save();
            $addr_id_two=$address_two->id;
            
            $proofs_two->userId=$userId;
            $proofs_two->typeOfProof=$request->type_of_proof_two;
            $proofs_two->proofNumber=$request->proof_number_two;
            // $proofs->placeOfIssue='';
            // $proofs->dateOfIssue='';
            // $proofs->dateOfExpiry='';
            $proofs_two->file=$nominee_proof_two;
            $proofs_two->save();
            $proof_id_two=$proofs_two->id;
       
            $nominee_two->userId=$userId;
            $nominee_two->name=$request->name_nominee_two;
            $nominee_two->dob=Carbon::createFromFormat('d/m/Y', $request->dob_nominee_two)->format('Y-m-d');
            $nominee_two->relationWithApplicant=$request->relation_applicant_two;
            $nominee_two->addressId=$addr_id_two;
            $nominee_two->signature=$nominee_signature_two;
            $nominee_two->uploadPhoto=$nominee_photo_two;
            $nominee_two->mobile=$request->mobile_nominee_two;
            $nominee_two->email=$request->email_nominee_two;
            $nominee_two->gender=$request->nominee_gender_two;
            $nominee_two->proofId=$proof_id_two;
            $nominee_two->uploadPhoto=$nominee_photo_two;
            $nominee_two->save();
            $nominee_id_two=$nominee_two->id;
          }

         

          //benifit id
          $benifit_id=$request->benifit_account_bank;
          if($request->benifit_account_bank=='-1'){
            $bank->userId=$userId;
            $bank->bankName=$request->benifit_account_bank_name;
            $bank->branchName=$request->benifit_account_bank_branch;
            $bank->ifsc=$request->benifit_account_bank_ifsc;
            $bank->accountHolderName=$request->benifit_account_bank_holder;
            $bank->accountNumber=$request->benifit_account_bank_no;
            $bank->country='0';
            $bank->typeOfAccount='TCN Benefit';
            $bank->save();
            $benifit_id=$bank->id;
          }


        if($request->hasFile('doc1')){

        $doc1 = 'DOC1'.time().'.'.$request->doc1->getClientOriginalExtension();
        $request->doc1->move(storage_path('img/tcndocs'), $doc1);
        $tcnrequest->doc1=$doc1;
        }
        if($request->hasFile('doc2')){
        //DOC2
        $doc2 = 'DOC2'.time().'.'.$request->doc2->getClientOriginalExtension();
        $request->doc2->move(storage_path('img/tcndocs'), $doc2);
        $tcnrequest->doc2=$doc2;
        }
        if($request->hasFile('doc3')){
        //DOC3
        $doc3 = 'DOC3'.time().'.'.$request->doc3->getClientOriginalExtension();
        $request->doc3->move(storage_path('img/tcndocs'), $doc3);
        $tcnrequest->doc3=$doc3;
        }

        $tcnrequest->userId=$userId;
        $tcnrequest->tcn_id=$request->tcn;

        $tcnrequest->currencyType=$request->curency_type;
        $tcnrequest->unit=$request->no_of_units;
        $tcnrequest->amount=$request->amount;
        $tcnrequest->paymentMode=$request->pay_mode;
        $tcnrequest->applyingFrom=$request->applying_from;
        $tcnrequest->depositeDate=Carbon::createFromFormat('d/m/Y', $request->deposite_date)->format('Y-m-d');
        $tcnrequest->transactionNumber=$request->payment_type;
        $tcnrequest->heeraAccountId=$request->heera_account;
        $tcnrequest->addedId='0';
        $tcnrequest->addedDate=date('Y-m-d');
        $tcnrequest->approvalDate=date('Y-m-d H:i:s');
        $tcnrequest->benefitId=$benifit_id;
        $tcnrequest->nominee1_id=$nominee_id;
        $tcnrequest->nominee2_id=$nominee_id_two;
        $tcnrequest->status='Pending';
        $tcnrequest->save();
        
        return response()
            ->json(['result' => true,'message'=>'TCN Request Submitted Success']);


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


    //ajax
    public function nomineeDetails($userid,$listTypes){
        $listTypes=$listTypes;
       $nominee=nominee::where('id', $userid)->with('address')->first();
      return view('web.member.ajaxhtml.nominee',compact('listTypes','nominee'));
    }
    public function nomineeDetails_two($userid,$listTypes){
        $listTypes=$listTypes;
       $nominee=nominee::where('id', $userid)->with('address')->first();
      return view('web.member.ajaxhtml.nominee_two',compact('listTypes','nominee'));
    }
    public function nomineeProof($userid,$listTypes){
        $listTypes=$listTypes;
      return view('web.member.ajaxhtml.nomineeproof',compact('listTypes'));
    }
    public function nomineeProof_two($userid,$listTypes){
        $listTypes=$listTypes;
      return view('web.member.ajaxhtml.nomineeproof_two',compact('listTypes'));
    }
    public function benifitAccount($userid){

      return view('web.member.ajaxhtml.account');
    }
    
    public function benifitAccountAjax(Request $request){
                $this->user = Auth::guard('user')->user();
               $userProfile=memberregistration::where('userId', $this->user->id)->first();
       $bank=bank::where('id', $request->id)->first();
      //  if($request->id=='-1'){
      //   $bank=array();
      //   return view('web.ajaxhtml.account',compact('bank'));
      // }
      return view('web.member.ajaxhtml.account',compact('bank','userProfile'));
    }
    public function nomineeDetailsAjax(Request $request){
        $listTypes= ['country'=>country::all(),
                     'proof_type'=>['aadhar', 'license', 'pancard', 'passport','VoterId'],
                     'relationnominee'=>['Father','Mother','Wife','Husband','Son','Daughter','Brother','Sister','Grand Son','Grand Daughter','Grand Mother','Grand Father','Maternal uncle','Paternal uncle','Others']];
      $nominee=nominee::where('id', $request->id)->with('address')->first();
      return view('web.member.ajaxhtml.nominee',compact('listTypes','nominee'));
    }
    public function nomineeDetailsAjax_two(Request $request){
        $listTypes= ['country'=>country::all(),
                     'proof_type'=>['aadhar', 'license', 'pancard', 'passport','VoterId'],
                     'relationnominee'=>['Father','Mother','Wife','Husband','Son','Daughter','Brother','Sister','Grand Son','Grand Daughter','Grand Mother','Grand Father','Maternal uncle','Paternal uncle','Others']];
      $nominee_two=nominee::where('id', $request->id)->with('address')->first();
      return view('web.member.ajaxhtml.nominee_two',compact('listTypes','nominee_two'));
    }
    public function nomineeProofAjax(Request $request){
         $proof=nominee::where('id', $request->id)->with('proof')->first();
        $listTypes= ['country'=>country::all(),
                     'proof_type'=>['aadhar', 'license', 'pancard', 'passport','VoterId'],
                     'relationnominee'=>['Father','Mother','Wife','Husband','Son','Daughter','Brother','Sister','Grand Son','Grand Daughter','Grand Mother','Grand Father','Maternal uncle','Paternal uncle','Others']];
      return view('web.member.ajaxhtml.nomineeproof',compact('listTypes','proof'));
    }
    public function nomineeProofAjax_two(Request $request){
         $proof_two=nominee::where('id', $request->id)->with('proof')->first();
        $listTypes= ['country'=>country::all(),
                     'proof_type'=>['aadhar', 'license', 'pancard', 'passport','VoterId'],
                     'relationnominee'=>['Father','Mother','Wife','Husband','Son','Daughter','Brother','Sister','Grand Son','Grand Daughter','Grand Mother','Grand Father','Maternal uncle','Paternal uncle','Others']];
      return view('web.member.ajaxhtml.nomineeproof_two',compact('listTypes','proof_two'));
    }
    public function tcnmasterAjax(Request $request){
       $result= tcnmaster::find($request->id);
       return response()
            ->json(['result' => $result]);
    }
    public function heeraAccountAjax(Request $request){
        
        // $bank = bank::where('accountNumber',trim($request->valueAC))->where('typeOfAccount','heera account')->first();
       
        // if (count($bank)==0) {
        //    return response()
        //     ->json(['result' => false,'message'=>'this account not exist']);
        // }else{
        //     return response()
        //     ->json(['result' => true,'message'=>'','data'=>$bank]);
        // }
          $table = DB::table('tcn_allots')->join('banks','banks.id','=','tcn_allots.account_id')->where('tcn_allots.tcn_id', $request->tcn)->where('currency_type',$request->currency_tp)->get();
       
        return response()
            ->json(['result' => true,'message'=>'','data'=>$table]);
        }
    
}
