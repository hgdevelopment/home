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
        ->join('logins','memberregistrations.userId','=','logins.id')
        ->select('memberregistrations.name','memberregistrations.code','memberregistrations.id','memberregistrations.addedById as addid','memberregistrations.addedByUnder as addedBy')
        ->get();
        if($reassign->isEmpty()){
        Session::flash('message', 'Member code does not exist!'); 
        }
        foreach($reassign as $assign)
        $reassign1=$assign->addid;
        $addedunder=$assign->addedBy;
        $login=\DB::table('logins')->where('id',$reassign1)->get();
        $dsa=\DB::table('logins')->where('userType','DSA')->where('status','Active')->get();
        $me=\DB::table('logins')->where('userType','ME')->where('status','Active')->get();
        $oi=\DB::table('logins')->where('userType','OI')->where('status','Active')->get();
        $emp=\DB::table('logins')->where('userType','EMP')->where('status','Active')->get();
        return view('admin.reassignmember.reassignmember',compact('reassign','dsa','me','oi','emp','login','addedunder'));
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
            $addedunder="dsa";
            $by=$request->assignedtodsa;
        }
        if($request->assigned=='ME')
        {
            $addedunder="me";
            $by=$request->assignedtome;
        }
        if($request->assigned=='OI')
        {
            $addedunder="oi";
            $by=$request->assignedtooi;
        } 
        if($request->assigned=='EMP')
        {
            $addedunder="emp";
            $by=$request->assignedtoemp;
        } 

        $view= memberregistration::withTrashed()->find($id);
        if($request->assigned=='Myself')
        {
        $view->addedById=$view->userId;
        $view->addedByUnder='myself';
        $view->save();  
        }else{
        $view->addedById=$by;
        $view->addedByUnder=$addedunder; 
        $view->save(); 
        }
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







