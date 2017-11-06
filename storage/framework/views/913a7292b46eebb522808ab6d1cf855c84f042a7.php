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
    <h1 class="m-n font-thin h3">Company Master</h1>
  </div>
<div class="col-md-12"><br>
  <div class="panel panel-default">
    <div class="panel-heading font-bold">
      <?php if(trim($__env->yieldContent('edit_id'))): ?> Edit Company <?php else: ?> Add Company <?php endif; ?>
    </div>
    <div class="panel-body">
      <?php if(trim($__env->yieldContent('edit_id'))): ?>
        <form role="form" method="post" action="<?php echo e(URL::to('/')); ?>/hr/CompanyMaster/<?php echo $__env->yieldContent('edit_id'); ?>" enctype="multipart/form-data" data-parsley-validate>
      <?php else: ?>
        <form name="" method="POST" action="<?php echo e(URL::to('/')); ?>/hr/CompanyMaster" enctype="multipart/form-data" data-parsley-validate>
      <?php endif; ?>
      <?php echo e(csrf_field()); ?>

      <?php $__env->startSection('edit'); ?>
      <?php echo $__env->yieldSection(); ?>
        <div class="col-md-12">
          <div class="col-md-6">  
            <div class="form-group">
              <label>Company Name :<span style="color: red;">*</span></label>
              <input type="text" name="company_name"  id="company_name" class="form-control" placeholder="Enter Company Name"  required data-parsley-required-message="Please Enter Company Name"  data-parsley-pattern="/^[a-zA-Z_ ]*$/" data-parsley-trigger="keyup" value="<?php echo $__env->yieldContent('company_name'); ?>"> 
              <?php if($errors->has('company_name')): ?>
                <span class="help-inline" style="color: red;"><?php echo e($errors->first('company_name')); ?></span>
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
<div class="col-md-12"><br>
  <div class="panel panel-default">
    <div class="panel-heading font-bold">
      View Company
    </div>
    <div class="panel-body">
      <table class="table table-striped b-t b-light" id="empTable">
        <thead>
          <tr>
            <th>Sl</th>
            <th>Company Name</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $companys; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr data-expanded="true">
              <td><?php echo e($key+1); ?> </td>
              <td><?php echo e($company->company_name); ?> </td>
              <td>
                <a href="<?php echo e(URL::to('/')); ?>/hr/CompanyMaster/<?php echo e($company->id); ?>/edit"  class="active"><i  style="color: #018001;" class="fa fa-pencil text-success text-active" aria-hidden="true"></i></a>
                <button class="active" style="border: none;" onclick="Company_delete(<?php echo e($company->id); ?>)"><i  style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></button> 
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">
  $('.chosen-select').chosen({width:'100%'});
  function Company_delete(id)
  {
    swal({
      title: "Delete!!!",
      text: "Are you sure?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Delete",
      closeOnConfirm: true
    },function (isConfirm) 
    {
      if (isConfirm) 
      {
        $.ajax({
          url: '<?php echo e(URL::to('hr/CompanyMaster/')); ?>' + '/' + id,
          data: { "_token": "<?php echo e(csrf_token()); ?>" },
           type: "delete",
          success: function(data) {
          swal("Done!", "It was succesfully deleted!", "success");
          setTimeout(function() {
            window.location.href = "<?php echo e(URL::to('hr/CompanyMaster')); ?>";
          }, 2000);
          }
        });
      }
      else{
        swal("Done!", "It was succesfully deleted!", "success");
      }
    });
  }
</script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>