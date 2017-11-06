@extends('admin.layout.erp1')
@section('banner')
  <div class="col-lg-12" align="center" style="background-color:#ffcf29">
  <img src="{{ URL::asset('img/new_heading.png') }}" class="img-responsive">
  </div>
@endsection
@section('sidebar')
@include('admin.partial.header')
@include('admin.partial.aside')
@endsection
@section('body')
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/jquery.timepicker.css') }}" />
<link rel="stylesheet" type="text/css" href="{{ URL::asset('css/daterangepicker.css') }}" />
<link rel="stylesheet" href="{{ URL::asset('css/sweetalert.css') }}" type="text/css" />
<style type="text/css">
#installationForm .tab-content {
    margin-top: 20px;
}
 #installationForm  .form-group {
    margin-right: 0px !important;
    margin-left: 0px !important;
}
.btn-link,.btn-link:hover {
    color: #796b20;
}
</style>
<div class="app-content-body fade-in-up ng-scope" ui-view="" style=""><div  class="fade-in-down ng-scope"><div class="hbox hbox-auto-xs hbox-auto-sm ng-scope">
  <div class="col">
    @include('hr.employee.partial.header')
    <div class="padder">      
    	<br/>
    	<div class="row">
    	<div class="col-sm-12">
      <div class="panel-warning">
      	<div class="panel-heading">
      		Personal Details <span class="pull-right"><a data-toggle="modal" data-target="#personalModal" href="#" class="btn  btn-link"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></span>
      	</div>
      	  <div class="panel-body">
      	  <div class="row">
      	  	
      	 
           <div class="col-md-6 col-xs-12 divTableCell">
              Employee ID:
               <b class="data-lab">{{$data[0]->code}}</b>
            </div>
            <div class="col-md-6 col-xs-12 divTableCell">
              Name:
               <b class="data-lab">{{$data[0]->salutation_name}} {{$data[0]->name}}</b>
            </div>
            <div class="col-md-6 col-xs-12 divTableCell">
              Guardian's Name:
              <b class="data-lab">{{$data[0]->salutation_guardian}} {{$data[0]->guardian}}</b>
            </div>
            <div class="col-md-6 col-xs-12 divTableCell">
              Gender:
              <b class="data-lab">{{$data[0]->gender}}</b>
            </div>
            <div class="col-md-6 col-xs-12 divTableCell">
              Date of Birth:
             <b class="data-lab">{{date('d-m-Y',strtotime($data[0]->dob))}}</b> 
            </div>
            <div class="col-md-6 col-xs-12 divTableCell">
              Marital Status:
              <b class="data-lab">{{$data[0]->marital_status}}</b>
            </div>
            <div class="col-md-6 col-xs-12 divTableCell">
               Religion:
              <b class="data-lab">{{$data[0]->religion_name}}</b>
            </div>
            <div class="col-md-6 col-xs-12 divTableCell">
              Caste:
             <b class="data-lab">{{$data[0]->caste}}</b>
              </div>
            <div class="col-md-6 col-xs-12 divTableCell">
              Blood Group:
             <b class="data-lab">{{$data[0]->bloodgroup}}</b>
            </div>
            <div class="col-md-6 col-xs-12 divTableCell">
              Nationality:
            <b class="data-lab">{{$data[0]->countryName}}</b>
              </div>
            <div class="col-md-6 col-xs-12 divTableCell">
              Mobile Number:
             <b class="data-lab">{{$data[0]->mobile}}</b>
            </div>
            <div class="col-md-6 col-xs-12 divTableCell">
              Email:
              <b class="data-lab">{{$data[0]->p_email}}</b>
            </div>
          <div class="col-md-6 col-xs-12 divTableCell">
             Proof ({{$data[0]->proof_type}}):
             <b class="data-lab"> {{$data[0]->proof_number}}</b>
            </div>
           <div class="col-md-6 col-xs-12 divTableCell">
            &nbsp;
             
            </div>

         </div>
          </div>
      </div>
   {{-- modal start --}}
   <div id="personalModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    	 <form id="form_persanal_details" method="post" enctype="multipart/form-data">
    	 	{{csrf_field()}}
    	 	<input type="hidden" name="_id" id="_id" value="{{$id}}">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Personal Details</h4>
      </div>
      <div class="modal-body">
       
        	<div class="row">
        		<div class="col-sm-6">
		  <div class="form-group">
		    <label for="email">Name:</label>
		    <div class="input-group">
                <span class="input-group-addon" id="basic-addon1" style="border: 0px;    padding: 0px;"><select class="form-control" name="emp_name" id="emp_name" style="color: #000;
			    padding: 0px;
			    min-width: 50px;">
                <option value="Mr." {{($data[0]->salutation_name=='Mr.')?'selected':''}}>Mr.</option>
                <option value="Ms." {{($data[0]->salutation_name=='Ms.')?'selected':''}}>Ms.</option>
                <option value="Mrs." {{($data[0]->salutation_name=='Mrs.')?'selected':''}}>Mrs.</option>
              </select></span>
		    <input type="text" class="form-control" id="p_name" name="p_name" value="{{$data[0]->name}}">
		</div>
		  </div>
		</div>
		<div class="col-sm-6">
		  <div class="form-group">
		    <label for="email">Guardian's Name:</label>
		    <div class="input-group">
                <span class="input-group-addon" id="basic-addon1" style="border: 0px;    padding: 0px;"><select class="form-control" name="emp_name_g" id="emp_name_g" style="color: #000;
			    padding: 0px;
			    min-width: 50px;">
                <option value="Mr." {{($data[0]->salutation_guardian=='Mr.')?'selected':''}}>Mr.</option>
                <option value="Ms." {{($data[0]->salutation_guardian=='Ms.')?'selected':''}}>Ms.</option>
                <option value="Mrs." {{($data[0]->salutation_guardian=='Mrs.')?'selected':''}}>Mrs.</option>
              </select></span>
		    <input type="text" class="form-control" id="p_gname" name="p_gname" value="{{$data[0]->guardian}}">
		</div>
		  </div>
		</div>
		  
        </div>
        <div class="row">
        	<div class="col-sm-6">
              <div class="form-group">
              <label for="name">Gender:</label>
              <select type="text" class="form-control" id="p_gender" name="p_gender">
                <option value="">Select</option>
                <option value="Male" {{($data[0]->gender=='Male')?'selected':''}}>Male</option>
                <option value="Female" {{($data[0]->gender=='Female')?'selected':''}}>Female</option>
              </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
              <label for="name">Date of Birth:</label>
              <input type="text" class="form-control" id="p_dob" name="p_dob" value="{{date('d/m/Y',strtotime($data[0]->dob))}}">
              </div>
            </div>
        </div>
            <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
              <label for="name">Marital Status:</label>
              <select type="text" class="form-control" id="p_marital" name="p_marital">
                <option value="">Select</option>
                <option value="Married" {{($data[0]->marital_status=='Married')?'selected':''}}>Married</option>
                <option value="Single" {{($data[0]->marital_status=='Single')?'selected':''}}>Single</option>
                <option value="Divorced" {{($data[0]->marital_status=='Divorced')?'selected':''}}>Divorced</option>
                <option value="Other" {{($data[0]->marital_status=='Other')?'selected':''}}>Other</option>
              </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group has-feedback has-success">
              <label for="name">Religion:</label>
              <select name="p_religion" id="p_religion" class="form-control">
                <option value="">Select</option>
                @foreach ($listTypes['religion'] as $element)
                  <option value="{{$element->id}}" {{($element->id==$data[0]->religion)?'selected':''}}>{{$element->religion_name}}</option>
                @endforeach
              </select>
              </div>
            </div>
        </div>
            
        <div class="row">
        	<div class="col-sm-6">
              <div class="form-group">
              <label for="name">Caste:</label>
              <input type="text" class="form-control" id="p_caste" name="p_caste" value="{{$data[0]->caste}}">
             
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
              <label for="name">Blood Group:</label>
              <select type="text" class="form-control" id="bloodgroup" name="bloodgroup">
                <option value="">Select</option>
                <option value="A+" {{($data[0]->bloodgroup=='A+')?'selected':''}}>A+</option>
                <option value="A-" {{($data[0]->bloodgroup=='A-')?'selected':''}}>A-</option>
                <option value="B+" {{($data[0]->bloodgroup=='B-')?'selected':''}}>B+</option>
                <option value="B-" {{($data[0]->bloodgroup=='B-')?'selected':''}}>B-</option>
                <option value="AB+" {{($data[0]->bloodgroup=='AB+')?'selected':''}}>AB+</option>
                <option value="AB-" {{($data[0]->bloodgroup=='AB-')?'selected':''}}>AB-</option>
                <option value="O+" {{($data[0]->bloodgroup=='O+')?'selected':''}}>O+</option>
                <option value="O-" {{($data[0]->bloodgroup=='O-')?'selected':''}}>O-</option>
              </select>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
              <label for="name">Nationality:</label>
              <select class="form-control" id="p_nationality" name="p_nationality">
                <option value="">Select</option>
                @foreach ($listTypes['country'] as $element)
                  <option value="{{$element->id}}" {{($element->id==$data[0]->nationality)?'selected':''}}>{{$element->countryName}}</option>
                @endforeach
              </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
              <label for="name">Mobile Number:</label>
              <input type="text" class="form-control" id="p_mobile" name="p_mobile" value="{{$data[0]->mobile}}">
              </div>
            </div>
        </div>
        
        <div class="row">
        	<div class="col-sm-6">
              <div class="form-group">
              <label for="name">Email:</label>
              <input type="text" class="form-control" id="p_email" name="p_email" value="{{$data[0]->p_email}}">
              </div>
            </div>
          <div class="col-sm-6">
              <div class="form-group">
              <label for="name">Proof Type:</label>
              <select id="proof_type" name="proof_type" class="form-control">
                <option value="">Select</option>
                <option {{($data[0]->proof_type=='Passport')?'selected':''}}>Passport</option>
                <option {{($data[0]->proof_type=='Adhar Card')?'selected':''}}>Adhar Card</option>
                <option {{($data[0]->proof_type=='Driving Licence')?'selected':''}}>Driving Licence</option>
                <option {{($data[0]->proof_type=='Voter ID')?'selected':''}}>Voter ID</option>
                <option {{($data[0]->proof_type=='Pancard')?'selected':''}}>Pancard</option>
              </select>
              </div>
            </div>
           

        </div>
        <div class="row">
         <div class="col-sm-6">
              <div class="form-group">
              <label for="name">Proof Number:</label>
              <input type="text" class="form-control" id="proof_number" name="proof_number" value="{{$data[0]->proof_number}}">
             
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
              <label for="name">Upload Photo:</label>
              <input type="file" class="btn btn-success btn-fil" id="photo" name="photo">
              </div>
            </div>
        </div>
		
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info" >Update</button>
      </div>
      </form>
    </div>

  </div>
