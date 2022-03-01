<div class="col-md-12">
  <div class="box box-primary dropbox">

    <div class="box-body table-responsive">
      <table id="example" class="table table-striped table-bordered display table-hover" style="width:100%">
        <thead>
          <!-- <tr style="color: white; background-color: #367fa9;"> -->
            <!-- <th class="hidden"></th> -->
            <!-- <th style="color:#367fa9;" width="1%"></th> -->
            <th style="text-align:center;" width="11%">LDDAP NO</th>
            <th style="text-align:center;" width="8%">LDDAP DATE</th>

<!--             <th style="text-align:center;" width="10%">PARTICULAR</th>
            <th style="text-align:center;" width="10%">GROSS AMOUNT</th>
            <th style="text-align:center;" width="10%">DEDUCTION</th>
            <th style="text-align:center;" width="10%">NET AMOUNT</th>
            <th style="text-align:center;" width="10%">DV ATTACHMENT</th> -->

            <th style="text-align:center;" width="10%">STATUS</th>
            <th style="text-align:center;" width="10%">REMARKS</th>
            <th style="text-align:center;" width="10%">LINK</th>
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
                <td width="12%">
                  <center>
                          <?= $dd['lddap']; ?>
                  </center>
                </td>
                <td width="15%">
                  <center>
                          <?= $dd['lddap_date']; ?>
                  </center>
                </td>
                <td width="14%">
                  <center>
                          <?= $dd['status']; ?>
                  </center>
                </td>
                <td width="15%">
                  <center>
                          <?= $dd['remarks']; ?>
                  </center>
                </td>
                <td width="15%">
                  <center>
                          <a href="<?= $dd['link']; ?>" target="_blank" style="color:#1c6487;"><i><?= $dd['link']; ?></i></a>
                  </center>
                </td>
                <td width="15%">
                  <center>
                      <div class="btn-group">
                        <a href="cash_payment_new.php?id=<?= $dd['id']; ?>&status=<?= $dd['status']; ?>" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                        <button type="button" class="btn btn-sm btn-danger" title="Return" onclick="view_dv_url();"><i class="fa fa-undo"></i></button>
                      </div>    
                  </center>
                </td>
              </tr>
            <?php endforeach ?>



        </tbody>
      </table>
    </div>  

  </div>
</div>