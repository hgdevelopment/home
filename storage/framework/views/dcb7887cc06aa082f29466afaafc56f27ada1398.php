<?php 
use \App\Http\Controllers\Controller;
 ?>


	<form role="form" method="post" action="<?php echo e(URL::to('/')); ?>/hr/salaryMaster" id="form" data-parsley-validate>
			<?php echo e(csrf_field()); ?>


	<input type="hidden" name="company_id" id="company_id" value="<?php echo e($request->company_id); ?>">
			<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" cellpadding="0" width="100%" id="table"  >
				<thead>
					<tr style="background: bisque;"><th colspan="3">Company Name : <?php echo e(strtoupper($company->company_name)); ?></th></tr>
					<tr>
						<th bgcolor="cornsilk">Allowances</th>
						<th bgcolor="cornsilk">Percentage <span class="text-danger">%</span></th>
						<th bgcolor="cornsilk">Action</th>
					</tr>
				</thead>
				<body>
				<?php $i=1; ?>
					<?php $__currentLoopData = $salary_temp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $salary_temp): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>


						<?php if($request->type=='edit' && $request->id==$salary_temp->id): ?>

							<tr>
								<td><input type="text" class="form-control" name="allowances" id="allowances" value="<?php echo e($salary_temp->allowances); ?>" ></td>
								<td><input type="text" class="form-control" name="percentage" id="percentage" value="<?php echo e($salary_temp->percentage); ?>" ></td>
								<td style="background: whitesmoke;">
								<input type="button" class="btn btn-sm btn-warning" onclick="update_temp('<?php echo e($salary_temp->id); ?>','<?php echo e($request->company_id); ?>')" value="Save">
								</td>
							</tr>

						<?php else: ?>


						<tr>
							<td><?php echo e($salary_temp->allowances); ?></td>

							<td>
								<div class="text-right font-bold text-primary" style="width: 20px;float: left;padding-right: 2px"><?php echo e($salary_temp->percentage); ?></div>

								<div style="float: left"> %</div>

							</td>

							<td  style="background: whitesmoke;">
								<a onclick="change_temp('<?php echo e($salary_temp->id); ?>','edit','<?php echo e($request->company_id); ?>')" class="active" style="border: none;"><i class="fa fa-pencil text-success" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;

								<a onclick="change_temp('<?php echo e($salary_temp->id); ?>','delete','<?php echo e($request->company_id); ?>')" class="active" style="border: none;"><i style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></a>

							</td>

						</tr>
						<?php endif; ?>
						<?php
						 	$i++; 
						 	$totalPer=$totalPer+$salary_temp->percentage;
						 ?>

					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					<?php if($request->type!='edit'): ?>
					<?php if($totalPer<100): ?>
					<tr  style="background: whitesmoke;">
						<td>
						<input type="text" class="form-control" name="allowances<?php echo e($i); ?>" id="allowances<?php echo e($i); ?>" value="" placeholder="Allowances" >
						<span class="text-danger allowances">Enter Allowance Name</span>
						</td>
						<td>
						<input type="text" class="form-control" name="percentage<?php echo e($i); ?>" id="percentage<?php echo e($i); ?>" value="" placeholder="<?php echo e(100-$totalPer); ?>%">
						<span class="text-danger percentage">Enter Valuable Percentage</span>

						</td>

						<td><input type="button" class="btn btn-success" value="Add+" onclick="add_temp('<?php echo e($i); ?>')"></td>
					</tr>
					<?php endif; ?>
					<tr>
						<td colspan="3" align="center">
						<?php if($totalPer==100): ?>
						<input type="submit"  value="Save" class="btn btn-danger">
						<?php elseif($totalPer>100): ?>
						<span class="text-danger h3">Salary should not be more than 100%</span>
						<?php else: ?>
						<span class="text-primary h3">Sum should be equal to 100%</span>
						<?php endif; ?>
						</td>
					</tr>
					<?php endif; ?>
				</body>
			</table>
</form>
