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
    .leave{
    background-color: #ffe4e2;
    padding-right: 20px;
    padding-top: 20px;
    }
    .holiday{
    background-color: #dcc8ff;
    padding-right: 20px;
    padding-top: 20px;
    }
    .fullday{
    background-color: #ddfbbb;
    padding-right: 20px;
    padding-top: 20px;

    }
    .halfday{ 
    background-color: #fffaca;
    padding-top: 20px;
    padding-right: 20px;
    }
</style>
      <div class="col-md-12" align="left"> 

     

      <div class="col-sm-6" style="margin-top: 10px;">
          <div class="panel panel-default" style="border: none;">
            <div class="panel-heading">
              <div class="clearfix">
                <div class="clear">
                  <div class="h3 m-t-xs m-b-xs">
                    Weekoff Requests
                  </div>
                 
                </div>
              </div>
            </div>
            <form action="<?php echo e(URL::to('admin/attendance/approve')); ?>" method="post">
              <?php echo e(csrf_field()); ?>

            <div class="list-group no-radius alt">
              
              <?php $__currentLoopData = $reviews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $review): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li class="list-group-item">
                <input type="checkbox" name="list[]" value="<?php echo e($review->id); ?>" > 
                <?php echo e($review->staff->name); ?> is Requested for <strong><?php echo e($review->requestto); ?></strong> on <strong><?php echo e($review->date); ?></strong>
                <span class="editt" style="border: 1px solid #d4d4d4;border-radius: 3px;padding:0px 3px;" data-toggle="modal" data-target="#myModal<?php echo e($review->$id); ?>">info</span>
              </li>

              <div class="modal fade" id="myModal<?php echo e($review->$id); ?>" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Request from <?php echo e($review->staff->name); ?> </h4>
                    </div>
                    <div class="modal-body">
                     <?php echo e($review->note); ?> 
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                  
                 </div>
                 </div>

              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
            <button name="mode" value="approve" class="btn btn-success">Approve</button>
            <button name="mode" value="reject" class="btn btn-danger">Reject</button>
            </form>
          </div>
         
        </div>


       </div>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('jquery'); ?>
<script>
  $('#form').parsley();
  $('#form1').parsley();
</script>			
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>