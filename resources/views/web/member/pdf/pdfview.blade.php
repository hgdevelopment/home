@extends('web.layout.erp')
@section('title','Member Registration')
@section('banner')
  <div class="col-lg-12" align="center" style="background-color:#ffcf29">
    <img src="{{ URL::asset('new_heading.png') }}" class="img-responsive">
  </div>
@endsection
@section('sidebar')
{{-- @include('partial.header')
@include('partial.aside') --}}
@endsection
@section('body')
<style type="text/css">
  .app-content{
  margin-left: 0px;
  }
  .app-header-fixed {
  padding-top: 0px;
  }
  .navbar-collapse, .app-content, .app-footer {
  margin-left: 0px;
  }
  span.help-inline{ 
  color:red;
  }
</style>
<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">Membership Request Form</h1>
   <p align="right">
    <a href="{{ URL::to('/') }}" class="btn btn-info btn-lg">
     <span class="glyphicon glyphicon-home"></span> Home
    </a>
  </p> 
</div>
<br/><br/>
  <div class="col-sm-12">
      <div class="panel panel-default">
        <div class="panel-heading font-bold">PDF</div>
        <div class="panel-body">
  <iframe src="{{URL::to('/')}}/web/member/pdf/{{$id}}" width="100%" height="800">
    
  </iframe>


          </div>
      </div>
    </div>
@endsection
@section('jquery')
@endsection