@extends('web.layout.erp')
@section('banner')
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
<img src="{{ URL::to('/') }}/new_heading.png" class="img-responsive">
</div>
@endsection

@section('sidebar')
@include('web.partial.header')
@include('web.partial.aside')
@endsection

@php
use Auth;	
@endphp
@section('body')

<div class="bg-light lter b-b wrapper-md">
<h1 class="m-n font-normal h3">TCN Request</h1>
</div>

<div class="wrapper-md" id="wrapper-md" ng-controller="FormDemoCtrl">

		@if(session()->has('message'))
		<style type="text/css">
			#form{display:none;}
		</style>
		<div class="alert alert-success fade in alert-dismissable">
		<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close" style="color: red">×</a>
		<strong>Info! </strong> {{session()->get('message')}}
			<div class="panel-body h5">
				<div class="col-md-2"></div>
				<div class="col-sm-8">
					<div class="row">
						<div class="col-md-6">Member Code </div>
						<div class="col-md-6"><b class="" >{{ strtoupper(session()->get('memberCode')) }}</b></div><br>
					</div>
						
					<div class="row">
						<div class="col-md-6">TCN Code </div>
						<div class="col-md-6"><b class="">{{ strtoupper(session()->get('tcnCode')) }}</b></div><br>
					</div>

					<div class="row">
						<div class="col-md-6">Email </div>
						<div class="col-md-6"><b class="">{{ session()->get('email') }}</b></div><br>
					</div>	
					<div class="row">
						<div class="col-md-6">Currency Type </div>
						<div class="col-md-6"><b class="">{{ session()->get('currencyType') }}</b></div><br>
					</div>	
					<div class="row">
						<div class="col-md-6">Amount </div>
						<div class="col-md-6"><b class="">{{ session()->get('amount') }}</b></div><br>
					</div>	

					<div class="row">
						<div class="col-md-12 text-center text-danger"><br><b>Deposit This Account </b><br><br></div><br>
					</div>
					
					<div class="row">
						<div class="col-md-6">Heera Account Number </div>
						<div class="col-md-6"><b class="">{{ session()->get('accountNumber') }}</b></div><br>
					</div>	
					
					<div class="row">
						<div class="col-md-6">Account Holder Name </div>
						<div class="col-md-6"><b class="">{{ session()->get('accountHolderName') }}</b></div><br>
					</div>

					<div class="row">
						<div class="col-md-6">Bank Name </div>
						<div class="col-md-6"><b class="">{{ session()->get('bankName') }}</b></div><br>
					</div>

					<div class="row">
						<div class="col-md-6">IFSC Code </div>
						<div class="col-md-6"><b class="">{{ session()->get('ifsc') }}</b></div><br>
					</div>
						
					</div>	
				</div>
 			</div>

		@endif


<style type="text/css">
	#parsley-id-17{
		position: relative;
	}
	#parsley-id-23{

		display:inherit;
	}
