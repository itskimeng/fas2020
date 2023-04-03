<?php
date_default_timezone_set('Asia/Manila');
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");

$covered_period = $_POST['month'];

$app = fetch($conn, $covered_period);

echo $app;

function fetch($conn, $covered_period)
{
   
    $m = [ 'month' => $covered_period, ];


    $sd = ['SQD0', 'SQD1','SQD2', 'SQD3','SQD4','SQD5','SQD6','SQD7','SQD8'];
    $data = [];
    foreach ($sd as $item) {
        $sql = "SELECT $item, count($item) as 'count' FROM `tbl_css_cliententry` where $item IN (5,4,3,2,1) and MONTH(DATE_RELEASED) = '".$m['month']."' GROUP BY $item ORDER BY $item desc";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = array(
                'count_sd_entry' => $row['count']
            );
        }
    }
    return json_encode($data);
}

