<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\memberregistration;
use App\User;
use App\tcnrequest;
class mergeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.members.mergeMembers');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        // $merging=memberregistration::where('code','=','$code')->find();
      
        // return View('admin.members.mergeMembers',compact('merging','mem'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[
        'original'=>'required',
        'duplicate'=>'required',
        ]);
        $original=memberregistration::where('code',$request->original)->first();
        $duplicate=memberregistration::where('code',$request->duplicate)->first();
        // $request->original;
        // $request->duplicate;
        session()->flash('data',array('data'=>array('original' => $original,'duplicate'=>$duplicate)));
        return  redirect('/admin/merge');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      
      if($request->original==$request->duplicate){
        return response()->json(['result'=>false,'message'=>'Could not Merge']);
      }
      // $original=memberregistration::where('userId',$request->original)->first();
      // $duplicate=memberregistration::where('userId',$request->duplicate)->first();
      $duplicateTCN=tcnrequest::where('userId',$request->duplicate)->get();
      foreach ($duplicateTCN as $key => $value) {
          $tcnUpdate =  tcnrequest::find($value->id);
          $tcnUpdate->userId=$request->original;
          $tcnUpdate->save();
      }
      $duplicate= memberregistration::where('userId',$request->duplicate);
      if($duplicate->delete()){
        $loginduplicate= User::find($request->duplicate);
        $loginduplicate->delete();
        return response()->json(['result'=>true,'message'=>'Successfull']);
      }
      return response()->json(['result'=>true,'message'=>'Could not Merge']);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function merge()
    {

        
      return View('admin.members.mergespecialMember'); 
    }
}
