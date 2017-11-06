<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\tcnmaster;
use App\tcnrequest;
use App\benefitgeneration;
use App\generation;
use App\bank;
use Carbon;
use App\benefitdeclaration;
use Excel;
use Session;
class partialgenrateController extends Controller
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

        return view('admin.partialbenefit.generate1',compact('tcnmaster','tcnrequest'));
    }

     public function tobe(Request $request)
    {
        $benefitdeclarations =benefitdeclaration::where([['tcnType',$request->tcnType],['status','2']])->get();
       
//        dd(\DB::getQueryLog());
            $output = '';
        foreach ($benefitdeclarations as $benefit) {
            $date = Carbon::createFromDate($benefit->year,$benefit->month,'15');
            $output .= '<div class="col-md-3 sticky2 animated zoomIn" id="generatediv'.$benefit->id.'" style="display: block;">
   <img style="float: right" src="https://png.icons8.com/pin/office/30" title="Pin" width="20" height="20">
   <h4 class="font-bold m-t-none m-b"><bold>'.$benefit->tcnmaster->tcnType.'</bold> - '.$date->format('F').' '.$date->format('Y').'</h4>
   <div class="">
    <p style="text-transform: uppercase;">Benefit Declared</p>
      <div class=""><span>INR: '.$benefit->INR.'</span></div>
      <div class=""><span>AED: '.$benefit->AED.'</span></div>
      <div class=""><span>SAR: '.$benefit->SAR.'</span></div>
      <div class=""><span>CAD: '.$benefit->CAD.'</span></div>
      <div class=""><span>USD: '.$benefit->USD.'</span></div>
      <div class=""><span>Benefit to: </span><br><span>Locking period: </span></div>
      <br>
      <form method="post">
      '.csrf_field().'
      <input type="hidden" name="type" value="'.$benefit->tcnType.'">
      <input type="hidden" name="month" value="'.$date->format('F Y').'">
      <button type="submit" class="btn btn-success">Generate</a>
      </form>
   </div>
</div>

';
        }

        return $output;
    }


    public function store(Request $request)
    {

 
        $tcndetails = tcnmaster::where('id',$request->type)->first();
        $locking = $tcndetails->lockingDuration;
        $tcnid= $tcndetails->id;
        $month = $request->month;
        $month1 = new Carbon($month);
        $month2 = new Carbon($month);
        $month2->addDays('14');
        $month2->subMonths($locking);
        $from = $month2->startOfMonth();
        $to = new Carbon($month2);
        $to->endOfMonth();
//      echo $month.'--<br>'.$from.'<br>'.$to;



        
        //Saving Benefit details of users
        $tcns = tcnrequest::with('member')->where([['tcn_id',$tcnid],['status','Approved']])->where('depositeDate','<',$to)->get();
        $count = count($tcns);

        if($count == '0'){
            Session::flash('message', 'No Tcn Request available for Benefit ('.$month1->format("F").'/'.$month1->format("Y").')'); 
            return redirect('admin/partialbenefit/view');
        }

        //Checking user already received benefit
        

        $i=0;
        while ($i<$count){

            $check = benefitgeneration::where([['year',$month1->format('Y')],['month',$month1->format('m')],['tcnType',$tcnid],['userId',$tcns[$i]->userId]])->first();
            $countCheck = count($check); 

        if($countCheck != '1'){

            $benefit = new benefitgeneration;
            $benefit->userId = $tcns[$i]->userId;
            $benefit->userName = $tcns[$i]->member->name;
            $benefit->tcnType =  $tcns[$i]->tcn->id;
            $benefit->currencyType = $ctype = $tcns[$i]->currencyType;
            $benefit->unit = $tcns[$i]->unit;
            $benefit->tcnrequestId = $tcns[$i]->tcnCode;
            $benefit->amount = $tcns[$i]->amount;
            $benefit->year = $month1->format('Y');
            $benefit->month = $month1->format('m');
            $share = benefitdeclaration::where([['year',$month1->format('Y')],['month',$month1->format('m')],['tcnType',$tcns[$i]->tcn->id]])->first();
            $benefit->profit = $share->$ctype;
            $benefit->memberFee = ($tcns[$i]->unit)*50;
            $benefit->total = ($share->$ctype)*($tcns[$i]->unit)-(($tcns[$i]->unit)*50);
            $benefit->bankAccountId = $tcns[$i]->benefitId;
            $benefit->benefitType = 'PARTIAL';
            $benefit->save();

        }

            $i++;


        }

        $declared = benefitdeclaration::where([['year',$month1->format('Y')],['month',$month1->format('m')],['tcnType',$tcnid]])->first();
        $declared->status = '3';  
        $declared->save();

        //Benefit Generation details Storing

        $generate = generation::all();
        $slno = count($generate);

        $generated =  new generation;
        $generated->tcnId = $tcnid;
        $generated->month = $month1->format('m');
        $generated->year =  $month1->format('Y');
        $generated->slno =  $slno;
        $generated->save();


        Session::flash('message', 'Benefit Generation for '.$month1->format('F').'/'.$month1->format('Y').'  Successfully completed'); 



        return redirect('admin/partialbenefit/view');
    }
    public function excel(Request $request)
    {
    ob_end_clean();
    ob_start();
    

      // $x[]=0;
      // $x=explode('-',$request->date);

      $x[]=0;
      $x[0]=$request->year;
      $x[1]=$request->month;
  
        //All
    if($request->type == 'All'){

        $banks = benefitgeneration::where([['year',$x[0]],['month',$x[1]],['tcnType',$request->tcnId],['benefitType','PARTIAL']])->get();
 

            $now = Carbon::create($request->year,$request->month,'2','0','0','0')->format('F Y');

            //tcn details
            $b['tcn'] = $banks[0]->tcnmaster->tcnType;
            $b['month'] = $now;
            $title = $b['tcn']." - ".$b['month'];
            $i=1;
            foreach ($banks as $bank) {
                $a[$i]['SL NO'] = $i;
                $a[$i]['MEMBER CODE'] = $bank->userId;
                $a[$i]['MEMBER NAME'] = $bank->userName;
                $a[$i]['CLEARANCE DATE'] = '10-02-2017';
                $a[$i]['ACCOUNT NUMBER'] = $bank->bank->accountNumber;
                $a[$i]['IFSC CODE'] = $bank->bank->ifsc;
                $a[$i]['UNIT'] = $bank->unit;
                $a[$i]['AMOUNT'] = $bank->amount;
                $a[$i]['PROFIT PER UNIT'] = $bank->profit;
                $a[$i]['MEMBER FEE'] = $bank->memberFee;
                $a[$i]['CURRENCY TYPE'] = $bank->currencyType;
                $a[$i]['TOTAL AMOUNT'] = $bank->total;
                $i++;
            }   $lastcell= 'A3:K'.(1+$i);
            $pagename = 'All details | '.$title; 

            Excel::create($pagename, function($excel) use($a,$title,$lastcell){

                $excel->sheet('Sheetname', function($sheet) use($a,$title,$lastcell){
                    $sheet->fromArray($a);
                    $sheet->cell('A1:L1', function($cell) {
                        $cell->setFontSize(11);
                        $cell->setBackground('#7cde9c');
                        $cell->setFontWeight('bold');
                        $cell->setAlignment('center');

                    });
                    $sheet->setFreeze('A2');
                    $sheet->prependRow(1, array(
                        $title
                    ));
                    $sheet->mergeCells('A1:L1');
                    $sheet->cell('A1:L1', function($cell) {
                        $cell->setFontSize(12);
                        $cell->setBackground('#43a061');
                        $cell->setFontWeight('bold');
                        $cell->setAlignment('center');

                    });
                    $sheet->cell($lastcell, function($cell) {
                        $cell->setFontSize(12);
                        $cell->setFontWeight('thin');
                        $cell->setAlignment('center');

                    });

                    $sheet->setPageMargin(array(
                        0.25, 0.30, 0.25, 0.30
                    ));
                });

            })->download('xls');
        
    }

        //bank inr
        if($request->type == 'bankinr'){
            // $banks = benefitgeneration::where([['year',$x[0]],['month',$x[1]],['tcnType',$request->tcnId]])->get();

            $banks = benefitgeneration::where([['year',$x[0]],['month',$x[1]],['tcnType',$request->tcnId],['currencyType','INR'],['benefitType','PARTIAL']])->groupBy('bankAccountId')->selectRaw('sum(total) as sum, userId, userName,bankAccountId')->get();

            $now = Carbon::create($request->year,$request->month,'2','0','0','0')->format('F Y');
            //tcn details
             $b = tcnmaster::find($request->tcnId);
             $title = $b->tcnType." - ".$now." currency : INR";
            $i=1;
            foreach ($banks as $bank) {
 
                $bankdetails = bank::find($bank->bankAccountId);
                $a[$i]['SL NO'] = $i;
                $a[$i]['MEMBER CODE'] = $bank->userId;
                $a[$i]['MEMBER NAME'] = $bank->userName;
                $a[$i]['ACCOUNT NUMBER'] = $bankdetails->accountNumber;
                $a[$i]['IFSC CODE'] = $bankdetails->ifsc;
                $a[$i]['TOTAL AMOUNT'] = $bank->sum;
                $i++;
            }   $lastcell= 'A3:F'.(1+$i);
            $pagename = 'Bank details | '.$title;
            Excel::create($pagename, function($excel) use($a,$title,$lastcell){

                $excel->sheet('Sheetname', function($sheet) use($a,$title,$lastcell){
                    $sheet->fromArray($a);
                    $sheet->cell('A1:F1', function($cell) {
                        $cell->setFontSize(11);
                        $cell->setBackground('#7cde9c');
                        $cell->setFontWeight('bold');
                        $cell->setAlignment('center');

                    });
                    $sheet->setFreeze('A2');
                    $sheet->prependRow(1, array(
                        $title
                    ));
                    $sheet->mergeCells('A1:F1');
                    $sheet->cell('A1:F1', function($cell) {
                        $cell->setFontSize(12);
                        $cell->setBackground('#43a061');
                        $cell->setFontWeight('bold');
                        $cell->setAlignment('center');

                    });
                    $sheet->cell($lastcell, function($cell) {
                        $cell->setFontSize(12);
                        $cell->setFontWeight('thin');
                        $cell->setAlignment('center');

                    });

                    $sheet->setPageMargin(array(
                        0.25, 0.30, 0.25, 0.30
                    ));
                });

            })->export('xls');

        }


        if($request->type == 'bankaed'){
            // $banks = benefitgeneration::where([['year',$x[0]],['month',$x[1]],['tcnType',$request->tcnId]])->get();

            $banks = benefitgeneration::where([['year',$x[0]],['month',$x[1]],['tcnType',$request->tcnId],['currencyType','AED'],['benefitType','PARTIAL']])->groupBy('bankAccountId')->selectRaw('sum(total) as sum, userId, userName,bankAccountId')->get();

            $now = Carbon::create($request->year,$request->month,'2','0','0','0')->format('F Y');
            //tcn details
             $b = tcnmaster::find($request->tcnId);
             $title = $b->tcnType." - ".$now." currency : AED";
            $i=1;
            foreach ($banks as $bank) {
 
                $bankdetails = bank::find($bank->bankAccountId);
                $a[$i]['SL NO'] = $i;
                $a[$i]['MEMBER CODE'] = $bank->userId;
                $a[$i]['MEMBER NAME'] = $bank->userName;
                $a[$i]['ACCOUNT NUMBER'] = $bankdetails->accountNumber;
                $a[$i]['IFSC CODE'] = $bankdetails->ifsc;
                $a[$i]['TOTAL AMOUNT'] = $bank->sum;
                $i++;
            }   $lastcell= 'A3:F'.(1+$i);
            $pagename = 'Bank details | '.$title;
            Excel::create($pagename, function($excel) use($a,$title,$lastcell){

                $excel->sheet('Sheetname', function($sheet) use($a,$title,$lastcell){
                    $sheet->fromArray($a);
                    $sheet->cell('A1:F1', function($cell) {
                        $cell->setFontSize(11);
                        $cell->setBackground('#7cde9c');
                        $cell->setFontWeight('bold');
                        $cell->setAlignment('center');

                    });
                    $sheet->setFreeze('A2');
                    $sheet->prependRow(1, array(
                        $title
                    ));
                    $sheet->mergeCells('A1:F1');
                    $sheet->cell('A1:F1', function($cell) {
                        $cell->setFontSize(12);
                        $cell->setBackground('#43a061');
                        $cell->setFontWeight('bold');
                        $cell->setAlignment('center');

                    });
                    $sheet->cell($lastcell, function($cell) {
                        $cell->setFontSize(12);
                        $cell->setFontWeight('thin');
                        $cell->setAlignment('center');

                    });

                    $sheet->setPageMargin(array(
                        0.25, 0.30, 0.25, 0.30
                    ));
                });

            })->export('xls');

        }

        if($request->type == 'banksar'){
            // $banks = benefitgeneration::where([['year',$x[0]],['month',$x[1]],['tcnType',$request->tcnId]])->get();

            $banks = benefitgeneration::where([['year',$x[0]],['month',$x[1]],['tcnType',$request->tcnId],['currencyType','SAR'],['benefitType','PARTIAL']])->groupBy('bankAccountId')->selectRaw('sum(total) as sum, userId, userName,bankAccountId')->get();

            $now = Carbon::create($request->year,$request->month,'2','0','0','0')->format('F Y');
            //tcn details
             $b = tcnmaster::find($request->tcnId);
             $title = $b->tcnType." - ".$now." currency : SAR";
            $i=1;
            foreach ($banks as $bank) {
 
                $bankdetails = bank::find($bank->bankAccountId);
                $a[$i]['SL NO'] = $i;
                $a[$i]['MEMBER CODE'] = $bank->userId;
                $a[$i]['MEMBER NAME'] = $bank->userName;
                $a[$i]['ACCOUNT NUMBER'] = $bankdetails->accountNumber;
                $a[$i]['IFSC CODE'] = $bankdetails->ifsc;
                $a[$i]['TOTAL AMOUNT'] = $bank->sum;
                $i++;
            }   $lastcell= 'A3:F'.(1+$i);
            $pagename = 'Bank details | '.$title;
            Excel::create($pagename, function($excel) use($a,$title,$lastcell){

                $excel->sheet('Sheetname', function($sheet) use($a,$title,$lastcell){
                    $sheet->fromArray($a);
                    $sheet->cell('A1:F1', function($cell) {
                        $cell->setFontSize(11);
                        $cell->setBackground('#7cde9c');
                        $cell->setFontWeight('bold');
                        $cell->setAlignment('center');

                    });
                    $sheet->setFreeze('A2');
                    $sheet->prependRow(1, array(
                        $title
                    ));
                    $sheet->mergeCells('A1:F1');
                    $sheet->cell('A1:F1', function($cell) {
                        $cell->setFontSize(12);
                        $cell->setBackground('#43a061');
                        $cell->setFontWeight('bold');
                        $cell->setAlignment('center');

                    });
                    $sheet->cell($lastcell, function($cell) {
                        $cell->setFontSize(12);
                        $cell->setFontWeight('thin');
                        $cell->setAlignment('center');

                    });

                    $sheet->setPageMargin(array(
                        0.25, 0.30, 0.25, 0.30
                    ));
                });

            })->export('xls');

        }


        if($request->type == 'bankcad'){
            // $banks = benefitgeneration::where([['year',$x[0]],['month',$x[1]],['tcnType',$request->tcnId]])->get();

            $banks = benefitgeneration::where([['year',$x[0]],['month',$x[1]],['tcnType',$request->tcnId],['currencyType','CAD'],['benefitType','PARTIAL']])->groupBy('bankAccountId')->selectRaw('sum(total) as sum, userId, userName,bankAccountId')->get();

            $now = Carbon::create($request->year,$request->month,'2','0','0','0')->format('F Y');
            //tcn details
             $b = tcnmaster::find($request->tcnId);
             $title = $b->tcnType." - ".$now." currency : CAD";
            $i=1;
            foreach ($banks as $bank) {
 
                $bankdetails = bank::find($bank->bankAccountId);
                $a[$i]['SL NO'] = $i;
                $a[$i]['MEMBER CODE'] = $bank->userId;
                $a[$i]['MEMBER NAME'] = $bank->userName;
                $a[$i]['ACCOUNT NUMBER'] = $bankdetails->accountNumber;
                $a[$i]['IFSC CODE'] = $bankdetails->ifsc;
                $a[$i]['TOTAL AMOUNT'] = $bank->sum;
                $i++;
            }   $lastcell= 'A3:F'.(1+$i);
            $pagename = 'Bank details | '.$title;
            Excel::create($pagename, function($excel) use($a,$title,$lastcell){

                $excel->sheet('Sheetname', function($sheet) use($a,$title,$lastcell){
                    $sheet->fromArray($a);
                    $sheet->cell('A1:F1', function($cell) {
                        $cell->setFontSize(11);
                        $cell->setBackground('#7cde9c');
                        $cell->setFontWeight('bold');
                        $cell->setAlignment('center');

                    });
                    $sheet->setFreeze('A2');
                    $sheet->prependRow(1, array(
                        $title
                    ));
                    $sheet->mergeCells('A1:F1');
                    $sheet->cell('A1:F1', function($cell) {
                        $cell->setFontSize(12);
                        $cell->setBackground('#43a061');
                        $cell->setFontWeight('bold');
                        $cell->setAlignment('center');

                    });
                    $sheet->cell($lastcell, function($cell) {
                        $cell->setFontSize(12);
                        $cell->setFontWeight('thin');
                        $cell->setAlignment('center');

                    });

                    $sheet->setPageMargin(array(
                        0.25, 0.30, 0.25, 0.30
                    ));
                });

            })->export('xls');

        }


if($request->type == 'bankusd'){
            // $banks = benefitgeneration::where([['year',$x[0]],['month',$x[1]],['tcnType',$request->tcnId]])->get();

            $banks = benefitgeneration::where([['year',$x[0]],['month',$x[1]],['tcnType',$request->tcnId],['currencyType','USD'],['benefitType','PARTIAL']])->groupBy('bankAccountId')->selectRaw('sum(total) as sum, userId, userName,bankAccountId')->get();

            $now = Carbon::create($request->year,$request->month,'2','0','0','0')->format('F Y');
            //tcn details
             $b = tcnmaster::find($request->tcnId);
             $title = $b->tcnType." - ".$now." currency : USD";
            $i=1;
            foreach ($banks as $bank) {
 
                $bankdetails = bank::find($bank->bankAccountId);
                $a[$i]['SL NO'] = $i;
                $a[$i]['MEMBER CODE'] = $bank->userId;
                $a[$i]['MEMBER NAME'] = $bank->userName;
                $a[$i]['ACCOUNT NUMBER'] = $bankdetails->accountNumber;
                $a[$i]['IFSC CODE'] = $bankdetails->ifsc;
                $a[$i]['TOTAL AMOUNT'] = $bank->sum;
                $i++;
            }   $lastcell= 'A3:F'.(1+$i);
            $pagename = 'Bank details | '.$title;
            Excel::create($pagename, function($excel) use($a,$title,$lastcell){

                $excel->sheet('Sheetname', function($sheet) use($a,$title,$lastcell){
                    $sheet->fromArray($a);
                    $sheet->cell('A1:F1', function($cell) {
                        $cell->setFontSize(11);
                        $cell->setBackground('#7cde9c');
                        $cell->setFontWeight('bold');
                        $cell->setAlignment('center');

                    });
                    $sheet->setFreeze('A2');
                    $sheet->prependRow(1, array(
                        $title
                    ));
                    $sheet->mergeCells('A1:F1');
                    $sheet->cell('A1:F1', function($cell) {
                        $cell->setFontSize(12);
                        $cell->setBackground('#43a061');
                        $cell->setFontWeight('bold');
                        $cell->setAlignment('center');

                    });
                    $sheet->cell($lastcell, function($cell) {
                        $cell->setFontSize(12);
                        $cell->setFontWeight('thin');
                        $cell->setAlignment('center');

                    });

                    $sheet->setPageMargin(array(
                        0.25, 0.30, 0.25, 0.30
                    ));
                });

            })->export('xls');

        
        }

        //benefit details
        if($request->type == 'benefit'){
            $banks = benefitgeneration::where([['year',$x[0]],['month',$x[1]],['tcnType',$request->tcnId],['benefitType','PARTIAL']])->get();
            $now = Carbon::create($request->year,$request->month,'2','0','0','0')->format('F Y');
            //tcn details
            $b['tcn'] = $banks[0]->tcnmaster->tcnType;
            $b['month'] = $now;
            $title = $b->tcnType." - ".$now;
            $i=1;
            foreach ($banks as $bank) {
                $a[$i]['SL NO'] = $i;
                $a[$i]['MEMBER CODE'] = $bank->userId;
                $a[$i]['MEMBER NAME'] = $bank->userName;
                $a[$i]['CLEARANCE DATE'] = '10-02-2017';
                $a[$i]['ACCOUNT NUMBER'] = $bank->bank->accountNumber;
                $a[$i]['IFSC CODE'] = $bank->bank->ifsc;
                $a[$i]['UNIT'] = $bank->unit;
                $a[$i]['AMOUNT'] = $bank->amount;
                $a[$i]['PROFIT PER UNIT'] = $bank->profit;
                $a[$i]['MEMBER FEE'] = $bank->memberFee;
                $a[$i]['CURRENCY TYPE'] = $bank->currencyType;
                $a[$i]['TOTAL AMOUNT'] = $bank->total;
                $i++;
            }   $lastcell= 'A3:K'.(1+$i);
            $pagename = 'Benefit details | '.$title;
            Excel::create($pagename, function($excel) use($a,$title,$lastcell){

                $excel->sheet('Sheetname', function($sheet) use($a,$title,$lastcell){
                    $sheet->fromArray($a);
                    $sheet->cell('A1:L1', function($cell) {
                        $cell->setFontSize(11);
                        $cell->setBackground('#7cde9c');
                        $cell->setFontWeight('bold');
                        $cell->setAlignment('center');

                    });
                    $sheet->setFreeze('A2');
                    $sheet->prependRow(1, array(
                        $title
                    ));
                    $sheet->mergeCells('A1:L1');
                    $sheet->cell('A1:L1', function($cell) {
                        $cell->setFontSize(12);
                        $cell->setBackground('#43a061');
                        $cell->setFontWeight('bold');
                        $cell->setAlignment('center');

                    });
                    $sheet->cell($lastcell, function($cell) {
                        $cell->setFontSize(12);
                        $cell->setFontWeight('thin');
                        $cell->setAlignment('center');

                    });

                    $sheet->setPageMargin(array(
                        0.25, 0.30, 0.25, 0.30
                    ));
                });

            })->export('xls');

        }


    }





}
