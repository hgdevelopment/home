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
<h1 class="m-n font-normal h3">Salary Details</h1>
</div>

<div class="wrapper-md" id="wrapper-md" ng-controller="FormDemoCtrl">

	<div class="panel panel-default">
		<div class="panel-body" style="background: #f2b6f34d;">
			<div class="row" id="searchDiv">
				<div class="form-group col-sm-3">
					<label>Month </label>
					<select id="month" name="month" class="chosen-select">
						<option value=" ">--Select--</option>
						
						<option value="01">January</option>
						<option value="02">February</option>
						<option value="03">March</option>
						<option value="04">April</option>
						<option value="05">May</option>
						<option value="06">June</option>
						<option value="07">July</option>
						<option value="08">August</option>
						<option value="09">September</option>
						<option value="10">October</option>
						<option value="11">November</option>
						<option value="12">December</option>
					</select>
					<span class="text-danger month" style="display: none"  >Select Month </span>

				</div>
				<div class="form-group col-sm-3">
					<label>Year</label>
						<?php 
						$a =DB::table('logins')->select(DB::raw('YEAR(updated_at) as year'))->groupBy('year')->get();   
						$b =DB::table('logins')->select(DB::raw('YEAR(created_at) as year'))->groupBy('year')->get();   
						$year = $a->merge($b);
						$year=$year->unique();
						 ?>

						<select id="year" name="year" class="form-control chosen-select">
							<option value=" ">--select--</option>
							
							<?php $__currentLoopData = $year; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $year): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option <?php if(date('Y')==$year->year): ?><?php echo e('selected'); ?><?php endif; ?> value="<?php echo e($year->year); ?>"><?php echo e($year->year); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						</select>
					<span class="text-danger year" style="display: none"  >Select Year</span>
				</div>

			<div class="form-group col-sm-1">
			<label>&nbsp;</label><br>
				<button  class="btn btn-sm btn-primary font-bold">&nbsp;&nbsp; List &nbsp;&nbsp;</button>
			</div>

			<div class="form-group col-sm-1">
			<label>&nbsp;</label><br>
				<button  class="btn btn-sm btn-danger font-bold">Export Excel</button>
			</div>


			</div>

			</div>
	</div> 


	<div class="panel panel-default" id="getAllowances_panel">
		<div class="panel-heading font-bold">Salary Details</div>
		<div class="panel-body">
			<div class="col-sm-12">
			<div class="row" id="getSalaryDetails"></div>
			</div> 
		</div>
	</div> 


</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">
$(".chosen-select").chosen({width:'100%'});


</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>