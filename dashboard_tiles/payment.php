<div class="col-md-4 col-sm-4 col-xs-12">
  <div class="info-box">
    <div class="panel-heading bg-blue"><i class="fa fa-credit-card"></i> <b>PAYMENT</b>
      <a href="cash_payment.php" class="pull-right btn btn-success btn-xs"><i class="fa fa-folder-open"></i> VIEW ALL</a>
      <div class="clearfix"></div>
    </div>
    <div class="payments" id="row7" style="overflow-y: hidden; height: 307px;">
      <table id="" class="table table-striped table-bordered " style="background-color: white; overflow-x:auto;" >
        <thead>
          <tr style="background-color: white;color:blue;">
            <th style="text-align:center" width="200">DV NO</th>
            <th style="text-align:center" width="500">PARTICULAR</th>
            <th style="text-align:center" width="200">STATUS</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($payments as $payment): ?>
            <tr>
              <td style="text-align:center" ><span class="badge bg-info"><?php echo $payment["dvno"]; ?></span></td>
              <td style="text-align:center" ><?php echo $$payment["particular"]; ?></td>
              <td>
                <?php if ($status =='Unpaid'): ?>
                  Unpaid
                <?php elseif ($status == 'Paid'): ?>
                  Paid
                <?php else: ?>
                  &nbsp;  
                <?php endif ?>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
      
    </div>
  </div>   
</div>

<style type="text/css">
  
div.payments::-webkit-scrollbar {
    width: 12px;
}
 
div.payments::-webkit-scrollbar-track {
    -webkit-box-shadow: inset 0 0 2px rgba(0,0,0,0.3); 
    border-radius: 2px;
}
 
div.payments::-webkit-scrollbar-thumb {
    border-radius: 2px;
    -webkit-box-shadow: inset 0 0 2px rgba(0,0,0,0.5); 
}

div.payments:hover {
  overflow-y: auto!important;
}
</style>