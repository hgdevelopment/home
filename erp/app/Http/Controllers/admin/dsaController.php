<?php
namespace App\Http\Controllers\admin;
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
use Validator;
use Mail;
use App\useraccess;
use App\page;
use App\User;
use App\Notifications\DsaApproval;
use Illuminate\Support\Facades\Notification;
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
                    'pay_mode'=>['cheque','online','DD','others'],
                    'relationship'=>['Family','Friend']];
        $captcha = $this->captcha();
        return view('admin.dsa.dsa',compact('listTypes','captcha'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $listTypes= ['proof_type'=>['aadhar', 'license', 'pancard', 'passport']];

       return view('admin.dsa.dsa',compact('listTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response

     */
    public function store(Request $request)
    {

        $logins=Auth::guard('admin')->user();

        if(Auth::guard('admin')->check())
        $LogInId=$logins->id;
        else
        $LogInId=0;

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

        $session=Auth::guard('admin')->user();
        $sessionId=$session->id;

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
        $dsa->addedId=$sessionId;
        $dsa->save();
        $id=$dsa->id;
        
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

      // notification
      $userids=useraccess::where('page_id','85')->where('status','Active')->get();

      foreach ($userids as $key => $value)
        {
        $array_userids[]=$value->userId;
        }
      $array_userids[]=$LogInId;

        $notification_users=User::whereIn('id',$array_userids)->get();

        $dsa=dsa::find($id);

        Notification::send($notification_users,new DsaApproval($dsa,['url'=>'/admin/dsa/'.$id.'/edit','perminssions'=>$array_userids,'message'=>'New task DSA Approval<br/>(DSA Applied User:'.$logins->username,'auth_user'=>$logins->username]));

         return redirect('admin/dsa/pdfview/'.$login_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $dsa= dsa::join('logins','logins.id','=','userId')->select('logins.username as code', 'dsas.*')->where('status','=','Pending')->whereNotNull('verificationMode')->get();
        return view('admin.dsa.viewDsaRequest',compact('dsa'));
    }
    public function Deniedshow()
    {

       $dsaDenied= dsa::join('logins','logins.id','=','userId')->select('logins.username as code', 'dsas.*')->where('status','=','Denied')->get();
        return view('admin.dsa.viewDsaDenied',compact('dsaDenied'));
    }
     public function showRequest()
    {

        $dsa= dsa::join('logins','logins.id','=','userId')->select('logins.username as code', 'dsas.*')->where('status','=','Pending')->whereNull('verificationMode')->get();
        return view('admin.dsa.viewDsa',compact('dsa'));
    }

     public function editReq($id)
    {

        $dsaDetails=dsa::join('logins','logins.id','=','userId')->select('logins.username as code', 'dsas.*')->where('userId', $id)->first();
        $dsaAddress=dsa::join('addresses','addresses.userId','=','dsas.userId')->where('addresses.userId', $id)->get();
        $dsaProof=proofs::join('dsas','dsas.userId','=','proofs.userId')->where('proofs.userId', $id)->first();
        $dsapaymentdetails=paymentdetails::join('dsas','dsas.userId','=','paymentdetails.userId')->where('paymentdetails.userId', $id)->first();
        $dsabank=dsa::join('banks','banks.userId','=','dsas.userId')->where('banks.userId', $id)->first();
        $dsareference=dsa::join('references','references.userId','=','dsas.userId')->where('references.userId', $id)->first();
        $countryname = dsa::join('countries','countries.id','=','dsas.countryId')
        ->select('countries.countryName as countryNames')
        ->where('userId', $id)
        ->first();
        return view('admin.dsa.viewPayDetails',compact('dsaDetails','dsaAddress','dsaProof','dsapaymentdetails','dsabank','dsareference','countryname'));
    }

    public function verification(Request $request)
    {

        $userId=$request->id;
        $reason=$request->reason;
        $date=$request->date;
        $verificationMode=$request->verificationMode;
        $dsa=dsa::where('userId',$userId)->first();
        $dsa->paymentdate=date("Y-m-d", strtotime($date));
        $dsa->paymentReason=$reason;
        $dsa->verificationMode=$verificationMode;
        $dsa->save();

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $dsaDetails=dsa::join('logins','logins.id','=','userId')->select('logins.username as code','logins.status as status', 'dsas.*')->where('userId', $id)->first();
        $dsaAddress=dsa::join('addresses','addresses.userId','=','dsas.userId')->where('addresses.userId', $id)->get();
        $dsaProof=proofs::join('dsas','dsas.userId','=','proofs.userId')->where('proofs.userId', $id)->first();
        $dsapaymentdetails=paymentdetails::join('dsas','dsas.userId','=','paymentdetails.userId')->where('paymentdetails.userId', $id)->first();
        $dsabank=dsa::join('banks','banks.userId','=','dsas.userId')->where('banks.userId', $id)->first();
        $dsareference=dsa::join('references','references.userId','=','dsas.userId')->where('references.userId', $id)->first();
        $countryname = dsa::join('countries','countries.id','=','dsas.countryId')->select('countries.countryName as countryNames')->where('userId', $id)->first();
        
        $dsaSimilarDetails=dsa::join('logins','dsas.userId','=','logins.id')->select('logins.username as code','logins.status as status','dsas.*')->where('dsas.name','=', $dsaDetails->name)->where('dsas.gender', '=', $dsaDetails->gender)->where('dsas.userId', '!=' , $id) ->orWhere(function ($query) {
                $query->where('dsas.mobileNumber', '=',$dsaDetails->mobileNumber);
            })->get();
        
        return view('admin.dsa.viewDsaDetails',compact('dsaDetails','dsaAddress','dsaProof','dsapaymentdetails','dsabank','dsareference','countryname','dsaSimilarDetails'));
    }

    public function Dsaedit($id)
    {

        $dsaDetails=dsa::join('logins','logins.id','=','userId')->select('logins.username as code', 'dsas.*')->where('userId', $id)->first();
        $dsaAddress=dsa::join('addresses','addresses.userId','=','dsas.userId')->where('addresses.userId', $id)->get();
        $dsaProof=proofs::join('dsas','dsas.userId','=','proofs.userId')->where('proofs.userId', $id)->first();
        $dsapaymentdetails=paymentdetails::join('dsas','dsas.userId','=','paymentdetails.userId')->where('paymentdetails.userId', $id)->first();
        $dsabank=dsa::join('banks','banks.userId','=','dsas.userId')->where('banks.userId', $id)->first();
        $dsareference=dsa::join('references','references.userId','=','dsas.userId')->where('references.userId', $id)->first();
        $listTypes= ['country'=>country::all(),
                    'proof_type'=>['aadhar', 'license', 'pancard', 'passport','VoterId'],
                    'pay_mode'=>['cheque','online','DD','others'],
                    'relationship'=>['Family','Friend']];
        return view('admin.dsa.editDsaDetails',compact('dsaDetails','dsaAddress','dsaProof','dsapaymentdetails','dsabank','dsareference','listTypes'));
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


        $login = login::where('id','=',$userId)->first();
        $dsa = dsa::where('userId',$userId)->first();
        $address = address::where('typeOfAddress','=','official')->where('userId',$userId)->first();
        $address1 = address::where('typeOfAddress','=','permanent')->where('userId',$userId)->first();
        $address2 = address::where('typeOfAddress','=','correspondance')->where('userId',$userId)->first();
        $address3 = address::where('typeOfAddress','=','referance')->where('userId',$userId)->first();
        $proof = proofs::where('userId', $userId)->first();
        $paymentdetails = paymentdetails::where('type','=','DSA Payment')->where('userId', $userId)->first();
        $reference = reference::where('userId', $userId)->first();
        $bank = bank::where('typeOfAccount','=','DSA Incentive')->where('userId', $userId)->first();

             $this->validate($request,[
            'name'=>'required',
            'dob'=>'required',
            'gender'=>'required',
            'maritalStatus'=>'required',
            'mobileNo'=>'required',
            'permanentAddress'=>'required',
            'permanentCity'=>'required',
            'permanentState'=>'required',
            'permanentPin'=>'required',
            'corrsAddress'=>'required',
            'corrsCity'=>'required',

            'corrsState'=>'required',
            'corrsPin'=>'required',
            'typeOfProof'=>'required',

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



        $login->status='Pending';
        $login->save();
    

        $address->address=$request->officialAddress;
        $address->city=$request->officialCity;
        $address->pin=$request->officialPin;
        $address->state=$request->officialState;
        $address->save();


        $address1->address=$request->permanentAddress;
        $address1->city=$request->permanentCity;
        $address1->pin=$request->permanentPin;
        $address1->state=$request->permanentState;
        $address1->save();


        $address2->address=$request->corrsAddress;
        $address2->city=$request->corrsCity;
        $address2->pin=$request->corrsPin;
        $address2->state=$request->corrsState;
        $address2->save();


        $address3->address=$request->refaddress;
        $address3->city=$request->refDistrict;
        $address3->pin=$request->refPin;
        $address3->state=$request->refState;
        $address3->save();



        $reference->name=$request->refName;
        $reference->referenceRelation=$request->relationship;
        $reference->referenceMobileNumber=$request->refMobileNo;
        $reference->referenceEmail=$request->refEmail;
        $reference->save();
        if (!empty($request->photo)) 
        {
                     //photo upload
        $profilepic = 'PHOTO'.time().'.'.$request->photo->getClientOriginalExtension();
        $request->photo->move(storage_path('img/dsa_img'), $profilepic);
            $dsa->photo = $profilepic;
        }
        else
        {
            $dsa->photo = $request->photo_update;

        }
        if (!empty($request->signature)) 
        {
        //siganture
            $signature = 'SIGNATURE'.time().'.'.$request->signature->getClientOriginalExtension();
            $request->signature->move(storage_path('img/dsa_img'), $signature);
            $dsa->signature = $signature;
        }
        else
        {
            $dsa->signature = $request->signature_update;
        }
        if (!empty($request->IdProof)) 
        {
                  //IdProof
            $IdProof = 'PROOF'.time().'.'.$request->IdProof->getClientOriginalExtension();
            $request->IdProof->move(storage_path('img/proof'), $IdProof);
            $proof->file = $IdProof;
        }
        else
        {
             $proof->file = $request->IdProof_update;
        }
        if (!empty($request->Payproof)) 
        {
            //payProof
        $payProof = 'PAYPROOF'.time().'.'.$request->Payproof->getClientOriginalExtension();
        $request->Payproof->move(storage_path('img/payProof'), $payProof);
        $paymentdetails->file=$payProof; 
        }
        else
        {
            $paymentdetails->file = $request->Payproof_update;
        }
        if (!empty($request->Accproof)) 
        {
        //AccProof
            $accProof = 'ACCPROOF'.time().'.'.$request->Accproof->getClientOriginalExtension();
            $request->Accproof->move(storage_path('img/Accproof'), $accProof);
            $bank->Accproof=$accProof;
         }
        else
        {
             $bank->Accproof= $request->Accproof_update;
        }
   

        $session=Auth::guard('admin')->user();
        $sessionId=$session->id;

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
        $dsa->addedId=$sessionId;
        $dsa->save();

        $proof->typeOfProof=$request->typeOfProof;
        $proof->proofNumber=$request->idNumber;
        $proof->save();


        $paymentdetails->paymentDate=date("Y-m-d", strtotime($request->depositDate));
        $paymentdetails->transactionNumber=$request->number;
        $paymentdetails->payment_mode=$request->paymentMode;
        $paymentdetails->addedDate=Carbon::now();
        $paymentdetails->bank=$request->bankName;
        $paymentdetails->branch=$request->branch;
        $paymentdetails->accountNumber=$request->accountNo;
        $paymentdetails->save();

        $bank->bankName=$request->incbankName;
        $bank->branchName=$request->incBranchName;
        $bank->ifsc=$request->incIfscCode;
        $bank->accountHolderName=$request->holderName;
        $bank->accountNumber=$request->incaccountnumber;
        $bank->save();

        if($dsa->verificationMode=="")
        {
             return redirect ('/admin/dsa/'.$userId.'/editReq');
        }
        else
        {
             return redirect ('/admin/dsa/'.$userId.'/edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id=$request->id;
        $login = login::where('id','=',$id)->first();
        $login->status='Block';
        $login->save();
        $dsa = dsa::where('userId','=',$id);
        $dsa->delete();
       
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
    public function generateIBGNo()
    {
        $digits_needed=7;
        $random_number='DSA';
        $max = dsa::max('id');
        $code=$max+1;
        $number_7=str_pad($code,7,"0",STR_PAD_LEFT);
        return $dsa_code="DSA".$number_7;
    }
    public function approve(Request $request)
    {

        $userId=$request->id;
        $login=Auth::guard('admin')->user();
        $id=$login->id;
        $logins=login::find($userId);
        $dsa=dsa::where('userId',$userId)->first();
        $username=$logins->username;
        $password='D'.substr($dsa->name,0,2).str_random(5);
        $name=$dsa->name;
        $email=$dsa->email;
        $dsa->approvedId=$id;
        $dsa->approvedDate=Carbon::now();
        $dsa->save();
        $logins->username = $this->generateIBGNo();
        $logins->password= Hash::make($password);
        $logins->status='Active';
        $logins->save();

        $data = array( 'heading' =>'HEERA INVESTMENT DSA MEMBERSHIP APPROVAL',
                        'name' =>$name,
                        'password'=>$password,
                        'username'=>$username,
                        'status'=>'approve');
        Mail::send('admin.mail.dsaApprove',compact('data'), function ($message) use ($dsa) 
        {
            $message->from('priya.developmentphp@gmail.com', 'DSA Request Approved');
            $message->to($dsa->email)->subject('HEERA INVESTMENT DSA MEMBERSHIP APPROVAL');
        });

        return redirect('/admin/dsa/viewDsaRequest');


    }
        public function deny(Request $request)
    {
        $userId=$request->id;
        $reason=$request->reason;
        $denyreason=$request->denyreason;
        $Re=implode(",",$reason);
        $reasons=$Re. "," .$denyreason;
        $login=Auth::guard('admin')->user();
        $id=$login->id;
        $logins=login::find($userId);
        $dsa=dsa::where('userId',$userId)->first();
        $dsa->deniedId=$id;
        $dsa->deniedDate=Carbon::now();
        $dsa->deniedReason=$reasons;
        $dsa->save();
        $logins->status='Denied';
        $logins->save();
          $username=$logins->username;
        $password='D'.substr($dsa->name,0,2).str_random(5);
        $name=$dsa->name;

         $data = array( 'heading' =>'Your Dsa Request Is Denied',
                        'name' =>$name,
                        'reason' =>$reasons,
                        'status'=>'denied'
                );
        Mail::send('admin.mail.dsaApprove',compact('data'), function ($message) use ($dsa) 
        {
            $message->from('priya.developmentphp@gmail.com', 'DSA Request Denied');
            $message->to($dsa->email)->subject('HI! YOUR DSA REQUEST IS Denied');
        });
    }
    public function checkAccount(Request $request)
    {
        $table = bank::where('accountNumber', $request->accountNo)->where('typeOfAccount','Heera Account')->select('bankName','branchName')->first();
        if(count($table)>0){
             return  response()->json(['result'=>true,'data'=>$table]);
        }
        return  response()->json(['result'=>false,'data'=>$table]);
    }

    public function checkCountryId(Request $request)
    {

       $countryIds = country::where('countries.id', $request->countryName)->select('countries.countryId as conId')->first();
    
        return $countryIds->conId;
    
    }
    function captcha($len = 6)
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
        $dsareference=dsa::join('references','references.userId','=','dsas.userId')->where('references.userId', $id)->first();
        $countryname = dsa::join('countries','countries.id','=','dsas.countryId')->select('countries.countryName as countryNames')->where('userId', $id)->first();
       

        $pdf =PDF::loadView('dsaPdf.dsa',compact('dsa', 'address','dsaProof','dsapaymentdetails','dsabank','dsareference','countryname'));
        return $pdf->stream();
    }
    public function viewpdf($id)
    {
        return view('dsaPdf.ViewPdfAdmin',compact('id'));
    }


}
