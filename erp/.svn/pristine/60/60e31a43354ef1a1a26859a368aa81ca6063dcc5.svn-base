<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\memberregistration;
use App\dsa;
use Mail;

class ForgetPasswordController extends Controller
{
    //
    public  function index(){
    	 return view('ForgetPassword');
    }
    public function findemail(Request $request){
    	$this->validate($request,[
            'username'=>'required'
            ]);
        $user = User::where('username',$request->username)->first();
        if($user->status=='Block'){
          session()->flash('message','Your account is Blocked');
        }elseif($user->status=='Pending'){
        	session()->flash('message','Your account is not activated');
        }else{

        	if($user->userType=='MEM'){
             $password='M'.substr($approvemember->name,0,2).str_random(5);
        	 $member=memberregistration::where('userId',$user->id)->first();
             $data = array(
	        'name' => $member->name,
	        'password'=>$password,
	        'username'=>$user->username
	        );
        	 Mail::send('admin.mail.forget_password', compact('data'), function ($message) use ($member){
		        $message->from('heeraerptl@gmail.com', 'Heera ERP - Request Password Reset');
		        $message->to($member->email)->subject('HI! Your password has been reset');
		        });
        	}
        	elseif($user->userType=='DSA'){
             $password='D'.substr($approvemember->name,0,2).str_random(5);
             $dsa=dsa::where('userId',$user->id)->first();
              $data = array(
		        'name' => $dsa->name,
		        'password'=>$password,
		        'username'=>$user->username
		        );
              Mail::send('admin.mail.forget_password', compact('data'), function ($message) use ($dsa){
		        $message->from('heeraerptl@gmail.com', 'Heera ERP - Request Password Reset');
		        $message->to($dsa->email)->subject('HI! Your password has been reset');
		        });

        	}
        	$password=Hash::make($password);
        	$user->password=$password;
        	$user->save();
        	session()->flash('message','Your password has been reset successfully,Please Check Your Email');

        }    	
    	return redirect('/forget_password');
    }
}
