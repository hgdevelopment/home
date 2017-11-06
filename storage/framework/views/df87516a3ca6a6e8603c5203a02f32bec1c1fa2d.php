<?php 
use \App\Http\Controllers\Controller;
 ?>
<?php $__env->startSection('banner'); ?>
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
            <img src="<?php echo e(URL::to('/')); ?>/new_heading.png" class="img-responsive">
         </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 <?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-normal h3">TCN Full WithDraw View</h1>
</div>

<div class="wrapper-md" ng-controller="FormDemoCtrl">
	<div class="panel panel-warning">
		<div class="panel-heading font-bold">
		<div class="col-sm-4 font-bold text-success h4">TCN TYPE : <span class="text-danger"><?php echo e($tcnrequests->tcn->tcnType); ?></span></div><div class="col-sm-4 font-bold text-success h4">WITHDARW STATUS : <span class="text-danger"><?php echo e($tcnrequests->withDrawStatus); ?></span></div>&nbsp;
		</div>
	</div>

	<div class="panel panel-warning">
		<div class="panel-heading font-bold">TCN DETAILS</div>
		<div class="panel-body">
		  <div class="col-md-6 col-xs-12 divTableCell">Member&nbsp;Code<b class="data-lab"><?php echo e($members->code); ?></b></div> 
		   <div class="col-md-6 col-xs-12 divTableCell">Address<b class="data-lab"> <?php echo e($address->address); ?></b></div>
              <div class="col-md-6 col-xs-12 divTableCell">Member&nbsp;Name<b class="data-lab"><?php echo e($members->name); ?></b></div>
                <div class="col-md-6 col-xs-12 divTableCell">Mobile&nbsp;No<b class="data-lab"><?php echo e($members->mobileNo); ?></b></div> 
                 <div class="col-md-6 col-xs-12 divTableCell">UNIT<b class="data-lab"><?php echo e($withDraws->unit); ?></b></div>
                   <div class="col-md-6 col-xs-12 divTableCell">Approved&nbsp;Date<b class="data-lab"><?php echo e(date('d-m-Y',strtotime($tcnrequests->approvalDate))); ?></b></div>  
                    <div class="col-md-6 col-xs-12 divTableCell">Amount<b class="data-lab"><?php echo e($withDraws->amount); ?></b></div>
                    <div class="col-md-6 col-xs-12 divTableCell">Payment Received Date<b class="data-lab"><?php echo e(date('d-m-Y',strtotime($tcnrequests->paymentReceivedDate))); ?></b></div>
                      
		</div>
	</div>

    




