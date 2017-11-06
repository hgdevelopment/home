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
  <h1 class="m-n font-normal h3">TCN Applications List</h1>
</div>
<div class="wrapper bg-white b-b">
      <ul class="nav nav-pills nav-sm">
        <li><a href="{{ URL::to('/') }}/admin/tcnRequest">Request</a></li>
        <li><a href="{{ URL::to('/') }}/admin/tcnApplicationForm">Application Form</a></li>
        <li><a href="{{ URL::to('/') }}/admin/tcnApprove/Document">Document Verification</a></li>
        <li><a href="{{ URL::to('/') }}/admin/tcnApprove/Payment">Payment Verification</a></li>
        <li><a href="{{ URL::to('/') }}/admin/tcnApprove/TCNPhysicalBenefitList">Add Physical Benefit</a></li>
        <li><a href="{{ URL::to('/') }}/admin/tcnApprove/TCNPaymentEdit">Payment Edit</a></li>
      </ul>
</div>
<div class="wrapper-md" ng-controller="FormDemoCtrl">
	<div class="panel panel-default">
		<div class="panel-heading font-bold">SELECT TCN
						<a href="{{ URL::to('/') }}/admin/tcnApplicationForm" class="btn btn-info btn-sm" style="float: right;">TCN Application Form</a>
		</div>
		<div class="panel-body">
			<div class="col-sm-8" style="border-color: #cfdadd;border-radius: 2px;border:1px solid #ccc;">
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
					<div class="col-sm-2" id="getMembers"  style=" padding:0 3px">
						<label>TCN</label>
						<select class="form-control chosen-select" name="tcnType" id="tcnType" onchange="getMembers()">
						<option value="All">All</option>
						@php $i=1; @endphp
						@foreach($tcntypes as $tcntype)
						<option value="{{ $tcntype->id }}" @if($i==1){{'selected' }}@endif>{{ $tcntype->tcnType }}</option>
						@php $i=0;@endphp
						@endforeach
						</select>
					</div>
					<div class="col-sm-2" id="gettcnType"  style=" padding:0 3px">
						<label>TCN STATUS</label>
						<select class="form-control chosen-select" name="status" id="status"  onchange="getMembers()">
						<option value="All">All</option>
						<option value="Pending" selected>Pending</option>	
						<option value="Approved">Approved</option>	
						<option value="Denied">Denied</option>	
						<option value="Removed">Removed</option>	
{{-- 						<option value="Transferred">Transferred</option>	
 --}}						</select>
					</div>						
					<div class="col-sm-3"  style=" padding:0 3px">
					  <label>MEMBER CODE</label>
					  <select class="form-control col-md-6 chosen-select" name="userId" id="userId">

					  </select>

					</div>
				</div>
				<div class="col-lg-12 text-right"><button class="btn m-b-xs btn-sm btn-primary btn-addon" onclick="showTCN('btn1')">Search</button></div>
			</div>

			<div class="col-sm-4" style="border-color: #cfdadd;border-radius: 2px;border:1px solid #ccc;">
				<span style="font-size: 12px; color: blue">( Here you can see the transferred TCN also .. )</span>
				<div class="col-sm-6" style=" padding:0 3px;">
					<label>MEMBER CODE</label>

					<input type="text" name="memberCode" id="memberCode" class="form-control" placeholder="IBG0000000" onkeyup="setbutton('tcnCode')" />
				</div>

				<div class="col-sm-6" style=" padding:0 3px;">
					<label>TCN CODE</label>

					<input type="text" name="tcnCode" id="tcnCode" class="form-control" placeholder="TCN0000000" onkeyup="setbutton('memberCode')" />
				</div>

				<div class="col-lg-12 text-center"><button style=" margin-top: 6px" class="btn m-b-xs btn-sm btn-primary btn-addon" onclick="showTCN('btn2')">Search</button>
				</div>

			</div> 
		</div> 
	</div>	


	<div class="panel panel-default">
		<div class="panel-heading font-bold">TCN LIST</div>
		<div class="panel-body">
			<div class="col-sm-12">
				<div class="row">
					<div class="table-responsive">
						<div  id="showTCN">
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>  
</div>



