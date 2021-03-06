<?php $__env->startSection('banner'); ?>
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
            <img src="<?php echo e(URL::to('/')); ?>/new_heading.png" class="img-responsive">
         </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 <?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php  
use \App\Http\Controllers\Controller;
 ?>

<?php $__env->startSection('body'); ?>

<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-normal h3"><?php echo e($Title); ?></h1>
</div>

<div class="wrapper-md" ng-controller="FormDemoCtrl">

		<div class="panel panel-default">
			<div class="panel-heading font-bold">TCN PAYMENT VERIFICATION</div>
			<div class="panel-body">
				<div class="col-sm-12">
					<div class="row">
					<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" cellpadding="0" width="100%" id="table"  >
				        <thead>
				          <tr>
							<th>S&nbsp;NO</th>
							<th>MEMBER CODE</th>
							<th>NAME</th>
							<th>AMOUNT</th>
							<th>APPLIED DATE</th>
							<th>TCN TYPE</th>
							<th>STATUS</th>
							<th>ACTION</th>
						  </tr>
				        </thead>
				        <tbody>
							<?php $i=1;?>
							<?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<tr data-expanded="true">
							<td align="center"><?php echo e($i); ?></td>
							<td><?php echo e($detail->code); ?></td>
							<td><?php echo e($detail->name); ?></td>
							<td><?php echo e($detail->amount); ?></td>
							<td><?php echo e(date('d-m-Y',strtotime($detail->created_at))); ?></td>
							<td><?php echo e($detail->tcn->tcnType); ?></td>

							<td align="center" style="padding: 2px !important">
							<div style="color:black;background:<?php if($detail->status=='Applied'): ?><?php echo e('yellow'); ?><?php elseif($detail->status=='Paid'): ?><?php echo e('#63ce63'); ?><?php else: ?> <?php echo e('#f67979'); ?><?php endif; ?>">
							<?php echo e($detail->status); ?>


							</div>
							<?php echo e(date('d-m-Y h:i:A',strtotime($detail->approvalDate))); ?>

							</td>


							<td style="cursor:pointer">
								<div class="btn-group dropdown">
								  <button class="btn btn-default btn-sm" data-toggle="dropdown">Action <span class="caret"></span></button>
								  <ul class="dropdown-menu  dropdown-menu-right">
								    <li>
										<a href="<?php echo e(URL::to('/')); ?>/admin/tcnFullWithDrawal/<?php echo e('view@@@'); ?><?php echo e($detail->withDrawId); ?>" >View</a>
								    </li>
								  	<?php if($detail->status=='Applied' &&  Controller::UserAccessRights('TCN WithDraw Approval')=='1' ): ?>
								    <li>
										<a href="<?php echo e(URL::to('/')); ?>/admin/tcnFullWithDrawal/<?php echo e($detail->withDrawId); ?>/edit">Paid</a>
								    </li>
								    <?php endif; ?>
								    <?php if($detail->status=='Applied' &&  Controller::UserAccessRights('TCN WithDraw Cancel')=='1' ): ?>
								    <li>
										<a onclick="CancelRequest('<?php echo e($detail->tcnId); ?>','<?php echo e($detail->withDrawId); ?>')">Cancel</a>
								    </li>
								    <?php endif; ?>
								  </ul>
								</div>
							</td>
							</tr>
							<?php $i++;?>
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
$('#table').dataTable();
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>