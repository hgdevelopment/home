@extends('admin.layout.erp1')
@section('title','Member Registration')
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
  <h1 class="m-n font-thin h3">Membership Request Form</h1>
</div>
<br/><br/>
  <div class="col-sm-12">
      <div class="panel panel-default">
        <div class="panel-heading font-bold">PDF</div>
        <div class="panel-body">
  <iframe src="{{URL::to('/')}}/admin/member/pdfs/{{$id}}" width="100%" height="800">
    
  </iframe>


          </div> 
      </div>
    </div>
@endsection
@section('jquery')
@endsection