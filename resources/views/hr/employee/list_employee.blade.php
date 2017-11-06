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
</style>
<div class="bg-light lter b-b wrapper-md">
    <h1 class="m-n font-thin h3">Employee</h1>
  </div>
  <div class="wrapper-md" >
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-warning">
        	<div class="panel-heading">List</div>
        	<div class="panel-body">
                <form method="POST" id="search-form" class="form-inline" role="form">

            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="search name">
            </div>
            <div class="form-group">
                <label for="name">Code</label>
                <input type="text" class="form-control" name="code" id="code" placeholder="search code">
            </div>
            <div class="form-group">
                <label for="email">Employee Type</label>
                <select name="usertype" id="usertype" class="form-control">
                    <option value="All">All</option>
                    <option value="OI">Office Incharge</option>
                    <option value="ME">Marketing Executive</option>
                    <option value="EMP">Employee</option>
                </select>
                
            </div>
            <div class="form-group">
                <label for="email">Status</label>
                <select name="status" id="status" class="form-control">
                    <option value="">Select</option>
                    <option value="Active">Active</option>
                    <option value="Resigned">Resigned</option>
                    <option value="Terminated">Terminated</option>
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        		<table class="table" id="users-table">
        			<thead>
        				<tr>
                            {{-- <th>#</th> --}}
        					<th>Code</th>
                            <th>Name</th>
                            <th>Company</th>
                            <th>Branch</th>
                            <th>Department</th>
                            <th>Designation</th>
                            <th>User Type</th>
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
<script src="{{ URL::asset('js/moment.min.js') }}"></script>
<script src="{{ URL::asset('js/wizard/jquery.bootstrap.wizard.min.js') }}"></script>
<script src="{{ URL::asset('js/wizard/form_wizard.js') }}"></script>
<script src="{{ URL::asset('js/bootstrap-datepicker.min.js') }}"></script>
<script src="{{ URL::asset('js/jquery.timepicker.js') }}"></script>
<script src="{{ URL::asset('js/timerange/datepair.js') }}"></script>
<script src="{{ URL::asset('js/timerange/jquery.datepair.js') }}"></script>
<script src="{{ URL::asset('js/daterangepicker.js') }}"></script>
<script src="{{ URL::asset('js/sweetalert.min.js') }}"></script>
<script type="text/javascript">
	
    var oTable = $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        "searching": false,
        ajax: {
            url: '{{URL::to('/') }}/hr/employee/datatable_employee',
            data: function (d) {
                d.name = $('input[name=name]').val();
                d.code = $('input[name=code]').val();
                d.usertype = $('select[name=usertype]').val();
                d.status = $('select[name=status]').val();
            }
        },
        columns: [
            // {data: 'rownum', name: 'rownum'},
            {data: 'code', name: 'code'},
            {data: 'name', name: 'name'},
            {data: 'company', name: 'company'},
            {data: 'branch', name: 'branch'},
            {data: 'department', name: 'department'},
            {data: 'designation', name: 'designation'},
            {data: 'usertype', name: 'usertype'},
             { data: 'action', name: 'action' }
        ]
    });

    $('#search-form').on('submit', function(e) {
        oTable.draw();
        e.preventDefault();
    });
    $('body').on('click','.view-employee',function(e){
          e.preventDefault();
          window.location.href="{{URL::to('/')}}/hr/employee/view/"+$(this).attr('data-id');
        });

</script>
@endsection