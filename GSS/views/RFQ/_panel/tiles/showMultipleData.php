<?php
$rfq_no = $_POST['rfq'];
$is_multiple = '';

$result = fetchEvents($rfq_no);
echo $result;
function fetchEvents($id)
{

    $conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
    $data = [];


    $sql1 =  "SELECT
    rfq.id as 'rfq_id',
    rfq.rfq_mode_id,
    rfq.quotation_date,
    rfq.rfq_date,
    rfq.rfq_no,
    rfq.purpose,
    rfq.pmo_id,
    rfq.pr_no,
    rfq.pr_received_date,
    app.mode_of_proc_id,
    app.id,
    pi.abc,
    pi.qty,
    sum(pi.qty*pi.abc) as 'abc',
    pr.pr_date,
    pr.pmo

    

                    FROM
    rfq
    LEFT JOIN pr ON pr.id = rfq.pr_id
    LEFT JOIN pr_items pi ON pi.pr_id = pr.id
    LEFT JOIN app ON app.id = pi.items
    WHERE
    rfq.rfq_no = '$id' group by pr.pr_no";
// =================================================================
$sql = "SELECT sum(pi.abc * pi.qty) as 'amount' FROM
        `rfq`
        LEFT JOIN pr on pr.id = rfq.pr_id
        LEFT JOIN pmo on pmo.id = pr.pmo
        LEFT JOIN mode_of_proc `mode` on mode.id = rfq.rfq_mode_id
        LEFT JOIN pr_items pi on pi.pr_id = pr.id
        WHERE
        rfq.rfq_no ='$id'";
    $query1 = mysqli_query($conn, $sql);
    $data = [];
    $total_amount = 0;
        while ($row = mysqli_fetch_assoc($query1)) {
            $total_amount = $row['amount'];
            
        }
        // ============================================
    $query = mysqli_query($conn, $sql1);
    while ($row = mysqli_fetch_assoc($query)) {
        $pr[] = $row['pr_no'];
        $rfq_id[] = $row['rfq_id'];
        $office = $row['pmo'];

        $fad = ['10', '11', '12', '13', '14', '15', '16'];
        $ord = ['1', '2', '3', '5'];
        $lgmed = ['7', '18', '7',];
        $lgcdd = ['8', '9', '17', '9'];
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
        } else {
            $office = '~';
        }

        $data = array(
            'pr_no' => implode(',', $pr),
            'rfq_id' => implode(',',$rfq_id),
            'rfq_no' => $row['rfq_no'],
            'rfq_date' => date('F d, Y', strtotime($row['rfq_date'])),
            'pr_date' => date('F d, Y', strtotime($row['pr_date'])),
            'total_abc' => '₱' . number_format($total_amount, 2),
            'office' => $office,
        );
    }
    return json_encode($data);
}
