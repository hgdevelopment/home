<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\attendance;
use App\hr_shift;
use App\hr_holiday;
use Carbon;
use Auth;

class attendanceController extends Controller
{
        public function start(Request $request){

          return $request;
        }

        public function mng(Request $request){
           $user = Auth::guard('admin')->user()->id;

          $lastday = attendance::where([['timeId',3],['staffId', $user]])->orWhere([['timeId',2],['staffId', $user]])->orWhere([['timeId',1],['staffId', $user]])->first();
          $count =  count($lastday);
          if($count == "0"){
          	
          	$mng = new attendance;
          	$mng->staffId = $user;
          	$mng->date = Carbon::now()->format('Y-m-d');
          	$mng->in = Carbon::now();
          	$mng->timeId = '1';
          	$mng->save();


          } else {
          	echo "You have some errors in your attendance register please contact admin";
          }
          return redirect('admin/dashboard');
        }

        public function bri(Request $request){
        	$user = Auth::guard('admin')->user()->id;
        $lastday = attendance::where([['timeId',1],['staffId',$user]])->first();
        $date = $lastday->date; 
        if($request->time == 2){
          $bri = attendance::where([['staffId',$user],['date',$date]])->first();
          if($bri->timeId == 1){
 			$bri->bout = Carbon::now();
 			$bri->timeId = 2;
 			$bri->save();
 		}
 		} 
 		if($request->time == 'skip'){ 
 		  $skip = attendance::where([['staffId',$user],['date',$date]])->first();
          if($skip->timeId == 1){
 			$skip->bin = '00-00-0000 00:00:00';
 			$skip->bout = '00-00-0000 00:00:00';
 			$skip->timeId = 3;
 			$skip->skip = 1;
 			$skip->save();
          }
 		}
          return redirect('admin/dashboard');
        }

        public function bro(Request $request){
        	$user = Auth::guard('admin')->user()->id;
        $lastday = attendance::where([['timeId',2],['staffId',$user]])->first();
        $date = $lastday->date;
          $bro = attendance::where([['staffId',$user],['date',$date]])->first();
          if($bro->timeId == 2){
 			$bro->bin = Carbon::now();
 			$bro->timeId = 3;
 			$bro->save();
          }
          return redirect('admin/dashboard');
        }

        public function ngt(Request $request){
        	$user = Auth::guard('admin')->user()->id;
          $lastday = attendance::where([['timeId',3],['staffId',$user]])->first();
           $date = $lastday->date;
          $ngt = attendance::where([['staffId',$user],['date',$date]])->first();
          if($ngt->timeId == 3){
 			$ngt->out = Carbon::now();
 			$ngt->timeId = 4;
 			$ngt->shift = $request->shift;
 			$ngt->save();
          }
          #LATE CHECKER 
          $ngt = attendance::where([['staffId',$user],['date',$date]])->first();
          #shift
            $shift = hr_shift::find($ngt->shift);
            $shiftmng = $date.' '.$shift->time_in;
            $shiftngt = $date.' '.$shift->time_out;
            $breaktime = $shift->break_time;
            $mngreal =  Carbon::parse($shiftmng);
            
             $timein = Carbon::parse('2017-10-10'. $shift->time_in); 
             $timeout = Carbon::parse('2017-10-10'. $shift->time_out); 
            $latemng = $timein->diffInMinutes($timeout,false);
            if($latemng<=0){  $tmrw = Carbon::parse($date)->addDay();  $shiftngt = $tmrw->format('Y-m-d').' '.$shift->time_out;}

             $ngtreal =  Carbon::parse($shiftngt);

           $mng = Carbon::parse($ngt->in);
           $bout = Carbon::parse($ngt->bout);
           $bin = Carbon::parse($ngt->bin);
           $ngtt = Carbon::parse($ngt->out);

          #late 1 - morning and night19
          $latemng = $mngreal->diffInMinutes($mng,false); 
          if($latemng<0 && $latemng<-55){
          	 $ot = $latemng*-1;
          	 $latemng = 0;
          }
          if($latemng<0){$latemng = 0;}
          $latengt = $ngtt->diffInMinutes($ngtreal,false); 
          if($latengt<0 && $latengt<-55){
          	 $ot = $latengt*-1;
          	 $latengt = 0;
          }
          if($latengt<0){$latengt = 0;}
          $latebreak = $bin->diffInMinutes($bout); 
          if($latebreak>$breaktime){
          	$latebreak = $latebreak-$breaktime;
          } else{
          	$latebreak = 0;
          }

         
          $late = $latemng+$latengt+$latebreak;
          $ngt->late = $late;
          if($late>60){
           if($late>240){
           	$ngt->day = 'leave';
           }else{
           	$ngt->day = 'halfday';
           }	
           
          }else{
           $ngt->day = 'fullday';
          }
          $ngt->ot = $ot;

          
          
          $ngt->save();

      $from = Carbon::now()->firstOfMonth()->format('Y-m-d');
      $to = Carbon::now()->format('Y-m-d');
      $to = Carbon::parse($to);

      $staffId = $user;
      


        $dates = [];
        $j=0;
        for($date = Carbon::parse($from); $date <= $to; $date->addDay()) {
        $dates[$j][0] = $date->format('Y-m-d');
        $day = attendance::where('date',$date->format('Y-m-d'))->where('staffId',$staffId)->first()->day;
        if($day  === NULL){
          $register = new attendance;
          $register->date = $date->format('Y-m-d');
          $register->in=$register->out=$register->bin=$register->bout='0000-00-00 00:00:00';
          $register->timeId = 4;
          $register->late = $register->ot = 0;
          $register->day = 'leave';
          $register->shift = '0';
          $register->staffId = $staffId;
          $register->created_at = $register->updated_at = '2017-10-27 11:32:46';
          $register->save();

        }
        $j++;
        }

          return redirect('admin/dashboard');
        }

      public function skip(Request $request){
      return $user = Auth::guard('admin')->user()->id;
          $lastday = attendance::where([['timeId',1],['staffId',$user]])->first();
          $date = $lastday->date;
          $skip = attendance::where([['staffId',$user],['date',$date]])->first();
          if($ngt->timeId == 3){
 			$skip->bin = '00-00-0000 00:00:00';
 			$skip->bout = '00-00-0000 00:00:00';
 			$skip->timeId = 3;
 			$skip->save();
          }
          return redirect('admin/dashboard');
        }
  
   
}

