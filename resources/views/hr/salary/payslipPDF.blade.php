
<html>
<head>
    <meta charset="utf-8">
    <title>Payslip</title>

    <style type="text/css" media="screen">
    html{
        padding: 5px;
    }
        @font-face {
        font-weight: normal;
        font-style: normal;
        font-variant: normal;
        src: local("GOTHIC"), url("{{URL::to('/') }}/vendor/dompdf.dompdf/lib/fonts/GOTHIC.ttf") format("truetype");
        }
        body {
            font-family: GOTHIC, sans-serif!important;
        }
       



table{
    font-size: 12px;
    border-collapse: collapse;
    
}

    </style>
</head>
<body>
{{--  <div style="opacity: 0.4; text-align: right; font-size: 11px; position: absolute; top: 150px; right: 20px;">{{date('d-m-Y')}}</div>
 --}}
{{-- <img src="{{URL::to('/') }}/img/tcnmaster/appointment.png" alt="" style="width: 100%;" /> --}}



<div style="font-size: 10px"> 
<table width="100%"  style="border:1px thin solid black !important;">

  <tr style="font-weight: bold;">
    <td  style="border:0px !important;">
      <span style="float: left;padding-left: 7px">Payslip No : {{ $salary->payslip_no }}</span>
      <span style="float: right;padding-right: 7px ;opacity: 0.3;font-size: 10px">{{ date('d-m-Y') }}</span>
    </td>
  </tr>

  <tr>
  <td align="center">
   <strong style="font-size: 15px">{{ $employee->company_name }}</strong><br>
    <strong>Pay Slip for the period of {{ date('F Y',strtotime('01-'.$salary->month)) }}</strong>
  </td>
  </tr>

  <tr><br>
    <td ><br><table width="100%" style="font-size: 11px !important">
        <tr>
          <td width="15%" style="padding-left: 7px">Emp Code </td>
          <td width="35%">:{{ $employee->code }}</td>
          <td style="padding-left: 6px" >Date of Joining</td>
          <td>:{{ date('d-m-Y',strtotime($employee->date_of_joining)) }}</td>
        </tr>

        <tr>
          <td style="padding-left: 7px">Name </td>
          <td>:{{ $employee->salutation_name }} {{ $employee->name }}</td>
          <td style="padding-left: 6px">Paid Days</td>
          <td>:{{ date('t',strtotime('01-'.$employee->salary)) }}</td>
        </tr>

        <tr>
          <td style="padding-left: 7px" >Designation</td>
          <td>:{{ $employee->designation_name }}</td>
          <td width="15%" style="padding-left: 6px">Days Worked </td>
          <td width="35%">:{{ $salary->worked_days }}</td>
        </tr>

        <tr>
          <td style="padding-left: 7px">Department </td>
          <td>:{{ $employee->department_name }}</td>
          <td style="padding-left: 6px">Gross Salary</td>
          <td>:{{ $salary->salary }}</td>
        </tr>
      </table></td>
  </tr>
</table>


