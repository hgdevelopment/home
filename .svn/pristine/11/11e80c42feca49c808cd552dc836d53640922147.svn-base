@extends('admin.layout.erp1')
@section('title','Appointment Letter')
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
    <h1 class="m-n font-thin h3">Appointment Letter View</h1>
  </div> 
  <br/><br/>
  <div class="col-sm-12">
    <div class="panel panel-default">
      <div class="panel-heading font-bold">Appointment Letter</div>
      <div class="panel-body">
        <iframe src="{{URL::to('/')}}/hr/employee/appointment/pdf/{{$letter->code}}" width="100%" height="800"></iframe>
      </div> 
    </div>
  </div>
@endsection
@section('jquery')
@endsection