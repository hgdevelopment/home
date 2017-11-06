@extends('admin.layout.erp1')
@section('banner')
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
	<img src="{{ URL::asset('new_heading.png') }}" class="img-responsive">
</div>
@endsection
@section('sidebar')
@include('admin.partial.header')
@include('admin.partial.aside')
@endsection
 <style type="text/css">
	.help-inline{
		color:red;
	}
	 tbody > tr > td, .table-condensed > tfoot > tr > td {
	}
   .i-checks > i {
   	    width: 20px;
    height: 14px;
    margin-top: -8px;
}
}
</style>
@section('body')
<div class="bg-light lter b-b wrapper-md">
	<h1 class="m-n font-thin h3">DSA(Direct Selling Agent) Registration Form</h1>
</div>
<br>
<form action="" method="post" data-parsley-validate enctype="multipart/form-data" id="form">
	{{ csrf_field() }}
	<div class="col-sm-12">
		<div class="panel panel-default">
			<div class="panel-heading font-bold">Personal Details</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label>Company Name</label>
							<input type="text" class="form-control" placeholder="Company Name" name="companyName" id="companyName" value="{{ old('companyName')}}" >
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Full Name<spam style="color:red;">*</spam></label>
							<input type="text" class="form-control" placeholder="Full Name" required data-parsley-required-message="Please Enter Full Name" name="name" id="name" value="{{ old('name')}}">
							@if ($errors->has('name'))
	                          <span class="help-inline">{{$errors->first('name')}}</span>
	                        @endif
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Father's Name/Husband's Name</label>
							<input type="text" class="form-control" placeholder="Father's Name/Husband's Name" name="guardian" id="guardian" value="{{ old('guardian')}}">
						</div>
					</div>
					<div class="col-sm-12"></div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Date of Birth<spam style="color:red;">*</spam></label>
							<input type="text" class="form-control" name="dob" id="dob" data-language="en"  onchange="check()"  placeholder="DOB" required data-parsley-required-message="Please Select DOB" value="{{ old('dob')}}">
							<div id="dateerror" style="color:red;"></div>
							@if ($errors->has('dob'))
	                          <span class="help-inline">{{$errors->first('dob')}}</span>
	                        @endif
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Gender<spam style="color:red;">*</spam></label>
							<select  class="form-control" required data-parsley-required-message="Please Select Gender" name="gender" id="gender" value="{{ old('companyName')}}">
								<option value="">Select</option>
								<option value="male" {{ (old('gender')=='male')?'selected':'' }}>Male</option>
								<option value="female" {{ (old('gender')=='female')?'selected':'' }}>Female</option>
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
							<label>Marital status<spam style="color:red;">*</spam></label>
							<select  class="form-control" required data-parsley-required-message="Please Select Marital status" name="maritalStatus" id="maritalStatus" value="{{ old('companyName')}}">
								<option value="">Select</option>
								<option value="Single" {{ (old('maritalStatus')=='Single')?'selected':'' }}>Single</option>
								<option value="Married" {{ (old('maritalStatus')=='Married')?'selected':'' }}>Married</option>
								<option value="Widowed" {{ (old('maritalStatus')=='Widowed')?'selected':'' }}>Widowed</option>
								<option value="Divorced" {{ (old('maritalStatus')=='Divorced')?'selected':'' }}>Divorced</option>
							</select>
							@if ($errors->has('maritalStatus'))
	                          <span class="help-inline">{{$errors->first('maritalStatus')}}</span>
	                        @endif
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Nationality<spam style="color:red;">*</spam></label>
							<select  class="form-control" required data-parsley-required-message="Please Select Nationality" name="country" id="country" onchange="countryId(this.value)" value="{{ old('country')}}">
							<option value=""> Select </option>
		                        @foreach ($listTypes['country'] as $countrys)
		                        <option value="{{$countrys->id}}">{{ucfirst($countrys->countryName)}}</option>
		                        @endforeach
							</select>
							@if ($errors->has('country'))
	                          <span class="help-inline">{{$errors->first('country')}}</span>
	                        @endif
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>How Do You Know About Heera Group</label>
							<input type="text" class="form-control" placeholder="How Do You Know About Heera Group" name="aboutHeera" id="aboutHeera" value="{{ old('aboutHeera')}}">
						</div>
					</div>
					<div class="col-sm-12"></div>
					<div class="col-sm-4">
						<label>Mobile No<spam style="color:red;">*</spam></label>
						<div class="input-group m-b">
			              <span class="input-group-addon conId" required data-parsley-required-message="Please Select Country"></span>
			              <input type="hidden" id="conId" name="conId" value="">
			              <input type="text" class="form-control" placeholder="mobileNo" required data-parsley-required-message="Please Enter Mobile Number" data-parsley-trigger="keyup" data-parsley-minlength="5" data-parsley-maxlength="16" name="mobileNo" id="mobileNo"  data-parsley-type="integer" value="{{ old('mobileNo')}}">
							@if ($errors->has('mobileNo'))
							<span class="help-inline">{{$errors->first('mobileNo')}}</span>
							@endif
			            </div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>TelePhone No</label>
							<input type="text" class="form-control" placeholder="Telephone No"  name="telePhoneNo" id="telePhoneNo" data-parsley-type="integer" data-parsley-trigger="keyup" data-parsley-minlength="11" value="{{ old('telePhoneNo')}}">
							
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Email<spam style="color:red;">*</spam></label>
							<input type="email" class="form-control" placeholder="Email" required data-parsley-required-message="Please Enter Correct Email" data-parsley-trigger="change" name="email" id="email" value="{{ old('email')}}">

							@if ($errors->has('email'))
	                          <span class="help-inline">{{$errors->first('email')}}</span>
	                        @endif
						</div>
					</div>
					<div class="col-sm-12"></div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Upload Photo<spam style="color:red;">*</spam></label>
							 <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
							<input type="file" class="btn btn-success btn-fil" required data-parsley-required-message="Please Upload Photo" name="photo" id="photo" accept="image/png,image/jpeg" onchange="validateFileType();photoSize(this)">
						</div>
						<div id="msgerror" style="color:red;"></div>
						<div id="photoSize" style="color:red;"></div>
						@if ($errors->has('photo'))
                          <span class="help-inline">{{$errors->first('photo')}}</span>
                        @endif
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Upload Signature<spam style="color:red;">*</spam></label>
							<input type="file" class="btn btn-success btn-fil" required data-parsley-required-message="Please upload Signature" name="signature" id="signature" accept="image/png,image/jpeg" onchange="validateSig();sigSize(this)">
							<div id="msgerrorsignature" style="color:red;"></div>
							<div id="sigSize" style="color:red;"></div>
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
			<div class="panel-heading font-bold">Permanent Address </div>
			<div class="panel-body">
				<div class="form-group">
					<label>Address<spam style="color:red;">*</spam></label>
					<textarea type="text" class="form-control" placeholder="Address" required data-parsley-required-message="Please Enter Address " data-parsley-trigger="keyup" data-parsley-minlength="20" name="permanentAddress" id="permanentAddress">{{ old('permanentAddress')}}</textarea>
					@if ($errors->has('permanentAddress'))
                  		<span class="help-inline">{{$errors->first('permanentAddress')}}</span>
                	@endif
				</div>
				<div class="form-group">
					<label>City<spam style="color:red;">*</spam></label>
					<input type="text" class="form-control" placeholder="City" required data-parsley-required-message="Please Enter City " name="permanentCity" id="permanentCity" value="{{ old('permanentCity')}}">
					@if ($errors->has('permanentCity'))
                  		<span class="help-inline">{{$errors->first('permanentCity')}}</span>
                	@endif
				</div>
				<div class="form-group">
					<label>State<spam style="color:red;">*</spam></label>
					<input type="text" class="form-control" placeholder="State" required data-parsley-required-message="Please Enter State " name="permanentState" id="permanentState" data-parsley-pattern="/^[a-zA-Z_ ]*$/" data-parsley-trigger="keyup" value="{{ old('permanentState')}}">
					@if ($errors->has('permanentState'))
                  		<span class="help-inline">{{$errors->first('permanentState')}}</span>
                	@endif
				</div>
				<div class="form-group">
					<label>Pin<spam style="color:red;">*</spam></label>
					<input type="text" class="form-control" placeholder="Pin" required data-parsley-required-message="Please Enter Pin Number " data-parsley-trigger="keyup"  data-parsley-maxlength="6" data-parsley-minlength="5" name="permanentPin" id="permanentPin" data-parsley-type="integer" value="{{ old('permanentPin')}}"/>
					@if ($errors->has('permanentPin'))
                  		<span class="help-inline">{{$errors->first('permanentPin')}}</span>
                	@endif
				</div>
			</div>
		</div>
	</div>

	<div class="col-sm-4">
		<div class="panel panel-default">
			<div class="panel-heading font-bold">Correspondence  Address</div>
			<div class="panel-body">
				<div class="form-group">
					<label>Address<span style="color:red;">*</span><span  class="perm_adrs" onclick="sameaddress()">SAME AS PERMANENT ADDRESS  
			        <label class="checkbox-inline i-checks">
			        <input type="checkbox" name="Address" id="sameAddress" onclick="sameaddress()"><i style="margin-top: -10px;"></i></label></span></label>
					<textarea type="text" class="form-control" placeholder="Address" required data-parsley-required-message="Please Enter Address " data-parsley-trigger="keyup" data-parsley-minlength="20" name="corrsAddress" id="corrsAddress" value="{{ old('corrsAddress')}}"></textarea>
					@if ($errors->has('corrsAddress'))
                  		<span class="help-inline">{{$errors->first('corrsAddress')}}</span>
                	@endif
				</div>
				<div class="form-group">
					<label>City<spam style="color:red;">*</spam></label>
					<input type="text" class="form-control" placeholder="City" required data-parsley-required-message="Please Enter City " name="corrsCity" id="corrsCity" value="{{ old('corrsCity')}}">
					@if ($errors->has('corrsCity'))
                  		<span class="help-inline">{{$errors->first('corrsCity')}}</span>
                	@endif
				</div>
				<div class="form-group">
					<label>State<spam style="color:red;">*</spam></label>
					<input type="text" class="form-control" placeholder="State" required data-parsley-required-message="Please Enter State" name="corrsState" id="corrsState" data-parsley-pattern="/^[a-zA-Z_ ]*$/" data-parsley-trigger="keyup" value="{{ old('corrsState')}}">
					@if ($errors->has('corrsState'))
	              		<span class="help-inline">{{$errors->first('corrsState')}}</span>
	            	@endif
				</div>
				<div class="form-group">
					<label>Pin<spam style="color:red;">*</spam><spam style="color:red;"></spam></label>
					<input type="text" class="form-control" placeholder="Pin" required data-parsley-required-message="Please Enter Pin Number " data-parsley-trigger="keyup"  data-parsley-maxlength="6" name="corrsPin" id="corrsPin" data-parsley-type="integer" data-parsley-minlength="5" value="{{ old('corrsPin')}}"> 
					@if ($errors->has('corrsPin'))
                  		<span class="help-inline">{{$errors->first('corrsPin')}}</span>
                	@endif
				</div>
			</div>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="panel panel-default">
			<div class="panel-heading font-bold">Official Address</div>
			<div class="panel-body">
				<div class="form-group">
					<label>Address</label>
					<textarea type="text" class="form-control" placeholder="Address" data-parsley-trigger="keyup" data-parsley-minlength="20" name="officialAddress" id="officialAddress">{{ old('officialAddress')}}</textarea>
					
				</div>
				<div class="form-group">
					<label>City</label>
					<input type="text" class="form-control" placeholder="City" name="officialCity" id="officialCity" value="{{ old('officialCity')}}">
					
				</div>
				<div class="form-group">
					<label>State</label>
					<input type="text" class="form-control" placeholder="State"  name="officialState" id="officialState" data-parsley-pattern="/^[a-zA-Z_ ]*$/" data-parsley-trigger="keyup" value="{{ old('officialState')}}">
					
				</div>
				<div class="form-group">
					<label>Pin</label>
					<input type="text" class="form-control" placeholder="Pin" data-parsley-trigger="keyup"  data-parsley-maxlength="6" data-parsley-minlength="5" name="officialPin" id="officialPin" data-parsley-type="integer" value="{{ old('officialPin')}}">
					
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
					<label>Account Holder Name<spam style="color:red;">*</spam></label>
					<input type="text" class="form-control" placeholder="Account Holder Name" required data-parsley-required-message="Please Enter Name" name="holderName" id="holderName" onchange="name_check()" value="{{ old('holderName')}}">
					@if ($errors->has('holderName'))
                  		<span class="help-inline">{{$errors->first('holderName')}}</span>
                	@endif
                	<div id="msgerrorName" style="color: red;"></div>
				</div>
				<div class="form-group">
					<label>Account Number<spam style="color:red;">*</spam></label>
					<input type="text" class="form-control" placeholder="Account Number" required data-parsley-required-message="Please Enter Account Number" name="incaccountnumber" id="incaccountnumber" data-parsley-minlength="11" data-parsley-trigger="keyup" value="{{ old('incaccountnumber')}}">
					@if ($errors->has('incaccountnumber'))
                  		<span class="help-inline">{{$errors->first('incaccountnumber')}}</span>
                	@endif
				</div>
				<div class="form-group">
					<label>Bank Name<spam style="color:red;">*</spam></label>
					<input type="text" class="form-control" placeholder="Bank Name" required data-parsley-required-message="Please Enter Bank Name" name="incbankName" id="incbankName" data-parsley-pattern="/^[a-zA-Z_ ]*$/" data-parsley-trigger="keyup" value="{{ old('incbankName')}}">
					@if ($errors->has('incbankName'))
                  		<span class="help-inline">{{$errors->first('incbankName')}}</span>
                	@endif
				</div>
				<div class="form-group">
					<label>Branch<spam style="color:red;">*</spam></label>
					<input type="text" class="form-control" placeholder="Branch" required data-parsley-required-message="Please Enter Branch Name" name="incBranchName" id="incBranchName" value="{{ old('incBranchName')}}">
					@if ($errors->has('incBranchName'))
                  		<span class="help-inline">{{$errors->first('incBranchName')}}</span>
                	@endif
				</div>
				<div class="row">
					<div class="col-sm-6">
					<div class="form-group ">
						<label>IFSC<spam style="color:red;">*</spam></label>
						<input type="text" class="form-control " placeholder="IFSC" required data-parsley-required-message="Enter IFSC Code" data-parsley-type="alphanum" maxlength="11" minlength="11"  data-parsley-pattern="/^[A-Za-z]{4}\d{7}$/" name="incIfscCode" id="incIfscCode" data-parsley-trigger="keyup" value="{{ old('incIfscCode')}}">
						@if ($errors->has('incIfscCode'))
	                  		<span class="help-inline">{{$errors->first('incIfscCode')}}</span>
	                	@endif
					</div></div>
					<div class="col-sm-6">
					<div class="form-group ">
						<label>Account Proof<spam style="color:red;">*</spam></label>
						<input type="file" class="form-control  "  placeholder="Branch" required data-parsley-required-message="Please Upload Proof" name="Accproof" id="Accproof" accept="image/png,image/jpeg" onchange="proofAcccheck();accSize(this)" style="background-color:#27c24c;" value="{{ old('companyName')}}">
						<div id="msgerrorAccproof" style="color:red;" ></div>
						<div id="accSize" style="color:red;" ></div>
						@if ($errors->has('Accproof'))
	                  		<span class="help-inline">{{$errors->first('Accproof')}}</span>
	                	@endif
					</div></div>
				</div>
				
			</div>
		</div>
	</div>
	<div class="col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading font-bold">Heera Payment Details</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Pay Mode<spam style="color:red;">*</spam></label>
							<select  class="form-control" required data-parsley-required-message="Please Select payment Mode" name="paymentMode" id="paymentMode" >
							<option value=""> Select </option>
		                        @foreach ($listTypes['pay_mode'] as $pay_mode)
		                        <option value="{{$pay_mode}}" {{ (old('paymentMode')==$pay_mode)?'selected':'' }}>{{ucfirst($pay_mode)}}</option>
		                        @endforeach
							</select>
							@if ($errors->has('paymentMode'))
		                  		<span class="help-inline">{{$errors->first('paymentMode')}}</span>
		                	@endif
						</div>
					</div>
						<div class="col-sm-6">
							<div class="form-group">
								<label>DD/CHEQUE/TRANSACTION No.<spam style="color:red;">*</spam></label>
								<input type="text" class="form-control" required data-parsley-required-message="Please Enter Number" name="number" id="number" value="{{ old('number')}}">
								@if ($errors->has('number'))
			                  		<span class="help-inline">{{$errors->first('number')}}</span>
			                	@endif
							</div>
						</div>
				</div>
				<div class="form-group">
					<label>Heera's Account no<spam style="color:red;">*</spam></label>
					<input type="text" class="form-control" placeholder="Heera's Account no"  name="accountNo" id="accountNo" onchange="heeraAccountCheck(this.value)" required data-parsley-required-message="Please Enter Account Number" value="{{ old('accountNo')}}">
					<ul class="parsley-errors-list filled accountNo" id="parsley-id-19" style="display: none"><li class="parsley-required">Enter Valid Heera Account Number.</li></ul>
					@if ($errors->has('incaccountnumber'))
                  		<span class="help-inline">{{$errors->first('incaccountnumber')}}</span>
                	@endif
				</div>
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Deposit Date<spam style="color:red;">*</spam></label>
							<input type="text" class="form-control" placeholder="Deposit Date" name="depositDate" required data-parsley-required-message="Please Select Date"  id="depositDate" data-date-end-date="0d" value="{{ old('depositDate')}}">
							@if ($errors->has('depositDate'))
		                  		<span class="help-inline">{{$errors->first('depositDate')}}</span>
		                	@endif
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Bank Name<spam style="color:red;">*</spam></label>
							<input type="text" class="form-control" placeholder="Bank" required data-parsley-required-message="Please Enter Bank Name" name="bankName" id="bankName" data-parsley-pattern="/^[a-zA-Z_ ]*$/" data-parsley-trigger="keyup" readonly="" value="{{ old('bankName')}}">
							@if ($errors->has('bankName'))
		                  		<span class="help-inline">{{$errors->first('bankName')}}</span>
		                	@endif
						</div>
					</div>
				</div>
				<div class="form-group">
					<label>Branch<spam style="color:red;">*</spam></label>
					<input type="text" class="form-control" placeholder="Branch" required data-parsley-required-message="Please Enter Branch Name" name="branch" id="branch" readonly="" value="{{ old('branch')}}">
					@if ($errors->has('branch'))
                  		<span class="help-inline">{{$errors->first('branch')}}</span>
                	@endif
				</div>
				<div class="form-group">
					<label>Payment Proof<spam style="color:red;">*</spam></label>
					<input type="file" class="btn btn-success btn-fil " placeholder="Branch" required data-parsley-required-message="Please Upload Proof" name="Payproof" id="Payproof" accept="image/png,image/jpeg" onchange="proofpaycheck();paySize(this)">
					<div id="msgerrorPayproof" style="color:red;" ></div>
					<div id="paySize" style="color:red;" ></div>
					@if ($errors->has('Payproof'))
                  		<span class="help-inline">{{$errors->first('Payproof')}}</span>
                	@endif
				</div>
			</div>
		</div>
	</div>

	<div class="col-md-12"></div>

	<div class="col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading font-bold">Reference</div>
			<div class="panel-body">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Referees Name</label>
							<input type="text" class="form-control" placeholder="Referees Name" name="refName" id="refName" value="{{ old('refName')}}">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Address</label>
							<textarea type="text" class="form-control" placeholder="Address" name="refaddress" id="refaddress" >{{ old('refaddress')}}</textarea>
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>City</label>
							<input type="text" class="form-control" placeholder="City" name="refDistrict" id="refDistrict" value="{{ old('refDistrict')}}">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>State</label>
							<input type="text" class="form-control" placeholder="State" name="refState" id="refState" data-parsley-pattern="/^[a-zA-Z_ ]*$/" data-parsley-trigger="keyup" value="{{ old('refState')}}">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Pin</label>
							<input type="text" class="form-control" placeholder="Pin" data-parsley-trigger="keyup" data-parsley-minlength="5"   data-parsley-maxlength="6" name="refPin" id="refPin" data-parsley-type="integer" value="{{ old('refPin')}}">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Mobile No</label>
							<input type="text" class="form-control" placeholder="Mobile No" data-parsley-trigger="keyup" data-parsley-minlength="10" data-parsley-maxlength="14" name="refMobileNo" id="refMobileNo" data-parsley-type="integer" value="{{ old('refMobileNo')}}">
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Email</label>
							<input type="email" class="form-control" placeholder="Email" data-parsley-trigger="change" name="refEmail" id="refEmail" value="{{ old('refEmail')}}"> 
						</div>
					</div>
					<div class="col-sm-6">
						<div class="form-group">
							<label>Relationship</label>
							<select  class="form-control" name="relationship" id="relationship">
								<option value=""> Select Value</option>
		                        @foreach ($listTypes['relationship'] as $relationship)
		                        <option value="{{$relationship}}" {{ (old('relationship')==$relationship)?'selected':'' }}>{{ucfirst($relationship)}}</option>
		                        @endforeach
							</select>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-sm-6">
		<div class="panel panel-default">
			<div class="panel-heading font-bold">Proof</div>
			<div class="panel-body">
				<div class="form-group">
					<label>Type of proof<spam style="color:red;">*</spam></label>
					<select  class="form-control" required data-parsley-required-message="Please Select Type Of Proof" name="typeOfProof" id="typeOfProof">
					<option value=""> Select </option>
                        @foreach ($listTypes['proof_type'] as $proof_type)
                        <option value="{{$proof_type}}" {{ (old('typeOfProof')==$proof_type)?'selected':'' }}>{{ucfirst($proof_type)}}</option>
                        @endforeach
					</select>
					@if ($errors->has('typeOfProof'))
                  		<span class="help-inline">{{$errors->first('typeOfProof')}}</span>
                	@endif
				</div>
				<div class="form-group">
					<label>ID Number</spam></label>
					<input type="text" class="form-control" placeholder="ID Number" name="idNumber" id="idNumber" value="{{ old('idNumber')}}">				
				</div>
				<div class="row">
				<div class="col-sm-6">
				<div class="form-group">
					<label>Upload Proof<spam style="color:red;">*</spam></label>
					<input type="file" class="btn btn-success btn-fil" placeholder="Branch" required data-parsley-required-message="Please Upload Proof" name="IdProof" id="IdProof" accept="image/png,image/jpeg" onchange="proofcheck();idSize(this)">
					<div id="msgerrorIdProof" style="color:red;"></div>
					<div id="idSize" style="color:red;"></div>
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
			<div class="panel-heading font-bold">Captcha</div>
			<div class="panel-body">
				<div class="form-group">
					<div class="col-md-5">       
						<input type="text" class="form-control img-bg " value="{{$captcha}}" name="captcha" id="captcha" disabled="disabled">
					</div>
						<div class="col-md-5">
					<input type="text"  name="captcha_confirm" class="form-control" id="captcha_confirm" data-parsley-equalto="#captcha" data-parsley-required-message="Enter the captcha" required placeholder="Enter the text as given">
					</div>
				</div>
			</div>
		</div>
	</div>
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
						<label class="control-label" style="float: left;padding-left: 20px;">
							<div class="checkbox">
								<label class="i-checks">
									<input type="checkbox" checked="" name="checkbox" id="checkbox"  required data-parsley-required-message=" Check Terms & Conditions" ><i ></i> 
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
						<button type="submit" class="btn btn-primary" id='upda' name="Upload" onclick="captchaCheck();">Submit</button>
						<button type="submit" class="btn btn-default">Cancel</button>
					</div>
				</div>
			</div>
		</div>
	</div>
