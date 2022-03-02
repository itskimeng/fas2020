<div class="box box-info" id="tbl_pr_entries" style="  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);">
    <div class="box-header with-border">
        <b> Request for Quotation Entries
        </b>
        <div class="box-tools pull-right">
            <button type="button" style="width:100%" class="btn btn-box-tool" data-widget="collapse">
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
                        <th>RFQ DATE</th>
                        <th>PR DATE</th>
                        <th>TARGET DATE</th>
                        <th>STATUS</th>

                        <th style="text-align: center;">ACTIONS</th>
                    </tr>
                </thead>

                <tbody>
                    <?php foreach ($rfq_data as $key => $data) : ?>
                        <tr>
                            <td>
                                <a href="procurement_request_for_quotation_view.php?id=<?= $data['pr_no']; ?>&rfq_no=<?= $data['rfq']; ?>">
                                    RFQ-NO-<?= $data['rfq']; ?>
                                </a>
                            </td>
                            <td>
                                <a href="procurement_purchase_request_view.php?division=<?= $_GET['division']; ?>&id=<?= $data['pr_no']; ?>">
                                    PR-NO-<?= $data['pr_no']; ?>
                                </a>
                            </td>
                            <td>
                                <a href="procurement_supplier_awarding.php?flag=1&abstract_no=<?= $data['abstract_no']; ?>&pr_no=<?= $data['pr_no']; ?>&rfq_no=<?= $data['rfq']; ?>">
                                    <?= $data['abstract_no']; ?>
                                </a>
                            </td>
                            <td>
                                <a href="procurement_purchase_order_view.php?division=<?= $_GET['division']; ?>&po_no=<?= $data['po_no']; ?>&pr_no=<?= $data['pr_no']; ?>&rfq_no=<?= $data['rfq']; ?>">
                                    <?= $data['po_no']; ?>
                                </a>
                            </td>

                            <td>
                                <a href="procurement_supplier_awarding.php?division=<?= $_GET['division']; ?>&flag=1&pr_no=<?= $data['pr_no']; ?>&rfq_no=<?= $data['rfq']; ?>">
                                    <?= $data['winner_supplier']; ?>
                                </a>
                            </td>

                            <td><?= $data['rfq_date']; ?></td>
                            <td><?= $data['pr_date']; ?></td>
                            <td><?= $data['target_date']; ?></td>
                            <td>
                                <b><?= $data['remarks']; ?></b>
                                <?php if ($data['urgent']) : ?>
                                    <br><label class="label label-danger">URGENT</label>
                                <?php endif; ?>
                            </td>
                            <?PHP if ($data['is_awarded'] == 1) { ?>
                                <?php if ($data['po_no'] != null) { ?>
                                    <td>
                                        <button style="width:100%" class="btn btn-flat bg-green">
                                            <a href="procurement_purchase_order_view.php?division=<?= $_GET['division']; ?>&po_no=<?= $data['po_no']; ?>&pr_no=<?= $data['pr_no']; ?>&rfq_no=<?= $data['rfq']; ?>">View PO</a>
                                        </button>
                                    </td>
                                <?php } else { ?>
                                    <td>
                                        <button style="width:100%" class="btn btn-flat bg-orange">
                                            <a href="procurement_purchase_order_create.php?rfq_no=<?= $data['rfq']; ?>" style="color:#fff">Create PO</a>
                                        </button>
                                        
                                    </td>
                                <?php } ?>

                            <?php } else { ?>
                                <!-- if not recieved by budget, return -->
                                <?php if ($data['status'] != 2) { ?>
                                    <td style="width: 10%;">
                                        <button disabled style="width:100%" class="btn btn-flat bg-blue" style="width:100%;" id="award" value="<?= $data['pr_no']; ?>">
                                            <a href="procurement_supplier_awarding.php?flag=1&pr_no=<?= $data['pr_no']; ?>&rfq_no=<?= $data['rfq']; ?>" style="color:#fff;">Award</a>
                                        </button>
                                        <button style="width:100%" class="btn btn-flat bg-red" style="width:100%;" id="award" value="<?= $data['pr_no']; ?>">
                                            <a href="GSS/route/post_submit_to_budget.php?pr_no=<?= $data['pr_no']; ?>&rfq_no=<?= $data['rfq']; ?>" style="color:#fff;">To Budget</a>
                                        </button>
                                    </td>
                                <?php } else { ?>

                                    <td style="width: 10%;">
                                    <button style="width:100%" class="btn btn-flat bg-blue" style="width:100%;" id="award" value="<?= $data['pr_no']; ?>">
                                        <a href="procurement_supplier_awarding.php?flag=1&pr_no=<?= $data['pr_no']; ?>&rfq_no=<?= $data['rfq']; ?>" style="color:#fff;">Award</a>
                                    </button>
                                </td>
                                <?php } ?>




                            <?php } ?>


                        </tr>
                    <?php endforeach; ?>

                </tbody>
            </table>
        </div>
    </div>
</div>