<?php
$po_id = $_POST['id'];

$result = fetchPOItem($po_id);
echo $result;
function fetchPOItem($param1)
{

    $conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
    $data = [];

    $sql = "SELECT
            p.`id`,
            p.`po_no`,
            r.`rfq_no`,
            r.`id` as rfq_id,
            r.`pr_no` as pr_no,
            r.`pr_id` as pr_id,
            p.`po_date`,
            p.`po_amount`,
            pr.`pmo`,
            s.supplier_title,
            s.id as 'supplier_id'
        FROM
            `po` as p
        LEFT JOIN supplier_quote sq on sq.rfq_id = p.rfq_id
        LEFT JOIN supplier s on s.id = sq.supplier_id
        LEFT JOIN abstract_of_quote aq on aq.supplier_id = sq.supplier_id
        LEFT JOIN rfq r on r.id = sq.rfq_id
        LEFT JOIN pr  on pr.id = r.pr_id
        where p.id = '" . $param1 . "' and sq.is_winner = 1 ";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $office = $row['pmo'];
        $fad = ['10', '11', '12', '13', '14', '15', '16'];
        $ord = ['1', '2', '3', '5'];
        $lgmed = ['7', '18'];
        $lgcdd = ['8', '9', '17'];
        $cavite = ['20', '34', '35', '36', '45'];
        $laguna = ['21', '40', '41', '42', '47', '51', '52'];
        $batangas = ['19', '28', '29', '30', '44'];
        $rizal = ['23', '37', '38', '39', '46', '50'];
        $quezon = ['22', '31', '32', '33', '48', '49', '53'];
        $lucena_city = ['24'];
        if (in_array($office, $fad)) {
            $office = 'FAD';
        } else if (in_array($office, $lgmed)) {
            $office = 'LGMED';
        } else if (in_array($office, $lgcdd)) {
            $office = 'LGCDD';
        } else if (in_array($office, $cavite)) {
            $office = 'CAVITE';
        } else if (in_array($office, $laguna)) {
            $office = 'LAGUNA';
        } else if (in_array($office, $batangas)) {
            $office = 'BATANGAS';
        } else if (in_array($office, $rizal)) {
            $office = 'RIZAL';
        } else if (in_array($office, $quezon)) {
            $office = 'QUEZON';
        } else if (in_array($office, $lucena_city)) {
            $office = 'LUCENA CITY';
        } else if (in_array($office, $ord)) {
            $office = 'ORD';
        }
        $data = array(
            'id' => $row['id'],
            'po_no' => $row['po_no'],
            'rfq_no' => $row['rfq_no'],
            'rfq_id' => $row['rfq_id'],
            'pr_no' => $row['pr_no'],
            'pr_id' => $row['pr_id'],
            'supplier' => $row['supplier_title'],
            'supplier_id' => $row['supplier_id'],
            'po_date' => $row['po_date'],
            'po_amount' => $row['po_amount'],
            'office' => $office,

        );
    }
    return json_encode($data);
}
