<?php $__env->startSection('banner'); ?>
  <div class="col-lg-12" align="center" style="background-color:#ffcf29">
  <img src="<?php echo e(URL::asset('img/new_heading.png')); ?>" class="img-responsive">
  </div> 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sidebar'); ?>
  <?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
  <div class="bg-light lter b-b wrapper-md">
    <h1 class="m-n font-thin h3">Generate Appointment Letter</h1> 
  </div>
<div class="col-md-12"><br>
  <div class="panel panel-default"> 
    <div class="panel-heading font-bold">
    </div>
    <div class="panel-body">
        <form name="" method="POST" action="<?php echo e(URL::to('/')); ?>/hr/employee/createAppointment" enctype="multipart/form-data" data-parsley-validate>
          <?php echo e(csrf_field()); ?>

        <div class="col-md-12">
          <div class="col-md-6">    
            <div class="form-group">
              <label>Employee Code :<span style="color: red;">*</span></label>
              <input type="text" name="employeecode"  id="employeecode" class="form-control" placeholder="Enter Employee Code"  required data-parsley-required-message="Please Enter Employee Code" data-parsley-trigger="keyup" value="<?php echo $__env->yieldContent('employeecode'); ?>"> 
              <?php if($errors->has('employeecode')): ?>
                <span class="help-inline" style="color: red;"><?php echo e($errors->first('employeecode')); ?></span>
              <?php endif; ?>
            </div>
          </div>
          
          <div class="col-md-1">
            <div class="form-group text-right "><br>
              <input type="submit" name="submit" value="Submit" class="btn btn-success">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div> 
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<?php if(session()->has('sweet_alert.title')): ?>
<script type="text/javascript">
  swal('record not found','info');
</script>
<?php endif; ?>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>