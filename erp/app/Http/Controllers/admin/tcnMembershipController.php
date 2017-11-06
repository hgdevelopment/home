<?php
namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Relations\Relation;
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
use App\Notifications\TcnApplication;
use Illuminate\Support\Facades\Notification;

use Auth;
use Carbon;
use DB;
use Alert;
use Mail;
class tcnMembershipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('admin/tcn/tcnmembership/tcnMembership');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

       $fDate = $request->fDate.' 00:00:00';
       $tDate = $request->tDate.' 23:59:59';
       $fDate = Carbon::createFromFormat('d-m-Y H:i:s', $fDate)->toDateTimeString();
       $tDate = Carbon::createFromFormat('d-m-Y H:i:s', $tDate)->toDateTimeString();
       
       if($request->searchBy=='DSA Code')
       {
       $dsaCode=User::join('dsas','dsas.userId','=','logins.id')->where('logins.username',$request->searchValue)->select('logins.id')->get();
       foreach($dsaCode as $dsaCode)
       $addedId=$dsaCode->id;
       }

       if($request->searchBy=='OI Code')
       {
       $dsaCode=User::where('username',$request->searchValue)->where('userType','OI')->select('logins.id')->get();
       foreach($dsaCode as $dsaCode)
       $addedId=$dsaCode->id;
       }
       if($request->searchBy=='ME Code')
       {
       $meCode=User::where('username',$request->searchValue)->where('userType','ME')->select('id')->get();
       foreach($meCode as $meCode)
       $addedId=$meCode->id;
       }

      $details = tcnrequest::join('memberregistrations','tcnrequests.userId','=','memberregistrations.userId')->join('tcnmasters','tcnmasters.id','=','tcnrequests.tcn_id')->join('logins','logins.id','=','memberregistrations.userId');
      $details=$details->where('tcnrequests.status','Approved');
      $details=$details->where('logins.status','Active');
      $details=$details->where('tcnrequests.physicalBenefit','Yes');
        if($request->searchBy!='0')
        {

            if(in_array($request->searchBy,array('Member Code','Member Name','Mobile Number')))
            {
                if($request->searchBy=='Member Code')
                $details=$details->where('memberregistrations.code',$request->searchValue);
                 if($request->searchBy=='Member Name')
                $details=$details->where('memberregistrations.name', 'LIKE', '%'.$request->searchValue.'%');
                 if($request->searchBy=='Mobile Number')
                $details=$details->where('memberregistrations.mobileNo', 'LIKE', '%'.$request->searchValue.'%');
            }
            if($request->searchBy=='DSA Code' || $request->searchBy=='OI Code' || $request->searchBy=='ME Code')
                $details=$details->where('tcnrequests.addedId',$addedId);

            if($request->searchBy=='Transaction ID')
                $details=$details->where('tcnrequests.transactionNumber',$request->searchValue);
        }

        if($request->checkDate=='true')
        $details=$details->whereBetween('tcnrequests.approvalDate', [$fDate, $tDate]);

        if($request->tcnType!='All')
        $details=$details->where('tcnmasters.id',$request->tcnType);

        if($request->currencyType!='All')
        $details=$details->where('tcnrequests.currencyType',$request->currencyType);

        $details=$details->select('tcnrequests.id as tcnId','tcnrequests.*','memberregistrations.*','tcnmasters.tcnType');

        $details=$details->orderby('tcnrequests.id','DESC')->get();

        $count=count($details);
        return view('admin.tcn.tcnmembership.tcnMembershipList',compact('request','details','count')); 
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
}
