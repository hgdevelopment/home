@extends('admin.layout.erp1')
@section('banner')
	<div class="col-lg-12" align="center" style="background-color:#ffcf29">
		<img src="{{ URL::asset('new_heading.png') }}" class="img-responsive">
	</div>
@endsection
@section('sidebar')
	@include('admin.partial.header')
	@include('admin.partial.aside')
@endsection
@section('body')
	<div class="bg-light lter b-b wrapper-md">
		<h1 class="m-n font-thin h3">Member's Account</h1>
		<h6 class="m-n font-thin h5">View account details of TCN members</h6>
	</div>
	<div class="wrapper-md">
		<div class="line line-dashed b-b line-lg pull-in"></div>
		<div class="col-md-12"><br></div>
		<div class="panel panel-default">
		<div class="panel-heading">
							Pending Approvals
						</div>
						<div class="panel-body">
						<div class="row">
			<div class="table-responsive" style="overflow-x: initial;padding: 7px;">

				<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"  id="view">
					<thead>
						
						<tr>
							<th>Sl No</th>
							<th>TCN Name</th>
							<th>Units</th>
							<th>Amount</th>
							<th>Currrency</th>
							<th>Approved Date</th>
						</tr>
					</thead>
					<tbody>
						@foreach($tcnpending as $key => $tcnacc)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $tcnacc->tcn->tcnType }}</td>
								<td>{{ $tcnacc->unit }}</td> 
								<td>{{ $tcnacc->amount}}</td>
								<td>{{ $tcnacc->currencyType}} </td>
								<td>{{ date("Y-m-d",strtotime($tcnacc->approvalDate)) }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				</div>
				</div>
				<br>
				<br>
				</div></div>
				<div class="panel panel-default">
				<div class="panel-heading">
							Active TCN
						</div>
						<div class="panel-body">
						<div class="row">
			<div class="table-responsive" style="overflow-x: initial;padding: 7px;">
				<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="viewReq">
					<thead>
						
						<tr>
							<th>Sl No</th>
							<th>TCN Name</th>
							<th>Units</th>
							<th>Amount</th>
							<th>Currrency</th>
							<th>Approved Date</th>
						</tr>
					</thead>
					<tbody>
						@foreach($tcnactive as $key => $tcnacc)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $tcnacc->tcn->tcnType }}</td>
								<td>{{ $tcnacc->unit }}</td>
								<td>{{ $tcnacc->amount}}</td>
								<td>{{ $tcnacc->currencyType}} </td>
								<td>{{ date("Y-m-d",strtotime($tcnacc->approvalDate)) }}</td>
							</tr>
						@endforeach
					</tbody>
				</table>
				</div>
				</div>
				<br>
				<br>
				</div></div>
				<div class="panel panel-default">
			<div class="table-responsive" style="overflow-x: initial;">
				<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"  id="views">
					<thead>
						<div class="panel-heading">
							<h3 class="m-n font-thin h3">Withdrawn TCN</h3>
							Normal Withdrawal
						</div>
						<tr>
							<th>Sl No</th>
							<th>TCN Type</th>
							<th>Units</th>
							<th>Amount</th>
							<th>Currrency</th>
							<th>Approved Date</th>
							<th>view</th>
						</tr>
					</thead>
					<tbody>
						@foreach($tcnwithdrawal as $key => $tcnwithdraw)
							<tr>
								<td>{{ $key+1 }}</td> 
								<td>{{ $tcnwithdraw->type }}</td>
								<td>{{ $tcnwithdraw->unit }}</td>
								<td>{{ $tcnwithdraw->amount }}</td>
								<td>{{$tcnwithdraw->currencyType}}</td>
								<td>{{ date("Y-m-d",strtotime($tcnwithdraw->approvalDate)) }}</td>
								<td> 
								<a href="{{ URL::to('/') }}/admin/tcnFullWithDrawal/{{'view@@@'}}{{$tcnwithdraw->id }}"  class="active"><i style="color: #018001;" class="fa fa-eye" aria-hidden="true"></i></a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div> 
		<div class="panel panel-default">
			<div class="table-responsive" style="overflow-x: initial;">
				<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"  id="viewRequest">
					<thead>
						<div class="panel-heading">
							Partial Withdrawal
						</div>
						<tr>
							<th>Sl No</th>
							<th>TCN Type</th>
							<th>Units</th>
							<th>Amount</th> 
							<th>Currrency</th>
							<th>Approved Date</th>
							<th>Withdraw Date</th>
							<th>view</th> 
						</tr>
					</thead>
					<tbody>
						@foreach($tcnpartial as $key => $partial)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $partial->type }}</td>
								<td>{{ $partial->unit }}</td>
								<td>{{ $partial->amount }}</td>
								<td>{{$partial->currencyType}}</td>
								<td>{{ date("Y-m-d",strtotime($partial->approvalDate)) }}</td> 
								<td>{{ date("Y-m-d",strtotime($partial->withDrawPayedDate)) }}</td> 
								<td> 
								<a href="{{ URL::to('/') }}/admin/partialWithdraw/viewapprove"  class="active"><i style="color: #018001;" class="fa fa-eye" aria-hidden="true"></i></a>
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div> 
		<div class="row">
    <div class="col-sm-12" ><br></div>
    <div class="form-group">
      <div class="col-sm-5 "><br></div> 
      <div class="col-sm-3">
        <a href="{{ URL::to('/') }}/admin/added"><button type="button" class="btn btn-info">Back</button></a>
      </div>
    </div>
    <div class="col-sm-12" ><br></div>
  </div>
	</div>
@endsection
@section('jquery')
<script type="text/javascript">
$(document).ready(function()
	{
	$('#viewRequest').DataTable();
	});
$(document).ready(function()
	{
	$('#viewReq').DataTable();
	});
$(document).ready(function()
	{
	$('#view').DataTable();
	});
$(document).ready(function()
	{
	$('#views').DataTable();
	});
</script>
@endsection