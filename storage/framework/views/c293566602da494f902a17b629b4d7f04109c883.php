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
<style type="text/css">
  .sticky{
    background: #eaffe4;
    margin: 10px;
    box-shadow: 0px 3px 3px 0px rgba(0, 0, 0, 0.23);
    padding: 5px;
  }
  .bootstrap-select>.dropdown-toggle.bs-placeholder, .bootstrap-select>.dropdown-toggle.bs-placeholder:active, .bootstrap-select>.dropdown-toggle.bs-placeholder:focus, .bootstrap-select>.dropdown-toggle.bs-placeholder:hover {
    color: #000;
    background: #27c24c;
}
</style>
<div class="bg-light lter b-b wrapper-md">

   <h1 class="m-n font-thin h3">View Benefits</h1>
</div>


<?php if(isset($selected)): ?>
<div class="bg-light lter b-b wrapper-md">
<h2 class="m-n font-thin h3">SELECT TCN</h2>
<form action="" method="post">
<?php echo e(csrf_field()); ?>


<button  name="tcn" value="<?php echo e($selected->id); ?>" class="btn btn-success" disabled><?php echo e($selected->tcnType); ?></button>

  <a href="<?php echo e(URL::to('/')); ?>/admin/benefit/view" class="btn btn-dark">BACK</a>
</form>
</div>
<?php else: ?>
<div class="bg-light lter b-b wrapper-md">
<h2 class="m-n font-thin h3">SELECT TCN</h2>
<form action="" method="post">
<?php echo e(csrf_field()); ?>

<?php $__currentLoopData = $tcns; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tcn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<button  name="tcn" value="<?php echo e($tcn->id); ?>" class="btn btn-success"><?php echo e($tcn->tcnType); ?></button>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php if(isset($fetch)): ?>
  <a href="<?php echo e(URL::to('/')); ?>/admin/benefit/view" class="btn btn-dark">BACK</a>
<?php endif; ?>
</form>
</div>
<?php endif; ?>




<?php if(isset($selected)): ?>
<div class="bg-light lter b-b wrapper-md">
<form  action="<?php echo e(URL::to('/')); ?>/admin/benefit/details" method="post">
<?php echo e(csrf_field()); ?>


  <input type="hidden" name="tcnId" value="<?php echo e($tcnid); ?>">
  <input type="hidden" name="type" value="All">

<select class="selectpicker" data-live-search="true" name="date" onchange="fetchtcn()" required>

<?php if(isset($fetch)): ?>
<option value="<?php echo e($datee->year); ?>-<?php echo e($datee->format('m')); ?>" data-tokens="<?php echo e($datee->format('m')); ?>/<?php echo e($datee->format('Y')); ?> <?php echo e($datee->format('Y')); ?> <?php echo e($datee->format('F')); ?>"><?php echo e($datee->format('F')); ?> - <?php echo e($datee->year); ?> </option>
<?php endif; ?>


<?php $__currentLoopData = $bd; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $benefit): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

  <?php  $date = Carbon::create($benefit->year, $benefit->month, 5, 0, 0, 0);   ?> 
  <option value="<?php echo e($date->year); ?>-<?php echo e($date->format('m')); ?>" data-tokens="<?php echo e($date->format('m')); ?>/<?php echo e($date->format('Y')); ?> <?php echo e($date->format('Y')); ?> <?php echo e($date->format('F')); ?>"><?php echo e($date->format('F')); ?> - <?php echo e($date->year); ?> </option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select> 
<button class="btn btn-success" type="submit">Submit</button>
</form>
</div>
<?php endif; ?>


