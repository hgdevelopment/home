<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use App\tcnmaster;
use App\generateincentive;
use App\IncentiveReports;
use App\dsa;
use DataTables;
use DB;
use Excel;

class IncentiveController extends Controller
{
    //
    public $lowerUserType;

    public $__DSA;
    public $__ME;
    public $__incentive_generated_id;
    public $__usertype=false;

    public function index(){
     $currency= array('INR' =>'1' , 
                     'AED'=>$this->__currencyConverter('INR', 'AED', 1),
                     'USD'=>$this->__currencyConverter('INR', 'USD', 1),
                     'SAR'=>$this->__currencyConverter('INR', 'SAR', 1),
                     'CAD'=>$this->__currencyConverter('INR', 'CAD', 1));

      return view('admin.incentive.generateincentive',compact('currency'));

      //return $converted_currency=$this->currencyConverter('USD', 'INR', 1000);
    }
    public function generate(Request $request){
       $this->validate($request,[
        'month_year'=>'required'
        ]);
        $month_year=explode('/', $request->month_year);
        $month_year_convert = $month_year[0].'/01/'.$month_year[1];
        $already_gen = generateincentive::whereYear('date_month_year',$month_year[1])
                         ->whereMonth('date_month_year',$month_year[0])->count();
        if($already_gen>0){
          return response()
             ->json(['result' =>false,'message'=>'Already Generated']);
        }
        $__ME_SELECT=DB::table('dsas')
                        ->join('logins',function($join){
                           $join->on('logins.id', '=', 'dsas.userId')
                           ->where('logins.status', '=', 'Active')
                           ->where('logins.userType', '=', 'ME');
                          })
                        ->get();
        if (count($__ME_SELECT)==0) {
             return response()
             ->json(['result' =>false,'message'=>'Could not Generate']);
         }
         $month_year_convert = $month_year[0].'/01/'.$month_year[1];
         $generateincentive = new generateincentive;
         $generateincentive->date_month_year=date("Y-m-d", strtotime($month_year_convert));
         $generateincentive->employeeType='ME';
         $generateincentive->save();
         $genrate_id=$generateincentive->id;
        //ME  
         $this->__usertype=true;
          foreach ($__ME_SELECT as $key => $value) {
               $this->__ME=$value;
               $__DSA_SELECT=DB::table('dsas')
                        ->join('logins',function($join){
                           $join->on('logins.id', '=', 'dsas.userId')
                           ->where('logins.status', '=', 'Active')
                           ->where('logins.userType', '=', 'DSA');
                          })
                        ->where('dsas.addedById',$value->userId)
                        ->get();
                 foreach ($__DSA_SELECT as $key1 => $value1) {
                   $this->__DSA=$value1;
                   $memer=$this->__members_select($value1->userId,$month_year);
                    //insert table
                   $reportIncentive=new IncentiveReports;
                   $reportIncentive->generated_id=$genrate_id;
                   $reportIncentive->user_id=$value->userId;
                   $reportIncentive->usertype='ME';
                   $reportIncentive->under='DSA';
                   $reportIncentive->data=json_encode($memer);
                   $reportIncentive->save();

                 }
                
               $memer=$this->__members_select($value->userId,$month_year);
                //insert table
               $reportIncentive=new IncentiveReports;
               $reportIncentive->generated_id=$genrate_id;
               $reportIncentive->user_id=$value->userId;
               $reportIncentive->usertype='ME';
               $reportIncentive->under='ME';
               $reportIncentive->data=json_encode($memer);
               $reportIncentive->save();
          }


         $__DSA_SELECT=DB::table('dsas')
                        ->join('logins',function($join){
                           $join->on('logins.id', '=', 'dsas.userId')
                           ->where('logins.status', '=', 'Active')
                           ->where('logins.userType', '=', 'DSA');
                          })
                        ->get();

         $generateincentive = new generateincentive;
         $generateincentive->date_month_year=date("Y-m-d", strtotime($month_year_convert));
         $generateincentive->employeeType='DSA';
         $generateincentive->save();
         $genrate_id=$generateincentive->id;
        //DSA  
         $this->__usertype=false;
          foreach ($__DSA_SELECT as $key => $value) {
               $this->__DSA=$value;
               $memer=$this->__members_select($value->userId,$month_year);
                //insert table
               $reportIncentive=new IncentiveReports;
               $reportIncentive->generated_id=$genrate_id;
               $reportIncentive->user_id=$value->userId;
               $reportIncentive->usertype='DSA';
               $reportIncentive->under='MYSELF';
               $reportIncentive->data=json_encode($memer);
               $reportIncentive->save();
          }
          return response()
                   ->json(['result' =>true,'message'=>'Incentive Generated']);



       
        
       
    }
    public function __members_select($id,$month_year){
           if($id==''){
            return array();
            }

       $__TCN_SELECT= DB::table('tcnrequests')
                         ->select('memberregistrations.code','memberregistrations.userId as member_id','memberregistrations.name as member_name','memberregistrations.addedById','memberregistrations.addedByUnder','memberregistrations.approvedDate','memberregistrations.mobileNo','memberregistrations.mobileId','tcnrequests.tcn_id','tcnrequests.id as tcn_id','tcnrequests.unit','tcnrequests.amount','tcnrequests.paymentMode','tcnrequests.currencyType','tcnrequests.inrAmount','tcnrequests.tcn_id as tcn_master_id','tcnmasters.tcnType')
                         ->join('memberregistrations',function($join) use ($id){
                           $join->on('memberregistrations.userId', '=', 'tcnrequests.userId')
                                 ->where('memberregistrations.addedById', '=', $id);
                          })
                         ->join('tcnmasters',function($join){
                           $join->on('tcnmasters.id', '=', 'tcnrequests.tcn_id');
                         })
                         ->where('tcnrequests.status','Approved')
                         ->whereYear('tcnrequests.approvalDate',$month_year[1])
                         ->whereMonth('tcnrequests.approvalDate',$month_year[0])
                         ->orderBy('memberregistrations.addedById', 'asc')
                         ->orderBy('tcnrequests.tcn_id', 'asc')
                         ->get();
                         $month_year_convert = $month_year[0].'/01/'.$month_year[1];
                         $data=array();
                         foreach($__TCN_SELECT as $key => $value) {
                             $_inr_amount=0;
                             switch ($value->currencyType) {
                              case 'AED':
                                $_inr_amount= $value->inrAmount;
                                 break;
                              case 'USD':
                                $_inr_amount= $value->inrAmount;
                                 break;
                              case 'SAR':
                                $_inr_amount= $value->inrAmount;
                                 break;
                              case 'CAD':
                                $_inr_amount= $value->inrAmount;
                                 break;
                               
                              default:
                                $_inr_amount= $value->inrAmount;
                                 break;
                             }


                            $data[]=array('member_code'=>$value->code,
                                              'member_name'=>$value->member_name,
                                              'memeber_mobile'=>$value->mobileId.' '.$value->mobileNo,
                                              'approval_date'=>$value->approvedDate,
                                              'tcn'=>$value->tcnType,
                                              'unit'=>$value->unit,
                                              'amount'=>$value->amount,
                                              'currency_type'=>$value->currencyType,
                                              'inr_amount'=>$_inr_amount,
                                              'mode'=>$value->paymentMode,
                                              'agent'=>array('direct'=>($this->__DSA->addedByUnder=='MYSELF')?'YES':'NO','usertype'=>$this->__DSA->userType,'dsaname'=>$this->__DSA->name,'code'=>$this->__DSA->username,'user_id'=>$this->__DSA->userId));
                         }
                         if($this->__usertype==true){

                          return array('user_id'=>$this->__ME->userId,'code'=>$this->__ME->username,'name'=>$this->__ME->name,'usertype' => $this->__ME->userType,'members'=> $data);

                         }else{
                          return array('user_id'=>$this->__DSA->userId,'code'=>$this->__DSA->username,'name'=>$this->__DSA->name,'usertype' => $this->__DSA->userType,'members'=> $data);
                         }

              
     }

