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

<style type="text/css">
	
	ul#parsley-id-7 {
    position: absolute;
    padding-top: 34px;
}
</style>
<div class="bg-light lter b-b wrapper-md">
	<h1 class="m-n font-thin h3">Visitor Registration</h1>
</div><br>
<form   method="post"  name="visitor" id="visitor" action="<?php echo e(URL::to('/')); ?>/hr/visitor/visitor_registration"  data-parsley-validate >
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
							VISITOR REGISTRATION
						</div>
						<div class="panel-body">
							<div class="col-sm-6">
								<label>Name:<span class="required" style="color:red">*</span></label>
							<div class="input-group">
				                <span class="input-group-addon" id="basic-addon1" style="border: 0px;    padding: 0px;">
				                	<select class="form-control" name="salutation" id="salutation" style="color: #000;padding: 0px;min-width: 50px;">
					                <option value="Mr.">Mr.</option>
					                <option value="Ms.">Ms.</option>
					                <option value="Mrs.">Mrs.</option>
				              </select></span>
				              <input type="text" class="form-control" id="name" name="name" required data-parsley-required-message="Please Type Name"  placeholder="Name" >
	              			</div>
	              			</div>
	              			<div class="col-sm-6">
								<label>Mobile Number:<span class="required" style="color:red">*</span></label>
								<input type="text" id="mobile" placeholder="Mobile Number" name="mobile"   class="form-control" data-parsley-type="digits" data-parsley-maxlength="16" data-parsley-minlength="1" data-parsley-minlength-message="Please Enter valid phone no" data-parsley-maxlength-message="Please enter valid phone no" required/>
							</div>
							<div class="col-sm-12"></div><br>							
							<div class="col-sm-6">
								<label>Email:</label>
								<input type="text" id="email"  placeholder="email" name="email"   class="form-control" data-parsley-type-message="Please Enter valid email"/>
							</div>
							<div class="col-sm-6">
								<label>Purpose Of Visit:<span class="required" style="color:red">*</span></label>
								<input type="text" id="purpose" required data-parsley-required-message="Please Enter Purpose"  placeholder="Purpose" name="purpose"   class="form-control"/>
							</div>
							<div class="col-sm-12"></div><br>
							<div class="col-sm-6">
								<label>Whom to Visit:<span class="required" style="color:red">*</span></label>
								<input type="text" id="whom_to_visit" required data-parsley-required-message="Please Enter Whom To Visit"  placeholder="Whom To Visit" name="whom_to_visit"   class="form-control"/>
							</div>
							<div class="col-sm-6">
								<label>Address:<span class="required" style="color:red">*</span></label>
								<textarea class="form-control" name="address"  required data-parsley-required-message="Please Enter Address" id="address" placeholder="Address"></textarea>
							</div>
							<div class="col-sm-6">
								<label style="margin-top: -34px !important;">Remarks:</label>
								<textarea class="form-control" name="remarks" style="margin-top: -4px;"  id="remarks"  placeholder="Remarks"></textarea>
							</div>
							<div class="col-sm-12"></div><br>
							<div class="col-sm-6">
								<label></label><br>
								<input type="submit"  name="submit" id="submit"  value="register"  class="btn btn-sm btn-success" >
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form> 
<?php if(Session()->has('visitor')): ?>
<div class="row">
	<div class="col-sm-12">
		<div class="blog-post">                   
			<div class="col-sm-12">
				<div class="panel panel-default">
					<div class="panel-heading font-bold">Added details</div>
					<div class="panel-body">
						<div class="row">
							<div class="table-responsive">
								<table class="table" id="view">
									<thead>
										<tr>
											<th>Visitor Name</th>
											<th>Date</th>
											<th>Time</th>
											<th>Mobile</th>
											<th>Purpose</th>
											<th>Whom To Visit</th>							          
											<th>Address</th>
											<th>Remarks</th>
																					
										</tr>
									
									</thead>
									<tbody>
									<?php $__currentLoopData = Session()->get('visitor'); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $visitors): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<tr>
											<td><?php echo e($visitors->visitor_salutation.$visitors->visitor_name); ?></td>
											<td><?php echo e(date('d-m-Y',strtotime($visitors->created_at))); ?></td>
											<td><?php echo e(date('g:i:a',strtotime($visitors->created_at))); ?></td>
											<td><?php echo e($visitors->visitor_mobile); ?></td>							      
											<td><?php echo e($visitors->visitor_purpose); ?></td>
											<td><?php echo e($visitors->whom_to_visit); ?></td>
											<td><?php echo e($visitors->visitor_address); ?></td>
											<td><?php echo e($visitors->remarks); ?></td>
											
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

<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>