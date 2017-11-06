<html>
<head>
    <meta charset="utf-8">
    <title>Experience Certificate</title>

    <style type="text/css" media="screen">
    html{

    }
        @font-face {
        font-weight: normal;
        font-style: normal;
        font-variant: normal;
        src: local("GOTHIC"), url("<?php echo e(URL::to('/')); ?>/vendor/dompdf.dompdf/lib/fonts/GOTHIC.ttf") format("truetype");
        }
        body {
            font-family: GOTHIC, sans-serif!important;
            background: url("<?php echo e(URL::to('/')); ?>/img/tcnmaster/water_mark.png") no-repeat;
            background-size:fit;
            background-position:center ;
             
        }


table{
    line-height: 14px;
    font-size: 12px;
}

    </style>
</head>
<body>

 <div style="opacity: 0.4; text-align: right; font-size: 11px; position: absolute; top: 150px; right: 20px;"><?php echo e(date('d-m-Y')); ?></div>
<div>
<img src="<?php echo e(URL::to('/')); ?>/img/tcnmaster/appointment.png" alt="" style="width: 100%; opacity: 1; position: relative; z-index: 999;" />
  <br>
    <br>
     
   
    <div class="section" style="text-align:center;padding-top: 10px; ">
        <table cellspacing="0" cellpadding="0" border="0" align="center">
        <tr >
            <td width="450px" align="center">
                <b style="font-size:22px;padding-bottom: 5px; ">Resignation Letter</b><br/>
            </td>
            
        </tr>
        </table> 
    </div>
    <div class="section" style="text-align:center;padding-top: 10px; ">
        <table  cellspacing="0" cellpadding="0" border="0" align="center" style="font-size: 11px;">
            <tr><td align="center" ><b><?php echo e(ucfirst($resigns->branch_name)); ?>,&nbsp;<?php echo e(ucfirst($resigns->address1)); ?>,<?php echo e(ucfirst($resigns->city)); ?></b></td></tr>
            <tr><td align="center">&nbsp;<b><?php echo e(ucfirst($resigns->state)); ?>,<?php echo e(ucfirst($resigns->pinNo)); ?></b></td></tr>
           
        </table>
    </div>
    <div style="margin-left: 30px;padding-top: -20px;line-height: 13px;font-size: 13px;">
        <table width="100%">
            <tr><td >&nbsp;</td></tr>
           
            <tr><td ><b><?php echo e(ucfirst($resigns->salutation_name)); ?><?php echo e(ucfirst($resigns->name)); ?></b></td></tr>
            <tr><td ><?php echo e(ucfirst($resigns->address)); ?>,</td></tr>
            <tr><td ><?php echo e(ucfirst($resigns->city)); ?>,</td></tr>
            <tr><td ><?php echo e(ucfirst($resigns->state)); ?>,</td></tr>
            <tr><td ><?php echo e(ucfirst($resigns->countryName)); ?>,</td></tr>
            <tr><td ><?php echo e(ucfirst($resigns->zip_code)); ?></td></tr>
            <tr><td >&nbsp;</td></tr>
            <tr><td></td></tr>
            <tr><td><b>Dear Madam,</b></td></tr>    
            <br>  
        </table>
    </div>


    <div >
        <table width="730px" align="center" >
            <tr>
                <td width="40px" valign="top"></td>
                <td width="590px" valign="top" style="padding:0 30px;text-align: justify; font-size: 13px;     line-height: 20px;">
                  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<b>I</b> would like to inform you that I am resigning from my position as <b style="text-transform: capitalize;"><?php echo e($resigns->designation_name); ?></b> for the company.
                                Thank you very much for the opportunities for professional and personal development that you have provided me.  I have enjoyed working for the company and appreciate the support provided me during my tenure with the company. If I can be of any help during this transition, please let me know.<br>
                                <br><br>                            
                </td>
            </tr>
        </table>
    </div>
    


    <div style="padding:0 30px;">
        
        <table> 
        <tr><td valign="top"><b> Sincerely,<br><br>
                                </b></td></tr>
        </table>
        <table width="630px" align="center">
       <!--  <tr><td align="left"><img src="<?php echo e(URL::to('/')); ?>/img/tcnmaster/signature.jpg"></td></tr> -->
        <tr><td width="440px" valign="top"><?php echo e(ucfirst($resigns->salutation_name)); ?><?php echo e(ucfirst($resigns->name)); ?></td>
    
        </tr>
        </table>
    </div>

    
</body>
</html>