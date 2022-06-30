
<?php
date_default_timezone_set('Asia/Manila');

require_once "../../../../Model/Connection.php";
require_once "../../../../Model/Procurement.php";

$id = $_POST['id'];
$pr_data = isset($_POST['stat']) ? $_POST['stat'] : "";


$count = 0;
$category = '';
$pr = new Procurement();


$pr->select(
    "pr_items pi
        LEFT JOIN app on app.id = pi.items 
        LEFT JOIN item_unit item on item.id = pi.unit",
    "pi.id,
        pi.qty,
        pi.qty * app.app_price  as 'total_abc',
        pi.abc,
        pi.description, 
        item.item_unit_title, 
        app.procurement,
        app.app_price,
        app.sn as stock_number",
    "pi.pr_id = '" . $id . "' "
);
$result1 = $pr->sql;
while ($row = mysqli_fetch_assoc($result1)) {
    if ($pr_data >= 1) {
        $btn = '<button disabled type="button" class="btn btn-primary btn-sm" data-toggle="modal"  value="' . $row['stock_number'] . '" data-target="#editItemModal" id="btn-edit"><i class="fa fa-edit"></i> </button>&nbsp;
                <button disabled type="button" class="btn btn-danger btn-sm" id="btn-delete-item" value="' . $row['id'] . '" ><i class="fa fa-trash"></i> </button></td>';
    } else {
        $btn = '<button type="button" class="btn btn-primary btn-sm" data-toggle="modal"  value="' . $row['stock_number'] . '" data-target="#editItemModal" id="btn-edit"><i class="fa fa-edit"></i> </button>&nbsp;
                <button type="button" class="btn btn-danger btn-sm" id="btn-delete-item" value="' . $row['id'] . '" ><i class="fa fa-trash"></i> </button></td>';
    }



    $tr = '';
    $tr .= '<tr>';
    $tr .= '<td>' . $row['stock_number'] . '</td>';
    $tr .= '<td>' . $row['item_unit_title'] . '</td>';
    $tr .= '<td>' . $row['procurement'] . '</td>';
    $tr .= '<td>' . $row['description'] . '</td>';
    $tr .= '<td>' . $row['qty'] . '</td>';
    $tr .= '<td>' . $row['abc'] . '</td>';
    $tr .= '<td>' . $row['total_abc'] . '</td>';
    $tr .= '<td style="width:11%;">';
    $tr .= $btn;
    $tr .= '</tr>';



    echo $tr;
}



?>
