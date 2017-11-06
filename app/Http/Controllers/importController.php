<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\attendance;
use App\oldattendance;
use App\oldpersonal;
use App\hr_emp_personal_details;
use App\login;
use Carbon;
use Hash;

class importController extends Controller
{

public function home(Request $request){
        $attendances = oldattendance::select('staffId')->distinct()->get();

        foreach ($attendances as $attendance) {
        	$code = sprintf('%010d', $attendance->staffId);
        	$personal = oldpersonal::where("emp_code",$code)->first();

        	$check = login::where('username',$code)->first();
        	if(!isset($check)){
        		$new = new login;
        		$new->username = $code;
        		$new->password = Hash::make('AJ');
        		$new->userType = 'EMP';
        		$new->status = 'Active';
        		$new->save();//last id is 637 in case i want to delete entries

        		$new = new hr_emp_personal_details;
        		$new->user_id = login::where('username',$code)->first()->id;
        		$new->code = $code;
        		$new->name = $personal->emp_fname;
        		$new->save();
        		echo $code." - New entry added <br>";
        		sleep(1);
        	}

        	   $attendanceByUser = oldattendance::where('staffId',ltrim($code, '0'))->get();
        	  foreach ($attendanceByUser as $userdata) {
        	  	$new = new attendance;
        	  	$new->staffId = login::where('username',$code)->first()->id;
        	  	$new->date = $userdata->datewot;
        	  	$new->in = Carbon::parse($userdata->timeIn)->format('Y-m-d H:i:s');
        	  	if($userdata->breakOut==0 || $userdata->breakOut==1){$userdata->breakOut = '00:00:00 0000-00-00';}
        	  	if($userdata->breakIn==0 || $userdata->breakIn==1){$userdata->breakIn = '00:00:00 0000-00-00';}
        	  	if($userdata->dayOff==0 || $userdata->dayOff==1){$userdata->dayOff = '00:00:00 0000-00-00';}
        	  	$new->bout = Carbon::parse($userdata->breakOut)->format('Y-m-d H:i:s');
        	  	$new->bin = Carbon::parse($userdata->breakIn)->format('Y-m-d H:i:s');
        	  	$new->out = Carbon::parse($userdata->dayOff)->format('Y-m-d H:i:s');
        	  	$new->timeId = $userdata->timeId;
        	  	$new->skip = '0';$day = 'NA';
        	  	$late = ($userdata->late_mng+$userdata->late_mng+$userdata->late_mng+$userdata->late_mng);
        	  	if($userdata->totalh>480){$day = 'fullday';}
        	  	if($late>540){$late = 540;}
        	  	if($late>60 && $late<240){$day = 'halfday';}
        	  	if($late>240){$day = 'leave';}
        	  	if($late<0){$late = '0';}
        	  	$new->late = $late;
        	  	$ot = ($userdata->ot+$userdata->ot_mng);
        	  	if($ot>540){$ot = 540;}if($ot<0){$ot = '0';}
        	  	$new->ot = $ot;
        	  	$new->shift = '0';
        	  	$new->day = $day;
        	  	$new->save();

        	  }



        	

        }

        // $attendance = new attendance;


}

}