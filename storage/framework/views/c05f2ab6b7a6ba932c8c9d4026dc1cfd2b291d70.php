<?php $__env->startSection('banner'); ?>
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
<img src="<?php echo e(URL::to('/')); ?>/new_heading.png" class="img-responsive">
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

<div class="bg-light lter b-b wrapper-md">
<h1 class="m-n font-normal h3">TCN FULL WITHDRAWAL REQUEST</h1>
</div>
<div class="wrapper bg-white b-b">
      <ul class="nav nav-pills nav-sm">
        <li class="active"><a href="<?php echo e(URL::to('/')); ?>/admin/tcnFullWithDrawal">Request</a></li>
        <li><a href="<?php echo e(URL::to('/')); ?>/admin/tcnFullWithDrawal/List">List</a></li>
        <li><a href="<?php echo e(URL::to('/')); ?>/admin/tcnFullWithDrawal/Applied">Applied</a></li>
        <li><a href="<?php echo e(URL::to('/')); ?>/admin/tcnFullWithDrawal/Paid">Approved</a></li>
        <li><a href="<?php echo e(URL::to('/')); ?>/admin/tcnFullWithDrawal/Cancelled">Cancelled</a></li>
      </ul>
</div>

<div class="wrapper-md" id="wrapper-md" ng-controller="FormDemoCtrl">

		<div class="panel panel-default">
			<div class="panel-heading font-bold">TCN FULL WITHDRAWAL REQUEST</div>
			<div class="panel-body">
				<div class="form-group col-sm-4">
					<label> Member Code</label>
					<input type="text" name="userCode" id="userCode" value="" class="form-control" required data-parsley-required-message="Enter Member Code">
					<span class="userCode text-danger"></span>
				</div>
				<div class="form-group col-sm-2">
				<label>&nbsp;</label><br>
					<button onclick="getMember()" class="btn btn-sm btn-primary font-bold">Search</button>
				</div>
 			</div>
		</div> 

	<div id="result">
	
	</div>	

		<div class="panel panel-default">
			<div class="panel-heading font-bold">TCN LIST</div>
			<div class="panel-body">
			      <table class="table table-bordered" id="users-table">
			        <thead>
			            <tr>
			                <th>TCN CODE</th>
			                <th>MEMBER CODE</th>
			                <th>MEMBER NAME</th>
			                <th>TCN</th>
			                <th>AMOUNT</th>
			                <th>UNIT</th>
			                <th>ACTION</th>
			            </tr>
			        </thead>
			    </table>

			</div>
		</div> 
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">
$( "#paymentReceivedDate").datepicker({format:'dd-mm-yyyy',autoclose: true});

$('.chosen-select').chosen({width:'100%'});

$('#result').hide()

var table=$('#users-table').DataTable();

table.destroy();










function getMember()
{

	$('#result').hide()

	var table=$('#users-table').DataTable();
	table.destroy();

	var userCode=$('#userCode').val().replace(/\s/g, '');

	if(userCode=='' || userCode==null)
	{

	$('.userCode').html('Enter A Valid Member Code');
	return;

	}
	else
	{

	$('.userCode').html('');

	$.ajax({

	type: "get",

	url: "<?php echo e(URL::to('/')); ?>/admin/tcnFullWithDrawal/create",

	data:{process:'CheckCode',userCode:userCode},

	success: function (data)

	{

		data=data.replace(/\s/g, '');

		if(data=='NoMember')
		{

		   sweetAlert("Check...","Incorrect Member Code (or) This Member is not in active ." , "error");
		   $('#userCode').val(' ');
		   $('.userCode').html('Enter A Valid Member Code');
		   	var table=$('#users-table').DataTable();
			table.destroy();

		}
		else if(data=='NoTCN')
		{

		    sweetAlert("Oops...","This member is not present in the applied TCN" , "error");
		    	var table=$('#users-table').DataTable();
				table.destroy();

		}
		else if(data=='PendingWithDraw')
		{

		    sweetAlert("Oops...","This Member is already apllied for the TCN Full withdrawal.Withdrawal status : pending " , "error");
		    	var table=$('#users-table').DataTable();
				table.destroy();

		}
		else
			getDetails(userCode);
	}
	});
	}
}




function getDetails(userCode)
{	

	var table=$('#users-table').DataTable();

	table.destroy();
	
	  var t=$('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
    	"url": "<?php echo e(URL::to('/')); ?>/admin/tcnFullWithDrawal/create",
    	"type": "get",
    	"data":{process:'tcnDetails',userCode:userCode}
  		},
        columns: [
            { data: 'tcnCode', name: 'tcnCode' },
            { data: 'code', name: 'code' },
            { data: 'name', name: 'name' },
            { data: 'tcn_type', name: 'tcn_type' },
            { data: 'amount', name: 'amount' },
            { data: 'unit', name: 'unit' },
            { data: 'action', name: 'action' },
        ]
    });
	  $('.chosen-select').chosen({width:'100%'});
}


function RequestResponse(tcnId)
{

	$.ajax({
	type: "get",
	url: "<?php echo e(URL::to('/')); ?>/admin/tcnFullWithDrawal/create",
	data:{process:'RequestResponse',tcnId:tcnId},
	success: function (data)
	{
		$('#result').show();
		$('#result').html(data);
		$('.chosen-select').chosen({width:'100%'});
		$('#form').parsley();
	}
	});

}

function ViewDetails(tcnId)
{
window.location="<?php echo e(URL::to('/')); ?>/admin/tcnFullWithDrawal/view@@@"+tcnId;
}
window.history.forward(1);

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>