@endsection

@section('jquery')




<script type="text/javascript">
$(function() {
    $( "#fDate").datepicker({format:'dd-mm-yyyy',autoclose: true});
    $( "#tDate").datepicker({format:'dd-mm-yyyy',autoclose: true});
});	

$(".chosen-select").chosen({width:'100%'});



function showTCN(btn)
{
if(document.getElementById('checkDate').checked==true)
var checkDate = true;
else
var checkDate = false;

if(btn=='btn2')
{
var memberCode=$('#memberCode').val().replace(/\s/g, '');
var tcnCode=$('#tcnCode').val().replace(/\s/g, '');
if(memberCode=='' && tcnCode=="")
return;
}
else
{
var memberCode='0';	
var tcnCode='0';	
}
var tcnType = $('#tcnType').val();	
var status = $('#status').val();	
var fDate = $('#fDate').val();	
var tDate = $('#tDate').val();
var userId = $('#userId').val();	

$.ajax({
     type: "get",
     url: "{{URL::to('/') }}/admin/tcnApplicationForm/create",
     data:{opcode:21,tcnType:tcnType,status:status,checkDate:checkDate,fDate:fDate,tDate:tDate,userId:userId,btn:btn,memberCode:memberCode,tcnCode:tcnCode},
     success: function (data) {
     		$('#showTCN').html(data);
     		$('#table').dataTable();

     }
 });
}



function getMembers()
{
var tcnType = $('#tcnType').val();	
var status = $('#status').val();	

$.ajax({
     type: "get",
     url: "{{URL::to('/') }}/admin/tcnApplicationForm/create",
     data:{opcode:22,tcnType:tcnType,status:status},
     success: function (data) {
     	$('#userId').html('').trigger("chosen:updated");  

		for (var i=0;i<data.length;i++) {
			if(i==0)
			$('#userId').append('<option value="All">All</option>').trigger("chosen:updated");   

			$('#userId').append('<option value="'+data[i].id+'">'+data[i].username+'</option>').trigger("chosen:updated");    	
		}

     }
 });
}


function physicalBenefit(tcnId)
{
swal({
  title: "Confirm!",
  text: "Are You Sure, You want  to add this TCN to physical benefit list?",
  type: "info",
  showCancelButton: true,
  closeOnConfirm: false,
  confirmButtonColor: "#e76cd4",
  animation: "slide-from-top",
  inputPlaceholder: "Please Enter Remarks"
},
  function (isConfirm) 
  {
    if (isConfirm) 
    {	

		$.ajax({
		     type: "get",
		     url: "{{URL::to('/') }}/admin/tcnApplicationForm/create",
		      data: {opcode:31,tcnId:tcnId},
		     success: function (data) {
		  		swal({title:'Done',text:'This TCN is succesfully added to physical benefit list!',type:'success',timer:'3800'},
		  		function () {
		          window.location.reload();
		       	});
		     }
		 	 });
    }
    else
    {
      return ;
    }   
  }); 
}

function removeTCN(tcnId)
{
swal({
  title: "Remove!",
  text: "Are You Sure, You want  to remove this TCN",
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
    return false;
  }

  $.ajax({
    type: "get",
     url: "{{URL::to('/') }}/admin/tcnApplicationForm/create",
    data: {opcode:32,remarks:inputValue,tcnId:tcnId},
    success: function (data)
    {
  		swal({title:'Done',text:'The Request is succesfully Removed!',type:'success',timer:'3800'},
  		function () {
          window.location.reload();
       	});
	},
  		});   
});
}

function setbutton(other)
{
$('#'+other).val('');
}

// $('.table-responsive').on('show.bs.dropdown', function () {
//      $('.table-responsive').css( "overflow", "auto" );
//      $('.btn-group').css({'position':'absolute'});

// });
// $('.table-responsive').on('hide.bs.dropdown', function () {
//      $('.btn-group').css({'position':'absolute'});

// });
getMembers();
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
