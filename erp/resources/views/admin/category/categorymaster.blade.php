@extends('layout.erp')
@section('banner')
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
             <img src="{{ URL::asset('new_heading.png') }}" class="img-responsive">
         </div>
@endsection
@section('sidebar')
@include('partial.header')
@include('partial.aside')
@endsection
@section('body')

<link href="{!! asset('css/sweetalert.css') !!}" media="all" rel="stylesheet" type="text/css" />
<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">Enquiry Category Master</h1>
</div>
<div class="wrapper-md" ng-controller="FormDemoCtrl">
  <div class="panel panel-default">
    <div class="panel-heading font-bold">@if (trim($__env->yieldContent('edit_id'))) Edit Enquiry Category @else Add Enquiry Category @endif</div>
    <div class="panel-body">
      <div class="row">
        @if (trim($__env->yieldContent('edit_id')))
        <form role="form" method="post" action="{{URL::to('/') }}/admin/categorymaster/@yield('edit_id')" data-parsley-validate  enctype="multipart/form-data">
        @else
         @if (Session()->has('message'))
        <div class="alert alert-info fade in alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong>Info!</strong> {{Session()->get('message')}}
        </div>
        @endif
        <form role="form" method="post" action="{{URL::to('/') }}/admin/categorymaster" data-parsley-validate enctype="multipart/form-data">
         @endif
            
          {{ csrf_field() }}
              @section('edit')
              @show
          <div class="col-md-10">
              <div class="row">
                  <div class="col-md-10">
                    <label>CATEGORY NAME*</label>
                    <textarea  class="form-control" name="category_name" id="category_name" required data-parsley-required-message="Please Enter Category Name"  value="@yield('category_name')" data-parsley-pattern="^[a-zA-Z0-9_ ]*$" placeholder="Enter Your Category Name" >@yield('category_name')</textarea>
                    @if ($errors->has('category_name'))
                    <span class="help-inline">{{$errors->first('category_name')}}</span>
                    @endif
                    <div class="col-md-10"><br></div>
                  </div>
                  <div class="form-group col-md-10">
                      <label>ASSIGN EMPLOYEE CODE *</label>
                       <input name="employee_code" type="text" id="employee_code" required data-parsley-required-message="Please Enter Employee Code" data-parsley-type="alphanum"  class="form-control" value="@yield('employee_code')" placeholder="Employee Code" >
                       @if ($errors->has('employee_code'))
                      <span class="help-inline">{{$errors->first('employee_code')}}</span>
                      @endif
                  </div>
             
                  <div class="col-md-10">
                    <input type="submit" name="submit"  value="Save" class="btn btn-success" >
                 </div> 
              </div>
        </form> 
      </div>
    </div>
  </div>
</div>

 @if (trim($__env->yieldContent('edit_id')))
  @else
  <div class="panel panel-default">
    <div class="panel-heading font-bold">View Enquiry Category</div>
    <div class="panel-body">
      <div class="row">
        <div class="table-responsive">
        <table class="table" id="categoryTable" style="border:none;">
               <thead>
                   <tr>
                      <th>Sl No</th>
                      <th>Category Name</th>
                      <th>Employee Code</th>
                      <th>Actions</th>
                  </tr>
                  
              </thead>
              <?php $sl=1;?>
              <tbody>
                @foreach ($categorymaster as $categorymasters)
                <tr>
                  <td>{{$sl++}}</td>
                  <td>{{ $categorymasters->category_name }}</td>
                  <td>{{ $categorymasters->employee_code}}</td>
                  <td>
                    <a href="{{ URL::to('/') }}/admin/categorymaster/{{ $categorymasters->id }}/edit"  class="active">
                      <i  style="color: #018001;" class="fa fa-pencil text-success text-active" aria-hidden="true"></i>
                    </a>
                    <form method="post" id="delete_form"  action="{{ URL::to('/') }}/admin/categorymaster/{{ $categorymasters->id }}" style="float:left; padding-right:10px;">
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="DELETE">
                      <button id="delete-btn" type="submit" class="active" style="border: none;">
                      <i style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></button> 
                    </form>
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
@endif
@endsection
@section('jquery')
<script type="text/javascript" src="{!! asset('js/sweetalert.min.js') !!}"></script>
<script type="text/javascript">
$(document).ready(function(){
$('#delete-btn').on('click', function(e){
  e.preventDefault();
  var self = $(this);
  swal({

              title: "Are you sure?",
              text: "All the selected  incentive will be deleted also!",
              type: "warning",
              showCancelButton: true,
              confirmButtonColor: "#DD6B55",
              confirmButtonText: "Yes, delete it!",
              closeOnConfirm: true
          },
          function(isConfirm){
              if(isConfirm){
                  swal("Deleted!","Incentive deleted", "success");
                  setTimeout(function() {
                      self.parents("#delete_form").submit();
                  });
              }
              else{
                  swal("cancelled","Your Incentive are safe", "error");
              }
          });
});
  $('#categoryTable').DataTable();
});
</script>
@endsection
