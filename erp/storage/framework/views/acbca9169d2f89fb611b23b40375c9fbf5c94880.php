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
  <h1 class="m-n font-normal h3">ADD TCN PHYSICAL BENEFIT LIST</h1>
</div>

<div class="wrapper-md" ng-controller="FormDemoCtrl">

		<div class="panel panel-default">
			<div class="panel-heading font-bold">TCN PHYSICAL BENEFIT LIST</div>
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
				                <td><?php echo e($tcnrequest->name); ?></td>
				                <td><?php echo e($tcnrequest->tcn->tcnType); ?></td>
				                <td><?php echo e($tcnrequest->amount); ?></td>
				                <td><?php echo e(date('d-m-Y',strtotime($tcnrequest->addedDate))); ?></td>
				                <td>

				                <a  href="<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/<?php echo e('view@@@'); ?><?php echo e(encrypt($tcnrequest->tcnId)); ?>"  class="active"><i style="color: #018001;" class="fa fa-search" aria-hidden="true"></i></a>

								<?php if($tcnrequest->status=='Approved'  && $tcnrequest->physicalBenefit=='No' && Controller::UserAccessRights('TCN Add To Physical Benefit')=='1' && $detail->status!='Removed'): ?>
								<a  onclick="physicalBenefit('<?php echo e($tcnrequest->tcnId); ?>')"  class="active"><i style="color: #018001;" class="glyphicon glyphicon-ok" aria-hidden="true"></i></a>
								<?php endif; ?>

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
function physicalBenefit(tcnId)
{
swal({
  title: "Confirm!",
  text: "Are You Sure, You want  to add this TCN to physical benefit list?",
  type: "info",
  showCancelButton: true,
  closeOnConfirm: false,
  confirmButtonColor: "#e76cd4",
  animation: "slide-from-top",
  inputPlaceholder: "Please Enter Remarks"
},
  function (isConfirm) 
  {
    if (isConfirm) 
    {	

		$.ajax({
		     type: "get",
		     url: "<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/create",
		      data: {opcode:31,tcnId:tcnId},
		     success: function (data) {
		  		swal({title:'Done',text:'This TCN is succesfully added to physical benefit list!',type:'success',timer:'3800'},
		  		function () {
		          window.location.reload();
		       	});
		     }
		 	 });
    }
    else
    {
      return ;
    }   
  }); 
}
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>