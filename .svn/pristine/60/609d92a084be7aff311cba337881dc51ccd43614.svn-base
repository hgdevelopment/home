<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\memberregistration;
use App\reassign;
use DB;
use Auth;

class reassignMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       return view('admin.reassignmember.reassignmember');
       // \DB::enableQueryLog();
     
    }

    public function view(Request $request)
    {
       $code=$request->membercode;
       $reassign=\DB::table('memberregistrations')->where('code',$code)
        ->join('logins','memberregistrations.addedById','=','logins.id')
        ->select('memberregistrations.name','memberregistrations.code','memberregistrations.id','logins.username','memberregistrations.addedById as addid')
        ->get();
        if($reassign->isEmpty()){
        Session::flash('message', 'Member code does not exist!'); 
        }
        $dsa=\DB::table('logins')->where('userType','DSA')->where('status','Active')->get();
        $me=\DB::table('logins')->where('userType','ME')->where('status','Active')->get();
        return view('admin.reassignmember.reassignmember',compact('reassign','dsa','me'));
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
    public function solve(Request $request)
    {
        
        $id=$request->id;
        if($request->assigned=='DSA')
        {
            $by=$request->assignedtodsa;
        }
        if($request->assigned=='ME')
        {
            $by=$request->assignedtome;
        }
           
        $view= memberregistration::withTrashed()->find($id);
        $view->addedById=$by;
        $view->save();
        Session::flash('message', 'Reassigned Member Successfully!'); 
        return view('admin.reassignmember.reassignmember');


    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */


    public function edit()
    {
       
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        
    }
}







