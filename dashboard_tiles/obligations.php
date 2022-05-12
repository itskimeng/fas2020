<?php 
  require_once 'Finance/manager/BudgetManager.php';

  $dashboard = new Dashboard();
  $bm = new BudgetManager();

  $obligations = $dashboard->getObligations();
  $ors_data = $bm->getObligationsData();
?>

<div class="col-md-4 col-sm-4 col-xs-12">
  <div class="info-box">
    <div class="panel-heading bg-blue"><i class="fa fa-gavel"></i> <b>OBLIGATION</b>
      <a href="budget_obligation.php?page=1&ipp=10&division=<?php echo $_GET['division'];?>" class="pull-right btn btn-success btn-xs"><i class="fa fa-folder-open"></i> VIEW ALL</a>
      <div class="clearfix"></div>
    </div>
    <div class="obligations" id="row5" style="height: 394px; overflow-y: hidden;">
      <table id="" class="table table-striped table-bordered" style="width:;background-color: white;">
        <thead>
          <tr style="background-color: white;color:blue;">

            <th width="50">ORS NUMBER</th>
            <th width="50">PARTICULAR</th>
            <th width="50">STATUS</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach (array_slice($ors_data['normal'], 0, 8) as $key => $ors): ?>
            <?php if (!empty($ors['particular'])): ?>
              <tr>
                <td>
                  <span class="badge bg-info"><?= $ors['serial_no']; ?></span>
                </td>
                <td>
                  <?= $ors['particular']; ?>  
                </td>
                <td style='background-color:#e19292; color:white;'>
                  <?= $ors['status']; ?>
                </td>
              </tr> 
            <?php endif ?>
          <?php endforeach ?>
        </tbody>
        </table>  
    </div>
  </div>   
</div>


<style type="text/css">
  
div.obligations::-webkit-scrollbar {
    width: 12px;
}
 
div.obligations::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 2px rgba(0,0,0,0.3); 
    border-radius: 2px;
}
 
div.obligations::-webkit-scrollbar-thumb {
    border-radius: 2px;
    -webkit-box-shadow: inset 0 0 2px rgba(0,0,0,0.5); 
}

div.obligations:hover {
  overflow-y: auto!important;
}
</style>