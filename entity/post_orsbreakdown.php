<?php
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");

$ors = $_GET['ors_id'];
$data = [
    'ors' => $ors,
];


$lists = getORSBreakDown($conn, $data);

echo $lists;


function getORSBreakDown($conn, $ors)
{
    $sql = "SELECT * from saroob where ors = " . $ors['ors'] . "";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $data[$row['id']] = [
            'id' => $row['id'],
            'saronumber' => $row['saronumber'],
            'ppa' => $row['ppa'],
            'uacs' => $row['uacs'],
            'amount' => $row['amount'],
            'status' => $row['status'],
        ];
    }
    return json_encode($data);
}
