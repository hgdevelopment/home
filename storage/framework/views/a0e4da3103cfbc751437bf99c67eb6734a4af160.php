<?php $__env->startSection('banner'); ?>
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
             <img src="<?php echo e(URL::asset('new_heading.png')); ?>" class="img-responsive">
         </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>
<link href="<?php echo asset('css/sweetalert.css'); ?>" media="all" rel="stylesheet" type="text/css" />
<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">Incentive Master</h1>
</div>

<div class="wrapper-md" ng-controller="FormDemoCtrl">
  <div class="panel panel-default">
    <div class="panel-heading font-bold"><?php if(trim($__env->yieldContent('edit_id'))): ?> Edit Incentive for Employee <?php else: ?> Add Incentive for Employee <?php endif; ?></div>
    <div class="panel-body">
      <div class="row">
        <?php if(trim($__env->yieldContent('edit_id'))): ?>
        <form role="form"   method="post" action="<?php echo e(URL::to('/')); ?>/admin/incentivemaster/<?php echo $__env->yieldContent('edit_id'); ?>" data-parsley-validate  enctype="multipart/form-data">
        <?php else: ?>
        <?php if(Session()->has('message')): ?>
        <div class="alert alert-info fade in alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong>Info!</strong> <?php echo e(Session()->get('message')); ?>

        </div>
        <?php endif; ?>
        <form role="form"  method="post" action="<?php echo e(URL::to('/')); ?>/admin/incentivemaster" data-parsley-validate enctype="multipart/form-data">
         <?php endif; ?>
            
          <?php echo e(csrf_field()); ?>

              <?php $__env->startSection('edit'); ?>
              <?php echo $__env->yieldSection(); ?>
          <div class="col-md-12">
              <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>EMPLOYEE TYPE</label>
                      <select  class="form-control" id="employeeType" value="<?php echo $__env->yieldContent('employeeType'); ?>"  name="employeeType" required data-parsley-required-message="Please Select Employee Type">
                        <option value="">Select</option>
                        <option value="ME" <?php if(strtoupper($__env->yieldContent('employeeType'))=='ME'): ?> <?php echo e('selected'); ?> <?php endif; ?>>ME</option>
                        <option value="DSA" <?php if(strtoupper($__env->yieldContent('employeeType'))=='DSA'): ?> <?php echo e('selected'); ?> <?php endif; ?>>DSA</option>
                        <option value="EMP" <?php if(strtoupper($__env->yieldContent('employeeType'))=='EMP'): ?> <?php echo e('selected'); ?> <?php endif; ?>>EMP</option>
                        <option value="OI" <?php if(strtoupper($__env->yieldContent('employeeType'))=='OI'): ?> <?php echo e('selected'); ?> <?php endif; ?>>OI</option>
                      </select>
                      <?php if($errors->has('employeeType')): ?>
                      <span class="help-inline"><?php echo e($errors->first('employeeType')); ?></span>
                      <?php endif; ?>
                    </div>
                  </div>
                    
                  <div class="col-md-4">
                      <label>SALARY</label>
                       <input name="salary" type="text" id="salary" required data-parsley-required-message="Please Enter Salary" data-parsley-type="number"   data-parsley-maxlength="15"  class="form-control" value="<?php echo $__env->yieldContent('salary'); ?>" placeholder="Amount From" >
                       <?php if($errors->has('salary')): ?>
                      <span class="help-inline"><?php echo e($errors->first('salary')); ?></span>
                      <?php endif; ?>
                  </div>
              
                  <div class="col-md-4">
                      <label>TARGET</label>
                       <input name="target" type="text" id="target" required data-parsley-required-message="Please Enter Target" data-parsley-type="number" data-parsley-maxlength="15" class="form-control" value="<?php echo $__env->yieldContent('target'); ?>" placeholder="Target" >
                       <?php if($errors->has('target')): ?>
                      <span class="help-inline"><?php echo e($errors->first('target')); ?></span>
                      <?php endif; ?>
                  </div>
                 
                <div class="col-md-12"></div>
                  <div class="col-md-4">
                      <label>AMOUNT FROM</label>
                       <input name="fromAmount" type="text" id="fromAmount" required data-parsley-required-message="Please Enter Employee From Amount " data-parsley-type="number"  data-parsley-maxlength="15"  class="form-control" value="<?php echo $__env->yieldContent('fromAmount'); ?>" placeholder="Amount From" >
                       <?php if($errors->has('fromAmount')): ?>
                      <span class="help-inline"><?php echo e($errors->first('fromAmount')); ?></span>
                      <?php endif; ?>
                  </div>
                  <div class="col-md-4">
                      <label>TO AMOUNT</label>
                       <input name="toAmount" type="text" id="toAmount" required data-parsley-required-message="Please Enter Employee To Amount" data-parsley-type="number"  data-parsley-maxlength="15"   class="form-control" value="<?php echo $__env->yieldContent('toAmount'); ?>" placeholder="Amount To" >
                       <?php if($errors->has('toAmount')): ?>
                      <span class="help-inline"><?php echo e($errors->first('toAmount')); ?></span>
                      <?php endif; ?>
                  </div>
                  
                  <div class="col-md-4">
                      <label>INCENTIVE PERCENTAGE</label>
                       <input name="incentivePercentage" type="text" id="incentivePercentage" required data-parsley-required-message="Please Enter Incentive Percentage" data-parsley-type="number"  max="100" class="form-control" value="<?php echo $__env->yieldContent('incentivePercentage'); ?>" placeholder="Incentive Percentage" >
                       <?php if($errors->has('incentivePercentage')): ?>
                      <span class="help-inline"><?php echo e($errors->first('incentivePercentage')); ?></span>
                      <?php endif; ?>
                  </div>
                <div class="col-md-12"></div>
                  <div class="col-md-10"><br>
                    <input type="submit" name="submit"  id="submit" value="Save" class="btn btn-success" >
                  </div> 
              </div>
        </form> 
      </div>
    </div>
  </div>
