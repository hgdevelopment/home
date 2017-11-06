<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\benefitdeclaration;
use App\tcnmaster;
use Carbon\Carbon;
use App\tcnrequest;
use Maatwebsite\Excel;

class benefitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { 
        $tcnmaster = tcnmaster::all();
        $now = Carbon::now();
        $month = $now->format('m');
        $year = $now->format('Y');
         $month = Carbon::createFromDate(null, $month, '15');
         $month->subMonths(2)->toDateString();

//        \DB::enableQueryLog();
        $tcnrequest = tcnrequest::where('status','=','Approved')
            ->whereMonth('approvedDate','=',$month)
            ->whereYear('approvedDate','=',$year)->get();
//        dd(\DB::getQueryLog());

        $tc = tcnrequest::find(9);
        return view('admin.benefit.benefit',compact('tcnmaster','tc','tcnrequest'));



        Excel::create('Filename', function($excel) {

            // Set the title
            $excel->setTitle('Our new awesome title');

            // Chain the setters
            $excel->setCreator('Maatwebsite')
                ->setCompany('Maatwebsite');

            // Call them separately
            $excel->setDescription('A demonstration to change the file properties');

        })->download('xls');

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

    $check = benefitdeclaration::all()
        ->where('year',$request->year_name)
        ->where('month',$request->month_name)
        ->where('tcnType',$request->schemevalue);

   $count = count($check);
  if($count==0){

        $ben = new benefitdeclaration;

        $ben->year = $request->year_name;
        $ben->month = $request->month_name;
        $ben->tcnType = $request->schemevalue;
        $ben->INR = $request->inr;
        $ben->AED = $request->aed;
        $ben->USD = $request->usd;
        $ben->SAR = $request->sar;
        $ben->CAD = $request->cad;
        $ben->save();



        
        }
else{

    return "Alreasy benefit Added";
}

         return redirect('admin/benefit/viewBenefit');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)

    {
       
        $tcnmaster = tcnmaster::all();
        $value = $request->tcntype;
        $benefit = benefitdeclaration::all()->where('tcnType',$value);
        return view('admin.benefit.viewBenefit',compact('value','benefit','tcnmaster'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $tcnmaster = tcnmaster::all();
       $benefit = benefitdeclaration::all();
       $editbenefit = benefitdeclaration::find($id);
       return view('admin.benefit.editBenefit',compact('benefit','editbenefit','tcnmaster'));
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
       
        $ben = benefitdeclaration::find($id);
        $ben->year = $request->year_name;
        $ben->month = $request->month_name;
        $ben->tcnType = $request->schemevalue;
        $ben->INR = $request->inr;
        $ben->AED = $request->aed;
        $ben->USD = $request->usd;
        $ben->SAR = $request->sar;
        $ben->CAD = $request->cad;
        $ben->save();
        return redirect('admin/benefit/viewBenefit');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
     {
        $benefit = benefitdeclaration::find($id);
        $benefit->delete();
        return redirect('/viewBenefit');
    }



}
