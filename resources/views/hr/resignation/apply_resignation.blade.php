<link rel="stylesheet" href="/resources/demos/style.css">
<link href="{{ URL::asset('css/sweetalert.css') }}"></link>
<!-- include summernote css/js-->
<link href="{{ URL::asset('js/text-editor/dist/summernote.css') }}" rel="stylesheet">

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
	<h1 class="m-n font-thin h3">Resignation Letter</h1>
</div><br>
<form   method="post"  name="resignation" id="resignation" action="{{ URL::to('/') }}/hr/resignation/apply_resignation"  data-parsley-validate >
	{{csrf_field()}}
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
						<div class="panel-heading ">                  
							RESIGNATION LETTER
						</div>
						<div class="panel-body">
							<div class="col-sm-4">
								<label>From:</label>
								<input type="text" id="from" required name="from" id="from" value="{{$user}}"   class="form-control" readonly/>
							</div>
							<div class="col-sm-4">
								<label>Resign On:<span class="required" style="color:red">*</span></label>
								<input type="text" id="resign_date" required data-parsley-required-message="Please Select Date"  placeholder="MM/DD/YYYY" name="resign_date"   class="form-control" readonly/>
							</div>
							<div class="col-sm-4">
								<label>Reason:<span class="required" style="color:red">*</span></label>
								<select type="text" id="resign_reason" required data-parsley-required-message="Please Select Reason"  placeholder="Reason" name="resign_reason"   class="form-control">
									<option value="">Select</option>	
									<option>New Job</option>
									<option>Marriage</option>
									<option>Higher Studies</option>
									<option>Others</option>
								</select>
							</div>
							<div class="col-sm-12">
								<label>Resign Letter:</label>
								<textarea name="reason" id="summernote" >Dear Madam,<br>
								I would like to inform you that I am resigning from my position as {{$logins->designation_name}} for the company.
								Thank you very much for the opportunities for professional and personal development that you have provided me.  I have enjoyed working for the company and appreciate the support provided me during my tenure with the company.
								If I can be of any help during this transition, please let me know.<br>
								Sincerely,<br>
								{{$logins->name}}
								</textarea>
							</div>
							<div class="col-sm-12"></div><br>
							<div class="col-sm-6">
								<label></label><br>
								<input type="submit"  name="submit" id="submit"  value="apply"  class="btn btn-sm btn-success" >
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</form> 
@if(isset($count) && $count>0)
	<div class="row">
			<div class="col-sm-12">
				<div class="blog-post">                   
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading font-bold">View Resignation Status</div>
								<div class="panel-body">
									<div class="row">
										<div class="table-responsive" style="padding: 7px;">
											<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"  id="view">
												<thead>
													<tr>
														<th>Sl No</th>
														<th>Applied Date</th>
														<th>Resign Date</th>
														<th>Reason</th>
														<th>Status</th>
						
													</tr>
												<?php $i = 1; ?>
												</thead>
												<tbody>
												@foreach ($resign as $resigns)
													<tr>
														<td>{{ $i++ }}</td>													
														<td>{{ date('d-m-Y',strtotime($resigns->created_at))}}</td>
														<td>{{ $resigns->resign_date}}</td>
														<td>{{ $resigns->resign_reason }}</td>
														@php
														if ($resigns->resign_status == "approved") 			  
															$color = "success";
														elseif ($resigns->resign_status == "rejected") 
															$color = "danger";
														
														else
														$color = "info";							
														@endphp
														<td><span style="width: 100px;height: 25px;padding-bottom: 22px;padding-top: 0px;" class="btn btn-<?php echo $color;?>">{{ $resigns->resign_status }}</span></td>														
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
<script src="{{ URL::asset('js/text-editor/dist/summernote.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap-datepicker.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/bootstrap-datepicker.min.css') }}" type="text/css" />
<script src="{{ URL::asset('js/i18n/datepicker.en.js') }}"></script>
<script>
	$(function()
	{
		$('#summernote').summernote({
			tabsize: 2,
            height: 200
		});
		$('#resign_date').datepicker
		({
			orientation:'bottom auto',
			autoclose:true
		});
	});
</script>
@endsection