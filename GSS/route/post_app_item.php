<?php

$result = fetchEvents();
echo $result;
function fetchEvents()
{

    $conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
    $data = [];

    $sql = "SELECT  id,price,sn,price,procurement,unit_id,app_year from app where app_year = 2022 and procurement = '" . $_POST['procurement'] . "' ";

    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $data = array(
            'id' => $row['id'],
            'price' => $row['price'],
            'sn' => $row['sn'],
            'procurement' => $row['procurement'],
            'unit_id' => $row['unit_id'],
            'app_year' => $row['app_year']
        );
          
    }
    return json_encode($data);
}
