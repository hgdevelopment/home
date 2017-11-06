<?php 
use \App\Http\Controllers\Controller;
 ?>
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
  <h1 class="m-n font-normal h3">TCN Full WithDraw Request</h1>
</div>

<div class="wrapper-md" ng-controller="FormDemoCtrl">
	<form role="form" method="post" id="form"  action="<?php echo e(URL::to('/')); ?>/admin/normalWithDraw" data-parsley-validate >
		<?php echo e(csrf_field()); ?>

		<div class="panel panel-warning">
			<div class="panel-heading font-bold">
			<div class="col-sm-4 font-bold text-success h4">TCN TYPE : <span class="text-danger"><?php echo e($tcnrequests->tcn->tcnType); ?></span></div><div class="col-sm-4 font-bold text-success h4">WITHDRAW STATUS : <span class="text-danger"><?php echo e($tcnrequests->withDrawStatus); ?></span></div>&nbsp;
			</div>
		</div>

	<div class="panel panel-warning">
		<div class="panel-heading font-bold">TCN DETAILS</div>
		<div class="panel-body">
		  <div class="col-md-6 col-xs-12 divTableCell">Member&nbsp;Code<b class="data-lab"><?php echo e($members->code); ?></b></div> 
		   <div class="col-md-6 col-xs-12 divTableCell">Address<b class="data-lab"> <?php echo e($address->address); ?></b></div>
              <div class="col-md-6 col-xs-12 divTableCell">Member&nbsp;Name<b class="data-lab"><?php echo e($members->name); ?></b></div>
                <div class="col-md-6 col-xs-12 divTableCell">Mobile&nbsp;No<b class="data-lab"><?php echo e($members->mobileNo); ?></b></div> 
                 <div class="col-md-6 col-xs-12 divTableCell">UNIT<b class="data-lab"><?php echo e($withDraws->unit); ?></b></div>
                   <div class="col-md-6 col-xs-12 divTableCell">Approved&nbsp;Date<b class="data-lab"><?php echo e(date('d-m-Y',strtotime($tcnrequests->approvalDate))); ?></b></div>  
                    <div class="col-md-6 col-xs-12 divTableCell">Amount<b class="data-lab"><?php echo e($withDraws->amount); ?></b></div>
                    <div class="col-md-6 col-xs-12 divTableCell">Payment Received Date<b class="data-lab"><?php echo e(date('d-m-Y',strtotime($tcnrequests->paymentReceivedDate))); ?></b></div>
                      
		</div>
	</div>

    




