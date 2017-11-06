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
<link href="{!! asset('css/sweetalert.css') !!}" media="all" rel="stylesheet" type="text/css" />
<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">Incentive Master</h1>
</div>

<div class="wrapper-md" ng-controller="FormDemoCtrl">
  <div class="panel panel-default">
    <div class="panel-heading font-bold">@if (trim($__env->yieldContent('edit_id'))) Edit Incentive for Employee @else Add Incentive for Employee @endif</div>
    <div class="panel-body">
      <div class="row">
        @if (trim($__env->yieldContent('edit_id')))
        <form role="form"   method="post" action="{{URL::to('/') }}/admin/incentivemaster/@yield('edit_id')" data-parsley-validate  enctype="multipart/form-data">
        @else
        @if (Session()->has('message'))
        <div class="alert alert-info fade in alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong>Info!</strong> {{Session()->get('message')}}
        </div>
        @endif
        <form role="form"  method="post" action="{{URL::to('/') }}/admin/incentivemaster" data-parsley-validate enctype="multipart/form-data">
         @endif
            
          {{ csrf_field() }}
              @section('edit')
              @show
          <div class="col-md-12">
              <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>EMPLOYEE TYPE</label>
                      <select  class="form-control" id="employeeType" value="@yield('employeeType')"  name="employeeType" required data-parsley-required-message="Please Select Employee Type">
                        <option value="">Select</option>
                        <option value="ME" @if(strtoupper($__env->yieldContent('employeeType'))=='ME') {{ 'selected' }} @endif>ME</option>
                        <option value="DSA" @if(strtoupper($__env->yieldContent('employeeType'))=='DSA') {{ 'selected' }} @endif>DSA</option>
                        <option value="EMP" @if(strtoupper($__env->yieldContent('employeeType'))=='EMP') {{ 'selected' }} @endif>EMP</option>
                        <option value="OI" @if(strtoupper($__env->yieldContent('employeeType'))=='OI') {{ 'selected' }} @endif>OI</option>
                      </select>
                      @if ($errors->has('employeeType'))
                      <span class="help-inline">{{$errors->first('employeeType')}}</span>
                      @endif
                    </div>
                  </div>
                    
                  <div class="col-md-4">
                      <label>SALARY</label>
                       <input name="salary" type="text" id="salary" required data-parsley-required-message="Please Enter Salary" data-parsley-type="number"   data-parsley-maxlength="15"  class="form-control" value="@yield('salary')" placeholder="Amount From" >
                       @if ($errors->has('salary'))
                      <span class="help-inline">{{$errors->first('salary')}}</span>
                      @endif
                  </div>
              
                  <div class="col-md-4">
                      <label>TARGET</label>
                       <input name="target" type="text" id="target" required data-parsley-required-message="Please Enter Target" data-parsley-type="number" data-parsley-maxlength="15" class="form-control" value="@yield('target')" placeholder="Target" >
                       @if ($errors->has('target'))
                      <span class="help-inline">{{$errors->first('target')}}</span>
                      @endif
                  </div>
                 
                <div class="col-md-12"></div>
                  <div class="col-md-4">
                      <label>AMOUNT FROM</label>
                       <input name="fromAmount" type="text" id="fromAmount" required data-parsley-required-message="Please Enter Employee From Amount " data-parsley-type="number"  data-parsley-maxlength="15"  class="form-control" value="@yield('fromAmount')" placeholder="Amount From" >
                       @if ($errors->has('fromAmount'))
                      <span class="help-inline">{{$errors->first('fromAmount')}}</span>
                      @endif
                  </div>
                  <div class="col-md-4">
                      <label>TO AMOUNT</label>
                       <input name="toAmount" type="text" id="toAmount" required data-parsley-required-message="Please Enter Employee To Amount" data-parsley-type="number"  data-parsley-maxlength="15"   class="form-control" value="@yield('toAmount')" placeholder="Amount To" >
                       @if ($errors->has('toAmount'))
                      <span class="help-inline">{{$errors->first('toAmount')}}</span>
                      @endif
                  </div>
                  
                  <div class="col-md-4">
                      <label>INCENTIVE PERCENTAGE</label>
                       <input name="incentivePercentage" type="text" id="incentivePercentage" required data-parsley-required-message="Please Enter Incentive Percentage" data-parsley-type="number"  max="100" class="form-control" value="@yield('incentivePercentage')" placeholder="Incentive Percentage" >
                       @if ($errors->has('incentivePercentage'))
                      <span class="help-inline">{{$errors->first('incentivePercentage')}}</span>
                      @endif
                  </div>
                <div class="col-md-12"></div>
                  <div class="col-md-10"><br>
                    <input type="submit" name="submit"  id="submit" value="Save" class="btn btn-success" >
                  </div> 
              </div>
        </form> 
      </div>
    </div>
  </div>
