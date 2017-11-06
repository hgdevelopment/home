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
<link href="{{URL::asset('css/sweetalert.css') }}" media="all" rel="stylesheet" type="text/css" />
<div>
  <div class="wrapper-lg bg-white-opacity">
    <div class="row m-t">
      <form class="form-horizontal" id="upload" enctype="multipart/form-data" method="post" action="{{ route('web.changeimg') }}" autocomplete="off">
      {{ csrf_field() }}
        <div class="col-sm-12">
          <a href="#" class="thumb-lg pull-left m-r  pop1" id="click_img_container">
          <img  class="img-circle " draggable="true"  src="{{ URL::asset('storage/img/member_img/'.$blacklistmembers->photo)}}"   style="width:96px;height: 96px;"></a>
          <a href="#" class="thumb-lg m-r img-padder pop2" id="click_img_container" style="width: 160px;">
          <img src="{{ URL::asset('storage/img/proof/'.$blacklistproof->file)}}" draggable="true"  class="img-thumbnail " alt="" style="width: 100px;height:130px;" /><span style="margin-left: 30px;">PROOF</span><br> <span class="h6-text text-black" style="text-transform: uppercase;">Proof Type : &nbsp;{{$blacklistproof->typeOfProof}}</span><br> <span class="h6-text text-black" style="text-transform: uppercase;">ID Number : &nbsp;{{$blacklistproof->proofNumber}}</span></a>
          {{--  <input type="file" name="avatar_img" id="avatar_img" /> --}}
          <style type="text/css" media="screen">
          #click_img_container
          {
          position:relative;
          }
          #avatar_img
          {
          opacity:0;
          position:absolute;
          top:0;
          left:0;
          width:100%;
          height:100%;
          }
          #change_img
          {
          position: absolute;
          top: 0px;
          background: rgba(0, 0, 0, 0.4);
          width:100%;
          height:100%;
          border-radius: 50%;
          padding-top: 45%;
          text-align: center;
          color: #fff;
          }     
          </style>
          <div class="clear m-b">
          <div class="m-b m-t-sm">
          <span class="text-black name_text" style="text-transform: uppercase;">{{$blacklistmembers->name}}</span><br>
          <span  class="text-black name_text_sub" style="text-transform: uppercase;">{{$blacklistmembers->code}}</span><br>
          <span class="text-black name_text_sub" style="text-transform: uppercase;">{{$blacklistmembers->dob}}</span><br> 
          <span class="text-black name_text_sub" style="text-transform: uppercase;">{{$countryname->countryNames}}</span>          
          </div>              
          </div>
          <a href="#" class="pop3"> <img src="{{ URL::asset('storage/img/member_img/'.$blacklistmembers->singnature)}}" draggable="true"  class="img-thumbnail " alt="" style="width: 100px;height:50px;" /></a>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="modal fade" id="imagemodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">              
      <div class="modal-body">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <img src="" class="imagepreview" style="width: 100%;" >
      </div>
    </div>
  </div>
