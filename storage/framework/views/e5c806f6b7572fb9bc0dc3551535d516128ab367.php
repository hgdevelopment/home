<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">

<?php $__env->startSection('banner'); ?>
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
<img src="<?php echo e(URL::asset('new_heading.png')); ?>" class="img-responsive">
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
	<div class="bg-light lter b-b wrapper-md">
		<h1 class="m-n font-thin h3">Enquiry Registration</h1>
	</div>
	<form action="<?php echo e(URL::to('/')); ?>/admin/enquiryreg" method="POST" enctype="multipart/form-data" data-parsley-validate>
	<?php echo e(csrf_field()); ?>

	<?php $__env->startSection('edit'); ?>
	<?php echo $__env->yieldSection(); ?>
	<?php if(Session()->has('message')): ?>
        <div class="alert alert-info fade in alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong>Info!</strong> <?php echo e(Session()->get('message')); ?>

        </div>
    <?php endif; ?>
	<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" id="token">
	<div class="wrapper-md">
		<div class="row">
			<div class="col-sm-12">
				<div class="blog-post">                   
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading ">                  
								Enquiry Registration
							</div>
							<div class="panel-body">
								<div class="col-sm-6">
									<label>Category</label>
									<select   class="form-control"  required data-parsley-required-message="Please Select Category"  name="category" id="category" >
										<option value="">select</option>
										<?php $__currentLoopData = $categorymaster; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorymasters): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									    <option value="<?php echo e($categorymasters->id); ?>"><?php echo e($categorymasters->category_name); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select><br>
								</div>
								
								<div class="col-sm-6">
									<label>Date</label>
									<input type="text" id="datepicker" required data-parsley-required-message="Please Select Date"  name="date" class="form-control" />
								</div>

								<div class="col-sm-6"><br></div>
								<div class="col-sm-6">
									<label>Description</label>
									<textarea  class="form-control" name="description" id="description" required data-parsley-required-message="Please Enter Description" placeholder="Description" rows="1" data-parsley-minlength="20"></textarea>
								</div>

								<div class="col-sm-12"><br></div>

								<div class="col-sm-6">
									<label>Member Code</label>
									<input type="text" name="membercode" required data-parsley-required-message="Please Enter Member Code" id="membercode" class="form-control" placeholder="" required> 
									<span id="error_member_code"></span>
								</div>

								<div class="col-sm-6">
									<label></label>
									<input type="button" style="margin-top:7%;" name="viewdetails" id="viewdetails"  value="View Details"  class="btn btn-sm btn-info" >
								</div>
							</div>
							<div class="panel-body">
								<div class="col-sm-12" id="suggestion">
									<label>Suggestions</label>
									<textarea  class="form-control" name="suggestion" id="suggestion" placeholder="" required data-parsley-required-message="Please Enter Suggestions"  data-parsley-minlength="20"></textarea><br>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="AjaxLoad">
	</div>

	<div class="wrapper-md">
		<div class="row">
			<div class="col-sm-12">
				<div class="blog-post">                   
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading ">                  
								COMPLAINT REPORTED BY
							</div>
							<div class="panel-body">
								<div class="col-sm-4">
									<label>Name*</label>
									<input type="text" name="name" id="name" value="" class="form-control" placeholder="" required>
								</div>

								<div class="col-sm-4">
									<label>Email*</label>
									<input type="email" name="email" id="email" value="" class="form-control" placeholder="" data-parsley-trigger="change" data-parsley-required-message="Please enter email" data-parsley-type-message="Please enter valid email" required> <br>
								</div>

								<div class="col-sm-4">
									<label>Mobile*</label>
									<input type="number" name="mobile" id="mobile" value="" class="form-control" placeholder="" data-parsley-maxlength="12" data-parsley-minlength="10" data-parsley-minlength-message="Please enter valid phone no" data-parsley-maxlength-message="Please enter valid phone no" required> <br>
								</div>
								
								<div class="col-sm-4">
									<label></label><br>
									<button name="submit" type="submit" id="submit" value="submit" class="btn btn-sm btn-success">submit</button>
								</div>
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
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script>
	$( function() {
/*		$( "#datepicker" ).datepicker();*/
		$( "#tcndetails" ).show();
	});
	$("#viewdetails").click(function()
	{
		membercode = $("#membercode").val();
			$('#AjaxLoad').html('');
			token = $("#token").val();
			$.ajax({
				type: "POST",
				url: "<?php echo e(URL::to('/')); ?>/admin/enquiry/enquiryreg/tcn",
				data: ({"id": membercode, "_token": "<?php echo e(csrf_token()); ?>"}),
				success:function(data)
				{
					//alert(data);
					$('#AjaxLoad').append(data);
				}
			});

	});
</script>

<script type="text/javascript">
$(function() {
$( "#datepicker").datepicker({changeMonth: true, changeYear: true, dateFormat: 'dd-mm-yy', yearRange: 'c-80:c'});
});
</script>

<?php $__env->stopSection(); ?>
 
<?php echo $__env->make('layout.erp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>