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
    <h1 class="m-n font-thin h3">Religion  Master</h1>
  </div>
<div class="col-md-12"><br>
  <div class="panel panel-default">

      <div class="panel-heading font-bold"><?php if(trim($__env->yieldContent('edit_id'))): ?> Edit Religion <?php else: ?> Add Religion <?php endif; ?></div>

    <div class="panel-body">
      <?php if(trim($__env->yieldContent('edit_id'))): ?>
        <form role="form" method="post" action="<?php echo e(URL::to('/')); ?>/hr/master/religionmaster/<?php echo $__env->yieldContent('edit_id'); ?>" enctype="multipart/form-data" data-parsley-validate>
      <?php else: ?>
        <form name="" method="POST" action="<?php echo e(URL::to('/')); ?>/hr/master/religionmaster" enctype="multipart/form-data" data-parsley-validate>
      <?php endif; ?>
      <?php if(Session()->has('message')): ?>
        <div class="alert alert-info fade in alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong>Info!</strong> <?php echo e(Session()->get('message')); ?>

        </div>
        <?php endif; ?>
      <?php echo e(csrf_field()); ?>

      <?php $__env->startSection('edit'); ?>
      <?php echo $__env->yieldSection(); ?>
        <div class="col-md-12">
         
          <div class="col-md-6">
            <div class="form-group">
              <label>Religion  Name :<span style="color: red;">*</span></label>
              <input type="text" name="religion_name"  id="religion_name" class="form-control" placeholder="Enter Religion"  required data-parsley-required-message="Please Enter Religion" data-parsley-pattern="^[a-zA-Z0-9_ ]*$" value="<?php echo $__env->yieldContent('religion_name'); ?>"> 
              <?php if($errors->has('religion_name')): ?>
                    <span class="help-inline"><?php echo e($errors->first('religion_name')); ?></span>
              <?php endif; ?>
            </div>
          </div>
         <div class="col-md-12"></div>
          <div class="col-md-6">
            <div class="form-group"><br>
              <input type="submit" name="submit" value="Submit" class="btn btn-success">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


 <?php if(trim($__env->yieldContent('edit_id'))): ?>
  <?php else: ?>
    <div class="row">
      <div class="col-sm-12">
        <div class="blog-post">                   
          <div class="col-sm-12">
            <div class="panel panel-default">
              <div class="panel-heading font-bold">View Religion Master</div>
                <div class="panel-body">
                  <div class="row">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"  id="view">
                        <thead>
                          <tr>
                            <th>Sl No</th>
                            <th>Religion Name</th> 
                            <th>Action</th>      
                          </tr>
                        <?php $i = 1; ?>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $religion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $views): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <td><?php echo e($i++); ?></td>
                            <td><?php echo e($views->religion_name); ?></td>
                            <td>
                            <a id="edit" href="<?php echo e(URL::to('/')); ?>/hr/master/religionmaster/<?php echo e($views->id); ?>/edit"  class="active">
                              <i  style="color: #018001;" class="fa fa-pencil text-success text-active" aria-hidden="true"></i>
                            </a>
                            <form method="post" id="delete_form1"  action="<?php echo e(URL::to('/')); ?>/hr/master/religionmaster/<?php echo e($views->id); ?>" style="float:left; padding-right:10px;">
                              <?php echo e(method_field('DELETE')); ?>

                              <?php echo e(csrf_field()); ?>

                              <input type="hidden" name="_method" value="DELETE">
                              <button id="delete-btn1" type="submit" class="active" style="border: none;">
                              <i style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></button> 
                            </form>
                          </td>
                           
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
$(document).ready(function(){
$('#view').DataTable();
});
</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>