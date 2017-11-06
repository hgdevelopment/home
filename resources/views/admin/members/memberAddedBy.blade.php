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
    <h1 class="m-n font-thin h3">View Members</h1>
    <h6 class="m-n font-thin h5"></h6>
  </div>
  <div class="wrapper-md">
    <div class="line line-dashed b-b line-lg pull-in"></div>
    <div class="col-md-12"><br></div>
    <div class="panel panel-default">
     <div class="panel-heading">
              View members under the executives.
            </div>
          <div class="panel-body">
          <div class="row">
      <div class="table-responsive" style="overflow-x: initial;padding: 7px;">
        <table  class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="viewRequest">
          <thead>
           
            <tr>
              <th>Sl No</th>
              <th>Code</th>
              <th>Name</th>
              <th>Email</th>
              <th>Applied Date</th> 
              <th>View Profile</th>
              <th>TCN</th>  
            </tr> 
          </thead> 
          <tbody>
            @foreach($addedmember as $key => $viewmembers)
              <tr>
                <td>{{ $key+1 }}</td>
                <td>{{ $viewmembers->code }}</td>
                <td>{{ $viewmembers->name }}</td>
                <td>{{ $viewmembers->email }}</td>
                <td>{{ date("Y-m-d",strtotime($viewmembers->addedByDate)) }}</td>
                <td>
                <a href="{{ URL::to('/') }}/admin/added/{{ $viewmembers->userId }}"  class="active"><i style="color: #018001;" class="fa fa-eye" aria-hidden="true"></i></a>
                </td> 
                <td>
                <a href="{{ URL::to('/') }}/admin/added/{{ $viewmembers->userId }}/memberAccount"  class="active"><i style="color: #018001;" class="fa fa-eye" aria-hidden="true"></i></a>
                </td> 
              </tr>
            @endforeach
          </tbody>
        </table>
        </div>
        </div>
      </div>
    </div>
  </div>
@endsection
@section('jquery')
<script type="text/javascript">
  $(document).ready(function()
  {
  $('#viewRequest').DataTable();
  });
</script>
@endsection