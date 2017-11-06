<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Foundation\Helpers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Password;
use App\Mail\resetpasswordMemDsa;
use App\memberregistration; 
use App\dsa; 
use DB;
use Mail;
class resetPasswordController extends Controller
{
    public function show($resetType)
    {   
        return view('admin.passwords.reset',compact('resetType'));
    }
 

    public function store(Request $request)
    {
        if($request->resetType=='MEMBER')
        {
            $table = memberregistration::join('logins','logins.id','=','memberregistrations.userId')->where('logins.status','Active')->where('logins.username',$request->userCode)->get();
        }
        if($request->resetType=='DSA')
        {
           $table = dsa::join('logins','logins.id','=','dsas.userId')->where('logins.status','Active')->where('logins.username',$request->userCode)->get();
        }   
        if(count($table)<1)
        {   
            session()->flash('message','Incorrect Code...');
            return  redirect()->back();
        }



        foreach ($table as $table)
        $table->userId;
    
        $password = str_random(8);
        $passwords = bcrypt($password);
        $remember_token=  Str::random(60);


        $update = DB::table('logins')->where('id', $table->userId)->update(['remember_token' => $remember_token, 'password' => $passwords]);
        session()->flash('message','Password Reset Successfully..New Password is : '.$password);

        $reset=[
                 'resetType' => $request->resetType,
                 'password' => $password
                ];

        $user=Controller::UserDetails($table->userId);
        $to=$user->email;

        Mail::to($to)
        ->send(new resetpasswordMemDsa($reset));

        // $data = array(
        //     'name' => "Learning Laravel",
        // );

        // Mail::send('admin.mail.resetpassword', $data, function ($message) {

        //     $message->from('surezravichandra@gmail.com', 'Learning Laravel');

        //     $message->to('domd047@gmail.com')->subject('Learning Laravel test email');

        // });
        return  redirect()->back();
    }
}
