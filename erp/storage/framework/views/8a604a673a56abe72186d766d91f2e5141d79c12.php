<?php $__env->startSection('banner'); ?>
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
<img src="<?php echo e(URL::to('/')); ?>/new_heading.png" class="img-responsive">
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('web.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('web.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>


<div class="bg-light lter b-b wrapper-md">
<h1 class="m-n font-normal h3">TCN Request</h1>
</div>

<div class="wrapper-md" id="wrapper-md" ng-controller="FormDemoCtrl">



		<div class="panel panel-default">
			<div class="panel-heading font-bold">TCN REQUEST<a href="<?php echo e(URL::to('/')); ?>/web/tcnRequest" class="btn btn-info btn-sm full-right" style="float: right;">REQUEST FORM</a></div>
			<div class="panel-body">
				<div class="col-sm-12">
					<div class="row">
				      <table class="table table-bordered" id="users-table">
				        <thead>
				            <tr>
				                <th>MEMBER CODE</th>
                                <th>TCN CODE</th>
				                <th>MEMBER NAME</th>
				                <th>TCN TYPE</th>
				                <th>AMOUNT</th>
				                <th>APPLIED DATE</th>
				                <th>ACTION</th>
				            </tr>
				        </thead>
				    </table>
					</div>
				</div> 
			</div>
		</div> 
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">

  var t=$('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '<?php echo e(URL::to('/')); ?>/web/tcn_request_listDataTable',

        columns: [
            { data: 'code', name: 'code' },
            { data: 'tcnCode', name: 'tcnCode' },
            { data: 'name', name: 'name' },
            { data: 'tcn_type', name: 'tcn_type' },
            { data: 'amount', name: 'amount' },
            { data: 'addedDate', name: 'addedDate' },
            { data: 'action', name: 'action' },
        ]
    });


  function RequestResponse(id,status)
  {
        $.ajax({
            url: "<?php echo e(URL::to('web/tcnRequest/create')); ?>",
            type: "get",
            data: {opcode:3,id:id,status:status},
            success: function (data) {
                location.reload();                 
            },
        });
  }
</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('web.layout.erp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>