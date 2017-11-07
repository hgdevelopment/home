<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\dsa;
use App\reassigndsa;
use DB;
use Auth;
class reassignDsaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       return view('admin.reassigndsa.reassigndsa');
       // \DB::enableQueryLog();
     
    }

    public function view(Request $request)
    {
       /* $re=array();*/
        $code=$request->membercode;
        $reassign=\DB::table('logins')->where('username',$code)->where('userType','=','DSA')
        ->join('dsas','dsas.userId','=','logins.id')
        ->select('logins.username','dsas.name','dsas.addedById as addid','dsas.id','dsas.addedByUnder as addedBy')->get();
        if($reassign->isEmpty()){
        Session::flash('message', 'Member code does not exist!'); 
        }
        foreach($reassign as $assign)
        $addedunder=$assign->addedBy;  
        $reassign1=$assign->addid;
        if($reassign1=="myself"){
            $data='';
        }
        else
        {
            $res=\DB::table('logins')->where('logins.id',$reassign1)->get();
            foreach ($res as $res)
            $data=$res->username;
        }
        $dsa=\DB::table('logins')->where('userType','EMP')->where('status','Active')->get();
        $me=\DB::table('logins')->where('userType','ME')->where('status','Active')->get();
        $oi=\DB::table('logins')->where('userType','OI')->where('status','Active')->get();
        return view('admin.reassigndsa.reassigndsa',compact('reassign','dsa','me','oi','data','addedunder'));
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
        if($request->assigned=='EMP')
        {
            $addedunder="EMP";
            $by=$request->assignedtodsa;
        }
        if($request->assigned=='ME')
        {   
            $addedunder="ME";
            $by=$request->assignedtome;
        }
        if($request->assigned=='OI')
        {
            $addedunder="OI";
            $by=$request->assignedtooi;
        }
        $view= dsa::withTrashed()->find($id);
        $view->addedById=$by;
        $view->addedByUnder=$addedunder;
        $view->save();
        Session::flash('message', 'Reassigned DSA Successfully!'); 
        return view('admin.reassigndsa.reassigndsa');
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







