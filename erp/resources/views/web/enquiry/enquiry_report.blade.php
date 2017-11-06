<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
@extends('layout.erp')
@section('banner')
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
<img src="{{ URL::asset('new_heading.png') }}" class="img-responsive">
</div>
@endsection
@section('sidebar')
@include('partial.header')
@include('partial.aside')
@endsection
@section('body')
<div class="bg-light lter b-b wrapper-md">
	<h1 class="m-n font-thin h3">Enquiry Report</h1>
</div>
	<form action="{{ URL::to('/') }}/web/enquiry_report/view" method="post" enctype="multipart/form-data" data-parsley-validate >
	{{csrf_field()}}
		<div class="row">
			<div class="col-sm-12">
				<div class="blog-post">                   
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading ">                  
								Enquiry Report
							</div>
							<div class="panel-body">
							<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
							<div class="col-sm-4">
								<label>From Date<span class="required" style="color:red">*</span></label>
								<input type="text" id="datepicker"  name="date" id="date" class="form-control" />
							</div>
							<div class="col-sm-4">
								<label>To Date<span class="required" style="color:red">*</span></label>
								<input type="text" id="datepicker1" name="date1" id="date1" class="form-control"/>
							</div>
							<div class="col-sm-4">
								<label>Status<span class="required" style="color:red">*</span></label>
								<select  class="form-control js-example-basic-single" name="status" id="status" data-parsley-required-message="Please Select Status" required>
									<option value="">select</option>
									<option>open</option>
									<option>close</option>
									<option>done</option>
								</select><br>
							</div>
							<div class="col-sm-6 col-md-offset-5">
								<input type="submit"  name="submit" id="submit"  value="Submit"  class="btn btn-sm btn-success" style=" width:25%">
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</form> 
	
	@if(isset($report))
	  
	<div class="row">
		<div class="col-sm-12">
			<div class="blog-post">                   
				<div class="col-sm-12">
					<div class="panel panel-default">
						<div class="panel-heading font-bold">Enquiry Report</div>
						<div class="panel-body">
							<div class="row">
								<div class="table-responsive">
									<table class="table"  id="enquiryReport">
										<thead>
										<?php $sl=1;?>
											<tr>
												<th>Sl No</th>
												<th>Member Code</th>
												<th>Name</th>
												<th>Status</th>
												<th>Mobile</th>
												<th>Email</th>
											</tr>
										</thead>
										<tbody>
										@foreach ($report as $reports)
											<tr>
												<td>{{$sl++}}</td>
												<td>{{$reports->membercode}}</td>
												<td>{{$reports->name}}</td>
												<td>{{$reports->status}}</td>
												<td>{{$reports->mobile}}</td>
												<td>{{$reports->email}}</td>
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
              
@endif
@endsection
@section('jquery')
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
	$(function() {
	$( "#datepicker" ).datepicker
	({
		changeMonth: true,
        changeYear: true
	});
	$( "#datepicker1" ).datepicker
	({ 
		changeMonth: true,
        changeYear: true
    });

	});
	$(document).ready(function(){
    $('#enquiryReport').DataTable();
});
</script>

@endsection

