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

    $m = ['month' => $covered_period,];


    $sd = [1,2,3,4,5,6];

    $data = [];
    foreach ($sd as $item) {
        $ageCondition = " AND YEAR(CURDATE()) - YEAR(e.BIRTH_D) - (DATE_FORMAT(CURDATE(), '%m%d') < DATE_FORMAT(e.BIRTH_D, '%m%d'))";

        switch ($item) {
            case 1:
                $ageCondition .= " <= 18";
                break;
            case 2:
                $ageCondition .= " >= 25 AND " . $ageCondition . " <= 34";
                break;
            case 3:
                $ageCondition .= " >= 35 AND " . $ageCondition . " <= 44";
                break;
            case 4:
                $ageCondition .= " >= 45 AND " . $ageCondition . " <= 54";
                break;
            case 5:
                $ageCondition .= " >= 55 AND " . $ageCondition . " <= 64";
                break;
            case 6:
                $ageCondition .= " >= 65";
                break;
            default:
                // Handle invalid item value
                break;
        }
        
        // Use the $ageCondition in your query or further processing
        

        $sql = "SELECT
               count(*) as 'count'
            FROM
                `tbl_css_cliententry` tc
            LEFT JOIN tbltechnical_assistance ta ON
                ta.ID = tc.TA_ID
            LEFT JOIN tblemployeeinfo e ON
                e.EMP_N = ta.REQ_BY
            WHERE
                MONTH(tc.DATE_RELEASED) = $covered_period $ageCondition
                
            ORDER BY age";
            echo $sql;

        $query = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = array(
                'count' => $row['count'],
            );
        }
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

        $sql = "";
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
