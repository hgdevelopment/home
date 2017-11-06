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
<style type="text/css">
  #installationForm .tab-content {
  margin-top: 20px;
  }
  #installationForm  .form-group {
  margin-right: 0px !important;
  margin-left: 0px !important;
  }
  .panel-heading.font-bold {
  padding-bottom: 17px;
  }
</style>
<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">Logs</h1> 
</div>
<div class="col-md-12"><br> 
  <div class="panel panel-default"> 
    <div class="panel-heading font-bold"></div>
    <div class="panel-body">
      <form id="installationForm" name="" method="POST" action="#" enctype="multipart/form-data" data-parsley-validate>
      {{ csrf_field() }}
        <div class="col-md-12">
          <div class="col-md-6">
            <div class="form-group">
              <label>Type:</label>
              <select class="form-control chosen-select" name="type" id="type" required data-parsley-required-message="Please Select User Type">{{-- ->whereNull('deleted_at') --}}
              <option value="">--Select--</option>
             
              @foreach($sql as $tables)
              <option value="{{$tables->type}}" @if($__env->yieldContent('type')==$tables->type) {{ 'selected' }} @endif>{{$tables->type}}</option>
              @endforeach
              </select>
            </div>
          </div>
          <div class="col-sm-3 text-center" style=" padding:2px 3px">
            <label>From Date:</label>
            <input class="form-control" data-date-end-date="0d" type="text" id="fromdate" name="fromdate" value="{{date('d/m/Y', strtotime("-30 days"))}}" readonly style="padding: 5px 7px !important">
          </div>
          <div class="col-sm-3" style="padding:2px 3PX"> 
            <label>To Date:</label>
            <input class="form-control" data-date-end-date="0d" type="text" id="todate" name="todate" value="{{date('d/m/Y')}}" readonly style="padding: 5px 7px !important">
          </div>
          <div class="col-md-1">
            <div class="form-group text-right "><br>
              <input type="submit" name="submit" value="Submit" class="btn btn-success">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  
    <div class="line line-dashed b-b line-lg pull-in"></div>
    <div class="col-md-12"><br></div>
    <div class="panel panel-default">
     <div class="panel-heading">
              View Logs
            </div>
            <div class="panel-body">
      <div class="table-responsive" style="overflow-x: initial;">
        <table  class="table " id="users-table" cellspacing="0" width="100%" id="log">
          <thead>
           
            <tr>
              <th>IP Address</th>
              <th>User</th>
              <th>Type</th>
              <th>Date</th>
              <th>Action</th>
            </tr>
          </thead> 
           
        </table>
      </div>
      </div>
    </div>
  
</div>
@endsection
@section('jquery')
<script type="text/javascript">
  $(function()
  {
    $('#fromdate, #todate').datepicker(
    {
      autoclose: true,
      format: 'dd/mm/yyyy',
    }); 
  }); 
</script>
<script type="text/javascript">
  
    var oTable = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        "searching": false,
        ajax: {
            url: '{{URL::to('/') }}/admin/logs/log',
            method:'post',
            data: function (d) {
                d._token="{{csrf_token()}}";
                d.from = $('input[name=fromdate]').val();
                d.to = $('input[name=todate]').val();
                d.type = $('select[name=type]').val();
            }
        },
        columns: [
            {data: 'ip_address', name: 'ip_address'},
            {data: 'username', name: 'username'},
            {data: 'type', name: 'type'},
            {data: 'create_date', name: 'create_date'},
            {data: 'actions', name: 'actions'}
             
        ]
    });

    $('#installationForm').on('submit', function(e) {
        oTable.draw();
        e.preventDefault();
    });
    

</script>
<script type="text/javascript">
  function destroy(id)
    {
    swal(
      {
        title: "Delete!!!",
        text: "Are you sure?",
        type: "error",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55", 
        confirmButtonText: "Delete Log!",
        closeOnConfirm: true
      },  
      function (isConfirm) 
      {
        if(isConfirm) 
        {
          $.ajax({
          url: "{{URL::to('/') }}/admin/logs/log/"+id,
          type: "delete",
          data: {"_token": "{{ csrf_token() }}"},
          success: function (data) 
            {   
              window.location.reload(true);
            },
          });
        }
        else
        {
          swal("cancelled","", "error");
        }
      });
    }
</script> 
@endsection



