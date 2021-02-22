<?php
session_start();
date_default_timezone_set("Asia/Manila");

$con=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");

$return_arr = array();	
$name = $_SESSION['username'];
$division  = $_SESSION['division'];
$complete_name = $_SESSION['complete_name'];
// ===============================================================================
$query = "SELECT * from tblemployeeinfo ";

$result = mysqli_query($con,$query);
if($row = mysqli_fetch_array($result))
{
    $division = $row['DIVISION_C'];
	$uname    = $row['UNAME'];
	
	
	
		$fieldsName = '`ID`, `CONTROL_NO`, `REQUESTED_DATE`, `REQUESTED_TIME`, `REQUESTED_BY`, `OFFICE`, `POSITION`, `MOBILE_NO`, `CATEGORY`, `PURPOSE`, `ATTACHMENT`, `RECEIVED_DATE`, `RECEIVED_TIME`, `POSTED_DATE`, `POSTED_TIME`, `POSTED_BY`, `REMARKS`, `CONFIRMED_DATE`, `CONFIRMED_TIME`, `CONFIRMED_BY`, `APPROVED_BY`, `STATUS`';
		$table = 'tblwebposting';
		$join = '';
		$WHERE = '';
		// $WHERE = "WHERE `REQ_DATE` != '0000-00-00'";
	

	
    // }else{
	// 	$fieldsName = '`DIVISION_N`, `DIVISION_M`, `DIVISION_COLOR`, `DIVISION_LONG_M`, `D_GROUP`, `GROUP_N`, `PGROUP_N`';
	// 	$table = 'tblpersonneldivision';
	// 	$join = 'INNER JOIN tbltechnical_assistance on tblpersonneldivision.DIVISION_M = tbltechnical_assistance.OFFICE';
	// 	$WHERE = "WHERE tbltechnical_assistance.REQ_BY = '$complete_name'";
	// }
}

/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simple to show how
 * server-side processing can be implemented, and probably shouldn't be used as
 * the basis for a large complex system. It is suitable for simple use cases as
 * for learning.
 *
 * See http://datatables.net/usage/server-side for full details on the server-
 * side processing requirements of DataTables.
 *
 * @license MIT - http://datatables.net/license_mit
 */
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * Easy set variables
 */
// DB table to use






				
// Table's primary key
$primaryKey = 'ID';
// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$division  = $_SESSION['division'];

$columns = array(
	array('db' => 'CONTROL_NO',
	 'dt' => 0),
	array(
        'db'        => 'PURPOSE',
        'dt'        => 1,
        ),
        array(
            'db'        => 'POSTED_DATE',
            'dt'        => 2,
            'formatter' => function( $d, $row ) {
                return '<center>'.date( 'M d, Y', strtotime($d)).'</center>';
            })



);
// SQL server connection information
$sql_details = array(
	'user' => 'fascalab_2020',
	'pass' => 'w]zYV6X9{*BN',
	'db'   => 'fascalab_2020',
	'host' => 'localhost'

);
/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */
require('ssp.class.php');
echo json_encode(
	SSP::simple($_GET, $sql_details,$fieldsName, $table,$join, $primaryKey, $columns,$WHERE)
);
