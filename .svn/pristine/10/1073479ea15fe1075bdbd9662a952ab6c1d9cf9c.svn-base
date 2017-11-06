<?php

namespace App\Http\Controllers\hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\hr_deduction_master;
use App\log;

class deductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $Deduction=hr_deduction_master::whereNull('deleted_at')->get();
        return view('hr.master.deduction',compact('Deduction')); 
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
       $deduction=new hr_deduction_master();

        $this->validate($request,[
            'deduction'=>'required|unique:hr_deduction_master,type_of_deduction,NULL,id,deleted_at,NULL'
        ]); 

        $deduction->type_of_deduction=$request->deduction;
        $deduction->amount=$request->amount;
        $deduction->save();

        $log = new log();
        $log->ip_address =  \Request::getClientIp(true);
        $log->user = session('userId');
        $log->actions = "Created deduction-".$request->deduction;
        $log->type = "Deduction";
        $log->save();

        return redirect('/hr/master/deduction');
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
        $editdeduction = hr_deduction_master::where('id',$id)
        ->first(); 
        $Deduction=hr_deduction_master::get();
        return view('hr.master.editDeduction',compact('editdeduction','Deduction'));
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
        $deduction = hr_deduction_master::find($id);
        $deduction->type_of_deduction= $request->deduction;
        $deduction->amount=$request->amount;
        $deduction->save();

        $log = new log();
        $log->ip_address =  \Request::getClientIp(true);
        $log->user = session('userId');
        $log->actions = "Edited deduction-".$request->deduction;
        $log->type = "Deduction";
        $log->save();

        return redirect('/hr/master/deduction');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deduction=hr_deduction_master::find($id);
        $deduction->delete();

        $log = new log;
        $log->ip_address =  \Request::getClientIp(true);
        $log->user = session('userId');
        $log->actions = "Deleted deduction-".$request->deduction;
        $log->type = "Deduction";
        $log->save();
    }
}
