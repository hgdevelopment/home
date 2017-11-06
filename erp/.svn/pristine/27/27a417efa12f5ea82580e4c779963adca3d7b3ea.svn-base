<?php if($request->show==1 && $request->userType=='MEM'): ?>
  <label>USER NAME</label>
  <select class="form-control col-md-6 chosen-select" name="userId" id="userId" onchange="getAccess()">
    <?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e($users->id); ?>" <?php if(isset($request->userId) && $request->userId==$users->id): ?><?php echo e('selected'); ?><?php endif; ?>><?php echo e($users->code); ?> - <?php echo e($users->name); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </select>
<?php endif; ?>



<?php if($request->show==1 && $request->userType=='DSA'): ?>
  <label>USER NAME</label>
  <select class="form-control col-md-6 chosen-select" name="userId" id="userId" onchange="getAccess()">
    <?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <option value="<?php echo e($users->id); ?>" <?php if(isset($request->userId) && $request->userId==$users->id): ?><?php echo e('selected'); ?><?php endif; ?>><?php echo e($users->code); ?> - <?php echo e($users->name); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </select>
<?php endif; ?>



<?php if($request->show==2): ?>
        <?php $__currentLoopData = $parent; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parents): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <div class="col-md-12"><div class="row">&nbsp;</div>
            <div class="checkbox text-black">
                  <label class="i-checks">
                    <input type="checkbox" name="check<?php echo e($parents->id); ?>" id="check<?php echo e($parents->id); ?>" class="" onchange="setCheckBox(<?php echo e($parents->id); ?>)"  <?php if(isset($accessIds) && in_array($parents->id,$accessIds)): ?><?php echo e('checked'); ?><?php endif; ?> /><i class="font-bold"></i><?php echo e(strtoupper($parents->menu_name)); ?>

                  </label>
            </div>
          </div>

          <div class="col-md-12" id="Div<?php echo e($parents->id); ?>">  
            <?php $__currentLoopData = $child; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $childs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php if($parents->id==$childs->parent_id): ?>
            <div class="col-md-3 text-black">
            <input type="checkbox" name="check<?php echo e($childs->id); ?>" id="check<?php echo e($childs->id); ?>" <?php if(isset($accessIds) && in_array($childs->id,$accessIds)): ?><?php echo e('checked'); ?><?php endif; ?>  />
             <?php echo e($childs->menu_name); ?>

            </div>
            <?php endif; ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?> 
<?php endif; ?>