</div>
   {{-- end modal --}}
      </div>
  </div>
      <div class="row" style="margin-top:15px;">
      <div class="col-sm-12">
      <div class="panel-warning">
      	<div class="panel-heading">
      		Company Details <span class="pull-right"><a data-toggle="modal" data-target="#companyModal" href="#" class="btn  btn-link"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></span>
      	</div>
      	 <div class="panel-body">
      	   <div class="row">
             <div class="col-md-6 col-xs-12 divTableCell">
             Company:
             <b class="data-lab">
             {{$data[0]->company_name}}
             </b>
            </div>
            <div class="col-md-6 col-xs-12 divTableCell">
              Branch:
              <b class="data-lab">
             {{$data[0]->branch_name}}
             </b>
              </div>
           <div class="col-md-6 col-xs-12 divTableCell">
              Department:
              <b class="data-lab">
             {{$data[0]->department_name}}
             </b>
              </div>
           
            <div class="col-md-6 col-xs-12 divTableCell">
              Designation:
              <b class="data-lab">
             {{$data[0]->designation_name}}
             </b>
            </div>
           <div class="col-md-6 col-xs-12 divTableCell">
              Date of Joining:
              <b class="data-lab">
             {{date('d-m-Y',strtotime($data[0]->date_of_joining))}}
             </b>
            </div>
            <div class="col-md-6 col-xs-12 divTableCell">
              Work Shift:
              @php
              $_shift=json_decode($data[0]->work_shift);
              @endphp
              <b class="data-lab">
              {{$_shift->from}} - {{$_shift->to}}
              </b>
            </div>
            <div class="col-md-6 col-xs-12 divTableCell">
              Monthly Gross Salary:
              <b class="data-lab">
              {{$data[0]->salary}} </b>
            </div>
           <div class="col-md-6 col-xs-12 divTableCell">
              Job Type:
              <b class="data-lab">
               {{$data[0]->job_type}} </b>
            </div>
           <div class="col-md-6 col-xs-12 divTableCell">
              User Type:
              <b class="data-lab">
              @if($data[0]->userType=='OI')
               Office Incharge
              @elseif($data[0]->userType=='ME')
               Marketing Executive
              @else
                Employee 
              @endif
             </b>
            </div>
            <div class="col-md-6 col-xs-12 divTableCell">&nbsp;</div>
            
        </div>
       
         </div>
      </div>
      {{-- modal start --}}
   <div id="companyModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    	 <form id="form_company_details" method="post" enctype="multipart/form-data">
    	 	{{csrf_field()}}
    	 	<input type="hidden" name="_id" id="_id" value="{{$id}}">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Company Details</h4>
      </div>
      <div class="modal-body">
       
        <div class="row">
        	<div class="col-sm-6">
              <div class="form-group">
              <label for="name">Company:</label>
              <select type="text" class="form-control" id="company" name="company">
                <option value="">Select</option>
                @foreach ($listTypes['company'] as $element)
                  <option value="{{$element->id}}" {{($data[0]->company_id==$element->id)?'selected':''}}>{{$element->company_name}}</option>
                @endforeach
              </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
              <label for="name">Branch:</label>
              <select type="text" class="form-control" id="branch" name="branch">
                <option value="">Select</option>
              </select>
              </div>
            </div>
        </div>
            <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
              <label for="name">Department:</label>
              <select type="text" class="form-control" id="department" name="department">
                <option value="">Select</option>
                @foreach ($listTypes['department'] as $element)
                  <option value="{{$element->id}}" {{($data[0]->department_id==$element->id)?'selected':''}}>{{$element->department_name}}</option>
                @endforeach
              </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group has-feedback has-success">
              <label for="name">Designation:</label>
              <select type="text" class="form-control" id="designation" name="designation">
                <option value="">Select</option>
              </select>
              </div>
            </div>
        </div>
            
        <div class="row">
        	<div class="col-sm-6">
              <div class="form-group">
              <label for="name">Date of Joining:</label>
              <input type="text" class="form-control" id="dateofjoing" name="dateofjoing" value="{{date('d/m/Y',strtotime($data[0]->date_of_joining))}}">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
              <label for="name">Work Shift:</label>
             <!--  <input type="text" class="form-control" id="workshift" name="workshift"> -->
              <p id="workshift">
              	@php
              $_shift=json_decode($data[0]->work_shift);
              @endphp
               <input type="text" id="workshift_from" name="workshift_from" class="workshift-time start form-control " style="width: 49%; float: left;" value="{{$_shift->from}}"  />  
               <input type="text" id="workshift_to" name="workshift_to" class="workshift-time end form-control " style="width: 48%; margin-left: 5px; float: left;" value="{{$_shift->to}}" />
               </p>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
              <label for="name">Monthly Gross Salary:</label>
              <input type="text" class="form-control" id="monthly_sal" name="monthly_sal" value="{{$data[0]->salary}}">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
              <label for="name">Job Type:</label>
              <select type="text" class="form-control" id="jobtype" name="jobtype">
                <option value="">Select</option>
                <option {{($data[0]->job_type=='Permanent')?'selected':''}}>Permanent</option>
                <option {{($data[0]->job_type=='Temporary')?'selected':''}}>Temporary</option>
              </select>
              </div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
              <label for="name">Employee Status:</label>
              <select type="text" class="form-control" id="status" name="status">
                <option {{($data[0]->emp_status=='Active')?'selected':''}}>Active</option>
                <option {{($data[0]->emp_status=='Resigned')?'selected':''}}>Resigned</option>
                <option {{($data[0]->emp_status=='Terminated')?'selected':''}}>Terminated</option>
              </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
              <label for="name">User Type:</label>
              <select type="text" class="form-control" id="scheeme" name="scheeme">
                  <option value="OI" {{($data[0]->userType=='OI')?'selected':''}}>Office Incharge</option>
                  <option value="EMP" {{($data[0]->userType=='EMP')?'selected':''}}>Employee</option>
                  <option value="ME" {{($data[0]->userType=='ME')?'selected':''}}>Marketing Executive</option>
              </select>
              </div>
            </div>
        </div>
       		
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info" >Update</button>
      </div>
      </form>
    </div>

  </div>
