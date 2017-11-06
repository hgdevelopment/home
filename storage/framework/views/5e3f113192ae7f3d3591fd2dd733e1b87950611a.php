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
<link href="<?php echo asset('css/sweetalert.css'); ?>" media="all" rel="stylesheet" type="text/css" />
<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">Merge Members(Special Case)</h1>
</div><br>
<form  method="post" id="form" data-parsley-validate action="<?php echo e(URL::to('/')); ?>/admin/specialmerge">
  <?php echo e(csrf_field()); ?>

  <?php if(Session()->has('message')): ?>
    <div class="alert alert-info fade in alert-dismissable">
      <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
      <strong>Info!</strong> <?php echo e(Session()->get('message')); ?>

    </div>
  <?php endif; ?>
  <div class="wrapper-sm">
    <div class="row">
      <div class="col-sm-12">
        <div class="blog-post">                   
          <div class="col-sm-12"> 
            <div class="panel panel-default">
              <div class="panel-heading ">                  
               Merge Members(Special Case)
              </div>
              <div class="panel-body"> 
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" id="token">
                <div class="col-sm-4">
                  <label>Original Member Code</label>
                <input type="text" class="form-control" id="specialoriginal" name="specialoriginal">
                </div>
                 <div class="col-sm-4">
                  <label>Duplicate Member Code</label>
                <input type="text" class="form-control" id="specialduplicate" name="specialduplicate">
                </div>
                <div class="col-sm-4">
                 <label><br><br></label>
                  <input type="submit"  name="submit" id="submit"  value="Check"  class="btn btn-sm btn-success">
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
   <script>
   </script>
   <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>