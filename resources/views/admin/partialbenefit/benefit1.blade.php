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
  .sticky{
    background: #eaffe4;
    margin: 10px;
    box-shadow: 0px 3px 3px 0px rgba(0, 0, 0, 0.23);
    padding: 5px;
  }
</style>
<div class="bg-light lter b-b wrapper-md">
   <h1 class="m-n font-thin h3">Benefit Declaration</h1>
</div>

@foreach($tcnmaster as $tcnmasters)
    <div class="col-md-3 sticky" id="tcndiv{{$tcnmasters->id}}"><img style="float: right" src="https://png.icons8.com/pin/office/30" title="Pin" width="20" height="20">

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

            <a class="btn btn-success" id='tcn{{$tcnmasters->id}}'>Declare</a>
        </div>



<div class="col-md-12" id="tcn{{$tcnmasters->id}}show">
<form action="{{URL::to('/')}}/admin/benefit1/add" method="post" id="form{{$tcnmasters->id}}">
{{ csrf_field() }}

<label>Choose month</label>
<select name="month" id="month{{$tcnmasters->id}}" class="form-control" required="">
<option value="">select</option>
@php
$i=0;$j=7;
while($j>0){
echo '<option style="background:#84ffa1;" value="'.carbon::now()->subMonths($j)->format('Y/m').'">'.carbon::now()->subMonths($j)->format('F Y').'</option>'; 
$j--;
}
while($i<5){
echo '<option style="background:#ffeeb5;" value="'.carbon::now()->subMonths($i)->format('Y/m').'">'.carbon::now()->subMonths($i)->format('F Y').'</option>'; 
$i++;
}
@endphp
</select><br>
<input type="hidden" name="tcn" id="tcn{{$tcnmasters->id}}ajax" class="form-control" placeholder="" value="{{$tcnmasters->id}}">
<label>INR</label>
<input type="text" name="inr" id="inr{{$tcnmasters->id}}" class="form-control" placeholder="" value="" required="">



<label>AED</label>
<input type="text" name="aed" id="aed{{$tcnmasters->id}}" class="form-control" placeholder="" value="" required="">


<label>SAR</label>
<input type="text" name="sar" id="sar{{$tcnmasters->id}}" class="form-control" placeholder="" value="" required="">



<label>USD</label>
<input type="text" name="usd" id="usd{{$tcnmasters->id}}" class="form-control" placeholder="" value="" required="">



<label>CAD</label>
<input type="text" name="cad" id="cad{{$tcnmasters->id}}" class="form-control" placeholder="" value="" required=""><br>

<input type="hidden" name="edit" id="edit{{$tcnmasters->id}}">
<input type="hidden" name="declared" id="declared{{$tcnmasters->id}}">
<input type="hidden" name="updated" id="updated{{$tcnmasters->id}}">
<button type="button" class="btn btn-success" id="submit{{$tcnmasters->id}}" name="declare" style="float: right;">Declare</button>
<button type="button" class="btn btn-danger" id="update{{$tcnmasters->id}}" name="update" style="float: right;">Update</button>
<p id="statusajax{{$tcnmasters->id}}"></p>


</form>
</div>



    </div>
@endforeach




<div class="col-md-12"><br></div>



@endsection
@section('jquery')
<script type="text/javascript">
var value = $('#scheme').val();
        if(value == '') {
            $('#declare').attr('disabled',true);
        }
</script>

<script type="text/javascript">
$('#update').hide();

@php $i=0; @endphp
@foreach($tcnmaster as $tcnmasters)
        $('#update{{$tcnmasters->id}}').hide();
        $('#tcn{{$tcnmasters->id}}show').hide();
        @php $a[]=0; $a[$i]=$tcnmasters->id; $i++; @endphp
@endforeach

@php 
$count = count($a);
$i=0;
while($i<$count){ $j=0;
@endphp
          $('#tcn{{$a[$i]}}').click(function() {
                $('#tcndiv{{$a[$i]}}').addClass('animated fadeOutDown');
               @php 
               while($j<$count){
                if($a[$i]!=$a[$j]){
               @endphp 
               $('#tcndiv{{$a[$j]}}').addClass('animated fadeOutDown');
                setTimeout(function () {
               $('#tcndiv{{$a[$j]}}').hide();
               $('#tcndiv{{$a[$i]}}').removeClass('animated fadeOutDown');
               $('#tcndiv{{$a[$i]}}').addClass('animated fadeInDown');
               }, 500);

               @php          
               } $j++; }
               @endphp 

          $('#tcn{{$a[$i]}}').hide();
          $('#tcn{{$a[$i]}}show').show();
        });
@php          
$i++; }
@endphp
 
</script>

<script type="text/javascript">

