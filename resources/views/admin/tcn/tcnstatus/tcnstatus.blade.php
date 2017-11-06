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
	<h1 class="m-n font-normal h3">TCN Status</h1>
</div>
<div class="wrapper-md" id="wrapper-md" ng-controller="FormDemoCtrl">
	<div class="panel panel-default">
		<div class="panel-heading font-bold">Check the TCN status here.</div>
		<form action="{{URL::to('/')}}/admin/tcnstatus" method="POST"  id="form" data-parsley-validate role="form">
			{{ csrf_field() }}
			<div class="panel-body">
				<div class="col-sm-3">
					<label>Month*</label>
					<select name="month" id="month" class="form-control chosen-select" required>
						<option value=" ">--select--</option>
						<option @if($request->month=='01'){{ 'selected' }} @endif value="01">Jan</option>
						<option @if($request->month=='02'){{ 'selected' }} @endif  value="02">Feb</option>
						<option @if($request->month=='03'){{ 'selected' }} @endif  value="03">March</option>
						<option @if($request->month=='04'){{ 'selected' }} @endif  value="04">April</option>
						<option @if($request->month=='05'){{ 'selected' }} @endif  value="05">May</option>
						<option @if($request->month=='06'){{ 'selected' }} @endif  value="06">June</option>
						<option @if($request->month=='07'){{ 'selected' }} @endif  value="07">July</option>
						<option @if($request->month=='08'){{ 'selected' }} @endif  value="08">Aug</option>
						<option @if($request->month=='09'){{ 'selected' }} @endif  value="09">Sept</option>
						<option @if($request->month=='10'){{ 'selected' }} @endif  value="10">Oct</option>
						<option @if($request->month=='11'){{ 'selected' }} @endif  value="11">Nov</option>
						<option @if($request->month=='12'){{ 'selected' }} @endif  value="12">Dec</option>
					</select>
				</div> 
				<div class="form-group col-sm-3">
					<label>Year*</label>
					<select name="year" id="year" class="form-control  chosen-select"  required>
						<option value="">--select--</option>
						@php
						$a =DB::table('logins')->select(DB::raw('YEAR(updated_at) as year'))->groupBy('year')->get();   
						$b =DB::table('logins')->select(DB::raw('YEAR(created_at) as year'))->groupBy('year')->get();   
						$year = $a->merge($b);
						$Year=$year->unique();
						@endphp

						@foreach($Year as $Year)
						<option @if($request->year==$Year->year){{ 'selected' }} @endif value="{{$Year->year}}">{{$Year->year}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-sm-3">
					<label>TCN*</label>
					<select name="tcn" id="tcn" class="form-control  chosen-select"  required>
						<option value=" ">--select--</option>
						@foreach($tcnType as $tcnType)
						<option @if($request->tcn==$tcnType->id){{ 'selected' }} @endif value="{{$tcnType->id}}">{{$tcnType->tcnType}}</option>
						@endforeach
					</select>
				</div>
				<div class="col-sm-3 col-sm-offset-5" >
					<button name="check" type="submit" value="show" class="   btn btn-success">Check</button>
				</div>
			</div>
		</form>
	</div>
	@if(isset($_REQUEST['check']))
	<div class="panel panel-default">
		<div class="table-responsive" style="overflow-x: initial;">
			<div class="panel-heading"><center>TCN Application status <strong>{{date("F", mktime(0, 0, 0,($_REQUEST['month'])))}} {{($_REQUEST['year'])		}}</strong></center></div>
						<table  class="table table-striped b-t" style="overflow-x: initial;"
							ui-jq="footable" ui-options='{
							"paging": {
							"enabled": true
							},
							"filtering": {
							"enabled": true
							},
							"sorting": {
							"enabled": true
							}}'>
							<thead>
								<tr>
									<th>Check Points</th>                    
									<th>INR</th>
									<th>AED</th>
									<th>SAR</th>
									<th>USD</th>
									<th>CAD</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									@php
										$inrCount=0;
										$usdCount=0;
										$aedCount=0;
										$sarCount=0;
										$cadCount=0; 
									@endphp
									@foreach($tcnrequest as $app)
										@if($app->currencyType=='INR')
											@php 
												$inrCount++;
											 @endphp
										@endif
										@if($app->currencyType=='AED')
											@php 
												$aedCount++; 
											@endphp
										@endif
										@if($app->currencyType=='SAR')
											@php 
												$sarCount++; 
											@endphp
										@endif
										@if($app->currencyType=='USD')
											@php
										 		$usdCount++; 
										 	@endphp
										@endif
										@if($app->currencyType=='CAD')
											@php 
												$cadCount++;
											@endphp
										@endif
									@endforeach
									<tr data-expanded="true">		
										<td>
											{{'Total Application Recieved'}}
										</td>
										<td>
											{{ $inrCount}}
										</td>
										<td>
											{{ $aedCount}}
										</td>
										<td>
											{{ $sarCount}}
										</td>
										<td>
											{{ $usdCount}}
										</td>
										<td>
											{{ $cadCount}}
										</td>
									</tr>

									@php 
										$approveinr=0;
										$approveusd=0;
										$approveaed=0;
										$approvesar=0;
										$approvecad=0;
									@endphp
									@foreach($tcnapprove as $approve)
										@if($approve->currencyType=='INR')
											@php 
												$approveinr++;
											@endphp
										@endif
										@if($approve->currencyType=='AED')
											@php
												 $approveaed++; 
											@endphp
										@endif
										@if($approve->currencyType=='SAR')
											@php
												 $approvesar++;
											@endphp
										@endif
										@if($approve->currencyType=='USD')
											@php 
												$approveusd++; 
											@endphp
										@endif
										@if($approve->currencyType=='CAD')
											@php 
												$approvecad++; 
											@endphp
										@endif
									@endforeach

									<tr>
										<td>
											{{'Approved'}}
										</td>
										<td>
											{{$approveinr }}
										</td>
										<td>
											{{ $approveaed}}
										</td>
										<td>
											{{ $approvesar}}
										</td>
										<td>
											{{ $approveusd}}
										</td>
										<td>
											{{ $approvecad}}
										</td>										
									</tr>

									@php 
										$docinr=0;
										$docusd=0;
										$docaed=0;
										$docsar=0;
										$doccad=0; 
									@endphp
									@foreach($tcndoc as $document)
										@if($document->currencyType=='INR')
											@php 
												$docinr++; 
											@endphp
										@endif
										@if($document->currencyType=='AED')
											@php 
												$docaed++; 
											@endphp
										@endif
										@if($document->currencyType=='SAR')
											@php 
												$docsar++; 
											@endphp
										@endif
										@if($document->currencyType=='USD')
											@php
												$docusd++; 
											@endphp
										@endif
										@if($document->currencyType=='CAD')
											@php
												$doccad++; 
											@endphp
										@endif
									@endforeach


									<tr>
										<td>
											{{'Under Document Verification'}}
										</td>
										<td>
											{{$docinr }}
										</td>
										<td>
											{{ $docaed }}
										</td>
										<td>
											{{ $docsar }}
										</td>
										<td>
											{{ $docusd }}
										</td>
										<td>
											{{ $doccad}}
										</td>	
									</tr>

									@php 
										$payinr=0;
										$payusd=0;
										$payaed=0;
										$paysar=0;
										$paycad=0; 
									@endphp
									@foreach($tcnpayment as $payment)
										@if($payment->currencyType=='INR')
											@php 
												$payinr++; 
											@endphp
										@endif
										@if($payment->currencyType=='AED')
											@php 
												$payaed++; 
											@endphp
										@endif
										@if($payment->currencyType=='SAR')
											@php 
												$paysar++; 
											@endphp
										@endif
										@if($payment->currencyType=='USD')
											@php
												$payusd++;
											@endphp
										@endif
										@if($payment->currencyType=='CAD')
											@php
												$paycad++; 
											@endphp
										@endif
									@endforeach
									<tr>
										<td>
											{{'Under Payment Approval'}}
										</td>
										<td>
											{{ $payinr}}
										</td>
										<td>
											{{ $payaed}}	
										</td>
										<td>
											{{ $paysar}}
										</td>
										<td>
											{{ $payusd}}	
										</td>
										<td>
											{{ $paycad}}	
										</td>
									</tr>
								{{-- <tr>
									<td>
										{{'To be Added to Physical Benefit List'}}
									</td>
									<td>
										{{'inr'}}
									</td>
									<td>
										{{'aed'}}
									</td>
									<td>
										{{'usd'}}
									</td>
									<td>
										{{'sar'}}
									</td>
									<td>
										{{'cad'}}
									</td>
								</tr> --}}
							</tr>
						</tbody>
					</table>
				</div>
			</div>
	@endif
</div>


@endsection
@section('jquery')
	<script type="text/javascript">
	$('.chosen-select').chosen();
	</script>
@endsection
