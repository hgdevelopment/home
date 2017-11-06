<?php $__env->startSection('company_name',$editCompany->company_name); ?>
<?php $__env->startSection('address1',$editCompany->address1); ?>
<?php $__env->startSection('address2',$editCompany->address2); ?>
<?php $__env->startSection('city',$editCompany->city); ?>
<?php $__env->startSection('state',$editCompany->state); ?>
<?php $__env->startSection('country',$editCompany->countryId); ?>
<?php $__env->startSection('pinNo',$editCompany->pinNo); ?>
<?php $__env->startSection('edit_id',$editCompany->id); ?>
<?php $__env->startSection('edit'); ?>
<?php echo e(method_field('PUT')); ?> 
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('hr.master.company', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>