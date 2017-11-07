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
      		Qualification <span class="pull-right"><a data-toggle="modal" data-target="#qualificationModal" href="#" class="btn  btn-link "><i class="fa fa-pencil-square-o" aria-hidden="true"></i> Edit</a></span>
      	</div>
        <table class="table">
          <thead>
            <tr>
              <th>Course</th>
               <th>Institution/University</th>
               <th>Year Of Passing</th>
               <th>Marks</th>
               <th>Specialization</th>
            </tr>
          </thead>
          <tbody>
             <?php $__currentLoopData = $qualification; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($element->course); ?></td>
              <td><?php echo e($element->university); ?></td>
              <td><?php echo e($element->pass_out); ?></td>
              <td><?php echo e($element->marks); ?></td>
              <td><?php echo e($element->specialization); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      	 
       
         </div>
      </div>
      </div>


      
   <div id="qualificationModal" class="modal fade" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
       <form id="form_qualification" method="post" enctype="multipart/form-data">
        <?php echo e(csrf_field()); ?>

        <input type="hidden" name="_id" id="_id" value="<?php echo e($id); ?>">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Qualification <span class="pull-right"><a  href="#" class="btn add-new-row btn-link"><i class="fa fa-plus" aria-hidden="true"></i> Add New</a></span></h4>

        
      </div>
      <div class="modal-body" >
         <?php $__currentLoopData = $qualification; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
       <div class="row qualification_modal" >
          <div class="col-sm-2">
              <div class="form-group">
              <label for="name">Course:</label>
              <input type="text" class="form-control" id="course[]" name="course[]" value="<?php echo e($element->course); ?>">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Institution/University:</label>
              <input type="text" class="form-control" id="instute[]" name="instute[]" value="<?php echo e($element->university); ?>">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
              <label for="name">Year Of Passing:</label>
              <input type="text" class="form-control" id="year_passing[]" name="year_passing[]" value="<?php echo e($element->pass_out); ?>">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
              <label for="name">Marks(%):</label>
              <input type="text" class="form-control" id="year_marks[]" name="year_marks[]" value="<?php echo e($element->marks); ?>">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
              <label for="name">Specialization:</label>
              <input type="text" class="form-control" id="special[]" name="special[]" value="<?php echo e($element->specialization); ?>">
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
        <div class="row qualification_modal hide" id="qualification_modal">
          <div class="col-sm-2">
              <div class="form-group">
              <label for="name">Course:</label>
              <input type="text" class="form-control" id="course[]" name="course[]" value="">
              </div>
            </div>
            <div class="col-sm-3">
              <div class="form-group">
              <label for="name">Institution/University:</label>
              <input type="text" class="form-control" id="instute[]" name="instute[]" value="">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
              <label for="name">Year Of Passing:</label>
              <input type="text" class="form-control" id="year_passing[]" name="year_passing[]" value="">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
              <label for="name">Marks(%):</label>
              <input type="text" class="form-control" id="year_marks[]" name="year_marks[]" value="">
              </div>
            </div>
            <div class="col-sm-2">
              <div class="form-group">
              <label for="name">Specialization:</label>
              <input type="text" class="form-control" id="special[]" name="special[]" value="">
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
  
</div></div></div>

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
    $('.qualification_modal:first-child').find('.remove-row').hide();
		// $('body').on('click','.view-employee',function(e){
  //         e.preventDefault();
  //         alert(1);
		// });
    $('.add-new-row').click(function(e){
       e.preventDefault();
       var $template = $('#qualification_modal'),
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
      $(this).parents('.qualification_modal').remove();
    });

    $('#form_qualification').submit(function(e){
      e.preventDefault();
      $.post('<?php echo e(URL::to('/')); ?>/hr/employee/qualificaton/update',$(this).serialize(),function(data){
                if(data.result){
                               sweetAlert("Qualification Updated!",'' , "success");
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