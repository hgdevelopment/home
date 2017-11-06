<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;
use DB;
use User;
class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

	public static function UserAccessRights($menu_name)
	{
		$LogInId=Auth::guard('admin')->user()->id;

		$pages=DB::table('pages')->join('useraccesss','useraccesss.page_id','=','pages.id')->where('pages.menu_name',$menu_name)->where('useraccesss.userId',$LogInId)->where('useraccesss.status','Active')->where('pages.status','Active')->count();		
		 return $pages;
	}

	public static function userCode($id)
	{
		$login=DB::table('logins')->where('id',$id)->get();		
		foreach($login as $login)
		return $login->username;
	}
	
	public static function UserDetails($id)
	{
		$login=DB::table('logins')->where('id',$id)->get();		
		foreach($login as $login)

		if($login->userType=='MEM')
		{	
		$User=DB::table('memberregistrations')->where('userId',$login->id)->get();
		foreach($User as $User)
		return $User;
		}
		if($login->userType=='DSA')
		{	
		$User=DB::table('dsas')->where('userId',$login->id)->get();
		foreach($User as $User)
		return $User;
		}

		 return 0;
	}
  
}
