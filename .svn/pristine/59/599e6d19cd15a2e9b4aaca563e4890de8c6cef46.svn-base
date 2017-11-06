<?php

namespace App\Http\Controllers\hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\generateIdcard;
use App\country;
use App\hr_company;
use App\hr_branch;
use App\hr_department;
use App\hr_designation;
use App\hr_emp_personal_details;
use App\hr_emp_address;
use PDF;
class generateIdCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('hr.employee.generateIdcard');
    } 

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    //     $employee_details = hr_emp_personal_details::join('hr_companies','hr_companies.id','=','hr_emp_personal_details.company_id')
    // ->where('hr_emp_personal_details.code',$employee_code)
    // ->leftjoin('hr_departments','hr_departments.id','=','hr_emp_personal_details.department_id')
    // ->leftjoin('hr_emp_address','hr_emp_address.user_id','=','hr_emp_personal_details.user_id')
    // ->leftjoin('hr_branch','hr_branch.id','=','hr_emp_personal_details.branch_id')
    // ->leftjoin('hr_designation','hr_designation.id','=','hr_emp_personal_details.designation_id')
    // ->leftjoin('countries','countries.id','=','hr_emp_personal_details.nationality')
    // ->select('hr_companies.*','countries.*','hr_departments.*','hr_branch.*','hr_designation.*','hr_emp_personal_details.*','hr_emp_address.address as useraddress', 'hr_emp_address.city as usercity', 'hr_emp_address.state as userstate', 'hr_emp_address.zip_code as userzipcode');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $employee_details = $request->employee_code;
        $pdf =PDF::loadView('hr.employee.createIdcard',compact('employee_details'));
        return $pdf->stream();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
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
