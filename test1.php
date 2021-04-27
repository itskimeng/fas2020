<?php 
session_start();
include('template/menu.php');
include('template/function.php');
if(!isset($_SESSION['username']) || !isset($_SESSION['complete_name'])){ header('location:index.php'); }else{ error_reporting(0); ini_set('display_errors', 0); $username = $_SESSION['username']; $TIN_N = $_SESSION['TIN_N']; $DEPT_ID = $_SESSION['DEPT_ID']; }
$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .   $_SERVER['REQUEST_URI']; 
?>


<body class=" hold-transition  skin-red-light sidebar-mini" >
  <div class="wrapper">
  <?php include('template/header.php');?>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar"  style = "background-color:#f6cdd0;">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="dilg.png" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo $_SESSION['username'];?></p>
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
 
        <ul class="sidebar-menu" data-widget="tree">
          <?php 
           $param1 = $_SESSION['division'];
           $param2 = $_SESSION['username'];
           $param3 = $_SESSION['flag'];
 
           $param4 = $_GET['id'];
           $param5 = $_GET['division'];
           $param6 = $_GET['option'];
 
           $dashboard = 'home.php?division='.$_SESSION['division'].'&username='.$_GET['username'].'';
           $calendar = 'ViewCalendar.php?division='.$_SESSION['division'].'&username='.$_SESSION['username'].'';
           $records = 'ViewCalendar.php?division='.$_SESSION['division'].'&username='.$_SESSION['username'].'';
 
           menuOption('Dashboard',$dashboard,'fa fa-dashboard',$param1,null,null,null,null,null,$username,$link);
           menuOption('Calendar',$calendar,'fa fa-calendar',$param1,$param2,$param3,null,null,null,$username,$link);
           menuOption('Records Section',null,'fa fa-folder',$param1,$param2,$param3,$param4,$param5,$param6,$username,$link);
           menuOption('HR Section',null,'fa fa-users',$param1,$param2,$param3,$param4,$param5,$param6,$username,$link);
           menuOption('GSS Section',null,'fa fa-users',$param1,$param2,$param3,$param4,$param5,$param6,$username,$link);
           menuOption('Finance',null,'fa fa-money',$param1,$param2,$param3,$param4,$param5,$param6,$username,$link);
           menuOption('RICTU',null,'fa fa-desktop',$param1,$param2,$param3,$param4,$param5,$param6,$username,$link);
           menuOption('Setting',null,'fa fa-cogs',$param1,$param2,$param3,$param4,$param5,$param6,$username,$link);
           menuOption('Log out',null,'fa fa-cogs',$param1,$param2,$param3,$param4,$param5,$param6,$username,$link);
          ?>
        </ul>
      </section>
      <!-- /.sidebar -->
    </aside>
