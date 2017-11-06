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
<h1 class="m-n font-normal h3">Salary Master</h1>
</div>

<div class="wrapper-md" id="wrapper-md" ng-controller="FormDemoCtrl">

	<div class="panel panel-default">
		<div class="panel-heading font-bold">Select Company</div>
		<div class="panel-body">
			<div class="form-group col-sm-4">
				<label> Company Name<?php echo e($passwords); ?></label>
				<select id="company" name="company" class="chosen-select">
					<option value=" ">Select Company </option>

					<?php $__currentLoopData = $company; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($company->id); ?>" <?php if($company->id==$id): ?><?php echo e('selected'); ?><?php endif; ?>><?php echo e($company->company_name); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</select>

			</div>
			<div class="form-group col-sm-2">
			<label>&nbsp;</label><br>
				<button onclick="getAllowances()" class="btn btn-sm btn-primary font-bold">Submit</button>
			</div>
			</div>
	</div> 


	<div class="panel panel-default" id="getAllowances_panel">
		<div class="panel-heading font-bold">Salary Allowances</div>
		<div class="panel-body">
			<div class="col-sm-7" id="getAllowances">  </div> 
		</div>
	</div> 


</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">

$('.chosen-select').chosen({width:'100%'});

$('#getAllowances_panel').hide();
$('.allowances').hide();
$('.percentage').hide();

function getAllowances()
{

$('#getAllowances_panel').hide();



var company_id=$('#company').val();	

if(company_id==' ')	
return;

	$.ajax({
	type: "get",

	url: "<?php echo e(URL::to('/')); ?>/hr/salaryMaster/create",

	data:{process:'getAllowances',company_id:company_id},

	success: function (data) {

	$('#getAllowances_panel').show();

	$('#getAllowances').html(data);

	$('.allowances').hide();

	$('.percentage').hide();

	}
	});
}




function tempAllowances(company_id)
{

$('#getAllowances_panel').hide();


	$.ajax({
	type: "get",

	url: "<?php echo e(URL::to('/')); ?>/hr/salaryMaster/create",

	data:{process:'tempAllowances',company_id:company_id},

	success: function (data) {

	$('#getAllowances_panel').show();

	$('#getAllowances').html(data);

	$('.allowances').hide();

	$('.percentage').hide();

	}
	});
}







function change_temp(id,type,company_id)
{

// if(type=='delete')
// datas="process:'delete',company_id:"+company_id+",id:"+id+",type:"+type;

	if(type=='edit')
	{
		$.ajax({

		type: "get",

		url: "<?php echo e(URL::to('/')); ?>/hr/salaryMaster/create",

		data:{process:'tempAllowances',company_id:company_id,id:id,type:type},

		success: function (data) {

	$('#getAllowances_panel').show();

	$('#getAllowances').html(data);

	$('.allowances').hide();

	$('.percentage').hide();
		}
		});
	}


	if(type=='delete')
	{

		$.ajax({

		type: "get",

		url: "<?php echo e(URL::to('/')); ?>/hr/salaryMaster/create",

		data:{process:'deleteAllowances',company_id:company_id,id:id,type:type},

		success: function (data) {

			tempAllowances(company_id);
		}
		});

	}
}



function update_temp(id,company_id)
{
var allowances=$('#allowances').val();
var percentage=$('#percentage').val();



		$.ajax({

		type: "get",

		url: "<?php echo e(URL::to('/')); ?>/hr/salaryMaster/create",

		data:{process:'updateAllowances',company_id:company_id,id:id,allowances:allowances,percentage:percentage},

		success: function (data) {

			tempAllowances(company_id);
		}
		});

}


function add_temp(id)
{

	var company_id=$('#company_id').val();

	var allowances=$('#allowances'+id).val();

	var percentage=$('#percentage'+id).val();

	if(allowances=='' || allowances==null)
	{
		$('#allowances'+id).val('');

		$('.allowances').show();
		return;

	}
	else
		$('.allowances').hide();

	


	if(percentage=='' || percentage==null || isNaN(percentage) || percentage<0.1)
	{
		$('#percentage'+id).val('');

		$('.percentage').show();
		return;

	}
	else
		$('.percentage').hide();


	$.ajax({

	type: "get",

	url: "<?php echo e(URL::to('/')); ?>/hr/salaryMaster/create",

	data:{process:'add_temp',company_id:company_id,allowances:allowances,percentage:percentage},

	success: function (data) {

		tempAllowances(company_id);

	}
	});

}
</script>
<?php if(isset($id)): ?>

<script type="text/javascript">
	getAllowances();
</script>

<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>