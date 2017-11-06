<?php $__env->startSection('bank_name',$editbank->bankName); ?>
<?php $__env->startSection('account_number',$editbank->accountNumber); ?>
<?php $__env->startSection('branch',$editbank->branchName); ?>
<?php $__env->startSection('place',$editbank->place); ?>
<?php $__env->startSection('holderName',$editbank->accountHolderName); ?>
<?php $__env->startSection('ifsc',$editbank->ifsc); ?>
<?php $__env->startSection('iban',$editbank->ibanNumber); ?>
<?php $__env->startSection('edit_id',$editbank->id); ?>
<?php $__env->startSection('account_type',$editbank->typeOfAccount); ?>
<?php $__env->startSection('country',$editbank->country); ?>
<?php $__env->startSection('edit'); ?>
<?php echo e(method_field('PUT')); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.bank.bankmaster', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>