</div>
   {{-- end modal --}}
      </div>
  </div>
  @if(count($address)<2)
  <div class="row" style="margin-top:15px;">
  	<div class="col-sm-12">
  		<div class="panel-warning">
  			<div class="panel-heading">
  				&nbsp; <span class="pull-right"><a data-toggle="modal" data-target="#addressModal_add" href="#" class="btn  btn-link"><i class="fa fa-plus" aria-hidden="true"></i> Add New Address</a></span>
  			</div>
  		</div>
  	</div>
  </div>

  {{-- modal start --}}
   <div id="addressModal_add" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    	 <form id="form_address_new" method="post" enctype="multipart/form-data">
    	 	{{csrf_field()}}
    	 	<input type="hidden" name="_id" id="_id" value="{{$id}}">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">@if($element->type=='correspondence')
      		Correspondence Address
      		@else
      		Permanent Address
      		@endif</h4>
      </div>
      <div class="modal-body">
       
        <div class="row">
        	<div class="col-sm-12">
              <div class="form-group">
              <label for="name">Address:</label>
              <textarea class="form-control" id="_address" name="_address">{{$element->address}}</textarea> 
              </div>
            </div>
        </div>
            <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
              <label for="name">City:</label>
              <input type="text" class="form-control" id="_city" name="_city" value="{{$element->city}}">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group has-feedback has-success">
              <label for="name">State:</label>
              <input type="text" class="form-control" id="_state" name="_state" value="{{$element->state}}">
              </div>
            </div>
        </div>
        
        <div class="row">
            
            <div class="col-sm-6">
              <div class="form-group">
              <label for="name">Country:</label>
              <select type="text" class="form-control" id="_country" name="_country">
                <option value="">Select</option>
                @foreach ($listTypes['country'] as $element_country)
                  <option value="{{$element_country->id}}" {{($element_country->id==$element->country)?'selected':''}}>{{$element_country->countryName}}</option>
                @endforeach
              </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
              <label for="name">Zip Code:</label>
              <input type="text" class="form-control" id="_zip_code" name="_zip_code" value="{{$element->zip_code}}">
              </div>
            </div>
        </div>
        <div class="row">
        	<div class="col-sm-6">
              <div class="form-group">
              <label for="name">Address Type:</label>
              <select type="text" class="form-control" id="_type" name="_type">
                <option value="">Select</option>
                <option value="correspondence">Correspondence</option>
                <option value="permanent">Permanent</option>
              </select>
              </div>
            </div>
        </div>
       
       		
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info" >Update</button>
      </div>
      </form>
    </div>

  </div>
