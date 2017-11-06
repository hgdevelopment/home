<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\incentivemaster;
use DB;

class IncentivemasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        
    $incentivemaster=\DB::table('incentivemasters')->where('employeeType','ME')->whereNull('deleted_at')->get();
    $emp=\DB::table('incentivemasters')->where('employeeType','EMP')->whereNull('deleted_at')->get();
    $dsa=\DB::table('incentivemasters')->where('employeeType','DSA')->whereNull('deleted_at')->get();
    $oi=\DB::table('incentivemasters')->where('employeeType','OI')->whereNull('deleted_at')->get();
        return view('admin.incentive.incentivemaster',compact('incentivemaster','emp','dsa','oi'));
       
        //
   /*     $incentivemaster = incentivemaster::paginate(2);*/ //dd(\DB::getQueryLog());
        return view('admin.incentive.incentivemaster',compact('incentivemaster','emp','dsa','oi'));





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
       $incentivemaster = new incentivemaster();
        $this->validate($request,[
            'employeeType'=>'required',
            'salary'=>'required',
            'fromAmount'=>'required',
            'toAmount'=>'required',
            'target'=>'required',
            'incentivePercentage'=>'required',
          
            ]);
       $incentivemaster->employeeType = $request->employeeType;
       $incentivemaster->salary= $request->salary;
       $incentivemaster->fromAmount = $request->fromAmount;
       $incentivemaster->toAmount= $request->toAmount;
       $incentivemaster->target = $request->target;
       $incentivemaster->incentivePercentage= $request->incentivePercentage;
       $incentivemaster->save();
       Session::flash('message', 'Incentive Added Successfully!'); 
       return redirect('/admin/incentivemaster');
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
       
        $incentivemaster= incentivemaster::all();
        $editincentive = incentivemaster::find($id);
        return view('admin.incentive.editincentivemaster',compact('incentivemaster','editincentive'));
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
        $incentivemaster = incentivemaster::find($id);
          $this->validate($request,[
            'employeeType'=>'required',
            'salary'=>'required',
            'fromAmount'=>'required',
            'toAmount'=>'required',
            'target'=>'required',
            'incentivePercentage'=>'required',
                      ]);
            $incentivemaster->employeeType = $request->employeeType;
            $incentivemaster->salary= $request->salary;
            $incentivemaster->fromAmount = $request->fromAmount;
            $incentivemaster->toAmount= $request->toAmount;
            $incentivemaster->target = $request->target;
            $incentivemaster->incentivePercentage= $request->incentivePercentage;
            $incentivemaster->save();
            Session::flash('message', 'Incentive Updated Successfully!'); 
            return redirect('/admin/incentivemaster');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $incentivemaster = incentivemaster::find($id);
        $incentivemaster->delete();
        return redirect('/admin/incentivemaster');

    }
}







