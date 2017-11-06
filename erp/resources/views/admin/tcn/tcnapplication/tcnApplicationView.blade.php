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
 @php
  if($tcnrequests->docVerified=='Pending' && $tcnrequests->status=='Pending')
  { $button='Document';
  }

  if($tcnrequests->docVerified!='Pending' && $tcnrequests->paymentReceived=='Pending' && $tcnrequests->status=='Pending')
  { $button='Payment';
  }

  if($tcnrequests->status=='Denied')
  { $button='Denied';
  }

  if($tcnrequests->status=='Pending' && $tcnrequests->docVerified=='Pending' && $tcnrequests->paymentReceived=='Pending' && $tcnrequests->approvalId!='0')
  { $button='Reapprove';
  }

  if($tcnrequests->status=='Pending' && $tcnrequests->docVerified=='Pending' && $tcnrequests->paymentReceived=='Pending' && $tcnrequests->approvalId=='0')
  { $button='Pending';
  }

  if($tcnrequests->status=='Approved')
  { $button='Approve';
  }
  if($tcnrequests->status=='Transferred')
  { $button='Transfer';
  }
  @endphp




<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-normal h3">TCN Application View</h1>
</div>
<input type="hidden" id="tcnId" value="{{$tcnrequests->id}}">
<input type="hidden" id="userId" value="{{$tcnrequests->userId}}">

