<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\tcnmaster;
use App\tcnrequest;
use Carbon;
use App\benefitdeclaration;
use App\benefitgeneration;
use DB;

class benefitController extends Controller
{ 
    
    public function tcn()
    {
        $tcnmaster = tcnmaster::all();
        $now = Carbon::now();
        $month = $now->format('m');
        $year = $now->format('Y');
        $month = Carbon::createFromDate(null, $month, '15');
        $month->subMonths(2)->toDateString();

//        \DB::enableQueryLog();
        $tcnrequest = tcnrequest::where('status','=','Approved')
            ->whereMonth('approvalDate','=',$month)
            ->whereYear('approvalDate','=',$year)->get();
//        dd(\DB::getQueryLog());
        return view('admin.benefit.benefit',compact('tcnmaster','tcnrequest'));
    }

    public function add(Request $request)
    {
        $date[]=0;
        $date = explode('/', $request->month);

        $month = $date[1];
        $year = $date[0];
        $tcn =  $request->tcn;

        if($request->declared == '1'){

        $benefit = benefitdeclaration::where([['year','=',$year],['month','=',$month],['tcnType','=',$tcn]])->first();

        if($benefit != NULL){
        return 'error : benefit already';
        }

        $benefit = new benefitdeclaration;
        $benefit->tcnType = $request->tcn;
        $benefit->INR = $request->inr;
        $benefit->AED = $request->aed;
        $benefit->CAD = $request->cad;
        $benefit->SAR = $request->sar;
        $benefit->USD = $request->usd;
        $benefit->year = $date[0];
        $benefit->month = $date[1];
        $benefit->status = '1'; 
        $benefit->save();

        $benefit = benefitdeclaration::where([['year','=',$year],['month','=',$month],['tcnType','=',$tcn]])->first();
        return $benefit->id;

        }elseif($request->updated == '1'){
           $id = $request->edit;
           $benefit = benefitdeclaration::find($id);
           $benefit->INR = $request->inr;
           $benefit->AED = $request->aed;
           $benefit->CAD = $request->cad;
           $benefit->SAR = $request->sar;
           $benefit->USD = $request->usd;
           $benefit->year = $date[0];
           $benefit->month = $date[1];
           $benefit->save();
           return '<span style="color:green;">Benefit updated</span>';

        }


    }


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
      return view('admin.benefit.view',compact('tcns'));
    
    }

    public function choice(Request $request)
    {
      
      $selected = tcnmaster::find($request->tcn);
       $bd = benefitdeclaration::where([['tcnType','=',$request->tcn]])->get();
       $tcnid = $request->tcn;
      return view('admin.benefit.view',compact('selected','bd','tcnid'));
    
    }

    public function genarated(Request $request)
    {

      $x[]=0;
        $x=explode('-',$request->date);
      $banks = benefitgeneration::where([['year',$x[0]],['month',$x[1]],['tcnType',$request->tcnId]])->get();

      $bankinr = benefitgeneration::where([['year',$x[0]],['month',$x[1]],['tcnType',$request->tcnId],['currencyType','INR'],['benefitType','NORMAL']])->get();
      $inr = count($bankinr);
      $bankaed = benefitgeneration::where([['year',$x[0]],['month',$x[1]],['tcnType',$request->tcnId],['currencyType','AED'],['benefitType','NORMAL']])->get();
      $aed = count($bankaed);
      $banksar = benefitgeneration::where([['year',$x[0]],['month',$x[1]],['tcnType',$request->tcnId],['currencyType','SAR'],['benefitType','NORMAL']])->get();
      $sar = count($banksar);
      $bankcad = benefitgeneration::where([['year',$x[0]],['month',$x[1]],['tcnType',$request->tcnId],['currencyType','CAD'],['benefitType','NORMAL']])->get();
      $cad = count($bankcad);
      $bankusd = benefitgeneration::where([['year',$x[0]],['month',$x[1]],['tcnType',$request->tcnId],['currencyType','USD'],['benefitType','NORMAL']])->get();
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
      return view('admin.benefit.view',compact('selected','bd','tcnid','datee','count','fetch','genon','inr','sar','cad','usd','aed','tcnname'));

 

    }

    

}
