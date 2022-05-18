
<?php
// 1. End-user copy all selected pr items.
date_default_timezone_set('Asia/Manila');
require_once "../../Model/Connection.php";
require_once "../../Model/Procurement.php";
$id = $_POST['id'];
$pr_id = $_POST['pr_id'];
$pr_no = $_POST['pr_no'];
$pr = new Procurement();


$pr->select(
    "pr_items",
    "*",
    "id IN  (" . $id . ")"
);
$result1 = $pr->sql;
if (mysqli_num_rows($result1) == 0) {
} else {
    while ($row = mysqli_fetch_assoc($result1)) {
        $pr->insert(
            'pr_items',
            [
                'id' => null,
                'pr_id' => $pr_id,
                'pr_no' => $pr_no,
                'items' => $row['items'],
                'description' => $row['description'],
                'unit' => $row['unit'],
                'qty' => $row['qty'],
                'abc' => $row['abc'],
                'date_a' => date('Y-m-d h:m:s'),
                'flag' => 1
            ]
        );
    }
}


?>
