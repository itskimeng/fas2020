<?php
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");

$burs = $_GET['burs_id'];
$data = [
    'burs' => $burs,
];


$lists = getBURSBreakDown($conn, $data);

echo $lists;


function getBURSBreakDown($conn, $ors)
{
    $sql = "SELECT * from saroobburs where burs = " . $ors['burs'] . "";
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
