<?php $__env->startSection('banner'); ?>
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
<img src="<?php echo e(URL::to('/')); ?>/new_heading.png" class="img-responsive">
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<style type="text/css">
	.panel-dark{
		color: #8f7e37;
		background-color: #fcf8e3 !important;
		font-weight: 500;
    font-size: 16px;
	}
	.divTableCell{
		border-bottom: 0 !important;
		text-transform: capitalize !important; font-size: 15px !important;

	}
	.f{
		width: 50px !important; margin-right: 5px !important;padding:3px !important;
	}

	.s{
		width: 80px !important;padding: 3px !important;
	}
	.sal{
		background: #fffee7 !important;
border-width: 1px;
border-style: solid;
border-color: #bcaf78;
	}

	.see-more{
		float: right;
margin-right: 12px;
	}
/*	input[readonly]{ 

background: #ededed;
background: -moz-linear-gradient(top, #ededed 0%, #ededed 1%, #fafafa 32%, #fefefe 68%, #ebebeb 99%, #ebebeb 100%);
background: -webkit-gradient(left top, left bottom, color-stop(0%, #ededed), color-stop(1%, #ededed), color-stop(32%, #fafafa), color-stop(68%, #fefefe), color-stop(99%, #ebebeb), color-stop(100%, #ebebeb));
background: -webkit-linear-gradient(top, #ededed 0%, #ededed 1%, #fafafa 32%, #fefefe 68%, #ebebeb 99%, #ebebeb 100%);
background: -o-linear-gradient(top, #ededed 0%, #ededed 1%, #fafafa 32%, #fefefe 68%, #ebebeb 99%, #ebebeb 100%);
background: -ms-linear-gradient(top, #ededed 0%, #ededed 1%, #fafafa 32%, #fefefe 68%, #ebebeb 99%, #ebebeb 100%);
background: linear-gradient(to bottom, #ededed 0%, #ededed 1%, #fafafa 32%, #fefefe 68%, #ebebeb 99%, #ebebeb 100%);
filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ededed', endColorstr='#ebebeb', GradientType=0 );
	}*/
</style>
<?php $__env->startSection('body'); ?>

<div class="bg-light lter b-b wrapper-md">
<h1 class="m-n font-normal h3">Generate Salary</h1>
</div>

<div class="wrapper-md" id="wrapper-md" ng-controller="FormDemoCtrl">

