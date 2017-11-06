<?php
/**
 * Created by PhpStorm.
 * User: Developer1
 * Date: 09-10-2017
 * Time: 12:43
 */
?>


<?php $__env->startSection('shift_name',$edit_hr_shift->shift_name); ?>
<?php $__env->startSection('department',$edit_hr_shift->department); ?>
<?php $__env->startSection('description',$edit_hr_shift->description); ?>
<?php $__env->startSection('time_in',\Carbon::parse($edit_hr_shift->time_in)->format('G:i')); ?> 
<?php $__env->startSection('time_out',\Carbon::parse($edit_hr_shift->time_out)->format('G:i')); ?>
<?php $__env->startSection('break_in',\Carbon::parse($edit_hr_shift->break_in)->format('G:i')); ?>
<?php $__env->startSection('break_out',\Carbon::parse($edit_hr_shift->break_out)->format('G:i')); ?>
<?php $__env->startSection('break_time',$edit_hr_shift->break_time); ?>
<?php $__env->startSection('edit_id',$edit_hr_shift->id); ?>
<?php $__env->startSection('edit'); ?>
    <?php echo e(method_field('PUT')); ?>

<?php $__env->stopSection(); ?>
 
<?php echo $__env->make('hr.shift.index', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>