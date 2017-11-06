@extends('admin.layout.erp1')
@php
use \App\Http\Controllers\Controller;
@endphp
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
  <h1 class="m-n font-normal h3">TCN Full WithDraw View</h1>
</div>

<div class="wrapper-md" ng-controller="FormDemoCtrl">
	<div class="panel panel-warning">
		<div class="panel-heading font-bold">
		<div class="col-sm-4 font-bold text-success h4">TCN TYPE : <span class="text-danger">{{$tcnrequests->tcn->tcnType}}</span></div><div class="col-sm-4 font-bold text-success h4">WITHDARW STATUS : <span class="text-danger">{{$withDraws->status}}</span></div>&nbsp;
		</div>
	</div>

	<div class="panel panel-warning">
		<div class="panel-heading font-bold">TCN DETAILS</div>
		<div class="panel-body">
		  <div class="col-md-6 col-xs-12 divTableCell">Member&nbsp;Code<b class="data-lab">{{$members->code}}</b></div> 
		   <div class="col-md-6 col-xs-12 divTableCell">Address<b class="data-lab"> {{$address->address}}</b></div>
              <div class="col-md-6 col-xs-12 divTableCell">Member&nbsp;Name<b class="data-lab">{{$members->name}}</b></div>
                <div class="col-md-6 col-xs-12 divTableCell">Mobile&nbsp;No<b class="data-lab">{{$members->mobileNo}}</b></div> 
                 <div class="col-md-6 col-xs-12 divTableCell">UNIT<b class="data-lab">{{$withDraws->unit}}</b></div>
                   <div class="col-md-6 col-xs-12 divTableCell">Approved&nbsp;Date<b class="data-lab">{{date('d-m-Y',strtotime($tcnrequests->approvalDate))}}</b></div>  
                    <div class="col-md-6 col-xs-12 divTableCell">Amount<b class="data-lab">{{$withDraws->amount}}</b></div>
                    <div class="col-md-6 col-xs-12 divTableCell">Payment Received Date<b class="data-lab">{{date('d-m-Y',strtotime($tcnrequests->paymentReceivedDate))}}</b></div>
                      
		</div>
	</div>

    




<div class="col-lg-7">
		<div class="row">
			<div class="panel panel-warning">
		<div class="panel-heading font-bold">ACCOUNT DETAILS</div>
		<div class="panel-body">
		  <div class="col-md-6 col-xs-12 divTableCell">A/C Holder Name<b class="data-lab">{{$banks->accountHolderName}}</b></div> 
		  <div class="col-md-6 col-xs-12 divTableCell">Bank Name<b class="data-lab">{{$banks->bankName}}</b></div> 
		  <div class="col-md-6 col-xs-12 divTableCell">Branch<b class="data-lab">{{$banks->branchName}}</b></div> 
		  <div class="col-md-6 col-xs-12 divTableCell">Account Number<b class="data-lab">{{$banks->accountNumber}}</b></div> 
		  <div class="col-md-6 col-xs-12 divTableCell">IFSC Code<b class="data-lab">{{$banks->ifsc}}</b></div> 
		</div>
		<br>
		<div class="panel-body">
		<div class="row">
		  <div class="col-md-6 col-xs-12 divTableCell">Applied By<b class="data-lab">{{Controller::userCode($withDraws->appliedId)}}</b></div> 
		  <div class="col-md-6 col-xs-12 divTableCell">Date<b class="data-lab">{{date('d-m-Y H:i:a',strtotime($withDraws->created_at))}}</b></div>
		 </div> 
		</div>	 

		</div>
		</div>
