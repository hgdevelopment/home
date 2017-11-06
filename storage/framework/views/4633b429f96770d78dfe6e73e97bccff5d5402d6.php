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
	<h1 class="m-n font-thin h3">Resignation Report</h1>
</div>
	<br>
	<form action="<?php echo e(URL::to('/')); ?>/hr/resignation/view" method="post" enctype="multipart/form-data" data-parsley-validate >
	<?php echo e(csrf_field()); ?>

		<div class="row">
			<div class="col-sm-12">
				<div class="blog-post">                   
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading ">                  
								Resignation Report
							</div>
							<div class="panel-body">
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" id="token">
							<div class="col-sm-4">
								<label>From Date<span class="required" style="color:red">*</span></label>
								<input type="text" id="datepicker"  placeholder="MM/DD/YYYY"  name="date" id="date" class="form-control" required/>
							</div>
							<div class="col-sm-4">
								<label>To Date<span class="required" style="color:red">*</span></label>
								<input type="text" id="datepicker1"  placeholder="MM/DD/YYYY"  name="date1" id="date1" class="form-control" required/>
							</div>
							<div class="col-sm-4">
								<label>Status<span class="required" style="color:red">*</span></label>
								<select  class="form-control js-example-basic-single" name="status" id="status" data-parsley-required-message="Please Select Status" required>
									<option value="">select</option>
									<option value="approved">approved</option>
									<option value="rejected">rejected</option>
								</select><br>
							</div>
							<div class="col-sm-6 col-md-offset-5">
								<input type="submit"  name="submit" id="submit"  value="Submit"  class="btn btn-sm btn-success" style=" width:25%">
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form> 

	<?php if(isset($report)): ?>
	  
	<div class="row">
		<div class="col-sm-12">
			<div class="blog-post">                   
				<div class="col-sm-12">
					<div class="panel panel-default">
						<div class="panel-heading font-bold">Resignation Report</div>
						<div class="panel-body">
							<div class="row">
								<div class="table-responsive" style="padding: 7px;">
									<table class="table table-striped table-bordered dt-responsive nowrap b-t" cellspacing="0" width="100%"  id="enquiryReport">
										<thead>
										<?php  $sl=1;  ?>
											<tr>
												<th>Sl No</th>
												<th>Employee Name</th>
												<th>Employee Code</th>
												<th>Applied Date</th>
												<th>Resign Date</th>
												<th>Status</th>
												<th>Approved/Rejected Date</th>
											</tr>
										</thead>
										<tbody>
										<?php $__currentLoopData = $report; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reports): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<td><?php echo e($sl++); ?></td>
												<td><?php echo e($reports->name); ?></td>
												<td><?php echo e($reports->username); ?></td>
												<td><?php echo e(date('d-m-Y',strtotime($reports->created_at))); ?></td>
												<td><?php echo e($reports->resign_date); ?></td>
												<td><?php echo e($reports->resign_status); ?></td>
												<td><?php echo e($reports->status_date); ?></td>
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
              
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script src="<?php echo e(URL::asset('js/bootstrap-datepicker.js')); ?>"></script>
<link rel="stylesheet" href="<?php echo e(URL::asset('css/bootstrap-datepicker.min.css')); ?>" type="text/css" />
<script src="<?php echo e(URL::asset('js/i18n/datepicker.en.js')); ?>"></script>
<script type="text/javascript">
  $(function()
  {
  $('#datepicker').datepicker({
  orientation:'bottom auto',
  autoclose:true
  });
  });
  $(function()
  {
  $('#datepicker1').datepicker({
  orientation:'bottom auto',
  autoclose:true
  });
  });
</script>

<script>
$(document).ready(function(){
$('#enquiryReport').DataTable();
});
</script>


<?php $__env->stopSection(); ?>


<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>