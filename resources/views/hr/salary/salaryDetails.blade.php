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

@section('body')

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
						{{-- <option value="All">All</option> --}}
						<option value="01")>January</option>
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

						<select id="year" name="year" class="form-control chosen-select">
							<option value=" ">--select--</option>
							{{-- <option value="All">All</option> --}}
							@foreach($year as $year)
							<option @if(date('Y')==$year->year){{ 'selected' }}@endif value="{{ $year->year }}">{{ $year->year }}</option>
							@endforeach

						</select>
					<span class="text-danger year" style="display: none"  >Select Year</span>
				</div>

			<div class="form-group col-sm-1">
			<label>&nbsp;</label><br>
				<button  class="btn btn-sm btn-primary font-bold" onclick="getSalaryDetails('list')">&nbsp;&nbsp; List &nbsp;&nbsp;</button>
			</div>

			<div class="form-group col-sm-1">
			<label>&nbsp;</label><br>
				<button  class="btn btn-sm btn-danger font-bold"  onclick="getSalaryDetails('excel')">Export Excel</button>
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

<form id="form1" action="{{ url('/hr/salaryDetails') }}" method="post">
	{{ csrf_field() }}

<input type="hidden" name="year" id="year1">
<input type="hidden" name="month" id="month1">
</form>
</div>

@endsection
@section('jquery')
<script type="text/javascript">
$(".chosen-select").chosen({width:'100%'});



function getSalaryDetails(type)
{


 var status=true;

			$("#searchDiv select").each(function()
			{
			 var value=this.value; var name=this.name;

			 if(value==' ' || value==null) {  $('.'+name).show(); status=false;}

			 else $('.'+name).hide();

			   });


var year=$('#year').val();

var month=$('#month').val();

if(status==false)
	return;

if(type=='list')
{		$.ajax({

		type: "get",

		url: "{{URL::to('/') }}/hr/salaryDetails/create",

		data:{process:'SalaryDetails',year:year,month:month},

			success: function (data) 

			{

		$('#getSalaryDetails').html(data);

			}

			});
}


if(type=='excel')
{
$('#year1').val($('#year').val());
$('#month1').val($('#month').val());
$('#form1').submit();
}



}
</script>


@endsection