</style>

		<input type="hidden" id="userCode" name="userCode" value="{{ $userCode }}">

	<form role="form" method="post" action="{{URL::to('/')}}/web/tcnRequest" id="form" data-parsley-validate id="form">
		{{ csrf_field() }}
		<input type="hidden" id="userId" name="userId" value="">
		<input type="hidden" id="userCode1" name="userCode1" value="">
		<div class="panel panel-default">
			<div class="panel-heading font-bold">TCN REQUEST FORM</div>
			<div class="panel-body">
				<div class="col-sm-12">
					<div class="row">
						<div class="form-group col-sm-4" id="gettcnType">
							<label>TCN</label>
							<select class="form-control chosen-select" name="tcnType" id="tcnType" required data-parsley-required-message="Select TCN Type" onchange="calcAmount();heeraAccountCheck();">
								<option value=" ">Select</option>
									@php
									$table=DB::table('tcnmasters')->get();

									@endphp
								@foreach($table as $tcntype)
								<option value="{{$tcntype->id}}">{{$tcntype->tcnType}}</option>
								@endforeach
							</select>
						</div>

						<div class="col-sm-4">Currency Type
							<select class="form-control col-md-6 chosen-select" name="currencyType" id="currencyType" onchange="calcAmount();heeraAccountCheck();" required data-parsley-required-message="Select Currency Type">
								<option value=" ">Select</option>
								<option value="INR">INR</option>
								<option value="USD">USD</option>
								<option value="AED">AED</option>
								<option value="SAR">SAR</option>
								<option value="CAD">CAD</option>
							</select>
						</div>    


						<div class="col-sm-4">Unit
							<select class="form-control col-md-6 chosen-select" name="unit" id="unit"  onchange="calcAmount()" required data-parsley-required-message="Select Unit">
								<option value=" ">Select</option>
								<?php for($i=1;$i<=100;$i++) {?>
								<option value="<?php echo $i; ?>"><?php echo $i;?></option>
								<?php } ?>
							</select>
						</div>
					</div>
				</div> <div class="col-sm-12">&nbsp;</div>

				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-4" id="getCountrys">
							ApplyingFrom
							<select class="form-control chosen-select" name="applyingFrom" id="applyingFrom" required data-parsley-required-message="Select Apply From">
								<option value=" ">Select</option>
								@php
    							$table = DB::table('countries')->get();
								@endphp
								@foreach($table as $countrys)
								<option value="{{$countrys->id}}">{{$countrys->countryCode}} - {{$countrys->countryName}}</option>
								@endforeach
							</select>
						</div>

						<div class="col-sm-4">Amount
							<input type="text" name="amount" id="amount" value="{{old('amount')}}" class="form-control" readonly  />
						</div>

						<div class="col-sm-4">Payment Mode
							<select class="form-control col-md-6 chosen-select" name="paymentMode" id="paymentMode"  required data-parsley-required-message="Select Payment Mode">
								<option value=" ">Select</option>
								<option value="cheque">CHEQUE</option>
								<option value="DD">DD</option>
								<option value="online">ONLINE TRANSFERS</option>
								<option value="cash">CASH</option>
								<option value="other">OTHERS</option>
							</select>
						</div>
					</div>
				</div><div class="col-sm-12">&nbsp;</div>

				<div class="col-sm-12">
					<div class="row">
{{-- 						<div class="col-sm-4">Deposit Date
							<input class="form-control" type="text" data-date-start-date="0d" id="depositeDate" name="depositeDate" value="{{old('depositeDate')}}" required data-parsley-required-message="Select Deposit Date" readonly>

						</div>
 --}}
						<div class="col-sm-4">Heera Account Number
							<input type="hidden" name="heeraAccountId" id="heeraAccountId" value="">
							<input type="hidden" name="bankName" id="bankName" value="">
							<input type="hidden" name="accountHolderName" id="accountHolderName" value="">
							<input type="hidden" name="ifsc" id="ifsc" value="">
							<input class="form-control" type="text" data-date-start-date="0d" id="heeraAccountNumber" name="heeraAccountNumber" value=""  readonly required data-parsley-required-message="Heera Account Number is required">

						</div>
						<div class="col-sm-4">Email Id
							<input type="email" name="email" id="email" value="" class="form-control"   data-parsley-trigger="keyup"  required data-parsley-required-message="Enter Valid Email Id"/>
						</div>

						<div class="col-sm-4"><br>
							<input type="submit" value=" Save " class="btn  btn-danger font-bold">		
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
$( "#depositeDate").datepicker({format:'dd-mm-yyyy',autoclose: true});
$('.chosen-select').chosen({width:'100%'});



function getMember()
{
	var userCode=$('#userCode').val().replace(/\s/g, '');

	if(userCode=='' || userCode==null)
	{
	$('.userCode').html('Enter A Valid Member Code');
	return;
	}
	else
	{
	$('.userCode').html('');
	$.ajax({
	type: "get",
	url: "{{URL::to('/') }}/web/tcnRequest/create",
	data:{process:'getMember',userCode:userCode},
	success: function (data)
	{
		if(data['memCount']!=1)
		{
		   sweetAlert("Check...","Incorrect Member Code." , "error");
		   $('#userCode').val(' ');
		   $('.userCode').html('Enter A Valid Member Code');
		}
		if(data['tcnCount']>0)
		{
		    sweetAlert("Oops...","You are already applied for a TCN today. A member is allowed to apply TCN only once in a day." , "error");
		    $('#form').hide();
		}
		if(data['memCount']==1 && data['tcnCount']==0)
		{	

		   $('#email').val(data['email']);
		   $('#userId').val(data['userId']);
		   $('#userCode1').val(data['userCode']);
		}
	}
	});
	}
}



function calcAmount()
{
	var id=$('#tcnType').val();	
	var unit=$('#unit').val();	
	var currencyType=$('#currencyType').val();	
	$.ajax({
	type: "get",
	url: "{{URL::to('/') }}/web/tcnRequest/create",
	data:{process:'calcAmount',id:id,currencyType:currencyType},
	success: function (data) {
	$('#amount').val(data*unit);
	}
	});

}

function heeraAccountCheck()
{

var tcnType=$('#tcnType').val();	
var currencyType=$('#currencyType').val();

	$.ajax({
	type: "get",
	url: "{{URL::to('/') }}/web/tcnRequest/create",
	data:{process:'heeraAccountCheck',currencyType:currencyType,tcnType:tcnType},
	success: function (data) 
	{


		$('#heeraAccountId').val(data['heeraAccountId']);
		$('#heeraAccountNumber').val(data['heeraAccountNumber']);
		$('#bankName').val(data['bankName']);
		$('#accountHolderName').val(data['accountHolderName']);
		$('#ifsc').val(data['ifsc']);


		$(".chosen-select").chosen({width:'100%'});
	}
	});

}
</script>


@if(!session()->has('message'))
<script type="text/javascript">
getMember();
</script>
@endif

@endsection
