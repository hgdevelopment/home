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
  .bootstrap-select>.dropdown-toggle.bs-placeholder, .bootstrap-select>.dropdown-toggle.bs-placeholder:active, .bootstrap-select>.dropdown-toggle.bs-placeholder:focus, .bootstrap-select>.dropdown-toggle.bs-placeholder:hover {
    color: #000;
    background: #27c24c;
}
</style>
<div class="bg-light lter b-b wrapper-md">

   <h1 class="m-n font-thin h3">View Benefits</h1>
</div>

{{-- Phase 1 - Select tcn --}}
@if(isset($selected))
<div class="bg-light lter b-b wrapper-md">
<h2 class="m-n font-thin h3">SELECT TCN</h2>
<form action="" method="post">
{{csrf_field()}}

<button  name="tcn" value="{{$selected->id}}" class="btn btn-success" disabled>{{$selected->tcnType}}</button>

  <a href="{{URL::to('/')}}/admin/benefit/view" class="btn btn-dark">BACK</a>
</form>
</div>
@else
<div class="bg-light lter b-b wrapper-md">
<h2 class="m-n font-thin h3">SELECT TCN</h2>
<form action="" method="post">
{{csrf_field()}}
@foreach($tcns as $tcn)
<button  name="tcn" value="{{$tcn->id}}" class="btn btn-success">{{$tcn->tcnType}}</button>
@endforeach
@if(isset($fetch))
  <a href="{{URL::to('/')}}/admin/benefit/view" class="btn btn-dark">BACK</a>
@endif
</form>
</div>
@endif



{{-- Phase 2 - Select year and month --}}
@if(isset($selected))
<div class="bg-light lter b-b wrapper-md">
<form  action="{{ URL::to('/') }}/admin/benefit/details" method="post">
{{ csrf_field() }}

  <input type="hidden" name="tcnId" value="{{$tcnid}}">
  <input type="hidden" name="type" value="All">

<select class="selectpicker" data-live-search="true" name="date" onchange="fetchtcn()" required>

@if(isset($fetch))
<option value="{{$datee->year}}-{{$datee->format('m')}}" data-tokens="{{$datee->format('m')}}/{{$datee->format('Y')}} {{$datee->format('Y')}} {{$datee->format('F')}}">{{$datee->format('F')}} - {{$datee->year}} </option>
@endif


@foreach($bd as $benefit)

  @php $date = Carbon::create($benefit->year, $benefit->month, 5, 0, 0, 0);  @endphp 
  <option value="{{$date->year}}-{{$date->format('m')}}" data-tokens="{{$date->format('m')}}/{{$date->format('Y')}} {{$date->format('Y')}} {{$date->format('F')}}">{{$date->format('F')}} - {{$date->year}} </option>
@endforeach
</select> 
<button class="btn btn-success" type="submit">Submit</button>
</form>
</div>
@endif

{{-- Phase 3 - Benefit details --}}
@if(isset($fetch))
<div class="col-lg-6 col-md-6 col-sm-12" style="margin-top: 20px;">
      <div class="panel b-a">
        
        <ul class="list-group">
          <li class="list-group-item">
            <span style="font-size: 20px" > {{$tcnname}} </span>(Generated on )
          </li>
          <li class="list-group-item">
            <i class="icon-check text-success m-r-xs"></i> BENEFIT GENERATED FOR <strong>{{$datee->format('F Y')}}</strong>
          </li>
          <li class="list-group-item">
            <i class="icon-check text-success m-r-xs"></i> TOTAL NUMBER OF TCN : {{$count}}
          </li>
          {{--    <li class="list-group-item">
            <i class="icon-check text-success m-r-xs"></i> GENERATED BY MS. MOLLY THOMAS
          </li> --}}
          
          <li class="list-group-item">
            <i class="icon-cloud-download text-success m-r-xs"></i> 
            <a href="{{ URL::to('/') }}/admin/benefit/excel?tcnId={{$tcnid}}&month={{$datee->format('m')}}&year={{$datee->format('Y')}}&type=bankinr">
            <span style="color:green" >DOWNLOAD</span> BANK REPORT (INR : {{$inr}})
            </a>
          </li>
          

        
          <li class="list-group-item">
            <i class="icon-cloud-download text-success m-r-xs"></i> 
            <a href="{{ URL::to('/') }}/admin/benefit/excel?tcnId={{$tcnid}}&month={{$datee->format('m')}}&year={{$datee->format('Y')}}&type=bankaed">
            <span style="color:green" >DOWNLOAD</span> BANK REPORT (AED : {{$aed}})
            </a>
          </li>
        

        
          <li class="list-group-item">
            <i class="icon-cloud-download text-success m-r-xs"></i> 
            <a href="{{ URL::to('/') }}/admin/benefit/excel?tcnId={{$tcnid}}&month={{$datee->format('m')}}&year={{$datee->format('Y')}}&type=banksar">
              <span style="color:green" >DOWNLOAD</span> BANK REPORT (SAR : {{$sar}})
            </a>
          </li>
       

        
          <li class="list-group-item">
            <i class="icon-cloud-download text-success m-r-xs"></i> 
            <a href="{{ URL::to('/') }}/admin/benefit/excel?tcnId={{$tcnid}}&month={{$datee->format('m')}}&year={{$datee->format('Y')}}&type=bankcad">
              <span style="color:green" >DOWNLOAD</span> BANK REPORT (CAD : {{$cad}})
            </a>
          </li>
          

          
          <li class="list-group-item">
            <i class="icon-cloud-download text-success m-r-xs"></i> 
            <a href="{{ URL::to('/') }}/admin/benefit/excel?tcnId={{$tcnid}}&month={{$datee->format('m')}}&year={{$datee->format('Y')}}&type=bankusd">
              <span style="color:green" >DOWNLOAD</span> BANK REPORT (USD : {{$usd}})
            </a>
          </li>
        

          <li class="list-group-item">
            <i class="icon-cloud-download text-success m-r-xs"></i>
            <a href="{{ URL::to('/') }}/admin/benefit/excel?tcnId={{$tcnid}}&month={{$datee->format('m')}}&year={{$datee->format('Y')}}&type=benefit">
              <span style="color:green" >DOWNLOAD</span> BENEFIT REPORT
            </a>
          </li>

          <li class="list-group-item">
            <i class="icon-cloud-download text-success m-r-xs"></i> 
            <a href="{{ URL::to('/') }}/admin/benefit/excel?tcnId={{$tcnid}}&month={{$datee->format('m')}}&year={{$datee->format('Y')}}&type=All">
              <span style="color:green" >DOWNLOAD</span> ALL REPORT
            </a>
          </li>

        </ul>
      </div>
    </div>
@endif






<div class="col-md-12"><br></div>
 

<div class="col-md-12">
  @if(Session::has('message'))
   <p class="animated fadeInDown " style="color: red">{{ Session::get('message') }}</p>
   @endif
</div>


@endsection
@section('jquery')
<script type="text/javascript">
        var value = $('#scheme').val();
        if(value == '') {
            $('#declare').attr('disabled',true);
        }


</script>

</script>
@endsection