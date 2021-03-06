  @php
use \App\Http\Controllers\Controller;

session_start();
if(isset($_SESSION['Edit']) && $request->edits==1)
$Edit= $_SESSION['Edit'];
@endphp

{{--****************************** THIS AJAX PAGE RETURN TCN MODEL AJAX*********

 										FUNCTIONS RETURN RESPONSE 


**************************************			***************************  --}}

{{-- MEMBER DETAILS BASED FROM MEMBER CODE --}}

@if($request->opcode==2)

<input type="hidden" name="memberUserId" id="memberUserId" value="@if(isset($table->userId)){{$table->userId}}@else {{'0'}}@endif">

<div class="col-sm-12">
<div class="row">	
<div class="col-sm-2">Member Code</div>
<div class="col-sm-4">:  {{$table->code}}</div>
<div class="col-sm-2">Marital Status</div>
<div class="col-sm-4">: {{$table->maritalStatus}}</div>
</div>
</div>		<div class="col-sm-12">&nbsp;</div>

<div class="col-sm-12">
<div class="row">
<div class="col-sm-2">Member Name</div><input type="hidden"  name="memberName" id="memberName" value="{{$table->name}}">
<div class="col-sm-4">: {{$table->name}}</div>
<div class="col-sm-2">Guardian's </div>
<div class="col-sm-4">: {{$table->guardian}}</div>
</div>  
</div>		<div class="col-sm-12">&nbsp;</div>

<div class="col-sm-12">
<div class="row">
<div class="col-sm-2">D O B</div>
<div class="col-sm-4">: @if(isset($table->dob)){{date('d-m-Y',strtotime($table->dob))}}@endif</div>
<div class="col-sm-2">Mobile Number</div>
<div class="col-sm-4">: {{ $table->mobileNo }}</div>
</div>  
</div>
@endif







{{-- SELECT BENEFIT ACCOCUNT--}}


@if($request->opcode==4)

	<select class="form-control col-md-6 chosen-select" name="selectAccountNumber" id="selectAccountNumber" onchange="getAccountDetails(1);" required data-parsley-required-message="Select Account No">
	<option value=" ">Select</option>
	@if(!isset($Edit) || empty($table->accountNumber))
	<option value="Others">Others</option>
	@endif
	@foreach($table as $table)
	<option value="{{$table->id}}" @if(isset($Edit) && $request->editAc==$table->id){{'selected'}} @endif>{{$table->accountNumber}}</option>
	@endforeach
	</select>

@endif



{{-- SELECT BENEFIT  ACCOCUNT DETAILS--}}

@if($request->opcode==5)

<div class="col-sm-12">
<div class="row">
<div class="col-sm-4">Account Number<span style="color:red;">*</span>
<input type="text" name="accountNumber" id="accountNumber" value="@if(isset($table->accountNumber)){{$table->accountNumber}}@endif" class="form-control" data-parsley-trigger="keyup"  required data-parsley-required-message="Enter Account No" data-parsley-type="integer" type="number" />
</div>


<div class="col-sm-4">Bank Name<span style="color:red;">*</span>
<input type="text" name="bankName" id="bankName" value="@if(isset($table->accountNumber)){{$table->bankName}}@endif" class="form-control"  data-parsley-trigger="keyup" required data-parsley-required-message="Enter Bank Name" data-parsley-pattern="/^[^-\s][a-zA-Z_ ]*$/"/>
</div>

<div class="col-sm-4">IFSC Code<span style="color:red;">*</span>
<input type="text" name="ifsc" id="ifsc" value="@if(isset($table->accountNumber)){{$table->ifsc }}@endif" class="form-control"   required data-parsley-required-message="Enter IFSC Code" data-parsley-type="alphanum" maxlength="11" minlength="11"  data-parsley-trigger="keyup" data-parsley-pattern="/^[A-Za-z]{4}\d{7}$/" data-parsley-pattern-message="IFSC Code Format is wrong..! " placeholder="Ex: IFSC1234567" />
</div>
</div>
</div> 		<div class="col-sm-12">&nbsp;</div>

<div class="col-sm-12">
<div class="row">
<div class="col-sm-4">Branch Name<span style="color:red;">*</span>
<input type="text" name="branchName" id="branchName" value="@if(isset($table->accountNumber)){{$table->branchName}}@endif" class="form-control"   data-parsley-trigger="keyup" required data-parsley-required-message="Enter Branch Name" data-parsley-pattern="/^[^-\s][a-zA-Z_ ]*$/"/>
</div>

