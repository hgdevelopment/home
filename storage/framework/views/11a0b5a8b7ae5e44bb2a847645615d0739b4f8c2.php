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

<link href="<?php echo asset('css/sweetalert.css'); ?>" media="all" rel="stylesheet" type="text/css" />
<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">Enquiry Category Master</h1>
</div>
<div class="wrapper-md" ng-controller="FormDemoCtrl">
  <div class="panel panel-default">
    <div class="panel-heading font-bold"><?php if(trim($__env->yieldContent('edit_id'))): ?> Edit Enquiry Category <?php else: ?> Add Enquiry Category <?php endif; ?></div>
    <div class="panel-body">
      <div class="row">
        <?php if(trim($__env->yieldContent('edit_id'))): ?>
        <form role="form" method="post" action="<?php echo e(URL::to('/')); ?>/admin/categorymaster/<?php echo $__env->yieldContent('edit_id'); ?>" data-parsley-validate  enctype="multipart/form-data">
        <?php else: ?>
         <?php if(Session()->has('message')): ?>
        <div class="alert alert-info fade in alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong>Info!</strong> <?php echo e(Session()->get('message')); ?>

        </div>
        <?php endif; ?>
        <form role="form" method="post" action="<?php echo e(URL::to('/')); ?>/admin/categorymaster" data-parsley-validate enctype="multipart/form-data">
         <?php endif; ?>
            
          <?php echo e(csrf_field()); ?>

              <?php $__env->startSection('edit'); ?>
              <?php echo $__env->yieldSection(); ?>
          <div class="col-md-10">
              <div class="row">
                  <div class="col-md-10">
                    <label>CATEGORY NAME*</label>
                    <textarea  class="form-control" name="category_name" id="category_name" required data-parsley-required-message="Please Enter Category Name"  value="<?php echo $__env->yieldContent('category_name'); ?>" data-parsley-pattern="^[a-zA-Z0-9_ ]*$" placeholder="Enter Your Category Name" ><?php echo $__env->yieldContent('category_name'); ?></textarea>
                    <?php if($errors->has('category_name')): ?>
                    <span class="help-inline"><?php echo e($errors->first('category_name')); ?></span>
                    <?php endif; ?>
                    <div class="col-md-10"><br></div>
                  </div>
                  <div class="form-group col-md-10">
                      <label>ASSIGN EMPLOYEE CODE *</label>
                       <input name="employee_code" type="text" id="employee_code" required data-parsley-required-message="Please Enter Employee Code" data-parsley-type="alphanum"  class="form-control" value="<?php echo $__env->yieldContent('employee_code'); ?>" placeholder="Employee Code" >
                       <?php if($errors->has('employee_code')): ?>
                      <span class="help-inline"><?php echo e($errors->first('employee_code')); ?></span>
                      <?php endif; ?>
                  </div>
             
                  <div class="col-md-10">
                    <input type="submit" name="submit"  value="Save" class="btn btn-success" >
                 </div> 
              </div>
        </form> 
      </div>
    </div>
  </div>
</div>

 <?php if(trim($__env->yieldContent('edit_id'))): ?>
  <?php else: ?>
  <div class="panel panel-default">
    <div class="panel-heading font-bold">View Enquiry Category</div>
    <div class="panel-body">
      <div class="row">
        <div class="table-responsive">
        <table class="table" id="categoryTable" style="border:none;">
               <thead>
                   <tr>
                      <th>Sl No</th>
                      <th>Category Name</th>
                      <th>Employee Code</th>
                      <th>Actions</th>
                  </tr>
                  
              </thead>
              <?php $sl=1;?>
              <tbody>
                <?php $__currentLoopData = $categorymaster; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $categorymasters): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($sl++); ?></td>
                  <td><?php echo e($categorymasters->category_name); ?></td>
                  <td><?php echo e($categorymasters->employee_code); ?></td>
                  <td>
                    <a href="<?php echo e(URL::to('/')); ?>/admin/categorymaster/<?php echo e($categorymasters->id); ?>/edit"  class="active">
                      <i  style="color: #018001;" class="fa fa-pencil text-success text-active" aria-hidden="true"></i>
                    </a>
                    <form method="post" id="delete_form"  action="<?php echo e(URL::to('/')); ?>/admin/categorymaster/<?php echo e($categorymasters->id); ?>" style="float:left; padding-right:10px;">
                      <?php echo e(method_field('DELETE')); ?>

                      <?php echo e(csrf_field()); ?>

                      <input type="hidden" name="_method" value="DELETE">
                      <button id="delete-btn" type="submit" class="active" style="border: none;">
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
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script type="text/javascript" src="<?php echo asset('js/sweetalert.min.js'); ?>"></script>
<script type="text/javascript">
$(document).ready(function(){
$('#delete-btn').on('click', function(e){
  e.preventDefault();
  var self = $(this);
  swal({

              title: "Are you sure?",
              text: "All the selected  incentive will be deleted also!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Yes, delete it!",
              closeOnConfirm: true
          },
          function(isConfirm){
              if(isConfirm){
                  swal("Deleted!","Incentive deleted", "success");
                  setTimeout(function() {
                      self.parents("#delete_form").submit();
                  });
              }
              else{
                  swal("cancelled","Your Incentive are safe", "error");
              }
          });
});
  $('#categoryTable').DataTable();
});
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layout.erp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>