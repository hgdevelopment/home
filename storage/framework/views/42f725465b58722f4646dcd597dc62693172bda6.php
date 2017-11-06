<link rel="stylesheet" href="/resources/demos/style.css">
<link href="<?php echo e(URL::asset('css/sweetalert.css')); ?>"></link>

<?php $__env->startSection('banner'); ?>
    <div class="col-lg-12" align="center" style="background-color:#ffcf29">
        <img src="<?php echo e(URL::asset('new_heading.png')); ?>" class="img-responsive">
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sidebar'); ?>
    <?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
    <div class="bg-light lter b-b wrapper-md">
        <h1 class="m-n font-thin h3">Add Shift</h1>
    </div><br>
        <?php if(trim($__env->yieldContent('edit_id'))): ?>
            <form role="form" method="post" action="<?php echo e(URL::to('/')); ?>/hr/shifts/<?php echo $__env->yieldContent('edit_id'); ?>" enctype="multipart/form-data" data-parsley-validate>
        <?php else: ?>
            <form role="form" method="post" action="<?php echo e(URL::to('/')); ?>/hr/shifts" enctype="multipart/form-data" data-parsley-validate>
        <?php endif; ?>
        <?php echo e(csrf_field()); ?>

        <?php $__env->startSection('edit'); ?>
        <?php echo $__env->yieldSection(); ?>
        <div class="row">
            <div class="col-sm-12">
                <div class="blog-post">
                    <div class="col-sm-12">
                        <div class="panel panel-default">
                            <div class="panel-heading ">
                                ADD SHIFT
                            </div>
                            <div class="panel-body">
                                <div class="col-sm-6">
                                    <label>Select Department :</label>
                                    <select class="form-control chosen-select" name="department" id="department" required data-parsley-required-message="Please Select Department Name">
                                        <option value="0">Select Department</option>
                                        <?php 
                                            $table=DB::table('hr_departments')->whereNull('deleted_at')->get();
                                         ?>
                                        <?php $__currentLoopData = $table; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $hr_departments): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($hr_departments->id); ?>"<?php if($__env->yieldContent('department')==$hr_departments->id): ?> <?php echo e('selected'); ?> <?php endif; ?>><?php echo e($hr_departments->department_name); ?></option>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Shift Name :</label>
                                    <input type="text" class="form-control" name="shift_name" id="shift_name" placeholder="Enter shift name" value="<?php echo $__env->yieldContent('shift_name'); ?>" required data-parsley-required-message="Please Enter Shift Name">
                                </div>
                                <div class="col-md-12"><br></div>
                                <div class="col-md-6">
                                    <label>Time In : </label>
                                    <input type="text" class="form-control timepicker" name="time_in" id="time_in" placeholder="Enter login time"  readonly value="<?php echo $__env->yieldContent('time_in'); ?>" required data-parsley-required-message="Please Enter TimeIn">
                                </div>
                                <div class="col-md-6">
                                    <label>Time Out :</label>
                                    <input type="text" class="form-control timepicker" name="time_out" id="time_out" placeholder="Enter logout time" readonly value="<?php echo $__env->yieldContent('time_out'); ?>" required data-parsley-required-message="Please Enter TimeOut">
                                </div>
                                <div class="col-md-12"><br></div>
                                <div class="col-md-6">
                                    <label>Break Out :</label>
                                    <input type="text" class="form-control timepicker" name="break_out" id="break_out" placeholder="Enter break out time" readonly value="<?php echo $__env->yieldContent('break_out'); ?>" required data-parsley-required-message="Please Enter BreakOut">
                                </div>
                                <div class="col-md-6">
                                    <label>Break In :</label>
                                    <input type="text" class="form-control timepicker" name="break_in" id="break_in" placeholder="Enter break in time" readonly value="<?php echo $__env->yieldContent('break_in'); ?>" required data-parsley-required-message="Please Enter BreakIn">
                                </div>
                                <div class="col-md-12"><br></div>
                                <div class="col-md-6">
                                    <label>Break Time :</label>
                                    <input type="number" class="form-control" name="break_time" id="break_time" placeholder="Enter breaktime (in Minutes)" maxlength="3" value="<?php echo $__env->yieldContent('break_time'); ?>" required data-parsley-required-message="Please Enter BreakTime">
                                </div>
                                <div class="col-md-6">
                                    <label>Description :</label>
                                    <input type="text" class="form-control" name="description" id="description" placeholder="Description" value="<?php echo $__env->yieldContent('description'); ?>">
                                </div>
                                <div class="col-md-12"><br></div>
                                <div class="col-md-6">
                                    <input type="submit" class="btn btn-success" name="save" value="Submit">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <div class="col-md-12"><br>
        <div class="panel panel-default">
            <div class="panel-heading font-bold">
                View Company
            </div>
            <div class="panel-body">
                <table class="table table-striped b-t b-light" id="empTable">
                    <thead>
                    <tr>
                        <th>Sl</th>
                        <th>Department Name</th>
                        <th>Shift Name</th>
                        <th>Time In</th>
                        <th>Time Out</th>
                        <th>Break Time</th>
                        <th>Actions</th> 
                    </tr>
                    </thead>
                    <tbody>
                    <?php $__currentLoopData = $shifts; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key=>$shift): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <tr data-expanded="true">
                            <td><?php echo e($key+1); ?> </td>
                            <td><?php echo e($shift->names); ?> </td>
                            <td><?php echo e($shift->shift_name); ?> </td>
                            <td><?php echo e($shift->time_in); ?> </td>
                            <td><?php echo e($shift->time_out); ?> </td>
                            <td><?php echo e($shift->break_time); ?> </td>
                            <td>
                                <a href="<?php echo e(URL::to('/')); ?>/hr/shifts/<?php echo e($shift->id); ?>/edit"  class="active"><i  style="color: #018001;" class="fa fa-pencil text-success text-active" aria-hidden="true"></i></a>
                                <button class="active" style="border: none;" onclick="destroy(<?php echo e($shift->id); ?>)"><i  style="color: #f05050;" class="fa fa-close text-danger text-active" aria-hidden="true"></i></button>
                            </td>
                        </tr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
    <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
    <script>
        $(".chosen-select").chosen({width:'100%'});
        $('.timepicker').timepicker({
            interval: 30,
            dynamic: false,
            dropdown: true,
            scrollbar: false
        });
        $(document).ready(function() {
            $('#empTable').DataTable( {
                order: [[ 1, 'asc' ]]
            });
        });
    </script>

    <script type="text/javascript">
  function destroy(id)
    {
      swal({
          title: "Delete!!!",
          text: "Are you sure?",
          type: "error",
          showCancelButton: true,
          confirmButtonColor: "#DD6B55", 
          confirmButtonText: "Delete Department!",
          closeOnConfirm: true
        },  
        function (isConfirm) 
        {
            if(isConfirm) 
            {
                $.ajax({
                  url: "<?php echo e(URL::to('/')); ?>/hr/shifts/"+id,
                  type: "delete",
                  data: {"_token": "<?php echo e(csrf_token()); ?>"},
                  success: function (data) 
                    { // console.log(data);  
                        
                        window.location.reload(true);
                    },
                });
            }
            else
            {
                swal("cancelled","", "error");
            }
        });
    }
</script> 
<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>