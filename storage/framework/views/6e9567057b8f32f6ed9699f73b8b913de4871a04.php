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
  <h1 class="m-n font-thin h3">Access Rights</h1>
</div>

<div class="wrapper-md" ng-controller="FormDemoCtrl">
  <form role="form" method="POST" action="<?php echo e(URL::to('/')); ?>/admin/accessRights">

    <div class="panel panel-default">
      <div class="panel-heading font-bold">SELECT USER</div>
      <div class="panel-body">
        <div class="row">
          <div class="col-md-4">
              <?php echo e(csrf_field()); ?>

            <label>USER TYPE</label>
            <select class="form-control col-md-6 chosen-select" name="userType" id="userType" onchange="getUsers()">
            <option value="OI" <?php if(isset($userType) && $userType=='OI'): ?><?php echo e('selected'); ?><?php endif; ?>>Office Incharge</option>
            <option value="MEM" <?php if(isset($userType) && $userType=='MEM'): ?><?php echo e('selected'); ?><?php endif; ?>>Member</option>
            <option value="DSA" <?php if(isset($userType) && $userType=='DSA'): ?><?php echo e('selected'); ?><?php endif; ?>>Direct Selling Agent</option>
            </select>
          </div>

          <div class="col-md-4" id="userResult">


          </div>
        </div>
      </div>
    </div>

    <div class="panel panel-default">
      <div class="panel-heading font-bold">ACCESS RIGHTS FOR USER'S</div>
      <div class="panel-body">
        <div class="row" id="accessResult">

        </div>
        <div class="row text-center save ">
        <input type="submit" value="Save" class="btn btn-success font-bold">
        </div>
      </div>
    </div>
  </form>    
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">
$(".chosen-select").chosen({width:'100%'});

function getUsers()
{
var userType = $('#userType').val();
var userId=<?php  
if(isset($userId)) echo $userId; else echo '0';  ?>;

$.ajax({
     type: "get",
     url:"<?php echo e(URL::to('/')); ?>/admin/accessRights/1",
     data:{show:1,userType:userType,userId:userId},
     success: function (data) {
        $('#userResult').html(data);
        $(".chosen-select").chosen({width:'100%'});
        getAccess();
     }
 });
}
function getAccess()
{

var userId = $('#userId').val();

if(isNaN(userId))
{
$('#accessResult').html('<div class="col-md-12 text-center text-danger font-bold">No Record Found....</div>');
$('.save').css("display","none")
}else
$.ajax({
     type: "get",
     url:"<?php echo e(URL::to('/')); ?>/admin/accessRights/2",
     data:{show:2,userId:userId},
     success: function (data) {

        $('#accessResult').html(data);
        $('.save').css("display","block")
     }
 });
}



function setCheckBox(id)
{
if(document.getElementById('check'+id).checked==true)
 $('#Div'+id+ ' :checkbox').prop('checked', true);
else
 $('#Div'+id+ ' :checkbox').prop('checked', false);  
}
getUsers();
</script>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>