<div class="col-lg-12">
    <div class="box box-primary" id="" style="  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);">
        <div class="box-header with-border">
            <b> Request for Quotation Entries
            </b>
            <div class="box-tools pull-right">

            </div>
        </div>
        <div class="box-body">
            <div class="col-md-12">


                <div class="table-responsive">
                    <table class="table table-condensed table-striped" id="rfq_table">
                        <thead class="bg-primary">
                            <tr>
                                <th>PR NO</th>
                                <th>PRICE</th>
                                <th>PR DATE</th>
                                <th>OFFICE</th>
                                <th>TYPE</th>
                                <th>PURPOSE</th>
                                <th>RFQ NO</th>
                                <th>RFQ DATE</th>
                                <th>ABSTRACT NO</th>
                                <th>AWARDED TO</th>
                                <th>PURCHASE ORDER NO</th>
                                <th>STATUS</th>

                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($rfq_data as $key => $data) : ?>
                                <tr>

                                    <td>

                                        <a style="text-decoration:none;" href="procurement_purchase_request_view.php?id=<?= $data['pr_id']; ?>&division=<?= $_GET['division']; ?>">
                                            <?= $data['pr_no']; ?>
                                        </a>

                                    </td>
                                    <td><?= '₱' . number_format($data['amount'], 2); ?></td>
                                    <td>
                                        <?= $data['pr_date']; ?>
                                    </td>
                                    <td>
                                        <?= $data['division']; ?>
                                    </td>
                                    <td>
                                        <?= $data['type']; ?>
                                    </td>
                                    <td style="width:20%;">
                                        <?= $data['purpose']; ?>
                                    </td>

                                    <td>
                                        <?php if (empty($data['rfq_no']) || $data['rfq_no'] == '') { ?>
                                            <?php if ($data['stat'] == 3) : ?>
                                                <button type="button" disabled class="btn btn-primary btn-sm" value="<?= $data['pr_no']; ?>"><i class="fa fa-plus-square"></i>
                                                    <a href="procurement_request_for_quotation_create.php?id=<?= $data['pr_id']; ?>&pr_no=<?= $data['pr_no']; ?>"> Create RFQ</a>
                                                </button>
                                            <?php else : ?>
                                                <button type="button" class="btn btn-primary btn-sm" value="<?= $data['pr_no']; ?>"><i class="fa fa-plus-square"></i>
                                                    <a href="procurement_request_for_quotation_create.php?id=<?= $data['pr_id']; ?>&pr_no=<?= $data['pr_no']; ?>"> Create RFQ</a>
                                                </button>
                                            <?php endif; ?>
                                        <?php } else { ?>

                                            <a style="text-decoration:none;" href="procurement_request_for_quotation_view.php?id=<?= $data['pr_no']; ?>&rfq_no=<?= $data['rfq_no']; ?>&rfq_id=<?= $data['rfq_id']; ?>">
                                                <?= $data['rfq_no']; ?>
                                            </a>
                                        <?php } ?>



                                    </td>
                                    <td><?= $data['rfq_date']; ?></td>

                                    <td>
                                        <?php if (empty($data['abstract_no']) || $data['abstract_no'] == '') { ?>
                                            <button type="button" class="btn btn-primary btn-sm" value="<?= $data['pr_no']; ?>"><i class="fa fa-plus-square"></i>
                                                <a href="procurement_supplier_awarding.php?flag=1&abstract_no=<?= $data['abstract_no']; ?>&pr_id=<?= $data['pr_id'];?>&pr_no=<?= $data['pr_no']; ?>&rfq_no=<?= $data['rfq_no']; ?>&rfq_id=<?= $data['rfq_id']; ?>">
                                                    Create Abstract
                                                </a>
                                            </button>
                                        <?php } else { ?>

                                            <a style="text-decoration:none;" href="procurement_supplier_awarding.php?flag=0&abstract_no=<?= $data['abstract_no']; ?>&pr_no=<?= $data['pr_no']; ?>&rfq_no=<?= $data['rfq_no']; ?>&rfq_id=<?= $data['rfq_id']; ?>">
                                                <?= $data['abstract_no']; ?>
                                            </a>
                                        <?php } ?>

                                    </td>
                                    <td><?= "<b><u>" . getSuppWinner($data['id'], $data['rfq_no'], $multiple); ?></td>
                                    <td>
                                        <?php if (empty($data['po_no'])) { ?>
                                            <button type="button" class="btn btn-primary btn-sm" value="<?= $data['pr_no']; ?>"><i class="fa fa-plus-square"></i>
                                                <a href="procurement_purchase_order_create.php?rfq_id=<?= $data['rfq_id']; ?>&rfq_no=<?= $data['rfq_no']; ?>&pr_id=<?= $data['pr_id'];?>&pr_no=<?= $data['pr_no']; ?>" style="color:#fff">Create PO</a>
                                            </button>
                                        <?php } else { ?>

                                            <a style="text-decoration:none;" href="procurement_purchase_order_view.php?rfq_id=<?= $data['rfq_id']; ?>&id=<?= $data['pr_id']; ?>&division=<?= $_GET['division']; ?>&po_no=<?= $data['po_no']; ?>&pr_no=<?= $data['pr_no']; ?>&rfq_no=<?= $data['rfq_no']; ?>&rfq_id=<?= $data['rfq_id']; ?>">
                                                <?= $data['po_no']; ?>
                                            </a>

                                        <?php } ?>


                                    </td>
                                    <td><?= $data['stat']; ?></td>





                                </tr>
                            <?php endforeach; ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</div>

<?php


function getSuppWinner($rfq_id, $rfq_no, $multiple)
{
    $conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
    $sql = "SELECT
	r.rfq_no,
    s.supplier_title,
    sq.is_winner
FROM
    `supplier_quote` sq 
    LEFT JOIN supplier s ON  sq.supplier_id = s.id
	LEFT JOIN rfq r ON sq.rfq_id = r.id

WHERE
    r.rfq_no = '$rfq_no' AND sq.is_winner = 1
GROUP BY
    sq.supplier_id
ORDER BY
    s.supplier_title";
    $query = mysqli_query($conn, $sql);
    $arr = array();
    while ($row = mysqli_fetch_assoc($query)) {
        $arr[] = $row['supplier_title'];
    }
    echo "<b><u>" . implode("</b></u>  and <b><u>", $arr);
}
?>