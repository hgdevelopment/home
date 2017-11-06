<?php

namespace App\Http\Controllers\admin;
use App\Http\Controllers\Controller;
use App\useraccess;
use DB;
use Auth;
?>
<aside id="aside" class="app-aside hidden-xs bg-dark">
  <div class="aside-wrap">
    <div class="navi-wrap">
      <nav ui-nav class="navi clearfix">
        <ul class="nav">
          <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
            <span>Navigation</span>
          </li>
          <li>
            <a href ="dashboard" class="auto">
              <i class="glyphicon glyphicon-stats icon text-primary-dker"></i>
              <span class="font-bold">Dashboard</span>
            </a>
          </li>
          <li class="line dk"></li>
          <li class="hidden-folded padder m-t m-b-sm text-muted text-xs">
            <span>Modules</span>
          </li>







          <?php $main_bar = DB::table('pages')->where('main_id', 0)->where('parent_id', 0)->get(); ?>

          <?php $__currentLoopData = $main_bar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $main_bar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
          <?php if(Controller::UserAccessRights($main_bar->menu_name)): ?>

          <li>


            <a  class="auto">
            <span class="pull-right text-muted">
            <i class="fa fa-fw fa-angle-right text"></i>
            <i class="fa fa-fw fa-angle-down text-active"></i>
            </span>
            <i class="fa fa-th-list text-info" aria-hidden="true"></i>

            <span class="font-bold"><?php echo e($main_bar->menu_name); ?></span>
            </a>

            <ul class="nav nav-sub dk">

              <li class="nav-sub-header">
              <a href>
              <span><?php echo e($main_bar->menu_name); ?></span>
              </a>
              </li>


              <?php $parent_bar = DB::table('pages')->where('main_id', $main_bar->id)->where('parent_id', 0)->get(); ?>

              <?php $__currentLoopData = $parent_bar; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $parent_bar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(Controller::UserAccessRights($parent_bar->menu_name)): ?>
              <li>

                <a href class="auto">
                <span class="pull-right text-muted">
                <i class="fa fa-fw fa-angle-right text"></i>
                <i class="fa fa-fw fa-angle-down text-active"></i>
                </span>
                <i class="<?php echo $sidebar->icon;?>"></i>
                <span><?php echo $parent_bar->menu_name;?></span>
                </a>


                <ul class="nav nav-sub dk">

                  <li class="nav-sub-header">
                  <a href>
                  <span></span>
                  </a>
                  </li>

                  <?php $submenus = DB::table('pages')->where('parent_id', $parent_bar->id)->orderBy('sort_in_order', 'ASC')->get();
                  foreach($submenus as $submenu)
                  {
                  if($submenu->url=='secure')
                  continue;
                  $LogInId=Auth::guard('admin')->user()->id;
                  ?>
                  <?php if(Controller::UserAccessRights($submenu->menu_name)): ?>

                  <li>
                  <a href="<?php echo e(\URL::to($submenu->url)); ?>">
                  <span><?php echo $submenu->menu_name;?></span>
                  </a>
                  </li>

                  
                  <?php endif; ?>
                  <?php
                  }
                  ?>
                </ul>
              </li>
                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>  
          </li>
          <?php endif; ?>
          <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    









        </ul>
      </nav>
    </div>
  </div>
</aside>