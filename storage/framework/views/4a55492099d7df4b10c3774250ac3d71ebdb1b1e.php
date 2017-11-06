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
	<h1 class="m-n font-thin h3">View Resignation</h1>
</div><br>
<?php if(Session()->has('message')): ?>
<div class="alert alert-info fade in alert-dismissable">
	<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
	<strong>Info!</strong> <?php echo e(Session()->get('message')); ?>

</div>
<?php endif; ?>

	<div class="row">
		<div class="col-sm-12">
			<div class="blog-post">                   
				<div class="col-sm-12">
					<div class="panel panel-default">
						<div class="panel-heading font-bold">VIEW RESIGNATION</div>
						<div class="panel-body">
							<div class="row">
								<div class="table-responsive" style="padding: 7px;">
									<table class="table" id="view">
										<thead>
											<tr>
												<th>Sl No</th>
												<th>Employee Name</th>
												<th>Employee Code</th>
												<th>Applied Date</th>
												<th>Resign Date</th>
												<th>Reason</th>
												<th>Action</th>
												
											</tr>
										<?php  $i = 1;  ?>
										</thead>
										<tbody>
										<?php $__currentLoopData = $resign; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resigns): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<td><?php echo e($i++); ?></td>
												<td><?php echo e($resigns->name); ?></td>
												<td><?php echo e($resigns->username); ?></td>
												<td><?php echo e(date('d-m-Y',strtotime($resigns->created_at))); ?></td>
												<td><?php echo e(date('d-m-Y',strtotime($resigns->resign_date))); ?></td>						
												<td><?php echo e($resigns->resign_reason); ?></td>					  							 <td><a href="<?php echo e(url('/hr/resignation/approve',$resigns->id)); ?>"><i class="fa fa-check"  style="color: #018001;" aria-hidden="true"></i></a>&nbsp;&nbsp;
												<a href="<?php echo e(url('/hr/resignation/deny',$resigns->id)); ?>"><i class="fa fa-close" style="color: red;"  aria-hidden="true"></i></a></td>      	
											</tr>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
										</tbody>
									</table>
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
<script type="text/javascript">
$(document).ready(function(){
$('#view').DataTable();
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>