<?php
$procurement = $_GET['procurement'];

$result = fetchEvents($procurement);
echo $result;
function fetchEvents($param1)
{

    $conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");
    $data = [];

    $sql = "SELECT
                 app.id,
                app.unit_id,
                iu.item_unit_title,
                price,
                sn,
                price,
                procurement,
                iu.item_unit_title as 'unit',
                app_year
            FROM
                app
            LEFT join item_unit iu on app.unit_id = iu.id
            WHERE app.id = '" . $param1 . "' ";
    $query = mysqli_query($conn, $sql);
    while ($row = mysqli_fetch_assoc($query)) {
        $data = array(
            'id' => $row['id'],
            'price' => $row['price'],
            'sn' => $row['sn'],
            'procurement' => $row['procurement'],
            'unit_id' => $row['item_unit_title'],
            'app_year' => $row['app_year']
        );
          
    }
    return json_encode($data);
}
