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
	<h1 class="m-n font-thin h3">Complaint Handling</h1>
</div>
<form action="{{ URL::to('/') }}/admin/enquirysolving" method="post" >
 
	@foreach ($enquiryreg as $enquiryregs)
	<div class="wrapper-md">
		<div class="row">
			<div class="col-sm-12">
				<div class="blog-post">                   
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading ">                  
								Complaint Details
							</div>
							<div class="panel-body">
								{{csrf_field()}}
								<input type="hidden" name="enquiryid" id="enquiryid" value="{{$enquiryId}}">
								<div class="col-md-3">
									<label><strong>MEMBER CODE</strong></label><br>
									<label>{{$enquiryregs->membercode }}</label>
								</div>
								<div class="col-md-3">
									<label><strong>CATEGORY</strong></label><br>
									<label>{{ $enquiryregs->category_name}}</label>
								</div>
								<div class="col-md-3">
									<label><strong>DATE</strong></label><br>
									<label>{{ $enquiryregs->date}}</label>
								</div>
								<div class="col-md-3">
									<label><strong>COMPLAINT STATUS</strong></label><br>
									<label>{{$enquiryregs->status }}</label>
								</div>
								<div class="col-md-12"> <br> </div>
								<div class="col-md-3">
									<label> <strong>DESCRIPTION</strong></label><br>
									<label>{{ $enquiryregs->description}}</label>
								</div>
								<div class="col-md-3">
									<label><strong>SUGGESTED SOLUTION</strong></label><br>
									<label>{{ $enquiryregs->suggestion}}</label>
								</div>
								<div class="col-md-3">
									<label> <strong>RECEIVED BY</strong></label><br>
									<label>Ms.Molly Thomas</label>
								</div>
								<div class="col-md-3">
									<label><strong>BRANCH</strong></label><br>
									<label>HEERA GROUP CORPORATE HOUSE</label>
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
								COMPLAINT REPORTED BY
							</div>
							<div class="panel-body">
								<div class="col-md-4">
									<label><strong>NAME</strong></label><br>
									<label>{{ $enquiryregs->name }}</label>
								</div>
								<div class="col-md-4">
									<label><strong>EMAIL</strong></label><br>
									<label>{{$enquiryregs-> email}}</label>
								</div>
								<div class="col-md-4">
									<label><strong>MOBILE</strong></label><br>
									<label>{{ $enquiryregs->mobile}}</label>
								</div>
								<div class="col-md-12"><br></div>
								<div class="col-md-12"><br></div>
								<div class="col-md-4">
									<label><strong>SOLVED DESCRIPTION</strong></label><br>
									<input type="text" name="solveddescription" id="solveddescription" class="form-control" placeholder="Solved Description" required>
								</div>
								<div class="col-md-4">
									<button name="submit" type="submit"  value="submit" class="btn btn-sm btn-success" style="margin-top:10%;">submit</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	@endforeach
</form>                    
@endsection
@section('jquery')
@endsection