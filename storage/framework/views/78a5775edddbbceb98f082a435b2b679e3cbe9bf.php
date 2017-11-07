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
  <div class="bg-light lter b-b wrapper-md">
    <h1 class="m-n font-thin h3">Branch Master</h1>
  </div> 
<div class="col-md-12"><br>
  <div class="panel panel-default">
    <div class="panel-heading font-bold"> 
      <?php if(trim($__env->yieldContent('edit_id'))): ?> Edit Branch <?php else: ?> Add Branch <?php endif; ?>
    </div>
    <div class="panel-body">
      <?php if(trim($__env->yieldContent('edit_id'))): ?>
        <form role="form" method="post" action="<?php echo e(URL::to('/')); ?>/hr/master/branch/<?php echo $__env->yieldContent('edit_id'); ?>" enctype="multipart/form-data" data-parsley-validate>
      <?php else: ?>
        <form name="" method="POST" action="<?php echo e(URL::to('/')); ?>/hr/master/branch" enctype="multipart/form-data" data-parsley-validate>
      <?php endif; ?>
      <?php echo e(csrf_field()); ?>

      <?php $__env->startSection('edit'); ?>
      <?php echo $__env->yieldSection(); ?>
        <div class="col-md-12">
          <div class="col-md-6">
            <div class="form-group">
              <label>Company Name :</label>
              <select class="form-control chosen-select" name="companyId" id="companyId" required data-parsley-required-message="Please Select Company Name">
                <option value=" ">--Select--</option>
                <?php 
                $table=DB::table('hr_companies')->whereNull('deleted_at')->get();
                 ?>
                <?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $companies): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($companies->id); ?>" <?php if($__env->yieldContent('companyId')==$companies->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($companies->company_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Branch Name :<span style="color: red;">*</span></label>
              <input type="text" name="branch_name" id="branch_name" class="form-control" placeholder="Enter Branch Name"  required data-parsley-required-message="Please Enter Branch Name" value="<?php echo $__env->yieldContent('branch_name'); ?>"> 
              <?php if($errors->has('branch_name')): ?>
                <span class="help-inline" style="color: red;"><?php echo e($errors->first('branch_name')); ?></span>
              <?php endif; ?>
            </div>
          </div>
           <div class="col-md-6">
            <div class="form-group">
              <label>Address Line 1 :</label>
              <textarea name="address1"  id="address1" class="form-control" placeholder="Enter Address 1"   data-parsley-trigger="keyup"><?php echo $__env->yieldContent('address1'); ?></textarea>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group">
              <label>Address Line 2 :</label>
              <textarea name="address2"  id="address2" class="form-control" placeholder="Enter Address 2"    data-parsley-trigger="keyup"><?php echo $__env->yieldContent('address2'); ?></textarea>
            </div> 
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Mobile Number</label>
              <input name="mobileNo"  id="mobileNo" class="form-control" placeholder="Enter Mobile Number" data-parsley-trigger="keyup" value="<?php echo $__env->yieldContent('mobileNo'); ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Email</label>
              <input name="email"  id="email" class="form-control" placeholder="Enter Email" data-parsley-trigger="keyup" value="<?php echo $__env->yieldContent('email'); ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>City :</label>
              <input type="text" name="city"  id="city" class="form-control" placeholder="Enter City"   data-parsley-pattern="/^[a-zA-Z_ ]*$/" data-parsley-trigger="keyup" value="<?php echo $__env->yieldContent('city'); ?>">
            </div>
          </div>
         
          <div class="col-md-6">
            <div class="form-group">
              <label>State :</label>
              <input type="text" name="state"  id="state" class="form-control" placeholder="Enter State"   data-parsley-pattern="/^[a-zA-Z_ ]*$/" data-parsley-trigger="keyup" value="<?php echo $__env->yieldContent('city'); ?>">
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Country :</label>
              <select class="form-control chosen-select" name="country" id="country" >
                <option value=" ">Select</option>
                <?php 
                $table=DB::table('countries')->get();

                 ?> 
                <?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $country): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value="<?php echo e($country->id); ?>" <?php if($__env->yieldContent('country')==$country->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($country->countryName); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
            </div>
          </div>
          
          <div class="col-md-6">
            <div class="form-group">
              <label>Pin No :</label>
              <input type="text" name="pinNo"  id="pinNo" class="form-control" placeholder="Enter Pin no"   data-parsley-maxlength="6" data-parsley-minlength="5" data-parsley-type="integer" data-parsley-trigger="keyup" value="<?php echo $__env->yieldContent('pinNo'); ?>">
            </div>
          </div>
          <div class="col-md-12"></div>
          <div class="col-md-6">
            <div class="form-group text-right "><br>
              <input type="submit" name="submit" value="Submit" class="btn btn-success">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<div class="col-md-12"><br>
  <div class="panel panel-default">
    <div class="panel-heading font-bold">
      View Branch
    </div>
    <div class="panel-body">
      <table class="table table-striped b-t b-light" id="empTable">
        <thead>
          <tr>
            <th>Sl</th>
            <th>Company  Name</th>
            <th>Branch  Name</th>
            <th>Actions</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $companybranch; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$company): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr data-expanded="true">
              <td><?php echo e($key+1); ?> </td>
              <td><?php echo e($company->Names); ?> </td>
              <td><?php echo e($company->branch_name); ?> </td>
              <td>
                <a href="<?php echo e(URL::to('/')); ?>/hr/master/branch/<?php echo e($company->id); ?>/edit"  class="active"><i  style="color: #018001;" class="fa fa-pencil text-success text-active" aria-hidden="true"></i></a>
                <button class="active" style="border: none;" onclick="destroy(<?php echo e($company->id); ?>)"><i  style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></button> 
              </td>
            </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
      </table>
    </div>
  </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">
  function destroy(id)
    {
    swal({
      title: "Delete!!!",
      text: "Are you sure?",
      type: "error",
      showCancelButton: true,
      confirmButtonColor: "#DD6B55", 
      confirmButtonText: "Delete Department!",
      closeOnConfirm: true
      },  
      function (isConfirm) 
      {
        if(isConfirm) 
        {
          $.ajax({
          url: "<?php echo e(URL::to('/')); ?>/hr/master/branch/"+id,
          type: "delete",
          data: {"_token": "<?php echo e(csrf_token()); ?>"},
          success: function (data) 
            {    
              
              window.location.reload(true);
            },
          });
        }
        else
        {
          swal("cancelled","", "error");
        }
      });
    }
</script> 

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>