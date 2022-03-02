<?php $style = 'style="background-color: green !important;"'; ?>
<table id="example1" class="table table-striped table-bordered display table-hover" style="width:100%">
  <thead>
    <tr style="color: white; background-color: #367fa9;">
      <th style="text-align:center;" width="11%">LDDAP NO</th>
      <th style="text-align:center;" width="8%">LDDAP DATE</th>
      <th style="text-align:center;" width="10%">STATUS</th>
      <th style="text-align:center;" width="10%">REMARKS</th>
      <th style="text-align:center;" width="10%">LINK</th>
      <th style="text-align:center;" width="10%">ACTION</th>
    </tr>
  </thead>
  <tbody id="fs-body">
      <?php foreach ($data2 as $key => $dd): ?>
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
                    <span class="badge" <?php echo $style; ?>><?= $dd['status']; ?></span>
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
                  <a href="cash_payment_new.php?id=<?= $dd['id']; ?>&status=<?= $dd['status']; ?>" class="btn btn-primary btn-sm" title="View"><i class="fa fa-eye"></i></a>
                </div>    
            </center>
          </td>
        </tr>
      <?php endforeach ?>



  </tbody>
</table>