@extends('layout.erp')

  @section('banner')
  <div class="col-lg-12" align="center" style="background-color:#ffcf29">
  <img src="{{ URL::asset('new_heading.png') }}" class="img-responsive">
</div>
  @endsection
  @section('sidebar')
    @include('partial.header')
    @include('partial.aside')
  @endsection
      <link href="{{ URL::asset('css/sweetalert.css') }}" rel="stylesheet">
@section('body')
  <div class="wrapper-lg bg-white-opacity">
    <div class="row m-t">
      <div class="col-sm-12">
        <a href="#" class="thumb-lg pull-left m-r" id="click_img_container">
          <img src="{{ URL::asset('public/img/dsa_img/'.$dsaDetails->photo)}}" class="img-circle img-circle-hover" width="96" height="96" style="width:96px;height: 96px;">
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
        </a>
        <div class="clear m-b">
          <div class="m-b m-t-sm">
            <span class="h3 text-black">{{$dsaDetails->name}}</span><br>
          </div>
        </div>
      </div>
    </div>
  </div><br>
<form method="post" data-parsley-validate enctype="multipart/form-data">
  <div class="col-sm-12">
    <div class="panel panel-default">
      <div class="panel-heading font-bold">Personal Details</div>
      <div class="panel-body">
        <div class="row">
         <div class="col-sm-6">
            <div class="form-group">
              <label><strong>Code  </strong> </label>
              <div class="col-sm-6 " style="float:right;">
              : {{$dsaDetails->code}}
              </div>
            </div>
          </div>
          <input type="hidden" name="id" id="id" value="{{$dsaDetails->userId}}">
          <input type="hidden" name="_token" id="token" value="{{csrf_token()}}">
          <div class="col-sm-6 ">
            <div class="form-group">
              <label><strong>Company Name :</strong></label>
              <div class="col-sm-6 " style="float:right;">
              : {{$dsaDetails->code}}
              </div>
            </div>
          </div>
          <div class="col-sm-6 ">
            <div class="form-group">
              <label><strong>Father/Husband</strong></label>
              <div class="col-sm-6 " style="float:right;">
              : {{$dsaDetails->guardian}}
              </div>
            </div>
          </div>
          <div class="col-sm-6 ">
            <div class="form-group">
              <label><strong>Date of Birth </strong></label>
              <div class="col-sm-6 " style="float:right;">
             : {{$dsaDetails->dob}}
             </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label><strong>Religion </strong></label>
              <div class="col-sm-6 " style="float:right;">
             : {{$dsaDetails->religion}}
             </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label><strong>Marital Status </strong></label>
              <div class="col-sm-6 " style="float:right;">
              : {{$dsaDetails->maritalStatus}}
              </div>
            </div>
            </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label><strong>Blood Group </strong></label>
              <div class="col-sm-6 " style="float:right;">
              : {{$dsaDetails->bloodGroup}}
              </div>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label> <strong>Mobile No </strong></label>
              <div class="col-sm-6 " style="float:right;">
              : {{$dsaDetails->mobileNumber}}
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="form-group">
              <label><strong>Email </strong></label>
              <div class="col-sm-6 " style="float:right;">
              : {{$dsaDetails->email}}
              </div>
            </div>
          </div>
       {{--    <div class="col-sm-12"></div>
          <div class="col-sm-4">
            <div class="form-group">
              <label><strong>Signature :</strong></label><br>
              <img src="{{ URL::asset('public/img/dsa_img/'.$dsaDetails->signature)}}"  style="width:96px;height: 96px;">
            </div>
          </div> --}}
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="panel panel-default">
      <div class="panel-heading font-bold">Official Address</div>
      <div class="panel-body">
        @foreach($dsaAddress as $dsaaddress)
        @if($dsaaddress->typeOfAddress=='official')
        <div class="form-group">
          <label><strong>Address </strong> </label>
          <div class="col-sm-6 " style=" float:right;">
           <label>: {{$dsaaddress->address}} </label>
          </div>
        </div>
        <div class="form-group">
          <label><strong>State</strong></label>
          <div class="col-sm-6 " style=" float:right;">
            <label>: {{$dsaaddress->state}}</label>
          </div>
        </div>
        <div class="form-group">
          <label><strong>City</strong></label>
          <div class="col-sm-6 " style=" float:right;">
            <label>: {{$dsaaddress->city}}</label>
          </div>
        </div>
        <div class="form-group">
          <label><strong>Pin</strong></label>
          <div class="col-sm-6 " style=" float:right;">
            <label>: {{$dsaaddress->pin}}</label>
          </div>
        </div>
        @endif
        @endforeach
      </div>       
    </div>
  </div>
  <div class="col-sm-6">
    <div class="panel panel-default">
      <div class="panel-heading font-bold">Permanent Address</div>
      <div class="panel-body">
        @foreach($dsaAddress as $dsaaddress)
        @if($dsaaddress->typeOfAddress=='permanent')
        <div class="form-group">
          <label><strong>Address </strong> </label>
          <div class="col-sm-6 " style=" float:right;">
           <label>: {{$dsaaddress->address}} </label>
          </div>
        </div>
        <div class="form-group">
          <label><strong>State</strong></label>
          <div class="col-sm-6 " style=" float:right;">
            <label>: {{$dsaaddress->state}}</label>
          </div>
        </div>
        <div class="form-group">
          <label><strong>City</strong></label>
          <div class="col-sm-6 " style=" float:right;">
            <label>: {{$dsaaddress->city}}</label>
          </div>
        </div>
        <div class="form-group">
          <label><strong>Pin</strong></label>
          <div class="col-sm-6 " style=" float:right;">
            <label>: {{$dsaaddress->pin}}</label>
          </div>
        </div>
        @endif
        @endforeach
      </div>       
    </div>
  </div>

  <div class="col-sm-6">
    <div class="panel panel-default">
      <div class="panel-heading font-bold">Correspondance Address</div>
      <div class="panel-body">
        @foreach($dsaAddress as $dsaaddress)
        @if($dsaaddress->typeOfAddress=='correspondance')
        <div class="form-group">
          <label><strong>Address </strong> </label>
          <div class="col-sm-6 " style="word-wrap: break-word; float:right;">
           <label>: {{$dsaaddress->address}} </label>
          </div>
        </div>
        <div class="form-group">
          <label><strong>State</strong></label>
          <div class="col-sm-6 " style=" float:right;">
            <label>: {{$dsaaddress->state}}</label>
          </div>
        </div>
        <div class="form-group">
          <label><strong>City</strong></label>
          <div class="col-sm-6 " style=" float:right;">
            <label>: {{$dsaaddress->city}}</label>
          </div>
        </div>
        <div class="form-group">
          <label><strong>Pin</strong></label>
          <div class="col-sm-6 " style=" float:right;">
            <label>: {{$dsaaddress->pin}}</label>
          </div>
        </div>
        @endif
        @endforeach
      </div>       
    </div>
  </div>
  <div class="col-sm-6">
    <div class="panel panel-default">
      <div class="panel-heading font-bold">Proof Details</div>
      <div class="panel-body">
        <div class="form-group">
          <label><strong>Type of proof </strong></label>
          <div class="col-sm-6 " style=" float:right;">
          : {{$dsaProof->typeOfProof}}
          </div>
        </div>
        <div class="form-group">
          <label><strong>{{ucfirst(trans($dsaProof->typeOfProof))}} Number :</strong></label>
          <div class="col-sm-6 " style=" float:right;">
            : {{$dsaProof->proofNumber}}
          </div>
        </div>
        <div class="form-group">
          <label><strong>Issued At :</strong></label>
          <div class="col-sm-6 " style=" float:right;">
            : {{$dsaProof->placeOfIssue}}
          </div>
        </div>
        <div class="form-group">
          <label><strong>Issued Date :</strong></label>
            &nbsp;&nbsp;&nbsp;&nbsp;
          {{$dsaProof->dateOfIssue}}
          &nbsp;&nbsp;&nbsp;&nbsp;       
          <label><strong>Expiry Date :</strong></label>
          &nbsp;&nbsp;&nbsp;&nbsp;
          {{$dsaProof->dateOfExpiry}}

        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="panel panel-default">
      <div class="panel-heading font-bold">Heera Payment Details</div>
      <div class="panel-body">
        <div class="form-group">
          <label><strong>Pay Mode</strong></label>
           <div class="col-sm-6 " style=" float:right;">
           : {{ $dsapaymentdetails->payment_mode }}
           </div>
        </div>
        @if($dsapaymentdetails->payment_mode!='cash')
        <div class="form-group" >
          <label><strong>{{ucfirst(trans($dsapaymentdetails->payment_mode))}} No</strong></label>
          <div class="col-sm-6 " style=" float:right;">
           : {{ $dsapaymentdetails->transactionNumber }}
           </div>
        </div>
        @endif
        <div class="form-group">
          <label><strong>Deposit Date</strong></label>
          <div class="col-sm-6 " style=" float:right;">
           : {{ $dsapaymentdetails->paymentDate }}
           </div>

        </div>
        <div class="form-group">
          <label><strong>Bank</strong></label>
          <div class="col-sm-6 " style=" float:right;">
           : {{ $dsapaymentdetails->bank }}
           </div>
        </div>
        <div class="form-group">
         <label><strong>Branch</strong></label>
         <div class="col-sm-6 " style=" float:right;">
           : {{ $dsapaymentdetails->branch }}
           </div>
        </div>
        <div class="form-group">
          <label><strong>Heera's Account no</strong></label>
          <div class="col-sm-6 " style=" float:right;">
           : {{ $dsapaymentdetails->accountNumber }}
           </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="panel panel-default">
      <div class="panel-heading font-bold">Incentive Remittance</div>
      <div class="panel-body">
        <div class="form-group">
          <label><strong>Name</strong></label>
            <div class="col-sm-6 " style=" float:right;">
              : {{ $dsabank->accountHolderName }}
            </div>
        </div>
        <div class="form-group">
          <label><strong>Account Number</strong></label>
          <div class="col-sm-6 " style=" float:right;">
              : {{ $dsabank->accountNumber }}
          </div>
        </div>
        <div class="form-group">
          <label><strong>Bank Name</strong></label>
          <div class="col-sm-6 " style=" float:right;">
              : {{ $dsabank->bankName }}
          </div>
        </div>
        <div class="form-group">
          <label><strong>Branch</strong></label>
          <div class="col-sm-6 " style=" float:right;">
              : {{ $dsabank->branchName }}
          </div>
        </div>
        <div class="form-group">
          <label><strong>IFSC</strong></label>
          <div class="col-sm-6 " style=" float:right;">
              : {{ $dsabank->ifsc }}
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-12"></div>
  <div class="col-sm-6">
    <div class="panel panel-default">
      <div class="panel-heading font-bold">Reference</div>
      <div class="panel-body">
        <div class="form-group">
          <label>Referees Name</label>
          <div class="col-sm-6 " style=" float:right;">
            : {{ $dsareference->name }}
          </div>
        </div>
        @foreach($dsaAddress as $dsaaddress)
        @if($dsaaddress->typeOfAddress=='referance')
        <div class="form-group">
          <label>Address</label>
          <div class="col-sm-6 " style=" float:right;">
            : {{ $dsaaddress->address }}
          </div>
        </div>
        <div class="form-group">
         <label>District</label>
         <div class="col-sm-6 " style=" float:right;">
            : {{ $dsaaddress->city }}
          </div>
         </div>
        <div class="form-group">
          <label>State</label>
          <div class="col-sm-6 " style=" float:right;">
            : {{ $dsaaddress->state }}
          </div>
        </div>
        <div class="form-group">
          <label>Pin</label>
          <div class="col-sm-6 " style=" float:right;">
            : {{ $dsaaddress->pin }}
          </div>
         </div>
         @endif
         @endforeach
        <div class="form-group">
          <label>Mobile No</label>
          <div class="col-sm-6 " style=" float:right;">
            : {{ $dsareference->referenceMobileNumber }}
          </div>
        </div>
        <div class="form-group">
          <label>Email</label>
          <div class="col-sm-6 " style=" float:right;">
            : {{ $dsareference->referenceEmail }}
          </div>
        </div>
        <div class="form-group">
          <label>Relationship</label>
          <div class="col-sm-6 " style=" float:right;">
            : {{ $dsareference->referenceRelation }}
          </div>
        </div>
      </div>
    </div>
  </div>
    <div class="col-sm-6">
    <div class="panel panel-default">
      <div class="panel-heading font-bold">Proof</div>
      <div class="panel-body">
        <div class="col-sm-4"><strong>ID Proof</strong>
          <img src="{{ URL::asset('public/img/proof/'.$dsapaymentdetails->file)}}" style="width:96px;height:96px; " >
        </div>
        <div class="col-sm-4"><strong>Signature</strong>
          <img src="{{ URL::asset('public/img/dsa_img/'.$dsaDetails->signature)}}" style="width:96px;height:96px;" >
        </div>
        <div class="col-sm-4"><strong>Payment Proof</strong>
          <img src="{{ URL::asset('public/img/proof/'.$dsaProof->file)}}"  style="width:96px;height: 96px;">
        </div>
      </div>
    </div>
  </div>
  <div class="col-sm-12"></div>
  <div class="col-sm-12">
    <div class="panel panel-default">
      <div class="panel-heading font-bold">Payment Verification :</div>
      <div class="panel-body">
        <div class="col-sm-4 col-sm-offset-5">
           <button type="button"  class="btn btn-primary" onclick="approve({{ $dsaDetails->userId }})" id="approve">Approve</button>
              <div class="form-group" style="display:none;" id="show">
              <label>Reason*</label>
              <select  class="form-control" required data-parsley-required-message="Please Select Gender" name="reason" id="reason">
                <option value="">Select</option>
                <option value="Its a duplicate entry. You are already a member. Membercode:">Duplicate Entry</option>
                <option value="Your photograph is too small">Small Photograph</option>
                <option value="Your Signature is too small">Small Signature</option>
                <option value="Your ID proof is too small">Small ID proof</option>
                <option value="Your photograph is missing">Photograph Missing</option>
                <option value="Payment Proof Missing">Payment Proof Missing</option>
                <option value="Your Signature is missing">Signature Missing</option>
                <option value="Your ID proof is missing">ID proof Missing</option>
                <option value="Your ID proof is Not Readable">ID proof Not Readable</option>
              </select><br>
              <button type="button" class="btn btn-danger" onclick="denied({{ $dsaDetails->userId }})" >Deny</button>
              @if ($errors->has('reason'))
              <span class="help-inline">{{$errors->first('reason')}}</span>
              @endif
              </div>
          <button type="button" class="btn btn-danger" id="deny">Deny</button>
        </div>
      </div>
    </div>
  </div>
