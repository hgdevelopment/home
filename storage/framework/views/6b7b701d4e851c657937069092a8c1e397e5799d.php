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
	<div id="loader" style="text-align:center;position: fixed;opacity: 0.5;display: none;z-index: 1000001;left: 0;right:0;"><img style="width: 15%" src="<?php echo e(URL::to('/')); ?>/loaderbig.gif"/></div>
  <h1 class="m-n font-normal h3">
  <?php 
  use \App\Http\Controllers\Controller;
   $button='Payment';
  echo 'TCN Payment Verification';
    ?>
  </h1>

</div>

<input type="hidden" id="tcnId" value="<?php echo e($tcnrequests->id); ?>">
<input type="hidden" id="userId" value="<?php echo e($tcnrequests->userId); ?>">

<input type="hidden" name="button" id="button" value="<?php echo e($button); ?>">

<div class="wrapper-md">
	<div class="panel panel-warning">
		<div class="panel-heading font-bold">
		<div class="col-sm-4 font-bold text-success h4">TCN CODE : <span class="text-danger"><?php echo e(strtoupper($tcnrequests->tcnCode)); ?></span></div>
		<div class="col-sm-4 font-bold text-success h4">TCN  : <span class="text-danger"><?php echo e($tcnrequests->tcn->tcnType); ?></span></div>
		<div class="col-sm-4 font-bold text-success h4">TCN STATUS : <span class="text-danger"><?php echo e($tcnrequests->status); ?></span></div>&nbsp;
		</div>
	</div>

	<div class="col-lg-12">
		<div class="row">	
			<div class="panel panel-warning">
				<div class="panel-heading font-bold">
				<div style="width: 50%;float: left;">TCN PERSONAL DETAILS</div>
				<div class="text-right" >&nbsp;
					
				</div>
				
				</div>
				<div class="panel-body">
                  <div class="col-md-6 col-xs-12 divTableCell">Member&nbsp;Code<b class="data-lab"><?php echo e($memberregistrations->code); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Member<b class="data-lab">+<?php echo e($memberregistrations->country->countryId); ?>&nbsp;<?php echo e($memberregistrations->mobileNo); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Email Id<b class="data-lab"><?php echo e($memberregistrations->email); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Member Name<b class="data-lab"><?php echo e($memberregistrations->name); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Nationality<b class="data-lab"><?php echo e($countrys->countryName); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Address<b class="data-lab"><?php echo e($address1->address); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Guardian<b class="data-lab"><?php echo e($memberregistrations->guardian); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Religion<b class="data-lab"><?php echo e($memberregistrations->religion); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">City<b class="data-lab"><?php echo e($address1->city); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Gender<b class="data-lab"><?php echo e($memberregistrations->gender); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Caste<b class="data-lab"><?php echo e($memberregistrations->caste); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">State<b class="data-lab"><?php echo e($address1->state); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">D O B<b class="data-lab"><?php echo e(date('d-m-Y',strtotime($memberregistrations->dob))); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Marital&nbsp;Status<b class="data-lab"><?php echo e($memberregistrations->maritalStatus); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">PIN<b class="data-lab"><?php echo e($address1->pin); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Education<b class="data-lab"><?php echo e($memberregistrations->education); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Occupation<b class="data-lab"><?php echo e($memberregistrations->occupation); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Total&nbsp;Income<b class="data-lab"><span class=" font-bold"> <?php echo e($memberregistrations->incomeAmount); ?></span> ( <?php echo e($memberregistrations->incomeCurrencytype); ?> )</b></div>
				
				</div>
			</div>
		</div>	
	</div>


	<div class="col-lg-7">
		<div class="row">
			<div class="panel panel-warning">
				<div class="panel-heading font-bold">PAYMENT DETAILS</div>
				<div class="panel-body">
                  <div class="col-md-6 col-xs-12 divTableCell">Currency Type<b class="data-lab"><?php echo e($tcnrequests->currencyType); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Applying From<b class="data-lab"><?php echo e($countrys->countryName); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Unit<b class="data-lab"><?php echo e($tcnrequests->unit); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Deposit Date<b class="data-lab"><?php echo e(date('d-m-Y',strtotime($tcnrequests->depositeDate))); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Payment&nbsp;Mode<b class="data-lab"><?php echo e($tcnrequests->paymentMode); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Transaction No<b class="data-lab"><?php echo e($tcnrequests->transactionNumber); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Amount<b class="data-lab"><?php echo e($tcnrequests->amount); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell" style="background: #b2ec79;">Heera Account No<b class="data-lab"><?php echo e($tcnrequests->heeraaccount->accountNumber); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Bank Name<b class="data-lab"><?php echo e($tcnrequests->heeraaccount->bankName); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Branch Name<b class="data-lab"><?php echo e($tcnrequests->heeraaccount->branchName); ?></b></div>
                 
				</div>
			</div>
		</div>	
	</div>





	<div class="row">
		<div class="col-lg-5">
			<div class="panel panel-warning">
				<div class="panel-heading font-bold">MEMBER IMAGE</div>
				<div class="panel-body">
					<div class="row">

					   <div class="col-md-6 col-xs-12 divTableCell"><img src="<?php echo e(URL::to('/')); ?>/storage/img/member_img/<?php echo e($memberregistrations->photo); ?>" style="height:160px;width:150px;cursor: pointer" onclick="window.open('<?php echo e(URL::to('/')); ?>/storage/img/member_img/<?php echo e($memberregistrations->photo); ?>')" ></div>
					    <div class="col-md-6 col-xs-12 divTableCell"><img src="<?php echo e(URL::to('/')); ?>/storage/img/member_img/<?php echo e($memberregistrations->singnature); ?>" style="height:160px;width:150px;cursor: pointer"  onclick="window.open('<?php echo e(URL::to('/')); ?>/storage/img/member_img/<?php echo e($memberregistrations->singnature); ?>')"></div>
						
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-12">
		<div class="row">
			<div class="panel panel-warning">
				<div class="panel-heading font-bold">BENEFIT REMITTANCE</div>
				<div class="panel-body">
                  <div class="col-md-6 col-xs-12 divTableCell">Account Number<b class="data-lab"><?php echo e($banks->accountNumber); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Bank Name<b class="data-lab"><?php echo e($banks->bankName); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">IFSC Code<b class="data-lab"><?php echo e($banks->ifsc); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Branch Name<b class="data-lab"><?php echo e($banks->branchName); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Account Holder Name<b class="data-lab"><?php echo e($banks->accountHolderName); ?></b></div>
            					
				</div>
			</div>
		</div>	
	</div>

	<div class="col-lg-12">
		<div class="row">
			<div class="panel panel-warning">
				<div class="panel-heading font-bold">FIRST NOMINEE DETAILS</div>
				<div class="panel-body">
                  <div class="col-md-6 col-xs-12 divTableCell">Nominee Name<b class="data-lab"><?php echo e($nominees1->name); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Email ID<b class="data-lab"><?php echo e($nominees1->email); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell"> Proof Type<b class="data-lab"><?php echo e($proofs1->typeOfProof); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Relation With Applicant<b class="data-lab"><?php echo e($nominees1->relationWithApplicant); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Address <b class="data-lab"><?php echo e($address2->address); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Proof Number<b class="data-lab"><?php echo e($proofs1->proofNumber); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Gender<b class="data-lab"><?php echo e($nominees1->gender); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">City<b class="data-lab"><?php echo e($address2->city); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">State<b class="data-lab"><?php echo e($address2->state); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">D O B<b class="data-lab"><?php echo e(date('d-m-Y',strtotime($nominees1->dob))); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Mobile No<b class="data-lab"><?php echo e($nominees1->mobile); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">PIN<b class="data-lab"><?php echo e($address2->pin); ?></b></div>
                  
               
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-12">
		<div class="row">
			<div class="panel panel-warning">
				<div class="panel-heading font-bold">NOMINEE PROOFS</div>
				<div class="panel-body">
				<div class="col-sm-4 text-center">
					<img src="<?php echo e(URL::to('/')); ?>/storage/img/nominee/<?php echo e($nominees1->uploadPhoto); ?>" style="height:200px;width:200px;cursor: pointer"  onclick="window.open('<?php echo e(URL::to('/')); ?>/storage/img/nominee/<?php echo e($nominees1->uploadPhoto); ?>')"><br>
					<label>Photo</label>
				</div>

				<div class="col-sm-4 text-center">
					<img src="<?php echo e(URL::to('/')); ?>/storage/img/nominee/<?php echo e($nominees1->signature); ?>" style="height:200px;width:200px;cursor: pointer"  onclick="window.open('<?php echo e(URL::to('/')); ?>/storage/img/nominee/<?php echo e($nominees1->signature); ?>')"><br>
					<label>Signature</label>
				</div>
				<div class="col-sm-4 text-center">
					<img src="<?php echo e(URL::to('/')); ?>/storage/img/proof/<?php echo e($proofs1->file); ?>" style="height:200px;width:200px;cursor: pointer"  onclick="window.open('<?php echo e(URL::to('/')); ?>/storage/img/proof/<?php echo e($proofs1->file); ?>')"><br>
					<label>Proof</label>
				</div>
				</div>
			</div>
		</div>	
	</div>
	<?php if($tcnrequests->nominee2_id): ?>

	<div class="col-lg-12">
		<div class="row">
			<div class="panel panel-warning">
				<div class="panel-heading font-bold">SECOND NOMINEE DETAILS</div>
				<div class="panel-body">
                  <div class="col-md-6 col-xs-12 divTableCell">Nominee Name<b class="data-lab"><?php echo e($nominees2->name); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Email ID<b class="data-lab"><?php echo e($nominees2->email); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell"> Proof Type<b class="data-lab"><?php echo e($proofs2->typeOfProof); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Relation With Applicant<b class="data-lab"><?php echo e($nominees2->relationWithApplicant); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Address <b class="data-lab"><?php echo e($address3->address); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Proof Number<b class="data-lab"><?php echo e($proofs2->proofNumber); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Gender<b class="data-lab"><?php echo e($nominees2->gender); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">City<b class="data-lab"><?php echo e($address3->city); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">State<b class="data-lab"><?php echo e($address3->state); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">D O B<b class="data-lab"><?php echo e(date('d-m-Y',strtotime($nominees2->dob))); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">Mobile No<b class="data-lab"><?php echo e($nominees2->mobile); ?></b></div>
                  <div class="col-md-6 col-xs-12 divTableCell">PIN<b class="data-lab"><?php echo e($address3->pin); ?></b></div>
                  
               
				</div>
			</div>
		</div>
	</div>

	<div class="col-lg-12">
		<div class="row">
			<div class="panel panel-warning">
				<div class="panel-heading font-bold">NOMINEE PROOFS</div>
				<div class="panel-body">
				<div class="col-sm-4 text-center">
					<img src="<?php echo e(URL::to('/')); ?>/storage/img/nominee/<?php echo e($nominees2->uploadPhoto); ?>" style="height:200px;width:200px;cursor: pointer"  onclick="window.open('<?php echo e(URL::to('/')); ?>/storage/img/nominee/<?php echo e($nominees2->uploadPhoto); ?>')"><br>
					<label>Photo</label>
				</div>

				<div class="col-sm-4 text-center">
					<img src="<?php echo e(URL::to('/')); ?>/storage/img/nominee/<?php echo e($nominees2->signature); ?>" style="height:200px;width:200px;cursor: pointer"  onclick="window.open('<?php echo e(URL::to('/')); ?>/storage/img/nominee/<?php echo e($nominees2->signature); ?>')"><br>
					<label>Signature</label>
				</div>
				<div class="col-sm-4 text-center">
					<img src="<?php echo e(URL::to('/')); ?>/storage/img/proof/<?php echo e($proofs2->file); ?>" style="height:200px;width:200px;cursor: pointer"  onclick="window.open('<?php echo e(URL::to('/')); ?>/storage/img/proof/<?php echo e($proofs2->file); ?>')"><br>
					<label>Proof</label>
				</div>
				</div>
			</div>
		</div>	
	</div>
	<?php endif; ?>
	<div class="col-lg-12">
		<div class="row">
			<div class="panel panel-warning">
				<div class="panel-heading font-bold">SUPPORTING DOCUMENTS</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-4 text-center">
							<img src="<?php echo e(URL::to('/')); ?>/storage/img/tcndocs/<?php echo e($tcnrequests->doc1); ?>" style="height:200px;width:200px;cursor: pointer"  onclick="window.open('<?php echo e(URL::to('/')); ?>/storage/img/tcndocs/<?php echo e($tcnrequests->doc1); ?>')"><br>
							<label>Document 1</label>
						</div>

						<div class="col-sm-4 text-center">
							<img src="<?php echo e(URL::to('/')); ?>/storage/img/tcndocs/<?php echo e($tcnrequests->doc2); ?>" style="height:200px;width:200px;cursor: pointer" onclick="window.open('<?php echo e(URL::to('/')); ?>/storage/img/tcndocs/<?php echo e($tcnrequests->doc2); ?>')"><br>
							<label>Document 2</label>
						</div>
						<div class="col-sm-4 text-center">
							<img src="<?php echo e(URL::to('/')); ?>/storage/img/tcndocs/<?php echo e($tcnrequests->doc3); ?>" style="height:200px;width:200px;cursor: pointer"  onclick="window.open('<?php echo e(URL::to('/')); ?>/storage/img/tcndocs/<?php echo e($tcnrequests->doc3); ?>')"><br>
							<label>Document 3</label>
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>

	<div class="col-lg-12">
		<div class="row">
		<div class="panel panel-warning">
				<div class="panel-heading font-bold">APPROVAL DETAILS</div>					
			<div class="panel-body">

			  <div class="col-md-6 col-xs-12 divTableCell">TCN Applied By<b class="data-lab">
			  <?php if($tcnrequests->addedId=='0'): ?><?php echo e('MEMBER'); ?><?php else: ?><?php echo e(Controller::userCode($tcnrequests->addedId)); ?><?php endif; ?></b></div>
			  <div class="col-md-6 col-xs-12 divTableCell">Applied Date<b class="data-lab"><?php echo e(date('d-m-Y',strtotime($tcnrequests->addedDate))); ?></b></div>
                <div class="col-md-6 col-xs-12 divTableCell">Doc Verified By<b class="data-lab"><?php echo e(Controller::userCode($tcnrequests->docVerifiedId)); ?></b></div>
              <div class="col-md-6 col-xs-12 divTableCell">Doc Verified Date<b class="data-lab"><?php echo e(date('d-m-Y h:i:A',strtotime($tcnrequests->docVerifiedDate))); ?></b></div>
              <div class="col-md-6 col-xs-12 divTableCell">Remarks<b class="data-lab"> <?php echo e($tcnrequests->reason); ?></b></div>


            </div>
        </div>
        </div>    
        </div>

	<div class="col-lg-12">
		<div class="row">
			<div class="panel panel-warning">
				<div class="panel-heading font-bold">PAYMENT DETAILS
				</div>
				<div class="panel-body">
					<?php if($tcnrequests->status=='Pending' && $tcnrequests->paymentReceived=='Pending' && $tcnrequests->docVerified!='Pending' ): ?>
					<div class="row">
						<div class="col-sm-2">
						<strong>Payment Received</strong>
						</div>
						<div class="col-sm-2">
						<select id="paymentReceived" name="paymentReceived" class="chosen-select form-control" onchange="paymentReceived()">
						<option value="0">Select</option>
						<option value="Yes">Yes</option>
						<option value="No">No</option>
						</select><span class="paymentReceivedspan text-danger"></span>
						</div>
					</div>
					<div class="col-sm-12" id="paymentDiv">
						<div class="row">
							<div class="col-sm-12">
							<div class="col-sm-4">
								<label>Unit</label> 
								<input type="text" name="unit" id="unit" value="<?php echo e($tcnrequests->unit); ?>" class="form-control" readonly="">					
							</div>

							<div class="col-sm-4">
								<label>Amount <b> (<?php echo e($tcnrequests->currencyType); ?>)</b></label>
								<input type="text" name="amount" id="amount" value="<?php echo e($tcnrequests->amount); ?>" class="form-control" readonly/><span id="error_msg" class="text-danger"></span>
							</div>

							<div class="col-sm-4">
								<label>Convert Amount <b>( INR )</b></label>
								<input type="text" name="inrAmount" id="inrAmount" value="<?php if($tcnrequests->currencyType!='INR'): ?><?php echo e(Controller::currencyConverter($tcnrequests->currencyType,'INR',$tcnrequests->amount)); ?><?php else: ?><?php echo e($tcnrequests->amount); ?><?php endif; ?>"  class="form-control" readonly /><span id="error_msg" class="text-danger"></span>
							</div>
							</div>	
						</div>


						<div class="row">
							<div class="col-sm-12">
							<div class="col-sm-4">
								<label>Payment Mode</label> 
								<select name="paymentMode" id="paymentMode" class="chosen-select col-sm-12">
									<option value="cheque" <?php if($tcnrequests->paymentMode=='cheque'): ?><?php echo e('selected'); ?> <?php endif; ?>>CHEQUE</option>

									<option value="DD" <?php if($tcnrequests->paymentMode=='DD'): ?><?php echo e('selected'); ?> <?php endif; ?>>DD</option>

									<option value="online" <?php if($tcnrequests->paymentMode=='online'): ?><?php echo e('selected'); ?> <?php endif; ?>>ONLINE TRANSFERS</option>
									<option value="cash" <?php if($tcnrequests->paymentMode=='cash'): ?><?php echo e('selected'); ?> <?php endif; ?>>CASH</option>

									<option value="other" <?php if($tcnrequests->paymentMode=='other'): ?><?php echo e('selected'); ?> <?php endif; ?>>OTHERS</option>
								</select>						
							</div>

							<div class="col-sm-4">Received Date<span style="color:red;">*</span>
								<input class="form-control" readonly data-date-end-date="0d" type="text" id="receivedDate" name="receivedDate" value="<?php echo e(date('d-m-Y')); ?>"><span id="error_msg" class="text-danger"></span>
							</div>

							<div class="col-sm-4">
								<label>Transaction Number<span style="color:red;">*</span></label>
								<input type="text" name="transactionNumber" id="transactionNumber" value="<?php echo e($tcnrequests->transactionNumber); ?>"  class="form-control" /><span id="error_msg" class="text-danger"></span>
							</div>
							</div>	
						</div>



						<div class="row">
							<div class="col-sm-12">
							<div class="col-sm-4">
								<label>Heera Account number</label>
								<input type="text" name="accountNumber" id="accountNumber" value="<?php echo e($tcnrequests->heeraaccount->accountNumber); ?>" class="form-control" readonly/><span id="error_msg" class="text-danger"></span>
							</div>
							<div class="col-sm-4">
								<label>Bank</label>
								<input type="text" name="bankName" id="bankName" value="<?php echo e($tcnrequests->heeraaccount->bankName); ?>" class="form-control" readonly /><span id="error_msg" class="text-danger"></span>
							</div>

							<div class="col-sm-4">
								<label>Branch</label>
								<input type="text" name="branchName" id="branchName" value="<?php echo e($tcnrequests->heeraaccount->branchName); ?>" class="form-control" readonly/><span id="error_msg" class="text-danger"></span>
							</div>
							</div>
						</div>
					</div>
					<?php endif; ?>
					<div class="row">
						<div class="col-sm-12 text-center">
							<div class="col-lg-2"></div>
							<div class="col-lg-8" id="Remarks-div">
							<label class="font-bold" style="font-size: 16px">Remarks<span style="color:red;">*</span></label><br>
							<textarea class="form-control" name="reason" id="reason" cols="80" ></textarea>
							<br><br>
							</div>
						</div>
						<div class="col-sm-12 text-center">	
							<button class="btn btn-success" onclick="setApprovalStatus('Approved')" type="button" id="saveapprove">Approve</button>&nbsp;&nbsp;&nbsp;

							<button class="btn btn-danger" onclick="setApprovalStatus('Denied')" id="deny">Deny</button>

							<button class="btn btn-primary" onclick="window.history.go(-1)">Cancel</button>

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
noBack();
window.history.forward(1);
function noBack(){
window.history.forward();
}

