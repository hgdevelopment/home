<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\tcnrequest;
use App\tcnmaster;
use App\User;
use DB;
class tcnstatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tcnType=tcnmaster::all();
        $Year =User::select(DB::raw('YEAR(updated_at) as year'))->groupBy('year')->get();   

        return view('admin.tcn.tcnstatus.tcnstatus',compact('tcnType','Year'));
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
           $tcn=$request->tcn;
        $month=$request->month;
        $year=$request->year;
        
        //Total Application Recieved

       $tcnrequest=tcnrequest::join('tcnmasters','tcnmasters.id','=','tcn_id')
        ->whereMonth('addedDate',$month)
        ->whereYear('addedDate',$year)
        ->where('tcnmasters.id',$tcn)
        ->get();

        //Approved

        $tcnapprove=tcnrequest::join('tcnmasters','tcnmasters.id','=','tcn_id')
        ->whereMonth('addedDate',$month)
        ->whereYear('addedDate',$year)
        ->where('tcnmasters.id',$tcn)
        ->where('status','Approved')
        ->where('docVerified','Verified')
        ->where('paymentReceived','Recieved')
        ->get();
        
        //Under Document Verification

        $tcndoc=tcnrequest::join('tcnmasters','tcnmasters.id','=','tcn_id')
        ->whereMonth('addedDate',$month)
        ->whereYear('addedDate',$year)
        ->where('tcnmasters.id',$tcn)
        ->where('status','Pending')
        ->where('docVerified','Pending')
        ->where('paymentReceived','Pending')
        ->get();

        //Under Payment Approval

       $tcnpayment=tcnrequest::join('tcnmasters','tcnmasters.id','=','tcn_id')
        ->whereMonth('addedDate',$month)
        ->whereYear('addedDate',$year)
        ->where('tcnmasters.id',$tcn)
        ->where('status','Pending')
        ->where('docVerified','Verified')
        ->where('paymentReceived','Pending')
        ->get();
        $tcnType=tcnmaster::all();
        $Year =User::select(DB::raw('YEAR(updated_at) as year'))->groupBy('year')->get();   

        return view('admin.tcn.tcnstatus.tcnstatus',compact('request','tcnrequest','tcnapprove','tcndoc','tcnpayment','tcnType','Year'));  
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        
  
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
