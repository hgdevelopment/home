<?php $__env->startSection('designationname',$editdesignation->designation_name); ?>
<?php $__env->startSection('deptname',$editdesignation->department_id); ?>
<?php $__env->startSection('edit_id',$editdesignation->id); ?>
<?php $__env->startSection('edit'); ?>
<?php echo e(method_field('PUT')); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('hr.master.designation', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>