  <form action="{{URL::to('/') }}/admin/dsaWithdraw/{{$dsaDetails->userId}}" method="post" data-parsley-validate enctype="multipart/form-data" id="form">
  {{ csrf_field() }}
  {{ method_field('PUT') }}
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
      <div class="panel-heading ">FOR OFFICE USE ONLY</div>
      <div class="panel-body">
        <div class="col-sm-12">
          <div class="col-md-4">
            <label><b>Account Holder Name<spam style="color:red;">*</spam> </b></label>
            <input type="text" class="form-control" placeholder="Account Number" required data-parsley-required-message="Please Enter Account Number" name="holderName" id="holderName" value={{$dsabank->accountHolderName}}>
          </div>
          <div class="col-md-4">
            <label><b> Bank Name <spam style="color:red;">*</spam></b></label>
            <input type="text" class="form-control" placeholder="Bank Name" required data-parsley-required-message="Please Enter Bank Name" name="incbankName" id="incbankName" data-parsley-pattern="/^[a-zA-Z_ ]*$/" data-parsley-trigger="keyup" value="{{ $dsabank->bankName }}">
          </div>
          <div class="col-md-4">
            <label><b>Account Number<spam style="color:red;">*</spam></b></label>
            <input type="text" class="form-control" placeholder="Account Number" required data-parsley-required-message="Please Enter Account Number" name="incaccountnumber" id="incaccountnumber" data-parsley-minlength="11" data-parsley-trigger="keyup" value="{{ $dsabank->accountNumber }}">
          </div>
          <div class="col-sm-12"><br></div>
          <div class="col-md-4">
            <label><b>  Branch  <spam style="color:red;">*</spam></b></label>
            <input type="text" class="form-control" placeholder="Branch" required data-parsley-required-message="Please Enter Branch Name" name="incBranchName" id="incBranchName" value={{ $dsabank->branchName}}>
          </div>
          <div class="col-md-4">
            <label><b>  IFSC Code  <spam style="color:red;">*</spam></b></label>
            <input type="text" class="form-control" placeholder="IFSC" required data-parsley-required-message="Enter IFSC Code" data-parsley-type="alphanum" maxlength="11" minlength="11"  data-parsley-pattern="/^[A-Za-z]{4}\d{7}$/" name="incIfscCode" id="incIfscCode" data-parsley-trigger="keyup" value="{{$dsabank->ifsc}}">
          </div>
        </div>
        <div class="col-sm-12"><br></div>
        <div class="col-sm-4 col-sm-offset-5">
          <button type="submit" class="btn btn-primary" id="submit" name="submit">Submit</button>
        </div>
      </div>
    </div>
    </form>