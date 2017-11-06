@extends('admin.layout.erp1')

@section('title','DSA Application')
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
  <h1 class="m-n font-thin h3">DSA Request Form</h1>
</div>
<br/><br/>
  <div class="col-sm-12">
      <div class="panel panel-default">
        <div class="panel-heading font-bold">DSA Application Form</div>
        <div class="panel-body">
  <iframe src="{{URL::to('/')}}/web/dsa/pdf/{{$id}}" width="100%" height="800">
    
  </iframe>


          </div>
      </div>
    </div>
@endsection
@section('jquery')
<script type="text/javascript">
window.history.forward(1);
function noBack(){
window.history.forward();
}
</script>
@endsection