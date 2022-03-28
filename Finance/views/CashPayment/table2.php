<?php $style = 'style="background-color: green !important;"'; ?>
<table id="example1" class="table table-striped table-bordered display table-hover" style="width:100%">
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
      <?php foreach ($data2 as $key => $dd): 
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
                    <span class="badge" <?php echo $style; ?>><?= $dd['status']; ?></span><br>
                    <i><?php if ( $dd['is_dfunds'] == 1) {echo 'For Province <b>('.$province.') ';} ?></i>
            </center>
          </td>
          <td width="15%">
            <center>
                    <?= $dd['remarks']; ?>
            </center>
          </td>
          <td width="15%">
            <center>
              <div class="btn-group">
                  <a class="btn btn-block btn-primary" href="<?= $dd['link']; ?>" target="_blank" style="color:#1c6487; color:white;"><i class="fa fa-link"></i> View</a>
                </div>
            </center>
          </td>
          <td width="15%">
            <center>
                    <?= $dd['disbursed_amount']; ?>
            </center>
          </td>
          <td width="15%">
            <center>
                <div class="btn-group">
                  <a href="cash_payment_new.php?id=<?= $dd['id']; ?>&status=<?= $dd['status']; ?>" class="btn btn-primary btn-sm" title="View"><i class="fa fa-eye"></i></a>
                </div>    
            </center>
          </td>
        </tr>
      <?php endforeach ?>



  </tbody>
</table>