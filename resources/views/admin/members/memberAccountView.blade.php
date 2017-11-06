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
<link href="{{ URL::asset('css/sweetalert.css') }}" rel="stylesheet">
<div>
  <div class="wrapper-lg bg-white-opacity">
    <div class="row m-t">
      <form class="form-horizontal" id="upload" enctype="multipart/form-data" method="post" action="{{ route('web.changeimg') }}" autocomplete="off">
      {{ csrf_field() }}
        <div class="col-sm-12">
          <a href="#" class="thumb-lg pull-left m-r pop1" id="click_img_container">
          <img  class="img-circle " draggable="true"  src="{{ URL::asset('storage/img/member_img/'.$memberaccount->photo)}}"   style="width:96px;height: 96px;"></a>
          <a href="#" class="thumb-lg m-r img-padder pop2" id="click_img_container" style="width: 160px;">
          <img src="{{ URL::asset('storage/img/member_img/'.$memberaccount->singnature)}}" draggable="true"  class="img-thumbnail " alt="" style="width: 100px;height:130px;" /><span style="margin-left: 30px;">PROOF</span><br> <span class="h6-text text-black" style="text-transform: uppercase;">Proof Type : &nbsp;{{$memberproof->typeOfProof}}</span><br> <span class="h6-text text-black" style="text-transform: uppercase;">ID Number : &nbsp;{{$memberproof->proofNumber}}</span></a>
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
            <span class="text-black name_text" style="text-transform: uppercase;">{{$memberaccount->name}}</span><br>
            <span class="text-black name_text_sub" style="text-transform: uppercase;">{{$memberaccount->code}}</span><br>
            <span class="text-black name_text_sub" style="text-transform: uppercase;">{{$memberaccount->dob}}</span><br>
            <span class="text-black name_text_sub" style="text-transform: uppercase;">{{$memberaccount->countryNames}}</span>
            </div>
          </div>
          <a href="#" class="pop3">
          <img src="{{ URL::asset('storage/img/member_img/'.$memberaccount->singnature)}}" draggable="true"  class="img-thumbnail " alt="" style="width: 100px;height:50px;" /></a>
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
          <div class="col-md-6 col-xs-12 divTableCell">Name<b class="data-lab">{{$memberaccount->name}}</b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Father's/ Husband's Name <b class="data-lab">{{$memberaccount->guardian}}</b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Date of Birth <b class="data-lab" >{{$memberaccount->dob}}</b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Gender <b class="data-lab">{{$memberaccount->gender}}</b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Religion <b class="data-lab">{{$memberaccount->religion}}</b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Caste<b class="data-lab">{{$memberaccount->caste}}</b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Nationality <b class="data-lab">{{$countryname->countryNames}}</b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Education <b class="data-lab">{{$memberaccount->education}}</b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Occupation <b class="data-lab">{{$memberaccount->occupation}}</b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Income <b class="data-lab">{{$memberaccount->incomeCurrencytype}} : {{$memberaccount->incomeAmount}}</b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Marital status<b class="data-lab">{{$memberaccount->maritalStatus}}</b></div>
          <div class="col-md-6 col-xs-12 divTableCell">No of Children <b class="data-lab">{{$memberaccount->noOfChildren}}</b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Mobile No <b class="data-lab">{{$memberaccount->mobileId}}{{$memberaccount->mobileNo}}</b></div>
          <div class="col-md-6 col-xs-12 divTableCell"> Landline No<b class="data-lab">{{$memberaccount->LandlineNo}}</b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Email <b class="data-lab">{{$memberaccount->email}}</b></div>
          <div class="col-md-6 col-xs-12 divTableCell"><p>How Do You Know</p>About Heera Group&nbsp;? <b class="data-lab" style="margin-left:50%; margin-top: -30px;">{{$memberaccount->aboutHeera}}</b></div>
        </div>
      </div>
    </div>
  </div>
  <div class="row" style="padding-bottom: 20PX;">
    <div class="col-sm-12 col-md-4 padder-ad">
      <div class="panel panel-warning" >
        <div class="panel-heading"> Permanent Address
        </div>
        <div class="panel-body">
          @foreach($countryaddress as $ctryname)
          @foreach($memberaddress as $Memberaddress)
          @if(($Memberaddress->typeOfAddress=='permanent')&&($ctryname->type=='permanent'))
          <div class="col-md-12 col-xs-12 divTableCell">Address <b class="data-lab">{{$Memberaddress->address}}</b></div>
          <div class="col-md-12 col-xs-12 divTableCell">City<b class="data-lab">{{$Memberaddress->city}}</b></div>
          <div class="col-md-12 col-xs-12 divTableCell">State<b class="data-lab"> {{$Memberaddress->state}}</b></div>
          <div class="col-md-12 col-xs-12 divTableCell">Country<b class="data-lab">{{$ctryname->Names}}</b></div>
          <div class="col-md-12 col-xs-12 divTableCell">Pin<b class="data-lab">{{$Memberaddress->pin}}</b></div>
          @endif
          @endforeach
          @endforeach
        </div>
      </div>
    </div>
    <div class="col-sm-12 col-md-4 padder-ad">
      <div class="panel panel-warning" >
        <div class="panel-heading">  Correspondence Address
        </div>
        <div class="panel-body">
          @foreach($countryaddress as $ctryname)
          @foreach($memberaddress as $Memberaddress)
          @if(($Memberaddress->typeOfAddress=='correspondance')&&($ctryname->type=='correspondance'))
          <div class="col-md-12 col-xs-12 divTableCell">Address <b class="data-lab">{{$Memberaddress->address}}</b></div>
          <div class="col-md-12 col-xs-12 divTableCell">City<b class="data-lab">{{$Memberaddress->city}}</b></div>
          <div class="col-md-12 col-xs-12 divTableCell">State<b class="data-lab"> {{$Memberaddress->state}}</b></div>
          <div class="col-md-12 col-xs-12 divTableCell">Country<b class="data-lab">{{$ctryname->Names}}</b></div>
          <div class="col-md-12 col-xs-12 divTableCell">Pin<b class="data-lab">{{$Memberaddress->pin}}</b></div>
          @endif
          @endforeach
          @endforeach
        </div>
      </div>
    </div>
    <div class="col-sm-12 col-md-4 padder-ad">
      <div class="panel panel-warning" >
        <div class="panel-heading">Official Address</div>
        <div class="panel-body">
          @foreach($countryaddress as $ctryname) @endforeach
          @foreach($memberaddress as $Memberaddress)
          @if($Memberaddress->typeOfAddress=='official')
          <div class="col-md-12 col-xs-12 divTableCell">Address <b class="data-lab">{{$Memberaddress->address}}</b></div>
          <div class="col-md-12 col-xs-12 divTableCell">City<b class="data-lab">{{$Memberaddress->city}}</b></div>
          <div class="col-md-12 col-xs-12 divTableCell">State<b class="data-lab"> {{$Memberaddress->state}}</b></div>
          @if($ctryname->type=='official')
          <div class="col-md-12 col-xs-12 divTableCell">Country<b class="data-lab">{{$ctryname->Names}}</b></div>
          @endif
          <div class="col-md-12 col-xs-12 divTableCell">Pin<b class="data-lab">{{$Memberaddress->pin}}</b></div>
          @endif
          @endforeach
        </div>
      </div>
    </div>
       <div class="col-sm-12 col-md-6 padder-ad">
      <div class="panel panel-warning">
        <div class="panel-heading"> Membership Details
        </div>
        <div class="panel-body">
          <div class="col-sm-12">
            <div class="form-group" >
             <p> <strong>INR</strong></p>
             <div class="col-xs-12 col-md-12" style="border-bottom: .1em solid #ccc;"></div>
              <label style="padding-right: 10px;" >AMOUNT HOLDING : {{ json_decode($memberaccount->membership_details)->inr->type }} </label>
              <label class="inr-style">AMOUNT APPLYING FOR : {{ json_decode($memberaccount->membership_details)->inr->amount }} </label>
            </div>
            
            <div class="form-group">
           <p> <strong>AED</strong></p>
              <div class="col-xs-12 col-md-12" style="border-bottom: .1em solid #ccc;"></div>
              <label style="padding-right: 10px;">AMOUNT HOLDING : {{ json_decode($memberaccount->membership_details)->aed->type }} </label>
              <label class="inr-style">AMOUNT APPLYING FOR : {{ json_decode($memberaccount->membership_details)->aed->amount }} </label>
            </div>
            <div class="form-group">
            <p><strong>INR</strong></p>
               <div class="col-xs-12 col-md-12" style="border-bottom: .1em solid  #ccc;"></div>
              <label style="padding-right: 10px;">AMOUNT HOLDING : {{ json_decode($memberaccount->membership_details)->cad->type }} </label>
              <label class="inr-style" >AMOUNT APPLYING FOR : {{ json_decode($memberaccount->membership_details)->cad->amount }} </label>
            </div>          
            <div class="form-group">
              <p><strong>USD</strong></p>
            <div class="col-xs-12 col-md-12" style="border-bottom:.1em solid #ccc;"></div>
              <label style="padding-right: 10px;">AMOUNT HOLDING : {{ json_decode($memberaccount->membership_details)->usd->type }} </label>
              <label class="inr-style">AMOUNT APPLYING FOR : {{ json_decode($memberaccount->membership_details)->usd->amount }} </label>
            </div>
              <div class="form-group">
              <p><strong>SAR</strong></p>
              <div class="col-xs-12 col-md-12" style="border-bottom: .1em solid #ccc;"></div>
              <label style="padding-right: 10px;">AMOUNT HOLDING : {{ json_decode($memberaccount->membership_details)->sar->type }} </label>
              <label class="inr-style">AMOUNT APPLYING FOR : {{ json_decode($memberaccount->membership_details)->sar->amount }} </label>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection
@section('jquery')
<script>
</script>
@endsection


