<table class="table table-condensed table-striped" id="po_table" >
    <thead style="background: linear-gradient(90deg, #FFCDD2,#F44336);color:#fff;">
        <tr>
            <th></th>
            <th>Abstract No</th>
            <th>Supplier</th>
            <th>PO Number</th>
            <th>PO Amount</th>
            <th>PO Date</th>
            <th>NOA Date</th>
            <th>NTP Date</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
       
        <?php foreach ($rfq_data as $key => $data) : ?>
            <tr>
                <td><?= $data['rfq_id']; ?></td>
                <td><?= $data['abstract_no']; ?></td>
                <td><?= $data['supplier_title']; ?></td>
                <td><?= getPONo($data['sq_id'],$data['rfq_id'],$data['rfq_no'],$data['pr_id'],$data['pr_no'],$data['abstract_no'],$data['po_no']);?></td>                
                <td><?= $data['po_amount'];?></td>
                <td> <?= $data['po_date']; ?> </td>
                <td><?= $data['noa_date'];?></td>
                <td><?= $data['noa_date'];?></td>
                <td><?= $data['ntp_date'];?></td>
            </tr>
        <?php endforeach; ?>

    </tbody>
</table>
<style>
    .table{
        width: 100%;
    table-layout: fixed;
    }
    </style>
<?php

function getPONo($supplier_id,$rfq_id,$rfq_no,$pr_id,$pr_no,$abstract_no,$po_no)
{
    $abstract = '';
    if ($rfq_no == null) {
    } else {
        if ($po_no == null || $po_no == '') {
            $abstract = '<input type="hidden" id="pr_id" value="' . $pr_id . '" />';
            $abstract = '<button class="btn btn-xs btn-success"><a href="procurement_purchase_order_create.php?supplier_id='.$supplier_id.'&rfq_id='.$rfq_id.'&rfq_no='.$rfq_no.'&pr_id='.$pr_id.'&pr_no='.$pr_no.'">CREATE PO </a></button>';
        } else {
            $abstract = '<b><a href="procurement_purchase_order_view.php?rfq_id='.$rfq_id.'&id='.$pr_id.'&division=&po_no='.$po_no.'&pr_no='.$pr_no.'&rfq_no='.$rfq_no.'" >' . $po_no . '</a></b>';
        }
    }
    return  $abstract;
}
function setSupplier($id)
{

    require_once "Model/Connection.php";
    require_once "Model/Awarding.php";
    require_once "Model/Procurement.php";

    $award = new Awarding();

    $award->select(
        "supplier_quote sq
        LEFT JOIN supplier s on s.id = sq.supplier_id
        LEFT JOIN po on po.supplier_id = sq.id",
        "s.supplier_title,s.id",
        "sq.rfq_id='" . $id . "' and sq.is_winner=1"
    );
    $result = $award->sql;
    $winner = array();
    while ($row = mysqli_fetch_assoc($result)) {
        $winner[] = $row['supplier_title'];
    }
    echo "<b><u>" . implode("</b></u>  and <b><u>", $winner);
}
?>
<link href="GSS/views/RFQ/_panel/tiles/dataTables.css" rel="stylesheet" />
<script type="text/javascript" src="GSS/views/RFQ/_panel/tiles/dataTables.min.js"></script>
<script>
    $(document).on('click', '#btn-export-abstract', function() {
        let pr_no = $('#cform-abstract-pr_no').val();
        let rfq_id = $('#cform-rfq_id').val();
        let rfq_no = $('#cform-abstract-rfq_no').val();
        let abstract_no = $('#cform-abstract_no').val();

        location = "procurement_export_abstract.php?rfq_no=" + rfq_no + "&amp;rfq_id=" + rfq_id + "&amp;abstract_no=" + abstract_no + "&amp;pr_no=" + abstract_no + "";
    })

   
</script>