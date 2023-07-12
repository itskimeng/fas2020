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

	$is_na['01'] = isset($isna['01']) ? 'y' : '';
	$is_na['02'] = isset($isna['02']) ? 'y' : '';
	$is_na['03'] = isset($isna['03']) ? 'y' : '';
	$is_na['04'] = isset($isna['04']) ? 'y' : '';
	$is_na['05'] = isset($isna['05']) ? 'y' : '';
	$is_na['06'] = isset($isna['06']) ? 'y' : '';
	$is_na['07'] = isset($isna['07']) ? 'y' : '';
	$is_na['08'] = isset($isna['08']) ? 'y' : '';
	$is_na['09'] = isset($isna['09']) ? 'y' : '';
	$is_na['10'] = isset($isna['10']) ? 'y' : '';
	$is_na['11'] = isset($isna['11']) ? 'y' : '';
	$is_na['12'] = isset($isna['12']) ? 'y' : '';

	$ra['1']=isset($rate[1]) ? $rate[1] : '';
	$ra['2']=isset($rate[2]) ? $rate[2] : '';
	$ra['3']=isset($rate[3]) ? $rate[3] : '';
	$ra['4']=isset($rate[4]) ? $rate[4] : '';
	$ra['5']=isset($rate[5]) ? $rate[5] : '';
	// $ra['6']=isset($rate[6]) ? $rate[6] : '';
	// $ra['7']=isset($rate[7]) ? $rate[7] : '';
	// $ra['8']=isset($rate[8]) ? $rate[8] : '';
	// $ra['9']=isset($rate[9]) ? $rate[9] : '';
	// $ra['10']=isset($rate[10]) ? $rate[10] : '';
	// $ra['11']=isset($rate[11]) ? $rate[11] : '';
	// $ra['12']=isset($rate[12]) ? $rate[12] : '';
	// $ra['13']=isset($rate[13]) ? $rate[13] : '';

	$rr['01'] = isset($rate[0]) ? $rate[0] : '';
	$rr['02'] = isset($rate[1]) ? $rate[1] : '';
	$rr['03'] = isset($rate[2]) ? $rate[2] : '';
	$rr['04'] = isset($rate[3]) ? $rate[3] : '';
	// $rr['05'] = isset($rate[4]) ? $rate[4] : '';
	// $rr['06'] = isset($rate[5]) ? $rate[5] : '';
	// $rr['07'] = isset($rate[6]) ? $rate[6] : '';
	// $rr['08'] = isset($rate[7]) ? $rate[7] : '';
	// $rr['09'] = isset($rate[8]) ? $rate[8] : '';
	// $rr['10'] = isset($rate[9]) ? $rate[9] : '';
	// $rr['11'] = isset($rate[10]) ? $rate[10] : '';
	// $rr['12'] = isset($rate[11]) ? $rate[11] : '';

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

for($i = 0; $i <= count($rr); $i++){
	$e['01'] = isset($ratee[$i][0]) ? $ratee[$i][0] : 'NA';
	$e['02'] = isset($ratee[$i][1]) ? $ratee[$i][1] : 'NA';
	$e['03'] = isset($ratee[$i][2]) ? $ratee[$i][2] : 'NA';
	$e['04'] = isset($ratee[$i][3]) ? $ratee[$i][3] : 'NA';
	$e['05'] = isset($ratee[$i][4]) ? $ratee[$i][4] : 'NA';
	$e['06'] = isset($ratee[$i][5]) ? $ratee[$i][5] : 'NA';
	$e['07'] = isset($ratee[$i][6]) ? $ratee[$i][6] : 'NA';
	$e['08'] = isset($ratee[$i][7]) ? $ratee[$i][7] : 'NA';
	$e['09'] = isset($ratee[$i][8]) ? $ratee[$i][8] : 'NA';
	$e['10'] = isset($ratee[$i][9]) ? $ratee[$i][9] : 'NA';
	$e['11'] = isset($ratee[$i][10]) ? $ratee[$i][10] : 'NA';
	$e['12'] = isset($ratee[$i][11]) ? $ratee[$i][11] : 'NA';

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
	$qms_manager->update_gap_analysis($dataGA);
	print_r($dataGA);
	echo "update GAP";
}
else
{
	print_r($dataGA);
	echo "remoove GAP";
	$qms_manager->remove_gap_analysis($dataGA);
}

// echo json_encode($rate);


// if ($is_admin) {
	// $qms_procedure->updateQMEByAdmin($data);
	// $qms_procedure->updateQMEByAdminCache($data);
// } else {
	// $qms_procedure->updateQME($data);
	// $qms_procedure->updateCache($data);
// }

// print_r($data);


header('location:../../qms_procedure_ob_entries.php?parent='.$parent.'&division='.$_SESSION['division'].'&id='.$qoe_id.'&entry_id='.$entry_id.'&auth=entry');
