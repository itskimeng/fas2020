<?php
date_default_timezone_set('Asia/Manila');
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");

$sn = $_POST['stock_n'];

$data = [
    'stock_number' => $sn,
];
$app = fetch($conn, $data);

echo $app;

function fetch($conn, $options)
{
    $sql = "SELECT
    app.id,
        pi.qty,
        pi.description,

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
    sn = '" . $options['stock_number'] . "'";

    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $data[$row['id']] = [
            'id' => $row['id'],
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
