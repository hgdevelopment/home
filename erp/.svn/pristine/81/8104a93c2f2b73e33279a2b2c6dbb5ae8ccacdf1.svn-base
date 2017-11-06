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
		<h1 class="m-n font-thin h3">View Approved Partial Withdrawal Request</h1>
	</div>
	<div class="wrapper-md">
		<div class="row">
			<div class="col-sm-12">
				<div class="blog-post">                   
					<div class="col-sm-12">
						<div class="panel panel-default">
						<div class="panel-heading font-bold">Approved Partial Withdrawal </div>
							<div class="panel-body">
								<div class="row">
									<div class="table-responsive">
										<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"  id="view">
											<thead>
												<tr>
													<th>Sl No</th>
													<th>User Id</th>
													<th>TCN Id</th>
													<th>Unit</th>
													<th>Amount</th>
													<th>Applied Date</th>
													<th>Approved Date</th>
												</tr>
											<?php $i = 1; ?>
											</thead>
											<tbody>
											@foreach ($approve as $approves)
												<tr>
													<td>{{ $i++ }}</td>
													<td>{{ $approves->name}}</td>
													<td>{{ $approves->tcnType}}</td>
													<td>{{ $approves->unit}}</td>
													<td>{{ $approves->amount}}</td>
													<td>{{ date('d-m-Y',strtotime($approves->appliedDate))}}</td>
													<td>{{ date('d-m-Y',strtotime($approves->approvalDate)) }}</td>
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