<form role="form" method="post" action="<?php echo e(URL::to('/')); ?>/hr/salaryMaster" id="form" data-parsley-validate onsubmit="return submitvalidate()">
			<?php echo e(csrf_field()); ?>





			<input type="hidden" name="employee_id" id="employee_id" value="<?php echo e($employee_id); ?>">
			<input type="hidden" name="payslip_no" id="payslip_no" value="<?php echo e($payslip); ?>">

			<input type="hidden" name="worked_days" id="worked_days" value="<?php echo e($emp_working_days ? : 0); ?>">
			<input type="hidden" name="per_day_salary" id="per_day_salary" value="<?php echo e(floor($perDaySalary ? : 0 )); ?>">
			<input type="hidden" name="per_min_salary" id="per_min_salary" value="<?php echo e(floor($perMinuteSalary ? : 0 )); ?>">

			<input type="hidden" name="working_weekoff" id="working_weekoff" value="<?php echo e($emp_working_weekoff ? : 0); ?>">
			<input type="hidden" name="working_holidays" id="working_holidays" value="<?php echo e($emp_working_holidays ? : 0); ?>">

			<input type="hidden" name="one_mine_late" id="one_mine_late" value="<?php echo e($oneMinuteLate ? : 0); ?>">
			<input type="hidden" name="more_one_min_late" id="more_one_min_late" value="<?php echo e($moreOneMinute ? : 0); ?>">

			<input type="hidden" name="total_leave" id="total_leave" value="<?php echo e($leave ? : 0); ?>">
			<input type="hidden" name="full_day_leave" id="full_day_leave" value="<?php echo e($fullDayLeave ? : 0); ?>">
			<input type="hidden" name="half_day_leave" id="half_day_leave" value="<?php echo e($halfDayLeave ? : 0); ?>">
			<input type="hidden" name="approve_leave" id="approve_leave" value="<?php echo e($approveLeave ? : 0); ?>">

			<input type="hidden" name="available_leave" id="available_leave" value="<?php echo e($TotalAvailLeave ? : 0); ?>">
			<input type="hidden" name="remaining_leave" id="remaining_leave" value="<?php echo e(max($TotalAvailLeave-$approveLeave,0)); ?>">

			<input type="hidden" name="month" id="month" value="<?php echo e(date('m-Y',strtotime($fromDate))); ?>">

			<input type="hidden" name="company_id" id="company_id" value="<?php echo e($data[0]->company_id); ?>">
			<input type="hidden" name="branch_id" id="branch_id" value="<?php echo e($data[0]->branch_id); ?>">




	<div class="row"> 

		<div class="col-md-2">  
			<div class="panel panel-warning" style="margin-bottom: 0 !important;">

				<div class="panel-heading panel-dark">Pay Period </div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12 font-bold text-center">

						<br>

						<span class="text-success h1" style="font-size-adjust: 0.7"><?php echo e(date('M',strtotime($fromDate))); ?></span>

						<br><br><br>

						<span class="text-warning h2"><?php echo e(date('Y',strtotime($fromDate))); ?></span>

						<br><br>

						</div>
					</div>
				</div>
			</div> 
		</div>


		<div class="col-md-6">  
			<div class="panel panel-warning">

				<div class="panel-heading panel-dark">Employee Details </div>
				<div class="panel-body">
					<div class="row">

						<div class="col-md-12 col-xs-12 divTableCell">
						Employee Code
						<b class="data-lab"><?php echo e($data[0]->code); ?></b>
						</div>
						<div class="col-md-12 col-xs-12 divTableCell">
						Company
						<b class="data-lab"><?php echo e($data[0]->company_name); ?></b>
						</div>
						<div class="col-md-12 col-xs-12 divTableCell">
						Name
						<b class="data-lab"><?php echo e($data[0]->salutation_name); ?> <?php echo e($data[0]->name); ?></b>
						</div>
						<div class="col-md-12 col-xs-12 divTableCell">
						Branch
						<b class="data-lab"><?php echo e($data[0]->branch_name); ?></b>
						</div>
						<div class="col-md-12 col-xs-12 divTableCell">
						Designation
						<b class="data-lab"><?php echo e($data[0]->designation_name); ?></b> 
						</div>

						<div class="col-md-12 col-xs-12 divTableCell">
						Department:
						<b class="data-lab"><?php echo e($data[0]->department_name); ?></b>
						</div>
					</div>
				</div>
			</div> 
		</div>

	    <div class="col-md-4">  	
			<div class="panel panel-warning" id="getAllowances_panel">

		      	<div class="panel-heading panel-dark">Salary Allowance </div>
		      	<div class="panel-body">
		      	  <div class="row">
		      	  	<?php  
		      	  	$salaryAllowance=DB::table('hr_salary_allowance')->where('company_id',$data[0]->company_id)->get();
		      	  	 ?>
		      	  	<?php $__currentLoopData = $salaryAllowance; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $salaryAllowance): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
		           <div class="col-md-12 col-xs-12 divTableCell">
		              <?php echo e(strtoupper($salaryAllowance->allowances)); ?>

		               <b class="data-lab"><?php echo e($data[0]->salary/100*$salaryAllowance->percentage); ?></b>

		               <?php 
		               	$allowances=$allowances.strtoupper($salaryAllowance->allowances).'@@'.$data[0]->salary/100*$salaryAllowance->percentage.'##';
		                ?>
		            </div>
		      	  	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
		      	  	<input type="hidden" name="allowances" id="allowances" value="<?php echo e($allowances); ?>">
		         </div>
		        </div>
		    </div> 
		</div>    
	</div>


	<div class="row"> 

		<div class="col-md-12">  
			<div class="panel">
				<div class="panel-body sal">
					<div class="row">

							<div class="col-md-3 col-xs-3  font-bold">
							Payslip No : <?php echo e($payslip); ?>

							</div>

							<div class="col-md-3 col-xs-3  font-bold">
							Gross Salary : <?php echo e($salary); ?>

							</div>

							<div class="col-md-3 col-xs-3  font-bold">
							Paid Days : <?php echo e($totalday); ?>

							</div>

							<div class="col-md-3 col-xs-3  text-right font-bold">
							<a class="text-primary see-more" onclick="showDetails('hideDetails')">See more...</a>
							</div>

					</div>  

					<div class="row" id="details">
						<div class="col-md-12 well m-t bg-light lt" style="margin:0 !important;padding:0 !important">			<input type="hidden" id="hideDetails" value="0">

							<div class="col-md-3 col-xs-3 divTableCell  font-bold">
							Monthly Salary  <b class="data-lab text-danger"><?php echo e($salary); ?></b>
							</div>

							<div class="col-md-3 col-xs-3 divTableCell  font-bold">
							Day Salary   <b class="data-lab text-danger"><?php echo e(number_format($perDaySalary)); ?></b>
							</div>

							<div class="col-md-3 col-xs-3 divTableCell  font-bold">
							per Hour Salary   <b class="data-lab text-danger"><?php echo e(number_format($perHourSalary)); ?></b>
							</div>

							<div class="col-md-3 col-xs-3 divTableCell  font-bold">
							per Minute Salary   <b class="data-lab text-danger"><?php echo e(number_format($perMinuteSalary)); ?></b>
							</div>

							<div class="col-md-3 col-xs-3 divTableCell font-bold">
							worked Days  <b class="data-lab text-danger"><?php echo e(($emp_working_full_days + ($emp_working_half_days*0.5))); ?></b>
							</div>

							<div class="col-md-3 col-xs-3 divTableCell font-bold">
							Full working Days  <b class="data-lab text-danger"><?php echo e($emp_working_full_days); ?></b>
							</div>

							<div class="col-md-3 col-xs-3 divTableCell font-bold">
							Half working Days   <b class="data-lab text-danger"><?php echo e($emp_working_half_days.' * 0.5 = '); ?><?php echo e($emp_working_half_days*0.5); ?></b>
							</div>

							<div class="col-md-3 col-xs-3 divTableCell font-bold">
							Total Availabe Leave  <b class="data-lab text-danger"><?php echo e($TotalAvailLeave); ?></b>
							</div>

							<div class="col-md-3 col-xs-3 divTableCell font-bold">
							Leaves (FD + HD)  <b class="data-lab text-danger"><?php echo e($leave); ?></b>
							</div>

							<div class="col-md-3 col-xs-3 divTableCell font-bold">
							Full Day Leave   <b class="data-lab text-danger"><?php echo e($fullDayLeave); ?></b>
							</div>

							<div class="col-md-3 col-xs-3 divTableCell font-bold">
							Half Day Leave     <b class="data-lab text-danger"><?php echo e($halfDayLeave); ?><?php echo e(' * 0.5 = '); ?><?php echo e($halfDayLeave*0.5); ?></b>
							</div>

							<div class="col-md-3 col-xs-3 divTableCell font-bold">
							approve Leave     <b class="data-lab text-danger"><?php echo e($approveLeave); ?></b>
							</div>

							<div class="col-md-3 col-xs-3 divTableCell font-bold">
							unApprove Leave     <b class="data-lab text-danger"><?php echo e($unApproveLeave); ?></b>
							</div>

							<div class="col-md-3 col-xs-3 divTableCell font-bold">
							one Minute Late     <b class="data-lab text-danger"><?php echo e($oneMinuteLate); ?> <?php echo e('day'); ?></b>
							</div>

							<div class="col-md-3 col-xs-3 divTableCell font-bold">
							more One Minute     <b class="data-lab text-danger"><?php echo e($moreOneMinute); ?> <?php echo e('days'); ?></b>
							</div>

							<div class="col-md-3 col-xs-3 divTableCell font-bold">
							OT ( mins)    <b class="data-lab text-danger"><?php echo e($ot); ?></b>
							</div>
						</div>	
					</div>  
				</div>
			</div> 
		</div>
	</div>
	





	<div class="row"> 

		<div class="col-md-6">  
			<div class="panel panel-warning" id="getAllowances_panel">

		      	<div class="panel-heading panel-dark">Deductions </div>
		      	<div class="panel-body">
			
	 				<div class="row">

						<div class="col-md-12">
							<div class="row" id="deductionDiv">

					           <div class="col-md-12 col-xs-12 divTableCell">
					               Leaves
					               <b class="data-lab"><input class="form-control s" type="text" name="approve_leave_amount" id="approve_leave_amount"></b>
					               <b class="data-lab"><input class="form-control f" type="text" name="approve_leave_deduction" id="approve_leave_deduction" value="<?php echo e($deductApproveLeave); ?>" readonly></b>
					            </div>


					            <div class="col-md-12 col-xs-12 divTableCell">
					              un approve leaves
					               <b class="data-lab"><input class="form-control s" type="text" name="unapprove_leave_amount" id="unapprove_leave_amount"></b>
					               <b class="data-lab"><input class="form-control f" type="text" name="un_approve_leave" id="un_approve_leave" value="<?php echo e($deductUnApproveLeave); ?>" readonly></b>
					            </div>

					            <div class="col-md-12 col-xs-12 divTableCell">
					              Sandwitch Leave 
					               <b class="data-lab"><input class="form-control s" type="text" name="sandwitch_leave_amount" id="sandwitch_leave_amount"></b>
					               <b class="data-lab"><input class="form-control f" type="text" name="loss_pay_sunday" id="loss_pay_sunday" value="<?php echo e($sandwitchLeave); ?>" readonly></b>
					            </div>


					            <div class="col-md-12 col-xs-12 divTableCell">
					              One Min Late (6 days)
					               <b class="data-lab"><input class="form-control s" type="text" name="one_min_late_amount" id="one_min_late_amount"></b>
					               <b class="data-lab"><input class="form-control f" type="text" name="one_min_late" id="one_min_late" value="<?php echo e(floor($oneMinuteLate/6)); ?>" readonly></b>
					            </div>

					            

					            <div class="col-md-12 col-xs-12 divTableCell">
					               More One Min (3 days)
					               <b class="data-lab"><input class="form-control s" type="text" name="more_one_min_amount" id="more_one_min_amount"></b>
					               <b class="data-lab"><input class="form-control f" type="text" name="more_one_min" id="more_one_min" value="<?php echo e(floor($moreOneMinute/3)); ?>" readonly></b>
					            </div>

					            <div class="col-md-12 col-xs-12 divTableCell">
					              ID Card/Fine/Other Deduction
					              <?php $__currentLoopData = $emp_deduction; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emp_deduction): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					              	<?php 
					              		$idcard_fine_deduction+=$emp_deduction->amount;
					              	 ?>
					              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

					               <b class="data-lab"><input class="form-control s" type="text" name="fine_deduction" id="fine_deduction" value="<?php echo e($idcard_fine_deduction); ?>"></b>
					            </div>

					            <div class="col-md-12 col-xs-12 divTableCell">
					              Misc. Deduction
					               <b class="data-lab"><input class="form-control s" type="text" name="misc_deduction" id="misc_deduction" value=""></b>
					            </div>

					            <div class="col-md-12 col-xs-12 divTableCell">
					              Misc. Deduction Reason
					               <b class="data-lab"><textarea style="width: 297px;height: 43px;" class="form-control" name="misc_deduction_reason" id="misc_deduction_reason"></textarea></b>
					            </div>
					        </div>
				        </div>    
			        </div> 	
		        </div>
		    </div>
		</div>

		<div class="col-md-6">  
			<div class="panel panel-dark" style="margin-bottom: 0 !important;">

				<div class="panel-heading panel-dark">Net Pay </div>
				<div class="panel-body">
					<div class="row" id="netpayDiv">
			            <div class="col-md-12 col-xs-12 divTableCell">
			              Monthly Salary
			               <b class="data-lab"><input class="form-control" type="text" name="salary" id="salary" value="<?php echo e($salary); ?>" readonly></b>
			            </div>

			            <div class="col-md-12 col-xs-12 divTableCell">
			              Over Time (minutes)
			               <b class="data-lab"><input class="form-control" type="text" name="overtime_amount" id="overtime_amount"></b>
							<b class="data-lab"><input class="form-control f" type="text" name="overtime" id="overtime" value="<?php echo e($ot); ?>" readonly></b>

			            </div>

			            <div class="col-md-12 col-xs-12 divTableCell">
			              Bonus
			               <b class="data-lab"><input class="form-control" type="text" name="bonus" id="bonus"></b>

			            </div>

			            <div class="col-md-12 col-xs-12 divTableCell">
			              Deduction 
			               <b class="data-lab"><input class="form-control" type="text" name="final_deduction" id="final_deduction"></b>
			            </div>

			            <div class="col-md-12 col-xs-12 divTableCell">
			              Misc. Payment 

			               <b class="data-lab"><input class="form-control" type="text" name="misc_payment" id="misc_payment"></b>
			            </div>

			            <div class="col-md-12 col-xs-12 divTableCell mic_payment_reason" >
			              Misc. Payment  Reason

			               <b class="data-lab"><textarea style="width: 297px;height: 43px;" class="form-control" name="misc_payment_reason" id="misc_payment_reason"></textarea></b>
			            </div>


			            <div class="col-md-12 col-xs-12 divTableCell">
			              Final Salary
			               <b class="data-lab"><input class="form-control " type="text" name="final_salary" id="final_salary"></b>
							<b class="data-lab s"><input onclick="final_Calculate()" class="btn btn-default btn-sm form-control" type="button"  value="Calculate" ></b>			            
						</div>

			            <div class="col-md-12 col-xs-12 divTableCell">
			            <input type="button" onclick="submitvalidate()" name="save" value=" Save " class="btn btn-danger">
						</div>
					</div>
				</div>
			</div> 
		</div>

	</div>	

