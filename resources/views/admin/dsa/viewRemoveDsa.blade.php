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
    <h1 class="m-n font-thin h3">View Blacklist DSA</h1>
    <h6 class="m-n font-thin h5">{{-- Search DSA by Name or DSACode or DSA Company Name --}}.</h6>
  </div>
  <div class="wrapper-md">
    <div class="line line-dashed b-b line-lg pull-in"></div>
    <div class="col-md-12"><br></div>
    <div class="panel panel-default">
       <div class="panel-heading">
              View Dsa
            </div>
            <div class="panel-body">
            <div class="row">
      <div class="table-responsive" style="overflow-x: initial;padding: 7px;">
        <table class="table table-striped table-bordered dt-responsive nowrap b-t" cellspacing="0" width="100%" id="dsaRequest">
          <thead>
         
            <tr>
              <th>Sl No</th>
              <th>Name</th>
              <th>DSA Code</th>
              <th>MobileNumber</th>
              <th>View</th>
            </tr>
          </thead>
          <tbody>
          @foreach($dsa as $key => $dsas)
            <tr>
             <td>{{ $key+1 }}</td>
             <td>{{ $dsas->name }}</td>
             <td>{{ $dsas->code }}</td>
             <td>{{ $dsas->mobileNumber }}</td>
             <td><a href="{{ URL::to('/') }}/admin/dsaApprove/{{ $dsas->userId}}/removeDsa"  class="active"><i  style="color: #018001;" class="fa fa-search text-success text-active" aria-hidden="true"></i></a></td>
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
  $(document).ready(function(){
  $('#dsaRequest').DataTable();
});
</script>
@endsection