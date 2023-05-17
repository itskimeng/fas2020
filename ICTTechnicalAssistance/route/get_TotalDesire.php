<?php
date_default_timezone_set('Asia/Manila');
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");

$quarter_period = isset($_POST['quarter']) ? $_POST['quarter'] : "";
$covered_period = isset($_POST['month']) ? $_POST['month'] : "";

$monthly_data = fetchNoOfDesireRespondents($conn, $covered_period);
$quarter_data = fetchNoOfDesireRespondents($conn, $covered_period);
if(isset($_POST['month']))
{
    echo $monthly_data;
}else{
    echo $quarter_data;
}
function fetchNoOfDesireRespondents($conn, $covered_period)
{
    $m = ['month' => $covered_period,];


    $sql = "SELECT COUNT(*) AS total_desire_respondent FROM tbl_css_cliententry WHERE MONTH(DATE_RELEASED) = '" . $m['month'] . "' AND ( SQD0 IN (1, 2) AND SQD1 IN (1, 2) AND SQD2 IN (1, 2) AND SQD3 IN (1, 2) AND SQD4 IN (1, 2) AND SQD5 IN (1, 2) AND SQD6 IN (1, 2) AND SQD7 IN (1, 2) AND SQD8 IN (1, 2) )";
    $query = mysqli_query($conn, $sql);
    $data = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $data[] = array(
            'total_desire_repondent' => $row['total_desire_respondent']
        );
    }

    $sql1 = "SELECT count(*) as 'total_respondents' from tbl_css_cliententry where MONTH(`DATE_RELEASED`)  = '" . $m['month'] . "'";
    $query1 = mysqli_query($conn, $sql1);
    $data1 = [];
    while ($row = mysqli_fetch_assoc($query1)) {
        $data1 = array(
            'total_respondents' => $row['total_respondents']
        );
    }
    array_push($data, $data1);
    return json_encode($data);
}

function fetchNoOfDesireRespondentsQuarterly($conn, $quarter_period)
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

    $sql = "SELECT COUNT(*) AS total_desire_respondent FROM tbl_css_cliententry WHERE MONTH(DATE_RELEASED) IN $quarter_period AND ( SQD0 IN (1, 2) AND SQD1 IN (1, 2) AND SQD2 IN (1, 2) AND SQD3 IN (1, 2) AND SQD4 IN (1, 2) AND SQD5 IN (1, 2) AND SQD6 IN (1, 2) AND SQD7 IN (1, 2) AND SQD8 IN (1, 2) )";
    $query = mysqli_query($conn, $sql);
    $data = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $data[] = array(
            'total_desire_repondent' => $row['total_desire_respondent']
        );
    }

    $sql1 = "SELECT count(*) as 'total_respondents' from tbl_css_cliententry where MONTH(`DATE_RELEASED`) IN $quarter_period";
    $query1 = mysqli_query($conn, $sql1);
    $data1 = [];
    while ($row = mysqli_fetch_assoc($query1)) {
        $data1 = array(
            'total_respondents' => $row['total_respondents']
        );
    }
    array_push($data, $data1);
    return json_encode($data);
}

