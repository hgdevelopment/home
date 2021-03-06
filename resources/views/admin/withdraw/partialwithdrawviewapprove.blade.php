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
	</div><br>

		<form action="{{ URL::to('/') }}/admin/partialWithdraw/viewapprove" method="post" enctype="multipart/form-data" data-parsley-validate >
	{{csrf_field()}}
		<div class="wrapper-md">
		<div class="row">
			<div class="col-sm-12">
				<div class="blog-post">                   
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading ">                  
								View Approved Partial Withdrawal Request
							</div>
							<?php 
							$tcnmaster=DB::table('tcnmasters')->get();
        					$Year =DB::table('logins')->select(DB::raw('YEAR(updated_at) as year'))->groupBy('year')->get();  
							?>
							<div class="panel-body">
							<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
							<div class="col-sm-4">
								<label>Year<span class="required" style="color:red">*</span></label>
								<select name="year" id="year" class="  form-control"  required>
									<option value=" ">select</option>
									@foreach($Year as $Year)
									<option  value="{{$Year->year}}">{{$Year->year}}</option>
								@endforeach
								</select>
							</div>
							<div class="col-sm-4">
								<label>Month<span class="required" style="color:red">*</span></label>
								<select  class="form-control" name="month" id="month" required>
									<option value="">select</option>
									<option value="1">January</option>
									<option value="2">February</option>
									<option value="3">March</option>
									<option value="4">April</option>
									<option value="5">May</option>
									<option value="6">June</option>
									<option value="7">July</option>
									<option value="8">August</option>
									<option value="9">September</option>
									<option value="10">October</option>
									<option value="11">November</option>
									<option value="12">December</option>
								</select>
							</div>
							<div class="col-sm-4">
								<label>TCN</label>
								<select   class="form-control"   name="tcn" id="tcn" >
									<option value="">select</option>
									@foreach ($tcnmaster as $tcnmasters)
								    <option value="{{$tcnmasters->id}}">{{$tcnmasters->tcnType}}</option>
									@endforeach
								</select><br>
							</div>
							<div class="col-sm-12"><br></div>
							
							<div class="col-sm-6 col-md-offset-5">
								<input type="submit"  name="submit" id="submit"  value="SEARCH"  class="btn btn-sm btn-success" style=" width:25%">
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</form>
@if(isset($approve))

	<div class="wrapper-md">
		<div class="row">
			<div class="col-sm-12">
				<div class="blog-post">                   
					<div class="col-sm-12">
						<div class="panel panel-default">
						<div class="panel-heading font-bold">Approved Partial Withdrawal 
						<form  style="float: right" method="post" action="{{ url('/admin/partialWithdrawexcel') }}">
						<input type="hidden" name="_token" value="{{ csrf_token() }}">
						<input type="hidden" name="hidden_year" id="hidden_year" value="{{$year}}">
						<input type="hidden" name="hidden_month" id="hidden_month" value="{{$month}}">
						<input type="hidden" name="hidden_tcn" id="hidden_tcn" value="{{$tcn}}">
						
						 <button type="submit"><i class="fa fa-file-excel-o" style="font-size:18px;color:red"></i></button>
						 </form>
						</div>
						
							<div class="panel-body">
								<div class="row">
									<div class="table-responsive" style="padding: 7px;">
										<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"  id="view">
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
													<th>Approved Date</th>
													<th>View</th>
												</tr>
											<?php $i = 1; ?>
											</thead>
											<tbody>
											@foreach ($approve as $approves)
												<tr>
													<td>{{ $i++ }}</td>
													<td>{{ $approves->name}}</td>
													<td>{{ $approves->code}}</td>
													<td>{{ $approves->tcnCode}}</td>
													<td>{{ $approves->tcnType}}</td>
													<td>{{ $approves->unit}}</td>
													<td>{{ $approves->amount}}</td>
													<td>{{ date('d-m-Y',strtotime($approves->appliedDate))}}</td>
													<td>{{ date('d-m-Y',strtotime($approves->approvalDate)) }}</td>
													<td><a href="{{ url('/admin/partialWithdrawapproveview',$approves->id) }}" class="btn btn-info" >View</a></td>
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
@endif                                   
@endsection
@section('jquery')
<script type="text/javascript">
$(document).ready(function(){
$('#view').DataTable();
});
</script>
@endsection