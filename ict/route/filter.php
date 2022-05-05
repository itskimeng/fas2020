<?php
date_default_timezone_set('Asia/Manila');
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");

$quarter = $_GET['quarter'];
$year = $_GET['year'];
$data = [
    'quarter' => $quarter,
    'year' => $year
];
$lists = filterTable($conn, $data);

echo $lists;

function filterTable($conn, $options)
{
    $sql = "SELECT * from tbltechnical_assistance where";

    if ($options['quarter'] == 1) {
        $sql .= " MONTH(REQ_DATE) IN ('1','2','3') and YEAR(REQ_DATE) = '".$options['year']."' ";
    }else if($options['quarter'] == 2)
    {
        $sql .= " MONTH(REQ_DATE) IN ('4','5','6') and YEAR(REQ_DATE) = '".$options['year']."' ";

    }else if($options['quarter'] == 3)
    {
        $sql .= " MONTH(REQ_DATE) IN ('7','8','9') and YEAR(REQ_DATE) = '".$options['year']."' ";
        
    }else if($options['quarter'] == 4)
    {
        $sql .= " MONTH(REQ_DATE) IN ('10','11','12') and YEAR(REQ_DATE) = '".$options['year']."' ";
        
    }
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        
        $data[$row['ID']] = [
                'id'                => $row['ID'],
                'control_no'        => $row['CONTROL_NO'],
                'start_date'        => date('M d, Y', strtotime($row['START_DATE'])),
                'start_time'        => date('g:i:A', strtotime($row['START_TIME'])),
                'completed_date'    => date('M d, Y',strtotime($row['COMPLETED_DATE'])),
                'complete_time'     => date('g:i:A', strtotime($row['COMPLETED_TIME'])),
                'req_by'            => $row['REQ_BY'],
                'office'            => $row['OFFICE'],
                'issue_problem'     => $row['ISSUE_PROBLEM'],
                'type_req'          => $row['TYPE_REQ'],
                'assist_by'         => $row['ASSIST_BY'],
                'status_request'    => $row['STATUS_REQUEST'],
        ];
    }
    return json_encode($data);
}
