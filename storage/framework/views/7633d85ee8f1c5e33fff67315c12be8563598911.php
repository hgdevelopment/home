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
		<th>SALARY</th>
		<th>OVER TIME</th>
		<th>FINAl SALARY</th>
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

		<td><?php echo e(max($employee->final_salary - $employee->overtime_amount,0)); ?></td>
		<td><?php echo e($employee->overtime_amount); ?></td>
		<td><?php echo e($employee->final_salary); ?></td>


		<td>
		<a href="<?php echo e(URL::to('/')); ?>/hr/salaryMaster/<?php echo e($employee->user_id); ?><?php echo e('@@'); ?><?php echo e($request->year); ?><?php echo e('@@'); ?><?php echo e($request->month); ?>" class="active"><i style="color: #018001;" class="fa fa-search" aria-hidden="true"></i></a>
		</td>
		</tr>
		<?php $i++;?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>