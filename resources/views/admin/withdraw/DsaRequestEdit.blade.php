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
    <h1 class="m-n font-thin h3">DSA Withdrawal</h1>
    <h6 class="m-n font-thin h5">DSA Withdrawal Details.</h6>
  </div>
  <div class="wrapper-sm">
  <form action="{{URL::to('/') }}/admin/dsaWithdraw" method="post" data-parsley-validate enctype="multipart/form-data" id="form">
  {{ csrf_field() }}
    <div class="panel panel-default">
      <div class="panel-heading ">DSA DETAILS</div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-10">
            <div class="row">
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-md-2">
                    <label><b>DSA CODE </b></label>
                  </div>
                  <div class="col-md-4">  
                    <label>  {{$dsaDetails->code}}</label>
                  </div>
                  <div class="col-md-2">
                    <label><b>Mobile No </b></label>
                  </div>
                  <div class="col-md-4">  
                    <label>  {{$dsaDetails->mobileId}} {{$dsaDetails->mobileNumber}}</label>
                  </div>
                </div>  
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-md-2">
                    <label><b>NAME </b></label>
                  </div>
                  <div class="col-md-4">  
                    <label>  {{$dsaDetails->name}}</label>
                  </div>
                  <div class="col-md-2">
                    <label><b>EMAIL</b></label>
                  </div>
                  <div class="col-md-4">  
                    <label>  {{$dsaDetails->email}}</label>
                  </div>
                </div>  
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-md-2">
                    <label><b>D O B </b></label>
                  </div>
                  <div class="col-md-4">  
                    <label>  {{$dsaDetails->dob}}</label>
                  </div>
                   <div class="col-md-2">
                    <label><b>Address </b></label>
                  </div>
                  <div class="col-md-4">  
                    <label>  {{$dsaAddress->address}}</label>
                  </div>
               </div>  
              </div>
            </div>
          </div>
          <div class="col-md-2">
            <div class="row">
            <img src="{{ URL::asset('storage/img/dsa_img/'.$dsaDetails->photo)}}" style="width: 140px;height: 150px;" />
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading ">Heera Payment Details</div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-10">
            <div class="row">
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-md-2">
                    <label><b>Pay Mode </b></label>
                  </div>
                  <div class="col-md-4">  
                    <label>  {{$dsapaymentdetails->payment_mode}}</label>
                  </div>
                  <div class="col-md-2">
                    <label><b>{{ucfirst(trans($dsapaymentdetails->payment_mode))}} No </b></label>
                  </div>
                  <div class="col-md-4">  
                    <label>{{ $dsapaymentdetails->transactionNumber }}</label>
                  </div>
                </div>  
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-md-2">
                    <label><b>Deposit Date </b></label>
                  </div>
                  <div class="col-md-4">  
                    <label>{{ $dsapaymentdetails->paymentDate }}</label>
                  </div>
                  <div class="col-md-2">
                    <label><b>Bank</b></label>
                  </div>
                  <div class="col-md-4">  
                    <label>{{ $dsapaymentdetails->bank }}</label>
                  </div>
                </div>  
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-md-2">
                    <label><b>Branch </b></label>
                  </div>
                  <div class="col-md-4">  
                    <label>{{ $dsapaymentdetails->branch }}</label>
                  </div>
                   <div class="col-md-2">
                    <label><b>Heera's account no </b></label>
                  </div>
                  <div class="col-md-4">  
                    <label>{{ $dsapaymentdetails->accountNumber }}</label>
                  </div>
               </div>  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading ">WITHDRAWAL REQUEST DETAILS</div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-10">
            <div class="row">
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-md-2">
                    <label><b>Account Holder Name </b></label>
                  </div>
                  <div class="col-md-4">  
                    <label>{{$dsabank->accountHolderName}}</label>
                  </div>
                  <div class="col-md-2">
                    <label><b>Bank Name </b></label>
                  </div>
                  <div class="col-md-4">  
                    <label>{{ $dsabank->bankName }}</label>
                  </div>
                </div>  
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-md-2">
                    <label><b>Account Number </b></label>
                  </div>
                  <div class="col-md-4">  
                    <label>{{ $dsabank->accountNumber }}</label>
                  </div>
                  <div class="col-md-2">
                    <label><b>Branch</b></label>
                  </div>
                  <div class="col-md-4">  
                    <label>{{ $dsabank->branchName}}</label>
                  </div>
                </div>  
              </div>
            </div>
            <br>
            <div class="row">
              <div class="col-sm-12">
                <div class="row">
                  <div class="col-md-2">
                    <label><b> IFSC Code </b></label>
                  </div>
                  <div class="col-md-4">  
                    <label>{{ $dsabank->ifsc }}</label>
                  </div>
                   <div class="col-md-2">
                    <label><b>Heera's account no </b></label>
                  </div>
                  <div class="col-md-4">  
                    <label>{{ $dsapaymentdetails->accountNumber }}</label>
                  </div>
               </div>  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="panel panel-default">
      <div class="panel-heading font-bold">WITHDRAWAL ENTRY</div>
      <div class="panel-body">
        <div class="col-sm-12">
          <div class="row">
            <div class="col-sm-3 font-bold">Approved/Declined By</div>
            <div class="col-sm-3">
              <input type="text" name="approvedBy" id="approvedBy" value="" class="form-control"  required data-parsley-required-message="Enter Form Approved By" />
            </div>
            <div class="col-sm-3 font-bold">Withdrawal applied date</div>
            <div class="col-sm-3">
              <input type="text" name="appliedDate" id="appliedDate" value="" class="form-control"  required data-parsley-required-message="Select Applied Date" data-date-end-date="0d"/ readonly="">
            </div>
          </div>
        </div><div class="col-sm-12">&nbsp;</div>
        <div class="col-sm-12">
          <div class="row">
            <div class="col-sm-3 font-bold">Withdrawal paid date</div>
            <div class="col-sm-3">
              <input type="text" name="payedDate" id="payedDate" value="" class="form-control"  required data-parsley-required-message="Select Paid Date" data-date-end-date="0d"/ readonly="">
            </div>
            <div class="col-sm-3 font-bold">Online(Reff No)</div>
            <div class="col-sm-3">
              <input type="text" class="form-control" id="online" name="online">         
            </div>
          </div>
        </div><div class="col-sm-12">&nbsp;</div>

        <div class="col-sm-12">
          <div class="row">
            <div class="col-sm-3 font-bold">Bank Name</div>
            <div class="col-sm-3">
              <input type="text" name="bank" id="bank" value="" class="form-control" />
            </div>
            <div class="col-sm-3 font-bold">Debit acc No.(Heera's)</div>
            <div class="col-sm-3">
              <input type="text" name="debitAccountNo" id="debitAccountNo" value="" class="form-control" required data-parsley-required-message="Please Enter Debit acc No.(Heera's)" onchange="heeraAccountCheck(this.value)"/>
              <ul class="parsley-errors-list filled accountNo" id="parsley-id-19" style="display: none"><li class="parsley-required">Enter Valid Heera Account Number.</li></ul>
            </div>
          </div>
        </div><div class="col-sm-12">&nbsp;</div>
        <div class="col-sm-12">
          <div class="row">
            <div class="col-sm-3 font-bold"></div>
            <div class="col-sm-3"></div>
          </div>
          <div class="row"><br>
              <div class="col-sm-3"></div>
              <div class="col-sm-6 text-center">
              <label><b>Remarks</b></label><br>
              <textarea data-parsley-minlength="10" class="form-control" id="remarks" name="remarks" required data-parsley-required-message="Please Enter Remarks" ></textarea>
              </div>
          </div>
        </div>
        <input type="hidden" name="userId" id="userId" value={{ $dsaDetails->userId }}>
        <div class="col-sm-12 text-center"><br>
        <input type="submit" value="Approve" class="btn btn-success">
      </div>
    </div>
  </form>
</div>

@endsection
@section('jquery')
<script type="text/javascript">
$('#appliedDate').datepicker({
  orientation: 'bottom auto',
   autoclose:true
         
      });
$('#payedDate').datepicker({
  orientation: 'bottom auto',
   autoclose:true
        
  });

function heeraAccountCheck(accountNo)
{
  $.ajax(
  {
    type: "get",
    url: "{{URL::to('/') }}/admin/checkAcc",
    data:{accountNo:accountNo},
    success: function (data) {
     if(data==0)
     {
       $('.accountNo').css('display','block');
       $('#debitAccountNo').val('');
     }
     else
     {
     $('.accountNo').css('display','none'); 

     }
    }
  });

}
</script>
@endsection