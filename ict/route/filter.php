<?php
date_default_timezone_set('Asia/Manila');
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");

$quarter = $_GET['quarter'];
$year = $_GET['year'];
$data = [
    'quarter' => $quarter,
    'year' => $year
];
$division = $_GET['division'];

$lists = filterTable($conn, $data,"",$division);

echo $lists;

function filterTable($conn, $options,$action,$division)
{
    $sqla = "SELECT * from tbltechnical_assistance where MONTH(REQ_DATE) IN ('7','8','9') and YEAR(REQ_DATE) = '".$options['year']."' ORDER BY CONTROL_NO desc";
    $sql = "SELECT * from tbltechnical_assistance where";

    if ($options['quarter'] == 1) {
        $sql .= " MONTH(REQ_DATE) IN ('1','2','3') and YEAR(REQ_DATE) = '".$options['year']."' ORDER BY CONTROL_NO desc";
    }else if($options['quarter'] == 2)
    {
        $sql .= " MONTH(REQ_DATE) IN ('4','5','6') and YEAR(REQ_DATE) = '".$options['year']."' ORDER BY CONTROL_NO desc ";

    }else if($options['quarter'] == 3)
    {
        $sql .= " MONTH(REQ_DATE) IN ('7','8','9') and YEAR(REQ_DATE) = '".$options['year']."' ORDER BY CONTROL_NO desc";
        
    }else if($options['quarter'] == 4)
    {
        $sql .= " MONTH(REQ_DATE) IN ('10','11','12') and YEAR(REQ_DATE) = '".$options['year']."' ORDER BY CONTROL_NO desc ";
        
    }
    $query = mysqli_query($conn, $sqla);
    while ($row = mysqli_fetch_assoc($query)) {
        
        if ($row['STATUS_REQUEST'] == 'Submitted') {

            if ($division== 10) {
              $action = '';
              $action = '<a class = "btn btn-info btn-xs"  id = "view" style = "width:100%;" > <i class="fa" >&#xf06e;</i>&nbsp;View</a>';


            } else {
              $action = '';
              $action = '<a class = "btn btn-danger btn-xs"  id = "delete" style = "width:100%;"> <i class="fa fa-trash"></i>Delete</a>';

            }
          } else if ($row['STATUS_REQUEST'] == 'Received') {
            $action = '<a href = "processing.php?division='+$division+'&ticket_id=" class = "btn btn-info btn-xs"   style = "width:100%;">Assign</a>';
            $action = '<a class = "btn btn-danger btn-xs"  id = "delete" style = "width:100%;"> <i class="fa fa-trash"></i>Delete</a>';
          } else if ($row['STATUS_REQUEST'] == 'For action') {
            $action = '<a class = "btn btn-info btn-xs"  id = "view" style = "width:100%;" > <i class="fa" >&#xf06e;</i>&nbsp;View</a>';
            $action = '<a class = "btn btn-danger btn-xs"  id = "delete" style = "width:100%;"> <i class="fa fa-trash"></i>Delete</a>';
          } else if ($row['STATUS_REQUEST'] == 'Completed') {
            if ($division == 10) {
              if ($row['STATUS_REQUEST'] == 'Submitted') {
                $action = '';
              } else {
                $action = '<a class = "btn btn-info btn-xs"  id = "view" style = "width:100%;" > <i class="fa" >&#xf06e;</i>&nbsp;View</a>';
                $action = '<a class = "btn btn-success btn-xs"  id = "edit" style = "width:100%;"> <i class="fa info-circle"></i>Resolve</a>';
                $action = '<a class = "btn btn-danger btn-xs"  id = "delete" style = "width:100%;"> <i class="fa fa-trash"></i>Delete</a>';

              }
            } else {
              $action = '<a class = "btn btn-success btn-xs"  id = "sweet-15" style = "width:100%;"> <i class="fa fa-star" aria-hidden="true"></i>&nbsp;Rate Service</a>';
              $action = '<a class = "btn btn-danger btn-xs"  id = "delete" style = "width:100%;"> <i class="fa fa-trash"></i>Delete</a>';
            }
          } else if ($row['STATUS_REQUEST'] == 'Rated') {
            if ($division == 10) {
              $action = '<a class = "btn btn-info btn-xs"  id = "view" style = "width:100%;" > <i class="fa" >&#xf06e;</i>&nbsp;View</a>';
              $action = '<a class = "btn btn-success btn-xs"  id = "edit" style = "width:100%;"> <i class="fa info-circle"></i>Resolve</a>';

            }
          } else {
            $action = '';
          }
        $data[$row['ID']] = [
                'id'                => $row['ID'],
                'control_no'        => $row['CONTROL_NO'],
                'start_date'        => date('M d, Y', strtotime($row['START_DATE'])),
                'start_time'        => date('g:i:A', strtotime($row['START_TIME'])),
                'completed_date'    => date('M d, Y',strtotime($row['COMPLETED_DATE'])),
                'complete_time'     => date('g:i:A', strtotime($row['COMPLETED_TIME'])),
                'req_by'            => $row['REQ_BY'],
                'office'            => $row['OFFICE'],
                'issue_problem'     => wordwrap($row['ISSUE_PROBLEM'], 25, "<br>\n", TRUE),
                'type_req'     => wordwrap($row['TYPE_REQ'], 10, "<br>\n", TRUE),
                'assist_by'         => $row['ASSIST_BY'],
                'status_request'    => $row['STATUS_REQUEST'],
                'quality'    => $row['QUALITY'],
                'action' => $action


        ];
    }
    return json_encode($data);
}
