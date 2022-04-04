<?php $style = 'style="background-color: green !important;"'; ?>
<table id="example" class="table table-striped table-bordered display table-hover" style="width:100%">
  <thead>
    <tr style="color: white; background-color: #367fa9;">
      <th style="text-align:center;" width="11%">LDDAP NO</th>
      <th style="text-align:center;" width="8%">LDDAP DATE</th>
      <th style="text-align:center;" width="10%">STATUS</th>
      <th style="text-align:center;" width="10%">REMARKS</th>
      <th style="text-align:center;" width="10%">LINK</th>
      <th style="text-align:center;" width="10%">AMOUNT</th>
      <th style="text-align:center;" width="10%">ACTION</th>
    </tr>
  </thead>
  <tbody id="fs-body">
      <?php foreach ($data1 as $key => $dd):
        $province = '';
        if ($dd['province'] == 1) 
        {
          $province = 'Cavite';
        }
        else if ($dd['province'] == 2) 
        {
          $province = 'Laguna';
        }
        else if ($dd['province'] == 3) 
        {
          $province = 'Batangas';
        }
        else if ($dd['province'] == 4) 
        {
          $province = 'Rizal';
        }
        else if ($dd['province'] == 5) 
        {
          $province = 'Quezon';
        }
        else if ($dd['province'] == 6) 
        {
          $province = 'Lucena';
        }
        ?>
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
                    <!-- <b><span class="badge" <?php if ($dd['status'] == 'Paid') { echo $style; } ?> ><?= $dd['status']; ?></span></b> -->
                    <span class="badge"><?= $dd['status']; ?></span><br>
                    <i><?php if ( $dd['is_dfunds'] == 1) {echo 'For Province <b>('.$province.') ';} ?></i>
            </center>
          </td>
          <td width="15%">
            <center>
                    <?= $dd['remarks']; ?>
            </center>
          </td>
          <td width="10%">
            <center>
                    <!-- <a href="<?= $dd['link']; ?>" target="_blank" style="color:#1c6487;"><i><?= $dd['link']; ?></i></a> -->
                    <a href="<?= $dd['link']; ?>" target="_blank" class="btn btn-warning btn-sm" >
                      <i class="fa fa-link"></i> View
                    </a>
            </center>
          </td>
          <td width="15%">
            <center>
                    <?= $dd['fundsource_amount']; ?>
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