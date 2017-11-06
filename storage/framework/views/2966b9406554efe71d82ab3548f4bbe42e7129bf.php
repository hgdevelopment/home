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
  <h1 class="m-n font-thin h3">Merge Members</h1>
</div><br>
<form  method="post" id="form" data-parsley-validate action="<?php echo e(URL::to('/')); ?>/admin/merge">
  <?php echo e(csrf_field()); ?>

  <?php if(Session()->has('message')): ?>
    <div class="alert alert-info fade in alert-dismissable">
      <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
      <strong>Info!</strong> <?php echo e(Session()->get('message')); ?>

    </div>
  <?php endif; ?>
  <div class="wrapper-sm">
    <div class="row">
      <div class="col-sm-12">
        <div class="blog-post">                   
          <div class="col-sm-12">
            <div class="panel panel-default">
              <div class="panel-heading ">                  
               Merge Members
              </div>
              <div class="panel-body"> 
                <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" id="token">
                <div class="col-sm-4">
                  <label>Original Member Code</label>
                <input type="text" class="form-control" id="original" name="original" value="<?php echo e(old('original')); ?>">
                <?php if($errors->has('original')): ?>
                  <span class="help-inline"><?php echo e($errors->first('original')); ?></span>
                <?php endif; ?>
                </div>
                 <div class="col-sm-4">
                  <label>Duplicate Member Code</label>
                <input type="text" class="form-control" id="duplicate" name="duplicate" value="<?php echo e(old('duplicate')); ?>">
                <?php if($errors->has('duplicate')): ?>
                  <span class="help-inline"><?php echo e($errors->first('duplicate')); ?></span>
                <?php endif; ?>
                </div>
                <div class="col-sm-4">
                 <label><br><br></label>
                  <input type="submit"  name="submit" id="submit"  value="Check"  class="btn btn-sm btn-success">
                </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
  <?php if(session()->has('data')): ?>
  <?php 
     $data=session()->get('data');
   ?>
<div class="wrapper-sm">

  <div class="row">
    
    <div class="col-sm-6">
     <?php if($data['data']['original']): ?>
     <div class="panel panel-default">
            <div class="panel-heading">
              <div class="clearfix">
                <a href="" class="pull-left thumb-md avatar b-3x m-r">
                  <img style="height: 64px;" src="<?php echo e(URL::asset('/storage/img/member_img/'.$data['data']['original']->photo)); ?>" alt="...">
                </a>
                <div class="clear">
                  <div class="h3 m-t-xs m-b-xs">
                    <?php echo e($data['data']['original']->name); ?>

                    <i class="fa fa-circle text-success pull-right text-xs m-t-sm"></i>
                  </div>
                  <small class="text-muted"><?php echo e($data['data']['original']->code); ?></small>
                </div>
              </div>
            </div>
            <div class="hbox text-center b-b b-light text-sm" style="background: #fff;">          
          <a data-toggle="modal" href="#original_member" class="col padder-v text-muted b-r b-light">
            <i class="icon-wallet block m-b-xs fa-2x"></i>
            <span>TCN 
              <?php if(isset($data['data']['original']->tcnmerge)): ?>
                (<?php echo e($data['data']['original']->tcnmerge->count()); ?>)
              <?php endif; ?>
            </span>
          </a>
          <a href="#original_member_profile" data-toggle="modal" class="col padder-v text-muted b-r b-light">
            <i class="icon-user block m-b-xs fa-2x"></i>
            <span>VIEW PROFILE</span>
          </a>
        </div>
          </div>
      <?php else: ?>
      <div class="alert alert-info fade in alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        <strong>Info!</strong> 
        Not Found Member   
      </div>
      <?php endif; ?>
    </div>
    <div class="col-sm-6">
     <?php if($data['data']['duplicate']): ?>
     <div class="panel panel-default">
            <div class="panel-heading">
              <div class="clearfix">
                <a href="" class="pull-left thumb-md avatar b-3x m-r">
                  <img style="height: 64px;" src="<?php echo e(URL::asset('/storage/img/member_img/'.$data['data']['duplicate']->photo)); ?>" alt="...">
                </a>
                <div class="clear">
                  <div class="h3 m-t-xs m-b-xs">
                    <?php echo e($data['data']['duplicate']->name); ?>

                    <i class="fa fa-circle text-success pull-right text-xs m-t-sm"></i>
                  </div>
                  <small class="text-muted"><?php echo e($data['data']['duplicate']->code); ?></small>
                </div>
              </div>
            </div>
            <div class="hbox text-center b-b b-light text-sm" style="background: #fff;">          
          <a data-toggle="modal" href="#duplicate_member" class="col padder-v text-muted b-r b-light">
            <i class="icon-wallet block m-b-xs fa-2x"></i>
            <span>TCN 
              <?php if(isset($data['data']['duplicate']->tcnmerge)): ?>
                (<?php echo e($data['data']['duplicate']->tcnmerge->count()); ?>)
              <?php endif; ?>
            </span>
          </a>
          <a href="#duplicate_member_profile" data-toggle="modal" class="col padder-v text-muted">
            <i class="icon-user block m-b-xs fa-2x"></i>
            <span>VIEW PROFILE</span>
          </a>
        </div>
          </div>
    <?php else: ?>
      <div class="alert alert-info fade in alert-dismissable">
        <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
        <strong>Info!</strong> 
        Not Found Member   
      </div>
    <?php endif; ?>

    </div>
    <div class="col-sm-4 col-sm-offset-4">
      <form id="mergeupdate" action="<?php echo e(URL::to('/')); ?>/admin/merge/<?php echo e($data['data']['original']->userId); ?>" data-duplicate="<?php echo e($data['data']['duplicate']->userId); ?>" data-original="<?php echo e($data['data']['original']->userId); ?>" method="post" accept-charset="utf-8">
      <button type="submit" class="btn btn-success btn-lg btn-block" 
     <?php if(!$data['data']['original']): ?>
     <?php echo e('disabled=true'); ?>

     <?php elseif(!$data['data']['duplicate']): ?>
     <?php echo e('disabled=true'); ?>

     <?php elseif($data['data']['duplicate']->tcnmerge->count()==0): ?>
     <?php echo e('disabled'); ?>

     <?php endif; ?>
      ><i class="fa fa-chain pull-right"></i> Merge Member</button>
      </form>
    </div>
  </div>

  </div>
  <?php endif; ?>
