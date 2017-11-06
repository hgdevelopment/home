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
<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">Create Page</h1>
</div>
@if ($errors->any())
  <div class="alert alert-danger">
    <strong>Error!</strong> {{ implode('', $errors->all(':message')) }}
  </div>  
@endif
<style>
</style>
<div class="col-sm-12"><br></div>
<div class="col-sm-12">
  <div class="panel panel-default">
    <div class="panel-heading font-bold">Create Page</div>
    <div class="panel-body">
      @if (trim($__env->yieldContent('edit_id')))
        <form role="form" method="post" action="{{URL::to('/') }}/admin/useraccess/@yield('edit_id')" enctype="multipart/form-data">
      @else
        <form role="form" method="post" action="{{URL::to('/') }}/admin/useraccess" enctype="multipart/form-data" data-parsley-validate>
      @endif
      {{ csrf_field() }}
      @section('edit')
      @show
          <div class="col-sm-6">
            <div class="form-group">
              <label>Select Parent</label>
              <select name="parent_id" class="form-control" id="parent_id">
                <option value="0">Parent</option>
                @foreach ($parents as $element)
                  <option value="{{$element->id}}" {{ (old('parent_id')==$element->id)?'selected':'' }} @yield('parent_id') <?= (isset($editpages) && $editpages->parent_id==$element->id)?'selected':'' ?> >{{$element->menu_name}}</option>
                @endforeach
              </select>
              @if ($errors->has('parent'))
              <span class="help-inline">{{$errors->first('parent')}}</span>
              @endif
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Page Name</label>
              <input type="text" class="form-control" placeholder="Page Name" name="menu_name" value="{{isset($editpages)?'':old('menu_name')}}@yield('menu_name')" required data-parsley-required-message="Enter Page Name">
              @if ($errors->has('menu_name'))
              <span class="help-inline">{{$errors->first('menu_name')}}</span>
              @endif
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Url</label>
              <input type="text" class="form-control" placeholder="URL" name="url" value="{{isset($editpages)?'':old('url')}}@yield('url')" required data-parsley-required-message="Enter URL">
              @if ($errors->has('url'))
              <span class="help-inline">{{$errors->first('url')}}</span>
              @endif
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Icon</label>
              <input type="text" class="form-control" placeholder="Icon(fa fa-icon)" name="icon" value="{{isset($editpages)?'':old('icon')}}@yield('icon')">
              @if ($errors->has('icon'))
              <span class="help-inline">{{$errors->first('icon')}}</span>
              @endif
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Sort Order</label>
              <input type="text" class="form-control" placeholder="Sort Order" name="sort_order" value="{{isset($editpages)?'':old('sort_order')}}@yield('sort_order')" onblur="order(this.value)" >
             <ul class="parsley-errors-list filled error" style="display: none"><li class="parsley-required">This Value Already Exit.</li></ul>
              @if ($errors->has('sort_order'))
              <span class="help-inline">{{$errors->first('sort_order')}}</span>
              @endif
            </div>
          </div>
           <div class="col-sm-6" id="in_order" style="display: none;">
            <div class="form-group">
              <label>Sort In Order</label>
              <input type="text" class="form-control" placeholder="Sort In Order" name="sort_in_order" value="{{isset($editpages)?'':old('sort_in_order')}}@yield('sort_in_order')" onblur="order1(this.value)">
              <ul class="parsley-errors-list filled error1" style="display: none"><li class="parsley-required">This Value Already Exit.</li></ul>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group col-sm-6 col-sm-offset-5">
            <label>&nbsp;</label>
            <br/>
            <button type="submit" class="btn btn-sm btn-primary"><?= isset($editpages)?'Update page':'Add page' ?></button>
            </div>
          </div>
        </form>
    </div>
  </div>
</div>
<div class="col-sm-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      {{--    <span class="label bg-danger pull-right m-t-xs">4 left</span> --}}
      Pages
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-hover dt-responsive" id="myTable" style="background: #fff;" cellspacing="0">
        <thead>
          <tr>
            <th>Menu Name</th>
            <th>Parent Page</th>
            <th>Url</th>
            <th width="30%">Icon</th>
            <th>Sort Order</th>
            <th>In Order</th>
            <th width="30%">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($pages as $element)
          <tr>
            <td>
              {{$element->menu_name}}
            </td>
            <td>{{isset($element->parent->menu_name)?$element->parent->menu_name:''}}</td>
            <td>{{$element->url}}</td>
            <td>{{$element->icon}}  <i class="{{$element->icon}} " style="color: green" aria-hidden="true"></i></td>
            <td>{{$element->sort_order}}</td>
            <td>{{$element->sort_in_order}}</td>
            <td>
              <a href="{{ URL::to('/') }}/admin/useraccess/{{ $element->id }}/edit" class="btn btn-success"  style="margin-left: 5px"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
              <form action="{{ URL::to('/') }}/admin/useraccess/{{ $element->id }}" method="POST" class="pull-left" id="delete_record">
                {{ method_field('DELETE') }}
                {{ csrf_field() }}
                <button class="btn btn-danger" ><i class="fa fa-trash-o" aria-hidden="true" ></i></button> 
              </form>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>
@endsection
@section('jquery')
<script type="text/javascript">
$(function() {
$( "#depositeDate").datepicker();
$( "#dob").datepicker();
});	
$(".chosen-select").chosen({width:'100%'});
$(document).ready(function() {
    $('#myTable').DataTable( {
        order: [[ 1, 'asc' ]]
    } );
} );
</script>

<script type="text/javascript">
$(document).ready(function(){
    $("#parent_id").click(function(){
        var parent_id=$("#parent_id").val();
    if(parent_id==0) 
    $("#in_order").hide();
    else
    $("#in_order").show();
        
    });
});
</script>
<script type="text/javascript">
  function order(orderNo)
{
  if(orderNo!=0)
  {
  $.ajax(
  {
    type: "get",
    url: "{{URL::to('/') }}/admin/checkNo",
    data:{value:orderNo},
    success: function (data) {
    if(data==0)
    {

     $('.error').css('display','none'); 
    }
    else
    {
     
    $('.error').css('display','block');
    }
    }
  });
  }
  }
</script>
<script type="text/javascript">
  function order1(orderNo)
{
  var parent_id=$("#parent_id").val();
  if(orderNo!=0)
  {
  $.ajax(
  {
    type: "get",
    url: "{{URL::to('/') }}/admin/checkNo1",
    data:{value:orderNo,parent_id:parent_id},
    success: function (data) {
    if(data==0)
    {

     $('.error1').css('display','none'); 
    }
    else
    {
     
    $('.error1').css('display','block');
    }
    }
  });
  }
  }
</script>
@endsection


