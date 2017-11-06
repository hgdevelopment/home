<?php $__env->startSection('banner'); ?>
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
            <img src="<?php echo e(URL::asset('new_heading.png')); ?>" class="img-responsive">
         </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 <?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php  use \App\Http\Controllers\Controller;  ?>
<?php $__env->startSection('body'); ?>
<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3"> Reset <?php if($resetType=='MEM'): ?> <?php echo e('Member'); ?><?php else: ?><?php echo e('DSA'); ?><?php endif; ?> Password</h1>
</div>

<div class="wrapper-md" ng-controller="FormDemoCtrl">
	<form role="form" method="post" action="<?php echo e(URL::to('/')); ?>/admin/resetPassword" data-parsley-validate>
		<?php echo e(csrf_field()); ?>

		<div class="panel panel-danger">
			<div class="panel-heading font-bold">RESET <?php if($resetType=='MEM'): ?> <?php echo e('MEMBER'); ?><?php else: ?><?php echo e('DSA'); ?><?php endif; ?> PASSWORD </div>
			<div class="panel-body">
				<?php if(session()->has('message')): ?>
				<div class="alert alert-success fade in alert-dismissable">
				<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
				<strong>Info!</strong> <?php echo e(session()->get('message')); ?>

				</div>
				<?php endif; ?>

				<div class="form-group col-sm-4">
					<label><?php if($resetType=='MEM'): ?> <?php echo e('Member'); ?><?php else: ?><?php echo e('DSA'); ?><?php endif; ?> Code</label>
					<input type="text" name="userCode" id="userCode" class="form-control" required data-parsley-required-message="Select <?php if($resetType=='MEM'): ?> <?php echo e('Member'); ?><?php else: ?><?php echo e('DSA'); ?><?php endif; ?> ">
				</div>
				<div class="form-group col-sm-2">
				<label>&nbsp;</label><br>
					<input type="submit" value=" Reset " class="btn btn-sm btn-danger font-bold">
				</div>
			</div>
		</div>  <input type="hidden" name="resetType" id="resetType" value="<?php if($resetType=='MEM'): ?> <?php echo e('MEMBER'); ?><?php else: ?><?php echo e('DSA'); ?><?php endif; ?>">    
	</form>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">
	$(".chosen-select").chosen();
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.erp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>