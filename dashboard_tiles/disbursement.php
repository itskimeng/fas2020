<div class="col-md-4 col-sm-4 col-xs-12">
    <div class="info-box">
     <div class="panel-heading bg-blue">
      <i class="fa fa-send"></i> <b>DISBURSEMENT</b>
      <a href="MonitoringDv.php" class="pull-right btn btn-success btn-xs"><i class="fa fa-folder-open"></i> VIEW ALL</a>
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
        <?php
        $view_query = mysqli_query($conn, "SELECT * FROM disbursement where status = 'Disbursed' order by datereleased desc LIMIT 3");
        while ($row = mysqli_fetch_assoc($view_query)) {
          $id = $row["id"];  
          $datereceived = $row["datereceived"];
          if ($datereceived == '0000-00-00') {
            $datereceived11 = '';
          }else{
            $datereceived11 = date('F d, Y', strtotime($datereceived));
          }
          $datereprocessed = $row["date_proccess"];
          if ($datereprocessed == '0000-00-00') {
            $datereprocessed11 = '';
          }else{
            $datereprocessed11 = date('F d, Y', strtotime($datereprocessed));
          }
          $datereturned = $row["datereturned"];
          if ($datereturned == '0000-00-00') {
            $datereturned11 = '';
          }else{
            $datereturned11 = date('F d, Y', strtotime($datereturned));
          }
          $datereleased = $row["datereleased"];
          if ($datereleased == '0000-00-00') {
            $datereleased11 = '';
          }else{
            $datereleased11 = date('F d, Y', strtotime($datereleased));
          }
          $dv = $row["dv"];
          $ponum = $row["ponum"];
          $payee = $row["payee"];
          $particular = $row["particular"];
          $saronumber = $row["saronumber"];
          $ppa = $row["ppa"];
          $uacs = $row["uacs"];
          $amount1 = $row["amount"];
          $amount = number_format( $amount1,2);
          $date = $row["date"];
          $remarks = $row["remarks"];
          $sarogroup = $row["sarogroup"];
          $status = $row["status"];
          ?>
          <tr>

           <td><?php echo $dv;?></td>
           <td><?php 
           $str = wordwrap($particular, 50);
           $str = explode("\n", $str);
           $str = $str[0] . '...';
           echo $str;


           ?></td>
           <?php if ($status =='Pending'): ?>
            <td style='background-color:red'><b>Pending</b></td>
            <?php else: ?>
              <?php if ($status == 'Disbursed'): ?>
                <td style='background-color:green'><b>Disbursed</b></td>
                <?php else: ?>
                  <td></td>
                <?php endif ?>
              <?php endif ?>
            </tr> 
          <?php } ?>
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