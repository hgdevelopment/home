@php
use \App\Http\Controllers\Controller;
@endphp


 {{-- //*************************ALL TCN FULL WITHDRAWAL LIST PAGE***************************

 //*************************BASED ON FILTERED KEYS***************************
 --}}
@if($request->process=='withDrawTcnList' || $request->process=='withDrawTcnReports')

<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="winRequest" ui-options='{
"paging": {
"enabled": true
},
"filtering": {
"enabled": true
},
"sorting": {
"enabled": true
}}'>

<thead>
<tr>
<th>S&nbsp;NO</th>
<th>MEMBER CODE</th>
<th>NAME</th>
<th>AMOUNT</th>
<th>APPLIED DATE</th>
<th>TCN</th>
<th>TYPE</th>
<th>STATUS</th>
<th>ACTION</th>
</tr>
</thead>
<tbody>
<?php $i=1;?>
@foreach($details as $detail)
<tr data-expanded="true">
<td align="center">{{ $i }}</td>
<td>{{ $detail->code }}</td>
<td>{{ $detail->name }}</td>
<td>{{ $detail->amount }}</td>
<td>{{ date('d-m-Y',strtotime($detail->created_at))}}</td>
<td>{{$detail->tcn->tcnType}}</td>
<td>{{$detail->type}}</td>

<td align="center" style="padding: 2px !important">
<div style="color:black;background:@if($detail->status=='Applied'){{'yellow'}}@elseif($detail->status=='Paid'){{'#63ce63'}}@else {{'#f67979'}}@endif">
{{ $detail->status }}

</div>
{{ date('d-m-Y h:i:A',strtotime($detail->approvalDates))}}
</td>


<td style="cursor:pointer">
	@if($request->process=='withDrawTcnReports')
	<a class="text-success font-bold" href="http://localhost/erp/admin/tcnFullWithDrawal/{{'view@@@'}}{{$detail->withDrawId}}"><i style="font-size: x-large" class="icon-eye"></i></a>
	@else
	
	<div class="btn-group dropdown">
	  <button class="btn btn-default btn-sm" data-toggle="dropdown">Action <span class="caret"></span></button>
	  <ul class="dropdown-menu  dropdown-menu-right">
	    <li>
			<a href="{{ URL::to('/') }}/admin/tcnFullWithDrawal/{{'view@@@'}}{{$detail->withDrawId}}" >View</a>
	    </li>

	  	@if($detail->status=='Applied' &&  (Controller::UserAccessRights('Full WithDrawal Approve')=='1'))
	    <li>
			<a href="{{ URL::to('/') }}/admin/tcnFullWithDrawal/{{$detail->withDrawId}}/edit">Paid</a>
	    </li>

	    @endif


	    @if($detail->status=='Applied' &&  Controller::UserAccessRights('Full WithDrawal Cancel')=='1' )
	    <li>
			<a onclick="CancelRequest('{{$detail->tcnId}}','{{$detail->withDrawId}}')">Cancel</a>
	    </li>
	    @endif
	  </ul>
	</div>
	@endif
</td>
</tr>
<?php $i++;?>
@endforeach
</tbody>
</table>

@endif


{{--     //************************ELIGIBLE UNIT AMOUNT FOR  APPLY TCN WITHDRAWAL 'S***************************
 --}}

@if($request->process=='RequestResponse')
<form id="form" role="form" method="post" action="{{URL::to('/')}}/admin/tcnFullWithDrawal" id="form" data-parsley-validate>

{{ csrf_field() }}
		<input type="hidden" id="tcnId" name="tcnId" value="{{ $tcn->id }}">
		<input type="hidden" id="userId" name="userId" value="{{ $tcn->userId }}">
		<input type="hidden" id="unit" name="unit" value="{{ $availUnit }}">
		<input type="hidden" id="currencyType" name="currencyType" value="{{ $tcn->currencyType }}">

		<input type="hidden" id="amount" name="amount" value="{{ $availAmount }}">
		<input type="hidden" id="inrAmount" name="inrAmount" value="@if($tcn->currencyType!='INR'){{Controller::currencyConverter($tcn->currencyType,'INR',$availAmount) }}@else{{ $availAmount }}@endif">



			<div class="panel panel-warning">
		<div class="panel-heading font-bold">MEMBER DETAILS</div>
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
	                    <div class="col-md-12 col-xs-12">&nbsp;</div>
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
@endif


@if($request->process=='withDrawalPaidDetails')
					
					<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" cellpadding="0" width="100%" id="table"  >
				        <thead>
				          <tr>
							<th>S&nbsp;NO</th>
							<th>MEMBER CODE</th>
							<th>NAME</th>
							<th>AMOUNT</th>
							<th>APPLIED DATE</th>
							<th>TCN TYPE</th>
							<th>STATUS</th>
							<th>ACTION</th>
						  </tr>
				        </thead>
				        
				        <tbody>
				        @if(count($details)==0)
				        <tr >
				        <td colspan="8" align="center">
						<span class="text-danger">No records found..</span>
						</td>
						</tr>
						@endif
							<?php $i=1;?>
							@foreach($details as $detail)
							<tr data-expanded="true">
							<td align="center">{{ $i }}</td>
							<td>{{ $detail->code }}</td>
							<td>{{ $detail->name }}</td>
							<td>{{ $detail->amount }}</td>
							<td>{{ date('d-m-Y',strtotime($detail->created_at))}}</td>
							<td>{{$detail->tcn->tcnType}}</td>

							<td align="center" style="padding: 2px !important">
							<div style="color:black;background:@if($detail->status=='Applied'){{'yellow'}}@elseif($detail->status=='Paid'){{'#63ce63'}}@else {{'#f67979'}}@endif">
							{{ $detail->status }}

							</div>
							{{ date('d-m-Y h:i:A',strtotime($detail->approvalDates))}}
							</td>


							<td style="cursor:pointer">
							<a class="text-success font-bold" href="{{ URL::to('/') }}/admin/tcnFullWithDrawal/{{'view@@@'}}{{$detail->withDrawId}}"><i style="font-size: x-large" class="icon-eye"></i></a>
							</td>
							</tr>
							<?php $i++;?>
							@endforeach
				        </tbody>
				    </table>

@endif