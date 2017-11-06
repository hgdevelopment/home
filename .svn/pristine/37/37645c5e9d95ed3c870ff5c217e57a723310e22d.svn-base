<?php

namespace App\Http\Controllers\web;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\memberregistration;
use Illuminate\Support\Facades\Response; 
use Validator; 
use Auth;
class profileController extends Controller
{
    //
    public $user;

    public function __construct(){
       
    }
    public function changeProfileImg(Request $request){
    	$this->user = Auth::guard('user')->user();
    	$userProfile=memberregistration::where('id', $this->user::first()->id)->first();

    	$memberregistration = memberregistration::find($this->user::first()->id);
    	$validate=Validator::make(["avatar_img"=>$request->avatar_img],[
            'avatar_img'=>'required|image:jpg,png,jpeg'
            ]);
    	if ( $validate->fails() )
		{
			return Response::json(['success' => false, 'errors' => $validator->getMessageBag()->toArray()]);
		}else{
			//photo upload
	        $profilepic = time().'.'.$request->avatar_img->getClientOriginalExtension();
	        $request->avatar_img->move(storage_path('img/member_img'), $profilepic);
	        $memberregistration->photo=$profilepic;
	        $memberregistration->save();
			return Response::json(['success' => true, 'file' => $profilepic]);
		}
    }
}
