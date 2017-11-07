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
<link href="{!! asset('css/sweetalert.css') !!}" media="all" rel="stylesheet" type="text/css" />
<div class="bg-light lter b-b wrapper-md">
	<h1 class="m-n font-thin h3">REASSIGN MEMBER</h1>
</div><br>
	<form action="{{ URL::to('/') }}/admin/reassignmember/view" method="post" name="form" id="form" data-parsley-validate>
	{{csrf_field()}}
	@if (Session()->has('message'))
        <div class="alert alert-info fade in alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong>Info!</strong> {{Session()->get('message')}}
        </div>
    @endif
	<div class="wrapper-sm">
		<div class="row">
			<div class="col-sm-12">
				<div class="blog-post">                   
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading ">                  
								Reassign Member
							</div>
							<div class="panel-body">
							<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
							<div class="col-sm-6">
								<label>Member Code</label>
								<input type="text" id="membercode" name="membercode" id="membercode" class="form-control" required/>
							</div>
						
							<div class="col-sm-6">
								<label>&nbsp;</label><br>
								<input type="submit"  name="submit" id="submit"  value="Submit"  class="btn btn-sm btn-success">
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</form>
	@if(isset($reassign) && count($reassign)>0)
	<form action="{{ URL::to('/') }}/admin/reassignmember/solve" method="post" name="form1" id="form1" data-parsley-validate>
	{{csrf_field()}}
	
    	<div class="wrapper-sm">
		<div class="row">
			<div class="col-sm-12">
				<div class="blog-post">                   
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading ">                  
								Member Details
							</div>
							<div class="panel-body">
							  @foreach ($reassign as $reassigns)
								<div class="col-md-4">
									<label><strong>Member Code</strong></label><br>
									<label>{{$reassigns->code}}</label>
								</div>
								<div class="col-md-4">
									<label><strong>Member Name</strong></label><br>
									<label>{{$reassigns->name}}</label>
								</div>	@endforeach
								<input type="hidden" name="id" id="id"  class="form-control" value="{{$reassigns->id}}">
								@foreach ($login as $logins)
								<div class="col-md-4">
									<label><strong>Added By</strong></label><br>
									<label>{{$logins->username}}({{$addedunder}})</label>
								</div>
								@endforeach
								<div class="col-md-12"><br></div>
								<div class="col-md-12"><br></div>
								<div class="col-md-6">
									<label><strong> RE ASSIGNED TO</strong></label><br>
									<select type="text" name="assigned" id="assigned"  class="form-control" placeholder="Assigned To" required>
										<option value="">select</option>
										<option>DSA</option>
										<option>ME</option>
										<option>OI</option>
										<option>EMP</option>
										<option>Myself</option>
									</select>
								</div>
								<div class="col-md-6" id="dsa">
									<label><strong> RE ASSIGNED TO</strong></label><br>
									<select type="text" name="assignedtodsa" id="assignedtodsa"  class="form-control" placeholder="Assigned To" data-parsley-required-message="Please Enter Assigned To">
										<option value="">Select</option>
					                    @foreach ($dsa as $dsas)
					                    <option value="{{$dsas->id}}" >{{$dsas->username}}</option>
					                  	@endforeach
				                    </select>
								</div>
								<div class="col-md-6" id="me">
									<label><strong> RE ASSIGNED TO</strong></label><br>
									<select type="text" name="assignedtome" id="assignedtome"  class="form-control" placeholder="Assigned To" data-parsley-required-message="Please Enter Assigned To">
										<option value="">Select</option>
					                    @foreach ($me as $mes)
					                    <option value="{{$mes->id}}" >{{$mes->username}}</option>
					            		@endforeach
				                    </select>
								</div>
								<div class="col-md-6" id="oi">
									<label><strong> RE ASSIGNED TO</strong></label><br>
									<select type="text" name="assignedtooi" id="assignedtooi"  class="form-control" placeholder="Assigned To" data-parsley-required-message="Please Enter Assigned To">
										<option value="">Select</option>
					                    @foreach ($oi as $ois)
					                    <option value="{{$ois->id}}" >{{$ois->username}}</option>
					            		@endforeach
				                    </select>
								</div>
								<div class="col-md-6" id="emp">
									<label><strong> RE ASSIGNED TO</strong></label><br>
									<select type="text" name="assignedtoemp" id="assignedtoemp"  class="form-control" placeholder="Assigned To" data-parsley-required-message="Please Enter Assigned To">
										<option value="">Select</option>
					                    @foreach ($emp as $emps)
					                    <option value="{{$emps->id}}" >{{$emps->username}}</option>
					            		@endforeach
				                    </select>
								</div>
								<div class="col-md-12"><br></div>
								<div class="col-md-2">
								<label></label><br><br>
									<input name="submit1" type="submit" id="submit1"  value="submit" class="btn btn-sm btn-success" >
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  </form>            
@endif
@endsection
@section('jquery')
<script type="text/javascript" src="{!! asset('js/sweetalert.min.js') !!}"></script>
<script type="text/javascript">
      $(document).ready(function()
      {
      	$("#me").attr('required',false).hide();
      	$("#dsa").attr('required',false).hide();
      	$("#oi").attr('required',false).hide();
      	$("#emp").attr('required',false).hide();
      

      $('#assigned').on('change', function() 
      {

      if ( this.value == 'DSA')
      {
      	
        $("#dsa").show();
        $('#assignedtodsa').attr('required',true);
        $('#assignedtome').attr('required',false);
        $('#assignedtooi').attr('required',false);
        $('#assignedtoemp').attr('required',false);
        $("#me").hide();
        $("#oi").hide();
        $("#emp").hide();
       

      }
       if ( this.value == 'ME')
      {
      	
        $("#me").show();
        $('#assignedtome').attr('required',true);
        $('#assignedtodsa').attr('required',false);
        $('#assignedtooi').attr('required',false);
        $('#assignedtoemp').attr('required',false);
        $("#dsa").hide();
        $("#oi").hide();
        $("#emp").hide();

      }
       if ( this.value == 'OI')
      {
      	
        $("#oi").show();
        $('#assignedtooi').attr('required',true);
        $('#assignedtodsa').attr('required',false);
        $('#assignedtoemp').attr('required',false);
        $('#assignedtome').attr('required',false);
        $("#dsa").hide();
        $("#me").hide();
        $("#emp").hide();

      }
      if ( this.value == 'EMP')
      {
      	
        $("#emp").show();
        $('#assignedtoemp').attr('required',true);
        $('#assignedtodsa').attr('required',false);
        $('#assignedtooi').attr('required',false);
        $('#assignedtome').attr('required',false);
        $("#dsa").hide();
        $("#me").hide();
        $("#oi").hide();

      }
     
     
      
    });
});
</script>
<!-- <script type="text/javascript">
      $(document).ready(function()
      {
      	$("#me").hide();
      	$("#dsa").hide();
        $('#assigned').on('change', function() 
      {

      if ( this.value == 'DSA')
      {
      	
        $("#dsa").show();
        $("#me").hide();

      }
       if ( this.value == 'ME')
      {
      	
        $("#me").show();
        $("#dsa").hide();

      }
      
    });
});
</script> -->
<!-- <script type="text/javascript">
$(document).ready(function(){
$('#submit1').on('click', function(e){
      e.preventDefault();
      var self = $(this);
      swal({
                  title: "Are you sure?",
                  text: "Are you sure to reassign the selected member code!",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Yes, reassign it!",
                  closeOnConfirm: true
              },
              function(isConfirm){
                  if(isConfirm){
                  	swal("Good job!", "You clicked the button!", "success")
                      setTimeout(function() {
                          self.parents("#form1").submit();
                      });
                  }
                  else{
                      swal("cancelled","Your Member code is safe", "error");
                  }
              });
    });

});
</script> -->
@endsection