<table  width="100%"  border="0.6em" style="border:1px thin solid black">
  <tr>
    <td width="50%" valign="top" style="border:1px thin solid black">
      <table width="100%"  style="border: 0px !important">
        <tr>
          <td align="left" style="padding-left: 5px;border-bottom:1px thin solid black !important;"><strong>Earnings</strong></td>
          <td align="right" style=";padding-right: 30px;border-bottom:1px thin solid black !important;"><strong>Amount</strong></td>
        </tr>

          @php 
          $allowances=explode('##', substr($salary->allowances,0,-2));
          @endphp
          @for($i=0; count($allowances)>$i;$i++)
          <tr>

             @php 
             $SA=explode('@@', $allowances[$i]);   
             @endphp

            <td style="font-size: 10px !important;padding-left: 5px">{{ $SA[0] }}</td>
            <td align="right" style="padding-right: 30px">{{$SA[1].'.00'}}</td>

          </tr>
          @endfor

          <tr>
            <td style="padding-left: 5px">Over Time</td>
            <td align="right" style="padding-right: 30px">{{$salary->overtime_amount}}</td>
          </tr>

          <tr>
            <td style="padding-left: 5px">Misc.Payment</td>
            <td align="right" style="padding-right: 30px">{{$salary->misc_payment}}</td>
          </tr>

          <tr>
            <td style="padding-left: 5px">Bonus</td>
            <td align="right" style="padding-right: 30px">{{$salary->bonus}}</td>
          </tr>

        </table>
    </td>

    <td width="50%" valign="top" style="border:1px thin solid black">
      <table width="100%"  style="border: 0px !important;">
        <tr>
          <td align="left" style="padding-left: 5px;border-bottom:1px thin solid black !important;"><strong>Deductions</strong></td>
          <td align="right" style=";padding-right: 30px;border-bottom:1px thin solid black !important;"><strong>Amount</strong></td>
        </tr>

          <tr>
            <td style="padding-left: 5px">Leave Deductions</td>
            <td align="right" style="padding-right: 30px">{{($salary->leave_amount + $salary->unapprove_leave_amount + $salary->sandwitch_leave_amount).'.00'}}</td>
          </tr>

          <tr>
            <td style="padding-left: 5px">Late Deductions</td>
            <td align="right" style="padding-right: 30px">{{($salary->late_amount+0).'.00'}}</td>
          </tr>

          <tr>
            <td style="padding-left: 5px">Fine Other Deduction</td>
            <td align="right" style="padding-right: 30px">{{($salary->fine_deduction+0).'.00'}}</td>
          </tr>

          <tr>
            <td style="padding-left: 5px">Misc.Deductions</td>
            <td align="right" style="padding-right: 30px">{{($salary->misc_deduction+0).'.00'}}</td>
          </tr>
        </table>
    </td>
  </tr>
</table>



<table width="100%"  style="margin-top: 5px !important;border:1px thin solid black"  border="0.6em"  cellspacing="1" cellpadding="1">
  <tr>
    <td width="50%" valign="top" style="border:1px thin solid black">
      <table width="100%">
        <tr>
          <td><b>Total Earnings</b></td>
          <td align="right"  style="padding-right: 30px"><b>@php
            
          echo $totalEarn=($salary->salary+$salary->overtime_amount+$salary->misc_payment+$salary->bonus).'.00'; @endphp </b></td>
        </tr>
      </table>
    </td>

    <td width="50%" valign="top" style="border:1px thin solid black">
    <table width="100%">
      <tr>
        <td><b>Total Deduction</b></td>

        <td align="right" style="padding-right: 30px">

        <b>@php 
        echo $totalDeduction=($salary->leave_amount + $salary->unapprove_leave_amount + $salary->sandwitch_leave_amount+$salary->late_amount+$salary->fine_deduction+$salary->misc_deduction).'.00'; @endphp</b>

        </td>
      </tr>
      </table>
    </td>
  </tr>


  <tr>
    <td width="50%" valign="top"  style="border-right:0px thin solid black !important">
      &nbsp;
    </td>

    <td width="50%" valign="top" style="border-left:1px 1px 1px 0px thin solid black !important" >
    <table width="100%">
      <tr>
        <td style="border-left: 0px !important"><b>Net Pay  </b></td>

        <td align="right" style="padding-right: 30px"><b> {{ max($totalEarn-$totalDeduction,0).'.00' }}</b></td>
      </tr>
      </table>
    </td>
  </tr>
</table>

 <table width="100%" style="margin-top: 5px !important;">
        <tr><td colspan="3"><br><br><br></td></tr>
        <tr>
          <td width="20%" style="border-bottom: 1px  thin solid black !important"><img src="{{URL::to('/') }}/signature.jpg"></td>
          <td width="55%"></td>
          <td width="25%" style="border-bottom: 1px  thin solid black !important"></td>
        </tr>

        <tr>

          <td><b>CEO / Managing Director</b></td>
          <td width="55%"></td>
          <td><b>Signature of the Employee</b></td>
        </tr>
      </table>
</div>
</body>
</html>