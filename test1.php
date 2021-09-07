<?php 
session_start();
include('template/function.php');
include 'lgcdd_divisionchecker.php';

if(!isset($_SESSION['username']) || !isset($_SESSION['complete_name'])){ header('location:index.php'); }else{ error_reporting(0); ini_set('display_errors', 0); 
  $username = $_SESSION['username']; $TIN_N = $_SESSION['TIN_N']; $DEPT_ID = $_SESSION['DEPT_ID']; }
  $link = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://" . $_SERVER['HTTP_HOST'] .   $_SERVER['REQUEST_URI']; 

 
?>
 


<body class=" hold-transition  skin-red-light sidebar-mini">
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
         
          


          ?>
  <!--SIDE BAR   -->
          <li class="<?php if($menuchecker['dashboard']) echo 'active';?>">
            <a href="<?php echo $dashboard;?>" >
              <i class="fa fa-dashboard" style = " <?php echo isActive(1);?>"></i> <span style = " <?php echo isActive(1);?>" >Dashboard</span>
              <span class="pull-right-container"> </span>
            </a>
          </li>
          <li class = "<?php if($menuchecker['calendar']) echo 'active';?>">
                  <a href="<?php echo $calendar;?>">
                  <i class="fa fa-calendar" style = " <?php echo isActive(1);?>"></i>
                  <span  style = " <?php echo isActive(1);?>">Calendar</span>
                  </a>
            </li>
          <?php if ($is_allow): ?>
            <li class = "treeview <?php if($menuchecker['task_management'] OR $menuchecker['template_generator']) echo 'menu-open active';?>">
              <a href="#">
                <i class="fa fa-tasks" style = " <?php echo isActive(1);?>"></i>
                <span  style = " <?php echo isActive(1);?>">LGCDD</span><span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
              </a>
              <ul class="treeview-menu" >
                <li class="<?php if($menuchecker['task_management']) echo 'active';?>">
                  <!-- test -->
                  <a href="base_task_management.html.php?division=<?php echo $_SESSION['division'];?>">
                    <i class="fa fa-tasks" style = "color:black;"></i>
                    <span  style = "color:black;">Task Management</span>
                  </a>
                </li>
                <li class="<?php if($menuchecker['template_generator']) echo 'active';?>">
                  <!-- test -->
                  <a href="base_template_generator.html.php?division=<?php echo $_SESSION['division'];?>">
                    <i class="fa fa-file-pdf-o" style = "color:black;"></i>
                    <span  style = "color:black;">Template Generator</span>
                  </a>
                </li>
              </ul>
            </li>  
          <?php endif ?>
           
              <li class = "treeview <?php if($menuchecker['databank'] OR $menuchecker['issuances'] OR $menuchecker['phone_directory']) echo 'menu-open active';?>">
                <a  href="#" >
                  <i class="fa fa-folder" style = " <?php echo isActive(1);?>"></i> 
                  <span  style = " <?php echo isActive(1);?>">Records Section</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                </a>
                <ul class="treeview-menu" >
                    <li class = <?php if($menuchecker['databank']) echo 'active';?>>
                      <a href="databank.php?division=<?php echo $param1;?>"  style = "color:black;" >
                        <i class="fa fa-archive" style = "color:black;"></i>Databank
                        <span class="label  bg-blue" style = "background-color:skyblue;color:blue;" id = ""><b>0</b></span>
                      </a>
                    </li>
                    <li class = <?php if($menuchecker['issuances']) echo 'active';?>>
                        <a href="issuances.php?division=<?php echo $param1;?>"  style = "color:black;"><i class="fa" style = "color:black;">&#xf0f6;</i>Issuances
                            <span href="ViewIssuancesTag.php"  class="label  bg-blue" style = "background-color:skyblue;color:blue;" id = "">
                                <b> 
                                
                                <?php
                                
                                $conn = mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
                                  
                                $username = $param2;

                                        //echo $username;
                                $select_user = mysqli_query($conn,"SELECT DIVISION_C FROM tblemployeeinfo WHERE UNAME = '$username'");
                                $rowdiv = mysqli_fetch_array($select_user);
                                $DIVISION_C = $rowdiv['DIVISION_C'];

                                $select_office = mysqli_query($conn, "SELECT DIVISION_M from tblpersonneldivision where DIVISION_N = '$DIVISION_C'");
                                $rowdiv1 = mysqli_fetch_array($select_office);
                                $DIVISION_M = $rowdiv1['DIVISION_M'];

                                $countissuances = mysqli_query($conn, "SELECT count(id) as a from issuances_office_responsible where office_responsible = '$DIVISION_M'");
                                $rowc = mysqli_fetch_array($countissuances);
                                $countissuancesspan = $rowc['a'];
                                
                                ?>
                                
                                <?php echo $countissuancesspan  ;
                                mysqli_close($conn);

                                ?>
                                
                                
                                </b>
                                
                            </span>
                        </a>
                    </li> 
                    <li class = <?php if($menuchecker['phone_directory']) echo 'active';?>>
                      <a href="Directory.php?division=<?php echo $param1;?>"  style = "color:black;" >
                        <i class="fa fa-archive" style = "color:black;"></i>Directory
                      </a>
                    </li>
                </ul>
              </li>
         
              <li class ="treeview <?php if( $menuchecker['employees_directory'] || $menuchecker['dtr'] || $menuchecker['dtra'] || $menuchecker['ro_and_roo'] || $menuchecker['official_business'] || $menuchecker['travel_order'] || $menuchecker['health_monitoring'])echo "menu-open active" ?>" >
                <a  href="#" >
                  <i class="fa fa-users" style = " <?php echo isActive(1);?>"></i> 
                  <span  style = " <?php echo isActive(1);?>">HR Section</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                </a>
                <ul class="treeview-menu" >
                  <li class ="<?php if( $menuchecker['employees_directory']) echo 'active' ?>">
                    <a href="ViewEmployees.php?division=<?php echo $param1;?>&username=<?php echo $username;?>"  style = "color:black;">
                      <i class="fa fa-user" style = "color:black;"></i>Employees Directory
                    </a>
                  </li>
                  <li class ="<?php if( $menuchecker['dtr']) echo 'active' ?>">
                    <a href="DTR.php?division=<?php echo $param1;?>&username=<?php echo $username;?>"  style = "color:black;">
                      <i class="fa fa-user" style = "color:black;"></i>DTR
                    </a>
                  </li>
                  <?php if ($username == 'gltumamac' || $username == 'mmmonteiro' || $username == 'pmmendoza' || $username == 'hpsolis' || $username == 'magonzales' || $username == 'jtbeltran' || $username == 'cscruz' || $username == 'rbnanez' || $username == 'assangel' || $username == 'jvnadal' || $username == 'aasalvatus' || $username == 'masacluti'): ?>
                    <li class ="<?php if( $menuchecker['dtra']) echo 'active' ?>">
                      <a href="DtrMonitoring.php?division=<?php echo $param1;?>&username=<?php echo $username;?>"  style = "color:black;">
                        <i class="fa fa-user" style = "color:black;"></i>DTR Monitoring
                      </a>
                    </li>
                  <?php endif ?>
                  <li class ="<?php if( $menuchecker['ro_and_roo']) echo 'active' ?>">
                    <a href="ROandROO.php?division=<?php echo $param1;?>"  style = "color:black;" >
                      <i class="fa fa-archive" style = "color:black;"></i>RO and ROO
                    </a>
                  </li>
                  <li class ="<?php if( $menuchecker['official_business']) echo 'active' ?>">
                    <a href="ob.php?division=<?php echo $param1;?>"  style = "color:black;">
                      <i class="fa fa-user" style = "color:black;"></i>Official Business
                    </a>
                  </li>
                  <li class ="<?php if( $menuchecker['travel_order']) echo 'active' ?>">
                    <a href="TravelOrder.php?division=<?php echo $param1;?>"  style = "color:black;" >
                      <i class="fa fa-archive" style = "color:black;"></i>Travel Order
                    </a>
                  </li>
                  <li class="treeview <?php if( $menuchecker['health_monitoring']) echo 'menu-open active';?>">
                    <a href="#">
                      <i class="fa fa-medkit" style = "color:black;"></i>
                        <span >Health Monitoring</span>
                          <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu" >
                      <li class ="<?php if( $menuchecker['health_declaration_form']) echo 'active' ?>"><a href="HealthMonitoring.php?action=show&username=<?php echo $username;?>&division=<?php echo $param1;?>"><i class="fa fa-copy" style = "color:black;"></i>Health Declaration Form</a></li>
                      <li class ="<?php if( $menuchecker['health_monitoring']) echo 'active' ?>"><a href="HealthMonitoring.php?username=<?php echo $username;?>&division=<?php echo $param1;?>"><i class="fa fa-copy" style = "color:black;"></i>Health Monitoring</a></li>
                    </ul>
                  </li>
                  </li>
                  <!-- <li><a href="base_fives_monitoring_form.html.php?action=show&username=<?php echo $username;?>&division=<?php echo $param1;?>"><i class="fa fa-file-text" style = "color:black;"></i>5S Monitoring Form</a></li> -->
                </ul>
          </li>
          <li class ="treeview <?php if ($baseurl['ViewApp.php'] || $baseurl['ViewPR.php'] || $baseurl['UpdateAPP.php'] || $baseurl['ViewApp_History.php'] || $baseurl['CreateAPP.php'] || $baseurl['CreatePR.php'] ||  $baseurl['ViewPRv.php'] || $baseurl['ViewRFQdetails.php'] || $baseurl['ViewUpdateRFQ.php'] || $baseurl['ViewRFQ.php'] || $baseurl['CreateRFQ.php'] || $baseurl['CreateAoq.php']  || $baseurl['ViewSuppliers.php'] || $baseurl['CreateSuppliers.php'] || $baseurl['UpdateSuppliers.php'] || $baseurl['UpdateSuppliers.php'] || $baseurl['stocks.php'] || $baseurl['CreateStocks.php'] || $baseurl['@stockledger.php'] || $baseurl['ViewIAR.php'] || $baseurl['UpdateIAR.php'] || $baseurl['CreateIAR.php'] || $baseurl['ViewRIS.php'] || $baseurl['CreateRIS.php']||$baseurl['UpdateRIS.php'] || $baseurl['ViewRPCI.php'] || $baseurl['UpdateRPCI.php'] || $baseurl['CreateRPCI.php'] || $baseurl['ViewRPCPPE.php'] || $baseurl['CreateRPCPPE.php'] || $baseurl['ViewPPE.php'] || $baseurl['VehicleRequest.php'] || $baseurl['VehicleRequestCreate.php']) echo 'menu-open active'; ?>" >
              <a  href="#" >
                <i class="fa fa-users" style = " <?php echo isActive(1);?>"></i> 
                <span style = " <?php echo isActive(1);?>">GSS Section</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
              </a>
              <ul class="treeview-menu" > <li class = "treeview <?php if ($baseurl['ViewApp.php'] || $baseurl['ViewPR.php'] || $baseurl['UpdateAPP.php'] || $baseurl['ViewApp_History.php'] || $baseurl['CreateAPP.php'] || $baseurl['CreatePR.php'] || $baseurl['ViewPRv.php'] || $baseurl['ViewRFQdetails.php']|| $baseurl['ViewUpdateRFQ.php'] || $baseurl['ViewRFQ.php'] || $baseurl['CreateRFQ.php'] || $baseurl['CreateAoq.php'] || $baseurl['ViewSuppliers.php']|| $baseurl['CreateSuppliers.php'] || $baseurl['UpdateSuppliers.php']  ) echo 'menu-open';?>">
                  <a  href="#">
                    <i class="fa fa-cart-arrow-down " style = "color:black;"></i>
                    <span  style = "color:black;">Procurement</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right" style = "color:black;"></i></span>
                  </a>
                  <ul class="treeview-menu" style = " <?php if ($baseurl['ViewApp.php'] || $baseurl['ViewPR.php'] || $baseurl['UpdateAPP.php'] || $baseurl['ViewApp_History.php'] || $baseurl['CreateAPP.php'] || $baseurl['CreatePR.php'] || $baseurl['ViewPRv.php'] || $baseurl['ViewRFQdetails.php'] || $baseurl['ViewUpdateRFQ.php'] || $baseurl['ViewRFQ.php'] || $baseurl['CreateRFQ.php'] || $baseurl['CreateAoq.php'] || $baseurl['ViewSuppliers.php'] || $baseurl['CreateSuppliers.php'] || $baseurl['UpdateSuppliers.php'] ) echo 'display:block;';?>">
                    <li class = "<?php if ($baseurl['ViewApp.php'] || $baseurl['UpdateAPP.php'] || $baseurl['ViewApp_History.php'] || $baseurl['CreateAPP.php']) echo 'active';?>"><a href="ViewApp.php?division=<?php echo $param1;?>" ><i class="fa" style = "color:black;">&#xf0f6;</i> APP</a></li>
                    <li class = "<?php if($baseurl['ViewPR.php'] || $baseurl['CreatePR.php'] || $baseurl['ViewRFQdetails.php'] || $baseurl['ViewUpdateRFQ.php'] ) echo 'active';?>"><a href="ViewPR.php?division=<?php echo $param1;?>" ><i class="fa" style = "color:black;">&#xf0f6;</i> Purchase Request</a></li>
                    <li class = "<?php if($baseurl['ViewRFQ.php'] || $baseurl['CreateRFQ.php'] || $baseurl['CreateAoq.php']) echo 'active';?>"><a href="ViewRFQ.php?division=<?php echo $param1;?>" ><i class="fa" style = "color:black;">&#xf0f6;</i> Request for Quotation</a></li>
                    <li class = "<?php if($baseurl['ViewSuppliers.php'] ||  $baseurl['CreateSuppliers.php'] || $baseurl['UpdateSuppliers.php']) echo 'active';?>" ><a href="ViewSuppliers.php"><i class="fa" style = "color:black;">&#xf0f6;</i><span>Supplier</span></a></li>
                  </ul>
                </li>
                <li class="treeview <?php if( $baseurl['stocks.php'] || $baseurl['CreateStocks.php'] || $baseurl['@stockledger.php'] || $baseurl['ViewIAR.php'] || $baseurl['UpdateIAR.php'] || $baseurl['ViewRIS.php'] || $baseurl['CreateRIS.php'] || $baseurl['UpdateRIS.php'] || $baseurl['ViewRPCI.php'] || $baseurl['UpdateRPCI.php'] || $baseurl['CreateRPCI.php'] || $baseurl['ViewRPCPPE.php'] || $baseurl['CreateRPCPPE.php'] || $baseurl['ViewPPE.php'] || $baseurl['VehicleRequest.php'] || $baseurl['VehicleRequestCreate.php']) echo 'menu-open';?>">
                  <a href="" >
                    <i class="fa fa-briefcase " style = "color:black;"></i>
                    <span style = "color:black;font-weight:normal;" >Asset Management</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu" style = "<?php if( $baseurl['stocks.php'] || $baseurl['CreateStocks.php'] || $baseurl['@stockledger.php'] || $baseurl['ViewIAR.php'] || $baseurl['UpdateIAR.php'] || $baseurl['ViewRIS.php'] || $baseurl['CreateRIS.php'] || $baseurl['UpdateRIS.php'] || $baseurl['ViewRPCI.php'] || $baseurl['UpdateRPCI.php'] || $baseurl['CreateRPCI.php'] || $baseurl['ViewRPCPPE.php'] || $baseurl['CreateRPCPPE.php'] || $baseurl['ViewPPE.php'] || $baseurl['VehicleRequest.php'] || $baseurl['VehicleRequestCreate.php']) echo 'display:block;'; ?>" >
                    <li class = "<?php if($baseurl['stocks.php'] || $baseurl['CreateStocks.php']) echo 'active';?>"><a href="stocks.php?division=<?php echo $param1;?>" ><i class="fa" style = "color:black;">&#xf0f6;</i> Stock Card</a></li>
                    <li class = "<?php if($baseurl['@stockledger.php'] ) echo 'active';?>"><a href="@stockledger.php?division=<?php echo $param1;?>" ><i class="fa" style = "color:black;">&#xf0f6;</i>Supplies Ledger Card</a></li>
                    <li class = "<?php if($baseurl['UpdateIAR.php'] || $baseurl['ViewIAR.php'] || $baseurl['CreateIAR.php']) echo 'active';?>"><a href="ViewIAR.php?division=<?php echo $param1;?>" ><i class="fa" style = "color:black;">&#xf0f6;</i> IAR</a></li>
                    <li class = "<?php if($baseurl['ViewRIS.php'] || $baseurl['CreateRIS.php'] || $baseurl['UpdateRIS.php']) echo 'active';?>"><a href="ViewRIS.php?division=<?php echo $param1;?>" ><i class="fa" style = "color:black;">&#xf0f6;</i>RIS</a></li>
                    <li class = "<?php if($baseurl['ViewRPCI.php'] || $baseurl['UpdateRPCI.php'] || $baseurl['CreateRPCI.php'])echo 'active';?>"><a href="ViewRPCI.php?division=<?php echo $param1;?>" ><i class="fa" style = "color:black;">&#xf0f6;</i>ICS</a></li>
                    <li class = "<?php if($baseurl['ViewRPCPPE.php'] || $baseurl['CreateRPCPPE.php'] || $baseurl['ViewPPE.php']) echo 'active';?>"><a href="ViewRPCPPE.php?division=<?php echo $param1;?>" ><i class="fa" style = "color:black;">&#xf0f6;</i>PAR</a></li>
                  </ul>
                </li>
                <li class = "<?php if($baseurl['VehicleRequest.php'] || $baseurl['VehicleRequestCreate.php']) echo 'active';?>">
                  <a href="VehicleRequest.php?division=<?php echo $param1;?>"  style = "color:black;" >
                    <i class="fa fa-archive" style = "color:black;"></i>Vehicle Request
                  </a>
                </li>
              
              </ul>
          </li>
          
              <li class="treeview <?php if($menuchecker['nta_obligation']  || $menuchecker['payroll'] || $menuchecker['payroll_update'] ||$menuchecker['travel_claim'] || $menuchecker['nta_obcreate']|| $menuchecker['dv'] || $menuchecker['dv_update'] || $menuchecker['dv_process']||  $menuchecker['dv_create']||  $menuchecker['nta'] || $menuchecker['nta_create'] || $menuchecker['nta_update'] || $menuchecker['nta_view'] || $menuchecker['saro'] || $menuchecker['ors_burs'] || $menuchecker['saro_create'] || $menuchecker['saro_update'] || $menuchecker['ob_view'] || $menuchecker['ob_create'] || $menuchecker['view_burs']) echo 'active';?>">
                  <a href="" >
                    <i class="fa fa-money" style = " <?php echo isActive(1);?>"></i>
                    <span  style = " <?php echo isActive(1);?>">Finance</span>
                    <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                  </a>
                  <ul class="treeview-menu">
                    <li class="treeview <?php if( $menuchecker['saro'] || $menuchecker['ors_burs'] || $menuchecker['saro_create'] || $menuchecker['saro_update'] || $menuchecker['ob_view'] || $menuchecker['ob_create'] || $menuchecker['view_burs']) echo 'menu-open active';?>">
                      <a href="#" >
                        <i class="fa fa-folder-open-o" style = "color:black;"></i>
                        <span >Budget Section</span>
                        <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                        </span>
                      </a>
                      <ul class="treeview-menu <?php if($menuchecker['saro'] || $menuchecker['ors_burs'] || $menuchecker['saro_create'] || $menuchecker['saro_update'] || $menuchecker['ob_view'] || $menuchecker['ob_create']) echo 'menu-open active';?>">
                        <li class = "<?php if($menuchecker['saro'] || $menuchecker['saro_create'] || $menuchecker['saro_update'] || $menuchecker['ob_view'] || $menuchecker['ob_create']) echo 'active';?>"><a href="saro.php?division=<?php echo $param1;?>" ><i class="fa fa-copy" style = "color:black;"></i> SARO/SUB-ARO </a></li>
                        <li class = "<?php if($menuchecker['ors_burs'] || $menuchecker['view_burs']) echo 'active';?>"><a href="obligation.php?page=1&ipp=10&division=<?php echo $param1;?>" ><i class="fa fa-copy" style = "color:black;"></i> ORS/BURS</a></li>
                      </ul>
                    </li>
              </li>
                      
              <li class="treeview <?php if($menuchecker['dv'] || $menuchecker['dv_update']|| $menuchecker['dv_process'] ||  $menuchecker['dv_create'] || $menuchecker['nta'] || $menuchecker['nta_create'] || $menuchecker['nta_update'] || $menuchecker['nta_view'] ) echo 'active';?>">
                <a href="#" >
                  <i class="fa fa-folder-open-o" style = "color:black;"></i>
                  <span >Accounting Section</span
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu  <?php if($menuchecker['dv'] ||  $menuchecker['dv_create'] || $menuchecker['dv_process']|| $menuchecker['nta'] || $menuchecker['nta_update'] || $menuchecker['nta_view'] ) echo 'menu-open active';?>">
                  <li class = "<?php if($menuchecker['nta'] || $menuchecker['nta_create'] || $menuchecker['nta_update'] || $menuchecker['nta_view'] ) echo 'active';?>"><a href="nta.php?division=<?php echo $param1;?>" ><i class="fa" style = "color:black;">&#xf0f6;</i>NTA/NCA</a></li>
                  <li class = "<?php if($menuchecker['dv_update'] || $menuchecker['dv'] || $menuchecker['dv_create'] || $menuchecker['dv_process']) echo 'active';?>"><a href="disbursement.php?division=<?php echo $param1;?>" ><i class="fa" style = "color:black;">&#xf0f6;</i>DISBURSEMENT</a></li>
                </ul>
              </li>

              <li class="treeview <?php if($menuchecker['nta_obligation'] || $menuchecker['nta_obcreate']) echo 'active';?>"> 
                <a href="#" >
                  <i class="fa fa-folder-open-o" style = "color:black;"></i>
                  <span >Cash Section</span>
                  <span class="pull-right-container">
                    <i class="fa fa-angle-left pull-right"></i>
                  </span>
                </a>
                <ul class="treeview-menu" >
                  <li class = "<?php if($menuchecker['nta_obligation'] || $menuchecker['nta_obcreate']) echo 'active';?>"><a href="ntaobligation.php?division=<?php echo $param1;?>" ><i class="fa" style = "color:black;">&#xf0f6;</i>PAYMENT</a></li>
                </ul> 
              </li>
              <li class = "<?php if($menuchecker['travel_claim']) echo 'active';?>"><a href="CreateTravelClaim.php?username=<?php echo $param2;?>&division=<?php echo $param1;?>" ><i class="fa fa-folder-open-o" style = "color:black;"></i>Travel Claim</a></li>
              <!-- <li class = "<?php// if($menuchecker['payroll'] || $menuchecker['payroll_update']  ) echo 'active';?>"><a href="PayrollEmployee.php?division=<?php echo $param1;?>&username=<?php echo $username;?>"  style = "color:black;"><i class="fa fa-user" style = "color:black;"></i>Payroll</a></li> -->
              <?php if ($username == 'masacluti' || $username == 'mmmonteiro' || $username == 'seolivar'): ?>
                <li class="treeview <?php if( $link == 'http://fas.calabarzon.dilg.gov.ph/ViewEmployee.php?division='.$param5.'' || $link == 'http://fas.calabarzon.dilg.gov.ph/ViewRetireEmployee.php?division='.$param5.'' || $link == 'http://fas.calabarzon.dilg.gov.ph/ViewResignEmployee.php?getntano='.$_GET['getntano'].'&getparticular='.$_GET['getparticular'].'' || $link == 'http://fas.calabarzon.dilg.gov.ph/ViewOnLeaveEmployee.php?division='.$param5.'' || $link == 'http://fas.calabarzon.dilg.gov.ph/nta.php?division='.$param5.'' || $link == 'http://fas.calabarzon.dilg.gov.ph/obligation.php?page=1&ipp=10' || $link == 'http://fas.calabarzon.dilg.gov.ph/saroupdate.php?getid='.$_GET['getid'].'' || $link == 'http://fas.calabarzon.dilg.gov.ph/obupdate.php?getid='.$_GET['getid'].'' || $link == 'http://fas.calabarzon.dilg.gov.ph/sarocreate.php' || $link == 'http://fas.calabarzon.dilg.gov.ph/obtableViewMain.php?getsaroID='.$_GET['getsaroID'].'&getuacs='.$_GET['getuacs'].'' ){ echo 'active'; } ?>" >
                  <a href="" >
                    <i class="fa fa-money" style = "color:black;"></i>
                    <span  style = "color:black;font-weight:normal;">Payroll</span>
                    <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                  </a>
                  <ul class="treeview-menu" >
                <li class="treeview">
                  <a href="#" >
                    <i class="fa fa-folder-open-o" style = "color:black;"></i>
                    <span >Employees</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu" >
                    <li><a href="ViewEmployee.php?division=<?php echo $param1;?>" ><i class="fa fa-copy" style = "color:black;"></i> Employee List </a></li>
                    <li><a href="ViewRetireEmployee.php?division=<?php echo $param1;?>" ><i class="fa fa-copy" style = "color:black;"></i> Retire Employees</a></li>
                    <li><a href="ViewResignEmployee.php?division=<?php echo $param1;?>" ><i class="fa fa-copy" style = "color:black;"></i> Resign Employees</a></li>
                    <li><a href="ViewOnLeaveEmployee.php?division=<?php echo $param1;?>" ><i class="fa fa-copy" style = "color:black;"></i> On Leave Employees</a></li>
                  </ul>
                </li>
              </li>
              <li><a href="ViewDeduction.php?username=<?php echo $param2;?>&division=<?php echo $param1;?>" ><i class="fa fa-folder-open-o" style = "color:black;"></i>Manage Allowances</a></li>
              <li><a href="ViewGeneratePayroll.php?username=<?php echo $param2;?>&division=<?php echo $param1;?>" ><i class="fa fa-folder-open-o" style = "color:black;"></i>Generate Payroll</a></li>
              <li><a href="CreateLoans.php?username=<?php echo $param2;?>&division=<?php echo $param1;?>" ><i class="fa fa-folder-open-o" style = "color:black;"></i>Create Loan</a></li>
              <!-- <li><a href="PayrollEmployee.php?division=<?php echo $param1;?>&username=<?php echo $username;?>"  style = "color:black;font-weight:normal;"><i class="fa fa-user" style = "color:black;"></i>Update Payroll Emp</a></li> -->
              </ul>
          </li>

            <?php endif ?>  
            </ul>
              </li>
            

            <li class ="treeview <?php if($menuchecker['ict_ta'] || $menuchecker['web_posting']) echo 'menu-open active';?>">
              <a  href="#" >
                <i class="fa fa-desktop" style = " <?php echo isActive(1);?>"></i> 
                <span  style = " <?php echo isActive(1);?>">RICTU</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
              </a>
              <ul class="treeview-menu" >
                <li  class = "<?php if($menuchecker['ict_ta']) { echo 'active'; } ?>">
                  <?php
                  if($username == 'jamonteiro' || $username == 'magonzales' || $username == 'rlsegunial'){
                    ?>
                    <a href="&ticket_id=" >
                      <i class="fa fa-folder"></i>
                      <span  style = "color:black;">ICT Technical Assistance</span>
                    </a>
                    <?php
                  }else{
                    ?>
                    <a href="processing.php?division=<?php echo $_SESSION['division'];?>&ticket_id=" >
                      <i class="fa fa-folder" style = "color:black;"></i>
                      <span  style = "color:black;">ICT Technical Assistance</span>
                    </a>
                    <?php
                  }
                  ?>
                </li>
              
                <li class = "<?php if($menuchecker['web_posting']) echo 'active'; ?> ">
                  <a href="webForm_monitoring.php?division=<?php echo $_SESSION['division'];?>&ticket_id=" >
                    <i class="fa fa-code" style = "color:black;"></i>
                    <span  style = "color:black;">Website Posting</span>
                  </a>

                </li>
              </ul>
            </li>
            <li class = " treeview <?php if($menuchecker['setting'] || $menuchecker['approval']) echo 'active';?>">
            <a href="" >
              <i class="fa fa-cogs" style = " <?php echo isActive(1);?>"></i>
              <span  style = " <?php echo isActive(1);?>">Setting</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu <?php if($menuchecker['setting'] || $menuchecker['approval']) echo 'active';?>">
              <li class = "<?php if($menuchecker['setting']) echo 'active';?>"><a  href="Accounts.php"><i class = "fa fa-fw fa-user-md" style = "color:black;"></i>User Management</li>
                <li class = "<?php if($menuchecker['approval']) echo 'active';?>"><a  href="Approval.php"><i class = "fa fa-fw fa-check-square-o" style = "color:black;"></i>For Approval</li>

                </ul>
                
              </li>
              <li>
              <a href="logout.php">
                <i class="fa fa-sign-out "style = " <?php echo isActive(1);?>"></i> 
                <span style = " <?php echo isActive(1);?>">Log out</span>
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
