<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\memberregistration;
use App\hr_emp_personal;
use App\dsa;
use App\useraccess;
use DB;

class accessRightsController extends Controller
{


    public function index()
    {

        return view('admin.useraccess.accessRights');
    }


    //******************Access Rights Set For User ****************************//

    //******************___________________________****************************//

    public function store(Request $request)
    {      



        $page = DB::table('pages')->where('status', 'Active')->orderBy('id', 'Asc')->get();

        foreach($page as $pages)
         {
            if($request->has('check'.$pages->id)) $status='Active'; else $status='Deny';




            $count = DB::table('useraccesss')->where('userId',$request->userId)->where('page_id',$pages->id)->count();




            if($count>0) $update = DB::table('useraccesss')->where('userId', $request->userId)->where('page_id', $pages->id)->update(['status' => $status]);




            else $insert=DB::table('useraccesss')->insert(['userId' => $request->userId, 'page_id' => $pages->id, 'status' => $status]);



         }

        $userType=$request->userType;



        $userId=$request->userId;

        $username=User::find($userId);
        $type='USER ACCESS';
        $report='user access rights updated for this user  : '. $username->username;
        Controller::logReport($type,$report);



        return view('admin.useraccess.accessRights',compact('userType','userId'));        
    }







    //******************Select Use's Base On User Type ****************************//

    //******************_______________________________****************************//


    public function show(Request $request)
    {


        if($request->process=='userNames')
        {

            if($request->userType=='MEM')
                $table = memberregistration::join('logins','logins.id','=','memberregistrations.userId')->select('logins.userType','logins.id', 'memberregistrations.code as code','memberregistrations.name')->where('logins.userType','MEM')->where('logins.status','Active')->get();




            if($request->userType=='DSA')
                $table = dsa::join('logins','logins.id','=','dsas.userId')->select('logins.userType','logins.id', 'logins.username as code','dsas.name')->where('logins.status','Active')->get();
            




            if($request->userType=='ME' || $request->userType=='EMP')
                $table = hr_emp_personal::join('logins','logins.id','=','hr_emp_personal_details.user_id')->where('logins.userType',$request->userType)->select('logins.userType','logins.id', 'logins.username as code','hr_emp_personal_details.name')->where('logins.status','Active')->get();
            




            // if()
            //     $table = hr_emp_personal::join('logins','logins.id','=','hr_emp_personal_details.user_id')->where('logins.userType',$request->userType)->select('logins.userType','logins.id', 'logins.username as code','hr_emp_personal_details.name')->where('logins.status','Active')->get();
            



            if($request->userType=='OI')
                $table = DB::table('logins')->where('userType',$request->userType)->select('logins.userType','logins.id', 'logins.username as code','logins.userType as name')->where('logins.status','Active')->get();
              // return 'OI';



            return view('admin.useraccess.accessRightsAjax',compact('request','table'));   



        }

        //-------------User Access Rights  Details----------------

        if($request->process=='accessRights')
        {
            $access = DB::table('useraccesss')->where('userId', $request->userId)->where('status', 'Active')->orderBy('id','Asc')->get();


            foreach($access as $accesss)
            {


                $accessIds[] = $accesss->page_id;
            }



            //return var_dump($accessIds);
            $main = DB::table('pages')->where('parent_id','0')->where('main_id','0')->where('status','Active')->orderBy('id', 'Asc')->get();



            foreach($main as $mains)
            {


                $mainIds[] = $mains->id;
            }



            //return var_dump($accessIds);
            $parent = DB::table('pages')->where('parent_id','0')->whereIn('main_id',$mainIds)->where('status','Active')->orderBy('id', 'Asc')->get();



            foreach($parent as $parents)
            {


                $parentIds[] = $parents->id;
            }
            


            $child = DB::table('pages')->whereIn('parent_id', $parentIds)->where('status', 'Active')->orderBy('id', 'Asc')->get();



            return view('admin.useraccess.accessRightsAjax',compact('request','mainIds','parentIds','accessIds','main','parent','child'));        
        }
    }


}
