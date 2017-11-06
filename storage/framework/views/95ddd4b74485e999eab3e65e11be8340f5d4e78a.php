<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">

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
	<h1 class="m-n font-thin h3">Withdrawal Request Details</h1>
</div>
<form  method="post"  action="<?php echo e(URL::to('/')); ?>/admin/partialWithdraw/approve" >
	<?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $datas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
	<div class="wrapper-md">
		<div class="row">
			<div class="col-sm-12">
				<div class="blog-post">                   
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading ">                  
								SCHEME DETAILS
							</div>
							<div class="panel-body">
								<?php echo e(csrf_field()); ?>

								<div class="col-md-3">
									<label><strong>MEMBER CODE</strong></label><br>
									<label><?php echo e($datas->code); ?></label>
								</div>
								<div class="col-md-3">
									<label><strong>NAME</strong></label><br>
									<label><?php echo e($datas->name); ?></label>
								</div>
								<div class="col-md-3">
									<label><strong>ADDRESS</strong></label><br>
									<label><?php echo e($datas->address); ?></label>
								</div>
								<div class="col-md-3">
									<label><strong>PHONE</strong></label><br>
									<label><?php echo e($datas->mobileNo); ?></label>
								</div>
								<div class="col-md-12"> <br> </div>
								<div class="col-md-3">
									<label><strong>SCHEME</strong></label><br>
									<label><?php echo e($datas->tcnType); ?></label>
								</div>
								<div class="col-md-3">
									<label><strong>APPROVED DATE</strong></label><br>
									<label><?php echo e($datas->approvalDate); ?></label>
								</div>
								<div class="col-md-3">
									<label><strong>INVESTMENT AMOUNT</strong></label><br>
									<label><?php echo e($datas->amount); ?></label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="wrapper-md">
		<div class="row">
			<div class="col-sm-12">
				<div class="blog-post">                   
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading ">                  
								ACCOUNT DETAILS FOR PAYMENT
							</div>
							<div class="panel-body">
								<div class="col-md-4">
									<label><strong>A/C Holder Name	</strong></label><br>
									<label><?php echo e($datas->accountHolderName); ?></label>
								</div>
								<div class="col-md-4">
									<?php $__currentLoopData = $value; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $values): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
									<label><strong>Withdrawal Amount</strong></label><br>
									<label><?php echo e($values->amount); ?></label>
									<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								</div>
								<div class="col-md-4">
									<label><strong>Name Of Bank	</strong></label><br>
									<label><?php echo e($datas->bankName); ?></label>
								</div>
								<div class="col-md-12"><br></div>
								<div class="col-md-4">
									<label><strong>Branch</strong></label><br>
									<label><?php echo e($datas->branchName); ?></label>
								</div>
								<div class="col-md-4">
									<label><strong>AC/No</strong></label><br>
									<label><?php echo e($datas->accountNumber); ?></label>
								</div>
								<div class="col-md-4">
									<label><strong>IFSC Code</strong></label><br>
									<label><?php echo e($datas->ifsc); ?></label>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="wrapper-md">
		<div class="row">
			<div class="col-sm-12">
				<div class="blog-post">                   
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading ">                  
								FOR OFFICE USE ONLY
							</div>
							<div class="panel-body">
								<div class="col-md-4">
									<label><strong>Received Original Agreements</strong></label><br>
									<input type="hidden" name="withdraw_id" id="withdraw_id" value="<?php echo e($datas->id); ?>">
									<select  class="form-control" id="org_agr"  name="org_agr"  >
				                        <option value="">Select</option>
				                        <option value="yes">yes</option>
				                        <option value="no">no</option>
			                        </select>
								</div>
								<div class="col-md-4">
									<label><strong>HG Receipts</strong></label><br>
									<select  class="form-control" id="hg_recp"  name="hg_recp"  >
				                        <option value="">Select</option>
				                        <option value="yes">yes</option>
				                        <option value="no">no</option>
			                        </select>
								</div>
								<div class="col-md-4">
									<label><strong>Card</strong></label><br>
									<select  class="form-control" id="card"  name="card"  >
				                        <option value="">Select</option>
				                        <option value="yes">yes</option>
				                        <option value="no">no</option>
			                        </select>
								</div>
								<div class="col-md-12"><br></div>
									<div class="col-md-4">
										<label><strong>Form Received By</strong></label><br>
										<input type="text" name="received_by" id="received_by" class="form-control" placeholder="Received By">
									</div>
									<div class="col-md-4">
										<label><strong>Currency</strong></label><br>
										<select  class="form-control" id="currency"  name="currency"  >
					                        <option value="">Select</option>
					                        <option value="INR">INR</option>
					                        <option value="USD">USD</option>
					                        <option value="CAD">CAD</option>
					                        <option value="CAD">CAD</option>
					                        <option value="AED">AED</option>
			                        	</select>
									</div>
									<div class="col-md-4">
										<label><strong>Payment Made By	</strong></label><br>
										<input type="text" name="payment" id="payment" class="form-control" placeholder="Payment">
									</div>
								<div class="col-md-12"><br></div>
									<div class="col-md-4">
										<label><strong>Approved/Declined By</strong></label><br>
										<input type="text" name="approved_by" id="approved_by" class="form-control" placeholder="Approved By">
									</div>
									<div class="col-md-4">
										<label><strong>Withdrawal applied date</strong></label><br>
										<input type="text" name="applied_date" id="applied_date" value="<?php echo e($datas->appliedDate); ?>"  class="form-control" placeholder="Applied Date">
									</div>
									<div class="col-md-4">
										<label><strong>Withdrawal payed date</strong></label><br>
										<input type="text" name="payed_date" id="payed_date"   class="form-control" placeholder="Payed Date">
									</div>
								<div class="col-md-12"><br></div>
									<div class="col-md-4">
										<label><strong>Online</strong></label><br>
										<input type="text" name="online" id="online" class="form-control" placeholder="Online">
									</div>
									<div class="col-md-4">
										<label><strong>Cheque No</strong></label><br>
										<input type="text" name="check_no" id="check_no"  class="form-control" placeholder="Cheque Number">
									</div>
									<div class="col-md-4">
										<label><strong>Bank</strong></label><br>
										<input type="text" name="bank" id="bank"   class="form-control" placeholder="Bank">
									</div>
								<div class="col-md-12"><br></div>
									<div class="col-md-12">
										<label><strong>Remarks</strong></label><br>
										<textarea type="text" name="remarks" id="remarks" class="form-control" placeholder="Remarks"></textarea>
									</div>
								
								<div class="col-md-12"></div>
								<div class="col-md-4"><br>
									<button name="approve" id="approve" type="submit"  value="submit" class="btn btn-sm btn-success">Approve</button>&nbsp;&nbsp;&nbsp;&nbsp;
									<button name="deny"  id="deny" type="submit"  value="submit" class="btn btn-sm btn-danger">Deny</button>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</form>                    
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script src="https://code.jquery.com/jquery-1.12.4.js"></script>
<script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
<script type="text/javascript">
$( function() {
$( '#applied_date' ).datepicker();
$( '#payed_date' ).datepicker();
});
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layout.erp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>