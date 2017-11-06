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
<form  method="post"  action="{{URL::to('/') }}/admin/partialWithdraw/approve"  id="form" name="form" data-parsley-validate>
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
									
									<label><strong>Withdrawal Amount</strong></label><br>
									<label>{{$values->amount}}</label>
									
								</div>
								<div class="col-md-4">
									<label><strong>Name Of Bank	</strong></label><br>
									<label>{{$datas->bankName}}</label>
								</div>
								<div class="col-md-12"><br></div>
								<div class="col-md-4">
									<label><strong>Branch</strong></label><br>
									<label>{{ $datas->branchName}}</label>
								</div>
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
								FOR OFFICE USE ONLY
							</div>
							<div class="panel-body">
								<div class="col-md-4">
									<label><strong>Received Original Agreements</strong></label><br>
									<input type="hidden" name="withdraw_id" id="withdraw_id" value="{{$datas->id}}">
									<select  class="form-control" id="org_agr"  name="org_agr" required data-parsley-required-message="Please Select Received Original Agreements" >
				                        <option value="">Select</option>
				                        <option value="yes">yes</option>
				                        <option value="no">no</option>
			                        </select>
								</div>
								<div class="col-md-4">
									<label><strong>HG Receipts</strong></label><br>
									<select  class="form-control" id="hg_recp"  name="hg_recp" required data-parsley-required-message="Please Select HG Receipts">
				                        <option value="">Select</option>
				                        <option value="yes">yes</option>
				                        <option value="no">no</option>
			                        </select>
								</div>
								<div class="col-md-4">
									<label><strong>Card</strong></label><br>
									<select  class="form-control" id="card"  name="card" required data-parsley-required-message="Please Select Card" >
				                        <option value="">Select</option>
				                        <option value="yes">yes</option>
				                        <option value="no">no</option>
			                        </select>
								</div>
								<div class="col-md-12"><br></div>
									<div class="col-md-4">
										<label><strong>Form Received By</strong></label><br>
										<input type="text" name="received_by" id="received_by" class="form-control" placeholder="Received By" required data-parsley-required-message="Please Enter Form Received By">
									</div>
									<div class="col-md-4">
										<label><strong>Currency</strong></label><br>
										<select  class="form-control" id="currency"  name="currency"  required data-parsley-required-message="Please Select Currency" >
					                        <option value="">Select</option>
					                        <option value="INR">INR</option>
					                        <option value="USD">USD</option>
					                        <option value="CAD">CAD</option>
					                        <option value="CAD">CAD</option>
					                        <option value="AED">AED</option>
			                        	</select>
									</div>
									<div class="col-md-4">
										<label><strong>Payment Made By</strong></label><br>
										<input type="text" name="payment" id="payment" class="form-control" placeholder="Payment"  required data-parsley-required-message="Please Enter Payment Made By	">
									</div>
								<div class="col-md-12"><br></div>
									<div class="col-md-4">
										<label><strong>Approved/Declined By</strong></label><br>
										<input type="text" name="approved_by" id="approved_by" class="form-control" placeholder="Approved By" required data-parsley-required-message="Please Enter Approved/Declined By" >
									</div>
									<div class="col-md-4">
										<label><strong>Withdrawal applied date</strong></label><br>
										<input type="text" name="applied_date"  value="{{ date('d-m-Y',strtotime($datas->appliedDate))}}"  class="form-control" placeholder="Applied Date" required data-parsley-required-message="Please Select Withdrawal applied date" readonly>
									</div>
									<div class="col-md-4">
										<label><strong>Withdrawal paid date</strong></label><br>
										<input type="text" name="payed_date" id="payed_date"   class="form-control" placeholder="Paid Date" required data-parsley-required-message="Please Select Withdrawal paid date">
									</div>
								<div class="col-md-12"><br></div>
									<div class="col-md-4">
										<label><strong>Online</strong></label><br>
										<input type="text" name="online" id="online" class="form-control" placeholder="Online" required data-parsley-required-message="Please Enter Online">
									</div>
									<div class="col-md-4">
										<label><strong>Cheque No</strong></label><br>
										<input type="text" name="check_no" id="check_no"  class="form-control" placeholder="Cheque Number" required data-parsley-required-message="Please Enter Bank">
									</div>
									<div class="col-md-4">
										<label><strong>Bank</strong></label><br>
										<input type="text" name="bank" id="bank"   class="form-control" placeholder="Bank"  required data-parsley-required-message="Please Enter Bank">
									</div>
								<div class="col-md-12"><br></div>
									<div class="col-md-12">
										<label><strong>Remarks</strong></label><br>
										<textarea type="text" name="remarks" id="remarks" class="form-control" placeholder="Remarks" required data-parsley-required-message="Please Enter Remarks"></textarea>
									</div>
								
								<div class="col-md-12"></div>
								<div class="col-md-4"><br>
									<button name="approve" id="approve" type="submit"  value="submit" class="btn btn-sm btn-success">Approve</button>&nbsp;&nbsp;&nbsp;&nbsp;
									<button name="deny"  id="deny" type="button"  value="submit" class="btn btn-sm btn-danger">Deny</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	{{-- @endforeach --}}
</form>                    
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
<script>
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
</script>
@endsection