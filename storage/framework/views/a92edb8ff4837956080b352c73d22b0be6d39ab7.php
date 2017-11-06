<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">
<link href="<?php echo e(URL::asset('css/sweetalert.css')); ?>"></link>

<?php $__env->startSection('banner'); ?>
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
<img src="<?php echo e(URL::asset('new_heading.png')); ?>" class="img-responsive">
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="bg-light lter b-b wrapper-md">
	<h1 class="m-n font-thin h3">PARTIAL WITHDRAWAL</h1>
</div><br>
	<form action="<?php echo e(URL::to('/')); ?>/admin/partialWithdraw/withdraw" method="post" data-parsley-validate >
	<?php echo e(csrf_field()); ?>

		<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<div class="row">
			<div class="col-sm-12">
				<div class="blog-post">                   
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading ">                  
							 PARTIAL WITHDRAWAL
							</div>
							<div class="panel-body">
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" id="token">
							<input type="hidden" name="tcnid" value="<?php echo e($datas->id); ?>" id="tcnid">
							<div class="col-sm-4">
								<label>Tcn Name</label>
								<input type="text" id="tcn_name"  required  name="tcn_name" value="<?php echo e($datas->tcnType); ?>" class="form-control" readonly />
							</div>
							<div class="col-sm-4">
								<label>Units</label>
								<input type="text" id="unit" required name="unit" id="unit" value="<?php echo e($datas->unit); ?>"   class="form-control" readonly />
							</div>
							<div class="col-sm-4">
								<label>Amount</label>
								<input type="text" id="amount"  required name="amount" id="amount"  value="<?php echo e($datas->amount); ?>"  class="form-control" readonly/>
							</div>
							<div class="col-sm-12"><br></div>
							<div class="col-sm-4">
								<label>Withdrawal Unit</label>
								<input class="form-control" name="withdrawal_unit" data-parsley-type="integer" onkeyup="calculate()"  id="withdrawal_unit" placeholder="Withdrawal Unit" required >
							</div>
							<div class="col-sm-4">
								<label>Withdrawal Amount</label>
								<input class="form-control" id="withdrawal_amount" placeholder="Withdrawal Amount"  readonly  name="withdrawal_amount" required >
							</div>
							<div class="col-sm-4">
								<label>Balance Amount</label>
								<input type="text" class="form-control" name="balance" id="balance" readonly   placeholder="Balance" required parsley-notblank="true">
							</div>
							<div class="col-sm-12"><br></div>
							<div class="col-sm-4">
								<label>Applied Date</label>
								<input type="text" id="applied_date"   class="form-control" name="applied_date"  required>
								<input type="hidden" name="user_id" value="<?php echo e($datas->userId); ?>" id="user_id">
								<input type="hidden" name="tcn_id" value="<?php echo e($datas->tcn_id); ?>" id="tcn_id">
							</div>
							<div class="col-sm-4"><br>
							<label></label><br>
								<input type="submit"  name="submit" id="submit"  value="withdraw"  class="btn btn-sm btn-success" >
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</form> 
            

<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script src="<?php echo e(URL::asset('js/sweetalert.min.js')); ?>"></script>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
$( function() {
$('#applied_date' ).datepicker();
$('#withdrawal_unit').keyup(calculate);
$('#withdrawal_amount').keyup(cal);
});

function calculate(e)
{
	$('#withdrawal_amount').val("");
	$('#balance').val("");
	withdraw_unit = $('#withdrawal_unit').val();
	unit = $('#unit').val();
	if (parseInt(withdraw_unit) >= parseInt(unit)) 
	{
		return false;
  	} 
  	else 
  	{
	    $('#withdrawal_amount').val($('#amount').val() / $('#unit').val() * ($('#withdrawal_unit').val()));
	    $('#balance').val($('#amount').val() - $('#withdrawal_amount').val());
  	}
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.erp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>