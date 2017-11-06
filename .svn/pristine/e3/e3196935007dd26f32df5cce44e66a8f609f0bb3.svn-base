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
use App\address;
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
        $withdraw ->currencyType=$request->currencyType;
        $withdraw ->unit=$request->unit;
        $withdraw ->amount=$request->amount;
        $withdraw ->inrAmount=$request->inrAmount;
        $withdraw ->appliedDate=date('Y-m-d H:i:s');
        $withdraw ->appliedId=$LogInId;
        $withdraw ->approvalDate=date('Y-m-d H:i:s');
        $withdraw ->type=$request->type;
        $withdraw ->save();

        $withDrawId=$withdraw->id;


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
        $view=false;
    $logins=Auth::guard('user')->user();


    //*******************************WIDTH DRAWAL VIEW*****************************//
    //********************************                      ********************************//

     if(strpos($id, 'view') !== false)
    {
    $id=explode('@@@',$id);
    $view=true;
    $id= $id[1];



    $withDraw = withdrawalrequest::all()->where('id',$id);
    foreach($withDraw as $withDraws);

    $tcnrequest = tcnrequest::all()->where('id',$withDraws->tcnId);
    foreach($tcnrequest as $tcnrequests);

    $bank = bank::all()->where('id',$tcnrequests->benefitId);
    foreach($bank as $banks);

    $memberregistration = memberregistration::all()->where('userId',$tcnrequests->userId);
    foreach($memberregistration as $members);

    $addres = address::all()->where('userId',$members->userId)->where('typeOfAddress','permanent');
    foreach($addres as $address);

    

$this->user = Auth::guard('user')->user();

        $userProfile=memberregistration::where('userId', $this->user->id)->first();
        $tcnStatus=tcnrequest::all()->where('userId',$this->user->id)->groupBy('status');
        //pending
        $pendinglist=new tcnrequest;
        $pendinglist=$pendinglist->where('userId',$this->user->id)->where('status','Pending')->with('tcn')->paginate(8,['*'],'pending');
        //active
        $activelist =new tcnrequest;
        $activelist=$activelist->where('userId',$this->user->id)->where('status','Approved')->with('tcn')->paginate(8,['*'],'active');
        //denied
        //active
        $deniedlist =new tcnrequest;
        $deniedlist=$deniedlist->where('userId',$this->user->id)->where('status','Denied')->with('tcn')->paginate(8,['*'],'denied');

        
    return view('web.member.tcn.tcnwithDrawView',compact('userProfile','tcnStatus','pendinglist','activelist','deniedlist','tcnrequests','banks','address','members','withDraws'));

    }



    //*******************************WIDTH DRAWAL REQUEST FORM*****************************//
    //********************************                      ********************************//
$this->user = Auth::guard('user')->user();

        $userProfile=memberregistration::where('userId', $this->user->id)->first();
        $tcnStatus=tcnrequest::all()->where('userId',$this->user->id)->groupBy('status');
        //pending
        $pendinglist=new tcnrequest;
        $pendinglist=$pendinglist->where('userId',$this->user->id)->where('status','Pending')->with('tcn')->paginate(8,['*'],'pending');
        //active
        $activelist =new tcnrequest;
        $activelist=$activelist->where('userId',$this->user->id)->where('status','Approved')->with('tcn')->paginate(8,['*'],'active');
        //denied
        //active
        $deniedlist =new tcnrequest;
        $deniedlist=$deniedlist->where('userId',$this->user->id)->where('status','Denied')->with('tcn')->paginate(8,['*'],'denied');
        $datas=tcnrequest::where('id',$id)->get();
        foreach ($datas as $tcn)

        $members=memberregistration::where('userId',$tcn->userId)->get();
        foreach ($members as $members)

        $totalUnit=$tcn->unit; 

        $perUnit=$tcn->amount/$totalUnit;

        $BalanceUnit=withdrawalrequest::where('tcnId',$id)->whereNotIn('status',['Cancel'])->sum('unit');

        $availUnit=$totalUnit-$BalanceUnit;

        $availAmount=$availUnit*$perUnit;

        return view('web.member.tcn.tcnwithDraw',compact('userProfile','tcnStatus','pendinglist','activelist','deniedlist','country','bank','tcn','members','availUnit','availAmount'));
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
