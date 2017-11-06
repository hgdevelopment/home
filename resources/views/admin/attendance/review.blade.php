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
    border-bottom: 2px solid red;
    }
    .holiday{
    border-bottom: 2px solid yellow;
    }
    .fullday{
    border-bottom: 2px solid green;
    }
    .halfday{
    border-bottom: 2px solid skyblue;
    }
    .editt{
        float: right;
    }
    .editt:hover{
        float: right;
        font-weight: bold;
        cursor: pointer;
    }
</style>


      
       
      <!-- streamline -->

      <div class="col-sm-6" style="margin-top: 10px;">
          <div class="panel panel-default" style="border: none;">
            <div class="panel-heading">
              <div class="clearfix">
                <div class="clear">
                  <div class="h3 m-t-xs m-b-xs">
                   October 2017 so far,
                  </div>
                 
                </div>
              </div>
            </div>
          
            <div class="list-group no-radius alt">

                @php $count = count($dates);$i=0; @endphp
                @while ($i<$count)
                @php $date = Carbon::parse($dates[$i][0]); @endphp
               @if($dates[$i][1]!='')
                <li class="list-group-item ">
               {{$date->format('l jS \\of F')}} 
               @if($dates[$i][2]>0) <span style="color: green;border: 1px solid #d4d4d4;border-radius: 3px;padding:0px 3px;">{{$dates[$i][2]}}</span> @endif
               @if($dates[$i][3]>0) <span style="color: red;border: 1px solid #d4d4d4;border-radius: 3px;padding:0px 3px;">{{$dates[$i][3]}}</span> @endif
               <span style="color: black;border: 1px solid #d4d4d4;border-radius: 3px;padding:0px 3px;float: left;margin-right:3px; ">{{$dates[$i][1]}}</span>
               <span class="editt {{$dates[$i][1]}}" style="border: 1px solid #d4d4d4;border-radius: 3px;padding:0px 3px;" data-toggle="modal" data-target="#myModal{{$dates[$i][4]}}">Edit</span>
                </li>
                @endif

                <!-- Modal -->
                <div class="modal fade" id="myModal{{$dates[$i][4]}}" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Request for Change</h4>
                    </div>
                    <div class="modal-body">
                      <h4>DATE : {{$date->format('l jS \\of F')}} </h4>
                      <form method='post' action='{{URL::to('admin/attendance/change')}}'>
                      {{csrf_field()}}
                        <label>Select one option</label>
                        <select class='form-control' name='change'>
                          <option>Weekoff</option>
                          <option>Religion Holiday</option>
                        </select>
                        <input type="hidden" value='{{$date->format('Y-m-d')}}' name='date'>
                        <input type="hidden" value='{{$dates[$i][5]}}' name='id'><br>
                        <textarea class="form-control"  placeholder="Write more details..." name="note"></textarea><br><br>
                        <button type='submit' class="btn btn-primary" >Submit</button>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                  
                 </div>
                 </div>
                <!-- Modal End-->

                 @php $i++;  @endphp
                 @endwhile
        



            </div>
          
          </div>
         
       </div>
       
 
      <!-- / streamline -->
  
           


       

@endsection

@section('jquery')
<script>
  $('#form').parsley();
  $('#form1').parsley();
</script>			
@endsection