</form>
@endsection
@section('jquery')
<script type="text/javascript">
$('#depositDate').datepicker({
	orientation: 'bottom auto',
	 autoclose:true
				 
			});
$('#dob').datepicker({
	orientation: 'bottom auto',
	 autoclose:true
				
  });
$("form").submit(function(event) {

   var recaptcha = $("#g-recaptcha-response").val();
   $("#captchaerror").html("");
   if (recaptcha === "") {
      event.preventDefault();
      $("#captchaerror").html("Please check the recaptcha");
   }
});

   function check() {
	var dateString = document.getElementById("dob").value;
	if(dateString !="")
	{
	    var today = new Date();
	    var birthDate = new Date(dateString);
	    var age = today.getFullYear() - birthDate.getFullYear();
	    var m = today.getMonth() - birthDate.getMonth();
	    var da = today.getDate() - birthDate.getDate();
	    $("#dateerror").html("");
	    if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
	        age--;
	    }
	    if(m<0){
	        m +=12;
	    }
	    if(da<0){
	        da +=30;
	    }

	  if(age < 18 )
	{
	$("#dateerror").html("You must be 18 Years Old");
	 return false;
	} 
	}
}

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
		else{
			$('#corrsAddress').val("");
			$('#corrsCity').val("");
			$('#corrsState').val("");
			$('#corrsPin').val("");
		}
	}
