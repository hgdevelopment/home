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
<h1 class="m-n font-normal h3">TCN PAYMENT DETAILS EDIT</h1>
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
        <li><a href="<?php echo e(URL::to('/')); ?>/admin/tcnApprove/Document">Document Verification</a></li>
        <?php endif; ?>

      	<?php if(Controller::UserAccessRights('TCN Payment Verification')): ?>
        <li><a href="<?php echo e(URL::to('/')); ?>/admin/tcnApprove/Payment">Payment Verification</a></li>
        <?php endif; ?>

      	<?php if(Controller::UserAccessRights('TCN Add To Physical Benefit')): ?>
        <li><a href="<?php echo e(URL::to('/')); ?>/admin/tcnApprove/TCNPhysicalBenefitList">Add Physical Benefit</a></li>
        <?php endif; ?>

      	<?php if(Controller::UserAccessRights('TCN Payment Edit')): ?>
        <li class="active"><a href="<?php echo e(URL::to('/')); ?>/admin/tcnApprove/TCNPaymentEdit">Payment Edit</a></li>
        <?php endif; ?>

      </ul>
</div>
<div class="wrapper-md" id="wrapper-md" ng-controller="FormDemoCtrl">


		<div class="panel panel-default">
			<div class="panel-heading font-bold">TCN PAYMENT DETAILS EDIT</div>
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


	<form role="form" method="post" action="<?php echo e(URL::to('/')); ?>/admin/tcnApprove" id="form" data-parsley-validate id="form">
		<?php echo e(csrf_field()); ?>

		<input type="hidden" id="tcnId" name="tcnId" value="">
		<input type="hidden" id="paymentId" name="paymentId" value="">
		<input type="hidden" id="tcnType" name="tcnType" value="">
		<input type="hidden" id="currencyType" name="currencyType" value="">




		<div class="panel panel-default">
			<div class="panel-heading font-bold">TCN PAYMENT DETAILS</div>
			<div class="panel-body">

				<div class="col-sm-12">
					<div class="row">

						<div class="col-sm-4">Unit
							<select class="form-control col-md-6 chosen-select" name="unit" id="unit"  onchange="calcAmount()" required data-parsley-required-message="Select Unit">
								<option value=" ">Select</option>
								<?php for($i=1;$i<=100;$i++) {?>
								<option value="<?php echo $i; ?>"><?php echo $i;?></option>
								<?php } ?>
							</select>
						</div>

						<div class="col-sm-4">Amount
							<input type="text" name="amount" id="amount" value="<?php echo e(old('amount')); ?>" class="form-control" readonly/>
						</div>

						<div class="col-sm-4">Payment Mode
							<select class="form-control col-md-6 chosen-select" name="paymentMode" id="paymentMode" required data-parsley-required-message="Select Payment Mode">
								<option value=" ">Select</option>
								<option value="cheque">CHEQUE</option>
								<option value="DD">DD</option>
								<option value="online">ONLINE TRANSFERS</option>
								<option value="cash">CASH</option>
								<option value="other">OTHERS</option>
							</select>
						</div>

					</div>
				</div><div class="col-sm-12">&nbsp;</div>

				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-4" id="getCountrys">
							Transaction Number
							<input type="text" class="form-control" name="transactionNumber" id="transactionNumber" value="" required data-parsley-required-message="Enter Transaction Number">

						</div>

						<div class="col-sm-4">Received Date
							<input class="form-control" type="text" data-date-end-date="0d" readonly id="paymentReceivedDate" name="paymentReceivedDate" value=""  >

						</div>


						<div class="col-sm-4">Heera Account Number
							<input class="form-control" type="text" data-date-start-date="0d" id="heeraAccountNumber" name="heeraAccountNumber" value=""  readonly>

						</div>

						<div class="col-sm-4"><br>
							<input type="submit" value=" Save " class="btn  btn-danger font-bold">		
						</div>

					</div>
				</div>			
			</div>
		</div> 
	</form>	

		<div class="panel panel-default">
			<div class="panel-heading font-bold">TCN LIST</div>
			<div class="panel-body">
			      <table class="table table-bordered" id="users-table">
			        <thead>
			            <tr>
			                <th>MEMBER CODE</th>
			                <th>TCN CODE</th>
			                <th>MEMBER NAME</th>
			                <th>TCN</th>
			                <th>AMOUNT</th>
			                <th>UNIT</th>
			                <th>STATUS</th>
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
$('#form').hide()
function getMember()
{
	$('#form').hide();
	var userCode=$('#userCode').val().replace(/\s/g, '');

	if(userCode=='' || userCode==null)
	{
	$('.userCode').html('Enter A Valid Member Code');
		var table=$('#users-table').DataTable();
		table.destroy();
	return;
	}
	else
	{
	$('.userCode').html('');
	$.ajax({
	type: "get",
	url: "<?php echo e(URL::to('/')); ?>/admin/tcnApprove/create",
	data:{process:'CheckCode',userCode:userCode},
	success: function (data)
	{
		if(data==1)
		{
		   sweetAlert("Check...","Incorrect Member Code." , "error");
		   $('#userCode').val(' ');
		   $('.userCode').html('Enter A Valid Member Code');
		   	var table=$('#users-table').DataTable();
			table.destroy();
		}
		else if(data==2)
		{
		    sweetAlert("Oops...","This member is not present in the applied TCN" , "error");
		    	var table=$('#users-table').DataTable();
				table.destroy();
		}


			getDetails(userCode);

	}
	});
	}
}



