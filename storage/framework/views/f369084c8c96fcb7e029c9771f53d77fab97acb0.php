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
	<h1 class="m-n font-thin h3">Department</h1>
</div>
<div class="wrapper-md" ng-controller="FormDemoCtrl">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading font-bold"> <?php if(trim($__env->yieldContent('edit_id'))): ?> Edit Department <?php else: ?> Add Department <?php endif; ?> </div>
				<div class="panel-body">
					<?php if(trim($__env->yieldContent('edit_id'))): ?>
					<form role="form" method="post" action="<?php echo e(URL::to('/')); ?>/hr/master/department/<?php echo $__env->yieldContent('edit_id'); ?>" enctype="multipart/form-data" data-parsley-validate>
					<?php else: ?>
						<form role="form" method="post" action="<?php echo e(URL::to('/')); ?>/hr/master/department" enctype="multipart/form-data" data-parsley-validate>
						<?php endif; ?>
						<?php echo e(csrf_field()); ?>

						<?php $__env->startSection('edit'); ?>
						<?php echo $__env->yieldSection(); ?>
							<div class="col-md-12">
								<div class="col-md-4">
									<label>Department Name:</label>
									<input type="text" name="departmentname" id="departmentname" class="form-control" value="<?php echo $__env->yieldContent('departmentname'); ?>" placeholder="Enter Department Name" required data-parsley-required-message="Please Enter Department Name" >
									<?php if($errors->has('departmentname')): ?>
										<span class="help-inline" style="color: red;"><?php echo e($errors->first('departmentname')); ?></span>
									<?php endif; ?>
								</div>
								<div class="col-md-3 "><br>
									<button class="btn btn-success" type="submit" value="save" name="save">Save</button>
								</div>
							</div>
						</form>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading font-bold">View Department</div>
				<div class="table-responsive" style="overflow-x: initial;">
					<table class="table table-striped b-t">
						<thead>
							<tr>
								<th>SI.No</th>
								<th>Department Name</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $Department; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dept): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
								<tr data-expanded="true">
									<td><?php echo e($key+1); ?></td>
									<td><?php echo e($dept->department_name); ?></td> 
									<td>
										<a href="<?php echo e(URL::to('/')); ?>/hr/master/department/<?php echo e($dept->id); ?>/edit"  class="active"><i  style="color: #018001;" class="fa fa-pencil text-success text-active" aria-hidden="true"></i></a> 
										
										
										
										<button class="active" style="border: none;" onclick="destroy(<?php echo e($dept->id); ?>)"><i  style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></button>
									</td>
								</tr>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
						</tbody>
					</table>
				</div>
			</div> 
		</div>
	</div>
</div>
<?php $__env->stopSection(); ?>
<script type="text/javascript">
  function destroy(id)
  	{
	  swal({
		  title: "Delete!!!",
		  text: "Are you sure?",
		  type: "error",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Delete Department!",
		  closeOnConfirm: true
	  	}, 
	  	function (isConfirm) 
	  	{
	  		if(isConfirm) 
	  		{
			  	$.ajax({
				  url: "<?php echo e(URL::to('/')); ?>/hr/master/department/"+id,
				  type: "delete",
				  data: {"_token": "<?php echo e(csrf_token()); ?>"},
				  success: function (data) 
			  		{    
			  			
			  			window.location.reload(true);
			  		},
			  	});
	  		}
	  		else
	  		{
	  			swal("cancelled","", "error");
	  		}
	  	});
  	}
</script> 
<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>