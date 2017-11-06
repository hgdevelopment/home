<div class="wrapper-md" >
   <div class="row">
      <div class="col-sm-12">
         <div class="blog-post">
            <div class="col-sm-12">
               <div class="panel-default">
                  <div class="table-responsive" style="overflow-x: initial;" id="tcndetails">
                     <table class="table table-striped b-t">
                        <thead>
                           <div class="panel-heading" >
                              <input type="hidden" name="">
                              <center>Pending TCN</center>
                           </div>
                           <tr>
                              <?php $sl=1;?>
                              <th>Sl No</th>
                              <th>TCN Name</th>
                              <th>Units</th>
                              <th>Amount</th>
                              <th>Currency</th>
                              <th>Received Date</th>
                              <th>View</th>
                           </tr>
                        </thead>
                        <?php $__currentLoopData = $tcn; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tcns): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tbody>
                           <tr>
                              <td><?php echo e($sl++); ?></td>
                              <td><?php echo e($tcns->tcnType); ?></td>
                              <td><?php echo e($tcns->unit); ?></td>
                              <td><?php echo e($tcns->amount); ?></td>
                              <td><?php echo e($tcns->currencyType); ?></td>
                              <td><?php echo e($tcns->addedDate); ?></td>
                              <td><a href="<?php echo e(url('/admin/pending_tcn', $tcns->id)); ?>" class="btn btn-info" >View</a></td>
                           </tr>
                        </tbody>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </table>
                     <br>
                     <table class="table table-striped b-t">
                        <thead>
                           <div class="panel-heading">
                              <center>Active TCN</center>
                           </div>
                           <tr>
                              <?php $sl=1;?>
                              <th>Sl No</th>
                              <th>TCN Name</th>
                              <th>Units</th>
                              <th>Amount</th>
                              <th>Currency	</th>
                              <th>Received Date</th>
                              <th>Approved Date</th>
                              <th>View</th>
                           </tr>
                        </thead>
                        <?php $__currentLoopData = $tcn1; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tcns1): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tbody>
                           <tr>
                              <td><?php echo e($sl++); ?></td>
                              <td><?php echo e($tcns1->tcnType); ?></td>
                              <td><?php echo e($tcns1->unit); ?></td>
                              <td><?php echo e($tcns1->amount); ?></td>
                              <td><?php echo e($tcns1->currencyType); ?></td>
                              <td><?php echo e($tcns1->addedDate); ?></td>
                              <td><?php echo e(date('d-m-Y',strtotime($tcns1->approvalDate))); ?></td>
                              <td><a href="<?php echo e(url('/admin/pending_tcn', $tcns1->id)); ?>" class="btn btn-info" >View</a></td>
                           </tr>
                        </tbody>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </table>
                     <br>
                     <table class="table table-striped b-t">
                        <thead>
                           <div class="panel-heading">
                              <center>Withdrawn TCN</center>
                           </div>
                           <tr>
                               <?php $sl=1;?>
                              <th>Sl No</th>
                              <th>TCN Name</th>
                              <th>Units</th>
                              <th>Amount</th>
                              <th>Currency	</th>
                              <th>Received Date</th>
                             
                           </tr>
                        </thead>
                        <?php $__currentLoopData = $tcn2; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tcns2): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tbody>
                           <tr>
                              <td><?php echo e($sl++); ?></td>
                              <td><?php echo e($tcns2->tcnType); ?></td>
                              <td><?php echo e($tcns2->unit); ?></td>
                              <td><?php echo e($tcns2->amount); ?></td>
                              <td><?php echo e($tcns2->currencyType); ?></td>
                              <td><?php echo e($tcns2->addedDate); ?></td>
                           </tr>
                        </tbody>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </table>
                     <br>
                     <table class="table table-striped b-t">
                        <thead>
                           <div class="panel-heading">
                              <center>Partial Withdrawn TCN</center>
                           </div>
                           <tr>
                               <?php $sl=1;?>
                              <th>Sl No</th>
                              <th>TCN Name</th>
                              <th>Units</th>
                              <th>Amount</th>
                              <th>Currency</th>
                              <th>Applied date</th>
                              <th>Status</th>
                        </tr>
                        </thead>
                        <?php $__currentLoopData = $tcn3; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tcns3): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tbody>
                           <tr>
                              <td><?php echo e($sl++); ?></td>
                              <td><?php echo e($tcns3->tcnType); ?></td>
                              <td><?php echo e($tcns3->unit); ?></td>
                              <td><?php echo e($tcns3->amount); ?></td>
                              <td><?php echo e($tcns3->currencyType); ?></td>
                              <td><?php echo e(date('d-m-Y',strtotime($tcns3->appliedDate))); ?></td>
                              <td><?php echo e($tcns3->status); ?></td>
                           </tr>
                        </tbody>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </table>
                     <br>
                     <table class="table table-striped b-t">
                        <thead>
                           <div class="panel-heading">
                              <center>Transferred TCN</center>
                           </div>
                           <tr>
                               <?php $sl=1;?>
                              <th>Sl No</th>
                              <th>TCN Name</th>
                              <th>Units</th>
                              <th>Amount</th>
                              <th>Currency	</th>
                              <th>Received Date</th>
                              <th>View Details</th>
                           </tr>
                        </thead>
                        <?php $__currentLoopData = $tcn4; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tcns4): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tbody>
                           <tr>
                              <td><?php echo e($sl++); ?></td>
                              <td><?php echo e($tcns4->tcnType); ?></td>
                              <td><?php echo e($tcns4->unit); ?></td>
                              <td><?php echo e($tcns4->amount); ?></td>
                              <td><?php echo e($tcns4->currencyType); ?></td>
                              <td><?php echo e($tcns4->addedDate); ?></td>
                              <td><a href="<?php echo e(url('/admin/pending_tcn', $tcns4->id)); ?>" class="btn btn-info" >View</a></td>
                           </tr>
                        </tbody>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                     </table>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>