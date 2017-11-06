<?php $__env->startSection('banner'); ?>
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
<img src="<?php echo e(URL::asset('new_heading.png')); ?>" class="img-responsive">
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="bg-light lter b-b wrapper-md">
	<h1 class="m-n font-thin h3">Withdrawal Request Details</h1>
</div>

	<div class="wrapper-md">
		<div class="row">
			<div class="col-sm-12">
				<div class="blog-post">                   
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading ">                  
								SCHEME DETAILS
							</div>
							<div class="panel-body">
								<?php echo e(csrf_field()); ?>

								<div class="col-md-3">
									<label><strong>MEMBER CODE</strong></label><br>
									<label><?php echo e($datas->code); ?></label>
								</div>
								<div class="col-md-3">
									<label><strong>NAME</strong></label><br>
									<label><?php echo e($datas->name); ?></label>
								</div>
								<div class="col-md-3">
									<label><strong>ADDRESS</strong></label><br>
									<label><?php echo e($datas->address); ?></label>
								</div>
								<div class="col-md-3">
									<label><strong>PHONE</strong></label><br>
									<label><?php echo e($datas->mobileNo); ?></label>
								</div>
								<div class="col-md-12"> <br> </div>
								<div class="col-md-3">
									<label><strong>TCN CODE</strong></label><br>
									<label><?php echo e($datas->tcnCode); ?></label>
								</div>
								<div class="col-md-3">
									<label><strong>SCHEME</strong></label><br>
									<label><?php echo e($datas->tcnType); ?></label>
								</div>
								<div class="col-md-3">
									<label><strong>APPROVED DATE</strong></label><br>
									<label><?php echo e(date('d-m-Y',strtotime($datas->approvalDate))); ?></label>
								</div>
								<div class="col-md-3">
									<label><strong>INVESTMENT AMOUNT</strong></label><br>
									<label><?php echo e($datas->amount); ?></label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="wrapper-md">
		<div class="row">
			<div class="col-sm-12">
				<div class="blog-post">                   
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading ">                  
								ACCOUNT DETAILS FOR PAYMENT
							</div>
							<div class="panel-body">
								<div class="col-md-4">
									<label><strong>A/C Holder Name	</strong></label><br>
									<label><?php echo e($datas->accountHolderName); ?></label>
								</div>
								<div class="col-md-4">
									<label><strong>Name Of Bank	</strong></label><br>
									<label><?php echo e($datas->bankName); ?></label>
								</div>
								
								<div class="col-md-4">
									<label><strong>Branch</strong></label><br>
									<label><?php echo e($datas->branchName); ?></label>
								</div>
								<div class="col-md-12"><br></div>
								<div class="col-md-4">
									<label><strong>AC/No</strong></label><br>
									<label><?php echo e($datas->accountNumber); ?></label>
								</div>
								<div class="col-md-4">
									<label><strong>IFSC Code</strong></label><br>
									<label><?php echo e($datas->ifsc); ?></label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<div class="wrapper-md">
		<div class="row">
			<div class="col-sm-12">
				<div class="blog-post">                   
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading ">                  
								WITHDRAWAL DETAILS
							</div>
							<div class="panel-body">
								<div class="col-md-4">
									<label><strong>Unit	</strong></label><br>
									<label><?php echo e($values->unit); ?></label>
								</div>
								<div class="col-md-4">
									
									<label><strong> Amount</strong></label><br>
									<label><?php echo e($values->amount); ?></label>
									
								</div>
								<div class="col-md-4">
									<label><strong>Card</strong></label><br>
									<label><?php echo e($values->card); ?></label>
								</div>
								<div class="col-md-12"><br></div>
								<div class="col-md-4">
									<label><strong>Applied Date</strong></label><br>
									<label><?php echo e(date('d-m-Y',strtotime($values->appliedDate))); ?></label>
								</div>
								<div class="col-md-4">
									<label><strong>Received Original Agreements</strong></label><br>
									<label><?php echo e($values->receivedOriginalAgreements); ?></label>
								</div>
								<div class="col-md-4">
									<label><strong>Hg Receipts</strong></label><br>
									<label><?php echo e($values->hgReceipts); ?></label>
								</div>
								<div class="col-md-12"><br></div>
								<div class="col-md-4">
									<label><strong>Form Received By</strong></label><br>
									<label><?php echo e($values->formReceivedBy); ?></label>
								</div>
								<div class="col-md-4">
									<label><strong>Payment Made By</strong></label><br>
									<label><?php echo e($values->paymentMadeBy); ?></label>
								</div>
								<div class="col-md-4">
									<label><strong>Approval By</strong></label><br>
									<label><?php echo e($values->approvalBy); ?></label>
								</div>
								<div class="col-md-12"><br></div>
								<div class="col-md-4">
									<label><strong>Online</strong></label><br>
									<label><?php echo e($values->online); ?></label>
								</div>
								<div class="col-md-4">
									<label><strong>Cheque Number</strong></label><br>
									<label><?php echo e($values->chequeNo); ?></label>
								</div>
								<div class="col-md-4">
									<label><strong>Bank</strong></label><br>
									<label><?php echo e($values->bank); ?></label>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
                   
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script src="<?php echo e(URL::asset('js/bootstrap-datepicker.js')); ?>"></script>
<link rel="stylesheet" href="<?php echo e(URL::asset('css/bootstrap-datepicker.min.css')); ?>" type="text/css" />
<script src="<?php echo e(URL::asset('js/i18n/datepicker.en.js')); ?>"></script>
<script>
  $(function()
  {
  $('#payed_date').datepicker({
  orientation:'bottom auto',
  autoclose:true
  });
  });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>