</div>

 <?php if(trim($__env->yieldContent('edit_id'))): ?>
  <?php else: ?>

    <div class="panel panel-default">
    <div class="panel-heading font-bold">View Incentive Master &nbsp;(EMPLOYEE)</div>
    <div class="panel-body">
      <div class="row">
        <div class="table-responsive" style="padding: 7px;">
        <table class="table" id="emp" style="border:none;">
              <thead>
                <tr>
                  <th>Sl No</th>
                  <th>Employee Type</th>
                  <th>Salary</th>
                  <th>From Amount</th>
                  <th>To Amount</th>
                  <th>Target</th>
                  <th>Incentive Percentage</th>
                  <th>Action</th>
                </tr>
              </thead>
              <?php $sl=1;?>
              <tbody>
                <?php $__currentLoopData = $emp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $emps): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($sl++); ?></td>
                  <td><?php echo e($emps->employeeType); ?></td>
                  <td><?php echo e($emps->salary); ?></td>
                  <td><?php echo e($emps->fromAmount); ?></td>
                  <td><?php echo e($emps->toAmount); ?></td>
                  <td><?php echo e($emps->target); ?></td>
                  <td><?php echo e($emps->incentivePercentage); ?></td>
                  <td>
                    <a id="edit" href="<?php echo e(URL::to('/')); ?>/admin/incentivemaster/<?php echo e($emps->id); ?>/edit"  class="active">
                      <i  style="color: #018001;" class="fa fa-pencil text-success text-active" aria-hidden="true"></i>
                    </a>
                    <form method="post" id="delete_form1"  action="<?php echo e(URL::to('/')); ?>/admin/incentivemaster/<?php echo e($emps->id); ?>" style="float:left; padding-right:10px;">
                      <?php echo e(method_field('DELETE')); ?>

                      <?php echo e(csrf_field()); ?>

                      <input type="hidden" name="_method" value="DELETE">
                      <button id="delete-btn1" type="submit" class="active" style="border: none;">
                      <i style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></button> 
                    </form>
                  </td>
                </tr>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
         </table>
         
          </div>
      </div>
    </div>
      
  </div>
  <div class="panel panel-default">
    <div class="panel-heading font-bold">View Incentive Master &nbsp;(DIRECT SELLING AGENT)</div>
    <div class="panel-body">
      <div class="row">
        <div class="table-responsive" style="padding: 7px;">
        <table class="table" id="dsa" style="border:none;">
               <thead>
                   <tr>
                      <th>Sl No</th>
                      <th>Employee Type</th>
                      <th>Salary</th>
                      <th>From Amount</th>
                      <th>To Amount</th>
                      <th>Target</th>
                      <th>Incentive Percentage</th>
                      <th>Action</th>
                    </tr>
                  
              </thead>
              <?php $sl=1;?>
              <tbody>
                <?php $__currentLoopData = $dsa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dsas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($sl++); ?></td>
                  <td><?php echo e($dsas->employeeType); ?></td>
                  <td><?php echo e($dsas->salary); ?></td>
                  <td><?php echo e($dsas->fromAmount); ?></td>
                  <td><?php echo e($dsas->toAmount); ?></td>
                  <td><?php echo e($dsas->target); ?></td>
                  <td><?php echo e($dsas->incentivePercentage); ?></td>
                  <td>
                    <a href="<?php echo e(URL::to('/')); ?>/admin/incentivemaster/<?php echo e($dsas->id); ?>/edit"  class="active">
                      <i  style="color: #018001;" class="fa fa-pencil text-success text-active" aria-hidden="true"></i>
                    </a>
                    <form method="post" id="delete_form2"  action="<?php echo e(URL::to('/')); ?>/admin/incentivemaster/<?php echo e($dsas->id); ?>" style="float:left; padding-right:10px;">
                      <?php echo e(method_field('DELETE')); ?>

                      <?php echo e(csrf_field()); ?>

                      <input type="hidden" name="_method" value="DELETE">
                      <button id="delete-btn2" type="submit" class="active" style="border: none;">
                      <i style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></button> 
                    </form>
                  </td>
                </tr>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
         </table>
      </div>
    </div>
  </div>
      
  </div>
  <div class="panel panel-default">
    <div class="panel-heading font-bold">View Incentive Master &nbsp;(OFFICE INCHARGE)</div>
    <div class="panel-body">
      <div class="row">
        <div class="table-responsive" style="padding: 7px;">
        <table class="table" id="oi" style="border:none;">
              <thead>
               <tr>
                  <th>Sl No</th>
                  <th>Employee Type</th>
                  <th>Salary</th>
                  <th>From Amount</th>
                  <th>To Amount</th>
                  <th>Target</th>
                  <th>Incentive Percentage</th>
                  <th>Action</th>
                </tr>
                  
              </thead>
              <?php $sl=1;?>
              <tbody>
                <?php $__currentLoopData = $oi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ois): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($sl++); ?></td>
                  <td><?php echo e($ois->employeeType); ?></td>
                  <td><?php echo e($ois->salary); ?></td>
                  <td><?php echo e($ois->fromAmount); ?></td>
                  <td><?php echo e($ois->toAmount); ?></td>
                  <td><?php echo e($ois->target); ?></td>
                  <td><?php echo e($ois->incentivePercentage); ?></td>
                  <td>
                    <a href="<?php echo e(URL::to('/')); ?>/admin/incentivemaster/<?php echo e($ois->id); ?>/edit"  class="active">
                      <i  style="color: #018001;" class="fa fa-pencil text-success text-active" aria-hidden="true"></i>
                    </a>
                    <form method="post" id="delete_form3"  action="<?php echo e(URL::to('/')); ?>/admin/incentivemaster/<?php echo e($ois->id); ?>" style="float:left; padding-right:10px;">
                      <?php echo e(method_field('DELETE')); ?>

                      <?php echo e(csrf_field()); ?>

                      <input type="hidden" name="_method" value="DELETE">
                      <button id="delete-btn3" type="submit" class="active" style="border: none;">
                      <i style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></button> 
                    </form>
                  </td>
             
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
          </table>
          </div>
        </div>
      </div>
    </div>
      <div class="panel panel-default">
    <div class="panel-heading font-bold">View Incentive Master &nbsp;(MARKETTING EXECUTIVE)</div>
    <div class="panel-body">
      <div class="row">
        <div class="table-responsive" style="padding: 7px;">
        <table class="table" id="marketexeTable" style="border:none;">
              <thead>
                   <tr>
                      <th>Sl No</th>
                      <th>Employee Type</th>
                      <th>Salary</th>
                      <th>From Amount</th>
                      <th>To Amount</th>
                      <th>Target</th>
                      <th>Incentive Percentage</th>
                      <th>Action</th>
                    </tr>
                  
              </thead>
              <?php $sl=1;?>
              <tbody>
                <?php $__currentLoopData = $incentivemaster; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $incentivemasters): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><?php echo e($sl++); ?></td>
                  <td><?php echo e($incentivemasters->employeeType); ?></td>
                  <td><?php echo e($incentivemasters->salary); ?></td>
                  <td><?php echo e($incentivemasters->fromAmount); ?></td>
                  <td><?php echo e($incentivemasters->toAmount); ?></td>
                  <td><?php echo e($incentivemasters->target); ?></td>
                  <td><?php echo e($incentivemasters->incentivePercentage); ?></td>
                  <td>
                    <a href="<?php echo e(URL::to('/')); ?>/admin/incentivemaster/<?php echo e($incentivemasters->id); ?>/edit"   class="active">
                      <i  style="color: #018001;" class="fa fa-pencil text-success text-active" aria-hidden="true"></i>
                    </a>
                    <form method="post" id="form4"  action="<?php echo e(URL::to('/')); ?>/admin/incentivemaster/<?php echo e($incentivemasters->id); ?>" style="float:left; padding-right:10px;">
                      <?php echo e(method_field('DELETE')); ?>

                      <?php echo e(csrf_field()); ?>

                      <input type="hidden" name="_method" value="DELETE">
                      <button id="delete-btn4" type="submit" class="active" style="border: none;">
                      <i style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></button> 
                    </form>
                  </td>
                </tr>
                 <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
         
          </div>
      </div>
    </div>
  </div>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script type="text/javascript" src="<?php echo asset('js/sweetalert.min.js'); ?>"></script>
