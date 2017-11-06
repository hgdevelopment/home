@extends('layout.erp')

@section('banner')
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
            <img src="new_heading.png" class="img-responsive">
         </div>
@endsection

@section('sidebar')
@include('partial.header')
 @include('partial.aside')
@endsection

@section('body')

<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">TCN Master</h1>
</div>

<div class="wrapper-md" ng-controller="FormDemoCtrl">
	<div class="panel panel-default">
		<div class="panel-heading font-bold">ADD TCN</div>
		<div class="panel-body">
			<div class="row">
				<form role="form" method="post" action="/tcn/@yield('edit_id')">
					{{ csrf_field() }}
					@section('edit')
          			@show
					<div class="col-md-12">
						<div class="col-md-4">
							<label>TCN</label>
							<input type="text" name="tcnType" class="form-control" placeholder="Enter TCN" required>
						</div>

						<div class="col-md-4">
							<label>TCN Prefix</label>
							<input type="text" name="tcnPrefix" class="form-control" placeholder="Enter TCN Prefix" required>
						</div>

						<div class="col-md-4">
							<label>TCN Certificate Prefix</label>
							<input type="text" name="tcnCertificatePrefix" class="form-control" placeholder="Enter TCN Certificate Prefix" required>
						</div>
			            <div class="col-md-4">
			              <label>Amount per unit (INR)</label>
			              <input type="text" name="inr" class="form-control" placeholder="Enter Amount per unit (INR)"  required>
			            </div>

			            <div class="col-md-4">
			              <label> Amount per unit (AED)</label>
			              <input type="text" name="aed" class="form-control" placeholder="Enter Amount per unit (AED)"  required>
			            </div>

			            <div class="col-md-4">
			              <label> Amount per unit (USD)</label>
			              <input type="text" name="usd" class="form-control" placeholder="Enter Amount per unit (USD)" required>
			            </div>
			            <div class="col-md-4">
			              <label>Amount per unit (SAR)</label>
			              <input type="text" name="sar" class="form-control" placeholder="Enter Amount per unit (SAR)"   required>
			            </div>

			            <div class="col-md-4">
			              <label> Amount per unit (CAD)</label>
			              <input type="text" name="cad" class="form-control" placeholder="Enter Amount per unit (CAD)"  required>
			            </div>

			            <div class="col-md-4">
			              <label> Profit Declaration</label>
			              <select name="profitDeclaration" class="form-control" placeholder="Profit Declaration" required>
			                <option value="">Monthly</option>
			                <option value="Bimonthly">Bimonthly</option>
			                <option value="Quarterly">Quarterly</option>
			                <option value="Half-Yearly">Half-Yearly</option>
			                <option value="Yearly">Yearly</option>
			                <option value="Biyearly">Biyearly</option>
			            </select>
			            </div>

			            <div class="col-md-4">
			              <label>Open For</label>
			              <select name="openStatus" class="form-control" required>
			                <option>Always Open</option>
			                <option>Limited Period</option>
			              </select>
			            </div>
			                 
			           <div class="col-md-4">
			              <label>Open On</label>
			              <input type="text" name="openOn" class="form-control" placeholder="Enter Open On"  required>
			            </div>

			            <div class="col-md-4">
			              <label>Close On</label>
			              <input type="text" name="closeOn" class="form-control" placeholder="Enter Close On" required>
			            </div>

			            <div class="col-md-4">
			              <label>Locking Period(In Months)</label>
			              <input type="text" name="lockingPeriod" class="form-control" placeholder="Enter Locking Period" required>
			            </div>

			             <div class="col-md-4">
			              <label>Benifit Locking Period</label>
			              <input type="text" name="benefitLockingPeriod" class="form-control" placeholder="Enter Benifit Locking Period" required>
			            </div>

			            <div class="col-md-4">
			              <br>
			              <button class="btn btn-success" type="submit" value="submit" name="submit">Submit</button>
			            </div>
					</div>
				</form> 
			</div>
		</div>
	</div>
	<div class="panel panel-default">
		<div class="panel-heading font-bold">VIEW TCN DETAILS</div>
		<div class="panel-body">
			<div class="row">
				<table class="table" ui-jq="footable" ui-options='{
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
			                <th rowspan="2" valign="middle">TCN  Name</th>
			                <th colspan="5" align="center">Amount Per Unit</th>
			                <th rowspan="2">Open For</th>
			                <th rowspan="2">Benefit Locking Period</th>
			                <th rowspan="2">Locking Period</th>
			                <th rowspan="2">Profit</th>
			                <th rowspan="2">Actions</th>
			            </tr>
			            <tr>
			                <th>INR</th>
			                <th>AED</th>
			                <th>USD</th>
			                <th>SAR</th>
			                <th>CAD</th>
			            </tr>
			        </thead>
			        <tbody>
			          <tr>
			            <td>Test</td>
			            <td>Test</td>
			            <td>Test</td>
			            <td>Test</td>
			            <td>Test</td>
			            <td>Test</td>
			            <td>Test</td>
			            <td>Test</td>
			            <td>Test</td>
			            <td>Test</td>
			            <td>
			              <a class="active"><i  style="color: #018001;" class="fa fa-pencil text-success text-active" aria-hidden="true"></i></a>
			              <a  class="active"><i  style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></a>
			            </td>
			          </tr>
			        </tbody>
		      </table>
			</div>
		</div>
	</div>

	<div class="row">
		<div class="col-md-8">
		  <div class="panel panel-default">
		       <div class="panel-heading font-bold">PREFIX MASTER</div>
		       <table class="table" ui-jq="footable" ui-options='{
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
			                <th>TCN  Name</th>
			                <th>TCN</th>
			                <th>Certificate</th>
			                <th>Actions</th>
			            </tr>
			            
			        </thead>
			        <tbody>
			          <tr>
			            <td>Test</td>
			            <td>Test</td>
			            <td>Test</td>
			            <td>
			              <a class="active"><i  style="color: #018001;" class="fa fa-pencil text-success text-active" aria-hidden="true"></i></a>
			              <a  class="active"><i  style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></a>
			            </td>
			          </tr>
			        </tbody>
		      </table>
		    </div>
  		</div>

  		<div class="col-md-4">
		  <div class="panel panel-default">
		    <div class="panel-heading font-bold">DSA PREFIX </div>
		    <table class="table" ui-jq="footable" ui-options='{
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
		                <th>DSA Prefix</th>
		                <th>Actions</th>
		            </tr>
		            
		        </thead>
		        <tbody>
		          <tr>
		            <td>Test</td>
		            <td>
		              <a class="active"><i  style="color: #018001;" class="fa fa-pencil text-success text-active" aria-hidden="true"></i></a>
		              <a  class="active"><i  style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></a>
		            </td>
		          </tr>
		        </tbody>
		    </table>
		</div>
  	</div>

	<div class="col-md-12">
		<div class="panel panel-default">
			<div class="panel-heading font-bold">TCN Images</div>
			<table class="table" ui-jq="footable" ui-options='{
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
			<th>TCN</th>
			<th>Application Header</th>
			<th>Indian Certificate</th>
			<th>DMCC Certificate</th>
			<th>Action</th>
			</tr>
			</thead>
			<tbody>
			<tr>
			<td>Test</td>
			<td><img src="img/a10.jpg" alt="Mountain View" style="width:100px;height:100px;"></td>
			<td><img src="img/a10.jpg" alt="Mountain View" style="width:100px;height:100px;"></td>
			<td><img src="img/a10.jpg" alt="Mountain View" style="width:100px;height:100px;"></td>
			<td>
			<a href=""  class="active"><i  style="color: #018001;" class="fa fa-pencil text-success text-active" aria-hidden="true"></i></a>
			<a href=""  class="active"><i  style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></a>
			</td>
			</tr>

			</tbody>
			</table>
		</div>
	</div>
</div>

@endsection

@section('jquery')
<script type="text/javascript">
	
</script>
@endsection