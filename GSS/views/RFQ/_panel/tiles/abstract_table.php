<table class="table table-condensed table-striped" id="abstract_table">
    <thead class="bg-primary">
        <tr>
            <th></th>
            <th>PR NO</th>
            <th>ABC</th>
            <th>Particulars</th>
            <th>End-user</th>
            <th>Date Received</th>
            <th>Received By</th>
            <th>RFQ NO</th>
            <th>Abstract NO</th>
            <th style="width:10%;">Winning Bidder</th>
            <th>Abstract Date</th>
            <th>Target Date</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rfq_data as $key => $data) : ?>
            <tr>
                <td><?= $data['rfq_id']; ?></td>
                <td><b><?= $data['pr_no']; ?></b></td>
                <td><?= '₱' . number_format($data['amount'], 2); ?></td>
                <td> <?= $data['purpose']; ?> </td>
                <td> <?= $data['division']; ?> </td>
                <td> <?= $data['received_date']; ?> </td>
                <td> FAD-GSS</td>
                <td> <b>
                        <a style="text-decoration:none;" href="procurement_request_for_quotation_view.php?id=<?= $data['pr_no']; ?>&rfq_no=<?= $data['rfq_no']; ?>&rfq_id=<?= $data['rfq_id']; ?>">
                            <?= $data['rfq_no']; ?>
                        </a>
                    </b></td>
                <td> <?= getAbstractNO($data['pr_id'], $data['rfq_no'], $data['rfq_id'], $data['abstract_no'], $data['abstract_date']); ?> </td>
                <td><img src="images/award.jpg" / style="width:20%;height:20%"><?= setWinner($data['rfq_id']); ?></td>
                <td> <?= $data['abstract_date']; ?> </td>
                <td> <?= $data['target_date']; ?> </td>
                <td style="width:10%;text-align:center;"><?= $data['stat']; ?></td>


            </tr>
        <?php endforeach; ?>

    </tbody>
</table>
<?php
function setWinner($id)
{

    require_once "Model/Connection.php";
    require_once "Model/Awarding.php";
    require_once "Model/Procurement.php";

    $award = new Awarding();

    $award->select(
        "supplier_quote sq
        LEFT JOIN supplier s on s.id = sq.supplier_id",
        "s.supplier_title",
        "sq.rfq_id='" . $id . "' and sq.is_winner=1 limit 1"
    );
    $result = $award->sql;
    while ($row = mysqli_fetch_assoc($result)) {
        return $row['supplier_title'];
    }
}
function getAbstractNO($pr_id, $rfq_no, $rfq_id, $abstract_no, $abstract_date)
{
    $abstract = '';
    if ($abstract_no == null) {
        $abstract = '<input type="hidden" id="pr_id" value="' . $pr_id . '" />';
        $abstract = '<button id="btn-create-abstract" data-pr="' . $pr_id . '" data-rno = "'.$rfq_no.'" data-value="' . $rfq_id . '" class="btn btn-xs btn-success"> CREATE ABSTRACT </button>';
    } else {
        $abstract = '<b><a  data-toggle="modal" id="modal-abstract"  data-date="' . $abstract_date . '" data-abstract="' . $abstract_no . '" data-pr="' . $pr_id . '" data-rfq="' . $rfq_no . '" data-value="' . $rfq_id . '">' . $abstract_no . '</a></b>';
    }
    return  $abstract;
}

?>
<script>
    
    $(document).on('click','#btn-export-abstract',function(){
        let pr_no = $('#cform-abstract-pr_no').val();
        let rfq_id = $('#cform-rfq_id').val();
        let rfq_no = $('#cform-abstract-rfq_no').val();
        let abstract_no = $('#cform-abstract_no').val();

        location = "procurement_export_abstract.php?rfq_no="+rfq_no+"&amp;rfq_id="+rfq_id+"&amp;abstract_no="+abstract_no+"&amp;pr_no="+abstract_no+"";
    })

    $(document).on('click', '#modal-abstract', function() {
        let pr_id = $(this).attr('data-pr');
        let rfq = $(this).attr('data-value');
        let abstract_no = $(this).attr('data-abstract');
        let abstract_date = $(this).attr('data-date');
        console.log(abstract_date);
        $('#cform-abstract_no').val(abstract_no);
        $('#cform-abstract_date').val(abstract_date);
        $('#rfq_no').val(rfq);
        fetchItem(pr_id, $(this).attr('data-rfq'), $(this).attr('data-value'));
        fetchCart(pr_id, $(this).attr('data-rfq'), $(this).attr('data-value'));


        function fetchAbstractDetails(pr_id, rfq) {
            let path = 'GSS/views/RFQ/_panel/tiles/showData.php'
            $.post({
                url: path,
                data: {
                    pr_id: pr_id,
                    rfq: rfq
                },
                success: function(result) {
                    var data = jQuery.parseJSON(result);
                    $('#cform-abstract-rfq_no').val(data.rfq_no)
                    $('#cform-abstract-rfq_id').val(data.rfq_id)
                    $('#cform-abstract-pr_id').val(data.pr_id)
                    $('#cform-abstract-pr_no').val(data.pr_no)
                    $('#cform-abstract_abc').val(data.total_abc)
                    $('#cform-abstract-rfq_date').val(data.rfq_date)
                    $('#cform-abstract-pr_date').val(data.pr_date)
                    $('#cform-abstract-office').val(data.office)

                }
            })

        }

        function showQuotation(item) {
            $.post({
                url: 'GSS/views/RFQ/_panel/tiles/supplier_bidderlist.php',
                data: {
                    rfq_id: item,
                },
                success: function(data) {
                    $('#supplier_quotation').html(data);
                }
            })

        }

        function fetchItem(id, rfq_no, rfq_id) {
            $.post({
                url: 'GSS/views/RFQ/_panel/tiles/fetch_quoted_item.php',
                data: {
                    pr_id: id,
                    rfq: rfq_no,
                    rid: rfq_id
                },
                success: function(data) {
                    $('#item_quoted').html(data);
                }
            })
        }

        function fetchCart(id, rfq_no, rfq_id) {
            $.post({
                url: 'GSS/views/RFQ/_panel/tiles/fetch_pr_items.php',
                data: {
                    pr_id: id,
                    rfq: rfq_no,
                    rid: rfq_id
                },
                success: function(data) {
                    $('#pr_items').html(data);
                }
            })
        }
        function showMultipleData(rfq_id) {
            let path = 'GSS/views/RFQ/_panel/tiles/showMultipleData.php'
            $.post({
                url: path,
                data: {
                    rfq:rfq_id
                },
                success: function(result) {
                    var data = jQuery.parseJSON(result);
                    $('#cform-pr_no').val(data.pr_no)
                    $('#cform-rfq_no').val(data.rfq_no)
                    $('#cform-hidden-rfq_no').val(data.rfq_no)
                    $('#cform-rfq_id').val(data.rfq_id)
                    $('#cform-pr_id').val(data.pr_id)
                    $('#cform_abc').val(data.total_abc)
                    $('#cform-rfq_date').val(data.rfq_date)
                    $('#cform-pr_date').val(data.pr_date)
                    $('#cform-office').val(data.office)
                    $('#cform-rfq_no').val(data.rfq_no)
                }
            })

        }
        showQuotation(rfq);
        <?php if (($is_multiple_pr['is_multiple'])): ?>
        showMultipleData(pr_id,rfq);
        <?php else:?>
        fetchAbstractDetails(pr_id, rfq);
        <?php endif; ?>
        $('#abstract').modal('show');

    })
</script>