<?php $__env->startSection('title','Appointment Letter'); ?>
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
    <h1 class="m-n font-thin h3">Appointment Letter View</h1>
  </div> 
  <br/><br/>
  <div class="col-sm-12">
    <div class="panel panel-default">
      <div class="panel-heading font-bold">Appointment Letter</div>
      <div class="panel-body">
        <iframe src="<?php echo e(URL::to('/')); ?>/hr/employee/appointment/pdf/<?php echo e($letter->code); ?>" width="100%" height="800"></iframe>
      </div> 
    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>