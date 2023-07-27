<?php
date_default_timezone_set('Asia/Manila');
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");

$quarter_period = isset($_POST['quarter']) ? $_POST['quarter'] : "";
$covered_period = isset($_POST['month']) ? $_POST['month'] : "";

$monthly_data = fetch($conn, $covered_period);
$quarter_data = fetchQuarterData($conn, $quarter_period);
if (isset($_POST['month'])) {
    echo $monthly_data;
} else {
    echo $quarter_data;
}

function fetch($conn, $covered_period)
{

    $m = ['month' => $covered_period];


    $sql = "SELECT age_bracket_table.age_bracket, IFNULL(count_table.count, 0) AS count FROM ( SELECT 'Under 18' AS age_bracket UNION SELECT '18-24' UNION SELECT '25-34' UNION SELECT '35-44' UNION SELECT '45-54' UNION SELECT '55-64' UNION SELECT '65 and over' ) AS age_bracket_table LEFT JOIN ( SELECT CASE WHEN YEAR(CURDATE()) - YEAR(e.BIRTH_D) - (DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(e.BIRTH_D, '%m%d')) < 18 THEN 'Under 18' WHEN (YEAR(CURDATE()) - YEAR(e.BIRTH_D) - (DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(e.BIRTH_D, '%m%d'))) BETWEEN 18 AND 24 THEN '18-24' WHEN (YEAR(CURDATE()) - YEAR(e.BIRTH_D) - (DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(e.BIRTH_D, '%m%d'))) BETWEEN 25 AND 34 THEN '25-34' WHEN (YEAR(CURDATE()) - YEAR(e.BIRTH_D) - (DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(e.BIRTH_D, '%m%d'))) BETWEEN 35 AND 44 THEN '35-44' WHEN (YEAR(CURDATE()) - YEAR(e.BIRTH_D) - (DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(e.BIRTH_D, '%m%d'))) BETWEEN 45 AND 54 THEN '45-54' WHEN (YEAR(CURDATE()) - YEAR(e.BIRTH_D) - (DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(e.BIRTH_D, '%m%d'))) BETWEEN 55 AND 64 THEN '55-64' WHEN (YEAR(CURDATE()) - YEAR(e.BIRTH_D) - (DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(e.BIRTH_D, '%m%d'))) >= 65 THEN '65 and over' ELSE 'Unknown' END AS age_bracket, COUNT(*) AS count FROM `tbltechnical_assistance` ta LEFT JOIN tblemployeeinfo e ON e.EMP_N = ta.REQ_BY WHERE MONTH(ta.REQ_DATE) = '$covered_period' AND YEAR(ta.REQ_DATE) = 2023 GROUP BY age_bracket ) AS count_table ON age_bracket_table.age_bracket = count_table.age_bracket; ";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $data[] = array(
            'agebracket' => $row['age_bracket'],
            'count' => $row['count'],
        );
    }

    return json_encode($data);
}
function fetchQuarterData($conn, $quarter_period)
{


    $quarterRanges = array(
        1 => "('1','2','3')",
        2 => "('4','5','6')",
        3 => "('7','8','9')",
        4 => "('10','11','12')"
    );

    if (isset($quarterRanges[$quarter_period])) {
        $quarter_period = $quarterRanges[$quarter_period];
    } else {
        // Handle the case if an invalid quarter period is received
        // For example, set a default value or show an error message
        // You can modify this part based on your requirements
        $quarter_period = "('1','2','3')";
    }

    // Use $quarter_period in your SQL query or other code logic


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
    LEFT JOIN tbl_css_cliententry t ON $item = d.RATING_SCALE AND month(t.DATE_RELEASED) IN $quarter_period
    LEFT JOIN tbl_dimensions td ON td.dimension = t.SQD0
    GROUP BY d.RATING_SCALE ORDER BY d.RATING_SCALE DESC";
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
