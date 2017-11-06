<?php $__env->startSection('deduction',$editdeduction->type_of_deduction); ?>
<?php $__env->startSection('amount',$editdeduction->amount); ?>
<?php $__env->startSection('edit_id',$editdeduction->id); ?>
<?php $__env->startSection('edit'); ?>
<?php echo e(method_field('PUT')); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('hr.master.deduction', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>