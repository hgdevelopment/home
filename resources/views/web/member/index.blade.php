@extends('web.layout.erp')

{{-- @section('banner')
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
            <img src="{{ URL::asset('new_heading.png') }}" class="img-responsive">
         </div>
@endsection --}}

@section('sidebar')

@include('web.partial.header')
@include('web.partial.aside')

@endsection

@section('body')
{{-- 
            <div class="bg-light lter b-b wrapper-md">
               <h1 class="m-n font-thin h3">Profile</h1>
            </div> --}}

@include('web.partial.profileheader')


<div class="row">
      <div class="col-sm-12">
      <div class="panel panel-success">
        <div class="panel-heading">Active TCN</div>
        <table class="table table-striped m-b-none" style="    background: #f3f3f3;">
          <thead>
            <tr>
              <th style="width:60px;" class="text-center">Graph</th>
              <th>Item</th>                    
              <th style="width:70px;"></th>
            </tr>
          </thead>
          <tbody>
            <tr>                    
              <td>
                <div ng-init="data1=[ 16,15,15,14,17,18,16,15,16 ]" ui-jq="sparkline" ui-options="[16,15,15,14,17,18,16,15,16], {type:'bar', height:19, barWidth:4, barSpacing:2, barColor:'#27c24c'}" class="sparkline inline"><canvas width="52" height="19" style="display: inline-block; width: 52px; height: 19px; vertical-align: top;"></canvas></div>
              </td>
              <td>App downloads</td>
              <td class="text-success">
                <i class="fa fa-level-up"></i> 40%
              </td>
            </tr>
            <tr>
              <td class="text-center">
                <div ng-init="data2=[ 60,30,10 ]" ui-jq="sparkline" ui-options="[60,30,10], {type:'pie', height:19, sliceColors:['#23b7e5','#fff','#fad733']}" class="sparkline inline"><canvas width="19" height="19" style="display: inline-block; width: 19px; height: 19px; vertical-align: top;"></canvas></div>
              </td>
              <td>Social connection</td>
              <td class="text-success">
                <i class="fa fa-level-up"></i> 20%
              </td>
            </tr>
            <tr>                    
              <td>
                <div ng-init="data3=[ 16,15,15,14,17,18,16,15,16 ]" ui-jq="sparkline" ui-options="[16,15,15,14,17,18,16,15,16], {type:'line', height:19, width:60, lineColor:'#7266ba', fillColor:'#fff'}" class="sparkline inline"><canvas width="60" height="19" style="display: inline-block; width: 60px; height: 19px; vertical-align: top;"></canvas></div>
              </td>
              <td>Revenue</td>
              <td class="text-warning">
                <i class="fa fa-level-down"></i> 5%
              </td>
            </tr>
            <tr>                    
              <td>
                <div ng-init="data4=[ 16,15,15,14,17,18,16,15,16 ]" ui-jq="sparkline" ui-options="[16,15,15,14,17,18,16,15,16], {type:'discrete', height:19, width:60, lineColor:'#27c24c'}" class="sparkline inline"><canvas width="60" height="19" style="display: inline-block; width: 60px; height: 19px; vertical-align: top;"></canvas></div>
              </td>
              <td>Customer increase</td>
              <td class="text-danger">
                <i class="fa fa-level-down"></i> 20%
              </td>
            </tr>
          </tbody>
        </table>
          <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-6 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-6 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href="">5</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
      </div>
    </div>
    </div>

    <div class="row">
      <div class="col-sm-12">
      <div class="panel panel-danger">
        <div class="panel-heading">Pending TCN</div>
        <table class="table table-striped m-b-none" style="    background: #f3f3f3;">
          <thead>
            <tr>
              <th style="width:60px;" class="text-center">Graph</th>
              <th>Item</th>                    
              <th style="width:70px;"></th>
            </tr>
          </thead>
          <tbody>
            <tr>                    
              <td>
                <div ng-init="data1=[ 16,15,15,14,17,18,16,15,16 ]" ui-jq="sparkline" ui-options="[16,15,15,14,17,18,16,15,16], {type:'bar', height:19, barWidth:4, barSpacing:2, barColor:'#27c24c'}" class="sparkline inline"><canvas width="52" height="19" style="display: inline-block; width: 52px; height: 19px; vertical-align: top;"></canvas></div>
              </td>
              <td>App downloads</td>
              <td class="text-success">
                <i class="fa fa-level-up"></i> 40%
              </td>
            </tr>
            <tr>
              <td class="text-center">
                <div ng-init="data2=[ 60,30,10 ]" ui-jq="sparkline" ui-options="[60,30,10], {type:'pie', height:19, sliceColors:['#23b7e5','#fff','#fad733']}" class="sparkline inline"><canvas width="19" height="19" style="display: inline-block; width: 19px; height: 19px; vertical-align: top;"></canvas></div>
              </td>
              <td>Social connection</td>
              <td class="text-success">
                <i class="fa fa-level-up"></i> 20%
              </td>
            </tr>
            <tr>                    
              <td>
                <div ng-init="data3=[ 16,15,15,14,17,18,16,15,16 ]" ui-jq="sparkline" ui-options="[16,15,15,14,17,18,16,15,16], {type:'line', height:19, width:60, lineColor:'#7266ba', fillColor:'#fff'}" class="sparkline inline"><canvas width="60" height="19" style="display: inline-block; width: 60px; height: 19px; vertical-align: top;"></canvas></div>
              </td>
              <td>Revenue</td>
              <td class="text-warning">
                <i class="fa fa-level-down"></i> 5%
              </td>
            </tr>
            <tr>                    
              <td>
                <div ng-init="data4=[ 16,15,15,14,17,18,16,15,16 ]" ui-jq="sparkline" ui-options="[16,15,15,14,17,18,16,15,16], {type:'discrete', height:19, width:60, lineColor:'#27c24c'}" class="sparkline inline"><canvas width="60" height="19" style="display: inline-block; width: 60px; height: 19px; vertical-align: top;"></canvas></div>
              </td>
              <td>Customer increase</td>
              <td class="text-danger">
                <i class="fa fa-level-down"></i> 20%
              </td>
            </tr>
          </tbody>
          
        </table>
        <footer class="panel-footer">
      <div class="row">
        <div class="col-sm-6 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-6 text-right text-center-xs">                
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href="">5</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
      </div>
    </div>
    </div>
@include('web.partial.profilefooter')

             





@endsection

@section('jquery')
@if (Session::has('sweet_alert.alert'))
    <script>
        swal({
            text: "{!! Session::get('sweet_alert.text') !!}",
            title: "{!! Session::get('sweet_alert.title') !!}",
            timer:'5000',
            type: "{!! Session::get('sweet_alert.type') !!}",
            // showConfirmButton: "!! Session::get('sweet_alert.showConfirmButton') !!}",
            // confirmButtonText: "!! Session::get('sweet_alert.confirmButtonText') !!}",
            // confirmButtonColor: "#AEDEF4",
            // showCancelButton: false,
            // closeOnConfirm: true
            @php 
            Session::Forget('sweet_alert'); @endphp
            // more options
        });
    </script>
@endif
@endsection