<input type="hidden" name="button" id="button" value="{{$button}}">
<div class="wrapper-md">
	<div class="panel panel-warning">
		<div class="panel-heading font-bold">
		<div class="col-sm-4 font-bold text-success h4">TCN CODE : <span class="text-danger">{{strtoupper($tcnrequests->tcnCode)}}</span></div>
		<div class="col-sm-4 font-bold text-success h4">TCN  : <span class="text-danger">{{$tcnrequests->tcn->tcnType}}</span></div>
		<div class="col-sm-4 font-bold text-success h4">TCN STATUS : <span class="text-danger">{{$tcnrequests->status}}</span></div>&nbsp;
		</div>
	</div>

	<div class="col-lg-12">
		<div class="row">	
			<div class="panel panel-warning">
				<div class="panel-heading font-bold">
				<div style="width: 50%;float: left;">TCN PERSONAL DETAILS</div>
				<div class="text-right" >&nbsp;
					{{-- <a href="" class="btn btn-info">Back</a> --}}
				</div>
				
				</div>
				<div class="panel-body">
                  <div class="col-md-6 col-xs-12 divTableCell">Member&nbsp;Code<b class="data-lab">{{$memberregistrations->code}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Member<b class="data-lab">+{{ $memberregistrations->country->countryId}}&nbsp;{{$memberregistrations->mobileNo}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Email Id<b class="data-lab">{{$memberregistrations->email}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Member Name<b class="data-lab">{{$memberregistrations->name}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Nationality<b class="data-lab">{{$countrys->countryName}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Address<b class="data-lab">{{$address1->address}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Guardian<b class="data-lab">{{$memberregistrations->guardian}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Religion<b class="data-lab">{{$memberregistrations->religion}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">City<b class="data-lab">{{$address1->city}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Gender<b class="data-lab">{{$memberregistrations->code}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Caste<b class="data-lab">{{$memberregistrations->caste}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">State<b class="data-lab">{{$address1->state}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">D O B<b class="data-lab">{{date('d-m-Y',strtotime($memberregistrations->dob))}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Marital&nbsp;Status<b class="data-lab">{{$memberregistrations->maritalStatus}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">PIN<b class="data-lab">{{$address1->pin}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Education<b class="data-lab">{{$memberregistrations->education}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Occupation<b class="data-lab">{{$memberregistrations->occupation}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Total&nbsp;Income<b class="data-lab"><span class=" font-bold"> {{$memberregistrations->incomeAmount}}</span> ( {{ $memberregistrations->incomeCurrencytype }} )</b></div>
				
				</div>
			</div>
		</div>	
	</div>


	<div class="col-lg-7">
		<div class="row">
			<div class="panel panel-warning">
				<div class="panel-heading font-bold">PAYMENT DETAILS</div>
				<div class="panel-body">
                  <div class="col-md-6 col-xs-12 divTableCell">Currency Type<b class="data-lab">{{$tcnrequests->currencyType}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Applying From<b class="data-lab">{{$countrys->countryName}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Unit<b class="data-lab">{{$tcnrequests->unit}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Deposit Date<b class="data-lab">{{date('d-m-Y',strtotime($tcnrequests->depositeDate))}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Payment&nbsp;Mode<b class="data-lab">{{$tcnrequests->paymentMode}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Transaction No<b class="data-lab">{{$tcnrequests->paymentMode}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Amount<b class="data-lab">{{$tcnrequests->amount}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell" style="background: #b2ec79;">Heera Account No<b class="data-lab">{{$tcnrequests->heeraaccount->accountNumber}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Bank Name<b class="data-lab">{{$tcnrequests->heeraaccount->bankName}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Branch Name<b class="data-lab">{{$tcnrequests->heeraaccount->branchName}}</b></div>
                 
				</div>
			</div>
		</div>	
	</div>





	<div class="row">
		<div class="col-lg-5">
			<div class="panel panel-warning">
				<div class="panel-heading font-bold">MEMBER IMAGE</div>
				<div class="panel-body">
					<div class="row">

					   <div class="col-md-6 col-xs-12 divTableCell"><img src="{{URL::to('/') }}/storage/img/member_img/{{$memberregistrations->photo}}" style="height:160px;width:150px;cursor: pointer" onclick="window.open('{{URL::to('/') }}/storage/img/member_img/{{$memberregistrations->photo}}')" ></div>
					    <div class="col-md-6 col-xs-12 divTableCell"><img src="{{URL::to('/') }}/storage/img/member_img/{{$memberregistrations->singnature}}" style="height:160px;width:150px;cursor: pointer"  onclick="window.open('{{URL::to('/') }}/storage/img/member_img/{{$memberregistrations->singnature}}')"></div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-12">
		<div class="row">
			<div class="panel panel-warning">
				<div class="panel-heading font-bold">BENEFIT REMITTANCE</div>
				<div class="panel-body">
                  <div class="col-md-6 col-xs-12 divTableCell">Account Number<b class="data-lab">{{$banks->accountNumber}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Bank Name<b class="data-lab">{{$banks->bankName}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">IFSC Code<b class="data-lab">{{$banks->ifsc}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Branch Name<b class="data-lab">{{$banks->branchName}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Account Holder Name<b class="data-lab">{{$banks->accountHolderName}}</b></div>
            					
				</div>
			</div>
		</div>	
	</div>

	<div class="col-lg-12">
		<div class="row">
			<div class="panel panel-warning">
				<div class="panel-heading font-bold">FIRST NOMINEE DETAILS</div>
				<div class="panel-body">
                  <div class="col-md-6 col-xs-12 divTableCell">Nominee Name<b class="data-lab">{{$nominees1->name}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Email ID<b class="data-lab">{{$nominees1->email}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell"> Proof Type<b class="data-lab">{{$proofs1->typeOfProof}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Relation With Applicant<b class="data-lab">{{$nominees1->relationWithApplicant}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Address <b class="data-lab">{{$address2->address}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Proof Number<b class="data-lab">{{$proofs1->proofNumber}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Gender<b class="data-lab">{{$nominees1->gender}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">City<b class="data-lab">{{$address2->city}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">State<b class="data-lab">{{$address2->state}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">D O B<b class="data-lab">{{date('d-m-Y',strtotime($nominees1->dob))}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Mobile No<b class="data-lab">{{$nominees1->mobile}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">PIN<b class="data-lab">{{$address2->pin}}</b></div>
                  {{-- 	
                  <div class="col-md-6 col-xs-12 divTableCell">Place Of Issue<b class="data-lab">{{$proofs->placeOfIssue}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Date Of Issue<b class="data-lab">{{$proofs->dateOfIssue}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Date Of Expiry<b class="data-lab">{{$proofs->dateOfExpiry}}</b></div>--}}
               
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-12">
		<div class="row">
			<div class="panel panel-warning">
				<div class="panel-heading font-bold">NOMINEE PROOFS</div>
				<div class="panel-body">
				<div class="col-sm-4 text-center">
					<img src="{{URL::to('/') }}/storage/img/nominee/{{$nominees1->uploadPhoto}}" style="height:200px;width:200px;cursor: pointer"  onclick="window.open('{{URL::to('/') }}/storage/img/nominee/{{$nominees1->uploadPhoto}}')"><br>
					<label>Photo</label>
				</div>

				<div class="col-sm-4 text-center">
					<img src="{{URL::to('/') }}/storage/img/nominee/{{$nominees1->signature}}" style="height:200px;width:200px;cursor: pointer"  onclick="window.open('{{URL::to('/') }}/storage/img/nominee/{{$nominees1->signature}}')"><br>
					<label>Signature</label>
				</div>
				<div class="col-sm-4 text-center">
					<img src="{{URL::to('/') }}/storage/img/proof/{{$proofs1->file}}" style="height:200px;width:200px;cursor: pointer"  onclick="window.open('{{URL::to('/') }}/storage/img/proof/{{$proofs1->file}}')"><br>
					<label>Proof</label>
				</div>
				</div>
			</div>
		</div>	
	</div>

	<div class="col-lg-12">
		<div class="row">
			<div class="panel panel-warning">
				<div class="panel-heading font-bold">SECOND NOMINEE DETAILS</div>
				<div class="panel-body">
                  <div class="col-md-6 col-xs-12 divTableCell">Nominee Name<b class="data-lab">{{$nominees2->name}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Email ID<b class="data-lab">{{$nominees2->email}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell"> Proof Type<b class="data-lab">{{$proofs2->typeOfProof}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Relation With Applicant<b class="data-lab">{{$nominees2->relationWithApplicant}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Address <b class="data-lab">{{$address3->address}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Proof Number<b class="data-lab">{{$proofs2->proofNumber}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Gender<b class="data-lab">{{$nominees2->gender}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">City<b class="data-lab">{{$address3->city}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">State<b class="data-lab">{{$address3->state}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">D O B<b class="data-lab">{{date('d-m-Y',strtotime($nominees2->dob))}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Mobile No<b class="data-lab">{{$nominees2->mobile}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">PIN<b class="data-lab">{{$address3->pin}}</b></div>
                  {{-- 	
                  <div class="col-md-6 col-xs-12 divTableCell">Place Of Issue<b class="data-lab">{{$proofs->placeOfIssue}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Date Of Issue<b class="data-lab">{{$proofs->dateOfIssue}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Date Of Expiry<b class="data-lab">{{$proofs->dateOfExpiry}}</b></div>--}}
               
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-12">
		<div class="row">
			<div class="panel panel-warning">
				<div class="panel-heading font-bold">NOMINEE PROOFS</div>
				<div class="panel-body">
				<div class="col-sm-4 text-center">
					<img src="{{URL::to('/') }}/storage/img/nominee/{{$nominees2->uploadPhoto}}" style="height:200px;width:200px;cursor: pointer"  onclick="window.open('{{URL::to('/') }}/storage/img/nominee/{{$nominees2->uploadPhoto}}')"><br>
					<label>Photo</label>
				</div>

				<div class="col-sm-4 text-center">
					<img src="{{URL::to('/') }}/storage/img/nominee/{{$nominees2->signature}}" style="height:200px;width:200px;cursor: pointer"  onclick="window.open('{{URL::to('/') }}/storage/img/nominee/{{$nominees2->signature}}')"><br>
					<label>Signature</label>
				</div>
				<div class="col-sm-4 text-center">
					<img src="{{URL::to('/') }}/storage/img/proof/{{$proofs2->file}}" style="height:200px;width:200px;cursor: pointer"  onclick="window.open('{{URL::to('/') }}/storage/img/proof/{{$proofs2->file}}')"><br>
					<label>Proof</label>
				</div>
				</div>
			</div>
		</div>	
	</div>

	<div class="col-lg-12">
		<div class="row">
			<div class="panel panel-warning">
				<div class="panel-heading font-bold">SUPPORTING DOCUMENTS</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-4 text-center">
							<img src="{{URL::to('/') }}/storage/img/tcndocs/{{$tcnrequests->doc1}}" style="height:200px;width:200px;cursor: pointer"  onclick="window.open('{{URL::to('/') }}/storage/img/tcndocs/{{$tcnrequests->doc1}}')"><br>
							<label>Document 1</label>
						</div>

						<div class="col-sm-4 text-center">
							<img src="{{URL::to('/') }}/storage/img/tcndocs/{{$tcnrequests->doc2}}" style="height:200px;width:200px;cursor: pointer" onclick="window.open('{{URL::to('/') }}/storage/img/tcndocs/{{$tcnrequests->doc2}}')"><br>
							<label>Document 2</label>
						</div>
						<div class="col-sm-4 text-center">
							<img src="{{URL::to('/') }}/storage/img/tcndocs/{{$tcnrequests->doc3}}" style="height:200px;width:200px;cursor: pointer"  onclick="window.open('{{URL::to('/') }}/storage/img/tcndocs/{{$tcnrequests->doc3}}')"><br>
							<label>Document 3</label>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>

	@if($button=='Approve')
	<div class="col-lg-12">
		<div class="row">
			<div class="panel panel-warning">
				<div class="panel-heading font-bold">PAYMENT RECEIVED DETAILS</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-2">Payment&nbsp;Mode</div>
						<div class="col-sm-2 font-bold">{{ $paymentdetail->payment_mode }}</div>
						<div class="col-sm-2">Amount</div>
						<div class="col-sm-2 font-bold">{{ $tcnrequests->amount }}</div>
						<div class="col-sm-2">Transaction&nbsp;No</div>
						<div class="col-sm-2 font-bold">{{ $paymentdetail->transactionNumber }}</div>
					</div><div class="row">&nbsp;</div>

					<div class="row">
						<div class="col-sm-2">Bank</div>
						<div class="col-sm-2 font-bold">{{ $paymentdetail->bank }}</div>
						<div class="col-sm-2">Branch</div>
						<div class="col-sm-2 font-bold">{{ $paymentdetail->branch }}</div>
						<div class="col-sm-2">Received Date</div>
						<div class="col-sm-2 font-bold">{{ date('d-m-Y h:i:A',strtotime($tcnrequests->paymentReceivedDate)) }}</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
	@endif

	@php	
	function TCNuserID($id)
	{

	$user=DB::table('logins')->where('id',$id)->get();
	foreach($user as $user)
	return $user->username;
	}
	@endphp

	<div class="col-lg-12">
		<div class="row">
			<div class="panel panel-warning">
				<div class="panel-heading font-bold">APPROVAL DETAILS
				</div>
				<div class="panel-body">
					@if($tcnrequests->status!='Transferred')
					  <div class="col-md-6 col-xs-12 divTableCell">TCN Applied By<b class="data-lab">
					  @if($tcnrequests->addedId=='0'){{'MEMBER' }}@else{{TCNuserID($tcnrequests->addedId)}}@endif</b></div>
					  <div class="col-md-6 col-xs-12 divTableCell">Applied Date<b class="data-lab">{{date('d-m-Y',strtotime($tcnrequests->addedDate))}}</b></div>
                  
	                        @if($tcnrequests->status!='Denied')

	                        <div class="col-md-6 col-xs-12 divTableCell">Document Status<b class="data-lab">{{$tcnrequests->docVerified}}</b></div>
	                        <div class="col-md-6 col-xs-12 divTableCell">Payment Status<b class="data-lab">{{$tcnrequests->paymentReceived}}</b></div>
	                           
							    @if($tcnrequests->docVerified!='Pending')

		                           
		                        <div class="col-md-6 col-xs-12 divTableCell">Doc Verified By<b class="data-lab">{{TCNuserID($tcnrequests->docVerifiedId)}}</b></div>
		                        <div class="col-md-6 col-xs-12 divTableCell">Doc Verified Date<b class="data-lab">{{date('d-m-Y h:i:A',strtotime($tcnrequests->docVerifiedDate))}}</b></div>
		                         <div class="col-md-6 col-xs-12 divTableCell">Remarks<b class="data-lab"> {{$tcnrequests->reason}}</b></div>

		                        @endif	
	                        @endif
                        @endif

						@if($tcnrequests->paymentReceived!='Pending')
						@php
						$payment=DB::table('paymentdetails')->where('id',$tcnrequests->paymentId)->get();
						foreach($payment as $payment)
						@endphp
	                         


                         <div class="col-md-6 col-xs-12 divTableCell">Approved By<b class="data-lab">{{ TCNuserID($payment->addedId) }}</b></div>
                         <div class="col-md-6 col-xs-12 divTableCell">Approved Date<b class="data-lab">{{ date('d-m-Y h:i:A',strtotime($tcnrequests->paymentReceivedDate)) }}</b></div>
                         <div class="col-md-6 col-xs-12 divTableCell">Remarks<b class="data-lab">{{$payment->remarks}}</b></div>
	                         @if($tcnrequests->transferredReason!='')
	                         <div class="col-md-6 col-xs-12 divTableCell">Transferred TCN  <b class="data-lab">{{ $tcnrequests->transferredReason }}</b></div>
	                         @endif
	                    @endif
                               


							@if($tcnrequests->status=='Pending' && $tcnrequests->docVerified=='Pending' && $tcnrequests->paymentReceived=='Pending' && $tcnrequests->approvalId!='0')

                              <div class="col-md-6 col-xs-12 divTableCell">Reapproval Send By<b class="data-lab">{{TCNuserID($tcnrequests->approvalId)}}</b></div>
                             <div class="col-md-6 col-xs-12 divTableCell">Reapproval Date<b class="data-lab">{{date('d-m-Y h:i:A',strtotime($tcnrequests->approvalDate))}}</b></div>
                             <div class="col-md-6 col-xs-12 divTableCell">Remarks<b class="data-lab">{{$tcnrequests->reason}}</b></div>
                        
                            @endif
                         

                          @if($tcnrequests->status=='Denied')

                             <div class="col-md-6 col-xs-12 divTableCell">Denied By<b class="data-lab"> {{TCNuserID($tcnrequests->approvalId)}}</b></div>
                             <div class="col-md-6 col-xs-12 divTableCell">Denied Date<b class="data-lab">{{date('d-m-Y h:i:A',strtotime($tcnrequests->approvalDate))}}</b></div>
                             <div class="col-md-6 col-xs-12 divTableCell">Remarks<b class="data-lab">{{$tcnrequests->reason}}</b></div>
                          @endif
                                

                                
				     	@if($tcnrequests->status=='Removed')

                         <div class="col-md-6 col-xs-12 divTableCell">Removed By<b class="data-lab"> {{TCNuserID($tcnrequests->approvalId)}}</b></div>
                         <div class="col-md-6 col-xs-12 divTableCell">Removed Date<b class="data-lab"> {{date('d-m-Y h:i:A',strtotime($tcnrequests->approvalDate))}}</b></div>
                         <div class="col-md-6 col-xs-12 divTableCell">Remark<b class="data-lab"> {{$tcnrequests->reason}}</b></div>
                         @endif


                          @if($tcnrequests->status=='Transferred')

                         <div class="col-md-6 col-xs-12 divTableCell">TCN Transferred By<b class="data-lab">{{TCNuserID($tcnrequests->addedId)}}</b></div>
                        
                         <div class="col-md-6 col-xs-12 divTableCell">Reason<b class="data-lab">{{$tcnrequests->transferredReason}}</b></div>
                         @endif
				</div>
			</div>
		</div>	
	</div>


</div>


@endsection

@section('jquery')
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
