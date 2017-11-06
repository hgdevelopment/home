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
	<h1 class="m-n font-thin h3">TCN Details</h1>
</div>
<div class="wrapper-md">
	<div class="row">
		<div class="col-sm-12">
			<div class="blog-post">                   
				<div class="col-sm-12">
					<div class="panel panel-default">
					<div class="panel-heading font-bold">TCN PAYMENT DETAILS</div>
						<div class="panel-body">
							<div class="row">
								<div class="table-responsive">
									<table class="table" ui-jq="footable" ui-options='{
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
												<th>Sl No</th>
												<th>Unit</th>
												<th>Amount</th>
												<th>Pay Mode</th>
												<th>Unit</th>
												<th>Amount</th>
											</tr>
											<?php $i = 1; ?>
										</thead>
										<tbody>
											@foreach ($tcn1 as $tcns)
											<tr>
												<td>{{ $i++ }}</td>
												<td>{{ $tcns->unit }}</td>
												<td>{{ $tcns->amount}}</td>
												<td>{{ $tcns->paymentMode}}</td>
												<td>{{ $tcns->unit }}</td>
												<td>{{ $tcns->amount}}</td>
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
<div class="wrapper-md">
	<div class="row">
		<div class="col-sm-12">
			<div class="blog-post">                   
				<div class="col-sm-12">
					<div class="panel panel-default">
					<div class="panel-heading font-bold">PAYMENT DETAILS</div>
						<div class="panel-body">
							<div class="row">
								<div class="table-responsive">
									<table class="table" ui-jq="footable" ui-options='{
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
												<th>Sl No</th>
												<th>Bank Name</th>
												<th>Transaction Number</th>
												<th>Branch</th>
												<th>Pay Mode</th>
												<th>Payment Date</th>								                
												<th>Account Number</th>
											</tr>
											<?php $i = 1; ?>
										</thead>
										<tbody>
											@foreach ($tcn2 as $tcns2)
											<tr>
												<td>{{ $i++ }}</td>
												<td>{{ $tcns2->bank }}</td>
												<td>{{ $tcns2->transactionNumber}}</td>
												<td>{{ $tcns2->branch }}</td>
												<td>{{ $tcns2->payment_mode }}</td>
												<td>{{ $tcns2->paymentDate}}</td>
												<td>{{ $tcns2->accountNumber}}</td>
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
<div class="wrapper-md">
	<div class="row">
		<div class="col-sm-12">
			<div class="blog-post">                   
				<div class="col-sm-12">
					<div class="panel panel-default">
					<div class="panel-heading font-bold">NOMINEE 1 DETAILS</div>
						<div class="panel-body">
							<div class="row">
								<div class="table-responsive">
									<table class="table" ui-jq="footable" ui-options='{
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
												<th>Sl No</th>
												<th>Name</th>
												<th>Date Of Birth</th>
												<th>Relation With Applicant</th>
												<th>Residential Address</th>
												<th>City</th>
												<th>Pin</th>
												<th>Mobile Number</th>
												<th>Email Id</th>
											</tr>
											<?php $i = 1; ?>
										</thead>
										<tbody>
											@foreach ($tcn3 as $tcns)
											<tr>
												<td>{{ $i++ }}</td>
												<td>{{ $tcns->name }}</td>
												<td>{{ $tcns->dob}}</td>
												<td>{{ $tcns->relationWithApplicant}}</td>
												<td>{{ $tcns->address}}</td>
												<td>{{ $tcns->city}}</td>
												<td>{{ $tcns->pin}}</td>
												<td>{{ $tcns->mobile}}</td>
												<td>{{ $tcns->email}}</td>
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
<div class="wrapper-md">
	<div class="row">
		<div class="col-sm-12">
			<div class="blog-post">                   
				<div class="col-sm-12">
					<div class="panel panel-default">
					<div class="panel-heading font-bold">NOMINEE 2 DETAILS</div>
						<div class="panel-body">
							<div class="row">
								<div class="table-responsive">
									<table class="table" ui-jq="footable" ui-options='{
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
												<th>Sl No</th>
												<th>Name</th>
												<th>Date Of Birth</th>
												<th>Relation With Applicant</th>
												<th>Residential Address</th>
												<th>City</th>
												<th>Pin</th>
												<th>Mobile Number</th>
												<th>Email Id</th>
											</tr>
											<?php $i = 1; ?>
										</thead>
										<tbody>
											@foreach ($tcn4 as $tcns)
											<tr>
												<td>{{ $i++ }}</td>
												<td>{{ $tcns->name }}</td>
												<td>{{ $tcns->dob}}</td>
												<td>{{ $tcns->relationWithApplicant}}</td>
												<td>{{ $tcns->address}}</td>
												<td>{{ $tcns->city}}</td>
												<td>{{ $tcns->pin}}</td>
												<td>{{ $tcns->mobile}}</td>
												<td>{{ $tcns->email}}</td>
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
@endsection