<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\attendance;
use App\hr_shift;
use App\hr_emp_personal_details;
use Carbon;
class pageController extends Controller
{
    //
    public $user;

    public function __construct(){
       
    }

    public function index(){
        if(Auth::guard('admin')->user())
        {
             $user = Auth::guard('admin')->user()->id;
             $id = Auth::guard('admin')->user()->id;
             $department = hr_emp_personal_details::where('user_id',$id)->first()->department_id;
              $shifts = hr_shift::where('department',$department)->get();
      
            $lastday = attendance::where([['timeId',3],['staffId',$user]])->orWhere([['timeId',2],['staffId',$user]])->orWhere([['timeId',1],['staffId',$user]])->first();
            $date = Carbon::now();
            $count = count($lastday);
            if($count == 1){

            if($lastday->date == $date->format('Y-m-d')){
                $time =  $lastday->timeId;
                $date =  $lastday->date;
            }else{
                $time =  $lastday->timeId;
                $date =  $lastday->date;
            }

            }elseif($count==0){

                $lastday = attendance::where([['timeId',4],['staffId',$user],['date',$date->format('Y-m-d')]])->first();
                $count = count($lastday);
                if($count==1){
                     $time = 4;
                     $date = Carbon::now()->format('Y-m-d');
                }else{
                     $time = 0;
                     $date = Carbon::now()->format('Y-m-d');
                }
               
            }

            return view('admin.index',compact('time','date','shifts'));
        }
    return redirect('/');
    }
}

