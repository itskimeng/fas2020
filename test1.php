<?php
// test
session_start();
include('template/function.php');
include 'lgcdd_divisionchecker.php';
require_once 'Model/Connection.php';
require_once 'Model/ModuleAccess.php';

$modaccess = new ModuleAccess();
// include 'user_management_checker.php';

if (!isset($_SESSION['username']) || !isset($_SESSION['complete_name'])) {
  header('location:index.php');
} else {
  error_reporting(0);
  ini_set('display_errors', 0);
  $username = $_SESSION['username'];
  $TIN_N = $_SESSION['TIN_N'];
  $DEPT_ID = $_SESSION['DEPT_ID'];
  $user_id = $_SESSION['currentuser'];
}

$link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .   $_SERVER['REQUEST_URI'];

$rowModuleId = $modaccess->fetch($user_id);
$arrayModuleId = explode(',', $rowModuleId['module_id']);

// $conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
// $sqlGetId = 'SELECT `EMP_N` FROM `tblemployeeinfo` WHERE `UNAME` = "'.$_SESSION['username'].'" ';
// $execGetId = $conn->query($sqlGetId);
// $rowId = $execGetId->fetch_assoc();
// $user_id = $rowId['EMP_N'];


// $selectModules = ' SELECT `id`, `level`, `module_name`, `parent_id`, `status`, `date_created`, `module_link` FROM `tbl_modules`  ';
// $execModules = $conn->query($selectModules);
// $rowModule = $execModules->fetch_assoc();
// $module_level = $rowModule['level'];
// $module_parent = $rowModule['parent_id'];
// $module_id = $rowModule['id'];



// $selectModuleId = ' SELECT `id`, `module_id`, `status`, `moderator_username`, `date_updated` FROM `tbl_module_access` WHERE `user_id` = '.$user_id.' ';
// $execModuleId = $conn->query($selectModuleId);
// $rowModuleId = $execModuleId->fetch_assoc();

// $arrayModuleId = explode(',', $rowModuleId['module_id']);


?>