</div>
<div class="padder" style="padding-top: 15px;">  
  <div class="row">
    <div class="col-sm-12">
      <div class="panel panel-warning">
        <div class="panel-heading">Personal Details </div>
        <div class="panel-body">
          <div class="col-md-6 col-xs-12 divTableCell">Name<b class="data-lab">{{$blacklistmembers->name}}</b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Father's/ Husband's Name <b class="data-lab">{{$blacklistmembers->guardian}}</b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Date of Birth <b class="data-lab" >{{$blacklistmembers->dob}}</b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Gender <b class="data-lab">{{$blacklistmembers->gender}}</b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Religion <b class="data-lab">{{$blacklistmembers->religion}}</b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Caste<b class="data-lab">{{$blacklistmembers->caste}}</b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Nationality <b class="data-lab">{{$countryname->countryNames}}</b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Education <b class="data-lab">{{$blacklistmembers->education}}</b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Occupation <b class="data-lab">{{$blacklistmembers->occupation}}</b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Income <b class="data-lab">{{$blacklistmembers->incomeCurrencytype}} : {{$blacklistmembers->incomeAmount}}</b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Marital status<b class="data-lab">{{$blacklistmembers->maritalStatus}}</b></div>
          <div class="col-md-6 col-xs-12 divTableCell">No of Children <b class="data-lab">{{$blacklistmembers->noOfChildren}}</b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Mobile No <b class="data-lab">{{$blacklistmembers->mobileId}}{{$blacklistmembers->mobileNo}}</b></div>
          <div class="col-md-6 col-xs-12 divTableCell"> Landline No<b class="data-lab">{{$blacklistmembers->LandlineNo}}</b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Email <b class="data-lab">{{$blacklistmembers->email}}</b></div>
          <div class="col-md-6 col-xs-12 divTableCell"><p>How Do You Know About</p> Heera Group&nbsp;? <b class="data-lab" style="margin-left:50%; margin-top: -30px;">{{$blacklistmembers->aboutHeera}}</b></div>
        </div>  
      </div>
    </div>
  </div>
  <div class="row" style="padding-bottom: 20PX;">
    <div class="col-sm-12 col-md-6 padder-ad">
      <div class="panel panel-warning" >
        <div class="panel-heading"> Permanent Address
        </div>
        <div class="panel-body">
          @foreach($countryaddress as $countryname)
          @foreach($blacklistaddress as $Blacklistaddress)
          @if(($Blacklistaddress->typeOfAddress=='permanent')&&($countryname->type=='permanent'))
          <div class="col-md-12 col-xs-12 divTableCell">Address <b class="data-lab">{{$Blacklistaddress->address}}</b></div>
          <div class="col-md-12 col-xs-12 divTableCell">City<b class="data-lab">{{$Blacklistaddress->city}}</b></div>
          <div class="col-md-12 col-xs-12 divTableCell">State<b class="data-lab"> {{$Blacklistaddress->state}}</b></div>
          <div class="col-md-12 col-xs-12 divTableCell">Country<b class="data-lab">{{$countryname->Names}}</b></div>
          <div class="col-md-12 col-xs-12 divTableCell">Pin<b class="data-lab">{{$Blacklistaddress->pin}}</b></div>
          @endif
          @endforeach
          @endforeach
        </div>
      </div>
    </div>
    <div class="col-sm-12 col-md-6 padder-ad">
      <div class="panel panel-warning" >
        <div class="panel-heading"> Correspondence Address</div>
        <div class="panel-body">
          @foreach($countryaddress as $countryname)
          @foreach($blacklistaddress as $Blacklistaddress)
          @if(($Blacklistaddress->typeOfAddress=='correspondance')&&($countryname->type=='correspondance'))
          <div class="col-md-12 col-xs-12 divTableCell">Address <b class="data-lab">{{$Blacklistaddress->address}}</b></div>
          <div class="col-md-12 col-xs-12 divTableCell">City<b class="data-lab">{{$Blacklistaddress->city}}</b></div>
          <div class="col-md-12 col-xs-12 divTableCell">State<b class="data-lab"> {{$Blacklistaddress->state}}</b></div>
          <div class="col-md-12 col-xs-12 divTableCell">Country<b class="data-lab">{{$countryname->Names}}</b></div>
          <div class="col-md-12 col-xs-12 divTableCell">Pin<b class="data-lab">{{$Blacklistaddress->pin}}</b></div>
          @endif
          @endforeach
          @endforeach
        </div>
      </div>
    </div>
    </div>
    <div class="row">
    <div class="col-sm-12 col-md-6 padder-ad">
      <div class="panel panel-warning" >
        <div class="panel-heading">Official Address</div>
        <div class="panel-body">
          @foreach($countryaddress as $countryname) @endforeach
          @foreach($blacklistaddress as $Blacklistaddress)
          @if($Blacklistaddress->typeOfAddress=='official')
          <div class="col-md-12 col-xs-12 divTableCell">Address <b class="data-lab">{{$Blacklistaddress->address}}</b></div>
          <div class="col-md-12 col-xs-12 divTableCell">City<b class="data-lab">{{$Blacklistaddress->city}}</b></div>
          <div class="col-md-12 col-xs-12 divTableCell">State<b class="data-lab"> {{$Blacklistaddress->state}}</b></div>
          @if($countryname->type=='official')
          <div class="col-md-12 col-xs-12 divTableCell">Country<b class="data-lab">{{$countryname->Names}}</b></div>
          @endif
          <div class="col-md-12 col-xs-12 divTableCell">Pin<b class="data-lab">{{$Blacklistaddress->pin}}</b></div>
          @endif
          @endforeach
        </div>
      </div>
    </div>
  

    <div class="col-sm-12 col-md-6 padder-ad">
      <div class="panel panel-warning" >
        <div class="panel-heading">  Membership Details
        </div>
        <div class="panel-body"> 
          <div class="col-md-12 col-xs-12 divTableCell"> <b class="data-lab pull-left">INR</b> :<br> &nbsp;&nbsp;&nbsp;AMOUNT HOLDING : {{ json_decode($blacklistmembers->membership_details)->inr->type }} &nbsp;&nbsp;| &nbsp;&nbsp;AMOUNT APPLYING FOR : {{ json_decode($blacklistmembers->membership_details)->inr->amount }} </div>
          <div class="col-md-12 col-xs-12 divTableCell"> <b class="data-lab pull-left">AED</b> : <br>&nbsp;&nbsp;&nbsp;AMOUNT HOLDING : {{ json_decode($blacklistmembers->membership_details)->aed->type }} &nbsp;&nbsp;| &nbsp;&nbsp;AMOUNT APPLYING FOR : {{ json_decode($blacklistmembers->membership_details)->aed->amount }} </div>
          <div class="col-md-12 col-xs-12 divTableCell"> <b class="data-lab pull-left">USD</b> : <br>&nbsp;&nbsp;&nbsp;AMOUNT HOLDING : {{ json_decode($blacklistmembers->membership_details)->usd->type }} &nbsp;&nbsp;| &nbsp;&nbsp;AMOUNT APPLYING FOR : {{ json_decode($blacklistmembers->membership_details)->usd->amount }} </div>
          <div class="col-md-12 col-xs-12 divTableCell"> <b class="data-lab pull-left">SAR</b> :<br> &nbsp;&nbsp;&nbsp;AMOUNT HOLDING : {{ json_decode($blacklistmembers->membership_details)->sar->type }} &nbsp;&nbsp;| &nbsp;&nbsp;AMOUNT APPLYING FOR : {{ json_decode($blacklistmembers->membership_details)->sar->amount }} </div>
          <div class="col-md-12 col-xs-12 divTableCell"> <b class="data-lab pull-left">CAD</b> :<br> &nbsp;&nbsp;&nbsp;AMOUNT HOLDING : {{ json_decode($blacklistmembers->membership_details)->cad->type }} &nbsp;&nbsp;| &nbsp;&nbsp;AMOUNT APPLYING FOR : {{ json_decode($blacklistmembers->membership_details)->cad->amount }} </div>
        </div>
      </div>
    </div>
  </div>
  <div class="row">
    <div class="col-sm-12" ><br></div>
    <div class="form-group">
      <div class="col-sm-5 "><br></div>
      <div class="col-sm-3">
        {{-- <a href="{{ URL::to('/') }}/admin/member/blacklistMember/{{ $blacklistmembers->userId }}/edit"  class="active">     
        <button name="edit" type="submit" class="btn btn-info" id="edit">Edit</button></a>  --}} 
        <span class="btn btn-danger" onclick="deleteblacklist({{ $blacklistmembers->userId }})">Delete</span>
        {{-- <span class="btn btn-success" onclick="blacklistView({{ $blacklistmembers->userId }})">Submit</span> --}}
         {{-- <a href="{{ URL::to('/') }}/admin/member/blacklistMember/{id}/{{ $blacklistmembers->userId }}"  class="active">     
        <button name="submit" type="submit" class="btn btn-success" id="submit">submit</button></a>  --}}
      </div>
    </div> 
    <div class="col-sm-12" ><br></div>
  </div>
