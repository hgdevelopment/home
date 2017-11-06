<?php

namespace App\Http\Controllers\web;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\dsa;
use App\login;
use App\proofs;
use App\address;
use App\country;
use App\paymentdetails;
use App\reference;
use App\bank;
use Carbon\Carbon;
use Auth;
use Alert;
use Session;
use PDF;

class dsaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 

        $listTypes= ['country'=>country::all(),
                    'proof_type'=>['aadhar', 'license', 'pancard', 'passport','VoterId'],
                    'pay_mode'=>['cheque','online','DD','other'],
                    'relationship'=>['Family','Friend']];
        $captcha = $this->captcha();
        return view('web.dsa.dsaCreate',compact('listTypes','captcha'));
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
    public function checkCountryId(Request $request)
    {

       $countryIds = country::where('countries.id', $request->countryName)->select('countries.countryId as conId')->first();
    
        return $countryIds->conId;
    
    }
    public function checkAccount(Request $request)
    {
        
    $table = bank::where('accountNumber', $request->accountNo)->where('typeOfAccount','Heera Account')->select('bankName','branchName')->first();
        if(count($table)>0){
             return  response()->json(['result'=>true,'data'=>$table]);
        }
        return  response()->json(['result'=>false,'data'=>$table]);
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
        $dsa = new dsa;
        $address = new address;
        $address1 = new address;
        $address2 = new address;
        $address3 = new address;
        $proof = new proofs;
        $paymentdetails = new paymentdetails;
        $reference =new reference;
        $bank = new bank;
        $this->validate($request,[
            'name'=>'required',
            'dob'=>'required',
            'gender'=>'required',
            'maritalStatus'=>'required',
            'mobileNo'=>'required',
            'email'=>'required',

            'photo'=>'required|image:jpg,png,jpeg',
            'signature'=>'required|image:jpg,png,jpeg',
            'Payproof'=>'required|image:jpg,png,jpeg',
            'IdProof'=>'required|image:jpg,png,jpeg',
            'Accproof'=>'required|image:jpg,png,jpeg',

            'typeOfProof'=>'required',
            'permanentAddress'=>'required',
            'permanentCity'=>'required',
            'permanentState'=>'required',
            'permanentPin'=>'required',
            'corrsAddress'=>'required',
            'corrsCity'=>'required',
            'corrsState'=>'required',
            'corrsPin'=>'required',


            'paymentMode'=>'required',
            'number'=>'required',
            'depositDate'=>'required',
            'bankName'=>'required',
            'branch'=>'required',
            'accountNo'=>'required',

         
            'holderName'=>'required',
            'incaccountnumber'=>'required',
            'incbankName'=>'required',
            'incBranchName'=>'required',
            'incIfscCode'=>'required',
            ]);
        $this->prefix_generate();
        $code_member=$this->prefix_generate();
        $login->username=$code_member;
        $login->password=Hash::make('DSA');
        $login->userType='DSA';
        $login->status='Pending';
        $login->save();
        $login_id=$login->id;
    
        $address->userId=$login_id; 
        $address->address=$request->officialAddress;
        $address->city=$request->officialCity;
        $address->pin=$request->officialPin;
        $address->state=$request->officialState;
        $address->typeOfAddress='official';
        $address->save();


        $address1->userId=$login_id; 
        $address1->address=$request->permanentAddress;
        $address1->city=$request->permanentCity;
        $address1->pin=$request->permanentPin;
        $address1->state=$request->permanentState;
        $address1->typeOfAddress='permanent';
        $address1->save();

        $address2->userId=$login_id; 
        $address2->address=$request->corrsAddress;
        $address2->city=$request->corrsCity;
        $address2->pin=$request->corrsPin;
        $address2->state=$request->corrsState;
        $address2->typeOfAddress='correspondance';
        $address2->save();

        $address3->userId=$login_id; 
        $address3->address=$request->refaddress;
        $address3->city=$request->refDistrict;
        $address3->pin=$request->refPin;
        $address3->state=$request->refState;
        $address3->typeOfAddress='referance';
        $address3->save();
        $address_id=$address3->id;


        $reference->userId=$login_id;
        $reference->name=$request->refName;
        $reference->address=$address_id;
        $reference->referenceRelation=$request->relationship;
        $reference->referenceMobileNumber=$request->refMobileNo;
        $reference->referenceEmail=$request->refEmail;
        $reference->save();
        $reference_id=$reference->id;

          //photo upload
        $profilepic = 'PHOTO'.time().'.'.$request->photo->getClientOriginalExtension();
        $request->photo->move(storage_path('img/dsa_img'), $profilepic);
        //siganture
        $signature = 'SIGNATURE'.time().'.'.$request->signature->getClientOriginalExtension();
        $request->signature->move(storage_path('img/dsa_img'), $signature);
        //IdProof
        $IdProof = 'PROOF'.time().'.'.$request->IdProof->getClientOriginalExtension();
        $request->IdProof->move(storage_path('img/proof'), $IdProof);

        //payProof
        $payProof = 'PAYPROOF'.time().'.'.$request->Payproof->getClientOriginalExtension();
        $request->Payproof->move(storage_path('img/payProof'), $payProof);
        //AccProof
        $accProof = 'ACCPROOF'.time().'.'.$request->Accproof->getClientOriginalExtension();
        $request->Accproof->move(storage_path('img/Accproof'), $accProof);

        $dsa->userId=$login_id; 
        $dsa->companyName=$request->companyName;
        $dsa->name=$request->name;
        $dsa->guardian=$request->guardian;
        $dsa->dob=date("Y-m-d", strtotime($request->dob));
        $dsa->gender=$request->gender;
        $dsa->religion=$request->religion;
        $dsa->countryId=$request->country;
        $dsa->maritalStatus=$request->maritalStatus;
        $dsa->aboutHeera=$request->aboutHeera;
        $dsa->mobileNumber=$request->mobileNo;
        $dsa->mobileId=$request->conId;
        $dsa->telePhoneNo=$request->telePhoneNo;
        $dsa->addedDate=Carbon::now();
        $dsa->email=$request->email;
        $dsa->photo=$profilepic;
        $dsa->signature=$signature;
        $dsa->reference=$reference_id;
        $dsa->addedId='myself';
        $dsa->save();

        $proof->userId=$login_id;
        $proof->typeOfProof=$request->typeOfProof;
        $proof->proofNumber=$request->idNumber;
        $proof->file=$IdProof;
        $proof->save();

        $paymentdetails->userId=$login_id; 

        $paymentdetails->paymentDate=date("Y-m-d", strtotime($request->depositDate));
        $paymentdetails->transactionNumber=$request->number;
        $paymentdetails->payment_mode=$request->paymentMode;
        $paymentdetails->addedDate=Carbon::now();
        $paymentdetails->bank=$request->bankName;
        $paymentdetails->branch=$request->branch;
        $paymentdetails->accountNumber=$request->accountNo;
        $paymentdetails->file=$payProof;
        $paymentdetails->type='DSA Payment';
        $paymentdetails->save();

        $bank->userId=$login_id;
        $bank->bankName=$request->incbankName;
        $bank->branchName=$request->incBranchName;
        $bank->ifsc=$request->incIfscCode;
        $bank->accountHolderName=$request->holderName;
        $bank->accountNumber=$request->incaccountnumber;
        $bank->Accproof=$accProof;
        $bank->typeOfAccount='DSA Incentive';
        $bank->save();
        Alert::success('DSA Register Successfully', 'Success');
        return redirect('web/dsa/pdfview/'.$login_id);
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
    public function prefix_generate(){
        $digits_needed=7;
        $random_number='DSAPP'; // set up a blank string
        $count=0;
        while ( $count < $digits_needed ) {
            $random_digit = mt_rand(0, 9);
            
            $random_number .= $random_digit;
            $count++;
        }
        return $random_number;
    }
    public function approve(Request $request)
    {
        //
    }
    function captcha()
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        $length = 7;
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
    public function pdfDsa($id)
    {
        $dsa = dsa::join('logins', 'logins.id', 'dsas.userId')->where('userId',$id)->first();
        $address = dsa::join('addresses', 'addresses.userId', 'dsas.userId')->where('dsas.userId',$id)->get();
        $dsaProof=proofs::join('dsas','dsas.userId','=','proofs.userId')->where('proofs.userId', $id)->first();
        $dsapaymentdetails=paymentdetails::join('dsas','dsas.userId','=','paymentdetails.userId')->where('paymentdetails.userId', $id)->first();
        $dsabank=dsa::join('banks','banks.userId','=','dsas.userId')->where('banks.userId', $id)->first();
        $dsareference=dsa::join('references','references.userId','=','dsas.userId')->where('references.userId', $id)->select('references.*')->first();
        $countryname = dsa::join('countries','countries.id','=','dsas.countryId')->select('countries.countryName as countryNames')->where('userId', $id)->first();
       

        $pdf =PDF::loadView('dsaPdf.dsa',compact('dsa', 'address','dsaProof','dsapaymentdetails','dsabank','dsareference','countryname'));
        return $pdf->stream();
    }
    public function viewpdf($id)
    {
        return view('dsaPdf.pdfview',compact('id'));
    }

}
