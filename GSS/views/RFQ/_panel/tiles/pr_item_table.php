
<?php
date_default_timezone_set('Asia/Manila');

require_once "../../../../../Model/Connection.php";
require_once "../../../../../Model/Procurement.php";

    $id = $_POST['id'];
    $count = 0;
    $category = '';
    $pr = new Procurement();


    $pr->select(
        "pr
        LEFT JOIN pr_items as items ON pr.id = items.pr_id",
        "pr.id,pr.pr_no,sum(items.abc*items.qty) as 'total_abc',pr.pmo,type,purpose",
        "pr.id IN (".$id.") GROUP BY pr.pr_no
        order by pr.id desc"
    );
    $result1 = $pr->sql;
    while ($row = mysqli_fetch_assoc($result1)) {
        $office = $row['pmo'];
        $type= $row['type'];
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
        }else{
            $office = '~';
        }

        if ($type == "0") {
            $type = "";
        }
        if ($type == "1") {
            $type = "Catering Services";
        }
        if ($type == "2") {
            $type = "Meals, Venue and Accommodation";
        }
        if ($type == "3") {
            $type = "Repair and Maintenance";
        }
        if ($type == "4") {
            $type = "Supplies, Materials and Devices";
        }
        if ($type == "5") {
            $type = "Other Services";
        }
        if ($type == "6") {
            $type = "Reimbursement and Petty Cash";
        }
            $btn = '<button type="button" class="btn btn-primary btn-sm" data-toggle="modal"  value="'.$row['id'].'" data-target="#editItemModal" id="btn-edit"><i class="fa fa-edit"></i> </button>&nbsp;
                    <button type="button" class="btn btn-danger btn-sm" id="btn-delete-item" value="'.$row['id'].'" ><i class="fa fa-trash"></i> </button></td>';
        

        $tr = '';
        $tr .= '<tr>';
        $tr .= '<td>'.$row['pr_no'].'</td>';
        $tr .= '<td>'.$row['total_abc'].'</td>';
        $tr .= '<td>'.$office.'</td>';
        $tr .= '<td>'.$type.'</td>';
        $tr .= '<td>'.$row['purpose'].'</td>';
        
        
        
        echo $tr;
    }


 
?>