function setApprovalStatus(status)
{

	var button 	= $('#button').val();
	var tcnId 	= $('#tcnId').val();
	var userId 	= $('#userId').val();
	var reason 	= $('#reason').val();
	var sw 		= 'info';
	var cc      = "#10a72c";

	
	if(status=='Approved' && button=='Payment')
		{ var s='Approve'; var text='Are You Sure,You want to Approve This Request.'; var cbt='Approve'; }
	if(status=='Denied')
		 {var s='Confirm!!'; var text='Are You Sure,You want to Deny This Request';  var cc = "#ea467a"; var sw ='warning';  var cbt='Deny'; }








		var paymentReceived = $('#paymentReceived').val();

		if(paymentReceived=='0')
		{
		$(".paymentReceivedspan").html('Select  Yes/No ');
		returns = false;
		}
		else
		$(".paymentReceivedspan").html('');	


		if(paymentReceived=='Yes')
		{	
			var returns =true;
			$('span.error_msg').html('');
			$("#paymentDiv input").each(function()
			{	

			if(!this.value)
			{	if(this.id)
			{
			returns = false;
			$(this).next().html("Field needs filling");
			}              
			}
			else
			$(this).next().html("");
			});
		}
		if(returns==false)
		return;

		if(paymentReceived=='Yes')
			var datas= $('#paymentDiv').find("select, input").serialize()+'&paymentReceived='+paymentReceived+'&reason='+reason;

		if(paymentReceived=='No')
			var datas='paymentReceived='+paymentReceived+'&reason='+reason;	

	if(reason=="" || reason==null)
	{
	$('#reason').focus().css("border","1px solid red");
	return ;
	}

      swal({
        title: s,
        text: text,
        type: sw,
        showCancelButton: true,
        confirmButtonColor: cc,
        confirmButtonText: cbt,
        cancelButtonClass: "btn-info",
        closeOnConfirm: true
      }, 
      function (isConfirm) 
      {
        if (isConfirm) 
        {	


			$.ajax({
			     type: "get",
			     url: "<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/create",
			     data:datas+'&opcode=30&userId='+userId+'&tcnId='+tcnId+'&status='+status+'&button='+button,
			     success: function (data) {

			     	var data=data.replace(/\s/g, '');
			     	// if(data==0)
			     	window.location="<?php echo e(URL::to('/')); ?>/admin/tcnApplicationForm/view@@@"+data;
			     	// if(status=='Approved')
			     	// ApprovePDF(data);
			     }
			 	 });
        }
        else
        {
          return ;
        }   
      }); 

}

function ApprovePDF(id)
{
  		swal({title:'Approved',text:'This TCN Payment Is Received and Approved Successfully',type:'success',timer:'3800'},
  		function () {
window.history.forward(1);
window.location="<?php echo e(URL::to('/')); ?>/admin/tcnviewprintpdf/"+id

function noBack(){
window.history.forward();
}
       	});

}


function paymentReceived()
{
	var paymentReceived = $('#paymentReceived').val();

	if(paymentReceived!='0')
	$('#Remarks-div').show();
	else
	$('#Remarks-div').hide();


	if(paymentReceived=='Yes' && paymentReceived!='0')
	{
	$('#paymentDiv').css('display','block');
	 $('#saveapprove').show();
	 $('#deny').hide();

	}
	else
	{
	$('#paymentDiv').css('display','none');
	 $('#saveapprove').hide();
	 $('#deny').show();
	}
	$(".chosen-select").chosen();
}


$(".chosen-select").chosen({width:'100%'});

$( "#receivedDate").datepicker({format:'dd-mm-yyyy',autoclose: true});


paymentReceived();
</script>


<script type="text/javascript">

</script>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>