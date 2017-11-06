@extends('admin.layout.erp1')
@section('banner')
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
<img src="{{ URL::to('/') }}/new_heading.png" class="img-responsive">
</div>
@endsection

@section('sidebar')
@include('admin.partial.header')
@include('admin.partial.aside')

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
.m-t {
    margin-top: 0px !important;
}

.fadeInDownBig {
  -webkit-animation-name: fadeInDownBig;
  animation-name: fadeInDownBig;
  -webkit-animation-duration: 1s;
  animation-duration: 1s;
  -webkit-animation-fill-mode: both;
  animation-fill-mode: both;
  }
  @-webkit-keyframes fadeInDownBig {
  0% {
  opacity: 0;
  -webkit-transform: translate3d(0, -2000px, 0);
  transform: translate3d(0, -2000px, 0);
  }
  100% {
  opacity: 1;
  -webkit-transform: none;
  transform: none;
  }
  }
  @keyframes fadeInDownBig {
  0% {
  opacity: 0;
  -webkit-transform: translate3d(0, -2000px, 0);
  transform: translate3d(0, -2000px, 0);
  }
  100% {
  opacity: 1;
  -webkit-transform: none;
  transform: none;
  }
  } 
</style>
@endsection

@section('body')

<div class="bg-light lter b-b wrapper-md">
<h1 class="m-n font-normal h3">Employee Payslip</h1>
</div>

<div class="wrapper-md" id="wrapper-md" ng-controller="FormDemoCtrl">

	<div class="row fadeInDownBig" id="searchDiv">


		<div class="form-group col-sm-3">
			<label>Month </label>
			<select id="month" name="month" class="chosen-select btn-rounded">
				<option value=" ">--Select--</option>
				{{-- <option value="All">All</option> --}}
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
				@php
				$a =DB::table('logins')->select(DB::raw('YEAR(updated_at) as year'))->groupBy('year')->get();   
				$b =DB::table('logins')->select(DB::raw('YEAR(created_at) as year'))->groupBy('year')->get();   
				$year = $a->merge($b);
				$year=$year->unique();
				@endphp

				<select id="year" name="year" class="form-control chosen-select btn-rounded">
					<option value=" ">--select--</option>
					{{-- <option value="All">All</option> --}}
					@foreach($year as $year)
					<option @if(date('Y')==$year->year){{ 'selected' }}@endif value="{{ $year->year }}">{{ $year->year }}</option>
					@endforeach

				</select>
			<span class="text-danger year" style="display: none"  >Select Year</span>
		</div>

		<div class="form-group col-sm-3">
			<label>Employee Code </label>
			<div class="input-group">
	            <input class="form-control input-sm btn-rounded" placeholder="Employee Code.." type="text" id="code" name="code">
	            <span class="input-group-btn">
	              <button type="submit" class="btn btn-danger btn-sm btn-rounded" onclick="getpayslipDetails()">Search.</button>
	            </span>
          	</div>			
          	<span class="text-danger code" style="display: none"  >Enter Employee Code </span>

		</div>


	</div>


	
	<div id="getpayslipDetails"></div>

	<div id="notgenerated" class="well m-t bg-light lt">
      <div class="row text-danger text-center">Salary not generated for this employee..
      </div>
    </div>  


</div>

@endsection
@section('jquery')
<script type="text/javascript">
$(".chosen-select").chosen({width:'100%'});

$('#notgenerated').hide();

function getpayslipDetails()
{


 var status=true;

			$("#searchDiv select, input[name='code']").each(function()
			{
			 var value=this.value; var name=this.name;

			 if(value==' ' || value==null || value=='') {  $('.'+name).show(); status=false;}

			 else $('.'+name).hide();

			   });


var code=$('#code').val();

var year=$('#year').val();

var month=$('#month').val();

if(status==false)
	return;
	$.ajax({

		type: "get",

		url: "{{URL::to('/') }}/hr/employeePayslip/create",

		data:{process:'employeePayslip',code:code,year:year,month:month},

			success: function (data) 

			{
			if(data==1)
			{
				$('#notgenerated').show();
				$('#getpayslipDetails').hide();
			}
			else
			{
				$('#getpayslipDetails').show();
				$('#notgenerated').hide();
				$('#getpayslipDetails').html(data);
			}

			}

			});

}


function printPayslip()
{
$('#pdfform').submit();

}
</script>


@endsection
