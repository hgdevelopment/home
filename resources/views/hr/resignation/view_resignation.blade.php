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
	<h1 class="m-n font-thin h3">View Resignation</h1>
</div><br>
@if (Session()->has('message'))
<div class="alert alert-info fade in alert-dismissable">
	<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
	<strong>Info!</strong> {{Session()->get('message')}}
</div>
@endif

	<div class="row">
		<div class="col-sm-12">
			<div class="blog-post">                   
				<div class="col-sm-12">
					<div class="panel panel-default">
						<div class="panel-heading font-bold">VIEW RESIGNATION</div>
						<div class="panel-body">
							<div class="row">
								<div class="table-responsive" style="padding: 7px;">
									<table class="table" id="view">
										<thead>
											<tr>
												<th>Sl No</th>
												<th>Employee Name</th>
												<th>Employee Code</th>
												<th>Applied Date</th>
												<th>Resign Date</th>
												<th>Reason</th>
												<th>Action</th>
												
											</tr>
										@php $i = 1; @endphp
										</thead>
										<tbody>
										@foreach ($resign as $resigns)
											<tr>
												<td>{{ $i++ }}</td>
												<td>{{ $resigns->name}}</td>
												<td>{{ $resigns->username}}</td>
												<td>{{ date('d-m-Y',strtotime($resigns->created_at))}}</td>
												<td>{{ date('d-m-Y',strtotime($resigns->resign_date))}}</td>						
												<td>{{ $resigns->resign_reason}}</td>					  							 <td><a href="{{ url('/hr/resignation/approve',$resigns->id) }}"><i class="fa fa-check"  style="color: #018001;" aria-hidden="true"></i></a>&nbsp;&nbsp;
												<a href="{{ url('/hr/resignation/deny',$resigns->id) }}"><i class="fa fa-close" style="color: red;"  aria-hidden="true"></i></a></td>      	
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
@endsection
@section('jquery')
<script type="text/javascript">
$(document).ready(function(){
$('#view').DataTable();
});
</script>
@endsection