<?php $__env->startSection('banner'); ?>
  <div class="col-lg-12" align="center" style="background-color:#ffcf29">
  <img src="<?php echo e(URL::asset('img/new_heading.png')); ?>" class="img-responsive">
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/jquery.timepicker.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/daterangepicker.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(URL::asset('css/sweetalert.css')); ?>" type="text/css" />
<style type="text/css">
#installationForm .tab-content {
    margin-top: 20px;
}
 #installationForm  .form-group {
    margin-right: 0px !important;
    margin-left: 0px !important;
}
.panel-heading.font-bold {
    padding-bottom: 17px;
}

.add-more-experience.btn.btn-success.btn-sm,.add-more-references.btn.btn-success.btn-sm,
.add-more-certificate.btn.btn-success.btn-sm,.add-more-family.btn.btn-success.btn-sm ,
.add-more-acadamic.btn.btn-success.btn-sm{
    float: right;
}

small[data-fv-for="workshift_from"]{
  float: left;
}
small[data-fv-for="workshift_to"]{
  float: right;
}



</style>
<div class="bg-light lter b-b wrapper-md">
    <h1 class="m-n font-thin h3">Add Employee</h1>
  </div>
 <div class="wrapper-md" >
    <div class="row">
      <div class="col-md-12">
        <div class="panel panel-default">
     
          <div class="panel-body">
            <form id="installationForm" class="form-horizontal" method="post" enctype="multipart/form-data" >
    <ul class="nav nav-pills">
        <li class="active"><a href="#basic-tab" data-toggle="tab">Personal Details</a></li>
        <li><a href="#database-tab" data-toggle="tab">Employment Qualifications</a></li>
        <li><a href="#work-history" data-toggle="tab">Work History</a></li>
    </ul>

    <div class="tab-content">
        <!-- First tab -->
        <div class="tab-pane active" id="basic-tab">
          <div class="row">
            <div class="col-sm-12">

         <div class="panel panel-default">
          <div class="panel-heading font-bold">Personal Information</div>
            <div class="panel-body">
           <div class="row">
           <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Employee ID:</label>
              <input type="text" class="form-control" id="emplyee_id" name="emplyee_id" placeholder="">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group ">
              <label for="name">Name:</label>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1" style="border: 0px;    padding: 0px;"><select class="form-control" name="emp_name" id="emp_name" style="color: #000;
    padding: 0px;
    min-width: 50px;">
                <option value="Mr.">Mr.</option>
                <option value="Ms.">Ms.</option>
                <option value="Mrs.">Mrs.</option>
              </select></span>
              <input type="text" class="form-control" id="name" name="name">
              </div>
               
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Guardian's Name:</label>
              <div class="input-group">
                <span class="input-group-addon" id="basic-addon1" style="border: 0px;    padding: 0px;"><select class="form-control" name="emp_name_g" id="emp_name_g" style="color: #000;
    padding: 0px;
    min-width: 50px;">
                <option value="Mr.">Mr.</option>
                <option value="Ms.">Ms.</option>
                <option value="Mrs.">Mrs.</option>
              </select></span>
              <input type="text" class="form-control" id="gname" name="gname">
            </div>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Gender:</label>
              <select type="text" class="form-control" id="gender" name="gender">
                <option value="">Select</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Date of Birth:</label>
              <input type="text" class="form-control" id="dob" name="dob" >
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Marital Status:</label>
              <select type="text" class="form-control" id="marital_s" name="marital_s">
                <option value="">Select</option>
                <option value="Married">Married</option>
                <option value="Single">Single</option>
                <option value="Divorced">Divorced</option>
                <option value="Other">Other</option>
              </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Religion:</label>
              <select name="religion" id="religion" class="form-control">
                <option value="">Select</option>
                <?php $__currentLoopData = $listTypes['religion']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($element->id); ?>"><?php echo e($element->religion_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                
              </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Caste:</label>
              <input type="text" class="form-control" id="caste" name="caste">
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Blood Group:</label>
              <select type="text" class="form-control" id="bloodgroup" name="bloodgroup">
                <option value="">Select</option>
                <option value="A+">A+</option>
                <option value="A-">A-</option>
                <option value="B+">B+</option>
                <option value="B-">B-</option>
                <option value="AB+">AB+</option>
                <option value="AB-">AB-</option>
                <option value="O+">O+</option>
                <option value="O-">O-</option>
              </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Nationality:</label>
              <select class="form-control" id="nationality" name="nationality">
                <option value="">Select</option>
                <?php $__currentLoopData = $listTypes['country']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($element->id); ?>"><?php echo e($element->countryName); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Mobile Number:</label>
              <input type="text" class="form-control" id="mobile" name="mobile">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Email:</label>
              <input type="text" class="form-control" id="email" name="email">
              </div>
            </div>
        </div>
        <div class="row">
          <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Proof Type:</label>
              <select id="proof_type" name="proof_type" class="form-control">
                <option value="">Select</option>
                <option >Passport</option>
                <option >Adhar Card</option>
                <option >Driving Licence</option>
                <option >Voter ID</option>
                <option >Pancard</option>
              </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Proof Number:</label>
              <input type="text" class="form-control" id="proof_number" name="proof_number">
              </div>
            </div>

            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Upload Photo:</label>
              <input type="file" class="btn btn-success btn-fil" id="photo" name="photo">
              </div>
            </div>
        </div>
            </div>
            </div>
            </div>
            <hr/>
            <br/>



          </div>







          <div class="row">
            <div class="col-sm-12">

          <div class="panel panel-default">
            <div class="panel-heading font-bold">Address</div>
            <div class="panel-body">
            <div class="row">
              <div class="col-sm-6 " >
                <h5>Correspondence</h5>
                <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                  <label for="name">Address:</label>
                  <textarea class="form-control" id="c_address" name="c_address"></textarea> 
                  </div>
                </div>
             </div>
             <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                  <label for="name">city:</label>
                   <input type="text" class="form-control" id="c_city" name="c_city">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                  <label for="name">State:</label>
                   <input type="text" class="form-control" id="c_state" name="c_state">
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                  <label for="name">Country:</label>
                   <select id="c_country" name="c_country" class="form-control">
                     <option value="">Select</option>
                      <?php $__currentLoopData = $listTypes['country']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($element->id); ?>"><?php echo e($element->countryName); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         
                   </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                  <label for="name">Zip Code:</label>
                   <input type="text" class="form-control" id="c_zip" name="c_zip">
                  </div>
                </div>
                </div>
            </div>
                <div class="col-sm-6 seperator">
                  <h5>Permanent <input type="checkbox" name="same_correspondence" id="same_correspondence"></h5>
                  <div class="row">
                  <div class="col-sm-12">
                  <div class="form-group">
                  <label for="name">Address:</label>
                  <textarea class="form-control" id="p_address" name="p_address"></textarea> 
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                  <label for="name">city:</label>
                   <input type="text" class="form-control" id="p_city" name="p_city">
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                  <label for="name">State:</label>
                   <input type="text" class="form-control" id="p_state" name="p_state">
                  </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-6">
                  <div class="form-group">
                  <label for="name">Country:</label>
                  <select id="p_country" name="p_country" class="form-control">
                     <option value="">Select</option>
                      <?php $__currentLoopData = $listTypes['country']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <option value="<?php echo e($element->id); ?>"><?php echo e($element->countryName); ?></option>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                         
                   </select>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                  <label for="name">Zip Code:</label>
                   <input type="text" class="form-control" id="p_zip" name="p_zip">
                  </div>
                </div>
            </div>
                </div>
              
            </div>
         </div>
       </div>
       </div>
       </div>

          <div class="row">
            <div class="col-sm-12">
             <div class="panel panel-default">
            <div class="panel-heading font-bold">Company Information</div>
            <div class="panel-body">
           
           <div class="row">
           <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Company:</label>
              <select type="text" class="form-control" id="company" name="company">
                <option value="">Select</option>
                <?php $__currentLoopData = $listTypes['company']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($element->id); ?>"><?php echo e($element->company_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              </div>
            </div>
           <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Branch:</label>
              <select type="text" class="form-control" id="branch" name="branch">
                <option value="">Select</option>
              </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Department:</label>
              <select type="text" class="form-control" id="department" name="department">
                <option value="">Select</option>
                <?php $__currentLoopData = $listTypes['department']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($element->id); ?>"><?php echo e($element->department_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Designation:</label>
              <select type="text" class="form-control" id="designation" name="designation">
                <option value="">Select</option>
              </select>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Date of Joining:</label>
              <input type="text" class="form-control" id="dateofjoing" name="dateofjoing">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Work Shift:</label>
             <!--  <input type="text" class="form-control" id="workshift" name="workshift"> -->
              <p id="workshift">
               <input type="text" id="workshift_from" name="workshift_from" class="workshift-time start form-control " style="width: 49%; float: left;"  />  
               <input type="text" id="workshift_to" name="workshift_to" class="workshift-time end form-control " style="width: 48%; margin-left: 5px; float: left;" />
               </p>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Monthly Gross Salary:</label>
              <input type="text" class="form-control" id="monthly_sal" name="monthly_sal">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Job Type:</label>
              <select type="text" class="form-control" id="jobtype" name="jobtype">
                <option value="">Select</option>
                <option>Permanent</option>
                <option>Temporary</option>
              </select>
              </div>
            </div>
        </div>
        <div class="row">
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Employee Status:</label>
              <select type="text" class="form-control" id="status" name="status">
                <option>Active</option>
                <option>Resigned</option>
                <option>Terminated</option>
              </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">User Type:</label>
              <select type="text" class="form-control" id="scheeme" name="scheeme">
                  <option value="">Select</option>
                  <option value="OI">Office Incharge</option>
                  <option value="EMP">Employee</option>
                  <option value="ME">Marketing Executive</option>
              </select>
              </div>
            </div>
        </div>
         </div>
         </div>
         </div>
         <hr/>
            <br/>
       </div>
       <div class="row">
         <div class="col-sm-12">
           <div class="panel panel-default">
            <div class="panel-heading font-bold">Family Details  <button type="button" class="add-more-family btn btn-success btn-sm"><i class="fa fa-plus"></i></button></div>
            <div class="panel-body">
           
           
           <div class="row family_details_class hide" id="family_details">
            <div class="col-sm-12 row">
           
           <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control f_name" id="f_name" name="f_name[]">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Relation with Employee:</label>
              <select class="form-control" id="f_relation" name="f_relation[]">
                <option value="">Select</option>
                <option >Father</option>
                <option >Mother</option>
                <option >Brother</option>
                <option >Sister</option>
                <option >Husband</option>
                <option >Wife</option>
                <option >Others</option>
              </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Gender:</label>
              <select type="text" class="form-control" id="f_gender" name="f_gender[]">
                <option value="">Select</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Mobile:</label>
              <input type="text" class="form-control" id="f_mobile" name="f_mobile[]">
              </div>
            </div>
            <div class="col-sm-1 " >
                <button type="button" class="btn btn-default remove-more-family"><i class="fa fa-minus"></i></button>
             </div>
         </div>
           </div>
           </div>
           </div>
         </div>
       </div>
       
        

        
 

        </div>

        <!-- Second tab -->
        <div class="tab-pane" id="database-tab">
            <div class="row">
         <div class="col-sm-12">
             <div class="panel panel-default">
            <div class="panel-heading font-bold">Academic Qualification  <button type="button" class="add-more-acadamic btn btn-success btn-sm"><i class="fa fa-plus"></i></button></div>
            <div class="panel-body">

           <div class="row acadamic_details hide" id="acadamic_details">
              <div class="col-sm-12 row">
           
           <div class="col-sm-2">
              <div class="form-group">
              <label for="name">Course:</label>
              <input type="text" class="form-control" id="course" name="course[]">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Institution/University:</label>
              <input type="text" class="form-control" id="ac_institution" name="ac_institution[]">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Year Of Passing:</label>
              <input type="text" class="form-control" id="year_pass" name="year_pass[]">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
              <label for="name">Marks(%):</label>
              <input type="text" class="form-control" id="mark_pers" name="mark_pers[]">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
              <label for="name">Specialization:</label>
              <input type="text" class="form-control" id="specialization" name="specialization[]">
              </div>
            </div>
            <div class="col-sm-1"> <button type="button" class="remove-more-acadamic btn btn-danger btn-sm"><i class="fa fa-minus"></i></button></div>
            
         </div>
           </div>
           
         </div>
         </div>
         </div>
       </div>

        <div class="row">
         <div class="col-sm-12">
           <div class="panel panel-default">
            <div class="panel-heading font-bold">Certificate (if any) <button type="button" class="add-more-certificate btn btn-success btn-sm"><i class="fa fa-plus"></i></button></div>
            <div class="panel-body">

           <div class="row certification_details hide" id="certification_details">
              <div class="col-sm-12 row">
           
           <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Course:</label>
              <input type="text" class="form-control" id="course_cer" name="course_cer[]">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Certifying Authority:</label>
              <input type="text" class="form-control" id="authority" name="authority[]">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Name Of Institution:</label>
              <input type="text" class="form-control" id="institution" name="institution[]">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Year:</label>
              <input type="text" class="form-control" id="year_cer" name="year_cer[]">
              </div>
            </div>
            <div class="col-sm-3">
              <button type="button" class="remove-more-certificate btn btn-danger btn-sm"><i class="fa fa-minus"></i></button>
            </div>
              </div>
             </div>
            </div>
           </div>
         </div>
       </div>

        </div>
        <!-- third tab -->
        <div class="tab-pane" id="work-history">
          <div class="row">
         <div class="col-sm-12">
           <div class="panel panel-default">
            <div class="panel-heading font-bold">Work Experience <button type="button" class="add-more-experience btn btn-success btn-sm"><i class="fa fa-plus"></i></button></div>
            <div class="panel-body">
           <div class="row hide work_experience_details" id="work_experience_details">
            <div class="col-sm-12 row">
           
           <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Organisation:</label>
              <input type="text" class="form-control" id="exp_organisation" name="exp_organisation[]">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
              <label for="name">Designation:</label>
              <input type="text" class="form-control" id="exp_designation" name="exp_designation[]">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Responsibilities:</label>
              <input type="text" class="form-control" id="exp_responsibilities" name="exp_responsibilities[]">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
              <label for="name">Annual Income:</label>
              <input type="text" class="form-control" id="exp_income" name="exp_income[]">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
              <label for="name">Time Period:</label>
              <div style="float: left;">
                <input type="text" class="form-control" id="exp_period" name="exp_period[]">
              </div>
              <div style="float: left;">
                <input type="text" class="form-control" id="exp_period" name="exp_period_2[]">
              </div>
              
              </div>
            </div>
            <div class="col-sm-3">
              <button type="button" class="remove-more-experience btn btn-danger btn-sm"><i class="fa fa-minus"></i></button>
            </div>
         </div>
           </div>
           </div>
           </div>
         </div>
       </div>
       <div class="row">
         <div class="col-sm-12">
           <div class="panel panel-default">
            <div class="panel-heading font-bold">Your Skills </div>
            <div class="panel-body">
           
           <div class="row">
           <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Computer:</label>
              <input type="text" class="form-control" id="computer_skill" name="computer_skill">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Typing Speed on Computer:</label>
              <input type="text" class="form-control" id="typing_speed" name="typing_speed">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Skill or knowledge:</label>
              <input type="text" class="form-control" id="knowledge" name="knowledge">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Hobbies:</label>
              <input type="text" class="form-control" id="hobbies" name="hobbies">
              </div>
            </div>
         </div>
         </div>
        </div>
         </div>
       </div>
       <div class="row">
         <div class="col-sm-12">
         <div class="panel panel-default">
            <div class="panel-heading font-bold">References (Professional/Work Related)<button type="button" class="add-more-references btn btn-success btn-sm"><i class="fa fa-plus"></i></button>  </div>
            <div class="panel-body">
          
           <div class="row hide references_details " id="references_details">
             <div class="col-sm-12 row">
           
           <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control" id="r_name" name="r_name[]">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Mobile No:</label>
              <input type="text" class="form-control" id="r_mobile" name="r_mobile[]">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Email ID:</label>
              <input type="text" class="form-control" id="r_email" name="r_email[]">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Relationship:</label>
              <input type="text" class="form-control" id="r_relationship" name="r_relationship[]">
              </div>
            </div>
            <div class="col-sm-1">
              <button type="button" class="remove-more-references btn btn-danger btn-sm"><i class="fa fa-minus"></i></button>
            </div>
            
         </div>
           </div>
           </div>
           </div>
         </div>
       </div>
        </div>

        <!-- Previous/Next buttons -->
        <ul class="pager wizard">
            <li class="previous"><a href="javascript: void(0);">Previous</a></li>
            <li class="next"><a href="javascript: void(0);">Next</a></li>
        </ul>
    </div>
    <?php echo e(csrf_field()); ?>

