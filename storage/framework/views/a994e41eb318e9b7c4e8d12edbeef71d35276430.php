<?php $__env->startSection('banner'); ?>
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
   <img src="<?php echo e(URL::asset('new_heading.png')); ?>" class="img-responsive">
</div>
<?php $__env->stopSection(); ?>
 <link href="<?php echo e(URL::asset('css/sweetalert.css')); ?>" rel="stylesheet">
<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
  <div class="bg-light lter b-b wrapper-md">
    <h1 class="m-n font-thin h3">DSA Withdrawal Request</h1>
    <h6 class="m-n font-thin h5">List DSA Withdrawal Request.</h6>
  </div>
  <div class="wrapper-md">
    <div class="line line-dashed b-b line-lg pull-in"></div>
    <div class="col-md-12"><br></div>
    <div class="panel panel-default">
      <div class="table-responsive" style="overflow-x: initial;padding: 7px;">
        <table class="table table-striped b-t" id="dsaRequest">
          <thead>
            <div class="panel-heading">
              View Dsa Withdrawal
            </div>
            <tr>
              <th>Sl No</th>
              <th>Name</th>
              <th>DSA Code</th>
              <th>MobileNumber</th>
              <th>View</th>
            </tr>
          </thead>
          <tbody>
          <?php $__currentLoopData = $dsa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $dsas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
             <td><?php echo e($key+1); ?></td>
             <td><?php echo e($dsas->name); ?></td>
             <td><?php echo e($dsas->code); ?></td>
             <td><?php echo e($dsas->mobileNumber); ?></td>
             <td>
             <a href="<?php echo e(URL::to('/')); ?>/admin/dsaWithdraw/<?php echo e($dsas->userId); ?>/edit"  class="active"><i  style="color: #018001;" class="fa fa-search text-success text-active" aria-hidden="true"></i></a>
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
  $(document).ready(function(){
  $('#dsaRequest').DataTable();
});
</script>
<?php if(Session::has('sweet_alert.alert')): ?>
  <script>
    swal
    ({
      text: "<?php echo Session::get('sweet_alert.text'); ?>",
      title: "<?php echo Session::get('sweet_alert.title'); ?>",
      timer: <?php echo Session::get('sweet_alert.timer'); ?>,
      type: "<?php echo Session::get('sweet_alert.type'); ?>",
      <?php  Session::forget('sweet_alert'); ?>
    });
  </script>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>