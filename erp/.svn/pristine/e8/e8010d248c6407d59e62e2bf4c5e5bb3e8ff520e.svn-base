<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\tcnmaster;
use App\generateincentive;
use App\IncentiveReports;
use DataTables;
use DB;
use Excel;

class IncentiveController extends Controller
{
    //
    public $lowerUserType;
    public function index(){
     $this->currencyConverter('INR', 'AED', 1);
     $currency= array('INR' =>'1' , 
				    		     'AED'=>$this->currencyConverter('INR', 'AED', 1),
				    		     'USD'=>$this->currencyConverter('INR', 'USD', 1),
				    		     'SAR'=>$this->currencyConverter('INR', 'SAR', 1),
				    		     'CAD'=>$this->currencyConverter('INR', 'CAD', 1));

    	return view('admin.incentive.generateincentive',compact('currency'));

    	//return $converted_currency=$this->currencyConverter('USD', 'INR', 1000);
    }
    public function generate(Request $request){
    	$this->validate($request,[
    'month_year'=>'required',
    'usertype'=>'required',
    ]);
        $month_year=explode('/', $request->month_year);
        $generateincentive_exist = DB::table('generateincentives')->where('employeeType',$request->usertype)
                                           ->whereYear('date_month_year',$month_year[1])
                                           ->whereMonth('date_month_year',$month_year[0])
                                           ->get();
        if(count($generateincentive_exist)>0){
          return response()
                   ->json(['result' =>false,'message'=>'Already Generated']);
        }
        $this->lowerUserType=strtolower($request->usertype);
        //if($request->usertype=='DSA'){
                    $_fetchTCN = DB::table('tcnrequests')
                         ->select('memberregistrations.code','memberregistrations.userId as member_id','memberregistrations.name as member_name','memberregistrations.addedById','memberregistrations.addedByUnder','memberregistrations.addedByUnder','memberregistrations.approvedDate','memberregistrations.mobileNo','memberregistrations.mobileId','tcnrequests.tcn_id','tcnrequests.id as tcn_id','tcnrequests.unit','tcnrequests.amount','tcnrequests.paymentMode','tcnrequests.currencyType','tcnrequests.tcn_id as tcn_master_id','tcnmasters.tcnType','logins.username as dsa_code','dsas.name as dsa_name')
                         ->join('memberregistrations',function($join){
                           $join->on('memberregistrations.userId', '=', 'tcnrequests.userId')->where('memberregistrations.addedByUnder', '=', $this->lowerUserType);
                          })
                         ->join('tcnmasters',function($join){
                           $join->on('tcnmasters.id', '=', 'tcnrequests.tcn_id');
                         })
                         ->join('dsas',function($join){
                           $join->on('dsas.userId', '=', 'memberregistrations.addedById');
                         })
                         ->join('logins',function($join){
                           $join->on('logins.id', '=', 'dsas.userId');
                         })
                         ->where('tcnrequests.status','Approved')
                         ->whereYear('tcnrequests.approvalDate',$month_year[1])
                         ->whereMonth('tcnrequests.approvalDate',$month_year[0])
                         ->orderBy('memberregistrations.addedById', 'asc')
                         ->orderBy('tcnrequests.tcn_id', 'asc')
                         ->get();
            if (count($_fetchTCN)==0) {
                   return response()
                   ->json(['result' =>false,'message'=>'Could not Generate']);
              }
             $_checking_inMR=DB::table('incentivemasters')->where([['employeeType','=',$request->usertype]])->get();
             if(count($_checking_inMR)==0){
              return response()
                   ->json(['result' =>false,'message'=>'Incentive Master Empty']);
             }
             $month_year_convert = $month_year[0].'/01/'.$month_year[1];
             $generateincentive = new generateincentive;
             $generateincentive->date_month_year=date("Y-m-d", strtotime($month_year_convert));
             $generateincentive->employeeType=$request->usertype;
             $generateincentive->save();
             $genrate_id=$generateincentive->id;
             $data=array();
             $dsaData=array();
             $existDSA=0;
             $sum_of_amount=0;
             $dsa_name='';
             $dsa_code='';
             foreach($_fetchTCN as $key => $value) {
              $_inr_amount=$value->amount;
               switch ($value->currencyType) {
                 case 'AED':
                  $_inr_amount= $this->currencyConverter('AED', 'INR', $value->amount);
                   break;
                case 'USD':
                  $_inr_amount= $this->currencyConverter('USD', 'INR', $value->amount);
                   break;
                case 'SAR':
                  $_inr_amount= $this->currencyConverter('SAR', 'INR', $value->amount);
                   break;
                case 'CAD':
                  $_inr_amount= $this->currencyConverter('CAD', 'INR', $value->amount);
                   break;
                 
                default:
                  $_inr_amount= $value->amount;
                   break;
               }

                if($existDSA==$value->addedById || $existDSA==0){
                $sum_of_amount=$sum_of_amount+$_inr_amount;
                $dsaData[]=array(
                  'tableRefference'=>array('tcn_id'=>$value->tcn_id,
                                           'member_id'=>$value->member_id,
                                           'under_by'=>$request->usertype,
                                           'tcn_master_id'=>$value->tcn_master_id),

                  'data'=>array('member_code'=>$value->code,
                                'member_name'=>$value->member_name,
                                'memeber_mobile'=>$value->mobileId.' '.$value->mobileNo,
                                'approval_date'=>$value->approvedDate,
                                'tcn'=>$value->tcnType,
                                'unit'=>$value->unit,
                                'amount'=>$value->amount,
                                'currency_type'=>$value->currencyType,
                                'inr_amount'=>$_inr_amount,
                                'mode'=>$value->paymentMode));
                }else{
                  //\DB::enableQueryLog();
                  $_incentiveMaster=DB::table('incentivemasters')
                 ->where([['fromAmount', '<=', $sum_of_amount],['toAmount','>=',$sum_of_amount],['employeeType','=',$request->usertype]])
                 ->orWhere([['toAmount','=' ,DB::raw("(select max(`toAmount`) from incentivemasters)")],['employeeType','=',$request->usertype]])->limit(1)->get();

                    //dd(DB::getQueryLog());
                  
                  //insert table
                 $reportIncentive=new IncentiveReports;
                 $reportIncentive->generated_id=$genrate_id;
                 $reportIncentive->user_id=$existDSA;
                 $reportIncentive->data=json_encode(array(
                  'under_dsa_id'=>$existDSA,
                  'dsa_name'=>$dsa_name,
                  'dsa_code'=>$dsa_code,
                  'member_details'=>$dsaData,
                  'achieved_amount'=>$sum_of_amount,
                  'target_amount'=>$_incentiveMaster[0]->target,
                  'incentive_per'=>$_incentiveMaster[0]->incentivePercentage,
                  'incentive_amount'=>($_incentiveMaster[0]->incentivePercentage/100)*$sum_of_amount
                  ));
                 $reportIncentive->save();
                 $sum_of_amount=0;
                 unset($dsaData);

                 $sum_of_amount=$sum_of_amount+$_inr_amount;
                 $dsaData[]=array(
                  'tableRefference'=>array('tcn_id'=>$value->tcn_id,
                                           'member_id'=>$value->member_id,
                                           'under_by'=>$request->usertype,
                                           'tcn_master_id'=>$value->tcn_master_id),

                  'data'=>array('member_code'=>$value->code,
                                'member_name'=>$value->member_name,
                                'memeber_mobile'=>$value->mobileId.' '.$value->mobileNo,
                                'approval_date'=>$value->approvedDate,
                                'tcn'=>$value->tcnType,
                                'unit'=>$value->unit,
                                'amount'=>$value->amount,
                                'currency_type'=>$value->currencyType,
                                'inr_amount'=>$_inr_amount,
                                'mode'=>$value->paymentMode));
                  
                }
                $dsa_name=$value->dsa_name;
                $dsa_code=$value->dsa_code;
                $existDSA=$value->addedById;
              
             }
             return response()
                   ->json(['result' =>true,'message'=>'DSA Generated']);
       // }
        
       
    }
    public function report_incentive($id){
      $data= generateincentive::find($id)->first();
      return view('admin.incentive.incentivereports',compact('id','data'));
    }
    public function report_incentive_inner($id){
      $reports = IncentiveReports::select('data','id')
                  ->where('generated_id',$id)
                   ->orderBy('created_at', 'desc');

      return DataTables::of($reports)
            
            ->addColumn('dsa_code', function ($report) {
                 $data=json_decode($report->data);
                return $data->dsa_code; })
            ->addColumn('dsa_name', function ($report) {
              $data=json_decode($report->data);
                return $data->dsa_name; })
            ->addColumn('target_amount', function ($report) {
              $data=json_decode($report->data);
                return $data->target_amount; })
            ->addColumn('achieved_amount', function ($report) {
              $data=json_decode($report->data);
                return $data->achieved_amount; })
            ->addColumn('incentive_per', function ($report) {
              $data=json_decode($report->data);
                return $data->incentive_per; })
            ->addColumn('incentive_amount', function ($report) {
              $data=json_decode($report->data);
                return $data->incentive_amount; })
            ->addColumn('action', function ($report) {
                return '<div class="dropdown" style="min-width: 150px;">
    <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
    <span class="caret"></span></button>
    <ul class="dropdown-menu">
      <li><a href="#view-'.$report->id.'" data-id="'.$report->id.'"  class="report-btn-view"><i class="glyphicon glyphicon-eye-open"></i> View Report</a></li>
      <li><a href="#excel-'.$report->id.'" data-id="'.$report->id.'"  class="report-btn-excel"><i class="glyphicon glyphicon-file"></i> Download Excel</a></li>
    </ul>
  </div>';  })

            ->make(true);
    }
    public function currencyConverter($from_Currency,$to_Currency,$amount) {
		 $from_Currency = urlencode($from_Currency);
     $from_Currency = urlencode($from_Currency);
		 $to_Currency = urlencode($to_Currency);
		 $encode_amount = $amount;
		 $get = file_get_contents("https://finance.google.com/finance/converter?a=".$encode_amount."&from=".$from_Currency."&to=".$to_Currency);
		$get = explode("<span class=bld>",$get);
		$get = explode("</span>",$get[1]);
		$converted_currency = preg_replace("/[^0-9\.]/", null, $get[0]);
		return $converted_currency;
	 }
    public function anyData()
    {
         $reports = generateincentive::select('id', DB::raw('DATE_FORMAT(date_month_year, "%M/%Y") as created_date'), 'employeeType', DB::raw('DATE_FORMAT(created_at, "%d/%m/%Y") as created_at_re'), 'updated_at')
                   ->orderBy('created_at', 'desc');

        return DataTables::of($reports)
            ->addColumn('action', function ($report) {
                return '<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="#excel-'.$report->id.'" data-id="'.$report->id.'" class="report-btn-view"><i class="glyphicon glyphicon-eye-open"></i> View Report</a></li>
    <li><a href="#excel-'.$report->id.'" data-id="'.$report->id.'" class="report-btn-excel"><i class="glyphicon glyphicon-file"></i> Download Excel</a></li>
  </ul>
</div>';  })
            ->make(true);
    }
    public function report_incentive_dsa(Request $request){
      $data= IncentiveReports::where('id',$request->report_id)->first();

     return response()
                   ->json(json_decode($data));
    }
    public function AllDSAdownloadExcel($id){
       ob_end_clean();
       ob_start();
       $reports = generateincentive::find($id)->first();
       $datas= IncentiveReports::where('generated_id',$id)->get();
       $title=$reports->created_at->format('d/m/Y');
       $excelData=array();
       
       $i=1;
       foreach ($datas as $data) {
                 $dsa=json_decode($data->data);

                 $excelData[$i]['SlNo'] = $i;
                 $excelData[$i]['DSA Name'] = $dsa->dsa_name;
                  $excelData[$i]['DSA Code'] = $dsa->dsa_code;
                 $excelData[$i]['Target'] = $dsa->target_amount;
                $excelData[$i]['Achieved'] = $dsa->achieved_amount;
                $excelData[$i]['Inc %'] = $dsa->incentive_per;
                $excelData[$i]['Incentive'] = $dsa->incentive_amount;
                $excelData[$i]['Extra Comsn'] = '';
                $excelData[$i]['Total'] = $dsa->incentive_amount;
                $excelData[$i]['Direct'] = 'Yes';
                $i++;
            }  
             $lastcell= 'A3:K'.(1+$i);
            $pagename = 'DSA Incentive'.'-'.$title;

     Excel::create($pagename, function($excel) use ($excelData,$pagename,$lastcell) {
      $excel->sheet('mySheet', function($sheet) use ($excelData,$pagename,$lastcell)
          {
        $sheet->fromArray($excelData);
        $sheet->cell('A1:K1', function($cell) {
                        $cell->setFontSize(11);
                        $cell->setBackground('#7cde9c');
                        $cell->setFontWeight('bold');
                        $cell->setAlignment('center');

                    });
                    $sheet->setFreeze('A2');
                    $sheet->prependRow(1, array(
                        $pagename
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
    })->download('xls');
     return redirect('/admin/generate_incentive');
    }
    public function IDSAdownloadExcel($id){
       ob_end_clean();
       ob_start();
       $datas= IncentiveReports::where('id',$id)->first();
       $generated_id=$datas->generated_id;
       $title=$datas->created_at->format('d/m/Y');
       $datas=json_decode($datas->data);
       $excelData=array();
       
       $i=1;
       foreach ($datas->member_details as $data) {
                 $excelData[$i]['SlNo'] = $i;
                 $excelData[$i]['TCN'] = $data->data->tcn;
                  $excelData[$i]['MEMBER CODE'] = $data->data->member_code;
                 $excelData[$i]['DATE'] = date("d/m/Y", strtotime($data->data->approval_date));
                $excelData[$i]['NAME'] = $data->data->member_name;
                $excelData[$i]['AMOUNT'] = $data->data->amount;
                $excelData[$i]['AMOUNT (INR)'] = $data->data->inr_amount;
                $excelData[$i]['CURRENCY'] = $data->data->currency_type;
                $excelData[$i]['MODE'] = $data->data->mode;
                $excelData[$i]['MOBILE'] = $data->data->memeber_mobile;
                $i++;
            }  
             $lastcell= 'A3:K'.(1+$i);
            $pagename = $datas->dsa_code.'-'.$title;

     Excel::create($pagename, function($excel) use ($excelData,$pagename,$lastcell) {
      $excel->sheet('mySheet', function($sheet) use ($excelData,$pagename,$lastcell)
          {
        $sheet->fromArray($excelData);
        $sheet->cell('A1:K1', function($cell) {
                        $cell->setFontSize(11);
                        $cell->setBackground('#7cde9c');
                        $cell->setFontWeight('bold');
                        $cell->setAlignment('center');

                    });
                    $sheet->setFreeze('A2');
                    $sheet->prependRow(1, array(
                        $pagename
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
    })->download('xls');
     return redirect('/admin/report_incentive/'.$generated_id);
    }
}


    
