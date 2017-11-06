<?php

namespace App\Http\Controllers\hr;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use DB;
use App\hr_shift;
use App\hr_department;
use App\log;

class shiftController extends Controller
{
    //
    public function index()
    {
        $hr_department = hr_department::all();
        $shifts = DB::table('hr_shifts')
            ->join('hr_departments', 'hr_shifts.department', '=', 'hr_departments.id')
            ->where('hr_shifts.deleted_at', '=', NULL)
            ->select('hr_shifts.*', 'hr_departments.department_name as names')
            ->get();
        return view('hr.shift.index', compact('hr_department', 'shifts'));
    }

    public function store(Request $request)
    {

        $hr_shift = new hr_shift();
        $hr_shift->shift_name= $request->shift_name;
        $hr_shift->description= $request->description;
        $hr_shift->department= $request->department;
        $time_in= \Carbon::parse($request->time_in);
        $hr_shift->time_in =$time_in->format('G:i');
        $time_out= \Carbon::parse($request->time_out);
        $hr_shift->time_out =$time_out->format('G:i');
        $break_out= \Carbon::parse($request->break_out);
        $hr_shift->break_out =$break_out->format('G:i');
        $break_in= \Carbon::parse($request->break_in);
        $hr_shift->break_in =$break_in->format('G:i');
        $hr_shift->break_time= $request->break_time;
        $query = $hr_shift->save(); 
        if($query)
        {
            $log = new log();
            $log->ip_address =  \Request::getClientIp(true);
            $log->user = session('userId');
            $log->actions = "Created shift-".$request->shift_name;
            $log->type ="Shift";
            $query = $log->save();
        }
        return redirect('/hr/shifts');
    }

    public function edit($id)
    {   $shift = hr_department::find($id);
        $edit_hr_shift = DB::table('hr_shifts')
            ->join('hr_departments', 'hr_shifts.department', '=', 'hr_departments.id')
            ->where('hr_shifts.id',$id)
            ->select('hr_shifts.*', 'hr_departments.department_name as names', 'hr_departments.id as dept_id')
            ->first();
        return view('hr.shift.edit', compact('edit_hr_shift','shift'));
    }

    public function update(Request $request, $id)
    {
       
        $hr_shift = hr_shift::find($id);
        $hr_shift->shift_name= $request->shift_name;
        $hr_shift->description= $request->description;
        $hr_shift->department= $request->department;
        $time_in= \Carbon::parse($request->time_in);
        $hr_shift->time_in =$time_in->format('G:i');
        $time_out= \Carbon::parse($request->time_out);
        $hr_shift->time_out =$time_out->format('G:i');
        $break_out= \Carbon::parse($request->break_out);
        $hr_shift->break_out =$break_out->format('G:i');
        $break_in= \Carbon::parse($request->break_in);
        $hr_shift->break_in =$break_in->format('G:i');
        $hr_shift->break_time= $request->break_time;
        $hr_shift->save();
        $log = new log();
        $log->ip_address =  \Request::getClientIp(true);
        $log->user = session('userId');
        $log->actions = "Edited shift-".$request->shift_name;
        $log->type = "Shift";
        $query = $log->save();

        return redirect('/hr/shifts');
    }

    public function destroy($id)
    {
        $branch=hr_shift::find($id);
        
        $branch->delete();
        $log = new log();
        $log->ip_address =  \Request::getClientIp(true);
        $log->user = session('userId');
        $log->actions = "Deleted shift-".$branch->shift_name;
        $log->type = "Shift";
        $query = $log->save();
        //dd(DB::getQueryLog());//DB::enableQueryLog();
    }
  
}
 