<div class="col-sm-4">Account Holder Name<span style="color:red;">*</span>
<input type="text" name="accountHolderName" id="accountHolderName" value="{{$request->memberName}}" class="form-control" data-parsley-trigger="keyup"    required data-parsley-required-message="Enter Account Holder Name" data-parsley-equalto="#memberName" data-parsley-equalto-message="Account Holder Name Mismatched with Member Name"/>
<span class="accountHolderName text-danger" ></span>
</div>
</div>
</div> 

@endif



{{-- SELECT NOMINEE--}}

{{-- @if($request->opcode==6)
	<select class="form-control col-md-6" name="nominee" id="nominee" onchange="getNomineeDetails(1)"  required data-parsley-required-message="Select Nominee">
			@if(!isset($Edit))
			<option value=" ">Select</option>
			@endif
			<option value="Others">Others</option>
		@if($table!='')
			@foreach($table as $nominees)
				<option value="{{$nominees->id}}" @if(isset($Edit) && $Edit['nominee']==$nominees->id){{'selected'}} @endif>{{$nominees->name}}</option>
			@endforeach
		@endif
	</select>
@endif

 --}}

{{-- SELECT NOMINEE DETAILS--}}



@if($request->opcode==7)
	@php
	$n=$request->n;	
	@endphp
		<div class="col-sm-12">
		<div class="row">
		<div class="col-sm-4">Nominee Name<span style="color:red;">*</span>
		<input type="text" name="name{{ $n }}" id="name{{ $n }}" value="@if(isset($nominee->name)){{$nominee->name}}@endif" class="form-control"     required data-parsley-required-message="Enter Nominee Name"  data-parsley-trigger="keyup" data-parsley-pattern-message="Dont Enter Special Charecters or Numbers" data-parsley-pattern="/^[^-\s][a-zA-Z_ ]*$/"/>
		</div>

		<div class="col-sm-4">Relation&nbsp;With&nbsp;Applicant<span style="color:red;">*</span>
		<select class="form-control" name="relationWithApplicant{{ $n }}" id="relationWithApplicant{{ $n }}"  required data-parsley-required-message="Select Relation With Applicant">
		<option value=" ">Select</option>
		@for($i=0;count($relation)>$i;$i++)
		<option @if($nominee->relationWithApplicant==$relation[$i]){{'selected'}}@endif value="{{$relation[$i]}}" @if(isset($Edit) && $Edit['relationWithApplicant']==$relation[$i] && $request->nominee!='Others'){{'selected'}} @endif >{{$relation[$i]}}</option>
		@endfor
		</select> 
		</div>

		<div class="col-sm-4">Email Id
		<input type="email" name="email{{ $n }}" id="email{{ $n }}" value="@if(isset($nominee->email)){{$nominee->email}}@endif" class="form-control"   data-parsley-trigger="keyup"  required data-parsley-required-message="Enter Valid Email Id"/>
		</div>
		</div>
		</div>  <div class="col-sm-12"><br></div>


		<div class="col-sm-12">
		<div class="row">{{-- ^\+?[0-9]{10,16}$ mobile no with  --}}
		<div class="col-sm-4">Mobile Number<span style="color:red;">*</span>
		<input class="form-control" placeholder="Mobile No" required data-parsley-required-message="Please Enter Mobile Number" required data-parsley-pattern-message="Enter Valid Mobile Number with between 10 to 16 digits" data-parsley-pattern="^[0-9]{1,16}$" data-parsley-trigger="keyup" name="mobile{{ $n }}" id="mobile{{ $n }}"  type="text" value="@if(isset($nominee->mobile)){{$nominee->mobile}}@endif"    >
		</div> 

		<div class="col-sm-4">D O B<span style="color:red;">*</span>
		<input class="form-control" type="text"  data-date-end-date="0d{{ $n }}" id="dob{{ $n }}" name="dob{{ $n }}" value="@if(isset($nominee->dob)){{date('d-m-Y',strtotime($nominee->dob))}}@endif" required data-parsley-required-message="Please Select Correct DOB" readonly />
		<span class="dob text-danger"></span>
		</div>

		<div class="col-sm-4">Gender<span style="color:red;">*</span>
		<select class="form-control col-md-6" name="gender{{ $n }}" id="gender{{ $n }}" required data-parsley-required-message="Please Select Gender">
		<option value=" ">Select</option>
		<option value="Male" @if(isset($nominee->gender) && $nominee->gender=='Male') {{ 'selected' }} @endif >Male</option>
		<option value="Female" @if(isset($nominee->gender) && $nominee->gender=='Female') {{ 'selected' }} @endif >Female</option>
		</select>
		</div>
		</div>
		</div>	<div class="col-sm-12"><br></div>

		<div class="col-sm-12">
		<div class="row">
		<div class="col-sm-4">Address<span style="color:red;">*</span>
		<textarea class="form-control" id="address{{ $n }}" name="address{{ $n }}"  data-parsley-trigger="keyup" rows="1" required data-parsley-required-message="Enter Correct Address" data-parsley-trigger="keyup" data-parsley-minlength="20">@if(isset($address->address)){{$address->address}}@endif</textarea>
		</div>

		<div class="col-sm-4">City<span style="color:red;">*</span>
		<input type="text" name="city{{ $n }}" id="city{{ $n }}" class="form-control" value="@if(isset($address->city)){{$address->city}}@endif"   required data-parsley-required-message="Enter City" />
		</div>

		<div class="col-sm-4">State<span style="color:red;">*</span>
		<input type="text" name="state{{ $n }}" id="state{{ $n }}" class="form-control" value="@if(isset($address->state)){{$address->state}}@endif"    required data-parsley-required-message="Enter State"/>
		</div>

		</div>
		</div>	<div class="col-sm-12"><br></div>

		<input type="hidden" name="proofId{{ $n }}" id="proofId{{ $n }}" value="{{ $proof->id }}" />
		<input type="hidden" name="addressId{{ $n }}" id="addressId{{ $n }}" value="{{ $address->id }}" />


		{{-- SELECT NOMINEE DETAILS--}}


		<div class="col-sm-12">
		<div class="row">
		<div class="col-sm-4">Nominee Proof Type{{$proof->typeOfProof}}
		<select class="form-control col-md-6" name="typeOfProof{{ $n }}" id="typeOfProof{{ $n }}" required data-parsley-required-message="Select Proof Type">
		<option value=" ">Select</option>
		<option value="aadhar" @if(isset($proof->typeOfProof) && $proof->typeOfProof=='aadhar'){{'selected'}}@endif >Aadhar</option>

		<option value="license" @if(isset($proof->typeOfProof) && $proof->typeOfProof=='license'){{'selected'}}@endif >License</option>

		<option value="pancard" @if(isset($proof->typeOfProof) && $proof->typeOfProof=='pancard'){{'selected'}}@endif >Pancard</option>

		<option value="passport" @if(isset($proof->typeOfProof) && $proof->typeOfProof=='passport'){{'selected'}}@endif>Passport</option>
		<option value="VoterId" @if(isset($proof->typeOfProof) && $proof->typeOfProof=='VoterId'){{'selected'}}@endif>VoterId</option>

		</select>
		</div>

		<div class="col-sm-4">proof Number<span style="color:red;">*</span>
		<input type="text" name="proofNumber{{ $n }}" id="proofNumber{{ $n }}" value="@if(isset($proof->proofNumber)){{$proof->proofNumber}}@endif" class="form-control"  />
		</div>

		<div class="col-sm-4">Pin<span style="color:red;">*</span>
		<input class="form-control" placeholder="Pin" required data-parsley-required-message="Please Enter Pin Number" data-parsley-trigger="keyup" name="pin{{ $n }}" id="pin{{ $n }}" type="text" value="@if(isset($address->pin)){{$address->pin}}@endif"  data-parsley-pattern="^[1-9][0-9]{3,5}$">
		</div>
		</div>


		<div class="col-sm-12">
		<div class="row">
		@if(isset($nominee->uploadPhoto))
		<div class="col-sm-4 nomineePhoto{{ $n }}"><br>
		<img  alt="uploadPhoto" style="width:200px;height:200px;cursor: pointer;" src="{{ URL::to('/') }}/storage/img/nominee/{{$nominee->uploadPhoto}}" onclick="window.open('{{ URL::to('/') }}/storage/img/nominee/{{$nominee->uploadPhoto}}')" download >
		</div>
		@endif

		@if(isset($nominee->signature))
		<div class="col-sm-4 nomineePhoto{{ $n }}"><br>
		<img  alt="proofId" style="width:200px;height:200px;cursor: pointer;" src="{{ URL::to('/') }}/storage/img/nominee/{{$nominee->signature}}" onclick="window.open('{{ URL::to('/') }}/storage/img/nominee/{{$nominee->signature}}')" download>
		</div>
		@endif



		@if(isset($proof->file))
		<div class="col-sm-4 nomineePhoto{{ $n }}"><br>
		<img  alt="Proof Copy" style="width:200px;height:200px;cursor: pointer;" src="{{ URL::to('/') }}/storage/img/proof/{{$proof->file}}" onclick="window.open('{{ URL::to('/') }}/storage/img/proof/{{$proof->file}}')" download>
		</div>
		@endif
		</div>
		</div>
				 <div class="col-sm-12">&nbsp;</div>

				<div id="nomineePhotos{{ $n }}" class="row">
					<div class="col-sm-4">Upload Photo<span style="color:red;">*</span><input class="btn btn-success btn-fill removeattr{{ $n }}" ui-jq="filestyle" ui-options="{icon: false, buttonName: 'btn m-b-xs w-xs btn-dark btn-rounded'}" type="file" name="uploadPhoto{{ $n }}" id="uploadPhoto{{ $n }}" @php 
					if(!isset($Edit)) echo 'required data-parsley-required-message="Select Nominee Photo"';  @endphp onchange="imageCheck(this)">
							<span class="uploadPhoto{{ $n }} text-danger"></span> 
							@if ($errors->has('uploadPhoto'.$n))
                  			<span class="help-inline ">{{$errors->first('uploadPhoto'.$n)}}</span>
                			@endif
					</div>

					<div class="col-sm-4">Signature<span style="color:red;">*</span><input class="btn btn-success btn-fill removeattr{{ $n }}" ui-jq="filestyle" ui-options="{icon: false, buttonName: 'btn m-b-xs w-xs btn-dark btn-rounded'}" type="file" name="signature{{ $n }}" id="signature{{ $n }}" @php 
					if(!isset($Edit)) echo 'required data-parsley-required-message="Select Signature Fle"';  @endphp onchange="imageCheck(this)">
							<span class="signature{{ $n }} text-danger"></span> 
							@if ($errors->has('signature'.$n))
                  			<span class="help-inline ">{{$errors->first('signature'.$n)}}</span>
                			@endif
					</div>


					<div class="col-sm-4">Proof Copy<span style="color:red;">*</span><input class="btn btn-success btn-fill removeattr{{ $n }}" ui-jq="filestyle" ui-options="{icon: false, buttonName: 'btn m-b-xs w-xs btn-dark btn-rounded'}" type="file" name="proofCopy{{ $n }}" id="proofCopy{{ $n }}" @php 
					if(!isset($Edit)) echo 'required data-parsley-required-message="Select Nominee ProofCopy"';  @endphp onchange="imageCheck(this)">
							<span class="proofCopy{{ $n }} text-danger"></span> 
							@if ($errors->has('proofCopy'.$n))
                  			<span class="help-inline ">{{$errors->first('proofCopy'.$n)}}</span>
                			@endif
					</div>
				</div> 	<div class="col-sm-12">&nbsp;</div>
		@php 
		if($request->edits!=1)
		unset($_SESSION['Edit']); @endphp 