</div>
   {{-- end modal --}}
  @endif
  <div class="row" style="margin-top:15px;">
@foreach ($address as $element)
	{{-- expr --}}

  
      <div class="col-sm-6">
      <div class="panel-warning">
      	<div class="panel-heading">
      		@if($element->type=='correspondence')
      		Correspondence Address
      		@else
      		Permanent Address
      		@endif

      		  <span class="pull-right"><a data-toggle="modal" data-target="#addressModal_{{$element->type}}" href="#" class="btn  btn-link"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></span>

      	</div>
      	 <div class="panel-body">
      	   <div class="row">
           <div class="col-md-12 col-xs-12 divTableCell">
              Address:
               <b class="data-lab">{{$element->address}}  </b>            
            </div>
            <div class="col-md-12 col-xs-12 divTableCell">
              City:
               <b class="data-lab">{{$element->city}}</b>
            </div>
            <div class="col-md-12 col-xs-12 divTableCell">
              State:
             <b class="data-lab"> {{$element->state}}</b>
            </div>
            <div class="col-md-12 col-xs-12 divTableCell">
              Country:
              <b class="data-lab">{{$element->countryName}}</b>
            </div>
            <div class="col-md-12 col-xs-12 divTableCell">
              Zip Code:
             <b class="data-lab">{{$element->zip_code}}</b>
             
            </div>
           
        </div>
       
       
         </div>
      </div>