</div>

 @if (trim($__env->yieldContent('edit_id')))
  @else

    <div class="panel panel-default">
    <div class="panel-heading font-bold">View Incentive Master &nbsp;(EMPLOYEE)</div>
    <div class="panel-body">
      <div class="row">
        <div class="table-responsive" style="padding: 7px;">
        <table class="table" id="emp" style="border:none;">
              <thead>
                <tr>
                  <th>Sl No</th>
                  <th>Employee Type</th>
                  <th>Salary</th>
                  <th>From Amount</th>
                  <th>To Amount</th>
                  <th>Target</th>
                  <th>Incentive Percentage</th>
                  <th>Action</th>
                </tr>
              </thead>
              <?php $sl=1;?>
              <tbody>
                @foreach ($emp as $emps)
                <tr>
                  <td>{{$sl++}}</td>
                  <td>{{ $emps->employeeType }}</td>
                  <td>{{ $emps->salary}}</td>
                  <td>{{ $emps->fromAmount}}</td>
                  <td>{{ $emps->toAmount}}</td>
                  <td>{{ $emps->target}}</td>
                  <td>{{ $emps->incentivePercentage}}</td>
                  <td>
                    <a id="edit" href="{{ URL::to('/') }}/admin/incentivemaster/{{ $emps->id }}/edit"  class="active">
                      <i  style="color: #018001;" class="fa fa-pencil text-success text-active" aria-hidden="true"></i>
                    </a>
                    <form method="post" id="delete_form1"  action="{{ URL::to('/') }}/admin/incentivemaster/{{ $emps->id }}" style="float:left; padding-right:10px;">
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="DELETE">
                      <button id="delete-btn1" type="submit" class="active" style="border: none;">
                      <i style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></button> 
                    </form>
                  </td>
                </tr>
                 @endforeach
              </tbody>
         </table>
         
          </div>
      </div>
    </div>
      
  </div>
  <div class="panel panel-default">
    <div class="panel-heading font-bold">View Incentive Master &nbsp;(DIRECT SELLING AGENT)</div>
    <div class="panel-body">
      <div class="row">
        <div class="table-responsive" style="padding: 7px;">
        <table class="table" id="dsa" style="border:none;">
               <thead>
                   <tr>
                      <th>Sl No</th>
                      <th>Employee Type</th>
                      <th>Salary</th>
                      <th>From Amount</th>
                      <th>To Amount</th>
                      <th>Target</th>
                      <th>Incentive Percentage</th>
                      <th>Action</th>
                    </tr>
                  
              </thead>
              <?php $sl=1;?>
              <tbody>
                @foreach ($dsa as $dsas)
                <tr>
                  <td>{{$sl++}}</td>
                  <td>{{ $dsas->employeeType }}</td>
                  <td>{{ $dsas->salary}}</td>
                  <td>{{ $dsas->fromAmount}}</td>
                  <td>{{ $dsas->toAmount}}</td>
                  <td>{{ $dsas->target}}</td>
                  <td>{{ $dsas->incentivePercentage}}</td>
                  <td>
                    <a href="{{ URL::to('/') }}/admin/incentivemaster/{{ $dsas->id }}/edit"  class="active">
                      <i  style="color: #018001;" class="fa fa-pencil text-success text-active" aria-hidden="true"></i>
                    </a>
                    <form method="post" id="delete_form2"  action="{{ URL::to('/') }}/admin/incentivemaster/{{ $dsas->id }}" style="float:left; padding-right:10px;">
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="DELETE">
                      <button id="delete-btn2" type="submit" class="active" style="border: none;">
                      <i style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></button> 
                    </form>
                  </td>
                </tr>
                 @endforeach
              </tbody>
         </table>
      </div>
    </div>
  </div>
      
  </div>
  <div class="panel panel-default">
    <div class="panel-heading font-bold">View Incentive Master &nbsp;(OFFICE INCHARGE)</div>
    <div class="panel-body">
      <div class="row">
        <div class="table-responsive" style="padding: 7px;">
        <table class="table" id="oi" style="border:none;">
              <thead>
               <tr>
                  <th>Sl No</th>
                  <th>Employee Type</th>
                  <th>Salary</th>
                  <th>From Amount</th>
                  <th>To Amount</th>
                  <th>Target</th>
                  <th>Incentive Percentage</th>
                  <th>Action</th>
                </tr>
                  
              </thead>
              <?php $sl=1;?>
              <tbody>
                @foreach ($oi as $ois)
                <tr>
                  <td>{{$sl++}}</td>
                  <td>{{ $ois->employeeType }}</td>
                  <td>{{ $ois->salary}}</td>
                  <td>{{ $ois->fromAmount}}</td>
                  <td>{{ $ois->toAmount}}</td>
                  <td>{{ $ois->target}}</td>
                  <td>{{ $ois->incentivePercentage}}</td>
                  <td>
                    <a href="{{ URL::to('/') }}/admin/incentivemaster/{{ $ois->id }}/edit"  class="active">
                      <i  style="color: #018001;" class="fa fa-pencil text-success text-active" aria-hidden="true"></i>
                    </a>
                    <form method="post" id="delete_form3"  action="{{ URL::to('/') }}/admin/incentivemaster/{{ $ois->id }}" style="float:left; padding-right:10px;">
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="DELETE">
                      <button id="delete-btn3" type="submit" class="active" style="border: none;">
                      <i style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></button> 
                    </form>
                  </td>
             
                </tr>
                @endforeach
              </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>
      <div class="panel panel-default">
    <div class="panel-heading font-bold">View Incentive Master &nbsp;(MARKETTING EXECUTIVE)</div>
    <div class="panel-body">
      <div class="row">
        <div class="table-responsive" style="padding: 7px;">
        <table class="table" id="marketexeTable" style="border:none;">
              <thead>
                   <tr>
                      <th>Sl No</th>
                      <th>Employee Type</th>
                      <th>Salary</th>
                      <th>From Amount</th>
                      <th>To Amount</th>
                      <th>Target</th>
                      <th>Incentive Percentage</th>
                      <th>Action</th>
                    </tr>
                  
              </thead>
              <?php $sl=1;?>
              <tbody>
                @foreach ($incentivemaster as $incentivemasters)
                <tr>
                  <td>{{ $sl++ }}</td>
                  <td>{{ $incentivemasters->employeeType }}</td>
                  <td>{{ $incentivemasters->salary}}</td>
                  <td>{{ $incentivemasters->fromAmount}}</td>
                  <td>{{ $incentivemasters->toAmount}}</td>
                  <td>{{ $incentivemasters->target}}</td>
                  <td>{{ $incentivemasters->incentivePercentage}}</td>
                  <td>
                    <a href="{{ URL::to('/') }}/admin/incentivemaster/{{ $incentivemasters->id }}/edit"   class="active">
                      <i  style="color: #018001;" class="fa fa-pencil text-success text-active" aria-hidden="true"></i>
                    </a>
                    <form method="post" id="form4"  action="{{ URL::to('/') }}/admin/incentivemaster/{{ $incentivemasters->id }}" style="float:left; padding-right:10px;">
                      {{ method_field('DELETE') }}
                      {{ csrf_field() }}
                      <input type="hidden" name="_method" value="DELETE">
                      <button id="delete-btn4" type="submit" class="active" style="border: none;">
                      <i style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></button> 
                    </form>
                  </td>
                </tr>
                 @endforeach
              </tbody>
            </table>
         
          </div>
      </div>
    </div>
  </div>
