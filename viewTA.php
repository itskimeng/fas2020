<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
// include_once("../report/PHPJasperXML.inc.php");
include 'report/TA/PHPJasperXML.inc.php';
include 'controller/TechnicalAssistanceController.php';
include 'ict/views/functions.php';

$PHPJasperXML = new PHPJasperXML();


foreach ($view_req as $key => $data) {
    if (in_array($data['subtype_request'], $data)) {
        $subtype = setSubRequest($data['subtype_request']);
        $subtype2 = setSubRequest2($data['txt1']);
        $type = setTypeRequest($data['type_of_request']);
        $PHPJasperXML->arrayParameter=array(
            "control_no"=>$data['control_no'],
            $subtype =>'report/TA/pages/correct.png',
            $subtype2 =>'report/TA/pages/correct.png',
           $type =>'report/TA/pages/correct.png',
            "started_date"=>$data['started_date'],
            "timeliness"=>$data['timeliness'],
            "start_time"=>$data['started_time'],
            "quality"=>$data['quality'],
            "completed_date"=>$data['completed_date'],
            "issue"=>$data['issue'],
            "completed_time"=>$data['completed_time'],
            "status_desc"=>$data['status_desc'],
            "requested_by"=>splitName($data['request_by']),
            "resolve"=>$data['status'],
            "defective"=>$data['status'],
            "assisted_by"=>$data['assisted_by'],
            "requested_date"=>$data['request_date'],
            "requested_time"=>$data['request_time'],
            "office"=>$data['office'],
            "position"=>$data['position'],
            "contact_no"=>$data['contact_details'],
            "email"=>$data['email_address'],
            "equipment_type"=>$data['equipment_type'],
            "brand_model"=>$data['brand_model'],
            "property_no"=>$data['property_no'],
            "serial_no"=>$data['serial_no'],
            "ip_address"=>$data['ip_address'],
            "mac_address"=>$data['mac_address'],
            "txt1"=>$data['txt1'],
            "txt2"=>$data['txt2'],
            "txt3"=>$data['txt3'],
            "txt4"=>$data['txt4'],
            "txt5"=>$data['txt5'],
            "txt6"=>$data['txt6'],
            "txt7"=>$data['txt7'],
            "assisted_by"=>$data['assisted_by'],
            "ict_comments"=>$data['ict_comments'],
        );
    } else {
       
    }
}









$PHPJasperXML->load_xml_file("report/TA/pages/report1.jrxml");
$PHPJasperXML->transferDBtoArray('localhost', 'fascalab_2020', 'w]zYV6X9{*BN', 'fascalab_2020');
$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file
