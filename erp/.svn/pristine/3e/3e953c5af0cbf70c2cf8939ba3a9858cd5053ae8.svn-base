<?php
namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\memberregistration;
use App\country;
use App\nominee;
use App\bank;
use App\tcnmaster;
use App\tcnrequest;
use App\withdrawalrequest;
use App\benefitgeneration;
use DB;
class tcnwithDrawalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
      if(Auth::guard('user')->check())
      $LogInId=Auth::guard('user')->user()->id;
      else
      $LogInId=0;

        $withdraw = new withdrawalrequest;
        $withdraw ->tcnId=$request->tcnId;
        $withdraw ->userId=$request->userId;
        $withdraw ->unit=$request->unit;
        $withdraw ->amount=$request->amount;
        $withdraw ->appliedDate=date('Y-m-d');
        $withdraw ->appliedId=$LogInId;
        $withdraw ->approvalDate=date('Y-m-d H:i:s');
        $withdraw ->type='Normal Withdrawal';
        $withdraw ->save();

        $withDrawId=$withdraw->id;

        $update = DB::table('tcnrequests')->where('id', $request->tcnId)->update(['withdrawId' => $withDrawId ,'withDrawStatus' => 'Applied']);
        return redirect('web/tcn');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
 
    $logins=Auth::guard('user')->user();

        $userProfile=memberregistration::where('code', $logins->username)->with('country','address','proof')->first();

        $tcnDetails=tcnrequest::find($id);

        $bank=bank::find($tcnDetails->benefitId);

        $benefit=benefitgeneration::all()->where('tcnId',$tcnDetails->id)->where('userId',$tcnDetails->userId)->count(); 

        $country = country::find($tcnDetails->applyingFrom)->first();

        return view('web.member.tcn.tcnwithDraw',compact('userProfile','tcnDetails','country','bank'));
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
