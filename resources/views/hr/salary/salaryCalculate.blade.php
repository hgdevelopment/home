@extends('admin.layout.erp1')
@section('banner')
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
<img src="{{ URL::to('/') }}/new_heading.png" class="img-responsive">
</div>
@endsection

@section('sidebar')
@include('admin.partial.header')
@include('admin.partial.aside')
@endsection
<style type="text/css">
	.panel-dark{
		color: #8f7e37;
		background-color: #fcf8e3 !important;
		font-weight: 500;
    font-size: 16px;
	}
	.divTableCell{
		border-bottom: 0 !important;
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
	.divTableCell{
		text-transform: capitalize !important; font-size: 15px !important;
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
@section('body')

<div class="bg-light lter b-b wrapper-md">
<h1 class="m-n font-normal h3">Generate Salary</h1>
</div>

<div class="wrapper-md" id="wrapper-md" ng-controller="FormDemoCtrl">

<form role="form" method="post" action="{{URL::to('/')}}/hr/salaryMaster" id="form" data-parsley-validate onsubmit="return submitvalidate()">
			{{ csrf_field() }}




			<input type="hidden" name="employee_id" id="employee_id" value="{{ $employee_id }}">
			<input type="hidden" name="payslip_no" id="payslip_no" value="{{ $payslip }}">

			<input type="hidden" name="working_days" id="working_days" value="{{ $emp_working_days }}">
			<input type="hidden" name="per_day_salary" id="per_day_salary" value="{{ floor($perDaySalary) }}">
			<input type="hidden" name="per_min_salary" id="per_min_salary" value="{{ floor($perMinuteSalary) }}">

			<input type="hidden" name="working_weekoff" id="working_weekoff" value="{{ $emp_working_weekoff }}">
			<input type="hidden" name="working_holidays" id="working_holidays" value="{{ $emp_working_holidays }}">

			<input type="hidden" name="one_mine_late" id="one_mine_late" value="{{ $oneMinuteLate }}">
			<input type="hidden" name="more_one_min" id="more_one_min" value="{{ $moreOneMinute }}">

			<input type="hidden" name="total_leave" id="total_leave" value="{{ $leave }}">
			<input type="hidden" name="full_day_leave" id="full_day_leave" value="{{ $fullDayLeave }}">
			<input type="hidden" name="half_day_leave" id="half_day_leave" value="{{ $halfDayLeave }}">
			<input type="hidden" name="approve_leave" id="approve_leave" value="{{ $approveLeave }}">

			<input type="hidden" name="available_leave" id="available_leave" value="{{ $TotalAvailLeave }}">
			<input type="hidden" name="remaining_leave" id="remaining_leave" value="{{ max($TotalAvailLeave-$approveLeave,0) }}">

			<input type="hidden" name="month" id="month" value="{{date('m-Y',strtotime($fromDate)) }}">




	<div class="row"> 

		<div class="col-md-2">  
			<div class="panel panel-warning" style="margin-bottom: 0 !important;">

				<div class="panel-heading panel-dark">Pay Period </div>
				<div class="panel-body">
					<div class="row">
						<div class="col-md-12 font-bold text-center">

						<br>

						<span class="text-success h1" style="font-size-adjust: 0.7">{{ date('M',strtotime($fromDate)) }}</span>

						<br><br><br>

						<span class="text-warning h2">{{ date('Y',strtotime($fromDate)) }}</span>

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
						Employee ID
						<b class="data-lab">{{$data[0]->code}}</b>
						</div>
						<div class="col-md-12 col-xs-12 divTableCell">
						Company
						<b class="data-lab">{{$data[0]->company_name}}</b>
						</div>
						<div class="col-md-12 col-xs-12 divTableCell">
						Name
						<b class="data-lab">{{$data[0]->salutation_name}} {{$data[0]->name}}</b>
						</div>
						<div class="col-md-12 col-xs-12 divTableCell">
						Branch
						<b class="data-lab">{{$data[0]->branch_name}}</b>
						</div>
						<div class="col-md-12 col-xs-12 divTableCell">
						Designation
						<b class="data-lab">{{$data[0]->designation_name}}</b> 
						</div>

						<div class="col-md-12 col-xs-12 divTableCell">
						Department:
						<b class="data-lab">{{$data[0]->department_name}}</b>
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
		      	  	@php 
		      	  	$salaryAllowance=DB::table('hr_salary_allowance')->where('company_id',$data[0]->company_id)->get();
		      	  	@endphp
		      	  	@foreach($salaryAllowance as $salaryAllowance)
		           <div class="col-md-12 col-xs-12 divTableCell">
		              {{ strtoupper($salaryAllowance->allowances) }}
		               <b class="data-lab">{{$data[0]->salary/100*$salaryAllowance->percentage}}</b>
		            </div>
		      	  	@endforeach

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

							<div class="col-md-4 col-xs-4  font-bold">
							Payslip No : {{ $payslip }}
							</div>

							<div class="col-md-4 col-xs-4  font-bold">
							Gross Salary : {{ $salary }}
							</div>

							<div class="col-md-4 col-xs-4  font-bold">
							Paid Days : {{ $emp_working_days + $weekoff }}
							</div>

					</div>  

					<div class="row"><a class="text-primary see-more" onclick="showDetails('hideDetails')">See more...</a>
						<div class="col-md-12" id="details" class="row">			<input type="hidden" id="hideDetails" value="0">

							<div class="col-md-3 col-xs-3 divTableCell  font-bold">
							Monthly Salary  <b class="data-lab text-danger">{{ $salary }}</b>
							</div>

							<div class="col-md-3 col-xs-3 divTableCell  font-bold">
							Day Salary   <b class="data-lab text-danger">{{ $perDaySalary }}</b>
							</div>

							<div class="col-md-3 col-xs-3 divTableCell  font-bold">
							per Hour Salary   <b class="data-lab text-danger">{{ $perHourSalary }}</b>
							</div>

							<div class="col-md-3 col-xs-3 divTableCell  font-bold">
							per Minute Salary   <b class="data-lab text-danger">{{ $perMinuteSalary }}</b>
							</div>

							<div class="col-md-3 col-xs-3 divTableCell font-bold">
							Full worked Days   <b class="data-lab text-danger">{{ $emp_working_full_days }}</b>
							</div>

							<div class="col-md-3 col-xs-3 divTableCell font-bold">
							Total Availabe Leave  <b class="data-lab text-danger">{{ $TotalAvailLeave }}</b>
							</div>

							<div class="col-md-3 col-xs-3 divTableCell font-bold">
							Leaves (FD + HD)  <b class="data-lab text-danger">{{ $leave }}</b>
							</div>

							<div class="col-md-3 col-xs-3 divTableCell font-bold">
							Full Day Leave   <b class="data-lab text-danger">{{ $fullDayLeave }}</b>
							</div>

							<div class="col-md-3 col-xs-3 divTableCell font-bold">
							Half Day     <b class="data-lab text-danger">{{ $halfDayLeave }}{{ '(day) * 0.5 = ' }}{{ $halfDayLeave*0.5 }}</b>
							</div>

							<div class="col-md-3 col-xs-3 divTableCell font-bold">
							approve Leave     <b class="data-lab text-danger">{{ $approveLeave }}</b>
							</div>

							<div class="col-md-3 col-xs-3 divTableCell font-bold">
							unApprove Leave     <b class="data-lab text-danger">{{ $unApproveLeave }}</b>
							</div>

							<div class="col-md-3 col-xs-3 divTableCell font-bold">
							one Minute Late     <b class="data-lab text-danger">{{ $oneMinuteLate }} {{ 'day' }}</b>
							</div>

							<div class="col-md-3 col-xs-3 divTableCell font-bold">
							more One Minute     <b class="data-lab text-danger">{{ $moreOneMinute }} {{ 'days' }}</b>
							</div>

							<div class="col-md-3 col-xs-3 divTableCell font-bold">
							OT ( mins)    <b class="data-lab text-danger">{{ $ot }}</b>
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
					               <b class="data-lab"><input class="form-control f" type="text" name="approve_leave_deduction" id="approve_leave_deduction" value="{{ $deductApproveLeave }}" readonly></b>
					            </div>


					            <div class="col-md-12 col-xs-12 divTableCell">
					              un approve leaves
					               <b class="data-lab"><input class="form-control s" type="text" name="unapprove_leave_amount" id="unapprove_leave_amount"></b>
					               <b class="data-lab"><input class="form-control f" type="text" name="un_approve_leave" id="un_approve_leave" value="{{ $deductUnApproveLeave }}" readonly></b>
					            </div>

					            <div class="col-md-12 col-xs-12 divTableCell">
					              Sandwitch Leave 
					               <b class="data-lab"><input class="form-control s" type="text" name="sandwitch_leave_amount" id="sandwitch_leave_amount"></b>
					               <b class="data-lab"><input class="form-control f" type="text" name="loss_pay_sunday" id="loss_pay_sunday" value="{{ $sandwitchLeave }}" readonly></b>
					            </div>


					            <div class="col-md-12 col-xs-12 divTableCell">
					              One Min Late (6 days)
					               <b class="data-lab"><input class="form-control s" type="text" name="one_min_late_amount" id="one_min_late_amount"></b>
					               <b class="data-lab"><input class="form-control f" type="text" name="one_min_late" id="one_min_late" value="{{ floor($oneMinuteLate/6) }}" readonly></b>
					            </div>

					            

					            <div class="col-md-12 col-xs-12 divTableCell">
					               More One Min (3 days)
					               <b class="data-lab"><input class="form-control s" type="text" name="more_one_min_amount" id="more_one_min_amount"></b>
					               <b class="data-lab"><input class="form-control f" type="text" name="more_one_min" id="more_one_min" value="{{ floor($moreOneMinute/3) }}" readonly></b>
					            </div>

					            <div class="col-md-12 col-xs-12 divTableCell">
					              ID Card/Fine/Other Deduction
					              @foreach($emp_deduction as $emp_deduction)
					              	@php
					              		$idcard_fine_deduction+=$emp_deduction->amount;
					              	@endphp
					              @endforeach

					               <b class="data-lab"><input class="form-control s" type="text" name="fine_deduction" id="fine_deduction" value="{{ $idcard_fine_deduction }}"></b>
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
			               <b class="data-lab"><input class="form-control" type="text" name="salary" id="salary" value="{{ $salary }}" readonly></b>
			            </div>

			            <div class="col-md-12 col-xs-12 divTableCell">
			              Over Time (minutes)
			               <b class="data-lab"><input class="form-control" type="text" name="overtime_amount" id="overtime_amount"></b>
							<b class="data-lab"><input class="form-control f" type="text" name="overtime" id="overtime" value="{{ $ot }}" readonly></b>

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

@endsection
@section('jquery')
<script type="text/javascript">
$(".chosen-select").chosen({width:'100%'});
$('#details').hide();

function getBranches()
{
var company = $('#company').val();



$.ajax({
type: "get",
url: "{{URL::to('/') }}/hr/salaryMaster/create",
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
		$('#details').show();
		$('.see-more').html('See Less');
	}
		if(val=='1')
	{
		$('#'+id).val('0');
		$('#details').hide();
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

if (!val || val ==='0' || isNaN(val) || val=='' || val==' ') 	$('#'+id).val('');  else return $('#'+id).val(val);

}





function submitvalidate()
{

if(readvalue('final_salary')<=0)
{

	return;
}

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


@endsection