function calcAmount()
{
	var id=$('#tcnType').val();	
	var unit=$('#unit').val();	
	var currencyType=$('#currencyType').val();	
	$.ajax({
	type: "get",
	url: "<?php echo e(URL::to('/')); ?>/admin/tcnApprove/create",
	data:{process:'calcAmount',id:id,currencyType:currencyType},
	success: function (data) {
	$('#amount').val(data*unit);
	}
	});

}

function heeraAccountCheck()
{

var tcnType=$('#tcnType').val();	
var currencyType=$('#currencyType').val();

	$.ajax({
	type: "get",
	url: "<?php echo e(URL::to('/')); ?>/admin/tcnRequest/create",
	data:{opcode:4,currencyType:currencyType,tcnType:tcnType},
	success: function (data) 
	{

		$('#heeraAccountId').val(data['heeraAccountId']);
		$('#heeraAccountNumber').val(data['heeraAccountNumber']);
		$('#bankName').val(data['bankName']);
		$('#accountHolderName').val(data['accountHolderName']);
		$('#ifsc').val(data['ifsc']);


		$(".chosen-select").chosen({width:'100%'});
	}
	});

}

function getDetails(userCode)
{	
	var table=$('#users-table').DataTable();
	table.destroy();
	  var t=$('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: {
    	"url": "<?php echo e(URL::to('/')); ?>/admin/tcnApprove/create",
    	"type": "get",
    	"data":{process:'tcnDetails',userCode:userCode}
  		},
        columns: [
            { data: 'code', name: 'code' },
            { data: 'tcnCode', name: 'tcnCode' },
            { data: 'name', name: 'name' },
            { data: 'tcn_type', name: 'tcn_type' },
            { data: 'amount', name: 'amount' },
            { data: 'unit', name: 'unit' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action' },
        ]
    });
}

function RequestResponse(tcnId)
{

	$.ajax({
	type: "get",
	url: "<?php echo e(URL::to('/')); ?>/admin/tcnApprove/create",
	data:{process:'RequestResponse',tcnId:tcnId},
	success: function (data)
	{
		$('#form').show();
		$('#tcnId').val(data['tcnId']);

		$('#tcnType').val(data['tcnType']);
		$('#paymentId').val(data['paymentId']);
		$('#currencyType').val(data['currencyType']);
		$('#amount').val(data['amount']);
		$('#unit').val(data['unit']).trigger('chosen:updated');
		$('#transactionNumber').val(data['transactionNumber']);
		$('#paymentMode').val(data['paymentMode']).trigger('chosen:updated');
		$('#paymentReceivedDate').val(data['paymentReceivedDate']);
		$('#heeraAccountNumber').val(data['heeraAccountNumber']);
 calcAmount();
	}
	});

}

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>