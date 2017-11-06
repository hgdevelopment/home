<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\review;
use App\attendance;
use Carbon;
use Auth;

class reviewController extends Controller
{ 

    public function home(Request $request)
    {
    	$from = Carbon::now()->firstOfMonth()->format('Y-m-d');
    	$to = Carbon::now()->format('Y-m-d');
    	$to = Carbon::parse($to);

    	$staffId = Auth::guard('admin')->user()->id;;
    	


    	$dates = [];
        $j=0;
        for($date = Carbon::parse($from); $date <= $to; $date->addDay()) {
        $dates[$j][0] = $date->format('Y-m-d');
        $dates[$j][1] = attendance::where('date',$date->format('Y-m-d'))->where('staffId',$staffId)->first()->day;
        $dates[$j][2] = attendance::where('date',$date->format('Y-m-d'))->where('staffId',$staffId)->first()->ot;
        $dates[$j][3] = attendance::where('date',$date->format('Y-m-d'))->where('staffId',$staffId)->first()->late;
        $dates[$j][4] = attendance::where('date',$date->format('Y-m-d'))->where('staffId',$staffId)->first()->id;
        $dates[$j][5] = attendance::where('date',$date->format('Y-m-d'))->where('staffId',$staffId)->first()->staffId;
        $j++;
        }
        return view('admin.attendance.review',compact('dates'));
    }

    public function change(Request $request)
    {

    	$check = review::where('staffId',$request->id)->where('date',$request->date)->first();
    	$count = count($check);
    	if($count == 1){
    		$check->requestto = $request->change;
            $check->note = $request->note;
    	    $check->status = '0';
    		$check->save();
    	}else{
    		$change = new review; 
    	    $change->staffId = $request->id;
    	    $change->date = $request->date;
    	    $change->note = $request->note;
    	    $change->requestto = $request->change;
    	    $change->status = '0';
            $change->save();

    	}
        return redirect('admin/attendance/review');
    }


     public function verify(Request $request)
    {
    	  $reviews = review::where("status",0)->limit(30)->get();
          return view('admin.attendance.verify',compact('reviews'));
    }

    public function approve(Request $request)
    {


    	if($request->mode=='approve'){

    	   $count = count($request->list); 
    	   $list = $request->list;$i=0;
    	      while ($i < $count) {
    	  	    $chagne = review::find($list[$i]);
    	  	    $chagne->status = '1';
    	  	    $chagne->save();
    	  	    $staffId = $chagne->staffId;
    	  	    $date = $chagne->date;
    	  	    $i++;
    	  	    $status = attendance::where('staffId',$staffId)->where('date',$date)->first();
    	  	    $status->day = 'weekoff';
    	  	    $status->save();
    	      }
    
    	  return redirect('admin/attendance/verify');
          
    	}elseif($request->mode=='reject'){

    		$count = count($request->list); 
    	    $list = $request->list;$i=0;
    	      while ($i < $count) {
    	  	    $chagne = review::find($list[$i]);
    	  	    $chagne->status = '2';
    	  	    $chagne->save();
    	  	    $i++;
    	      }

         return redirect('admin/attendance/verify');
          
    	}

    }

}