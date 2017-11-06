<?php $__env->startSection('banner'); ?>
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
  <img src="<?php echo e(URL::asset('new_heading.png')); ?>" class="img-responsive">
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('web.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('web.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>

   <div class="bg-light lter b-b wrapper-md">
    <h1 class="m-n font-thin h3">Partial Withdrawal </h1>
  </div>

  <div class="wrapper-md">
  <div class="line line-dashed b-b line-lg pull-in"></div>
  <div class="col-md-12"><br></div>
    <div class="panel panel-default">
      <div class="panel-heading ">                  
      ACTIVE TCN
      </div>
     
    <div class="panel-body">
    <div class="row">
      <div class="table-responsive">
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="emp" style="border:none;">
          <thead>
            <tr>
            <th>Sl No</th>
            <th>Tcn Name</th>
            <th>Tcn Code</th>
            <th>Trade Units</th>
            <th>Balance Units</th>
            <th>Trade Amount</th>
            <th>Currrency</th>
            <th>Approved Date </th>
            <th>Actions</th>
            </tr>
          </thead>
          <?php $sl=1;?>
          <tbody>
            <?php $__currentLoopData = $tcn_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $result): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($sl++); ?></td>
              <td><?php echo e($result->tcnType); ?></td>
              <td><?php echo e($result->tcnCode); ?></td>
              <td><?php echo e($result->unit); ?></td>
              <?php 
              $row=\DB::table('withdrawalrequests')->where('tcnId','=',$result->id)->where('status','=','Paid')
              ->select( DB::raw('sum(unit) as total'))
              ->get();
              foreach($row as $rows)
              $wunit=$rows->total;?>
              <td><?php echo e($result->unit-$wunit); ?></td>
              <td><?php echo e($result->amount); ?></td>
              <td><?php echo e($result->currencyType); ?></td>
              <td><?php echo e(date('d-m-Y',strtotime($result->approvalDate))); ?></td>
              <td>
                <?php
                $unlockdate = strtotime(date("Y-m-d", strtotime($result->paymentReceivedDate)) . " +".$result->lockingDuration." month");
                $unlockdate = date("Y-m-d", $unlockdate);?>
                <?php if($unlockdate>date("Y-m-d")): ?>
              <?php echo e("Locking Duration Not Completed"); ?>

               <?php else: ?>  
              <a href="<?php echo e(url('/web/partialWithdraw',$result->id)); ?>" class="btn btn-danger" >withdraw</a><?php endif; ?>
              </td>
           </tr>
           <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
    </div>
  <br>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">

  $(document).ready(function(){
        $('#emp').DataTable();
        });
      
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout.erp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>