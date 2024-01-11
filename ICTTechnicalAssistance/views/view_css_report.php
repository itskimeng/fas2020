<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
// include_once("../report/PHPJasperXML.inc.php");
include 'report/TA/PHPJasperXML.inc.php';
include 'connection.php';
include 'ICTTechnicalAssistance/controller/ICTController.php';


$PHPJasperXML = new PHPJasperXML();


foreach ($css_opts as $key => $data) {
    $PHPJasperXML->arrayParameter = array(
        "requested_by" => $data['requested_by'],
    );
}

$PHPJasperXML->load_xml_file("report/TA/pages/client_satisfaction_report.jrxml");
$PHPJasperXML->transferDBtoArray('localhost', 'fascalab_2020', 'w]zYV6X9{*BN', 'fascalab_2020');
$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file