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
		<div class="col-sm-4 font-bold text-success h4">TCN TYPE : <span class="text-danger"><?php echo e($tcnrequests->tcn->tcnType); ?></span></div><div class="col-sm-4 font-bold text-success h4">WITHDRAW STATUS : <span class="text-danger"><?php echo e($tcnrequests->withDrawStatus); ?></span></div>&nbsp;
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading font-bold">TCN DETAILS</div>
		<div class="panel-body">
			<div class="col-sm-9">
				<div class="row">
					<div class="col-lg-6">
						<div class="row">
							<div class="col-sm-4 font-bold">Member&nbsp;Code</div>
							<div class="col-sm-8 text-left"> <?php echo e($members->code); ?></div>
						</div>	
					</div>
					<div class="col-sm-6">
						<div class="row">		
							<div class="col-sm-4">Address</div>
							<div class="col-sm-8 text-left font-bold"> <?php echo e($address->address); ?></div>
						</div>	
					</div>	
				</div><div class="col-sm-12">&nbsp;</div><div class="col-sm-12">&nbsp;</div>

				<div class="row">
					<div class="col-lg-6">
						<div class="row">
							<div class="col-sm-4">Member&nbsp;Name</div>
							<div class="col-sm-8 text-left font-bold"> <?php echo e($members->name); ?></div>
						</div>	
					</div>
					<div class="col-sm-6">
						<div class="row">		
							<div class="col-sm-4">Mobile&nbsp;No</div>
							<div class="col-sm-8 text-left font-bold"> <?php echo e($members->mobileNo); ?></div>
						</div>	
					</div>	
				</div><div class="col-sm-12">&nbsp;</div><div class="col-sm-12">&nbsp;</div>

				<div class="row">
					<div class="col-lg-6">
						<div class="row">
							<div class="col-sm-4">UNIT</div>
							<div class="col-sm-8 text-left font-bold"> <?php echo e($withDraws->unit); ?></div>
						</div>	
					</div>
					<div class="col-sm-6">
						<div class="row">		
							<div class="col-sm-4">Approved&nbsp;Date</div>
							<div class="col-sm-8 text-left font-bold"> <?php echo e(date('d-m-Y',strtotime($tcnrequests->approvalDate))); ?></div>
						</div>	
					</div>	
				</div><div class="col-sm-12">&nbsp;</div><div class="col-sm-12">&nbsp;</div>

				<div class="row">
					<div class="col-lg-6">
						<div class="row">
							<div class="col-sm-4">Amount</div>
							<div class="col-sm-8 text-left font-bold"> <?php echo e($withDraws->amount); ?></div>
						</div>	
					</div>
					<div class="col-sm-6">
						<div class="row">		
							<div class="col-sm-4">Payment Received Date</div>
							<div class="col-sm-8 text-left font-bold"> <?php echo e(date('d-m-Y',strtotime($tcnrequests->paymentReceivedDate))); ?></div>
						</div>	
					</div>	
				</div><div class="col-sm-12">&nbsp;</div><div class="col-sm-12">&nbsp;</div>
			</div>

			<div class="col-sm-3">
				<div class="row">
					<div class="col-sm-6">
						<img src="<?php echo e(URL::to('/')); ?>/storage/img/member_img/<?php echo e($members->photo); ?>" style="height:150px;width:150px;" onclick="window.open('<?php echo e(URL::to('/')); ?>/storage/img/member_img/<?php echo e($members->photo); ?>')" />
					</div>
				</div>
				<div class="row">	
					<div class="col-sm-6">
						<img src="<?php echo e(URL::to('/')); ?>/storage/img/member_img/<?php echo e($members->singnature); ?>" style="height:150px;width:150px;"  onclick="window.open('<?php echo e(URL::to('/')); ?>/storage/img/member_img/<?php echo e($members->singnature); ?>')">
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading font-bold">ACCOUNT DETAILS</div>
		<div class="panel-body">
			<div class="col-sm-12">
				<div class="row">
				<div class="col-sm-2">A/C Holder Name</div>
				<div class="col-sm-2 text-left font-bold">  <?php echo e($banks->accountHolderName); ?></div>
				<div class="col-sm-2">Bank Name</div>
				<div class="col-sm-2 text-left font-bold"> <?php echo e($banks->bankName); ?></div>
				<div class="col-sm-1">Branch</div>
				<div class="col-sm-3 text-left font-bold"> <?php echo e($banks->branchName); ?></div>
				</div>
			</div><div class="col-sm-12">&nbsp;</div>

			<div class="col-sm-12">
				<div class="row">
				<div class="col-sm-2">Account Number</div>
				<div class="col-sm-2 text-left font-bold"> <?php echo e($banks->accountNumber); ?></div>
				<div class="col-sm-2">IFSC Code</div>
				<div class="col-sm-2 text-left font-bold"> <?php echo e($banks->ifsc); ?></div>
				<div class="col-sm-1"></div>
				<div class="col-sm-3 text-left font-bold"></div>
				</div>
			</div><div class="col-sm-12">&nbsp;</div>
		</div>
	</div>
	<?php if($withDraws->status=='Cancel'): ?>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-sm-12">
				<div class="row">
				<div class="col-sm-2">Denied By</div>
				<div class="col-sm-2 text-left font-bold"> <?php echo e($withDraws->approvalId); ?></div>
				<div class="col-sm-1">Date</div>
				<div class="col-sm-2 text-left font-bold"> <?php echo e(date('d-m-Y',strtotime($withDraws->approvalDate))); ?></div>
				<div class="col-sm-2">Denied Reason</div>
				<div class="col-sm-3 text-left font-bold"> <?php echo e($withDraws->remarks); ?></div>

				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if($withDraws->status=='Applied'): ?>
	<div class="panel panel-default">
		<div class="panel-body">
			<div class="col-sm-12">
				<div class="row">
				<div class="col-sm-2">Applied By</div>
				<div class="col-sm-2 text-left font-bold"> <?php echo e(Controller::userCode($withDraws->appliedId)); ?></div>

				<div class="col-sm-2">Date</div>
				<div class="col-sm-4 text-left font-bold"> <?php echo e(date('d-m-Y H:i:a',strtotime($withDraws->created_at))); ?></div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>
	<?php if($withDraws->status=='Paid'): ?>
	<div class="panel panel-default">
		<div class="panel-heading font-bold">WITHDRAWAL APPROVAL DETAILS</div>
		<div class="panel-body">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-3">Form Received By</div>
					<div class="col-sm-3 font-bold">
						<?php echo e($withDraws->formReceivedBy); ?>

					</div>
					<div class="col-sm-3">Currency</div>
					<div class="col-sm-3 font-bold">
						<?php echo e($withDraws->currencyType); ?>

					</div>
				</div>
			</div><div class="col-sm-12">&nbsp;</div>


			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-3">Approved By</div>
					<div class="col-sm-3 font-bold">
						<?php echo e($withDraws->approvalBy); ?>

						
					</div>
					<div class="col-sm-3">Payment Made By</div>
					<div class="col-sm-3 font-bold">
						<?php echo e($withDraws->paymentMadeBy); ?>

						
					</div>
				</div>
			</div><div class="col-sm-12">&nbsp;</div>


			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-3">Withdrawal payed date</div>
					<div class="col-sm-3 font-bold">
                      <?php echo e(date('d-m-Y',strtotime($withDraws->withDrawPayedDate))); ?>

					</div>
					<div class="col-sm-3">Withdrawal applied date</div>
					<div class="col-sm-3 font-bold">
                      <?php echo e(date('d-m-Y',strtotime($withDraws->withDrawAppliedDate))); ?>				
					</div>
				</div>
			</div><div class="col-sm-12">&nbsp;</div>

			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-3">Cheque No</div>
					<div class="col-sm-3 font-bold">
						<?php echo e($withDraws->chequeNo); ?>

					</div>
					<div class="col-sm-3">Online</div>
					<div class="col-sm-3 font-bold">
						<?php echo e($withDraws->online); ?>

					</div>
				</div>
			</div><div class="col-sm-12">&nbsp;</div>

			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-3">Debit acc No.(Heera's)</div>
					<div class="col-sm-3 font-bold">
						<?php echo e($withDraws->debitAccountNo); ?>

					</div>
					<div class="col-sm-3">Bank</div>
					<div class="col-sm-3 font-bold">
						<?php echo e($withDraws->bank); ?>

					</div>
				</div>
			</div><div class="col-sm-12">&nbsp;</div>

			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-3">Remarks</div>
					<div class="col-sm-3 font-bold"> <?php echo e($withDraws->remarks); ?></div>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>	
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('jquery'); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>