</form>		
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">
$(".chosen-select").chosen({width:'100%'});
$('#details').hide();

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






function showDetails(id)
{
	var val=$('#'+id).val();

	if(val=='0')
	{
		$('#'+id).val('1');
		$('#details').show(500);
		$('.see-more').html('See Less');
	}
		if(val=='1')
	{
		$('#'+id).val('0');
		$('#details').hide(500);
		$('.see-more').html('See More');
	}
}




function calculate_Deduction()
{

	var deduction=working_days=0;

	$('#deductionDiv  input.s').map(function(){
    
		deduction = deduction + parseFloat(readvalue(this.id));

	});

	$('#final_deduction').val(parseFloat(deduction).toFixed(2));


	$('#overtime_amount').val(parseFloat(readvalue('overtime')*readvalue('per_min_salary')));

final_Calculate();
}


function final_Calculate()
{
	var final_salary=parseFloat((parseFloat(readvalue('salary')) + parseFloat(readvalue('bonus')) + parseFloat(readvalue('overtime_amount')) + parseFloat(readvalue('misc_payment')))-readvalue('final_deduction'));

	$('#final_salary').val(parseFloat(Math.max(final_salary),0).toFixed(2));

}




//its allow to enter numeric value only
$('#deductionDiv  input.s').map(function(){

$(this).bind("keyup change", function() { 	setvalue(this.id); 		calculate_Deduction(); 	 });

});