    public function report_incentive($id){
        $data= generateincentive::where('id',$id)->first();
      return view('admin.incentive.incentivereports',compact('id','data'));
    }
    public function json_members_sum($data){
              $sum_of_amount=0;
              foreach ($data->members as $key => $value) {
                  $sum_of_amount=$sum_of_amount+$value->inr_amount;
              }
       return  $sum_of_amount;

    }
    public function json_members_sum_me($id,$user_id){
      $datas= IncentiveReports::where('generated_id',$id)
              ->where('usertype','ME')
              ->where('user_id',$user_id)
              ->get();
              $me_under_amount=0;
              $dsa_under_amount=0;
              foreach ($datas as $data) {
                    $dsa=json_decode($data->data);
                    foreach ($dsa->members as $key => $value) {
                      if($data->under=='DSA'){
                        $dsa_under_amount=$dsa_under_amount+$value->inr_amount;
                      }else{
                        $me_under_amount=$me_under_amount+$value->inr_amount;
                      }
                    }
                }
        return array('me_sum' => $me_under_amount,'dsa_sum'=> $dsa_under_amount);
    }
    public function get_target($amount,$userType){
        //DB::enableQueryLog();
       return  $_incentiveMaster=DB::table('incentivemasters')
                 ->where([['fromAmount', '<=', $amount],['toAmount','>=',$amount],['employeeType','=',$userType]])
                 ->orWhere([['toAmount','=' ,DB::raw("(select max(`toAmount`) from incentivemasters where employeeType='$userType')")],['employeeType','=',$userType]])->limit(1)->get();
        //   dd(
        //     DB::getQueryLog()
        // );
    }
    public function report_incentive_inner_me($id){
       $datas_group=IncentiveReports::where('generated_id',$id)
              ->where('usertype','ME')
              ->groupBy('user_id');

              return DataTables::of($datas_group)
            ->addColumn('me_code', function ($report) {
                 $data=json_decode($report->data);
                return $data->code; })
            ->addColumn('me_name', function ($report) {
              $data=json_decode($report->data);
                return $data->name; })
            ->addColumn('target', function ($report) use($id) {
                $amout=$this->json_members_sum_me($id,$report->user_id);
                $target=$this->get_target(($amout['me_sum']+$amout['dsa_sum']),'ME');
                return $target[0]->target; })
            ->addColumn('achieved_me', function ($report) use($id) {
                $amout=$this->json_members_sum_me($id,$report->user_id);
                return $amout['me_sum']; })
            ->addColumn('achieved_dsa', function ($report) use($id) {
              $amout=$this->json_members_sum_me($id,$report->user_id);
                return $amout['dsa_sum']; })
            ->addColumn('incentive_per_dsa', function ($report) use($id) {
              $amout=$this->json_members_sum_me($id,$report->user_id);
                return ((0.5/100)*$amout['dsa_sum']); })
            ->addColumn('incentive_per_me', function ($report) use($id) {
              $amout=$this->json_members_sum_me($id,$report->user_id);
              $target=$this->get_target(($amout['me_sum']+$amout['dsa_sum']),'ME');
              return $target[0]->incentivePercentage; })
            ->addColumn('incentive_me_amt', function ($report) use($id) {
              $amout=$this->json_members_sum_me($id,$report->user_id);
              $target=$this->get_target(($amout['me_sum']+$amout['dsa_sum']),'ME');
                return (($target[0]->incentivePercentage/100)*($amout['dsa_sum']+$amout['me_sum'])); })
            ->addColumn('salary', function ($report) use($id) {
                $amout=$this->json_members_sum_me($id,$report->user_id);
                $target=$this->get_target(($amout['me_sum']+$amout['dsa_sum']),'ME');
                return $target[0]->salary; })
            ->addColumn('action', function ($report) {
                return '<div class="dropdown" style="min-width: 150px;">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                          <li><a href="#view-'.$report->id.'" data-id="'.$report->id.'" data-gen="'.$report->generated_id.'" data-u="'.$report->user_id.'" class="report-btn-view"><i class="glyphicon glyphicon-eye-open"></i> View Report</a></li>
                          <li><a href="#excel-'.$report->id.'" data-id="'.$report->id.'" data-gen="'.$report->generated_id.'" data-u="'.$report->user_id.'"  class="report-btn-excel"><i class="glyphicon glyphicon-file"></i> Download Excel</a></li>
                        </ul>
                      </div>';  })

            ->make(true);
    }
    //DSA
    public function report_incentive_inner($id){
      $reports = IncentiveReports::where('generated_id',$id)
                  ->where('usertype','DSA')
                  ->orderBy('user_id', 'desc');



      return DataTables::of($reports)
            ->addColumn('dsa_code', function ($report) {
                 $data=json_decode($report->data);
                return $data->code; })
            ->addColumn('dsa_name', function ($report) {
              $data=json_decode($report->data);
                return $data->name; })
            ->addColumn('target_amount', function ($report) {
              $data=json_decode($report->data);
              $achive=$this->json_members_sum($data);
              $target=$this->get_target($achive,'DSA');
                return $target[0]->target; })
            ->addColumn('achieved_amount', function ($report) {
              $data=json_decode($report->data);
                return $this->json_members_sum($data); })
            ->addColumn('incentive_per', function ($report) {
              $data=json_decode($report->data);
              $achive=$this->json_members_sum($data);
              $target=$this->get_target($achive,'DSA');
                return $target[0]->incentivePercentage; })
            ->addColumn('incentive_amount', function ($report) {
              $data=json_decode($report->data);
              $achive=$this->json_members_sum($data);
              $target=$this->get_target($achive,'DSA');
              $amount=(($target[0]->incentivePercentage/100)*$achive);
                return $amount; })
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
    public function __currencyConverter($from_Currency,$to_Currency,$amount) {
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
              $_class='dsa';
              if($report->employeeType=='ME'){
               $_class='me';
              }
                return '<div class="dropdown">
  <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Action
  <span class="caret"></span></button>
  <ul class="dropdown-menu">
    <li><a href="#excel-'.$report->id.'" data-id="'.$report->id.'" class="report-btn-view"><i class="glyphicon glyphicon-eye-open"></i> View Report</a></li>
    <li><a href="#excel-'.$report->id.'" data-id="'.$report->id.'" class="report-btn-excel-'.$_class.'"><i class="glyphicon glyphicon-file"></i> Download Excel</a></li>
  </ul>
</div>';  })
            ->make(true);
    }
    public function report_incentive_dsa(Request $request){
      $data= IncentiveReports::where('id',$request->report_id)->first();

     return response()
                   ->json(json_decode($data));
    }
    public function report_incentive_me(Request $request){
      $data= IncentiveReports::where('generated_id',$request->_gen)
                            ->where('usertype','ME')
                            ->where('user_id',$request->_u)
                            ->groupBy('user_id')
                            ->get();
      $me_json= array();
      $dsa_achive=0;
      $me_achieve=0;
      $me_name='';
      foreach ($data as $key => $value) {
         $data_me= IncentiveReports::where('user_id',$value->user_id)
                            ->get();
                $data_json=json_decode($value->data);
                 foreach ($data_me as $key1 => $value1) {
                  $dsa_json=json_decode($value1->data);
                    foreach ($dsa_json->members as $key2 => $value2) {
                      if($value1->under=='DSA'){
                         $dsa_achive=$dsa_achive+$value2->inr_amount;
                      }else{
                         $me_achieve=$me_achieve+$value2->inr_amount;
                      }
                      $me_json[]= array('tcn' => $value2->tcn,
                                     'member_code'=>$value2->member_code, 
                                     'member_name'=>$value2->member_name, 
                                     'date'=>$value2->approval_date,
                                     'amount'=>$value2->amount,
                                     'currenncy'=>$value2->currency_type,
                                     'inr_amount'=>$value2->inr_amount,
                                     'mode'=>$value2->mode,
                                     'mobile'=>$value2->memeber_mobile,
                                     'dsa'=>($value1->under=='DSA')?$value2->agent->dsaname.'('.$value2->agent->code.')':'',
                                     'intro'=>($value1->under=='DSA')?'YES':'NO'
                                     );
                    }
                 }
         $me_name=$data_json->name.'('.$data_json->code.')';
      }
      $target= $this->get_target(($me_achieve+$dsa_achive),'ME');
      $me_incentive=($target[0]->incentivePercentage/100)*($me_achieve+$dsa_achive);
      $dsa_incentive=(0.5/100)*$dsa_achive;
      $_array_data= array('name'=>$me_name,
                          'me_incentive' => number_format($me_incentive,2), 
                          'dsa_incentive'=>number_format($dsa_incentive,2),
                          'achieve_me'=>number_format($me_achieve,2),
                          'achive_dsa'=>number_format($dsa_achive,2),
                          'target_per'=>$target[0]->incentivePercentage,
                          'salary'=>$target[0]->salary,
                          'total'=>number_format(($dsa_achive+$me_incentive+$target[0]->salary),2),
                          'data'=>$me_json);
     return response()
                   ->json($_array_data);
    }
    
    public function IMEdownloadExcel($id,$u,$g){
      ob_end_clean();
       ob_start();
           $data= IncentiveReports::where('generated_id',$g)
                            ->where('usertype','ME')
                            ->where('user_id',$u)
                            ->groupBy('user_id')
                            ->get();
      $title='';
      $excelData=array();
      $i=1;
      $dsa_achive=0;
      $me_achieve=0;
      $me_name='';
      foreach ($data as $key => $value) {
       $title= $value->created_at->format('d/m/Y');
         $data_me= IncentiveReports::where('user_id',$value->user_id)
                            ->get();
                $data_json=json_decode($value->data);
                 foreach ($data_me as $key1 => $value1) {
                  $dsa_json=json_decode($value1->data);
                    foreach ($dsa_json->members as $key2 => $value2) {
                      if($value1->under=='DSA'){
                         $dsa_achive=$dsa_achive+$value2->inr_amount;
                      }else{
                         $me_achieve=$me_achieve+$value2->inr_amount;
                      }
                                $excelData[$i]['SlNo'] = $i;
                                $excelData[$i]['TCN'] = $value2->tcn;
                                $excelData[$i]['MEMBER CODE'] = $value2->member_code;
                                $excelData[$i]['DATE'] = date('d-m-Y',strtotime($value2->approval_date));
                                $excelData[$i]['NAME'] = $value2->member_name;
                                $excelData[$i]['AMOUNT'] = $value2->amount;
                                $excelData[$i]['CURRENCY'] = $value2->currency_type;
                                $excelData[$i]['AMOUNT(INR)']=$value2->inr_amount;
                                $excelData[$i]['MODE'] = $value2->mode;
                                $excelData[$i]['MOBILE'] = $value2->memeber_mobile;
                                $excelData[$i]['DSA'] = ($value1->under=='DSA')?$value2->agent->dsaname.'('.$value2->agent->code.')':'';
                                $excelData[$i]['INTRO 0.5%'] = ($_incentiveMaster[0]->salary+round($totalAmt));
                                $excelData[$i]['Remarks'] = ($value1->under=='DSA')?'YES':'NO';
                                $i++;
                    }
                 }
         $me_name=$data_json->name.'('.$data_json->code.')';
      }
      $target= $this->get_target(($me_achieve+$dsa_achive),'ME');
      $me_incentive=($target[0]->incentivePercentage/100)*($me_achieve+$dsa_achive);
      $dsa_incentive=(0.5/100)*$dsa_achive;
      $_array_data= array('name'=>$me_name,
                          'me_incentive' => number_format($me_incentive,2), 
                          'dsa_incentive'=>number_format($dsa_incentive,2),
                          'achieve_me'=>number_format($me_achieve,2),
                          'achive_dsa'=>number_format($dsa_achive,2),
                          'target_per'=>$target[0]->incentivePercentage,
                          'salary'=>number_format($target[0]->salary),
                          'total'=>number_format(($dsa_incentive+$me_incentive+$target[0]->salary),2));
      
            $lastcell= 'A3:M'.(1+$i);
            $pagename = $me_name.'-'.$title;
  
     Excel::create($pagename, function($excel) use ($excelData,$pagename,$lastcell,$_array_data) {
      $excel->sheet('mySheet', function($sheet) use ($excelData,$pagename,$lastcell,$_array_data)
          {
        $sheet->fromArray($excelData);
        $sheet->cell('A1:M1', function($cell) {
                        $cell->setFontSize(11);
                        $cell->setBackground('#7cde9c');
                        $cell->setFontWeight('bold');
                        $cell->setAlignment('center');

                    });
                    $sheet->setFreeze('A2');
                    $sheet->prependRow(1, array(
                        $pagename
                    ));
                    $sheet->mergeCells('A1:M1');
                    $sheet->cell('A1:M1', function($cell) {
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

                    $sheet->appendRow(array('','','','','','',
                        'Achieve(ME)',$_array_data['achieve_me']
                    ));
                     $sheet->appendRow(array('','','','','','',
                        'Achieve(DSA)',$_array_data['achive_dsa']
                    ));
                    $sheet->appendRow(array('','','','','','',
                        'Incentive(ME-'.$_array_data['target_per'].'%)',$_array_data['me_incentive']
                    ));
                    $sheet->appendRow(array('','','','','','',
                        'Incentive(DSA-0.5%)',$_array_data['dsa_incentive']
                    ));
                    $sheet->appendRow(array('','','','','','',
                        'Salary(ME)',$_array_data['salary']
                    ));
                    $sheet->appendRow(array('','','','','','',
                        'Total(Amt)',$_array_data['total']
                    ));
          });
    })->download('xls');

    }
    public function AllMEdownloadExcel($id){
      ob_end_clean();
       ob_start();
       $reports = generateincentive::where('id',$id)->first();
       
       $datas_group=IncentiveReports::where('generated_id',$id)
              ->where('usertype','ME')
              ->groupBy('user_id')
              // ->select('user_id')
              ->get();   
       $title=$reports->created_at->format('d/m/Y');
       $excelData=array();
       $i=1;
       $achieve_amount_me=0;
       $me_userId=0;
       foreach ($datas_group as $key => $me) {
         $datas= IncentiveReports::where('generated_id',$id)
              ->where('usertype','ME')
              ->where('user_id',$me->user_id)
              ->get();
              $me_under_amount=0;
              $dsa_under_amount=0;
          foreach ($datas as $data) {
                $dsa=json_decode($data->data);
                foreach ($dsa->members as $key => $value) {
                  if($data->under=='DSA'){
                    $dsa_under_amount=$dsa_under_amount+$value->inr_amount;
                  }else{
                    $me_under_amount=$me_under_amount+$value->inr_amount;
                  }
                }
            }
            $_incentiveMaster=$this->get_target(($me_under_amount+$dsa_under_amount),'ME');
                $me_data=json_decode($me->data);
                $excelData[$i]['SlNo'] = $i;
                $excelData[$i]['Name'] = $me_data->name;
                $excelData[$i]['Code'] = $me_data->code;
                $excelData[$i]['Target'] = $_incentiveMaster[0]->target;
                $excelData[$i]['Achieved (ME)'] = $me_under_amount;
                $excelData[$i]['Achieved (DSA)'] = $dsa_under_amount;
                $excelData[$i]['Incentive (DSA-0.5%)'] = round((0.5/100)*$dsa_under_amount);
                $excelData[$i]['Incentive (ME-%)']=$_incentiveMaster[0]->incentivePercentage;
                $excelData[$i]['Incentive (ME-Amt)'] = round(($_incentiveMaster[0]->incentivePercentage/100)*($me_under_amount+$dsa_under_amount));
                $totalAmt=(($_incentiveMaster[0]->incentivePercentage/100)*$me_under_amount+(0.5/100)*$dsa_under_amount);
                $excelData[$i]['Incentive (Total)'] = round($totalAmt);
                $excelData[$i]['Salary'] = $_incentiveMaster[0]->salary;
                $excelData[$i]['Total'] = ($_incentiveMaster[0]->salary+round($totalAmt));
                $excelData[$i]['Remarks'] = '';
                $i++;
          }  
             $lastcell= 'A3:M'.(1+$i);
            $pagename = 'ME Intro Incentive(All)'.'-'.$title;

     Excel::create($pagename, function($excel) use ($excelData,$pagename,$lastcell) {
      $excel->sheet('mySheet', function($sheet) use ($excelData,$pagename,$lastcell)
          {
        $sheet->fromArray($excelData);
        $sheet->cell('A1:M1', function($cell) {
                        $cell->setFontSize(11);
                        $cell->setBackground('#7cde9c');
                        $cell->setFontWeight('bold');
                        $cell->setAlignment('center');

                    });
                    $sheet->setFreeze('A2');
                    $sheet->prependRow(1, array(
                        $pagename
                    ));
                    $sheet->mergeCells('A1:M1');
                    $sheet->cell('A1:M1', function($cell) {
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
    public function AllDSAdownloadExcel($id){
       ob_end_clean();
       ob_start();
       $reports = generateincentive::find($id)->first();
       $datas= IncentiveReports::where('generated_id',$id)
              ->where('usertype','DSA')
              ->orderBy('user_id', 'asc')
              ->get();
       $title=$reports->created_at->format('d/m/Y');
       $excelData=array();
       
       $i=1;
       foreach ($datas as $data) {
                 $dsa=json_decode($data->data);
                $sum_of_amount=$this->json_members_sum($dsa);
                $_incentiveMaster=$this->get_target($sum_of_amount,'DSA');

                $excelData[$i]['SlNo'] = $i;
                $excelData[$i]['DSA Name'] = $dsa->name;
                $excelData[$i]['DSA Code'] = $dsa->code;
                $excelData[$i]['Target'] = $_incentiveMaster[0]->target;
                $excelData[$i]['Achieved'] = $sum_of_amount;
                $excelData[$i]['Incentive (%)'] = $_incentiveMaster[0]->incentivePercentage;
                $excelData[$i]['Incentive'] = ($_incentiveMaster[0]->incentivePercentage/100)*$sum_of_amount;
                $excelData[$i]['Salary'] = '0';
                $excelData[$i]['Total'] = ($_incentiveMaster[0]->incentivePercentage/100)*$sum_of_amount;
                $excelData[$i]['Direct'] = ($data->under=='MYSELF')?'YES':'NO';
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
     //return redirect('/admin/generate_incentive');
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
       $totalAmout=0;
       foreach ($datas->members as $data) {
                $excelData[$i]['SlNo'] = $i;
                $excelData[$i]['TCN'] = $data->tcn;
                $excelData[$i]['IBG CODE'] = $data->member_code;
                $excelData[$i]['MEMBER NAME'] = $data->member_name;
                $excelData[$i]['DATE'] = date("d/m/Y", strtotime($data->approval_date));
                $excelData[$i]['AMOUNT'] = $data->amount;
                $excelData[$i]['AMOUNT (INR)'] = $data->inr_amount;
                $excelData[$i]['CURRENCY'] = $data->currency_type;
                $excelData[$i]['MODE'] = $data->mode;
                $excelData[$i]['MOBILE'] = $data->memeber_mobile;
                $totalAmout=$totalAmout+$data->inr_amount;
                $i++;
               }
                $excelData[$i]['SlNo'] = '';
                $excelData[$i]['TCN'] = '';
                $excelData[$i]['IBG CODE'] = '';
                $excelData[$i]['MEMBER NAME'] = '';
                $excelData[$i]['DATE'] = '';
                $excelData[$i]['AMOUNT'] = 'Total Amount:';
                $excelData[$i]['AMOUNT (INR)'] = $totalAmout;
                $excelData[$i]['CURRENCY'] = '';
                $excelData[$i]['MODE'] = '';
                $excelData[$i]['MOBILE'] = '';
                $i++;  

            $lastcell= 'A3:K'.(1+$i);
            $pagename = $datas->name.'('.$datas->code.')-'.$title;

     Excel::create($pagename, function($excel) use ($excelData,$pagename,$lastcell,$totalAmout) {
      $excel->sheet('mySheet', function($sheet) use ($excelData,$pagename,$lastcell,$totalAmout)
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
     //return redirect('/admin/report_incentive/'.$generated_id);
    }
}


    
