<?php
date_default_timezone_set('Asia/Manila');
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");

$covered_period = $_POST['month'];

$app = fetch($conn, $covered_period);

echo $app;

function fetch($conn, $covered_period)
{

    $m = ['month' => $covered_period,];


    $sd = ['SQD0', 'SQD1', 'SQD2', 'SQD3', 'SQD4', 'SQD5', 'SQD6', 'SQD7', 'SQD8'];
    $di = [5, 4, 3, 2, 1];

    $data = [];
    foreach ($sd as $item) {
        // $sql = "SELECT $item, count($item) as 'count' FROM `tbl_css_cliententry` where $item IN (5,4,3,2,1) and MONTH(DATE_RELEASED) = '".$m['month']."' GROUP BY $item ORDER BY $item desc";

        $sql = "SELECT
        d.RATING_SCALE AS DIMENSION,
        COALESCE(COUNT($item), 0) AS 'count'
    FROM
        (
        SELECT
            1 AS RATING_SCALE
        UNION ALL
        SELECT
            2 AS RATING_SCALE
        UNION ALL
        SELECT
            3 AS RATING_SCALE
        UNION ALL
        SELECT
            4 AS RATING_SCALE
        UNION ALL
        SELECT
            5 AS RATING_SCALE
        ) d
    LEFT JOIN tbl_css_cliententry t ON $item = d.RATING_SCALE AND month(t.DATE_RELEASED) IN ('4','5','6')
    LEFT JOIN tbl_dimensions td ON td.dimension = t.SQD0
    GROUP BY
        d.RATING_SCALE
    ORDER BY
        d.RATING_SCALE DESC;
    ";
        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = array(
                'dimension' => $item,
                'count_sd_entry' => $row['count']
            );
        }
    }
    return json_encode($data);
}
