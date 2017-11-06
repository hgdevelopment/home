<?php

use DB;
?>
<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" cellpadding="0" width="100%" id="table"  >
    <thead>
      <tr style="background-color: #ffe4c4;">
		<th>S&nbsp;NO</th>
		<th>EMP CODE</th>
		<th>NAME</th>
		<th>DESIGNATION</th>
		<th>ACTION</th>
	  </tr>
    </thead>
    
    <tbody>
    <?php if(count($employees)==0): ?>
    <tr >
    <td colspan="8" align="center">
	<span class="text-danger">No records found..</span>
	</td>
	</tr>
	<?php endif; ?>
		<?php $i=1;?>
		<?php $__currentLoopData = $employees; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $employee): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		<tr data-expanded="true">
		<td align="center"><?php echo e($i); ?></td>
		<td><?php echo e($employee->code); ?></td>
		<td><?php echo e($employee->salutation_name); ?> <?php echo e($employee->name); ?></td>
		<td>
		<?php 
			$d=DB::table('hr_designation')->select('designation_name')->where('id',$employee->designation_id)->first();
			echo $d->designation_name;
			 ?>
		</td>
		<td>

		<?php 
			$generated=DB::table('hr_salary_details')->where('employee_id',$employee->user_id)->where('month',$request->month.'-'.$request->year)->count();
		 ?>
		<?php if($generated>0): ?>
		<span class="text-danger">salary generated</span>
		<?php else: ?>
		<a href="<?php echo e(URL::to('/')); ?>/hr/salaryMaster/<?php echo e($employee->user_id); ?><?php echo e('@@'); ?><?php echo e($request->year); ?><?php echo e('@@'); ?><?php echo e($request->month); ?>" class="active"><i style="color: #018001;" class="fa fa-search" aria-hidden="true"></i></a>
		<?php endif; ?>
		</td>
		</tr>
		<?php $i++;?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>