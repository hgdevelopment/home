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
<h1 class="m-n font-normal h3">Generate Salary</h1>
</div>

<div class="wrapper-md" id="wrapper-md" ng-controller="FormDemoCtrl">

	<div class="panel panel-default">
		<div class="panel-body" style="background: #f2b6f34d;">
			<div class="row" id="searchDiv">
				<div class="form-group col-sm-2">
					<label> Company Name<?php echo e($passwords); ?></label><br>
					<select id="company" name="company" class="chosen-select" onchange="getBranches()">
						<option value=" ">--Select--</option>
						

						<?php $__currentLoopData = $company; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($company->id); ?>" <?php if($company->id==$id): ?><?php echo e('selected'); ?><?php endif; ?>><?php echo e($company->company_name); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
					<span class="text-danger company" style="display: none" >Select Company </span>

				</div>

				<div class="form-group col-sm-2">
					<label> Branch Name</label>
					<select id="branch" name="branch" class="chosen-select">


					</select>
					<span class="text-danger branch" style="display: none"  >Select Branch</span>

				</div>	

				<div class="form-group col-sm-2">
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
				<div class="form-group col-sm-2">
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
				<button onclick="getSalaryDetails('generate')" class="btn btn-sm btn-danger font-bold">Generate</button>
			</div>

			<div class="form-group col-sm-1">
			<label>&nbsp;</label><br>
				<button onclick="getSalaryDetails('list')" class="btn btn-sm btn-primary font-bold">&nbsp;&nbsp; List &nbsp;&nbsp;</button>
			</div>

			<div class="form-group col-sm-1">
			<label>&nbsp;</label><br>
				<button onclick="getSalaryDetails('excel')" class="btn btn-sm btn-danger font-bold">Export Excel</button>
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
getBranches();
function getBranches()
{
var company = $('#company').val();



$.ajax({
type: "get",
url: "<?php echo e(URL::to('/')); ?>/hr/salaryMaster/create",
data:{process:'getBranches',company:company},
	success: function (data) 
	{
	    $('#branch').html('').trigger("chosen:updated");  


		$('#branch').append('<option value=" ">--Select--</option>').trigger("chosen:updated");

		for (var i=0;i<data.length;i++)
		{
		$('#branch').append('<option value="'+data[i].id+'">'+data[i].branch_name+'</option>').trigger("chosen:updated");    	
		}
	}
});

}	






//************All This AJAX Process work on salaryMasterController => public function Create() {  }***************//

//************based on 

function getSalaryDetails(type)
{
 var details='';
 var status=true;

			$("#searchDiv select").each(function()
			{
			 var value=this.value; var name=this.name;

			 if(value==' ' || value==null) {  $('.'+name).show(); status=false;}

			 else $('.'+name).hide();

			   });



if(status==false) return;

var company=$('#company').val();

var branch=$('#branch').val();

var year=$('#year').val();

var month=$('#month').val();


	if(type=='generate')
	{

		$.ajax({

		type: "get",

		url: "<?php echo e(URL::to('/')); ?>/hr/salaryMaster/create",

		data:{process:'generateSalary',company:company,branch:branch,year:year,month:month},

			success: function (data) 

			{

		$('#getSalaryDetails').html(data);

			}

			});

	}


	if(type=='list')
	{

		$.ajax({

		type: "get",

		url: "<?php echo e(URL::to('/')); ?>/hr/salaryMaster/create",

		data:{process:'SalaryList',company:company,branch:branch,year:year,month:month},

			success: function (data) 

			{

		$('#getSalaryDetails').html(data);

			}

			});
		
	}


	if(type=='excel')
	{

		$.ajax({

		type: "get",

		url: "<?php echo e(URL::to('/')); ?>/hr/salaryMaster/create",

		data:{process:'SalaryExcel',company:company,branch:branch,year:year,month:month},

			success: function (data) 

			{

		$('#getSalaryDetails').html(data);

			}

			});
		
	}


}


</script>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>