{{-- modal start --}}
   <div id="addressModal_{{$element->type}}" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    	 <form id="form_address_{{$element->type}}" method="post" enctype="multipart/form-data">
    	 	{{csrf_field()}}
    	 	<input type="hidden" name="_id" id="_id" value="{{$id}}">
    	 	<input type="hidden" name="_id_ad" id="_id_ad" value="{{$element->addr_id}}">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">@if($element->type=='correspondence')
      		Correspondence Address
      		@else
      		Permanent Address
      		@endif</h4>
      </div>
      <div class="modal-body">
       
        <div class="row">
        	<div class="col-sm-12">
              <div class="form-group">
              <label for="name">Address:</label>
              <textarea class="form-control" id="_address" name="_address">{{$element->address}}</textarea> 
              </div>
            </div>
        </div>
            <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
              <label for="name">City:</label>
              <input type="text" class="form-control" id="_city" name="_city" value="{{$element->city}}">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group has-feedback has-success">
              <label for="name">State:</label>
              <input type="text" class="form-control" id="_state" name="_state" value="{{$element->state}}">
              </div>
            </div>
        </div>
        
        <div class="row">
            
            <div class="col-sm-6">
              <div class="form-group">
              <label for="name">Country:</label>
              <select type="text" class="form-control" id="_country" name="_country">
                <option value="">Select</option>
                @foreach ($listTypes['country'] as $element_country)
                  <option value="{{$element_country->id}}" {{($element_country->id==$element->country)?'selected':''}}>{{$element_country->countryName}}</option>
                @endforeach
              </select>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
              <label for="name">Zip Code:</label>
              <input type="text" class="form-control" id="_zip_code" name="_zip_code" value="{{$element->zip_code}}">
              </div>
            </div>
        </div>
        
       
       		
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info" >Update</button>
      </div>
      </form>
    </div>

  </div>
