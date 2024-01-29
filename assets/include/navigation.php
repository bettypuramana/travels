 <header class="main-header"><meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <!-- Logo -->
        
        <?php if(($this->rankfordAdminDetails->role == 'user')) { ?>

        <a href="<?= CUSTOM_BASE_URL;?>welcome" class="logo">

          <!-- mini logo for sidebar mini 50x50 pixels -->

          <span class="logo-mini ad-mini-logo">
            <!--<img src="<?php echo base_url();?>assets/dist/img/logo_icon.png" alt="User Image"> -->    
          </span>

          <!-- logo for regular state and mobile devices -->

          <!--<span class="logo-lg ad-lg-logo">-->
          <!--  <img src="<?php echo base_url();?>assets/dist/img/lakshya_logo.png" alt="User Image" style="max-width: 116px;">       -->
          <!--</span>-->

        </a>
        <?php } ?>
        
                <?php if(($this->rankfordAdminDetails->role == 'admin')) { ?>

        <a href="<?= CUSTOM_BASE_URL;?>welcome" class="logo">

          <!-- mini logo for sidebar mini 50x50 pixels -->

          <span class="logo-mini ad-mini-logo">
            <!--<img src="<?php echo base_url();?>assets/dist/img/logo_icon.png" alt="User Image"> -->    
          </span>

          <!-- logo for regular state and mobile devices -->

          <span class="logo-lg ad-lg-logo">
            <!--<img src="<?php echo base_url();?>assets/dist/img/lakshya_logo.png" alt="User Image" style="max-width: 116px;">       -->
          </span>

        </a>
        <?php } ?>

        <!-- Header Navbar: style can be found in header.less -->

        <nav class="navbar navbar-static-top" role="navigation">

          <!-- Sidebar toggle button-->

          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">

            <span class="sr-only">Toggle navigation</span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

            <span class="icon-bar"></span>

          </a>
          


          <div class="navbar-custom-menu">

            <ul class="nav navbar-nav">

              <!-- Messages: style can be found in dropdown.less-->

              <li class="dropdown messages-menu">

              <!--<li class="dropdown messages-menu">-->

              <!--  <a href="#" class="dropdown-toggle clearfix mail-12das" data-toggle="dropdown" style="padding-top: 23px !important;padding-bottom: 21px !important;">-->

              <!--    <i class="fa fa-envelope-o"></i>-->

              <!--    <span class="label label-note-ab">4</span>-->

              <!--  </a>-->

                

              <!--</li>-->

              <!-- Notifications: style can be found in dropdown.less -->

              

              <!-- Tasks: style can be found in dropdown.less -->

              

              <!-- User Account: style can be found in dropdown.less -->

                  

                <li class="dropdown user user-menu">

                    <!-- Menu Toggle Button -->

                    <a href="#" class="dropdown-toggle clearfix" data-toggle="dropdown" aria-expanded="true" style="padding-top: 22px !important;padding-bottom: 14px !important;" >

                        <!-- The user image in the navbar-->

                    <?php if(($this->rankfordAdminDetails->role == 'institute')) { ?>
                        <?php if(($this->rankfordAdminDetails->image == '')){ ?>
                        
                       <img src="<?php echo base_url();?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                        <?php } else { ?>
                        <img src="<?= CUSTOM_BASE_URL .'uploads/institute/crop/'.$this->rankfordAdminDetails->image; ?>" class="user-image" alt="User Image">
                        <?php } ?>
                    <?php } else {?>
                    <img src="<?php echo base_url();?>assets/dist/img/user2-160x160.jpg" class="user-image" alt="User Image">
                    <?php } ?>
                        <!-- hidden-xs hides the username on small devices so only the image appears. -->

                        <span class="hidden-xs">
                          <?php $session_data=$this->session->userdata('rankfordAdminDetails');
                                $username=ucfirst($session_data->username);
                                print_r($username);
                          ?>      
                        </span>

                    </a>

                    <ul class="dropdown-menu">

                        <!-- The user image in the menu -->

                        <li class="user-header">
                        <?php if(($this->rankfordAdminDetails->role == 'institute')) { ?>
                        <?php if(($this->rankfordAdminDetails->image == '')){ ?>
                        
                        <img src="<?php echo base_url();?>assets/dist/img/avatar2.png" class="img-circle" alt="User Image">
                        <?php } else { ?>
                        
                            <img src="<?= CUSTOM_BASE_URL .'uploads/institute/crop/'.$this->rankfordAdminDetails->image; ?>" class="img-circle" alt="User Image">
                        
                        <?php } ?>    

                            <div class="user-nm-ab"><?php print_r($this->rankfordAdminDetails->name);?></div>

                            <a class="change-pass-ab" href="<?= CUSTOM_BASE_URL .'User/changepassword'?>" class="btn-primary">Change Password</a>
                            <?php } else {?>
                            <img src="<?php echo base_url();?>assets/dist/img/avatar2.png" class="img-circle" alt="User Image">

                            <div class="user-nm-ab"><?php print_r($username);?></div>

                            <a class="change-pass-ab" href="<?= CUSTOM_BASE_URL .'User/changepassword'?>" class="btn-primary">Change Password</a>    
                            <?php } ?>
                        </li>

                        <!-- Menu Footer-->

                        <li class="user-footer">

                            <!--<div class="pull-left">-->
                            <!--   <a href="<?= CUSTOM_BASE_URL .'User/user_profile'?>" class="btn sign-pro-12 btn-default btn-flat">Profile</a>-->
                            <!--</div>-->


                            <div class="pull-right">

                                <a href="<?= CUSTOM_BASE_URL;?>login/logout" class="btn sign-pro-12 btn-default btn-flat">Sign out</a>

                            </div>

                        </li>

                    </ul>

                </li>

                              <!-- Control Sidebar Toggle Button -->

              <li>

