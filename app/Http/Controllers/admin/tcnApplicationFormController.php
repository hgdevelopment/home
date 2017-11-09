<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Relations\Relation;
use App\Notifications\TcnApplication;
use Illuminate\Support\Facades\Notification;
use App\tcnrequest;
use App\tcnmaster;
use App\bank;
use App\memberregistration;
use App\nominee;
use App\address;
use App\proofs;
use App\country;
use App\paymentdetails;
use App\tcn_allot;
use App\useraccess;
use App\page;
use App\User;
use Auth;
use Carbon;
use DB;
use Alert;
use Mail;
class tcnApplicationFormController extends Controller
{


  public function index()
  {
    return view('admin.tcn.tcnapplication.tcnApplicationForm'); 
  }



  public function store(Request $request)
  {   


    if($request->has('doc1')){
        $this->validate($request,[ 'doc1'=>'required|image:jpg,png,jpeg', ]);}

    if($request->has('doc2')){
        $this->validate($request,[ 'doc2'=>'required|image:jpg,png,jpeg', ]);}

    if($request->has('doc3')){
        $this->validate($request,[ 'doc3'=>'required|image:jpg,png,jpeg', ]);}

    if($request->has('uploadPhoto')){
        $this->validate($request,[ 'uploadPhoto'=>'required|image:jpg,png,jpeg', ]); }

    if($request->has('signature')){
        $this->validate($request,[ 'signature'=>'required|image:jpg,png,jpeg', ]);}

    if($request->has('proofCopy')){
        $this->validate($request,[ 'proofCopy'=>'required|image:jpg,png,jpeg', ]);}

        $this->validate($request,[ 'memberCode'=>'required']);


    $logins=Auth::guard('admin')->user();

    if(Auth::guard('admin')->check())
    $LogInId    =$logins->id;
    else
    $LogInId    =0;

    $tcnmaster          = new tcnmaster();
    $bank               = new bank;
    $memberregistration = new memberregistration;
    $country            = new country;



    // BENEFIT ACCOUNT ADD
    $memberUserId=$request->memberUserId;

    $benefitId=$request->selectAccountNumber;

    if($benefitId=='Others')
    {
    $bank->userId=$request->memberUserId;

    $bank->bankName=$request->bankName;

    $bank->branchName=$request->branchName;

    $bank->ifsc=$request->ifsc;

    $bank->accountHolderName=$request->accountHolderName;

    $bank->accountNumber=$request->accountNumber;

    $bank->typeOfAccount='TCN Benefit';

    $bank->save();

    $benefitId=$bank->id;
    }


    //new nominee


    $nomineeId1 = $request->nominee1;
    $nomineeId2 = $request->nominee2;

    //Nominee First Added***************FIRST NOMINEE ADD*******************************

    if($nomineeId1=="Others1")
    {

    $uploadPhoto1 = 'photo1'.time().'.'.$request->uploadPhoto1->getClientOriginalExtension();
    $request->uploadPhoto1->move(storage_path('img/nominee'), $uploadPhoto1);


    $signature1 = 'sign1'.time().'.'.$request->signature1->getClientOriginalExtension();
    $request->signature1->move(storage_path('img/nominee'), $signature1);

    $nominee            = new nominee;
    $nominee->userId=$request->memberUserId;

    $nominee->name=$request->name1;

    $nominee->dob=date('Y-m-d', strtotime($request->dob1));

    $nominee->relationWithApplicant=$request->relationWithApplicant1;

    $nominee->addressId='0';

    $nominee->signature=$signature1;

    $nominee->uploadPhoto=$uploadPhoto1;

    $nominee->mobile=$request->mobile1;

    $nominee->email=$request->email1;

    $nominee->gender=$request->gender1;

    $nominee->proofId='0';

    $nominee->save();

    $nomineeId1=$nominee->id;


    $address  = new address;
    $address->userId='0';

    $address->address=$request->address1;

    $address->city=$request->city1;

    $address->state=$request->state1;

    $address->pin=$request->pin1;

    $address->typeOfAddress='Nominee';

    $address->save();

    $addressId1=$address->id;



    $proofCopy1 = 'proof1'.time().'.'.$request->proofCopy1->getClientOriginalExtension();

    $request->proofCopy1->move(storage_path('img/proof'), $proofCopy1);


    $proofs             = new proofs;
    $proofs->userId='0';

    $proofs->typeOfProof=$request->typeOfProof1;

    $proofs->proofNumber=$request->proofNumber1;

    // $proofs->placeOfIssue=$request->placeOfIssue;
    // $proofs->dateOfIssue=date("Y-m-d",strtotime($request->dateOfIssue));
    // $proofs->dateOfExpiry=date("Y-m-d",strtotime($request->dateOfExpiry));
    $proofs->file=$proofCopy1;

    $proofs->save();

    $proofId1=$proofs->id;

    DB::table('nominees')->where('id', $nomineeId1)->update(['addressId' => $addressId1, 'proofId' => $proofId1]);
    }


    //Nominee Second Added***************SECOND NOMINEE ADD*******************************

    if($nomineeId2=="Others2")
    {

    $uploadPhoto2 = 'photo2'.time().'.'.$request->uploadPhoto2->getClientOriginalExtension();
    $request->uploadPhoto2->move(storage_path('img/nominee'), $uploadPhoto2);


    $signature2 = 'sign2'.time().'.'.$request->signature2->getClientOriginalExtension();
    $request->signature2->move(storage_path('img/nominee'), $signature2);

    $nominee            = new nominee;
    $nominee->userId=$request->memberUserId;

    $nominee->name=$request->name2;

    $nominee->dob=date('Y-m-d', strtotime($request->dob2));

    $nominee->relationWithApplicant=$request->relationWithApplicant2;

    $nominee->addressId='0';

    $nominee->signature=$signature2;

    $nominee->uploadPhoto=$uploadPhoto2;

    $nominee->mobile=$request->mobile2;

    $nominee->email=$request->email2;

    $nominee->gender=$request->gender2;

    $nominee->proofId='0';

    $nominee->save();

    $nomineeId2=$nominee->id;


    $address = new address;
    $address->userId='0';

    $address->address=$request->address2;

    $address->city=$request->city2;

    $address->state=$request->state2;

    $address->pin=$request->pin2;

    $address->typeOfAddress='Nominee';

    $address->save();

    $addressId2=$address->id;



    $proofCopy2 = 'proof2'.time().'.'.$request->proofCopy2->getClientOriginalExtension();

    $request->proofCopy2->move(storage_path('img/proof'), $proofCopy2);


    $proofs  = new proofs;
    $proofs->userId='0';

    $proofs->typeOfProof=$request->typeOfProof2;

    $proofs->proofNumber=$request->proofNumber2;

    // $proofs->placeOfIssue=$request->placeOfIssue;
    // $proofs->dateOfIssue=date("Y-m-d",strtotime($request->dateOfIssue));
    // $proofs->dateOfExpiry=date("Y-m-d",strtotime($request->dateOfExpiry));
    $proofs->file=$proofCopy2;

    $proofs->save();

    $proofId2=$proofs->id;

    DB::table('nominees')->where('id', $nomineeId2)->update(['addressId' => $addressId2, 'proofId' => $proofId2]);
    }



    //DOC1
    $doc1 = 'doc1'.time().'.'.$request->doc1->getClientOriginalExtension();
    $request->doc1->move(storage_path('img/tcndocs'), $doc1);

    //DOC2
    $doc2 = 'doc2'.time().'.'.$request->doc2->getClientOriginalExtension();
    $request->doc2->move(storage_path('img/tcndocs'), $doc2);

    //DOC3
    $doc3 = 'doc3'.time().'.'.$request->doc3->getClientOriginalExtension();
    $request->doc3->move(storage_path('img/tcndocs'), $doc3);


    $tcnrequest         =tcnrequest::where('id',$request->tcnId)->update([
    'userId'            => $memberUserId,
    'doc1'              => $doc1,
    'doc2'              => $doc2,
    'doc3'              =>$doc3,
    'depositeDate'      =>Carbon::createFromFormat('d-m-Y', $request->depositeDate)->toDateTimeString(),
    'transactionNumber' =>$request->transactionNumber,
    'addedId'           =>$LogInId,
    'status'            =>'Pending',
    'addedDate'         =>date('Y-m-d'),
    'approvalId'        =>'0',
    'approvalDate'      =>date('Y-m-d H:i:s'),
    'nominee1_id'        =>$nomineeId1,
    'nominee2_id'        =>$nomineeId2,
    'benefitId'         =>$benefitId]);

    $id=$request->tcnId;


    // notification
    $userids=useraccess::where('page_id','74')->where('status','Active')->get();

    foreach ($userids as $key => $value)
    {
        $array_userids[]=$value->userId;
    }

    $array_userids[]=$LogInId;

    $notification_users=User::whereIn('id',$array_userids)->get();

    $tcn=tcnrequest::find($id);


    Notification::send($notification_users,new TcnApplication($tcn,['url'=>'/admin/tcnApplicationForm/document@@@'.$id,'perminssions'=>$array_userids,'message'=>'New task TCN Document Verification<br/>(TCN Applied User:'.$logins->username,'auth_user'=>$logins->username]));

    $type='TCN';
    $report='Create New TCN and Save TCN,Nominee Details. TCN Code : '. $request->tcnCode;
    Controller::logReport($type,$report);


    Alert::success('New TCN Created Successfully', 'Success');

    return View('admin.tcn.tcnapplication.tcnpdf',compact('id'));
  }







