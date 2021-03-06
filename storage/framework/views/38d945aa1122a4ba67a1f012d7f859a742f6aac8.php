<?php $__env->startSection('title','Member Registration'); ?>
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
  .phone-control{
    display: block;
    width: 100%;
    height: 34px;
    padding: 6px 12px;
    font-size: 14px;
    line-height: 1.42857143;
    color: #555;
    background-color: #fff;
    background-image: none;
    border: 1px solid #ccc;
  }
</style>
<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">Membership Request Form</h1>
  <p align="right">
    <a href="<?php echo e(URL::to('/')); ?>" class="btn btn-info btn-lg">
     <span class="glyphicon glyphicon-home"></span> Home
    </a>
  </p> 
</div>
<form role="form" action="<?php echo e(URL::to('/')); ?>/web/member/createMember" method="POST" data-parsley-validate enctype="multipart/form-data">
<?php echo e(csrf_field()); ?>

  <div class="wrapper-md">
    <?php if(session()->has('message')): ?>
    <div class="alert alert-info fade in alert-dismissable">
      <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
      <strong>Info!</strong> <?php echo e(session()->get('message')); ?>

    </div>
    <?php endif; ?>
    <div class="col-sm-12">
      <div class="panel panel-default">
       <div class="panel-heading font-bold">Personal Details</div>
          <div class="panel-body">
            <div class="row">
              <div class="col-sm-4">
                <div class="form-group">
                  <label>Full Name<span style="color:red;">*</span> (as per Bank Record)</label>
                  <input type="text" class="form-control" placeholder="Full Name" id="fullname" name="fullname" required data-parsley-required-message="Please enter fullname" value="<?php echo e(old('fullname')); ?>">
                  <?php if($errors->has('fullname')): ?>
                    <span class="help-inline"><?php echo e($errors->first('fullname')); ?></span>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label>Father's Name/Husband's Name<span style="color:red;">*</span></label>
                  <input type="text" class="form-control" placeholder="Father's Name/Husband's Name" id="guardian" name="guardian" value="<?php echo e(old('guardian')); ?>" required data-parsley-required-message="Please enter guardian name" >
                  <?php if($errors->has('guardian')): ?>
                  <span class="help-inline"><?php echo e($errors->first('guardian')); ?></span>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label>Date of Birth<span style="color:red;">*</span></label>
                  <input type='text' name="dateofbirth" id="dateofbirth" readonly required data-parsley-required-message="Please enter DOB" placeholder="MM/DD/YYYY" data-language="en" class="form-control" onchange="getAge()" value="<?php echo e(old('dateofbirth')); ?>"/>
                  <div id="dateerror" style="color:red;"></div>
                  
                  <?php if($errors->has('dateofbirth')): ?>
                  <span class="help-inline"><?php echo e($errors->first('dateofbirth')); ?></span>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-md-12"></div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label>Gender<span style="color:red;">*</span></label>
                  <select  class="form-control" id="gender" name="gender" required data-parsley-required-message="Please enter gender">
                    <option value="">--Select--</option>
                    <option value="Male" <?php echo e((old('gender')=='Male')?'selected':''); ?>>Male</option>
                    <option value="Female" <?php echo e((old('gender')=='Female')?'selected':''); ?>>Female</option>
                  </select>
                  <?php if($errors->has('gender')): ?>
                   <span class="help-inline"><?php echo e($errors->first('gender')); ?></span>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label>Religion</label>
                  <input type="text" name="religion" id="religion" readonly class="form-control" value="Islam">
                  <?php if($errors->has('religion')): ?>
                  <span class="help-inline"><?php echo e($errors->first('religion')); ?></span>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label>Caste</label>
                  <select  class="form-control" id="caste" name="caste">
                    <option value="">--Select--</option>
                    <?php $__currentLoopData = $listTypes['caste']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $caste): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($caste); ?>" <?php echo e((old('caste')==$caste)?'selected':''); ?>><?php echo e($caste); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <?php if($errors->has('caste')): ?>
                    <span class="help-inline"><?php echo e($errors->first('caste')); ?></span>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label>Nationality<span style="color:red;">*</span></label>
                  <input type="hidden" name="zip_code" id="zip_code" value="AUTO">
                  <select  class="form-control" name="country" id="country" required data-parsley-required-message="Please select country" onchange="countryId(this.value)">
                    <option value="">--Select--</option>
                    <?php $__currentLoopData = $listTypes['country']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($country->id); ?>" zip-code="<?php echo e($country->countryCode); ?>" phone-code="<?php echo e($country->countryId); ?>" <?php echo e((old('country')==$country)?'selected':''); ?>><?php echo e($country->countryName); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <?php if($errors->has('country')): ?>
                    <span class="help-inline"><?php echo e($errors->first('country')); ?></span>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label>Education</label>
                  <select  class="form-control" id="education" name="education">
                    <option value="">--Select--</option>
                    <?php $__currentLoopData = $listTypes['education']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $education): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($education); ?>" <?php echo e((old('education')==$education)?'selected':''); ?>><?php echo e($education); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <?php if($errors->has('education')): ?>
                  <span class="help-inline"><?php echo e($errors->first('education')); ?></span>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label>Occupation</label>
                  <select  class="form-control" id="occupation" name="occupation">
                    <option value="">--Select--</option>
                    <?php $__currentLoopData = $listTypes['occupation']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $occupation): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($occupation); ?>" <?php echo e((old('occupation')==$occupation)?'selected':''); ?>><?php echo e($occupation); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <?php if($errors->has('occupation')): ?>
                    <span class="help-inline"><?php echo e($errors->first('occupation')); ?></span>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label>Income<span style="color:red;">*</span></label>  
                  <div class="input-group m-b"> 
                    <div class="input-group-btn dropdown">
                      <select class="btn btn-default" id="incomeid" name="incomeid" required>
                        <option value="">--Select--</option>
                        <option value="INR" <?php echo e((old('incomeid')=='INR')?'selected':''); ?>>INR</option>
                        <option value="AED" <?php echo e((old('incomeid')=='AED')?'selected':''); ?>>AED</option>
                        <option value="USD" <?php echo e((old('incomeid')=='USD')?'selected':''); ?>>USD</option>
                        <option value="SAR" <?php echo e((old('incomeid')=='SAR')?'selected':''); ?>>SAR</option>
                        <option value="CAD" <?php echo e((old('incomeid')=='CAD')?'selected':''); ?>>CAD</option>
                      </select>
                    </div>
                    <input type="text" placeholder="Income" id="income" name="income" value="<?php echo e(old('income')); ?>" class="form-control" required data-parsley-trigger="keyup" data-parsley-required-message="Please enter income" data-parsley-type="number" data-parsley-min="1">
                    <?php if($errors->has('income')): ?>
                    <span class="help-inline"><?php echo e($errors->first('income')); ?></span>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label>Marital status<span style="color:red;">*</span></label>
                  <select  class="form-control" id="marital" name="marital" required data-parsley-required-message="Please Select Marital status">
                    <option value="">--Select--</option>
                    <option value="Single" <?php echo e((old('marital')=='Single')?'selected':''); ?>>Single</option>
                    <option value="Married" <?php echo e((old('marital')=='Married')?'selected':''); ?>>Married</option>
                    <option value="Divorced" <?php echo e((old('marital')=='Divorced')?'selected':''); ?>>Divorced</option>
                    <option value="Widowed" <?php echo e((old('marital')=='Widowed')?'selected':''); ?>>Widowed</option>
                  </select>
                  <?php if($errors->has('marital')): ?>
                    <span class="help-inline"><?php echo e($errors->first('marital')); ?></span>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label>No of Children</label>
                  <input type="text" class="form-control" placeholder="No of Children" id="childrens" name="childrens" value="<?php echo e(old('childrens')); ?>" data-parsley-type="number" data-parsley-trigger="keyup">
                  <?php if($errors->has('childrens')): ?>
                  <span class="help-inline"><?php echo e($errors->first('childrens')); ?></span>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-sm-12"></div>
              <div class="form-group col-sm-4">
                <label id="mobile_prefix">Mobile No<span style="color:red;">*</span></label>
                <div class="input-group m-b">
                  <span class="input-group-addon conId"></span>
                  <input type="hidden" id="conId" name="conId">
                  <input type="text" id="mobileno" name="mobileno"  placeholder="0"  class="phone-control" data-parsley-type="integer" data-parsley-trigger="keyup" placeholder="Mobile No" data-parsley-maxlength="16"  data-parsley-required-message="Please enter valid mobile number" required>
                  <?php if($errors->has('mobileno')): ?>
                  <span class="help-inline"><?php echo e(($errors->first('mobileno')=='validation.phone')?'Not a valid Mobile Number':$errors->first('mobileno')); ?></span>
                  <?php endif; ?>
                </div> 
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label id="land_prefix">Landline No</label>
                  <input type="text" class="form-control" placeholder="Landline No" data-parsley-type="integer" data-parsley-maxlength="16" data-parsley-trigger="keyup" id="landlineno" name="landlineno" value="<?php echo e(old('landlineno')); ?>">
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label>Email<span style="color:red;">*</span></label>
                  <input type="email" class="form-control" placeholder="Email" id="email" name="email" value="<?php echo e(old('email')); ?>" required data-parsley-required-message="Please enter email" data-parsley-trigger="change" data-parsley-type="email" data-parsley-trigger="keyup" >
                  <?php if($errors->has('email')): ?>
                  <span class="help-inline"><?php echo e($errors->first('email')); ?></span>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-sm-12"></div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label>How Do You Know About Heera Group<span style="color:red;">*</span></label>
                  <textarea type="text" class="form-control" placeholder="How Do You Know About Heera Group" required name="aboutheera" id="aboutheera" data-parsley-required-message="Please enter referance"></textarea>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label>Upload Photo (<span style="color:red;">*</span>.jpg,.jpeg,.png)</label>
                  <input type="hidden" name="MAX_FILE_SIZE" value="1048576" />
                  <input type="file" class="btn btn-success btn-fil" id="profilepic" name="profilepic" accept="image/png,image/jpeg" required data-parsley-required-message="Please upload photo" onchange="validateFileType();photoSize(this)">
                  <div id="photoSize" style="color:red;"></div>
                  <div id="msgerror" style="color:red;"></div>
                  <?php if($errors->has('profilepic')): ?>
                  <span class="help-inline"><?php echo e($errors->first('profilepic')); ?></span>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-sm-4">
                <div class="form-group">
                  <label>Upload Signature (<span style="color:red;">*</span>.jpg,.jpeg,.png)</label>
                  <input type="file" class="btn btn-success btn-fil" id="signature" name="signature" accept="image/png,image/jpeg" required data-parsley-required-message="Please upload signature" onchange="validateSig();sigSize(this)" >
                  <div id="msgerrorsignature" style="color:red;"></div>
                  <div id="sigSize" style="color:red;"></div>
                  <?php if($errors->has('signature')): ?>
                  <span class="help-inline"><?php echo e($errors->first('signature')); ?></span>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="panel panel-default">
          <div class="panel-heading font-bold">Permanent Address</div>
          <div class="panel-body">
            <div class="form-group">
              <label>Address<span style="color:red;">*</span></label>
              <textarea type="text" class="form-control" placeholder="Address" required data-parsley-trigger="keyup" data-parsley-required-message="Please enter address" id="permanent_addr" name="permanent_addr"><?php echo e(old('permanent_addr')); ?></textarea>
              <?php if($errors->has('permanent_addr')): ?>
              <span class="help-inline"><?php echo e($errors->first('permanent_addr')); ?></span>
              <?php endif; ?>
            </div>
            <div class="form-group">
              <label>City<span style="color:red;">*</span></label>
              <input type="text" class="form-control" placeholder="City" required data-parsley-required-message="Please enter city" id="permanent_city" name="permanent_city" value="<?php echo e(old('permanent_city')); ?>">
              <?php if($errors->has('permanent_city')): ?>
              <span class="help-inline"><?php echo e($errors->first('permanent_city')); ?></span>
              <?php endif; ?>
            </div>
            <div class="form-group">
              <label>State<span style="color:red;">*</span></label>
              <input type="text" class="form-control" placeholder="State" required data-parsley-required-message="Please enter state" data-parsley-trigger="keyup" data-parsley-pattern="^[A-Z a-z]*$" id="permanent_state" name="permanent_state" value="<?php echo e(old('permanent_state')); ?>">
              <?php if($errors->has('permanent_state')): ?>
              <span class="help-inline"><?php echo e($errors->first('permanent_state')); ?></span>
              <?php endif; ?>
            </div>
            <div class="form-group">
              <label>Country<span style="color:red;">*</span></label>
              <select class="form-control" name="permanent_country" id="permanent_country" required data-parsley-required-message="Please Select Country">
              <option value="">Select</option>
              <?php $__currentLoopData = $listTypes['country']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($country->id); ?>" zip-code="<?php echo e($country->countryCode); ?>" phone-code="<?php echo e($country->countryId); ?>" <?php echo e((old('permanent_country')==$country)?'selected':''); ?>><?php echo e($country->countryName); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
            <div class="form-group">
              <label>Pin<span style="color:red;">*</span></label>
              <input type="text" class="form-control" placeholder="Pin" required  id="permanent_pin" required data-parsley-trigger="keyup" data-parsley-maxlength="6" data-parsley-minlength="4" data-parsley-required-message="Please enter valid pin" data-parsley-type="integer" name="permanent_pin" value="<?php echo e(old('permanent_pin')); ?>">
              <?php if($errors->has('permanent_pin')): ?>
              <span class="help-inline"><?php echo e($errors->first('permanent_pin')); ?></span>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="panel panel-default">
          <div class="panel-heading font-bold">CORRESPONDENCE ADDRESS</div>
          <div class="panel-body">
            <div class="form-group">
              <label>Address<span style="color:red;">*</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <span class="perm_adrs">SAME AS PERMANENT ADDRESS  
              <label class="checkbox-inline i-checks">
              <input type="checkbox" name="sameAddress" id="sameAddress" onclick="sameaddress()"><i style="margin-top: -10px;"></i></label></span></label>
              <textarea type="text" class="form-control" placeholder="Address" id="correspondance_addr" required  name="correspondance_addr" required data-parsley-required-message="Please enter address"><?php echo e(old('correspondance_addr')); ?></textarea>
              <?php if($errors->has('correspondance_addr')): ?>
              <span class="help-inline"><?php echo e($errors->first('correspondance_addr')); ?></span>
              <?php endif; ?>
            </div>
            <div class="form-group">
              <label>City<span style="color:red;">*</span></label>
              <input type="text" class="form-control" placeholder="City" id="correspondance_city" required  name="correspondance_city" value="<?php echo e(old('correspondance_city')); ?>" required data-parsley-required-message="Please enter city">
              <?php if($errors->has('correspondance_city')): ?>
              <span class="help-inline"><?php echo e($errors->first('correspondance_city')); ?></span>
              <?php endif; ?>
            </div>
            <div class="form-group">
              <label>State<span style="color:red;">*</span></label>
              <input type="text" class="form-control" placeholder="State" id="correspondance_state" required name="correspondance_state" value="<?php echo e(old('correspondance_state')); ?>" required data-parsley-required-message="Please enter state" data-parsley-pattern="^[A-Z a-z]*$" data-parsley-trigger="keyup">
              <?php if($errors->has('correspondance_state')): ?>
              <span class="help-inline"><?php echo e($errors->first('correspondance_state')); ?></span>
              <?php endif; ?>
            </div>
            <div class="form-group">
              <label>Country<span style="color:red;">*</span></label>
              <select  class="form-control" name="correspondance_country" id="correspondance_country" required data-parsley-required-message="Please Select Country">
              <option value="">Select</option>
              <?php $__currentLoopData = $listTypes['country']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <option value="<?php echo e($country->id); ?>" zip-code="<?php echo e($country->countryCode); ?>" phone-code="<?php echo e($country->countryId); ?>" <?php echo e((old('correspondance_country')==$country)?'selected':''); ?>><?php echo e($country->countryName); ?></option>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
            <div class="form-group">
              <label>Pin<span style="color:red;">*</span></label>
              <input type="text" class="form-control" placeholder="Pin" id="correspondance_pin" name="correspondance_pin" value="<?php echo e(old('correspondance_pin')); ?>" required required data-parsley-maxlength="6" data-parsley-minlength="4" data-parsley-minlength-message="Please enter valid pin" data-parsley-required-message="Please enter valid pin" data-parsley-trigger="keyup" placeholder="Pin" data-parsley-type="integer">
              <?php if($errors->has('correspondance_pin')): ?>
              <span class="help-inline"><?php echo e($errors->first('correspondance_pin')); ?></span>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-4">
        <div class="panel panel-default">
          <div class="panel-heading font-bold">Official Address</div>
          <div class="panel-body">
            <div class="form-group">
              <label>Address</label>
              <textarea type="text" class="form-control" placeholder="Address" id="official_addr" name="official_addr"><?php echo e(old('official_addr')); ?></textarea>
              <?php if($errors->has('official_addr')): ?>
              <span class="help-inline"><?php echo e($errors->first('official_addr')); ?></span>
              <?php endif; ?>
            </div>
            <div class="form-group">
              <label>City</label>
              <input type="text" class="form-control" placeholder="City" id="official_city" name="official_city" value="<?php echo e(old('official_city')); ?>">
              <?php if($errors->has('official_city')): ?>
              <span class="help-inline"><?php echo e($errors->first('official_city')); ?></span>
              <?php endif; ?>
            </div>
            <div class="form-group">
              <label>State</label>
              <input type="text" class="form-control" placeholder="State" id="official_state" name="official_state" data-parsley-pattern="^[A-Z a-z]*$" data-parsley-trigger="keyup" value="<?php echo e(old('official_state')); ?>">
              <?php if($errors->has('official_state')): ?>
              <span class="help-inline"><?php echo e($errors->first('official_state')); ?></span>
              <?php endif; ?>
            </div>
            <div class="form-group">
              <label>Country</label>
              <select  class="form-control" name="official_country" id="official_country" data-parsley-required-message="Please Select Country">
                <option value="">Select</option>
                <?php $__currentLoopData = $listTypes['country']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($country->id); ?>" zip-code="<?php echo e($country->countryCode); ?>" phone-code="<?php echo e($country->countryId); ?>" <?php echo e((old('official_country')==$country)?'selected':''); ?>><?php echo e($country->countryName); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
            <div class="form-group">
              <label>Pin</label>
              <input type="text" class="form-control" placeholder="Pin" id="official_pin" name="official_pin" data-parsley-type="integer" data-parsley-trigger="keyup" data-parsley-maxlength="6" data-parsley-required-message="Please enter valid pin" data-parsley-minlength="4" value="<?php echo e(old('official_pin')); ?>">
              <?php if($errors->has('official_pin')): ?>
              <span class="help-inline"><?php echo e($errors->first('official_pin')); ?></span>
              <?php endif; ?>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12"></div>
      <div class="col-sm-6">
        <div class="panel panel-default">
          <div class="panel-heading font-bold">MEMBERSHIP DETAILS</div>
            <div class="panel-body">
              <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                    <label >Amount of Holding(If Any)</label>
                    <input type="text" class="form-control" name="type_amount_inr" id="type_amount_inr"  placeholder="INR">
                    <?php if($errors->has('type_amount_inr')): ?>
                    <span class="help-inline"><?php echo e($errors->first('type_amount_inr')); ?></span>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Amount  Applying For</label>
                    <input type="text" class="form-control" placeholder="Amount  Applying For" id="amount_inr" data-parsley-type="number" name="amount_inr" value="<?php echo e(old('amount_inr')); ?>" >
                    <?php if($errors->has('amount_inr')): ?>
                    <span class="help-inline"><?php echo e($errors->first('amount_inr')); ?></span>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Amount of Holding(If Any)</label>
                    <input type="text" class="form-control" name="type_amount_aed" id="type_amount_aed" placeholder="AED">
                    <?php if($errors->has('type_amount_aed')): ?>
                    <span class="help-inline"><?php echo e($errors->first('type_amount_aed')); ?></span>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Amount  Applying For</label>
                    <input type="text" class="form-control" placeholder="Amount  Applying For" id="amount_aed" name="amount_aed" data-parsley-type="number" value="<?php echo e(old('amount_aed')); ?>">
                    <?php if($errors->has('amount_aed')): ?>
                    <span class="help-inline"><?php echo e($errors->first('amount_aed')); ?></span>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Amount of Holding(If Any)</label>
                    <input type="text" class="form-control" name="type_amount_usd" id="type_amount_usd" placeholder="USD">
                    <?php if($errors->has('type_amount_usd')): ?>
                    <span class="help-inline"><?php echo e($errors->first('type_amount_usd')); ?></span>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Amount  Applying For</label>
                    <input type="text" class="form-control" placeholder="Amount  Applying For " id="amount_usd" name="amount_usd" data-parsley-type="number" value="<?php echo e(old('amount_usd')); ?>">
                    <?php if($errors->has('amount_usd')): ?>
                    <span class="help-inline"><?php echo e($errors->first('amount_usd')); ?></span>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Amount of Holding(If Any)</label>
                    <input type="text" class="form-control" name="type_amount_sar" id="type_amount_sar" placeholder="SAR">
                    <?php if($errors->has('type_amount_sar')): ?>
                    <span class="help-inline"><?php echo e($errors->first('type_amount_sar')); ?></span>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Amount  Applying For</label>
                    <input type="text" class="form-control" placeholder="Amount  Applying For " id="amount_sar" name="amount_sar" data-parsley-type="number" value="<?php echo e(old('amount_sar')); ?>">
                    <?php if($errors->has('amount_sar')): ?>
                    <span class="help-inline"><?php echo e($errors->first('amount_sar')); ?></span>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label>Amount of Holding(If Any)</label>
                    <input type="text" class="form-control" name="type_amount_cad" id="type_amount_cad" placeholder="CAD">
                    <?php if($errors->has('type_amount_cad')): ?>
                    <span class="help-inline"><?php echo e($errors->first('type_amount_cad')); ?></span>
                    <?php endif; ?>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group"> 
                    <label>Amount  Applying For</label>
                    <input type="text" class="form-control" placeholder="Amount  Applying For" id="amount_cad" name="amount_cad" data-parsley-type="number" value="<?php echo e(old('amount_cad')); ?>">
                    <?php if($errors->has('amount_cad')): ?>
                    <span class="help-inline"><?php echo e($errors->first('amount_cad')); ?></span>
                    <?php endif; ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-6">
          <div class="panel panel-default">
            <div class="panel-heading font-bold">Proof</div>
            <div class="panel-body">
              <div class="col-sm-6">
               <div class="form-group">
                  <label>Type of proof<span style="color:red;">*</span></label>
                  <select  class="form-control" id="type_of_proof" name="type_of_proof" required data-parsley-required-message="Please select proof">
                  <option value="">--Select--</option>
                  <?php $__currentLoopData = $listTypes['proof_type']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $proof_type): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($proof_type); ?>" <?php echo e((old('type_of_proof')==$proof_type)?'selected':''); ?>><?php echo e(ucfirst($proof_type)); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
                  <?php if($errors->has('type_of_proof')): ?>
                  <span class="help-inline"><?php echo e($errors->first('type_of_proof')); ?></span>
                  <?php endif; ?>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-6">
                  <label>ID Number</label>
                  <input type="text" class="form-control" placeholder="ID Number" id="proof_number" name="proof_number"  value="<?php echo e(old('proof_number')); ?>"  data-parsley-required-message="Please enter ID Number">
                  <?php if($errors->has('proof_number')): ?>
                  <span class="help-inline"><?php echo e($errors->first('proof_number')); ?></span>
                  <?php endif; ?>
                </div>
              </div>
              <div class="col-md-12"></div>
              <div class="form-group">
                <div class="col-sm-6">
                  <label>Proof file (<span style="color:red;">*</span>.jpg,.jpeg,.png)</label>
                  <input type="file" class="btn btn-success btn-fil" placeholder="Proof File" id="proof_file" name="proof_file" required data-parsley-required-message="Please upload proof file" accept="image/png,image/jpeg" onchange="proofcheck();idSize(this)"  >
                  <div id="msgerrorIdProof" style="color:red;"></div>
                  <div id="idSize" style="color:red;"></div>
                  <?php if($errors->has('proof_file')): ?>
                  <span class="help-inline"><?php echo e($errors->first('proof_file')); ?></span>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-sm-12">
          <div class="panel panel-default">
            <div class="panel-heading font-bold" >DECLARATION</div>
            <div class="panel-body" >
              <div class="form-horizontal">
                <div class="panel panel-info">
                  <div class="panel-heading font-bold" data-toggle="collapse" data-target="#tab-1">Terms &amp; Conditions(click here)</div>
                  <div class="panel-body panel-collapse collapse" id="tab-1" class="">
                    <div class="form-group">
                      <div class="col-lg-10">                     
                        1. HG TCN member must be above 18 years of age can be a Resident Indian, NRI or a foreigner.<br/>
                        2. HG TCN member must be a Muslim.<br/>
                        3. Nomination facility is available; up to two nominees are permissible to every member. However can extend if needed.<br/>
                        4. All supportive documents should be relevant to member/s.<br/>
                        5. Copy of Residence proof and Photo ID of the member/s and the nominee/s is required. Original of the same can also be demanded for verification.<br/>
                        6. HG will not bear any responsibility for any loss due to mistake in filling of the name and/or any detail in, any of the HG form.<br/>
                        7. All eligible  benefits and gifts will be issued on the applicant name, which is filled in the enrollment form only.<br/>
                        8. HG reserves the right to terminate the enrollment if any of the document or the information submitted by the applicant is found to be unauthentic or in any other related case.<br/>
                        9. Member/s willing to change any details provided in enrollment form must fill the update form and consult HG for the same. Changes will be effected post two weeks from receiving the details.<br/>
                        10. Membership applications will be accepted on or before last working day of every month. Application will not be accepted after the specified date in any case.<br/>
                        11. One  time  registration  fees  will  be  charged  on  every membership  of  HG TCN @ 0.2% on membership amount (for Eg. : 200/- INR for every 1,00,000/- INR and respectively).<br/>
                        12. Registration fees for HG TCN are non-refundable.<br/>
                        13. HG strictly condemns the payment done by money earned from non-Islamic /illegal source, including interest/theft/burglary/or any other related action, which is against the constitution of the respective country.  HG  reserves  the  right  to  take necessary action in the respective case, and the action may be extended up to legal proceedings as per the case may be.<br/>
                        14. Payments are accepted only through bank, cash payments will not be accepted in any case.<br/>
                        15. Member/s are warned, not to hand over cash to any HG office/Executive/Person/ organization or any one, as HG restricts the acceptance of cash in any case. However, person willing for cash payment may deposit the amount in respective HG bank account and hand over the bank pay-in-slip with enrollment form to any HG office.<br/>
                        16. It is the accountability of HG TCN member/s to verify with their bank, whether  the  membership  amount  has  been  deducted  from  their  respective  bank account. HG takes no responsibility in case of non-remittance of money. HG reserves the right to impose penalty on the respective member up to the extent of loss.<br/>
                        17. No buy back proceeding will be affected within the lock-in period of respective TCN under any circumstances.<br/>
                        18. Buy back request shall be submitted one month prior from date of withdrawal on or before 1st of respective month, subject to completion of lock-in period.<br/>
                        19. HG TCN member/s is/are deemed to be continued unless and until buyback request is submitted or else if HG terminates the membership.<br/>
                        20. Withdrawal amount will be remitted to members account in the first week of every month along with the profit/loss of that particular TCN.<br/>
                        21. As per Almighty's order in the Holy Quran, "O you who believe! Whenever you enter into deals with one another involving future obligations for a certain term, write it down." (2:282), HG is bound to all the terms and conditions stated in the enrollment form of the respective scheme, and so is the member also eligible to terms and conditions mentioned in it.<br/>
                        22. HG, bound by the Islamic Law, will not pay any interest to any member under any circumstances.<br/>
                        23. HG TCN Member/s shall attend a minimum of five meetings out of twelve in a particular year to be well informed with updates.<br/>
                        24. HG reserves all the right to change/modify the terms and conditions without any prior notice, and the same will be effective thereafter.<br/>
                        25. <span style="color:#ce1400;">*Please make sure that you are listing the reason for cash deposit in bank as unit purchase of TCN A/ TCN E/ TCN G/TCN F.</span><br/>
                        26. Heera will not be responsible for any bank charges that is being deducted from the amount you transfer to us.
                        <br />
                        Note:We were only concentrating on Business trades.
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="col-lg-12">
                    <p class="form-control-static">I HAVE READ THE TERMS AND CONDITIONS OF HG AND THE SAME HAVE BEEN WELL EXPLAINED TO ME BY THE HG AUTHORITIES. I AM ALSO AWARE THAT THE TERMS AND CONDITIONS OF HG ARE PRINTED OVERLEAF .I HERE BY AGREE TO ABIDE BY THEM I DECLARE THAT ALL ABOVE DETAILS PROVIDED BY ME ARE CORRECT TO THE BEST OF MY KNOWLDGE</p>
                  </div>
                </div>
                <div class="col-md-5">       
                  <div class="row" style="padding: 10px;">
                    <div class="col-sm-6 col-xs-12">
                      <input type="text" class="form-control img-bg " value="<?php echo e($captcha); ?>" name="captcha" id="captcha" disabled="disabled">
                    </div>
                    <div class="col-sm-6 col-xs-12">
                      <input type="text"  name="captcha_confirm" class="form-control" id="captcha_confirm" data-parsley-equalto="#captcha" data-parsley-required-message="Enter the captcha" required placeholder="Enter the text as given">
                    </div>
                  </div>
                </div> 
                <div id="cap" style="color: red;"></div>
                <div class="line line-dashed b-b line-lg pull-in"></div>
                <div class="form-group">
                  <label class="control-label" style="text-align: left;"></label>
                  <div class="col-lg-10">
                    <div class="checkbox" style="padding-right: 10px;float: left;padding-top: 14px;margin: 0;">
                      <label class="i-checks">
                      <input type="checkbox" checked="" id="iagree" name="iagree" required data-parsley-required-message="Please agree terms and conditions"><i></i> 
                      </label>
                    </div>
                    <p class="form-control-static" style="float: left;">
                    <a>Terms &amp; Conditions</a><br>I AGREE TO FULFILL ALL THE REQUISITES MENTIONED IN THE TERMS AND CONDITIONS OF HG
                    <br/>
                    <?php if($errors->has('iagree')): ?>
                    <span class="help-inline"><?php echo e($errors->first('iagree')); ?></span>
                    <?php endif; ?>
                    </p>
                  </div>
                </div>
                <div class="line line-dashed b-b line-lg pull-in"></div>
                <div class="col-sm-4 ">
                  <button type="submit" class="btn btn-primary" id="submit">Submit</button>
                  <button type="reset" class="btn btn-default">Cancel</button>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </form>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script type="text/javascript" src="<?php echo e(URL::asset('js/parsley.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/bootstrap-datepicker.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/bootstrap-parsley.min.js')); ?>"></script>