</script>
<script type="text/javascript">

function heeraAccountCheck(accountNo)
{
	$.ajax(
	{
		type: "get",
		url: "{{URL::to('/') }}/admin/checkAcc",
		data:{accountNo:accountNo},
		dataType:'json',
		success: function (data) {
			console.log(data.count);
			console.log(data.data);
		if(data.result)
		{
		$('.accountNo').css('display','none');	

		$('#bankName').val(data.data.bankName);
		$('#branch').val(data.data.branchName);
		}
		else
		{
		//$('#accountNo').focus().addClass('parsley-error');	
		$('.accountNo').css('display','block');
		$('#bankName').val("");
		$('#branch').val("");
		}
		}
	});

}
function countryId(countryName)
{

	$.ajax(
	{
		type: "get",
		url: "{{URL::to('/') }}/admin/countryId",
		data:{countryName:countryName},
		success: function (data) {
			$(".conId").html("+"+data);
			$("#conId").val("+"+data);
		}
	});

}
</script>
<script type="text/javascript">
    function validateFileType(){
		 //$maxsize=2097152;
        var fileName = document.getElementById("photo").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();

        $("#msgerror").html("");
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png")
        {
           //alert('ok'); 
        }
        else
        {

			$("#msgerror").html("Only jpg/jpeg and png files are allowed!");
		 	 return false;
        	//alert('notok'); 
        } 
        
    }
    function validateSig(){
        var fileName = document.getElementById("signature").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
         $("#msgerrorsignature").html("");
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){

        }else{

			$("#msgerrorsignature").html("Only jpg/jpeg and png files are allowed!");
		 	 return false;
        	
        } 

    }
    function proofcheck(){
        var fileName = document.getElementById("IdProof").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
         $("#msgerrorIdProof").html("");
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){

        }
        else
        {

			$("#msgerrorIdProof").html("Only jpg/jpeg and png files are allowed!");
		 	 return false;
        	
        }   
    }
    function proofpaycheck(){
        var fileName = document.getElementById("Payproof").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
         $("#msgerrorPayproof").html("");
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){

        }
        else
        {

			$("#msgerrorPayproof").html("Only jpg/jpeg and png files are allowed!");
		 	 return false;
        	
        }   
    }
    function proofAcccheck(){
        var fileName = document.getElementById("Accproof").value;
        var idxDot = fileName.lastIndexOf(".") + 1;
        var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
         $("#msgerrorAccproof").html("");
        if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){

        }
        else
        {

			$("#msgerrorAccproof").html("Only jpg/jpeg and png files are allowed!");
		 	 return false;
        	
        }   
    }
