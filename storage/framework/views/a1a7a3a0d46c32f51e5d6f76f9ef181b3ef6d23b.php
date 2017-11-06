<?php $__env->startSection('banner'); ?>
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
            <img src="<?php echo e(URL::to('/')); ?>/new_heading.png" class="img-responsive">
         </div>
<?php $__env->stopSection(); ?>


<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
 <?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php  
use \App\Http\Controllers\Controller;
 ?>

<?php $__env->startSection('body'); ?>

<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-normal h3">TCN DOCUMENT VERIFICATION</h1>
</div>
<div class="wrapper bg-white b-b">
      <ul class="nav nav-pills nav-sm">
      	<?php if(Controller::UserAccessRights('TCN Request')): ?>
        <li><a href="<?php echo e(URL::to('/')); ?>/admin/tcnRequest">Request</a></li>
        <?php endif; ?>

      	<?php if(Controller::UserAccessRights('TCN Application Form')): ?>
        <li><a href="<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm">Application Form</a></li>
        <?php endif; ?>

      	<?php if(Controller::UserAccessRights('TCN Document Verification')): ?>
        <li class="active"><a href="<?php echo e(URL::to('/')); ?>/admin/tcnApprove/Document">Document Verification</a></li>
        <?php endif; ?>

      	<?php if(Controller::UserAccessRights('TCN Payment Verification')): ?>
        <li><a href="<?php echo e(URL::to('/')); ?>/admin/tcnApprove/Payment">Payment Verification</a></li>
        <?php endif; ?>

      	<?php if(Controller::UserAccessRights('TCN Add To Physical Benefit')): ?>
        <li><a href="<?php echo e(URL::to('/')); ?>/admin/tcnApprove/TCNPhysicalBenefitList">Add Physical Benefit</a></li>
        <?php endif; ?>

      	<?php if(Controller::UserAccessRights('TCN Payment Edit')): ?>
        <li><a href="<?php echo e(URL::to('/')); ?>/admin/tcnApprove/TCNPaymentEdit">Payment Edit</a></li>
        <?php endif; ?>

      </ul>
</div>
<div class="wrapper-md" ng-controller="FormDemoCtrl">

		<div class="panel panel-default">
			<div class="panel-heading font-bold">TCN DOCUMENTS VERIFICATION</div>
			<div class="panel-body">
				<div class="col-sm-12">
					<div class="row table-responsive" >
					
				      <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" cellpadding="0" width="100%" id="table"  >
				        <thead>
				            <tr>
				            	<th>S NO</th>
				                <th>MEMBER CODE</th>
                                <th>TCN CODE</th>
				                <th>MEMBER NAME</th>
				                <th>TCN</th>
				                <th>AMOUNT</th>
				                <th>APPLIED DATE</th>
				                <th>ACTION</th>
				            </tr>
				        </thead>
				        <tbody>
				        	<?php if($count>0): ?>
				        	<?php $i=1;?>
				        	<?php $__currentLoopData = $tcnrequest; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $tcnrequest): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
				        		<tr>
				        		<td><?php echo e($i++); ?></td>	
				                <td><?php echo e($tcnrequest->code); ?></td>
                                <td><?php echo e($tcnrequest->tcnCode); ?></td>
				                <td><?php echo e($tcnrequest->name); ?><?php echo e(Controller::UserAccessRights('TCN Document Verification')); ?></td>
				                <td><?php echo e($tcnrequest->tcn->tcnType); ?></td>
				                <td><?php echo e($tcnrequest->amount); ?></td>
				                <td><?php echo e(date('d-m-Y',strtotime($tcnrequest->addedDate))); ?></td>
				                <td>

									<div class="btn-group dropdown">
								      <button class="btn btn-default btn-sm" data-toggle="dropdown">Action <span class="caret"></span></button>
								      <ul class="dropdown-menu dropdown-menu-right" >
								        <li>
									        <a href="<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/<?php echo e('view@@@'); ?><?php echo e($tcnrequest->tcnId); ?>">View
											</a>
										</li>

										<?php if(Controller::UserAccessRights('TCN Print')): ?>
								        <li>
									        <a href="<?php echo e(URL::to('/')); ?>/admin/tcnviewprint/<?php echo e($tcnrequest->tcnId); ?>" >Print
											</a>
										</li>
										<?php endif; ?>

								      <?php if($tcnrequest->docVerified=='Pending' && $tcnrequest->status=='Pending' && Controller::UserAccessRights('TCN Document Verification')=='1' && $tcnrequest->status!='Removed'): ?>
									        <li>
										        <a href="<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/<?php echo e($tcnrequest->tcnId); ?>">Document Verification
												</a>
											</li>
									  <?php endif; ?>

								      <?php if($tcnrequest->paymentReceived=='Pending' && $tcnrequest->docVerified!='Pending'  && $tcnrequest->status=='Pending' && Controller::UserAccessRights('TCN Payment Verification')=='1' && $tcnrequest->status!='Removed'): ?> 
								        <li>
									        <a href="<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/<?php echo e($tcnrequest->tcnId); ?>">Payment Verification
											</a>
										</li>
									  <?php endif; ?>

								      <?php if($tcnrequest->status=='Denied' && Controller::UserAccessRights('TCN Reapproval')=='1'): ?>
								        <li>
									        <a href="<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/<?php echo e($tcnrequest->tcnId); ?>">Reapproval
											</a>
										</li>
									  <?php endif; ?>	

										<?php if(Controller::UserAccessRights('TCN Application Edit')=='1' && $tcnrequest->status!='Removed' && $tcnrequest->status!='Transferred'): ?>
										<li>
										<a href="<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/<?php echo e($tcnrequest->tcnId); ?>/edit">Edit
										</a>
										</li>
										<?php endif; ?>

										<?php if($tcnrequest->status=='Approved'  && $tcnrequest->physicalBenefit=='No' && Controller::UserAccessRights('TCN Add To Physical Benefit')=='1' && $tcnrequest->status!='Removed'): ?>
										<li>
										<a onclick="physicalBenefit('<?php echo e($tcnrequest->tcnId); ?>')">Add to Physical Benefit
										</a>
										</li>
										<?php endif; ?>

										<?php if(Controller::UserAccessRights('TCN Remove')=='1' && $tcnrequest->status!='Removed' && $tcnrequest->status!='Transferred'): ?>
										<li>
										<a onclick="removeTCN('<?php echo e($tcnrequest->tcnId); ?>')">Remove
										</a>
										</li>
										<?php endif; ?>

								      </ul>
									</div>
				                </td>
				                </tr>
				        	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				        	<?php endif; ?>
				        </tbody>
				    </table>
				    
					</div>
				</div> 
			</div>
		</div> 
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jquery'); ?>



<script type="text/javascript">

     		$('#table').dataTable();
     		function removeTCN(tcnId)
{
swal({
  title: "Remove!",
  text: "Are You Sure, You want  to remove this TCN",
  type: "input",
  showCancelButton: true,
  closeOnConfirm: false,
  confirmButtonColor: "#e76cd4",
  animation: "slide-from-top",
  inputPlaceholder: "Please Enter Remarks"
},
function(inputValue){
  if (inputValue === false) return false;
  
  if (inputValue === "") {
    swal.showInputError("You need to write remarks!");
    return false;
  }

  $.ajax({
    type: "get",
     url: "<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/create",
    data: {opcode:32,remarks:inputValue,tcnId:tcnId},
    success: function (data)
    {
  		swal({title:'Done',text:'The Request is succesfully Removed!',type:'success',timer:'3800'},
  		function () {
          window.location.reload();
       	});
	},
  		});   
});
}
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>