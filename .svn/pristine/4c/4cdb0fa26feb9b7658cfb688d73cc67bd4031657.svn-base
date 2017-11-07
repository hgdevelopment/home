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
				<div class="panel-heading font-bold"> <?php if(trim($__env->yieldContent('edit_id'))): ?> Edit Deduction <?php else: ?> Add Deduction <?php endif; ?> </div>
				<div class="panel-body">
					<?php if(trim($__env->yieldContent('edit_id'))): ?>
					<form role="form" method="post" action="<?php echo e(URL::to('/')); ?>/hr/master/deduction/<?php echo $__env->yieldContent('edit_id'); ?>" enctype="multipart/form-data" data-parsley-validate>
					<?php else: ?>
						<form role="form" method="post" action="<?php echo e(URL::to('/')); ?>/hr/master/deduction" enctype="multipart/form-data" data-parsley-validate>
						<?php endif; ?>
						<?php echo e(csrf_field()); ?>

						<?php $__env->startSection('edit'); ?>
						<?php echo $__env->yieldSection(); ?>
							<div class="col-md-12">
								<div class="col-md-4">
									<label>Type Of Deduction:</label>
									<input type="text" name="deduction" id="deduction" class="form-control" value="<?php echo $__env->yieldContent('deduction'); ?>" placeholder="Enter Type Of Deduction" required data-parsley-required-message="Please Enter Type Of Deduction" >
									<?php if($errors->has('deduction')): ?>
										<span class="help-inline" style="color: red;"><?php echo e($errors->first('deduction')); ?></span>
									<?php endif; ?>
								</div>
								<div class="col-md-4">
									<label>Amount:</label> 
									<input type="text" name="amount" id="amount" class="form-control" value="<?php echo $__env->yieldContent('amount'); ?>" placeholder="Enter Amount" data-parsley-type="number" required data-parsley-required-message="Please Enter Amount" >
									<?php if($errors->has('amount')): ?>
										<span class="help-inline"><?php echo e($errors->first('amount')); ?></span>
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
				<div class="panel-heading font-bold">View Deduction</div>
				<div class="table-responsive" style="overflow-x: initial;">
					<table class="table table-striped b-t">
						<thead>
							<tr>
								<th>SI.No</th>
								<th>Type Of Deduction</th>
								<th>Amount</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							<?php $__currentLoopData = $Deduction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $deduct): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> 
								<tr data-expanded="true">
									<td><?php echo e($key+1); ?></td>
									<td><?php echo e($deduct->type_of_deduction); ?></td> 
									<td><?php echo e($deduct->amount); ?></td> 
									<td>
										<a href="<?php echo e(URL::to('/')); ?>/hr/master/deduction/<?php echo e($deduct->id); ?>/edit" class="active"><i style="color: #018001;" class="fa fa-pencil text-success text-active" aria-hidden="true"></i></a> 
										
										
										
										<button class="active" style="border: none;" onclick="destroy(<?php echo e($deduct->id); ?>)"><i style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></button>
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
				  url: "<?php echo e(URL::to('/')); ?>/hr/master/deduction/"+id,
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
	  			swal("cancelled","","error");
	  		}
	  	});
  	}
</script> 
<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>