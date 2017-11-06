@extends('admin.layout.erp1')
@section('title','TCN Application')
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
{{-- <style type="text/css">
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
</style> --}}
<div class="bg-light lter b-b wrapper-md">  
  <div style="float: right;"><a href="'/'"><i class="fa fa-home fa-4x" aria-hidden="true"></i></a></div>
  <h1 class="m-n font-thin h3">TCN APPLICATION FORM</h1>

</div>
<br/><br/>
  <div class="col-sm-12">
      <div class="panel panel-default">
        <div class="panel-heading font-bold">TCN APPLICATION FORM</div>
        <div class="panel-body">
  <iframe src="{{URL::to('/')}}/admin/tcnviewprint/{{ $id }}" width="100%" height="800">
    
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
@if (Session::has('sweet_alert.alert'))
    <script>
        swal({
            text: "{!! Session::get('sweet_alert.text') !!}",
            title: "{!! Session::get('sweet_alert.title') !!}",
            timer: "{!! Session::get('sweet_alert.timer') !!}",
            type: "{!! Session::get('sweet_alert.type') !!}",
            // showConfirmButton: "!! Session::get('sweet_alert.showConfirmButton') !!}",
            // confirmButtonText: "!! Session::get('sweet_alert.confirmButtonText') !!}",
            // confirmButtonColor: "#AEDEF4",
            // showCancelButton: false,
            // closeOnConfirm: true
@php 
            Session::Forget('sweet_alert'); @endphp
            // more options
        });
    </script>
@endif
@endsection