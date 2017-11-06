<?php $__env->startSection('banner'); ?>
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
  <img src="<?php echo e(URL::asset('new_heading.png')); ?>" class="img-responsive">
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sidebar'); ?>
  <?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
  <?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
    <link href="<?php echo e(URL::asset('css/sweetalert.css')); ?>" rel="stylesheet">
<?php $__env->startSection('body'); ?>
  <div class="wrapper-lg bg-white-opacity">
    <div class="row m-t">
      <div class="col-sm-12">
            <a href="#" class="thumb-lg pull-left m-r pop1" id="click_img_container">
          <img  class="img-circle " draggable="true"  src="<?php echo e(URL::asset('storage/img/dsa_img/'.$dsaDetails->photo)); ?>"   style="width:96px;height: 96px;"></a>
          <a href="#" class="thumb-lg m-r img-padder pop2" id="click_img_container" style="width: 160px;">
          <img src="<?php echo e(URL::asset('storage/img/proof/'.$dsaProof->file)); ?>" draggable="true"  class="img-thumbnail " alt="" style="width: 100px;height:130px;" /><span style="margin-left: 30px;">PROOF</span><br> <span class="h6-text text-black" style="text-transform: uppercase;">Proof Type : &nbsp;<?php echo e($dsaProof->typeOfProof); ?></span><br> <span class="h6-text text-black" style="text-transform: uppercase;"><?php echo e(ucfirst(trans($dsaProof->typeOfProof))); ?> : &nbsp; <?php echo e($dsaProof->proofNumber); ?></span></a>
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
            <span class="text-black name_text" style="text-transform: uppercase;"><?php echo e($dsaDetails->name); ?></span><br>
            <span class="text-black name_text_sub" style="text-transform: uppercase;"><?php echo e($dsaDetails->code); ?>}</span><br>
            <span class="text-black name_text_sub" style="text-transform: uppercase;"><?php echo e($dsaDetails->dob); ?></span><br>
            <span class="text-black name_text_sub" style="text-transform: uppercase;"><?php echo e($countryname->countryNames); ?></span>
            </div>
        </div>
            <a href="#" class="pop3">
          <img src="<?php echo e(URL::asset('storage/img/dsa_img/'.$dsaDetails->signature)); ?>" draggable="true"  class="img-thumbnail " alt="" style="width: 100px;height:50px;" /></a>
      </div>
    </div>
  </div><br>
