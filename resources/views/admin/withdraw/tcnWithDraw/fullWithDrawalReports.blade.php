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


@section('body')

<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-normal h3">TCN WithDrawal Reports</h1>
</div>



{{-- <div class="wrapper bg-white b-b">
      <ul class="nav nav-pills nav-sm">
        <li><a href="{{ URL::to('/') }}/admin/tcnFullWithDrawal">Request</a></li>
        <li class="active"><a href="{{ URL::to('/') }}/admin/tcnFullWithDrawal/List">List</a></li>
        <li><a href="{{ URL::to('/') }}/admin/tcnFullWithDrawal/Applied">Applied</a></li>
        <li><a href="{{ URL::to('/') }}/admin/tcnFullWithDrawal/Paid">Approved</a></li>
        <li><a href="{{ URL::to('/') }}/admin/tcnFullWithDrawal/Cancelled">Cancelled</a></li>
      </ul>
</div> --}}

<div class="wrapper-md" ng-controller="FormDemoCtrl">

	<div class="panel panel-default">
		<div class="panel-heading font-bold">SELECT WITHDRAWAL REQUEST</div>
		<div class="panel-body">
			<div class="col-sm-9" style="border-color: #cfdadd;border-radius: 2px;border:1px solid #ccc;">
				<div class="col-lg-12">&nbsp;</div>
				<div class="col-sm-12">
					<div class="col-sm-1"  style=" padding:0 3px"><label>DATE</label>
	                  	<div class=" checkbox text-black">
	                  	<label class="i-checks">
	                    <input type="checkbox" name="checkDate" id="checkDate" checked="checked"  /><i class="font-bold"></i>
	                  	</label>
	                  	</div>
					</div>
					<div class="col-sm-2 "  style=" padding:0 3px">
						<label>FROM</label>
						<input class="form-control"  data-date-end-date="0d" type="text" id="fDate" name="fDate" value="{{date('d-m-Y', strtotime("-30 days"))}}" readonly style="padding: 5px 7px !important">
					</div>
					<div class="col-sm-2" style=" padding:0 3PX">	
						<label>TO</label>
						<input class="form-control" data-date-end-date="0d" type="text" id="tDate" name="tDate" value="{{date('d-m-Y')}}" readonly style="padding: 5px 7px !important">
					</div>
					<div class="col-sm-2"  style=" padding:0 3px">
						<label>TCN </label>
						<select class="form-control chosen-select" name="tcnType" id="tcnType"{{--  onchange="getMembers()" --}}>
						<option value="All">All</option>
						@foreach($tcntypes as $tcntype)
						<option value="{{ $tcntype->id }}" >{{ $tcntype->tcnType }}</option>
						@endforeach
						</select>
					</div>
					<div class="col-sm-2"  style=" padding:0 3px">
						<label>STATUS</label>
						<select class="form-control chosen-select" name="status" id="status"  {{-- onchange="getMembers()" --}}>
						<option value="All">All</option>
						<option value="Applied">Applied</option>	
						<option value="Paid">Paid</option>	
						<option value="Cancel">Cancel</option>	
						</select>
					</div>						
					<div class="col-sm-3"  style=" padding:0 3px">
					  <label>WITHDRAW TYPE</label>
					  <select class="form-control col-md-6 chosen-select" name="withDrawType" id="withDrawType">
						<option value="All">All</option>
						<option value="Normal Withdrawal">Normal Withdrawal</option>	
						<option value="Emergency Withdrawal">Emergency Withdrawal</option>	
						<option value="Partial Withdrawal">Partial Withdrawal</option>	
					  </select>

					</div>
				</div>
				<div class="col-lg-12 text-right"><br>&nbsp;{{-- <button class="btn m-b-xs btn-sm btn-primary btn-addon" onclick="showTCN('btn1')">Search</button> --}}</div>
			</div>

			<div class="col-sm-3" style="border-color: #cfdadd;border-radius: 2px;border:1px solid #ccc;">
				<div class="col-sm-12" style=" padding:0 3px;"><br>
					<label>USER TYPE</label>
					<select id="userType" name="userType" class="form-control chosen-select">
						<option value="All">All</option>
						<option value="OI">OI</option>
						<option value="ME">ME</option>
						<option value="DSA">DSA</option>
						{{-- <option value="DSA">DSA</option> --}}
					</select>
					{{-- <input type="text" name="memberCode" id="memberCode" class="form-control" /> --}}
				</div>
				<div class="col-lg-12 text-left">
				<button style=" margin-top: 6px" class="btn m-b-xs btn-sm btn-primary btn-addon" onclick="withDrawalDetails('list')">Search</button>
				<button style=" margin-top: 6px" class="btn m-b-xs btn-sm btn-primary btn-addon" onclick="withDrawalDetails('excel')">Export Excel</button>
				</div>
			</div> 
		</div> 
	</div> 

	<div class="panel panel-default">
		<div class="panel-heading font-bold">TCN WITHDRAW LIST</div>
		<div class="panel-body">
			<div class="col-sm-12">
				<div class="row">
					<div class="table-responsive" id="showTCN">

					</div>
				</div>
			</div>
		</div>
	</div>  
	<form  id="form1" method="post" action="{{ url('/admin/tcnFullWithDrawalExcel') }}">
	{{ csrf_field() }}
	<input type="hidden" name="checkDate1" id="checkDate1" value="">
	<input type="hidden" name="status1" id="status1" value="">
	<input type="hidden" name="tcnType1" id="tcnType1" value="">
	<input type="hidden" name="fDate1" id="fDate1" value="">
	<input type="hidden" name="tDate1" id="tDate1" value="">
	<input type="hidden" name="withDrawType1" id="withDrawType1" value="">
	<input type="hidden" name="userType1" id="userType1" value="">
	<input type="hidden" name="excel" id="excel" value="Report">
	 </form>
</div>



@endsection

@section('jquery')
<script type="text/javascript">
$(function() {
    $( "#fDate").datepicker({format:'dd-mm-yyyy'});
    $( "#tDate").datepicker({format:'dd-mm-yyyy'});
});	

$(".chosen-select").chosen({width:'100%'});



function withDrawalDetails(filter)
{


	if(document.getElementById('checkDate').checked==true)
	var checkDate = true;
	else
	var checkDate = false;


	var tcnType = $('#tcnType').val();	
	var status = $('#status').val();	
	var fDate = $('#fDate').val();	
	var tDate = $('#tDate').val();
	var withDrawType = $('#withDrawType').val();	
	var userType = $('#userType').val();	
	//alert(userId);
if(filter=='list')
{	
	$.ajax({
	     type: "get",
	     url: "{{URL::to('/') }}/admin/tcnFullWithDrawal/create",
	     data:{process:'withDrawTcnReports',tcnType:tcnType,status:status,checkDate:checkDate,fDate:fDate,tDate:tDate,withDrawType:withDrawType,userType:userType},
	     success: function (data) {
	     		$('#showTCN').html(data);
	     		$('.table').dataTable();
	     }
	 });
}
if(filter=='excel')
{
$('#checkDate1').val(checkDate);
$('#status1').val(status);
$('#fDate1').val(fDate);
$('#tDate1').val(tDate);
$('#withDrawType1').val(withDrawType);
$('#userType1').val(userType);
$('#tcnType1').val(tcnType);
$('#form1').submit();
}

}
</script>
@if (Session::has('sweet_alert.alert'))
    <script>
        swal({
            text: "{!! Session::get('sweet_alert.text') !!}",
            title: "{!! Session::get('sweet_alert.title') !!}",
            timer: {!! Session::get('sweet_alert.timer') !!},
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
