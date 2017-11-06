@php
use \App\Http\Controllers\Controller;
@endphp


	<form role="form" method="post" action="{{URL::to('/')}}/hr/salaryAllowance" id="form" data-parsley-validate>
			{{ csrf_field() }}

	<input type="hidden" name="company_id" id="company_id" value="{{  $request->company_id }}">
	<input type="hidden" name="company_name" id="company_name" value="{{  $company->company_name }}">
			<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" cellpadding="0" width="100%" id="table"  >
				<thead>
					<tr style="background: bisque;"><th colspan="3">Company Name : {{ strtoupper($company->company_name) }}</th></tr>
					<tr>
						<th bgcolor="cornsilk">Allowances</th>
						<th bgcolor="cornsilk">Percentage <span class="text-danger">%</span></th>
						<th bgcolor="cornsilk">Action</th>
					</tr>
				</thead>
				<body>
				<?php $i=1; ?>
					@foreach($salary_temp as $salary_temp)

						{{-- Edit Allowance  --}}
						@if($request->type=='edit' && $request->id==$salary_temp->id)

							<tr>
								<td><input type="text" class="form-control" name="allowances" id="allowances" value="{{ $salary_temp->allowances }}" ></td>
								<td><input type="text" class="form-control" name="percentage" id="percentage" value="{{ $salary_temp->percentage }}" >
								<span class="text-danger percentage">Enter Valuable Percentage</span>
								</td>
								<td style="background: whitesmoke;">
								<input type="button" class="btn btn-sm btn-warning" onclick="update_temp('{{ $salary_temp->id }}','{{  $request->company_id }}')" value="Save">
								</td>
							</tr>
						{{-- End~~~~~~~~~~Edit Allowance  --}}

						@else


						<tr>
							<td>{{ $salary_temp->allowances }}</td>

							<td>
								<div class="text-right font-bold text-primary" style="width: 25px;float: left;padding-right: 2px">{{ $salary_temp->percentage }}</div>

								<div style="float: left"> %</div>

							</td>

							<td  style="background: whitesmoke;">
								<a onclick="change_temp('{{ $salary_temp->id }}','edit','{{  $request->company_id }}')" class="active" style="border: none;"><i class="fa fa-pencil text-success" aria-hidden="true"></i></a>&nbsp;&nbsp;&nbsp;&nbsp;

								<a onclick="change_temp('{{ $salary_temp->id }}','delete','{{  $request->company_id }}')" class="active" style="border: none;"><i style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></a>

							</td>

						</tr>
						@endif
						<?php
						 	$i++; 
						 	$totalPer=$totalPer+$salary_temp->percentage;
						 ?>

					@endforeach


					{{-- Add Allowance --}}
					@if($request->type!='edit')
					@if($totalPer<100)
					<tr  style="background: whitesmoke;">
						<td>
						<input type="text" class="form-control" name="allowances{{ $i }}" id="allowances{{ $i }}" value="" placeholder="Allowances" >
						<span class="text-danger allowances">Enter Allowance Name</span>
						</td>
						<td>
						<input type="text" class="form-control" name="percentage{{ $i }}" id="percentage{{ $i }}" value="" placeholder="{{ 100-$totalPer }}%">
						<span class="text-danger percentage">Enter Valuable Percentage</span>

						</td>

						<td><input type="button" class="btn btn-success" value="Add+" onclick="add_temp('{{ $i }}')"></td>
					</tr>
					@endif
					{{-- End~~~~~~~~~~Add Allowance --}}



					<tr>
						<td colspan="3" align="center">
						
						@if($totalPer==100)
						<input type="submit"  value="Save" class="btn btn-danger">

						@elseif($totalPer>100)
						<span class="text-danger h3">Salary should not be more than 100%</span>

						@else
						<span class="text-primary h3">Sum should be equal to 100%</span>
						@endif

						</td>
					</tr>
					@endif
				</body>
			</table>
</form>
