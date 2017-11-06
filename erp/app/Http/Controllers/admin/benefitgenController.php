<?php

namespace App\Http\Controllers\admin;

use App\tcnmaster;
use App\tcnrequest;
use App\benefitgeneration;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\benefitdeclaration;
use Carbon\Carbon;
use Excel;

class benefitgenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $benefitdeclared = benefitdeclaration::where('status','=','0')->get();
        foreach($benefitdeclared as $benefitdeclareds) {

            $month = $benefitdeclareds->month;
            $year =  $benefitdeclareds->year;

            $month = Carbon::createFromDate($year, $month, '15');
            $benefitdeclareds->ynm = $month->format('F Y');
            $locking = $benefitdeclareds->tcnmaster->lockingDuration;
            $month = $month->subMonths($locking)->toDateString();
            $month = new Carbon($month);
            $benefitdeclareds->benefitto = $month->format('F Y');

        }


        return view('admin.benefit.generate',compact('benefitdeclared'));
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
//         echo $month.'--<br>'.$from.'<br>'.$to;

        $checkgeneration = benefitgeneration::where([['year',$month1->format('Y')],['month',$month1->format('m')],['tcnType',$tcnid]])->first();
        $count = count($checkgeneration);
        if($count==1){
            return 'benefit generated already';
        }

        $tcns = tcnrequest::with('member')->where([['tcn_id',$tcnid],['status','Approved']])->whereBetween('depositeDate',[$from,$to])->get();
        $count = count($tcns);

        $i=0;

        while ($i<$count){

            $benefit = new benefitgeneration;
            $benefit->userId = $tcns[$i]->userId;
            $benefit->userName = $tcns[$i]->member->name;
            $benefit->tcnType =  $tcns[$i]->tcn->id;
            $benefit->currencyType = $ctype = $tcns[$i]->currencyType;
            $benefit->unit = $tcns[$i]->unit;
            $benefit->amount = $tcns[$i]->amount;
            $benefit->year = $month1->format('Y');
            $benefit->month = $month1->format('m');
            $share = benefitdeclaration::where([['year',$month1->format('Y')],['month',$month1->format('m')],['tcnType',$tcns[$i]->tcn->tcnType]])->first();
            $benefit->profit = $share->$ctype;
            $benefit->memberFee = ($tcns[$i]->unit)*50;
            $benefit->total = ($share->$ctype)*($tcns[$i]->unit)-(($tcns[$i]->unit)*50);
            $benefit->bankAccountId = $tcns[$i]->benefitId;
            $benefit->benefitType = 'NORMAL';
            $benefit->save();
            $i++;
        }

        $declared = benefitdeclaration::where([['year',$month1->format('Y')],['month',$month1->format('m')],['tcnType',$tcnid]])->first();
        $declared->status = '1';
        $declared->save();


        return redirect('admin/generate/view');

//        Excel::create('Filename', function($excel) use($tcns){
//
//            $excel->sheet('Sheetname', function($sheet) use($tcns){
//
//                $sheet->fromArray($tcns);
//
//            });
//
//        })->export('xls');


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
