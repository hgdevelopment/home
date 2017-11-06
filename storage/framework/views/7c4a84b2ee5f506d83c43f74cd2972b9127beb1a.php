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
          <li>
            <a href class="auto">
                  <span class="pull-right text-muted">
                    <i class="fa fa-fw fa-angle-right text"></i>
                    <i class="fa fa-fw fa-angle-down text-active"></i>
                  </span>
              <i class="fa fa-th-list text-info" aria-hidden="true"></i>

              <span class="font-bold">ERP</span>
            </a>
            <ul class="nav nav-sub dk">
              <li class="nav-sub-header">
                <a href>
                  <span>ERP</span>
                </a>
              </li>
              <?php
                $sideERP = DB::table('pages')->where('main_id', 1)->where('parent_id', 0)->get();
              ?>
              <?php $__currentLoopData = $sideERP; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sidebar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(Controller::UserAccessRights($sidebar->menu_name)): ?>
                  <li>
                    <a href class="auto">
                      <span class="pull-right text-muted">
                      <i class="fa fa-fw fa-angle-right text"></i>
                      <i class="fa fa-fw fa-angle-down text-active"></i>
                      </span>
                      <i class="<?php echo $sidebar->icon;?>"></i>
                      <span><?php echo $sidebar->menu_name;?></span>
                    </a>
                    <ul class="nav nav-sub dk">
                      <li class="nav-sub-header">
                        <a href>
                        <span></span>
                        </a>
                      </li>
                      <?php
                      $submenus = DB::table('pages')->where('parent_id', $sidebar->id)->orderBy('sort_in_order', 'ASC')->get();
                      foreach($submenus as $submenu)
                      {
                      if($submenu->url=='secure')
                      continue;
                      $LogInId=Auth::guard('admin')->user()->id;
                      ?>
                      <?php if(Controller::UserAccessRights($submenu->menu_name)): ?>
                      <li style="margin-left:30px;">
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
          <li>
            <a href class="auto">
                  <span class="pull-right text-muted">
                    <i class="fa fa-fw fa-angle-right text"></i>
                    <i class="fa fa-fw fa-angle-down text-active"></i>
                  </span>
              <i class="fa fa-th-list text-info" aria-hidden="true"></i>
              <span class="font-bold">HR</span>
            </a>
            <ul class="nav nav-sub dk">
              <li class="nav-sub-header">
                <a href>
                  <span>HR</span>
                </a>
              </li>
              <?php ($sideHR = DB::table('pages')->where('main_id', 2)->where('parent_id', 0)->orderBy('sort_order', 'ASC')->get()); ?>
              <?php $__currentLoopData = $sideHR; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $sidebar): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if(Controller::UserAccessRights($sidebar->menu_name)): ?>
                  <li>
                    <a href class="auto">
                      <span class="pull-right text-muted">
                        <i class="fa fa-fw fa-angle-right text"></i>
                        <i class="fa fa-fw fa-angle-down text-active"></i>
                      </span>
                      <i class="<?php echo $sidebar->icon;?>"></i>
                      <span><?php echo $sidebar->menu_name;?></span>
                    </a>
                    <ul  class="nav nav-sub dk">
                    <li  class="nav-sub-header">
                    <a href>
                    <span></span>
                    </a>
                    </li>
                    <?php
                    $submenus = DB::table('pages')->where('parent_id', $sidebar->id)->orderBy('sort_in_order', 'ASC')->get();
                    foreach($submenus as $submenu)
                    {
                    if($submenu->url=='secure')
                    continue;
                    $LogInId=Auth::guard('admin')->user()->id;

                    ?>
                    <?php if(Controller::UserAccessRights($submenu->menu_name)): ?>
                    <li style="margin-left:30px;">
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
        </ul>
      </nav>
    </div>
  </div>
</aside>