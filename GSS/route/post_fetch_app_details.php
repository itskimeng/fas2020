<?php
date_default_timezone_set('Asia/Manila');
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");

$app_item = $_POST['item'];

$data = [
    'item' => $app_item
];
$item = fetch($conn, $data);

echo $lists;

function fetch($conn, $options)
{
    $sql = "SELECT * from APP where procurement = '".$options['item']."'";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        
        $data[$row['id']] = [
            'id'  => $row['id'],
            'sn'  => $row['sn'],
            'code'      => $row['code'],
            'year'      => $row['app_year'],
            'category'      => $row['item_category_title'],
            'procurement'      => $row['procurement'],
            'pmo_title'      => $row['pmo_title'],
            'mode'      => $row['mode_of_proc_title'],
            'source'      => $row['source_of_funds_title'],
        ];
    }
    return json_encode($data);
}