  public function show($id)
  {

    $view   = false;

    /***********TCN APPLICATION LIST*****************/
    if($id == 'show')
    {
        $tcntypes = tcnmaster::all();
        return view('admin.tcn.tcnapplication.tcnApplicationList',compact('tcntypes'));
    }
    



    /***********TCN APPLICATION VIEW*****************/

    if (strpos($id, 'view') !== false)
    {
        $id     =explode('@@@',$id);

        $view   =true;

        $id     =$id[1];
    }
    else if (strpos($id, 'document') !== false)
    {




    /***********TCN NOTIFICATION VIA DOCUMENT APPROVAL*****************/


        $id         =explode('@@@',$id);

        $id         = $id[1];

        $checkDoc   =tcnrequest::find($id);

        if(Controller::UserAccessRights('TCN Document Verification')!='1')
        { 
        $view   =true;
        Alert::info('You do not have access rights for this activty...', 'Info');
        } 

        if($checkDoc->docVerified=='Verified')/****Once this TCN already Doc Verified Redirect View page  ***/
        { 
        $view   =true;
        Alert::info('This TCN Documents are already Verified...', 'Info');
        } 
    }
    else if (strpos($id, 'payment') !== false)
    {




    /***********TCN NOTIFICATION VIA PAYMENT APPROVAL*****************/

        $id         =explode('@@@',$id);
        $id         = $id[1];
        $checkPay   =tcnrequest::find($id);

        if(Controller::UserAccessRights('TCN Payment Verification')!='1')
        { 
        $view   =true;
        Alert::info('You do not have access rights for this activty...', 'Info');
        } 

        if($checkPay->paymentReceived=='Received')/****Once this TCN already Payment Verified Redirect View page  ***/
        {  
        $view       =true;
        Alert::info('This TCN Payments is already Received...', 'Info');
        }
    }
    else
    $id=$id;    

    //~~~~~~~~~~~~~~~TCN APPLICATION DETAILS ~~~~~~~~~~~~~~~~//

    $request            = new tcnApplicationFormController();
    $request->id        =$id;

    $tcnrequest         = tcnrequest::all()->where('id',$id);
                        foreach($tcnrequest as $tcnrequests);

    $bank               =bank::all()->where('id',$tcnrequests->benefitId);
                        foreach($bank as $banks);

    $nominee1            = nominee::all()->where('id',$tcnrequests->nominee1_id);
                        foreach($nominee1 as $nominees1);

    $nominee2            = nominee::all()->where('id',$tcnrequests->nominee2_id);
                        foreach($nominee2 as $nominees2);

    $addres2            = address::all()->where('id',$nominees1->addressId);
                        foreach($addres2 as $address2);

    $addres3            = address::all()->where('id',$nominees2->addressId);
                        foreach($addres3 as $address3);

    $proof1              = proofs::all()->where('id',$nominees1->proofId);
                        foreach($proof1 as $proofs1);

    $proof2              = proofs::all()->where('id',$nominees2->proofId);
                        foreach($proof2 as $proofs2);


    $memberregistration = memberregistration::all()->where('userId',$tcnrequests->userId);
                        foreach($memberregistration as $memberregistrations);

    $country            = country::all()->where('id',$memberregistrations->countryId);
                        foreach($country as $countrys);

    $addres1            = address::all()->where('userId',$memberregistrations->userId)->where('typeOfAddress','permanent');
                        foreach($addres1 as $address1);

    if($view==true)
    {
    $paymentdetails     = paymentdetails::all()->where('id',$tcnrequests->paymentId);
                        foreach($paymentdetails as $paymentdetail);

    return view('admin.tcn.tcnapplication.tcnApplicationView',compact('request','tcnrequests','banks','nominees1','nominees2','address2','address3','address1','proofs1','proofs2','memberregistrations','countrys','paymentdetail'));
    }

    //TCN DOCUMENT APPROVAL PAGE
    if($tcnrequests->docVerified=='Pending' && $tcnrequests->status=='Pending' && Controller::UserAccessRights('TCN Document Verification')=='1')
    return view('admin.tcn.tcnapplication.tcnDocumentVerification',compact('request','tcnrequests','banks','nominees1','nominees2','address2','address3','address1','proofs1','proofs2','memberregistrations','countrys'));

    //TCN PAYMENT VERIFICATION PAGE
    if($tcnrequests->docVerified!='Pending' && $tcnrequests->paymentReceived=='Pending' && $tcnrequests->status=='Pending' && Controller::UserAccessRights('TCN Payment Verification')=='1')
    return view('admin.tcn.tcnapplication.tcnPaymentVerification',compact('request','tcnrequests','banks','nominees1','nominees2','address2','address3','address1','proofs1','proofs2','memberregistrations','countrys'));
   

    //TCN RE APPROVAL PAGE
    if($tcnrequests->status=='Denied' && Controller::UserAccessRights('TCN Reapproval')=='1')
    return view('admin.tcn.tcnapplication.tcnReapproval',compact('request','tcnrequests','banks','nominees1','nominees2','address2','address3','address1','proofs1','proofs2','memberregistrations','countrys'));
    

    //TCN VIEW PAGE
    return view('admin.tcn.tcnapplication.tcnApplicationView',compact('request','tcnrequests','banks','nominees1','nominees2','address2','address3','address1','proofs1','proofs2','memberregistrations','countrys'));
    
  }






