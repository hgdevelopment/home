<?php $__env->startSection('banner'); ?>
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
<img src="<?php echo e(URL::asset('new_heading.png')); ?>" class="img-responsive">
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('web.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('web.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<div class="bg-light lter b-b wrapper-md">
	<h1 class="m-n font-thin h3">Enquiry Report</h1>
</div><br>
	<form action="<?php echo e(URL::to('/')); ?>/web/enquiry_report/view" method="post" enctype="multipart/form-data" data-parsley-validate >
	<?php echo e(csrf_field()); ?>

		<div class="row">
			<div class="col-sm-12">
				<div class="blog-post">                   
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading ">                  
								Enquiry Report
							</div>
							<div class="panel-body">
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" id="token">
							<div class="col-sm-4">
								<label>From Date<span class="required" style="color:red">*</span></label>
								<input type="text" id="datepicker"  placeholder="MM/DD/YYYY"  name="date" id="date" class="form-control"  data-parsley-required-message="Please Select Date" required/>
							</div>
							<div class="col-sm-4">
								<label>To Date<span class="required" style="color:red">*</span></label>
								<input type="text" id="datepicker1"  placeholder="MM/DD/YYYY"  name="date1" id="date1" class="form-control"  data-parsley-required-message="Please Select Date" required/>
							</div>
							<div class="col-sm-4">
								<label>Status<span class="required" style="color:red">*</span></label>
								<select  class="form-control js-example-basic-single" name="status" id="status" data-parsley-required-message="Please Select Status" required>
									<option value="">select</option>
									<option value="open">Register</option>
									<option value="close">Pending</option>
									<option value="done">Solved</option>
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
						<div class="panel-heading font-bold">Enquiry Report</div>
						<div class="panel-body">
							<div class="row">
								<div class="table-responsive">
									<table class="table"  id="enquiryReport">
										<thead>
										<?php $sl=1;?>
											<tr>
												<th>Sl No</th>
												<th>Member Code</th>
												<th>Name</th>
												<th>Status</th>
												<th>Solved Description</th>
												<th>Mobile</th>
												<th>Email</th>
											</tr>
										</thead>
										<tbody>
										<?php $__currentLoopData = $report; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reports): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<td><?php echo e($sl++); ?></td>
												<td><?php echo e($reports->membercode); ?></td>
												<td><?php echo e($reports->name); ?></td>
												<td><?php echo e($reports->status); ?></td>
												<td><?php echo e($reports->solveddescription); ?></td>
												<td><?php echo e($reports->mobile); ?></td>
												<td><?php echo e($reports->email); ?></td>
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


<?php echo $__env->make('web.layout.erp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>