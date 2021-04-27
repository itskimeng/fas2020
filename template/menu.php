
<?php
       // gets the current URI, remove the left / and then everything after the / on the right
       
       
function menuOption($title,$url,$icon,$param1,$param2,$param3,$param4,$param5,$param6,$username,$link)
{
  $directory = explode('/',ltrim($_SERVER['REQUEST_URI'],'/'));
       
       // loop through each directory, check against the known directories, and add class   
       $directories = array("home", "calendar"); // set home as 'index', but can be changed based of the home uri
       foreach ($directories as $folder){
         echo $directory[0];
       $active[$folder] = ($directory[0] == $folder)? "active":"";
       }
    switch ($title) {
        case 'Dashboard':
            ?>
            <li class = "<?php $active['home'];?>">
                <a href="<?php echo $url;?>" >
                  <i class="<?php echo $icon;?>" style = "color:black;"></i> <span style = "color:black;font-weight:normal;"><?php echo $title;?></span>
                  <span class="pull-right-container">
                  </span>
                </a>
            </li>
              <?php
        break;
        case 'Calendar':
            ?>
            <li
             <?php if(
                $link == 'http://fas.calabarzon.dilg.gov.ph/ViewCalendar.php?division='.$param1.'&username='.$param2.'' ||
                $link == 'http://fas.calabarzon.dilg.gov.ph/ViewCalendar.php?division='.$param1.'&flag='.$param3.'' ||
                $link == 'http://fas.calabarzon.dilg.gov.ph/ManageCalendar.php?division='.$param1.'&username='.$param2.''){ echo 'class = "active"';}else{echo 'class = ""';}?>>
                <a href="<?php echo $url;?>">
                <i class="<?php echo $icon;?>" style = "color:black;"></i>
                <span  style = "color:black;font-weight:normal;"><?php echo $title;?></span>
                </a>
            </li>
            <?php
        break;
        case 'Records Section':
            ?>
               <li  class = "treeview 
                    <?php if( $link == 'http://fas.calabarzon.dilg.gov.ph/databank.php?division='.$param1.'' || $link == 'http://fas.calabarzon.dilg.gov.ph/databank.php' || $link == 'http://fas.calabarzon.dilg.gov.ph/UpdateDatabank.php?id='.$param4.'&option='.$param6.'' || $link == 'http://fas.calabarzon.dilg.gov.ph/issuances.php?division=10' || $link == 'http://fas.calabarzon.dilg.gov.ph/ViewIssuance.php?division='.$param5.'&id='.$param4.''  || $link == 'http://fas.calabarzon.dilg.gov.ph/CreateIssuances.php?division='.$param5.'' || $link == 'http://fas.calabarzon.dilg.gov.ph/issuances.php?division='.$param1.''|| $link == 'http://fas.calabarzon.dilg.gov.ph/CreateDatabank.php' || $link == 'http://fas.calabarzon.dilg.gov.ph/Directory.php?division='.$param5.'' || $link == 'http://fas.calabarzon.dilg.gov.ph/CreateDirectory.php' || $link == 'http://fas.calabarzon.dilg.gov.ph/UpdateDirectory.php?id='.$param4.'' ) { echo 'active"';}?>">
                        <a  href="#" >
                        <i class="<?php echo $icon;?>" style = "color:black;"></i> 
                        <span  style = "color:black;font-weight:normal;"><?php echo $title;?></span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                        </a>

                        <ul class="treeview-menu" >
                            <li><a href="databank.php?division=<?php echo $param1;?>"  style = "color:#black;font-weight:normal;" ><i class="fa fa-archive" style = "color:#black;"></i>Databank<span class="label  bg-blue" style = "background-color:skyblue;color:blue;" id = ""><b>0</b></span></a></li>
                            <li>
                                <a href="issuances.php?division=<?php echo $param1;?>"  style = "color:#black;font-weight:normal;"><i class="fa" style = "color:#black;">&#xf0f6;</i>Issuances
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
                            <li><a href="Directory.php?division=<?php echo $param1;?>"  style = "color:#black;font-weight:normal;" ><i class="fa fa-archive" style = "color:#black;"></i>Directory</a></li>
                    
                        </ul>
                </li>
    
            <?php
        break;
        case 'HR Section':
            ?>
              <li class ="treeview <?php if(
                $link == 'http://fas.calabarzon.dilg.gov.ph/ViewEmployees.php?division='.$param5.'&username='.$_GET['username'].''|| 
                $link == 'http://fas.calabarzon.dilg.gov.ph/ob.php?division='.$param5.'' || 
                $link == 'http://fas.calabarzon.dilg.gov.ph/ob.php' || 
                $link == 'http://fas.calabarzon.dilg.gov.ph/TravelOrder.php?division='.$param5.'' || 
                $link == 'http://fas.calabarzon.dilg.gov.ph/TravelOrderCreate.php?division='.$param5.'' || 
                $link == 'http://fas.calabarzon.dilg.gov.ph/UpdateEmployee.php?id='.$param4.'&view='.$_GET['view'].'' || 
                $link == 'http://fas.calabarzon.dilg.gov.ph/OfficialBusinessUpdate.php?id='.$param4.'' || 
                $link == 'http://fas.calabarzon.dilg.gov.ph/HealthMonitoring.php?action=show&username='.$username.'&division='.$param5.'' || 
                $link == 'http://fas.calabarzon.dilg.gov.ph/HealthMonitoring.php?username='.$username.'&division='.$param5.'' ||
                $link == 'http://fas.calabarzon.dilg.gov.ph/DTR.php?division='.$param5.'&username='.$username.'' 
              )
                
                { echo 'active"';}?>" >
                <a  href="#" >
                  <i class="<?php echo $icon;?>" style = "color:black;"></i> 
                  <span  style = "color:black;font-weight:normal;"><?php echo $title;?></span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
                </a>

                <ul class="treeview-menu" >
                  <li><a href="ViewEmployees.php?division=<?php echo $param1;?>&username=<?php echo $username;?>"  style = "color:#black;font-weight:normal;"><i class="fa fa-user" style = "color:#black;"></i>Employees Directory</a></li>
                  <li><a href="DTR.php?division=<?php echo $param1;?>&username=<?php echo $username;?>"  style = "color:#black;font-weight:normal;"><i class="fa fa-user" style = "color:#black;"></i>DTR</a></li>

                  <?php if ($username == 'gltumamac' || $username == 'mmmonteiro' || $username == 'pmmendoza' || $username == 'hpsolis' || $username == 'magonzales' || $username == 'jtbeltran' || $username == 'cscruz' || $username == 'rbnanez' || $username == 'assangel' || $username == 'jvnadal' || $username == 'aasalvatus' || $username == 'masacluti'): ?>

                    <li><a href="DtrMonitoring.php?division=<?php echo $param1;?>&username=<?php echo $username;?>"  style = "color:#black;font-weight:normal;"><i class="fa fa-user" style = "color:#black;"></i>DTR Monitoring</a></li>

                  <?php endif ?>
                  
                  <li><a href="ROandROO.php?division=<?php echo $param1;?>"  style = "color:#black;font-weight:normal;" ><i class="fa fa-archive" style = "color:#black;"></i>RO and ROO</a></li>

                  <li><a href="ob.php?division=<?php echo $param1;?>"  style = "color:#black;font-weight:normal;"><i class="fa fa-user" style = "color:#black;"></i>Official Business</a></li>
                  <li><a href="TravelOrder.php?division=<?php echo $param1;?>"  style = "color:#black;font-weight:normal;" ><i class="fa fa-archive" style = "color:#black;"></i>Travel Order</a></li>
                  <li class="treeview">
                    <a href="#" >
                      <i class="	fa fa-medkit" style = "color:#black;"></i>
                        <span >Health Monitoring</span>
                          <span class="pull-right-container">
                          <i class="fa fa-angle-left pull-right"></i>
                      </span>
                    </a>
                    <ul class="treeview-menu" >
                      <li><a href="HealthMonitoring.php?action=show&username=<?php echo $username;?>&division=<?php echo $param1;?>"><i class="fa fa-copy" style = "color:#black;"></i>Health Declaration Form</a></li>
                      <li><a href="HealthMonitoring.php?username=<?php echo $username;?>&division=<?php echo $param1;?>"><i class="fa fa-copy" style = "color:#black;"></i>Health Monitoring</a></li>
                    </ul>
                  </li>
                  </li>
                  <!-- <li><a href="base_fives_monitoring_form.html.php?action=show&username=<?php echo $username;?>&division=<?php echo $param1;?>"><i class="fa fa-file-text" style = "color:#black;"></i>5S Monitoring Form</a></li> -->

                  
                  
                </ul>
              </li>
            <?php
        break;
        case 'GSS Section':
          ?>
            <li class ="treeview <?php if(
              $link == 'http://fas.calabarzon.dilg.gov.ph/ViewApp.php?division='.$param5.'&username='.$_GET['username'].''|| 
              $link == 'http://fas.calabarzon.dilg.gov.ph/ob.php?division='.$param5.'' || 
              $link == 'http://fas.calabarzon.dilg.gov.ph/ob.php' || 
              $link == 'http://fas.calabarzon.dilg.gov.ph/TravelOrderCreate.php?division='.$param5.'' || 
              $link == 'http://fas.calabarzon.dilg.gov.ph/OfficialBusinessUpdate.php?id='.$param4.'' ) { echo 'active"';}?>" >
              <a  href="#" >
                <i class="fa fa-users" style = "color:black;"></i> 
                <span  style = "color:black;font-weight:normal;"><?php echo $title;?></span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
              </a>
              <ul class="treeview-menu" >
                <li  class = "treeview 
                  <?php if( $link == 'http://fas.calabarzon.dilg.gov.ph/ViewApp.php' || $link == 'http://fas.calabarzon.dilg.gov.ph/CreateSuppliers.php' || $link == 'http://fas.calabarzon.dilg.gov.ph/CreateAPP.php' || $link == 'http://fas.calabarzon.dilg.gov.ph/ViewPR.php' || $link == 'http://fas.calabarzon.dilg.gov.ph/CreatePR.php' || $link == 'http://fas.calabarzon.dilg.gov.ph/ViewApp.php?division='.$param1.'' || $link == 'http://fas.calabarzon.dilg.gov.ph/ViewPR.php?division='.$param1.'' || $link == 'http://fas.calabarzon.dilg.gov.ph/ViewRFQ.php?division='.$param1.'' || $link == 'http://fas.calabarzon.dilg.gov.ph/ViewSuppliers.php'  || $link == 'http://fas.calabarzon.dilg.gov.ph/UpdateAPP.php?id='.$param4.'' || $link == 'http://fas.calabarzon.dilg.gov.ph/ViewApp_History.php?id='.$param4.'' || $link == 'http://fas.calabarzon.dilg.gov.ph/ViewPRv.php?id='.$param4.'' || $link == 'http://fas.calabarzon.dilg.gov.ph/ViewRFQdetails.php?id='.$param4.'' || $link == 'http://fas.calabarzon.dilg.gov.ph/ViewPRv.php?id='.$param4.'&username='.$param2.'' || $link == 'http://fas.calabarzon.dilg.gov.ph/ViewUpdateRFQ.php?id2='.$_GET['id2'].'&id='.$param4.'&id='.$param4.'' || $link == 'http://fas.calabarzon.dilg.gov.ph/UpdateSuppliers.php?id='.$param4.'' || $link == 'http://fas.calabarzon.dilg.gov.ph/CreateUpdatePR.php?pr_no='.$_GET['pr_no'].'&id='.$param4.'&pmo='.$_GET['pmo'].'&pr_date='.$_GET['pr_date'].'&purpose='.$_GET['purpose'].'' ) { echo 'active'; } ?> ">
                  <a  href="" >
                    <i class="fa fa-cart-arrow-down " style = "color:#black;"></i>
                    <span  style = "color:#black;font-weight:normal;">Procurement</span>
                    <span class="pull-right-container"><i class="fa fa-angle-left pull-right" style = "color:#black;"></i></span>
                  </a>
                  <ul class="treeview-menu" >
                    <li><a href="ViewApp.php?division=<?php echo $param1;?>" ><i class="fa" style = "color:#black;">&#xf0f6;</i> APP</a></li>
                    <li><a href="ViewPR.php?division=<?php echo $param1;?>" ><i class="fa" style = "color:#black;">&#xf0f6;</i> Purchase Request</a></li>
                    <li><a href="ViewRFQ.php?division=<?php echo $param1;?>" ><i class="fa" style = "color:#black;">&#xf0f6;</i> Request for Quotation</a></li>
                    <li><a href="ViewSuppliers.php"><i class="fa" style = "color:#black;">&#xf0f6;</i><span>Supplier</span></a></li>
                  </ul>
                </li>
                <li class="treeview
                  <?php if( $link == 'http://fas.calabarzon.dilg.gov.ph/stocks.php?division='.$param5.'' || $link == 'http://fas.calabarzon.dilg.gov.ph/@stockledger.php?division='.$param5.'' || $link == 'http://fas.calabarzon.dilg.gov.ph/ViewIAR.php?division='.$param5.'' || $link == 'http://fas.calabarzon.dilg.gov.ph/ViewRIS.php?division='.$param5.'' || $link == 'http://fas.calabarzon.dilg.gov.ph/ViewRPCPPE.php?division='.$param5.'' || $link == 'http://fas.calabarzon.dilg.gov.ph/ViewRPCI.php?division='.$param5.'' || $link == 'http://fas.calabarzon.dilg.gov.ph/UpdateIAR.php?id='.$param4.'' || $link == 'http://fas.calabarzon.dilg.gov.ph/UpdateRIS.php?id='.$param4.'' || $link == 'http://fas.calabarzon.dilg.gov.ph/ViewPPE.php?id='.$param4.'' || $link == 'http://fas.calabarzon.dilg.gov.ph/UpdateRPCI.php?id='.$param4.'' ) { echo 'active';} ?>">
                  <a href="" >
                    <i class="fa fa-briefcase " style = "color:#black;"></i>
                    <span style = "color:#black;font-weight:normal;" >Asset Management</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu" >
                    <li><a href="stocks.php?division=<?php echo $param1;?>" ><i class="fa" style = "color:#black;">&#xf0f6;</i> Stock Card</a></li>
                    <li><a href="@stockledger.php?division=<?php echo $param1;?>" ><i class="fa" style = "color:#black;">&#xf0f6;</i>Supplies Ledger Card</a></li>
                    <li><a href="ViewIAR.php?division=<?php echo $param1;?>" ><i class="fa" style = "color:#black;">&#xf0f6;</i> IAR</a></li>
                    <li><a href="ViewRIS.php?division=<?php echo $param1;?>" ><i class="fa" style = "color:#black;">&#xf0f6;</i>RIS</a></li>
                    <li><a href="ViewRPCI.php?division=<?php echo $param1;?>" ><i class="fa" style = "color:#black;">&#xf0f6;</i>ICS</a></li>
                    <li><a href="ViewRPCPPE.php?division=<?php echo $param1;?>" ><i class="fa" style = "color:#black;">&#xf0f6;</i>PAR</a></li>
                  </ul>
                </li>
                <li><a href="VehicleRequest.php?division=<?php echo $param1;?>"  style = "color:#black;font-weight:normal;" ><i class="fa fa-archive" style = "color:#black;"></i>Vehicle Request</a></li>
              </ul>
            </li>
          <?php
        break;
        case 'Finance':
            ?>
            <li class="treeview 
              <?php if( $link == 'http://fas.calabarzon.dilg.gov.ph/saro.php?division='.$param5.'' || $link == 'http://fas.calabarzon.dilg.gov.ph/disbursement.php?division='.$param5.'' || $link == 'http://fas.calabarzon.dilg.gov.ph/ntatableViewMain.php?getntano='.$_GET['getntano'].'&getparticular='.$_GET['getparticular'].'' || $link == 'http://fas.calabarzon.dilg.gov.ph/obligation.php?division='.$param5.'' || $link == 'http://fas.calabarzon.dilg.gov.ph/nta.php?division='.$param5.'' || $link == 'http://fas.calabarzon.dilg.gov.ph/obligation.php' || $link == 'http://fas.calabarzon.dilg.gov.ph/saroupdate.php?getid='.$_GET['getid'].'' || $link == 'http://fas.calabarzon.dilg.gov.ph/obupdate.php?getid='.$_GET['getid'].'' || $link == 'http://fas.calabarzon.dilg.gov.ph/sarocreate.php' || $link == 'http://fas.calabarzon.dilg.gov.ph/obtableViewMain.php?getsaroID='.$_GET['getsaroID'].'&getuacs='.$_GET['getuacs'].'' ){ echo 'active'; } ?>" >
              <a href="" >
                <i class="<?php echo $icon;?>" style = "color:black;"></i>
                <span  style = "color:black;font-weight:normal;"><?php echo $title; ?></span>
                <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
              </a>
              <ul class="treeview-menu" >
                <li class="treeview">
                  <a href="#" >
                    <i class="fa fa-folder-open-o" style = "color:black;"></i>
                    <span >Budget Section</span>
                    <span class="pull-right-container">
                      <i class="fa fa-angle-left pull-right"></i>
                    </span>
                  </a>
                  <ul class="treeview-menu" >
                    <li><a href="saro.php?division=<?php echo $param1;?>" ><i class="fa fa-copy" style = "color:black;"></i> SARO/SUB-ARO </a></li>
                    <li><a href="obligation.php?division=<?php echo $param1;?>" ><i class="fa fa-copy" style = "color:black;"></i> ORS/BURS</a></li>
                  </ul>
                </li>
            </li>

            <li class="treeview">
              <a href="#" >
                <i class="fa fa-folder-open-o" style = "color:black;"></i>
                <span >Accounting Section</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" >
                <li><a href="nta.php?division=<?php echo $param1;?>" ><i class="fa" style = "color:black;">&#xf0f6;</i>NTA/NCA</a></li>
                <li><a href="disbursement.php?division=<?php echo $param1;?>" ><i class="fa" style = "color:black;">&#xf0f6;</i>DISBURSEMENT</a></li>
              </ul>
            </li>

            <li class="treeview">
              <a href="#" >
                <i class="fa fa-folder-open-o" style = "color:black;"></i>
                <span >Cash Section</span>
                <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
              </a>
              <ul class="treeview-menu" >
                <li><a href="ntaobligation.php?division=<?php echo $param1;?>" ><i class="fa" style = "color:black;">&#xf0f6;</i>PAYMENT</a></li>
              </ul> 
            </li>
            <li><a href="CreateTravelClaim.php?username=<?php echo $param2;?>&division=<?php echo $param1;?>" ><i class="fa fa-folder-open-o" style = "color:black;"></i>Travel Claim</a></li>
            <li><a href="PayrollEmployee.php?division=<?php echo $param1;?>&username=<?php echo $username;?>"  style = "color:black;font-weight:normal;"><i class="fa fa-user" style = "color:black;"></i>Payroll</a></li>
            </ul>
            </li>
            <?php if ($username == 'charlesodi' || $username == 'mmmonteiro' || $username == 'seolivar'): ?>
              <li class="treeview <?php if( $link == 'http://fas.calabarzon.dilg.gov.ph/ViewEmployee.php?division='.$param5.'' || $link == 'http://fas.calabarzon.dilg.gov.ph/ViewRetireEmployee.php?division='.$param5.'' || $link == 'http://fas.calabarzon.dilg.gov.ph/ViewResignEmployee.php?getntano='.$_GET['getntano'].'&getparticular='.$_GET['getparticular'].'' || $link == 'http://fas.calabarzon.dilg.gov.ph/ViewOnLeaveEmployee.php?division='.$param5.'' || $link == 'http://fas.calabarzon.dilg.gov.ph/nta.php?division='.$param5.'' || $link == 'http://fas.calabarzon.dilg.gov.ph/obligation.php' || $link == 'http://fas.calabarzon.dilg.gov.ph/saroupdate.php?getid='.$_GET['getid'].'' || $link == 'http://fas.calabarzon.dilg.gov.ph/obupdate.php?getid='.$_GET['getid'].'' || $link == 'http://fas.calabarzon.dilg.gov.ph/sarocreate.php' || $link == 'http://fas.calabarzon.dilg.gov.ph/obtableViewMain.php?getsaroID='.$_GET['getsaroID'].'&getuacs='.$_GET['getuacs'].'' ){ echo 'active'; } ?>" >
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
            <?php
        break;
        case 'RICTU':
          ?>
            <li class ="treeview" <?PHP if( $link == 'http://fas.calabarzon.dilg.gov.ph/requestForm.php?division='.$_GET['division'].'' || $link == 'http://fas.calabarzon.dilg.gov.ph/techassistance.php?division='.$_GET['division'].'' || $link == 'http://fas.calabarzon.dilg.gov.ph/processing.php?division='.$_GET['division'].'&ticket_id=' || $link == 'http://fas.calabarzon.dilg.gov.ph/_editRequestTA.php?division='.$_GET['division'].'&id='.$_GET['id'].'' ){ echo 'class = "active" '; } ?> >
              <a  href="#" >
                <i class="<?php echo $icon;?>" style = "color:black;"></i> 
                <span  style = "color:black;font-weight:normal;"><?php echo $title;?></span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
              </a>
              <ul class="treeview-menu" >
                <li  
                  <?php if( $link == 'techassistance.php?division='.$_SESSION['division'].'' ) { echo 'active'; } ?>>
                  <?php
                  if($username == 'jamonteiro' || $username == 'magonzales' || $username == 'rlsegunial'){
                    ?>
                    <a href="&ticket_id=" >
                      <i class="fa fa-folder" style = "color:black;"></i>
                      <span  style = "color:black;font-weight:normal;">ICT Technical Assistance</span>
                    </a>
                    <?php
                  }else{
                    ?>
                    <a href="processing.php?division=<?php echo $_SESSION['division'];?>&ticket_id=" >
                      <i class="fa fa-folder" style = "color:black;"></i>
                      <span  style = "color:black;font-weight:normal;">ICT Technical Assistance</span>
                    </a>
                    <?php
                  }
                  ?>
                </li>
              
                <li <?PHP if( $link == 'http://fas.calabarzon.dilg.gov.ph/webForm_monitoring.php?division='.$_GET['division'].'' ){ echo 'class = "active" '; } ?> >
                  <a href="webForm_monitoring.php?division=<?php echo $_SESSION['division'];?>&ticket_id=" >
                    <i class="fa fa-code" style = "color:black;"></i>
                    <span  style = "color:black;font-weight:normal;">Website Posting</span>
                  </a>

                </li>
              </ul>
            </li>
          <?php
        break;
        case 'Setting':
          ?>
                      
            <li class="treeview <?PHP 
            if(
            $link == 'http://fas.calabarzon.dilg.gov.ph/Accounts.php' ||
            $link == 'http://fas.calabarzon.dilg.gov.ph/Approval.php' ||
            $link == 'http://fas.calabarzon.dilg.gov.ph/UpdateAccount.php?id='.$_GET['id'].'&username='.$_SESSION['username'].'' 

            ){
              echo 'active';
            }
            ?>" tyle="background-color: lightgray;">
            <a href="" >
              <i class="<?php echo $icon;?>" style = "color:black;"></i>
              <span  style = "color:black;font-weight:normal;"><?php echo $title;?></span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu" >
              <li><a  href="Accounts.php"><i class = "fa fa-fw fa-user-md" style = "color:black;"></i>User Management</li>
                <li><a  href="Approval.php"><i class = "fa fa-fw fa-check-square-o" style = "color:black;"></i>For Approval</li>

                </ul>
                
              </li>
            <?php
        break;
        case 'Log out':
          ?>
            <li>
              <a href="logout.php">
                <i class="fa fa-sign-out " style = "color:black;"></i> 
                <span  style = "color:black;font-weight:normal;">Log out</span>
              </a>
            </li>    
          <?php
        break;
                
        
    }

}
?>
         