  public function edit($id)
  {
    $tcnrequest = tcnrequest::all()->where('id',$id);
    foreach($tcnrequest as $tcnrequests);

    $bank = bank::all()->where('id',$tcnrequests->benefitId);
    foreach($bank as $banks);

    $nominee1 = nominee::all()->where('id',$tcnrequests->nominee1_id);
    foreach($nominee1 as $nominees1);

    $nominee2 = nominee::all()->where('id',$tcnrequests->nominee2_id);
    foreach($nominee2 as $nominees2);

    $addres2 = address::all()->where('id',$nominees->addressId);
    foreach($addres2 as $address2);

    $proof = proofs::all()->where('id',$nominees->proofId);
    foreach($proof as $proofs);

    $memberregistration = memberregistration::all()->where('userId',$tcnrequests->userId);
    foreach($memberregistration as $memberregistrations);

    $country = country::all()->where('id',$tcnrequests->applyingFrom);
    foreach($country as $countrys);

    $addres1 = address::all()->where('userId',$memberregistrations->userId);
    foreach($addres1 as $address1);


    return view('admin.tcn.tcnapplication.tcnApplicationFormEdit',compact('tcnrequests','memberregistrations','countrys','banks','nominees1','nominees2','address2','proofs'));
  }













  public function update(Request $request, $id)
  {
    if($request->has('doc1')){
        $this->validate($request,[ 'doc1'=>'required|image:jpg,png,jpeg', ]);}
    
    if($request->has('doc2')){
        $this->validate($request,[ 'doc2'=>'required|image:jpg,png,jpeg', ]);}

    if($request->has('doc3')){
        $this->validate($request,[ 'doc3'=>'required|image:jpg,png,jpeg', ]);}

    if($request->has('uploadPhoto')){
        $this->validate($request,[ 'uploadPhoto'=>'required|image:jpg,png,jpeg', ]);

    }
    if($request->has('signature')){
        $this->validate($request,[ 'signature'=>'required|image:jpg,png,jpeg', ]);}

    if($request->has('proofCopy')){
        $this->validate($request,[ 'proofCopy'=>'required|image:jpg,png,jpeg', ]);}

        $this->validate($request,[ 'memberCode'=>'required']);

    // BENEFIT ACCOUNT UPDATE

    if(Auth::guard('admin')->check())
    $LogInId    =Auth::guard('admin')->user()->id;
    else
    $LogInId    =0;

    $memberUserId=$request->memberUserId;

    $benefitId=$request->selectAccountNumber;

    if($request->selectAccountNumber=='Others')
        $bank            = new bank; 
    else
        $bank = bank::find($request->selectAccountNumber);
        
    $bank->userId=$request->memberUserId;

    $bank->bankName=$request->bankName;

    $bank->branchName=$request->branchName;

    $bank->ifsc=$request->ifsc;

    $bank->accountHolderName=$request->accountHolderName;

    $bank->accountNumber=$request->accountNumber;

    $bank->typeOfAccount='TCN Benefit';

    $bank->save();
    
    if($request->selectAccountNumber=='Others')
    $benefitId=$bank->id;  




    //Nominee First Update***************FIRST NOMINEE UPDATE*******************************
    $nominee1_id=$request->nominee1;

    if($request->nominee1!='' && $request->nominee1!='Others1')
    {
    $nominee = nominee::find($request->nominee1);

    $nominee->userId=$request->memberUserId;

    $nominee->name=$request->name1;

    $nominee->dob=Carbon::createFromFormat('d-m-Y', $request->dob1)->toDateTimeString();

    $nominee->relationWithApplicant=$request->relationWithApplicant1;

    $nominee->addressId=$request->addressId1;

    if($request->uploadPhoto1){

    $uploadPhoto1 = 'photo1'.time().'.'.$request->uploadPhoto1->getClientOriginalExtension();

    $request->uploadPhoto1->move(storage_path('img/nominee'), $uploadPhoto1);

    $nominee->uploadPhoto=$uploadPhoto1;

    }

    if($request->signature1){

    $signature1 = 'sign1'.time().'.'.$request->signature1->getClientOriginalExtension();

    $request->signature1->move(storage_path('img/nominee'), $signature1);

    $nominee->signature=$signature1;

    }            

    $nominee->mobile=$request->mobile1;

    $nominee->email=$request->email1;

    $nominee->gender=$request->gender1;

    $nominee->proofId=$request->proofId1;

    $nominee->save();



    $address = address::find($request->addressId1);

    $address->userId='0';

    $address->address=$request->address1;

    $address->city=$request->city1;

    $address->state=$request->state1;

    $address->pin=$request->pin1;

    $address->typeOfAddress='nominee';

    $address->save();



    $proofs = proofs::find($request->proofId1);

    if($request->proofCopy1){

    $proofCopy1 = 'proof1'.time().'.'.$request->proofCopy1->getClientOriginalExtension();

    $request->proofCopy1->move(storage_path('img/proof'), $proofCopy1);

    $proofs->file=$proofCopy1;

    }

    $proofs->userId=$request->nominee1;

    $proofs->typeOfProof=$request->typeOfProof1;

    $proofs->proofNumber=$request->proofNumber1;

    // $proofs->placeOfIssue=$request->placeOfIssue;
    // $proofs->dateOfIssue=date("Y-m-d",strtotime($request->dateOfIssue));
    // $proofs->dateOfExpiry=date("Y-m-d",strtotime($request->dateOfExpiry));

    $proofs->save();


    }
    if($request->nominee1=='Others1')
    {


    $uploadPhoto1 = 'photo1'.time().'.'.$request->uploadPhoto1->getClientOriginalExtension();
    $request->uploadPhoto1->move(storage_path('img/nominee'), $uploadPhoto1);


    $signature1 = 'sign1'.time().'.'.$request->signature1->getClientOriginalExtension();
    $request->signature1->move(storage_path('img/nominee'), $signature1);

    $nominee            = new nominee;
    $nominee->userId=$request->memberUserId;

    $nominee->name=$request->name1;

    $nominee->dob=date('Y-m-d', strtotime($request->dob1));

    $nominee->relationWithApplicant=$request->relationWithApplicant1;

    $nominee->addressId='0';

    $nominee->signature=$signature1;

    $nominee->uploadPhoto=$uploadPhoto1;

    $nominee->mobile=$request->mobile1;

    $nominee->email=$request->email1;

    $nominee->gender=$request->gender1;

    $nominee->proofId='0';

    $nominee->save();

    $nomineeId1=$nominee->id;


    $address  = new address;
    $address->userId='0';

    $address->address=$request->address1;

    $address->city=$request->city1;

    $address->state=$request->state1;

    $address->pin=$request->pin1;

    $address->typeOfAddress='Nominee';

    $address->save();

    $addressId1=$address->id;



    $proofCopy1 = 'proof1'.time().'.'.$request->proofCopy1->getClientOriginalExtension();

    $request->proofCopy1->move(storage_path('img/proof'), $proofCopy1);


    $proofs             = new proofs;
    $proofs->userId='0';

    $proofs->typeOfProof=$request->typeOfProof1;

    $proofs->proofNumber=$request->proofNumber1;

    // $proofs->placeOfIssue=$request->placeOfIssue;
    // $proofs->dateOfIssue=date("Y-m-d",strtotime($request->dateOfIssue));
    // $proofs->dateOfExpiry=date("Y-m-d",strtotime($request->dateOfExpiry));
    $proofs->file=$proofCopy1;

    $proofs->save();

    $proofId1=$proofs->id;

    DB::table('nominees')->where('id', $nomineeId1)->update(['addressId' => $addressId1, 'proofId' => $proofId1]);
    $nominee1_id=$nomineeId1;
    }

    //Nominee Second Update***************SECOND NOMINEE UPDATE*******************************



    $nominee2_id=$request->nominee2;

    if($request->nominee2!='' && $request->nominee2!='Others2')
    {
    $nominee = nominee::find($request->nominee2);

    $nominee->userId=$request->memberUserId;

    $nominee->name=$request->name2;

    $nominee->dob=Carbon::createFromFormat('d-m-Y', $request->dob2)->toDateTimeString();

    $nominee->relationWithApplicant=$request->relationWithApplicant2;

    $nominee->addressId=$request->addressId2;

    if($request->uploadPhoto2){

    $uploadPhoto2 = 'photo2'.time().'.'.$request->uploadPhoto2->getClientOriginalExtension();

    $request->uploadPhoto2->move(storage_path('img/nominee'), $uploadPhoto2);

    $nominee->uploadPhoto=$uploadPhoto2;

    }

    if($request->signature2){

    $signature2 = 'sign2'.time().'.'.$request->signature2->getClientOriginalExtension();

    $request->signature2->move(storage_path('img/nominee'), $signature2);

    $nominee->signature=$signature2;

    }            

    $nominee->mobile=$request->mobile2;

    $nominee->email=$request->email2;

    $nominee->gender=$request->gender2;

    $nominee->proofId=$request->proofId2;

    $nominee->save();



    $address = address::find($request->addressId2);

    $address->userId='0';

    $address->address=$request->address2;

    $address->city=$request->city2;

    $address->state=$request->state2;

    $address->pin=$request->pin2;

    $address->typeOfAddress='nominee';

    $address->save();



    $proofs = proofs::find($request->proofId2);

    if($request->proofCopy2){

    $proofCopy2 = 'proof2'.time().'.'.$request->proofCopy2->getClientOriginalExtension();

    $request->proofCopy2->move(storage_path('img/proof'), $proofCopy2);

    $proofs->file=$proofCopy2;

    }

    $proofs->userId='0';

    $proofs->typeOfProof=$request->typeOfProof2;

    $proofs->proofNumber=$request->proofNumber2;

    // $proofs->placeOfIssue=$request->placeOfIssue;
    // $proofs->dateOfIssue=date("Y-m-d",strtotime($request->dateOfIssue));
    // $proofs->dateOfExpiry=date("Y-m-d",strtotime($request->dateOfExpiry));

    $proofs->save();
    }

    if($request->nominee2=='Others2')
    {


    $uploadPhoto2 = 'photo2'.time().'.'.$request->uploadPhoto2->getClientOriginalExtension();
    $request->uploadPhoto2->move(storage_path('img/nominee'), $uploadPhoto2);


    $signature2 = 'sign2'.time().'.'.$request->signature2->getClientOriginalExtension();
    $request->signature2->move(storage_path('img/nominee'), $signature2);

    $nominee            = new nominee;
    $nominee->userId=$request->memberUserId;

    $nominee->name=$request->name2;

    $nominee->dob=date('Y-m-d', strtotime($request->dob2));

    $nominee->relationWithApplicant=$request->relationWithApplicant2;

    $nominee->addressId='0';

    $nominee->signature=$signature2;

    $nominee->uploadPhoto=$uploadPhoto2;

    $nominee->mobile=$request->mobile2;

    $nominee->email=$request->email2;

    $nominee->gender=$request->gender2;

    $nominee->proofId='0';

    $nominee->save();

    $nomineeId2=$nominee->id;


    $address = new address;
    $address->userId='0';

    $address->address=$request->address2;

    $address->city=$request->city2;

    $address->state=$request->state2;

    $address->pin=$request->pin2;

    $address->typeOfAddress='Nominee';

    $address->save();

    $addressId2=$address->id;



    $proofCopy2 = 'proof2'.time().'.'.$request->proofCopy2->getClientOriginalExtension();

    $request->proofCopy2->move(storage_path('img/proof'), $proofCopy2);


    $proofs  = new proofs;
    $proofs->userId='0';

    $proofs->typeOfProof=$request->typeOfProof2;

    $proofs->proofNumber=$request->proofNumber2;

    // $proofs->placeOfIssue=$request->placeOfIssue;
    // $proofs->dateOfIssue=date("Y-m-d",strtotime($request->dateOfIssue));
    // $proofs->dateOfExpiry=date("Y-m-d",strtotime($request->dateOfExpiry));
    $proofs->file=$proofCopy2;

    $proofs->save();

    $proofId2=$proofs->id;

    DB::table('nominees')->where('id', $nomineeId2)->update(['addressId' => $addressId2, 'proofId' => $proofId2]);
    $nominee2_id=$nomineeId2;
    }


    $tcnrequest = tcnrequest::find($id);

    if($request->doc2)
    {

    $doc2 = 'doc2'.time().'.'.$request->doc2->getClientOriginalExtension();

    $request->doc2->move(storage_path('img/tcndocs'), $doc2);

    $tcnrequest->doc2=$doc2;

    }

    if($request->doc3)
    {

    $doc3 = 'doc3'.time().'.'.$request->doc3->getClientOriginalExtension();

    $request->doc3->move(storage_path('img/tcndocs'), $doc3);

    $tcnrequest->doc3=$doc3;

    }

    $tcnrequest->userId=$memberUserId;

    if($request->doc1)
    {

    $doc1 = 'doc1'.time().'.'.$request->doc1->getClientOriginalExtension();

    $request->doc1->move(storage_path('img/tcndocs'), $doc1);

    $tcnrequest->doc1=$doc1;

    }        


    $tcnrequest->depositeDate=Carbon::createFromFormat('d-m-Y', $request->depositeDate)->toDateTimeString();

    $tcnrequest->transactionNumber=$request->transactionNumber;

    $tcnrequest->nominee1_id=$nominee1_id;
    $tcnrequest->nominee2_id=$nominee2_id;

    $tcnrequest->benefitId=$benefitId;
    // $tcnrequest->currencyType=$request->currencyType;

    // $tcnrequest->unit=$request->unit;

    // $tcnrequest->amount=$request->amount;

    // $tcnrequest->paymentMode=$request->paymentMode;

    // $tcnrequest->applyingFrom=$request->applyingFrom;

    // $tcnrequest->heeraAccountId=$request->heeraAccountId;

    //$tcnrequest->addedId=$LogInId;
    // $tcnrequest->tcn_id=$request->tcnType;

    $tcnrequest->save();

    $type='TCN';
    $report='Update/Edit  TCN Details. TCN Code : '. $request->tcnCode;
    Controller::logReport($type,$report);

    Alert::success('TCN Details Updated Successfully', 'Updated');

    return redirect('admin/tcnApplicationForm/view@@@'.$id);

  }








