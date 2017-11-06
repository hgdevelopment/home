<table  class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" ui-options='{
"paging": {
"enabled": true
},
"filtering": {
"enabled": true
},
"sorting": {
"enabled": true
	}}' id="table">
	<thead>
		<tr>
		<th width="">S&nbsp;NO</th>
		<th width="" >&nbsp;CODE</th>
		<th width="">NAME</th>
		<th width="">TCN&nbsp;TYPE</th>
		<th width="">UNIT</th>
		<th width="">CURRENCY</th>
		<th width="">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;AMOUNT</th>
		<th width="">A/C NUMBER</th>
		<th width="">APPLIED</th>
		<th width="">APPROVED</th>
		<th width="">PAYMENT</th>
		<th width="">ACTION</th>
		</tr>
	</thead>
	
	
	<tbody>
		<?php $i=1;?>
		@foreach($details as $detail)
		<tr data-expanded="true">
		<td align="center">{{ $i }}</td>
		<td>{{ $detail->code }}</td>
		<td align="left">{{ $detail->name }}</td>
		<td align="">{{str_replace(' ','&nbsp;',$detail->tcn->tcnType)}}</td>
		<td align="center">{{ $detail->unit }}</td>
		<td align="center">{{ $detail->currencyType }}</td>
		<td align="right" style="padding-right: 30px">{{ $detail->amount }}</td>
		<td align="left">{{ $detail->benefit->accountNumber }}</td>
		<td align="left">{{ date('d-m-Y',strtotime($detail->addedDate)) }}</td>
		<td align="left">{{ date('d-m-Y',strtotime($detail->approvalDate)) }}</td>
		<td align="left">{{ date('d-m-Y',strtotime($detail->paymentReceivedDate)) }}</td>
		<td style="cursor:pointer">
		<a href="{{ URL::to('/') }}/admin/tcnApplicationForm/{{'view@@@'}}{{$detail->tcnId}}" class="active"><i style="color: #018001;" class="fa fa-search text-success text-active" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;
		 <a href="{{ URL::to('/') }}/admin/tcnApplicationForm/{{$detail->tcnId}}/edit" class="active"><i class="fa fa-pencil text-danger text-active" aria-hidden="true"></i></a>    
		</td>
		</tr>
		<?php $i++;?>
		@endforeach
	</tbody>
</table>