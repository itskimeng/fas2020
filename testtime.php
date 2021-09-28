
<?php
if(isset($_REQUEST['subject']) && $_REQUEST['subject'] != '')
{
  $subject     = $_REQUEST['subject'];
  $extraWhere  = "`ud`.`RECORD_N` LIKE '%" . $subject . "%' OR `ud`.`SUBJECT` LIKE '%".$subject."%' ";
}
if (isset($_REQUEST['start_date']) && $_REQUEST['start_date'] != '' && isset($_REQUEST['end_date']) && $_REQUEST['end_date'] != '') {
    $startdate   = $_REQUEST['start_date'];
    $enddate     = $_REQUEST['end_date'];
/*    echo json_encode($startdate);
    echo json_encode($enddate);*/
    $extraWhere  = "`ud`.`DATE` >= '" . $startdate . "' ";
    $extraWhere1 = " `ud`.`DATE` <= '" . $enddate . "' ";
    
}else {
    
    $extraWhere  = "";
    $extraWhere1 = "";
    $startdate = "";  
    $enddate = "";
    
}
if (isset($_REQUEST['start_date_routed']) && $_REQUEST['start_date_routed'] != '' && isset($_REQUEST['end_date_routed']) && $_REQUEST['end_date_routed'] != '') {
    $startdaterouted   = $_REQUEST['start_date_routed'];
    $enddaterouted     = $_REQUEST['end_date_routed'];
/*    echo json_encode($startdate);
    echo json_encode($enddate);*/
    $extraWhere4  = "`u`.`DATE_ROUTED` >= '" . $startdaterouted . "' ";
    $extraWhere5 = " `u`.`DATE_ROUTED` <= '" . $enddaterouted . "' ";
    
} else {
    
    $extraWhere4  = "";
    $extraWhere5 = "";
    $startdaterouted = "";  
    $enddaterouted = "";
    
}
if (isset($_REQUEST['last_routed']) && $_REQUEST['last_routed'] != '') {
    $lastrouted  = $_REQUEST['last_routed'];
    $extraWhere2 = "`u`.`ROUTED_TO` = '" . $lastrouted . "' ";
} else {
    $extraWhere2 = "";
    $lastrouted  = "";
}
if (isset($_REQUEST['last_routed_from']) && $_REQUEST['last_routed_from'] != '') {
    $lastroutedfrom  = $_REQUEST['last_routed_from'];
    $extraWhere3 = "`u`.`ROUTED_FROM` = '" . $lastroutedfrom . "' ";
} else {
    $extraWhere3 = "";
    $lastroutedfrom = "";
}


/*if ( isset($_REQUEST['end_date']) && $_REQUEST['end_date'] != '' ) {
$enddate = $_REQUEST['end_date'];
}  
else{
$enddate="";
}*/
// file_put_contents("request.log", var_export($_REQUEST));
/*
 * DataTables example server-side processing script.
 *
 * Please note that this script is intentionally extremely simply to show how
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
$table = 'tblrecords';

// Table's primary key
$primaryKey = 'RECORD_N';

// Array of database columns which should be read and sent back to DataTables.
// The `db` parameter represents the column name in the database, while the `dt`
// parameter represents the DataTables column identifier. In this case simple
// indexes
$columns = array(
    array(
        'db' => '`ud`.`blank_data_column`',
        'dt' => 0,
        'field' => 'blank_data_column'
    ),
    array(
        'db' => '`ud`.`RECORD_N`',
        'dt' => 1,
        'field' => 'RECORD_N'
    ),
    array(
        'db' => '`ud`.`SUBJECT`',
        'dt' => 2,
        'field' => 'SUBJECT'
    ),
    array(
        'db' => '`ud`.`TYPE`',
        'dt' => 3,
        'field' => 'TYPE'
    ),
    array(
        'db' => '`udg`.`SOURCE_N`',
        'dt' => 4,
        'field' => 'nmg'
    ),
    array(
        'db' => '`udh`.`CATEGORY_N`',
        'dt' => 5,
        'field' => 'nmh'
    ),
    array(
        'db' => '`ud`.`DATE`',
        'dt' => 6,
        'field' => 'DATE'
    ),
    array(
        'db' => '`u`.`DATE_ROUTED`',
        'dt' => 7,
        'field' => 'DATE_ROUTED'
    ),
    array(
        'db' => '`ude`.`DIVISION_N`',
        'dt' => 8,
        'field' => 'nme'
    ),
    array(
        'db' => '`udf`.`DIVISION_N`',
        'dt' => 9,
        'field' => 'nmf'
    ),
    array(
        'db' => '`u`.`ACTION`',
        'dt' => 10,
        'field' => 'ACTION'
    ),
    array(
        'db' => '`ud`.`STATUS`',
        'dt' => 11,
        'field' => 'STATUS'
    ),
     array(
        'db' => '`ud`.`blank_data_column`',
        'dt' => 12,
        'field' => 'blank_data_column'
    ),   
    array(
        'db' => '`ud`.`blank_data_column`',
        'dt' => 13,
        'field' => 'blank_data_column'
    ) ,
    array(
        'db' => '`ud`.`blank_data_column`',
        'dt' => 14,
        'field' => 'blank_data_column'
    )    
    /*  array( 'db' => '`u`.`start_da`', 'dt' => 7, 'field' => 'start_date', 'formatter' => function( $d, $row ) {
    return date( 'jS M y', strtotime($d));
    }),
    array('db'  => '`u`.`salary`',     'dt' => 8, 'field' => 'salary', 'formatter' => function( $d, $row ) {
    return '$'.number_format($d);
    })*/
);

// SQL server connection information
require('config.php');
$sql_details = array(
    'user' => $db_username,
    'pass' => $db_password,
    'db' => $db_name,
    'host' => $db_host
);


/* * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * * *
 * If you just want to use the basic configuration for DataTables with PHP
 * server-side, there is no need to edit below this line.
 */



// require( 'ssp.class.php' );
require('ssp.customized.class.php');


$joinQuery = "FROM `tblrecords` AS `ud` LEFT JOIN `tblrouting` AS `u` ON (`u`.`RECORD_N` = `ud`.`RECORD_N`) 
              LEFT JOIN  `tblpersonneldivision` AS `ude` ON (`u`.`ROUTED_TO` = `ude`.`DIVISION_N`)
              LEFT JOIN `tblpersonneldivision` AS `udf` ON ( `u`.`ROUTED_FROM` = `udf`.`DIVISION_N`) 
              LEFT JOIN `tblrecordsources` AS `udg` ON (`ud`.`SOURCE` = `udg`.`SOURCE_N`)
              LEFT JOIN `tblrecordcategory` AS `udh` ON (`ud`.`CATEGORY` = `udh`.`CATEGORY_N`)";

$groupBy = "`ud`.`RECORD_N`";


echo json_encode(SSP::simple($_GET, $sql_details, $table, $primaryKey, $columns, $joinQuery, $extraWhere,$extraWhere1 ,$extraWhere2, $extraWhere3, $extraWhere4, $extraWhere5, $groupBy));

die();