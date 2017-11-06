<?php

use DB;

?>
	<div class="panel panel-dark ">
	    <div class="panel-heading" style="background:url({{ URL::to('/') }}/img/profile_slider/07.jpg) center center; background-size:cover;"">
	      <div class="clearfix">
	        <a href="" class="pull-left thumb-md avatar b-3x m-r">
	          <img src="{{ URL::to('/') }}/storage/img/employee/{{ $employee->photo }}" alt="...">
	        </a>
	        <div class="clear">
	          <div class="h3 m-t-xs m-b-xs">
	           {{ $employee->salutation_name }} {{ $employee->name }}

	           <form action="{{ URL::to('/') }}/hr/employeePayslip" method="post" id="pdfform">
	           {{ csrf_field() }}
	            <a onclick="printPayslip()"><i class="pull-right" style="margin-right: 20px"><img src="{{ URL::to('/') }}/print-icon.png" class="img-responsive"></i></a>
	            <input type="hidden" name="code" id="code" value="{{ $employee->code }}">
	            <input type="hidden" name="month" id="month" value="{{ $salary->month }}">
	            </form>

	          </div>
	          <small class="text-muted">{{ $employee->designation_name }}</small><br>
	          <small class="text-muted">{{ $employee->department_name }}</small>
	        </div>
	      </div>
	    </div>
	 </div>

	<div class="well m-t bg-light lt">
      <div class="row">
        <div class="col-xs-4">
        <div class="col-md-12 col-xs-12 divTableCell"> Payslip No <b class="data-lab">{{ $salary->payslip_no }}</b> </div>
        	<div class="col-md-12 col-xs-12 divTableCell"> Employee Code <b class="data-lab">{{ $employee->code }}</b> </div>
        </div>

        <div class="col-xs-4">
        	<div class="col-md-12 col-xs-12 divTableCell"> Join Date  <b class="data-lab">{{ date('d-m-Y',strtotime($employee->date_of_joining)) }}</b> </div>
        	<div class="col-md-12 col-xs-12 divTableCell"> Company <b class="data-lab">{{ $employee->company_name }}</b> </div>
        </div>

        <div class="col-xs-4">
        	<div class="col-md-12 col-xs-12 divTableCell"> Gross Salary <b class="data-lab">{{ $salary->salary }}</b> </div>
        	<div class="col-md-12 col-xs-12 divTableCell"> Paid Days <b class="data-lab">{{ date('t',strtotime('01-'.$employee->salary)) }}</b> </div>
        </div>

      </div>
    </div>

	<div class="row">
		<div class="col-lg-12">
	      <div class="row">
	        <div class="col-sm-4 ">
	          <div class="panel panel-dark">

	            <div class="panel-heading">
	              <div class="clearfix">
	                <div class="clear">
	                Allowances
	                </div>
	              </div>
	            </div>

			    <div class="well m-t bg-light lt">
			    <div class="row">
		      	  	@php 
		      	  	$allowances=explode('##', substr($salary->allowances,0,-2));
		      	  	@endphp
		      	  	@for($i=0; count($allowances)>$i;$i++)
		           <div class="col-md-12 col-xs-12 divTableCell">

		               @php 
		               $SA=explode('@@', $allowances[$i]);	 
		               @endphp

		              {{ strtoupper($SA[0]) }}
		               <b class="data-lab">{{$SA[1].'.00'}}</b>

		            </div>
		      	  	@endfor

					<div class="hbox  b-t b-light">          
			          <a href="#" class="col padder-v text-muted b-r b-light">
			            <div class="h4">Total Allowances<div style="float: right;" class="h4 full-right">{{ $salary->salary }}</div></div>
			            
			          </a>
			        </div>          	
	            </div>
	            </div>

	          </div>
	        </div>
	        
	        <div class="col-sm-4 ">
	          <div class="panel panel-dark">

	            <div class="panel-heading">
	              <div class="clearfix">
	                <div class="clear">
	                Deductions
	                </div>
	              </div>
	            </div>

			    <div class="well m-t bg-light lt">
			    <div class="row">          
				<div class="col-md-12 col-xs-12 divTableCell"> Leave Amount <b class="data-lab">{{ ($salary->leave_amount + $salary->unapprove_leave_amount + $salary->sandwitch_leave_amount).'.00' }}</b> </div>
				<div class="col-md-12 col-xs-12 divTableCell"> Late Amount <b class="data-lab">{{ $salary->late_amount }}</b> </div>
				<div class="col-md-12 col-xs-12 divTableCell"> Fine Other Deduction <b class="data-lab">{{ $salary->fine_deduction }}</b> </div>
				<div class="col-md-12 col-xs-12 divTableCell"> Misc. Deduction <b class="data-lab">{{ $salary->misc_deduction }}</b> </div>
					<div class="hbox  b-t b-light">          
			          <a href="#" class="col padder-v text-muted b-r b-light">
			            <div class="h4">Total Deductions<div style="float: right;" class="h4 full-right">{{ $salary->amount_deduction }}</div></div>
			            
			          </a>
			        </div>          	
	            </div>
	            </div>

	          </div>
	        </div>

	        <div class="col-sm-4 ">
	          <div class="panel panel-dark">

	            <div class="panel-heading">
	              <div class="clearfix">
	                <div class="clear">
	                Final Salary
	                </div>
	              </div>
	            </div>

			    <div class="well m-t bg-light lt">
			    <div class="row">          
				<div class="col-md-12 col-xs-12 divTableCell"> Earn Salary <b class="data-lab">{{ max($salary->salary-($salary->overtime_amount+$salary->misc_payment+$salary->bonus),0).'.00' }}</b> </div>
				<div class="col-md-12 col-xs-12 divTableCell"> OT Amount <b class="data-lab">{{ $salary->overtime_amount }}</b> </div>
				<div class="col-md-12 col-xs-12 divTableCell"> Misc.Payment <b class="data-lab">{{ $salary->misc_payment }}</b> </div>
				<div class="col-md-12 col-xs-12 divTableCell"> Bonus <b class="data-lab">{{ $salary->bonus }}</b> </div>
					<div class="hbox  b-t b-light">          
			          <a href="#" class="col padder-v text-muted b-r b-light">
			            <div class="h4">Final Salary<div style="float: right;" class="h4 full-right">{{ $salary->final_salary }}</div></div>
			            
			          </a>
			        </div>          	
	            </div>
	            </div>

	          </div>
	        </div>
	      </div>
	    </div>
	</div>