@endif


{{--      GET TCN APPLICATION LIST       --}}

@if($request->opcode==21)
<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" cellpadding="0" width="100%" id="table"  >
<thead>
<tr>
<th>S&nbsp;NO</th>
<th >MEMBER&nbsp;CODE</th>
<th>NAME</th>
<th>AMOUNT</th>
<th>TCN</th>
<th>DOCUMENT</th>
<th>STATUS</th>
<th>TCN&nbsp;CODE</th>
<th>APPLY&nbsp;DATE</th>
<th>ACTION</th>
</tr>
</thead>
<tbody>
<?php $i=1;?>
@foreach($details as $detail)
<tr data-expanded="true">
<td align="center">{{ $i }}</td>
<td>{{ $detail->code }}</td>
<td>{{ $detail->name }} </td>
<td align="right">{{ $detail->amount }}</td>
<td align="center">{{str_replace(' ','&nbsp;',$detail->tcnType)}}</td>
<td>
@php
if ($detail->docVerified=='Pending') 			  
$color = "warning";
elseif ($detail->docVerified=='Verified') 
$color = "success";
					
@endphp														
														
<span style="width: 100px;height: 25px;padding-bottom: 22px;padding-top: 0px;" class="btn btn-<?php echo $color;?>">{{ $detail->docVerified }}</span>

