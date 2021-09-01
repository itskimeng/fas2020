<?php

require 'conn.php';
require 'manager/ORSManager.php';
require 'ORS/views/paginator.class.php';

$pages = new Paginator;
$pages->default_ipp = 15;
$sql_forms = $conn->query("SELECT * FROM saroob where IS_GSS != 'FROM GSS' and YEAR(datereceived) = '2021' group by ors  ORDER BY `saroob`.`date` DESC");

$pages->items_total = $sql_forms->num_rows;
$pages->mid_range = 9;
$pages->paginate();


$ors = new ORSManager();

$data = $ors->getORSdata($pages->limit);
// $burs = $ors->getBURSdata();
$filter_ors = $ors->setORS();
$filter_payee = $ors->setPayee();
$filter_po = $ors->setPO();
$avl_code = $ors->getCodeFromGSS();
$ors_gss = $ors->getDataFromGSS();

// STAT
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
        $sql = "SELECT count(*) as 'count' from saroob where status = '$stat' ";
        $query = mysqli_query($conn, $sql);
        $result = $row = mysqli_fetch_assoc($query);
        $data1[$stat] = $row['count'];
    }

    return $data1;
}






















?>
