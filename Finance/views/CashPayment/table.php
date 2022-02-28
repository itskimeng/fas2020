<div class="col-md-12">
  <div class="box box-primary dropbox">

    <div class="box-body table-responsive">
      <table id="example" class="table table-striped table-bordered display table-hover" style="width:100%">
        <thead>
          <tr style="color: white; background-color: #367fa9;">
            <!-- <th class="hidden"></th> -->
            <!-- <th style="color:#367fa9;" width="1%"></th> -->
            <th style="text-align:center;" width="11%">LDDAP NO</th>
            <th style="text-align:center;" width="8%">LDDAP DATE</th>
            <th style="text-align:center;" width="10%">DV NO</th>
            <th style="text-align:center;" width="10%">ORS SERIAL NO</th>
            <th style="text-align:center;" width="10%">PAYEE</th>

<!--             <th style="text-align:center;" width="10%">PARTICULAR</th>
            <th style="text-align:center;" width="10%">GROSS AMOUNT</th>
            <th style="text-align:center;" width="10%">DEDUCTION</th>
            <th style="text-align:center;" width="10%">NET AMOUNT</th>
            <th style="text-align:center;" width="10%">DV ATTACHMENT</th> -->

            <th style="text-align:center;" width="10%">STATUS</th>
            <th style="text-align:center;" width="10%">ACTION</th>
          </tr>
        </thead>
        <tbody id="fs-body">
         		<?php foreach ($data1 as $key => $dd): ?>
              <!-- <tr>
                <td class="hidden" style="vertical-align: middle;"><?php echo $dd['dvid']; ?></td>
                <td style="vertical-align: middle; width: 5%;"></td>
                <td><?= $dd['p_lddap']; ?></td>
                <td><?= $dd['p_lddap_date']; ?></td>
                <td><?= $dd['dv_dv_number']; ?></td>
                <td><?= $dd['ob_serial_no']; ?></td>
                <td><?= $dd['supplier']; ?></td>
                <td><?= $dd['ob_purpose']; ?></td>
                <td><?= $dd['ob_amount']; ?></td>
                <td><?= $dd['dv_total']; ?></td>
                <td><?= $dd['dv_net_amount']; ?></td>
                <td><?= $dd['p_link']; ?></td>
                <td><?php if ( $dd['p_status'] == '') { echo 'For Receiving'; } else { echo $dd['p_status']; }  ?></td>
                <td>
                    <?php if ($dd['p_status'] == 'Draft' || $dd['dv_status'] == 'Received - Cash' ): ?>
                      <div class="btn-group">
                        <a href="cash_paid_payment.php?id=<?= $dd['dvid']; ?>&status=<?= $dd['p_status']; ?>" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                        <button type="button" class="btn btn-sm btn-danger" title="Return" onclick="view_dv_url();"><i class="fa fa-undo"></i></button>
                      </div>    
                    <?php else: ?>
                      <div class="btn-group">
                        <a href="Finance/route/receive_dv.php?id=<?= $dd['dvid']; ?>&status=<?= $dd['p_status']; ?>" class="btn btn-warning btn-sm" title="Receive Disbursement"><i class="fa fa-share-square-o"></i></a>
                      </div>            
                    <?php endif ?>
                </td>
              </tr> -->
              <tr>
                <td width="15%">
                  <center>
                      <a role="button" data-toggle="collapse" href="#collapse<?= $dd['id'];?>" aria-expanded="false" class="collapsed" aria-controls="collapse<?= $dd['id'];?>" id="btn_expand">
                        <i class="fa fa-plus-circle" id="collapse_icon" style="float:left !important; font-size:20px;"></i>
                        <?= $dd['p_lddap']; ?>
                      </a>
                  </center>
                </td>
                <td width="12%">
                  <center>
                          <?= $dd['p_lddap_date']; ?>
                  </center>
                </td>
                <td width="15%">
                  <center>
                          <?= $dd['dv_dv_number']; ?>
                  </center>
                </td>
                <td width="14%">
                  <center>
                          <?= $dd['ob_serial_no']; ?>
                  </center>
                </td>
                <td width="15%">
                  <center>
                          <?= $dd['supplier']; ?>
                  </center>
                </td>
                <td width="15%">
                  <center>
                          <?= $dd['p_status']; ?>
                  </center>
                </td>
                <td width="15%">
                  <center>
                    <?php if ($dd['p_status'] == 'Draft' || $dd['dv_status'] == 'Received - Cash' ): ?>
                      <div class="btn-group">
                        <a href="cash_paid_payment.php?id=<?= $dd['dvid']; ?>&status=<?= $dd['p_status']; ?>" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                        <button type="button" class="btn btn-sm btn-danger" title="Return" onclick="view_dv_url();"><i class="fa fa-undo"></i></button>
                      </div>    
                    <?php else: ?>
                      <div class="btn-group">
                        <a href="Finance/route/receive_dv.php?id=<?= $dd['dvid']; ?>&status=<?= $dd['p_status']; ?>" class="btn btn-warning btn-sm" title="Receive Disbursement"><i class="fa fa-share-square-o"></i></a>
                      </div>            
                    <?php endif ?>
                  </center>
                </td>
              </tr>
              <tr id="collapse<?= $dd['id'];?>" class="panel-collapse collapse" role="tabpanel" aria-labelledby="heading<?= $dd['id'];?>">
                <td align="center" colspan="7">
                  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
                      <div>
                        <div class="panel-body">
                          <?= $dd['dv_dv_number']; ?>
                        </div>
                      </div>
                  </div>
                </td>  
              </tr>
            <?php endforeach ?>



        </tbody>
      </table>
    </div>  

  </div>
</div>