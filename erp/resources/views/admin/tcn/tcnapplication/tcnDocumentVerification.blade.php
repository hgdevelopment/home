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
	<div id="loader" style="text-align:center;position: fixed;opacity: 0.5;display: none;z-index: 1000001;left: 0;right:0;"><img style="width: 15%" src="{{ URL::to('/') }}/loaderbig.gif"/></div>
  <h1 class="m-n font-normal h3">
  @php
   $button='Document';
   @endphp
   TCN Document Verification
  </h1>

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


	<div class="col-lg-12">
		<div class="row">
			<div class="panel panel-warning">
				<div class="panel-heading font-bold">DOCUMENT APPROVAL</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-12 text-center">
							<div class="col-lg-2"></div>
							<div class="col-lg-8">
							<label class="font-bold" style="font-size: 16px">Remarks</label><br>
							<textarea class="form-control" name="reason" id="reason" cols="80" ></textarea>
							<br><br>
							</div>
						</div>
						<div class="col-sm-12 text-center">	
							<button class="btn btn-success" onclick="setApprovalStatus('Approved')">Verify</button>&nbsp;&nbsp;&nbsp;

							<button class="btn btn-danger" onclick="setApprovalStatus('Denied')">Deny</button>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
</div>









@endsection

@section('jquery')
<script type="text/javascript">
function setApprovalStatus(status)
{

	var button 	= $('#button').val();
	var tcnId 	= $('#tcnId').val();
	var userId 	= $('#userId').val();
	var reason 	= $('#reason').val();
	var sw 		= 'info';
	var cc      = "#10a72c";

	if(status=='Approved' && button=='Document')
		 {var s='Verify!!'; var text='Are you sure that all your documents are properly checked? '; var cbt='Verify'; }	
	if(status=='Denied')
		 {var s='Confirm!!'; var text='Are You Sure,You want to Deny This Request';  var cc = "#ea467a"; var sw ='warning';  var cbt='Deny'; }

	var datas='reason='+reason;	


	if(reason=="" || reason==null)
	{
	$('#reason').focus().css("border","1px solid red");
	return ;
	}

      swal({
        title: s,
        text: text,
        type: sw,
        showCancelButton: true,
        confirmButtonColor: cc,
        confirmButtonText: cbt,
        cancelButtonClass: "btn-info",
        closeOnConfirm: true
      }, 
      function (isConfirm) 
      {
        if (isConfirm) 
        {	


			$.ajax({
			     type: "get",
			     url: "{{URL::to('/') }}/admin/tcnApplicationForm/create",
			     data:datas+'&opcode=30&userId='+userId+'&tcnId='+tcnId+'&status='+status+'&button='+button,
			     success: function (data) {
			     	var data=data.replace(/\s/g, '');
			     	window.location="{{URL::to('/') }}/admin/tcnApplicationForm/view@@@"+data;
			     }
			 	 });
        }
        else
        {
          return ;
        }   
      }); 

}

</script>
<script type="text/javascript">
window.history.forward(1);
function noBack(){
window.history.forward();
}
</script>


@endsection
