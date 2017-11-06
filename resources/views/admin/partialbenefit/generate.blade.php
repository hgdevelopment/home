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
    <div class="col-lg-12"><br></div>
    @foreach($benefitdeclared as $benefit)


    <div class="col-lg-4" style="margin-bottom: 20px;">
        <div class="panel-heading no-border bg-primary">
            <span class="text-lt">{{$benefit->tcnType}}</span>
        </div>
        <div class="list-group no-radius alt">
            <div class="list-group-item"><span style="float: right;">{{$benefit->ynm}}</span>BENEFIT DECLARED MONTH</div>
            <div class="list-group-item"><span style="float: right;">{{$benefit->INR}}</span>INR</div>
            <div class="list-group-item"><span style="float: right;">{{$benefit->AED}}</span>AED</div>
            <div class="list-group-item"><span style="float: right;">{{$benefit->USD}}</span>USD</div>
            <div class="list-group-item"><span style="float: right;">{{$benefit->CAD}}</span>CAD</div>
            <div class="list-group-item"><span style="float: right;">{{$benefit->SAR}}</span>SAR</div>
            <div class="list-group-item"><span style="float: right;">{{$benefit->benefitto}}</span>BENEFIT TO (MONTH)</div>
            <div class="list-group-item"><span style="float: right;">{{$benefit->tcnmaster->lockingDuration}} Months</span>DURATION</div>

            <form method="post">
                {{ csrf_field() }}
                <input type="hidden" name="month" value="{{$benefit->ynm}}">
                <input type="hidden" name="type" value="{{$benefit->tcnType}}">
                <input type="hidden" name="id" value="{{$benefit->tcnmaster->id}}">
            <button type="submit" class="btn btn-success btn-block" style="color:#fff;">GENERATE BENEFIT</button>
            </form>

        </div>



    </div>
    @endforeach


@endsection
@section('jquery')
    <script type="text/javascript">

    </script>
@endsection