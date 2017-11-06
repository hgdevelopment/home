<?php $__env->startSection('sidebar'); ?>

<?php echo $__env->make('admin.partial.header', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php echo $__env->make('admin.partial.aside', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('body'); ?>

            <div class="bg-light lter b-b wrapper-md">
               <h1 class="m-n font-thin h3">Notification</h1>
            </div> 
			<div class="wrapper-md" ng-controller="FormDemoCtrl">


            <div ui-view="" class="ng-scope">
<div ng-controller="MailListCtrl" class="ng-scope">
  <!-- header -->
  <style type="text/css">
    .wrapper .btn-group .pagination {
          margin: 0px;
    }
  </style>
  <div class="wrapper bg-light lter b-b">
    <div class="btn-group pull-right">
    <?php echo e(auth('admin')->user()->notifications()->paginate(10)->links()); ?>

     
    </div>
    <div class="btn-toolbar">
      
    </div>
  </div>
  <!-- / header -->

  <!-- list -->
  <ul class="list-group list-group-lg no-radius m-b-none m-t-n-xxs">
   <?php $__currentLoopData = auth('admin')->user()->notifications()->paginate(10); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <li ng-repeat="mail in mails | filter:fold" ng-class="labelClass(mail.label)" class="list-group-item clearfix b-l-3x ng-scope b-l-info" style="background: <?php echo e($note->read_at == null ? '#efefef' : '#fff'); ?>">
      <a ui-sref="app.page.profile" class="avatar thumb pull-left m-r" href="#/app/page/profile">
        <img  src="<?php echo e(URL::to('/')); ?>/public/img/notification.jpg">
      </a>
      <div class="pull-right text-sm text-muted">
        <span class="hidden-xs ng-binding"><?php echo e($note->created_at->diffForHumans()); ?></span>
        
      </div>
      <div class="clear">
        <div><a class="text-md ng-binding" href="<?php echo e(URL::to('/').$note->data['url']); ?>"><?php echo $note->data['message']; ?></a><span class="label  <?php echo e($note->read_at == null ? 'bg-info' : 'bg-success'); ?>  m-l-sm ng-binding"><?php echo e($note->read_at == null ? 'Unread' : 'Read'); ?></span></div>
        
      </div>      
    </li>
  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
  </ul>
  <!-- / list -->
</div></div>



			</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('jquery'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('admin.layout.erp', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>