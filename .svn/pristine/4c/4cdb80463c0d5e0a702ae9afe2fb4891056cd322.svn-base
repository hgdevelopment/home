@php
use \App\Http\Controllers\Controller;
@endphp
@if($request->process=='withDrawTcnList')

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
<th>TCN TYPE</th>
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

<td align="center" style="padding: 2px !important">
<div style="color:black;background:@if($detail->status=='Applied'){{'yellow'}}@elseif($detail->status=='Paid'){{'#63ce63'}}@else {{'#f67979'}}@endif">
{{ $detail->status }}

</div>
{{ date('d-m-Y h:i:A',strtotime($detail->approvalDate))}}
</td>


<td style="cursor:pointer">
	<div class="btn-group dropdown">
	  <button class="btn btn-default btn-sm" data-toggle="dropdown">Action <span class="caret"></span></button>
	  <ul class="dropdown-menu  dropdown-menu-right">
	    <li>
			<a href="{{ URL::to('/') }}/admin/tcnFullWithDrawal/{{'view@@@'}}{{$detail->withDrawId}}" >View</a>
	    </li>
	  	@if($detail->status=='Applied' &&  Controller::UserAccessRights('TCN WithDraw Approval')=='1' )
	    <li>
			<a href="{{ URL::to('/') }}/admin/tcnFullWithDrawal/{{$detail->withDrawId}}/edit">Paid</a>
	    </li>
	    @endif
	    @if($detail->status=='Applied' &&  Controller::UserAccessRights('TCN WithDraw Cancel')=='1' )
	    <li>
			<a onclick="CancelRequest('{{$detail->tcnId}}','{{$detail->withDrawId}}')">Cancel</a>
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



@if($request->process=='RequestResponse')
<form role="form" method="post" action="{{URL::to('/')}}/admin/tcnApprove" id="form" data-parsley-validate >

{{ csrf_field() }}
		<input type="hidden" id="tcnId" name="tcnId" value="">
		<input type="hidden" id="paymentId" name="paymentId" value="">
		<div class="panel panel-default">
			<div class="panel-heading font-bold">TCN DETAILS</div>
			<div class="panel-body">
			  <div class="col-md-6 col-xs-12 divTableCell">Member&nbsp;Name<b class="data-lab">{{$members->name}}</b></div> 
			   <div class="col-md-6 col-xs-12 divTableCell">Member Code<b class="data-lab"> {{$members->code}}</b></div>
	              <div class="col-md-6 col-xs-12 divTableCell">Total&nbsp;Unit<b class="data-lab">{{$tcn->unit}}</b></div>
	                <div class="col-md-6 col-xs-12 divTableCell">Total&nbsp;Amount<b class="data-lab">{{$tcn->amount}}</b></div> 
	                 <div class="col-md-6 col-xs-12 divTableCell">Eligible Unit<b class="data-lab">{{$availUnit}}</b></div>
	                   <div class="col-md-6 col-xs-12 divTableCell">Eligible&nbsp;Amount<b class="data-lab">{{$availAmount}}</b></div>  
	                    <div class="col-md-6 col-xs-12 divTableCell">Amount<b class="data-lab">{{$withDraws->amount}}</b></div>
	                    <div class="col-md-6 col-xs-12 divTableCell">Payment Received Date<b class="data-lab">{{date('d-m-Y',strtotime($tcnrequests->paymentReceivedDate))}}</b></div>

			</div>
		</div>
	</form>	
@endif
