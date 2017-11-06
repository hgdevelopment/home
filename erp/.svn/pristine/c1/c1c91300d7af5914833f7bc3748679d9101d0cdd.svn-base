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

<div class="bg-light lter b-b wrapper-md">
<h1 class="m-n font-normal h3">Change My Password</h1>
</div>

<div class="wrapper-md" ng-controller="FormDemoCtrl">
    <div class="panel panel-danger">
        <div class="panel-heading font-bold">CHANGE PASSWORD </div>

        <div class="panel-body">
            <form class="form-horizontal" method="POST" action="" data-parsley-validate>
                <?php echo e(csrf_field()); ?>

                        <?php if(session()->has('message')): ?>
                          <div class="alert alert-info fade in alert-dismissable">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close" title="close">×</a>
                            <strong>Info!</strong> <?php echo e(session()->get('message')); ?>

                            </div>
                        <?php endif; ?>
                <div class="form-group<?php echo e($errors->has('curPassword') ? ' has-error' : ''); ?>">
                    <label for="password" class="col-md-4 control-label">Current Password</label>

                    <div class="col-md-6">
                                <input id="curPassword" type="text" class="form-control" name="curPassword" value="<?php echo e(isset($email) ? $email : old('email')); ?>" required data-parsley-required-message="Please Enter Your Current Password">

                    <?php if($errors->has('curPassword')): ?>
                    <span class="help-block">
                    <strong><?php echo e($errors->first('curPassword')); ?></strong>
                    </span>
                    <?php endif; ?>
                    </div>
                </div>

                <div class="form-group<?php echo e($errors->has('newPassword') ? ' has-error' : ''); ?>">
                    <label for="newPassword" class="col-md-4 control-label">New Password</label>

                    <div class="col-md-6">
                    <input id="newPassword" type="password" class="form-control" name="newPassword" required data-parsley-required-message="Please Enter New Password" data-parsley-trigger="keyup" data-parsley-pattern-message="password must be alphanumeric" data-parsley-pattern="/^(?=.*[0-9])(?=.*[a-zA-Z])([a-zA-Z0-9]{8,})$/" onkeyup="StrengthPassword(this.value)" onblur="CheckNewPassword()"><span class="strength-paswords" style="font-size: 12px">(Password must be alphanumeric with minimum 8 characters)</span>

                    <?php if($errors->has('newPassword')): ?>
                    <span class="help-block">
                    <strong><?php echo e($errors->first('newPassword')); ?></strong>
                    </span>
                    <?php endif; ?>
                    </div>
                </div>

                <div class="form-group<?php echo e($errors->has('confPassword') ? ' has-error' : ''); ?>">
                    <label for="confPassword" class="col-md-4 control-label">Confirm Password</label>
                    <div class="col-md-6">
                    <input id="confPassword" type="password" class="form-control" name="confPassword" required data-parsley-required-message="Please Enter Confirm Password" onblur="CheckNewPassword()" >
                    <span class="error-paswords"></span>

                    <?php if($errors->has('confPassword')): ?>
                    <span class="help-block">
                    <strong><?php echo e($errors->first('confPassword')); ?></strong>
                    </span>
                    <?php endif; ?>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-6 col-md-offset-4">
                    <button type="submit" class="btn btn-danger font-bold">
                    Change Password
                    </button>
                    </div>
                    <?php 
                         if(Auth::guard('admin')->check())
                    $LogInId=Auth::guard('admin')->user()->id;
                     ?>
                </div><input type="hidden" name="id" id="id" value="<?php echo e($LogInId); ?>">
            </form>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">
function CheckNewPassword()
{
  var newPassword = $('#newPassword').val().replace(/\s/g, '');
  var confPassword = $('#confPassword').val().replace(/\s/g, ''); 
    $('.error-paswords').html('');

    if(newPassword!='' && confPassword!='' && newPassword!=null && confPassword!=null)
    {

    if(newPassword!=confPassword)
    {
        $('.error-paswords').html('Passwords Missmatch').removeClass('text-success').addClass('text-danger');
        $('#confPassword').addClass('parsley-error').val('');
    }
    else
        $('.error-paswords').html('');
    } 
} 

function StrengthPassword(newPassword)
{
  var confPassword = $('#confPassword').val().replace(/\s/g, ''); 
  if(confPassword=='' || confPassword==null)
    $('.error-paswords').html('');

    $('.strength-paswords').html('');
    if($('#newPassword').hasClass('parsley-success'))
     {
        $('.strength-paswords').html('Password Strength is good..').addClass('text-success');

    }
    else
    $('.strength-paswords').html('(Password must be alphanumeric with minimum 8 characters)').removeClass('text-success');
}
</script>
<style>
.sweet-alert button.cancel{
  background-color: #e3e000;
  color: black;
  box-shadow: 5px 2px #085d0c;
}
</style>
<?php if(Session::has('sweet_alert.alert')): ?>
    <script>
        swal({
            text: "<?php echo Session::get('sweet_alert.text'); ?>",
            title: "<?php echo Session::get('sweet_alert.title'); ?>",
            type: "<?php echo Session::get('sweet_alert.type'); ?>",
            showCancelButton: true,

            confirmButtonColor: '#20620ce6',

            cancelButtonText: "Stay Here",
            confirmButtonText: 'Login Again..',

             closeOnConfirm: false,

          closeOnConfirm: true
        },
            function (isConfirm) 
            {
            if (isConfirm) 
            {
            window.location="<?php echo e(URL::to('/')); ?>/logout";

            }
            else
            {
              return ;
            }   
            }

        );
            <?php  
            Session::Forget('sweet_alert'); 
             ?>
   </script>
<?php endif; ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>