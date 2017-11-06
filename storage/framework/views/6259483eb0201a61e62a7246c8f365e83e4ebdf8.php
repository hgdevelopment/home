<?php


use App\hr_salary_allowance as allowance;
use App\hr_emp_personal_details as employee;

use App\User;
use App\hr_company;
use App\hr_branch;
?>
<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" cellpadding="0" width="100%" id="table"  >
    <thead>
      <tr style="background-color: #ffe4c4;">
		<th>S&nbsp;NO</th>
		<th>EMP CODE</th>
		<th>NAME</th>
		<th>SALARY</th>
		<th>OVER TIME</th>
		<th>TOTAL SALARY</th>
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



		</td>
		<td>ot</td>
		<td>total</td>
		</tr>
		<?php $i++;?>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>