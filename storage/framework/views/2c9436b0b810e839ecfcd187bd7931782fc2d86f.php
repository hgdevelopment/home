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
  <h1 class="m-n font-thin h3">Employee Id Card</h1> 
</div>
<div class="wrapper-md" ng-controller="FormDemoCtrl">
  <div class="row">   
    <div class="col-md-12"><br>
      <div class="panel panel-default"> 
        <div class="panel-heading font-bold">Create Employee Id Card</div>
        <div class="panel-body">
          <form name="" method="POST" action="<?php echo e(URL::to('/')); ?>/hr/employee/generateIdcard" enctype="multipart/form-data" data-parsley-validate>
          <?php echo e(csrf_field()); ?>

            <div class="col-md-12">
              <div class="col-md-6">    
                <div class="input-group">
                  <input type="text" class="form-control" name="employee_code[]" id="employee_code" required>
                  <span class="input-group-btn">
                    <button name="add_more" value="Add More" class="btn btn-info" id="add_more" type="button">Add More</button>
                  </span>
                </div>
              </div>
            </div>
            <div class="col-md-12"><br></div>
            <div class="col-md-12">
              <div id="added" class="col-md-6"></div>
            </div>
            <div class="col-md-12">
              <div class="col-md-12">
                  <input type="submit" name="submit" value="Submit" class="btn btn-success">
              </div>
            </div>
          </form>
        </div>
      </div>  
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">
  $(document).ready(function() {
    var max_fields = 50;
    var x = 1;
    $("#add_more").click(function(e)
    {
      
      e.preventDefault();
      if(x < max_fields)
      {
        x++;
        $("#added").append('<div class="input-group"><input type="text" class="form-control" name="employee_code[]" id="employee_code"><span class="input-group-btn"><button name="remove_field" value="Delete" class="btn btn-danger" id="remove_field" type="button" style="margin-top:-10%">Delete</button></span><br></div>'); //add input box
      }
    });

    $("#added").on("click", "#remove_field", function() {
      $(this).closest("div").remove();
      x--;
    });
  });
</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>