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
  <h1 class="m-n font-thin h3">Generate Incentive</h1>
</div>

<div class="wrapper-md ng-scope" ng-controller="FlotChartDemoCtrl">
      <!-- stats -->
      <div class="row">
        <div class="col-md-12">
          <div class="row row-sm text-center">
            <div class="col-xs-2">
              <a href="" class="block panel padder-v bg-primary item">
                <span class="text-white font-thin h1 block">{{$currency['INR']}}</span>
                <span class="text-muted text-xs">INR</span>
                <span class="bottom text-right w-full">
                  <i class="fa fa-cloud-upload text-muted m-r-sm"></i>
                </span>
              </a>
            </div>
            <div class="col-xs-2">
              <a href="" class="block panel padder-v bg-primary item">
                <span class="text-white font-thin h1 block">{{$currency['AED']}}</span>
                <span class="text-muted text-xs">AED</span>
                <span class="bottom text-right w-full">
                  <i class="fa fa-cloud-upload text-muted m-r-sm"></i>
                </span>
              </a>
            </div>
            <div class="col-xs-2">
              <a href="" class="block panel padder-v bg-primary item">
                <span class="text-white font-thin h1 block">{{$currency['USD']}}</span>
                <span class="text-muted text-xs">USD</span>
                <span class="bottom text-right w-full">
                  <i class="fa fa-cloud-upload text-muted m-r-sm"></i>
                </span>
              </a>
            </div>
            <div class="col-xs-2">
              <a href="" class="block panel padder-v bg-primary item">
                <span class="text-white font-thin h1 block">{{$currency['SAR']}}</span>
                <span class="text-muted text-xs">SAR</span>
                <span class="bottom text-right w-full">
                  <i class="fa fa-cloud-upload text-muted m-r-sm"></i>
                </span>
              </a>
            </div>
            <div class="col-xs-2">
              <a href="" class="block panel padder-v bg-primary item">
                <span class="text-white font-thin h1 block">{{$currency['CAD']}}</span>
                <span class="text-muted text-xs">CAD</span>
                <span class="bottom text-right w-full">
                  <i class="fa fa-cloud-upload text-muted m-r-sm"></i>
                </span>
              </a>
            </div>
            
          </div>
        </div>
      </div>


      <div class="row">
      	<div class="col-md-12">
      		<div class="panel panel-default">
    <div class="panel-heading font-bold">                  
      Declare Incentive
    </div>
    <div class="panel-body">
      <form  role="form" method="post" action="{{URL::to('/') }}/admin/generate_incentive" id="generate_incentive" data-parsley-validate="">
      {{csrf_field()}}
        <div class="form-group col-sm-4">
          <label  for="month_year"> Select Month: </label>
          <input type="text" class="form-control" id="month_year" name="month_year" placeholder="mm/yyyy" required>
        </div>
        <div class="form-group col-sm-4">
          <label  for="usertype"> User Type: </label>
          <select  class="form-control" id="usertype" name="usertype" required>
          <option value="">Select</option>
          <option value="DSA">DSA</option>
          <option value="ME">ME</option>
          </select>
        </div>
        <div class="form-group col-sm-4">
         <br/>
        <button type="submit" class="btn btn-default">Generate</button>
        </div>
      </form>
    </div>
  </div>
      	</div>
      </div>

      <div class="row">
        <div class="col-md-12">

        <div class="panel panel-default">
    <div class="panel-heading">
      Monthly Report
    </div>
    <div class="table-responsive">
      <table class="table table-bordered" id="users-table">
        <thead>
            <tr>
                <th>Generated Month</th>
                <th>User Type</th>
                <th>Created At</th>
                <th>Action</th>
            </tr>
        </thead>
    </table>
       
      
  </div>
  </div>
           
        </div>
      </div>

</div>

@endsection

@section('jquery')
<script >
$(function(){
	$('#month_year').datepicker({
    format: "mm/yyyy",
    viewMode: "months", 
    minViewMode: "months",
    autoclose:true
});

   var table = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('generate_incentive.datatbale') !!}',
        columns: [
            { data: 'created_date', name: 'created_date' },
            { data: 'employeeType', name: 'employeeType' },
            { data: 'created_at_re', name: 'created_at_re' },
            { data: 'action', name: 'action', orderable: false, searchable: false}
        ]
    });
  $('#generate_incentive').submit(function(e){
    e.preventDefault();
    $.post($(this).attr('action'),$(this).serialize(),function(o){
       if(o.result==true){
          sweetAlert("Oops...", o.message, "success");
          table.ajax.reload();
       }else{
          sweetAlert("Oops...", o.message, "error");

       }
    },'json');
  });
  $(document).on('click','.report-btn-view',function(e){
     e.preventDefault();
     var baseURL="{{URL::to('/') }}";
     window.location.href=baseURL+'/admin/report_incentive/'+$(this).attr('data-id');
  });
  $(document).on('click','.report-btn-excel',function(e){
     e.preventDefault();
     var baseURL="{{URL::to('/') }}";
     window.location.href=baseURL+'/admin/report_incentive_dsa_all/downloadExcel/'+$(this).attr('data-id');
  });
})
</script>
@endsection