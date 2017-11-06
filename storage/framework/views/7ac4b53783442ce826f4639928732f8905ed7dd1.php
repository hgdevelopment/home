<?php $__env->startSection('religion_name',$editreligion->religion_name); ?>
<?php $__env->startSection('edit_id',$editreligion->id); ?>
<?php $__env->startSection('edit'); ?>
<?php echo e(method_field('PUT')); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('hr.master.religionmaster', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>