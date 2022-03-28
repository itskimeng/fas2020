<div class="col-md-6">
    <div class="box box-info dropbox">
        <div class="box-header">
            <h3 class="box-title"><i class="fa fa-book"></i> Purchase Request</h3>
        </div>
        <div class="box-body custom-box-body no-padding" style="height: 450px; max-height:230px; overflow-y: auto;">
            <table class="table table-striped">
                <tbody>
                    <tr>
                        <th class="text-center" width="25%">PR NO</th>
                        <th class="text-center">OFFICE</th>
                        <th class="text-center">TOTAL ABC</th>
                        <th class="text-center" width="25%">DATE SUBMITTED</th>
                        <th class="text-center">ACTION</th>
                    </tr>
                    <?php if (empty($rfq_pending_pr_opts)) : ?>
                        <tr>
                            <td colspan=5>
                                <div class="callout callout-warning">
                                    <h4> <i class="icon fa fa-warning"></i> No data available in table
                                    </h4>
                                </div>
                            </td>
                        </tr>

                    <?php endif; ?>
                    <?php foreach ($rfq_pending_pr_opts as $key => $data) : ?>
                        <tr>
                            <td><?= $data['pr_no']; ?></td>
                            <td><?= $data['office']; ?></td>
                            <td><?= $data['amount']; ?></td>
                            <td><?= $data['pr_date']; ?></td>
                            <td>
                                <button type="button" class="btn btn-primary btn-sm" id="btn_create_rfq" value="<?= $data['pr_no']; ?>"><i class="fa fa-plus-square"></i>
                                    <a href="procurement_request_for_quotation_create.php?id=<?= $data['id'];?>&pr_no=<?= $data['pr_no'];?>">Create</a></button>

                            </td>
                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>