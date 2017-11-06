<?php

namespace App\Http\Controllers\hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Relations\Relation;

use App\hr_salary_allowance as allowance;

use App\hr_emp_personal_details as employee;

use App\hr_salary_details;

use App\hr_leave;

use App\hr_applied_leave;

use App\hr_company;

use App\hr_branch;

use Auth;

use DB;

use Alert;

use Mail;

use Excel;

use PDF;
class payslipController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return  view('hr.salary.employeePayslip');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {


            // DB::connection()->enableQueryLog();

          $employee= DB::table('hr_emp_personal_details')
                     ->leftJoin('hr_companies', 'hr_emp_personal_details.company_id', '=', 'hr_companies.id')
                     ->leftJoin('countries','countries.id', '=', 'hr_emp_personal_details.nationality') 
                     ->leftJoin('hr_branch', 'hr_emp_personal_details.branch_id', '=', 'hr_branch.id')
                     ->leftJoin('hr_departments', 'hr_emp_personal_details.department_id', '=', 'hr_departments.id')
                     ->leftJoin('hr_designation','hr_emp_personal_details.designation_id', '=', 'hr_designation.id')
                     ->leftJoin('hr_religions','hr_religions.id', '=', 'hr_emp_personal_details.religion') 
                     ->leftJoin('hr_emp_proofs', 'hr_emp_proofs.user_id', '=', 'hr_emp_personal_details.user_id')
                     ->where('hr_emp_personal_details.code',$request->code)
                     ->first();

            // $queries = DB::getQueryLog();
            // return var_dump($employee);        


             $salary=DB::table('hr_salary_details')->where('month',$request->month.'-'.$request->year)->where('employee_id',$employee->user_id)->first();

        if(count($salary)==0)
            return 1;

        if( $request->process=='employeePayslip')

            return View('hr.salary.employeePayslipAjax',compact('employee','salary'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        

           $employee= DB::table('hr_emp_personal_details')
                     ->leftJoin('hr_companies', 'hr_emp_personal_details.company_id', '=', 'hr_companies.id')
                     ->leftJoin('countries','countries.id', '=', 'hr_emp_personal_details.nationality') 
                     ->leftJoin('hr_branch', 'hr_emp_personal_details.branch_id', '=', 'hr_branch.id')
                     ->leftJoin('hr_departments', 'hr_emp_personal_details.department_id', '=', 'hr_departments.id')
                     ->leftJoin('hr_designation','hr_emp_personal_details.designation_id', '=', 'hr_designation.id')
                     ->leftJoin('hr_religions','hr_religions.id', '=', 'hr_emp_personal_details.religion') 
                     ->leftJoin('hr_emp_proofs', 'hr_emp_proofs.user_id', '=', 'hr_emp_personal_details.user_id')
                     ->where('hr_emp_personal_details.code',$request->code)
                     ->first();



             $salary=DB::table('hr_salary_details')->where('month',$request->month)->where('employee_id',$employee->user_id)->first();

            $pdf =PDF::loadView('hr.salary.payslipPDF',compact('employee','salary'));

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
