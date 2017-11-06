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
  <h1 class="m-n font-normal h3">ADD TCN PHYSICAL BENEFIT LIST</h1>
</div>

<div class="wrapper-md" ng-controller="FormDemoCtrl">

		<div class="panel panel-default">
			<div class="panel-heading font-bold">TCN PHYSICAL BENEFIT LIST</div>
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

				                <a  href="{{ URL::to('/') }}/admin/tcnApplicationForm/{{'view@@@'}}{{encrypt($tcnrequest->tcnId)}}"  class="active"><i style="color: #018001;" class="fa fa-search" aria-hidden="true"></i></a>

								@if($tcnrequest->status=='Approved'  && $tcnrequest->physicalBenefit=='No' && Controller::UserAccessRights('TCN Add To Physical Benefit')=='1' && $detail->status!='Removed')
								<a  onclick="physicalBenefit('{{$tcnrequest->tcnId}}')"  class="active"><i style="color: #018001;" class="glyphicon glyphicon-ok" aria-hidden="true"></i></a>
								@endif

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
</script>

@endsection
