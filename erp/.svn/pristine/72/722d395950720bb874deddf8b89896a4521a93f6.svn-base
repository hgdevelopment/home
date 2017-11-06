
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
@php use \App\Http\Controllers\Controller; @endphp
@section('body')
<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3"> Reset @if($resetType=='MEM') {{'Member'}}@else{{'DSA'}}@endif Password</h1>
</div>

<div class="wrapper-md" ng-controller="FormDemoCtrl">
	<form role="form" method="post" action="{{URL::to('/') }}/admin/resetPassword" data-parsley-validate>
		{{ csrf_field() }}
		<div class="panel panel-danger">
			<div class="panel-heading font-bold">RESET @if($resetType=='MEM') {{'MEMBER'}}@else{{'DSA'}}@endif PASSWORD </div>
			<div class="panel-body">
				@if (session()->has('message'))
				<div class="alert alert-success fade in alert-dismissable">
				<a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
				<strong>Info!</strong> {{session()->get('message')}}
				</div>
				@endif

				<div class="form-group col-sm-4">
					<label>@if($resetType=='MEM') {{'Member'}}@else{{'DSA'}}@endif Code</label>
					<input type="text" name="userCode" id="userCode" class="form-control" required data-parsley-required-message="Select @if($resetType=='MEM') {{'Member'}}@else{{'DSA'}}@endif ">
				</div>
				<div class="form-group col-sm-2">
				<label>&nbsp;</label><br>
					<input type="submit" value=" Reset " class="btn btn-sm btn-danger font-bold">
				</div>
{{-- 				@php 
				$user=Controller::UserDetails('423') ;
				@endphp
				{{ $user->name }}
 --}}			</div>
		</div>  <input type="hidden" name="resetType" id="resetType" value="@if($resetType=='MEM') {{'MEMBER'}}@else{{'DSA'}}@endif">    
	</form>
</div>
@endsection

@section('jquery')
<script type="text/javascript">
	$(".chosen-select").chosen();

// $("form").submit(function() {

//       swal({
//         title: 'Reset !!',
//         type: info,
//         showCancelButton: true,
//         confirmButtonColor: 'green',
//         confirmButtonText: Ok,
//         cancelButtonClass: "btn-info",
//         closeOnConfirm: true
//       }, 
//       function (isConfirm) 
//       {
//         if (isConfirm) 
//         {
//         }
//         else
//         {
//           return ;
//         }   
//       }); 

// });


</script>
@endsection