<div class="col-lg-7">
		<div class="row">
			<div class="panel panel-warning">
		<div class="panel-heading font-bold">ACCOUNT DETAILS</div>
		<div class="panel-body">
		  <div class="col-md-6 col-xs-12 divTableCell">A/C Holder Name<b class="data-lab"><?php echo e($banks->accountHolderName); ?></b></div> 
		  <div class="col-md-6 col-xs-12 divTableCell">Bank Name<b class="data-lab"><?php echo e($banks->bankName); ?></b></div> 
		  <div class="col-md-6 col-xs-12 divTableCell">Branch<b class="data-lab"><?php echo e($banks->branchName); ?></b></div> 
		  <div class="col-md-6 col-xs-12 divTableCell">Account Number<b class="data-lab"><?php echo e($banks->accountNumber); ?></b></div> 
		  <div class="col-md-6 col-xs-12 divTableCell">IFSC Code<b class="data-lab"><?php echo e($banks->ifsc); ?></b></div> 
		</div>
	</div>
		</div>	
	</div>





	<div class="row">
		<div class="col-lg-5">
			<div class="panel panel-warning">
                 <div class="panel-heading font-bold"> Photos </div>
                    <div  class="panel-body">
		           <div class="col-md-6 col-xs-12 divTableCell"><img src="<?php echo e(URL::to('/')); ?>/storage/img/member_img/<?php echo e($members->photo); ?>" style="height:150px;width:150px;" onclick="window.open('<?php echo e(URL::to('/')); ?>/storage/img/member_img/<?php echo e($members->photo); ?>')" /></div> 
  	                <div class="col-md-6 col-xs-12 divTableCell"><img src="<?php echo e(URL::to('/')); ?>/storage/img/member_img/<?php echo e($members->singnature); ?>" style="height:150px;width:150px;"  onclick="window.open('<?php echo e(URL::to('/')); ?>/storage/img/member_img/<?php echo e($members->singnature); ?>')"></div> 
  
                 </div>
            </div>
		</div>
	</div>











	<?php if($withDraws->status=='Denied'): ?>
	<div class="panel panel-warning">
		<div class="panel-body">
			<div class="col-sm-12">
		  <div class="col-md-6 col-xs-12 divTableCell">Denied By<b class="data-lab"><?php echo e($withDraws->approvalId); ?></b></div> 
		  <div class="col-md-6 col-xs-12 divTableCell">Date<b class="data-lab"><?php echo e(date('d-m-Y',strtotime($withDraws->approvalDate))); ?></b></div> 
		  <div class="col-md-6 col-xs-12 divTableCell">Denied Reason<b class="data-lab"><?php echo e($banks->accountHolderName); ?></b></div> 
		  <div class="col-md-6 col-xs-12 divTableCell">A/C Holder Name<b class="data-lab"><?php echo e($withDraws->remarks); ?></b></div> 
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if($withDraws->status=='Applied'): ?>
	<div class="panel panel-warning">
		<div class="panel-body">
			<div class="col-sm-12">
		     <div class="col-md-6 col-xs-12 divTableCell">Applied By<b class="data-lab"><?php echo e($withDraws->appliedId); ?></b></div> 
		     <div class="col-md-6 col-xs-12 divTableCell">Date<b class="data-lab"><?php echo e(date('d-m-Y H:i:a',strtotime($withDraws->created_at))); ?></b></div> 
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if($withDraws->status=='Approved'): ?>
	<div class="panel panel-warning">
		<div class="panel-heading font-bold">WITHDRAWAL APPROVAL DETAILS</div>
		<div class="panel-body">
			<div class="col-sm-12">
		     <div class="col-md-6 col-xs-12 divTableCell">Received Original Agreements<b class="data-lab"><?php echo e($withDraws->receivedOriginalAgreements); ?></b></div> 
		     <div class="col-md-6 col-xs-12 divTableCell">HG Receipts<b class="data-lab"><?php echo e($withDraws->hgReceipts); ?></b></div> 
              
		     <div class="col-md-6 col-xs-12 divTableCell">CARD<b class="data-lab"><?php echo e($withDraws->card); ?></b></div> 
		     <div class="col-md-6 col-xs-12 divTableCell">Currency<b class="data-lab"><?php echo e($withDraws->currencyType); ?></b></div> 
		     <div class="col-md-6 col-xs-12 divTableCell">Form Received By<b class="data-lab"><?php echo e($withDraws->formReceivedBy); ?></b></div> 
		     <div class="col-md-6 col-xs-12 divTableCell">Payment Made By<b class="data-lab">	<?php echo e($withDraws->paymentMadeBy); ?></b></div> 
		     <div class="col-md-6 col-xs-12 divTableCell">Approved By<b class="data-lab"><?php echo e($withDraws->approvalBy); ?></b></div> 
		     <div class="col-md-6 col-xs-12 divTableCell">Withdrawal applied date<b class="data-lab">  <?php echo e(date('d-m-Y',strtotime($withDraws->withDrawAppliedDate))); ?>		</b></div> 
		     <div class="col-md-6 col-xs-12 divTableCell">Withdrawal payed date<b class="data-lab"> <?php echo e(date('d-m-Y',strtotime($withDraws->withDrawPayedDate))); ?></b></div> 
		     <div class="col-md-6 col-xs-12 divTableCell">Online<b class="data-lab"><?php echo e($withDraws->online); ?></b></div> 
		     <div class="col-md-6 col-xs-12 divTableCell">Cheque No<b class="data-lab"><?php echo e($withDraws->chequeNo); ?></b></div> 
		     <div class="col-md-6 col-xs-12 divTableCell">Debit acc No.(Heera's)<b class="data-lab"><?php echo e($withDraws->debitAccountNo); ?></b></div> 
		     <div class="col-md-6 col-xs-12 divTableCell">Remarks<b class="data-lab">{{$withDraws->remarks}</b></div> 
           
		</div>
	</div>
	<?php endif; ?>	
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('jquery'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>