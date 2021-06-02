<?php

//load.php

$connect = new PDO('mysql:host=localhost;dbname=fascalab_2020', 'fascalab_2020', 'w]zYV6X9{*BN');
$data = array();
$query = "SELECT * FROM events ORDER BY id";

$statement = $connect->prepare($query);

$statement->execute();

$result = $statement->fetchAll();

foreach($result as $row)
{
 $data[] = array(
  'id'   => $row["id"],
  'title'   => $row["title"],
  'start'   => $row["start"],
  'end'   => $row["end"]
 );
}

echo json_encode($data);

?>