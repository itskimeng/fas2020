
    <?php


        $rfq_no = $_POST['id'];
        $result = fetchRFQInfo($rfq_no);
        echo $result;
    

function fetchRFQInfo($rfq_no)
{
    $conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
    $data = [];

    $sql = "SELECT
    rfq.id,
    pr.pr_no,
    pr.pr_date,
    rfq.rfq_no,
    rfq.rfq_date,
    pmo.pmo_title,
    rfq.pmo_id as 'pmo',
    `mode`.mode_of_proc_title,
    rfq.rfq_date,
    pi.abc,
    pi.qty,
    pr.submitted_by,
    rfq.purpose
    
FROM
    `rfq`
LEFT JOIN pr on pr.id = rfq.pr_id
LEFT JOIN pmo on pmo.id = pr.pmo
LEFT JOIN mode_of_proc `mode` on mode.id = rfq.rfq_mode_id
LEFT JOIN pr_items pi on pi.pr_id = pr.id
WHERE
    rfq.rfq_no = '$rfq_no' and pr.stat != '17' ";

    $query = mysqli_query($conn, $sql);
    $data = [];

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
        $total = $row['abc'] * $row['qty'];
        $total += $total;
        $pr[] = $row['pr_no'];

       
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

        $data[] = [
            'id'            => $row['id'],
            'pr_no'         => implode(',',$pr),
            'rfq_no'        => $row['rfq_no'],
            'pr_date'       => date('d/m/Y', strtotime($row['pr_date'])),
            'rfq_date'      => date('d/m/Y', strtotime($row['rfq_date'])),
            'office'        => $office,
            'amount'        => number_format($total,2),
            'mode'          => $row['mode_of_proc_title'],
            'created_by'          => $row['submitted_by'],
            'particulars'          => $row['purpose']
        ];
    }
    return json_encode($data);
}
