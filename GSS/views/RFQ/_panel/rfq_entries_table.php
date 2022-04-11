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
                                <th width="18%">PR NO</th>
                                <th width="18%">RFQ NO</th>
                                <th width="20%">ABSTRACT NO</th>
                                <th width="20%">PO NO</th>
                                <!-- <th width="15%">AWARDED TO</th> -->
                                <th>RFQ DATE</th>
                                <th>PR DATE</th>
                                <th width="10%">TARGET DATE</th>
                                <!-- <th>STATUS</th> -->
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($rfq_data as $key => $data) : ?>
                                <tr>

                                    <td>
                                        <div class="callout callout-warning" style="height: 50px!important;">
                                            <a style="text-decoration:none;" href="procurement_purchase_request_view.php?id=<?= $data['pr_id'];?>&division=<?= $_GET['division']; ?>">
                                                        PR-NO-<?= $data['pr_no']; ?>
                                            </a>
                                        </div>
                                    </td>
                                    <td>
                                        <?php if (empty($data['rfq_no']) || $data['rfq_no'] == '') { ?>
                                            <button type="button" class="btn btn-primary btn-sm" value="<?= $data['pr_no']; ?>"><i class="fa fa-plus-square"></i>
                                                <a href="procurement_request_for_quotation_create.php?id=<?= $data['pr_id']; ?>&pr_no=<?= $data['pr_no']; ?>"> Create RFQ</a>
                                            </button>
                                        <?php } else { ?>
                                            
                                            <div class="callout callout-danger" style="height: 50px!important;">
                                                <a style="text-decoration:none;" href="procurement_request_for_quotation_view.php?id=<?= $data['pr_no']; ?>&rfq_no=<?= $data['rfq_no']; ?>&rfq_id=<?= $data['rfq_id'];?>">
                                                    RFQ-NO-<?= $data['rfq_no']; ?>
                                                </a>
                                            </div>
                                        <?php } ?>     



                                    </td>
                                    <td>
                                        <?php if (empty($data['abstract_no']) || $data['abstract_no'] == '') { ?>
                                            <button type="button" class="btn btn-primary btn-sm" value="<?= $data['pr_no']; ?>"><i class="fa fa-plus-square"></i>
                                                <a href="procurement_supplier_awarding.php?flag=1&abstract_no=<?= $data['abstract_no']; ?>&pr_no=<?= $data['pr_no']; ?>&rfq_no=<?= $data['rfq_no']; ?>&rfq_id=<?= $data['rfq_id'];?>">
                                                    Create Abstract
                                                </a>
                                            </button>
                                        <?php } else { ?>
                                            
                                            <div class="callout callout-success" style="height: 50px!important;">
                                                <a style="text-decoration:none;" href="procurement_supplier_awarding.php?flag=0&abstract_no=<?= $data['abstract_no']; ?>&pr_no=<?= $data['pr_no']; ?>&rfq_no=<?= $data['rfq_no']; ?>&rfq_id=<?= $data['rfq_id'];?>">
                                                ABSTRACT-NO-<?= $data['abstract_no']; ?>
                                                </a>
                                            </div>
                                        <?php } ?>

                                    </td>
                                    <td>
                                        <?php if (empty($data['po_no'])) { ?>
                                            <button type="button" class="btn btn-primary btn-sm" value="<?= $data['pr_no']; ?>"><i class="fa fa-plus-square"></i>
                                                <a href="procurement_purchase_order_create.php?rfq_no=<?= $data['rfq_no']; ?>&pr_no=<?= $data['pr_no']; ?>" style="color:#fff">Create PO</a>
                                            </button>
                                        <?php } else { ?>
                                         
                                            <div class="callout callout-info" style="height: 50px!important;">
                                                <a style="text-decoration:none;" href="procurement_purchase_order_view.php?id=<?=$data['pr_id'];?>&division=<?= $_GET['division']; ?>&po_no=<?= $data['po_no']; ?>&pr_no=<?= $data['pr_no']; ?>&rfq_no=<?= $data['rfq_no']; ?>&rfq_id=<?= $data['rfq_id'];?>">
                                                PO-NO-<?= $data['po_no']; ?>
                                                </a>
                                            </div>

                                        <?php } ?>


                                    </td>

                                  

                                    <td><?= $data['rfq_date']; ?></td>
                                    <td><?= $data['pr_date']; ?></td>
                                    <td><?= $data['target_date']; ?></td>
                                   

                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>