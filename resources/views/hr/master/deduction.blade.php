@extends('admin.layout.erp1')
@section('banner')
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
	<img src="{{ URL::asset('img/new_heading.png') }}" class="img-responsive">
</div>
@endsection
@section('sidebar')
	@include('admin.partial.header')
	@include('admin.partial.aside')
@endsection
@section('body')
<div class="bg-light lter b-b wrapper-md">
	<h1 class="m-n font-thin h3">Deduction</h1>
</div>
<div class="wrapper-md" ng-controller="FormDemoCtrl">
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading font-bold"> @if (trim($__env->yieldContent('edit_id'))) Edit Deduction @else Add Deduction @endif </div>
				<div class="panel-body">
					@if (trim($__env->yieldContent('edit_id')))
					<form role="form" method="post" action="{{URL::to('/') }}/hr/master/deduction/@yield('edit_id')" enctype="multipart/form-data" data-parsley-validate>
					@else
						<form role="form" method="post" action="{{URL::to('/') }}/hr/master/deduction" enctype="multipart/form-data" data-parsley-validate>
						@endif
						{{ csrf_field() }}
						@section('edit')
						@show
							<div class="col-md-12">
								<div class="col-md-4">
									<label>Type Of Deduction:</label>
									<input type="text" name="deduction" id="deduction" class="form-control" value="@yield('deduction')" placeholder="Enter Type Of Deduction" required data-parsley-required-message="Please Enter Type Of Deduction" >
									@if ($errors->has('deduction'))
										<span class="help-inline" style="color: red;">{{$errors->first('deduction')}}</span>
									@endif
								</div>
								<div class="col-md-4">
									<label>Amount:</label> 
									<input type="text" name="amount" id="amount" class="form-control" value="@yield('amount')" placeholder="Enter Amount" data-parsley-type="number" required data-parsley-required-message="Please Enter Amount" >
									@if ($errors->has('amount'))
										<span class="help-inline">{{$errors->first('amount')}}</span>
									@endif
								</div>
								<div class="col-md-3 "><br>
									<button class="btn btn-success" type="submit" value="save" name="save">Save</button>
								</div>
							</div>
						</form>
					</form>
				</div>
			</div>
		</div>
	</div>
	<div class="row">
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading font-bold">View Deduction</div>
				<div class="table-responsive" style="overflow-x: initial;">
					<table class="table table-striped b-t">
						<thead>
							<tr>
								<th>SI.No</th>
								<th>Type Of Deduction</th>
								<th>Amount</th>
								<th>Actions</th>
							</tr>
						</thead>
						<tbody>
							@foreach ($Deduction as $key => $deduct) 
								<tr data-expanded="true">
									<td>{{ $key+1}}</td>
									<td>{{ $deduct->type_of_deduction}}</td> 
									<td>{{ $deduct->amount }}</td> 
									<td>
										<a href="{{URL::to('/') }}/hr/master/deduction/{{$deduct->id}}/edit" class="active"><i style="color: #018001;" class="fa fa-pencil text-success text-active" aria-hidden="true"></i></a> 
										
										{{-- <a href="{{URL::to('/') }}/hr/master/department/{{$dept->id}}/destroy"  class="active"><i  style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></a> --}}
										{{--  </form> --}}
										<button class="active" style="border: none;" onclick="destroy({{ $deduct->id}})"><i style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></button>
									</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div> 
		</div>
	</div>
</div>
@endsection
<script type="text/javascript">
  function destroy(id)
  	{
	  swal({
		  title: "Delete!!!",
		  text: "Are you sure?",
		  type: "error",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Delete Department!",
		  closeOnConfirm: true
	  	}, 
	  	function (isConfirm) 
	  	{
	  		if(isConfirm) 
	  		{
			  	$.ajax({
				  url: "{{URL::to('/') }}/hr/master/deduction/"+id,
				  type: "delete",
				  data: {"_token": "{{ csrf_token() }}"},
				  success: function (data) 
			  		{    
			  			
			  			window.location.reload(true);
			  		},
			  	});
	  		}
	  		else
	  		{
	  			swal("cancelled","","error");
	  		}
	  	});
  	}
</script> 