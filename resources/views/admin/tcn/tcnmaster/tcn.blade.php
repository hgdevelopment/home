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
@php 
use \App\Http\Controllers\Controller;
@endphp
@section('body')


<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-normal h3">TCN Master</h1>
</div>
<div class="wrapper-md" ng-controller="FormDemoCtrl">
	<div class="panel panel-default">
		<div class="panel-heading font-bold">ADD TCN</div>
		<div class="panel-body">
			<div class="row">
		        @if (trim($__env->yieldContent('editId')))
				<form role="form" method="post" action="{{URL::to('/') }}/admin/tcnmaster/@yield('editId')" id="form" enctype="multipart/form-data" data-parsley-validate>
				@else
				<form role="form" method="post" action="{{URL::to('/') }}/admin/tcnmaster" enctype="multipart/form-data"  id="form" data-parsley-validate>
				 @endif
				  {{ csrf_field() }}
		          @section('edit')
		          @show
					<div class="col-md-12">
						<div class="row">
							<div class="col-md-4">
								<label>TCN Type</label>
								<input type="text" name="tcnType" id="tcnType" class="form-control" placeholder="Enter TCN Type ( Ex : TCN X )"  value="@yield('tcnType'){{old('tcnType')}}" required data-parsley-required-message="Please Enter TCN Type" onblur="CheckThisTCN()" >
								@if ($errors->has('tcnType'))
								<span class="help-inline text-danger">{{$errors->first('tcnType')}}</span>
								@endif
							</div>

				            <div class="col-md-4">
				              <label>Locking Duration(In Months)</label>
				              <input type="number" name="lockingDuration" class="form-control" placeholder="Enter Locking Duration"  value="@yield('lockingDuration'){{old('lockingDuration')}}" data-parsley-trigger="change" data-parsley-type="integer" required data-parsley-required-message="Please Enter Valid Locking Duration"">
				            </div>

				             <div class="col-md-4">
				              <label>Benefit Locking Duration</label>
				              <input type="number" name="benefitLockingDuration" class="form-control" placeholder="Enter Benefit Locking Duration"  value="@yield('benefitLockingDuration'){{old('benefitLockingDuration')}}"  data-parsley-trigger="change" data-parsley-type="integer" required data-parsley-required-message="Please Enter Valid Benefit Locking Duration" />
				            </div>
			            </div>       <div class="col-sm-12">&nbsp;</div>

			            <div class="row">
				            <div class="col-md-4">
				              <label>Amount per unit (INR)</label>
				              <input name="inr" class="form-control" placeholder="Enter Amount per unit (INR)"   value="@yield('inr'){{old('inr')}}" type="number" data-parsley-type="number" required data-parsley-required-message="Please Enter INR Amount" >
				            </div>

				            <div class="col-md-4">
				              <label> Amount per unit (AED)</label>
				              <input  name="aed" class="form-control" placeholder="Enter Amount per unit (AED)"   value="@yield('aed'){{old('aed')}}" type="number" data-parsley-type="number" required data-parsley-required-message="Please Enter AED Amount" >
				            </div>

				            <div class="col-md-4">
				              <label> Amount per unit (USD)</label>
				              <input name="usd" class="form-control" placeholder="Enter Amount per unit (USD)"  value="@yield('usd'){{old('usd')}}" type="number" data-parsley-type="number" required data-parsley-required-message="Please Enter USD Amount" >
				            </div>
				        </div>       <div class="col-sm-12">&nbsp;</div>
				        
				        <div class="row">    
				            <div class="col-md-4">
				              <label>Amount per unit (SAR)</label>
				              <input  class="form-control" name="sar" id="sar" placeholder="Enter Amount per unit (SAR)"    value="@yield('sar'){{ old('sar') }}" type="number" data-parsley-type="number" required data-parsley-required-message="Please Enter SAR Amount" >
				            </div>

				            <div class="col-md-4">
				              <label> Amount per unit (CAD)</label>
				              <input name="cad" class="form-control" placeholder="Enter Amount per unit (CAD)"   value="@yield('cad'){{ old('cad') }}" type="number" data-parsley-type="number" required data-parsley-required-message="Please Enter CAD Amount" >
				            </div>

				            <div class="col-md-4">
				              <label> Profit Declaration</label>

				              <select name="profitDeclaration" class="form-control" placeholder="Profit Declaration" required data-parsley-required-message="Please Select Profit Declaration" >
				              	<option value=" ">Select</option>
				                <option value="Monthly" @if(!empty($edittcnmaster) && $edittcnmaster->profitDeclaration=='Monthly') {{ 'selected' }} @endif>Monthly</option>
				                
				                <option value="Bimonthly"  @if(!empty($edittcnmaster) && $edittcnmaster->profitDeclaration=='Bimonthly') {{ 'selected' }} @endif>Bimonthly</option>
				                
				                <option value="Quarterly"  @if(!empty($edittcnmaster) && $edittcnmaster->profitDeclaration=='Quarterly') {{ 'selected' }} @endif>Quarterly</option>
				               
				                <option value="Half-Yearly"  @if(!empty($edittcnmaster) && $edittcnmaster->profitDeclaration=='Half-Yearly') {{ 'selected' }} @endif>Half-Yearly</option>
				                
				                <option value="Yearly"  @if(!empty($edittcnmaster) && $edittcnmaster->profitDeclaration=='Yearly') {{ 'selected' }} @endif>Yearly</option>
				                
				                <option value="Biyearly"  @if(!empty($edittcnmaster) && $edittcnmaster->profitDeclaration=='Biyearly') {{ 'selected' }} @endif>Biyearly</option>
				             
				            </select>
				            </div>
				        </div>       <div class="col-sm-12">&nbsp;</div>
				            
				        <div class="row">
				            <div class="col-md-4">
				              <label>Open For</label>
				              <select name="openStatus" id="openStatus" class="form-control chosen" required data-parsley-required-message="Please Select Open For" onchange="openForSet()">
				              	<option value=" ">Select</option>
				                <option value="Always Open" @if(!empty($edittcnmaster) && $edittcnmaster->openStatus=='Always Open') {{'selected'}} @endif>Always Open</option>

				                <option @if(!empty($edittcnmaster) && $edittcnmaster->openStatus=='Limited Period') {{ 'selected' }} @endif value="Limited Period">Limited Period</option>
				              </select>
				            </div>
				                 
				           <div class="col-md-4">
				              <label>Open On</label>

				              <input class="form-control"  id="openOn" name="openOn" value="@if(isset($Edit['openOn'])){{date('d-m-Y',strtotime($Edit['openOn']))}}@endif{{old('openOn')}}" required="" data-parsley-required-message="Select Open On Date"  type="text">
				            </div>

				            <div class="col-md-4">
				              <label>Close On</label>
				              <input class="form-control"  id="closeOn" name="closeOn" value="@if(isset($Edit['openOn'])){{date('d-m-Y',strtotime($Edit['closeOn']))}}@endif{{old('closeOn')}}" required="" data-parsley-required-message="Select Close On Date" readonly="" type="text">
				            </div>
				        </div>   

