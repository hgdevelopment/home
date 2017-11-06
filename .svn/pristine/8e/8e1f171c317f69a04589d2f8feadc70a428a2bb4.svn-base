@extends('web.layout.erp')
{{-- @section('banner')
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
            <img src="{{ URL::asset('new_heading.png') }}" class="img-responsive">
         </div>
@endsection --}}

@section('sidebar')

@include('web.partial.header')
@include('web.partial.aside')

@endsection
@php
use \App\Http\Controllers\Controller;
@endphp
@section('body')
{{-- 
            <div class="bg-light lter b-b wrapper-md">
               <h1 class="m-n font-thin h3">Profile</h1>
            </div> --}}
@include('web.partial.profileheader')
<form role="form" method="post" action="{{URL::to('/') }}/web/tcnwithDrawal" id="form" data-parsley-validate>
{{ csrf_field() }}
    <input type="hidden" id="tcnId" name="tcnId" value="{{ $tcn->id }}">
    <input type="hidden" id="userId" name="userId" value="{{ $tcn->userId }}">
    <input type="hidden" id="unit" name="unit" value="{{ $availUnit }}">
    <input type="hidden" id="currencyType" name="currencyType" value="{{ $availUnit }}">

    <input type="hidden" id="amount" name="amount" value="{{ $availAmount }}">
    <input type="hidden" id="inrAmount" name="inrAmount" value="@if($tcn->currencyType!='INR'){{Controller::currencyConverter($tcn->currencyType,'INR',$availAmount) }}@else{{ $availAmount }}@endif">



      <div class="panel panel-warning">
    <div class="panel-heading font-bold">PERSONAL DETAILS</div>
    <div class="panel-body">

      <div class="col-md-6 col-xs-12 divTableCell">Member&nbsp;Name<b class="data-lab">{{$members->name}}</b></div> 
      <div class="col-md-6 col-xs-12 divTableCell">Member Code<b class="data-lab"> {{$members->code}}</b></div>
      <div class="col-md-6 col-xs-12 divTableCell">A/C Holder Name<b class="data-lab">{{$tcn->benefit->accountHolderName}}</b></div> 
      <div class="col-md-6 col-xs-12 divTableCell">Bank Name<b class="data-lab">{{$tcn->benefit->bankName}}</b></div> 
      <div class="col-md-6 col-xs-12 divTableCell">Branch<b class="data-lab">{{$tcn->benefit->branchName}}</b></div> 
      <div class="col-md-6 col-xs-12 divTableCell">Account Number<b class="data-lab">{{$tcn->benefit->accountNumber}}</b></div> 
      <div class="col-md-6 col-xs-12 divTableCell">IFSC Code<b class="data-lab">{{$tcn->benefit->ifsc}}</b></div> 
    </div>
    </div>


    <div class="panel panel-warning">
      <div class="panel-heading font-bold">TCN PAYMENT DETAILS</div>
      <div class="panel-body">
                <div class="col-md-6 col-xs-12 divTableCell">TCN<b class="data-lab">{{$tcn->tcn->tcnType}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">TCN Code<b class="data-lab">{{$tcn->tcnCode}}</b></div> 

                <div class="col-md-6 col-xs-12 divTableCell">Total&nbsp;Unit<b class="data-lab">{{$tcn->unit}}</b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Total&nbsp;Amount <b>( {{$tcn->currencyType}} )</b><b class="data-lab">{{$tcn->amount}}</b></div> 

                   <div class="col-md-6 col-xs-12 divTableCell">Eligible Unit<b class="data-lab">{{$availUnit}}</b></div>
                     <div class="col-md-6 col-xs-12 divTableCell">Eligible&nbsp;Amount<b>( {{$tcn->currencyType}} )</b><b class="data-lab">{{$availAmount}}</b></div>  


                   <div class="col-md-6 col-xs-12 divTableCell">Currency Type<b class="data-lab">{{$tcn->currencyType}}</b></div>
                     <div class="col-md-6 col-xs-12 divTableCell">Convert INR Amount<b class="data-lab">{{$tcn->inrAmount}}</b></div>  

                      <div class="col-md-6 col-xs-12 divTableCell">Deposit Date<b class="data-lab">{{date('d-m-Y',strtotime($tcn->depositeDate))}}</b></div>
                      <div class="col-md-6 col-xs-12 divTableCell">Payment Received Date<b class="data-lab">{{date('d-m-Y',strtotime($tcn->paymentReceivedDate))}}</b></div>

                      <div class="col-md-12 col-xs-12 divTableCell"><b class="data-lab">&nbsp;</b></div>


                      <div class="col-md-6 col-xs-12 divTableCell"  style="background: #b2ec79;">Debit Heera Account<b class="data-lab">{{$tcn->heeraaccount->accountNumber}}</b></div>
                      <div class="col-md-6 col-xs-12 divTableCell">Bank Name<b class="data-lab">{{$tcn->heeraaccount->bankName}}</b></div>

                      <div class="col-md-6 col-xs-12 divTableCell">Branch Name<b class="data-lab">{{$tcn->heeraaccount->branchName}}</b></div>
                      <div class="col-md-6 col-xs-12 divTableCell">IFSC<b class="data-lab">{{$tcn->heeraaccount->ifsc}}</b></div>
                      <div class="col-md-1 col-xs-12 divTableCell"><span class="font-bold text-danger h3">Type</span>
                      </div>
                      <div class="col-md-3 col-xs-12 divTableCell">
                      <select class="chosen-select form-control" id="type" name="type" required data-parsley-required-message="Select Withdrawal type" >
                      <option value=" ">--Select--</option>
                      <option value="Normal Withdrawal">Normal Withdrawal</option>
                      <option value="Emergency Withdrawal">Emergency Withdrawal</option></select>
                      </div>
                      <div class="col-md-3 col-xs-12 divTableCell">
                       <input type="submit" value="Send WithDrawal Request" class="btn btn-danger">
                       </div>
      </div>
    </div>
  </form> 

@include('web.partial.profilefooter')

             





@endsection

@section('jquery')
<script type="text/javascript">
  $('chosen-select').chosen();
</script>
@endsection