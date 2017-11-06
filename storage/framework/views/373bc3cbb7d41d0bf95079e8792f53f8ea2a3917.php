<?php $__env->startSection('banner'); ?>
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
  <img src="<?php echo e(URL::asset('new_heading.png')); ?>" class="img-responsive">
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sidebar'); ?>
  
 
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
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
  <link href="<?php echo e(URL::asset('css/sweetalert.css')); ?>" rel="stylesheet">
  <div>
    <div class="wrapper-lg bg-white-opacity">
      <div class="row m-t">
        <form class="form-horizontal" id="upload" enctype="multipart/form-data" method="post" action="<?php echo e(route('web.changeimg')); ?>" autocomplete="off">
          <?php echo e(csrf_field()); ?>

          <div class="col-sm-12">
              <a href="#" class="thumb-lg pull-left m-r pop1 " id="click_img_container">
               <img  class="img-circle " draggable="true"  src="<?php echo e(URL::asset('storage/img/member_img/'.$viewmember->photo)); ?>"   style="width:96px;height: 96px;"></a>
                  <a href="#" class="thumb-lg m-r img-padder pop2" id="click_img_container" style="width: 150px;">
                   <img src="<?php echo e(URL::asset('storage/img/proof/'.$viewmem->file)); ?>" draggable="true"  class="img-thumbnail " alt="" style="width: 100px;height:130px;" /><span style="margin-left: 30px;">PROOF</span><br> <span class="h6-text text-black" style="text-transform: uppercase;">Proof Type : &nbsp;<?php echo e($viewmem->typeOfProof); ?></span><br> <span class="h6-text text-black" style="text-transform: uppercase;">ID Number: &nbsp;<?php echo e($viewmem->proofNumber); ?></span></a>
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
               <span class="text-black name_text" style="text-transform: uppercase;"><?php echo e($viewmember->name); ?></span><br>
               <span  class="text-black name_text_sub" style="text-transform: uppercase;"><?php echo e($viewmember->code); ?></span><br>
               <span class="text-black name_text_sub" style="text-transform: uppercase;"><?php echo e($viewmember->dob); ?></span><br> 
                <span class="text-black name_text_sub" style="text-transform: uppercase;"><?php echo e($countrys ->countryNames); ?></span>
              </div>
            </div>

            <a href="#" class="pop3">
          <img src="<?php echo e(URL::asset('storage/img/member_img/'.$viewmember->singnature)); ?>" draggable="true"  class="img-thumbnail " alt="" style="width: 100px;height:50px;" /></a>
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
          <div class="col-md-6 col-xs-12 divTableCell">Name<b class="data-lab"><?php echo e($viewmember->name); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Father's Name/ Husband's Name<b class="data-lab"><?php echo e($viewmember->guardian); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Date of Birth<b class="data-lab"><?php echo e($viewmember->dob); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Gender<b class="data-lab"><?php echo e($viewmember->gender); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Religion<b class="data-lab"><?php echo e($viewmember->religion); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Caste<b class="data-lab"><?php echo e($viewmember->caste); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Nationality<b class="data-lab"><?php echo e($countrys ->countryNames); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Education<b class="data-lab"><?php echo e($viewmember->education); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Occupation<b class="data-lab"><?php echo e($viewmember->occupation); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Marital status<b class="data-lab"><?php echo e($viewmember->maritalStatus); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">No of Children<b class="data-lab"><?php echo e($viewmember->noOfChildren); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Income<b class="data-lab"><?php echo e($viewmember->incomeCurrencytype); ?> : <?php echo e($viewmember->incomeAmount); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Mobile No<b class="data-lab"><?php echo e($viewmember->mobileId); ?><?php echo e($viewmember->mobileNo); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Landline No<b class="data-lab"><?php echo e($viewmember->LandlineNo); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">Email<b class="data-lab"><?php echo e($viewmember->email); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">How Do You Know About Heera Group<b class="data-lab"><?php echo e($viewmember->aboutHeera); ?></b></div>
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
          <?php $__currentLoopData = $countryname; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $viewmemb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
             <?php if(($address->typeOfAddress=='permanent')&&($country->type=='permanent')): ?>
          <div class="col-md-12 col-xs-12 divTableCell">Address<b class="data-lab"><?php echo e($address->address); ?></b></div>
          <div class="col-md-12 col-xs-12 divTableCell">City<b class="data-lab"><?php echo e($address->city); ?></b></div>
          <div class="col-md-12 col-xs-12 divTableCell">State<b class="data-lab"><?php echo e($address->state); ?></b></div>
          <div class="col-md-12 col-xs-12 divTableCell">Country<b class="data-lab"><?php echo e($country->Names); ?></b></div>
          <div class="col-md-12 col-xs-12 divTableCell">Pin<b class="data-lab"><?php echo e($address->pin); ?></b></div>
         
           <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </div>
        </div>
     </div>
   
      <div class="col-sm-12 col-md-6">
        <div class="panel panel-warning">
          <div class="panel-heading"> Correspondence Address
          </div>
          <div class="panel-body">
           <?php $__currentLoopData = $countryname; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $viewmemb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if(($address->typeOfAddress=='correspondance')&&($country->type=='correspondance')): ?>
          <div class="col-md-12 col-xs-12 divTableCell">Address<b class="data-lab"><?php echo e($address->address); ?></b></div>
          <div class="col-md-12 col-xs-12 divTableCell">City<b class="data-lab"><?php echo e($address->city); ?></b></div>
          <div class="col-md-12 col-xs-12 divTableCell">State<b class="data-lab"><?php echo e($address->state); ?></b></div>
          <div class="col-md-12col-xs-12 divTableCell">Country<b class="data-lab"><?php echo e($country->Names); ?></b></div>
          <div class="col-md-12 col-xs-12 divTableCell">Pin<b class="data-lab"><?php echo e($address->pin); ?></b></div>
                <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </div>
        </div>
     </div>
    </div>
    <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="panel panel-warning">
          <div class="panel-heading"> Official Address
          </div>
          <div class="panel-body">
          <?php $__currentLoopData = $countryname; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?> <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $viewmemb; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <?php if($address->typeOfAddress=='official'): ?>
          <div class="col-md-12 col-xs-12 divTableCell">Address<b class="data-lab"><?php echo e($address->address); ?></b></div>
          <div class="col-md-12 col-xs-12 divTableCell">City<b class="data-lab"><?php echo e($address->city); ?></b></div>
          <div class="col-md-12 col-xs-12 divTableCell">State<b class="data-lab"><?php echo e($address->state); ?></b></div>
           <?php if($country->type=='official'): ?>
          <div class="col-md-12 col-xs-12 divTableCell">Country<b class="data-lab"><?php echo e($country->Names); ?></b></div>
           <?php endif; ?>
          <div class="col-md-12 col-xs-12 divTableCell">Pin<b class="data-lab"><?php echo e($address->pin); ?></b></div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

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
              <label style="padding-right: 10px;" >AMOUNT HOLDING : <?php echo e(json_decode($viewmember->membership_details)->inr->type); ?> </label>
              <label class="inr-style">AMOUNT APPLYING FOR : <?php echo e(json_decode($viewmember->membership_details)->inr->amount); ?> </label>
            </div>
            
            <div class="form-group">
           <p> <strong>AED</strong></p>
              <div class="col-xs-12 col-md-12" style="border-bottom: .1em solid #ccc;"></div>
              <label style="padding-right: 10px;">AMOUNT HOLDING : <?php echo e(json_decode($viewmember->membership_details)->aed->type); ?> </label>
              <label class="inr-style">AMOUNT APPLYING FOR : <?php echo e(json_decode($viewmember->membership_details)->aed->amount); ?> </label>
            </div>
            <div class="form-group">
            <p><strong>INR</strong></p>
               <div class="col-xs-12 col-md-12" style="border-bottom: .1em solid  #ccc;"></div>
              <label style="padding-right: 10px;">AMOUNT HOLDING : <?php echo e(json_decode($viewmember->membership_details)->cad->type); ?> </label>
              <label class="inr-style" >AMOUNT APPLYING FOR : <?php echo e(json_decode($viewmember->membership_details)->cad->amount); ?> </label>
            </div>
           
            <div class="form-group">
              <p><strong>USD</strong></p>
            <div class="col-xs-12 col-md-12" style="border-bottom:.1em solid #ccc;"></div>
              <label style="padding-right: 10px;">AMOUNT HOLDING : <?php echo e(json_decode($viewmember->membership_details)->usd->type); ?> </label>
              <label class="inr-style">AMOUNT APPLYING FOR : <?php echo e(json_decode($viewmember->membership_details)->usd->amount); ?> </label>
            </div>
              <div class="form-group">
              <p><strong>SAR</strong></p>
              <div class="col-xs-12 col-md-12" style="border-bottom: .1em solid #ccc;"></div>
              <label style="padding-right: 10px;">AMOUNT HOLDING : <?php echo e(json_decode($viewmember->membership_details)->sar->type); ?> </label>
              <label class="inr-style">AMOUNT APPLYING FOR : <?php echo e(json_decode($viewmember->membership_details)->sar->amount); ?> </label>
            </div>
          </div>
        </div>
      </div>
    </div>
    </div>
    </div>

    <!-- <div class="row">
      <div class="col-sm-12 col-md-6">
        <div class="panel panel-warning">
          <div class="panel-heading">Proofs </div>
          <div class="panel-body">
          <div class="col-md-6 col-xs-12 divTableCell">Type of proof<b class="data-lab"><?php echo e($viewmem->typeOfProof); ?></b></div>
          <div class="col-md-6 col-xs-12 divTableCell">ID Number<b class="data-lab"><?php echo e($viewmem->proofNumber); ?></b></div>
          </div>
        </div>
      </div>
   
      <div class="col-sm-12 col-md-6">
        <div class="panel panel-warning">
          <div class="panel-heading"> Proof Images
          </div>
           <div class="panel-body">
          <div class="col-md-4 col-xs-12 divTableCell text-center">Photos<img src="<?php echo e(URL::asset('storage/img/member_img/'.$viewmember->photo)); ?>" class="img-thumbnail" alt="" style="width: 100px;"/> </div>
          <div class="col-md-4 col-xs-12 divTableCell text-center">singnature<img src="<?php echo e(URL::asset('storage/img/member_img/'.$viewmember->singnature)); ?>" class="img-thumbnail" alt="" style="width: 100px;"/>  </div>
          <div class="col-md-4 col-xs-12 divTableCell text-center">Proof<img src="<?php echo e(URL::asset('storage/img/proof/'.$viewmem->file)); ?>" class="img-thumbnail" alt="" style="width: 100px;" /> </div>
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
            <a href="<?php echo e(URL::to('/')); ?>/member/<?php echo e($viewmember->userId); ?>/edit"  class="active">  
            <button name="edit" type="submit" class="btn btn-info" id="edit">Edit</button></a>
            <a href="<?php echo e(URL::to('/')); ?>/web/member/memberconfrim/<?php echo e($viewmember->userId); ?>" class="active">
            <button name="confrim" type="submit" class="btn btn-primary" id="confrim">Confrim</button></a>  
          </div>
        </div>
        </div>
      
      </div>
       <div class="col-sm-12 col-md-4"></div>
    </div>
  <?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
  <script type="text/javascript" src="<?php echo e(URL::asset('js/parsley.min.js')); ?>"></script>
  <script >
  $(function() {
  $('.pop1,.pop2,.pop3').click(function(){
  $('.imagepreview').attr('src', $(this).find('img').attr('src'));
  $('#imagemodal').modal('show'); 
  });
  });
</script>
  <script type="text/javascript"></script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('web.layout.erp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>