  public function destroy($id)
  {
  //
  }




  /****Create***************************THIS SINGLE ROUTE CONTROLLER****************************
                    
                                RUN ALL ' AJAX FUNCTIONS'  AND RETURN RESPONSE

                Using opcode IS Just a Reference code Condition Based Work And Return Response

  **********************************************************************************************/




  public function create(Request $request)
   {


        $logins=Auth::guard('admin')->user();

        if(Auth::guard('admin')->check())
        $LogInId    =$logins->id;
        else
        $LogInId    =0;

        $date       =date('Y-m-d');
        $dateTime   =date('Y-m-d H:i:s');

        //-Start**-----------TCN APPLICATION APPROVE~DENY->DOCUMENT /PAYMENT----------------//

        if($request->opcode==30)
        { 

          //  TCN  documnet Approve/Deny           //








          if($request->button=='Document')
           {  

                         $checkPay   =tcnrequest::find($request->tcnId);


               if($request->status=='Approved')
                {
                        if($checkDoc->docVerified=='Verified')/****Once this TCN already Doc Verified Redirect View page  ***/
                        {
                        Alert::info('This TCN Documents are already Verified...', 'Info');
                        return $request->tcnId;
                        }

                  $update           = DB::table('tcnrequests')->where('id', $request->tcnId)->update([
                  'reason'          => $request->reason,
                  'docVerifiedId'   => $LogInId,
                  'docVerified'     => 'Verified',
                  'docVerifiedDate' => $dateTime]);

                  // notification
                  $userids=useraccess::where('page_id','75')->where('status','Active')->get();

                  foreach ($userids as $key => $value)
                    {

                        $array_userids[]=$value->userId;

                    }

                    $array_userids[]=$LogInId;

                    $notification_users=User::whereIn('id',$array_userids)->get();

                    $tcn=tcnrequest::find($request->tcnId);


                    Notification::send($notification_users,new TcnApplication($tcn,['url'=>'/admin/tcnApplicationForm/payment@@@'.$request->tcnId,'perminssions'=>$array_userids,'message'=>'New task TCN Payment Verification<br/>(Document Verified User:'.$logins->username,'auth_user'=>$logins->username]));

                    Alert::success('TCN Document Verified and Save Successfully', 'Success');

                    $type='TCN';
                    $report='TCN Document Verified. TCN Code : '. $checkPay->tcnCode;
                    Controller::logReport($type,$report);
                }

                if($request->status=='Denied')
                {

                    $update         = DB::table('tcnrequests')->where('id', $request->tcnId)->update([
                    'status'        => $request->status,
                    'approvalId'    => $LogInId,
                    'reason'        => $request->reason,
                    'approvalDate'  => $dateTime]);

                    $type='TCN';
                    $report='TCN Denied . TCN Code : '. $checkPay->tcnCode;
                    Controller::logReport($type,$report);

                    Alert::info('This TCN Request is Denied Successfully', 'Success');
                }
            }










         //  TCN  Payment Approve/Deny           //

          if($request->button=='Payment')
           { 

                $checkPay   =tcnrequest::find($request->tcnId);

                if($request->status == 'Approved')
                {

                $paymentDateTime=Carbon::createFromFormat('d-m-Y', $request->receivedDate)->toDateTimeString();

               $paymentDate=Carbon::createFromFormat('d-m-Y', $request->receivedDate)->toDateTimeString();


                            if($checkPay->paymentReceived=='Received')/****Once this TCN already Payment Verified Redirect View page  ***/
                            {
                            Alert::info('This TCN Payments is already Received...', 'Info');
                            return 0;
                            }
                    $insert             =DB::table('paymentdetails')->insertGetId([
                    'userId'            => $request->userId, 
                    'refId'            => $request->tcnId, 
                    'bank'              => $request->bankName, 
                    'transactionNumber' => $request->transactionNumber,
                    'payment_mode'      => $request->paymentMode,
                    'branch'            => $request->branchName,
                    'paymentDate'       => $paymentDate,
                    'Type'              => 'TCN Payment',
                    'accountNumber'     => $request->accountNumber,
                    'file'              => '0',
                    'addedDate'         => $date,
                    'addedId'           => $LogInId,
                    'remarks'           => $request->reason, 
                    'created_at'        => $dateTime
                    ]);

                    $update               = DB::table('tcnrequests')->where('id', $request->tcnId)->update([
                    'status'              => 'Approved',
                    'inrAmount'              => $request->inrAmount,
                    'approvalId'          => $LogInId,
                    'approvalDate'        => $dateTime,
                    'status'              => 'Approved',
                    'paymentId'           => $insert,
                    'paymentReceived'     => 'Received',
                    'paymentReceivedDate' => $paymentDateTime]);     

                    $user   =Controller::UserDetails($request->userId);
                    $to     =$user->email;
                    $data   =[
                    'name' => $user->name,
                    'tcnCode' =>$checkPay->tcnCode
                    ];


                    Mail::send('admin.mail.approvedTCN', compact('data'), function ($message) use ($to) {

                        $message->from('heeraerptl@gmail.com', 'HEERA ERP');

                        $message->to($to)->subject(' You are Approved');
                    });


                    $type='TCN';
                    $report='TCN Payment Verified and Approved . TCN Code : '. $checkPay->tcnCode;
                    Controller::logReport($type,$report);


                    Alert::success('This TCN Payment Is Received and Approved Successfully', 'Success');
                    
                }


                if($request->status == 'Denied')
                {
                    $update         = DB::table('tcnrequests')->where('id', $request->tcnId)->update([
                    'status'        => $request->status, 
                    'reason'        => $request->reason, 
                    'approvalId'    => $LogInId,
                    'approvalDate'  => $dateTime]);

                    $type='TCN';
                    $report='TCN Denied . TCN Code : '. $checkPay->tcnCode;
                    Controller::logReport($type,$report);

                    Alert::info('This TCN Request is Denied Successfully', 'Success');
                } 
            }
            //  TCN  Reapproval          //

          if($request->button=='Reapprove')
           { 
                $checkPay   =tcnrequest::find($request->tcnId);

                $update                 = DB::table('tcnrequests')->where('id', $request->tcnId)->update([
                'status'                => 'Pending', 
                'approvalId'            => $LogInId,
                'reason'                => '( Reapproval )  '.$request->reason, 
                'docVerifiedId'         => '0',
                'docVerified'           => 'Pending',
                'docVerifiedDate'       => $dateTime,
                'paymentId'             => '0',
                'paymentReceived'       => 'Pending',
                'paymentReceivedDate'   => $dateTime,        
                'approvalDate'          => $dateTime]);

                $type='TCN';
                $report='TCN Reapprove Request . TCN Code : '. $checkPay->tcnCode;
                Controller::logReport($type,$report);


                Alert::success('This TCN Reapproval Request  Sent Successfully', 'Success');
            }
            return $request->tcnId;
        }

       //-End**-----------TCN APPLICATION APPROVE~DENY->DOCUMENT /PAYMENT----------------/

       //--Start**-------------GET TCN APPLICATION LIST FILTER---------------------//

        if($request->opcode==21)
        {

          // $fDate=date('Y-m-d',strtotime($request->fDate));
          // $tDate=date('Y-m-d',strtotime($request->tDate));
           $fDate = $request->fDate.' 00:00:00';
           $tDate = $request->tDate.' 23:59:59';
           $fDate = Carbon::createFromFormat('d-m-Y H:i:s', $fDate)->toDateTimeString();
           $tDate = Carbon::createFromFormat('d-m-Y H:i:s', $tDate)->toDateTimeString();
           

          $details = memberregistration::join('tcnrequests','tcnrequests.userId','=','memberregistrations.userId')->join('tcnmasters','tcnmasters.id','=','tcnrequests.tcn_id')->join('logins','logins.id','=','memberregistrations.userId');
          $details=$details->whereNotIn('tcnrequests.status',['notConfirm']);

          if($request->btn=='btn2')
          {
                if($request->memberCode!='')
                {
                $details=$details->where('logins.username',$request->memberCode);
                $details=$details->where('logins.status','Active');
                $details=$details->orWhere('tcnrequests.status','Transferred');
                $details=$details->where('logins.username',$request->memberCode);
                }
                if($request->tcnCode!='')
                {
                $details=$details->where('tcnrequests.tcnCode',$request->tcnCode);
                $details=$details->where('logins.status','Active');
                $details=$details->orWhere('tcnrequests.status','Transferred');
                $details=$details->where('tcnrequests.tcnCode',$request->tcnCode);
                }
          }
          if($request->btn=='btn1')
          {
                $details=$details->where('logins.status','Active');

                if($request->tcnType!='All')
                $details=$details->where('tcnmasters.id',$request->tcnType);

                if($request->status!='All')
                $details=$details->where('tcnrequests.status',$request->status);

                if($request->userId!='All')
                $details=$details->where('tcnrequests.userId',$request->userId);

                if($request->checkDate=='true')
                $details=$details->whereBetween('tcnrequests.approvalDate', [$fDate, $tDate]);
          }

          $details=$details->select('tcnrequests.id as tcnId','tcnrequests.*','memberregistrations.*','tcnmasters.tcnType');

          $details=$details->orderby('tcnrequests.id','DESC')->get();

          $count=count($details);

          return view('admin.tcn.tcnapplication.tcnAjax',compact('request','details','count'));
        }


       //--End**-------------GET TCN APPLICATION LIST FILTER---------------------//











      //---------------TCN APPLICATION FORM-----------------//

    
        if($request->opcode==1)
        {

            $table = tcnrequest::join('tcnmasters','tcnmasters.id','=','tcnrequests.tcn_id');

                if($request->edits!=1)
                $table=$table->where('tcnrequests.status','notConfirm');

                $table=$table->where('tcnrequests.tcnCode',$request->tcnCode)->get();
               

            $data['tcnCount']= count($table);

            if(count($table)==1)
            {
                foreach($table as $table)


               $table1 =DB::table('memberregistrations')->join('logins','logins.id','=','memberregistrations.userId')->where('logins.id',$table->userId)->where('logins.status','Active')->get();

                    $data['memberCount']=count($table1);


                foreach($table1 as $table1)
                    $data['memberCode']=$table1->code;

            }
            return  $data;   
        }


        if($request->opcode==10)
        $table = tcnmaster::all();

        if($request->opcode==2)
        $table = memberregistration::all()->where('code', $request->id)->first();

        if($request->opcode==3)
        {
         $tables = tcnrequest::where('tcnCode', $request->tcnCode)->get();
         foreach ($tables as $table)


           $data['currencyType']=$table->currencyType;
           $data['paymentMode']=$table->paymentMode;
           $data['unit']=$table->unit;
           $data['applyingFrom']=$table->applyingFrom;
           $data['applyingFromName']=$table->country->countryName;
           $data['heeraAccountId']=$table->heeraAccountId;
           $data['HeeraAccountnumber']=$table->heeraaccount->accountNumber;
           $data['amount']=$table->amount;
           $data['tcnId']=$table->id;

           $data['tcnName']=$table->tcn->tcnType;
        return $data;
        }



        if($request->opcode==4)
        $table = bank::where('userId', $request->id)->where('typeOfAccount','TCN Benefit')->get();

        if($request->opcode==5)
        $table = bank::all()->where('id', $request->id)->first();

        if($request->opcode==6)
        { 
        return $table = nominee::where('userId',$request->memberUserId)->get();
        }

        if($request->opcode==7)
        {   
          $relation =array('Father','Mother','Wife','Husband','Son','Daughter','Brother','Sister','Grand Son','Grand Daughter','Grand Mother','Grand Father','Maternal uncle','Paternal uncle','Others');
          if($request->opcode=='Others')
          {
          $address=$nominee='';
          }
          else
          {
          if(isset($request->id))
          $nominee = nominee::all()->where('id', $request->id)->first();
          if(isset($nominee->proofId))
          $proof = proofs::all()->where('id', $nominee->proofId)->first();
          if(isset($nominee->addressId))
          $address = address::all()->where('id', $nominee->addressId)->first();
          }
          return view('admin.tcn.tcnapplication.tcnAjax',compact('request','nominee','address','proof','relation')); 
        }


        if($request->opcode==8)
        {

        $table = DB::table('tcn_allots')->join('banks','banks.id','=','tcn_allots.account_id')->where('tcn_allots.tcn_id', $request->tcnType)->where('currency_type',$request->currencyType)->get();
        }

        if($request->opcode==11)
        {
        
        $table = DB::table('tcnmasters')->where('tcnType', $request->tcnType)->get();
        return count($table);
        }
     

        if($request->opcode==20)
        {
          $table = tcnmaster::find($request->id);
          if($request->currencyType=='INR') return $table->inr; 
          if($request->currencyType=='USD') return $table->usd;
          if($request->currencyType=='AED') return $table->aed;
          if($request->currencyType=='SAR') return $table->sar;
          if($request->currencyType=='CAD') return $table->cad;
        }

        if($request->opcode==22)
        {
          $table = DB::table('memberregistrations')
          ->join('tcnrequests','tcnrequests.userId','=','memberregistrations.userId')
          ->join('logins','logins.id','=','memberregistrations.userId');
          $table=$table->where('logins.status','Active');
          $table=$table->whereNotIn('tcnrequests.status',['notConfirm']);

          if($request->tcnType!='All')
          $table=$table->where('tcnrequests.tcn_id',$request->tcnType);

          if($request->status!='All')
          $table=$table->where('tcnrequests.status',$request->status);

          $table=$table->select('memberregistrations.name','logins.username','logins.id');

          $table=$table->groupBy('memberregistrations.name','logins.username','logins.id');

          $table=$table->get();
       
            return $table;
        }






     //  TCN  Add to Physical BEnefit List           //

        if($request->opcode==31)
        {

        $checkPay   =tcnrequest::find($request->tcnId);


          $update = DB::table('tcnrequests')->where('id', $request->tcnId)->update([
          'physicalBenefit' =>'Yes',
          'physicalBenefitAddedBy' => $LogInId
            ]);

            $type='TCN';
            $report='TCN Add to Physical BEnefit List. TCN Code : '. $checkPay->tcnCode;
            Controller::logReport($type,$report);


        return 1;
        }  


        //  TCN  Remove           //
        if($request->opcode==32)
        {

            $checkPay   =tcnrequest::find($request->tcnId);


          $update = DB::table('tcnrequests')->where('id', $request->tcnId)->update([
          'status' =>'Removed',
          'approvalId' => $LogInId,
          'approvalDate'=>$dateTime,
          'reason'=>$request->remarks]);

            $type='TCN';
            $report='TCN Remove. TCN Code : '. $checkPay->tcnCode;
            Controller::logReport($type,$report);


        return 1;
        } 
        
     return view('admin.tcn.tcnapplication.tcnAjax',compact('request','table'));
    }



   
}