</form>
          </div>
      </div>
      </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script src="<?php echo e(URL::asset('js/moment.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/wizard/jquery.bootstrap.wizard.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/wizard/form_wizard.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/bootstrap-datepicker.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/jquery.timepicker.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/timerange/datepair.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/timerange/jquery.datepair.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/daterangepicker.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/sweetalert.min.js')); ?>"></script>
<script type="text/javascript">
$(function(){
  
  $('#dob, #dateofjoing').datepicker({
          autoclose: true,
          format: 'dd/mm/yyyy',
      }).on('change', function(e) {
        // `e` here contains the extra attributes
        $('#installationForm').formValidation('revalidateField', 'dob');
        $('#installationForm').formValidation('revalidateField', 'dateofjoing');
    });
             $('#workshift .workshift-time').timepicker({
                    'showDuration': true,
                    'timeFormat': 'H:i'
                }).on('changeTime', function() {
                  $('#installationForm').formValidation('revalidateField', 'workshift_from');
                   $('#installationForm').formValidation('revalidateField', 'workshift_to');
                });

                // $('#defaultDeltaExample .date').datepicker({
                //     'format': 'm/d/yyyy',
                //     'autoclose': true
                // });

                var defaultDeltaExampleEl = document.getElementById('workshift');
                var defaultDeltaDatepair = new Datepair(defaultDeltaExampleEl, {
                    'defaultDateDelta': 1,
                    'defaultTimeDelta': 7200000
                });

    //
    $('#same_correspondence').click(function(){

        

        if($(this).prop('checked')==true){
        $('#p_address').val($('#c_address').val());
        $('#p_city').val($('#c_city').val());
        $('#p_state').val($('#c_state').val());
        $('#p_country').val($('#c_country').val());
        $('#p_zip').val($('#c_zip').val());

        $('#p_address').attr('readonly','readonly');
        $('#p_city').attr('readonly','readonly');
        $('#p_state').attr('readonly','readonly');
        $('#p_country').attr('readonly','readonly');
        $('#p_zip').attr('readonly','readonly');

        


        }else{
        $('#p_address').val('');
        $('#p_city').val('');
        $('#p_state').val('');
        $('#p_country').val('');
        $('#p_zip').val('');

        $('#p_address').removeAttr('readonly');
        $('#p_city').removeAttr('readonly');
        $('#p_state').removeAttr('readonly');
        $('#p_country').removeAttr('readonly');
        $('#p_zip').removeAttr('readonly');
        }
        $('#installationForm').formValidation('revalidateField', 'p_address');
        $('#installationForm').formValidation('revalidateField', 'p_city');
        $('#installationForm').formValidation('revalidateField', 'p_state');
        $('#installationForm').formValidation('revalidateField', 'p_country');
        $('#installationForm').formValidation('revalidateField', 'p_zip');
    });

    //get branch
    var _getBranch=function(_id){
      
      $.post('<?php echo e(URL::to('/')); ?>/hr/employee/ajax/branch',
        {
          _id:_id,
          _token:$('meta[name="csrf-token"]').attr('content')
        },
        function(o){
          var _html='<option value="">Select</option>';
          for (var i in o){
            _html+='<option value="'+o[i].id+'">'+o[i].branch_name+'</option>';
          }
         $('#branch').html(_html);
    },'json');
    }
    //get designation
    var _getDesignation=function(_id){
      
      $.post('<?php echo e(URL::to('/')); ?>/hr/employee/ajax/designation',
        {
          _id:_id,
          _token:$('meta[name="csrf-token"]').attr('content')
        },
        function(o){
          var _html='<option value="">Select</option>';
          for (var i in o){
            _html+='<option value="'+o[i].id+'">'+o[i].designation_name+'</option>';
          }
         $('#designation').html(_html);
    },'json');
    }
    //
    $('body').on('change','#company',function(){
      _getBranch($(this).val());
    });
    $('body').on('change','#department',function(){
      _getDesignation($(this).val());
    });



 function adjustIframeHeight() {
        var $body   = $('body'),
                $iframe = $body.data('iframe.fv');
        if ($iframe) {
            // Adjust the height of iframe
            $iframe.height($body.height());
        }
    }

    $('#installationForm')
        .formValidation({
            framework: 'bootstrap',
            icon: {
                valid: 'glyphicon glyphicon-ok',
                invalid: 'glyphicon glyphicon-remove',
                validating: 'glyphicon glyphicon-refresh'
            },
            // This option will not ignore invisible fields which belong to inactive panels
            // excluded: ':disabled',

            fields: {
                'emplyee_id': {
                    validators: {
                        notEmpty: {
                            message: 'Employee ID is required'
                        },
                        remote: {
                            url: '<?php echo e(URL::to('/')); ?>/hr/employee/ajax/employee_id_exist',
                            message: "This Employee ID is already taken, please choose another one",
                            data: {
                                type: 'emplyee_id',
                                _token:'<?php echo e(csrf_token()); ?>'
                            },
                            type: 'POST',
                            delay: 1000
                       }
                    }
                    
                },
                'photo':{
                    validators: {
                        notEmpty: {
                            message: "Upload Photo is required"
                        },
                        file: {
                            extension: 'jpeg,jpg,png',
                            type: 'image/jpeg,image/png',
                            message: 'Please choose a jpeg jpg png file'
                        }
                    }
                },
                // 'bloodgroup': {
                //     validators: {
                //         notEmpty: {
                //             message: 'Blood Group is required'
                //         }
                //     }
                // },
                'name': {
                    validators: {
                        notEmpty: {
                            message: 'Name is required'
                        }
                    }
                },
                //address
                // 'c_address': {
                //     validators: {
                //         notEmpty: {
                //             message: 'Address is required'
                //         }
                //     }
                // },
                // 'c_city': {
                //     validators: {
                //         notEmpty: {
                //             message: 'City is required'
                //         }
                //     }
                // },
                // 'c_state': {
                //     validators: {
                //         notEmpty: {
                //             message: 'State is required'
                //         }
                //     }
                // },
                // 'c_country': {
                //     validators: {
                //         notEmpty: {
                //             message: 'Country is required'
                //         }
                //     }
                // },
                // 'c_zip': {
                //     validators: {
                //         notEmpty: {
                //             message: 'Zip code is required'
                //         },
                //         integer: {
                //             message: 'The value is not an integer'
                //        }
                //     }
                // },
                //address
                // 'p_address': {
                //     validators: {
                //         notEmpty: {
                //             message: 'Address is required'
                //         }
                //     }
                // },
                // 'p_city': {
                //     validators: {
                //         notEmpty: {
                //             message: 'City is required'
                //         }
                //     }
                // },
                // 'p_state': {
                //     validators: {
                //         notEmpty: {
                //             message: 'State is required'
                //         }
                //     }
                // },
                // 'p_country': {
                //     validators: {
                //         notEmpty: {
                //             message: 'Country is required'
                //         }
                //     }
                // },
                // 'p_zip': {
                //     validators: {
                //         // notEmpty: {
                //         //     message: 'Zip code is required'
                //         // },
                //         integer: {
                //             message: 'The value is not an integer'
                //        }
                //     }
                // },
                // 'f_name[]': {
                //     validators: {
                //         notEmpty: {
                //             message: 'Name is required'
                //         }
                //     }
                // },
                // 'f_relation[]': {
                //     validators: {
                //         notEmpty: {
                //             message: 'Relation with Employee is required'
                //         }
                //     }
                // },
                // 'f_gender[]': {
                //     validators: {
                //         notEmpty: {
                //             message: 'Gender is required'
                //         }
                //     }
                // },
                // 'f_mobile[]': {
                //     validators: {
                //         notEmpty: {
                //             message: 'mobile is required'
                //         }
                //     }
                // },
                'gname': {
                    validators: {
                        notEmpty: {
                            message: "Guardian's Name is required"
                        }
                    }
                },
                'gender': {
                    validators: {
                        notEmpty: {
                            message: "Gender is required"
                        }
                    }
                },
                'dob': {
                    validators: {
                        notEmpty: {
                            message: "Date of Birth is required"
                        }
                    }
                },
                'marital_s': {
                    validators: {
                        notEmpty: {
                            message: "Marital Status is required"
                        }
                    }
                },
                'religion': {
                    validators: {
                        notEmpty: {
                            message: "Religion is required"
                        }
                    }
                },
                'caste': {
                    validators: {
                        notEmpty: {
                            message: "Caste is required"
                        }
                    }
                },
                'nationality': {
                    validators: {
                        notEmpty: {
                            message: "Nationality is required"
                        }
                    }
                },
                'mobile': {
                    validators: {
                        // notEmpty: {
                        //     message: "Mobile is required"
                        // },
                        integer: {
                            message: 'The value is not an integer'
                       }
                    }
                },
                'email': {
                    validators: {
                        // notEmpty: {
                        //     message: "Email is required"
                        // },
                      emailAddress: {
                        message: 'The value is not a valid email address'
                      }
                    }
                },
                'company': {
                    validators: {
                        notEmpty: {
                            message: "Company is required"
                        }
                    }
                },
                'branch': {
                    validators: {
                        notEmpty: {
                            message: "Branch is required"
                        }
                    }
                },
                'department': {
                    validators: {
                        notEmpty: {
                            message: "Department is required"
                        }
                    }
                },
                'designation': {
                    validators: {
                        notEmpty: {
                            message: "Designation is required"
                        }
                    }
                },
                'dateofjoing': {
                    validators: {
                        notEmpty: {
                            message: "Date of Joining is required"
                        }
                    }
                },
                // 'designation': {
                //     validators: {
                //         notEmpty: {
                //             message: "Designation is required"
                //         }
                //     }
                // },
                // 'workshift_from': {
                //     validators: {
                //         notEmpty: {
                //             message: "From is required"
                //         }
                //     }
                // },
                // 'workshift_to': {
                //     validators: {
                //         notEmpty: {
                //             message: "To is required"
                //         }
                //     }
                // },
                // 'monthly_sal':{
                //     validators: {
                //         notEmpty: {
                //             message: "Monthly Gross Salary is required"
                //         }
                //     }
                // },
                // 'jobtype':{
                //     validators: {
                //         notEmpty: {
                //             message: "Job Type "
                //         }
                //     }
                // },
                // 'status':{
                //     validators: {
                //         notEmpty: {
                //             message: "Employee Status is required"
                //         }
                //     }
                // },
                
                'scheeme':{
                    validators: {
                        notEmpty: {
                            message: "User Type is required"
                        }
                    }
                },
                // 'course[]': {
                //     validators: {
                //         notEmpty: {
                //             message: 'Course is required'
                //         }
                //     }
                // },
                // 'ac_institution[]': {
                //     validators: {
                //         notEmpty: {
                //             message: 'Institution/University is required'
                //         }
                //     }
                // },
                // 'year_pass[]': {
                //     validators: {
                //         notEmpty: {
                //             message: 'Year Of Passing is required'
                //         }
                //     }
                // },
                // 'mark_pers[]': {
                //     validators: {
                //         notEmpty: {
                //             message: 'Marks is required'
                //         }
                //     }
                // },
                // 'specialization[]': {
                //     validators: {
                //         notEmpty: {
                //             message: 'Specialization is required'
                //         }
                //     }
                // },
                // 'course_cer[]': {
                //     validators: {
                //         // notEmpty: {
                //         //     message: 'Course is required'
                //         // }
                //     }
                // },
                // 'authority[]': {
                //     validators: {
                //         // notEmpty: {
                //         //     message: 'Certifying Authority is required'
                //         // }
                //     }
                // },
                // 'institution[]': {
                //     validators: {
                //         // notEmpty: {
                //         //     message: 'Name Of Institution is required'
                //         // }
                //     }
                // },
                // 'year_cer[]': {
                //     validators: {
                //         // notEmpty: {
                //         //     message: 'Year is required'
                //         // }
                //     }
                // },
                // 'exp_organisation[]': {
                //     validators: {
                //         // notEmpty: {
                //         //     message: 'Organisation is required'
                //         // }
                //     }
                // },
                // 'exp_designation[]': {
                //     validators: {
                //         // notEmpty: {
                //         //     message: 'Designation is required'
                //         // }
                //     }
                // },
                // 'exp_responsibilities[]': {
                //     validators: {
                //         // notEmpty: {
                //         //     message: 'Responsibilities is required'
                //         // }
                //     }
                // },
                // 'exp_income[]': {
                //     validators: {
                //         // notEmpty: {
                //         //     message: 'Annual Income is required'
                //         // }
                //     }
                // },
                // 'exp_period[]': {
                //     validators: {
                //         // notEmpty: {
                //         //     message: 'Time Period is required'
                //         // }
                //     }
                // },
                // 'exp_period_2[]': {
                //     validators: {
                //         // notEmpty: {
                //         //     message: 'Time Period is required'
                //         // }
                //     }
                // },
                // 'computer_skill': {
                //     validators: {
                //         // notEmpty: {
                //         //     message: 'Computer Skills is required'
                //         // }
                //     }
                // },
                // 'typing_speed': {
                //     validators: {
                //         // notEmpty: {
                //         //     message: 'Typing Speed on Computer is required'
                //         // }
                //     }
                // },
                // 'knowledge': {
                //     validators: {
                //         // notEmpty: {
                //         //     message: 'Skill or knowledge is required'
                //         // }
                //     }
                // },
                // 'hobbies': {
                //     validators: {
                //         // notEmpty: {
                //         //     message: 'Hobbies is required'
                //         // }
                //     }
                // },
                // 'r_name[]': {
                //     validators: {
                //         notEmpty: {
                //             message: 'Name is required'
                //         }
                //     }
                // },
                // 'r_mobile[]': {
                //     validators: {
                //         notEmpty: {
                //             message: 'Mobile No is required'
                //         },
                //         integer: {
                //             message: 'The value is not an integer'
                //        }
                //     }
                // },
                // 'r_email[]': {
                //     validators: {
                //         notEmpty: {
                //             message: 'Email ID is required'
                //         },
                //       emailAddress: {
                //         message: 'The value is not a valid email address'
                //       }
                //     }
                // },
                // 'r_relationship[]': {
                //     validators: {
                //         notEmpty: {
                //             message: 'Relationship is required'
                //         }
                //     }
                // },
            }
        })
        // Add button click handler
        .on('click', '.add-more-family', function() {
            var $template = $('#family_details'),
                $clone    = $template
                                .clone()
                                .removeClass('hide')
                                .removeAttr('id')
                                .insertBefore($template);
            // $('#installationForm')
            //     .formValidation('addField', $clone.find('[name="f_name[]"]'))
            //     .formValidation('addField', $clone.find('[name="f_relation[]"]'))
            //     .formValidation('addField', $clone.find('[name="f_gender[]"]'))
            //     .formValidation('addField', $clone.find('[name="f_mobile[]"]'))

                
        })
        // Remove button click handler
        .on('click', '.remove-more-family', function() {
            var $row = $(this).closest('.family_details_class');

            // Remove fields
            // $('#installationForm')
            //     .formValidation('removeField', $row.find('[name="f_name[]"]'))
            //     .formValidation('removeField', $row.find('[name="f_relation[]"]'))
            //     .formValidation('removeField', $row.find('[name="f_gender[]"]'))
            //     .formValidation('removeField', $row.find('[name="f_mobile[]"]'));

            // Remove element containing the fields
            $row.remove();
        })
        //acadamic_details
        // Add button click handler
        .on('click', '.add-more-acadamic', function() {
            var $template = $('#acadamic_details'),
                $clone    = $template
                                .clone()
                                .removeClass('hide')
                                .removeAttr('id')
                                .insertBefore($template);
            // $('#installationForm')
            //     .formValidation('addField', $clone.find('[name="course[]"]'))
            //     .formValidation('addField', $clone.find('[name="ac_institution[]"]'))
            //     .formValidation('addField', $clone.find('[name="year_pass[]"]'))
            //     .formValidation('addField', $clone.find('[name="mark_pers[]"]'))
            //     .formValidation('addField', $clone.find('[name="specialization[]"]'))
        })
        // Remove button click handler
        .on('click', '.remove-more-acadamic', function() {
            var $row = $(this).closest('.acadamic_details');

            // Remove fields
            // $('#installationForm')
            //     .formValidation('removeField', $row.find('[name="course[]"]'))
            //     .formValidation('removeField', $row.find('[name="ac_institution[]"]'))
            //     .formValidation('removeField', $row.find('[name="year_pass[]"]'))
            //     .formValidation('removeField', $row.find('[name="mark_pers[]"]'))
            //     .formValidation('removeField', $row.find('[name="specialization[]"]'));

            // Remove element containing the fields
            $row.remove();
        })
        //certification_details
        // Add button click handler
        .on('click', '.add-more-certificate', function() {
            var $template = $('#certification_details'),
                $clone    = $template
                                .clone()
                                .removeClass('hide')
                                .removeAttr('id')
                                .insertBefore($template);
            // $('#installationForm')
            //     .formValidation('addField', $clone.find('[name="course_cer[]"]'))
            //     .formValidation('addField', $clone.find('[name="authority[]"]'))
            //     .formValidation('addField', $clone.find('[name="institution[]"]'))
            //     .formValidation('addField', $clone.find('[name="year_cer[]"]'))


        })
        // Remove button click handler
        .on('click', '.remove-more-certificate', function() {
            var $row = $(this).closest('.certification_details');

            // Remove fields
            // $('#installationForm')
            //     .formValidation('removeField', $row.find('[name="course_cer[]"]'))
            //     .formValidation('removeField', $row.find('[name="authority[]"]'))
            //     .formValidation('removeField', $row.find('[name="institution[]"]'))
            //     .formValidation('removeField', $row.find('[name="year_cer[]"]'));

            // Remove element containing the fields
            $row.remove();
        })
        //work_experience_details
        // Add button click handler
        .on('click', '.add-more-experience', function() {
            var $template = $('#work_experience_details'),
                $clone    = $template
                                .clone()
                                .removeClass('hide')
                                .removeAttr('id')
                                .insertBefore($template);
            // $('#installationForm')
            //     .formValidation('addField', $clone.find('[name="exp_organisation[]"]'))
            //     .formValidation('addField', $clone.find('[name="exp_designation[]"]'))
            //     .formValidation('addField', $clone.find('[name="exp_responsibilities[]"]'))
            //     .formValidation('addField', $clone.find('[name="exp_income[]"]'))
            //     .formValidation('addField', $clone.find('[name="exp_period[]"]'))
            //     .formValidation('addField', $clone.find('[name="exp_period_2[]"]'))

                $('input[name="exp_period[]"]').datepicker({     autoclose: true
                  }).on('change', function(e) {
                    $('#installationForm').formValidation('revalidateField', 'exp_period[]');
                });
                $('input[name="exp_period_2[]"]').datepicker({     autoclose: true
                  }).on('change', function(e) {
                    $('#installationForm').formValidation('revalidateField', 'exp_period_2[]');
                });
        })
        // Remove button click handler
        .on('click', '.remove-more-experience', function() {
            var $row = $(this).closest('.work_experience_details');

            // Remove fields
            // $('#installationForm')
            //     .formValidation('removeField', $row.find('[name="exp_organisation[]"]'))
            //     .formValidation('removeField', $row.find('[name="exp_designation[]"]'))
            //     .formValidation('removeField', $row.find('[name="exp_responsibilities[]"]'))
            //     .formValidation('removeField', $row.find('[name="exp_income[]"]'))
            //     .formValidation('removeField', $row.find('[name="exp_period[]"]'));

            // Remove element containing the fields
            $row.remove();
        })
        //references_details 
         // Add button click handler
        .on('click', '.add-more-references', function() {
            var $template = $('#references_details'),
                $clone    = $template
                                .clone()
                                .removeClass('hide')
                                .removeAttr('id')
                                .insertBefore($template);
            // $('#installationForm')
            //     .formValidation('addField', $clone.find('[name="r_name[]"]'))
            //     .formValidation('addField', $clone.find('[name="r_mobile[]"]'))
            //     .formValidation('addField', $clone.find('[name="r_email[]"]'))
            //     .formValidation('addField', $clone.find('[name="r_relationship[]"]'));
        })
        // Remove button click handler
        .on('click', '.remove-more-references', function() {
            var $row = $(this).closest('.references_details');

            // Remove fields
             // $('#installationForm')
             //    .formValidation('removeField', $row.find('[name="r_name[]"]'))
             //    .formValidation('removeField', $row.find('[name="r_mobile[]"]'))
             //    .formValidation('removeField', $row.find('[name="r_email[]"]'))
             //    .formValidation('removeField', $row.find('[name="r_relationship[]"]'));

            // Remove element containing the fields
            $row.remove();
        })
        .bootstrapWizard({
            tabClass: 'nav nav-pills',
            onTabClick: function(tab, navigation, index) {
                return validateTab(index);
            },
            onNext: function(tab, navigation, index) {
                var numTabs    = $('#installationForm').find('.tab-pane').length,
                    isValidTab = validateTab(index - 1);
                if (!isValidTab) {
                    return false;
                }

                if (index === numTabs) {
                    // We are at the last tab

                    // Uncomment the following line to submit the form using the defaultSubmit() method
                    // $('#installationForm').formValidation('defaultSubmit');

                    // For testing purpose
                     var form = $('#installationForm')[0]; 
                     var data = new FormData(form);
                     $.ajax({
                            url: '<?php echo e(URL::to('/')); ?>/hr/employee/create',
                            method: 'POST',
                            data: data,
                            success: function(data){
                              if(data.result){
                                sweetAlert("Registration Success!",'' , "success");
                                window.location.href='<?php echo e(URL::to('/')); ?>/hr/employee/view/'+data.id;
                                 // location.reload();
                              }else{
                                sweetAlert("Oops...",'' , "error");
                              }
                            },
                            error: function(xhr, status, error){
                            },
                            processData: false,
                            contentType: false
                        });
                     
                }

                return true;
            },
            onPrevious: function(tab, navigation, index) {
                return validateTab(index + 1);
            },
            onTabShow: function(tab, navigation, index) {
                // Update the label of Next button when we are at the last tab
                var numTabs = $('#installationForm').find('.tab-pane').length;
                $('#installationForm')
                    .find('.next')
                        .removeClass('disabled')    // Enable the Next button
                        .find('a')
                        .html(index === numTabs - 1 ? 'Finish' : 'Next');

                // You don't need to care about it
                // It is for the specific demo
                adjustIframeHeight();
            }
        });

    function validateTab(index) {
        var fv   = $('#installationForm').data('formValidation'), // FormValidation instance
            // The current tab
            $tab = $('#installationForm').find('.tab-pane').eq(index);

        // Validate the container
        fv.validateContainer($tab);

        var isValidStep = fv.isValidContainer($tab);
        if (isValidStep === false || isValidStep === null) {
            // Do not jump to the target tab
            return false;
        }

        return true;
    }

    $('.add-more-family').trigger('click');
    $('.family_details_class').not( ":odd" ).find('.remove-more-family').hide();

    $('.add-more-acadamic').trigger('click');
    $('.acadamic_details').not( ":odd" ).find('.remove-more-acadamic').hide();

    $('.add-more-certificate').trigger('click');
    $('.certification_details').not( ":odd" ).find('.remove-more-certificate').hide();

    $('.add-more-experience').trigger('click');
    $('.work_experience_details').not( ":odd" ).find('.remove-more-experience').hide();


    $('.add-more-references').trigger('click');
    $('.references_details').not( ":odd" ).find('.remove-more-references').hide();


});

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>