<form method="post" data-parsley-validate enctype="multipart/form-data">
  <div class="col-sm-12">
    <div class="panel panel-warning">
      <div class="panel-heading font-bold">Personal Details</div>
      <div class="panel-body">
        <div class="row">
         <div class="col-md-6 col-xs-12 divTableCell">Code<b class="data-lab"><?php echo e($dsaDetails->code); ?></b></div>
         <input type="hidden" name="id" id="id" value="<?php echo e($dsaDetails->userId); ?>">
          <input type="hidden" name="_token" id="token" value="<?php echo e(csrf_token()); ?>">
         <div class="col-md-6 col-xs-12 divTableCell">Company Name<b class="data-lab"><?php echo e($dsaDetails->companyName); ?></b></div>
         <div class="col-md-6 col-xs-12 divTableCell">Father/Husband<b class="data-lab"><?php echo e($dsaDetails->guardian); ?></b></div>        
         <div class="col-md-6 col-xs-12 divTableCell">Date of Birth<b class="data-lab"><?php echo e($dsaDetails->dob); ?></b></div>
         <div class="col-md-6 col-xs-12 divTableCell">Religion<b class="data-lab"><?php echo e($dsaDetails->religion); ?></b></div>  
        <div class="col-md-6 col-xs-12 divTableCell">Marital Status<b class="data-lab"><?php echo e($dsaDetails->maritalStatus); ?></b></div>       
        <div class="col-md-6 col-xs-12 divTableCell">Nationality<b class="data-lab"><?php echo e($countryname->countryNames); ?></b></div>
        <div class="col-md-6 col-xs-12 divTableCell">Mobile No<b class="data-lab"><?php echo e($dsaDetails->mobileId); ?><?php echo e($dsaDetails->mobileNumber); ?></b></div>
        <div class="col-md-6 col-xs-12 divTableCell">Email<b class="data-lab"><?php echo e($dsaDetails->email); ?></b></div>
        <div class="col-md-6 col-xs-12 divTableCell">TelePhone No<b class="data-lab"><?php echo e($dsaDetails->telePhoneNo); ?></b></div>
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

  <div class="col-sm-6">
    <div class="panel panel-warning">
      <div class="panel-heading font-bold">Permanent Address</div>
      <div class="panel-body">
        <?php $__currentLoopData = $dsaAddress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dsaaddress): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($dsaaddress->typeOfAddress=='permanent'): ?>
         <div class="col-md-12 col-xs-12 divTableCell">Address<b class="data-lab"><?php echo e($dsaaddress->address); ?></b></div>
         <div class="col-md-12 col-xs-12 divTableCell">State<b class="data-lab"><?php echo e($dsaaddress->state); ?></b></div>
         <div class="col-md-12 col-xs-12 divTableCell">City<b class="data-lab"><?php echo e($dsaaddress->city); ?></b></div>
         <div class="col-md-12 col-xs-12 divTableCell">Pin<b class="data-lab"><?php echo e($dsaaddress->pin); ?></b></div>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>       
    </div>
  </div>
  <div class="col-sm-6">
    <div class="panel panel-warning">
      <div class="panel-heading font-bold">Correspondence Address</div>
      <div class="panel-body">
        <?php $__currentLoopData = $dsaAddress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dsaaddress): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($dsaaddress->typeOfAddress=='correspondance'): ?>
       <div class="col-md-12 col-xs-12 divTableCell">Address<b class="data-lab"><?php echo e($dsaaddress->address); ?></b></div>
         <div class="col-md-12 col-xs-12 divTableCell">State<b class="data-lab"><?php echo e($dsaaddress->state); ?></b></div>
         <div class="col-md-12 col-xs-12 divTableCell">City<b class="data-lab"><?php echo e($dsaaddress->city); ?></b></div>
         <div class="col-md-12 col-xs-12 divTableCell">Pin<b class="data-lab"><?php echo e($dsaaddress->pin); ?></b></div>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>       
    </div>
  </div>
  <div class="col-sm-12"></div>
