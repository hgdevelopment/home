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
    <h1 class="m-n font-thin h3">Religion  Master</h1>
  </div>
<div class="col-md-12"><br>
  <div class="panel panel-default">

      <div class="panel-heading font-bold">@if (trim($__env->yieldContent('edit_id'))) Edit Religion @else Add Religion @endif</div>

    <div class="panel-body">
      @if (trim($__env->yieldContent('edit_id')))
        <form role="form" method="post" action="{{URL::to('/') }}/hr/master/religionmaster/@yield('edit_id')" enctype="multipart/form-data" data-parsley-validate>
      @else
        <form name="" method="POST" action="{{URL::to('/') }}/hr/master/religionmaster" enctype="multipart/form-data" data-parsley-validate>
      @endif
      @if (Session()->has('message'))
        <div class="alert alert-info fade in alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong>Info!</strong> {{Session()->get('message')}}
        </div>
        @endif
      {{ csrf_field() }}
      @section('edit')
      @show
        <div class="col-md-12">
         
          <div class="col-md-6">
            <div class="form-group">
              <label>Religion  Name :<span style="color: red;">*</span></label>
              <input type="text" name="religion_name"  id="religion_name" class="form-control" placeholder="Enter Religion"  required data-parsley-required-message="Please Enter Religion" data-parsley-pattern="^[a-zA-Z0-9_ ]*$" value="@yield('religion_name')"> 
              @if ($errors->has('religion_name'))
                    <span class="help-inline">{{$errors->first('religion_name')}}</span>
              @endif
            </div>
          </div>
         <div class="col-md-12"></div>
          <div class="col-md-6">
            <div class="form-group"><br>
              <input type="submit" name="submit" value="Submit" class="btn btn-success">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


 @if (trim($__env->yieldContent('edit_id')))
  @else
    <div class="row">
      <div class="col-sm-12">
        <div class="blog-post">                   
          <div class="col-sm-12">
            <div class="panel panel-default">
              <div class="panel-heading font-bold">View Religion Master</div>
                <div class="panel-body">
                  <div class="row">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"  id="view">
                        <thead>
                          <tr>
                            <th>Sl No</th>
                            <th>Religion Name</th> 
                            <th>Action</th>      
                          </tr>
                        <?php $i = 1; ?>
                        </thead>
                        <tbody>
                        @foreach ($religion as $views)
                          <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ $views->religion_name }}</td>
                            <td>
                            <a id="edit" href="{{ URL::to('/') }}/hr/master/religionmaster/{{ $views->id }}/edit"  class="active">
                              <i  style="color: #018001;" class="fa fa-pencil text-success text-active" aria-hidden="true"></i>
                            </a>
                            <form method="post" id="delete_form1"  action="{{ URL::to('/') }}/hr/master/religionmaster/{{ $views->id }}" style="float:left; padding-right:10px;">
                              {{ method_field('DELETE') }}
                              {{ csrf_field() }}
                              <input type="hidden" name="_method" value="DELETE">
                              <button id="delete-btn1" type="submit" class="active" style="border: none;">
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
        </div>
      </div>  
    </div>

@endif
@endsection
@section('jquery')
<script type="text/javascript">
$(document).ready(function(){
$('#view').DataTable();
});
</script>
@endsection


