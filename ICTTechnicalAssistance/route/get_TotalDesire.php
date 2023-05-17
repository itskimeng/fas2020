<?php
date_default_timezone_set('Asia/Manila');
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
$covered_period = $_POST['month'];
$app = fetchNoOfDesireRespondents($conn, $covered_period);
echo $app;

function fetchNoOfDesireRespondents($conn,$covered_period)
{
    $m = [ 'month' => $covered_period, ];

    $sql = "SELECT
    COUNT(*) AS total_desire_respondent
FROM
    tbl_css_cliententry
WHERE
    MONTH(DATE_RELEASED) = '".$m[' MONTH ']."' 
    AND (
        SQD0 IN (1, 2)
        OR SQD1 IN (1, 2)
        OR SQD2 IN (1, 2)
        OR SQD3 IN (1, 2)
        OR SQD4 IN (1, 2)
        OR SQD5 IN (1, 2)
        OR SQD6 IN (1, 2)
        OR SQD7 IN (1, 2)
        OR SQD8 IN (1, 2)
    )
";
        $query = mysqli_query($conn, $sql);
        $data = [];
        while ($row = mysqli_fetch_assoc($query)) {
            $data[] = array(
                'total_desire_repondent' => $row['total_desire_repondent']
            );            
        }

        $sql1 = "SELECT count(*) as 'total_respondents' from tbl_css_cliententry where MONTH(`DATE_RELEASED`)  = '".$m['month']."'";
        $query1 = mysqli_query($conn, $sql1);
        $data1 = [];
        while ($row = mysqli_fetch_assoc($query1)) {
            $data1 = array(
                'total_respondents' => $row['total_respondents']
            );
        }
        array_push($data,$data1);
    return json_encode($data); 
}
// function fetchTotalRespondents($conn,$covered_period)
// {
//     $m = [ 'month' => $covered_period, ];

//         $sql = "SELECT count(*) as 'total_respondents' from tbl_css_cliententry where MONTH(`DATE_RELEASED`)  = '".$m['month']."'";
//         $query = mysqli_query($conn, $sql);
//         $data = [];
//         while ($row = mysqli_fetch_assoc($query)) {
//             $data = array(
//                 'total_respondents' => $row['total_respondents']
//             );
//         }
    
//         return json_encode($data); 
//     }
