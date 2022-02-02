<?php
$pr = $_POST['pr_no'];

$result = fetchStatusHistory($pr);
echo $result;
function fetchStatusHistory($pr)
{
    $conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
        $data = [];

        $sql = "SELECT
                ph.id AS 'id',
                stat.REMARKS as 'remarks',
                ph.ACTION_DATE as 'action_date',
                ph.PR_NO as 'pr_no',
                emp.LAST_M as 'lastname',
                emp.FIRST_M as 'firstname',
                emp.MIDDLE_M as 'middlename',
                pr.purpose as 'purpose',
                emp.UNAME as 'username'

                from tbl_pr_history as ph 
                LEFT JOIN pr as pr ON pr.pr_no = ph.pr_no
                LEFT JOIN tblemployeeinfo as emp ON emp.EMP_N = ph.ASSIGN_EMP
                LEFT JOIN tbl_pr_status as stat ON stat.ID = ph.ACTION_TAKEN
                WHERE pr.pr_no = '$pr' 
                ORDER BY action_date desc";
                 $query = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($query)) {
        
                    $data[] = [
                        'id' => $row['id'],
                        'status' => $row['remarks'],
                        'action_date' => date('F d, Y',strtotime($row['action_date'])),
                        'assign_employee' => $row['firstname'].''.$row['middlename'].''.$row['lastname'],
                        'username' => $row['username'],
                        'pr_no' => $row['pr_no'],
                        'purpose' => $row['purpose'],
                    ];
                }
                return json_encode($data);
            }
