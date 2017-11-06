<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tcnmaster;
use App\tcnrequest;
use Carbon;
use App\benefitdeclaration;
use App\benefitgeneration;
use DB;

class partialController extends Controller
{ 
    
    

   


    public function check(Request $request)
    {
       $date[]=0;
       $date = explode('/',$request->month);
       $month = $date[1];
       $year = $date[0];
       $tcn =  $request->tcn;

       $benefit = benefitdeclaration::where([['year','=',$year],['month','=',$month],['tcnType','=',$tcn]])->first();
       if($benefit == NULL){
       return 0;
       }else{
       $benefit = json_encode($benefit);
       return $benefit;
       }
    }

    public function view()
    {

      $tcns = tcnmaster::all();
      return view('admin.partialbenefit.view',compact('tcns'));
    
    }

    public function choice(Request $request)
    {
      
      $selected = tcnmaster::find($request->tcn);
       $bd = benefitdeclaration::where([['tcnType','=',$request->tcn]])->get();
       $tcnid = $request->tcn;
      return view('admin.partialbenefit.view',compact('selected','bd','tcnid'));
    
    }

    public function genarated(Request $request)
    {

      $x[]=0;
        $x=explode('-',$request->date);
      $banks = benefitgeneration::where([['year',$x[0]],['month',$x[1]],['tcnType',$request->tcnId],['benefitType','PARTIAL']])->get();

      $bankinr = benefitgeneration::where([['year',$x[0]],['month',$x[1]],['tcnType',$request->tcnId],['currencyType','INR'],['benefitType','PARTIAL']])->get();
      $inr = count($bankinr);
      $bankaed = benefitgeneration::where([['year',$x[0]],['month',$x[1]],['tcnType',$request->tcnId],['currencyType','AED'],['benefitType','PARTIAL']])->get();
      $aed = count($bankaed);
      $banksar = benefitgeneration::where([['year',$x[0]],['month',$x[1]],['tcnType',$request->tcnId],['currencyType','SAR'],['benefitType','PARTIAL']])->get();
      $sar = count($banksar);
      $bankcad = benefitgeneration::where([['year',$x[0]],['month',$x[1]],['tcnType',$request->tcnId],['currencyType','CAD'],['benefitType','PARTIAL']])->get();
      $cad = count($bankcad);
      $bankusd = benefitgeneration::where([['year',$x[0]],['month',$x[1]],['tcnType',$request->tcnId],['currencyType','USD'],['benefitType','PARTIAL']])->get();
      $usd = count($bankusd);

      $b = tcnmaster::find($request->tcnId);
      $tcnname = $b->tcnType;



      $bank = benefitgeneration::where([['year',$x[0]],['month',$x[1]],['tcnType',$request->tcnId]])->first();
       $datee = Carbon::create($x[0], $x[1], 5, 0, 0, 0);

      $count = count($banks);
      $selected = tcnmaster::find($request->tcnId);
      // \DB::enableQueryLog();
      $bd = benefitdeclaration::where([['tcnType','=',$request->tcnId]])->get();
      // dd(DB::getQueryLog());
      $tcnid = $request->tcnId;
      $genon = $bank->created_at;
      $fetch = 1;
      return view('admin.partialbenefit.view',compact('selected','bd','tcnid','datee','count','fetch','genon','inr','sar','cad','usd','aed','tcnname'));

 

    }

    

}