<?php if(isset($fetch)): ?>
<div class="col-lg-6 col-md-6 col-sm-12" style="margin-top: 20px;">
      <div class="panel b-a">
        
        <ul class="list-group">
          <li class="list-group-item">
            <span style="font-size: 20px" > <?php echo e($tcnname); ?> </span>(Generated on )
          </li>
          <li class="list-group-item">
            <i class="icon-check text-success m-r-xs"></i> BENEFIT GENERATED FOR <strong><?php echo e($datee->format('F Y')); ?></strong>
          </li>
          <li class="list-group-item">
            <i class="icon-check text-success m-r-xs"></i> TOTAL NUMBER OF TCN : <?php echo e($count); ?>

          </li>
          
          
          <li class="list-group-item">
            <i class="icon-cloud-download text-success m-r-xs"></i> 
            <a href="<?php echo e(URL::to('/')); ?>/admin/benefit/excel?tcnId=<?php echo e($tcnid); ?>&month=<?php echo e($datee->format('m')); ?>&year=<?php echo e($datee->format('Y')); ?>&type=bankinr">
            <span style="color:green" >DOWNLOAD</span> BANK REPORT (INR : <?php echo e($inr); ?>)
            </a>
          </li>
          

        
          <li class="list-group-item">
            <i class="icon-cloud-download text-success m-r-xs"></i> 
            <a href="<?php echo e(URL::to('/')); ?>/admin/benefit/excel?tcnId=<?php echo e($tcnid); ?>&month=<?php echo e($datee->format('m')); ?>&year=<?php echo e($datee->format('Y')); ?>&type=bankaed">
            <span style="color:green" >DOWNLOAD</span> BANK REPORT (AED : <?php echo e($aed); ?>)
            </a>
          </li>
        

        
          <li class="list-group-item">
            <i class="icon-cloud-download text-success m-r-xs"></i> 
            <a href="<?php echo e(URL::to('/')); ?>/admin/benefit/excel?tcnId=<?php echo e($tcnid); ?>&month=<?php echo e($datee->format('m')); ?>&year=<?php echo e($datee->format('Y')); ?>&type=banksar">
              <span style="color:green" >DOWNLOAD</span> BANK REPORT (SAR : <?php echo e($sar); ?>)
            </a>
          </li>
       

        
          <li class="list-group-item">
            <i class="icon-cloud-download text-success m-r-xs"></i> 
            <a href="<?php echo e(URL::to('/')); ?>/admin/benefit/excel?tcnId=<?php echo e($tcnid); ?>&month=<?php echo e($datee->format('m')); ?>&year=<?php echo e($datee->format('Y')); ?>&type=bankcad">
              <span style="color:green" >DOWNLOAD</span> BANK REPORT (CAD : <?php echo e($cad); ?>)
            </a>
          </li>
          

          
          <li class="list-group-item">
            <i class="icon-cloud-download text-success m-r-xs"></i> 
            <a href="<?php echo e(URL::to('/')); ?>/admin/benefit/excel?tcnId=<?php echo e($tcnid); ?>&month=<?php echo e($datee->format('m')); ?>&year=<?php echo e($datee->format('Y')); ?>&type=bankusd">
              <span style="color:green" >DOWNLOAD</span> BANK REPORT (USD : <?php echo e($usd); ?>)
            </a>
          </li>
        

          <li class="list-group-item">
            <i class="icon-cloud-download text-success m-r-xs"></i>
            <a href="<?php echo e(URL::to('/')); ?>/admin/benefit/excel?tcnId=<?php echo e($tcnid); ?>&month=<?php echo e($datee->format('m')); ?>&year=<?php echo e($datee->format('Y')); ?>&type=benefit">
              <span style="color:green" >DOWNLOAD</span> BENEFIT REPORT
            </a>
          </li>

          <li class="list-group-item">
            <i class="icon-cloud-download text-success m-r-xs"></i> 
            <a href="<?php echo e(URL::to('/')); ?>/admin/benefit/excel?tcnId=<?php echo e($tcnid); ?>&month=<?php echo e($datee->format('m')); ?>&year=<?php echo e($datee->format('Y')); ?>&type=All">
              <span style="color:green" >DOWNLOAD</span> ALL REPORT
            </a>
          </li>

        </ul>
      </div>
    </div>
<?php endif; ?>






<div class="col-md-12"><br></div>
 

<div class="col-md-12">
  <?php if(Session::has('message')): ?>
   <p class="animated fadeInDown " style="color: red"><?php echo e(Session::get('message')); ?></p>
   <?php endif; ?>
</div>


<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">
        var value = $('#scheme').val();
        if(value == '') {
            $('#declare').attr('disabled',true);
        }


</script>

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>