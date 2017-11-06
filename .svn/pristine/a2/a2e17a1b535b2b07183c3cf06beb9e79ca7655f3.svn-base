<?php

namespace App\Http\Controllers\hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\employeededuction;
use Auth;

class employeedeductionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $empdeduct=employeededuction::get();
        return view('hr.deduction.employeededuction',compact('empdeduct')); 
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
        if(Auth::guard('admin')->check())
        $login_id=Auth::guard('admin')->user()->id;
        else
        $login_id=0;
        $employeededuction=new employeededuction();
        $employeededuction->deduction_id=$request->deduction;
        $employeededuction->emp_id=$request->employee;    
        //$employeededuction->reason=$request->reason;
        $employeededuction->added_id=$login_id;
        $employeededuction->save();
        return redirect('/hr/deduction/employeededuction');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function deny(Request $request)
    {
        //$deduct=
    }


    public function approve()
    {

    }


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
