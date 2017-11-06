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

@php 
use \App\Http\Controllers\Controller;
@endphp

@section('body')

<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-normal h3">{{ $Title }}</h1>
</div>

<div class="wrapper-md" ng-controller="FormDemoCtrl">

		<div class="panel panel-default">
			<div class="panel-heading font-bold">TCN PAYMENT VERIFICATION</div>
			<div class="panel-body">
				<div class="col-sm-12">
					<div class="row">
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
					</div>
				</div> 
			</div>
		</div> 
</div>
@endsection

@section('jquery')



<script type="text/javascript">
$('#table').dataTable();
</script>

@endsection
