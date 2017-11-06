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
  <h1 class="m-n font-thin h3">Create Page</h1>
</div>
<?php if($errors->any()): ?>
  <div class="alert alert-danger">
    <strong>Error!</strong> <?php echo e(implode('', $errors->all(':message'))); ?>

  </div>  
<?php endif; ?>
<style>
</style>
<div class="col-sm-12"><br></div>
<div class="col-sm-12">
  <div class="panel panel-default">
    <div class="panel-heading font-bold">Create Page</div>
    <div class="panel-body">
      <?php if(trim($__env->yieldContent('edit_id'))): ?>
        <form role="form" method="post" action="<?php echo e(URL::to('/')); ?>/admin/useraccess/<?php echo $__env->yieldContent('edit_id'); ?>" enctype="multipart/form-data">
      <?php else: ?>
        <form role="form" method="post" action="<?php echo e(URL::to('/')); ?>/admin/useraccess" enctype="multipart/form-data" data-parsley-validate>
      <?php endif; ?>
      <?php echo e(csrf_field()); ?>

      <?php $__env->startSection('edit'); ?>
      <?php echo $__env->yieldSection(); ?>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Select Parent</label>
              <select name="parent_id" class="form-control" id="parent_id">
                <option value="0">Parent</option>
                <?php $__currentLoopData = $parents; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($element->id); ?>" <?php echo e((old('parent_id')==$element->id)?'selected':''); ?> <?php echo $__env->yieldContent('parent_id'); ?> <?= (isset($editpages) && $editpages->parent_id==$element->id)?'selected':'' ?> ><?php echo e($element->menu_name); ?></option>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </select>
              <?php if($errors->has('parent')): ?>
              <span class="help-inline"><?php echo e($errors->first('parent')); ?></span>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Page Name</label>
              <input type="text" class="form-control" placeholder="Page Name" name="menu_name" value="<?php echo e(isset($editpages)?'':old('menu_name')); ?><?php echo $__env->yieldContent('menu_name'); ?>" required data-parsley-required-message="Enter Page Name">
              <?php if($errors->has('menu_name')): ?>
              <span class="help-inline"><?php echo e($errors->first('menu_name')); ?></span>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Url</label>
              <input type="text" class="form-control" placeholder="URL" name="url" value="<?php echo e(isset($editpages)?'':old('url')); ?><?php echo $__env->yieldContent('url'); ?>" required data-parsley-required-message="Enter URL">
              <?php if($errors->has('url')): ?>
              <span class="help-inline"><?php echo e($errors->first('url')); ?></span>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Icon</label>
              <input type="text" class="form-control" placeholder="Icon(fa fa-icon)" name="icon" value="<?php echo e(isset($editpages)?'':old('icon')); ?><?php echo $__env->yieldContent('icon'); ?>">
              <?php if($errors->has('icon')): ?>
              <span class="help-inline"><?php echo e($errors->first('icon')); ?></span>
              <?php endif; ?>
            </div>
          </div>
          <div class="col-sm-6">
            <div class="form-group">
              <label>Sort Order</label>
              <input type="text" class="form-control" placeholder="Sort Order" name="sort_order" value="<?php echo e(isset($editpages)?'':old('sort_order')); ?><?php echo $__env->yieldContent('sort_order'); ?>" onblur="order(this.value)" >
             <ul class="parsley-errors-list filled error" style="display: none"><li class="parsley-required">This Value Already Exit.</li></ul>
              <?php if($errors->has('sort_order')): ?>
              <span class="help-inline"><?php echo e($errors->first('sort_order')); ?></span>
              <?php endif; ?>
            </div>
          </div>
           <div class="col-sm-6" id="in_order" style="display: none;">
            <div class="form-group">
              <label>Sort In Order</label>
              <input type="text" class="form-control" placeholder="Sort In Order" name="sort_in_order" value="<?php echo e(isset($editpages)?'':old('sort_in_order')); ?><?php echo $__env->yieldContent('sort_in_order'); ?>" onblur="order1(this.value)">
              <ul class="parsley-errors-list filled error1" style="display: none"><li class="parsley-required">This Value Already Exit.</li></ul>
            </div>
          </div>
          <div class="col-sm-12">
            <div class="form-group col-sm-6 col-sm-offset-5">
            <label>&nbsp;</label>
            <br/>
            <button type="submit" class="btn btn-sm btn-primary"><?= isset($editpages)?'Update page':'Add page' ?></button>
            </div>
          </div>
        </form>
    </div>
  </div>
