@extends('admin.layout.erp')
{{-- @section('banner')
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
   <img src="{{ URL::asset('new_heading.png') }}" class="img-responsive">
</div>
@endsection --}}
@section('sidebar')
@include('admin.partial.header')
@include('admin.partial.aside')
@endsection
@section('body')
<div class="bg-light lter b-b wrapper-md">
   <h1 class="m-n font-thin h3">Dashboard</h1>
</div>
<div id="content"  role="main">
    <input type="hidden" id="timeid" value="{{$time}}">
   <div class="app-content-body ">
      <div class="col-md-3" id="t1" style="display: none;">
         <br>
         <div class="col-md-12 tiles" align="center" > 
            <h4>TIME IN</h4>
            <h4>{{$date}}</h4>
            <h2 id="time1">...</h2>
            <form action="{{URL::to('admin/attendance/1')}}" method="post">
               {{csrf_field()}}
               <button type="submit" class="btn btn-success btn-block"  name='time' value="1">Register Attendance</button><br>
            </form>
         </div>
      </div>
      <div class="col-md-3" id="t2" style="display: none;">
         <br>
         <div class="col-md-12 tiles" align="center" > 
            <h4>BREAK OUT</h4>
            <h4>{{$date}}</h4>
            <h2 id="time2">...</h2>
            <form action="{{URL::to('admin/attendance/2')}}" method="post">
               {{csrf_field()}}
               <button type="submit" class="btn btn-success btn-block"   name='time' value="2">Register Attendance</button><br>
               <button type="submit" class="btn btn-primary btn-block"   name='time' value="skip">Skip Break</button><br>
            </form>
         </div>
      </div>
      <div class="col-md-3" id="t3"  style="display: none;">
         <br>
         <div class="col-md-12 tiles" align="center"> 
            <h4>BREAK IN</h4>
            <h4>{{$date}}</h4>
            <h2 id="time3">...</h2>
            <form action="{{URL::to('admin/attendance/3')}}" method="post">
               {{csrf_field()}}
               <button type="submit" class="btn btn-success btn-block"   name='time' value="3">Register Attendance</button><br>
            </form>
         </div>
      </div>
      <div class="col-md-3" id="t4"  style="display: none;">
         <br>
         <div class="col-md-12 tiles" align="center"> 
            <h4>TIME OUT</h4>
            <h4>{{$date}}</h4>
            <h2 id="time4">...</h2>
          
               <button class="btn btn-success btn-block" id="add" data-toggle="modal" data-target="#exampleModal" >Register Attendance</button><br>
           
         </div>
      </div>

      <div class="col-md-12" id="t5">
         <br>
         <div class="col-md-12 tiles" align="center">
            <h3>Attendance Registered successfully</h3>
         </div>
      </div>


    
{{-- MODAL --}}
 <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
     <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="exampleModalLabel">Choose Your Shift</h4>
      </div> 
      <div class="modal-body">
         <form action="{{URL::to('admin/attendance/4')}}" method="post">
           {{csrf_field()}}
          <div class="form-group">

            @foreach($shifts as $shift)
    
            <div class="checkbox">
              <label class="i-checks">
                <input type="radio" value="{{ $shift->id }}" name="shift">
                <i></i>
               {{ $shift->shift_name }} - {{ $shift->time_in }} to {{ $shift->time_out }} (Break : {{ $shift->break_time }} )
              </label>
            </div>

            @endforeach

           
            </div>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info" name="time" value="4">Submit</button>
      </div>
      </form>
    </div>
  </div>
</div>
{{-- MODAL END --}}

      <div class="col-md-12"><br></div>
   </div>
</div>
<!-- /content -->
@endsection
@section('jquery')
<script>
  $('#t5').hide();
   setInterval(function(){ 
     var today = new Date();
     var h = today.getHours();
     var m = today.getMinutes();
     var s = today.getSeconds();
     m = checkTime(m);
     s = checkTime(s);
     document.getElementById('time1').innerHTML = h + ":" + m + ":" + s;
     document.getElementById('time2').innerHTML = h + ":" + m + ":" + s;
     document.getElementById('time3').innerHTML = h + ":" + m + ":" + s;
     document.getElementById('time4').innerHTML = h + ":" + m + ":" + s;
     var t = setTimeout(startTime, 500);
   }, 1000);
   function checkTime(i) {
     if (i < 10) {i = "0" + i};  // add zero in front of numbers < 10
     return i;
   }

   var timeid = $('#timeid').val();

   switch(timeid) {
    case '1':
        $('#t1').hide();
        $('#t3').hide();
        $('#t2').show();
        $('#t4').hide();
        break;
    case '2':
        $('#t2').hide();
        $('#t1').hide();
        $('#t4').hide();
        $('#t3').show();
        break;
    case '3':
        $('#t2').hide();
        $('#t1').hide();
        $('#t3').hide();
        $('#t4').show();
        break;
    case '4':
        $('#t2').hide();
        $('#t1').hide();
        $('#t3').hide();
        $('#t4').hide();
        $('#t5').show();
        break;
    case '0':
        $('#t2').hide();
        $('#t3').hide();
        $('#t4').hide();
        $('#t1').show();
        break;

    
}


   
 
   
</script>
@endsection