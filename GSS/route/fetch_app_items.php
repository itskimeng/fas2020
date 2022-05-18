<?php
date_default_timezone_set('Asia/Manila');
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");

$sn = $_POST['stock_n'];
$pr_id = $_POST['pr_id'];

$data = [
    'stock_number' => $sn,
    'pr_id' => $pr_id,
];
$app = fetch($conn, $data);

echo $app;

function fetch($conn, $options)
{
    $sql = "SELECT
    app.id,
        pi.qty,
        pi.description,
        pi.items,
        pi.id as item_id,

    app.unit_id,
    iu.item_unit_title,
    price,
    sn,
    price,
    procurement,
    iu.item_unit_title AS 'unit',
    app_year
FROM
    app
LEFT JOIN item_unit iu ON app.unit_id = iu.id
left JOIN pr_items pi on pi.items = app.id
WHERE
    sn = '" . $options['stock_number'] . "' and pr_id = '".$options['pr_id']."'";

    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $data[$row['id']] = [
            'id' => $row['item_id'],
            'item' => $row['items'],
            'price' => $row['price'],
            'sn' => $row['sn'],
            'qty' => $row['qty'],
            'desc' => $row['description'],
            'procurement' => $row['procurement'],
            'unit_id' => $row['item_unit_title'],
            'unit' => $row['unit_id'],
            'app_year' => $row['app_year']
        ];
    }
    return json_encode($data);
}