{{-- 			            @if(isset($edittcnmaster->id)) 
			            <div class="row">
				            <div class="col-md-4">
				            <label>Application Header</label><br>
				            <img src="{{ URL::to('/') }}/img/tcnmaster/{{ $edittcnmaster->header }}" alt="header" style="width:100px;height:100px;">
				            <input type="file" id="header" name="header" ui-jq="filestyle">
				              @if ($errors->has('header'))
				              <span class="help-inline text-danger">{{$errors->first('header')}}</span>
							  @endif
				            </div>

				            <div class="col-md-4">
				            <label>Indian Certificate</label><br>
				            <img src="{{ URL::to('/') }}/img/tcnmaster/{{ $edittcnmaster->indianCertificate }}" alt="indianCertificate" style="width:100px;height:100px;">
				            <input type="file" id="indianCertificate" name="indianCertificate" ui-jq="filestyle">
				              @if ($errors->has('indianCertificate'))
				              <span class="help-inline text-danger">{{$errors->first('indianCertificate')}}</span>
							  @endif
				            </div>

				            <div class="col-md-4">
				            <label>DMCC Certificate</label><br>
				            <img src="{{ URL::to('/') }}/img/tcnmaster/{{ $edittcnmaster->certificateDmcc }}" alt="certificateDmcc" style="width:100px;height:100px;">
				            <input type="file" id="certificateDmcc" name="certificateDmcc" ui-jq="filestyle">
				              @if ($errors->has('certificateDmcc'))
				              <span class="help-inline text-danger">{{$errors->first('certificateDmcc')}}</span>
							  @endif
				            </div>
				        </div>    
			            @endif
 --}}						<div class="col-md-4">
{{-- 							<label>TCN Prefix</label>
							<input type="text" name="tcnPrefix" class="form-control" placeholder="Enter TCN Prefix" required>
 --}}						</div>

						<div class="col-md-4">
{{-- 							<label>TCN Certificate Prefix</label>
							<input type="text" name="tcnCertificatePrefix" class="form-control" placeholder="Enter TCN Certificate Prefix" required>
 --}}						</div>

			            <div class="col-md-4">
			              <br>
			              <button class="btn btn-success" type="button" onclick="validateThis()">Submit</button>
			              @if(isset($Edit))
			              <a href="{{ URL::to('/') }}/admin/tcnmaster" class="btn btn-danger" type="button">Cancel</a>
			              @endif
			            </div>
					</div>
				</form> 
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading font-bold">VIEW TCN DETAILS</div>
		<div class="panel-body">
			<div class="row">
				<div class="table-responsive" style="overflow-x: initial; padding: 7px;">
				<table class="table table-striped table-bordered dt-responsive nowrap b-t" cellspacing="0" width="100%"  id="table">
			        <thead>
			             <tr>
			                <th rowspan="2" valign="middle">TCN  Name</th>
			                <th colspan="5" align="center">Amount Per Unit</th>
			                <th rowspan="2">Open For</th>
			                <th rowspan="2">Locking Duration</th>
			                <th rowspan="2">Benefit Locking Duration</th>
			                <th rowspan="2">Profit</th>
			                <th rowspan="2">Actions</th>
			            </tr>
			            <tr>
			                <th>INR</th>
			                <th>AED</th>
			                <th>USD</th>
			                <th>SAR</th>
			                <th>CAD</th>
			            </tr>
			        </thead>
			        <tbody>
			        	@foreach ($tcnmaster as $tcnmasters)
			          <tr>
			            <td>{{ $tcnmasters->tcnType }}</td>
			            <td>{{ $tcnmasters->inr }}</td>
			            <td>{{ $tcnmasters->aed }}</td>
			            <td>{{ $tcnmasters->usd }}</td>
			            <td>{{ $tcnmasters->sar }}</td>
			            <td>{{ $tcnmasters->cad }}</td>
			            <td>{{ $tcnmasters->openStatus }}</td>
			            <td>{{ $tcnmasters->lockingDuration }}</td>
			            <td>{{ $tcnmasters->benefitLockingDuration }}</td>
			            <td>{{ $tcnmasters->profitDeclaration }}</td>
			            <td>
			            	@if(Controller::UserAccessRights('TCN Master Edit')=='1')
			              <a href="{{ URL::to('/') }}/admin/tcnmaster/{{ $tcnmasters->id }}/edit"  class="active"><i  style="color: #018001;" class="fa fa-pencil text-success text-active" aria-hidden="true"></i>
			              </a>
			              	@endif 
			            	@if(Controller::UserAccessRights('TCN Master Delete')=='1')
			              <form action="{{ URL::to('/') }}/admin/tcnmaster/{{ $tcnmasters->id }}" method="POST" class="pull-right">
			              {{ method_field('DELETE') }}
			              {{ csrf_field() }}
			              <button class="active" style="border: none;"><i  style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></button> 
			              </form>
			              	@endif

			            </td>
			          </tr>
			           @endforeach
			        </tbody>
		      </table>
		      </div>
			</div>
		</div>
	</div>

