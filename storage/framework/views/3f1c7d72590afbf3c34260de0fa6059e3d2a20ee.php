<?php $__env->startSection('banner'); ?>
  <div class="col-lg-12" align="center" style="background-color:#ffcf29">
  <img src="<?php echo e(URL::asset('img/new_heading.png')); ?>" class="img-responsive">
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/jquery.timepicker.css')); ?>" />
<link rel="stylesheet" type="text/css" href="<?php echo e(URL::asset('css/daterangepicker.css')); ?>" />
<link rel="stylesheet" href="<?php echo e(URL::asset('css/sweetalert.css')); ?>" type="text/css" />
<style type="text/css">
#installationForm .tab-content {
    margin-top: 20px;
}
 #installationForm  .form-group {
    margin-right: 0px !important;
    margin-left: 0px !important;
}
.btn-link,.btn-link:hover {
    color: #796b20;
}
.modal-header .btn-link,.modal-header .btn-link:hover{
  color: #000;
}
</style>
<div class="app-content-body fade-in-up ng-scope" ui-view="" style=""><div  class="fade-in-down ng-scope"><div class="hbox hbox-auto-xs hbox-auto-sm ng-scope">
  <div class="col">
    <?php echo $__env->make('hr.employee.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
    <div class="padder">      
    	<br/>
    	
 

	

  <div class="row" style="margin-top:15px;">
      <div class="col-sm-12">
      <div class="panel-warning">
      	<div class="panel-heading">
      		Family <span class="pull-right"><a data-toggle="modal" data-target="#familyModal" href="#" class="btn  btn-link "><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></span>
      	</div>
        <table class="table">
          <thead>
            <tr>
              <th>Name</th>
               <th>Relation with Employee</th>
               <th>Gender</th>
               <th>Mobile</th>
            </tr>
          </thead>
          <tbody>
             <?php $__currentLoopData = $family; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($element->name); ?></td>
              <td><?php echo e($element->relationship); ?></td>
              <td><?php echo e($element->gender); ?></td>
              <td><?php echo e($element->mobile); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      	 
       
         </div>
      </div>
      </div>


      
   <div id="familyModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
       <form id="form_family" method="post" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="_id" id="_id" value="<?php echo e($id); ?>">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Family Details <span class="pull-right"><a  href="#" class="btn add-new-row btn-link"><i class="fa fa-plus" aria-hidden="true"></i> Add New</a></span></h4>

        
      </div>
      <div class="modal-body" >
         <?php $__currentLoopData = $family; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <div class="row family_modal" >
           
           <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control f_name" id="f_name" name="f_name[]" value="<?php echo e($element->name); ?>">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Relation with Employee:</label>
              <select class="form-control" id="f_relation" name="f_relation[]" >
                <option value="">Select</option>
                <option <?php echo e(($element->relationship=='Father')?'selected':''); ?>>Father</option>
                <option <?php echo e(($element->relationship=='Mother')?'selected':''); ?>>Mother</option>
                <option <?php echo e(($element->relationship=='Brother')?'selected':''); ?>>Brother</option>
                <option <?php echo e(($element->relationship=='Sister')?'selected':''); ?>>Sister</option>
                <option <?php echo e(($element->relationship=='Husband')?'selected':''); ?>>Husband</option>
                <option <?php echo e(($element->relationship=='Wife')?'selected':''); ?>>Wife</option>
                <option <?php echo e(($element->relationship=='Others')?'selected':''); ?>>Others</option>
              </select>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
              <label for="name">Gender:</label>
              <select type="text" class="form-control" id="f_gender" name="f_gender[]">
                <option value="">Select</option>
                <option value="Male" <?php echo e(($element->gender=='Male')?'selected':''); ?>>Male</option>
                <option value="Female" <?php echo e(($element->gender=='Female')?'selected':''); ?>>Female</option>
              </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Mobile:</label>
              <input type="text" class="form-control" id="f_mobile" name="f_mobile[]" value="<?php echo e($element->mobile); ?>">
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-group">
                <br/>
                <label for="name">&nbsp;</label>
              <button type="button" class="btn btn-sm remove-row" ><i class="fa fa-times" aria-hidden="true"></i></button>
             </div>
            </div>
        </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        <div class="row family_modal hide" id="family_modal">
           
           <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Name:</label>
              <input type="text" class="form-control f_name" id="f_name" name="f_name[]">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Relation with Employee:</label>
              <select class="form-control" id="f_relation" name="f_relation[]">
                <option value="">Select</option>
                <option >Father</option>
                <option >Mother</option>
                <option >Brother</option>
                <option >Sister</option>
                <option >Husband</option>
                <option >Wife</option>
                <option >Others</option>
              </select>
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
              <label for="name">Gender:</label>
              <select type="text" class="form-control" id="f_gender" name="f_gender[]">
                <option value="">Select</option>
                <option value="Male">Male</option>
                <option value="Female">Female</option>
              </select>
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Mobile:</label>
              <input type="text" class="form-control" id="f_mobile" name="f_mobile[]">
              </div>
            </div>
            <div class="col-sm-1">
              <div class="form-group">
                <br/>
                <label for="name">&nbsp;</label>
              <button type="button" class="btn btn-sm remove-row" ><i class="fa fa-times" aria-hidden="true"></i></button>
             </div>
            </div>
        </div>
      </div>
      <div class="modal-footer">

        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-info" >Update</button>
      </div>
      </form>
    </div>

  </div>
</div>
   

  </div>

    </div>
  </div>
  </div></div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script src="<?php echo e(URL::asset('js/moment.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/wizard/jquery.bootstrap.wizard.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/wizard/form_wizard.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/bootstrap-datepicker.min.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/jquery.timepicker.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/timerange/datepair.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/timerange/jquery.datepair.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/daterangepicker.js')); ?>"></script>
<script src="<?php echo e(URL::asset('js/sweetalert.min.js')); ?>"></script>
<script>
	$(function(){
    $('.form_family:first-child').find('.remove-row').hide();
    // $('body').on('click','.view-employee',function(e){
  //         e.preventDefault();
  //         alert(1);
    // });
    $('.add-new-row').click(function(e){
       e.preventDefault();
       var $template = $('#family_modal'),
                $clone    = $template
                                .clone()
                                .removeAttr('id')
                                .removeClass('hide')
                                .insertBefore($template);

                                $clone.find('.remove-row')
                                .show();
                                $clone.find('.form-control').val('');

                                
    });
    $('body').on('click','.remove-row',function(e){
      e.preventDefault();
      $(this).parents('.family_modal').remove();
    });
    $('#form_family').submit(function(e){
      e.preventDefault();
      $.post('<?php echo e(URL::to('/')); ?>/hr/employee/family/update',$(this).serialize(),function(data){
                if(data.result){
                               sweetAlert("Family Details Updated!",'' , "success");
                                 location.reload();
                              }else{
                                sweetAlert("Oops...",data.msg , "error");
                              }
      },'json');
    });
  })
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>