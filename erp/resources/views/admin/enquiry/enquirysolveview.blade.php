@extends('admin.layout.erp')
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
            <h1 class="m-n font-thin h3">Solve Complaints</h1>
        </div>
        @if (Session()->has('message'))
        <div class="alert alert-info fade in alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong>Info!</strong> {{Session()->get('message')}}
        </div>
    	@endif
          <div class="wrapper-md">
            <div class="row">
              <div class="col-sm-12">
                <div class="blog-post">                   
                  <div class="col-sm-12">
                    <div class="panel panel-default">
    				<div class="panel-heading font-bold">Solve Complaints</div>
						<div class="panel-body">
							<div class="row">
								<div class="table-responsive">
								<table class="table" id="enquirysolveview">
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
							        	@foreach ($enquiryreg as $enquiryregs)
							        <tr>
							            <td>{{ $i++ }}</td>
							            <td>{{ $enquiryregs->membercode }}</td>
							            <td>{{ $enquiryregs->date}}</td>
							            <td>{{ $enquiryregs->category_name}}</td>
							            <td>{{ $enquiryregs->mobile }}</td>
							            <td>{{ $enquiryregs->email }}</td>
						            	<td><a href="{{ url('/admin/enquirysolving', $enquiryregs->id) }}" class="btn btn-info" >View</a></td>

							         	
								    </tr>
							           @endforeach
							        </tbody>
						      </table>
						      </div>
							</div>
						</div>
		            </div>
                  </div>
                </div>
                 
              </div>  
              </div>
              </div>                                      
           @endsection
           @section('jquery')
          <script type="text/javascript">
				$(document).ready(function(){
				$('#enquirysolveview').DataTable();
				});
			</script>
           @endsection