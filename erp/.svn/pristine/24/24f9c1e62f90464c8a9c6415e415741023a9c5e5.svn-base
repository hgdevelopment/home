<table class="table table-striped table-bordered dt-responsive nowrap" ui-options='{
"paging": {
"enabled": true
},
"filtering": {
"enabled": true
},
"sorting": {
"enabled": true
	}}' id="table" cellpadding="0" cellspacing="0">
	<thead>
		<tr>
		<th>S&nbsp;NO</th>
		<th>MEMBER&nbsp;CODE</th>
		<th>MEMBER&nbsp;NAME</th>
		<th>APPROVED&nbsp;DATE</th>
		<th>TCN&nbsp;TYPE</th>
		<th>UNIT</th>
		<th>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AMOUNT</th>
		<th>TRANSFER&nbsp;TO</th>
		<th>ACTION</th>
		</tr>
	</thead>
		
	<tbody>
		<?php $i=1;?>
		@foreach($details as $detail)
		<tr data-expanded="true">
		<td align="center">{{ $i }}</td>
		<td>{{ $detail->code }}</td>
		<td align="left">{{ $detail->name }} {{ $detail->guardian }}</td>
		<td>{{ date('d-m-Y',strtotime($detail->approvalDate)) }}</td>
		<td align="left" style="padding-left: 20px">{{$detail->tcn->tcnType}}</td>
		<td align="center">{{ $detail->unit }}</td>
		<td align="right" style="padding-right: 30px">{{ $detail->amount }}</td>
		<td align="left">{{ $detail->nominee_one->name }} {{ $detail->nominee_two->name }}</td>
		<td style="cursor:pointer">

		      <a style="padding:2px 12px" class="btn btn-primary sm" href="{{ URL::to('/') }}/admin/tcnTransfer/{{'Show@@@'}}{{$detail->tcnId}}">Transfer</a> 
		</td>
		</tr>
		<?php $i++;?>
		<input type="hidden" id="oldNominee" name="oldNominee" value="{{ $detail->nominee->id }}"> 
		@endforeach
	</tbody>
</table>