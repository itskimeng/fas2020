<?php
date_default_timezone_set('Asia/Manila');

require_once "../../../../../Model/Connection.php";
require_once "../../../../../Model/Procurement.php";
if(isset($_POST['supplier_id']))
{
    $supplier_id = $_POST['supplier_id'];

}else{
    $supplier_id = '';
}
    $id = $_POST['pr_id'];
    $rfq_no      = $_POST['rfq'];
    $rid = $_POST['rid'];

    $suppliers   = count(explode(",",$supplier_id));
    $data_id     = explode(',',$supplier_id);
    
    $category = '';
    $pr = new Procurement();

    $pr->select("rfq",
    "rfq_no,COUNT(*) as multiple",
    "rfq_no = '$rfq_no'");
    $result1 = $pr->sql;
        
    while ($row = mysqli_fetch_assoc($result1)) {
        $is_multiple = ($row['rfq_no'] == '' || $row['rfq_no'] == null) ? true : 1;
    }
    if($is_multiple)
    {
        $pr->select(
            "pr_items i
            LEFT JOIN app a ON a.id = i.items
            LEFT JOIN pr p ON p.id = i.pr_id
            LEFT JOIN rfq r ON p.id = r.pr_id",
            "p.id, a.id as 'app_id', a.procurement, i.description,(i.qty * abc) AS 'total_abc'",
            "r.rfq_no='".$rfq_no."' "
        );
    }else{
        $pr->select(
            "pr_items i
            LEFT JOIN app a ON a.id = i.items
            LEFT JOIN pr p ON p.id = i.pr_id
            LEFT JOIN rfq r ON p.id = r.pr_id",
            "p.id, a.id as 'app_id', a.procurement, i.description,(i.qty * abc) AS 'total_abc'",
            "p.id = '".$id."'  ");
    }

   
    $result1 = $pr->sql;
    $pr->select(
        "supplier s
        LEFT JOIN supplier_quote sq 
        ON sq.supplier_id = s.id",
        "s.id, sq.ppu",
        "rfq_id = '$rid' GROUP BY sq.id"
    );
    $supplier_res = $pr->sql;

    while ($row = mysqli_fetch_assoc($supplier_res)) {
        $count = mysqli_num_rows($supplier_res);
        $sid[]= $row['id'];
    }


    while ($row = mysqli_fetch_assoc($result1)) {
        $count = mysqli_num_rows($result1);
        $tr = '';
        $tr .= '<tr>';
        $tr .= '<td>'.wordwrap($row['procurement'],15,"\n",TRUE).'</td>';

        $tr .= '<td hidden><input type="text" class="form-control supplier0" value="'.$row['app_id'].'" name="app_id[]"  ></td>';
        $tr .= '<td style="width:10%;"><b>₱ '.number_format($row['total_abc'],2).'</b></td>';
    echo $tr;

    }

    
    

    


?>