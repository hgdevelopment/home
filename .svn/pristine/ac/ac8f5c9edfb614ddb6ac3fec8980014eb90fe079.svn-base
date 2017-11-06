
@extends('admin.layout.erp1')

@section('banner')
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
            <img src="{{ URL::to('/') }}/new_heading.png" class="img-responsive">
         </div>
@endsection

@section('sidebar')
@include('admin.partial.header')
 @include('admin.partial.aside')
@endsection

@php 
use \App\Http\Controllers\Controller;
@endphp

@section('body')

<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-normal h3">Transfer TCN </h1>
</div>

<div class="wrapper-md" ng-controller="FormDemoCtrl">

	<div class="panel panel-default">
		<div class="panel-heading font-bold">SELECT TCN FOR TRANSFER</div>
		<div class="panel-body">
			<div class="col-sm-12">
				<div class="row">
					<div class="col-sm-12">
						<div class="col-sm-2 font-bold">MEMBER CODE</div>
						<div class="col-sm-3 "><input class="form-control" type="text" name="tcnCode" id="tcnCode" ></div>
						<div class="col-sm-2"><button class="btn btn-info" onclick="getTcnList()">Search</div>
					</div>
				</div>
			</div>
		</div> 
	</div> 

	<div class="panel panel-default">
		<div class="panel-heading font-bold">TCN LIST</div>
		<div class="panel-body">
			<div class="col-sm-12">
				<div class="row table-responsive" id="tcnList" style="overflow-x: hidden;">
				
				</div>
			</div>
		</div>
	</div>  

</div>



@endsection

@section('jquery')
<script type="text/javascript">

function getTcnList()
{
var tcnCode=$('#tcnCode').val();
	$.ajax({
	type: "get",
	url: "{{URL::to('/') }}/admin/tcnTransfer/List@@@"+tcnCode,
	data:{tcnCode:tcnCode},
	success: function (data) {
		if(!isNaN(data))
		{
			location.reload(); 
		}
		else
		{
		$('#tcnList').html(data);
		 $('#table').dataTable();
		$('#table.dataTable thead th, table.dataTable thead td').css('padding','10px 1px');
		}
	}
	});
}	
</script>
@if (Session::has('sweet_alert.alert'))
    <script>
        swal({
            text: "{!! Session::get('sweet_alert.text') !!}",
            title: "{!! Session::get('sweet_alert.title') !!}",
            timer: {!! Session::get('sweet_alert.timer') !!},
            type: "{!! Session::get('sweet_alert.type') !!}",
        });
    </script>
@endif

@php 
Session::Forget('sweet_alert'); 
@endphp
@endsection