</div>





	<div class="row">
		<div class="col-lg-5">
			<div class="panel panel-warning">
                 <div class="panel-heading font-bold"> Photos </div>
                    <div  class="panel-body">
		           <div class="col-md-6 col-xs-12 divTableCell"><img src="{{URL::to('/') }}/storage/img/member_img/{{$members->photo}}" style="height:150px;width:150px;" onclick="window.open('{{URL::to('/') }}/storage/img/member_img/{{$members->photo}}')" /></div> 
  	                <div class="col-md-6 col-xs-12 divTableCell"><img src="{{URL::to('/') }}/storage/img/member_img/{{$members->singnature}}" style="height:150px;width:150px;"  onclick="window.open('{{URL::to('/') }}/storage/img/member_img/{{$members->singnature}}')"></div> 
  
                 </div>
            </div>
		</div>
	</div>











	@if($withDraws->status=='Cancel')
	<div class="panel panel-warning">
		<div class="panel-body">
			<div class="col-sm-12">
		  <div class="col-md-6 col-xs-12 divTableCell">Cancel By<b class="data-lab">{{$withDraws->approvalId}}</b></div> 
		  <div class="col-md-6 col-xs-12 divTableCell">Date<b class="data-lab">{{date('d-m-Y',strtotime($withDraws->approvalDate))}}</b></div> 
		  <div class="col-md-6 col-xs-12 divTableCell">Cancel Reason<b class="data-lab">{{$withDraws->remarks}}</b></div> 
		  <div class="col-md-6 col-xs-12 divTableCell">A/C Holder Name<b class="data-lab">{{$banks->accountHolderName}}</b></div> 
			</div>
		</div>
	</div>
	@endif



	@if($withDraws->status=='Paid')
	<div class="panel panel-warning">
		<div class="panel-heading font-bold">WITHDRAWAL APPROVAL DETAILS</div>
		<div class="panel-body">
			<div class="col-sm-12">
		     {{-- <div class="col-md-6 col-xs-12 divTableCell">Received Original Agreements<b class="data-lab">{{$withDraws->receivedOriginalAgreements}}</b></div>  --}}
		     {{-- <div class="col-md-6 col-xs-12 divTableCell">HG Receipts<b class="data-lab">{{$withDraws->hgReceipts}}</b></div>  --}}
              
		     {{-- <div class="col-md-6 col-xs-12 divTableCell">CARD<b class="data-lab">{{$withDraws->card}}</b></div>  --}}
		     <div class="col-md-6 col-xs-12 divTableCell">Currency<b class="data-lab">{{$withDraws->currencyType}}</b></div> 
		     <div class="col-md-6 col-xs-12 divTableCell">Form Received By<b class="data-lab">{{$withDraws->formReceivedBy}}</b></div> 
		     <div class="col-md-6 col-xs-12 divTableCell">Payment Made By<b class="data-lab">	{{$withDraws->paymentMadeBy}}</b></div> 
		     <div class="col-md-6 col-xs-12 divTableCell">Approved By<b class="data-lab">{{$withDraws->approvalBy}}</b></div> 
		     <div class="col-md-6 col-xs-12 divTableCell">Withdrawal applied date<b class="data-lab">  {{date('d-m-Y',strtotime($withDraws->appliedDate ))}}		</b></div> 
		     <div class="col-md-6 col-xs-12 divTableCell">Withdrawal payed date<b class="data-lab"> {{date('d-m-Y',strtotime($withDraws->withDrawPayedDate))}}</b></div> 
		     <div class="col-md-6 col-xs-12 divTableCell">Online Ref No<b class="data-lab">{{$withDraws->online}}</b></div> 
		     <div class="col-md-6 col-xs-12 divTableCell">Cheque No<b class="data-lab">{{$withDraws->chequeNo}}</b></div> 
		     <div class="col-md-6 col-xs-12 divTableCell">Debit acc No.(Heera's)<b class="data-lab">{{$withDraws->debitAccountNo}}</b></div> 
		     <div class="col-md-6 col-xs-12 divTableCell">Remarks<b class="data-lab">{{$withDraws->remarks}}</b></div> 
           
		</div>
	</div>
	@endif	
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