@endif
@endsection
@section('jquery')
<script type="text/javascript" src="{!! asset('js/sweetalert.min.js') !!}"></script>
<script type="text/javascript">
$(document).ready(function(){
$('#delete-btn1').on('click', function(e){
        e.preventDefault();
      var self = $(this);
      swal({
                  title: "Are you sure?",
                  text: "All the selected  incentive will be deleted also!",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Yes, delete it!",
                  closeOnConfirm: true
              },
              function(isConfirm){
                  if(isConfirm){
                      swal("Deleted!","Incentive deleted", "success");
                      setTimeout(function() {
                          self.parents("#delete_form1").submit();
                      });
                  }
                  else{
                      swal("cancelled","Your Incentive are safe", "error");
                  }
              });
    });
$('#emp').DataTable();
 });

</script>


<script type="text/javascript">
$(document).ready(function(){
$('#delete-btn2').on('click', function(e){
      e.preventDefault();
      var self = $(this);
      swal({
                  title: "Are you sure?",
                  text: "All the selected incentive  will be deleted also!",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Yes, delete it!",
                  closeOnConfirm: true
              },
              function(isConfirm){
                  if(isConfirm){
                      swal("Deleted!","Incentive   deleted", "success");
                      setTimeout(function() {
                          self.parents("#delete_form2").submit();
                      });
                  }
                  else{
                      swal("cancelled","Your Incentive are safe", "error");
                  }
              });
    });
$('#dsa').DataTable();
});
</script>
<script type="text/javascript">
$(document).ready(function(){
$('#delete-btn3').on('click', function(e){
      e.preventDefault();
      var self = $(this);
      swal({
                  title: "Are you sure?",
                  text: "All the selected incentive  will be deleted also!",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Yes, delete it!",
                  closeOnConfirm: true
              },
              function(isConfirm){
                  if(isConfirm){
                      swal("Deleted!","Incentive  deleted", "success");
                      setTimeout(function() {
                          self.parents("#delete_form3").submit();
                      });
                  }
                  else{
                      swal("cancelled","Your Incentive are safe", "error");
                  }
              });
    });
$('#oi').DataTable();
 });
</script>
<script type="text/javascript">
$(document).ready(function(){
$('#delete-btn4').on('click', function(e){
      e.preventDefault();
      var self = $(this);
      swal({
                  title: "Are you sure?",
                  text: "All the selected incentive  will be deleted also!",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Yes, delete it!",
                  closeOnConfirm: true
              },
              function(isConfirm){
                  if(isConfirm){
                      swal("Deleted!","Incentive  deleted", "success");
                      setTimeout(function() {
                          self.parents("#form4").submit();
                      });
                  }
                  else{
                      swal("cancelled","Your Incentive are safe", "error");
                  }
              });
    });
$('#marketexeTable').DataTable();
 });
</script>
@endsection
