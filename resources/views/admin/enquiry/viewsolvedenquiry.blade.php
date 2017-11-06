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
            <h1 class="m-n font-thin h3">View Solved Enquiry</h1>
        </div>
          <div class="wrapper-md">
            <div class="row">
              <div class="col-sm-12">
                <div class="blog-post">                   
                  <div class="col-sm-12">
                    <div class="panel panel-default">
    				<div class="panel-heading font-bold">View Solved Enquiry</div>
						<div class="panel-body">
							<div class="row">
								<div class="table-responsive" style="padding: 7px;">
								<table class="table table-striped table-bordered dt-responsive nowrap b-t" cellspacing="0" width="100%" id="enquiryregview" >
							        <thead>
							            <tr>
							             	<th>Sl No</th>
							                <th>Member Code</th>
							                <th>Date</th>
							                <th>Category</th>
							                <th>Mobile</th>
							                <th>Email</th>
							                <th>Solved By</th>
							                <th>Solved Description</th>
							              
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
							            <td>{{ $enquiryregs->mobile}}</td>
							            <td>{{ $enquiryregs->email }}</td>
							            <td>{{ $enquiryregs->solvedby }}</td>
							            <td>{{ $enquiryregs->solveddescription }}</td>
							             
						         	
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
           @endsection
           @section('jquery')
			<script type="text/javascript">
				$(document).ready(function(){
				$('#enquiryregview').DataTable();
				});
			</script>
           @endsection