</script>
<script type="text/javascript">

 function photoSize(fieldObj)
    {
        var FileName  = fieldObj.value;
        var FileExt = FileName.substr(FileName.lastIndexOf('.')+1);
        var FileSize = fieldObj.files[0].size;
        $("#photoSize").html("");
      	if(FileSize>102400)
		{
			$("#photoSize").html("Upload File size allowed is 100 Kb.");
			document.getElementById('photo').value="";
		}
	}
	 function sigSize(fieldObj)
    {
        var FileName  = fieldObj.value;
        var FileExt = FileName.substr(FileName.lastIndexOf('.')+1);
        var FileSize = fieldObj.files[0].size;
        $("#sigSize").html("");
      	if(FileSize>102400)
		{
			$("#sigSize").html("Upload File size allowed is 100 Kb.");
			document.getElementById('signature').value="";
		}
	}
	 function idSize(fieldObj)
    {
        var FileName  = fieldObj.value;
        var FileExt = FileName.substr(FileName.lastIndexOf('.')+1);
        var FileSize = fieldObj.files[0].size;
        $("#idSize").html("");
      	if(FileSize>102400)
		{
			$("#idSize").html("Upload File size allowed is 100 Kb.");
			document.getElementById('IdProof').value="";
		}
	}
	function paySize(fieldObj)
    {
        var FileName  = fieldObj.value;
        var FileExt = FileName.substr(FileName.lastIndexOf('.')+1);
        var FileSize = fieldObj.files[0].size;
        $("#paySize").html("");
      	if(FileSize>102400)
		{
			$("#paySize").html("Upload File size allowed is 100 Kb.");
			document.getElementById('Payproof').value="";
		}
	}
	function accSize(fieldObj)
    {
        var FileName  = fieldObj.value;
        var FileExt = FileName.substr(FileName.lastIndexOf('.')+1);
        var FileSize = fieldObj.files[0].size;
        $("#accSize").html("");
      	if(FileSize>102400)
		{
			$("#accSize").html("Upload File size allowed is 100 Kb.");
			document.getElementById('Accproof').value="";
		}
	}
</script>
<script type="text/javascript">
	function name_check(){
        var fullName = document.getElementById("name").value;
        var holderName = document.getElementById("holderName").value;
        $("#msgerrorName").html("");
        if (fullName!=holderName)
        {
        	$("#msgerrorName").html("Should Be  same As Full Name!");
		 	 return false;
        }
        
    }

</script>
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

            // more options
            @php Session::forget('sweet_alert');@endphp
        });
    </script>
@endif

@endsection