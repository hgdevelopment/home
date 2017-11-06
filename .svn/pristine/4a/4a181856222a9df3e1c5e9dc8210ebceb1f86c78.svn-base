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
  <h1 class="m-n font-normal h3">TCN DOCUMENT VERIFICATION</h1>
</div>
<div class="wrapper bg-white b-b">
      <ul class="nav nav-pills nav-sm">
      	@if(Controller::UserAccessRights('TCN Request'))
        <li><a href="{{ URL::to('/') }}/admin/tcnRequest">Request</a></li>
        @endif

      	@if(Controller::UserAccessRights('TCN Application Form'))
        <li><a href="{{ URL::to('/') }}/admin/tcnApplicationForm">Application Form</a></li>
        @endif

      	@if(Controller::UserAccessRights('TCN Document Verification'))
        <li class="active"><a href="{{ URL::to('/') }}/admin/tcnApprove/Document">Document Verification</a></li>
        @endif

      	@if(Controller::UserAccessRights('TCN Payment Verification'))
        <li><a href="{{ URL::to('/') }}/admin/tcnApprove/Payment">Payment Verification</a></li>
        @endif

      	@if(Controller::UserAccessRights('TCN Add To Physical Benefit'))
        <li><a href="{{ URL::to('/') }}/admin/tcnApprove/TCNPhysicalBenefitList">Add Physical Benefit</a></li>
        @endif

      	@if(Controller::UserAccessRights('TCN Payment Edit'))
        <li><a href="{{ URL::to('/') }}/admin/tcnApprove/TCNPaymentEdit">Payment Edit</a></li>
        @endif

      </ul>
</div>
<div class="wrapper-md" ng-controller="FormDemoCtrl">

		<div class="panel panel-default">
			<div class="panel-heading font-bold">TCN DOCUMENTS VERIFICATION</div>
			<div class="panel-body">
				<div class="col-sm-12">
					<div class="row table-responsive" >
					
				      <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" cellpadding="0" width="100%" id="table"  >
				        <thead>
				            <tr>
				            	<th>S NO</th>
				                <th>MEMBER CODE</th>
                                <th>TCN CODE</th>
				                <th>MEMBER NAME</th>
				                <th>TCN</th>
				                <th>AMOUNT</th>
				                <th>APPLIED DATE</th>
				                <th>ACTION</th>
				            </tr>
				        </thead>
				        <tbody>
				        	@if($count>0)
				        	<?php $i=1;?>
				        	@foreach($tcnrequest as $tcnrequest)
				        		<tr>
				        		<td>{{ $i++ }}</td>	
				                <td>{{ $tcnrequest->code }}</td>
                                <td>{{ $tcnrequest->tcnCode }}</td>
				                <td>{{ $tcnrequest->name }}</td>
				                <td>{{ $tcnrequest->tcn->tcnType }}</td>
				                <td>{{ $tcnrequest->amount }}</td>
				                <td>{{ date('d-m-Y',strtotime($tcnrequest->addedDate)) }}</td>
				                <td>

									<div class="btn-group dropdown">
								      <button class="btn btn-default btn-sm" data-toggle="dropdown">Action <span class="caret"></span></button>
								      <ul class="dropdown-menu dropdown-menu-right" >
								        <li>
									        <a href="{{ URL::to('/') }}/admin/tcnApplicationForm/{{'view@@@'}}{{$tcnrequest->tcnId}}">View
											</a>
										</li>

										@if(Controller::UserAccessRights('TCN Print'))
								        <li>
									        <a href="{{ URL::to('/') }}/admin/tcnviewprint/{{$tcnrequest->tcnId}}" >Print
											</a>
										</li>
										@endif

								      @if($tcnrequest->docVerified=='Pending' && $tcnrequest->status=='Pending' && Controller::UserAccessRights('TCN Document Verification')=='1' && $tcnrequest->status!='Removed')
									        <li>
										        <a href="{{ URL::to('/') }}/admin/tcnApplicationForm/{{$tcnrequest->tcnId}}">Document Verification
												</a>
											</li>
									  @endif

								      @if($tcnrequest->paymentReceived=='Pending' && $tcnrequest->docVerified!='Pending'  && $tcnrequest->status=='Pending' && Controller::UserAccessRights('TCN Payment Verification')=='1' && $tcnrequest->status!='Removed') 
								        <li>
									        <a href="{{ URL::to('/') }}/admin/tcnApplicationForm/{{$tcnrequest->tcnId}}">Payment Verification
											</a>
										</li>
									  @endif

								      @if($tcnrequest->status=='Denied' && Controller::UserAccessRights('TCN Reapproval')=='1')
								        <li>
									        <a href="{{ URL::to('/') }}/admin/tcnApplicationForm/{{$tcnrequest->tcnId}}">Reapproval
											</a>
										</li>
									  @endif	

										@if(Controller::UserAccessRights('TCN Application Edit')=='1' && $tcnrequest->status!='Removed' && $tcnrequest->status!='Transferred')
										<li>
										<a href="{{ URL::to('/') }}/admin/tcnApplicationForm/{{$tcnrequest->tcnId}}/edit">Edit
										</a>
										</li>
										@endif

										@if($tcnrequest->status=='Approved'  && $tcnrequest->physicalBenefit=='No' && Controller::UserAccessRights('TCN Add To Physical Benefit')=='1' && $tcnrequest->status!='Removed')
										<li>
										<a onclick="physicalBenefit('{{$tcnrequest->tcnId}}')">Add to Physical Benefit
										</a>
										</li>
										@endif

										@if(Controller::UserAccessRights('TCN Remove')=='1' && $tcnrequest->status!='Removed' && $tcnrequest->status!='Transferred')
										<li>
										<a onclick="removeTCN('{{$tcnrequest->tcnId}}')">Remove
										</a>
										</li>
										@endif

								      </ul>
									</div>
				                </td>
				                </tr>
				        	@endforeach
				        	@endif
				        </tbody>
				    </table>
				    
					</div>
				</div> 
			</div>
		</div> 
</div>
@endsection

@section('jquery')



<script type="text/javascript">

     		$('#table').dataTable();
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
</script>

@endsection
