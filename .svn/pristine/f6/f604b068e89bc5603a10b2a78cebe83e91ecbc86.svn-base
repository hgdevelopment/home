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
    <h1 class="m-n font-thin h3">Branch Master</h1>
  </div> 
<div class="col-md-12"><br>
  <div class="panel panel-default">
    <div class="panel-heading font-bold"> 
      @if (trim($__env->yieldContent('edit_id'))) Edit Branch @else Add Branch @endif
    </div>
    <div class="panel-body">
      @if (trim($__env->yieldContent('edit_id')))
        <form role="form" method="post" action="{{URL::to('/') }}/hr/master/branch/@yield('edit_id')" enctype="multipart/form-data" data-parsley-validate>
      @else
        <form name="" method="POST" action="{{URL::to('/') }}/hr/master/branch" enctype="multipart/form-data" data-parsley-validate>
      @endif
      {{ csrf_field() }}
      @section('edit')
      @show
        <div class="col-md-12">
          <div class="col-md-6">
            <div class="form-group">
              <label>Company Name :<span style="color: red;">*</span></label>
              <select class="form-control chosen-select" name="companyId" id="companyId" required data-parsley-required-message="Please Select Company Name">
                <option value=" ">--Select--</option>
                @php
                $table=DB::table('hr_companies')->whereNull('deleted_at')->get();
                @endphp
                @foreach($table as $companies)
                <option value="{{$companies->id}}" @if($__env->yieldContent('companyId')==$companies->id) {{ 'selected' }} @endif>{{$companies->company_name}}</option>
                @endforeach
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Branch Name :<span style="color: red;">*</span></label>
              <input type="text" name="branch_name" id="branch_name" class="form-control" placeholder="Enter Branch Name"  required data-parsley-required-message="Please Enter Branch Name" value="@yield('branch_name')"> 
              @if ($errors->has('branch_name'))
                <span class="help-inline" style="color: red;">{{$errors->first('branch_name')}}</span>
              @endif
            </div>
          </div>
           <div class="col-md-6">
            <div class="form-group">
              <label>Address Line 1 :<span style="color: red;">*</span></label>
              <textarea name="address1"  id="address1" class="form-control" placeholder="Enter Address 1"   data-parsley-trigger="keyup">@yield('address1')</textarea>
            </div>
          </div>
          {{-- <div class="col-md-12"></div> --}}
          <div class="col-md-6">
            <div class="form-group">
              <label>Address Line 2 :<span style="color: red;">*</span></label>
              <textarea name="address2"  id="address2" class="form-control" placeholder="Enter Address 2"    data-parsley-trigger="keyup">@yield('address2')</textarea>
            </div> 
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Mobile Number:<span style="color: red;">*</span></label>
              <input name="mobileNo"  id="mobileNo" class="form-control" placeholder="Enter Mobile Number" data-parsley-trigger="keyup" value="@yield('mobileNo')">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Email:<span style="color: red;">*</span></label>
              <input name="email"  id="email" class="form-control" placeholder="Enter Email" data-parsley-trigger="keyup" value="@yield('email')">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>City :<span style="color: red;">*</span></label>
              <input type="text" name="city"  id="city" class="form-control" placeholder="Enter City"   data-parsley-pattern="/^[a-zA-Z_ ]*$/" data-parsley-trigger="keyup" value="@yield('city')">
            </div>
          </div>
         {{--  <div class="col-md-12"></div> --}}
          <div class="col-md-6">
            <div class="form-group">
              <label>State :<span style="color: red;">*</span></label>
              <input type="text" name="state"  id="state" class="form-control" placeholder="Enter State"   data-parsley-pattern="/^[a-zA-Z_ ]*$/" data-parsley-trigger="keyup" value="@yield('city')">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Country :<span style="color: red;">*</span></label>
              <select class="form-control chosen-select" name="country" id="country" >
                <option value=" ">Select</option>
                @php
                $table=DB::table('countries')->get();

                @endphp 
                @foreach($table as $country)
                <option value="{{$country->id}}" @if($__env->yieldContent('country')==$country->id) {{ 'selected' }} @endif>{{$country->countryName}}</option>
                @endforeach
              </select>
            </div>
          </div>
         {{--  <div class="col-md-12"></div> --}} 
          <div class="col-md-6">
            <div class="form-group">
              <label>Pin No :<span style="color: red;">*</span></label>
              <input type="text" name="pinNo"  id="pinNo" class="form-control" placeholder="Enter Pin no"   data-parsley-maxlength="6" data-parsley-minlength="5" data-parsley-type="integer" data-parsley-trigger="keyup" value="@yield('pinNo')">
            </div>
          </div>
          <div class="col-md-12"></div>
          <div class="col-md-6">
            <div class="form-group text-right "><br>
              <input type="submit" name="submit" value="Submit" class="btn btn-success">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="col-md-12"><br>
  <div class="panel panel-default">
    <div class="panel-heading font-bold">
      View Branch
    </div>
    <div class="panel-body">
      <table class="table table-striped b-t b-light" id="empTable">
        <thead>
          <tr>
            <th>Sl</th>
            <th>Company  Name</th>
            <th>Branch  Name</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($companybranch as $key=>$company)
            <tr data-expanded="true">
              <td>{{ $key+1 }} </td>
              <td>{{ $company->Names }} </td>
              <td>{{ $company->branch_name }} </td>
              <td>
                <a href="{{URL::to('/') }}/hr/master/branch/{{$company->id}}/edit"  class="active"><i  style="color: #018001;" class="fa fa-pencil text-success text-active" aria-hidden="true"></i></a>
                <button class="active" style="border: none;" onclick="destroy({{ $company->id}})"><i  style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></button> 
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
@section('jquery')
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
          url: "{{URL::to('/') }}/hr/master/branch/"+id,
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
          swal("cancelled","", "error");
        }
      });
    }
</script> 

@endsection


