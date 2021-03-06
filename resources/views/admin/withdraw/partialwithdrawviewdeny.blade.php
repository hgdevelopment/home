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
		<h1 class="m-n font-thin h3">View Denied Partial Withdrawal Request</h1>
	</div>
	<div class="wrapper-md">
		<div class="row">
			<div class="col-sm-12">
				<div class="blog-post">                   
					<div class="col-sm-12">
						<div class="panel panel-default">
						<div class="panel-heading font-bold">Cancelled Partial Withdrawal </div>
							<div class="panel-body">
								<div class="row">
									<div class="table-responsive" style="padding: 7px;">
										<table class="table" id="view">
											<thead>
												<tr>
													<th>Sl No</th>
													<th>Name</th>
													<th>IBG Number</th>
													<th>TCN Code</th>
													<th>TCN </th>
													<th>Unit</th>
													<th>Amount</th>
													<th>Applied Date</th>
													<th>Denied Date</th>
												</tr>
											<?php $i = 1; ?>
											</thead>
											<tbody>
											@foreach ($deny as $denied)
												<tr>
													<td>{{ $i++ }}</td>
													<td>{{ $denied->name}}</td>
													<td>{{ $denied->code}}</td>
													<td>{{ $denied->tcnCode}}</td>
													<td>{{ $denied->tcnType}}</td>
													<td>{{ $denied->unit}}</td>
													<td>{{ $denied->amount}}</td>
													<td>{{ date('d-m-Y',strtotime($denied->appliedDate)) }}</td>
													<td>{{ date('d-m-Y',strtotime($denied->approvalDate)) }}</td>
												</tr>
											@endforeach
											</tbody>
										</table>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>  
		</div>
	</div>                                      
@endsection
@section('jquery')
<script type="text/javascript">
$(document).ready(function(){
$('#view').DataTable();
});
</script>
@endsection