<link rel="stylesheet" href="<?php echo e(URL::asset('css/bootstrap-datepicker.min.css')); ?>" type="text/css" />
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/locale/af.js"></script>
<script type="text/javascript">

$("form").submit(function(event) {
var recaptcha = $("#g-recaptcha-response").val();
$('#cap').html("");
if (recaptcha === "") {
event.preventDefault();
$('#cap').html("Please check the recaptcha");
}
});

// $(function()
// { 
//   $('#dateofbirth').datepicker({
//     maxViewMode: 3,
//     autoclose: true,
//     setDate: "10/12/2013"
//     }); 
// });



</script>

<script>
$(function()
{
$('#dateofbirth').datepicker(
{
orientation:'bottom auto',
autoclose:true
});
});
</script>

<script type="text/javascript">
function sameaddress()
{
var value = document.getElementById("sameAddress").checked==true;
if(value==true)
{
$('#correspondance_addr').val($('#permanent_addr').val());
$('#correspondance_city').val($('#permanent_city').val());
$('#correspondance_state').val($('#permanent_state').val());
$('#correspondance_country').val($('#permanent_country').val());
$('#correspondance_pin').val($('#permanent_pin').val());
}
else
{
$('#correspondance_addr').val("");
$('#correspondance_city').val("");
$('#correspondance_state').val("");
$('#correspondance_country').val("");
$('#correspondance_pin').val("");
}
}
</script>

