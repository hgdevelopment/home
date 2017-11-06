<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\bank;
use App\country;
use App\tcnmaster;
use App\tcn_allot;
class bankmasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

       // \DB::enableQueryLog();
        //dd(\DB::getQueryLog());
        $bank = bank::join('countries','countries.id','=','country')->select('countries.id as country_id','countries.countryName as countryName', 'banks.*')->get();
        $country = country::all();
        $tcnmaster = tcnmaster::all();
        $tcnallot = tcn_allot::join('tcnmasters','tcnmasters.id','=','tcn_id')->join('banks','banks.id','=','account_id')->get();
       return view('admin.bank.bankmaster',compact('bank','country','tcnmaster','tcnallot'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      // $bank = bank::all();
      // $country= country::all();
      // return view('admin.bank.bankmaster',compact('country','bank'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $bank = new bank();
          //$bank = new bank();
          $this->validate($request,[
            'bank_name'=>'required',
            'account_number'=>'required',
            'branch'=>'required',
            'account_type'=>'required',
            'holderName'=>'required',
            'ifsc'=>'required',
            'country'=>'required',
           
            ]);
            $bank->bankName= $request->bank_name;
            $bank->accountNumber= $request->account_number;
            $bank->accountHolderName = $request->holderName;
            $bank->typeOfAccount = $request->account_type;
            $bank->country = $request->country;
            $bank->place = $request->place;
            $bank->branchName = $request->branch;
            $bank->ifsc = $request->ifsc;
            $bank->ibanNumber = $request->iban;
            $bank->save();
            return redirect('/admin/bankmaster');
    }
    public function add(Request $request)
    {

        $tcnName= $request->tcn;
        $accId = $request->account_number;
        $tcn = new tcn_allot();

        $bank = bank::where('accountNumber',$accId)->first();
        $tcnmaster = tcnmaster::where('tcnType',$tcnName)->first();
        $tcn_id=$tcnmaster->id;
        $acc_id=$bank->id;

        $tcn->tcn_id =$tcn_id;
        $tcn->currency_type = $request->currency;
        $tcn->account_id =$acc_id;
        $tcn->save();
       return redirect('/admin/bankmaster');

    }
    


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       // $bank = bank::find($id);
       // return view('admin.bank.bankmaster',compact('bank'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    { 
        $editbank = bank::find($id);
        $bank = bank::join('countries','countries.id','=','country')->select('countries.id as country_id','countries.countryName as countryName', 'banks.*')->get();
        $country = country::all();
        $tcnmaster = tcnmaster::all();
        $tcnallot = tcn_allot::join('tcnmasters','tcnmasters.id','=','tcn_id')->join('banks','banks.id','=','account_id')->get();
      return view('admin.bank.editbankmaster',compact('editbank','bank','country','tcnmaster','tcnallot'));
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
        $bank = bank::find($id);
        $bank->bankName= $request->bank_name;
        $bank->accountNumber= $request->account_number;
        $bank->branchName = $request->branch;
        $bank->ifsc = $request->ifsc;
        $bank->accountHolderName = $request->holderName;
        $bank->typeOfAccount = $request->account_type;
        $bank->country = $request->country;
        $bank->place = $request->place;
        $bank->ibanNumber = $request->iban;
        $bank->save();
        return redirect('admin/bankmaster');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bank = bank::find($id);
        $bank->delete();
        return redirect('/admin/bankmaster');
    }
    
}


