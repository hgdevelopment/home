 <header id="header" class="app-header navbar" role="menu">
      <!-- navbar header -->
      <div class="navbar-header bg-dark">
        <button class="pull-right visible-xs dk" ui-toggle-class="show" target=".navbar-collapse">
          <i class="glyphicon glyphicon-cog"></i>
        </button>
        <button class="pull-right visible-xs" ui-toggle-class="off-screen" target=".app-aside" ui-scroll="app">
          <i class="glyphicon glyphicon-align-justify"></i>
        </button>
        <!-- brand -->
        <a href="#/" class="navbar-brand text-lt">
          <i class="fa fa-btc"></i>
          <img src="img/logo.png" alt="." class="hide">
          <span class="hidden-folded m-l-xs">HG</span>
        </a>
        <!-- / brand -->
      </div>
      <!-- / navbar header -->

      <!-- navbar collapse -->
      <div class="collapse pos-rlt navbar-collapse box-shadow bg-white-only" style="background: rgba(255,255,255,0.7);">
        <!-- buttons -->
        <div class="nav navbar-nav hidden-xs">
          <a href="#" class="btn no-shadow navbar-btn" ui-toggle-class="app-aside-folded" target=".app">
            <i class="fa fa-dedent fa-fw text"></i>
            <i class="fa fa-indent fa-fw text-active"></i>
          </a>
          
            
          
        </div>
        <!-- / buttons -->

        
        
          
            
              
              
            
            
              
                
                  
                  
                    
                      
                        
                          
                        
                        
                          
                        
                        
                          
                        
                        
                          
                        
                      
                    
                    
                      
                        
                          
                        
                        
                          
                        
                        
                          
                        
                        
                          
                        
                      
                    
                  
                
                
                  
                  
                    
                      
                        
                          
                        
                        
                          
                        
                        
                          
                        
                        
                          
                        
                      
                    
                    
                      
                        
                          
                        
                        
                          
                        
                        
                          
                        
                        
                          
                        
                      
                    
                  
                
                
                  
                  
                    
                      
                          
                          
                          
                          
                          
                          
                          
                          
                          
                        
                      
                    
                  
                
              
            
          
          
            
              
              
            
            
              
              
                
                  
                  
                
              
              
              
              
                
                  
                  
                
              
            
          
        
        

        
        
          
            
              
              
                
              
            
          
        
        

        <!-- nabar right -->
        <ul class="nav navbar-nav navbar-right">
          <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle notificaiton_read">
              <i class="icon-bell fa-fw"></i>
              <span class="visible-xs-inline">Notifications</span>
              <span class="badge badge-sm up bg-danger pull-right-xs"><?php echo e(count(auth('admin')->user()->unreadNotifications)); ?></span>
            </a>
            <!-- dropdown -->
            <style type="text/css">
              .unread{
                background: #dadada;
              }
            </style>
            <div class="dropdown-menu w-xl animated fadeInUp">
              <div class="panel bg-white">
                <div class="panel-heading b-light bg-light">
                  <strong>You have <span><?php echo e(count(auth('admin')->user()->unreadNotifications)); ?></span> notifications</strong>
                </div>
                <div class="list-group">
                <?php $__currentLoopData = auth('admin')->user()->notifications()->paginate(4); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $note): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                 
                   <a href="<?php echo e(URL::to('/').$note->data['url']); ?>" class="list-group-item <?php echo e($note->read_at == null ? 'unread' : ''); ?>">
                    <span class="clear block m-b-none">
                      <?php echo $note->data['message']; ?><br>
                      <small class="text-muted"><?php echo e($note->created_at->diffForHumans()); ?></small>
                    </span>
                  </a>

                  
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <div class="panel-footer text-sm">
                  <a href class="pull-right"><i class="fa fa-cog"></i></a>
                  <a href="<?php echo e(URL::to('/')); ?>/admin/allnotification" data-toggle="class:show animated fadeInRight">See all the notifications</a>
                </div>
              </div>
            </div>
            <!-- / dropdown -->
          </li>
          <li class="dropdown">
            <a href="#" data-toggle="dropdown" class="dropdown-toggle clear" data-toggle="dropdown">
              <span class="thumb-sm avatar pull-right m-t-n-sm m-b-n-sm m-l-sm">
                <img src="img/a0.jpg" alt="...">
                <i class="on md b-white bottom"></i>
              </span>
              <span class="hidden-sm hidden-md">John.Smith</span> <b class="caret"></b>
            </a>
            <!-- dropdown -->
            <ul class="dropdown-menu animated fadeInRight w">
              <li class="wrapper b-b m-b-sm bg-light m-t-n-xs">
                <div>
                  <p>300mb of 500mb used</p>
                </div>
                <div class="progress progress-xs m-b-none dker">
                  <div class="progress-bar progress-bar-info" data-toggle="tooltip" data-original-title="50%" style="width: 50%"></div>
                </div>
              </li>
              <li>
                <a href>
                  <span class="badge bg-danger pull-right">30%</span>
                  <span>Settings</span>
                </a>
              </li>
              <li>
                <a ui-sref="app.page.profile">Profile</a>
              </li>
              <li>
                <a ui-sref="app.page.profile" href="<?php echo e(URL::to('/')); ?>/admin/changePassword">Change Password</a>
              </li>
              <li>
                <a ui-sref="app.docs">
                  <span class="label bg-info pull-right">new</span>
                  Help
                </a>
              </li>
              <li class="divider"></li>
              <li>
                <a href="<?php echo e(URL::to('/')); ?>/logout">Logout</a>
              </li>
            </ul>
            <!-- / dropdown -->
          </li>
        </ul>
        <!-- / navbar right -->
      </div>
      <!-- / navbar collapse -->
  </header>