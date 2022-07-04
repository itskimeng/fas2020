<div class="col-md-4 col-sm-7 col-xs-12">
  
  <div class="col-xs-12">
    <div class="row">
      <div class="info-box">
        <div class="panel-heading bg-orange color-palette">
        	<strong><a href="DTR.php" style="color:white!important; font-size:11px;"><i class="fa fa-exclamation-circle"></i> USE OF BIOMETRICS DEVICE FOR ATTENDANCE MONITORING IN THE REGIONAL OFFICE</a></strong>

          <div class="pull-right">
          <?php if ($_SESSION['OFFICE_STATION'] == 1): ?>
            <a class="bg-transparent" style="color: white;" href="dashboard_tiles/R220512-16716_MEMO.pdf" target="_blank"><i class="fa fa-expand"></i></a>
          <?php else: ?>
            <a class="bg-transparent" style="color: white;" href="dashboard_tiles/po_memo.pdf" target="_blank"><i class="fa fa-expand"></i></a>
          <?php endif ?>
          </div>

        </div>
        


          <?php if ($_SESSION['OFFICE_STATION'] == 1): ?>
            <object class="memo" type="application/pdf" data="dashboard_tiles/R220512-16716_MEMO.pdf#toolbar=0" width="100%" height="295px"><parm name="view" value="FitH" /></object>
          <?php else: ?>
            <object class="memo" type="application/pdf" data="dashboard_tiles/po_memo.pdf#toolbar=0" width="100%" height="295px"><parm name="view" value="FitH" /></object>
          <?php endif ?>
      
      </div>
      


    </div>

  </div>
</div>



        