<?php $__env->startSection('category_name',$editcategory->category_name); ?>
<?php $__env->startSection('employee_code',$editcategory->employee_code); ?>
<?php $__env->startSection('edit_id',$editcategory->id); ?>
<?php $__env->startSection('edit'); ?>
<?php echo e(method_field('PUT')); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.category.categorymaster', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>