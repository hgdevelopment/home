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
  <h1 class="m-n font-thin h3">Access Rights</h1>
</div>

<div class="wrapper-md" ng-controller="FormDemoCtrl">
  <form role="form" method="POST" action="{{URL::to('/') }}/admin/accessRights">

    <div class="panel panel-default">
      <div class="panel-heading font-bold">SELECT USER</div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-4">
              {{ csrf_field() }}
            <label>USER TYPE</label>
            <select class="form-control col-md-6 chosen-select" name="userType" id="userType" onchange="getUsers()">
            <option value="OI" @if(isset($userType) && $userType=='OI'){{'selected'}}@endif>Office Incharge</option>
            <option value="ME" @if(isset($userType) && $userType=='ME'){{'selected'}}@endif>Marketing executive</option>
            <option value="EMP" @if(isset($userType) && $userType=='EMP'){{'selected'}}@endif>Employee</option>
            <option value="DSA" @if(isset($userType) && $userType=='DSA'){{'selected'}}@endif>Direct Selling Agent</option>
            {{-- <option value="MEM" @if(isset($userType) && $userType=='MEM'){{'selected'}}@endif>Member</option> --}}
            </select>
          </div>

          <div class="col-md-4" id="userResult">


          </div>
        </div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading font-bold">ACCESS RIGHTS FOR USER</div>
      <div class="panel-body">
        <div class="row" id="accessResult">

        </div>
        <div class="row text-center save "><br>
        <input type="submit" value="Save" class="btn btn-success font-bold">
        </div>
      </div>
    </div>
  </form>    
</div>
@endsection

@section('jquery')
<script type="text/javascript">
$(".chosen-select").chosen({width:'100%'});

function getUsers()
{
var userType = $('#userType').val();

// if(userType=='OI')
// getAccessAdmin();

var userId=@php 
if(isset($userId)) echo $userId; else echo '0'; @endphp;

$.ajax({
     type: "get",
     url:"{{URL::to('/') }}/admin/accessRights/1",
     data:{process:'userNames',userType:userType,userId:userId},
     success: function (data) {
        $('#userResult').html(data);
        $(".chosen-select").chosen({width:'100%'});
        getAccess();
     }
 });
}


function getAccess()
{

var userId = $('#userId').val();

if(isNaN(userId))
{
$('#accessResult').html('<div class="col-md-12 text-center text-danger font-bold">No Record Found....</div>');
$('.save').css("display","none")
}else
$.ajax({
     type: "get",
     url:"{{URL::to('/') }}/admin/accessRights/2",
     data:{process:'accessRights',userId:userId},
     success: function (data) {

        $('#accessResult').html(data);
        $('.save').css("display","block")
     }
 });
}

function getAccessAdmin()
{


$.ajax({
     type: "get",
     url:"{{URL::to('/') }}/admin/accessRights/2",
     data:{process:'accessRights',userId:1},
     success: function (data) {
         $('#userResult').html('<lable>User Name</lable><select class="form-control chosen-select" name="userId"><option value="1">ADMIN</option></select>');
        $('#accessResult').html(data);
        $('.save').css("display","block")
        $(".chosen-select").chosen({width:'100%'});

     }
 });
}



function setCheckBox(id)
{
if(document.getElementById('check'+id).checked==true)
 $('#Div'+id+ ' :checkbox').prop('checked', true);
else
 $('#Div'+id+ ' :checkbox').prop('checked', false);  
}

function setCheckBoxParent(id)
{
 $('#check'+id).prop('checked', true);

}


getUsers();
</script>

@endsection
