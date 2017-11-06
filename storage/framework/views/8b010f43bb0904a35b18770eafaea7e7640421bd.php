<table class="table" ui-options='{
"paging": {
"enabled": true
},
"filtering": {
"enabled": true
},
"sorting": {
"enabled": true
	}}' id="table">
	<thead>
		<tr>
		<th width="">S&nbsp;NO</th>
		<th width="" >&nbsp;CODE</th>
		<th width="">NAME</th>
		<th width="">TCN&nbsp;TYPE</th>
		<th width="">UNIT</th>
		<th width="">CURRENCY</th>
		<th width="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AMOUNT</th>
		<th width="">A/C NUMBER</th>
		<th width="">APPLIED</th>
		<th width="">APPROVED</th>
		<th width="">PAYMENT</th>
		<th width="">ACTION</th>
		</tr>
	</thead>
	
	<tbody>
		<?php $i=1;?>
		<?php $__currentLoopData = $details; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $detail): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr data-expanded="true">
		<td align="center"><?php echo e($i); ?></td>
		<td><?php echo e($detail->code); ?></td>
		<td align="left"><?php echo e($detail->name); ?></td>
		<td align=""><?php echo e($detail->tcn->tcnType); ?></td>
		<td align="center"><?php echo e($detail->unit); ?></td>
		<td align="center"><?php echo e($detail->currencyType); ?></td>
		<td align="right" style="padding-right: 30px"><?php echo e($detail->amount); ?></td>
		<td align="left"><?php echo e($detail->benefit->accountNumber); ?></td>
		<td align="left"><?php echo e(date('d-m-Y',strtotime($detail->addedDate))); ?></td>
		<td align="left"><?php echo e(date('d-m-Y',strtotime($detail->approvalDate))); ?></td>
		<td align="left"><?php echo e(date('d-m-Y',strtotime($detail->paymentReceivedDate))); ?></td>
		<td style="cursor:pointer">
		<a href="<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/<?php echo e('view@@@'); ?><?php echo e($detail->tcnId); ?>" class="active"><i style="color: #018001;" class="fa fa-search text-success text-active" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;
		 <a href="<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/<?php echo e($detail->tcnId); ?>/edit" class="active"><i class="fa fa-pencil text-danger text-active" aria-hidden="true"></i></a>    
		</td>
		</tr>
		<?php $i++;?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
	</tbody>
</table>