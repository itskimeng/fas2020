<?php
date_default_timezone_set('Asia/Manila');
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");

$pr_id = $_POST['pr_id'];

$item = [
    'pr_id' => $pr_id,
];
$pr = fetch($conn, $item);

echo $pr;

function fetch($conn, $options)
{
    $sql = "SELECT * FROM pr where id = '".$options['pr_id']."'";

    $query = mysqli_query($conn, $sql);
    $data = [];
    while ($row = mysqli_fetch_assoc($query)) {
        $data[$row['id']] = [
            'id' => $row['id'],
            'pr_no' => $row['pr_no'],
            'pr_date' => $row['pr_date'],
            'target_date' => $row['target_date'],
            'purpose' => $row['purpose'],
            'type' => $row['type'],
            'office' => $row['pmo'],
            
        ];
    }
    return json_encode($data);
}
