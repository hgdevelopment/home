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
		<h1 class="m-n font-thin h3">View Approved Partial Withdrawal Request</h1>
	</div><br>

		<form action="<?php echo e(URL::to('/')); ?>/admin/partialWithdraw/viewapprove" method="post" enctype="multipart/form-data" data-parsley-validate >
	<?php echo e(csrf_field()); ?>

		<div class="wrapper-md">
		<div class="row">
			<div class="col-sm-12">
				<div class="blog-post">                   
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading ">                  
								View Approved Partial Withdrawal Request
							</div>
							<?php 
							$tcnmaster=DB::table('tcnmasters')->get();
        					$Year =DB::table('logins')->select(DB::raw('YEAR(updated_at) as year'))->groupBy('year')->get();  
							?>
							<div class="panel-body">
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" id="token">
							<div class="col-sm-4">
								<label>Year<span class="required" style="color:red">*</span></label>
								<select name="year" id="year" class="  form-control"  required>
									<option value=" ">select</option>
									<?php $__currentLoopData = $Year; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<option  value="<?php echo e($Year->year); ?>"><?php echo e($Year->year); ?></option>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select>
							</div>
							<div class="col-sm-4">
								<label>Month<span class="required" style="color:red">*</span></label>
								<select  class="form-control" name="month" id="month" required>
									<option value="">select</option>
									<option value="1">January</option>
									<option value="2">February</option>
									<option value="3">March</option>
									<option value="4">April</option>
									<option value="5">May</option>
									<option value="6">June</option>
									<option value="7">July</option>
									<option value="8">August</option>
									<option value="9">September</option>
									<option value="10">October</option>
									<option value="11">November</option>
									<option value="12">December</option>
								</select>
							</div>
							<div class="col-sm-4">
								<label>TCN</label>
								<select   class="form-control"   name="tcn" id="tcn" >
									<option value="">select</option>
									<?php $__currentLoopData = $tcnmaster; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tcnmasters): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								    <option value="<?php echo e($tcnmasters->id); ?>"><?php echo e($tcnmasters->tcnType); ?></option>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</select><br>
							</div>
							<div class="col-sm-12"><br></div>
							
							<div class="col-sm-6 col-md-offset-5">
								<input type="submit"  name="submit" id="submit"  value="SEARCH"  class="btn btn-sm btn-success" style=" width:25%">
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</form>
<?php if(isset($approve)): ?>

	<div class="wrapper-md">
		<div class="row">
			<div class="col-sm-12">
				<div class="blog-post">                   
					<div class="col-sm-12">
						<div class="panel panel-default">
						<div class="panel-heading font-bold">Approved Partial Withdrawal 
						<form  style="float: right" method="post" action="<?php echo e(url('/admin/partialWithdrawexcel')); ?>">
						<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
						<input type="hidden" name="hidden_year" id="hidden_year" value="<?php echo e($year); ?>">
						<input type="hidden" name="hidden_month" id="hidden_month" value="<?php echo e($month); ?>">
						<input type="hidden" name="hidden_tcn" id="hidden_tcn" value="<?php echo e($tcn); ?>">
						
						 <button type="submit"><i class="fa fa-file-excel-o" style="font-size:18px;color:red"></i></button>
						 </form>
						</div>
						
							<div class="panel-body">
								<div class="row">
									<div class="table-responsive" style="padding: 7px;">
										<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"  id="view">
											<thead>
												<tr>
													<th>Sl No</th>
													<th>Name</th>
													<th>IBG Number</th>
													<th>TCN Code</th>
													<th>TCN </th>
													<th>Unit</th>
													<th>Amount</th>
													<th>Applied Date</th>
													<th>Approved Date</th>
													<th>View</th>
												</tr>
											<?php $i = 1; ?>
											</thead>
											<tbody>
											<?php $__currentLoopData = $approve; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $approves): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
												<tr>
													<td><?php echo e($i++); ?></td>
													<td><?php echo e($approves->name); ?></td>
													<td><?php echo e($approves->code); ?></td>
													<td><?php echo e($approves->tcnCode); ?></td>
													<td><?php echo e($approves->tcnType); ?></td>
													<td><?php echo e($approves->unit); ?></td>
													<td><?php echo e($approves->amount); ?></td>
													<td><?php echo e(date('d-m-Y',strtotime($approves->appliedDate))); ?></td>
													<td><?php echo e(date('d-m-Y',strtotime($approves->approvalDate))); ?></td>
													<td><a href="<?php echo e(url('/admin/partialWithdrawapproveview',$approves->id)); ?>" class="btn btn-info" >View</a></td>
												</tr>
											<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>  
		</div>
	</div>
<?php endif; ?>                                   
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">
$(document).ready(function(){
$('#view').DataTable();
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>