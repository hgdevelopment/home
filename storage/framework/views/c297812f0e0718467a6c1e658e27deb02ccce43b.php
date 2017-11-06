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
            <h1 class="m-n font-thin h3">View Solved Enquiry</h1>
        </div>
          <div class="wrapper-md">
            <div class="row">
              <div class="col-sm-12">
                <div class="blog-post">                   
                  <div class="col-sm-12">
                    <div class="panel panel-default">
    				<div class="panel-heading font-bold">View Solved Enquiry</div>
						<div class="panel-body">
							<div class="row">
								<div class="table-responsive">
								<table class="table" id="enquiryregview" >
							        <thead>
							            <tr>
							             	<th>Sl No</th>
							                <th>Member Code</th>
							                <th>Date</th>
							                <th>Category</th>
							                <th>Mobile</th>
							                <th>Email</th>
							                <th>Solved By</th>
							                <th>Solved Description</th>
							              
							            </tr>
							          <?php $i = 1; ?>
							        </thead>
							        <tbody>
							        	<?php $__currentLoopData = $enquiryreg; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $enquiryregs): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

							        <tr>
							            <td><?php echo e($i++); ?></td>
							            <td><?php echo e($enquiryregs->membercode); ?></td>
							            <td><?php echo e($enquiryregs->date); ?></td>
							            <td><?php echo e($enquiryregs->category_name); ?></td>
							            <td><?php echo e($enquiryregs->mobile); ?></td>
							            <td><?php echo e($enquiryregs->email); ?></td>
							            <td><?php echo e($enquiryregs->solvedby); ?></td>
							            <td><?php echo e($enquiryregs->solveddescription); ?></td>
							             
						         	
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
           <?php $__env->stopSection(); ?>
           <?php $__env->startSection('jquery'); ?>
			<script type="text/javascript">
				$(document).ready(function(){
				$('#enquiryregview').DataTable();
				});
			</script>
           <?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.erp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>