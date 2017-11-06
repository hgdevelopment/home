@extends('layout.erp')
@section('banner')
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
   <img src="{{url('/')}}/new_heading.png" class="img-responsive">
</div>
@endsection
@section('sidebar')
@include('partial.header')
@include('partial.aside')
@endsection
@section('body')
<style type="text/css">
   .sticky{
   background: #eaffe4;
   margin: 10px;
   box-shadow: 0px 3px 3px 0px rgba(0, 0, 0, 0.23);
   padding: 5px;
   }
    .sticky2{
   background: #ffeeb5;
   margin: 10px;
   box-shadow: 0px 3px 3px 0px rgba(0, 0, 0, 0.23);
   padding: 5px;
   }
</style>
<div class="bg-light lter b-b wrapper-md">
   <h1 class="m-n font-thin h3">Benefit Declaration</h1>
</div>
@foreach($tcnmaster as $tcnmasters)
<div class="col-md-3 sticky" id="tcndiv{{$tcnmasters->id}}">
   <img style="float: right" src="https://png.icons8.com/pin/office/30" title="Pin" width="20" height="20">
   <h4 class="font-thin m-t-none m-b">{{$tcnmasters->tcnType}}</h4>
   <div class="">
      <div class="">
         <span>INR: {{$tcnmasters->inr}}</span>
      </div>
      <div class="">
         <span>AED: {{$tcnmasters->aed}}</span>
      </div>
      <div class="">
         <span>SAR: {{$tcnmasters->sar}}</span>
      </div>
      <div class="">
         <span>CAD: {{$tcnmasters->cad}}</span>
      </div>
      <div class="">
         <span>USD: {{$tcnmasters->usd}}</span>
      </div>
      <div class="">
         <span>Locking period: {{$tcnmasters->benefitLockingDuration}}</span>
      </div>
      <br>
      <form id="form{{$tcnmasters->id}}">
        <input type="hidden" name="tcnType" value="{{$tcnmasters->id}}">
      
      <a class="btn btn-success" id='tcn{{$tcnmasters->id}}'>Generate</a>
      </form>
   </div>
</div>

@endforeach

<div class="col-md-12"><br></div>
@foreach($tcnmaster as $tcnmasters)
<div class="col-md-12" id="tobegenerate{{$tcnmasters->id}}">

</div>
@endforeach

@endsection
@section('jquery')
<script type="text/javascript">
   $('#update').hide();
   
   @php $i=0; @endphp
   @foreach($tcnmaster as $tcnmasters)
           @php $a[]=0; $a[$i]=$tcnmasters->id; $i++; @endphp
   @endforeach
   
   @php 
   $count = count($a);
   $i=0;
   while($i<$count){ $j=0;
   @endphp
             $('#tcn{{$a[$i]}}').click(function() {
                  @php 
                  while($j<$count){
                  
                  @endphp 
                  $('#tcndiv{{$a[$j]}}').addClass('animated zoomOut');
                   setTimeout(function () {
                  $('#tcndiv{{$a[$j]}}').hide();
                  }, 1000);
                  @php    
                  @endphp 
                  @php     
                  $j++; }
                  @endphp 
                   setTimeout(function () {
                  $('#tcndiv{{$a[$i]}}').show();
                  $('#tcndiv{{$a[$i]}}').removeClass('animated zoomOut');
                  $('#tcndiv{{$a[$i]}}').addClass('animated zoomIn');
                   }, 1000);
                  $('#tcn{{$a[$i]}}').hide();
            });
   @php          
   $i++; }
   @endphp

  
@foreach($tcnmaster as $tcnmasters)
   $('#tcn{{$tcnmasters->id}}').click(function(event) {
   $('#tcn{{$tcnmasters->id}}').addClass('animated bounce infinite');
   var data = $('#form{{$tcnmasters->id}}').serialize();
   $.ajax({
            type: "get",
            url: "{{URL::to('/')}}/admin/benefit/tobegenerate",
            data: data,
            cache: false,
            success: function(result){
               if(result != 0){
                setTimeout(function () {
                $('#tobegenerate{{$tcnmasters->id}}').html(result);
                }, 1000);
                setTimeout(function () {
                      
                }, 5000);
               }
            }
          });


  });
@endforeach


    
</script>
@endsection