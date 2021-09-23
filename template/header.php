<?php include 'EventNotif/controller/EventNotifController.php'; ?>
  
  <header class="main-header">
      <!-- Logo -->
      <a href="home.php?division=<?php echo $_SESSION['division'];?>" class="logo">
        <!-- mini logo for sidebar mini 50x50 pixels -->
        <span class="logo-mini"><img src = "images/logo2.png"/></span>
        <!-- logo for regular state and mobile devices -->
        <span class="logo-lg"><b><img src = "images/logo1.png"/></b></span>
      </a>
      <!-- Header Navbar: style can be found in header.less -->
      <nav class="navbar navbar-static-top ">
        <!-- Sidebar toggle button-->
        <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
          <span class="sr-only">Toggle navigation</span>
        </a>

        <div class="navbar-custom-menu">
          <ul class="nav navbar-nav">
            <?php if ($is_allow): ?>
            <!-- Messages: style can be found in dropdown.less-->
            <li class="dropdown messages-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-envelope-o"></i>
                <span class="label label-success"><?php echo $notification['counter'] > 0 ? $counter: ''; ?></span>
              </a>
              <ul class="dropdown-menu">
                <li class="header">You have <?php echo $notification['counter']; ?> new tasks</li>
                  <?php foreach ($notification['notifs'] as $key => $notif): ?>
                    <li>
                      <!-- inner menu: contains the actual data -->
                      <ul class="menu">
                        <li><!-- start message -->
                          <?php if ($notif['status'] == 'For Checking'): ?>
                            <a class="mail_notif" href="#" data-ntfid="<?php echo $notif['id']; ?>" data-ntfopt="" data-url="base_planner_subtasks.html.php?event_planner_id=<?php echo $notif['planner_id'];?>&username=<?php echo $_SESSION['username']; ?>&division=<?php echo $_GET['division']; ?>">
                          
                          <?php elseif ($notif['status'] == 'Settings'): ?>
                            
                            <a class="mail_notif" href="#" data-ntfid="<?php echo $notif['id']; ?>" data-ntfopt="" data-url="base_planner_subtasks.html.php?event_planner_id=<?php echo $notif["planner_id"];?>&username=<?php echo $_SESSION['username']; ?>&division=<?php echo $_GET['division']; ?>">

                          <?php else: ?>  
                            <a class="mail_notif" href="#" data-ntfid="<?php echo $notif['id']; ?>" data-ntfopt="" data-url="base_planner_emp_workspace.html.php?evp_id=&username=<?php echo $_SESSION['username']; ?>&division=<?php echo $_SESSION['division']; ?>&emp_id=<?php echo $notif['emp_id']; ?>">
                          <?php endif ?>
                            <div class="pull-left">
                              <?php if (!empty($notif['profile'])): ?>
                                <img src="<?php echo $notif['profile']; ?>" class="img-circle" alt="User Image" data-toggle="tooltip" title="<?php echo $notif['emp_name']; ?>">
                              <?php else: ?>
                                <span data-letters="<?php echo $notif['initials']; ?>" data-toggle="tooltip" title="<?php echo $notif['emp_name']; ?>"></span>
                              <?php endif ?>
                            </div>
                            <h4>
                              <?php echo $notif['code']; ?>
                              <small><i class="fa fa-clock-o"></i> <?php echo $notif['interval']; ?></small>
                            </h4>
                            <p><?php echo $notif['message']; ?></p>
                          </a>
                        </li>
                        
                      </ul>
                    </li>  
                  <?php endforeach ?>    
                  <li class="footer"><a class="mail_notif" data-ntfid="<?php echo $_SESSION['currentuser']; ?>" data-ntfopt="ALL" href="#" data-url="base_planner_emp_workspace.html.php?evp_id=<?php echo $event["id"];?>&username=<?php echo $_SESSION['username']; ?>&division=<?php echo $_SESSION['division']; ?>&emp_id=<?php echo $_SESSION['currentuser']; ?>">View All Tasks</a></li>
                </ul>
              </li>
            <?php endif ?>


            <!-- User Account: style can be found in dropdown.less -->
            
         
            <li class="dropdown messages-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-bell"></i>
                <span class="label label-success"><?php echo notification();?></span>
              </a>
              <ul class="dropdown-menu" style="width: 800%;">
                <li class="header" style="text-align: center;">You have <?php echo notification();?> technical assistance request</li>
                <li>
                  <!-- inner menu: contains the actual data -->
                  <ul class="menu">
                    
                    <?php echo showRequest();?>
                  </ul>
                </li>
                <li class="footer"><a href="processing.php?division=<?php echo $_GET['division'];?>&ticket_id=">See All Request</a></li>
              </ul>
            </li>
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">

                <img src="<?php echo getImage();?>" class="user-image" alt="User Image">
                <span class="hidden-xs"><?php echo $_SESSION['complete_name'];?></span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <?php 
                $conn = mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
                $slect = mysqli_query($conn,"SELECT PROFILE FROM tblemployeeinfo WHERE UNAME = '$username'");
                $rowP = mysqli_fetch_array($slect);
                $profile                 = $rowP['PROFILE'];
                $extension = pathinfo($profile, PATHINFO_EXTENSION);
                ?>
                <li class="user-header">
                  <img  src="
                  <?php 
                  if(file_exists($profile))
                  {
                    switch($extension)
                    {
                      case 'jpg':
                      if($profile == '')
                      {
                        echo 'images/male-user.png';
                      }
                      else if ($profile == $profile)
                      {
                        echo $profile;   
                      }
                      else
                      {
                        echo'images/male-user.png';
                      }
                      break;
                      case 'JPG':
                      if($profile == '')
                      {
                        echo 'images/male-user.png';
                      }
                      else if ($profile == $profile)
                      {
                        echo $profile;   
                      }
                      else
                      {
                        echo'images/male-user.png';
                      }
                      break;
                      case 'jpeg':
                      if($profile == '')
                      {
                        echo 'images/male-user.png';
                      }
                      else if ($profile == $profile)
                      {
                        echo $profile;   
                      }
                      else
                      {
                        echo'images/male-user.png';
                      }
                      break;
                      case 'png':
                      if($profile == '')
                      {
                        echo'images/male-user.png';
                      }
                      else if ($profile == $profile)
                      {
                        echo $profile;   
                      }
                      else
                      {
                        echo'images/male-user.png';
                      }
                      break;
                      default:
                      echo'images/male-user.png';
                      break;
                    }
                    }else{
                     echo'images/male-user.png';
                   }

                   ?>" class="img-circle" alt="User Image">

                   <p><b>
                    <?php echo $_SESSION['complete_name']; ?>
                    
                    
                    
                    </b>
                    <small><?php echo getDivision();?></small>
                  </p>
                </li>
                
                <li class="user-footer">
                  <div class="pull-left">
                    <a href="UpdateEmployee.php?id=<?php echo  $_SESSION['currentuser'];?>&username=<?php echo  $_SESSION['username'];?>&3d=<?php echo '3';?>" class="btn btn-default btn-flat"><i class = "fa fa-cogs"></i>Profile</a>
                  </div>
                  <div class="pull-right">
                    <a href="logout.php" class="btn btn-default btn-flat"><i class = "fa fa-sign-out"></i> Log out</a>
                  </div>
                </li>
              </ul>
            </li>
          </ul>
        </div>
      </nav>
    </header>

<?php include 'ActivityPlanner/views/sidebar_script.js'; ?>