</div>
   {{-- end modal --}}

      </div>
  
@endforeach
</div>

 <div class="row" style="margin-top:15px;">
      <div class="col-sm-12">
      <div class="panel-warning">
      	<div class="panel-heading">
      		Skills  <span class="pull-right"><a data-toggle="modal" data-target="#skillsModal" href="#" class="btn  btn-link"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></span>
      	</div>
      	 <div class="panel-body">
      	   <div class="row">
           <div class="col-md-6 col-xs-12 divTableCell">
              Computer:
              <b class="data-lab"> {{$skills[0]->computer}}</b>
            </div>
             <div class="col-md-6 col-xs-12 divTableCell">
              Typing Speed:
               <b class="data-lab">{{$skills[0]->typing_speed}}</b>
            </div>
            <div class="col-md-6 col-xs-12 divTableCell">
              Skill or knowledge:
              <b class="data-lab">{{$skills[0]->knowldge}}</b>
            </div>
            <div class="col-md-6 col-xs-12 divTableCell">
              Hobbies:
              <b class="data-lab">{{$skills[0]->hobbies}}</b>
            </div>
        </div>
       
       
         </div>
      </div>
      </div>
  </div>

  {{-- modal start --}}
   <div id="skillsModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
    	 <form id="form_skills" method="post" enctype="multipart/form-data">
    	 	{{csrf_field()}}
    	 	<input type="hidden" name="_id" id="_id" value="{{$id}}">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Skills</h4>
      </div>
      <div class="modal-body">
       
            <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
              <label for="name">Computer:</label>
              <input type="text" class="form-control" id="computer" name="computer" value="{{$skills[0]->computer}}">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group has-feedback has-success">
              <label for="name">Typing Speed:</label>
              <input type="text" class="form-control" id="typingspeed" name="typingspeed" value="{{$skills[0]->typing_speed}}">
              </div>
            </div>
        </div>
        
        <div class="row">
            
            <div class="col-sm-6">
              <div class="form-group">
              <label for="name">Skill or knowledge:</label>
              <input type="text" class="form-control" id="knowledge" name="knowledge" value="{{$skills[0]->knowldge}}">
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
              <label for="name">Hobbies:</label>
              <input type="text" class="form-control" id="hobbies" name="hobbies" value="{{$skills[0]->hobbies}}">
              </div>
            </div>
        </div>
        
       
       		
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info" >Update</button>
      </div>
      </form>
    </div>

  </div>
