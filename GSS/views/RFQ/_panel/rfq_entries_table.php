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
                                                <a href="procurement_supplier_awarding.php?flag=1&abstract_no=<?= $data['abstract_no']; ?>&pr_id=<?= $data['pr_id']; ?>&pr_no=<?= $data['pr_no']; ?>&rfq_no=<?= $data['rfq_no']; ?>&rfq_id=<?= $data['rfq_id']; ?>">
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
                                                <a href="procurement_purchase_order_create.php?rfq_id=<?= $data['rfq_id']; ?>&rfq_no=<?= $data['rfq_no']; ?>&pr_id=<?= $data['pr_id']; ?>&pr_no=<?= $data['pr_no']; ?>" style="color:#fff">Create PO</a>
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
<!-- Modal -->
<div class="modal fade" id="viewStatus" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl" style="margin-left:20%;width: 80%;" role="document">
        <div class="modal-content" style="width:80%!important;border-radius:10px;">
            <div class="modal-header">
                <h3 class="modal-title" id="title_header">
                <i class="fa fa-list fa-fw"></i>Purchase Request Number:</h3>
               
            </div>
            <div class="modal-body" id="history" style="height: 600px; overflow-y:auto;">
                <ul class="timeline timeline-inverse">
                    <li class="time-label">
                        <span class="bg-red">
                            10 Feb. 2014
                        </span>
                    </li>
                    <li>
                        <i class="fa fa-envelope bg-blue"></i>

                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> 12:05</span>

                            <h3 class="timeline-header"><a href="#">DRAFT</a> sent you an email</h3>

                            <div class="timeline-body">
                                <table class="table table-responsive borderless">
                                    <tbody>
                                        <tr>
                                            <td width="115px"><label><i class="fa fa-clock-o"></i> Time</label></td>
                                            <td width="5px">:</td>
                                            <td>03:55 PM</td>
                                        </tr>
                                        <tr>
                                            <td><label><i class="fa fa-user"></i> Assigned by:</label></td>
                                            <td>:</td>
                                            <td>MARK KIM A. SACLUTI<br><small>REGION IV-A - CALABARZON<br>OFFICE OF REGIONAL DIRECTOR</small></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </li>

                </ul>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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

<script>
      $(document).on('click', '#showModal', function() {
        let pr_id = $(this).data('id');
        let pr_no = $(this).data('value');
        let path = 'GSS/route/post_status_history.php';
        let data = {
            'id': pr_id,
            'pr_no': pr_no
        };

        $.post(path, data, function(data, status) {
            $('#app_table').empty();
            let lists = JSON.parse(data);
            sample(lists);
            $('#viewStatus').modal();
            $('#title_header').html('<i class="fa fa-list fa-fw"></i>Purchase Request Number:<b>' + pr_no + '</b>');

        });

        function sample($data) {
            $.each($data, function(key, item) {
                let ul = '<ul class="timeline timeline-inverse">';
                ul += '<li class="time-label">';
                ul += '<span class="bg-red" id="action_date">' + item['action_date'] + '</span>';

                ul += '</li>';
                ul += '<li>';
                ul += '<i class="fa fa-clock-o bg-blue"></i>';

                ul += '<div class="timeline-item">';
                ul += '';

                ul += '<h3 class="timeline-header"><a href+="#">ACTION TAKEN:' + item['status'] + '</a></h3>';

                ul += '<div class="timeline-body">';
                ul += '<table class="table table-responsive borderless">';
                ul += '<tbody>';
                ul += '<tr>';
                ul += '<td width="115px"><label><i class="fa fa-clock-o"></i> Time</label></td>';
                ul += '<td width="5px">:</td>';
                ul += '<td>' + item['action_time']; + '</td>';
                ul += '</tr>';
                if (item['code'] !== '' && item['stat'] == 2) {
                    ul += '<tr>';
                    ul += '<td width="115px"><label><i class="fa fa-check-circle"></i> Code</label></td>';
                    ul += '<td width="5px">:</td>';
                    ul += '<td>' + item['code']; + '</td>';
                    ul += '</tr>';
                }
                ul += '<tr>';
                ul += '<td><label><i class="fa fa-user"></i> Assigned by:</label></td>';
                ul += '<td>:</td>';
                ul += '<td>' + item['assign_employee'] + '<br><small>REGION IV-A - CALABARZON<br>' + item['office'] + '</small></td>';
                ul += '</tr>';
                ul += '</tbody>';
                ul += '</table>';
                ul += '</div>';

                ul += '</div>';
                ul += '</li>';

                ul += '</ul>';

                $('#history').append(ul);
            });

            return $data;
        }
        $("#history").html("");

    })
</script>