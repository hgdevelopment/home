<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\login;
use App\memberregistration;

class dsaUpgradeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.Upgradedsa.dsaUpgrade');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        $dsaCode=$request->dsaCode;
        $checkdsaDetails=login::where('logins.username', '=', $dsaCode)->first();
        
        if($checkdsaDetails->status == "Active")
        {
            $dsaId=$checkdsaDetails->id;
            $memberDetails=memberregistration::join('logins','logins.id','=','memberregistrations.userId')->where('memberregistrations.addedById', '=', $dsaId)->where('logins.status', '=', 'Active')->select('logins.status as status', 'memberregistrations.*')->get();

             return view('admin.Upgradedsa.viewMemberPage',compact('memberDetails'));
        }
        else
        {
            return;
        }
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
        $dsaId=$request->dsaId;
        $checkdsaDetails=login::find($dsaId);
        $checkdsaDetails->userType='ME';
        $checkdsaDetails->save();


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
}
