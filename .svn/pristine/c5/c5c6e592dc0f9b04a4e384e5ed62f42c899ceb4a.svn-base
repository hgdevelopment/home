@extends('layout.erp')

@section('banner')
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
    <img src="{{ URL::asset('new_heading.png') }}" class="img-responsive">
</div>
@endsection

@section('sidebar')
@include('partial.header')
 @include('partial.aside')
@endsection
@section('body')

		<div class="bg-light lter b-b wrapper-md">
            <h1 class="m-n font-thin h3">Member Request</h1>
        </div>
          <div class="wrapper-md">
            <div class="row">
              <div class="col-sm-12">
                <div class="blog-post">                   
                  <div class="col-sm-12">
                    <div class="panel panel-default">
    				<div class="panel-heading font-bold">Member Request</div>
						<div class="panel-body">
							<div class="row">
								<div class="table-responsive">
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
							             	<th>Sl No</th>
							                <th>Member Code</th>
							                <th>Date</th>
							                <th>Category</th>
							                <th>Mobile</th>
							                <th>Email</th>
							                <th>Actions</th>
							            </tr>
							          <?php $i = 1; ?>
							        </thead>
							        <tbody>
							        	
							        <tr>
							            <td>{{ $i++ }}</td>
							            <td></td>
							            <td></td>
							            <td></td>
							            <td></td>
							            <td></td>
						            	<td><a href="{{ url('') }}" class="btn btn-info" >View</a></td>
								    </tr>
							         
							        </tbody>
						      </table>
						      </div>
							</div>
						</div>
		            </div>
                  </div>
                </div>
                 
              </div>                                        
           @endsection
           @section('jquery')
          
           @endsection