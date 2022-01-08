<?php
date_default_timezone_set('Asia/Manila');
$conn = mysqli_connect("localhost", "fascalab_2020", "w]zYV6X9{*BN", "fascalab_2020");

$office = $_GET['office'];
$category = $_GET['category'];
$year = $_GET['year'];

$data = [
    'office' => $office,
    'category' => $category,
    'year' => $year
];
$lists = filterApplicants($conn, $data);

echo $lists;

function filterApplicants($conn, $options)
{
    $sql = "SELECT DISTINCT app.id,app.app_year,app.sn,app.code,ic.item_category_title,app.procurement,mop.mode_of_proc_title,pmo.pmo_title,sof.source_of_funds_title 
    FROM app
    LEFT JOIN item_category ic on ic.id = app.category_id 
    LEFT JOIN source_of_funds sof on sof.id = app.source_of_funds_id 
    LEFT JOIN pmo on pmo.id = app.pmo_id 
    LEFT JOIN mode_of_proc mop on mop.id = app.mode_of_proc_id 
    where
  ";

    if (!empty($options['office'])) {
        $sql .= " pmo_title = '" . $options['office'] . "'";
       
    }
     if (!empty($options['category'])) {
        $sql .= " AND item_category_title = '" . $options['category'] . "'";

    }  if (!empty($options['year'])) {
        $sql .= " AND app_year = '" . $options['year'] . "'";
    }
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
