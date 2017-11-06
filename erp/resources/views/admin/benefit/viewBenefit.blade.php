@extends('layout.erp')
@section('banner')
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
   <img src="new_heading.png" class="img-responsive">
</div>
@endsection
@section('sidebar')
@include('partial.header')
@include('partial.aside')
@endsection
@section('body')
<div class="bg-light lter b-b wrapper-md">
   <h1 class="m-n font-thin h3">Declared Profits</h1>
</div>
<form method="GET">
{{ csrf_field() }}
{{-- {{ method_field('PUT') }}
 --}}<div class="col-sm-4"><bR>
            <label>Select TCN*</label><br>
            <select name="tcntype"  id="tcntype"  value="scheme" class="form-control m-b">
               <option>--select--</option>
                @foreach($tcnmaster as $tcn)
               <option value="{{ $tcn->id }}">{{ $tcn->tcnType }}</option>
               @endforeach
            </select>
            <button name="show" type="submit"  value="show" class="btn btn-sm btn-block btn-primary">show</button>
         </div>
         </form>
         @if(isset($_REQUEST['show']))

<div class="wrapper-md">

<div class="line line-dashed b-b line-lg pull-in"></div>

   <div class="col-md-12"><br></div>

   <div class="panel panel-default">
      <div class="table-responsive" style="overflow-x: initial;">
        <table class="table table-striped b-t">
            <thead>
               <div class="panel-heading">
                  <center><strong>{{ $value }}</strong> Benefit Amount per unit.</center>

               </div>
               <tr>
                  <th>Month</th>
                  <th>Year</th>
                  <th>INR</th>
                  <th>AED</th>
                  <th>USD</th>
                  <th>SAR</th>
                  <th>CAD</th>
                  <th>Edit/Delete</th>
               </tr>
            </thead>
            <tbody>
            @foreach($benefit as $benefits)
               <tr>
                  <td>{{date("F", mktime(0, 0, 0, $benefits->month, 1))}}</td>
                  <td>{{ $benefits->year }}</td>
                  <td>{{ $benefits->inr }}</td>
                  <td>{{ $benefits->aed }}</td>
                  <td>{{ $benefits->usd }}</td>
                  <td>{{ $benefits->sar }}</td>
                  <td>{{ $benefits->cad }}</td>


                  <td>
                  @if($benefits->status==0)

                    <form action="{{ URL::to('/') }}/admin/benefit/{{ $benefits->id }}" method="POST" >
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                    <button class="active" style="border: none;background: none;paddingirghyt: 25px;float: left;"><i  style="color: #f05050;float:left " class="fa fa-close text-danger text-active" aria-hidden="true"></i></button>
                    </form>
                     <a href="{{ URL::to('/') }}/admin/benefit/{{ $benefits->id }}/edit"  class="active"><i  style="color: #018001;float:left" class="fa fa-pencil text-success text-active" aria-hidden="true"></i></a>
                    @endif
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
<script type="text/javascript"></script>
@endsection