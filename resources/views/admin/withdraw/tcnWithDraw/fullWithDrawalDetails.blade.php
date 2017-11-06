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
  <h1 class="m-n font-normal h3">{{ $Title }}</h1>
</div>

<div class="wrapper bg-white b-b">
      <ul class="nav nav-pills nav-sm">
        <li><a href="{{ URL::to('/') }}/admin/tcnFullWithDrawal">Request</a></li>
        <li><a href="{{ URL::to('/') }}/admin/tcnFullWithDrawal/List">List</a></li>
        <li @if($id=='Applied'){{'class=active' }}@endif><a href="{{ URL::to('/') }}/admin/tcnFullWithDrawal/Applied">Applied</a></li>
        <li @if($id=='Paid'){{'class=active' }}@endif><a href="{{ URL::to('/') }}/admin/tcnFullWithDrawal/Paid">Approved</a></li>
        <li @if($id=='Cancelled'){{'class=active' }}@endif><a href="{{ URL::to('/') }}/admin/tcnFullWithDrawal/Cancelled">Cancelled</a></li>
      </ul>
</div>

<div class="wrapper-md" ng-controller="FormDemoCtrl">
		@if($id=='Paid')
		<div class="panel panel-default">
			<div class="panel-heading font-bold">Select WithDrawal Requests</div>
			<div class="panel-body">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-md-2">YEAR
						@php
						$a =DB::table('logins')->select(DB::raw('YEAR(updated_at) as year'))->groupBy('year')->get();   
						$b =DB::table('logins')->select(DB::raw('YEAR(created_at) as year'))->groupBy('year')->get();   
						$year = $a->merge($b);
						$year=$year->unique();
						@endphp

						<select id="year" name="year" class="form-control chosen-select">
							<option value=" ">--select--</option>
							@foreach($year as $year)
							<option @if(date('Y')==$year->year){{ 'selected' }}@endif value="{{ $year->year }}">{{ $year->year }}</option>
							@endforeach

						</select>
						</div>
						<div class="col-md-2">MONTH
							<select name="month" id="month" class="form-control chosen-select">
								<option value="1">January</option>
								<option value="2">February</option>
								<option value="3">March</option>
								<option value="4">April</option>
								<option value="5">May</option>
								<option value="6">June</option>
								<option value="7">July</option>
								<option value="8">August</option>
								<option value="9">September</option>
								<option value="10">October</option>
								<option value="11">November</option>
								<option value="12">December</option>
							</select>
							</div>
						<div class="col-md-2">TCN
						@php
							$tcn=DB::table('tcnmasters')->get();
						@endphp
							<select id="tcnType" name="tcnType" class="form-control chosen-select">
								<option value="All">All</option>
								@foreach($tcn as $tcn)
								<option value="{{ $tcn->id }}">{{ $tcn->tcnType }}</option>
								@endforeach
							</select>
						</div>

						<div class="col-md-3">TYPE
							<select id="type" name="type" class="form-control chosen-select">
								<option value="All">All</option>
								<option value="Normal Withdrawal">Normal Withdrawal</option>	
								<option value="Emergency Withdrawal">Emergency Withdrawal</option>	
							</select>
						</div>

						<div class="col-md-1"><br><button class="btn btn-primary" onclick="withDrawalPaidDetails('list')">Search</button></div>
						<div class="col-md-2"><br><a class="btn btn-danger" onclick="withDrawalPaidDetails('excel')">Export Excel</a></div>
					</div>
				</div>
			</div>
		</div>
		@endif	









		<div class="panel panel-default">
			<div class="panel-heading font-bold">{{ $Title }} </div>
			<div class="panel-body">
				<div class="col-sm-12">
					<div class="row" id="result">
					@if($id!='Paid')
					<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" cellpadding="0" width="100%" id="table"  >
				        <thead>
				          <tr>
							<th>S&nbsp;NO</th>
							<th>MEMBER CODE</th>
							<th>NAME</th>
							<th>AMOUNT</th>
							<th>APPLIED DATE</th>
							<th>TCN </th>
							<th>TYPE </th>
							<th>STATUS</th>
							<th>ACTION</th>
						  </tr>
				        </thead>
				        
				        <tbody>
							<?php $i=1;?>
							@foreach($details as $detail)
							<tr data-expanded="true">
							<td align="center">{{ $i }}</td>
							<td>{{ $detail->code }}</td>
							<td>{{ $detail->name }}</td>
							<td>{{ $detail->amount }}</td>
							<td>{{ date('d-m-Y',strtotime($detail->created_at))}}</td>
							<td>{{$detail->tcn->tcnType}}</td>
							<td>{{$detail->type}}</td>

							<td align="center" style="padding: 2px !important">
							<div style="color:black;background:@if($detail->status=='Applied'){{'yellow'}}@elseif($detail->status=='Paid'){{'#63ce63'}}@else {{'#f67979'}}@endif">
							{{ $detail->status }}

							</div>
							{{ date('d-m-Y h:i:A',strtotime($detail->approvalDate))}}
							</td>


							<td style="cursor:pointer">
								<div class="btn-group dropdown">
								  <button class="btn btn-default btn-sm" data-toggle="dropdown">Action <span class="caret"></span></button>
								  <ul class="dropdown-menu  dropdown-menu-right">
								    <li>
										<a href="{{ URL::to('/') }}/admin/tcnFullWithDrawal/{{'view@@@'}}{{$detail->withDrawId}}" >View</a>
								    </li>
								  	@if($detail->status=='Applied' &&  Controller::UserAccessRights('Full WithDrawal Approve')=='1' )
								    <li>
										<a href="{{ URL::to('/') }}/admin/tcnFullWithDrawal/{{$detail->withDrawId}}/edit">Paid</a>
								    </li>
								    @endif
								    @if($detail->status=='Applied' &&  Controller::UserAccessRights('Full WithDrawal Cancel')=='1' )
								    <li>
										<a onclick="CancelRequest('{{$detail->tcnId}}','{{$detail->withDrawId}}')">Cancel</a>
								    </li>
								    @endif
								  </ul>
								</div>
							</td>
							</tr>
							<?php $i++;?>
							@endforeach
				        </tbody>
				    </table>
				    @endif
					</div>
				</div> 
			</div>
		</div> 
