<?php

require 'conn.php';
require 'manager/BURSManager.php';
require 'ORS/views/paginator.class.php';

$pages = new Paginator;
$pages->default_ipp = 15;
$sql_forms = $conn->query("SELECT * FROM saroob 
group by ponum desc ORDER BY `saroob`.`date` DESC");
$pages->items_total = $sql_forms->num_rows;
$pages->mid_range = 9;
$pages->paginate();


$burs = new BURSManager();

$data = $burs->getBURSdata($pages->limit);
// $burs = $burs->getBURSdata();

$filter_burs = $burs->setBURS();
// $filter_payee = $burs->setPayee();
// $filter_po = $burs->setPO();

$avl_code = $burs->getCodeFromGSS();
$burs_gss = $burs->getDataFromGSS();


$count_status = countStatusORS($conn);

$total_count['FROM GSS'] = $count_status['FROM GSS'];
$total_count['FOR RECEIVING'] = $count_status['FOR RECEIVING'];
$total_count['OBLIGATED'] = $count_status['OBLIGATED'];
$total_count['RETURN'] = $count_status['RETURN'];
$total_count['RELEASED'] = $count_status['RELEASED'];

function countStatusORS($conn)
{
    $val = ['FROM GSS', 'FOR RECEIVING', 'OBLIGATED', 'RETURN', 'RELEASED'];


    $data1 = array();
    foreach ($val as $key => $stat) {
        $sql = "SELECT count(*) as 'count' from saroobburs where status = '$stat' ";
        $query = mysqli_query($conn, $sql);
        $result = $row = mysqli_fetch_assoc($query);
        $data1[$stat] = $row['count'];
    }

    return $data1;
}























?>
