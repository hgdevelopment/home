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
	<h1 class="m-n font-thin h3">TCN Details</h1>
</div>
<div class="wrapper-md">
	<div class="row">
		<div class="col-sm-12">
			<div class="blog-post">                   
				<div class="col-sm-12">
					<div class="panel panel-default">
					<div class="panel-heading font-bold">TCN PAYMENT DETAILS</div>
						<div class="panel-body">
							<div class="row">
								<div class="table-responsive">
									<table class="table" ui-jq="footable" ui-options='{
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
												<th>Sl No</th>
												<th>Unit</th>
												<th>Amount</th>
												<th>Pay Mode</th>
												<th>Unit</th>
												<th>Amount</th>
											</tr>
											<?php $i = 1; ?>
										</thead>
										<tbody>
											<?php $__currentLoopData = $tcn1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tcns): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<td><?php echo e($i++); ?></td>
												<td><?php echo e($tcns->unit); ?></td>
												<td><?php echo e($tcns->amount); ?></td>
												<td><?php echo e($tcns->paymentMode); ?></td>
												<td><?php echo e($tcns->unit); ?></td>
												<td><?php echo e($tcns->amount); ?></td>
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
<div class="wrapper-md">
	<div class="row">
		<div class="col-sm-12">
			<div class="blog-post">                   
				<div class="col-sm-12">
					<div class="panel panel-default">
					<div class="panel-heading font-bold">PAYMENT DETAILS</div>
						<div class="panel-body">
							<div class="row">
								<div class="table-responsive">
									<table class="table" ui-jq="footable" ui-options='{
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
												<th>Sl No</th>
												<th>Bank Name</th>
												<th>Transaction Number</th>
												<th>Branch</th>
												<th>Pay Mode</th>
												<th>Payment Date</th>								                
												<th>Account Number</th>
											</tr>
											<?php $i = 1; ?>
										</thead>
										<tbody>
											<?php $__currentLoopData = $tcn2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tcns2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<td><?php echo e($i++); ?></td>
												<td><?php echo e($tcns2->bank); ?></td>
												<td><?php echo e($tcns2->transactionNumber); ?></td>
												<td><?php echo e($tcns2->branch); ?></td>
												<td><?php echo e($tcns2->payment_mode); ?></td>
												<td><?php echo e($tcns2->paymentDate); ?></td>
												<td><?php echo e($tcns2->accountNumber); ?></td>
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
<div class="wrapper-md">
	<div class="row">
		<div class="col-sm-12">
			<div class="blog-post">                   
				<div class="col-sm-12">
					<div class="panel panel-default">
					<div class="panel-heading font-bold">NOMINEE 1 DETAILS</div>
						<div class="panel-body">
							<div class="row">
								<div class="table-responsive">
									<table class="table" ui-jq="footable" ui-options='{
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
												<th>Sl No</th>
												<th>Name</th>
												<th>Date Of Birth</th>
												<th>Relation With Applicant</th>
												<th>Residential Address</th>
												<th>City</th>
												<th>Pin</th>
												<th>Mobile Number</th>
												<th>Email Id</th>
											</tr>
											<?php $i = 1; ?>
										</thead>
										<tbody>
											<?php $__currentLoopData = $tcn3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tcns): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<td><?php echo e($i++); ?></td>
												<td><?php echo e($tcns->name); ?></td>
												<td><?php echo e($tcns->dob); ?></td>
												<td><?php echo e($tcns->relationWithApplicant); ?></td>
												<td><?php echo e($tcns->address); ?></td>
												<td><?php echo e($tcns->city); ?></td>
												<td><?php echo e($tcns->pin); ?></td>
												<td><?php echo e($tcns->mobile); ?></td>
												<td><?php echo e($tcns->email); ?></td>
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
<div class="wrapper-md">
	<div class="row">
		<div class="col-sm-12">
			<div class="blog-post">                   
				<div class="col-sm-12">
					<div class="panel panel-default">
					<div class="panel-heading font-bold">NOMINEE 2 DETAILS</div>
						<div class="panel-body">
							<div class="row">
								<div class="table-responsive">
									<table class="table" ui-jq="footable" ui-options='{
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
												<th>Sl No</th>
												<th>Name</th>
												<th>Date Of Birth</th>
												<th>Relation With Applicant</th>
												<th>Residential Address</th>
												<th>City</th>
												<th>Pin</th>
												<th>Mobile Number</th>
												<th>Email Id</th>
											</tr>
											<?php $i = 1; ?>
										</thead>
										<tbody>
											<?php $__currentLoopData = $tcn4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tcns): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
											<tr>
												<td><?php echo e($i++); ?></td>
												<td><?php echo e($tcns->name); ?></td>
												<td><?php echo e($tcns->dob); ?></td>
												<td><?php echo e($tcns->relationWithApplicant); ?></td>
												<td><?php echo e($tcns->address); ?></td>
												<td><?php echo e($tcns->city); ?></td>
												<td><?php echo e($tcns->pin); ?></td>
												<td><?php echo e($tcns->mobile); ?></td>
												<td><?php echo e($tcns->email); ?></td>
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
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>