</div>
<form  id="form1" method="post" action="{{ url('/admin/tcnFullWithDrawalExcel') }}">
{{ csrf_field() }}
<input type="hidden" name="year1" id="year1" value="">
<input type="hidden" name="month1" id="month1" value="">
<input type="hidden" name="tcnType1" id="tcnType1" value="">
<input type="hidden" name="type1" id="type1" value="">
<input type="hidden" name="excel" id="excel" value="List">
</form>

@endsection

@section('jquery')



<script type="text/javascript">
$('.chosen-select').chosen();
$('#table').dataTable();


function CancelRequest(tcnId,withDrawId)
{
swal({
  title: "Cancel!",
  text: "Are You Sure, You Want to Cancel This Request",
  type: "input",
  showCancelButton: true,
  closeOnConfirm: false,
confirmButtonColor: "#e76cd4",
  animation: "slide-from-top",
  inputPlaceholder: "Please Enter Remarks"
},
function(inputValue){
  if (inputValue === false) return false;
  
  if (inputValue === "") {
    swal.showInputError("You need to write remarks!");
    return false
  }

  $.ajax({
    type: "get",
     url: "{{URL::to('/') }}/admin/tcnFullWithDrawal/create",
    data: {process:'cancelRequest',remarks:inputValue,tcnId:tcnId,withDrawId:withDrawId},
    success: function (data) {
				      		swal("Done!", "The Request is succesfully Cancelled!", "success");
				      		window.location.reload();
				  			},
  		});   
});
}



function withDrawalPaidDetails(filter)
{

var year=$('#year').val();
var month=$('#month').val();
var tcnType=$('#tcnType').val();
var type=$('#type').val();

if(filter=='list')
{
  $.ajax({
    type: "get",
     url: "{{URL::to('/') }}/admin/tcnFullWithDrawal/create",
    data: {process:'withDrawalPaidDetails',year:year,month:month,tcnType:tcnType,type:type},
    success: function (data)
     {	
     	$('#result').html(data);
	 }
	 
  	});  
  	 $('#table').dataTable();
}
if(filter=='excel')
{
$('#year1').val($('#year').val());
$('#month1').val($('#month').val());
$('#tcnType1').val($('#tcnType').val());
$('#type1').val($('#type').val());
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
