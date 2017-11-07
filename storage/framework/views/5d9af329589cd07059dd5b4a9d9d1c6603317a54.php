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
  <h1 class="m-n font-thin h3">Partial Withdrawal Request</h1>
</div><br>
  <form  action="<?php echo e(URL::to('/')); ?>/admin/partialWithdraw/viewData"  method="post"  id="form" data-parsley-validate>
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
                Partial Withdrawal Request
              </div>
              <div class="panel-body">
              <input type="hidden" name="_token " value="<?php echo e(csrf_token()); ?>" id="token">
              <div class="col-sm-6">
                <label>Member Code </label>
                <input type="text" id="member_code" name="member_code" id="member_code" class="form-control" required/>
              </div>
            
              <div class="col-sm-6">
                <label>&nbsp;</label> <br>
                <input type="submit"  name="show" id="show"  value="show"  class="btn btn-sm btn-success">
              </div>
              </div>
            </div>
          </div>  
        </div>
      </div>
    </div>
  </div>
  </form> 


<?php if($count>0): ?>
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
          <label><?php echo e($datas->code); ?></label>
        </div>
        <div class="col-md-4">
          <label><b>NAME:</b></label>
          <label><?php echo e($datas->name); ?></label>
        </div>
        <div class="col-md-4">
          <label><b>FATHER'S / HUSBAND'S NAME:</b></label>
          <label><?php echo e($datas->guardian); ?></label>
        </div>
      </div>
      <div class="panel-body">
        <div class="col-md-4">
          <label><b>DATE OF BIRTH:</b></label>
          <label><?php echo e($datas->dob); ?></label>
        </div>
        <div class="col-md-4">
          <label><b>MARITAL STATUS:</b></label>
          <label><?php echo e($datas->maritalStatus); ?></label>
        </div>
     
      </div>
    </div>
  <br>
<div class="panel panel-default">
<div class="panel-heading font-bold"> ACTIVE TCN</div>
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
              <th>Status</th>
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
                <?php echo e("Locking Duration  Completed"); ?> 
                <?php endif; ?>
              </td>
              <td><a href="<?php echo e(url('/admin/partialWithdraw',$result->id)); ?>" class="btn btn-danger" >withdraw</a> </td>
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
<script type="text/javascript">

  $(document).ready(function(){
        $('#emp').DataTable();
        });
      
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>