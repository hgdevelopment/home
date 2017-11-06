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

<form method="POST" action="{{URL::to('/') }}/admin/partialWithdraw/viewData" >
   {{ csrf_field() }}
   <div class="bg-light lter b-b wrapper-md">
    <h1 class="m-n font-thin h3">Partial Withdrawal Request</h1>
  </div>
    @if (Session()->has('message'))
        <div class="alert alert-info fade in alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong>Info!</strong> {{Session()->get('message')}}
        </div>
    @endif
  <!-- <form method="GET"> -->
 
  {{-- {{ method_field('PUT') }}
  --}}
  <div class="col-md-12">
  <div class="col-md-4"></div>
  <div class="col-md-4"><br>
    <label>Member Code</label><br>
    <input type="text" name="member_code" id="member_code" class="form-control">
  </div>
  <div class="col-md-12"><br></div>
  <div class="col-md-4"></div>
  <div class="col-md-4">
    <button name="show" type="submit"  value="show" class="btn btn-sm btn-block btn-primary">show</button>   <br>
  </div>
</form>

@if($count>0)
  <div class="wrapper-md">
  <div class="line line-dashed b-b line-lg pull-in"></div>
  <div class="col-md-12"><br></div>
    <div class="panel panel-default">
      <div class="panel-heading ">                  
      Personal Details
      </div>
          <div class="panel-body">
        <div class="col-md-4">
          <label><b>MEMBER CODE:</b></label>
          <label>{{$datas->code}}</label>
        </div>
        <div class="col-md-4">
          <label><b>NAME:</b></label>
          <label>{{$datas->name}}</label>
        </div>
        <div class="col-md-4">
          <label><b>FATHER'S / HUSBAND'S NAME:</b></label>
          <label>{{$datas->guardian}}</label>
        </div>
      </div>
      <div class="panel-body">
        <div class="col-md-4">
          <label><b>DATE OF BIRTH:</b></label>
          <label>{{$datas->dob}}</label>
        </div>
        <div class="col-md-4">
          <label><b>MARITAL STATUS:</b></label>
          <label>{{$datas->maritalStatus}}</label>
        </div>
     
      </div>
    </div>
  <br>
<div class="panel panel-default">
<div class="panel-heading font-bold"> ACTIVE TCN</div>
  <div class="panel-body">
    <div class="row">
      <div class="table-responsive">
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="emp" style="border:none;">
          <thead>
            <tr>
            <th>Sl No</th>
          
            <th>Tcn Name</th>
            <th>Applied Units</th>
            <th>Balance Units</th>
            <th>Applied Amount</th>
            <th>Currrency</th>
            <th>Approved Date </th>
            <th>Actions</th>
            </tr>
          </thead>
          <?php $sl=1;?>
          <tbody>
         
            <tr>
              <td>{{$sl++}}</td>
              <td>{{$datas->tcnType}}</td>
              <td>{{$datas->unit}}</td>
              <td>{{$unit}}</td>
              <td>{{$datas->amount}}</td>
              <td>{{$datas->currencyType}}</td>
              <td>{{$datas->approvalDate}}</td>
              <td><a href="{{ url('/admin/partialWithdraw',$datas->id) }}" class="btn btn-danger" >withdraw</a></td>
            </tr>
      
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div> 
@endif
@endsection
@section('jquery')
<script type="text/javascript">

  $(document).ready(function(){
        $('#emp').DataTable();
        });
      
</script>

@endsection