<?php
date_default_timezone_set('Asia/Manila');
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");

$stock_number = $_GET['stock_number'];

$data = [
    'stock_number' => $stock_number
];
$app = checkDuplicateEntry($conn, $data);

echo $app;

function checkDuplicateEntry($conn, $options)
{
    $sql = "SELECT DISTINCT app.app_price,app.id,app.app_year,app.sn,app.code,ic.item_category_title,app.procurement,mop.mode_of_proc_title,pmo.pmo_title,sof.source_of_funds_title 
    FROM app
    LEFT JOIN item_category ic on ic.id = app.category_id 
    LEFT JOIN source_of_funds sof on sof.id = app.source_of_funds_id 
    LEFT JOIN pmo on pmo.id = app.pmo_id 
    LEFT JOIN mode_of_proc mop on mop.id = app.mode_of_proc_id 

    where sn = '".$options['stock_number']."'";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        
        $data[$row['id']] = [
            'id'  => $row['id'],
            'sn'  => $row['sn'],
            'year'      => $row['app_year'],
            'price'      => $row['app_price'],
            'item'      => $row['procurement'],
            'mode'      => $row['mode_of_proc_title'],
        ];
        
    }
    return json_encode($data);
}
