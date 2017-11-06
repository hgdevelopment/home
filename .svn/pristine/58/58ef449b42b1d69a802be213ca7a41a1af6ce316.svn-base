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
use App\memberregistration;
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
use App\withdrawalrequest;
use App\Notifications\DsaApproval;
use Illuminate\Support\Facades\Notification;
class dsaWithdrawController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.withdraw.DsaWithdraw');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $dsaCode=$request->dsaCode;

        $checkdsaDetails=login::where('logins.username', '=', $dsaCode)->first();
        if($checkdsaDetails->status == "Active")
        {
            $dsaDetails=login::join('dsas','dsas.userId','=','logins.id')->where('logins.username', '=', $dsaCode)->where('logins.status', 'Active')->select('logins.username as code', 'dsas.*')->first();

            $userId=$dsaDetails->userId;
            $dsaAddress=address::join('dsas','dsas.userId','=','addresses.userId')->where('addresses.userId', $userId)->where('addresses.typeOfAddress', 'permanent')->first();

            $dsapaymentdetails=paymentdetails::join('dsas','dsas.userId','=','paymentdetails.userId')->where('paymentdetails.userId', $userId)->select('paymentdetails.*')->first();
            $dsabank=bank::join('dsas','dsas.userId','=','banks.userId')->where('banks.userId', $userId)->select('banks.*')->first();
            $countryname = dsa::join('countries','countries.id','=','dsas.countryId')->select('countries.countryName as countryNames')->where('userId', $userId)->first();
            return view('admin.withdraw.DsaWithdrawDetails',compact('dsaDetails','dsaAddress','dsapaymentdetails','dsabank','countryname'));
        }
        else
        {
            return;
        }
        

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $session=Auth::guard('admin')->user();
        $sessionId=$session->id;
        $userId=$request->userId;
        $withdraw = new withdrawalrequest;
        $login = login::where('id','=',$userId)->first();
        $login->status='Withdrawn';
        $login->save();
        $withdraw->userId=$userId;
        $withdraw->type='Dsa Withdrawal';
        $withdraw->status='Approved';
        $withdraw->appliedId=$sessionId;
        $withdraw->appliedDate=Carbon::now();
        $withdraw->approvalId=$sessionId;
        $withdraw->approvalBy=$request->approvedBy;
        $withdraw->approvalDate=Carbon::now();
        $withdraw->approvalDate=Carbon::now();
        $withdraw->online=$request->online;
        $withdraw->chequeNo=$request->chkNo;
        $withdraw->bank=$request->bank;
        $withdraw->debitAccountNo=$request->debitAccountNo;
        $withdraw->remarks=$request->remarks;
        $withdraw->save();
        Alert::success('DSA Withdraw Successfully', 'Success');
        return redirect ('admin/withdraw/viewDsaWithdrawDetails');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {

        $dsa= dsa::join('logins','logins.id','=','userId')->select('logins.username as code', 'dsas.*')->where('status','=','Withdraw Request')->get();
        return view('admin.withdraw.viewDsaWithdrawDetails',compact('dsa'));
    }
    public function viewWithdrawn($id)
    {
        $dsaDetails=dsa::join('logins','logins.id','=','userId')->select('logins.username as code', 'dsas.*')->where('userId', $id)->where('status','=','Withdrawn')->first();
        $dsaAddress=dsa::join('addresses','addresses.userId','=','dsas.userId')->where('addresses.userId', $id)->get();
        $dsaProof=proofs::join('dsas','dsas.userId','=','proofs.userId')->where('proofs.userId', $id)->select('*')->first();
        $dsapaymentdetails=paymentdetails::join('dsas','dsas.userId','=','paymentdetails.userId')->where('paymentdetails.userId', $id)->first();
        $dsabank=bank::join('dsas','dsas.userId','=','dsas.userId')->where('banks.userId', $id)->first();
        $dsareference=reference::join('dsas','references.userId','=','dsas.userId')->where('references.userId', $id)->first();
        $countryname = dsa::join('countries','countries.id','=','dsas.countryId')
        ->select('countries.countryName as countryNames')
        ->where('userId', $id)
        ->first();
        return view('admin.withdraw.editDsaWithdrawnDetails',compact('dsaDetails','dsaAddress','dsapaymentdetails','dsabank','countryname','dsaProof','dsareference'));
    }
    public function showWithdrawn()
    {

        $dsa= dsa::join('logins','logins.id','=','userId')->select('logins.username as code', 'dsas.*')->select('logins.username as code','dsas.*')->where('logins.status','=','Withdrawn')->get();

        return view('admin.withdraw.viewDsaWithdrawn',compact('dsa'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $dsaDetails=login::join('dsas','dsas.userId','=','logins.id')->where('logins.id', '=', $id)->where('logins.status', 'Withdraw Request')->select('logins.username as code', 'dsas.*')->first();

        $userId=$dsaDetails->userId;
       $dsaAddress=address::join('dsas','dsas.userId','=','addresses.userId')->where('addresses.userId', $userId)->where('addresses.typeOfAddress', 'permanent')->first();

        $dsapaymentdetails=paymentdetails::join('dsas','dsas.userId','=','paymentdetails.userId')->where('paymentdetails.userId', $userId)->select('paymentdetails.*')->first();
        $dsabank=bank::join('dsas','dsas.userId','=','banks.userId')->where('banks.userId', $userId)->select('banks.*')->first();
        $countryname = dsa::join('countries','countries.id','=','dsas.countryId')->select('countries.countryName as countryNames')->where('userId', $userId)->first();
        return view('admin.withdraw.DsaRequestEdit',compact('dsaDetails','dsaAddress','dsapaymentdetails','dsabank','countryname'));
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

        $login = User::where('id','=',$id)->first();
        $bank = bank::where('userId','=',$id)->first();
        $dsa = dsa::where('userId',$id)->select( 'dsas.addedId as addId')->first();
        $dsaAddId=$dsa->addId;

        $addedBy=User::find($dsaAddId);
        $addedByOi = User::where('userType','=','OI')->first();
        $login->status='Withdraw Request';
        $login->save();

        $bank->bankName=$request->incbankName;
        $bank->branchName=$request->incBranchName;
        $bank->ifsc=$request->incIfscCode;
        $bank->accountHolderName=$request->holderName;
        $bank->accountNumber=$request->incaccountnumber;
        $bank->save();
        if($dsaAddId!='myself')
        {
           $dsaMember = memberregistration::where('addedById', $id)->update(['addedById' => $dsaAddId, 'addedByUnder' =>$addedBy->userType]);
        }
        else
        {
            $dsaMember = memberregistration::where('addedById', $id)->update(['addedById' =>$addedByOi->id, 'addedByUnder' =>$addedByOi->userType]);
     
        }
        Alert::success('DSA Withdraw Request Successfully', 'Success');
        return redirect ('admin/dsaWithdraw');
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
