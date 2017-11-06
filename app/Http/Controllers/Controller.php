<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Auth;
use DB;
use App\User;
use App\log;
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





	public static function logReport($type,$report)
	{
        $log = new log();
        $log->ip_address =  \Request::getClientIp(true);
        $log->user = session('userId');
        $log->actions = $report;
        $log->type = $type;
        $query = $log->save();
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
  



  public static function currencyConverter($from_Currency,$to_Currency,$amount) {


          $from_Currency = urlencode($from_Currency);
     $from_Currency = urlencode($from_Currency);
         $to_Currency = urlencode($to_Currency);
         $encode_amount = $amount;
         $get = file_get_contents("https://finance.google.com/finance/converter?a=".$encode_amount."&from=".$from_Currency."&to=".$to_Currency);
        $get = explode("<span class=bld>",$get);
        $get = explode("</span>",$get[1]);
        $converted_currency = preg_replace("/[^0-9\.]/", null, $get[0]);
        return $converted_currency;
     } 

}
