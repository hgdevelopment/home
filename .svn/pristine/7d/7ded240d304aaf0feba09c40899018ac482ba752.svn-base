@extends('web.layout.erp')
@section('banner')
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
  <img src="{{ URL::asset('new_heading.png') }}" class="img-responsive">
</div>
@endsection
@section('sidebar')
@include('web.partial.header')
@include('web.partial.aside')
@endsection
@section('body')

   <div class="bg-light lter b-b wrapper-md">
    <h1 class="m-n font-thin h3">Partial Withdrawal </h1>
  </div>

  <div class="wrapper-md">
  <div class="line line-dashed b-b line-lg pull-in"></div>
  <div class="col-md-12"><br></div>
    <div class="panel panel-default">
      <div class="panel-heading ">                  
      ACTIVE TCN
      </div>
     
    <div class="panel-body">
    <div class="row">
      <div class="table-responsive" style="padding: 7px;">
        <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="table" style="border:none;">
          <thead>
            <tr>
            <th>Sl No</th>
            <th>Tcn Name</th>
            <th>Tcn Code</th>
            <th>Trade Units</th>
            <th>Balance Units</th>
            <th>Trade Amount</th>
            <th>Currrency</th>
            <th>Approved Date </th>
            <th>Actions</th>
            </tr>
          </thead>
          <?php $sl=1;?>
          <tbody>
            @foreach($tcn_data as $result)
            <tr>
              <td>{{$sl++}}</td>
              <td>{{$result->tcnType}}</td>
              <td>{{$result->tcnCode}}</td>
              <td>{{$result->unit}}</td>
              <?php 
              $row=\DB::table('withdrawalrequests')->where('tcnId','=',$result->id)->where('status','=','Paid')
              ->select( DB::raw('sum(unit) as total'))
              ->get();
              foreach($row as $rows)
              $wunit=$rows->total;?>
              <td>{{$result->unit-$wunit}}</td>
              <td>{{$result->amount}}</td>
              <td>{{$result->currencyType}}</td>
              <td>{{ date('d-m-Y',strtotime($result->approvalDate)) }}</td>
              <td>
                <?php
                $unlockdate = strtotime(date("Y-m-d", strtotime($result->paymentReceivedDate)) . " +".$result->lockingDuration." month");
                $unlockdate = date("Y-m-d", $unlockdate);?>
                @if($unlockdate>date("Y-m-d"))
              {{"Locking Duration Not Completed"}}
               @else  
              <a href="{{ url('/web/partialWithdraw',$result->id) }}" class="btn btn-danger" >withdraw</a>@endif
              </td>
           </tr>
           @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
    </div>
  <br>

@endsection
@section('jquery')
<script type="text/javascript">

  $(document).ready(function(){
        $('#table').DataTable();
        });
      
</script>

@endsection