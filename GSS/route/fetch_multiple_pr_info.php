<?php
$pr_no = $_GET['pr_no'];

$result = fetchPRInfo($pr_no);
echo $result;
function fetchPRInfo($pr_no)
{

    $conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
    $data = [];
    foreach ($pr_no as $key => $value) {
       
    
    $sql = "SELECT
                pr.purpose,
                pr.pr_no,
                SUM(i.qty * i.abc) AS 'total_abc'
            FROM
                pr
            LEFT JOIN pr_items i ON
                pr.pr_no = i.pr_no
            WHERE
                pr.pr_no =   '".$value."' ";
    }
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $data = array(
            'purpose' => $row['pr_no'].': '.$row['purpose'],
            'amount' => $row['total_abc']
        );
    }
    return json_encode($data);
}
