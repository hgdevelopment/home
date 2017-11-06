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
    <h1 class="m-n font-thin h3">Generate Experience Letter</h1> 
  </div>
<div class="col-md-12"><br>
  <div class="panel panel-default"> {{-- $sql="SELECT * FROM staff WHERE emp_code=".$_REQUEST['employee_code']; --}}
    <div class="panel-heading font-bold">
    </div>
    <div class="panel-body">
        <form name="" method="POST" action="{{URL::to('/') }}/hr/employee/createExperience" enctype="multipart/form-data" data-parsley-validate>
          {{ csrf_field() }}
        <div class="col-md-12">
          <div class="col-md-6">    
            <div class="form-group">
              <label>Employee Code :<span style="color: red;">*</span></label>
              <input type="text" name="employeecode"  id="employeecode" class="form-control" placeholder="Enter Employee Code"  required data-parsley-required-message="Please Enter Employee Code" data-parsley-trigger="keyup" value="@yield('employeecode')"> 
            </div>
          </div>
          {{-- <div class="col-md-12"></div> --}}
          <div class="col-md-1">
            <div class="form-group text-right "><br>
              <input type="submit" name="submit" value="Submit" class="btn btn-success">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div> 
</div>
@if(count($resignation_data)==0)
<div class="col-md-12">
  <div class="alert alert-danger">
  <strong>!</strong> Doesn't exist
</div>
</div>
@elseif($resignation_data[0]->resign_status=='applied')
<div class="col-md-12">
  <div class="alert alert-danger">
  <strong>!</strong> Resignation could not approved
</div>
</div>
@elseif($resignation_data[0]->resign_status=='rejected')
<div class="col-md-12">
  <div class="alert alert-danger">
  <strong>!</strong> Resignation rejected
</div>
</div>
@endif

@isset($id)
<div class="col-md-12"><br>
  <div class="panel panel-default"> 
    <div class="panel-heading font-bold">
      PDF ({{$id}})
    </div>
    <div class="panel-body">
       <iframe src="{{URL::to('/')}}/hr/employee/createExperience/pdf/{{$id}}" width="100%" height="800"></iframe>
    </div>
  </div>
</div>
@endisset

@endsection
@section('jquery')


@endsection


