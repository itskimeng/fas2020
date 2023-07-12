<?php
date_default_timezone_set('Asia/Manila');
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");

$covered_period = $_POST['month'];

$app = fetch($conn, $covered_period);

echo $app;

function fetch($conn, $covered_period)
{
   
    $cc = ['CC1', 'CC2', 'CC3'];
    $m = [ 'month' => $covered_period, ];


        $data = [];
        foreach ($cc as $item) {
            $sql = "SELECT EMP_ID, $item, COUNT('$item') AS '$item' FROM tbl_css_cliententry WHERE MONTH(DATE_RELEASED) = '".$m['month']."' GROUP BY $item";
            $query = mysqli_query($conn, $sql);
            while ($row = mysqli_fetch_assoc($query)) {
                $data[] = array(
                    'data' => $row[$item],
                );
            }
        }
    return json_encode($data);
}