</div>



<!-- Modal original -->
<div id="original_member" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">TCN <?php if(isset($data['data']['original']->tcnmerge)): ?>
                (<?php echo e($data['data']['original']->tcnmerge->count()); ?>) - <?php echo e($data['data']['original']->code); ?>

              <?php endif; ?></h4>
      </div>
      <?php if(isset($data['data']['original']->tcnmerge)): ?>
      <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>TCN Code</th>
        <th>TCN</th>
        <th>Unit</th>
        <th>Amount</th>
        <th>Currency Type</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $data['data']['original']->tcnmerge; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($key+1); ?></td>
        <td><?php echo e($element->tcnCode); ?></td>
        <td><?php echo e($element->tcn->tcnType); ?></td>
        <td><?php echo e($element->unit); ?></td>
        <td><?php echo e($element->amount); ?></td>
        <td><?php echo e($element->currencyType); ?></td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
      <?php endif; ?>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- End Modal original -->

<!-- Modal duplicate -->
<div id="duplicate_member" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">TCN <?php if(isset($data['data']['duplicate']->tcnmerge)): ?>
                (<?php echo e($data['data']['duplicate']->tcnmerge->count()); ?>) - <?php echo e($data['data']['duplicate']->code); ?>

              <?php endif; ?></h4>
      </div>
      <?php if(isset($data['data']['duplicate']->tcnmerge)): ?>
      <table class="table">
    <thead>
      <tr>
        <th>#</th>
        <th>TCN Code</th>
        <th>TCN</th>
        <th>Unit</th>
        <th>Amount</th>
        <th>Currency Type</th>
      </tr>
    </thead>
    <tbody>
      <?php $__currentLoopData = $data['data']['duplicate']->tcnmerge; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <tr>
        <td><?php echo e($key+1); ?></td>
        <td><?php echo e($element->tcnCode); ?></td>
        <td><?php echo e($element->tcn->tcnType); ?></td>
        <td><?php echo e($element->unit); ?></td>
        <td><?php echo e($element->amount); ?></td>
        <td><?php echo e($element->currencyType); ?></td>
      </tr>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
  </table>
      <?php endif; ?>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- End Modal duplicate -->

