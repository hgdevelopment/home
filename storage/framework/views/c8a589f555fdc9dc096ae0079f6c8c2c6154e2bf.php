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
		<h1 class="m-n font-thin h3">Member's Account</h1>
		<h6 class="m-n font-thin h5">View account details of TCN members</h6>
	</div>
	<div class="wrapper-md">
		<div class="line line-dashed b-b line-lg pull-in"></div>
		<div class="col-md-12"><br></div>
		<div class="panel panel-default">
		<div class="panel-heading">
							Pending Approvals
						</div>
						<div class="panel-body">
						<div class="row">
			<div class="table-responsive" style="overflow-x: initial;padding: 7px;">

				<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"  id="view">
					<thead>
						
						<tr>
							<th>Sl No</th>
							<th>TCN Name</th>
							<th>Units</th>
							<th>Amount</th>
							<th>Currrency</th>
							<th>Approved Date</th>
						</tr>
					</thead>
					<tbody>
						<?php $__currentLoopData = $tcnpending; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tcnacc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($key+1); ?></td>
								<td><?php echo e($tcnacc->tcn->tcnType); ?></td>
								<td><?php echo e($tcnacc->unit); ?></td> 
								<td><?php echo e($tcnacc->amount); ?></td>
								<td><?php echo e($tcnacc->currencyType); ?> </td>
								<td><?php echo e(date("Y-m-d",strtotime($tcnacc->approvalDate))); ?></td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
				</div>
				</div>
				<br>
				<br>
				</div></div>
				<div class="panel panel-default">
				<div class="panel-heading">
							Active TCN
						</div>
						<div class="panel-body">
						<div class="row">
			<div class="table-responsive" style="overflow-x: initial;padding: 7px;">
				<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="viewReq">
					<thead>
						
						<tr>
							<th>Sl No</th>
							<th>TCN Name</th>
							<th>Units</th>
							<th>Amount</th>
							<th>Currrency</th>
							<th>Approved Date</th>
						</tr>
					</thead>
					<tbody>
						<?php $__currentLoopData = $tcnactive; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tcnacc): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($key+1); ?></td>
								<td><?php echo e($tcnacc->tcn->tcnType); ?></td>
								<td><?php echo e($tcnacc->unit); ?></td>
								<td><?php echo e($tcnacc->amount); ?></td>
								<td><?php echo e($tcnacc->currencyType); ?> </td>
								<td><?php echo e(date("Y-m-d",strtotime($tcnacc->approvalDate))); ?></td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
				</div>
				</div>
				<br>
				<br>
				</div></div>
				<div class="panel panel-default">
			<div class="table-responsive" style="overflow-x: initial;">
				<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"  id="views">
					<thead>
						<div class="panel-heading">
							<h3 class="m-n font-thin h3">Withdrawn TCN</h3>
							Normal Withdrawal
						</div>
						<tr>
							<th>Sl No</th>
							<th>TCN Type</th>
							<th>Units</th>
							<th>Amount</th>
							<th>Currrency</th>
							<th>Approved Date</th>
							<th>view</th>
						</tr>
					</thead>
					<tbody>
						<?php $__currentLoopData = $tcnwithdrawal; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $tcnwithdraw): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($key+1); ?></td> 
								<td><?php echo e($tcnwithdraw->type); ?></td>
								<td><?php echo e($tcnwithdraw->unit); ?></td>
								<td><?php echo e($tcnwithdraw->amount); ?></td>
								<td><?php echo e($tcnwithdraw->currencyType); ?></td>
								<td><?php echo e(date("Y-m-d",strtotime($tcnwithdraw->approvalDate))); ?></td>
								<td> 
								<a href="<?php echo e(URL::to('/')); ?>/admin/tcnFullWithDrawal/<?php echo e('view@@@'); ?><?php echo e($tcnwithdraw->id); ?>"  class="active"><i style="color: #018001;" class="fa fa-eye" aria-hidden="true"></i></a>
								</td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
			</div>
		</div> 
		<div class="panel panel-default">
			<div class="table-responsive" style="overflow-x: initial;">
				<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"  id="viewRequest">
					<thead>
						<div class="panel-heading">
							Partial Withdrawal
						</div>
						<tr>
							<th>Sl No</th>
							<th>TCN Type</th>
							<th>Units</th>
							<th>Amount</th> 
							<th>Currrency</th>
							<th>Approved Date</th>
							<th>Withdraw Date</th>
							<th>view</th> 
						</tr>
					</thead>
					<tbody>
						<?php $__currentLoopData = $tcnpartial; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $partial): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr>
								<td><?php echo e($key+1); ?></td>
								<td><?php echo e($partial->type); ?></td>
								<td><?php echo e($partial->unit); ?></td>
								<td><?php echo e($partial->amount); ?></td>
								<td><?php echo e($partial->currencyType); ?></td>
								<td><?php echo e(date("Y-m-d",strtotime($partial->approvalDate))); ?></td> 
								<td><?php echo e(date("Y-m-d",strtotime($partial->withDrawPayedDate))); ?></td> 
								<td> 
								<a href="<?php echo e(URL::to('/')); ?>/admin/partialWithdraw/viewapprove"  class="active"><i style="color: #018001;" class="fa fa-eye" aria-hidden="true"></i></a>
								</td>
							</tr>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</tbody>
				</table>
			</div>
		</div> 
		<div class="row">
    <div class="col-sm-12" ><br></div>
    <div class="form-group">
      <div class="col-sm-5 "><br></div> 
      <div class="col-sm-3">
        <a href="<?php echo e(URL::to('/')); ?>/admin/added"><button type="button" class="btn btn-info">Back</button></a>
      </div>
    </div>
    <div class="col-sm-12" ><br></div>
  </div>
	</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">
$(document).ready(function()
	{
	$('#viewRequest').DataTable();
	});
$(document).ready(function()
	{
	$('#viewReq').DataTable();
	});
$(document).ready(function()
	{
	$('#view').DataTable();
	});
$(document).ready(function()
	{
	$('#views').DataTable();
	});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>