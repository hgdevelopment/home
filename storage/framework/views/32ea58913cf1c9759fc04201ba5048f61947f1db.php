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
    <h1 class="m-n font-thin h3">DSA Upgrade Request</h1>
  </div>
  <div class="wrapper-sm">
    <div class="row">
      <div class="col-sm-12">
        <div class="blog-post">                   
          <div class="panel panel-default">
            <div class="panel-heading ">                  
             DSA Upgrade Details
            </div>
            <div class="panel-body">
              <div class="col-md-4 col-md-offset-4">
                <label>DSA Code</label><br>
                <input type="text" name="dsaCode" id="dsaCode" class="form-control">
                <div id="msgerror" style="color: red;"></div>
              </div>
              <div class="col-sm-12"><BR></div>
              <div class="col-md-5 col-md-offset-5">
                <button name="show" type="buttom"  value="show" onclick="getDSA()" class="btn  btn-primary" id="showvalue">show</button>
                <button name="Upgrade" type="buttom" class="btn  btn-info" id="upgrade" style="display:none" onclick="dsaDetails();">DSA Details</button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div id="result">

    </div>
  </div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('jquery'); ?>
<script type="text/javascript">
 
function getDSA()
{
  var dsaCode=$('#dsaCode').val();  
  if(dsaCode==""){
    $("#msgerror").html("Enter DSA Code");
       return false;
  }
  else{
    $("#msgerror").html("");
  }
  $.ajax({
  type: "get",
  url: "<?php echo e(URL::to('/')); ?>/admin/dsaUpgrade/create",
  data:{dsaCode:dsaCode},
  success: function (data) 
  {
    $('#result').html(data);
  }
  });
  $("#upgrade").show();
}

function dsaDetails()
{
  var dsaCode=$('#dsaCode').val();
    // $.ajax({
    // type: "get",
    // url: "<?php echo e(URL::to('/')); ?>/admin/dsaUpgrade/"+dsaCode,
    // data:{dsaCode:dsaCode},
    // success: function (data) 
    // {
    // alert(data);

    // }
    // });

    window.location="<?php echo e(URL::to('/')); ?>/admin/dsaUpgrade/"+dsaCode;
}


function upgrateDSA()
{
  var dsaId=$('#dsaId').val();
  var dsaCode=$('#dsaCode').val();
    $.ajax({
    type: "PUT",
    url: "<?php echo e(URL::to('/')); ?>/admin/dsaUpgrade/update",
    data:{"_token": "<?php echo e(csrf_token()); ?>",dsaId:dsaId},
    success: function (data) 
    {
      dsaCode=$('#dsaCode').val("");
      swal('Upgrade!!','DSA Upgrade successfully!!','success');
      setTimeout(function() {
       window.location.reload();
            }, 2000);

    }
    });
}
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>