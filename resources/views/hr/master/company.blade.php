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
    <h1 class="m-n font-thin h3">Company Master</h1>
  </div>
<div class="col-md-12"><br>
  <div class="panel panel-default">
    <div class="panel-heading font-bold">
      @if (trim($__env->yieldContent('edit_id'))) Edit Company @else Add Company @endif
    </div>
    <div class="panel-body">
      @if (trim($__env->yieldContent('edit_id')))
        <form role="form" method="post" action="{{URL::to('/') }}/hr/CompanyMaster/@yield('edit_id')" enctype="multipart/form-data" data-parsley-validate>
      @else
        <form name="" method="POST" action="{{URL::to('/') }}/hr/CompanyMaster" enctype="multipart/form-data" data-parsley-validate>
      @endif
      {{ csrf_field() }}
      @section('edit')
      @show
        <div class="col-md-12">
          <div class="col-md-6">  
            <div class="form-group">
              <label>Company Name :<span style="color: red;">*</span></label>
              <input type="text" name="company_name"  id="company_name" class="form-control" placeholder="Enter Company Name"  required data-parsley-required-message="Please Enter Company Name"  data-parsley-pattern="/^[a-zA-Z_ ]*$/" data-parsley-trigger="keyup" value="@yield('company_name')"> 
              @if ($errors->has('company_name'))
                <span class="help-inline" style="color: red;">{{$errors->first('company_name')}}</span>
              @endif
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
<div class="col-md-12"><br>
  <div class="panel panel-default">
    <div class="panel-heading font-bold">
      View Company
    </div>
    <div class="panel-body">
      <table class="table table-striped b-t b-light" id="empTable">
        <thead>
          <tr>
            <th>Sl</th>
            <th>Company Name</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($companys as $key=>$company)
            <tr data-expanded="true">
              <td>{{ $key+1 }} </td>
              <td>{{ $company->company_name }} </td>
              <td>
                <a href="{{ URL::to('/') }}/hr/CompanyMaster/{{ $company->id }}/edit"  class="active"><i  style="color: #018001;" class="fa fa-pencil text-success text-active" aria-hidden="true"></i></a>
                <button class="active" style="border: none;" onclick="Company_delete({{ $company->id}})"><i  style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></button> 
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
  $('.chosen-select').chosen({width:'100%'});
  function Company_delete(id)
  {
    swal({
      title: "Delete!!!",
      text: "Are you sure?",
      type: "warning",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55",
      confirmButtonText: "Delete",
      closeOnConfirm: true
    },function (isConfirm) 
    {
      if (isConfirm) 
      {
        $.ajax({
          url: '{{ URL::to('hr/CompanyMaster/')}}' + '/' + id,
          data: { "_token": "{{ csrf_token() }}" },
           type: "delete",
          success: function(data) {
          swal("Done!", "It was succesfully deleted!", "success");
          setTimeout(function() {
            window.location.href = "{{ URL::to('hr/CompanyMaster') }}";
          }, 2000);
          }
        });
      }
      else{
        swal("Done!", "It was succesfully deleted!", "success");
      }
    });
  }
</script>

@endsection


