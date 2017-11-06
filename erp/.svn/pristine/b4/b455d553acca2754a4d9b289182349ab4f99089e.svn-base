
@extends('web.layout.erp')
@section('banner')
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
  <img src="{{ URL::asset('new_heading.png') }}" class="img-responsive">
</div>
@endsection
@section('sidebar')
  {{-- @include('partial.header') --}}
 {{--  @include('partial.aside') --}}
@endsection
@section('body')
<style type="text/css">
  .app-content{
  margin-left: 0px;
  }
  .app-header-fixed {
  padding-top: 0px;
  }
  .navbar-collapse, .app-content, .app-footer {
  margin-left: 0px;
  }
  span.help-inline{ 
  color:red;
  }
</style>
  <link href="{{ URL::asset('css/sweetalert.css') }}" rel="stylesheet">
  <div>
    <div class="wrapper-lg bg-white-opacity">
      <div class="row m-t">
        <form class="form-horizontal" id="upload" enctype="multipart/form-data" method="post" action="{{ route('web.changeimg') }}" autocomplete="off">
          {{ csrf_field() }}
          <div class="col-sm-12">
            <a href="#" class="thumb-lg pull-left m-r pop1 " id="click_img_container">
            <img  class="img-circle " draggable="true"  src="{{ URL::asset('storage/img/member_img/'.$viewmember->photo)}}"   style="width:96px;height: 96px;"></a>
            <a href="#" class="thumb-lg m-r img-padder pop2" id="click_img_container" style="width: 150px;">
            <img src="{{ URL::asset('storage/img/proof/'.$viewmem->file)}}" draggable="true"  class="img-thumbnail " alt="" style="width: 100px;height:130px;" /><span style="margin-left: 30px;">PROOF</span><br> <span class="h6-text text-black" style="text-transform: uppercase;">Proof Type : &nbsp;{{$viewmem->typeOfProof}}</span><br> <span class="h6-text text-black" style="text-transform: uppercase;">ID Number: &nbsp;{{$viewmem->proofNumber}}</span></a>
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
               <span class="text-black name_text" style="text-transform: uppercase;">{{$viewmember->name}}</span><br>
               <span  class="text-black name_text_sub" style="text-transform: uppercase;">{{$viewmember->code}}</span><br>
               <span class="text-black name_text_sub" style="text-transform: uppercase;">{{$viewmember->dob}}</span><br> 
                <span class="text-black name_text_sub" style="text-transform: uppercase;">{{$countrys ->countryNames}}</span>
              </div>
            </div>
            <a href="#" class="pop3">
            <img src="{{ URL::asset('storage/img/member_img/'.$viewmember->singnature)}}" draggable="true"  class="img-thumbnail " alt="" style="width: 100px;height:50px;" /></a>
          </div>
        </form>
      </div>
    </div>
  </div>
  <div class="padder" style="padding-top: 15px;">  
    <div class="row">
      <div class="col-sm-12">
        <div class="panel panel-warning">
          <div class="panel-heading">Personal Details </div>
          <div class="panel-body">
            <div class="col-md-6 col-xs-12 divTableCell">Name<b class="data-lab">{{$viewmember->name}}</b></div>
            <div class="col-md-6 col-xs-12 divTableCell">Father's Name/ Husband's Name<b class="data-lab">{{$viewmember->guardian}}</b></div>
            <div class="col-md-6 col-xs-12 divTableCell">Date of Birth<b class="data-lab">{{$viewmember->dob}}</b></div>
            <div class="col-md-6 col-xs-12 divTableCell">Gender<b class="data-lab">{{$viewmember->gender}}</b></div>
            <div class="col-md-6 col-xs-12 divTableCell">Religion<b class="data-lab">{{$viewmember->religion}}</b></div>
            <div class="col-md-6 col-xs-12 divTableCell">Caste<b class="data-lab">{{$viewmember->caste}}</b></div>
            <div class="col-md-6 col-xs-12 divTableCell">Nationality<b class="data-lab">{{$countrys ->countryNames}}</b></div>
            <div class="col-md-6 col-xs-12 divTableCell">Education<b class="data-lab">{{$viewmember->education}}</b></div>
            <div class="col-md-6 col-xs-12 divTableCell">Occupation<b class="data-lab">{{$viewmember->occupation}}</b></div>
            <div class="col-md-6 col-xs-12 divTableCell">Marital status<b class="data-lab">{{$viewmember->maritalStatus}}</b></div>
            <div class="col-md-6 col-xs-12 divTableCell">No of Children<b class="data-lab">{{$viewmember->noOfChildren}}</b></div>
            <div class="col-md-6 col-xs-12 divTableCell">Income<b class="data-lab">{{$viewmember->incomeCurrencytype}} : {{$viewmember->incomeAmount}}</b></div>
            <div class="col-md-6 col-xs-12 divTableCell">Mobile No<b class="data-lab">{{$viewmember->mobileId}}{{$viewmember->mobileNo}}</b></div>
            <div class="col-md-6 col-xs-12 divTableCell">Landline No<b class="data-lab">{{$viewmember->LandlineNo}}</b></div>
            <div class="col-md-6 col-xs-12 divTableCell">Email<b class="data-lab">{{$viewmember->email}}</b></div>
            <div class="col-md-6 col-xs-12 divTableCell">How Do You Know About Heera Group<b class="data-lab">{{$viewmember->aboutHeera}}</b></div>
          </div>
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
    <div class="row" style="padding-bottom: 20PX;">
      <div class="col-sm-12 col-md-6">
        <div class="panel panel-warning">
          <div class="panel-heading"> Permanent Address  </div>
          <div class="panel-body">
            @foreach($countryname as $country)
            @foreach($viewmemb as $address)
            @if(($address->typeOfAddress=='permanent')&&($country->type=='permanent'))
              <div class="col-md-12 col-xs-12 divTableCell">Address<b class="data-lab">{{$address->address}}</b></div>
              <div class="col-md-12 col-xs-12 divTableCell">City<b class="data-lab">{{$address->city}}</b></div>
              <div class="col-md-12 col-xs-12 divTableCell">State<b class="data-lab">{{$address->state}}</b></div>
              <div class="col-md-12 col-xs-12 divTableCell">Country<b class="data-lab">{{$country->Names}}</b></div>
              <div class="col-md-12 col-xs-12 divTableCell">Pin<b class="data-lab">{{$address->pin}}</b></div>
            @endif
            @endforeach
            @endforeach
          </div>
        </div>
      </div>
      <div class="col-sm-12 col-md-6">
        <div class="panel panel-warning">
          <div class="panel-heading"> Correspondence Address
          </div>
          <div class="panel-body">
            @foreach($countryname as $country)
            @foreach($viewmemb as $address)
            @if(($address->typeOfAddress=='correspondance')&&($country->type=='correspondance'))
            <div class="col-md-12 col-xs-12 divTableCell">Address<b class="data-lab">{{$address->address}}</b></div>
            <div class="col-md-12 col-xs-12 divTableCell">City<b class="data-lab">{{$address->city}}</b></div>
            <div class="col-md-12 col-xs-12 divTableCell">State<b class="data-lab">{{$address->state}}</b></div>
            <div class="col-md-12col-xs-12 divTableCell">Country<b class="data-lab">{{$country->Names}}</b></div>
            <div class="col-md-12 col-xs-12 divTableCell">Pin<b class="data-lab">{{$address->pin}}</b></div>
            @endif
            @endforeach
            @endforeach
          </div>
        </div>
      </div>
      <div class="col-sm-12"></div>
      <div class="col-sm-12 col-md-6">
        <div class="panel panel-warning">
          <div class="panel-heading"> Official Address
          </div>
          <div class="panel-body">
            @foreach($countryname as $country) @endforeach
            @foreach($viewmemb as $address)
            @if($address->typeOfAddress=='official')
            <div class="col-md-12 col-xs-12 divTableCell">Address<b class="data-lab">{{$address->address}}</b></div>
            <div class="col-md-12 col-xs-12 divTableCell">City<b class="data-lab">{{$address->city}}</b></div>
            <div class="col-md-12 col-xs-12 divTableCell">State<b class="data-lab">{{$address->state}}</b></div>
            @if($country->type=='official')
            <div class="col-md-12 col-xs-12 divTableCell">Country<b class="data-lab">{{$country->Names}}</b></div>
            @endif
            <div class="col-md-12 col-xs-12 divTableCell">Pin<b class="data-lab">{{$address->pin}}</b></div>
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
            <div class="col-md-12 col-xs-12 divTableCell"> <b class="data-lab pull-left">INR</b> : &nbsp;&nbsp;&nbsp;AMOUNT HOLDING : {{ json_decode($viewmember->membership_details)->inr->type }} &nbsp;&nbsp;| &nbsp;&nbsp;AMOUNT APPLYING FOR : {{ json_decode($viewmember->membership_details)->inr->amount }} </div>
            <div class="col-md-12 col-xs-12 divTableCell"> <b class="data-lab pull-left">AED</b> : &nbsp;&nbsp;&nbsp;AMOUNT HOLDING : {{ json_decode($viewmember->membership_details)->aed->type }} &nbsp;&nbsp;| &nbsp;&nbsp;AMOUNT APPLYING FOR : {{ json_decode($viewmember->membership_details)->aed->amount }} </div>
            <div class="col-md-12 col-xs-12 divTableCell"> <b class="data-lab pull-left">USD</b> : &nbsp;&nbsp;&nbsp;AMOUNT HOLDING : {{ json_decode($viewmember->membership_details)->usd->type }} &nbsp;&nbsp;| &nbsp;&nbsp;AMOUNT APPLYING FOR : {{ json_decode($viewmember->membership_details)->usd->amount }} </div>
            <div class="col-md-12 col-xs-12 divTableCell"> <b class="data-lab pull-left">SAR</b> : &nbsp;&nbsp;&nbsp;AMOUNT HOLDING : {{ json_decode($viewmember->membership_details)->sar->type }} &nbsp;&nbsp;| &nbsp;&nbsp;AMOUNT APPLYING FOR : {{ json_decode($viewmember->membership_details)->sar->amount }} </div>
            <div class="col-md-12 col-xs-12 divTableCell"> <b class="data-lab pull-left">CAD</b> : &nbsp;&nbsp;&nbsp;AMOUNT HOLDING : {{ json_decode($viewmember->membership_details)->cad->type }} &nbsp;&nbsp;| &nbsp;&nbsp;AMOUNT APPLYING FOR : {{ json_decode($viewmember->membership_details)->cad->amount }} </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <div class="row">
    <div class="col-sm-12 col-md-6">
    <div class="panel panel-warning">
    <div class="panel-heading">Proofs </div>
    <div class="panel-body">
    <div class="col-md-6 col-xs-12 divTableCell">Type of proof<b class="data-lab">{{$viewmem->typeOfProof}}</b></div>
    <div class="col-md-6 col-xs-12 divTableCell">ID Number<b class="data-lab">{{$viewmem->proofNumber}}</b></div>
    </div>
    </div>
    </div>

    <div class="col-sm-12 col-md-6">
    <div class="panel panel-warning">
    <div class="panel-heading"> Proof Images
    </div>
    <div class="panel-body">
    <div class="col-md-4 col-xs-12 divTableCell text-center">Photos<img src="{{ URL::asset('storage/img/member_img/'.$viewmember->photo)}}" class="img-thumbnail" alt="" style="width: 100px;"/> </div>
    <div class="col-md-4 col-xs-12 divTableCell text-center">singnature<img src="{{ URL::asset('storage/img/member_img/'.$viewmember->singnature)}}" class="img-thumbnail" alt="" style="width: 100px;"/>  </div>
    <div class="col-md-4 col-xs-12 divTableCell text-center">Proof<img src="{{ URL::asset('storage/img/proof/'.$viewmem->file)}}" class="img-thumbnail" alt="" style="width: 100px;" /> </div>
    </div>
    </div>
    </div>
    </div> -->

    <div class="row">
      <div class="col-sm-12 col-md-4"></div>
      <div class="col-sm-12 col-md-4">
        <div class="panel panel-warning">
          <div class="panel-heading">Actions </div>
          <div class="panel-body">
            <div class="col-sm-12 ">
              <a href="{{ URL::to('/') }}/member/{{ $viewmember->userId }}/edit"  class="active">  
              <button name="edit" type="submit" class="btn btn-info" id="edit">Edit</button></a>
              <a href="{{URL::to('/')}}/web/member/memberconfrim/{{ $viewmember->userId }}" class="active">
              <button name="confrim" type="submit" class="btn btn-primary" id="confrim">Confrim</button></a>  
            </div>
          </div>
        </div>
      </div>
    <div class="col-sm-12 col-md-4"></div>
  </div>
    @endsection
    @section('jquery')
    <script type="text/javascript" src="{{ URL::asset('js/parsley.min.js') }}"></script>
    <script >
    $(function() {
    $('.pop1,.pop2,.pop3').click(function(){
    $('.imagepreview').attr('src', $(this).find('img').attr('src'));
    $('#imagemodal').modal('show'); 
    });
    });
    </script>
    <script type="text/javascript"></script>
    @endsection


