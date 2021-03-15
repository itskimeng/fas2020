<?php
date_default_timezone_set('Asia/Manila');
$username = $_SESSION['username'];
$userid = $_SESSION['currentuser'];

$pid = isset($_GET['parent']) ? $_GET['parent'] : '';
$seiri_show = $seiton_show = $seiso_show = $ltab_show = $form_submitted = false;
$post_comment = '';

$is_driver = isDriver($userid);

$drivers_criterias = fetchDriversCriteria();


$has_data = fetchCurrentUserData($userid);
$is_friday = isFriday();

$fetchData = fetchSort();
$fetchAll = fetchAll($userid);

if (!empty($pid)) {
	$fetchData1 = fetchSortEditForm($pid, $userid);
	if ($is_driver) {
		$fetchEditFormData = fetchDriverFEE($pid);
	} else {
		$fetchEditFormData = fetchFEE($pid);
	}
	
	if (!empty($pid) AND $is_driver) {
		$ltab_show = true;
	} elseif (!empty($pid) AND isset($fetchEditFormData['S1']) AND isset($fetchEditFormData['S2']) AND isset($fetchEditFormData['S3'])) {
		$ltab_show = true;
	} elseif (!empty($pid) AND isset($fetchEditFormData['S1']) AND isset($fetchEditFormData['S2']) AND !isset($fetchEditFormData['S3'])) {
		$seiso_show = true;
	} elseif (!empty($pid) AND isset($fetchEditFormData['S1']) AND !isset($fetchEditFormData['S2']) AND !isset($fetchEditFormData['S3'])) {
		$seiton_show = true;
	} else {
		$seiri_show = true;
	}

	$form_submitted = $fetchData1['status'] == 'Completed' ? true : false;
	$post_comment = $fetchData1['comments'];
}


function isDriver($id) {
	$drivers = [2956, 2954, 3239, 3242, 3321];
	$checker = false;
	if (in_array($id, $drivers)) {
		$checker = true;
	}

	return $checker;
}

function fetchSort() {
	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$types = ['S1', 'S2', 'S3'];
	$data = [];
	foreach ($types as $type) {
		$sql = "SELECT * FROM fives_particulars WHERE type = '$type'";
		$query = mysqli_query($conn, $sql);	
		
		while ($row = mysqli_fetch_assoc($query)) {
		    $data[$type][] = [
		    	'id' => $row['id'],
		    	'particulars' => $row['particulars']
		    ];
		}
	}

	return $data;
}

function fetchDriversCriteria() {
	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$data = [];
	
	$sql = "SELECT * FROM fives_particulars WHERE type = 'Drivers'";
	$query = mysqli_query($conn, $sql);	
	
	while ($row = mysqli_fetch_assoc($query)) {
		if (!empty($row['parent'])) {
			$child[$row['id']] = [
		    	'id' => $row['id'],
		    	'particulars' => $row['particulars']
		    ];

			$data[$row['parent']]['childs'] = $child;
		} else {
		    $data[$row['id']] = [
		    	'id' => $row['id'],
		    	'particulars' => $row['particulars'],
		    	'childs' => ''
		    ];
		}
	}

	return $data;
}

function fetchAll($user) {
	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$data = [];
	
	$sql = "SELECT 
		fe.id, 
		CONCAT(te.FIRST_M, ' ', te.LAST_M)  as emp_name,
		fe.emp_id as emp_id, 
		tp.DIVISION_M as division,
		tbl_desg.DESIGNATION_M as position,
		fe.status, 
		DATE_FORMAT(fe.date_created, '%Y-%m-%d') as date_created, 
		DATE_FORMAT(fe.date_submitted, '%Y-%m-%d') as date_submitted, 
		fe.seiri, 
		fe.seiton, 
		fe.seiso,
		fe.total 
		FROM fives_employees fe
	    LEFT JOIN tblemployeeinfo te on te.EMP_N = fe.emp_id
		LEFT JOIN tblpersonneldivision tp on tp.DIVISION_N = te.DIVISION_C
	    LEFT JOIN tbldesignation tbl_desg on tbl_desg.DESIGNATION_ID = te.DESIGNATION";

	$query = mysqli_query($conn, $sql);	
	$drivers = [2956, 2954, 3239, 3242, 3321];
		
	while ($row = mysqli_fetch_assoc($query)) {
		$has_access = false;
		$is_driver = false;
		if ($user == $row['emp_id']) {
			$has_access = true;
		}

		if (in_array($row['emp_id'], $drivers)) {
			$is_driver = true;
		}


		$total = $row['total'];
		if (!$is_driver) {
			$total = $row['seiri'] + $row['seiton'] + $row['seiso'];
		}
	    $data[] = [
	    	'id' => $row['id'],
	    	'emp_name' => $row['emp_name'],
	    	'division' => $row['division'],
	    	'status' => $row['status'],
	    	'position' => $row['position'],
	    	'date_created' => $row['date_created'],
	    	'date_submitted' => $row['date_submitted'],
	    	'seiri' => $row['seiri'],
	    	'seiton' => $row['seiton'],
	    	'seiso' => $row['seiso'],
	    	'total' => $total,
	    	'has_access' => $has_access,
	    	'is_driver' => $is_driver
	    ];
	}

	return $data;	
}

