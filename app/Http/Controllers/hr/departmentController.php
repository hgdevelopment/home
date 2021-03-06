<?php

namespace App\Http\Controllers\hr;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\hr_department;
use App\log;
class departmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response 
     */
    public function index()
    {
        $Department=hr_department::whereNull('deleted_at')->get();
        return view('hr.master.department',compact('Department')); 
    }

    /**
     * Show the form for creating a new resource. 
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $department=new hr_department();

        $this->validate($request,[
            'departmentname'=>'required|unique:hr_departments,department_name,NULL,id,deleted_at,NULL'
        ]); 

        $department->department_name=$request->departmentname;
        $department->status=1;
        $department->save();

        $log = new log();
        $log->ip_address =  \Request::getClientIp(true);
        $log->user = session('userId');
        $log->actions = "Created department-".$request->departmentname;
        $log->type = "Department";
        $query = $log->save();

         return redirect('/hr/master/department');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $editdepartment = hr_department::where('id',$id)
        ->first(); 
        $Department=hr_department::get();
        return view('hr.master.editDepartment',compact('editdepartment','Department'));
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
        $department = hr_department::find($id);
        $department->department_name= $request->departmentname;
        $department->save();

        $log = new log();
        $log->ip_address =  \Request::getClientIp(true);
        $log->user = session('userId');
        $log->actions = "Edited department-".$request->departmentname;
        $log->type = "Department";
        $query = $log->save();

        return redirect('/hr/master/department');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $department=hr_department::find($id);
        $department->delete();

        $log = new log();
        $log->ip_address =  \Request::getClientIp(true);
        $log->user = session('userId');
        $log->actions = "Deleted department-".$department->departmentname;
        $log->type = "Department";
        $query = $log->save();
    }
}
 