<!--                <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>-->

              </li>

            </ul>

          </div>

        </nav>

      </header>    





<aside class="main-sidebar">

        <!-- sidebar: style can be found in sidebar.less -->

        <section class="sidebar">

          <!-- Sidebar user panel -->

          <div class="user-panel">





          </div>

          <!-- search form -->

          <!--<form action="#" method="get" class="sidebar-form">-->

          <!--  <div class="input-group">-->

          <!--    <input type="text" name="q" class="form-control" placeholder="Search...">-->

          <!--    <span class="input-group-btn">-->

          <!--      <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i></button>-->

          <!--    </span>-->

          <!--  </div>-->

          <!--</form>-->

           <?php 
            $directoryURI = $_SERVER['REQUEST_URI'];
            $path = parse_url($directoryURI, PHP_URL_PATH);
            $components = explode('/', $path);
            $first_part = strtolower($components[2]);
          ?>

          <!-- /.search form -->

          <!-- sidebar menu: : style can be found in sidebar.less -->

      <ul class="sidebar-menu">

<?php if(($this->rankfordAdminDetails->role == 'admin')) { ?>

<li class="<?php if ($first_part=="welcome") {echo "active"; } else  {echo "";}?>"><a href="<?= CUSTOM_BASE_URL;?>Welcome/"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
             

                <li><a href="#">
                    <i class="fa fa-folder-open-o"></i> <span>User</span><i class="fa fa-angle-right pull-right"></i>
                  </a>
                  <ul class="treeview-menu" style="display: none;">
                <li><a href="<?= CUSTOM_BASE_URL;?>User"><i class="fa fa-circle-o text-aqua"></i> List</a></li>
                <li><a href="<?= CUSTOM_BASE_URL;?>User/create"><i class="fa fa-circle-o text-red"></i> Add</a></li>
                </ul>                
                
                </li> 
                <li><a href="#">
                    <i class="fa fa-folder-open-o"></i> <span>Tour</span><i class="fa fa-angle-right pull-right"></i>
                  </a>
                  <ul class="treeview-menu" style="display: none;">
                <li><a href="<?= CUSTOM_BASE_URL;?>Admin/Tour"><i class="fa fa-circle-o text-aqua"></i> List</a></li>
                <li><a href="<?= CUSTOM_BASE_URL;?>Admin/Tour/create"><i class="fa fa-circle-o text-red"></i> Add</a></li>
                </ul>                
                
                </li> 
                    <li><a href="#">
                    <i class="fa fa-folder-open-o"></i> <span>Itenary Tour Details</span><i class="fa fa-angle-right pull-right"></i>
                  </a>
                  <ul class="treeview-menu" style="display: none;">
                <li><a href="<?= CUSTOM_BASE_URL;?>Admin/Tour_Details"><i class="fa fa-circle-o text-aqua"></i> List</a></li>
                <li><a href="<?= CUSTOM_BASE_URL;?>Admin/Tour_Details/create"><i class="fa fa-circle-o text-red"></i> Add</a></li>
                </ul>                
                
                </li>
                <li><a href="#">
                    <i class="fa fa-folder-open-o"></i> <span>Tour Details</span><i class="fa fa-angle-right pull-right"></i>
                  </a>
                  <ul class="treeview-menu" style="display: none;">
                <li><a href="<?= CUSTOM_BASE_URL;?>Admin/Tour_Details/tour_details"><i class="fa fa-circle-o text-aqua"></i> List</a></li>
                <li><a href="<?= CUSTOM_BASE_URL;?>Admin/Tour_Details/tour_details_create"><i class="fa fa-circle-o text-red"></i> Add</a></li>
                </ul>                
                
                </li>
                 <li><a href="#">
                    <i class="fa fa-folder-open-o"></i> <span>Tour Inclusion</span><i class="fa fa-angle-right pull-right"></i>
                  </a>
                  <ul class="treeview-menu" style="display: none;">
                <li><a href="<?= CUSTOM_BASE_URL;?>Admin/Tour_Details/tour_inclusion"><i class="fa fa-circle-o text-aqua"></i> List</a></li>
                <li><a href="<?= CUSTOM_BASE_URL;?>Admin/Tour_Details/tour_inclusion_create"><i class="fa fa-circle-o text-red"></i> Add</a></li>
                </ul>                
                
                </li>
                 <li><a href="#">
                    <i class="fa fa-folder-open-o"></i> <span>Tour Additional Info</span><i class="fa fa-angle-right pull-right"></i>
                  </a>
                  <ul class="treeview-menu" style="display: none;">
                <li><a href="<?= CUSTOM_BASE_URL;?>Admin/Tour_Details/tour_additional_info"><i class="fa fa-circle-o text-aqua"></i> List</a></li>
                <li><a href="<?= CUSTOM_BASE_URL;?>Admin/Tour_Details/tour_additional_info_create"><i class="fa fa-circle-o text-red"></i> Add</a></li>
                </ul>                
                
                </li>
                 <li><a href="#">
                    <i class="fa fa-folder-open-o"></i> <span>Tour Booking</span><i class="fa fa-angle-right pull-right"></i>
                  </a>
                  <ul class="treeview-menu" style="display: none;">
                <li><a href="<?= CUSTOM_BASE_URL;?>Admin/Booking"><i class="fa fa-circle-o text-aqua"></i> List</a></li>
                <li><a href="<?= CUSTOM_BASE_URL;?>Admin/Booking/create"><i class="fa fa-circle-o text-red"></i> Add</a></li>
                </ul>                
                
                </li>
        
              <!--   <li><a href="#">
                    <i class="fa fa-folder-open-o"></i> <span>Team</span><i class="fa fa-angle-right pull-right"></i>
                  </a>
                  <ul class="treeview-menu" style="display: none;">
                <li><a href="<?= CUSTOM_BASE_URL;?>Admin/Team"><i class="fa fa-circle-o text-aqua"></i> List</a></li>
                <li><a href="<?= CUSTOM_BASE_URL;?>Team"><i class="fa fa-circle-o text-aqua"></i> Work Progress</a></li>
                </ul>                
                
                </li>-->
                

        
<?php } ?>

