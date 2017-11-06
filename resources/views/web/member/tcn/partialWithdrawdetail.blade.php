<link href="{{ URL::asset('css/sweetalert.css') }}"></link>
@extends('web.layout.erp')
@section('banner')
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
<img src="{{ URL::asset('new_heading.png') }}" class="img-responsive">
</div>
@endsection
@section('sidebar')
@include('web.partial.header')
@include('web.partial.aside')
@endsection
@section('body')
<div class="bg-light lter b-b wrapper-md">
	<h1 class="m-n font-thin h3">PARTIAL WITHDRAWAL</h1>
</div><br>
	<form action="{{ URL::to('/') }}/web/partialWithdraw/withdraw" method="post" data-parsley-validate >
	{{csrf_field()}}
	
		<div class="row">
			<div class="col-sm-12">
				<div class="blog-post">                   
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading ">                  
							 PARTIAL WITHDRAWAL
							</div>
							<div class="panel-body">
							<input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
							<input type="hidden" name="tcnid" value="{{$datas->id}}" id="tcnid">
							<div class="col-sm-4">
								<label>Tcn Name</label>
								<input type="text" id="tcn_name"  required  name="tcn_name" value="{{$datas->tcnType}}" class="form-control" readonly />
							</div>
							<div class="col-sm-4">
								<label>Available Units</label>
								<input type="text" id="unit" required name="unit" id="unit" value="{{$balanceunit}}"   class="form-control" readonly />
							</div>
							<div class="col-sm-4">
								<label>Available Amount</label>
								<input type="text" id="amount"  required name="amount" id="amount"  value="{{$balanceamount}}"  class="form-control" readonly/>
							</div>
							<div class="col-sm-12"><br></div>
							<div class="col-sm-4">
								<label>Withdrawal Unit</label>
								<input class="form-control" name="withdrawal_unit" data-parsley-type="integer" onkeyup="calculate()"  id="withdrawal_unit" placeholder="Withdrawal Unit" required min="1" >
							</div>
							<div class="col-sm-4">
								<label>Withdrawal Amount</label>
								<input class="form-control" id="withdrawal_amount" placeholder="Withdrawal Amount"  readonly  name="withdrawal_amount" required >
							</div>
							<div class="col-sm-4">
								<label>Balance Amount</label>
								<input type="text" class="form-control" name="balance" id="balance" readonly   placeholder="Balance" required parsley-notblank="true">
							</div>
							<input type="hidden" name="user_id" value="{{$datas->userId}}" id="user_id">
							<div class="col-sm-12"><br></div>
							
							<div class="col-sm-4"><br>
							<label></label><br>
								<input type="submit"  name="submit" id="submit"  value="withdraw"  class="btn btn-sm btn-success" >
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
			
	</form> 
            

@endsection
@section('jquery')
<script src="{{ URL::asset('js/sweetalert.min.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap-datepicker.js') }}"></script>
<link rel="stylesheet" href="{{ URL::asset('css/bootstrap-datepicker.min.css') }}" type="text/css" />
<script src="{{ URL::asset('js/i18n/datepicker.en.js') }}"></script>
<script type="text/javascript">
  $(function()
  {
  $('#applied_date').datepicker({
  orientation:'bottom auto',
  autoclose:true
  });
  });

</script>
<script type="text/javascript">
$( function() {
$('#withdrawal_unit').keyup(calculate);
$('#withdrawal_amount').keyup(cal);
});

function calculate(e)
{
	$('#withdrawal_amount').val("");
	$('#balance').val("");
	withdraw_unit = $('#withdrawal_unit').val();
	unit = $('#unit').val();
	if (parseInt(withdraw_unit) > parseInt(unit)) 
	{
		return false;
  	} 
  	else 
  	{
	    $('#withdrawal_amount').val($('#amount').val() / $('#unit').val() * ($('#withdrawal_unit').val()));
	    $('#balance').val($('#amount').val() - $('#withdrawal_amount').val());
  	}
}
</script>
@endsection