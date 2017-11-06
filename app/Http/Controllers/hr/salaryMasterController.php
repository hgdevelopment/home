<?php

namespace App\Http\Controllers\hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\Relations\Relation;

use App\hr_salary_allowance as allowance;

use App\hr_emp_personal_details as employee;

use App\hr_salary_details;

use App\hr_deduction_master;

use App\hr_leave;

use App\hr_applied_leave;

use App\hr_company;

use App\hr_branch;

use App\hr_holiday;

use App\attendance;

use App\hr_shift;

use Auth;
use DB;
use Alert;
use Mail;

class salaryMasterController extends Controller
{










    public function index()
    {
        if(Controller::userAccessRights('Salary&Payroll')!=1) return redirect()->back();
           
        $company=hr_company::where('status','1')->get();

        return View('hr.salary.salaryMaster',compact('company'));
    }









    public function create(Request $request)
    {
        




        $logins=Auth::guard('admin')->user();

        if(Controller::userAccessRights('Generate Salary')!=1) return redirect()->back();



            
        //**************************Get Branch Names Based On Company Names***********************//

        //**************************_______________________________***********************//

        if($request->process=='getBranches')
        {
            $branch=hr_branch::where('company_id',$request->company)->where('status','1')->get();

            return $branch;
        }










            
        //**************************Get Employee Details for eligible salary to this month Based On year/month***********************//

        //**************************_______________________________***********************//



        // DB::connection()->enableQueryLog();



        $employees=DB::table('hr_emp_personal_details as employee')

        ->join('logins','logins.id','=','employee.user_id')

        ->join('hr_attendance as att','logins.id','=','att.staffId')

        // ->where('logins.status','Active')

        ->whereYear('att.date',$request->year)                              //select employees based on filters   and

        ->whereMonth('att.date',$request->month)                            //from attentance ad employee personal details

        ->where('employee.company_id',$request->company)        

        ->where('employee.branch_id',$request->branch)

        ->groupBy('att.staffId')

        ->get();


        if($request->process=='SalaryList')

            return View('hr.salary.salaryMasterAjax',compact('employees','request'));
    }














    public function store(Request $request)
    {
            $logins=Auth::guard('admin')->user();

            if(Auth::guard('admin')->check())
            $LogInId    =$logins->id;

            $salary=new hr_salary_details;



                $salary->employee_id        =$request->employee_id;

                $salary->payslip_no         =$request->payslip_no;

                $salary->salary             =$request->salary;

                $salary->working_days       =$request->working_days;

                $salary->working_weekoff    =$request->working_weekoff;

                $salary->working_holidays   =$request->working_holidays;

                $salary->one_mine_late      =$request->one_mine_late;

                $salary->more_one_min       =$request->more_one_min;

                $salary->available_leave    =$request->available_leave;

                $salary->total_leave        =$request->total_leave;

                $salary->full_day_leave     =$request->full_day_leave;

                $salary->half_day_leave     =$request->half_day_leave;

                $salary->approve_leave      =$request->approve_leave;

                $salary->un_approve_leave   =$request->un_approve_leave;

                $salary->remaining_leave    =$request->remaining_leave;

                $salary->fine_deduction     =$request->fine_deduction;

                $salary->misc_deduction     =$request->misc_deduction;

                $salary->misc_deduction_reason=$request->misc_deduction_reason;

                $salary->loss_pay_sunday    =$request->loss_pay_sunday;

                $salary->overtime           =$request->overtime;

                $salary->overtime_amount    =$request->overtime_amount;

                $salary->bonus              =$request->bonus;

                $salary->amount_deduction   =$request->final_deduction;

                $salary->misc_payment       =$request->misc_payment;

                $salary->misc_payment_reason=$request->misc_payment_reason;

                $salary->final_salary       =$request->final_salary;

                $salary->month              =$request->month;

                $salary->user_id            =$LogInId;

                $salary->created_at         =date('Y-m-d H:i:s');

                $salary->save();



    }