function fetchCurrentUserData($id) {
	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$data = true;
	$today = new DateTime();
	$today_from = $today->format('Y-m-d 00:00:00');
	$today_to = $today->format('Y-m-d 23:59:59');
	
	$sql = "SELECT * FROM fives_employees WHERE emp_id = $id AND date_submitted >= '".$today_from."' AND date_submitted <= '".$today_to."'";

	$query = mysqli_query($conn, $sql);	
	$data = $query->num_rows;

	if ($data == 0) {
		$data = false;
	}

	return $data;	
}

function isFriday() {
	$today = new DateTime();
	$today = $today->format('D');
	
	$checker = false;
	if ($today == 'Fri') {
		$checker = true;
	}

	return $checker;	
}

function fetchSortEditForm($id='', $currentuser) {
	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$data = [];
	
	$sql = "SELECT id, emp_id, status, DATE_FORMAT(date_created, '%Y-%m-%d %H:%i:%s') as date_created, DATE_FORMAT(date_submitted, '%Y-%m-%d %H:%i:%s') as date_submitted, seiri, seiton, seiso, total, comments FROM fives_employees WHERE id = $id";

	$query = mysqli_query($conn, $sql);	
		
	while ($row = mysqli_fetch_assoc($query)) {
		$has_access = false;
		if ($row['emp_id'] == $currentuser) {
			$has_access = true;
		}
	    $data = [
	    	'id' => $row['id'],
	    	'emp_id' => $row['emp_id'],
	    	'date_created' => $row['date_created'],
	    	'date_submitted' => $row['date_submitted'],
	    	'seiri_subtotal' => $row['seiri'],
	    	'seiton_subtotal' => $row['seiton'],
	    	'seiso_subtotal' => $row['seiso'],
	    	'total' => $row['total'],
	    	'status' => $row['status'],
	    	'comments' => $row['comments'],
	    	'has_access' => $has_access
	    ];
	}

	return $data;
}

function fetchFEE($id) {
	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$types = ['S1', 'S2', 'S3'];
	$data = [];
	foreach ($types as $type) {
		$sql = "SELECT fee.id, fp.type, fee.fsp_id, fee.fsid, fee.score, fee.comments FROM fives_employees_entry fee
		LEFT JOIN fives_particulars fp on fp.id = fee.fsid 
		WHERE fee.fsp_id = $id AND fp.type = '$type'";

		$query = mysqli_query($conn, $sql);	
		while ($row = mysqli_fetch_assoc($query)) {
		    $data[$type][$row['fsid']] = [
		    	'id' => $row['id'],
		    	'fsp_id' => $row['fsp_id'],
		    	'fsid' => $row['fsid'],
		    	'score' => $row['score'],
		    	'comments' => $row['comments'],
		    ];
		}
	}
	
	return $data;
}

function fetchDriverFEE($id) {
	$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
	$sql = "SELECT fee.id, fp.type, fee.fsp_id, fee.fsid, fee.score, fee.comments, fp.parent 
	FROM fives_employees_entry fee
	LEFT JOIN fives_particulars fp on fp.id = fee.fsid 
	WHERE fee.fsp_id = $id AND fp.type = 'Drivers'";

	$query = mysqli_query($conn, $sql);	
	while ($row = mysqli_fetch_assoc($query)) {

		if (!empty($row['parent'])) {
			$child[$row['fsid']] = [
		    	'id' => $row['id'],
		    	'fsp_id' => $row['fsp_id'],
		    	'fsid' => $row['fsid'],
		    	'score' => $row['score'],
		    	'comments' => $row['comments']
		    ];

			$data[$row['parent']]['childs'] = $child;
		} else {
		    $data[$row['fsid']] = [
			    'id' => $row['id'],
		    	'fsp_id' => $row['fsp_id'],
		    	'fsid' => $row['fsid'],
		    	'score' => $row['score'],
		    	'comments' => $row['comments'],
		    	'childs' => ''
		    ];
		}
	    // $data[$row['fsid']] = [
	    // 	'id' => $row['id'],
	    // 	'fsp_id' => $row['fsp_id'],
	    // 	'fsid' => $row['fsid'],
	    // 	'score' => $row['score'],
	    // 	'comments' => $row['comments'],
	    // ];
	}

	// print_r($data);
	// die();

	
	return $data;
}








