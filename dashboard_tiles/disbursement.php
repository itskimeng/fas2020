<div class="col-md-4 col-sm-4 col-xs-12">
    <div class="info-box">
     <div class="panel-heading bg-blue">
      <i class="fa fa-send"></i> <b>DISBURSEMENT</b>
      <a href="accounting_disbursement.php" class="pull-right btn btn-success btn-xs"><i class="fa fa-folder-open"></i> VIEW ALL</a>
      <div class="clearfix"></div>
    </div>
    <div class="disbursements" id="row6" style="overflow-y: hidden; height: 307px;">
      <table id="" class="table table-striped table-bordered" style="background-color: white;">
        <thead>
          <tr style="background-color: white; color:blue;">
            <th width="200">DV NO</th>
            <th width="500">PARTICULAR</th>
            <th width="200">STATUS</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($dvs as $key => $dv): ?>
            <tr>
              <td><?php echo $dv['dv_number']; ?></td>
              <td><?php echo $dv['particular']; ?></td>
              <td><?php echo $dv['status']; ?></td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>   
  </div>  
</div>

<style type="text/css">
  
div.disbursements::-webkit-scrollbar {
    width: 12px;
}
 
div.disbursements::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 2px rgba(0,0,0,0.3); 
    border-radius: 2px;
}
 
div.disbursements::-webkit-scrollbar-thumb {
    border-radius: 2px;
    -webkit-box-shadow: inset 0 0 2px rgba(0,0,0,0.5); 
}

div.disbursements:hover {
  overflow-y: auto!important;
}
</style>