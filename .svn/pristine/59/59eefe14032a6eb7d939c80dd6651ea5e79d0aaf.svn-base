<?php

namespace App\Http\Controllers\web\auth;


use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\login;
use Auth;
use Session;
class loginController extends Controller
{
    //
    use AuthenticatesUsers;

    protected $redirectTo = '/web/home';

    public function __construct(){
    	$this->middleware('guest', ['except' => 'logout']);
    }
    public function showLoginForm(){
        if (auth()->guard('webuser')->user()) return redirect()->route('web.dashboard');

    	return view('web.auth.index');
    }



    public function login(Request $request)
    {
    
    	$this->validate($request,[
    		'username'=>'required',
    		'password'=>'required'
    		]);
        $username=$request->username;
        $users = login::all()->where('username',$request->username); 
        foreach($users as $user);


        if (auth()->guard('webuser')->attempt(['username' => $request->input('username'), 'password' => $request->input('password'),'status'=>'Active', 'userType' => 'OI']))
        {   
            Session::put('userName',$username);Session::put('userType',$user->userType);
            return redirect()->route('admin.dashboard');

            }
        else if (auth()->guard('webuser')->attempt(['username' => $request->input('username'), 'password' => $request->input('password'),'status'=>'Active', 'userType' => 'MEM']))
        {   

            Session::put('userName',$username);Session::put('userType',$user->userType);

            return redirect()->route('web.dashboard');

            }
        else if (auth()->guard('webuser')->attempt(['username' => $request->input('username'), 'password' => $request->input('password'),'status'=>'Active', 'userType' => 'DSA']))
        {

            Session::put('userName',$username);Session::put('userType',$user->userType);
            return redirect()->route('web.dashboard');
            }
        else if (auth()->guard('webuser')->attempt(['username' => $request->input('username'), 'password' => $request->input('password'),'status'=>'Active', 'userType' => 'EMP']))
        {
            Session::put('userName',$username);Session::put('userType',$user->userType);
            return redirect()->route('web.dashboard');
            }
        else if (auth()->guard('webuser')->attempt(['username' => $request->input('username'), 'password' => $request->input('password'),'status'=>'Active', 'userType' => 'ME']))
        {
            Session::put('userName',$username);Session::put('userType',$user->userType);
            return redirect()->route('web.dashboard');
            }

        else
        {
             session()->flash('message','Your Username and Password are Wrong.');
             return redirect('/')->withInput($request->only('username','remember'));
            //dd('your username and password are wrong.');
                }
    	//return redirect()->intended(route('web.login'))->withInput($request->only('username','remember'));
    }


     public function logout()
     {
        Session::flush();

    	if(auth()->guard('webuser')->logout()){
             return redirect()->route('web.login');
        }else{
            return redirect()->route('web.dashboard');
        }

        
    }
}
