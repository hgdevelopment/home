@extends('layout.erp')
@section('banner')
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
	<img src="{{ URL::asset('new_heading.png') }}" class="img-responsive">
</div>
@endsection
@section('sidebar')
@include('partial.header')
@include('partial.aside')
@endsection
<style type="text/css">
	 tbody > tr > td, .table-condensed > tfoot > tr > td {
    padding: 10px;
}
</style>
@section('body')
<div class="bg-light lter b-b wrapper-md">
	<h1 class="m-n font-thin h3">DSA(Direct Selling Agent) Registration Form</h1><br>
	<h6 class="m-n font-thin h5">Please enter all relevant personal information in the fields below.</h6>
</div>
<br>
<form action="" method="post" data-parsley-validate enctype="multipart/form-data">
	{{ csrf_field() }}
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading font-bold">Personal Details</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label>Company Name</label>
							<input type="text" class="form-control" placeholder="Company Name" name="companyName" id="companyName">
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Full Name*</label>
							<input type="text" class="form-control" placeholder="Full Name" required data-parsley-required-message="Please Enter Full Name" name="name" id="name">
							@if ($errors->has('name'))
	                          <span class="help-inline">{{$errors->first('name')}}</span>
	                        @endif
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Father's Name/Husband's Name</label>
							<input type="text" class="form-control" placeholder="Father's Name/Husband's Name" name="guardian" id="guardian">
						</div>
					</div>
					<div class="col-sm-12"></div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Date of Birth*</label>
							<input type="text" class="form-control" name="dob" id="dob" placeholder="Date of Birth" required data-parsley-required-message="Please Select Correct DOB">
							@if ($errors->has('dob'))
	                          <span class="help-inline">{{$errors->first('dob')}}</span>
	                        @endif
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Gender*</label>
							<select  class="form-control" required data-parsley-required-message="Please Select Gender" name="gender" id="gender">
								<option value="">Select</option>
								<option value="Male">Male</option>
								<option value="female">Female</option>
							</select>
							@if ($errors->has('gender'))
	                          <span class="help-inline">{{$errors->first('gender')}}</span>
	                        @endif
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Religion</label>
							<input type="text" value="Islam" readonly name="religion" class="form-control" name="religion" id="religion">
						</div>
					</div>
					<div class="col-sm-12"></div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Blood Group</label>
							<select  class="form-control" name="bloodGroup" id="bloodGroup">
								<option value="">Select</option>
								<option value="A+">A+</option>
								<option value="A-">A-</option>
								<option value="B+">B+</option>
								<option value="B-">B-</option>
								<option value="O+">O+</option>
								<option value="O-">O-</option>
								<option value="AB+">AB+</option>
								<option value="AB-">AB-</option>
							</select>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Marital status*</label>
							<select  class="form-control" required data-parsley-required-message="Please Select Marital status" name="maritalStatus" id="maritalStatus">
								<option value="">Select</option>
								<option value="Single">Single</option>
								<option value="Married">Married</option>
								<option value="Widowed">Widowed</option>
								<option value="Divorced">Divorced</option>
							</select>
							@if ($errors->has('maritalStatus'))
	                          <span class="help-inline">{{$errors->first('maritalStatus')}}</span>
	                        @endif
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>How Do You Know About Heera Group</label>
							<input type="text" class="form-control" placeholder="How Do You Know About Heera Group" name="aboutHeera" id="aboutHeera">
						</div>
					</div>
					<div class="col-sm-12"></div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Mobile No*</label>
							<input type="number" class="form-control" placeholder="Mobile No" required data-parsley-required-message="Please Enter Mobile Number" data-parsley-trigger="keyup" data-parsley-minlength="10" data-parsley-maxlength="14" name="mobileNo" id="mobileNo">
							@if ($errors->has('mobileNo'))
	                          <span class="help-inline">{{$errors->first('mobileNo')}}</span>
	                        @endif
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Email*</label>
							<input type="email" class="form-control" placeholder="Email" required data-parsley-required-message="Please Enter Correct Email" data-parsley-trigger="change" name="email" id="email">
							@if ($errors->has('email'))
	                          <span class="help-inline">{{$errors->first('email')}}</span>
	                        @endif
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Upload Photo*</label>
							<input type="file" class="form-control" required data-parsley-required-message="Please Upload Photo" name="photo" id="photo" accept="image/png,image/jpeg">
						</div>
						@if ($errors->has('photo'))
                          <span class="help-inline">{{$errors->first('photo')}}</span>
                        @endif
					</div>
					<div class="col-sm-12"></div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Upload Signature*</label>
							<input type="file" class="form-control" required data-parsley-required-message="Please upload Signature" name="signature" id="signature" accept="image/png,image/jpeg">
							@if ($errors->has('signature'))
                          		<span class="help-inline">{{$errors->first('signature')}}</span>
                        	@endif
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-sm-4">
		<div class="panel panel-default">
			<div class="panel-heading font-bold">Official Address</div>
			<div class="panel-body">
				<div class="form-group">
					<label>Address*</label>
					<textarea type="text" class="form-control" placeholder="Address" required data-parsley-required-message="Please Enter Address " data-parsley-trigger="keyup" data-parsley-minlength="20" name="officialAddress" id="officialAddress"></textarea>
					@if ($errors->has('officialAddress'))
                  		<span class="help-inline">{{$errors->first('officialAddress')}}</span>
                	@endif
				</div>
				<div class="form-group">
					<label>City*</label>
					<input type="text" class="form-control" placeholder="City" required data-parsley-required-message="Please Enter City" name="officialCity" id="officialAddress">
					@if ($errors->has('officialCity'))
                  		<span class="help-inline">{{$errors->first('officialCity')}}</span>
                	@endif
				</div>
				<div class="form-group">
					<label>State*</label>
					<input type="text" class="form-control" placeholder="State" required data-parsley-required-message="Please Enter State" name="officialState" id="officialState">
					@if ($errors->has('officialState'))
                  		<span class="help-inline">{{$errors->first('officialState')}}</span>
                	@endif
				</div>
				<div class="form-group">
					<label>Pin*</label>
					<input type="number" class="form-control" placeholder="Pin" required data-parsley-required-message="Please Enter Pin Number" data-parsley-trigger="keyup"  data-parsley-maxlength="6" name="officialPin" id="officialPin">
					@if ($errors->has('officialPin'))
                  		<span class="help-inline">{{$errors->first('officialPin')}}</span>
                	@endif
				</div>
			</div>
		</div>
	</div>

	<div class="col-sm-4">
		<div class="panel panel-default">
			<div class="panel-heading font-bold">Permanent Address 
			<span style="float: right;font-size: 7px;">SAME AS PERMANENT ADDRESS  
			<label class="checkbox-inline i-checks">
            <input type="checkbox" name="sameAddress" id="sameAddress" onclick="sameaddress()"><i></i></label></span></div>
			<div class="panel-body">
				<div class="form-group">
					<label>Address*</label>
					<textarea type="text" class="form-control" placeholder="Address" required data-parsley-required-message="Please Enter Address " data-parsley-trigger="keyup" data-parsley-minlength="20" name="permanentAddress" id="permanentAddress"></textarea>
					@if ($errors->has('permanentAddress'))
                  		<span class="help-inline">{{$errors->first('permanentAddress')}}</span>
                	@endif
				</div>
				<div class="form-group">
					<label>City*</label>
					<input type="text" class="form-control" placeholder="City" required data-parsley-required-message="Please Enter City " name="permanentCity" id="permanentCity">
					@if ($errors->has('permanentCity'))
                  		<span class="help-inline">{{$errors->first('permanentCity')}}</span>
                	@endif
				</div>
				<div class="form-group">
					<label>State*</label>
					<input type="text" class="form-control" placeholder="State" required data-parsley-required-message="Please Enter State " name="permanentState" id="permanentState">
					@if ($errors->has('permanentState'))
                  		<span class="help-inline">{{$errors->first('permanentState')}}</span>
                	@endif
				</div>
				<div class="form-group">
					<label>Pin*</label>
					<input type="number" class="form-control" placeholder="Pin" required data-parsley-required-message="Please Enter Pin Number " data-parsley-trigger="keyup"  data-parsley-maxlength="6" name="permanentPin" id="permanentPin">
					@if ($errors->has('permanentPin'))
                  		<span class="help-inline">{{$errors->first('permanentPin')}}</span>
                	@endif
				</div>
			</div>
		</div>
	</div>

	<div class="col-sm-4">
		<div class="panel panel-default">
			<div class="panel-heading font-bold">Address For Correspondence</div>
			<div class="panel-body">
				<div class="form-group">
					<label>Address*</label>
					<textarea type="text" class="form-control" placeholder="Address" required data-parsley-required-message="Please Enter Address " data-parsley-trigger="keyup" data-parsley-minlength="20" name="corrsAddress" id="corrsAddress"></textarea>
					@if ($errors->has('corrsAddress'))
                  		<span class="help-inline">{{$errors->first('corrsAddress')}}</span>
                	@endif
				</div>
				<div class="form-group">
					<label>City*</label>
					<input type="text" class="form-control" placeholder="City" required data-parsley-required-message="Please Enter City " name="corrsCity" id="corrsCity">
					@if ($errors->has('corrsCity'))
                  		<span class="help-inline">{{$errors->first('corrsCity')}}</span>
                	@endif
				</div>
				<div class="form-group">
					<label>State*</label>
					<input type="text" class="form-control" placeholder="State" required data-parsley-required-message="Please Enter State" name="corrsState" id="corrsState">
					@if ($errors->has('corrsState'))
	              		<span class="help-inline">{{$errors->first('corrsState')}}</span>
	            	@endif
				</div>
				<div class="form-group">
					<label>Pin*</label>
					<input type="number" class="form-control" placeholder="Pin" required data-parsley-required-message="Please Enter Pin Number " data-parsley-trigger="keyup"  data-parsley-maxlength="6" name="corrsPin" id="corrsPin">
					@if ($errors->has('corrsPin'))
                  		<span class="help-inline">{{$errors->first('corrsPin')}}</span>
                	@endif
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-12"></div>

	<div class="col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading font-bold">Proof</div>
			<div class="panel-body">
				<div class="form-group">
					<label>Type of proof*</label>
					<select  class="form-control" required data-parsley-required-message="Please Select Type Of Proof" name="typeOfProof" id="typeOfProof">
					<option value=""> Select </option>
                        @foreach ($listTypes['proof_type'] as $proof_type)
                        <option value="{{$proof_type}}">{{ucfirst($proof_type)}}</option>
                        @endforeach
					</select>
					@if ($errors->has('typeOfProof'))
                  		<span class="help-inline">{{$errors->first('typeOfProof')}}</span>
                	@endif
				</div>
				<div class="form-group">
					<label>ID Number*</label>
					<input type="text" class="form-control" placeholder="ID Number" required data-parsley-required-message="Please Enter ID Number" name="idNumber" id="idNumber">
					@if ($errors->has('idNumber'))
                  		<span class="help-inline">{{$errors->first('idNumber')}}</span>
                	@endif
				</div>
				<div class="form-group">
					<label>Issued At*</label>
					<input type="text" class="form-control" placeholder="Issued At" required data-parsley-required-message="Please Enter Issued At" name="issuedAt" id="issuedAt">
					@if ($errors->has('issuedAt'))
                  		<span class="help-inline">{{$errors->first('issuedAt')}}</span>
                	@endif
				</div>
				<div class="form-group">
					<label>Issued Date*</label>
					<input type="text" class="form-control" placeholder="Issued Date" required data-parsley-required-message="Please Enter Issued Date" name="issuedDate" id="issuedDate">
					@if ($errors->has('issuedDate'))
                  		<span class="help-inline">{{$errors->first('issuedDate')}}</span>
                	@endif
				</div>
				<div class="row">
				<div class="col-sm-6">
				<div class="form-group">
					<label>Expiry Date*</label>
					<input type="text" class="form-control" placeholder="Expiry Date" required data-parsley-required-message="Please Enter Expiry Date" name="expiryDate" id="expiryDate">
					@if ($errors->has('expiryDate'))
                  		<span class="help-inline">{{$errors->first('expiryDate')}}</span>
                	@endif
				</div>
				</div>
				<div class="col-sm-6">
				<div class="form-group">
					<label>Upload Proof*</label>
					<input type="file" class="form-control" placeholder="Branch" required data-parsley-required-message="Please Upload Proof" name="IdProof" id="IdProof" accept="image/png,image/jpeg">
					@if ($errors->has('IdProof'))
                  		<span class="help-inline">{{$errors->first('IdProof')}}</span>
                	@endif
				</div>
				</div></div>
			</div>
		</div>
	</div>

	<div class="col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading font-bold">Heera Payment Details</div>
			<div class="panel-body">
				<div class="form-group">
					<label>Pay Mode*</label>
					<select  class="form-control" required data-parsley-required-message="Please Select payment Mode" name="paymentMode" id="paymentMode">
					<option value=""> Select </option>
                        @foreach ($listTypes['pay_mode'] as $pay_mode)
                        <option value="{{$pay_mode}}">{{ucfirst($pay_mode)}}</option>
                        @endforeach
					</select>
					@if ($errors->has('paymentMode'))
                  		<span class="help-inline">{{$errors->first('paymentMode')}}</span>
                	@endif
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>DD/CHEQUE/TRANSACTION No.*</label>
							<input type="text" class="form-control" required data-parsley-required-message="Please Enter Number" name="number" id="number">
							@if ($errors->has('number'))
		                  		<span class="help-inline">{{$errors->first('number')}}</span>
		                	@endif
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Deposit Date*</label>
							<input type="text" class="form-control" placeholder="Deposit Date" name="depositDate" required data-parsley-required-message="Please Select Date"  id="depositDate">
							@if ($errors->has('depositDate'))
		                  		<span class="help-inline">{{$errors->first('depositDate')}}</span>
		                	@endif
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Bank*</label>
							<input type="text" class="form-control" placeholder="Bank" required data-parsley-required-message="Please Enter Bank Name" name="bankName" id="bankName">
							@if ($errors->has('bankName'))
		                  		<span class="help-inline">{{$errors->first('bankName')}}</span>
		                	@endif
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Branch*</label>
							<input type="text" class="form-control" placeholder="Branch" required data-parsley-required-message="Please Enter Branch Name" name="branch" id="branch">
							@if ($errors->has('branch'))
		                  		<span class="help-inline">{{$errors->first('branch')}}</span>
		                	@endif
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Heera's Account no*</label>
					<input type="text" class="form-control" placeholder="Heera's Account no" required data-parsley-required-message="Please Enter acciunt Number" name="accountNo" id="accountNo">
					@if ($errors->has('accountNo'))
                  		<span class="help-inline">{{$errors->first('accountNo')}}</span>
                	@endif
				</div>
				<div class="form-group">
					<label>Proof*</label>
					<input type="file" class="form-control" placeholder="Branch" required data-parsley-required-message="Please Upload Proof" name="proof" id="proof">
					@if ($errors->has('proof'))
                  		<span class="help-inline">{{$errors->first('proof')}}</span>
                	@endif
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-12"></div>

	<div class="col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading font-bold">Incentive Remittance</div>
			<div class="panel-body">
				<div class="form-group">
					<label>Account Holder Name*</label>
					<input type="text" class="form-control" placeholder="Account Holder Name" required data-parsley-required-message="Please Enter Name" name="holderName" id="holderName">
					@if ($errors->has('holderName'))
                  		<span class="help-inline">{{$errors->first('holderName')}}</span>
                	@endif
				</div>
				<div class="form-group">
					<label>Account Number*</label>
					<input type="text" class="form-control" placeholder="Account Number" required data-parsley-required-message="Please Enter Account Number" name="incaccountnumber" id="incaccountnumber">
					@if ($errors->has('incaccountnumber'))
                  		<span class="help-inline">{{$errors->first('incaccountnumber')}}</span>
                	@endif
				</div>
				<div class="form-group">
					<label>Bank Name*</label>
					<input type="text" class="form-control" placeholder="Bank Name" required data-parsley-required-message="Please Enter Bank Name" name="incbankName" id="incbankName">
					@if ($errors->has('incbankName'))
                  		<span class="help-inline">{{$errors->first('incbankName')}}</span>
                	@endif
				</div>
				<div class="form-group">
					<label>Branch*</label>
					<input type="text" class="form-control" placeholder="Branch" required data-parsley-required-message="Please Enter Branch Name" name="incBranchName" id="incBranchName">
					@if ($errors->has('incBranchName'))
                  		<span class="help-inline">{{$errors->first('incBranchName')}}</span>
                	@endif
				</div>
				<div class="form-group">
					<label>IFSC*</label>
					<input type="text" class="form-control" placeholder="IFSC" required data-parsley-required-message="Please Enter IFSC Code" name="incIfscCode" id="incIfscCode">
					@if ($errors->has('incIfscCode'))
                  		<span class="help-inline">{{$errors->first('incIfscCode')}}</span>
                	@endif
				</div>
			</div>
		</div>
	</div>

	<div class="col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading font-bold">Reference</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Referees Name</label>
							<input type="text" class="form-control" placeholder="Referees Name" name="refName" id="refName">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Address</label>
							<textarea type="text" class="form-control" placeholder="Address" name="refaddress" id="refaddress" ></textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>District</label>
							<input type="text" class="form-control" placeholder="District" name="refDistrict" id="refDistrict">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>State</label>
							<input type="text" class="form-control" placeholder="State" name="refState" id="refState">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Pin</label>
							<input type="number" class="form-control" placeholder="Pin" data-parsley-trigger="keyup"  data-parsley-maxlength="6" name="refPin" id="refPin">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Mobile No</label>
							<input type="number" class="form-control" placeholder="Mobile No" data-parsley-trigger="keyup" data-parsley-minlength="10" data-parsley-maxlength="14" name="refMobileNo" id="refMobileNo">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" placeholder="Email" data-parsley-trigger="change" name="refEmail" id="refEmail">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Relationship</label>
							<select  class="form-control" name="relationship" id="relationship">
								<option value=""> Select Value</option>
		                        @foreach ($listTypes['relationship'] as $relationship)
		                        <option value="{{$relationship}}">{{ucfirst($relationship)}}</option>
		                        @endforeach
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-12"></div>

	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading font-bold">DECLARATION</div>
			<div class="panel-body">
				<div class="form-horizontal">
					<div class="form-group">
						<div class="col-lg-12">
							<p class="form-control-static">I HAVE READ THE TERMS AND CONDITIONS OF HG AND THE SAME HAVE BEEN WELL EXPLAINED TO ME BY THE HG AUTHORITIES. I AM ALSO AWARE THAT THE TERMS AND CONDITIONS OF HG ARE PRINTED OVERLEAF .I HERE BY AGREE TO ABIDE BY THEM I DECLARE THAT ALL ABOVE DETAILS PROVIDED BY ME ARE CORRECT TO THE BEST OF MY KNOWLDGE</p>
						</div>
					</div>
					
					<div class="form-group">
						<label class="col-lg-2 control-label">
							<div class="checkbox">
								<label class="i-checks">
									<input type="checkbox" checked="" ><i></i> 
								</label>
							</div>
						</label>
						<div class="col-lg-10">
							<p class="form-control-static">
								<a>Terms & Conditions</a>
								I AGREE TO FULFILL ALL THE REQUISITES MENTIONED IN THE TERMS AND CONDITIONS OF HG
							</p>
						</div>
					</div>
					<div class="line line-dashed b-b line-lg pull-in"></div>
					<div class="col-sm-4 col-sm-offset-5">
						<button type="submit" class="btn btn-primary">Submit</button>
						<button type="submit" class="btn btn-default">Cancel</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection
@section('jquery')
<script type="text/javascript" src="{{ URL::asset('js/parsley.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap-datepicker.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/bootstrap-datepicker.min.css') }}" type="text/css" />
  <script type="text/javascript">
$('#dob').datepicker({
				format: 'dd-mm-yyyy'
			});
$('#issuedDate').datepicker({
				format: 'dd-mm-yyyy'
			});
$('#expiryDate').datepicker({
				format: 'dd-mm-yyyy'
			});
$('#depositDate').datepicker({
				format: 'dd-mm-yyyy'
			});
  </script>
<script type="text/javascript">
	function sameaddress()
	{
		var value = document.getElementById("sameAddress").checked==true;
		if(value==true)
		{
			$('#corrsAddress').val($('#permanentAddress').val());
			$('#corrsCity').val($('#permanentCity').val());
			$('#corrsState').val($('#permanentState').val());
			$('#corrsPin').val($('#permanentPin').val());
		}
	}
</script>
@endsection