</form>
@endsection
@section('jquery')
<script src="{{URL::asset('js/sweetalert.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('js/parsley.min.js') }}"></script>
  <script type="text/javascript">
function approve(id){
    swal({
        title: "Approve!!!",
        text: "Are you sure?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Approve",
        closeOnConfirm: true
    }, function (isConfirm) {
        if (isConfirm) {

        $.ajax({
            url: "{{ URL::to('admin/dsa/app/approve') }}",
            type: "POST",
            data: { "_token": "{{ csrf_token() }}","id": id},
            dataType: "html",
            success: function (data) {

              //alert(data);
                swal("Done!", "It was succesfully deleted!", "success");
                setTimeout(function() {
              window.location.href = "{{ URL::to('admin/dsa/viewDsaRequest') }}";
            }, 2000);
                                   
            },
        });

      }
      else{
        swal("Done!", "It was succesfully deleted!", "success");
      }
    });
}
function denied(id){
  var reason=$("#reason").val();

  var reason=document.getElementById("reason").value;
  if(reason == "")
  {
   swal("Alert!", "Please Select Reason!", "info");
    return false;
    
  }

    swal({
        title: "Deny!!",
        text: "Are you sure?",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "Deny",
        closeOnConfirm: true
    }, function (isConfirm) {
        if (isConfirm) {

        $.ajax({
            url: "{{ URL::to('admin/dsa/app/deny') }}",
            type: "POST",
            data: { "_token": "{{ csrf_token() }}","id": id,"reason":reason},
            dataType: "html",
            success: function (data) {

              //alert(data);
                swal("Done!", "It was succesfully deleted!", "success");
                setTimeout(function() {
              window.location.href = "{{ URL::to('admin/dsa/viewDsaRequest') }}";
            }, 2000);
                                   
            },
        });

      }
      else{
        swal("Done!", "It was succesfully deleted!", "success");
      }
    });
}
 </script>
 <script type="text/javascript">
   $(document).ready(function(){
    $("#deny").click(function(){
        $("#show").show();
        $("#deny").hide();
        $("#approve").hide();
    });
});
 </script>
@endsection


