
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
<link href="{!! asset('css/sweetalert.css') !!}" media="all" rel="stylesheet" type="text/css" />
<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">Member's Account</h1>
</div><br>
<form  method="post"  id="form" data-parsley-validate action="{{URL::to('/') }}/admin/account/store">
  {{csrf_field()}}
  @if (Session()->has('message'))
    <div class="alert alert-info fade in alert-dismissable">
      <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
      <strong>Info!</strong> {{Session()->get('message')}}
    </div>
  @endif
  <div class="wrapper-sm">
    <div class="row">
      <div class="col-sm-12">
        <div class="blog-post">                   
          <div class="col-sm-12">
            <div class="panel panel-default">
              <div class="panel-heading ">                  
               View account details of TCN members
              </div>
              <div class="panel-body">
                <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                <div class="col-sm-6">
                  <label>Search By</label>
                  <select name="search" id="search" style="width:150px;">
                  <option value="">-Select-</option>
                  <option value="name">Name</option>
                  <option value="mob">Mobile Number</option>
                  <option value="memcod">Member Code</option>
                  <option value="tans_id">Transaction Id</option>
                  <option value="email">Email ID</option>
                  </select> 
                </div>
                <div class="col-sm-6">
                  <label></label><br><br>
                  <input type="submit"  name="submit" id="submit"  value="Submit"  class="btn btn-sm btn-success">
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  </form>
@if (isset($_REQUEST['submit']))
  <div class="wrapper-md">
      <div class="line line-dashed b-b line-lg pull-in"></div>
      <div class="col-md-12"><br></div>
      <div class="panel panel-default">
        <div class="table-responsive" style="overflow-x: initial;">
            <table class="table table-striped b-t" id="viewRequest">
              <thead>
                  <div class="panel-heading">
                    View account details of TCN members
                  </div>
                  <tr>
                    <td width="15px" align="center"><strong>Sl.</strong></td>
                    <td width="200px" align="center"><strong>Code</strong></td>
                    <td width="300px" align="center"><strong>Member Name</strong></td>
                    <td width="500px" align="center"><strong>Member email</strong></td>
                    <td width="50px" align="center"><strong>View</strong></td>
                  </tr>
             </thead>
              <tbody>
                  @foreach($accountlogin as $key => $accountlogins)
                    <tr>
                      <td>{{ $key+1 }}</td>
                      <td>{{ $accountlogins->code }}</td>
                      <td>{{ $accountlogins->name }}</td>
                      <td>{{ $accountlogins->email }}</td>
                      <td>{{ date("Y-m-d",strtotime($accountlogins->addedByDate)) }}</td>
                      <td>
                      <a href="{{ URL::to('/') }}/admin/account/{{ $accountlogins->userId }}/show"  class="active"><i style="color: #018001;" class="fa fa-eye" aria-hidden="true"></i></a>
                      </td> 
                    </tr>
                  @endforeach
              </tbody>
            </table>
        </div>
      </div>
  </div>
  @endif
  @endsection
@section('jquery')
<script type="text/javascript">
  $(document).ready(function()
  {
  $('#viewRequest').DataTable();
  });
</script>
@endsection
