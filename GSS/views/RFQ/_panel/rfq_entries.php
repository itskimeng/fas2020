<div class="panel panel-primary" id="tbl_pr_entries">
    <div class="panel-heading">
        <span class="pull-right"></span>
        <i class="fa fa-list-ul"></i> Request for Quotation Entries
    </div>
    <div class="table-responsive">
        <table class="table table-condensed table-striped" id="rfq_table">
            <thead>
                <tr>
                    <th>RFQ NO</th>
                    <th>PR NO</th>
                    <th>RFQ DATE.</th>
                    <th>PR DATE</th>
                    <th>TARGET DATE</th>
                    <th>STATUS</th>

                    <th style="text-align: center;">ACTION</th>
                </tr>
            </thead>

            <tbody>
                <?php foreach ($rfq_data as $key => $data) : ?>
                    <tr>
                        <td><?= $data['rfq']; ?></td>
                        <td><a href="procurement_purchase_request_view.php?division=<?= $_GET['division']; ?>&id=<?= $data['pr_no']; ?>"><?= $data['pr_no']; ?></a></td>
                        <td><?= $data['rfq_date']; ?></td>
                        <td><?= $data['pr_date']; ?></td>
                        <td><?= $data['target_date']; ?></td>
                        <td>
                            <?= $data['remarks']; ?>
                            <?php if ($data['urgent']) : ?>
                                <br><label class="label label-danger">URGENT</label>
                            <?php endif; ?>
                        </td>


                        <td>

                            <button class="btn btn-flat btn-block bg-green btn-md" id="btn_view_rfq" value="<?= $data['rfq']; ?>">
                                <i class="fa fa-eye"></i> View/Edit
                            </button>

                            <?php if ($data['status'] == 5) : ?>
                                <button class="btn btn-flat btn-block bg-purple btn-md" value="<?= $data['pr_no']; ?>">
                                    <a href="export_rfq.php?id=<?= $data['pr_no']; ?>" style="color:#fff">
                                        <i class="fa fa-file-excel-o"></i> EXPORT RFQ</a>
                                </button>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>


            </tbody>
        </table>
    </div>
</div>