<!-- <div class="text-center btn btn-default" style=" color: #ffffff; width: 130px;height: 25px;padding-bottom: 22px;padding-top: 0px;background:@if($detail->docVerified=='Pending'){{'#e88606'}}@elseif($detail->docVerified=='Verified'){{'#63ce63'}}@endif">
{{ $detail->docVerified }}
</div> -->
<br>
@if($detail->docVerified!='Pending')
{{date('d-m-Y h:i:A',strtotime($detail->docVerifiedDate))}}
@endif
</td>

<td align="center">
@php 
if ($detail->status=='Approved') 			  
$color = "success";
elseif ($detail->status=='Pending') 
$color = "warning";
elseif ($detail->status=='Transferred') 
$color = "info";
else
$color = "danger";						
@endphp



<span style="width: 100px;height: 25px;padding-bottom: 22px;padding-top: 0px;" class="btn btn-<?php echo $color;?>">{{ $detail->status }}</span><br>

<!-- 
<div style="color:black;background:@if($detail->status=='Pending'){{'yellow'}}@elseif($detail->status=='Approved'){{'#63ce63'}}@elseif($detail->status=='Transferred'){{'#a6b0e9'}}@else{{'#f67979'}}@endif">
{{ $detail->status }}
</div> -->
@if($detail->status!='Pending' && $detail->status!='Transferred')
{{date('d-m-Y h:i:A',strtotime($detail->paymentReceivedDate))}}
@endif
@if($detail->status=='Transferred')
{{date('d-m-Y h:i:A',strtotime($detail->approvalDate))}}
@endif
</td>
<td>{{ $detail->tcnCode }}</td>
<td>{{ date('d-m-Y',strtotime($detail->addedDate))}}</td>

