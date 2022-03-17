<div class="col-lg-12">
    <div class="box box-info" id="" style="  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);">
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
            <div class="col-md-12">


                <div class="table-responsive">
                    <table class="table table-condensed table-striped" id="rfq_table">
                        <thead class="bg-primary">
                            <tr>
                                <th width="15%">RFQ NO</th>
                                <th width="18%">PR NO</th>
                                <th width="18%">ABSTRACT NO</th>
                                <th width="18%">PO NO</th>
                                <th width="15%">AWARDED TO</th>
                                <th>RFQ DATE</th>
                                <th>PR DATE</th>
                                <th>TARGET DATE</th>
                                <th>STATUS</th>
                                <!-- <th style="text-align: center;">ACTIONS</th> -->
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($rfq_data as $key => $data) : ?>
                                <tr>
                                    <td>
                                        <?php if (empty($data['rfq_no']) || $data['rfq_no'] == '') { ?>
                                            <button type="button" class="btn btn-primary btn-sm" value="<?= $data['pr_no']; ?>"><i class="fa fa-plus-square"></i>
                                                <a href="procurement_request_for_quotation_create.php?id=<?= $data['pr_id']; ?>&pr_no=<?= $data['pr_no']; ?>"> Create RFQ</a>
                                            </button>
                                        <?php } else { ?>
                                            <a href="procurement_request_for_quotation_view.php?id=<?= $data['pr_no']; ?>&rfq_no=<?= $data['rfq_no']; ?>">
                                                <span class="badge" style="background-color: #AD1457;">
                                                    RFQ-NO-<?= $data['rfq_no']; ?>
                                                </span>
                                            </a>
                                        <?php } ?>



                                    </td>
                                    <td>
                                        <a href="procurement_purchase_request_view.php?division=<?= $_GET['division']; ?>&id=<?= $data['pr_no']; ?>">
                                            <span class="badge" style="background-color: #FB8C00;">
                                                PR-NO-<?= $data['pr_no']; ?>
                                            </span>
                                        </a>
                                    </td>
                                    <td>
                                        <?php if (empty($data['abstract_no']) || $data['abstract_no'] == '') { ?>
                                            <button type="button" class="btn btn-primary btn-sm" value="<?= $data['pr_no']; ?>"><i class="fa fa-plus-square"></i>
                                                <a href="procurement_supplier_awarding.php?flag=1&abstract_no=<?= $data['abstract_no']; ?>&pr_no=<?= $data['pr_no']; ?>&rfq_no=<?= $data['rfq_no']; ?>">
                                                    Create Abstract
                                                </a>
                                            </button>
                                        <?php } else { ?>
                                            <a href="procurement_supplier_awarding.php?flag=1&abstract_no=<?= $data['abstract_no']; ?>&pr_no=<?= $data['pr_no']; ?>&rfq_no=<?= $data['rfq_no']; ?>">
                                                <span class="badge" style="background-color: #1A237E;">
                                                    ABSTRACT-NO-<?= $data['abstract_no']; ?>
                                                </span>
                                            </a>
                                        <?php } ?>

                                    </td>
                                    <td>
                                        <?php if (empty($data['po_no'])) { ?>
                                            <button type="button" class="btn btn-primary btn-sm" value="<?= $data['pr_no']; ?>"><i class="fa fa-plus-square"></i>
                                                <a href="procurement_purchase_order_create.php?rfq_no=<?= $data['rfq_no']; ?>" style="color:#fff">Create PO</a>
                                                </button>
                                        <?php } else { ?>
                                            <a href="procurement_purchase_order_view.php?division=<?= $_GET['division']; ?>&po_no=<?= $data['po_no']; ?>&pr_no=<?= $data['pr_no']; ?>&rfq_no=<?= $data['rfq_no']; ?>">
                                            <span class="badge" style="background-color: #33691E;">
                                                    PO-NO-<?= $data['abstract_no']; ?>
                                                </span>
                                            </a>
                                        <?php } ?>


                                    </td>

                                    <td>
                                        <a href="procurement_supplier_awarding.php?division=<?= $_GET['division']; ?>&flag=1&pr_no=<?= $data['pr_no']; ?>&rfq_no=<?= $data['rfq_no']; ?>">
                                            <?= $data['winner_supplier']; ?>
                                        </a>
                                    </td>

                                    <td><?= $data['rfq_date']; ?></td>
                                    <td><?= $data['pr_date']; ?></td>
                                    <td><?= $data['target_date']; ?></td>
                                    <td>
                                        <b><?= $data['current_status']; ?></b>
                                        <?php if ($data['urgent']) : ?>
                                            <br><label class="label label-danger">URGENT</label>
                                        <?php endif; ?>
                                    </td>
                                   


                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>