</div>
<div class="col-sm-12">
  <div class="panel panel-default">
    <div class="panel-heading">
      
      Pages
    </div>
    <div class="table-responsive">
      <table class="table table-striped table-hover dt-responsive" id="myTable" style="background: #fff;" cellspacing="0">
        <thead>
          <tr>
            <th>Menu Name</th>
            <th>Parent Page</th>
            <th>Url</th>
            <th width="30%">Icon</th>
            <th>Sort Order</th>
            <th>In Order</th>
            <th width="30%">Action</th>
          </tr>
        </thead>
        <tbody>
          <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $element): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <tr>
            <td>
              <?php echo e($element->menu_name); ?>

            </td>
            <td><?php echo e(isset($element->parent->menu_name)?$element->parent->menu_name:''); ?></td>
            <td><?php echo e($element->url); ?></td>
            <td><?php echo e($element->icon); ?>  <i class="<?php echo e($element->icon); ?> " style="color: green" aria-hidden="true"></i></td>
            <td><?php echo e($element->sort_order); ?></td>
            <td><?php echo e($element->sort_in_order); ?></td>
            <td>
              <a href="<?php echo e(URL::to('/')); ?>/admin/useraccess/<?php echo e($element->id); ?>/edit" class="btn btn-success"  style="margin-left: 5px"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
              <form action="<?php echo e(URL::to('/')); ?>/admin/useraccess/<?php echo e($element->id); ?>" method="POST" class="pull-left" id="delete_record">
                <?php echo e(method_field('DELETE')); ?>

                <?php echo e(csrf_field()); ?>

                <button class="btn btn-danger" ><i class="fa fa-trash-o" aria-hidden="true" ></i></button> 
              </form>
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
<script type="text/javascript">
$(function() {
$( "#depositeDate").datepicker();
$( "#dob").datepicker();
});	
$(".chosen-select").chosen({width:'100%'});
$(document).ready(function() {
    $('#myTable').DataTable( {
        order: [[ 1, 'asc' ]]
    } );
} );
</script>

<script type="text/javascript">
$(document).ready(function(){
    $("#parent_id").click(function(){
        var parent_id=$("#parent_id").val();
    if(parent_id==0) 
    $("#in_order").hide();
    else
    $("#in_order").show();
        
    });
});
</script>
<script type="text/javascript">
  function order(orderNo)
{
  if(orderNo!=0)
  {
  $.ajax(
  {
    type: "get",
    url: "<?php echo e(URL::to('/')); ?>/admin/checkNo",
    data:{value:orderNo},
    success: function (data) {
    if(data==0)
    {

     $('.error').css('display','none'); 
    }
    else
    {
     
    $('.error').css('display','block');
    }
    }
  });
  }
  }
</script>
<script type="text/javascript">
  function order1(orderNo)
{
  var parent_id=$("#parent_id").val();
  if(orderNo!=0)
  {
  $.ajax(
  {
    type: "get",
    url: "<?php echo e(URL::to('/')); ?>/admin/checkNo1",
    data:{value:orderNo,parent_id:parent_id},
    success: function (data) {
    if(data==0)
    {

     $('.error1').css('display','none'); 
    }
    else
    {
     
    $('.error1').css('display','block');
    }
    }
  });
  }
  }
</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('admin.layout.erp1', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>