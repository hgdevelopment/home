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
	<h1 class="m-n font-thin h3">View Visitors</h1>
</div>
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
						<div class="panel-heading font-bold">VIEW VISITORS</div>
						<div class="panel-body" >
							<div class="row">
								<div class="table-responsive" style="padding: 7px;">
									<table class="table" id="view">
										<thead>
											<tr>
												<th>Sl No</th>
												<th>Visitor Name</th>
												<th>Date</th>
												<th>Time</th>
												<th>Mobile</th>
												<th>Purpose</th>
												<th>Whom To Visit</th>							          
												<th>Address</th>
												<th>Remarks</th>
												<th>Added By</th>
												<th>Action</th>
											</tr>
										<?php  $i = 1;  ?>
										</thead>
										<tbody>
										<?php $__currentLoopData = $visitor; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visitors): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<td><?php echo e($i++); ?></td>
												<td><?php echo e($visitors->visitor_salutation.$visitors->visitor_name); ?></td>
												<td><?php echo e(date('d-m-Y',strtotime($visitors->created_at))); ?></td>
												<td><?php echo e(date('g:i:a',strtotime($visitors->created_at))); ?></td>
												<td><?php echo e($visitors->visitor_mobile); ?></td>							      
												<td><?php echo e($visitors->visitor_purpose); ?></td>
												<td><?php echo e($visitors->whom_to_visit); ?></td>
												<td><?php echo e($visitors->visitor_address); ?></td>
												<td><?php echo e($visitors->remarks); ?></td>
												<td><?php echo e($visitors->username); ?></td>
												<td>
												<a href="<?php echo e(URL::to('/')); ?>/hr/visitor/edit_visitor_registration/<?php echo e($visitors->id); ?>"  class="active"><i  style="color: #018001;" class="fa fa-pencil text-success text-active" aria-hidden="true"></i></a>
												<form method="post" id="delete_form"  action="<?php echo e(URL::to('/')); ?>/hr/visitor/visitor_registration/<?php echo e($visitors->id); ?>" style="float:left; padding-right:10px;">
												<?php echo e(method_field('DELETE')); ?>

												<?php echo e(csrf_field()); ?>

												<input type="hidden" name="_method" value="DELETE">
												<button id="delete-btn" type="submit" class="active" style="border: none;">
												<i style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></button> 
												</form> 
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