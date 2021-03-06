<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Validator;
use View;
use Auth;
use Session;
use Hash;
use DB;
use App\login;
use Alert;
class changePasswordController extends Controller
{

    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | 
    |
    */

    public function index()
    {
        return view('admin.passwords.changePassword');
    }


    public function store(Request $request)
    {
        
        $this->validate($request, $this->rules(), $this->validationErrorMessages());

        if(auth()->guard('admin')->attempt(['password' => $request->curPassword,'status'=>'Active' ,'id'=>$request->id]))
          return   $this->resetPassword($request);
        else
          return   $this->sendResetFailedResponse($request);

    }

    protected function rules()
    {
        return [
            'curPassword' => 'required',
            'newPassword' => 'required|min:8',
            'confPassword' => 'required|min:8',
        ];
    }

    /**
     * Get the password reset validation error messages.
     *
     * @return array
     */
    protected function validationErrorMessages()
    {
        return [];
    }

    protected function resetPassword($request)
    {
        $password = $request->newPassword;
        $passwords = bcrypt($password);
        $remember_token=  Str::random(60);
        $update = DB::table('logins')->where('id', $request->id)->update(['remember_token' => $remember_token, 'password' => $passwords]);

        Alert::success('Password Changed Successfully', 'Success');

        $username=User::find($request->id);
        $type='CHANGE PASSWORD';
        $report='This user has changed his password.   username: '. $username->username;
        Controller::logReport($type,$report);

        return redirect()->back();
    }

    protected function sendResetFailedResponse(Request $request)
    {
      session()->flash('message','Incorrect Current Password.');
      return redirect()->back();
    }

}
