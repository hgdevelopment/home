<?php $__env->startSection('fullname',$memberedit->name); ?>
<?php $__env->startSection('guardian',$memberedit->guardian); ?>
<?php $__env->startSection('religion',$memberedit->religion); ?>
<?php $__env->startSection('caste',$memberedit->caste); ?>
<?php $__env->startSection('dateofbirth',$memberedit->dob); ?>
<?php $__env->startSection('education',$memberedit->education); ?>
<?php $__env->startSection('marital',$memberedit->maritalStatus); ?>
<?php $__env->startSection('occupation',$memberedit->occupation); ?>
<?php $__env->startSection('gender',$memberedit->gender); ?>
<?php $__env->startSection('country',$memberedit->countryId); ?>
<?php $__env->startSection('income',$memberedit->incomeAmount); ?>
<?php $__env->startSection('incomeid',$memberedit->incomeCurrencytype); ?>
<?php $__env->startSection('childrens',$memberedit->noOfChildren); ?>
<?php $__env->startSection('mobileno',$memberedit->mobileNo); ?>
<?php $__env->startSection('conId12',$memberedit->mobileId); ?>
<?php $__env->startSection('landlineno',$memberedit->LandlineNo); ?>
<?php $__env->startSection('email',$memberedit->email); ?>
<?php $__env->startSection('aboutheera',$memberedit->aboutHeera); ?>
<?php $__env->startSection('signature',$memberedit->singnature); ?>
<?php $__env->startSection('amount_inr',json_decode($memberedit->membership_details)->inr->amount); ?>
<?php $__env->startSection('amount_aed',json_decode($memberedit->membership_details)->aed->amount); ?>
<?php $__env->startSection('amount_usd',json_decode($memberedit->membership_details)->usd->amount); ?>
<?php $__env->startSection('amount_sar',json_decode($memberedit->membership_details)->sar->amount); ?>
<?php $__env->startSection('amount_cad',json_decode($memberedit->membership_details)->cad->amount); ?> 
<?php $__env->startSection('type_amount_inr',json_decode($memberedit->membership_details)->inr->type); ?>
<?php $__env->startSection('type_amount_aed',json_decode($memberedit->membership_details)->aed->type); ?>
<?php $__env->startSection('type_amount_usd',json_decode($memberedit->membership_details)->usd->type); ?>
<?php $__env->startSection('type_amount_sar',json_decode($memberedit->membership_details)->sar->type); ?>
<?php $__env->startSection('type_amount_cad',json_decode($memberedit->membership_details)->cad->type); ?> 
<?php $__env->startSection('photo',$memberedit->photo); ?>
<?php $__currentLoopData = $memberaddress; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $address): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if($address->typeOfAddress=='permanent'): ?>
<?php $__env->startSection('per_address',$address->address); ?>
<?php $__env->startSection('per_city',$address->city); ?>
<?php $__env->startSection('per_state',$address->state); ?>
<?php $__env->startSection('per_country',$address->Country); ?>
<?php $__env->startSection('per_pin',$address->pin); ?>
<?php endif; ?>
<?php if($address->typeOfAddress=='correspondance'): ?>
<?php $__env->startSection('corr_address',$address->address); ?>
<?php $__env->startSection('corr_city',$address->city); ?>
<?php $__env->startSection('corr_state',$address->state); ?>
<?php $__env->startSection('corr_country',$address->Country); ?>
<?php $__env->startSection('corr_pin',$address->pin); ?>
<?php endif; ?>
<?php if($address->typeOfAddress=='official'): ?>
<?php $__env->startSection('official_addr',$address->address); ?>
<?php $__env->startSection('official_city',$address->city); ?>
<?php $__env->startSection('official_state',$address->state); ?>
<?php $__env->startSection('official_country',$address->Country); ?>
<?php $__env->startSection('official_pin',$address->pin); ?>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php $__env->startSection('proofId',$memberproof->typeOfProof); ?>
<?php $__env->startSection('proof_number',$memberproof->proofNumber); ?>
<?php $__env->startSection('proof_file',$memberproof->file); ?>
<?php $__env->startSection('idproof',$memberproof->idproof); ?> 
<?php $__env->startSection('edit_id',$memberedit->userId); ?> 
<?php $__env->startSection('edit'); ?>
<?php echo e(method_field('PUT')); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.members.editCreatedMemberView', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>