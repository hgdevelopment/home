<?php $__env->startSection('banner'); ?>
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
	<img src="<?php echo e(URL::asset('img/new_heading.png')); ?>" class="img-responsive">
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sidebar'); ?>
	<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="bg-light lter b-b wrapper-md">
	<h1 class="m-n font-thin h3">Deduction</h1>
</div>
<div class="wrapper-md" ng-controller="FormDemoCtrl">  
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading font-bold">  </div>
				<div class="panel-body">
					<form role="form" method="post" action="<?php echo e(URL::to('/')); ?>/hr/deduction/employeededuction" enctype="multipart/form-data" data-parsley-validate>
					<?php echo e(csrf_field()); ?>

					<?php $__env->startSection('edit'); ?>
					<?php echo $__env->yieldSection(); ?>
						<div class="col-md-12">
							<div class="col-md-4">
								<label>Employee:</label>
								<select  class="form-control" name="employee" id="employee" required data-parsley-required-message="Please Select Employee">
									<option value="">--Select--</option>
									<?php 
										$table=DB::table('hr_emp_personal_details')->get();
						 			 ?>
									<?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($emp->id); ?>" <?php if($__env->yieldContent('employee')==$emp->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($emp->code); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
								<?php if($errors->has('employee')): ?>
									<span class="help-inline"><?php echo e($errors->first('employee')); ?></span>
								<?php endif; ?>
							</div>
							<div class="col-md-4">
								<label>Type Of Deduction:</label>
								<select  class="form-control" name="deduction" id="deduction" required data-parsley-required-message="Please Select Employee">
									<option value="">--Select--</option>
									<?php 
										$table=DB::table('hr_deduction_master')->whereNull('deleted_at')->get();
						 			 ?>
									<?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $deduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<option value="<?php echo e($deduct->id); ?>" <?php if($__env->yieldContent('deduction')==$deduct->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($deduct->type_of_deduction); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
								<?php if($errors->has('deduction')): ?>
									<span class="help-inline" style="color: red;"><?php echo e($errors->first('deduction')); ?></span>
								<?php endif; ?>
							</div>
						
							<div class="col-md-3"><br>
								
								<button class="btn btn-success" type="submit" value="save" name="save">submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<script type="text/javascript">

  function denydeduction(id)
  {
	  var reason=$("#reason").val();
	  $('#den').html("");
	  swal({
		  title: "Deny!!",
		  text: "Are you sure?",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Deny",
		  closeOnConfirm: true
	  }, 
	  function (isConfirm) 
	  	{ 
		  	if (isConfirm) {
			  $.ajax({ 
				  url: "<?php echo e(URL::to('/hr/deduction/employeededuction')); ?>",
				  type: "POST",
				  data: { "_token": "<?php echo e(csrf_token()); ?>","id": id},
				  dataType: "html",
				  success: function (data) { 
					  //alert(data);exit;
					  swal("Done!", "It was succesfully denied!", "success");
					  setTimeout(function() {
					  window.location.href = "<?php echo e(URL::to('/hr/deduction/employeededuction')); ?>";
					}, 2000); 
				  },
			  	}); 
		  	}
		  else
		  {
		  	swal("Done!", "It was succesfully denied!", "success");
		  }   
	   }); 
  }
</script>
<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>