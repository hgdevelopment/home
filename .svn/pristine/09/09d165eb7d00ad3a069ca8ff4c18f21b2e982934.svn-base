<?php $__env->startSection('title','DSA Application'); ?>
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
  <div style="float: right;"><a href="'/'"><i class="fa fa-home fa-4x" aria-hidden="true"></i></a></div>
  <h1 class="m-n font-thin h3">TCN WITHDRAWAL </h1>

</div>
<br/><br/>
  <div class="col-sm-12">
      <div class="panel panel-default">
        <div class="panel-heading font-bold">TCN WITHDRAWAL</div>
        <div class="panel-body">
  <iframe src="<?php echo e(URL::to('/')); ?>/admin/tcnFullWithDrawalPDF/<?php echo e($id); ?>" width="100%" height="800">
    
  </iframe>


          </div>
      </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">
window.history.forward(1);
function noBack(){
window.history.forward();
}
</script>
<?php if(Session::has('sweet_alert.alert')): ?>
    <script>
        swal({
            text: "<?php echo Session::get('sweet_alert.text'); ?>",
            title: "<?php echo Session::get('sweet_alert.title'); ?>",
            timer: <?php echo Session::get('sweet_alert.timer'); ?>,
            type: "<?php echo Session::get('sweet_alert.type'); ?>",
            // showConfirmButton: "!! Session::get('sweet_alert.showConfirmButton') !!}",
            // confirmButtonText: "!! Session::get('sweet_alert.confirmButtonText') !!}",
            // confirmButtonColor: "#AEDEF4",
            // showCancelButton: false,
            // closeOnConfirm: true
<?php  
            Session::Forget('sweet_alert');  ?>
            // more options
        });
    </script>
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>