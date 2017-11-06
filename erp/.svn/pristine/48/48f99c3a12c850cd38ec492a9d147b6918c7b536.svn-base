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
		<h1 class="m-n font-thin h3">Enquiry Registration</h1>
	</div>
	<form action="{{ URL::to('/') }}/admin/enquiryreg" method="POST" enctype="multipart/form-data" data-parsley-validate>
	{{csrf_field()}}
	@section('edit')
	@show
	@if (Session()->has('message'))
        <div class="alert alert-info fade in alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong>Info!</strong> {{Session()->get('message')}}
        </div>
    @endif
	<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
	<div class="wrapper-md">
		<div class="row">
			<div class="col-sm-12">
				<div class="blog-post">                   
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading ">                  
								Enquiry Registration
							</div>
							<div class="panel-body">
								<div class="col-sm-6">
									<label>Category</label>
									<select   class="form-control"  required data-parsley-required-message="Please Select Category"  name="category" id="category" >
										<option value="">select</option>
										@foreach ($categorymaster as $categorymasters)
									    <option value="{{$categorymasters->id}}">{{$categorymasters->category_name}}</option>
										@endforeach
									</select><br>
								</div>
								
								<div class="col-sm-6">
									<label>Date</label>
									<input type="text" id="datepicker" required data-parsley-required-message="Please Select Date"  placeholder="MM/DD/YYYY" name="date" class="form-control" />
								</div>

								<div class="col-sm-6"><br></div>
								<div class="col-sm-6">
									<label>Description</label>
									<textarea  class="form-control" name="description" id="description" required data-parsley-required-message="Please Enter Description" placeholder="Description" rows="1" data-parsley-minlength="20"></textarea>
								</div>

								<div class="col-sm-12"><br></div>

								<div class="col-sm-6">
									<label>Member Code</label>
									<input type="text" name="membercode" required data-parsley-required-message="Please Enter Member Code" id="membercode" class="form-control" placeholder="" required> 
									<span id="error_member_code"></span>
								</div>

								<div class="col-sm-6">
									<label></label>
									<input type="button" style="margin-top:7%;" name="viewdetails" id="viewdetails"  value="View Details"  class="btn btn-sm btn-info" >
								</div>
							</div>
							<div class="panel-body">
								<div class="col-sm-12" id="suggestion">
									<label>Suggestions</label>
									<textarea  class="form-control" name="suggestion" id="suggestion" placeholder="" required data-parsley-required-message="Please Enter Suggestions"  data-parsley-minlength="20"></textarea><br>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div id="AjaxLoad">
	</div>

	<div class="wrapper-md">
		<div class="row">
			<div class="col-sm-12">
				<div class="blog-post">                   
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading ">                  
								COMPLAINT REPORTED BY
							</div>
							<div class="panel-body">
								<div class="col-sm-4">
									<label>Name<span class="required" style="color:red">*</span></label>
									<input type="text" name="name" id="name" value="" class="form-control" placeholder="" required>
								</div>

								<div class="col-sm-4">
									<label>Email<span class="required" style="color:red">*</span></label>
									<input type="email" name="email" id="email" value="" class="form-control" placeholder="" data-parsley-trigger="change" data-parsley-required-message="Please enter email" data-parsley-type-message="Please enter valid email" required> <br>
								</div>

								<div class="col-sm-4">
									<label>Mobile<span class="required" style="color:red">*</span></label>
									<input type="text" name="mobile" id="mobile" value="" class="form-control" placeholder="" data-parsley-maxlength="16" data-parsley-minlength="1" data-parsley-minlength-message="Please enter valid phone no" data-parsley-maxlength-message="Please enter valid phone no" required> <br>
								</div>
								
								<div class="col-sm-4">
									<label></label><br>
									<button name="submit" type="submit" id="submit" value="submit" class="btn btn-sm btn-success">submit</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	
</form>                    
@endsection
@section('jquery')
<script src="{{ URL::asset('js/bootstrap-datepicker.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/bootstrap-datepicker.min.css') }}" type="text/css" />
<script src="{{ URL::asset('js/i18n/datepicker.en.js') }}"></script>
<script>
	$( function() {
		$( "#tcndetails" ).show();
	});
	$("#viewdetails").click(function()
	{
		membercode = $("#membercode").val();
			$('#AjaxLoad').html('');
			token = $("#token").val();
			$.ajax({
				type: "POST",
				url: "{{ URL::to('/') }}/admin/enquiry/enquiryreg/tcn",
				data: ({"id": membercode, "_token": "{{ csrf_token() }}"}),
				success:function(data)
				{
					//alert(data);
					$('#AjaxLoad').append(data);
				}
			});

	});
</script>


<script>
  $(function()
  {
  $('#datepicker').datepicker({
  orientation:'bottom auto',
  autoclose:true
  });
  });
</script>

@endsection
 