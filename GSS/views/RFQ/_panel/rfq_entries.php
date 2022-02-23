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

                    <th style="text-align: center;">ACTIONS</th>
                    <th style="text-align: center;">EXPORT RFQ</th>
                    <th style="text-align: center;">AWARD</th>
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
                            <button class="btn-style btn-1 btn-sep icon-view" id="btn_view_rfq" value="<?= $data['rfq']; ?>">View/Edit</button>
                            <?php if ($data['status'] == 5) : ?>
                            <?php endif; ?>
                        </td>
                        <td>
                            <button class="btn-style btn-1 btn-sep icon-export" value="<?= $data['pr_no']; ?>">
                            <a href="export_rfq.php?id=<?= $data['pr_no']; ?>" style="color:#fff">Export</a></button>
                        </td>
                        <td>
                        <?php if ($data['is_awarded'] == 1)  {?>
                            <button class="btn-style btn-1 btn-sep icon-info" id="award" value="<?= $data['pr_no']; ?>" >
                               <a href="procurement_supplier_awarding.php?flag=1&pr_no=<?= $data['pr_no'];?>&rfq_no=<?= $data['rfq'];?>" style="color:#fff;">Award</a>
                            </button>
                        <?php }else{ ?>
                            <button class="btn-style btn-1 btn-sep icon-info" id="award" value="<?= $data['pr_no']; ?>" >
                              Award
                            </button>
                        <?php }?>


                        </td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
    </div>
</div>

