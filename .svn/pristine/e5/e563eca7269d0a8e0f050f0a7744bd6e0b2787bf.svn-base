<link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
<link rel="stylesheet" href="/resources/demos/style.css">

<?php $__env->startSection('banner'); ?>
<div class="col-lg-12" align="center" style="background-color:#ffcf29">
<img src="<?php echo e(URL::asset('new_heading.png')); ?>" class="img-responsive">
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('sidebar'); ?>
<?php echo $__env->make('partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php echo $__env->make('partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('body'); ?>
<link href="<?php echo asset('css/sweetalert.css'); ?>" media="all" rel="stylesheet" type="text/css" />
<div class="bg-light lter b-b wrapper-md">
	<h1 class="m-n font-thin h3">REASSIGN DSA</h1>
</div><br>
	<form action="<?php echo e(URL::to('/')); ?>/admin/reassigndsa/view" method="post"  id="form" data-parsley-validate>
	<?php echo e(csrf_field()); ?>

	<?php if(Session()->has('message')): ?>
        <div class="alert alert-info fade in alert-dismissable">
          <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
          <strong>Info!</strong> <?php echo e(Session()->get('message')); ?>

        </div>
    <?php endif; ?>
	<div class="wrapper-sm">
		<div class="row">
			<div class="col-sm-12">
				<div class="blog-post">                   
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading ">                  
								REASSIGN DSA
							</div>
							<div class="panel-body">
							<input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>" id="token">
							<div class="col-sm-6">
								<label>Member Code</label>
								<input type="text" id="membercode" name="membercode" id="membercode" class="form-control" required/>
							</div>
						
							<div class="col-sm-6">
								<label></label><br><br>
								<input type="submit"  name="submit" id="submit"  value="Submit"  class="btn btn-sm btn-success">
							</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	</form> 
	<?php if(isset($reassign)): ?>
	  
		<form action="<?php echo e(URL::to('/')); ?>/admin/reassigndsa/solve" method="post" name="form1" id="form1" >
		<?php echo e(csrf_field()); ?>

    	<div class="wrapper-sm">
		<div class="row">
			<div class="col-sm-12">
				<div class="blog-post">                   
					<div class="col-sm-12">
						<div class="panel panel-default">
							<div class="panel-heading ">                  
								Member Details
							</div>
							<div class="panel-body">
							  <?php $__currentLoopData = $reassign; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $reassigns): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
							  <input type="hidden" name="id" id="id"  class="form-control" value="<?php echo e($reassigns->id); ?>">
								<div class="col-md-4">
									<label><strong>Member Code</strong></label><br>
									<label><?php echo e($reassigns->username); ?></label>
								</div>
								<div class="col-md-4">
									<label><strong>Member Name</strong></label><br>
									<label><?php echo e($reassigns->name); ?></label>
								</div><?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								 <?php $__currentLoopData = $re; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $res): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
								<div class="col-md-4">
									<label><strong>Added By</strong></label><br>
									<label><?php echo e($res->username); ?></label>
								</div>
								<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
								<div class="col-md-12"><br></div>
								<div class="col-md-12"><br></div>
								<div class="col-md-6">
									<label><strong> RE ASSIGNED TO</strong></label><br>
									<select type="text" name="assigned" id="assigned"  class="form-control" placeholder="Assigned To" required>
										<option>select</option>
										<option>DSA</option>
										<option>ME</option>
										<option>OI</option>
									</select>
								</div>
								<div class="col-md-6" id="dsa">
									<label><strong> RE ASSIGNED TO</strong></label><br>
									<select type="text" name="assignedtodsa" id="assignedtodsa"  class="form-control" placeholder="Assigned To" >
										<option value="">Select</option>
					                    <?php $__currentLoopData = $dsa; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dsas): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					                    <option value="<?php echo e($dsas->id); ?>" ><?php echo e($dsas->username); ?></option>
					                  	<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				                    </select>
								</div>
								<div class="col-md-6" id="me">
									<label><strong> RE ASSIGNED TO</strong></label><br>
									<select type="text" name="assignedtome" id="assignedtome"  class="form-control" placeholder="Assigned To">
										<option value="">Select</option>
					                    <?php $__currentLoopData = $me; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $mes): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					                    <option value="<?php echo e($mes->id); ?>" ><?php echo e($mes->username); ?></option>
					            		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				                    </select>
								</div>
								<div class="col-md-6" id="oi">
									<label><strong> RE ASSIGNED TO</strong></label><br>
									<select type="text" name="assignedtooi" id="assignedtooi"  class="form-control" placeholder="Assigned To">
										<option value="">Select</option>
					                    <?php $__currentLoopData = $oi; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ois): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					                    <option value="<?php echo e($ois->id); ?>" ><?php echo e($ois->username); ?></option>
					            		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				                    </select>
								</div>
								<div class="col-md-12"><br></div>
								<div class="col-md-2">
								<label></label><br><br>
									<input name="submit1" type="submit" id="submit1"  value="submit" class="btn btn-sm btn-success" >
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
  </form>            
<?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script type="text/javascript" src="<?php echo asset('js/sweetalert.min.js'); ?>"></script>
<script type="text/javascript">
      $(document).ready(function()
      {
      	$("#me").hide();
      	$("#dsa").hide();
      	$("#oi").hide();
        $('#assigned').on('change', function() 
      {

      if ( this.value == 'DSA')
      {
      	
        $("#dsa").show();
        $("#me").hide();
        $("#oi").hide();

      }
       if ( this.value == 'ME')
      {
      	
        $("#me").show();
        $("#dsa").hide();
        $("#oi").hide();
      }
      if ( this.value == 'OI')
      {
      	
        $("#oi").show();
        $("#me").hide();
        $("#dsa").hide();
      }
      
    });
});
</script>

<script type="text/javascript">
$(document).ready(function(){
$('#submit1').on('click', function(e){
      e.preventDefault();
      var self = $(this);
      swal({
                  title: "Are you sure?",
                  text: "Are you sure to reassign the selected member code!",
                  type: "warning",
                  showCancelButton: true,
                  confirmButtonColor: "#DD6B55",
                  confirmButtonText: "Yes, reassign it!",
                  closeOnConfirm: true
              },
              function(isConfirm){
                  if(isConfirm){
                  	swal("Good job!", "You clicked the button!", "success")
                      setTimeout(function() {
                          self.parents("#form1").submit();
                      });
                  }
                  else{
                      swal("cancelled","Your Member code is safe", "error");
                  }
              });
    });

});
</script>
<?php $__env->stopSection(); ?>


<?php echo $__env->make('layout.erp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>