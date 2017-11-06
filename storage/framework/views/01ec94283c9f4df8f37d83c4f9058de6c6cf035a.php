<?php $__env->startSection('banner'); ?>
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
           <img src="<?php echo e(URL::asset('new_heading.png')); ?>" class="img-responsive">
         </div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

		<div class="bg-light lter b-b wrapper-md">
            <h1 class="m-n font-thin h3">View Denied Partial Withdrawal Request</h1>
        </div>
          <div class="wrapper-md">
            <div class="row">
              <div class="col-sm-12">
                <div class="blog-post">                   
                  <div class="col-sm-12">
                    <div class="panel panel-default">
    				<div class="panel-heading font-bold">Denied Partial Withdrawal </div>
						<div class="panel-body">
							<div class="row">
								<div class="table-responsive">
								<table class="table" id="view">
							        <thead>
							            <tr>
							             	<th>Sl No</th>
							                <th>User Id</th>
							                <th>TCN Id</th>
							                <th>Unit</th>
							                <th>Amount</th>
							                <th>Applied Date</th>
							  
							            </tr>
							          <?php $i = 1; ?>
							        </thead>
							        <tbody>
							        	<?php $__currentLoopData = $deny; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $denied): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							        <tr>
							            <td><?php echo e($i++); ?></td>
							            <td><?php echo e($denied->name); ?></td>
							            <td><?php echo e($denied->tcnType); ?></td>
							            <td><?php echo e($denied->unit); ?></td>
							            <td><?php echo e($denied->amount); ?></td>
							            <td><?php echo e($denied->appliedDate); ?></td>
							          
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
              </div>                                      
           <?php $__env->stopSection(); ?>
           <?php $__env->startSection('jquery'); ?>
          <script type="text/javascript">
				$(document).ready(function(){
				$('#view').DataTable();
				});
			</script>
           <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.erp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>