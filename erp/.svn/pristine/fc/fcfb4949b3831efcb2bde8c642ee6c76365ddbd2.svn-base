@extends('admin.layout.erp1')
@section('banner')
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
   <img src="{{ URL::asset('new_heading.png') }}" class="img-responsive">
</div>
@endsection
 <link href="{{ URL::asset('css/sweetalert.css') }}" rel="stylesheet">
@section('sidebar')
@include('admin.partial.header')
@include('admin.partial.aside')
@endsection
@section('body')
  <div class="bg-light lter b-b wrapper-md">
    <h1 class="m-n font-thin h3">DSA Withdrawal Request</h1>
    <h6 class="m-n font-thin h5">List DSA Withdrawal Request.</h6>
  </div>
  <div class="wrapper-md">
    <div class="line line-dashed b-b line-lg pull-in"></div>
    <div class="col-md-12"><br></div>
    <div class="panel panel-default">
      <div class="table-responsive" style="overflow-x: initial;">
        <table class="table table-striped b-t" id="dsaRequest">
          <thead>
            <div class="panel-heading">
              View Dsa Withdrawal
            </div>
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
             <td>
             <a href="{{ URL::to('/') }}/admin/dsaWithdraw/{{ $dsas->userId}}/edit"  class="active"><i  style="color: #018001;" class="fa fa-search text-success text-active" aria-hidden="true"></i></a>
            </tr>
            @endforeach
          </tbody>
        </table>
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
@if (Session::has('sweet_alert.alert'))
  <script>
    swal
    ({
      text: "{!! Session::get('sweet_alert.text') !!}",
      title: "{!! Session::get('sweet_alert.title') !!}",
      timer: {!! Session::get('sweet_alert.timer') !!},
      type: "{!! Session::get('sweet_alert.type') !!}",
      @php Session::forget('sweet_alert');@endphp
    });
  </script>
@endif
@endsection