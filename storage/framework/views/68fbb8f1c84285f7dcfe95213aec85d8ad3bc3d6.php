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
<style type="text/css">
    .leave{
    border-bottom: 2px solid red;
    }
    .holiday{
    border-bottom: 2px solid yellow;
    }
    .fullday{
    border-bottom: 2px solid green;
    }
    .halfday{
    border-bottom: 2px solid skyblue;
    }
    .editt{
        float: right;
    }
    .editt:hover{
        float: right;
        font-weight: bold;
        cursor: pointer;
    }
</style>


      
       
      <!-- streamline -->

      <div class="col-sm-6" style="margin-top: 10px;">
          <div class="panel panel-default" style="border: none;">
            <div class="panel-heading">
              <div class="clearfix">
                <div class="clear">
                  <div class="h3 m-t-xs m-b-xs">
                   October 2017 so far,
                  </div>
                 
                </div>
              </div>
            </div>
          
            <div class="list-group no-radius alt">

                <?php  $count = count($dates);$i=0;  ?>
                <?php while($i<$count): ?>
                <?php  $date = Carbon::parse($dates[$i][0]);  ?>
               <?php if($dates[$i][1]!=''): ?>
                <li class="list-group-item ">
               <?php echo e($date->format('l jS \\of F')); ?> 
               <?php if($dates[$i][2]>0): ?> <span style="color: green;border: 1px solid #d4d4d4;border-radius: 3px;padding:0px 3px;"><?php echo e($dates[$i][2]); ?></span> <?php endif; ?>
               <?php if($dates[$i][3]>0): ?> <span style="color: red;border: 1px solid #d4d4d4;border-radius: 3px;padding:0px 3px;"><?php echo e($dates[$i][3]); ?></span> <?php endif; ?>
               <span style="color: black;border: 1px solid #d4d4d4;border-radius: 3px;padding:0px 3px;float: left;margin-right:3px; "><?php echo e($dates[$i][1]); ?></span>
               <span class="editt <?php echo e($dates[$i][1]); ?>" style="border: 1px solid #d4d4d4;border-radius: 3px;padding:0px 3px;" data-toggle="modal" data-target="#myModal<?php echo e($dates[$i][4]); ?>">Edit</span>
                </li>
                <?php endif; ?>

                <!-- Modal -->
                <div class="modal fade" id="myModal<?php echo e($dates[$i][4]); ?>" role="dialog">
                <div class="modal-dialog">
                
                  <!-- Modal content-->
                  <div class="modal-content">
                    <div class="modal-header">
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                      <h4 class="modal-title">Request for Change</h4>
                    </div>
                    <div class="modal-body">
                      <h4>DATE : <?php echo e($date->format('l jS \\of F')); ?> </h4>
                      <form method='post' action='<?php echo e(URL::to('admin/attendance/change')); ?>'>
                      <?php echo e(csrf_field()); ?>

                        <label>Select one option</label>
                        <select class='form-control' name='change'>
                          <option>Weekoff</option>
                          <option>Religion Holiday</option>
                        </select>
                        <input type="hidden" value='<?php echo e($date->format('Y-m-d')); ?>' name='date'>
                        <input type="hidden" value='<?php echo e($dates[$i][5]); ?>' name='id'><br>
                        <textarea class="form-control"  placeholder="Write more details..." name="note"></textarea><br><br>
                        <button type='submit' class="btn btn-primary" >Submit</button>
                      </form>
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    </div>
                  </div>
                  
                 </div>
                 </div>
                <!-- Modal End-->

                 <?php  $i++;   ?>
                 <?php endwhile; ?>
        



            </div>
          
          </div>
         
       </div>
       
 
      <!-- / streamline -->
  
           


       

<?php $__env->stopSection(); ?>

<?php $__env->startSection('jquery'); ?>
<script>
  $('#form').parsley();
  $('#form1').parsley();
</script>			
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>