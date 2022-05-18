<?php
date_default_timezone_set('Asia/Manila');
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");

$pr_no = $_POST['pr_no'];
$pr_id = $_POST['pr_id'];

$data = [
    'pr_no' => $pr_no,
    'pr_id' => $pr_id,
];
$pr = fetch($conn, $data);

echo $pr;

function fetch($conn, $options)
{
    $sql = "SELECT id,pr_no FROM pr WHERE id = '" . $options['pr_id'] . "' and pr_no = '".$options['pr_no']."'";

    $query = mysqli_query($conn, $sql);
    $data = [];
    if (mysqli_num_rows($query) > 0) {

    while ($row = mysqli_fetch_assoc($query)) {
        $data[$row['id']] = [
            'id' => $row['id'],
            'pr_no' => $row['pr_no'],
            
        ];
    }
    }else{
        $data = [
            'id' =>''
        ];
    }
    return json_encode($data);
}
