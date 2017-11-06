<?php
namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\benefitgeneration;
use App\benefitdeclaration;
use Excel;
use Carbon;

class viewbenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $benefits =  benefitdeclaration::where('status','1')->paginate(10);
        return view('admin.benefit.generated',compact('benefits'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //downloads

        //All
        if($request->type == 'All'){

            $banks = benefitgeneration::where([['year',$request->year],['month',$request->month],['tcnType',$request->tcntype]])->get();
            $now = Carbon::create($request->year,$request->month,'2','0','0','0')->format('F Y');

            //tcn details
            $b['tcn'] = $banks[0]->tcnmaster->tcnType;
            $b['month'] = $now;
            $title = $b['tcn']." - ".$b['month'];
            $i=1;
            foreach ($banks as $bank) {
                $a[$i]['SL NO'] = $i;
                $a[$i]['MEMEBER CODE'] = $bank->userId;
                $a[$i]['MEMBER NAME'] = $bank->userName;
                $a[$i]['CLEARENCE DATE'] = '10-02-2017';
                $a[$i]['ACCOUNT NUMBER'] = $bank->bank->accountNumber;
                $a[$i]['IFSC CODE'] = $bank->bank->ifsc;
                $a[$i]['UNIT'] = $bank->unit;
                $a[$i]['AMOUNT'] = $bank->amount;
                $a[$i]['PROFIT PER UNIT'] = $bank->profit;
                $a[$i]['MEMBER FEE'] = $bank->memberFee;
                $a[$i]['TOTAL AMOUNT'] = $bank->total;
                $i++;
            }   $lastcell= 'A3:K'.(1+$i);
            $pagename = 'All details | '.$title;
            Excel::create($pagename, function($excel) use($a,$title,$lastcell){

                $excel->sheet('Sheetname', function($sheet) use($a,$title,$lastcell){
                    $sheet->fromArray($a);
                    $sheet->cell('A1:K1', function($cell) {
                        $cell->setFontSize(11);
                        $cell->setBackground('#7cde9c');
                        $cell->setFontWeight('bold');
                        $cell->setAlignment('center');

                    });
                    $sheet->setFreeze('A2');
                    $sheet->prependRow(1, array(
                        $title
                    ));
                    $sheet->mergeCells('A1:K1');
                    $sheet->cell('A1:K1', function($cell) {
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

        //bank
        if($request->type == 'bank'){
            $banks = benefitgeneration::where([['year',$request->year],['month',$request->month],['tcnType',$request->tcntype]])->get();
            $now = Carbon::create($request->year,$request->month,'2','0','0','0')->format('F Y');
            //tcn details
             $b['tcn'] = $banks[0]->tcnmaster->tcnType;
             $b['month'] = $now;
             $title = $b['tcn']." - ".$b['month'];
            $i=1;
            foreach ($banks as $bank) {
                $a[$i]['SL NO'] = $i;
                $a[$i]['MEMEBER CODE'] = $bank->userId;
                $a[$i]['MEMBER NAME'] = $bank->userName;
                $a[$i]['ACCOUNT NUMBER'] = $bank->bank->accountNumber;
                $a[$i]['IFSC CODE'] = $bank->bank->ifsc;
                $a[$i]['TOTAL AMOUNT'] = $bank->total;
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
            $banks = benefitgeneration::where([['year',$request->year],['month',$request->month],['tcnType',$request->tcntype]])->get();
            $now = Carbon::create($request->year,$request->month,'2','0','0','0')->format('F Y');
            //tcn details
            $b['tcn'] = $banks[0]->tcnmaster->tcnType;
            $b['month'] = $now;
            $title = $b['tcn']." - ".$b['month'];
            $i=1;
            foreach ($banks as $bank) {
                $a[$i]['SL NO'] = $i;
                $a[$i]['MEMEBER CODE'] = $bank->userId;
                $a[$i]['MEMBER NAME'] = $bank->userName;
                $a[$i]['CLEARENCE DATE'] = '10-02-2017';
                $a[$i]['ACCOUNT NUMBER'] = $bank->bank->accountNumber;
                $a[$i]['IFSC CODE'] = $bank->bank->ifsc;
                $a[$i]['UNIT'] = $bank->unit;
                $a[$i]['AMOUNT'] = $bank->amount;
                $a[$i]['PROFIT PER UNIT'] = $bank->profit;
                $a[$i]['MEMBER FEE'] = $bank->memberFee;
                $a[$i]['TOTAL AMOUNT'] = $bank->total;
                $i++;
            }   $lastcell= 'A3:K'.(1+$i);
            $pagename = 'Benefit details | '.$title;
            Excel::create($pagename, function($excel) use($a,$title,$lastcell){

                $excel->sheet('Sheetname', function($sheet) use($a,$title,$lastcell){
                    $sheet->fromArray($a);
                    $sheet->cell('A1:K1', function($cell) {
                        $cell->setFontSize(11);
                        $cell->setBackground('#7cde9c');
                        $cell->setFontWeight('bold');
                        $cell->setAlignment('center');

                    });
                    $sheet->setFreeze('A2');
                    $sheet->prependRow(1, array(
                        $title
                    ));
                    $sheet->mergeCells('A1:K1');
                    $sheet->cell('A1:K1', function($cell) {
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
        //
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