<div class="col-lg-7">
		<div class="row">
			<div class="panel panel-warning">
		<div class="panel-heading font-bold">ACCOUNT DETAILS</div>
		<div class="panel-body">
		  <div class="col-md-6 col-xs-12 divTableCell">A/C Holder Name<b class="data-lab"><?php echo e($banks->accountHolderName); ?></b></div> 
		  <div class="col-md-6 col-xs-12 divTableCell">Bank Name<b class="data-lab"><?php echo e($banks->bankName); ?></b></div> 
		  <div class="col-md-6 col-xs-12 divTableCell">Branch<b class="data-lab"><?php echo e($banks->branchName); ?></b></div> 
		  <div class="col-md-6 col-xs-12 divTableCell">Account Number<b class="data-lab"><?php echo e($banks->accountNumber); ?></b></div> 
		  <div class="col-md-6 col-xs-12 divTableCell">IFSC Code<b class="data-lab"><?php echo e($banks->ifsc); ?></b></div> 
		</div>
		<br>
		<div class="panel-body">
		<div class="row">
		  <div class="col-md-6 col-xs-12 divTableCell">Applied By<b class="data-lab"><?php echo e(Controller::userCode($withDraws->appliedId)); ?></b></div> 
		  <div class="col-md-6 col-xs-12 divTableCell">Date<b class="data-lab"><?php echo e(date('d-m-Y H:i:a',strtotime($withDraws->created_at))); ?></b></div>
		 </div> 
		</div>	 
	</div>
		</div>	
	</div>





	<div class="row">
		<div class="col-lg-5">
			<div class="panel panel-warning">
                 <div class="panel-heading font-bold"> Photos </div>
                    <div  class="panel-body">
		           <div class="col-md-6 col-xs-12 divTableCell"><img src="<?php echo e(URL::to('/')); ?>/storage/img/member_img/<?php echo e($members->photo); ?>" style="height:150px;width:150px;" onclick="window.open('<?php echo e(URL::to('/')); ?>/storage/img/member_img/<?php echo e($members->photo); ?>')" /></div> 
  	                <div class="col-md-6 col-xs-12 divTableCell"><img src="<?php echo e(URL::to('/')); ?>/storage/img/member_img/<?php echo e($members->singnature); ?>" style="height:150px;width:150px;"  onclick="window.open('<?php echo e(URL::to('/')); ?>/storage/img/member_img/<?php echo e($members->singnature); ?>')"></div> 
  
                 </div>
            </div>
		</div>
	</div>



		<div class="panel panel-warning">
			<div class="panel-heading font-bold">WITHDRAWAL PAYMENT ENTRY</div>
			<div class="panel-body">
				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-3 font-bold">Form Received By</div>
						<div class="col-sm-3">
							<input type="text" name="formReceivedBy" id="formReceivedBy" value="" class="form-control"  required data-parsley-required-message="Enter Form Received By"/>
						</div>

						<div class="col-sm-3 font-bold">Currency</div>
						<div class="col-sm-3">
							<select class="chosen-select" name="currencyType" id="currencyType" required data-parsley-required-message="Please Select currencyType">
								<option value=" ">Select</option>
								<option value="INR">INR</option>					
								<option value="USD">USD</option>
								<option value="AED">AED</option>					
								<option value="CAD">CAD</option>					
								<option value="SAR">SAR</option>					
							</select>
						</div>
					</div>
				</div><div class="col-sm-12">&nbsp;</div>


				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-3 font-bold">Approved By</div>
						<div class="col-sm-3">
							<input type="text" name="approveDeclineBy" id="approveDeclineBy" value="" class="form-control"  required data-parsley-required-message="Enter Form Payment MAde By"/>
							
						</div>
						<div class="col-sm-3 font-bold">Payment Made By</div>
						<div class="col-sm-3">
							<input type="text" name="paymentMadeBy" id="paymentMadeBy" value="" class="form-control"  required data-parsley-required-message="Enter Form Payment MAde By"/>
							
						</div>
					</div>
				</div><div class="col-sm-12">&nbsp;</div>


				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-3 font-bold">Withdrawal applied date</div>
						<div class="col-sm-3">
	                      <input type="text" class="form-control" data-date-end-date="0d" id="wdappliedDate" name="wdappliedDate" value="<?php echo e(date('d-m-Y',strtotime($withDraws->appliedDate))); ?>" required data-parsley-required-message="Please Enter Withdrawal applied date" readonly>					
						</div>
						<div class="col-sm-3 font-bold">Withdrawal paid date</div>
						<div class="col-sm-3">
	                      <input type="text" data-date-end-date="0d" class="form-control" id="wdpayedDate" name="wdpayedDate" value="<?php echo e(date('d-m-Y')); ?>" required data-parsley-required-message="Please Enter Withdrawal paid date" readonly>
						</div>
					</div>
				</div><div class="col-sm-12">&nbsp;</div>

				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-3 font-bold">Cheque No</div>
						<div class="col-sm-3">
							<input type="text" name="chequeNo" id="chequeNo" value="" class="form-control" />
						</div>

						<div class="col-sm-3 font-bold">Online Ref No</div>
						<div class="col-sm-3">
							<input type="text" name="online" id="online" value="" class="form-control" />
						</div>
					</div>
				</div><div class="col-sm-12">&nbsp;</div>

				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-3 font-bold">Debit acc No.(Heera's)</div>
						<div class="col-sm-3">
							<input type="text" name="debitAccountNo" id="debitAccountNo" value="<?php echo e($tcnrequests->heeraaccount->accountNumber); ?>" class="form-control" required data-parsley-required-message="Please Enter Debit acc No.(Heera's)" onblur="heeraAccountCheck(this.value)"/>
						</div>
						<div class="col-sm-3 font-bold">Bank</div>
						<div class="col-sm-3">
							<input type="text" name="bank" id="bank" value="" class="form-control" />
						</div>
					</div>
				</div><div class="col-sm-12">&nbsp;</div>

				<div class="col-sm-12">
					<div class="row">
						<div class="col-sm-3 font-bold"></div>
						<div class="col-sm-3"></div>
					</div>
					<div class="row"><br>
							<div class="col-sm-3"></div>
							<div class="col-sm-6 text-center">
							<label>Remarks</label><br>
							<textarea data-parsley-minlength="10" class="form-control" id="remarks" name="remarks" required data-parsley-required-message="Please Enter Remarks" ></textarea>
							</div>
					</div>
				</div>

				<input type="hidden" name="tcnId" id="tcnId" value="<?php echo e($tcnrequests->id); ?>"> 
				<input type="hidden" name="withDrawId" id="withDrawId" value="<?php echo e($tcnrequests->withDrawId); ?>"> 

				<div class="col-sm-12 text-center"><br>
				<input type="button" value="Save" class="btn btn-success" onclick="validateThis()">&nbsp;&nbsp;
				<input type="reset" value="Cancel" class="btn btn-danger" onclick="window.history.back()"></div>
			</div>
		</div>
	</form>
</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">
function validateThis()
{

swal({
title: "Confirm!!",
text: "Are you sure, You Want To Save This..?",
type: "info",
showCancelButton: true,
confirmButtonColor: "#2dbc09",
confirmButtonText: "Save",
animation: "slide-from-bottom",
closeOnConfirm: true
}, 
function (isConfirm) 
{
if(isConfirm) {
	$('#form').submit();
}
else
return; 
});
return ;
}


function heeraAccountCheck(heeraAccountNumber)
{
if(heeraAccountNumber=="")
	return ;

	$.ajax({
	type: "get",
    url: "<?php echo e(URL::to('/')); ?>/admin/normalWithDraw/create",
	data:{process:'getHeeraAccount',heeraAccountNumber:heeraAccountNumber},
	success: function (data) {
			if(data!=1)
			{
		    sweetAlert("Oops...","In This Heera Account Number Dosn't exist" , "error");
		    $('#debitAccountNo').val('');
			}
		}
	});

}
$(".chosen-select").chosen({width:'100%'});

$( "#wdappliedDate").datepicker({format: 'dd-mm-yyyy'});
$( "#wdpayedDate").datepicker({format: 'dd-mm-yyyy'});

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>