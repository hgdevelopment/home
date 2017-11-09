<link rel="stylesheet" href="/resources/demos/style.css">
<link href="<?php echo e(URL::asset('css/sweetalert.css')); ?>"></link>
<!-- include summernote css/js-->
<link href="<?php echo e(URL::asset('js/text-editor/dist/summernote.css')); ?>" rel="stylesheet">


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
	<h1 class="m-n font-thin h3">Resignation Letter</h1>
</div><br>
<form   method="post"  name="resignation" id="resignation" action="<?php echo e(URL::to('/')); ?>/hr/resignation/apply_resignation"  data-parsley-validate >
	<?php echo e(csrf_field()); ?>

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
						<div class="panel-heading ">                  
							RESIGNATION LETTER
						</div>
						<div class="panel-body">
							<div class="col-sm-4">
								<label>From:</label>
								<input type="text" id="from" required name="from" id="from" value="<?php echo e($user); ?>"   class="form-control" readonly/>
							</div>
							<div class="col-sm-4">
								<label>Resign On:<span class="required" style="color:red">*</span></label>
								<input type="text" id="resign_date" required data-parsley-required-message="Please Select Date"  placeholder="MM/DD/YYYY" name="resign_date"   class="form-control" readonly/>
							</div>
							<div class="col-sm-4">
								<label>Reason:<span class="required" style="color:red">*</span></label>
								<select type="text" id="resign_reason" required data-parsley-required-message="Please Select Reason"  placeholder="Reason" name="resign_reason"   class="form-control">
									<option value="">Select</option>	
									<option>New Job</option>
									<option>Marriage</option>
									<option>Higher Studies</option>
									<option>Others</option>
								</select>
							</div>
							<div class="col-sm-12">
								<label>Resign Letter:</label>
								<textarea name="reason" id="summernote" >Dear Madam,<br>
								I would like to inform you that I am resigning from my position as <?php echo e($logins->designation_name); ?> for the company.
								Thank you very much for the opportunities for professional and personal development that you have provided me.  I have enjoyed working for the company and appreciate the support provided me during my tenure with the company.
								If I can be of any help during this transition, please let me know.<br>
								Sincerely,<br>
								<?php echo e($logins->name); ?>

								</textarea>
							</div>
							<div class="col-sm-12"></div><br>
							<div class="col-sm-6">
								<label></label><br>
								<input type="submit"  name="submit" id="submit"  value="apply"  class="btn btn-sm btn-success" >
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form> 
<?php if(isset($count) && $count>0): ?>
	<div class="row">
			<div class="col-sm-12">
				<div class="blog-post">                   
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading font-bold">View Resignation Status</div>
								<div class="panel-body">
									<div class="row">
										<div class="table-responsive" style="padding: 7px;">
											<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"  id="view">
												<thead>
													<tr>
														<th>Sl No</th>
														<th>Applied Date</th>
														<th>Resign Date</th>
														<th>Reason</th>
														<th>Status</th>
						
													</tr>
												<?php $i = 1; ?>
												</thead>
												<tbody>
                                                <?php if(isset($resign)): ?>
												<?php $__currentLoopData = $resign; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $resigns): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
													<tr>
														<td><?php echo e($i++); ?></td>													
														<td><?php echo e(date('d-m-Y',strtotime($resigns->created_at))); ?></td>
														<td><?php echo e($resigns->resign_date); ?></td>
														<td><?php echo e($resigns->resign_reason); ?></td>
														<?php 
														if ($resigns->resign_status == "approved") 			  
															$color = "success";
														elseif ($resigns->resign_status == "rejected") 
															$color = "danger";
														
														else
														$color = "info";							
														 ?>
														<td><span style="width: 100px;height: 25px;padding-bottom: 22px;padding-top: 0px;" class="btn btn-<?php echo $color;?>"><?php echo e($resigns->resign_status); ?></span></td>														
													</tr>
												<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                                <?php endif; ?>
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
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script src="<?php echo e(URL::asset('js/text-editor/dist/summernote.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/bootstrap-datepicker.js')); ?>"></script>
<link rel="stylesheet" href="<?php echo e(URL::asset('css/bootstrap-datepicker.min.css')); ?>" type="text/css" />
<script src="<?php echo e(URL::asset('js/i18n/datepicker.en.js')); ?>"></script>
<script>
	$(function()
	{
		$('#summernote').summernote({
			tabsize: 2,
            height: 200
		});
		$('#resign_date').datepicker
		({
			orientation:'bottom auto',
			autoclose:true
		});
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>