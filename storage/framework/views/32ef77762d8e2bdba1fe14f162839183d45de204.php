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
    <h1 class="m-n font-thin h3">Approved Membership Requests</h1>
    <h6 class="m-n font-thin h5"></h6>
  </div>
  <div class="wrapper-md">
    <div class="line line-dashed b-b line-lg pull-in"></div>
    <div class="col-md-12"><br></div>
    <div class="panel panel-default">
      <div class="panel-heading">
              View Approved Members Requests
            </div>
    <div class="panel-body">
    <div class="row">
      <div class="table-responsive" style="overflow-x: initial;padding: 7px;">
        <table  class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="approveRequest" >
          <thead>
          
           <tr>
              <th>SlNo.</th>
              <th>Code</th>
              <th>Name</th>
              <th>Approved Date</th>
              <th>View</th>
            </tr>
          </thead>
          <tbody>
          <?php $__currentLoopData = $approvedlogin; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $members): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr> 
              <td><?php echo e($key+1); ?></td>
              <td><?php echo e($members->code); ?></td>
              <td><?php echo e($members->name); ?></td>
              <td><?php echo e(date("Y-m-d",strtotime($members->approvedDate))); ?></td>
              <td><a href="<?php echo e(URL::to('/')); ?>/admin/approve_member/<?php echo e($members->id); ?>"  class="active"><i style="color: #018001;" class="fa fa-search" aria-hidden="true"></i></a></td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
    </div>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">
$(document).ready(function()
{
  $('#approveRequest').DataTable();
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>