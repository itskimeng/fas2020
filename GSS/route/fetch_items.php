<?php
date_default_timezone_set('Asia/Manila');
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");

$pr_no = $_POST['pr_no'];

$data = [
    'pr_no' => $pr_no,
];
$app = fetch($conn, $data);

echo $app;

function fetch($conn, $options)
{
    $sql = "
            SELECT 
            pi.id,
            pi.qty,
            pi.abc,
            pi.description, 
            item.item_unit_title, 
            app.procurement,
            app.app_price,
            app.sn as stock_number
            FROM pr_items pi 
            LEFT JOIN app on app.id = pi.items 
            LEFT JOIN item_unit item on item.id = pi.unit
            WHERE pr_no = '" . $options['pr_no'] . "'";

    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $data[$row['id']] = [
            'id' => $row['id'],
            'items' => $row['procurement'],
            'description' => $row['description'],
            'unit' => $row['item_unit_title'],
            'qty' => $row['qty'],
            'abc' => $row['abc'],
            'total' => $row['app_price'],
            'stock_number' => $row['stock_number']
        ];
    }
    return json_encode($data);
}
