<?php $__env->startSection('departmentname',$editdepartment->department_name); ?>
<?php $__env->startSection('edit_id',$editdepartment->id); ?>
<?php $__env->startSection('edit'); ?>
<?php echo e(method_field('PUT')); ?>

<?php $__env->stopSection(); ?>
 
<?php echo $__env->make('hr.master.department', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>