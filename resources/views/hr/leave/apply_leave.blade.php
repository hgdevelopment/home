<link rel="stylesheet" href="/resources/demos/style.css">
<link href="{{ URL::asset('css/sweetalert.css') }}"></link>
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
<link rel="stylesheet" href="{{ URL::asset('js/multiselect_datepicker/datepicker.min.css') }}" type="text/css" />

<style>
	.datepicker > div {
		display: block;
	}

	
</style>
<div class="bg-light lter b-b wrapper-md">
	<h1 class="m-n font-thin h3">Apply Leave</h1>
</div><br>
	<form   method="post"  name="leave" id="leave" action="{{ URL::to('/') }}/hr/leave/apply_leave"  data-parsley-validate >
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
							APPLY LEAVE 
							</div>
							<div class="panel-body">
								<div class="col-sm-12">
									<div class="invalid-form-error-message" style="color: red;"></div>
								</div>
							<div class="col-sm-6">
								<label>Reporting To:</label>
								<input type="text" id="reporting_to" value="{{'CEO OFFICE'}}"  name="reporting_to" class="form-control" readonly required />
							</div>
							<div class="col-sm-6">
								<label>From:</label>
								<input type="text" id="from" required name="from" id="from"  value="{{$user}}"   class="form-control" readonly />
							</div>
							<div class="col-sm-12"><br></div>
							<div class="col-sm-6">
								<label>Available Leaves:</label>
								<input type="text" id="available_leave" required name="available_leave" id="available_leave"  value="{{$balance}}"   class="form-control" readonly />
							</div>
							
							<div class="col-sm-6">
								<label>Reason:</label>
								<input type="text" id="reason"  required name="reason" id="reason"    class="form-control" />
							</div>
							<div class="col-sm-12"><br></div>
							<div class="col-sm-6">
								<label>Full Day Leave Dates:</label>
								 <input type="text" class="form-control datepicker-here" name='fullday' data-language='en' data-multiple-dates="30" data-multiple-dates-separator=", " data-position='top left' data-parsley-errors-messages-disabled required />
								 
							</div>
							
							<div class="col-sm-6">
								<label>Half Day Leave Dates:</label>
								<input type="text" class="form-control datepicker-here" name='halfday' data-language='en' data-multiple-dates="30" data-multiple-dates-separator=", " data-position='top left' data-parsley-errors-messages-disabled required />								
							</div>							
							<div class="col-sm-12"><br></div>
							<div class="col-sm-6">
								<label>Type Of Leave:</label>
								<select name="type" class="form-control" id="type">
									<option value="">Select</option>
									<option value="normal">Normal</option>
									<option value="special">Special</option>
								</select>								
							</div><br>
							<div class="col-sm-12"><br></div>	
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
  @if($count>0)
		<div class="row">
			<div class="col-sm-12">
				<div class="blog-post">                   
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading font-bold">View Applied Leaves</div>
								<div class="panel-body">
									<div class="row">
										<div class="table-responsive" style="padding: 7px;">
											<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"  id="view">
												<thead>
													<tr>
														<th>Sl No</th>
														<th>Applied Date</th>
														<th>Number Of Leave</th>
														<th>Reason</th>
														<th>Status</th>
						
													</tr>
												<?php $i = 1; ?>
												</thead>
												<tbody>
												@foreach ($leave as $leaves)
													<tr>
														<td>{{ $i++ }}</td>
														<td>{{ date('d-m-Y',strtotime($leaves->applied_date))}}</td>
														<td>{{ $leaves->leave_count }}</td>
														<td>{{ $leaves->reason }}</td>
														@php
														if ($leaves->status == "approved") 			  
															$color = "success";
														elseif ($leaves->status == "rejected") 
															$color = "danger";
														elseif ($leaves->status == "pending") 
															$color = "info";
														else
														$color = "warning";							
														@endphp
														<td><span style="width: 100px;height: 25px;padding-bottom: 22px;padding-top: 0px;" class="btn btn-<?php echo $color;?>">{{ $leaves->status }}</span></td>														
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
<script src="{{ URL::asset('js/sweetalert.min.js') }}"></script>
<script src="{{ URL::asset('js/multiselect_datepicker/datepicker.min.js') }}"></script>
<script src="{{ URL::asset('js/i18n/datepicker.en.js') }}"></script>
<script>
$(document).ready(function() {
    $('#leave').parsley().subscribe('parsley:form:validate', function (formInstance) {
        // If any of these fields are valid
        if ($("input[name=fullday]").parsley().isValid() || 
            $("input[name=halfday]").parsley().isValid()) 
        {
            // Remove the error message
            $('.invalid-form-error-message').html('');

            // Remove the required validation from all of them, so the form gets submitted
            // We already validated each field, so one is filled.
            // Also, destroy parsley's object
            $("input[name=fullday]").removeAttr('required').parsley().destroy();
            $("input[name=halfday]").removeAttr('required').parsley().destroy();
            

            return;
        }

        // If none is valid, add the validation to them all
        $("input[name=fullday]").attr('required', 'required').parsley();
        $("input[name=halfday]").attr('required', 'required').parsley();
       

        // stop form submission
        formInstance.submitEvent.preventDefault();

        // and display a gentle message
        $('.invalid-form-error-message')
            .html("You must select at least one of the fields! <b>(Half Day Leave Dates or Full Day Leave Dates)</b>")
            .addClass("filled");
        return;
    });
});
</script>
<script type="text/javascript">
$(document).ready(function(){
$('#view').DataTable();
});
</script>
@endsection
