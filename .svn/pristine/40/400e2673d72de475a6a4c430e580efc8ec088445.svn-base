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
		<h1 class="m-n font-thin h3">Blacklist Member Requests</h1>
		<h6 class="m-n font-thin h5">.</h6>
	</div>
	<div class="wrapper-md">
		<div class="line line-dashed b-b line-lg pull-in"></div>
		<div class="col-md-12"><br></div>
		<div class="panel panel-default">
			<div class="table-responsive" style="overflow-x: initial;">
				<table  class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="blacklistRequest">
					<thead>
						<div class="panel-heading">
							View Blacklisted Member
						</div>
						<tr>
							<th>Sl No</th>
							<th>Code</th>
							<th>Name</th>
							<th>Email</th>
							<th>Reason for Blacklist</th>
							<th>Applied Date</th>
							<th>View</th>
						</tr>
					</thead>
					<tbody>
						@foreach($blacklistmember as $key => $blacklistmembers)
							<tr>
								<td>{{ $key+1 }}</td>
								<td>{{ $blacklistmembers->code }}</td>
								<td>{{ $blacklistmembers->name }}</td>
								<td>{{ $blacklistmembers->email }}</td>
								<td><div style="text-overflow: ellipsis;width: 200px;white-space: nowrap; overflow: hidden;">{{ $blacklistmembers->blockedreason }}</div></td>
								<td>{{ date("Y-m-d",strtotime($blacklistmembers->addedByDate)) }}</td>
								<td>
								<a href="{{ URL::to('/') }}/admin/member/{{ $blacklistmembers->userId }}"  class="active"><i style="color: #018001;" class="fa fa-eye" aria-hidden="true"></i></a>
								</td>                        
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection
@section('jquery')
	<script type="text/javascript">
		$(document).ready(function()
		{
			$('#blacklistRequest').DataTable();
		});
	</script>
@endsection