<div class="col-sm-6">
    <div class="panel panel-warning">
      <div class="panel-heading font-bold">Official Address</div>
      <div class="panel-body">
        <?php $__currentLoopData = $dsaAddress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dsaaddress): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($dsaaddress->typeOfAddress=='official'): ?>
         <div class="col-md-12 col-xs-12 divTableCell">Address<b class="data-lab"><?php echo e($dsaaddress->address); ?></b></div>
         <div class="col-md-12 col-xs-12 divTableCell">State<b class="data-lab"><?php echo e($dsaaddress->state); ?></b></div>
         <div class="col-md-12 col-xs-12 divTableCell">City<b class="data-lab"><?php echo e($dsaaddress->city); ?></b></div>
         <div class="col-md-12 col-xs-12 divTableCell">Pin<b class="data-lab"><?php echo e($dsaaddress->pin); ?></b></div>
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </div>       
    </div>
  </div>
  <div class="col-sm-6">
    <div class="panel panel-warning">
      <div class="panel-heading font-bold">Incentive Remittance</div>
      <div class="panel-body">
         <div class="col-md-12 col-xs-12 divTableCell">Name<b class="data-lab"><?php echo e($dsabank->accountHolderName); ?></b></div>
         <div class="col-md-12 col-xs-12 divTableCell">Account Number<b class="data-lab"><?php echo e($dsabank->accountNumber); ?></b></div>
         <div class="col-md-12 col-xs-12 divTableCell">Bank Name<b class="data-lab"><?php echo e($dsabank->bankName); ?></b></div>
         <div class="col-md-12 col-xs-12 divTableCell">Branch<b class="data-lab"><?php echo e($dsabank->branchName); ?></b></div>
         <div class="col-md-12 col-xs-12 divTableCell">IFSC<b class="data-lab"><?php echo e($dsabank->ifsc); ?></b></div>
      </div>
    </div>
  </div>
      <div class="col-sm-12"></div>
  <div class="col-sm-6">
    <div class="panel panel-warning">
      <div class="panel-heading font-bold">Heera Payment Details</div>
      <div class="panel-body">

         <div class="col-md-12 col-xs-12 divTableCell">Pay Mode<b class="data-lab"> <?php echo e($dsapaymentdetails->payment_mode); ?></b></div>
            <?php if($dsapaymentdetails->payment_mode!='cash'): ?>
         <div class="col-md-12 col-xs-12 divTableCell"><?php echo e(ucfirst(trans($dsapaymentdetails->payment_mode))); ?> No<b class="data-lab"> <?php echo e($dsapaymentdetails->transactionNumber); ?></b></div>
           <?php endif; ?>
         <div class="col-md-12 col-xs-12 divTableCell">Deposit Date<b class="data-lab"><?php echo e($dsapaymentdetails->paymentDate); ?></b></div>
         <div class="col-md-12 col-xs-12 divTableCell">Bank<b class="data-lab"><?php echo e($dsapaymentdetails->bank); ?></b></div>
         <div class="col-md-12 col-xs-12 divTableCell">Branch<b class="data-lab"><?php echo e($dsapaymentdetails->branch); ?>}</b></div>
         <div class="col-md-12 col-xs-12 divTableCell">Heera's Account no<b class="data-lab"><?php echo e($dsapaymentdetails->accountNumber); ?></b></div>
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="panel panel-warning">
      <div class="panel-heading font-bold">Reference</div>
      <div class="panel-body">

         <div class="col-md-12 col-xs-12 divTableCell">Referees Name<b class="data-lab"><?php echo e($dsareference->name); ?></b></div>
            <?php $__currentLoopData = $dsaAddress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dsaaddress): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php if($dsaaddress->typeOfAddress=='referance'): ?>
         <div class="col-md-12 col-xs-12 divTableCell">Address<b class="data-lab"><?php echo e($dsaaddress->address); ?></b></div>
         <div class="col-md-12 col-xs-12 divTableCell">State<b class="data-lab"> <?php echo e($dsaaddress->state); ?></b></div>
             <?php endif; ?>
         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
         <div class="col-md-12 col-xs-12 divTableCell">Mobile No<b class="data-lab"><?php echo e($dsareference->referenceMobileNumber); ?></b></div>
         <div class="col-md-12 col-xs-12 divTableCell">Email<b class="data-lab"><?php echo e($dsareference->referenceEmail); ?></b></div>
         <div class="col-md-12 col-xs-12 divTableCell">Relationship<b class="data-lab"><?php echo e($dsareference->referenceRelation); ?></b></div>
      </div>
    </div>
  </div>
    <div class="col-sm-12"></div>
    <div class="col-sm-8">
    <div class="panel panel-warning">
      <div class="panel-heading font-bold">Proofs</div>
      <div class="panel-body">
         <div class="col-md-3 col-xs-12 divTableCell text-center">ID Proof  <img src="<?php echo e(URL::asset('storage/img/proof/'.$dsaProof->file)); ?>" style="width:96px;height:96px; " ></div>
         <div class="col-md-3 col-xs-12 divTableCell text-center" >Signature <img src="<?php echo e(URL::asset('storage/img/dsa_img/'.$dsaDetails->signature)); ?>" style="width:96px;height:96px;" ></div>
         <div class="col-md-3 col-xs-12 divTableCell text-center">Payment Proof <img src="<?php echo e(URL::asset('storage/img/payProof/'.$dsapaymentdetails->file)); ?>"  style="width:96px;height: 96px;"></div>
         <div class="col-md-3 col-xs-12 divTableCell text-center">ccount Proof  <img src="<?php echo e(URL::asset('storage/img/Accproof/'.$dsabank->Accproof)); ?>"  style="width:96px;height: 96px;"></div>
      </div>
    </div>
  </div>
    <div class="col-sm-4">
    <div class="panel panel-warning">
      <div class="panel-heading font-bold">Proof Details</div>
      <div class="panel-body">
         <div class="col-md-12 col-xs-12 divTableCell">Type of proof <b class="data-lab"><?php echo e($dsaProof->typeOfProof); ?></b></div>
         <div class="col-md-12 col-xs-12 divTableCell"><?php echo e(ucfirst(trans($dsaProof->typeOfProof))); ?> Number  <b class="data-lab"><?php echo e($dsaProof->proofNumber); ?></b></div>
      </div>
    </div>
  </div>
</form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script>
  $(function() {
  $('.pop1,.pop2,.pop3').click(function(){
  $('.imagepreview').attr('src', $(this).find('img').attr('src'));
  $('#imagemodal').modal('show'); 
  });
  });
</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>