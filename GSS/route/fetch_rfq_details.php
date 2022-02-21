<?php
date_default_timezone_set('Asia/Manila');
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");

$pr_no = $_GET['pr_no'];

$data = [
    'pr_no' => $pr_no,
];
$app = fetch($conn, $data);

echo $app;

function fetch($conn, $options)
{
    $sql = "SELECT
            rfq.id,
            rfq.rfq_date,
            rfq.rfq_no,
            rfq.purpose,
            i.pmo,
            rfq.pr_no,
            rfq.pr_received_date
        FROM
            rfq
        LEFT JOIN pr i ON  i.pr_no = rfq.pr_no
        WHERE
                rfq.pr_no = '" . $options['pr_no'] . "'";


    $query = mysqli_query($conn, $sql);
    $count = 1;
    while ($row = mysqli_fetch_assoc($query)) {
        $office = $row['pmo'];
        $fad = ['10', '11', '12', '13', '14', '15', '16'];
        $ord = ['1', '2', '3', '5'];
        $lgmed = ['7', '18','7',];
        $lgcdd = ['8', '9', '17','9'];
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
        $data[$row['id']] = [
            'rfq_date' => date('F d, Y',strtotime($row['rfq_date'])),
            'purpose'   => $row['purpose'],
            'rfq_no'   => $row['rfq_no'],
            'office'    => $office,
            'pr_no'     => $options['pr_no'],
            'status'    => ''

        ];
        $count++;
    }
    return json_encode($data);
}
