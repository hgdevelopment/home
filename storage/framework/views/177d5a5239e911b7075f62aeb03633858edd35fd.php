<?php $__env->startSection('title','DSA Application'); ?>
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
<div class="bg-light lter b-b wrapper-md">  
  <div style="float: right;"><a href="'/'"><i class="fa fa-home fa-4x" aria-hidden="true"></i></a></div>
  <h1 class="m-n font-thin h3">DSA Request Form</h1>

</div>
<br/><br/>
  <div class="col-sm-12">
      <div class="panel panel-default">
        <div class="panel-heading font-bold">DSA Application Form</div>
        <div class="panel-body">
  <iframe src="<?php echo e(URL::to('/')); ?>/web/dsa/pdf/<?php echo e($id); ?>" width="100%" height="800">
    
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
<?php $__env->stopSection(); ?>
<?php echo $__env->make('web.layout.erp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>