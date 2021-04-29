<?php 
  $dashboard = new Dashboard();
  $procurements = $dashboard->getProcurements();
?>

<div class="col-md-4 col-sm-4 col-xs-12">
  <div class="info-box">
    <div class="panel-heading bg-blue"><i class="fa  fa-industry"></i> <b>PROCUREMENT</b>
      <a  class="pull-right btn btn-success btn-xs" href="MonitoringPr.php"><i class="fa fa-folder-open"></i> VIEW ALL</a>
      <div class="clearfix"></div>
    </div>
    <div id="row4" style="border-radius: 3px; overflow-y: scroll; height: 308px;">
      <table id="pr_table" class="table table-striped table-bordered" style="width:;background-color: white;">
            <thead>
              <tr style="background-color: white;color:blue;">
                <th>PR NO</th>
                <th width="300">PURPOSE</th>
                <th>RFQ NO</th>
              </tr>
            </thead>
            <tbody>
              <?php foreach ($procurements as $key => $procurement): ?>
                <tr>
                  <td><?php echo $procurement['pr_no'] ?></td>
                  <td><?php echo $procurement['pr_purpose'] ?></td>
                  <td>
                    <?php foreach ($procurement['rfqs'] as $index => $rfq): ?>
                      <?php echo $rfq['rfq_no']; ?> <br>
                    <?php endforeach ?>
                  </td>
                </tr>
              <?php endforeach ?>
            </tbody>
        </table>  
      </div>  
  </div>
</div>

<style type="text/css">
  #row4::-webkit-scrollbar {
      width: 12px;
  }
   
  #row4::-webkit-scrollbar-track {
      -webkit-box-shadow: inset 0 0 2px rgba(0,0,0,0.3); 
      border-radius: 2px;
  }
   
  #row4::-webkit-scrollbar-thumb {
      border-radius: 2px;
      -webkit-box-shadow: inset 0 0 2px rgba(0,0,0,0.5); 
  }
</style>