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
		<h1 class="m-n font-thin h3">View Partial Withdrawal</h1>
	</div>
	<?php if(Session()->has('message')): ?>
	<div class="alert alert-info fade in alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
		<strong>Info!</strong> <?php echo e(Session()->get('message')); ?>

	</div>
	<?php endif; ?>
	<div class="wrapper-md">
		<div class="row">
			<div class="col-sm-12">
				<div class="blog-post">                   
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading font-bold">View Partial Withdrawal</div>
								<div class="panel-body">
									<div class="row" style="padding: 7px;">
										<div class="table-responsive">
											<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"  id="view">
												<thead>
													<tr>
														<th>Sl No</th>
														<th>User Name</th>
														<th>IBG Number</th>
														<th>TCN Code</th>
														<th>TCN </th>
														<th>Unit</th>
														<th>Amount</th>
														<th>Applied Date</th>
														<th>Actions</th>
													</tr>
												<?php $i = 1; ?>
												</thead>
												<tbody>
												<?php $__currentLoopData = $view; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $views): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<tr>
														<td><?php echo e($i++); ?></td>
														<td><?php echo e($views->name); ?></td>
														<td><?php echo e($views->code); ?></td>
														<td><?php echo e($views->tcnCode); ?></td>
														<td><?php echo e($views->tcnType); ?></td>
														<td><?php echo e($views->unit); ?></td>
														<td><?php echo e($views->amount); ?></td>
														<td><?php echo e(date('d-m-Y',strtotime($views->appliedDate))); ?></td>
														

														<td>
															<div class="btn-group dropdown">
															<button class="btn btn-default btn-sm" data-toggle="dropdown">Action <span class="caret"></span></button>
																<ul class="dropdown-menu dropdown-menu-right" >
																	<li>
																		<a href="<?php echo e(url('/admin/partialWithdrawviewing',$views->id)); ?>" >View
																		</a>
																	</li>
																	<li>
																		<a href="<?php echo e(url('/admin/partialWithdrawview',$views->id)); ?>" >Approve
																		</a>
																	</li>
																	<li>
																		<a href="<?php echo e(url('/admin/partialWithdrawedit',$views->id)); ?>" >Edit
																		</a>
																	</li>
																	<li>
																		<a href="<?php echo e(url('/admin/partialWithdraw/deny',$views->id)); ?>" >Cancel
																		</a>
																	</li>
																</ul>
															</div>
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
	</div>                                      
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">
$(document).ready(function(){
$('#view').DataTable();
});
</script>
<?php if(Session()->has('pdf_id')): ?>
<script type="text/javascript">
 window.location.href='<?php echo e(URL::to('/')); ?>/admin/partialWithdraw/pdf/<?php echo e(Session()->get('pdf_id')); ?>';

</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>