$('#netpayDiv  input').map(function(){

$(this).bind("keyup change", function() { 	setvalue(this.id); 		final_Calculate(); 	 });

});



//get value by ID return valuable value
function readvalue(id)
{

var val=$('#'+id).val();

if (!val || val ==='0' || isNaN(val) || val=='' || val==' ') 	return 0;  else return val;

}






//set value by ID return valuable value
function setvalue(id)
{

var val=$('#'+id).val();

if (!val  || isNaN(val) || val=='' || val==' ') 	$('#'+id).val('');  else return $('#'+id).val(val);

}

//set value by ID return valuable value
function setvalue0(id)
{

var val=$('#'+id).val();

if (!val  || isNaN(val) || val=='' || val==' ') 	$('#'+id).val('0');  else return $('#'+id).val(val);

}





function submitvalidate()
{

// if(readvalue('final_salary')<=0)
// {

// 	return;
// }

swal({
  title: "Confirm!",
  text: "Are You Sure, You want  to save this details..",
  type: "info",
  showCancelButton: true,
  closeOnConfirm: false,
  confirmButtonColor: "#e76cd4",
  animation: "slide-from-top",
  inputPlaceholder: "Please Enter Remarks"
},
  function (isConfirm) 
  {
    if (isConfirm) 
    {
		$('#deductionDiv  input.s').map(function(){

			setvalue0(this.id);

		});



		$('#netpayDiv  input').map(function(){

		setvalue0(this.id);

		})


    	$('#form').submit();
    }
    else
    {
      return ;
    }   
  }); 
}




calculate_Deduction();

$('#calculator').calculator({onClose: true}); 


</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>