<?php if(($this->rankfordAdminDetails->role == 'user')) { ?>

<li class="<?php if ($first_part=="welcome") {echo "active"; } else  {echo "";}?>"><a href="<?= CUSTOM_BASE_URL;?>Welcome/"><i class="fa fa-dashboard"></i> <span>Dashboard</span></a></li>
             

                <li><a href="#">
                    <i class="fa fa-folder-open-o"></i> <span>User</span><i class="fa fa-angle-right pull-right"></i>
                  </a>
                  <ul class="treeview-menu" style="display: none;">
                <li><a href="<?= CUSTOM_BASE_URL;?>User"><i class="fa fa-circle-o text-aqua"></i> List</a></li>
                <li><a href="<?= CUSTOM_BASE_URL;?>User/create"><i class="fa fa-circle-o text-red"></i> Add</a></li>
                </ul>                
                
                </li> 
                
              <!--  <li><a href="#">
                    <i class="fa fa-folder-open-o"></i> <span>Remarks</span><i class="fa fa-angle-right pull-right"></i>
                  </a>
                  <ul class="treeview-menu" style="display: none;">
                <li><a href="<?= CUSTOM_BASE_URL;?>Remarks"><i class="fa fa-circle-o text-aqua"></i> List</a></li>
                <li><a href="<?= CUSTOM_BASE_URL;?>Remarks/create"><i class="fa fa-circle-o text-red"></i> Add</a></li>
                </ul>                
                
                </li>-->
                
                  <li><a href="#">
                    <i class="fa fa-folder-open-o"></i> <span>Job Assign</span><i class="fa fa-angle-right pull-right"></i>
                  </a>
                  <ul class="treeview-menu" style="display: none;">
                <li><a href="<?= CUSTOM_BASE_URL;?>Team"><i class="fa fa-circle-o text-aqua"></i> List</a></li>
                <li><a href="<?= CUSTOM_BASE_URL;?>Team/create"><i class="fa fa-circle-o text-red"></i> Add</a></li>
                </ul>                
                
                </li>
                

        
<?php } ?>
    
          </ul>

        </section>

        <!-- /.sidebar -->

      </aside>