<script type="text/javascript">  //for photo validation
function validateFileType(){
//$maxsize=2097152;
var fileName = document.getElementById("profilepic").value;
var idxDot = fileName.lastIndexOf(".") + 1;
var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();

$("#msgerror").html("");
if (extFile=="jpg" || extFile=="jpeg" || extFile=="png")
{
//alert('ok'); 
}
else
{
$("#msgerror").html("Only jpg/jpeg and png files are allowed!");
return false;
//alert('notok'); 
}  
}
</script>

<script type="text/javascript">//for signature validation
function validateSig(){
var fileName = document.getElementById("signature").value;
var idxDot = fileName.lastIndexOf(".") + 1;
var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
$("#msgerrorsignature").html("");
if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
}else{
$("#msgerrorsignature").html("Only jpg/jpeg and png files are allowed!");
return false; 
} 
}
</script>

<script type="text/javascript">//for proof validation
function proofcheck(){
var fileName = document.getElementById("proof_file").value;
var idxDot = fileName.lastIndexOf(".") + 1;
var extFile = fileName.substr(idxDot, fileName.length).toLowerCase();
$("#msgerrorIdProof").html("");
if (extFile=="jpg" || extFile=="jpeg" || extFile=="png"){
}
else
{
$("#msgerrorIdProof").html("Only jpg/jpeg and png files are allowed!");
return false; 
}   
}
</script>