</div>
<div class="wrapper-md">
    <div class="line line-dashed b-b line-lg pull-in"></div>
    <div class="col-md-12"><br></div>
    <div class="panel panel-default">
      <div class="table-responsive" style="overflow-x: initial;">
        <table  class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%" id="viewRequest">
          <thead>
          <div class="panel-heading">
            View Similar Request
          </div>
          <tr>
            <th>Sl No</th>
            <th>Name</th> 
            <th>Code</th> 
            <th>Gender</th>
            <th>Status</th> 
          </tr>
        </thead> 
        <tbody>
          @foreach($similarrecords as $key => $records)
            <tr>
              <td>{{ $key+1 }}</td>
              <td>{{ $records->name }}</td>
              <td>{{ $records->uname }}</td>
              <td>{{ $records->gender }}</td>
              <td>{{$records->logstatus}}</td>
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
  $(document).ready(function()
{
      $("#viewRequest").DataTable();
    });
</script>
<script  src="{{URL::asset('js/sweetalert.min.js') }}"></script>
<script >
  $(function() {
  $('.pop1,.pop2,.pop3').click(function(){
  $('.imagepreview').attr('src', $(this).find('img').attr('src'));
  $('#imagemodal').modal('show'); 
  });

  });
</script>
<script type="text/javascript">
  function deleteblacklist(id)
  {
  swal({
  title: "Delete!!!",
  text: "Are you sure?",
  type: "error",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Delete Member!", 
  closeOnConfirm: true
  }, 
  function (isConfirm) 
  {

  if(isConfirm) 
  {
  $.ajax({
  url: "{{ URL::to('admin/member/blacklistMember/delete') }}/"+id,
  type: "get",
  dataType: "html",
  success: function (data) 
  { 
  //alert(data);   
  swal("Member Deleted!", "", "success");
  setTimeout(function()
  {
  window.location.href = "{{ URL::to('admin/member/blacklistMember') }}";
  }, 2000);
  },
  });
  }
  else
  {
  swal("cancelled","", "error");
  }
  });
  }
