<link rel="stylesheet" href="/resources/demos/style.css">
<link href="<?php echo e(URL::asset('css/sweetalert.css')); ?>"></link>

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
<link rel="stylesheet" href="<?php echo e(URL::asset('js/multiselect_datepicker/datepicker.min.css')); ?>" type="text/css" />

<style>
	.datepicker > div {
		display: block;
	}
</style>
<div class="bg-light lter b-b wrapper-md">
	<h1 class="m-n font-thin h3">Apply Leave</h1>
</div><br>
	<form   method="post" data-parsley-validate >
	<?php echo e(csrf_field()); ?>

	
		<div class="row">
			<div class="col-sm-12">
				<div class="blog-post">                   
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading ">                  
							APPLY LEAVE 
							</div>
							<div class="panel-body">
							<div class="col-sm-6">
								<label>Reporting To:</label>
								<input type="text" id="reporting_to"  required  name="reporting_to" class="form-control" readonly />
							</div>
							<div class="col-sm-6">
								<label>From:</label>
								<input type="text" id="from" required name="from" id="from"    class="form-control" readonly />
							</div>
							
							<div class="col-sm-6">
								<label>Reason:</label>
								<input type="text" id="reason"  required name="reason" id="reason"    class="form-control" />
							</div>
				
							<div class="col-sm-6">
								<label>Full Day Leave Dates:</label>
								 <input type="text" class="form-control datepicker-here" name='halfday' data-language='en' data-multiple-dates="30" data-multiple-dates-separator=", " data-position='top left'/>
							</div>
		
							<div class="col-sm-6">
								<label>Half Day Leave Dates:</label>
								<input type="text" class="form-control datepicker-here" name='halfday' data-language='en' data-multiple-dates="30" data-multiple-dates-separator=", " data-position='top left'/>
							</div>
							

							<div class="col-sm-6"><br>
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
            

<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script src="<?php echo e(URL::asset('js/sweetalert.min.js')); ?>"></script>





<script src="<?php echo e(URL::asset('js/multiselect_datepicker/datepicker.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/i18n/datepicker.en.js')); ?>"></script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>