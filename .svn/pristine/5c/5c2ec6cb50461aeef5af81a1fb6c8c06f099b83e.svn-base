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
  <h1 class="m-n font-thin h3">Merge Members(Special Case)</h1>
</div><br>
<form  method="post" id="form" data-parsley-validate action="{{URL::to('/') }}/admin/specialmerge">
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
               Merge Members(Special Case)
              </div>
              <div class="panel-body"> 
                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                <div class="col-sm-4">
                  <label>Original Member Code</label>
                <input type="text" class="form-control" id="specialoriginal" name="specialoriginal">
                </div>
                 <div class="col-sm-4">
                  <label>Duplicate Member Code</label>
                <input type="text" class="form-control" id="specialduplicate" name="specialduplicate">
                </div>
                <div class="col-sm-4">
                 <label><br><br></label>
                  <input type="submit"  name="submit" id="submit"  value="Check"  class="btn btn-sm btn-success">
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
   <script>
   </script>
   @endsection