<script type="text/javascript"> // for date
function getAge() {
var dateString = document.getElementById("dateofbirth").value;
if(dateString !="")
{
var today = new Date();
var birthDate = new Date(dateString);
var age = today.getFullYear() - birthDate.getFullYear();
var m = today.getMonth() - birthDate.getMonth();
var da = today.getDate() - birthDate.getDate();
$("#dateerror").html("");
if (m < 0 || (m === 0 && today.getDate() < birthDate.getDate())) {
age--;
}
if(m<0){
m +=12;
}
if(da<0){
da +=30;
}
 
if(age < 18 )
{
  // $('.dateerror').css('display','block');
  $("#dateerror").html("You must be 18 Years Old");
  return false;
}
else
{
  $("#submit").prop('disabled', false);
}
}
}
</script>

<script type="text/javascript"> //size for proofs

function photoSize(fieldObj)
{
var FileName  = fieldObj.value;
var FileExt = FileName.substr(FileName.lastIndexOf('.')+1);
var FileSize = fieldObj.files[0].size;
$("#photoSize").html("");
if(FileSize>102400)
{
$("#photoSize").html("Upload File size allowed is 100 Kb.");
document.getElementById('profilepic').value="";
}
}
function sigSize(fieldObj)
{
var FileName  = fieldObj.value;
var FileExt = FileName.substr(FileName.lastIndexOf('.')+1);
var FileSize = fieldObj.files[0].size;
$("#sigSize").html("");
if(FileSize>102400)
{
$("#sigSize").html("Upload File size allowed is 100 Kb.");
document.getElementById('signature').value="";
}
}
function idSize(fieldObj)
{
var FileName  = fieldObj.value;
var FileExt = FileName.substr(FileName.lastIndexOf('.')+1);
var FileSize = fieldObj.files[0].size;
$("#idSize").html("");
if(FileSize>102400)
{
$("#idSize").html("Upload File size allowed is 100 Kb.");
document.getElementById('proof_file').value="";
}
}
</script>

<script type="text/javascript">
function countryId(countryName)
{
$.ajax(
{
type: "get",
url: "<?php echo e(URL::to('/')); ?>/member/countryIds",
data:{countryName:countryName},
success: function (data) {
$(".conId").html("+"+data);
$("#conId").val("+"+data);
}
});
}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout.erp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>