{{-- 		<div class="panel panel-default">
			<div class="panel-heading font-bold">TCN Images</div>
			<div class="table-responsive">
			<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="dsaRequest" >
			<thead>
			<tr>
			<th>TCN</th>
			<th>Application Header</th>
			<th>Indian Certificate</th>
			<th>DMCC Certificate</th>
			</tr>
			</thead>
			<tbody>
			@foreach ($tcnmaster as $tcnmasters)
			<tr>
			<td>{{ $tcnmasters->tcnType }}</td>
			<td><img src="{{ URL::to('/') }}/img/tcnmaster/{{ $tcnmasters->header }}" alt="header" style="width:100px;height:100px;" onclick="window.open('{{ URL::to('/') }}/img/tcnmaster/{{ $tcnmasters->header }}')"></td>
			<td><img src="{{ URL::to('/') }}/img/tcnmaster/{{ $tcnmasters->indianCertificate }}" alt="indianCertificate" style="width:100px;height:100px;" onclick="window.open('{{ URL::to('/') }}/img/tcnmaster/{{ $tcnmasters->indianCertificate }}')"></td>
			<td><img src="{{ URL::to('/') }}/img/tcnmaster/{{ $tcnmasters->certificateDmcc }}" alt="certificateDmcc" style="width:100px;height:100px;" onclick="window.open('{{ URL::to('/') }}/img/tcnmaster/{{ $tcnmasters->certificateDmcc }}')"></td>
			</tr>
			 @endforeach
			</tbody>
			</table>
			</div>
		</div>
	</div>
 --}}