<td style="cursor:pointer">

<div class="btn-group dropdown">
<button class="btn btn-default btn-sm" data-toggle="dropdown">Action <span class="caret"></span></button>
<ul class="dropdown-menu dropdown-menu-right" >
<li>
<a href="{{ URL::to('/') }}/admin/tcnApplicationForm/{{'view@@@'}}{{$detail->tcnId}}">View
</a>
</li>

@if(Controller::UserAccessRights('TCN Print'))
<li>
<a href="{{ URL::to('/') }}/admin/tcnviewprint/{{$detail->tcnId}}" >Print
</a>
</li>
@endif



@if($detail->docVerified=='Pending' && $detail->status=='Pending' && Controller::UserAccessRights('TCN Document Verification')=='1' && $detail->status!='Removed')
<li>
<a href="{{ URL::to('/') }}/admin/tcnApplicationForm/{{$detail->tcnId}}">Document Verification
</a>
</li>
@endif



@if($detail->paymentReceived=='Pending' && $detail->docVerified!='Pending'  && $detail->status=='Pending' && Controller::UserAccessRights('TCN Payment Verification')=='1' && $detail->status!='Removed') 
<li>
<a href="{{ URL::to('/') }}/admin/tcnApplicationForm/{{$detail->tcnId}}">Payment Verification
</a>
</li>
@endif



@if($detail->status=='Denied' && Controller::UserAccessRights('TCN Reapproval')=='1')
<li>
<a href="{{ URL::to('/') }}/admin/tcnApplicationForm/{{$detail->tcnId}}">Reapproval
</a>
</li>
@endif	



@if(Controller::UserAccessRights('TCN Application Edit')=='1' && $detail->status!='Removed' && $detail->status!='Transferred')
<li>
<a href="{{ URL::to('/') }}/admin/tcnApplicationForm/{{$detail->tcnId}}/edit">Edit
</a>
</li>
@endif



@if($detail->status=='Approved'  && $detail->physicalBenefit=='No' && Controller::UserAccessRights('TCN Add To Physical Benefit')=='1' && $detail->status!='Removed')
<li>
<a onclick="physicalBenefit('{{$detail->tcnId}}')">Add to Physical Benefit
</a>
</li>
@endif


@if(Controller::UserAccessRights('TCN Remove')=='1' && $detail->status!='Removed' && $detail->status!='Transferred')
<li>
<a onclick="removeTCN('{{$detail->tcnId}}')">Remove
</a>
</li>
@endif

</ul>
</div>
</td>
</tr>
<?php $i++;?>
@endforeach
</tbody>
</table>
@endif	


