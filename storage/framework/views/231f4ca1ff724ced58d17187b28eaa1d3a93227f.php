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
	<h1 class="m-n font-thin h3">Complaint Handling</h1>
</div>
<form action="<?php echo e(URL::to('/')); ?>/admin/enquiryhandling" method="post">
	<?php $__currentLoopData = $enquiryreg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enquiryregs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="wrapper-md">
		<div class="row">
			<div class="col-sm-12">
				<div class="blog-post">                   
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading ">                  
								Complaint Details
							</div>
							<div class="panel-body">
								<?php echo e(csrf_field()); ?>

								<input type="hidden" name="enquiryid" id="enquiryid" value="<?php echo e($enquiryId); ?>">
								<div class="col-md-3">
									<label><strong>MEMBER CODE</strong></label><br>
									<label><?php echo e($enquiryregs->membercode); ?></label>
								</div>
								<div class="col-md-3">
									<label><strong>CATEGORY</strong></label><br>
									<label><?php echo e($enquiryregs->category_name); ?></label>
								</div>
								<div class="col-md-3">
									<label><strong>DATE</strong></label><br>
									<label><?php echo e($enquiryregs->date); ?></label>
								</div>
								<div class="col-md-3">
									<label><strong>COMPLAINT STATUS</strong></label><br>
									<label><?php echo e($enquiryregs->status); ?></label>
								</div>
								<div class="col-md-12"> <br> </div>
								<div class="col-md-3">
									<label> <strong>DESCRIPTION</strong></label><br>
									<label><?php echo e($enquiryregs->description); ?></label>
								</div>
								<div class="col-md-3">
									<label><strong>SUGGESTED SOLUTION</strong></label><br>
									<label><?php echo e($enquiryregs->suggestion); ?></label>
								</div>
								<div class="col-md-3">
									<label> <strong>RECEIVED BY</strong></label><br>
									<label>Ms.Molly Thomas</label>
								</div>
								<div class="col-md-3">
									<label><strong>BRANCH</strong></label><br>
									<label>HEERA GROUP CORPORATE HOUSE</label>
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
								<div class="col-md-4">
									<label><strong>NAME</strong></label><br>
									<label><?php echo e($enquiryregs->name); ?></label>
								</div>
								<div class="col-md-4">
									<label><strong>EMAIL</strong></label><br>
									<label><?php echo e($enquiryregs-> email); ?></label>
								</div>
								<div class="col-md-4">
									<label><strong>MOBILE</strong></label><br>
									<label><?php echo e($enquiryregs->mobile); ?></label>
								</div>
								<div class="col-md-12"><br></div>
								<div class="col-md-12"><br></div>
								<div class="col-md-4">
									<label><strong>ASSIGNED TO</strong></label><br>
									<input type="text" name="assignedto" id="assignedto" value="<?php echo e($enquiryregs->employee_code); ?>"  class="form-control" placeholder="Assigned To" required>
								</div>
								<div class="col-md-4">
									<button name="submit" type="submit"  value="submit" class="btn btn-sm btn-success" style="margin-top:10%;">submit</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</form>                    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>