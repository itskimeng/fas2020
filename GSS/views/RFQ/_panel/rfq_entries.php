<div class="box box-info" id="tbl_pr_entries" style="  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);">
    <div class="box-header with-border">
        <b> Request for Quotation Entries
        </b>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
        <div class="table-responsive">
            <table class="table table-condensed table-striped" id="rfq_table">
                <thead class="bg-primary">
                    <tr>
                        <th width="15%">RFQ NO</th>
                        <th width="18%">PR NO</th>
                        <th width="18%">ABSTRACT NO</th>
                        <th width="18%">PO NO</th>
                        <th width="15%">AWARDING</th>
                        <th>RFQ DATE.</th>
                        <th>PR DATE</th>
                        <th>TARGET DATE</th>

                        <th style="text-align: center;">ACTIONS</th>

                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($rfq_data as $key => $data) : ?>
                        <tr>
                            <td><?= $data['rfq']; ?></td>
                            <td><a href="procurement_purchase_request_view.php?division=<?= $_GET['division']; ?>&id=<?= $data['pr_no']; ?>"><?= $data['pr_no']; ?></a></td>
                            <td><?= $data['abstract_no'];?></td>
                            <td></td>
                            <td><a href="procurement_supplier_awarding.php?division=<?= $_GET['division']; ?>&flag=1&pr_no=<?= $data['pr_no']; ?>&rfq_no=<?= $data['rfq']; ?>"><?= $data['winner_supplier'];?></a></td>

                            <td><?= $data['rfq_date']; ?></td>
                            <td><?= $data['pr_date']; ?></td>
                            <td><?= $data['target_date']; ?></td>
                            <!-- <td>
                                <?= $data['remarks']; ?>
                                <?php if ($data['urgent']) : ?>
                                    <br><label class="label label-danger">URGENT</label>
                                <?php endif; ?>
                            </td> -->
                            <td style="width: 10%;">
                                <button class="btn-style btn-1 btn-sep icon-view" value="<?= $data['rfq']; ?>">
                                    <a href="procurement_request_for_quotation_view.php?rfq_no=<?= $data['rfq'];?>">View </a>
                                </button>
                                <?php if ($data['status'] == 5) : ?>
                                <?php endif; ?>
                                <button class="btn-style btn-1 btn-sep icon-export" value="<?= $data['pr_no']; ?>">
                                    <a href="export_rfq.php?id=<?= $data['pr_no']; ?>" style="color:#fff">Export</a></button><br>
                                <?php if ($data['is_awarded'] == 1) { ?>
                                    <button class="btn-style btn-1 btn-sep icon-info" id="award" value="<?= $data['pr_no']; ?>">
                                        <a href="procurement_supplier_awarding.php?flag=1&abstract_no=<?= $data['abstract_no'];?>&pr_no=<?= $data['pr_no']; ?>&rfq_no=<?= $data['rfq']; ?>" style="color:#fff;">Award</a>
                                    </button>
                                <?php } else { ?>
                                    <button class="btn-style btn-1 btn-sep icon-info" style="width:100%;" id="award" value="<?= $data['pr_no']; ?>">
                                    <a href="procurement_supplier_awarding.php?flag=1&pr_no=<?= $data['pr_no']; ?>&rfq_no=<?= $data['rfq']; ?>" style="color:#fff;">Award</a>
                                    </button>
                                <?php } ?>
                            </td>

                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>