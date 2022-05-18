
<?php
date_default_timezone_set('Asia/Manila');

require_once "../../../../Model/Connection.php";
require_once "../../../../Model/Procurement.php";

$id = $_POST['id'];
$count = 0;
$category = '';
$pr = new Procurement();


$pr->select(
    "pr
        LEFT JOIN tblemployeeinfo emp ON pr.username = emp.EMP_N 
        LEFT JOIN pr_items items ON pr.id = items.pr_id
        LEFT JOIN tbl_pr_status as ps on ps.id = pr.stat",
        "pr.id as id,
        pr.pmo as pmo,
        pr.stat as stat,
        pr.pr_no as 'pr_no',
        pr.canceled as 'canceled',
        pr.received_by as 'received_by',
        pr.submitted_by as 'submitted_by',
        pr.submitted_date as 'submitted_date',
        pr.received_date as 'received_date',
        pr.purpose as 'purpose',
        pr.pr_date as 'pr_date',
        pr.type as 'type',
        pr.target_date as 'target_date',
        pr.submitted_date_budget as 'submitted_date_budget',
        pr.budget_availability_status as 'budget_availability_status' ,
        pr.stat as 'stat',
        ps.REMARKS as 'status',
        pr.remarks,
        emp.UNAME as 'username',
        sum(abc*qty) as 'total_abc'",
        "YEAR(pr_date) = '2022' and pr.id != '" . $id . "' 
        GROUP BY pr.pr_no
        order by pr.pr_no desc"
);
$result1 = $pr->sql;
while ($row = mysqli_fetch_assoc($result1)) {
 $office = $row['pmo'];
            $fad = ['10', '11', '12', '13', '14', '15', '16'];
            $ord = ['1', '2', '3', '5'];
            $lgmed = ['7', '18', '7',];
            $lgcdd = ['8', '9', '17', '9'];
            $cavite = ['20', '34', '35', '36', '45'];
            $laguna = ['21', '40', '41', '42', '47', '51', '52'];
            $batangas = ['19', '28', '29', '30', '44'];
            $rizal = ['23', '37', '38', '39', '46', '50'];
            $quezon = ['22', '31', '32', '33', '48', '49', '53'];
            $lucena_city = ['24'];

            if (in_array($office, $fad)) {
                $office = 'FAD';
            } else if (in_array($office, $lgmed)) {
                $office = 'LGMED';
            } else if (in_array($office, $lgcdd)) {
                $office = 'LGCDD';
            } else if (in_array($office, $cavite)) {
                $office = 'CAVITE';
            } else if (in_array($office, $laguna)) {
                $office = 'LAGUNA';
            } else if (in_array($office, $batangas)) {
                $office = 'BATANGAS';
            } else if (in_array($office, $rizal)) {
                $office = 'RIZAL';
            } else if (in_array($office, $quezon)) {
                $office = 'QUEZON';
            } else if (in_array($office, $lucena_city)) {
                $office = 'LUCENA CITY';
            } else if (in_array($office, $ord)) {
                $office = 'ORD';
            }
            $btn = '<button type="button" class="btn btn-primary btn-sm" data-toggle="modal"  value="' . $row['id'] . '" data-target="#editItemModal" id="btn-edit"><i class="fa fa-edit"></i> </button>&nbsp;
                    <button type="button" class="btn btn-danger btn-sm" id="btn-delete-item" value="' . $row['id'] . '" ><i class="fa fa-trash"></i> </button></td>';


    $tr = '';
    $tr .= '<tr>';
    $tr .= '<td><input type="checkbox"/></td>';
    $tr .= '<td>' . $office . '</td>';
    $tr .= '<td>' . $row['pr_no'] . '</td>';
    $tr .= '<td></td>';
    $tr .= '<td></td>';
    $tr .= '<td></td>';
    $tr .= '<td></td>';
    $tr .= '<td></td>';
    $tr .= '<td style="width:11%;">';
    $tr .= $btn;
    $tr .= '</tr>';



    echo $tr;
}



?>
