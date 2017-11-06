<?php $__env->startSection('banner'); ?>
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
<img src="<?php echo e(URL::asset('new_heading.png')); ?>" class="img-responsive">
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

<style type="text/css">
  .app-content{
  margin-left: 0px;
  }
  .app-header-fixed {
  padding-top: 0px;
  }
  .navbar-collapse, .app-content, .app-footer {
  margin-left: 0px;
  }
  span.help-inline{
  color:red;
  }
</style>
	
	<div class="bg-light lter b-b wrapper-md">
		<h1 class="m-n font-thin h3" >Enquiry Registration</h1>
		<div style="float: right;margin-top: -25px; font-size: 24px; color: #ffffff
"> <a href="<?php echo e(URL::to('/')); ?>">
        <button type="button" style="background-color: #4fd2f9; border: 0;
"><i class="icon-home"></i></button></a></div>
	</div>
 
	<form action="<?php echo e(URL::to('/')); ?>/enquiryreg" method="POST" enctype="multipart/form-data" data-parsley-validate id="form_member">
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
									<label>IBG Number<span class="required" style="color:red">*</span></label>
									<input type="text" name="membercode" required data-parsley-required-message="Please Enter Member Code" id="membercode" class="form-control" placeholder="" data-parsley-membercode data-parsley-trigger="input" >
								</div>
								
								<div class="col-sm-6">
									<label>Date</label>
									<input type="text"  value="<?php echo e(date('d-m-Y')); ?>" required data-parsley-required-message="Please Select Date"  name="date" class="form-control" readonly/>
								</div>

							
								<div class="col-sm-12"><br></div>
								<div class="col-sm-6">
									<label>Category<span class="required" style="color:red">*</span></label>
									<select   class="form-control"  required data-parsley-required-message="Please Select Category"  name="category" id="category" >
										<option value="">select</option>
										<?php $__currentLoopData = $categorymaster; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorymasters): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									    <option value="<?php echo e($categorymasters->id); ?>"><?php echo e($categorymasters->category_name); ?></option>
										<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									</select><br>
								</div>
								
								<div class="col-sm-6">
									<label>Description<span class="required" style="color:red">*</span></label>
									<textarea  class="form-control" name="description" id="description" required data-parsley-required-message="Please Enter Description" placeholder="Description" rows="1" ></textarea>
								</div>
								<div class="col-sm-12"><br></div>

								<div class="col-sm-6">
									<label>Suggestions<span class="required" style="color:red">*</span></label>
									<textarea  class="form-control" name="suggestion" id="suggestion" placeholder="" required data-parsley-required-message="Please Enter Suggestions"  ></textarea>
	
								</div>
							</div>
						
						</div>
					</div>
				</div>
			</div>
		</div>
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
									<label>Name<span class="required" style="color:red">*</span></label>
									<input type="text" name="name" id="name" value="" class="form-control" placeholder="" required >
								</div>

								<div class="col-sm-4">
									<label>Email<span class="required" style="color:red">*</span></label>
									<input type="email" name="email" id="email" value="" class="form-control" placeholder="" data-parsley-trigger="change" data-parsley-required-message="Please enter email" data-parsley-type-message="Please enter valid email" required > <br>
								</div>

								<div class="col-sm-4">
									<label>Mobile<span class="required" style="color:red">*</span></label>
									<input type="number" name="mobile" id="mobile" value="" class="form-control" placeholder="" data-parsley-maxlength="16" data-parsley-minlength="1" data-parsley-minlength-message="Please enter valid phone no" data-parsley-maxlength-message="Please enter valid phone no" required > <br>
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
<script src="<?php echo e(URL::asset('js/bootstrap-datepicker.js')); ?>"></script>
<link rel="stylesheet" href="<?php echo e(URL::asset('css/bootstrap-datepicker.min.css')); ?>" type="text/css" />
<script src="<?php echo e(URL::asset('js/i18n/datepicker.en.js')); ?>"></script>
<script>
  $(function()
  {

   	window.ParsleyValidator
	.addValidator('membercode', function (value, requirement) {
	
    var response = false;    
    $.ajax({
        url: "<?php echo e(route('web.validation.enquiry')); ?>",
        data: {membercode: value,_token:"<?php echo e(csrf_token()); ?>"},
        dataType: 'json',
        type: 'post',
        async: false,
        success: function(data) {
            // if you send something from the server, you might want to 
            // do some verification here
            response = true;
        },
        error: function() {
            response = false;
        }
    });

    return response;
}, 32)
.addMessage('en', 'membercode', 'memeber Code is invalid.');

$('#form_member').parsley();

  $('#datepicker').datepicker({
  orientation:'bottom auto',
  autoclose:true
  });
  });
</script>

<?php $__env->stopSection(); ?>
 
<?php echo $__env->make('web.layout.erp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>