<body class=" hold-transition  skin-red-light sidebar-mini">
  <div class="wrapper">
    <?php include('template/header.php'); ?>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar" style="background-color:#f6cdd0;">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="dilg.png" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p><?php echo $_SESSION['username']; ?></p>
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

          $dashboard = 'home.php?division=' . $_SESSION['division'] . '&username=' . $_GET['username'] . '';
          $calendar = 'ViewCalendar.php?division=' . $_SESSION['division'] . '&username=' . $_SESSION['username'] . '';


          ?>
          <!--SIDE BAR   -->

          <!-------------------------------------------- DASHBOARD ------------------------------------------->
          <li class="<?php if ($menuchecker['dashboard']) echo 'active'; ?>">
            <a href="<?php echo $dashboard; ?>">
              <i class="fa fa-dashboard" style=" <?php echo isActive(1); ?>"></i> <span style=" <?php echo isActive(1); ?>">Dashboard</span>
              <span class="pull-right-container"> </span>
            </a>
          </li>
          <!-------------------------------------------- DASHBOARD ------------------------------------------->

          <?php if (in_array(1, $arrayModuleId)) : ?>
            <!-------------------------------------------- CALENDER ------------------------------------------->
            <li class="<?php if ($menuchecker['calendar']) echo 'active'; ?>">
              <a href="<?php echo $calendar; ?>">
                <i class="fa fa-calendar" style=" <?php echo isActive(1); ?>"></i>
                <span style=" <?php echo isActive(1); ?>">Calendar</span>
              </a>
            </li>
            <!-------------------------------------------- CALENDER ------------------------------------------->
          <?php endif ?>

          <!-------------------------------------------- TO BE ADDED ------------------------------------------->
          <!-------------------------------------------- LGCDD TASK MANAGER ------------------------------------------->
          <?php if ($is_allow) : ?>
            <li class="treeview <?php if ($menuchecker['activity_planner'] or $menuchecker['template_generator']) echo 'menu-open active'; ?>">
              <a href="#">
                <i class="fa fa-tasks" style=" <?php echo isActive(1); ?>"></i>
                <span style=" <?php echo isActive(1); ?>">LGCDD</span><span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
              </a>
              <ul class="treeview-menu">
                <li class="<?php if ($menuchecker['activity_planner']) echo 'active'; ?>">
                  <!-- test -->
                  <a href="base_task_management.html.php?division=<?php echo $_SESSION['division']; ?>">
                    <i class="fa fa-tasks" style="color:black;"></i>
                    <span style="color:black;">Task Management</span>
                  </a>
                </li>
                <li class="<?php if ($menuchecker['template_generator']) echo 'active'; ?>">
                  <!-- test -->
                  <a href="base_template_generator.html.php?division=<?php echo $_SESSION['division']; ?>">
                    <i class="fa fa-file-pdf-o" style="color:black;"></i>
                    <span style="color:black;">Certificate Generator</span>
                  </a>
                </li>
              </ul>
            </li>
          <?php endif ?>
          <!-------------------------------------------- LGCDD TASK MANAGER ------------------------------------------->
          <!-------------------------------------------- TO BE ADDED ------------------------------------------->

          <li class="treeview <?php if ($menuchecker['databank'] or $menuchecker['issuances'] or $menuchecker['phone_directory']) echo 'menu-open active'; ?>">

            <!-------------------------------------------- RECORDS ------------------------------------------->
            <?php if (in_array(2, $arrayModuleId) || in_array(3, $arrayModuleId) || in_array(4, $arrayModuleId) || in_array(5, $arrayModuleId)) : ?>
              <a href="#">
                <i class="fa fa-folder" style=" <?php echo isActive(1); ?>"></i>
                <span style=" <?php echo isActive(1); ?>">Records Section</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
              </a>
            <?php endif ?>
            <!-------------------------------------------- RECORDS ------------------------------------------->

            <ul class="treeview-menu">

              <?php if (in_array(3, $arrayModuleId)) : ?>
                <!-------------------------------------------- DATABANK ------------------------------------------->
                <li class=<?php if ($menuchecker['databank']) echo 'active'; ?>>
                  <a href="databank.php?division=<?php echo $param1; ?>" style="color:black;">
                    <i class="fa fa-archive" style="color:black;"></i>Databank
                    <span class="label  bg-blue" style="background-color:skyblue;color:blue;" id=""><b>0</b></span>
                  </a>
                </li>
                <!-------------------------------------------- DATABANK ------------------------------------------->
              <?php endif ?>

              <?php if (in_array(4, $arrayModuleId)) : ?>
                <!-------------------------------------------- ISSUANCES ------------------------------------------->
                <li class=<?php if ($menuchecker['issuances']) echo 'active'; ?>>
                  <a href="issuances.php?division=<?php echo $param1; ?>" style="color:black;"><i class="fa" style="color:black;">&#xf0f6;</i>Issuances
                    <span href="ViewIssuancesTag.php" class="label  bg-blue" style="background-color:skyblue;color:blue;" id="">
                      <b>

                        <?php

                        $conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");

                        $username = $param2;

                        //echo $username;
                        $select_user = mysqli_query($conn, "SELECT DIVISION_C FROM tblemployeeinfo WHERE UNAME = '$username'");
                        $rowdiv = mysqli_fetch_array($select_user);
                        $DIVISION_C = $rowdiv['DIVISION_C'];

                        $select_office = mysqli_query($conn, "SELECT DIVISION_M from tblpersonneldivision where DIVISION_N = '$DIVISION_C'");
                        $rowdiv1 = mysqli_fetch_array($select_office);
                        $DIVISION_M = $rowdiv1['DIVISION_M'];

                        $countissuances = mysqli_query($conn, "SELECT count(id) as a from issuances_office_responsible where office_responsible = '$DIVISION_M'");
                        $rowc = mysqli_fetch_array($countissuances);
                        $countissuancesspan = $rowc['a'];

                        ?>

                        <?php echo $countissuancesspan;
                        mysqli_close($conn);

                        ?>


                      </b>

                    </span>
                  </a>
                </li>
                <!-------------------------------------------- ISSUANCES ------------------------------------------->
              <?php endif ?>

              <?php if (in_array(5, $arrayModuleId)) : ?>
                <!-------------------------------------------- DIRECTORY ------------------------------------------->
                <li class=<?php if ($menuchecker['phone_directory']) echo 'active'; ?>>
                  <a href="Directory.php?division=<?php echo $param1; ?>" style="color:black;">
                    <i class="fa fa-archive" style="color:black;"></i>Directory
                  </a>
                </li>
                <!-------------------------------------------- DIRECTORY ------------------------------------------->
              <?php endif ?>

            </ul>
          </li>

          <li class="treeview <?php if ($menuchecker['employees_directory'] || $menuchecker['dtr'] || $menuchecker['dtra'] || $menuchecker['ro_and_roo'] || $menuchecker['official_business'] || $menuchecker['travel_order'] || $menuchecker['health_monitoring'] || $menuchecker['upload_dtr'] || $menuchecker['dailytimerecord'] || $menuchecker['emp_directory']) echo "menu-open active" ?>">

            <?php if (in_array(6, $arrayModuleId) || in_array(7, $arrayModuleId) || in_array(8, $arrayModuleId) || in_array(9, $arrayModuleId) || in_array(10, $arrayModuleId) || in_array(11, $arrayModuleId) || in_array(12, $arrayModuleId) || in_array(13, $arrayModuleId) || in_array(14, $arrayModuleId)) : ?>
              <!-------------------------------------------- HR SECTION ------------------------------------------->
              <a href="#">
                <i class="fa fa-users" style=" <?php echo isActive(1); ?>"></i>
                <span style=" <?php echo isActive(1); ?>">HR Section</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
              </a>
              <!-------------------------------------------- HR SECTION ------------------------------------------->
            <?php endif ?>

            <ul class="treeview-menu">

              <?php if (in_array(7, $arrayModuleId)) : ?>
                <!-------------------------------------------- EMPLOYEES DIRECTORY ------------------------------------------->
                <li class="<?php if ($menuchecker['employees_directory']) echo 'active' ?>">
                  <a href="ViewEmployees.php?division=<?php echo $param1; ?>&username=<?php echo $username; ?>" style="color:black;">
                    <i class="fa fa-user" style="color:black;"></i>Employees Directory
                  </a>
                </li>

                <li class="<?php if ($menuchecker['emp_directory']) echo 'active' ?>">
                  <a href="employees_directory.php?division=<?php echo $param1; ?>&username=<?php echo $username; ?>" style="color:black;">
                    <i class="fa fa-user" style="color:black;"></i>Employees Directory
                    <span class="pull-right-container">
                      <span class="label label-primary pull-right">NEW</span>
                    </span>
                  </a>
                </li>
                <!-------------------------------------------- EMPLOYEES DIRECTORY ------------------------------------------->
              <?php endif ?>

              <?php if (in_array(8, $arrayModuleId)) : ?>
                <!-------------------------------------------- DTR ------------------------------------------->
                <li class="<?php if ($menuchecker['dtr']) echo 'active' ?>">
                  <a href="DTR.php?division=<?php echo $param1; ?>&username=<?php echo $username; ?>" style="color:black;">
                    <i class="fa fa-calendar-times-o" style="color:black;"></i>Daily Time Record
                  </a>
                </li>
                <li class ="<?php if( $menuchecker['dailytimerecord']) echo 'active' ?>">
                  <a href="dailytimerecord.php?division=<?php echo $param1;?>&username=<?php echo $username;?>"  style = "color:black;">
                    <i class="fa fa-calendar-times-o" style = "color:black;"></i>Daily Time Record
                    <span class="pull-right-container">
                      <span class="label label-primary pull-right">NEW</span>
                    </span>
                  </a>
                </li>
                <!-------------------------------------------- DTR ------------------------------------------->
              <?php endif ?>


              <!-------------------------------------------- TO BE ADDED ------------------------------------------->
              <!-------------------------------------------- DTR MONITORING ------------------------------------------->

              <?php if ($username == 'gltumamac' || $username == 'mmmonteiro' || $username == 'pmmendoza' || $username == 'hpsolis' || $username == 'magonzales' || $username == 'jtbeltran' || $username == 'cscruz' || $username == 'rbnanez' || $username == 'assangel' || $username == 'jvnadal' || $username == 'aasalvatus' || $username == 'masacluti') : ?>
                <li class="<?php if ($menuchecker['dtra']) echo 'active' ?>">
                  <a href="DtrMonitoring.php?division=<?php echo $param1; ?>&username=<?php echo $username; ?>" style="color:black;">
                    <i class="fa fa-user" style="color:black;"></i>DTR Monitoring
                  </a>
                </li>
              <?php endif ?>
              <!-------------------------------------------- DTR MONITORING ------------------------------------------->

              <li class ="<?php if( $menuchecker['upload_dtr']) echo 'active' ?>">
                <a href="upload_dtr.php?division=<?php echo $param1;?>&username=<?php echo $username;?>"  style = "color:black;">
                  <i class="fa fa-file-import" style = "color:black;"></i>Import DTR
                  <span class="pull-right-container">
                    <span class="label label-primary pull-right">NEW</span>
                  </span>
                </a>
              </li>
              <!-------------------------------------------- TO BE ADDED ------------------------------------------->




              <?php if (in_array(9, $arrayModuleId)) : ?>
                <!-------------------------------------------- RO & ROO ------------------------------------------->
                <li class="<?php if ($menuchecker['ro_and_roo']) echo 'active' ?>">
                  <a href="ROandROO.php?division=<?php echo $param1; ?>" style="color:black;">
                    <i class="fa fa-archive" style="color:black;"></i>RO and ROO
                  </a>
                </li>
                <!-------------------------------------------- RO & ROO ------------------------------------------->
              <?php endif ?>



              <?php if (in_array(10, $arrayModuleId)) : ?>
                <!-------------------------------------------- OFFICIAL BUSINESS ------------------------------------------->
                <li class="<?php if ($menuchecker['official_business']) echo 'active' ?>">
                  <a href="ob.php?division=<?php echo $param1; ?>" style="color:black;">
                    <i class="fa fa-user" style="color:black;"></i>Official Business
                  </a>
                </li>
                <!-------------------------------------------- OFFICIAL BUSINESS ------------------------------------------->
              <?php endif ?>

              <?php if (in_array(11, $arrayModuleId)) : ?>
                <!-------------------------------------------- TRAVEL ORDER ------------------------------------------->
                <li class="<?php if ($menuchecker['travel_order']) echo 'active' ?>">
                  <a href="TravelOrder.php?division=<?php echo $param1; ?>" style="color:black;">
                    <i class="fa fa-archive" style="color:black;"></i>Travel Order
                  </a>
                </li>
                <!-------------------------------------------- TRAVEL ORDER ------------------------------------------->
              <?php endif ?>


              <!-------------------------------------------- HEALTH MONITORING ------------------------------------------->
              <li class="treeview <?php if ($menuchecker['health_monitoring']) echo 'menu-open active'; ?>">

                <?php if (in_array(12, $arrayModuleId) || in_array(13, $arrayModuleId) || in_array(14, $arrayModuleId)) : ?>
                  <a href="#">
                    <i class="fa fa-medkit" style="color:black;"></i>
                    <span>Health Monitoring</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                <?php endif ?>

                <ul class="treeview-menu">

                  <?php if (in_array(13, $arrayModuleId)) : ?>
                    <!-------------------------------------------- DECLARATION FORM ------------------------------------------->
                    <li class="<?php if ($menuchecker['health_declaration_form']) echo 'active' ?>"><a href="HealthMonitoring.php?action=show&username=<?php echo $username; ?>&division=<?php echo $param1; ?>"><i class="fa fa-copy" style="color:black;"></i>Health Declaration Form</a></li>
                    <!-------------------------------------------- DECLARATION FORM ------------------------------------------->
                  <?php endif ?>

                  <?php if (in_array(14, $arrayModuleId)) : ?>
                    <!-------------------------------------------- MONITORING ------------------------------------------->
                    <li class="<?php if ($menuchecker['health_monitoring']) echo 'active' ?>"><a href="HealthMonitoring.php?username=<?php echo $username; ?>&division=<?php echo $param1; ?>"><i class="fa fa-copy" style="color:black;"></i>Health Monitoring</a></li>
                    <!-------------------------------------------- MONITORING ------------------------------------------->
                  <?php endif ?>
                </ul>
              </li>
              <!-------------------------------------------- HEALTH MONITORING ------------------------------------------->

            </ul>
          </li>
          </li>

          <li class="treeview <?php if ($menuchecker['view_iar']) echo 'menu-open active'; ?>">

            <?php if (in_array(15, $arrayModuleId) || in_array(16, $arrayModuleId) || in_array(17, $arrayModuleId) || in_array(18, $arrayModuleId) || in_array(19, $arrayModuleId) || in_array(20, $arrayModuleId) || in_array(21, $arrayModuleId) || in_array(22, $arrayModuleId) || in_array(23, $arrayModuleId) || in_array(24, $arrayModuleId) || in_array(25, $arrayModuleId) || in_array(26, $arrayModuleId) || in_array(27, $arrayModuleId) || in_array(28, $arrayModuleId)) : ?>
              <!-------------------------------------------- GSS SECTION ------------------------------------------->
              <a href="#">
                <i class="fa fa-users" style=" <?php echo isActive(1); ?>"></i>
                <span style=" <?php echo isActive(1); ?>">GSS Section</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
              </a>
              <!-------------------------------------------- GSS SECTION ------------------------------------------->
            <?php endif ?>
            <!-- KIM -->
          
            <ul class="treeview-menu">
              <li class="treeview <?php if ($baseurl['ViewApp.php'] || $baseurl['ViewPR.php'] || $baseurl['UpdateAPP.php'] || $baseurl['ViewApp_History.php'] || $baseurl['CreateAPP.php'] || $baseurl['CreatePR.php'] || $baseurl['ViewPRv.php'] || $baseurl['ViewRFQdetails.php'] || $baseurl['ViewUpdateRFQ.php'] || $baseurl['ViewRFQ.php'] || $baseurl['CreateRFQ.php'] || $baseurl['CreateAoq.php'] || $baseurl['ViewSuppliers.php'] || $baseurl['CreateSuppliers.php'] || $baseurl['UpdateSuppliers.php']) echo 'menu-open'; ?>">


                <?php if (in_array(16, $arrayModuleId) || in_array(17, $arrayModuleId) || in_array(18, $arrayModuleId) || in_array(19, $arrayModuleId) || in_array(20, $arrayModuleId)) : ?>
                  <!------------------------------------- PROCUREMENT ------------------------------------------->
                  <a href="#">
                    <i class="fa fa-cart-arrow-down " style="color:black;"></i>
                    <span style="color:black;">Procurement</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right" style="color:black;"></i></span>
                  </a>
                  <!------------------------------------- PROCUREMENT ------------------------------------------->
                <?php endif ?>

                <ul class="treeview-menu" style=" <?php if ($baseurl['ViewApp.php'] || $baseurl['ViewPR.php'] || $baseurl['UpdateAPP.php'] || $baseurl['ViewApp_History.php'] || $baseurl['CreateAPP.php'] || $baseurl['CreatePR.php'] || $baseurl['ViewPRv.php'] || $baseurl['ViewRFQdetails.php'] || $baseurl['ViewUpdateRFQ.php'] || $baseurl['ViewRFQ.php'] || $baseurl['CreateRFQ.php'] || $baseurl['CreateAoq.php'] || $baseurl['ViewSuppliers.php'] || $baseurl['CreateSuppliers.php'] || $baseurl['UpdateSuppliers.php']) echo 'display:block;'; ?>">

                  <?php if (in_array(17, $arrayModuleId)) : ?>
                    <!------------------------------------- APP ------------------------------------------->
                    <li class="<?php if ($baseurl['ViewApp.php'] || $baseurl['UpdateAPP.php'] || $baseurl['ViewApp_History.php'] || $baseurl['CreateAPP.php']) echo 'active'; ?>"><a href="procurement_app.php?division=<?php echo $param1; ?>"><i class="fa" style="color:black;">&#xf0f6;</i> APP</a></li>
                    <!------------------------------------- APP ------------------------------------------->
                  <?php endif ?>

                  <?php if (in_array(18, $arrayModuleId)) : ?>
                    <!------------------------------------- PURCHASE REQUEST ------------------------------------------->
                    <li class="<?php if ($baseurl['ViewPR.php'] || $baseurl['CreatePR.php'] || $baseurl['ViewRFQdetails.php'] || $baseurl['ViewUpdateRFQ.php']) echo 'active'; ?>"><a href="procurement_purchase_request.php?division=<?php echo $param1; ?>"><i class="fa" style="color:black;">&#xf0f6;</i> Purchase Request</a></li>
                    <!------------------------------------- PURCHASE REQUEST ------------------------------------------->
                  <?php endif ?>

                  <?php if (in_array(19, $arrayModuleId)) : ?>

                    <!------------------------------------- QUOTATION ------------------------------------------->
                    <li class="<?php if ($baseurl['ViewRFQ.php'] || $baseurl['CreateRFQ.php'] || $baseurl['CreateAoq.php']) echo 'active'; ?>"><a href="procurement_request_for_quotation.php?division=<?php echo $param1; ?>"><i class="fa" style="color:black;">&#xf0f6;</i> Request for Quotation</a></li>
                    <!------------------------------------- QUOTATION ------------------------------------------->
                  <?php endif ?>

                  <?php if (in_array(20, $arrayModuleId)) : ?>
                    <!------------------------------------- SUPPLIER ------------------------------------------->
                    <li class="<?php if ($baseurl['ViewSuppliers.php'] ||  $baseurl['CreateSuppliers.php'] || $baseurl['UpdateSuppliers.php']) echo 'active'; ?>"><a href="ViewSuppliers.php"><i class="fa" style="color:black;">&#xf0f6;</i><span>Supplier</span></a></li>
                    <!------------------------------------- SUPPLIER ------------------------------------------->
                  <?php endif ?>

                </ul>
              </li>
              <li class="treeview <?php if ($menuchecker['view_iar']) echo 'menu-open'; ?>">

                <?php if (in_array(21, $arrayModuleId) || in_array(22, $arrayModuleId) || in_array(23, $arrayModuleId) || in_array(24, $arrayModuleId) || in_array(25, $arrayModuleId) || in_array(26, $arrayModuleId) || in_array(27, $arrayModuleId) || in_array(28, $arrayModuleId)) : ?>
                  <!------------------------------------- ASSET MANAGEMENT ------------------------------------------->
                  <a href="">
                    <i class="fa fa-briefcase " style="color:black;"></i>
                    <span style="color:black;font-weight:normal;">Asset Management</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <!------------------------------------- ASSET MANAGEMENT ------------------------------------------->
                <?php endif ?>

                <ul class="treeview-menu" style="<?php if ($menuchecker['view_iar']) echo 'display:block;'; ?>">

                  <?php if (in_array(22, $arrayModuleId)) : ?>
                    <!------------------------------------- STOCK CARD ------------------------------------------->
                    <li class="<?php if ($baseurl['stocks.php'] || $baseurl['CreateStocks.php']) echo 'active'; ?>"><a href="stocks.php?division=<?php echo $param1; ?>"><i class="fa" style="color:black;">&#xf0f6;</i> Stock Card</a></li>
                    <!------------------------------------- STOCK CARD ------------------------------------------->
                  <?php endif ?>

                  <?php if (in_array(23, $arrayModuleId)) : ?>
                    <!------------------------------------- LEDGER CARD ------------------------------------------->
                    <li class="<?php if ($baseurl['@stockledger.php']) echo 'active'; ?>"><a href="@stockledger.php?division=<?php echo $param1; ?>"><i class="fa" style="color:black;">&#xf0f6;</i>Supplies Ledger Card</a></li>
                    <!------------------------------------- LEDGER CARD ------------------------------------------->
                  <?php endif ?>


                  <?php if (in_array(24, $arrayModuleId)) : ?>
                    <!------------------------------------- IAR ------------------------------------------->
                    <li class="<?php if ($menuchecker['view_iar']) echo 'active'; ?>"><a href="ViewIAR.php?division=<?php echo $param1; ?>"><i class="fa" style="color:black;">&#xf0f6;</i> IAR</a></li>
                    <!------------------------------------- IAR ------------------------------------------->
                  <?php endif ?>

                  <?php if (in_array(25, $arrayModuleId)) : ?>
                    <!------------------------------------- RIS ------------------------------------------->
                    <li class="<?php if ($baseurl['ViewRIS.php'] || $baseurl['CreateRIS.php'] || $baseurl['UpdateRIS.php']) echo 'active'; ?>"><a href="ViewRIS.php?division=<?php echo $param1; ?>"><i class="fa" style="color:black;">&#xf0f6;</i>RIS</a></li>
                    <!------------------------------------- RIS ------------------------------------------->
                  <?php endif ?>

                  <?php if (in_array(26, $arrayModuleId)) : ?>
                    <!------------------------------------- ICS ------------------------------------------->
                    <li class="<?php if ($baseurl['ViewRPCI.php'] || $baseurl['UpdateRPCI.php'] || $baseurl['CreateRPCI.php']) echo 'active'; ?>"><a href="ViewRPCI.php?division=<?php echo $param1; ?>"><i class="fa" style="color:black;">&#xf0f6;</i>ICS</a></li>
                    <!------------------------------------- ICS ------------------------------------------->
                  <?php endif ?>

                  <?php if (in_array(27, $arrayModuleId)) : ?>
                    <!------------------------------------- PAR ------------------------------------------->
                    <li class="<?php if ($baseurl['ViewRPCPPE.php'] || $baseurl['CreateRPCPPE.php'] || $baseurl['ViewPPE.php']) echo 'active'; ?>"><a href="ViewRPCPPE.php?division=<?php echo $param1; ?>"><i class="fa" style="color:black;">&#xf0f6;</i>PAR</a></li>
                    <!------------------------------------- PAR ------------------------------------------->
                  <?php endif ?>

                </ul>
              </li>

              <?php if (in_array(28, $arrayModuleId)) : ?>
                <!------------------------------------- VEHICLE REQUEST ------------------------------------------->
                <li class="<?php if ($baseurl['VehicleRequest.php'] || $baseurl['VehicleRequestCreate.php']) echo 'active'; ?>">
                  <a href="VehicleRequest.php?division=<?php echo $param1; ?>" style="color:black;">
                    <i class="fa fa-archive" style="color:black;"></i>Vehicle Request
                  </a>
                </li>
                <!------------------------------------- VEHICLE REQUEST ------------------------------------------->
              <?php endif ?>

            </ul>
          </li>

          <li class="treeview <?php if ($menuchecker['finance_obligation'] || $menuchecker['finance_fundsource'] || $menuchecker['nta_obligation']  || $menuchecker['payroll'] || $menuchecker['payroll_update'] || $menuchecker['travel_claim'] || $menuchecker['nta_obcreate'] || $menuchecker['dv'] || $menuchecker['dv_update'] || $menuchecker['dv_process'] ||  $menuchecker['dv_create'] ||  $menuchecker['nta'] || $menuchecker['nta_create'] || $menuchecker['nta_update'] || $menuchecker['nta_view'] || $menuchecker['saro'] || $menuchecker['ors_burs'] || $menuchecker['saro_create'] || $menuchecker['saro_update'] || $menuchecker['ob_view'] || $menuchecker['ob_create'] || $menuchecker['view_burs'] || $menuchecker['funds_downloaded']) echo 'active'; ?>">

            <?php if (in_array(29, $arrayModuleId) || in_array(30, $arrayModuleId) || in_array(31, $arrayModuleId) || in_array(32, $arrayModuleId) || in_array(33, $arrayModuleId) || in_array(34, $arrayModuleId) || in_array(35, $arrayModuleId) || in_array(36, $arrayModuleId) || in_array(37, $arrayModuleId) || in_array(38, $arrayModuleId)) : ?>
              <!-------------------------------------------- FINANCE ------------------------------------------->
              <a href="">
                <i class="fa fa-money" style=" <?php echo isActive(1); ?>"></i>
                <span style=" <?php echo isActive(1); ?>">Finance</span>
                <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
              </a>
              <!-------------------------------------------- FINANCE ------------------------------------------->
            <?php endif ?>

            <ul class="treeview-menu">
              <li class="treeview <?php if ($menuchecker['finance_obligation'] || $menuchecker['finance_fundsource'] || $menuchecker['ors_burs'] || $menuchecker['saro_create'] || $menuchecker['saro_update'] || $menuchecker['ob_view'] || $menuchecker['ob_create'] || $menuchecker['view_burs']) echo 'menu-open active'; ?>">

                <?php if (in_array(30, $arrayModuleId) || in_array(31, $arrayModuleId) || in_array(32, $arrayModuleId)) : ?>
                  <!-------------------------------------------- BUDGET SECTION ------------------------------------------->
                  <a href="#">
                    <i class="fa fa-folder-open-o" style="color:black;"></i>
                    <span>Budget Section</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <!-------------------------------------------- BUDGET SECTION ------------------------------------------->
                <?php endif ?>

                <ul class="treeview-menu <?php if ($menuchecker['finance_obligation'] || $menuchecker['finance_fundsource'] || $menuchecker['ors_burs'] || $menuchecker['saro_create'] || $menuchecker['saro_update'] || $menuchecker['ob_view'] || $menuchecker['ob_create']) echo 'menu-open active'; ?>">


                  <?php if (in_array(31, $arrayModuleId)) : ?>
                    <!-------------------------------------------- SARO/SUB-ARO ------------------------------------------->
                    <!-- <li class = "<?php if ($menuchecker['saro_create'] || $menuchecker['saro_update'] || $menuchecker['ob_view'] || $menuchecker['ob_create']) echo 'active'; ?>"><a href="saro.php?division=<?php echo $param1; ?>" ><i class="fa fa-copy" style = "color:black;"></i> SARO/SUB-ARO </a></li> -->

                    <li class="<?php if ($menuchecker['finance_fundsource'] || $menuchecker['saro_create'] || $menuchecker['saro_update'] || $menuchecker['ob_view'] || $menuchecker['ob_create']) echo 'active'; ?>"><a href="budget_fundsource.php?division=<?php echo $param1; ?>"><i class="fa fa-copy" style="color:black;"></i> Fund Source</a></li>

                    <!-------------------------------------------- SARO/SUB-ARO ------------------------------------------->
                  <?php endif ?>

                  <?php if (in_array(32, $arrayModuleId)) : ?>
                    <!-------------------------------------------- ORS/BURS ------------------------------------------->
                    <!-- <li class = "<?php if ($menuchecker['ors_burs'] || $menuchecker['view_burs']) echo 'active'; ?>"><a href="obligation.php?page=1&ipp=10&division=<?php echo $param1; ?>" ><i class="fa fa-copy" style = "color:black;"></i> ORS/BURS</a></li> -->

                    <li class="<?php if ($menuchecker['finance_obligation'] || $menuchecker['ors_burs'] || $menuchecker['view_burs']) echo 'active'; ?>"><a href="budget_obligation.php?page=1&ipp=10&division=<?php echo $param1; ?>"><i class="fa fa-copy" style="color:black;"></i> Obligation</a></li>
                    <!-------------------------------------------- ORS/BURS ------------------------------------------->
                  <?php endif ?>

                </ul>
              </li>
          </li>

          <li class="treeview <?php if ($menuchecker['dv'] || $menuchecker['dv_update'] || $menuchecker['dv_process'] ||  $menuchecker['dv_create'] || $menuchecker['nta'] || $menuchecker['nta_create'] || $menuchecker['nta_update'] || $menuchecker['nta_view']) echo 'active'; ?>">

            <!-------------------------------------------- ACCOUNTING ------------------------------------------->
            <?php if (in_array(33, $arrayModuleId) || in_array(34, $arrayModuleId) || in_array(35, $arrayModuleId)) : ?>
              <a href="#">
                <i class="fa fa-folder-open-o" style="color:black;"></i>
                <span>Accounting Section</span <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
            <?php endif ?>
            <!-------------------------------------------- ACCOUNTING ------------------------------------------->

            <ul class="treeview-menu  <?php if ($menuchecker['dv'] ||  $menuchecker['dv_create'] || $menuchecker['dv_process'] || $menuchecker['nta'] || $menuchecker['nta_update'] || $menuchecker['nta_view']) echo 'menu-open active'; ?>">

              <?php if (in_array(34, $arrayModuleId)) : ?>
                <!-------------------------------------------- NTA/NCA ------------------------------------------->
                <li class="<?php if ($menuchecker['nta'] || $menuchecker['nta_create'] || $menuchecker['nta_update'] || $menuchecker['nta_view']) echo 'active'; ?>"><a href="accounting_nta.php?division=<?php echo $param1; ?>"><i class="fa" style="color:black;">&#xf0f6;</i>NTA/NCA</a></li>
                <!-------------------------------------------- NTA/NCA ------------------------------------------->
              <?php endif ?>

              <?php if (in_array(35, $arrayModuleId)) : ?>
                <!-------------------------------------------- DISBURSEMENT ------------------------------------------->
                <li class="<?php if ($menuchecker['dv_update'] || $menuchecker['dv'] || $menuchecker['dv_create'] || $menuchecker['dv_process']) echo 'active'; ?>"><a href="accounting_disbursement.php?division=<?php echo $param1; ?>"><i class="fa" style="color:black;">&#xf0f6;</i>DISBURSEMENT</a></li>
                <!-------------------------------------------- DISBURSEMENT ------------------------------------------->
              <?php endif ?>

            </ul>
          </li>

          <li class="treeview <?php if ($menuchecker['nta_obligation'] || $menuchecker['nta_obcreate']) echo 'active'; ?>">

            <?php if (in_array(36, $arrayModuleId) || in_array(37, $arrayModuleId) || in_array(38, $arrayModuleId)) : ?>
              <!-------------------------------------------- CASH ------------------------------------------->
              <a href="#">
                <i class="fa fa-folder-open-o" style="color:black;"></i>
                <span>Cash Section</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <!-------------------------------------------- CASH ------------------------------------------->
            <?php endif ?>

            <ul class="treeview-menu">

              <?php if (in_array(37, $arrayModuleId)) : ?>
                <!-------------------------------------------- PAYMENT ------------------------------------------->
                <!-- UNCOMMENT IF MODULE IS READY -->
                  <!-- <li class = "<?php if($menuchecker['nta_obligation'] || $menuchecker['nta_obcreate']) echo 'active';?>"><a href="cash_payment.php?division=<?php echo $param1;?>" ><i class="fa" style = "color:black;">&#xf0f6;</i>PAYMENT</a></li> -->

                  <li class = "<?php if($menuchecker['nta_obligation'] || $menuchecker['nta_obcreate']) echo 'active';?>"><a href="error_500.php?division=<?php echo $param1;?>" ><i class="fa" style = "color:black;">&#xf0f6;</i>PAYMENT</a></li>
                <!-------------------------------------------- PAYMENT ------------------------------------------->
              <?php endif ?>

            </ul>

          </li>

          <?php if (in_array(38, $arrayModuleId)) : ?>
            <!-------------------------------------------- TRAVEL CLAIM ------------------------------------------->
            <li class="<?php if ($menuchecker['travel_claim']) echo 'active'; ?>"><a href="CreateTravelClaim.php?username=<?php echo $param2; ?>&division=<?php echo $param1; ?>"><i class="fa fa-folder-open-o" style="color:black;"></i>Travel Claim</a></li>
            <!-- <li class = "<? php // if($menuchecker['payroll'] || $menuchecker['payroll_update']  ) echo 'active';
                              ?>"><a href="PayrollEmployee.php?division=<?php echo $param1; ?>&username=<?php echo $username; ?>"  style = "color:black;"><i class="fa fa-user" style = "color:black;"></i>Payroll</a></li> -->
            <!-------------------------------------------- TRAVEL CLAIM ------------------------------------------->
          <?php endif ?>

          <!-- UNCOMMENT WHEN MODULE IS READY -->
          <!-- <li class = "<?= $menuchecker['funds_downloaded'] ? 'active' : '';?>"><a href="funds_downloaded.php?division=<?= $_SESSION['division'];?>" ><i class="fa fa-folder-open-o" style = "color:black;"></i>Funds Downloaded</a></li> -->

          <li class = "<?= $menuchecker['funds_downloaded'] ? 'active' : '';?>"><a href="error_500.php?division=<?= $_SESSION['division'];?>" ><i class="fa fa-folder-open-o" style = "color:black;"></i>Funds Downloaded</a></li>


          <!-------------------------------------------- TO BE ADDED ------------------------------------------->

          <?php if ($username == 'masacluti' || $username == 'mmmonteiro' || $username == 'seolivar') : ?>
            <li class="treeview <?php if ($link == 'http://fas.calabarzon.dilg.gov.ph/ViewEmployee.php?division=' . $param5 . '' || $link == 'http://fas.calabarzon.dilg.gov.ph/ViewRetireEmployee.php?division=' . $param5 . '' || $link == 'http://fas.calabarzon.dilg.gov.ph/ViewResignEmployee.php?getntano=' . $_GET['getntano'] . '&getparticular=' . $_GET['getparticular'] . '' || $link == 'http://fas.calabarzon.dilg.gov.ph/ViewOnLeaveEmployee.php?division=' . $param5 . '' || $link == 'http://fas.calabarzon.dilg.gov.ph/nta.php?division=' . $param5 . '' || $link == 'http://fas.calabarzon.dilg.gov.ph/obligation.php?page=1&ipp=10' || $link == 'http://fas.calabarzon.dilg.gov.ph/saroupdate.php?getid=' . $_GET['getid'] . '' || $link == 'http://fas.calabarzon.dilg.gov.ph/obupdate.php?getid=' . $_GET['getid'] . '' || $link == 'http://fas.calabarzon.dilg.gov.ph/sarocreate.php' || $link == 'http://fas.calabarzon.dilg.gov.ph/obtableViewMain.php?getsaroID=' . $_GET['getsaroID'] . '&getuacs=' . $_GET['getuacs'] . '') {
                                  echo 'active';
                                } ?>">
              <a href="">
                <i class="fa fa-money" style="color:black;"></i>
                <span style="color:black;font-weight:normal;">Payroll</span>
                <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
              </a>
              <ul class="treeview-menu">
                <li class="treeview">
                  <a href="#">
                    <i class="fa fa-folder-open-o" style="color:black;"></i>
                    <span>Employees</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu">
                    <li><a href="ViewEmployee.php?division=<?php echo $param1; ?>"><i class="fa fa-copy" style="color:black;"></i> Employee List </a></li>
                    <li><a href="ViewRetireEmployee.php?division=<?php echo $param1; ?>"><i class="fa fa-copy" style="color:black;"></i> Retire Employees</a></li>
                    <li><a href="ViewResignEmployee.php?division=<?php echo $param1; ?>"><i class="fa fa-copy" style="color:black;"></i> Resign Employees</a></li>
                    <li><a href="ViewOnLeaveEmployee.php?division=<?php echo $param1; ?>"><i class="fa fa-copy" style="color:black;"></i> On Leave Employees</a></li>
                  </ul>
                </li>
            </li>

            <li><a href="ViewDeduction.php?username=<?php echo $param2; ?>&division=<?php echo $param1; ?>"><i class="fa fa-folder-open-o" style="color:black;"></i>Manage Allowances</a></li>
            <li><a href="ViewGeneratePayroll.php?username=<?php echo $param2; ?>&division=<?php echo $param1; ?>"><i class="fa fa-folder-open-o" style="color:black;"></i>Generate Payroll</a></li>
            <li><a href="CreateLoans.php?username=<?php echo $param2; ?>&division=<?php echo $param1; ?>"><i class="fa fa-folder-open-o" style="color:black;"></i>Create Loan</a></li>
            <!-- <li><a href="PayrollEmployee.php?division=<?php echo $param1; ?>&username=<?php echo $username; ?>"  style = "color:black;font-weight:normal;"><i class="fa fa-user" style = "color:black;"></i>Update Payroll Emp</a></li> -->
        </ul>

        </li>

      <?php endif ?>
      <!-------------------------------------------- TO BE ADDED ------------------------------------------->



      </ul>
      </li>


      <li class="treeview <?php if ($menuchecker['ict_ta'] || $menuchecker['web_posting']) echo 'menu-open active'; ?>">

        <?php if (in_array(39, $arrayModuleId) || in_array(40, $arrayModuleId) || in_array(41, $arrayModuleId)) : ?>
          <!-------------------------------------------- RICTU ------------------------------------------->
          <a href="#">
            <i class="fa fa-desktop" style=" <?php echo isActive(1); ?>"></i>
            <span style=" <?php echo isActive(1); ?>">RICTU</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
          </a>
          <!-------------------------------------------- RICTU ------------------------------------------->
        <?php endif ?>

        <ul class="treeview-menu">

          <?php if (in_array(40, $arrayModuleId)) : ?>
            <!-------------------------------------------- TECHNICAL ASSISTANCE ------------------------------------------->
            <li class="<?php if ($menuchecker['ict_ta']) {
                          echo 'active';
                        } ?>">
              <a href="processing.php?division=<?php echo $_SESSION['division']; ?>&ticket_id=&username=<?= $_GET['username']; ?>">
                <i class="fa fa-folder" style="color:black;"></i>
                <span style="color:black;">ICT Technical Assistance</span>
              </a>
            </li>
            <!-------------------------------------------- TECHNICAL ASSISTANCE ------------------------------------------->
          <?php endif ?>

          <?php if (in_array(41, $arrayModuleId)) : ?>
            <!-------------------------------------------- WEBPOSTING ------------------------------------------->
            <li class="<?php if ($menuchecker['web_posting']) echo 'active'; ?> ">
              <a href="webForm_monitoring.php?division=<?php echo $_SESSION['division']; ?>&ticket_id=">
                <i class="fa fa-code" style="color:black;"></i>
                <span style="color:black;">Website Posting</span>
              </a>

            </li>
            <!-------------------------------------------- WEBPOSTING ------------------------------------------->
          <?php endif ?>

        </ul>
      </li>
      <li class=" treeview <?php if ($menuchecker['setting'] || $menuchecker['approval']) echo 'active'; ?>">


        <?php if (in_array(42, $arrayModuleId) || in_array(43, $arrayModuleId) || in_array(44, $arrayModuleId)) : ?>
          <!-------------------------------------------- SETTINGS ------------------------------------------->
          <a href="">
            <i class="fa fa-cogs" style=" <?php echo isActive(1); ?>"></i>
            <span style=" <?php echo isActive(1); ?>">Setting</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <!-------------------------------------------- SETTINGS ------------------------------------------->
        <?php endif ?>

        <ul class="treeview-menu <?php if ($menuchecker['setting'] || $menuchecker['approval']) echo 'active'; ?>">

          <?php if (in_array(43, $arrayModuleId)) : ?>
            <!-------------------------------------------- USER MANAGEMENT ------------------------------------------->
            <li class="<?php if ($menuchecker['setting']) echo 'active'; ?>"><a href="Accounts.php"><i class="fa fa-fw fa-user-md" style="color:black;"></i>User Management</li>
            <!-------------------------------------------- USER MANAGEMENT ------------------------------------------->
          <?php endif ?>

          <?php if (in_array(44, $arrayModuleId)) : ?>
            <!-------------------------------------------- FOR APPROVAL ------------------------------------------->
            <li class="<?php if ($menuchecker['approval']) echo 'active'; ?>"><a href="Approval.php"><i class="fa fa-fw fa-check-square-o" style="color:black;"></i>For Approval</li>
            <!-------------------------------------------- FOR APPROVAL ------------------------------------------->
          <?php endif ?>

        </ul>

      </li>
      <li>
        <a href="logout.php" class="hidden">
          <i class="fa fa-sign-out " style=" <?php echo isActive(1); ?>"></i>
          <span style=" <?php echo isActive(1); ?>">Log out</span>
        </a>
      </li>



      <?php
      //  menuOption('Dashboard',$dashboard,'fa fa-dashboard',$param1,null,null,null,null,null,$username,$link,'');
      //  menuOption('Calendar',$calendar,'fa fa-calendar',$param1,$param2,$param3,null,null,null,$username,$link,'');
      // //  menuOption('Records Section',null,'fa fa-folder',$param1,$param2,$param3,$param4,$param5,$param6,$username,$link,$val);
      //  menuOption('HR Section',null,'fa fa-users',$param1,$param2,$param3,$param4,$param5,$param6,$username,$link,'');
      // //  menuOption('GSS Section',null,'fa fa-users',$param1,$param2,$param3,$param4,$param5,$param6,$username,$link,$val);
      // //  menuOption('Finance',null,'fa fa-money',$param1,$param2,$param3,$param4,$param5,$param6,$username,$link,$val);
      // //  menuOption('RICTU',null,'fa fa-desktop',$param1,$param2,$param3,$param4,$param5,$param6,$username,$link,$val);
      //  menuOption('Setting',null,'fa fa-cogs',$param1,$param2,$param3,$param4,$param5,$param6,$username,$link,'');
      // //  menuOption('Log out',null,'fa fa-cogs',$param1,$param2,$param3,$param4,$param5,$param6,$username,$link,$val);
      ?>
      </ul>
      </section>
      <!-- /.sidebar -->
    </aside>