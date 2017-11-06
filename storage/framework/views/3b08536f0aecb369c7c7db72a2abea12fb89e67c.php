<?php $__env->startSection('banner'); ?>
	<div class="col-lg-12" align="center" style="background-color:#ffcf29">
		 <img src="<?php echo e(URL::to('/')); ?>/new_heading.png" class="img-responsive">
	</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
	<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
	<?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('body'); ?>
<div class="bg-light lter b-b wrapper-md">
	<h1 class="m-n font-thin h3">TCN Status</h1> <br>
	<h6 class="m-n font-thin h5">Check the TCN status here.</h6>
</div>
<div class="wrapper-md" id="wrapper-md" ng-controller="FormDemoCtrl">
	<div class="panel panel-default">
		<div class="panel-heading font-bold">TCN status</div>
		<form action="<?php echo e(URL::to('/')); ?>/admin/tcnstatus" method="POST"  id="form" data-parsley-validate role="form">
			<?php echo e(csrf_field()); ?>

			<div class="panel-body">
				<div class="col-sm-3">
					<label>Month*</label>
					<select name="month" id="month" class="  form-control" required>
						<option value=" ">--select--</option>
						<option <?php if($request->month=='01'): ?><?php echo e('selected'); ?> <?php endif; ?> value="01">Jan</option>
						<option <?php if($request->month=='02'): ?><?php echo e('selected'); ?> <?php endif; ?>  value="02">Feb</option>
						<option <?php if($request->month=='03'): ?><?php echo e('selected'); ?> <?php endif; ?>  value="03">March</option>
						<option <?php if($request->month=='04'): ?><?php echo e('selected'); ?> <?php endif; ?>  value="04">April</option>
						<option <?php if($request->month=='05'): ?><?php echo e('selected'); ?> <?php endif; ?>  value="05">May</option>
						<option <?php if($request->month=='06'): ?><?php echo e('selected'); ?> <?php endif; ?>  value="06">June</option>
						<option <?php if($request->month=='07'): ?><?php echo e('selected'); ?> <?php endif; ?>  value="07">July</option>
						<option <?php if($request->month=='08'): ?><?php echo e('selected'); ?> <?php endif; ?>  value="08">Aug</option>
						<option <?php if($request->month=='09'): ?><?php echo e('selected'); ?> <?php endif; ?>  value="09">Sept</option>
						<option <?php if($request->month=='10'): ?><?php echo e('selected'); ?> <?php endif; ?>  value="10">Oct</option>
						<option <?php if($request->month=='11'): ?><?php echo e('selected'); ?> <?php endif; ?>  value="11">Nov</option>
						<option <?php if($request->month=='12'): ?><?php echo e('selected'); ?> <?php endif; ?>  value="12">Dec</option>
					</select>
				</div> 
				<div class="form-group col-sm-3">
					<label>Year*</label>
					<select name="year" id="year" class="  form-control"  required>
						<option value="">--select--</option>
						<?php 
						$a =DB::table('logins')->select(DB::raw('YEAR(updated_at) as year'))->groupBy('year')->get();   
						$b =DB::table('logins')->select(DB::raw('YEAR(created_at) as year'))->groupBy('year')->get();   
						$year = $a->merge($b);
						$Year=$year->unique();
						 ?>

						<?php $__currentLoopData = $Year; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $Year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option <?php if($request->year==$Year->year): ?><?php echo e('selected'); ?> <?php endif; ?> value="<?php echo e($Year->year); ?>"><?php echo e($Year->year); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
				</div>
				<div class="col-sm-3">
					<label>TCN*</label>
					<select name="tcn" id="tcn" class="  form-control "  required>
						<option value=" ">--select--</option>
						<?php $__currentLoopData = $tcnType; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tcnType): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option <?php if($request->tcn==$tcnType->id): ?><?php echo e('selected'); ?> <?php endif; ?> value="<?php echo e($tcnType->id); ?>"><?php echo e($tcnType->tcnType); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
				</div>
				<div class="col-sm-3 col-sm-offset-5" >
					<button name="check" type="submit" value="show" class="   btn btn-success">Check</button>
				</div>
			</div>
		</form>
	</div>
	<?php if(isset($_REQUEST['check'])): ?>
	<div class="panel panel-default">
		<div class="table-responsive" style="overflow-x: initial;">
			<div class="panel-heading"><center>TCN Application status <strong><?php echo e(date("F", mktime(0, 0, 0,($_REQUEST['month'])))); ?> <?php echo e(($_REQUEST['year'])); ?></strong></center></div>
						<table  class="table table-striped b-t" style="overflow-x: initial;"
							ui-jq="footable" ui-options='{
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
									<th>Check Points</th>                    
									<th>INR</th>
									<th>AED</th>
									<th>SAR</th>
									<th>USD</th>
									<th>CAD</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<?php 
										$inrCount=0;
										$usdCount=0;
										$aedCount=0;
										$sarCount=0;
										$cadCount=0; 
									 ?>
									<?php $__currentLoopData = $tcnrequest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $app): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if($app->currencyType=='INR'): ?>
											<?php  
												$inrCount++;
											  ?>
										<?php endif; ?>
										<?php if($app->currencyType=='AED'): ?>
											<?php  
												$aedCount++; 
											 ?>
										<?php endif; ?>
										<?php if($app->currencyType=='SAR'): ?>
											<?php  
												$sarCount++; 
											 ?>
										<?php endif; ?>
										<?php if($app->currencyType=='USD'): ?>
											<?php 
										 		$usdCount++; 
										 	 ?>
										<?php endif; ?>
										<?php if($app->currencyType=='CAD'): ?>
											<?php  
												$cadCount++;
											 ?>
										<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<tr data-expanded="true">		
										<td>
											<?php echo e('Total Application Recieved'); ?>

										</td>
										<td>
											<?php echo e($inrCount); ?>

										</td>
										<td>
											<?php echo e($aedCount); ?>

										</td>
										<td>
											<?php echo e($sarCount); ?>

										</td>
										<td>
											<?php echo e($usdCount); ?>

										</td>
										<td>
											<?php echo e($cadCount); ?>

										</td>
									</tr>

									<?php  
										$approveinr=0;
										$approveusd=0;
										$approveaed=0;
										$approvesar=0;
										$approvecad=0;
									 ?>
									<?php $__currentLoopData = $tcnapprove; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $approve): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if($approve->currencyType=='INR'): ?>
											<?php  
												$approveinr++;
											 ?>
										<?php endif; ?>
										<?php if($approve->currencyType=='AED'): ?>
											<?php 
												 $approveaed++; 
											 ?>
										<?php endif; ?>
										<?php if($approve->currencyType=='SAR'): ?>
											<?php 
												 $approvesar++;
											 ?>
										<?php endif; ?>
										<?php if($approve->currencyType=='USD'): ?>
											<?php  
												$approveusd++; 
											 ?>
										<?php endif; ?>
										<?php if($approve->currencyType=='CAD'): ?>
											<?php  
												$approvecad++; 
											 ?>
										<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

									<tr>
										<td>
											<?php echo e('Approved'); ?>

										</td>
										<td>
											<?php echo e($approveinr); ?>

										</td>
										<td>
											<?php echo e($approveaed); ?>

										</td>
										<td>
											<?php echo e($approvesar); ?>

										</td>
										<td>
											<?php echo e($approveusd); ?>

										</td>
										<td>
											<?php echo e($approvecad); ?>

										</td>										
									</tr>

									<?php  
										$docinr=0;
										$docusd=0;
										$docaed=0;
										$docsar=0;
										$doccad=0; 
									 ?>
									<?php $__currentLoopData = $tcndoc; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $document): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if($document->currencyType=='INR'): ?>
											<?php  
												$docinr++; 
											 ?>
										<?php endif; ?>
										<?php if($document->currencyType=='AED'): ?>
											<?php  
												$docaed++; 
											 ?>
										<?php endif; ?>
										<?php if($document->currencyType=='SAR'): ?>
											<?php  
												$docsar++; 
											 ?>
										<?php endif; ?>
										<?php if($document->currencyType=='USD'): ?>
											<?php 
												$docusd++; 
											 ?>
										<?php endif; ?>
										<?php if($document->currencyType=='CAD'): ?>
											<?php 
												$doccad++; 
											 ?>
										<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>


									<tr>
										<td>
											<?php echo e('Under Document Verification'); ?>

										</td>
										<td>
											<?php echo e($docinr); ?>

										</td>
										<td>
											<?php echo e($docaed); ?>

										</td>
										<td>
											<?php echo e($docsar); ?>

										</td>
										<td>
											<?php echo e($docusd); ?>

										</td>
										<td>
											<?php echo e($doccad); ?>

										</td>	
									</tr>

									<?php  
										$payinr=0;
										$payusd=0;
										$payaed=0;
										$paysar=0;
										$paycad=0; 
									 ?>
									<?php $__currentLoopData = $tcnpayment; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $payment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
										<?php if($payment->currencyType=='INR'): ?>
											<?php  
												$payinr++; 
											 ?>
										<?php endif; ?>
										<?php if($payment->currencyType=='AED'): ?>
											<?php  
												$payaed++; 
											 ?>
										<?php endif; ?>
										<?php if($payment->currencyType=='SAR'): ?>
											<?php  
												$paysar++; 
											 ?>
										<?php endif; ?>
										<?php if($payment->currencyType=='USD'): ?>
											<?php 
												$payusd++;
											 ?>
										<?php endif; ?>
										<?php if($payment->currencyType=='CAD'): ?>
											<?php 
												$paycad++; 
											 ?>
										<?php endif; ?>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
									<tr>
										<td>
											<?php echo e('Under Payment Approval'); ?>

										</td>
										<td>
											<?php echo e($payinr); ?>

										</td>
										<td>
											<?php echo e($payaed); ?>	
										</td>
										<td>
											<?php echo e($paysar); ?>

										</td>
										<td>
											<?php echo e($payusd); ?>	
										</td>
										<td>
											<?php echo e($paycad); ?>	
										</td>
									</tr>
								
							</tr>
						</tbody>
					</table>
				</div>
			</div>
	<?php endif; ?>
</div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
	<script type="text/javascript">
	</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>