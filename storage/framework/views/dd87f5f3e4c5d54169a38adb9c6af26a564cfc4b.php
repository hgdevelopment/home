<div class="panel panel-default">
  <div class="table-responsive" style="overflow-x: initial;padding: 7px;">
    <table class="table table-striped b-t" id="dsaRequest">
      <thead>
        <div class="panel-heading">
          Member Details 
        </div>
        <tr>
          <th>Sl No</th>
          <th>Name</th>
          <th>IBG No</th>
          <th>MobileNumber</th>
          <th>Email Id</th>
          <th>Status</th>
        </tr>
      </thead>
      <tbody>
        <input type="hidden" name="dsaId" id="dsaId" value="<?php echo e($dsaCode); ?>">
          <?php $__currentLoopData = $memberDetails; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $memberDetailses): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if($key==0): ?>
          <?php endif; ?> 
          <tr>
            <!-- <td><?php echo e($memberDetails); ?></td> -->
           <td><?php echo e($key+1); ?></td>
           <td><?php echo e($memberDetailses->name); ?></td>
           <td><?php echo e($memberDetailses->code); ?></td>
           <td><?php echo e($memberDetailses->mobileNo); ?></td>
           <td><?php echo e($memberDetailses->email); ?></td>
           <td><?php echo e($memberDetailses->status); ?></td>
          </tr>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
      </tbody>
    </table>
  </div>
</div>