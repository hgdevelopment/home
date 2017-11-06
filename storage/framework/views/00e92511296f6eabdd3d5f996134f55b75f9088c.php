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
 <?php 
  if($tcnrequests->docVerified=='Pending' && $tcnrequests->status=='Pending')
  { $button='Document';
  }

  if($tcnrequests->docVerified!='Pending' && $tcnrequests->paymentReceived=='Pending' && $tcnrequests->status=='Pending')
  { $button='Payment';
  }

  if($tcnrequests->status=='Denied')
  { $button='Denied';
  }

  if($tcnrequests->status=='Pending' && $tcnrequests->docVerified=='Pending' && $tcnrequests->paymentReceived=='Pending' && $tcnrequests->approvalId!='0')
  { $button='Reapprove';
  }

  if($tcnrequests->status=='Pending' && $tcnrequests->docVerified=='Pending' && $tcnrequests->paymentReceived=='Pending' && $tcnrequests->approvalId=='0')
  { $button='Pending';
  }

  if($tcnrequests->status=='Approved')
  { $button='Approve';
  }
  if($tcnrequests->status=='Transfered')
  { $button='Transfer';
  }
   ?>




<div class="bg-light lter b-b wrapper-md">
  <h1 class="m-n font-normal h3">TCN Application View</h1>
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
                  <div class="col-md-6 col-xs-12 divTableCell">Heera Account No<b class="data-lab"><?php echo e($tcnrequests->heeraaccount->accountNumber); ?></b></div>
                 
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

	<?php if($button=='Approve'): ?>
	<div class="col-lg-12">
		<div class="row">
			<div class="panel panel-warning">
				<div class="panel-heading font-bold">PAYMENT RECEIVED DETAILS</div>
				<div class="panel-body">
					<div class="row">
						<div class="col-sm-2">Payment&nbsp;Mode</div>
						<div class="col-sm-2 font-bold"><?php echo e($paymentdetail->payment_mode); ?></div>
						<div class="col-sm-2">Amount</div>
						<div class="col-sm-2 font-bold"><?php echo e($tcnrequests->amount); ?></div>
						<div class="col-sm-2">Transaction&nbsp;No</div>
						<div class="col-sm-2 font-bold"><?php echo e($paymentdetail->transactionNumber); ?></div>
					</div><div class="row">&nbsp;</div>

					<div class="row">
						<div class="col-sm-2">Bank</div>
						<div class="col-sm-2 font-bold"><?php echo e($paymentdetail->bank); ?></div>
						<div class="col-sm-2">Branch</div>
						<div class="col-sm-2 font-bold"><?php echo e($paymentdetail->branch); ?></div>
						<div class="col-sm-2">Received Date</div>
						<div class="col-sm-2 font-bold"><?php echo e(date('d-m-Y h:i:A',strtotime($tcnrequests->paymentReceivedDate))); ?></div>
					</div>
				</div>
			</div>
		</div>	
	</div>
	<?php endif; ?>

	<?php 	
	function TCNuserID($id)
	{

	$user=DB::table('logins')->where('id',$id)->get();
	foreach($user as $user)
	return $user->username;
	}
	 ?>

	<div class="col-lg-12">
		<div class="row">
			<div class="panel panel-warning">
				<div class="panel-heading font-bold">APPROVAL DETAILS
				</div>
				<div class="panel-body">
					<?php if($tcnrequests->status!='Transfered'): ?>
					  <div class="col-md-6 col-xs-12 divTableCell">TCN Applied By<b class="data-lab">
					  <?php if($tcnrequests->addedId=='0'): ?><?php echo e('MEMBER'); ?><?php else: ?><?php echo e(TCNuserID($tcnrequests->addedId)); ?><?php endif; ?></b></div>
					  <div class="col-md-6 col-xs-12 divTableCell">Applied Date<b class="data-lab"><?php echo e(date('d-m-Y',strtotime($tcnrequests->addedDate))); ?></b></div>
                  
                        	<?php if($tcnrequests->status!='Denied'): ?>

                        <div class="col-md-6 col-xs-12 divTableCell">Document Status<b class="data-lab"><?php echo e($tcnrequests->docVerified); ?></b></div>
                        <div class="col-md-6 col-xs-12 divTableCell">Payment Status<b class="data-lab"><?php echo e($tcnrequests->paymentReceived); ?></b></div>
                           
					      	<?php if($tcnrequests->docVerified!='Pending'): ?>

                           
                        <div class="col-md-6 col-xs-12 divTableCell">Doc Verified Bys<b class="data-lab"><?php echo e(TCNuserID($tcnrequests->docVerifiedId)); ?></b></div>
                        <div class="col-md-6 col-xs-12 divTableCell">Doc Verified Date<b class="data-lab"><?php echo e(date('d-m-Y h:i:A',strtotime($tcnrequests->docVerifiedDate))); ?></b></div>
                         <div class="col-md-6 col-xs-12 divTableCell">Remarks<b class="data-lab"> <?php echo e($tcnrequests->reason); ?></b></div>

                           <?php endif; ?>	
                             <?php endif; ?>
                                    <?php endif; ?>

						<?php if($tcnrequests->paymentReceived!='Pending'): ?>
						<?php 
						$payment=DB::table('paymentdetails')->where('id',$tcnrequests->paymentId)->get();
						foreach($payment as $payment)
						 ?>
                         


                             <div class="col-md-6 col-xs-12 divTableCell">Approved By<b class="data-lab"><?php echo e(TCNuserID($payment->addedId)); ?></b></div>
                             <div class="col-md-6 col-xs-12 divTableCell">Approved Date<b class="data-lab"><?php echo e(date('d-m-Y h:i:A',strtotime($tcnrequests->paymentReceivedDate))); ?></b></div>
                             <div class="col-md-6 col-xs-12 divTableCell">Remarks<b class="data-lab"><?php echo e($payment->remarks); ?></b></div>
                             <?php if($tcnrequests->transferedReason!=''): ?>
                             <div class="col-md-6 col-xs-12 divTableCell">Transfered TCN  <b class="data-lab"><?php echo e($tcnrequests->transferedReason); ?></b></div>
                             <?php endif; ?>
                             <?php endif; ?>
                               


						<?php if($tcnrequests->status=='Pending' && $tcnrequests->docVerified=='Pending' && $tcnrequests->paymentReceived=='Pending' && $tcnrequests->approvalId!='0'): ?>

                              <div class="col-md-6 col-xs-12 divTableCell">Reapproval Send By<b class="data-lab"><?php echo e(TCNuserID($tcnrequests->approvalId)); ?></b></div>
                             <div class="col-md-6 col-xs-12 divTableCell">Reapproval Date<b class="data-lab"><?php echo e(date('d-m-Y h:i:A',strtotime($tcnrequests->approvalDate))); ?></b></div>
                             <div class="col-md-6 col-xs-12 divTableCell">Remarks<b class="data-lab"><?php echo e($tcnrequests->reason); ?></b></div>
                        
                           <?php endif; ?>
                         

                          <?php if($tcnrequests->status=='Denied'): ?>

                             <div class="col-md-6 col-xs-12 divTableCell">Denied By<b class="data-lab"> <?php echo e(TCNuserID($tcnrequests->approvalId)); ?></b></div>
                             <div class="col-md-6 col-xs-12 divTableCell">Denied Date<b class="data-lab"><?php echo e(date('d-m-Y h:i:A',strtotime($tcnrequests->approvalDate))); ?></b></div>
                             <div class="col-md-6 col-xs-12 divTableCell">Remarks<b class="data-lab"><?php echo e($tcnrequests->reason); ?></b></div>
                                 <?php endif; ?>
                                

                                
				     	<?php if($tcnrequests->status=='Removed'): ?>

                         <div class="col-md-6 col-xs-12 divTableCell">Removed By<b class="data-lab"> <?php echo e(TCNuserID($tcnrequests->approvalId)); ?></b></div>
                         <div class="col-md-6 col-xs-12 divTableCell">Removed Date<b class="data-lab"> <?php echo e(date('d-m-Y h:i:A',strtotime($tcnrequests->approvalDate))); ?></b></div>
                         <div class="col-md-6 col-xs-12 divTableCell">Remark<b class="data-lab"> <?php echo e($tcnrequests->reason); ?></b></div>
                         <?php endif; ?>


                          <?php if($tcnrequests->status=='Transfered'): ?>

                         <div class="col-md-6 col-xs-12 divTableCell">TCN Transfered Byy<b class="data-lab"> <?php if($tcnrequests->addedId=='0'): ?><?php echo e('MEMBER'); ?><?php else: ?><?php echo e(TCNuserID($tcnrequests->addedId)); ?><?php endif; ?></b></div>
                        
                         <div class="col-md-6 col-xs-12 divTableCell">Remark<b class="data-lab"><?php echo e($tcnrequests->transferedReason); ?></b></div>
                         <?php endif; ?>
				</div>
			</div>
		</div>	
	</div>


</div>


<?php $__env->stopSection(); ?>

<?php $__env->startSection('jquery'); ?>
<?php if(Session::has('sweet_alert.alert')): ?>
    <script>
        swal({
            text: "<?php echo Session::get('sweet_alert.text'); ?>",
            title: "<?php echo Session::get('sweet_alert.title'); ?>",
            timer: <?php echo Session::get('sweet_alert.timer'); ?>,
            type: "<?php echo Session::get('sweet_alert.type'); ?>",
            // showConfirmButton: "!! Session::get('sweet_alert.showConfirmButton') !!}",
            // confirmButtonText: "!! Session::get('sweet_alert.confirmButtonText') !!}",
            // confirmButtonColor: "#AEDEF4",
            // showCancelButton: false,
            // closeOnConfirm: true
<?php  
            Session::Forget('sweet_alert');  ?>
            // more options
        });
    </script>
<?php endif; ?>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>