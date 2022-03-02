<?php
$po_id = $_POST['id'];

$result = fetchPOItem($procurement);
echo $result;
function fetchPOItem($param1)
{

    $conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
    $data = [];

    $sql = "SELECT
                p.`id`,
                p.`po_no`,
                p.`rfq_no`,
                p.`po_date`,
                p.`noa_date`,
                p.`ntp_date`,
                p.`po_amount`
            FROM
                `po` as p
            LEFT JOIN supplier_quote sq on sq.rfq_no = p.rfq_no
            LEFT JOIN supplier s on s.id = sq.supplier_id
            where p.id = '" . $param1 . "' ";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $data = array(
            'id' => $row['id'],
            'po_no' => $row['po_no'],
            'rfq_no' => $row['rfq_no'],
            'po_date' => $row['po_date'],
            'noa_date' => $row['noa_date'],
            'ntp_date' => $row['ntp_date'],
            'po_amount' => $row['po_amount'],
            'ntp_date' => $row['ntp_date']

        );
    }
    return json_encode($data);
}
