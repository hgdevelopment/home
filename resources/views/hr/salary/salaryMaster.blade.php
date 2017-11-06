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
<h1 class="m-n font-normal h3">Generate Salary</h1>
</div>

<div class="wrapper-md" id="wrapper-md" ng-controller="FormDemoCtrl">

	<div class="panel panel-default">
		<div class="panel-body" style="background: #f2b6f34d;">
			<div class="row" id="searchDiv">
				<div class="form-group col-sm-2">
					<label> Company Name{{ $passwords }}</label><br>
					<select id="company" name="company" class="chosen-select" onchange="getBranches()">
						<option value=" ">--Select--</option>
						<option value="All">All</option>

						@foreach($company as $company)
						<option value="{{ $company->id }}" @if(isset($company_id) && $company->id==$company_id){{'selected' }}@endif >{{ $company->company_name }}</option>
						@endforeach
					</select>
					<span class="text-danger company" style="display: none" >Select Company </span>

				</div>

				<div class="form-group col-sm-2">
					<label> Branch Name</label>
					<input type="hidden" name="branch_id" id="branch_id" value="{{ $branch_id ? : 0 }}">
					<select id="branch" name="branch" class="chosen-select">


					</select>
					<span class="text-danger branch" style="display: none"  >Select Branch</span>

				</div>	

				<div class="form-group col-sm-2">
					<label>Month </label>
					<select id="month" name="month" class="chosen-select">
						<option value=" ">--Select--</option>
						<option value="01" @if(isset($month) && '01'==$month){{'selected' }}@endif >January</option>
						<option value="02" @if(isset($month) && '02'==$month){{'selected' }}@endif >February</option>
						<option value="03" @if(isset($month) && '03'==$month){{'selected' }}@endif >March</option>
						<option value="04" @if(isset($month) && '04'==$month){{'selected' }}@endif >April</option>
						<option value="05" @if(isset($month) && '05'==$month){{'selected' }}@endif >May</option>
						<option value="06" @if(isset($month) && '06'==$month){{'selected' }}@endif >June</option>
						<option value="07" @if(isset($month) && '07'==$month){{'selected' }}@endif >July</option>
						<option value="08" @if(isset($month) && '08'==$month){{'selected' }}@endif >August</option>
						<option value="09" @if(isset($month) && '09'==$month){{'selected' }}@endif >September</option>
						<option value="10" @if(isset($month) && '10'==$month){{'selected' }}@endif >October</option>
						<option value="11" @if(isset($month) && '11'==$month){{'selected' }}@endif >November</option>
						<option value="12" @if(isset($month) && '12'==$month){{'selected' }}@endif >December</option>
					</select>
					<span class="text-danger month" style="display: none"  >Select Month </span>

				</div>
				<div class="form-group col-sm-2">
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
							@foreach($year as $years)
							<option @if(date('Y')==$years->year ||  (isset($year) && $year==$years->year) ){{ 'selected' }}@endif value="{{ $years->year }}">{{ $years->year }}</option>
							@endforeach

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

@endsection
@section('jquery')
<script type="text/javascript">


$(".chosen-select").chosen({width:'100%'});




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

		url: "{{URL::to('/') }}/hr/salaryMaster/create",

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

@if(isset($branch_id))
<script>
getSalaryDetails();
</script>

@endif


@if (Session::has('sweet_alert.alert'))
    <script>
        swal({
            text: "{!! Session::get('sweet_alert.text') !!}",
            title: "{!! Session::get('sweet_alert.title') !!}",
            timer: {!! Session::get('sweet_alert.timer') !!},
            type: "{!! Session::get('sweet_alert.type') !!}",
            // showConfirmButton: "!! Session::get('sweet_alert.showConfirmButton') !!}",
            // confirmButtonText: "!! Session::get('sweet_alert.confirmButtonText') !!}",
            // confirmButtonColor: "#AEDEF4",
            // showCancelButton: false,
            // closeOnConfirm: true
@php 
            Session::Forget('sweet_alert'); @endphp
            // more options
        });
    </script>
@endif

@endsection
