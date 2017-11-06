<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\login;
use App\memberregistration;
use App\dsa;
use App\useraccess;
use DB;

class accessRightsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.useraccess.accessRights');
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
        //return $request->userId;
        $page = DB::table('pages')->where('status', 'Active')->orderBy('id', 'Asc')->get();

        foreach($page as $pages)
         {
            if($request->has('check'.$pages->id))
            $status='Active';
            else
            $status='Deny';

            $count = DB::table('useraccesss')->where('userId',$request->userId)->where('page_id',$pages->id)->count();

            if($count>0)
                $update = DB::table('useraccesss')->where('userId', $request->userId)->where('page_id', $pages->id)->update(['status' => $status]);
            else
                $insert=DB::table('useraccesss')->insert(['userId' => $request->userId, 'page_id' => $pages->id, 'status' => $status]);
         }
        $userType=$request->userType;
        $userId=$request->userId;

        return view('admin.useraccess.accessRights',compact('userType','userId'));        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //-------------Users Details----------------

        if($request->show==1)
        {

            if($request->userType=='MEM')
                $table = memberregistration::join('logins','logins.id','=','memberregistrations.userId')->select('logins.id', 'memberregistrations.code as code','memberregistrations.name')->where('logins.userType','MEM')->get();
            if($request->userType=='DSA')
                $table = dsa::join('logins','logins.id','=','dsas.userId')->select('logins.id', 'logins.username as code','dsas.name')->get();
            if($request->userType=='ME')
                return 'ME';
            if($request->userType=='EMP')
                return 'EMP';
            if($request->userType=='OI')
                return 'OI';

            return view('admin.useraccess.accessRightsAjax',compact('request','table'));            
        }

        //-------------User Access Details----------------

        if($request->show==2)
        {
            $access = DB::table('useraccesss')->where('userId', $request->userId)->where('status', 'Active')->orderBy('id','Asc')->get();
            foreach($access as $accesss)
            {
                $accessIds[] = $accesss->page_id;
            }
            //return var_dump($accessIds);
            $parent = DB::table('pages')->where('parent_id','0')->where('status','Active')->orderBy('id', 'Asc')->get();
            foreach($parent as $parents)
            {
                $parentIds[] = $parents->id;
            }
            
            $child = DB::table('pages')->whereIn('parent_id', $parentIds)->where('status', 'Active')->orderBy('id', 'Asc')->get();
            return view('admin.useraccess.accessRightsAjax',compact('request','parentIds','accessIds','parent','child'));        
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
