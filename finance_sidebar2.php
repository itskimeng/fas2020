<?php if ( in_array(29, $arrayModuleId) || in_array(30, $arrayModuleId) || in_array(31, $arrayModuleId) || in_array(32, $arrayModuleId) || in_array(33, $arrayModuleId) || in_array(34, $arrayModuleId) || in_array(35, $arrayModuleId) || in_array(36, $arrayModuleId) || in_array(37, $arrayModuleId) || in_array(38, $arrayModuleId) ) : ?>
        <!-------------------------------------------- FINANCE ------------------------------------------->
        <a href="" >
          <i class="fa fa-money" style = " <?php echo isActive(1);?>"></i>
          <span  style = " <?php echo isActive(1);?>">Finance</span>
          <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span>
        </a>
        <!-------------------------------------------- FINANCE ------------------------------------------->
        <?php endif ?>

        <ul class="treeview-menu">
          <li class="treeview <?php if($menuchecker['finance_fundsource'] || $menuchecker['saro'] || $menuchecker['ors_burs'] || $menuchecker['saro_create'] || $menuchecker['saro_update'] || $menuchecker['ob_view'] || $menuchecker['ob_create'] || $menuchecker['view_burs'] || $menuchecker['finance_obligation']) echo 'menu-open active';?>">

            <?php if ( in_array(30, $arrayModuleId) || in_array(31, $arrayModuleId) || in_array(32, $arrayModuleId) ) : ?>
            <!-------------------------------------------- BUDGET SECTION ------------------------------------------->
            <a href="#" >
              <i class="fa fa-folder-open-o" style = "color:black;"></i>
              <span >Budget Section</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <!-------------------------------------------- BUDGET SECTION ------------------------------------------->
            <?php endif ?>

            <ul class="treeview-menu <?php if($menuchecker['finance_fundsource'] || $menuchecker['ors_burs'] || $menuchecker['saro_create'] || $menuchecker['saro_update'] || $menuchecker['ob_view'] || $menuchecker['ob_create'] || $menuchecker['finance_obligation']) echo 'menu-open active';?>">


              <?php if ( in_array(31, $arrayModuleId) ) : ?>
              <!-------------------------------------------- SARO/SUB-ARO ------------------------------------------->
             <!--  <li class = "<?php if($menuchecker['saro_create'] || $menuchecker['saro_update'] || $menuchecker['ob_view'] || $menuchecker['ob_create']) echo 'active';?>"><a href="saro.php?division=<?php echo $param1;?>" ><i class="fa fa-copy" style = "color:black;"></i> SARO/SUB-ARO </a></li> -->

              <li class = "<?php if($menuchecker['finance_fundsource'] || $menuchecker['saro'] || $menuchecker['saro_create'] || $menuchecker['saro_update'] || $menuchecker['ob_view'] || $menuchecker['ob_create']) echo 'active';?>"><a href="budget_fundsource.php?division=<?php echo $param1;?>" ><i class="fa fa-copy" style = "color:black;"></i> Fund Source</a></li>
              
              <!-------------------------------------------- SARO/SUB-ARO ------------------------------------------->
              <?php endif ?>

              <?php if ( in_array(32, $arrayModuleId) ) : ?>
              <!-------------------------------------------- ORS/BURS ------------------------------------------->
              <!-- <li class = "<?php if($menuchecker['ors_burs'] || $menuchecker['view_burs']) echo 'active';?>"><a href="obligation.php?page=1&ipp=10&division=<?php echo $param1;?>" ><i class="fa fa-copy" style = "color:black;"></i> ORS/BURS</a></li> -->

              <li class = "<?php if($menuchecker['finance_obligation'] || $menuchecker['view_burs']) echo 'active';?>"><a href="budget_obligation.php?page=1&ipp=10&division=<?php echo $param1;?>" ><i class="fa fa-copy" style = "color:black;"></i> Obligation</a></li>
              <!-------------------------------------------- ORS/BURS ------------------------------------------->
              <?php endif ?>

            </ul>
          </li>
    </li>
        
    <li class="treeview <?php if($menuchecker['dv'] || $menuchecker['dv_update']|| $menuchecker['dv_process'] ||  $menuchecker['dv_create'] || $menuchecker['nta'] || $menuchecker['nta_create'] || $menuchecker['nta_update'] || $menuchecker['nta_view'] ) echo 'active';?>">

      <!-------------------------------------------- ACCOUNTING ------------------------------------------->
      <?php if ( in_array(33, $arrayModuleId) || in_array(34, $arrayModuleId) || in_array(35, $arrayModuleId) ) : ?>
      <a href="#" >
        <i class="fa fa-folder-open-o" style = "color:black;"></i>
        <span >Accounting Section</span
        <span class="pull-right-container">
          <i class="fa fa-angle-left pull-right"></i>
        </span>
      </a>
      <?php endif ?>
      <!-------------------------------------------- ACCOUNTING ------------------------------------------->

      <ul class="treeview-menu  <?php if($menuchecker['dv'] ||  $menuchecker['dv_create'] || $menuchecker['dv_process']|| $menuchecker['nta'] || $menuchecker['nta_update'] || $menuchecker['nta_view'] ) echo 'menu-open active';?>">

        <?php if ( in_array(34, $arrayModuleId) ) : ?>
        <!-------------------------------------------- NTA/NCA ------------------------------------------->
        <li class = "<?php if($menuchecker['nta'] || $menuchecker['nta_create'] || $menuchecker['nta_update'] || $menuchecker['nta_view'] ) echo 'active';?>"><a href="accounting_nta.php?division=<?php echo $param1;?>" ><i class="fa" style = "color:black;">&#xf0f6;</i>NTA/NCA</a></li>
        <!-------------------------------------------- NTA/NCA ------------------------------------------->
        <?php endif ?>

        <?php if ( in_array(35, $arrayModuleId) ) : ?>
        <!-------------------------------------------- DISBURSEMENT ------------------------------------------->
        <li class = "<?php if($menuchecker['dv_update'] || $menuchecker['dv'] || $menuchecker['dv_create'] || $menuchecker['dv_process']) echo 'active';?>"><a href="accounting_disbursement.php?division=<?php echo $param1;?>" ><i class="fa" style = "color:black;">&#xf0f6;</i>DISBURSEMENT</a></li>
        <!-------------------------------------------- DISBURSEMENT ------------------------------------------->
        <?php endif ?>
