<?php
date_default_timezone_set('Asia/Manila');
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");

$quarter_period = isset($_POST['quarter']) ? $_POST['quarter'] : "";
$covered_period = isset($_POST['month']) ? $_POST['month'] : "";

$monthly_data = fetch($conn, $covered_period);
if (isset($_POST['month'])) {
    echo $monthly_data;
}

function fetch($conn, $covered_period)
{

    $m = ['month' => $covered_period];


    $sql = "SELECT
            e.SEX_C AS 'gender',
            COUNT(e.SEX_C) AS 'count_gender'
        FROM
            tbltechnical_assistance ta
        LEFT JOIN tblemployeeinfo e ON
            e.EMP_N = ta.REQ_BY
        WHERE e.SEX_C in ('Female','Male') AND MONTH(ta.REQ_DATE) = '$covered_period' AND YEAR(ta.REQ_DATE) = 2023
        GROUP by e.SEX_C";
        $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $data[] = array(
            'gender' => $row['gender'],
            'count' => $row['count_gender'],
        );
    }

    return json_encode($data);
}
