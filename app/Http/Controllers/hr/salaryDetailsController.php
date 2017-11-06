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

class salaryDetailsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return View('hr.salary.salaryDetails');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $employees=DB::table('hr_emp_personal_details')


        ->join('hr_salary_details','hr_salary_details.employee_id','=','hr_emp_personal_details.user_id')

        ->where('hr_salary_details.month',$request->month.'-'.$request->year)        

        ->get();


        if($request->process=='SalaryDetails')

            return View('hr.salary.salaryDetailsAjax',compact('employees','request'));

    }



        //*Excel*************************Salary Details Excel ***********************//

        //**************************_______________________________***********************//


    public function Excel(Request $request)
    {


        $employees=DB::table('hr_emp_personal_details')


        ->join('hr_salary_details','hr_salary_details.employee_id','=','hr_emp_personal_details.user_id')

        ->where('hr_salary_details.month',$request->month.'-'.$request->year)        

        ->get();


  ob_end_clean();
  ob_start();

  $excelData=array();
  $i=1;
  foreach ($employees as $data)
  {
  $excelData[$i]['Sl No'] = $i;
  $excelData[$i]['EMPLOYEE CODE'] = $data->code;
  $excelData[$i]['NAME'] =$data->salutation_name.' '.$data->name;
  // $excelData[$i]['ACCOUNT NO'] =$data->benefit->accountNumber;
  // $excelData[$i]['IFSC CODE'] =$data->benefit->ifsc;
  // $excelData[$i]['BANK'] =$data->benefit->bankName;
  // $excelData[$i]['BRANCH'] =$data->benefit->branchName;
  // $excelData[$i]['WITHDRAWAL TYPE'] =$data->type;
  // $excelData[$i]['WITHDRAWAL UNITS'] =$data->units;
  // $excelData[$i]['CURRENCY'] =$data->currencyType;
  // $excelData[$i]['APPROVED DATE'] =date('d-m-Y',strtotime($data->paidDate));
  // $excelData[$i]['TRADE AMOUNT'] =$data->tradeAmount;
  // $excelData[$i]['WITHDRAWAL AMOUNT'] =$data->paidAmount;
  // $excelData[$i]['WITHDRAWAL APPLIED DATE'] =date('d-m-Y',strtotime($data->appliedDate));
  // $excelData[$i]['ADDED BY'] =$data->approvalBy;
  $i++;
  } 


  $lastcell= 'A3:N'.(1+$i);
  $M=date('M',strtotime($month));
  $pagename = $year.'-'.$M.'-'.'TCN_Full_Withdrawal';


  Excel::create($pagename, function($excel) use ($excelData,$pagename,$lastcell) {
  $excel->sheet('mySheet', function($sheet) use ($excelData,$pagename,$lastcell)
  {
  $sheet->fromArray($excelData);
  $sheet->cell('A1:N1', function($cell)
  {
  $cell->setFontSize(11);
  $cell->setBackground('#7cde9c');
  $cell->setFontWeight('bold');
  $cell->setAlignment('left');

  });
  $sheet->setFreeze('A2');
  $sheet->prependRow(1, array("TCN FULL WITHDRAWAL"));



  $sheet->mergeCells('A1:N1');
  $sheet->cell('A1:N1', function($cell) 
  {
  $cell->setFontSize(12);
  $cell->setBackground('#43a061');
  $cell->setFontWeight('bold');
  $cell->setAlignment('center');

  });


  $sheet->cell($lastcell, function($cell) {
  $cell->setFontSize(12);
  $cell->setFontWeight('thin');
  $cell->setAlignment('center');

  });

  $sheet->setPageMargin(array(
  0.25, 0.30, 0.25, 0.30
  ));
  });
  })->download('xls');

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
