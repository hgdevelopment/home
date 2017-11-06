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
<link rel="stylesheet" href="<?php echo e(URL::asset('js/multiselect_datepicker/datepicker.min.css')); ?>" type="text/css" />
<style>
  .datepicker > div {
    display: block;
  }
</style>
  <div class="bg-light lter b-b wrapper-md">
    <h1 class="m-n font-thin h3">Holiday Master</h1>
  </div>
<div class="col-md-12"><br>
  <div class="panel panel-default">

      <div class="panel-heading font-bold"> Add Holiday </div>

    <div class="panel-body">
     
        <form name="" method="POST" action="<?php echo e(URL::to('/')); ?>/hr/master/holidaymaster" enctype="multipart/form-data" data-parsley-validate>

      <?php if(Session()->has('message')): ?>
        <div class="alert alert-info fade in alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong>Info!</strong> <?php echo e(Session()->get('message')); ?>

        </div>
        <?php endif; ?>
      <?php echo e(csrf_field()); ?>

      <?php $__env->startSection('edit'); ?>
      <?php echo $__env->yieldSection(); ?>
        <div class="col-md-12">
         
          <div class="col-md-6">
            <div class="form-group">
              <label>Holiday Name :<span style="color: red;">*</span></label>
              <input type="text" name="holiday_name"  id="holiday_name" class="form-control" placeholder="Enter Holiday Name"  required data-parsley-required-message="Please Enter Holiday Name" data-parsley-pattern="^[a-zA-Z0-9_ ]*$"> 
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
                <label>Leave Dates:</label>
                 <input type="text" class="form-control datepicker-here" name='holiday_leave' data-language='en' data-multiple-dates="30" data-multiple-dates-separator=", " data-position='top left' data-parsley-required-message="Please Select Holidays"   required />
            </div>
          </div>
         <div class="col-md-12"></div>
          <div class="col-sm-6">
            <div class="form-group">
                <label>Type:</label>
                  <select class="form-control chosen-select" name="holiday_type" id="holiday_type" required data-parsley-required-message="Please Select Holiday Type" placeholder="Please Select Holiday Type" >
                    <option value="">Select</option>
                    <option value="Common">Common</option>
                    <option value="Special">Special</option>                 
                  </select>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group" id="rid">
                <label>Religion:</label>
                  <select type="text" name="religion" id="religion"  class="form-control"  data-parsley-required-message="Please Select Religion" placeholder="Religion" required >
                  <?php 
                  $religion=\DB::table('hr_religions')->whereNull('deleted_at')->get();
                   ?>
                    <option value="">Select</option>
                    <?php $__currentLoopData = $religion; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $data): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($data->id); ?>" ><?php echo e($data->religion_name); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </select>
            </div>
          </div>
          <div class="col-md-12"></div>
          <div class="col-md-6">
            <div class="form-group"><br>
              <input type="submit" name="submit" value="Submit" class="btn btn-success">
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
  <?php if($count>0): ?>
  <div class="row">
      <div class="col-sm-12">
        <div class="blog-post">                   
          <div class="col-sm-12">
            <div class="panel panel-default">
              <div class="panel-heading font-bold">View Holiday Master</div>
                <div class="panel-body">
                  <div class="row">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"  id="view">
                        <thead>
                          <tr>
                            <th>Sl No</th>
                            <th>Holiday Name</th>
                            <th>Holiday Date</th>
                            <th>Holiday Type</th>
                            <th>Action</th>           
                          </tr>
                        <?php  $i = 1;  ?>
                        </thead>
                        <tbody>
                        <?php $__currentLoopData = $leave; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $leaves): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                          <tr>
                            <td><?php echo e($i++); ?></td>
                            <td><?php echo e($leaves->holiday_name); ?></td>
                            <td><?php echo e(date('d-m-Y',strtotime($leaves->holiday_date))); ?></td>
                            <td>
                            <?php if($leaves->holiday_type=="Special"): ?>
                            <?php echo e($leaves->holiday_type.'('.$leaves->religion_name .')'); ?>

                            <?php else: ?>  
                            <?php echo e($leaves->holiday_type); ?><?php endif; ?>
                            </td>
                            <td>
                            <form method="post" id="delete_form"  action="<?php echo e(URL::to('/')); ?>/hr/master/holidaymaster/<?php echo e($leaves->id); ?>" style="float:left; padding-right:10px;">
                              <?php echo e(method_field('DELETE')); ?>

                              <?php echo e(csrf_field()); ?>

                              <input type="hidden" name="_method" value="DELETE">
                              <button id="delete-btn" type="submit" class="active" style="border: none;">
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
          </div>
        </div>
      </div>  
    </div> 
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script src="<?php echo e(URL::asset('js/multiselect_datepicker/datepicker.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/i18n/datepicker.en.js')); ?>"></script>
<script type="text/javascript">
$(document).ready(function(){
$('#view').DataTable();
});
</script>
<script type="text/javascript">
  $(document).ready(function()
  {
  $("#rid").attr('required',false).hide();
    $('#holiday_type').on('change', function() 
    {
      if ( this.value == 'Special')
      {

        $('#religion').attr('required',true);
        $("#rid").show();     
        }
      if ( this.value == 'Common')
      {
        $('#religion').attr('required',false);
        $("#rid").hide();     
      }
    });
  });
</script>

<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>