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
						<option value="All">All</option>

						<?php $__currentLoopData = $company; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option value="<?php echo e($company->id); ?>" <?php if(isset($company_id) && $company->id==$company_id): ?><?php echo e('selected'); ?><?php endif; ?> ><?php echo e($company->company_name); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					</select>
					<span class="text-danger company" style="display: none" >Select Company </span>

				</div>

				<div class="form-group col-sm-2">
					<label> Branch Name</label>
					<input type="hidden" name="branch_id" id="branch_id" value="<?php echo e($branch_id ? : 0); ?>">
					<select id="branch" name="branch" class="chosen-select">


					</select>
					<span class="text-danger branch" style="display: none"  >Select Branch</span>

				</div>	

				<div class="form-group col-sm-2">
					<label>Month </label>
					<select id="month" name="month" class="chosen-select">
						<option value=" ">--Select--</option>
						<option value="01" <?php if(isset($month) && '01'==$month): ?><?php echo e('selected'); ?><?php endif; ?> >January</option>
						<option value="02" <?php if(isset($month) && '02'==$month): ?><?php echo e('selected'); ?><?php endif; ?> >February</option>
						<option value="03" <?php if(isset($month) && '03'==$month): ?><?php echo e('selected'); ?><?php endif; ?> >March</option>
						<option value="04" <?php if(isset($month) && '04'==$month): ?><?php echo e('selected'); ?><?php endif; ?> >April</option>
						<option value="05" <?php if(isset($month) && '05'==$month): ?><?php echo e('selected'); ?><?php endif; ?> >May</option>
						<option value="06" <?php if(isset($month) && '06'==$month): ?><?php echo e('selected'); ?><?php endif; ?> >June</option>
						<option value="07" <?php if(isset($month) && '07'==$month): ?><?php echo e('selected'); ?><?php endif; ?> >July</option>
						<option value="08" <?php if(isset($month) && '08'==$month): ?><?php echo e('selected'); ?><?php endif; ?> >August</option>
						<option value="09" <?php if(isset($month) && '09'==$month): ?><?php echo e('selected'); ?><?php endif; ?> >September</option>
						<option value="10" <?php if(isset($month) && '10'==$month): ?><?php echo e('selected'); ?><?php endif; ?> >October</option>
						<option value="11" <?php if(isset($month) && '11'==$month): ?><?php echo e('selected'); ?><?php endif; ?> >November</option>
						<option value="12" <?php if(isset($month) && '12'==$month): ?><?php echo e('selected'); ?><?php endif; ?> >December</option>
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
							
							<?php $__currentLoopData = $year; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $years): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							<option <?php if(date('Y')==$years->year ||  (isset($year) && $year==$years->year) ): ?><?php echo e('selected'); ?><?php endif; ?> value="<?php echo e($years->year); ?>"><?php echo e($years->year); ?></option>
							<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

						</select>
					<span class="text-danger year" style="display: none"  >Select Year</span>
				</div>


			<div class="form-group col-sm-1">
			<label>&nbsp;</label><br>
				<button onclick="getSalaryDetails()" class="btn btn-sm btn-primary font-bold">&nbsp;&nbsp; List &nbsp;&nbsp;</button>
			</div>



			</div>

			</div>
	</div> 


	<div class="panel panel-default" id="getAllowances_panel">
		<div class="panel-heading font-bold">Generate Salary</div>
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
		$('#branch').append('<option value="All">All</option>').trigger("chosen:updated");

		for (var i=0;i<data.length;i++)
		{
		$('#branch').append('<option  value="'+data[i].id+'">'+data[i].branch_name+'</option>').trigger("chosen:updated");    	
		}



		var branch_id=$('#branch_id').val();


		if(branch_id!='0')
		{
		$('#branch').val(branch_id).trigger("chosen:updated");;
		$('#branch_id').val('0');	

		}


	}

});

}	






//************All This AJAX Process work on salaryMasterController => public function Create() {  }***************//

//************based on 

function getSalaryDetails()
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


var branch=$('#branch').val();

var company=$('#company').val();

var year=$('#year').val();

var month=$('#month').val();



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

getBranches();



window.history.forward();

</script>

<?php if(isset($branch_id)): ?>
<script>
getSalaryDetails();
</script>

<?php endif; ?>


<?php if(Session::has('sweet_alert.alert')): ?>
    <script>
        swal({
            text: "<?php echo Session::get('sweet_alert.text'); ?>",
            title: "<?php echo Session::get('sweet_alert.title'); ?>",
            timer: <?php echo Session::get('sweet_alert.timer'); ?>,
            type: "<?php echo Session::get('sweet_alert.type'); ?>",
            // showConfirmButton: "!! Session::get('sweet_alert.showConfirmButton') !!}",
            // confirmButtonText: "!! Session::get('sweet_alert.confirmButtonText') !!}",
            // confirmButtonColor: "#AEDEF4",
            // showCancelButton: false,
            // closeOnConfirm: true
<?php  
            Session::Forget('sweet_alert');  ?>
            // more options
        });
    </script>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>