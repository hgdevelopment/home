<?php

use DB;
?>
<table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" cellpadding="0" width="100%" id="table"  >
    <thead>
      <tr style="background-color: #ffe4c4;">
		<th>S&nbsp;NO</th>
		<th>EMP CODE</th>
		<th>NAME</th>
		<th>DESIGNATION</th>
		<th>SALARY</th>
		<th>OVER TIME</th>
		<th>FINAl SALARY</th>
		<th>ACTION</th>
	  </tr>
    </thead>
    
    <tbody>
    @if(count($employees)==0)
    <tr >
    <td colspan="8" align="center">
	<span class="text-danger">No records found..</span>
	</td>
	</tr>
	@endif
		<?php $i=1;?>
		@foreach($employees as $employee)
		<tr data-expanded="true">
		<td align="center">{{ $i }}</td>
		<td>{{ $employee->code }}</td>
		<td>{{ $employee->salutation_name }} {{ $employee->name }}</td>
		
		<td>
		@php
			$d=DB::table('hr_designation')->select('designation_name')->where('id',$employee->designation_id)->first();
			echo $d->designation_name;
			@endphp
		</td>

		<td>{{ max($employee->final_salary - $employee->overtime_amount,0) }}</td>
		<td>{{ $employee->overtime_amount }}</td>
		<td>{{ $employee->final_salary }}</td>


		<td>
		<a href="{{ URL::to('/') }}/hr/salaryMaster/{{ $employee->user_id }}{{ '@@' }}{{ $request->year }}{{ '@@' }}{{ $request->month }}" class="active"><i style="color: #018001;" class="fa fa-search" aria-hidden="true"></i></a>
		</td>
		</tr>
		<?php $i++;?>
		@endforeach
    </tbody>
</table>