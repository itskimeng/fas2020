<?php 
require_once 'dashboard_tiles/manager/Dashboard.php'; 
date_default_timezone_set('Asia/Manila');
session_start();

if (isset($_SESSION['username'])) {
	$username = $_SESSION['username'];
	$ip = $_SERVER['REMOTE_ADDR'];
	$details = json_decode(file_get_contents("http://ipinfo.io/{$ip}/json"));
	$location = $details->city;
	$date_now = date('Y-m-d');
	$time_now = (new DateTime('now'))->format('H:i');


	$dashboard = new Dashboard();


	//---------------------------------------EVENTS START--------------------------------------------
		$events = $dashboard->getCalendarEvents();
	//---------------------------------------EVENTS END----------------------------------------------

	//---------------------------------------DTR START-----------------------------------------------
		// $logs = $dashboard->getDtr($_SESSION['username'], $date_now, '""');

		// $data = [
		// 	'emp_id' => $_SESSION['username'],
		// 	'date_now' => $date_now,
		// 	'time_now' => $time_now,
		// 	'wf_arrangement' => $_POST['wf_arrangement']
		// ];

		// if (isset($_POST['stamp1'])) 
		// {

		// 	if (count($logs) > 0) 
		// 	{
		// 		$dashboard->updateDtr($data, 'time_in');
		// 	}
		// 	else
		// 	{
		// 		$dashboard->insertDtr($data, 'time_in');
		// 	}
		  
		// }


		// if (isset($_POST['stamp2'])) {

		// 	if (count($logs) > 0) 
		// 	{
		// 		$dashboard->updateDtr($data, 'lunch_in');
		// 	}
		// 	else
		// 	{
		// 		$dashboard->insertDtr($data, 'lunch_in');
		// 	}
		// }

		// if (isset($_POST['stamp3'])) {

		// 	if (count($logs) > 0) 
		// 	{
		// 		$dashboard->updateDtr($data, 'lunch_out');
		// 	}
		// 	else
		// 	{
		// 		$dashboard->insertDtr($data, 'lunch_out');
		// 	}
		// }

		// if (isset($_POST['stamp4'])) {

		// 	if (count($logs) > 0) 
		// 	{
		// 		$dashboard->updateDtr($data, 'time_out');
		// 	}
		// 	else
		// 	{
		// 		$dashboard->insertDtr($data, 'time_out');
		// 	}
		// }

		//  $check1 = $dashboard->getDtr($_SESSION['username'], $date_now, 'time_in');
		// $check2 = $dashboard->getDtr($_SESSION['username'], $date_now, 'lunch_in');
		// $check3 = $dashboard->getDtr($_SESSION['username'], $date_now, 'lunch_out');
		// $check4 = $dashboard->getDtr($_SESSION['username'], $date_now, 'time_out');

	//---------------------------------------DTR END-------------------------------------------------



	//---------------------------------------ANNOUNCEMENT START--------------------------------------
		if (isset($_POST['submit'])) 
		{

			$division = $dashboard->selectDivision($_POST['posted_by']);
			
			$data = [
				'title' => $_POST['title'],
				'content' => $_POST['content'],
				'posted_by' => $_POST['posted_by'],
				'date' => $_POST['posted_date'],
				'division' => $division['DIVISION_M']
			];
			
			$dashboard->insertAnnouncement($data);

		}

		if (isset($_POST['update'])) 
		{
			$data = [
				'title' => $_POST['title'],
				'content' => $_POST['content'],
				'idC' => $_POST['idC']
			];

			$dashboard->updateAnnouncement($data);
		}

		$announcements = $dashboard->getAnnouncements();
	//---------------------------------------ANNOUNCEMENT END----------------------------------------


	//---------------------------------------EMPLOYEES START----------------------------------------
		$employees = $dashboard->getEmployees();
		$overviews = $dashboard->getOverviews();
		$regional = $dashboard->getRegionalOfficeTotal();
		$batangas = $dashboard->getProvinces('Batangas');
		$cavite = $dashboard->getProvinces('Cavite');
		$laguna = $dashboard->getProvinces('Laguna');
		$rizal = $dashboard->getProvinces('Rizal');
		$quezon = $dashboard->getProvinces('Quezon');
		$lucena = $dashboard->getProvinces('Lucena');

		$colors = ['ORD'=>"#3c8dbc", 'FAD'=>"#f56954", 'LGCDD'=>"#00a65a", 'LGMED'=>"#ac8686", 'LGCDD-MBTRG'=>"#69b0ac", 'LGMED-PDMU'=>"#b7c718"];

		$colors2 = ['Male'=>"#b85b50", 'Female'=>"#ca3928"];
		$colors3 = ['Male'=>"#3b5998", 'Female'=>"#25478f", 'total'=>'#003199'];

		$rodepreg = ['Male'=>"#3c8dbc", 'Female'=>"#f56954"];
		$rodepcon = ['Male'=>"#dfc6c6", 'Female'=>"#8fddd8"];

		$regreg = ['Male'=>"#dd4b39", 'Female'=>"#b85b50"];
		$regcon = ['Male'=>"#d5e347", 'Female'=>"#b2be35", 'total'=>'#959505'];

		$batreg = ['Male'=>"#0de030", 'Female'=>"#0cb528", 'total'=>'#087f1c'];
		$batcon = ['Male'=>"#06cdc1", 'Female'=>"#03aca2", 'total'=>'#06837c'];

		$cavreg = ['Male'=> "#ffa500", 'Female'=>"#d38b06", 'total'=>'#b77908'];
		$cavcon = ['Male'=> "#dd4b39", 'Female'=>"#b73d2e", 'total'=>'#923024'];

		$lagreg = ['Male'=> "#3ac0bd", 'Female'=>"#0d9694", 'total'=>'#11ceca'];
		$lagcon = ['Male'=> "#c84c77", 'Female'=>"#ed86aa", 'total'=>'#c68ca0'];

		$rizalreg = ['Male'=> "#e98f39", 'Female'=>"#df9f62", 'total'=>'#cca077'];
		$rizalcon = ['Male'=> "#c4504d", 'Female'=>"#ed7c78", 'total'=>'#ce231f'];

		$quezreg = ['Male'=> "#acc0c4", 'Female'=>"#9ab2b7", 'total'=>'#a39b9b'];
		$quezcon = ['Male'=> "#5e9aca", 'Female'=>"#5280a6", 'total'=>'#3184a7'];
		#5e9aca', '#84c3f6

		$lucreg = ['Male'=> "#e98f39", 'Female'=>"#df9f62", 'total'=>'#f6b06e'];
		$luccon = ['Male'=> "#48c449", 'Female'=>"#19d11b", 'total'=>'#49a74a'];
	//---------------------------------------EMPLOYEES END----------------------------------------


	//---------------------------------------PROCUREMENT START--------------------------------------
		$procurements = $dashboard->getProcurements();
	//---------------------------------------PROCUREMENT END----------------------------------------


	//---------------------------------------OBLIGATION START--------------------------------------
		$obligations = $dashboard->getObligations();
	//---------------------------------------OBLIGATION END----------------------------------------


	//---------------------------------------ISSUANCES START--------------------------------------
		$issuances = $dashboard->getIssuances();
	//---------------------------------------ISSUANCES END----------------------------------------


	//------------------------------------------DV START------------------------------------------
		$dvs = $dashboard->getDv();
	//------------------------------------------DV END--------------------------------------------


	//---------------------------------------PAYMENT START--------------------------------------
		$payments = $dashboard->getPayments();
	//---------------------------------------PAYMENT END----------------------------------------



	//---------------------------------------BIRTHDAY START--------------------------------------
		$birthdays = $dashboard->getBirthday();
		
	//---------------------------------------BIRTHDAY END----------------------------------------

	// -------------------------------------- PROCUREMENT ----------------------------------------
	$report_opts['total_catering_serv'] = $dashboard->fetchReportInfo(1,'');
    $report_opts['total_mva_serv']      = $dashboard->fetchReportInfo(2,'');
    $report_opts['total_repair_serv']   = $dashboard->fetchReportInfo(3,'');
    $report_opts['total_smd_serv']      = $dashboard->fetchReportInfo(4,'');
    $report_opts['total_other_serv']    = $dashboard->fetchReportInfo(5,'');
    $report_opts['total_rpc_serv']      = $dashboard->fetchReportInfo(6,'');

    $report_opts['fad_catering_serv'] = $dashboard->fetchReportInfo(1,10);
    $report_opts['fad_mva_serv']      = $dashboard->fetchReportInfo(2,10);
    $report_opts['fad_repair_serv']   = $dashboard->fetchReportInfo(3,10);
    $report_opts['fad_smd_serv']      = $dashboard->fetchReportInfo(4,10);
    $report_opts['fad_other_serv']    = $dashboard->fetchReportInfo(5,10);
    $report_opts['fad_rpc_serv']      = $dashboard->fetchReportInfo(6,10);

    $report_opts['lgcdd_catering_serv'] = $dashboard->fetchReportInfo(1,8);
    $report_opts['lgcdd_mva_serv']      = $dashboard->fetchReportInfo(2,8);
    $report_opts['lgcdd_repair_serv']   = $dashboard->fetchReportInfo(3,8);
    $report_opts['lgcdd_smd_serv']      = $dashboard->fetchReportInfo(4,8);
    $report_opts['lgcdd_other_serv']    = $dashboard->fetchReportInfo(5,8);
    $report_opts['lgcdd_rpc_serv']      = $dashboard->fetchReportInfo(6,8);

    $report_opts['lgmed_catering_serv'] = $dashboard->fetchReportInfo(1,7);
    $report_opts['lgmed_mva_serv']      = $dashboard->fetchReportInfo(2,7);
    $report_opts['lgmed_repair_serv']   = $dashboard->fetchReportInfo(3,7);
    $report_opts['lgmed_smd_serv']      = $dashboard->fetchReportInfo(4,7);
    $report_opts['lgmed_other_serv']    = $dashboard->fetchReportInfo(5,7);
    $report_opts['lgmed_rpc_serv']      = $dashboard->fetchReportInfo(6,7);

    $report_opts['ord_catering_serv'] = $dashboard->fetchReportInfo(1,1);
    $report_opts['ord_mva_serv']      = $dashboard->fetchReportInfo(2,1);
    $report_opts['ord_repair_serv']   = $dashboard->fetchReportInfo(3,1);
    $report_opts['ord_smd_serv']      = $dashboard->fetchReportInfo(4,1);
    $report_opts['ord_other_serv']    = $dashboard->fetchReportInfo(5,1);
    $report_opts['ord_rpc_serv']      = $dashboard->fetchReportInfo(6,1);

	$pr_summary_opts['fad'] 		  = $dashboard->countPRperDivision(10);
    $pr_summary_opts['lgcdd'] 	      = $dashboard->countPRperDivision(8);
    $pr_summary_opts['lgmed'] 		  = $dashboard->countPRperDivision(7);
    $pr_summary_opts['ord'] 		  = $dashboard->countPRperDivision(1);
	// =========================== RANKINGS =================
	$pr_rank = $dashboard->getPRRank();

	// -----------------------------END --------------------------------------------
	// --------------------------SUPPLIER RANKINGS ---------------------------------
	$supplier_rank					  = $dashboard->supplier_ranking();
	// --------------------------end -----------------------------------------------
	$ict							  = $dashboard->fetchICTRequest();

	// header('location: home.php?division=$division["DIVISION_M"]'); 	
} else {
    header('Location:../index.php');
}