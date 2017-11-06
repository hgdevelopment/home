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

<form method="POST" action="<?php echo e(URL::to('/')); ?>/admin/partialWithdraw/viewData" >
  <div class="bg-light lter b-b wrapper-md">
    <h1 class="m-n font-thin h3">Partial Withdrawal Request</h1>
  </div>
  <!-- <form method="GET"> -->
  <?php echo e(csrf_field()); ?>

  
  <div class="col-md-12">
  <div class="col-md-4"></div>
  <div class="col-md-4"><br>
    <label>Member Code</label><br>
    <input type="text" name="member_code" id="member_code" class="form-control">
  </div>
  <div class="col-md-12"><br></div>
  <div class="col-md-4"></div>
  <div class="col-md-4">
    <button name="show" type="submit"  value="show" class="btn btn-sm btn-block btn-primary">show</button>   <br>
  </div>
</form>

  <?php if(isset($_REQUEST['show'])): ?>
  <div class="wrapper-md">
  <div class="line line-dashed b-b line-lg pull-in"></div>
  <div class="col-md-12"><br></div>
    <div class="panel panel-default">
      <div class="panel-heading ">                  
      Personal Details
      </div>
      <div class="panel-body">
        <div class="col-md-4">
          <label><b>MEMBER CODE:</b></label>
          <label><?php echo e($member_data->code); ?></label>
        </div>
        <div class="col-md-4">
          <label><b>NAME:</b></label>
          <label><?php echo e($member_data->name); ?></label>
        </div>
        <div class="col-md-4">
          <label><b>FATHER'S / HUSBAND'S NAME:</b></label>
          <label><?php echo e($member_data->guardian); ?></label>
        </div>
      </div>
      <div class="panel-body">
        <div class="col-md-4">
          <label><b>DATE OF BIRTH:</b></label>
          <label><?php echo e($member_data->dob); ?></label>
        </div>
        <div class="col-md-4">
          <label><b>MARITAL STATUS:</b></label>
          <label><?php echo e($member_data->maritalStatus); ?></label>
        </div>
      </div>
    </div>
  <br>
<div class="panel panel-default">
<div class="panel-heading font-bold"> ACTIVE TCN</div>
  <div class="panel-body">
    <div class="row">
      <div class="table-responsive">
        <table class="table" id="emp" style="border:none;">
          <thead>
            <tr>
            <th>Tcn Name</th>
            <th>Units</th>
            <th>Amount</th>
            <th>Currrency</th>
            <th>Approved Date </th>
            <th>Actions</th>
            </tr>
          </thead>
          <?php $sl=1;?>
          <tbody>
          <?php $__currentLoopData = $tcn_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tcn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($sl++); ?></td>
              <td><?php echo e($tcn->tcnType); ?></td>
              <td><?php echo e($tcn->unit); ?></td>
              <td><?php echo e($tcn->amount); ?></td>
              <td><?php echo e($tcn->currencyType); ?></td>
              <td><?php echo e($tcn->approvalDate); ?></td>
              <td><a href="<?php echo e(url('/admin/partialWithdraw',$tcn->id)); ?>" class="btn btn-danger" >withdraw</a></td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div> 
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script type="text/javascript"></script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.erp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>