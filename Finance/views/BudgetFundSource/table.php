<div class="col-md-12">
  <div class="box box-primary dropbox">

    <div class="box-body table-responsive">
      <table id="example" class="table table-striped table-bordered display" style="width:100%">
        <thead>
          <tr style="color: white; background-color: #367fa9;">
            <th class="hidden"></th>
            <th style="text-align:center;">ALLOTMENT / SUB-ALLOTMENT NO.</th>
            <th style="text-align:center;">FUND</th>
            <th style="text-align:center;">TOTAL ALLOTMENT</th>
            <th style="text-align:center;">TOTAL OBLIGATED</th>
            <th style="text-align:center;">TOTAL BALANCE</th>
            <th style="text-align:center;">DATE CREATED</th>
            <th style="text-align:center;">ACTION</th>
          </tr>
        </thead>
        <tbody id="fs-body">
          <?php foreach ($data as $key => $item): ?>
            <tr>
              <td class="hidden" style="vertical-align: middle;"><?= $key; ?></td>
              <td style="text-align: center; vertical-align: middle;">
                <span class="badge bg-info"><?= $item['source']; ?></span>
              </td>
              <td style="text-align: center; vertical-align: middle;"><?= $item['name']; ?></td>
              <td style="vertical-align: middle;">₱<?= number_format($allotment[$key]['total_allotment_amount'], 2, '.', ','); ?></td>
              <td style="vertical-align: middle;">₱<?= number_format($allotment[$key]['total_allotment_obligated'], 2, '.', ','); ?></td>
              <td style="vertical-align: middle;">₱<?= number_format($allotment[$key]['total_balance'], 2, '.', ','); ?></td>
              <td style="vertical-align: middle;"><?= $item['date_created']; ?></td>
              <td style="vertical-align: middle;">
                <div class="form-inline">
                  <div class="btn-group">
                    <a href="budget_fundsource_edit.php?source=<?= $key; ?>" class="btn btn-block btn-primary btn-sm" title="Edit"><i class="fa fa-eye"></i></a>
                  </div>
                  <?php if ($is_admin): ?>

                    <?php if (!$item['is_used']): ?>
                      <div class="btn-group">
                        <a type="button" class="btn btn-block btn-danger btn-sm btn-remove_fsource" data-toggle="modal" data-target="#modal_delete_fundsource" data-source_id="<?= $key; ?>" data-modal_id="1"><i class="fa fa-trash"></i></a>
                      </div>
                    <?php else: ?>
                      <div class="btn-group">
                        <a type="button" class="btn btn-block btn-danger btn-sm btn-remove_fsource" data-toggle="modal" data-target="#modal_conflict" data-source_id="<?= $key; ?>" data-modal_id="2"><i class="fa fa-trash"></i></a>
                      </div>
                    <?php endif ?>
                  <?php endif ?>
                </div>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>  

  </div>
</div>
