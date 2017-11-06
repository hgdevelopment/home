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
    <style>
        @import url('https://fonts.googleapis.com/css?family=Raleway');
        .list-group-item{
            font-family: 'Raleway', sans-serif;
        }
        .tcn1{
            background: #9ee4af;
            padding: 5px;
            border-radius: 5px;
            margin-right: 10px;
        }
        .tcn2{
            background: #f0f4c3;
            padding: 5px;
            border-radius: 5px;
            margin-right: 10px;
        }
        .tcn3{
            background: #f0f4c3;
            padding: 5px;
            border-radius: 5px;
            margin-right: 10px;
        }
    </style>
    <div class="col-lg-12"><br></div>




    <div class="col-lg-12" style="margin-bottom: 20px;">
        <div class="panel-heading no-border bg-primary">
            <span class="text-lt" style="font-size: 20px">Generated Benefits</span>
        </div>
        <div class="list-group no-radius alt">

            <div class="list-group-item" align="right" style="vertical-align: middle">

               <span style="background: #d7d7d7"><img src="https://png.icons8.com/microsoft-excel/dotty/80"  width="24" height="24"> All Details</span>
               <span style="background: #c0f5e4"><img src="https://png.icons8.com/microsoft-excel/dusk/24" title="Microsoft Excel" width="24" height="24">BENEFIT DETAILS</span>
               <span style="background: #c4ecc6"><img src="https://png.icons8.com/microsoft-excel/color/24" title="Microsoft Excel" width="24" height="24">Bank Details</span>
            </div>
        @foreach($benefits as $benefit)
            <div class="list-group-item"><span style="float: right;"></span>
            @php $month = Carbon::create($benefit->year, $benefit->month,2,2,2,2);  @endphp

                <span style="float: right;">
                <form method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="type" value="All">
                    <input type="hidden" name="tcntype" value="{{$benefit->tcnmaster->id}}">
                    <input type="hidden" name="month" value="{{$benefit->month}}">
                    <input type="hidden" name="year" value="{{$benefit->year}}">
                    <input type='image' src="https://png.icons8.com/microsoft-excel/dotty/80"  width="24" height="24"/>
                </form>
                </span>

                <span style="float: right;">
               <form method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="type" value="benefit">
                    <input type="hidden" name="tcntype" value="{{$benefit->tcnmaster->id}}">
                    <input type="hidden" name="month" value="{{$benefit->month}}">
                    <input type="hidden" name="year" value="{{$benefit->year}}">
                    <input type='image' src="https://png.icons8.com/microsoft-excel/dusk/24"  width="24" height="24"/>
                </form>
                </span>

                <span style="float: right;">
                <form method="post">
                    {{csrf_field()}}
                    <input type="hidden" name="type" value="bank">
                    <input type="hidden" name="tcntype" value="{{$benefit->tcnmaster->id}}">
                    <input type="hidden" name="month" value="{{$benefit->month}}">
                    <input type="hidden" name="year" value="{{$benefit->year}}">
                    <input type='image' src="https://png.icons8.com/microsoft-excel/color/24"  width="24" height="24"/>
                </form>
                </span>

                <span class="tcn{{$benefit->tcnmaster->id}}">{{$benefit->tcnmaster->tcnType}} </span>   {{$month->format('F')}} {{$month->format('Y')}}
            </div>
        @endforeach
            <div class="list-group-item">
            {{ $benefits->links() }}
            </div>


        </div>



    </div>



@endsection
@section('jquery')
    <script type="text/javascript">

    </script>
@endsection