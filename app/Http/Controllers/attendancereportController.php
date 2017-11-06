<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\attendance;
use App\hr_shift;
use App\hr_department;
use Carbon;
use Auth;
use Excel;
use Session;
use App\login;
use App\hr_emp_personal_details;

class attendancereportController extends Controller
{
        public function home(Request $request){

         $departments = hr_department::all();


          return view('admin.attendance.report',compact('departments'));
        }


    public function staff(Request $request)
    {
    ob_end_clean();
    ob_start();
    

      // $x[]=0;
      // $x=explode('-',$request->date);

      $x[]=0;
      $x[0]=$request->year;
      $x[1]=$request->month;

       $staffId = login::where('username',$request->staffid)->first()->id;

       
        //All


         $attendances = attendance::whereYear('date', '=', $x[0])
              ->whereMonth('date', '=', $x[1])->where('staffId',$staffId)->orderBy('date', 'asc')->get();
 
          $login = login::find($staffId)->username;
          $name = hr_emp_personal_details::where('user_id',$staffId)->first()->name;
           
            //tcn details
          
            $title = 'Attendance Report - '.$name;
            $i=1;
            foreach ($attendances as $attendance) {
                $a[$i]['SL NO'] = $i;
                $a[$i]['STAFF ID'] =  $login;
                $date = Carbon::parse($attendance->date)->format('d F Y');
                $a[$i]['DATE'] = $date;
                $a[$i]['IN'] = $attendance->in; 
                $a[$i]['BREAK OUT '] = $attendance->bout;
                $a[$i]['BREAK IN'] = $attendance->bin;
                $a[$i]['DAY OFF'] = $attendance->out;
                $a[$i]['SHIFT'] = $attendance->shift;
                $a[$i]['LATE'] = $attendance->late;
                $a[$i]['OT'] = $attendance->ot;
                $a[$i]['DAY'] = $attendance->day;
                $i++;
            }   $lastcell= 'A3:I'.(1+$i);
            $pagename = 'Attendance | '.$title; 


 if(count($a)==0){
        $a[0]['ERROR'] = 'No attendance to fetch';
        Excel::create($pagename, function($excel) use($a,$title,$lastcell,$merge){

                $excel->sheet('Sheetname', function($sheet) use($a,$title,$lastcell,$merge){
                    $sheet->fromArray($a);
                    $sheet->cell('A1:K1', function($cell) {
                        $cell->setFontSize(11);
                        $cell->setBackground('#7cde9c');
                        $cell->setFontWeight('bold');
                        $cell->setAlignment('center');

                    });
                    $sheet->setFreeze('A2');
                    // $sheet->prependRow(1, array(
                    //     $title
                    // ));
                    $sheet->mergeCells('A1:K1');
                    $sheet->mergeCells('A2:K2');
                   
                    
                   

                    $sheet->setPageMargin(array(
                        0.25, 0.30, 0.25, 0.30
                    ));
                });

            })->download('xls');


    }else{

            Excel::create($pagename, function($excel) use($a,$title,$lastcell){

                $excel->sheet('Sheetname', function($sheet) use($a,$title,$lastcell){
                    $sheet->fromArray($a);
                    $sheet->cell('A1:K1', function($cell) {
                        $cell->setFontSize(11);
                        $cell->setBackground('#7cde9c');
                        $cell->setFontWeight('bold');
                        $cell->setAlignment('center');

                    });
                    $sheet->setFreeze('A2');
                    $sheet->prependRow(1, array(
                        $title
                    ));
                    $sheet->mergeCells('A1:K1');
                    $sheet->cell('A1:K1', function($cell) {
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

            })->download('xls');  }
        
    

}


   public function department(Request $request)
    {
    ob_end_clean();
    ob_start();
    
    $dept = $request->dept;
    $x[0]= $request->year;
    $x[1]= $request->month;

    $users = hr_emp_personal_details::select('user_id')->where('department_id',$dept)->get();
$i=1;$k=0;$merge[]=0;$m=0;
    foreach ($users as $user) {
       
        $staffId = $user->user_id;

         $attendances = attendance::whereYear('date', '=', $x[0])
              ->whereMonth('date', '=', $x[1])->where('staffId',$staffId)->orderBy('date', 'asc')->get();

        
 
          $login = login::find($staffId)->username;
          $name = hr_emp_personal_details::where('user_id',$staffId)->first()->name;
           
            //tcn details
          
            $title = 'Attendance Report - '.$name;
            $j=1;  $count = count($attendances);
            foreach ($attendances as $attendance) {
                if($i == 1 && $k == 0){
                $a[$i]['SL NO'] = '';
                $a[$i]['STAFF ID'] =  ' ';
                $date = Carbon::parse($attendance->date)->format('d F Y');
                $a[$i]['DATE'] = $date;
                $a[$i]['IN'] = ' ';
                $a[$i]['BREAK OUT '] = ' ';
                $a[$i]['BREAK IN'] = ' ';
                $a[$i]['DAY OFF'] =  ' ';
                $a[$i]['SHIFT'] = ' ';
                $a[$i]['LATE'] = ' ';
                $a[$i]['OT'] =  ' ';
                $a[$i]['DAY'] = ' ';
                $i++;
                $a[$i]['SL NO'] = $name;$i++;$merge[$m]=$i;$m++;
                $frt = $count;
                }

                if($j==1 && $k != 0){ 
                $a[$i]['SL NO'] = '';$i++;
                $a[$i]['SL NO'] = $name;$i++;$merge[$m]=$i;$m++;
                }


                $a[$i]['SL NO'] = $j;
                $a[$i]['STAFF ID'] =  $login;
                $a[$i]['DATE'] = $attendance->date;
                $a[$i]['IN'] = $attendance->in;
                $a[$i]['BREAK OUT '] = $attendance->bout;
                $a[$i]['BREAK IN'] = $attendance->bin;
                $a[$i]['DAY OFF'] = $attendance->out;
                $a[$i]['SHIFT'] = $attendance->shift;
                $a[$i]['LATE'] = $attendance->late;
                $a[$i]['OT'] = $attendance->ot;
                $a[$i]['DAY'] = $attendance->day;
                $i++;

                

                $j++;$k=1;
            }   $lastcell= 'A3:I'.(1+$i);$j=0;

                


            $pagename = 'Attendance | '.$title; 
    } 

    if(count($a)==0){
        $a[0]['ERROR'] = 'No attendance to fetch';
        Excel::create($pagename, function($excel) use($a,$title,$lastcell,$merge){

                $excel->sheet('Sheetname', function($sheet) use($a,$title,$lastcell,$merge){
                    $sheet->fromArray($a);
                    $sheet->cell('A1:K1', function($cell) {
                        $cell->setFontSize(11);
                        $cell->setBackground('#7cde9c');
                        $cell->setFontWeight('bold');
                        $cell->setAlignment('center');

                    });
                    $sheet->setFreeze('A2');
                    // $sheet->prependRow(1, array(
                    //     $title
                    // ));
                    $sheet->mergeCells('A1:K1');
                    $sheet->mergeCells('A2:K2');
                   
                    
                   

                    $sheet->setPageMargin(array(
                        0.25, 0.30, 0.25, 0.30
                    ));
                });

            })->download('xls');


    }else{

    Excel::create($pagename, function($excel) use($a,$title,$lastcell,$merge){

                $excel->sheet('Sheetname', function($sheet) use($a,$title,$lastcell,$merge){
                    $sheet->fromArray($a);
                    $sheet->cell('A1:K1', function($cell) {
                        $cell->setFontSize(11);
                        $cell->setBackground('#7cde9c');
                        $cell->setFontWeight('bold');
                        $cell->setAlignment('center');

                    });
                    $sheet->setFreeze('A2');
                    // $sheet->prependRow(1, array(
                    //     $title
                    // ));
                    // $sheet->mergeCells('A1:K1');
                    $count = count($merge);$i=0;
                    while ($i < $count) {
                        $cellmerge = 'A'.$merge[$i].':K'.$merge[$i].'';
                        $sheet->mergeCells($cellmerge);
                        $sheet->cell('A'.$merge[$i], function($cell) {
                        $cell->setFontSize(14);
                        $cell->setBackground('#D3D3D3');
                        $cell->setFontWeight('bold');
                        $cell->setAlignment('center');

                    });
                        $i++;
                    }


                    
                    $sheet->cell('A1:K1', function($cell) {
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

    
    }


}