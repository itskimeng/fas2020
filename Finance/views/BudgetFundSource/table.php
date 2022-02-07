<div class="col-md-12">
  <div class="box box-primary dropbox">

    <div class="box-body table-responsive">
      <table id="example" class="table table-striped table-bordered display" style="width:100%">
        <thead>
          <tr style="color: white; background-color: #367fa9;">
            <th class="hidden"></th>
            <th style="text-align:center;">SOURCE</th>
            <th style="text-align:center;">FUND</th>
            <th style="text-align:center;">TOTAL ALLOTMENT</th>
            <th style="text-align:center;">TOTAL OBLIGATED</th>
            <th style="text-align:center;">TOTAL BALANCE</th>
            <!-- <th style="text-align:center;">PPA</th> -->
            <!-- <th style="text-align:center;">LEGAL BASIS</th> -->
            <!-- <th style="text-align:center;">PARTICULARS</th> -->
            <th style="text-align:center;">DATE CREATED</th>
            <th style="text-align:center;">ACTION</th>
          </tr>
        </thead>
        <tbody id="fs-body">
          <?php foreach ($data as $key => $item): ?>
            <tr>
              <td class="hidden" style="vertical-align: middle;"><?= $key; ?></td>
              <td style="vertical-align: middle;">
                <span class="badge bg-info"><?= $item['source']; ?></span>
              </td>
              <td style="vertical-align: middle;"><?= $item['name']; ?></td>
              <td style="vertical-align: middle;">₱ <?= number_format($item['total_allotment_amount'], 2, '.', ','); ?></td>
              <td style="vertical-align: middle;">₱ <?= number_format($item['total_allotment_obligated'], 2, '.', ','); ?></td>
              <td style="vertical-align: middle;">₱ <?= number_format($item['total_balance'], 2, '.', ','); ?></td>
              <!-- <td style="vertical-align: middle;"><?= $item['ppa']; ?></td> -->
              <!-- <td style="vertical-align: middle;"><?= $item['legal_basis']; ?></td> -->
              <!-- <td style="vertical-align: middle;"><?= $item['particulars']; ?></td> -->
              <td style="vertical-align: middle;"><?= date('M. d, Y', strtotime($item['date_created'])); ?></td>
              <td style="vertical-align: middle;">
                <div class="form-inline">
                  <div class="btn-group">
                    <a href="budget_fundsource_edit.php?source=<?= $key; ?>" class="btn btn-block btn-primary btn-sm" title="Edit"><i class="fa fa-edit"></i></a>
                  </div>
                  <div class="btn-group">
                    <!-- <a href="Finance/route/delete_fundsource.php?source=<?= $key; ?>" class="btn btn-block btn-danger btn-sm" title="Delete"><i class="fa fa-trash"></i></a> -->
                    <a type="button" class="btn btn-block btn-danger btn-sm btn-remove_fsource" data-toggle="modal" data-target="#modal_delete_fundsource" data-source_id="<?= $key; ?>"><i class="fa fa-trash"></i></a>
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
