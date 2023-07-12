<?php
date_default_timezone_set('Asia/Manila');
session_start();

require_once '../../Model/Connection.php';
require_once '../../Model/QMSProcedure.php';
require_once '../manager/QMSManager.php';

$qms_procedure = new QMSProcedure();
$qms_manager = new QMSManager();


$is_admin = $qms_manager->fetchAdmins($_SESSION['currentuser']);
$parent = isset($_GET['parent']) ? $_GET['parent'] : '';
$qoe_id = isset($_GET['qoe_id']) ? $_GET['qoe_id'] : '';
$qme_id = isset($_GET['id']) ? $_GET['id'] : '';
$rate = isset($_GET['rate']) ? $_GET['rate'] : '';
$isna = isset($_GET['is_na']) ? $_GET['is_na'] : '';
$created_by = $_SESSION['currentuser'];
$entry_id = isset($_GET['entry_id']) ? $_GET['entry_id'] : ''; 
$indicator = isset($_GET['indicator']) ? $_GET['indicator'] : '';
$year = isset($_GET['year']) ? $_GET['year'] : '';

//GAP ANALYSIS
$idGA = isset($_GET['idGA']) ? $_GET['idGA'] : '';
$is_gap_analysis = isset($_GET['switch_objective_indicator']) ? ($_GET['switch_objective_indicator'] == 'on' ? 1 : 0) : 0;
$gap_analysis = isset($_GET['gap_analysis']) ? $_GET['gap_analysis'] : '';

// print_r($_GET);
// exit();
// print_r($qme_id);
// exit();
$is_na['01'] = isset($isna['01']) ? 'y' : '';
$is_na['02'] = isset($isna['02']) ? 'y' : '';
$is_na['03'] = isset($isna['03']) ? 'y' : '';
$is_na['04'] = isset($isna['04']) ? 'y' : '';

$ra['1'] = isset($rate[1]) ? $rate[1] : '';
$ra['2'] = isset($rate[2]) ? $rate[2] : '';
$ra['3'] = isset($rate[3]) ? $rate[3] : '';
$ra['4'] = isset($rate[4]) ? $rate[4] : '';
$ra['5'] = isset($rate[5]) ? $rate[5] : '';

$rr['01'] = isset($rate[0]) ? $rate[0] : '';
$rr['02'] = isset($rate[1]) ? $rate[1] : '';
$rr['03'] = isset($rate[2]) ? $rate[2] : '';
$rr['04'] = isset($rate[3]) ? $rate[3] : '';

$id['0'] = isset($qme_id[0]) ? $qme_id[0] : $qme_id[4]-4;
$id['1'] = isset($qme_id[1]) ? $qme_id[1] : $qme_id[4]-3;
$id['2'] = isset($qme_id[2]) ? $qme_id[2] : $qme_id[4]-2;
$id['3'] = isset($qme_id[3]) ? $qme_id[3] : $qme_id[4]-1;
$id['4'] = isset($qme_id[4]) ? $qme_id[4] : '';


$ind = array();
$ratee = array();
foreach($ra as $key => $val){
	$ind[] = $key;
	$ratee[] = $val;
};

//DATA
for ($i = 0; $i <= count($rr); $i++){
	$e['01'] = isset($ratee[$i][0]) ? $ratee[$i][0] : '';
	$e['02'] = isset($ratee[$i][1]) ? $ratee[$i][1] : '';
	$e['03'] = isset($ratee[$i][2]) ? $ratee[$i][2] : '';
	$e['04'] = isset($ratee[$i][3]) ? $ratee[$i][3] : '';

	$data = [
	'id' => $id[$i],
	'rate' => json_encode($e),
	'is_na' => json_encode($is_na),
	'author' => $created_by,
	'indicator' => $ind[$i],
	'year' => $year,
	'qoe_id' => $qoe_id];
	print_r($data);
	$qms_procedure->updateQMEByAdmin($data);
	$qms_procedure->updateQMEByAdminCache($data);
	$qms_procedure->updateQME($data);
	$qms_procedure->updateCache($data);

}

$dataGA = [
	'qop_id'			=>	$entry_id,
	'qoe_id'			=>	$qoe_id,
	'is_gap_analysis'	=>	$is_gap_analysis,
	'gap_analysis'		=>	$gap_analysis
];

// $qms_manager->update_gap($dataGA);

if ($is_gap_analysis == 0) 
{
	print_r($dataGA);
	echo "update GAP";
	$qms_manager->update_gap_analysis($dataGA);

}
else
{
	print_r($dataGA);
	echo "remove GAP";
	$qms_manager->remove_gap_analysis($dataGA);
}

exit();
	// print_r($data);
	// echo count($data);
	// // for ($i=0; $i <= count($data) ; $i++) { 
	// // 	print_r( $data[$i]);
	// // }
	// exit();
	// foreach($data1 as $key =>$data){
		

	// }



// echo json_encode($ratee);
// print_r($ratee);
// echo json_encode($ratee);


// $data = [
// 	'id'		=> $qme_id, 
// 	'rate' 		=> json_encode($rr),
// 	'is_na' 	=> json_encode($is_na),
// 	'author' 	=> $created_by,
// 	'indicator' => $indicator,
// 	'year' 		=> $year,
// 	'qoe_id' 	=> $qoe_id
// ];

// print_r($data);
// $qms_procedure->updateQMEByAdmin($data);
// $qms_procedure->updateQMEByAdminCache($data);
// $qms_procedure->updateQME($data);
// $qms_procedure->updateCache($data);

// print_r($data);
// exit();



// header('location:../../qms_procedures_objective.php?parent='.$parent.'&division='.$_SESSION['division'].'&id='.$qoe_id);
header('location:../../qms_procedure_ob_entries.php?parent='.$parent.'&division='.$_SESSION['division'].'&id='.$qoe_id.'&entry_id='.$entry_id.'&auth=entry');
