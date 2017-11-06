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
<h1 class="m-n font-normal h3">TCN Request</h1>
</div>

<div class="wrapper-md" id="wrapper-md" ng-controller="FormDemoCtrl">
	<form role="form" method="post" action="<?php echo e(URL::to('/')); ?>/admin/tcnRequest" id="form" data-parsley-validate>
		<?php echo e(csrf_field()); ?>


		<div class="panel panel-danger">
			<div class="panel-heading font-bold">RESET <?php if($resetType=='MEM'): ?> <?php echo e('MEMBER'); ?><?php else: ?><?php echo e('DSA'); ?><?php endif; ?> PASSWORD </div>
			<div class="panel-body">
				<div class="form-group col-sm-4">
					<label> Member Code</label>
					<input type="text" name="userCode" id="userCode" class="form-control" required data-parsley-required-message="Enter Member Code">
				</div>
				<div class="form-group col-sm-2">
				<label>&nbsp;</label><br>
					<input type="submit" value=" Reset " class="btn btn-sm btn-danger font-bold">
				</div>
 			</div>
		</div> 


	</form>	
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">
$( "#depositeDate").datepicker({format:'dd-mm-yyyy',autoclose: true});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>