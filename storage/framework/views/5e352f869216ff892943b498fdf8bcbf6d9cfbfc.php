<?php $__env->startSection('branch_name',$editbranch->branch_name); ?>
<?php $__env->startSection('companyId',$editbranch->company_id); ?>
<?php $__env->startSection('address1',$editbranch->address1); ?>
<?php $__env->startSection('address2',$editbranch->address2); ?>
<?php $__env->startSection('email',$editbranch->email); ?>
<?php $__env->startSection('mobileNo',$editbranch->mobileNo); ?>
<?php $__env->startSection('city',$editbranch->city); ?>
<?php $__env->startSection('state',$editbranch->state); ?>
<?php $__env->startSection('country',$editbranch->countryId); ?>
<?php $__env->startSection('pinNo',$editbranch->pinNo); ?>
<?php $__env->startSection('edit_id',$editbranch->id); ?>
<?php $__env->startSection('edit'); ?>
<?php echo e(method_field('PUT')); ?>

<?php $__env->stopSection(); ?>  
<?php echo $__env->make('hr.master.branch', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>