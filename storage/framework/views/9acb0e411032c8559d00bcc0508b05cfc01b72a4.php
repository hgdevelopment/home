<?php 
              $data_img=array('01','02','03','04','05','06','07','08','08','10','11');
              $data_value=array_rand($data_img);
              $data_img=$data_img[$data_value];
 ?>
<style type="text/css" media="screen">
  .divTableCell{
        text-transform: initial;
        font-size: 14px;
  }
  .data-lab {
    margin-right: 15px;
}

</style>
<div style="background:url(<?php echo e(URL::to('/')); ?>/img/profile_slider/<?php echo e($data_img); ?>.jpg) center center; background-size:cover;
     ">
      <div class="wrapper-lg bg-white-opacity">
        <div class="row m-t">
          <div class="col-sm-7">
            
            <a href="" class="thumb-lg pull-left m-r">
              <div class="img-circle" style="background-image: url(<?php echo e(URL::asset('/storage/img/employee/'.$data[0]->photo)); ?>);    
                     width: 96px; 
                     height: 96px; 
                     background-size: cover;
                     border: 3px solid #fff;
                     box-shadow: 0px 0px 10px 2px #a9a9a9;
                     "></div>
              
            </a>
            <div class="clear m-b">
              <div class="m-b m-t-sm">
                <span class="h3 text-black"><?php echo e($data[0]->name); ?></span>
                
              </div>
              <a href="#" class="btn btn-sm btn-success btn-rounded"><?php echo e($data[0]->code); ?></a>
              <a href="#" class="btn btn-sm btn-info btn-rounded"><?php echo e($data[0]->designation_name); ?></a>
              
              
            </div>
          </div>
          <div class="col-sm-5">
            <div class="pull-right pull-none-xs text-center">
              <a href="" class="m-b-md inline m">
                <span class="h3 block font-bold"><?php echo e($data[0]->branch_name); ?></span>
                <small>Branch</small>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="wrapper bg-white b-b">
      <ul class="nav nav-pills nav-sm">
        <?php $url = explode("/", Request::url()); ?>
        <li <?php echo e((in_array('view', $url)) ? 'class=active' : ''); ?>><a href="<?php echo e(URL::to('/')); ?>/hr/employee/view/<?php echo e($id); ?>">Personal Info</a></li>
        <li <?php echo e((in_array('qualification', $url)) ? 'class=active' : ''); ?>><a href="<?php echo e(URL::to('/')); ?>/hr/employee/qualification/<?php echo e($id); ?>">Qualification</a></li>
        <li <?php echo e((in_array('certificate', $url)) ? 'class=active' : ''); ?>><a href="<?php echo e(URL::to('/')); ?>/hr/employee/certificate/<?php echo e($id); ?>">Certificate</a></li>
        <li <?php echo e((in_array('family', $url)) ? 'class=active' : ''); ?>><a href="<?php echo e(URL::to('/')); ?>/hr/employee/family/<?php echo e($id); ?>">Family</a></li>
        <li <?php echo e((in_array('experience', $url)) ? 'class=active' : ''); ?>><a href="<?php echo e(URL::to('/')); ?>/hr/employee/experience/<?php echo e($id); ?>">Experience</a></li>
        <li <?php echo e((in_array('reference', $url)) ? 'class=active' : ''); ?>><a href="<?php echo e(URL::to('/')); ?>/hr/employee/reference/<?php echo e($id); ?>">References</a></li>
      </ul>
    </div>