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

<form method="POST" action="{{URL::to('/') }}/admin/dsaWithdraw/details" data-parsley-validate>
  <div class="bg-light lter b-b wrapper-md">
    <h1 class="m-n font-thin h3">DSA Withdrawal Request</h1>
  </div>
  {{ csrf_field() }}
  <div class="wrapper-sm">
    <div class="row">
      <div class="col-sm-12">
        <div class="blog-post">                   
          <div class="panel panel-default">
            <div class="panel-heading ">                  
             DSA Withdrawal Details
            </div>
            <div class="panel-body">
              <div class="col-md-4 col-md-offset-4">
                <label>DSA Code</label><br>
                <input type="text" name="dsaCode" id="dsaCode" class="form-control" required data-parsley-required-message="Please Enter DSA code">
              </div>
              <div class="col-sm-12"><BR></div>
              <div class="col-md-5 col-md-offset-5">
                <button name="show" type="submit"  value="show" class="btn  btn-primary">show</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</form>
@if(isset($_REQUEST['show']))
  <div class="wrapper-md">
    <div class="panel panel-default">
      <div class="panel-heading ">DSA DETAILS</div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-10">
            <div class="row">
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-md-2">
                    <label><b>DSA CODE </b></label>
                  </div>
                  <div class="col-md-4">  
                    <label>  {{$dsaDetails->code}}</label>
                  </div>
                  <div class="col-md-2">
                    <label><b>Mobile No </b></label>
                  </div>
                  <div class="col-md-4">  
                    <label>  {{$dsaDetails->mobileId}} {{$dsaDetails->mobileNumber}}</label>
                  </div>
                </div>  
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-md-2">
                    <label><b>NAME </b></label>
                  </div>
                  <div class="col-md-4">  
                    <label>  {{$dsaDetails->name}}</label>
                  </div>
                  <div class="col-md-2">
                    <label><b>EMAIL</b></label>
                  </div>
                  <div class="col-md-4">  
                    <label>  {{$dsaDetails->email}}</label>
                  </div>
                </div>  
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-md-2">
                    <label><b>D O B </b></label>
                  </div>
                  <div class="col-md-4">  
                    <label>  {{$dsaDetails->dob}}</label>
                  </div>
                   <div class="col-md-2">
                    <label><b>Address </b></label>
                  </div>
                  <div class="col-md-4">  
                    <label>  {{$dsaAddress->address}}</label>
                  </div>
               </div>  
              </div>
            </div>
          </div>
          <div class="col-md-2">
            <div class="row">
            <img src="" style="width: 150px;height: 150px;" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading ">Heera Payment Details</div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-10">
            <div class="row">
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-md-2">
                    <label><b>Pay Mode </b></label>
                  </div>
                  <div class="col-md-4">  
                    <label>  {{$dsaDetails->code}}</label>
                  </div>
                  <div class="col-md-2">
                    <label><b>DD/CHEQUE/TRANSACTION No </b></label>
                  </div>
                  <div class="col-md-4">  
                    <label>  {{$dsaDetails->mobileId}} {{$dsaDetails->mobileNumber}}</label>
                  </div>
                </div>  
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-md-2">
                    <label><b>Deposit Date </b></label>
                  </div>
                  <div class="col-md-4">  
                    <label>  {{$dsaDetails->name}}</label>
                  </div>
                  <div class="col-md-2">
                    <label><b>Bank</b></label>
                  </div>
                  <div class="col-md-4">  
                    <label>  {{$dsaDetails->email}}</label>
                  </div>
                </div>  
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-md-2">
                    <label><b>Branch </b></label>
                  </div>
                  <div class="col-md-4">  
                    <label>  {{$dsaDetails->dob}}</label>
                  </div>
                   <div class="col-md-2">
                    <label><b>Heera's account no </b></label>
                  </div>
                  <div class="col-md-4">  
                    <label>  {{$dsaAddress->address}}</label>
                  </div>
               </div>  
              </div>
            </div>
          </div>
          <div class="col-md-2">
            <div class="row">
            <img src="" style="width: 150px;height: 150px;" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading ">FOR OFFICE USE ONLY
      </div>
      <div class="panel-body">
        <div class="col-md-4">
          <label><b> A/C Holders Name : <spam style="color:red;">*</spam> </b></label>
          <label>  {{$dsaDetails->code}}</label>
        </div>
        <div class="col-md-4">
          <label><b> Name Of Bank : <spam style="color:red;">*</spam></b></label>
          <label>  {{$dsaDetails->name}}</label>
        </div>
        <div class="col-md-4">
          <label><b>Date of birth : <spam style="color:red;">*</spam></b></label>
          <label>  {{$dsaDetails->dob}}</label>
        </div>
      </div>
      <div class="panel-body">
        <div class="col-md-4">
          <label><b>AC/No : <spam style="color:red;">*</spam></b></label>
          <label>  {{$dsaDetails->mobileId}} {{$dsaDetails->mobileNumber}}</label>
        </div>
        <div class="col-md-4">
          <label><b>  Branch : <spam style="color:red;">*</spam></b></label>
          <label>  {{$dsaAddress->address}}</label>
        </div>
        <div class="col-md-4">
          <label><b>  IFSC Code  : <spam style="color:red;">*</spam></b></label>
          <label>  {{$dsaAddress->address}}</label>
        </div>
      </div>
    </div>
  </div>
@endif

@endsection
@section('jquery')
<script type="text/javascript"></script>
@endsection