@foreach($tcnmaster as $tcnmasters)
  $('#month{{$tcnmasters->id}}').change(function(event) {
   var month = $('#month{{$tcnmasters->id}}').val();
   var tcn = $('#tcn{{$tcnmasters->id}}ajax').val();
   data = 'month='+month+'&tcn='+tcn;
   $('#submit{{$tcnmasters->id}}').prop("value", '1');
   $.ajax({
            type: "get",
            url: "{{URL::to('/')}}/admin/benefit1/check",
            data: data,
            cache: false,
            success: function(result){
               if(result != 0){
                var result = JSON.parse(result);

                $('#inr{{$tcnmasters->id}}').val(result.INR);
                $('#aed{{$tcnmasters->id}}').val(result.AED);
                $('#usd{{$tcnmasters->id}}').val(result.USD);
                $('#cad{{$tcnmasters->id}}').val(result.CAD);
                $('#sar{{$tcnmasters->id}}').val(result.SAR);

                     $('#inr{{$tcnmasters->id}}').prop("disabled", false);
                     $('#aed{{$tcnmasters->id}}').prop("disabled", false);
                     $('#usd{{$tcnmasters->id}}').prop("disabled", false);
                     $('#cad{{$tcnmasters->id}}').prop("disabled", false);
                     $('#sar{{$tcnmasters->id}}').prop("disabled", false);


                if(result.status == '1'){
                     $('#submit{{$tcnmasters->id}}').hide();
                     $('#update{{$tcnmasters->id}}').show();
                     $('#declared{{$tcnmasters->id}}').prop("value", '0');
                     $('#updated{{$tcnmasters->id}}').prop("value", '1');
                     $('#edit{{$tcnmasters->id}}').prop("value",result.id);
                }

                if(result.status == '2'){
                     $('#submit{{$tcnmasters->id}}').hide();
                     $('#update{{$tcnmasters->id}}').hide();

                     $('#inr{{$tcnmasters->id}}').prop("disabled", true);
                     $('#aed{{$tcnmasters->id}}').prop("disabled", true);
                     $('#usd{{$tcnmasters->id}}').prop("disabled", true);
                     $('#cad{{$tcnmasters->id}}').prop("disabled", true);
                     $('#sar{{$tcnmasters->id}}').prop("disabled", true);
                     $('#declared{{$tcnmasters->id}}').prop("value", '0');
                     $('#updated{{$tcnmasters->id}}').prop("value", '0');
                }

               }else{
                $('#inr{{$tcnmasters->id}}').val('');
                $('#aed{{$tcnmasters->id}}').val('');
                $('#usd{{$tcnmasters->id}}').val('');
                $('#cad{{$tcnmasters->id}}').val('');
                $('#sar{{$tcnmasters->id}}').val('');
                $('#submit{{$tcnmasters->id}}').show();
                $('#update{{$tcnmasters->id}}').hide();
                $('#declared{{$tcnmasters->id}}').prop("value", '1');
                $('#updated{{$tcnmasters->id}}').prop("value", '0');
                $('#edit{{$tcnmasters->id}}').prop("value",'');
               }
            }
          });


  });

$('#update{{$tcnmasters->id}}').click(function(event) {
   $('#update{{$tcnmasters->id}}').addClass('animated bounce infinite');
   var data = $('#form{{$tcnmasters->id}}').serialize();
   $.ajax({
            type: "post",
            url: "{{URL::to('/')}}/admin/benefit1/add",
            data: data,
            cache: false,
            success: function(result){
               if(result != 0){
                setTimeout(function () {
                $('#statusajax{{$tcnmasters->id}}').html(result);
                $('#update{{$tcnmasters->id}}').removeClass('animated bounce infinite');
                }, 1000);
                setTimeout(function () {
                      $('#statusajax{{$tcnmasters->id}}').html('');
                }, 5000);
               }
            }
          });


  });

$('#submit{{$tcnmasters->id}}').click(function(event) {
   $('#submit{{$tcnmasters->id}}').addClass('animated bounce infinite');
   var data = $('#form{{$tcnmasters->id}}').serialize();
   $.ajax({
            type: "post",
            url: "{{URL::to('/')}}/admin/benefit1/add",
            data: data,
            cache: false,
            success: function(result){
               if(result != 0){
                setTimeout(function () {
                $('#statusajax{{$tcnmasters->id}}').html('<span style="color:green;">Benefit Declared</span>');
                $('#submit{{$tcnmasters->id}}').removeClass('animated bounce infinite');
                     $('#declared{{$tcnmasters->id}}').prop("value", '0');
                     $('#updated{{$tcnmasters->id}}').prop("value", '1');
                     $('#edit{{$tcnmasters->id}}').prop("value",result);
                     $('#submit{{$tcnmasters->id}}').hide();
                     $('#update{{$tcnmasters->id}}').show();

                }, 1000);
                setTimeout(function () {
                      $('#statusajax{{$tcnmasters->id}}').html('');

                }, 5000);
               }
            }
          });


  });

     $('#inr{{$tcnmasters->id}}').on('keypress', function (event) {
        var regex = new RegExp("^[0-9.]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
         event.preventDefault();
         return false;
        }
        });
        $('#aed{{$tcnmasters->id}}').on('keypress', function (event) {
        var regex = new RegExp("^[0-9.]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
         event.preventDefault();
         return false;
        }
        });
        $('#usd{{$tcnmasters->id}}').on('keypress', function (event) {
        var regex = new RegExp("^[0-9.]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
         event.preventDefault();
         return false;
        }
        });
        $('#sar{{$tcnmasters->id}}').on('keypress', function (event) {
        var regex = new RegExp("^[0-9.]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
         event.preventDefault();
         return false;
        }
        });
        $('#cad{{$tcnmasters->id}}').on('keypress', function (event) {
        var regex = new RegExp("^[0-9.]+$");
        var key = String.fromCharCode(!event.charCode ? event.which : event.charCode);
        if (!regex.test(key)) {
         event.preventDefault();
         return false;
        }
        });

@endforeach

        


</script>
@endsection