<!-- Modal duplicate -->
<div id="original_member_profile" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title"><?php if(isset($data['data']['original'])): ?> <?php echo e($data['data']['original']->name); ?> - <?php echo e($data['data']['original']->code); ?>

              <?php endif; ?></h4>
      </div>
       <?php if(isset($data['data']['original'])): ?>

      <table class="table">
    <tbody>
      <tr>
        
        <td>Father's Name/Husband's Name</td>
        <th><?php echo e($data['data']['original']->guardian); ?></th>
      </tr>
      <tr>
        <td>Gender</td>
        <th><?php echo e($data['data']['original']->gender); ?></th>
        <td>Date of Birth</td>
        <th><?php echo e($data['data']['original']->dob); ?></th>
      </tr>
      <tr>
        <td>Religion</td>
        <th><?php echo e($data['data']['original']->religion); ?></th>
        <td>Caste</td>
        <th><?php echo e($data['data']['original']->caste); ?></th>
      </tr>
      <tr>
        <td>Education</td>
        <th><?php echo e($data['data']['original']->education); ?></th>
        <td>Occupation</td>
        <th><?php echo e($data['data']['original']->occupation); ?></th>
      </tr>
      <tr>
        <td>Country</td>
        <th><?php echo e($data['data']['original']->country->countryName); ?></th>
        <td>Mobile No</td>
        <th><?php echo e($data['data']['original']->mobileId); ?> <?php echo e($data['data']['original']->mobileNo); ?></th>
      </tr>
      <tr>
        <td>Email</td>
        <th><?php echo e($data['data']['original']->email); ?></th>
        <td>Marital Status</td>
        <th><?php echo e($data['data']['original']->maritalStatus); ?></th>
      </tr>
    </tbody>
  </table>
   <?php endif; ?>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- End Modal duplicate -->

<!-- Modal duplicate -->
<div id="duplicate_member_profile" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">  <?php if(isset($data['data']['duplicate'])): ?> <?php echo e($data['data']['duplicate']->name); ?> - <?php echo e($data['data']['duplicate']->code); ?>

              <?php endif; ?></h4>
      </div>
       <?php if(isset($data['data']['duplicate'])): ?>
      <table class="table">
    <tbody>
      <tr>
        <td>Father's Name/Husband's Name</td>
        <th><?php echo e($data['data']['duplicate']->guardian); ?></th>
        <td>Gender</td>
        <th><?php echo e($data['data']['duplicate']->gender); ?></th>
      </tr>
      <tr>
        <td>Date of Birth</td>
        <th><?php echo e($data['data']['duplicate']->dob); ?></th>
        <td>Religion</td>
        <th><?php echo e($data['data']['duplicate']->religion); ?></th>
      </tr>
      <tr>
        <td>Caste</td>
        <th><?php echo e($data['data']['duplicate']->caste); ?></th>
        <td>Education</td>
        <th><?php echo e($data['data']['duplicate']->education); ?></th>
      </tr>
      <tr>
        <td>Occupation</td>
        <th><?php echo e($data['data']['duplicate']->occupation); ?></th>
        <td>Country</td>
        <th><?php echo e($data['data']['duplicate']->country->countryName); ?></th>
      </tr>
      <tr>
        <td>Mobile No</td>
        <th><?php echo e($data['data']['duplicate']->mobileId); ?> <?php echo e($data['data']['duplicate']->mobileNo); ?></th>
        <td>Email</td>
        <th><?php echo e($data['data']['duplicate']->email); ?></th>
      </tr>
      <tr>
        <td>Marital Status</td>
        <th><?php echo e($data['data']['duplicate']->maritalStatus); ?></th>
        <td></td>
        <th></th>
      </tr>
    </tbody>
  </table>
  <?php endif; ?>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
<!-- End Modal duplicate -->


   <?php $__env->stopSection(); ?>
   <?php $__env->startSection('jquery'); ?>
   <script>
    $(function () {
      $('#mergeupdate').submit(function(e){
        e.preventDefault();
        $.post($(this).attr('action'),{
          _method:'PUT',
          _token:'<?php echo e(csrf_token()); ?>',
          original:$(this).attr('data-original'),
          duplicate:$(this).attr('data-duplicate')
        },function(o){
          if(o.result){
            swal("Good job!", o.message, "success");
          }else{
            swal("Warning!", o.message, "danger");
          }

        },'json');
        
      })
    })
   </script>
   <?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>