</script>
{{-- <script type="text/javascript">
  function deleteblacklist(id)
  {

  swal({
  title: "Delete!!!",
  text: "Are you sure?",
  type: "error",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Delete Member!",
  closeOnConfirm: true
  }, 
  function (isConfirm) 
  {

  if(isConfirm) 
  {
  $.ajax({
  url: "{{ URL::to('admin/member/blacklistMember/delete') }}",
  type: "get",
  data: {method:'get', "_token": "{{ csrf_token() }}","userId": id},
  dataType: "html",
  success: function (data) 
  {    
  swal("Member Deleted!", "", "success");
  setTimeout(function()
  {
  window.location.href = "{{ URL::to('admin/member/blacklistMember') }}";
  }, 2000);
  },
  });
  }
  else
  {
  swal("cancelled","", "error");
  }
  });
  }
</script> --}}   
<script type="text/javascript">
  function blacklistView(userId)
  {

  swal({
  title: "Submit!!!",
  text: "Are you sure?",
  type: "success",
  showCancelButton: true,
  confirmButtonColor: "#DD6B55",
  confirmButtonText: "Submit Member!",
  closeOnConfirm: true
  }, 
  function (isConfirm) 
  {

  if(isConfirm) 
  {
  $.ajax({
  url: "{{ URL::to('admin/member/blacklistMembersubmit') }}/"+userId,
  type: "get",
  data: {method:'get', "userId": userId},
  dataType: "html",
  success: function (data) 
  { 
    //alert(data);
  swal("Member Submitted!", "", "success");
  setTimeout(function()
  {
  window.location.href = "{{ URL::to('admin/member/blacklistMember') }}";
  }, 2000);
  },
  });
  }
  else
  {
  swal("cancelled","", "error");
  }
  });
  }
</script> 
@endsection


