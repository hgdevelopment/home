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
				<div class="panel-heading font-bold">  </div>
				<div class="panel-body">
					<form role="form" method="post" action="{{URL::to('/') }}/hr/deduction/employeededuction" enctype="multipart/form-data" data-parsley-validate>
					{{ csrf_field() }}
					@section('edit')
					@show
						<div class="col-md-12">
							<div class="col-md-4">
								<label>Employee:</label>
								<select  class="form-control" name="employee" id="employee" required data-parsley-required-message="Please Select Employee">
									<option value="">--Select--</option>
									@php
										$table=DB::table('hr_emp_personal_details')->get();
						 			@endphp
									@foreach ($table as $emp)
										<option value="{{$emp->id}}" @if($__env->yieldContent('employee')==$emp->id) {{ 'selected' }} @endif>{{$emp->code}}</option>
									@endforeach
								</select>
								@if ($errors->has('employee'))
									<span class="help-inline">{{$errors->first('employee')}}</span>
								@endif
							</div>
							<div class="col-md-4">
								<label>Type Of Deduction:</label>
								<select  class="form-control" name="deduction" id="deduction" required data-parsley-required-message="Please Select Employee">
									<option value="">--Select--</option>
									@php
										$table=DB::table('hr_deduction_master')->whereNull('deleted_at')->get();
						 			@endphp
									@foreach ($table as $deduct)
										<option value="{{$deduct->id}}" @if($__env->yieldContent('deduction')==$deduct->id) {{ 'selected' }} @endif>{{$deduct->type_of_deduction}}</option>
									@endforeach
								</select>
								@if ($errors->has('deduction'))
									<span class="help-inline" style="color: red;">{{$errors->first('deduction')}}</span>
								@endif
							</div>
						{{-- 	<div class="col-md-4">
								<label>Reason:</label>
								<input type="text" name="reason" id="reason" class="form-control">
								@if ($errors->has('deduction'))
									<span class="help-inline" style="color: red;">{{$errors->first('deduction')}}</span>
								@endif
							</div> --}}
							<div class="col-md-3"><br>
								{{-- <button type="button" name="approve" class="btn btn-primary" onclick="approveMember({{ $viewmember->userId }},this)" id="approve">Approve</button>
								<button class="btn btn-success" type="submit" value="save" name="save">Approve</button>
								<button class="btn btn-success" type="submit" value="save" name="save">Deny</button>
								<button type="button" name="deny" type="submit" class="btn btn-danger" onclick="denydeduction({{ $viewmember->userId }})" id="deny">Deny</button>  --}}
								<button class="btn btn-success" type="submit" value="save" name="save">submit</button>
							</div>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection
<script type="text/javascript">

  function denydeduction(id)
  {
	  var reason=$("#reason").val();
	  $('#den').html("");
	  swal({
		  title: "Deny!!",
		  text: "Are you sure?",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "Deny",
		  closeOnConfirm: true
	  }, 
	  function (isConfirm) 
	  	{ 
		  	if (isConfirm) {
			  $.ajax({ 
				  url: "{{ URL::to('/hr/deduction/employeededuction') }}",
				  type: "POST",
				  data: { "_token": "{{ csrf_token() }}","id": id},
				  dataType: "html",
				  success: function (data) { 
					  //alert(data);exit;
					  swal("Done!", "It was succesfully denied!", "success");
					  setTimeout(function() {
					  window.location.href = "{{ URL::to('/hr/deduction/employeededuction') }}";
					}, 2000); 
				  },
			  	}); 
		  	}
		  else
		  {
		  	swal("Done!", "It was succesfully denied!", "success");
		  }   
	   }); 
  }
</script>