<script type="text/javascript">
$(document).ready(function(){
$('#delete-btn1').on('click', function(e){
        e.preventDefault();
      var self = $(this);
      swal({
                  title: "Are you sure?",
                  text: "All the selected  incentive will be deleted also!",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Yes, delete it!",
                  closeOnConfirm: true
              },
              function(isConfirm){
                  if(isConfirm){
                      swal("Deleted!","Incentive deleted", "success");
                      setTimeout(function() {
                          self.parents("#delete_form1").submit();
                      });
                  }
                  else{
                      swal("cancelled","Your Incentive are safe", "error");
                  }
              });
    });
$('#emp').DataTable();
 });

</script>


<script type="text/javascript">
$(document).ready(function(){
$('#delete-btn2').on('click', function(e){
      e.preventDefault();
      var self = $(this);
      swal({
                  title: "Are you sure?",
                  text: "All the selected incentive  will be deleted also!",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Yes, delete it!",
                  closeOnConfirm: true
              },
              function(isConfirm){
                  if(isConfirm){
                      swal("Deleted!","Incentive   deleted", "success");
                      setTimeout(function() {
                          self.parents("#delete_form2").submit();
                      });
                  }
                  else{
                      swal("cancelled","Your Incentive are safe", "error");
                  }
              });
    });
$('#dsa').DataTable();
});
</script>
<script type="text/javascript">
$(document).ready(function(){
$('#delete-btn3').on('click', function(e){
      e.preventDefault();
      var self = $(this);
      swal({
                  title: "Are you sure?",
                  text: "All the selected incentive  will be deleted also!",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Yes, delete it!",
                  closeOnConfirm: true
              },
              function(isConfirm){
                  if(isConfirm){
                      swal("Deleted!","Incentive  deleted", "success");
                      setTimeout(function() {
                          self.parents("#delete_form3").submit();
                      });
                  }
                  else{
                      swal("cancelled","Your Incentive are safe", "error");
                  }
              });
    });
$('#oi').DataTable();
 });
</script>
<script type="text/javascript">
$(document).ready(function(){
$('#delete-btn4').on('click', function(e){
      e.preventDefault();
      var self = $(this);
      swal({
                  title: "Are you sure?",
                  text: "All the selected incentive  will be deleted also!",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Yes, delete it!",
                  closeOnConfirm: true
              },
              function(isConfirm){
                  if(isConfirm){
                      swal("Deleted!","Incentive  deleted", "success");
                      setTimeout(function() {
                          self.parents("#form4").submit();
                      });
                  }
                  else{
                      swal("cancelled","Your Incentive are safe", "error");
                  }
              });
    });
$('#marketexeTable').DataTable();
 });
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>