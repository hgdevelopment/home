<?php 
use \App\Http\Controllers\Controller;
 ?>
<?php if($request->process=='withDrawTcnList'): ?>

<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="winRequest" ui-options='{
"paging": {
"enabled": true
},
"filtering": {
"enabled": true
},
"sorting": {
"enabled": true
}}'>
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

<?php endif; ?>



<?php if($request->process=='RequestResponse'): ?>
<form role="form" method="post" action="<?php echo e(URL::to('/')); ?>/admin/tcnApprove" id="form" data-parsley-validate >

<?php echo e(csrf_field()); ?>

		<input type="hidden" id="tcnId" name="tcnId" value="">
		<input type="hidden" id="paymentId" name="paymentId" value="">
		<div class="panel panel-default">
			<div class="panel-heading font-bold">TCN DETAILS</div>
			<div class="panel-body">
			  <div class="col-md-6 col-xs-12 divTableCell">Member&nbsp;Name<b class="data-lab"><?php echo e($members->name); ?></b></div> 
			   <div class="col-md-6 col-xs-12 divTableCell">Member Code<b class="data-lab"> <?php echo e($members->code); ?></b></div>
	              <div class="col-md-6 col-xs-12 divTableCell">Total&nbsp;Unit<b class="data-lab"><?php echo e($tcn->unit); ?></b></div>
	                <div class="col-md-6 col-xs-12 divTableCell">Total&nbsp;Amount<b class="data-lab"><?php echo e($tcn->amount); ?></b></div> 
	                 <div class="col-md-6 col-xs-12 divTableCell">Eligible Unit<b class="data-lab"><?php echo e($availUnit); ?></b></div>
	                   <div class="col-md-6 col-xs-12 divTableCell">Eligible&nbsp;Amount<b class="data-lab"><?php echo e($availAmount); ?></b></div>  
	                    <div class="col-md-6 col-xs-12 divTableCell">Amount<b class="data-lab"><?php echo e($withDraws->amount); ?></b></div>
	                    <div class="col-md-6 col-xs-12 divTableCell">Payment Received Date<b class="data-lab"><?php echo e(date('d-m-Y',strtotime($tcnrequests->paymentReceivedDate))); ?></b></div>

			</div>
		</div>
	</form>	
<?php endif; ?>
