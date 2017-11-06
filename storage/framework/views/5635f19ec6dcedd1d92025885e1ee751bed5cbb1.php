  <form action="<?php echo e(URL::to('/')); ?>/admin/dsaWithdraw/<?php echo e($dsaDetails->userId); ?>" method="post" data-parsley-validate enctype="multipart/form-data" id="form">
  <?php echo e(csrf_field()); ?>

  <?php echo e(method_field('PUT')); ?>

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
                    <label>  <?php echo e($dsaDetails->code); ?></label>
                  </div>
                  <div class="col-md-2">
                    <label><b>Mobile No </b></label>
                  </div>
                  <div class="col-md-4">  
                    <label>  <?php echo e($dsaDetails->mobileId); ?> <?php echo e($dsaDetails->mobileNumber); ?></label>
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
                    <label>  <?php echo e($dsaDetails->name); ?></label>
                  </div>
                  <div class="col-md-2">
                    <label><b>EMAIL</b></label>
                  </div>
                  <div class="col-md-4">  
                    <label>  <?php echo e($dsaDetails->email); ?></label>
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
                    <label>  <?php echo e($dsaDetails->dob); ?></label>
                  </div>
                   <div class="col-md-2">
                    <label><b>Address </b></label>
                  </div>
                  <div class="col-md-4">  
                    <label>  <?php echo e($dsaAddress->address); ?></label>
                  </div>
               </div>  
              </div>
            </div>
          </div>
          <div class="col-md-2">
            <div class="row">
            <img src="<?php echo e(URL::asset('storage/img/dsa_img/'.$dsaDetails->photo)); ?>" style="width: 140px;height: 150px;" />
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
                    <label>  <?php echo e($dsapaymentdetails->payment_mode); ?></label>
                  </div>
                  <div class="col-md-2">
                    <label><b><?php echo e(ucfirst(trans($dsapaymentdetails->payment_mode))); ?> No </b></label>
                  </div>
                  <div class="col-md-4">  
                    <label><?php echo e($dsapaymentdetails->transactionNumber); ?></label>
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
                    <label><?php echo e($dsapaymentdetails->paymentDate); ?></label>
                  </div>
                  <div class="col-md-2">
                    <label><b>Bank</b></label>
                  </div>
                  <div class="col-md-4">  
                    <label><?php echo e($dsapaymentdetails->bank); ?></label>
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
                    <label><?php echo e($dsapaymentdetails->branch); ?></label>
                  </div>
                   <div class="col-md-2">
                    <label><b>Heera's account no </b></label>
                  </div>
                  <div class="col-md-4">  
                    <label><?php echo e($dsapaymentdetails->accountNumber); ?></label>
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
            <input type="text" class="form-control" placeholder="Account Number" required data-parsley-required-message="Please Enter Account Number" name="holderName" id="holderName" value=<?php echo e($dsabank->accountHolderName); ?>>
          </div>
          <div class="col-md-4">
            <label><b> Bank Name <spam style="color:red;">*</spam></b></label>
            <input type="text" class="form-control" placeholder="Bank Name" required data-parsley-required-message="Please Enter Bank Name" name="incbankName" id="incbankName" data-parsley-pattern="/^[a-zA-Z_ ]*$/" data-parsley-trigger="keyup" value="<?php echo e($dsabank->bankName); ?>">
          </div>
          <div class="col-md-4">
            <label><b>Account Number<spam style="color:red;">*</spam></b></label>
            <input type="text" class="form-control" placeholder="Account Number" required data-parsley-required-message="Please Enter Account Number" name="incaccountnumber" id="incaccountnumber" data-parsley-minlength="11" data-parsley-trigger="keyup" value="<?php echo e($dsabank->accountNumber); ?>">
          </div>
          <div class="col-sm-12"><br></div>
          <div class="col-md-4">
            <label><b>  Branch  <spam style="color:red;">*</spam></b></label>
            <input type="text" class="form-control" placeholder="Branch" required data-parsley-required-message="Please Enter Branch Name" name="incBranchName" id="incBranchName" value=<?php echo e($dsabank->branchName); ?>>
          </div>
          <div class="col-md-4">
            <label><b>  IFSC Code  <spam style="color:red;">*</spam></b></label>
            <input type="text" class="form-control" placeholder="IFSC" required data-parsley-required-message="Enter IFSC Code" data-parsley-type="alphanum" maxlength="11" minlength="11"  data-parsley-pattern="/^[A-Za-z]{4}\d{7}$/" name="incIfscCode" id="incIfscCode" data-parsley-trigger="keyup" value="<?php echo e($dsabank->ifsc); ?>">
          </div>
        </div>
        <div class="col-sm-12"><br></div>
        <div class="col-sm-4 col-sm-offset-5">
          <button type="submit" class="btn btn-primary" id="submit" name="submit">Submit</button>
        </div>
      </div>
    </div>
    </form>