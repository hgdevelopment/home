
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
        src: local("GOTHIC"), url("<?php echo e(URL::to('/')); ?>/vendor/dompdf.dompdf/lib/fonts/GOTHIC.ttf") format("truetype");
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





<div style="font-size: 10px"> 
<table width="100%"  style="border:1px thin solid black !important;">

  <tr style="font-weight: bold;">
    <td  style="border:0px !important;">
      <span style="float: left;padding-left: 7px">Payslip No : <?php echo e($salary->payslip_no); ?></span>
      <span style="float: right;padding-right: 7px ;opacity: 0.3;font-size: 10px"><?php echo e(date('d-m-Y')); ?></span>
    </td>
  </tr>

  <tr>
  <td align="center">
   <strong style="font-size: 15px"><?php echo e($employee->company_name); ?></strong><br>
    <strong>Pay Slip for the period of <?php echo e(date('F Y',strtotime('01-'.$salary->month))); ?></strong>
  </td>
  </tr>

  <tr><br>
    <td ><br><table width="100%" style="font-size: 11px !important">
        <tr>
          <td width="15%" style="padding-left: 7px">Emp Code </td>
          <td width="35%">:<?php echo e($employee->code); ?></td>
          <td style="padding-left: 6px" >Date of Joining</td>
          <td>:<?php echo e(date('d-m-Y',strtotime($employee->date_of_joining))); ?></td>
        </tr>

        <tr>
          <td style="padding-left: 7px">Name </td>
          <td>:<?php echo e($employee->salutation_name); ?> <?php echo e($employee->name); ?></td>
          <td style="padding-left: 6px">Paid Days</td>
          <td>:<?php echo e(date('t',strtotime('01-'.$employee->salary))); ?></td>
        </tr>

        <tr>
          <td style="padding-left: 7px" >Designation</td>
          <td>:<?php echo e($employee->designation_name); ?></td>
          <td width="15%" style="padding-left: 6px">Days Worked </td>
          <td width="35%">:<?php echo e($salary->worked_days); ?></td>
        </tr>

        <tr>
          <td style="padding-left: 7px">Department </td>
          <td>:<?php echo e($employee->department_name); ?></td>
          <td style="padding-left: 6px">Gross Salary</td>
          <td>:<?php echo e($salary->salary); ?></td>
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

          <?php  
          $allowances=explode('##', substr($salary->allowances,0,-2));
           ?>
          <?php for($i=0; count($allowances)>$i;$i++): ?>
          <tr>

             <?php  
             $SA=explode('@@', $allowances[$i]);   
              ?>

            <td style="font-size: 10px !important;padding-left: 5px"><?php echo e($SA[0]); ?></td>
            <td align="right" style="padding-right: 30px"><?php echo e($SA[1].'.00'); ?></td>

          </tr>
          <?php endfor; ?>

          <tr>
            <td style="padding-left: 5px">Over Time</td>
            <td align="right" style="padding-right: 30px"><?php echo e($salary->overtime_amount); ?></td>
          </tr>

          <tr>
            <td style="padding-left: 5px">Misc.Payment</td>
            <td align="right" style="padding-right: 30px"><?php echo e($salary->misc_payment); ?></td>
          </tr>

          <tr>
            <td style="padding-left: 5px">Bonus</td>
            <td align="right" style="padding-right: 30px"><?php echo e($salary->bonus); ?></td>
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
            <td align="right" style="padding-right: 30px"><?php echo e(($salary->leave_amount + $salary->unapprove_leave_amount + $salary->sandwitch_leave_amount).'.00'); ?></td>
          </tr>

          <tr>
            <td style="padding-left: 5px">Late Deductions</td>
            <td align="right" style="padding-right: 30px"><?php echo e(($salary->late_amount+0).'.00'); ?></td>
          </tr>

          <tr>
            <td style="padding-left: 5px">Fine Other Deduction</td>
            <td align="right" style="padding-right: 30px"><?php echo e(($salary->fine_deduction+0).'.00'); ?></td>
          </tr>

          <tr>
            <td style="padding-left: 5px">Misc.Deductions</td>
            <td align="right" style="padding-right: 30px"><?php echo e(($salary->misc_deduction+0).'.00'); ?></td>
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
          <td align="right"  style="padding-right: 30px"><b><?php 
            
          echo $totalEarn=($salary->salary+$salary->overtime_amount+$salary->misc_payment+$salary->bonus).'.00';  ?> </b></td>
        </tr>
      </table>
    </td>

    <td width="50%" valign="top" style="border:1px thin solid black">
    <table width="100%">
      <tr>
        <td><b>Total Deduction</b></td>

        <td align="right" style="padding-right: 30px">

        <b><?php  
        echo $totalDeduction=($salary->leave_amount + $salary->unapprove_leave_amount + $salary->sandwitch_leave_amount+$salary->late_amount+$salary->fine_deduction+$salary->misc_deduction).'.00';  ?></b>

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

        <td align="right" style="padding-right: 30px"><b> <?php echo e(max($totalEarn-$totalDeduction,0).'.00'); ?></b></td>
      </tr>
      </table>
    </td>
  </tr>
</table>

 <table width="100%" style="margin-top: 5px !important;">
        <tr><td colspan="3"><br><br><br></td></tr>
        <tr>
          <td width="20%" style="border-bottom: 1px  thin solid black !important"><img src="<?php echo e(URL::to('/')); ?>/signature.jpg"></td>
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