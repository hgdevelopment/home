<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\login;
use Auth;
use Session;
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

    public function showLoginForm(){
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
          $user = Auth::guard('user')->user();
          Session::put('userId', $user->id); Session::put('userName', $user->userName);
          return  redirect()->route('web.dashboard');
       }
       else if (auth()->guard('admin')->attempt(['username' => $request->input('username'), 'password' => $request->input('password'),'status'=>'Active']))
       {    
          $user = Auth::guard('admin')->user();
          Session::put('userId', $user->id); Session::put('userName', $user->username);

          if($user->userType=='OI')
          return  redirect()->route('admin.dashboard');

          if($user->userType=='ME')
          return  redirect()->route('admin.dashboard');

          if($user->userType=='EMP')
          return  redirect()->route('admin.dashboard');
        
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