    public function show($id)
    {
        
        $details=explode('@@',$id);
        $id=$details[0];
        $year=$details[1];
        $month=$details[2];



         $generated=DB::table('hr_salary_details')->where('employee_id',$id)->where('month',$month.'-'.$year)->count();
         if($generated)
         {
            Alert::error('Already Salary generated for this Employee.. ','warning');
        $company=hr_company::where('status','1')->get();

        return View('hr.salary.salaryMaster',compact('company'));
         }

         $data= DB::table('logins')
                     ->where('logins.id',$id)
                     ->join('hr_emp_personal_details', function ($join) {
                        $join->on('logins.id', '=', 'hr_emp_personal_details.user_id')
                             ->orderBy('hr_emp_personal_details.company_id', 'desc');
                         })
                     ->leftJoin('hr_companies', 'hr_emp_personal_details.company_id', '=', 'hr_companies.id')
                     ->leftJoin('countries','countries.id', '=', 'hr_emp_personal_details.nationality') 
                     ->leftJoin('hr_branch', 'hr_emp_personal_details.branch_id', '=', 'hr_branch.id')
                     ->leftJoin('hr_departments', 'hr_emp_personal_details.department_id', '=', 'hr_departments.id')
                     ->leftJoin('hr_designation','hr_emp_personal_details.designation_id', '=', 'hr_designation.id')
                     ->leftJoin('hr_religions','hr_religions.id', '=', 'hr_emp_personal_details.religion') 
                     ->leftJoin('hr_emp_proofs', 'hr_emp_proofs.user_id', '=', 'logins.id')
                    ->select('*','logins.status as emp_status','hr_emp_personal_details.email as p_email')
                     ->get();



            $fromDate   =date('Y-m-01',strtotime($year.'-'.$month.'-'.'01'));

            $totalday=cal_days_in_month(CAL_GREGORIAN,$month,$year);

            $endDate    =date('Y-m-t',strtotime($fromDate));


            $leave=   $emp_working_days=$emp_working_weekoff=$emp_working_full_days=$emp_working_half_days= $fullDayLeave= $halfDayLeave=  $approveLeave = $oneMinuteLate= $moreOneMinute =$sundays= $weekoff= $ot=

            $unApproveLeave= $emp_working_holidays= $emp_working_weekoff=   $TotalAvailLeave=  $deductApproveLeave=$deductUnApproveLeave= $holidays= $nonHolidayLeave= $sandwitchLeave=  $lossPaySunday= $totalOvertime= $amountDeduction=   $overtimeAmount=    $finalSalary=   $fullday=0;



            $employee_id=$id;

            //salary
            $salary=$data[0]->salary;

            $perDaySalary=number_format($salary/30,2);

            $perHourSalary=number_format(($salary/30)/9,2);


            $perMinuteSalary=number_format($perHourSalary/60,2);


            // DB::connection()->enableQueryLog();
            // DB::table('users')->decrement('likes', 3);
            // $queries = DB::getQueryLog();
            // return var_dump($queries);        




            //monthly balance leave
             $prevAppliedLeave=hr_leave::join('hr_applied_leaves','hr_leaves.id','=','hr_applied_leaves.leave_id')

            ->where('hr_leaves.user_id',$employee_id)

            ->where('hr_leaves.status','Approved')

            ->whereDate('hr_applied_leaves.date','<',$fromDate)

            ->sum('leave_value') ;



            $prevbalanceLeave=DB::table('hr_available_leaves')

            ->where('user_id',$employee_id)

            ->sum('leave_count');

            $monthlyAvailLeave=max($prevbalanceLeave-$prevAppliedLeave,0);



            //Fine Id Card OtherDeduction
            $emp_deduction=hr_deduction_master::join('hr_emp_deduction','hr_emp_deduction.deduction_id','=','hr_deduction_master.id')->where('emp_id',$employee_id)->get();


                // shift name
                $att_shift=attendance::where('staffId',$employee_id)->whereBetween('date',[$fromDate,$endDate])->first();
                $shift=hr_shift::where('id',$att_shift->shift)->first();
                if(strtoupper($shift->shift_name)=='GENERAL')
                $shift='GENERAL';
                else
                $shift='OTHER';


            //from date - to date 
            for($i=1; $fromDate<=$endDate; $i++)
            {

                $att='';
                $day=date('D',strtotime($fromDate));
                    
                if( $day=='Sun')
                $sundays=$sundays+1;


                $att=attendance::where('staffId',$employee_id)->where('date',$fromDate)->first();


                $holiDay=hr_holiday::where('holiday_date',$fromDate)->first();






                //applied leave
                $appliedLeave=hr_leave::join('hr_applied_leaves','hr_leaves.id','=','hr_applied_leaves.leave_id')

                ->where('hr_leaves.user_id',$employee_id)

                ->where('hr_leaves.status','Approved')

                ->where('hr_applied_leaves.date',$fromDate)

                ->first();





                if( $att->day=='halfday')

                    $halfDayLeave=$halfDayLeave+1;

                if( $att->day=='fullday')

                    $emp_working_full_days=($emp_working_full_days + 1);

                if( $att->day=='halfday')

                    $emp_working_half_days=$emp_working_half_days + 1;

                if( $att->day=='holiday' && count($holiDay)==1)
                
                    $holidays=$holidays+1;
                

                if( $att->day=='holiday' && count($appliedLeave)!=1 && count($holiDay)==1 && $holiDay->holiday_type=='Special' && $holiDay->holiday_religion!=$data[0]->religion)

                    $nonHolidayLeave=$nonHolidayLeave + 1;


                if( $att->day=='leave' || count($att)==0)

                    $fullDayLeave=$fullDayLeave + 1;

                //General shift
                if( $shift=='GENERAL' && ($day=='Sun' ||  $att->day=='holiday') && count($att)>0)
                {
                    if($day=='Sun')
                    $weekoff++;
                  // week  off-- Holiday over time 

                    $datetime1 = strtotime($att->out);
                    $datetime2 = strtotime($att->in);
                    $interval  = abs($datetime2 - $datetime1);
                    $minutes2   = round($interval / 60);

                    $datetime1 = strtotime($att->bout);
                    $datetime2 = strtotime($att->bin);
                    $interval  = abs($datetime2 - $datetime1);
                    $minutes1  = round($interval / 60);

                    $minutes   = $minutes2-$minutes1;

                    if( $minutes<=210)
                        $ot=$ot+$minutes;

                    if( $minutes>210 && $minutes<420 && $day=='Sun')
                        $emp_working_weekoff=$emp_working_weekoff+0.5;

                    if( $minutes>210 && $minutes<420 && $att->day=='holiday')
                        $emp_working_holidays=$emp_working_holidays+0.5;

                    if( $minutes>=420 &&  $day=='Sun')
                        $emp_working_weekoff=$emp_working_weekoff+1;

                    if( $minutes>=420 &&  $att->day=='holiday')
                        $emp_working_holidays=$emp_working_holidays+1;

                    //Sandwich leave    

                    if( $day=='Sun')
                    {

                        $att_sand=attendance::where('staffId',$employee_id)->whereBetween('date',[date('Y-m-d', strtotime("-1 day", strtotime($fromDate))),date('Y-m-d', strtotime("+1 day", strtotime($fromDate)))])->where('day','fullday')->count();


                        $holiDay_sand=hr_holiday::whereIn('holiday_date',[date('Y-m-d', strtotime("-1 day", strtotime($fromDate))),date('Y-m-d', strtotime("+1 day", strtotime($fromDate)))])->count();

                        if( $att_sand!=2 && $holiDay_sand>1 && $fromDate!=date('Y-m-t',strtotime($fromDate)))
                            $sandwitchLeave=$sandwitchLeave+1;



                    }                
                }




                //Other shift
                if( $shift!='GENERAL' && ($att->day=='weekoff' || $att->day=='holiday')  && count($att)>0)
                {

                    if($att->day=='weekoff')
                    $weekoff++;
                  // week  off-- Holiday over time 

                    $datetime1 = strtotime($att->out);
                    $datetime2 = strtotime($att->in);
                    $interval  = abs($datetime2 - $datetime1);
                    $minutes2   = round($interval / 60);

                    $datetime1 = strtotime($att->bout);
                    $datetime2 = strtotime($att->bin);
                    $interval  = abs($datetime2 - $datetime1);
                    $minutes1  = round($interval / 60);

                    $minutes   = $minutes2-$minutes1;

                    if( $minutes<=210)
                        $ot=$ot+$minutes;


                    if( $minutes>210 && $minutes<420 && $att->day=='weekoff')
                        $emp_working_weekoff=$emp_working_weekoff+0.5;

                    if( $minutes>210 && $minutes<420 && $att->day=='holiday')
                        $emp_working_holidays=$emp_working_holidays+0.5;

                    if( $minutes>=420 &&  $att->day=='weekoff')
                        $emp_working_weekoff=$emp_working_weekoff+1;

                    if( $minutes>=420 &&  $att->day=='holiday')
                        $emp_working_holidays=$emp_working_holidays+1;

                    if( $att->day=='weekoff')
                    {

                        $att_sand=attendance::where('staffId',$employee_id)->whereBetween('date',[date('Y-m-d', strtotime("-1 day", strtotime($fromDate))),date('Y-m-d', strtotime("+1 day", strtotime($fromDate)))])->where('day','fullday')->count();


                        $holiDay_sand=hr_holiday::whereIn('holiday_date',[date('Y-m-d', strtotime("-1 day", strtotime($fromDate))),date('Y-m-d', strtotime("+1 day", strtotime($fromDate)))])->count();

                        if( $att_sand!=2 && $holiDay_sand>0 && $fromDate!=date('Y-m-t',strtotime($fromDate)))
                            $sandwitchLeave=$sandwitchLeave+1;

                    }                
                }




                $minutes=$datetime1=$datetime2=$interval=$minutes1=$minutes2=0;


                if( count($appliedLeave)==1)

                    $approveLeave=$approveLeave+$appliedLeave->leave_value;



                if( $att->late==1 && $att->day=='fullday')
                    $oneMinuteLate=$oneMinuteLate+1;



                if( $att->late>1 && $att->late<=59 && $att->day=='fullday')
                    $moreOneMinute=$moreOneMinute+1;

                    $ot=$ot+$att->ot;




                $fromDate =date('Y-m-d', strtotime("+1 day", strtotime($fromDate)));

            }


            $fromDate =date('Y-m-d', strtotime($endDate));

            $emp_working_half_days;$emp_working_days=$emp_working_full_days + ($emp_working_half_days*0.5);

            $leave          =$nonHolidayLeave+$fullDayLeave+($halfDayLeave*0.5);

            $unApproveLeave=max(($leave-$approveLeave),0);



            $TotalAvailLeave=($monthlyAvailLeave+$emp_working_weekoff+$emp_working_holidays);

            if( $approveLeave>$TotalAvailLeave)

                $deductApproveLeave=max(($approveLeave-$TotalAvailLeave),0);

            if( $leave>$approveLeave)
            {
                $deductUnApproveLeave=max(($leave-$approveLeave),0);


            }



// return 'Salary : '.$salary.'<br>'.

//         'DaySalary : '.$perDaySalary.'<br>'.

//         'perHourSalary : '.$perHourSalary.'<br>'.

//         'perMinuteSalary : '.$perMinuteSalary.'<br>'.'<br>'.'<br>'.



//         'Total Days : '.$totalday.'<br>'.

//         'Weekoff : '.$weekoff.'<br>'.

//         'Holidays : '.$holidays.'<br>'.

//         'emp full working  days : '.$emp_working_full_days.'<br>'.

//         'emp Half working  days : '.$emp_working_half_days.'<br>'.

//         'Total working  days ( FD + HD) : '.$emp_working_full_days.' + '.$emp_working_half_days.' * 0.5 = '.($emp_working_full_days + ($emp_working_half_days*0.5)).'<br>'.'<br>'.'<br>'.



//         'monthlyAvailLeave : '.$monthlyAvailLeave.'<br>'.

//         'emp_working_weekoff : '.$emp_working_weekoff.'<br>'.

//         'emp_working_holidays : '.$emp_working_holidays.'<br>'.

//         'TotalAvailLeave : '.$TotalAvailLeave.'<br>'.'<br>'.'<br>'.



//         'Leave (F + H) : '.$leave.'<br>'.

//         'fullDayLeave : '.$fullDayLeave.'<br>'.

//         'halfDayLeave : '.$halfDayLeave.' * 0.5 = '.$halfDayLeave*0.5.'<br>'.

//         'approveLeave : '.$approveLeave.'<br>'.

//         'unApproveLeave : '.$unApproveLeave.'<br>'.

//         'nonHolidayLeave : '.$nonHolidayLeave.'<br>'.'<br>'.'<br>'.



//         'oneMinuteLate : '.$oneMinuteLate.'<br>'.

//         'moreOneMinute : '.$moreOneMinute.'<br>'.

//         'OT ( mins): '.$ot.'<br>'.

//         'SandwitchLeave : '.$sandwitchLeave.'<br>';



            $payslip=hr_salary_details::max('id');

            if($payslip>0) $payslip=100000+$payslip; else $payslip=100001;


        return View('hr.salary.salaryCalculate',compact('request','employee_id','payslip','data','totalday','emp_working_full_days','emp_working_half_days','emp_working_days','emp_working_weekoff','emp_working_holidays','leave','fullDayLeave','halfDayLeave','approveLeave','TotalAvailLeave','unApproveLeave','nonHolidayLeave','oneMinuteLate','moreOneMinute','emp_deduction','fromDate','salary','perDaySalary','perHourSalary','perMinuteSalary','deductApproveLeave','deductUnApproveLeave','sandwitchLeave','ot','weekoff'));
    }




    
    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }


    public function destroy($id)
    {
        //
    }
    // public function showsalary(){
    //     $holidays=array("2017-10-06","2017-10-07","2017-10-08");
    //      $d=cal_days_in_month(CAL_GREGORIAN,10,2017);
    //    return $this->getWorkingDays("2017-10-01","2017-10-".$d,$holidays);
        
    //    //return hr_emp_personal_details::where('user_id','516')->first();
    // }



    
    // public function getWorkingDays($startDate,$endDate,$holidays){
    //    $endDate = strtotime($endDate);
    //     $startDate = strtotime($startDate);


    //     //The total number of days between the two dates. We compute the no. of seconds and divide it to 60*60*24
    //     //We add one to inlude both dates in the interval.
    //     $days = ($endDate - $startDate) / 86400 + 1;

    //     $no_full_weeks = floor($days / 7);
    //     $no_remaining_days = fmod($days, 7);

    //     //It will return 1 if it's Monday,.. ,7 for Sunday
    //     $the_first_day_of_week = date("N", $startDate);
    //     $the_last_day_of_week = date("N", $endDate);

    //     //---->The two can be equal in leap years when february has 29 days, the equal sign is added here
    //     //In the first case the whole interval is within a week, in the second case the interval falls in two weeks.
    //     if ($the_first_day_of_week <= $the_last_day_of_week) {
    //        // if ($the_first_day_of_week <= 6 && 6 <= $the_last_day_of_week) $no_remaining_days--;
    //         if ($the_first_day_of_week <= 7 && 7 <= $the_last_day_of_week) $no_remaining_days--;
    //     }
    //     else {
    //         // (edit by Tokes to fix an edge case where the start day was a Sunday
    //         // and the end day was NOT a Saturday)

    //         // the day of the week for start is later than the day of the week for end
    //         if ($the_first_day_of_week == 7) {
    //             // if the start date is a Sunday, then we definitely subtract 1 day
    //             $no_remaining_days--;

    //             if ($the_last_day_of_week == 6) {
    //                 // if the end date is a Saturday, then we subtract another day
    //                // $no_remaining_days--;
    //             }
    //         }
    //         else {
    //             // the start date was a Saturday (or earlier), and the end date was (Mon..Fri)
    //             // so we skip an entire weekend and subtract 2 days
    //             $no_remaining_days -= 1;
    //             //$no_remaining_days -= 2;
    //         }
    //     }

    //     //The no. of business days is: (number of weeks between the two dates) * (5 working days) + the remainder
    // //---->february in none leap years gave a remainder of 0 but still calculated weekends between first and last day, this is one way to fix it
    //    $workingDays = $no_full_weeks * 6;
    //    //$workingDays = $no_full_weeks * 5;
    //     if ($no_remaining_days > 0 )
    //     {
    //       $workingDays += $no_remaining_days;
    //     }

    //     //We subtract the holidays
    //     foreach($holidays as $holiday){
    //         $time_stamp=strtotime($holiday);
    //         //If the holiday doesn't fall in weekend
    //         //if ($startDate <= $time_stamp && $time_stamp <= $endDate && date("N",$time_stamp) != 6 && date("N",$time_stamp) != 7)
    //         if ($startDate <= $time_stamp && $time_stamp <= $endDate  && date("N",$time_stamp) != 7){
    //             $workingDays--;
           
    //         }
    //     }

    //     return array('working_days'=>$workingDays);
    // }
}
