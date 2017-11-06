<html>
<head>
  <meta charset="utf-8">
  <title><?php echo e($tcnrequest->tcnCode); ?></title>
  <style type="text/css" media="screen">
    html,body{
      font-size: 14px;
  padding:0px;
  margin:0px;
    }
    .section{
      margin:0 25px;
    }
    .header-bar{
      background: #A9D3A9;
    }
    .header-bar h3{
      font-size: 14px;
      padding:6px;
    }
    .table-data{
      width: 100%;
    }
    .table-data tr th,.table-data tr td{
       width: 100px;
      font-size:.8em;
      padding:5px;
    }
    .table-data tr th{
      position: relative;
      padding-left:10px;
    }
    .table-data tr td{
      position: relative;
      padding-right:10px;
    }

    .tab1 td{

      padding: 5px;
    }
   /* .table-data tr td:nth-child(2n):before{
     position: absolute;
     content: ":";
     top:0px;
     left:0px;
     font-size: 14px;
     font-weight: bold;

    }
    .table-data tr td:nth-child(3){
      padding-left:20px;
    }*/
    .pull-left{
      float: left;
    }
    .pull-right{
      float: right;
    }
    .clear-fix{
      clear:both;
    }
    .clear-fix:before{
       clear:both;
    }
    .clear-fix:after{
      clear:both;
    }
    .sub-content{
      font-size: 10px;
      font-weight: 400px !important;
    }
  </style>
</head>
 <body>
 <header id="header" class="">
  <img src="<?php echo e(URL::to('/')); ?>/img/tcnmaster/TCNWithdrawal.png" alt="...">
 </header><!-- /header -->
 <div class="section">
 <div class="header-bar">
  <h3 class="heading-1" ><?php echo e($withDraws->type); ?></h3>
 </div>
   <table class="table-data personal-details">
   
    <tbody>
      <tr>
        <td><strong><h3>TCN Name</h3></strong></td>
        <th><strong><h3>:&nbsp;&nbsp;&nbsp;<?php echo e($tcnrequests->tcn->tcnType); ?></h3></strong></th>
        <td></td>
        <th></th>
        <td rowspan="10" style="width: 150px;"><img class="profile-img" src="<?php echo e(URL::to('/')); ?>/storage/img/member_img/<?php echo e($members->photo); ?>" alt="" width="120" height="150"></td>
      </tr>


      <tr>
          <td>Member Code</td>
        <th>:&nbsp;&nbsp;&nbsp;<?php echo e($members->code); ?></th>
        <td></td>
        <th></th>
      </tr>
      <tr>
        <td>Name</td>
        <th>:&nbsp;&nbsp;&nbsp;<?php echo e($members->name); ?></th>
          <td></td>
        <th></th>
        
      </tr>
      <tr>
        <td>Address</td>
        <th>:&nbsp;&nbsp;&nbsp;<?php echo e($address->address); ?></th>
          <td></td>
        <th></th>
        
      </tr>
      <tr>
        <td>Phone</td>
        <th>:&nbsp;&nbsp;&nbsp;<?php echo e($members->mobileNo); ?></th>
          <td></td>
        <th></th>
      </tr>
      <tr >
        <td>Trading Date</td>
        <th>:&nbsp;&nbsp;&nbsp;<?php echo e(date('d-m-Y',strtotime($tcnrequests->paymentReceivedDate ))); ?></th>
          <td></td>
        <th></th>
      </tr>
      <tr >
        <td>Approve Date</td>
        <th>:&nbsp;&nbsp;&nbsp;<?php echo e(date('d-m-Y',strtotime($tcnrequests->approvalDate))); ?></th>
          <td></td>
        <th></th>
      </tr>
      <tr  >
       <td >Withdrawal Applied Date</td>
        <th >:&nbsp;&nbsp;&nbsp;<?php echo e(date('d-m-Y',strtotime($withDraws->appliedDate ))); ?></th>
          <td  ></td>
        <th  ></th>
      </tr>

      <tr  >
       <td >Trade Amount</td>
        <th >:&nbsp;&nbsp;&nbsp;<?php echo e($tcnrequests->amount); ?></th>
          <td  ></td>
        <th  ></th>
      </tr>
      <tr  >
       <td >Withdrawal Units</td>
        <th >:&nbsp;&nbsp;&nbsp;<?php echo e($withDraws->unit); ?></th>
          <td  ></td>
        <th  ></th>
      </tr>
      <tr  >
       <td >Withdrawal Amount</td>
        <th >:&nbsp;&nbsp;&nbsp;<?php echo e($withDraws->amount); ?></th>
          <td  ></td>
        <th  ></th>
      </tr>

      <tr  >
       <td >Profit Account settled</td>
        <th>:&nbsp;&nbsp;&nbsp;YES&nbsp;&nbsp;<input style="margin-top: 7px;" type="checkbox" value="">&nbsp;&nbsp;&nbsp;&nbsp;NO&nbsp;&nbsp;<input type="checkbox" style="margin-top: 7px;" value=""></th>
   
       
         
      </tr>
    </tbody>
   </table>
 </div>


 <div class="section">
 <div class="header-bar">
  <h3 class="heading-1">Account Details for Payment
</h3>
 </div>
   <table class="table-data personal-details">
   
   <tr>
        <td>A/C Holder's Name</td>
        <th>:&nbsp;&nbsp;&nbsp;<?php echo e($banks->accountHolderName); ?></th>
        <td>A/C No </td>
        <th>:&nbsp;&nbsp;&nbsp;<?php echo e($banks->accountNumber); ?></th>
      </tr>
      <tr>
          <td>Name Of Bank</td>
        <th>:&nbsp;&nbsp;&nbsp;<?php echo e($banks->bankName); ?></th>
        <td>Branch</td>
        <th>:&nbsp;&nbsp;&nbsp;<?php echo e($banks->branchName); ?></th>
      </tr>
      <tr>
          <td>Withdrawal Amount</td>
        <th>:&nbsp;&nbsp;&nbsp;<?php echo e($withDraws->amount); ?></th>
        <td>IFSC Code</td>
        <th>:&nbsp;&nbsp;&nbsp;<?php echo e($banks->ifsc); ?></th>
      </tr>
         <tr>
        <td></td>
        <th></th>
        <td></td>
        <th></th>
      </tr>
      
      

       <tr>
        <td colspan="4">
        I, the undersigned, will advice you in writing of any change in detail furnished to the company and I will be liable to you for any obligation
which may be standing on my name in your books of data of the receipt of such notice and until all such obligations have been liquidated.

           </td>
      </tr>
    <tbody>
    </tbody>
   </table>
<br/>
<br/>
<br/>

  <div class="section">
 <div class="pull-left" style="font-size: .9em;"><b>Received by</b>: <?php echo e($withDraws->formReceivedBy); ?></div>
 <div class="pull-right" style="margin-right: 60px;font-size: .8em;">Signature Of Applicant <br/><br/><img src="<?php echo e(URL::to('/')); ?>/storage/img/member_img/<?php echo e($members->singnature); ?>" width="130" height="60" alt="" />
 <br/>

 </div>
 </div>
 </div>






 
 
 
 

 </body>
</html>