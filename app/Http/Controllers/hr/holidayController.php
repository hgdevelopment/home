<?php

namespace App\Http\Controllers\hr;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\hr_holiday;
use DB;

class holidayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
 
         $leave=\DB::table('hr_holidays')->where('hr_holidays.deleted_at','=',NULL)->orderBy('hr_holidays.id', 'desc')
        ->leftjoin('hr_religions','hr_holidays.holiday_religion','=','hr_religions.id')->where('hr_religions.deleted_at','=',NULL)
        ->select('hr_holidays.holiday_name','hr_holidays.holiday_date','hr_holidays.holiday_type','hr_religions.religion_name','hr_holidays.id')
        ->get();
    
        $count=count($leave);
        return view('hr.master.holidaymaster',compact('leave','count'));

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

       $leavedates=explode(',',$request->holiday_leave);  
       for($i=0; $i<count($leavedates); $i++)
       {

       $holiday = new hr_holiday();
       $holiday->holiday_name = $request->holiday_name;
       $holiday->holiday_date = date("Y-m-d",strtotime($leavedates[$i]));
       $holiday->holiday_type = $request->holiday_type;
       $holiday->holiday_religion = $request->religion;
       $holiday->save();
       }
       Session::flash('message', 'Holiday Added Successfully!'); 
       return redirect('/hr/master/holidaymaster');
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
      
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
  public function destroy(Request $request, $id)
    {
        $holidaymaster = hr_holiday::find($id);
        $holidaymaster->delete();
        Session::flash('message', 'Holiday  Deleted Successfully!'); 
        return redirect('/hr/master/holidaymaster');

    }
}







