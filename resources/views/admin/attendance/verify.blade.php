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
<style type="text/css">
    .leave{
    background-color: #ffe4e2;
    padding-right: 20px;
    padding-top: 20px;
    }
    .holiday{
    background-color: #dcc8ff;
    padding-right: 20px;
    padding-top: 20px;
    }
    .fullday{
    background-color: #ddfbbb;
    padding-right: 20px;
    padding-top: 20px;

    }
    .halfday{ 
    background-color: #fffaca;
    padding-top: 20px;
    padding-right: 20px;
    }
</style>
      <div class="col-md-12" align="left"> 

     

      <div class="col-sm-6" style="margin-top: 10px;">
          <div class="panel panel-default" style="border: none;">
            <div class="panel-heading">
              <div class="clearfix">
                <div class="clear">
                  <div class="h3 m-t-xs m-b-xs">
                    Weekoff Requests
                  </div>
                 
                </div>
              </div>
            </div>
            <form action="{{URL::to('admin/attendance/approve')}}" method="post">
              {{csrf_field()}}
            <div class="list-group no-radius alt">
              
              @foreach($reviews as $review)
              <li class="list-group-item">
                <input type="checkbox" name="list[]" value="{{$review->id}}" > 
                {{$review->staff->name}} is Requested for <strong>{{$review->requestto}}</strong> on <strong>{{$review->date}}</strong>
                <span class="editt" style="border: 1px solid #d4d4d4;border-radius: 3px;padding:0px 3px;" data-toggle="modal" data-target="#myModal{{$review->$id}}">info</span>
              </li>

              <div class="modal fade" id="myModal{{$review->$id}}" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Request from {{$review->staff->name}} </h4>
                    </div>
                    <div class="modal-body">
                     {{$review->note}} 
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                  
                 </div>
                 </div>

              @endforeach
            </div>
            <button name="mode" value="approve" class="btn btn-success">Approve</button>
            <button name="mode" value="reject" class="btn btn-danger">Reject</button>
            </form>
          </div>
         
        </div>


       </div>

@endsection

@section('jquery')
<script>
  $('#form').parsley();
  $('#form1').parsley();
</script>			
@endsection