@endsection

@section('jquery')




<script type="text/javascript">

$(".chosen-select").chosen();

function validateThis()
{

swal({
title: "Confirm!!",
text: "Are you sure, You want to save these Details?",
type: "info",
showCancelButton: true,
confirmButtonColor: "#2dbc09",
confirmButtonText: "Save",
animation: "slide-from-bottom",
closeOnConfirm: true
}, 
function (isConfirm) 
{
if(isConfirm) {
	$('#form').submit();
}
else
return; 
});
return ;
}

function CheckThisTCN()
{

var tcnType = $('#tcnType').val();


if(tcnType=='')
return;
else
{
	$.ajax({
	type: "get",
	url: "{{URL::to('/') }}/admin/tcnAjax",
	data:{opcode:11,tcnType:tcnType},
	success: function (data)
	 {

		if(data>0)
		{
	    sweetAlert("Oops...","This TCN Type has already Exist." , "error");

	   // $('#memberCode');
	   $('#tcnType').val(' ').attr('placeholder', 'Type your answer here');

		}
		else
		{ 

		}
	}
	});
}
}

function openForSet()
 {
var openStatus=$('#openStatus').val();

if(openStatus=="Always Open")
{
	$('#openOn').attr('disabled',true).attr('required',false);
	$('#closeOn').attr('disabled',true).attr('required',false);
}
else
	{
	$('#openOn').attr('disabled',false).attr('required',true);
	$('#closeOn').attr('disabled',false).attr('required',true);
	}	
}

$( "#openOn").datepicker({format:'dd-mm-yyyy',autoclose: true});
$( "#closeOn").datepicker({format:'dd-mm-yyyy',autoclose: true});

openForSet();
</script>

<script type="text/javascript" >
  $(document).ready(function(){
  $('#table').DataTable();
});
   $(document).ready(function(){
  $('#dsaRequest').DataTable();
});

  
</script>
@endsection