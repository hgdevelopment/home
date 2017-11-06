<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\login;
use App\hr_emp_personal;
use App\hr_available_leave;
use Auth;
use Session;
use Carbon;
class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    //
    use AuthenticatesUsers;



    public function __construct(){
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function showLoginForm()
    {
        if (auth()->guard('user')->user()) return redirect()->route('web.dashboard');

        if (auth()->guard('admin')->user()) return redirect()->route('admin.dashboard');

        return view('index');
    }


    public function login(Request $request)
    {    
      $this->validate($request,[

      'username'=>'required',

      'password'=>'required'

      ]);



      if (auth()->guard('user')->attempt(['username' => $request->input('username'), 'password' => $request->input('password'),'status'=>'Active' ,'userType'=>'MEM'])) 
      {


        //****MEMBER*******************************************************************************//

        $user = Auth::guard('user')->user();

        Session::put('userId', $user->id); Session::put('userName', $user->userName); Session::put('userType', $user->userType);

        return  redirect()->route('web.dashboard');

      }
      else if (auth()->guard('admin')->attempt(['username' => $request->input('username'), 'password' => $request->input('password'),'status'=>'Active']))
      {    
        //****ADMIN*******************************************************************************//

        $user = Auth::guard('admin')->user();

        Session::put('userId', $user->id); Session::put('userName', $user->username); Session::put('userType', $user->userType);


        //********************OFFICE INCHARGE******************//

        if($user->userType=='OI')
        return  redirect()->route('admin.dashboard');



        //********************MARKETING EXCUTIVE***************//

        if($user->userType=='ME')
        return  redirect()->route('admin.dashboard');



        //***********************EMPLOYEE*********************//

        if($user->userType=='EMP')
        {
        $emp=hr_emp_personal::where('user_id',$user->id)->first();

        Session::put('department_id', $emp->department_id);


        $join=$emp->date_of_joining;
        $joindate= Carbon::parse($join);
        $now = Carbon::now();
        $days = $joindate->diffInDays($now);
        $month=$now->month; 
        $year=$now->year;     
        $leave=\DB::table('hr_available_leaves')->whereMonth('month_year','=',$month)->whereYear('month_year','=',$year)->where('user_id','=',$emp->user_id)->count();
        if($leave==0)
        {
            $availableleave = new hr_available_leave;
            $availableleave->user_id=$emp->user_id;
            $availableleave->month_year=$now;
                if($days<=183)
                {
                    $availableleave->leave_count=1;   
                }
                if($days>183)
                {
                    $availableleave->leave_count=2;   
                }
            $availableleave->save();
        }
                      
        return  redirect()->route('admin.dashboard');


        return  redirect()->route('admin.dashboard');

        }



        //*****************DIRECT SELLING AGENT***************//

        if($user->userType=='DSA')
        return  redirect()->route('admin.dashboard');

      }
      else
      {
        session()->flash('message','Your Username and Password are Wrong.');

        return redirect('/')->withInput($request->only('username','remember'));

        //dd('your username and password are wrong.');
      }

    }





        //*****************LOGOUT***************//
     public function logout()
     {
        if(Auth::guard('admin')->check())
        { 

        Auth::guard('admin')->logout();

        Session::flush();

        return redirect('/');

        }
        elseif(Auth::guard('user')->check())
        { 

        Auth::guard('user')->logout();

        Session::flush();

        return redirect('/');

        }
        else
        {

        return redirect('');

        }


    }



}
