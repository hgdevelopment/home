<table class="table" ui-options='{
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
		<td align="left">
		<select id="nominee{{ $detail->tcnId }}" id="nominee{{ $detail->tcnId }}" class="chosen-select">
			<option value="{{ $detail->nominee1_id }}">{{ $detail->nominee_one->name }}</option>
			@if($detail->nominee2_id>0)
			<option value="{{ $detail->nominee2_id }}">{{ $detail->nominee_two->name }}</option>
			@endif
		</select>
		{{ $detail->nominee->name }}
		</td>
		<td style="cursor:pointer">

		      <a style="padding:2px 12px" class="btn btn-primary sm" onclick="transferTcn({{ $detail->tcnId }})">Transfer</a> 
		</td>
		</tr>
		<?php $i++;?>
		<input type="hidden" id="oldNominee" name="oldNominee" value="{{ $detail->nominee->id }}"> 
		@endforeach
	</tbody>
</table>