</div>
   {{-- end modal --}}
    </div>
  </div>
  
</div></div></div>

@endsection
@section('jquery')
<script src="{{ URL::asset('js/moment.min.js') }}"></script>
<script src="{{ URL::asset('js/wizard/jquery.bootstrap.wizard.min.js') }}"></script>
<script src="{{ URL::asset('js/wizard/form_wizard.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.timepicker.js') }}"></script>
<script src="{{ URL::asset('js/timerange/datepair.js') }}"></script>
<script src="{{ URL::asset('js/timerange/jquery.datepair.js') }}"></script>
<script src="{{ URL::asset('js/daterangepicker.js') }}"></script>
<script src="{{ URL::asset('js/sweetalert.min.js') }}"></script>
<script>
	$(function(){
		var branch_bool=false;
		  var designation_bool=false;

		  $('#p_dob, #dateofjoing').datepicker({
          autoclose: true,
          format: 'dd/mm/yyyy',
      }).on('change', function(e) {
        // `e` here contains the extra attributes
        
    });
             $('#workshift .workshift-time').timepicker({
                    'showDuration': true,
                    'timeFormat': 'H:i'
                }).on('changeTime', function() {
                  
                });
                var defaultDeltaExampleEl = document.getElementById('workshift');
                var defaultDeltaDatepair = new Datepair(defaultDeltaExampleEl, {
                    'defaultDateDelta': 1,
                    'defaultTimeDelta': 7200000
                });


        //get branch
    var _getBranch=function(_id){
      $.post('{{URL::to('/') }}/hr/employee/ajax/branch',
        {
          _id:_id,
          _token:$('meta[name="csrf-token"]').attr('content')
        },
        function(o){
          var _html='<option value="">Select</option>';
          for (var i in o){
            _html+='<option value="'+o[i].id+'">'+o[i].branch_name+'</option>';
          }
         $('#branch').html(_html);
         if(branch_bool==false){
         	setTimeout(function(){
         	 $('#branch').val("{{$data[0]->branch_id}}"); 
         	 branch_bool==true;
         }, 300);
         }
    },'json');
    }
    _getBranch('{{$data[0]->company_id}}');
    //get designation
    var _getDesignation=function(_id){
      
      $.post('{{URL::to('/') }}/hr/employee/ajax/designation',
        {
          _id:_id,
          _token:$('meta[name="csrf-token"]').attr('content')
        },
        function(o){
          var _html='<option value="">Select</option>';
          for (var i in o){
            _html+='<option value="'+o[i].id+'">'+o[i].designation_name+'</option>';
          }
         $('#designation').html(_html);
         if(designation_bool==false){
         	setTimeout(function(){
         	 $('#designation').val("{{$data[0]->designation_id}}"); 
         	 designation_bool==true;
         }, 300);
         }
    },'json');
    }
    _getDesignation('{{$data[0]->department_id}}');
    //
    $('body').on('change','#company',function(){
      _getBranch($(this).val());
    });
    $('body').on('change','#department',function(){
      _getDesignation($(this).val());
    });



		$('#form_persanal_details').submit(function(e){
          e.preventDefault();
                    var form = $('#form_persanal_details')[0]; 
                     var data = new FormData(form);
                     $.ajax({
                            url: '{{URL::to('/') }}/hr/employee/personal/update',
                            method: 'POST',
                            data: data,
                            success: function(data){
                              if(data.result){
                               sweetAlert("Personal Details Updated!",'' , "success");
                                 location.reload();
                              }else{
                                sweetAlert("Oops...",data.msg , "error");
                              }
                            },
                            error: function(xhr, status, error){
                            },
                            processData: false,
                            contentType: false
                        });
		});

		$('#form_company_details').submit(function(e){
          e.preventDefault();
                    var form = $('#form_company_details')[0]; 
                     var data = new FormData(form);
                     $.ajax({
                            url: '{{URL::to('/') }}/hr/employee/company/update',
                            method: 'POST',
                            data: data,
                            success: function(data){
                              if(data.result){
                               sweetAlert("Company Details Updated!",'' , "success");
                                 location.reload();
                              }else{
                                sweetAlert("Oops...",'' , "error");
                              }
                            },
                            error: function(xhr, status, error){
                            },
                            processData: false,
                            contentType: false
                        });
		});

		$('#form_address_correspondence').submit(function(e){
			e.preventDefault();
			$.post('{{URL::to('/') }}/hr/employee/address/update',$(this).serialize(),function(data){
                if(data.result){
                               sweetAlert("Address Updated!",'' , "success");
                                 location.reload();
                              }else{
                                sweetAlert("Oops...",'Error!' , "error");
                              }
			},'json');
		});

		$('#form_address_permanent').submit(function(e){
			e.preventDefault();
			$.post('{{URL::to('/') }}/hr/employee/address/update',$(this).serialize(),function(data){
                if(data.result){
                               sweetAlert("Address Updated!",'' , "success");
                                 location.reload();
                              }else{
                                sweetAlert("Oops...",'Error!' , "error");
                              }
			},'json');
		});
		$('#form_address_new').submit(function(e){
			e.preventDefault();
			$.post('{{URL::to('/') }}/hr/employee/address/new',$(this).serialize(),function(data){
                if(data.result){
                               sweetAlert("New Records Added!",'' , "success");
                                 //location.reload();
                              }else{
                                sweetAlert("Oops...",data.msg , "error");
                              }
			},'json');
		});
		
		$('#form_skills').submit(function(e){
			e.preventDefault();
			$.post('{{URL::to('/') }}/hr/employee/skills/update',$(this).serialize(),function(data){
                if(data.result){
                               sweetAlert("Skills Updated!",'' , "success");
                                 location.reload();
                              }else{
                                sweetAlert("Oops...",data.msg , "error");
                              }
			},'json');
		});

	})
</script>
@endsection