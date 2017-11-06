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
@section('body')
<div class="bg-light lter b-b wrapper-md">
	<h1 class="m-n font-thin h3">Withdrawal Request Details</h1>
</div>

{{-- 	@foreach ($data as $datas)
 --}}	<div class="wrapper-md">
		<div class="row">
			<div class="col-sm-12">
				<div class="blog-post">                   
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading ">                  
								SCHEME DETAILS
							</div>
							<div class="panel-body">
								{{csrf_field()}}
								<div class="col-md-3">
									<label><strong>MEMBER CODE</strong></label><br>
									<label>{{$datas->code }}</label>
								</div>
								<div class="col-md-3">
									<label><strong>NAME</strong></label><br>
									<label>{{ $datas->name}}</label>
								</div>
								<div class="col-md-3">
									<label><strong>ADDRESS</strong></label><br>
									<label>{{ $datas->address}}</label>
								</div>
								<div class="col-md-3">
									<label><strong>PHONE</strong></label><br>
									<label>{{$datas->mobileNo }}</label>
								</div>
								<div class="col-md-12"> <br> </div>
								<div class="col-md-3">
									<label><strong>TCN CODE</strong></label><br>
									<label>{{ $datas->tcnCode}}</label>
								</div>
								<div class="col-md-3">
									<label><strong>SCHEME</strong></label><br>
									<label>{{ $datas->tcnType}}</label>
								</div>
								<div class="col-md-3">
									<label><strong>APPROVED DATE</strong></label><br>
									<label>{{ date('d-m-Y',strtotime($datas->approvalDate))}}</label>
								</div>
								<div class="col-md-3">
									<label><strong>INVESTMENT AMOUNT</strong></label><br>
									<label>{{ $datas->amount}}</label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="wrapper-md">
		<div class="row">
			<div class="col-sm-12">
				<div class="blog-post">                   
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading ">                  
								ACCOUNT DETAILS FOR PAYMENT
							</div>
							<div class="panel-body">
								<div class="col-md-4">
									<label><strong>A/C Holder Name	</strong></label><br>
									<label>{{$datas->accountHolderName}}</label>
								</div>
								<div class="col-md-4">
									<label><strong>Name Of Bank	</strong></label><br>
									<label>{{$datas->bankName}}</label>
								</div>
								
								<div class="col-md-4">
									<label><strong>Branch</strong></label><br>
									<label>{{ $datas->branchName}}</label>
								</div>
								<div class="col-md-12"><br></div>
								<div class="col-md-4">
									<label><strong>AC/No</strong></label><br>
									<label>{{$datas->accountNumber}}</label>
								</div>
								<div class="col-md-4">
									<label><strong>IFSC Code</strong></label><br>
									<label>{{ $datas->ifsc}}</label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
		<div class="wrapper-md">
		<div class="row">
			<div class="col-sm-12">
				<div class="blog-post">                   
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading ">                  
								WITHDRAWAL DETAILS
							</div>
							<div class="panel-body">
								<div class="col-md-4">
									<label><strong>Unit	</strong></label><br>
									<label>{{$values->unit}}</label>
								</div>
								<div class="col-md-4">
									
									<label><strong> Amount</strong></label><br>
									<label>{{$values->amount}}</label>
									
								</div>
								<div class="col-md-4">
									<label><strong>Card</strong></label><br>
									<label>{{$values->card}}</label>
								</div>
								<div class="col-md-12"><br></div>
								<div class="col-md-4">
									<label><strong>Applied Date</strong></label><br>
									<label>{{date('d-m-Y',strtotime($values->appliedDate))}}</label>
								</div>
								<div class="col-md-4">
									<label><strong>Received Original Agreements</strong></label><br>
									<label>{{$values->receivedOriginalAgreements}}</label>
								</div>
								<div class="col-md-4">
									<label><strong>Hg Receipts</strong></label><br>
									<label>{{$values->hgReceipts}}</label>
								</div>
								<div class="col-md-12"><br></div>
								<div class="col-md-4">
									<label><strong>Form Received By</strong></label><br>
									<label>{{$values->formReceivedBy}}</label>
								</div>
								<div class="col-md-4">
									<label><strong>Payment Made By</strong></label><br>
									<label>{{$values->paymentMadeBy}}</label>
								</div>
								<div class="col-md-4">
									<label><strong>Approval By</strong></label><br>
									<label>{{$values->approvalBy}}</label>
								</div>
								<div class="col-md-12"><br></div>
								<div class="col-md-4">
									<label><strong>Online</strong></label><br>
									<label>{{$values->online}}</label>
								</div>
								<div class="col-md-4">
									<label><strong>Cheque Number</strong></label><br>
									<label>{{$values->chequeNo}}</label>
								</div>
								<div class="col-md-4">
									<label><strong>Bank</strong></label><br>
									<label>{{$values->bank}}</label>
								</div>
								
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{-- @endforeach --}}
                   
@endsection
@section('jquery')
<script src="{{ URL::asset('js/bootstrap-datepicker.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/bootstrap-datepicker.min.css') }}" type="text/css" />
<script src="{{ URL::asset('js/i18n/datepicker.en.js') }}"></script>
<script>
  $(function()
  {
  $('#payed_date').datepicker({
  orientation:'bottom auto',
  autoclose:true
  });
  });
</script>
{{-- <script>
$(function(){
	$("#deny").click(function()
	{
	
		id = $("#withdraw_id").val();
			$.ajax({
				type: "POST",
				url: "{{ URL::to('/') }}/admin/partialWithdraw/deny",
				data: {"id": id, "_token": "{{ csrf_token() }}"},
				// dataType:'json',
				success:function(data)
				{
					if(data.result){
                      swal("Good job!", data.message, "success")
                      window.location.href="{{ URL::to('/') }}/admin/partialWithdraw";

					}else{
                      swal("Warning!", data.message, "danger")

					}
				}
			});

	});
	})
</script> --}}
@endsection