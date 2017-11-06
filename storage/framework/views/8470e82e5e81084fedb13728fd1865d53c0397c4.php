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
<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-thin h3">View Approved Leave</h1>
</div>
<?php if(Session()->has('message')): ?>
<div class="alert alert-info fade in alert-dismissable">
  <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
  <strong>Info!</strong> <?php echo e(Session()->get('message')); ?>

</div>
<?php endif; ?>
<div class="wrapper-md">
  <div class="row">
    <div class="col-sm-12">
      <div class="blog-post">                   
        <div class="col-md-6 col-md-offset-3">
          <div class="panel panel-info">
            <div class="panel-heading font-bold">VIEW APPROVED LEAVES</div>
             <div class="panel-heading font-bold"><label>Employee Code</label>:<label><b><?php echo e($leaves->user_id); ?></b></label><br><label>Employee Name</label>:<label><b><?php echo e($leaves->name); ?></b></label></div>
              <div class="panel-body">
                <div class="row">
                  <div class="text-center">
                    <a href="#" class="thumb-lg m-r pop1" id="click_img_container">
                    <img  class="img-circle " draggable="true"  src="<?php echo e(URL::asset('storage/img/employee/'.$leaves->photo)); ?>"   style="width:96px;height: 96px;"></a>
                  </div>
                  <div class=" col-sm-12 divTableCell" ><strong >Code</strong><b class="data-lab  lab-2" ><span style="padding-right: 30px;">:</span><?php echo e($leaves->user_id); ?></b></div>
                  <div class=" col-sm-12 divTableCell"><strong >Name</strong><b class="data-lab lab-2" ><span style="padding-right: 30px;">:</span><?php echo e($leaves->name); ?></b></div>
                  <div class=" col-sm-12 divTableCell"><strong >Branch</strong><b class="data-lab lab-2"><span style="padding-right: 30px;">:</span><?php echo e($leaves->branch_name); ?></b></div>
                  <div class=" col-sm-12 divTableCell"><strong >Department</strong><b class="data-lab lab-2"><span style="padding-right: 30px;">:</span><?php echo e($leaves->department_name); ?></b></div>
                  <div class=" col-sm-12 divTableCell"><strong>Designation</strong><b class="data-lab lab-2"><span style="padding-right: 30px;">:</span><?php echo e($leaves->designation_name); ?></b></div>
                  <div class=" col-sm-12 divTableCell"><strong> Applied Date</strong><b class="data-lab lab-2"><span style="padding-right: 30px;">:</span><?php echo e(date('d-m-Y',strtotime($leaves->applied_date))); ?></b></div>
                  <div class=" col-sm-12 divTableCell"><strong>Leave Dates</strong><b class="data-lab lab-2"><span style="padding-right: 30px;">:</span><?php 
                  $data=\DB::table('hr_applied_leaves')->where('leave_id',$leaves->id)->get();
                  foreach($data as $value){
                  echo $value->date.'('.$value->leave_type.')'.',';
                  }
                   ?></b></div>
                  <div class=" col-sm-12 divTableCell"><strong>Reason</strong><b class="data-lab lab-2"><span style="padding-right: 30px;">:</span><?php echo e($leaves->reason); ?></b></div>

                               </div>
              <div class="row">
                <div class="form-group text-center ">
                <div class="col-sm-12"><br></div>
                  <div class="col-sm-12">
                    
                    <button type="button" class="btn btn-danger" id="reject"><a href="<?php echo e(URL::to('/')); ?>/hr/leave/reject/<?php echo e($leaves->id); ?>"  class="active"><i class="fa fa-times" aria-hidden="true"></i>&nbsp;Reject</button>
                    <button type="button" class="btn btn-info " id="cancel"><a href="<?php echo e(URL::to('/')); ?>/hr/leave/cancel/<?php echo e($leaves->id); ?>"  class="active"<i class="fa fa-ban" aria-hidden="true"></i>&nbsp;Cancel</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>  
    </div>
  </div> 
</div>                                     
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">
$(document).ready(function(){
$('#enquirysolveview').DataTable();
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>