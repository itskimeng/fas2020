<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
// include_once("../report/PHPJasperXML.inc.php");
include 'report/TA/PHPJasperXML.inc.php';
include 'controller/TechnicalAssistanceController.php';
include 'ict/views/functions.php';
include 'ict/views/checklist.php';
$conn=mysqli_connect('localhost','fascalab_2020','w]zYV6X9{*BN','fascalab_2020');
        
        
    if(mysqli_connect_errno()){echo mysqli_connect_error();}  
    $cn = $_GET['id'];
    
    
    $query = "SELECT * FROM `tblcustomer_satisfaction_survey` 
    LEFT JOIN tblservice_dimension ON tblcustomer_satisfaction_survey.SD_ID = tblservice_dimension.CONTROL_NO 
    WHERE tblcustomer_satisfaction_survey.`SD_ID` LIKE '%$cn%'";
    $name = '';
    $result = mysqli_query($conn, $query);
    $val = array();
    $rating_scale = '';
    $service_dimension = '';
    $service_provided = '';
    $office = '';
    $action_officer = '';
    $rs5 = ''; $rs4 = ''; $rs3 = ''; $rs2 = ''; $rs1 = '';
    $rel5 = ''; $rel4 = ''; $rel3 = ''; $rel2 = ''; $rel1 = '';
    $af5 = ''; $af4 = ''; $af3 = ''; $af2 = ''; $af1 = '';
    $com5 = ''; $com4 = ''; $com3 = ''; $com2 = ''; $com1 = '';
    $cost5 = ''; $cost4 = ''; $cost3 = ''; $cost2 = ''; $cost1 = '';
    $integ5 = ''; $integ4 = ''; $integ3 = ''; $integ2 = ''; $integ1 = '';
    $ass5 = ''; $ass4 = ''; $ass3 = ''; $ass2 = ''; $ass1 = '';
    $out5 = ''; $out4 = ''; $out3 = ''; $out2 = ''; $out1 = '';
    
    
    
    $client = '';$date_accomplished = '';
    
    $data = array();
    $service = array();
    while($row = mysqli_fetch_assoc($result))
    {
        $office = $row['OFFICE'];
        $service_provided = $row['SERVICE_PROVIDED'];
        $action_officer = $row['ACTION_OFFICER'];
        $service_dimension = $row['SERVICE_DIMENTION'];
        $rating_scale= $row['RATING_SCALE'];
        $client = $row['CLIENT'];
        $date_accomplished = date('m/d/Y',strtotime($row['DATE_ACCOMPLISHED']));
        $data[] = $rating_scale;
        $service[] = $service_dimension;
    
    }
    // for ($i=0; $i < 8 ; $i++) { 
    //     if($data[$i] == 5 && $service[$i] == 'Responsiveness')
    //     {
    //         $rs5 = 'report/TA/pages/correct.png';
    //         $rs4 = '';
    //         $rs3 = '';
    //         $rs2 = '';
    //         $rs1 = '';
    //     }else if($data[$i] == 4 && $service[$i] == 'Responsiveness'){
    //         $rs5 = '';
    //         $rs4 = 'report/TA/pages/correct.png';
    //         $rs3 = '';
    //         $rs2 = '';
    //         $rs1 = '';
    //     }
    //     else if($data[$i] == 3 && $service[$i] == 'Responsiveness'){
    //         $rs5 = '';
    //         $rs4 = '';
    //         $rs3 = 'report/TA/pages/correct.png';
    //         $rs2 = '';
    //         $rs1 = '';
    //     }
    //     else if($data[$i] == 2 && $service[$i] == 'Responsiveness'){
    //         $rs5 = '';
    //         $rs4 = '';
    //         $rs3 = '';
    //         $rs2 = 'report/TA/pages/correct.png';
    //         $rs1 = '';
    //     }
    //     else if($data[$i] == 1 && $service[$i] == 'Responsiveness'){
    //         $rs5 = '';
    //         $rs4 = '';
    //         $rs3 = '';
    //         $rs2 = '';
    //         $rs1 = 'report/TA/pages/correct.png';
    //     }
    
    //      if($data[$i] == 5 && $service[$i] == 'Reliability')
    //     {
    //         $rel5 = 'report/TA/pages/correct.png';
    //         $rel4 = '';
    //         $rel3 = '';
    //         $rel2 = '';
    //         $rel1 = '';
    //     }else if($data[$i] == 4 && $service[$i] == 'Reliability'){
    //         $rel5 = '';
    //         $rel4 = 'report/TA/pages/correct.png';
    //         $rel3 = '';
    //         $rel2 = '';
    //         $rel1 = '';
    //     }
    //     else if($data[$i] == 3 && $service[$i] == 'Reliability'){
    //         $rel5 = '';
    //         $rel4 = '';
    //         $rel3 = 'report/TA/pages/correct.png';
    //         $rel2 = '';
    //         $rel1 = '';
    //     }
    //     else if($data[$i] == 2 && $service[$i] == 'Reliability'){
    //         $rel5 = '';
    //         $rel4 = '';
    //         $rel3 = '';
    //         $rel2 = 'report/TA/pages/correct.png';
    //         $rel1 = '';
    //     }
    //     else if($data[$i] == 1 && $service[$i] == 'Reliability'){
    //         $rel5 = '';
    //         $rel4 = '';
    //         $rel3 = '';
    //         $rel2 = '';
    //         $rel1 = 'report/TA/pages/correct.png';
    //     }
    
    //     if($data[$i] == 5 && $service[$i] == 'Access & Facilities')
    //     {
    //         $af5 = 'report/TA/pages/correct.png';
    //         $af4 = '';
    //         $af3 = '';
    //         $af2 = '';
    //         $af1 = '';
    //     }else if($data[$i] == 4 && $service[$i] == 'Access & Facilities'){
    //         $af5 = '';
    //         $af4 = 'report/TA/pages/correct.png';
    //         $af3 = '';
    //         $af2 = '';
    //         $af1 = '';
    //     }
    //     else if($data[$i] == 3 && $service[$i] == 'Access & Facilities'){
    //         $af5 = '';
    //         $af4 = '';
    //         $af3 = 'report/TA/pages/correct.png';
    //         $af2 = '';
    //         $af1 = '';
    //     }
    //     else if($data[$i] == 2 && $service[$i] == 'Access & Facilities'){
    //         $af5 = '';
    //         $af4 = '';
    //         $af3 = '';
    //         $af2 = 'report/TA/pages/correct.png';
    //         $af1 = '';
    //     }
    //     else if($data[$i] == 1 && $service[$i] == 'Access & Facilities'){
    //         $af5 = '';
    //         $af4 = '';
    //         $af3 = '';
    //         $af2 = '';
    //         $af1 = 'report/TA/pages/correct.png';
    //     }
    
    //     if($data[$i] == 5 && $service[$i] == 'Communication')
    //     {
    //         $com5 = 'report/TA/pages/correct.png';
    //         $com4 = '';
    //         $com3 = '';
    //         $com2 = '';
    //         $com1 = '';
    //     }else if($data[$i] == 4 && $service[$i] == 'Communication'){
    //         $com5 = '';
    //         $com4 = 'report/TA/pages/correct.png';
    //         $com3 = '';
    //         $com2 = '';
    //         $com1 = '';
    //     }
    //     else if($data[$i] == 3 && $service[$i] == 'Communication'){
    //         $com5 = '';
    //         $com4 = '';
    //         $com3 = 'report/TA/pages/correct.png';
    //         $com2 = '';
    //         $com1 = '';
    //     }
    //     else if($data[$i] == 2 && $service[$i] == 'Communication'){
    //         $com5 = '';
    //         $com4 = '';
    //         $com3 = '';
    //         $com2 = 'report/TA/pages/correct.png';
    //         $com1 = '';
    //     }
    //     else if($data[$i] == 1 && $service[$i] == 'Communication'){
    //         $com5 = '';
    //         $com4 = '';
    //         $com3 = '';
    //         $com2 = '';
    //         $com1 = 'report/TA/pages/correct.png';
    //     }
    
    //     if($data[$i] == 5 && $service[$i] == 'Costs')
    //     {
    //         $cost5 = 'report/TA/pages/correct.png';
    //         $cost4 = '';
    //         $cost3 = '';
    //         $cost2 = '';
    //         $cost1 = '';
    //     }else if($data[$i] == 4 && $service[$i] == 'Costs'){
    //         $cost5 = '';
    //         $cost4 = 'report/TA/pages/correct.png';
    //         $cost3 = '';
    //         $cost2 = '';
    //         $cost1 = '';
    //     }
    //     else if($data[$i] == 3 && $service[$i] == 'Costs'){
    //         $cost5 = '';
    //         $cost4 = '';
    //         $cost3 = 'report/TA/pages/correct.png';
    //         $cost2 = '';
    //         $cost1 = '';
    //     }
    //     else if($data[$i] == 2 && $service[$i] == 'Costs'){
    //         $cost5 = '';
    //         $cost4 = '';
    //         $cost3 = '';
    //         $cost2 = 'report/TA/pages/correct.png';
    //         $cost1 = '';
    //     }
    //     else if($data[$i] == 1 && $service[$i] == 'Costs'){
    //         $cost5 = '';
    //         $cost4 = '';
    //         $cost3 = '';
    //         $cost2 = '';
    //         $cost1 = 'report/TA/pages/correct.png';
    //     }
    
    //     if($data[$i] == 5 && $service[$i] == 'Integrity')
    //     {
    //         $integ5 = 'report/TA/pages/correct.png';
    //         $integ4 = '';
    //         $integ3 = '';
    //         $integ2 = '';
    //         $integ1 = '';
    //     }else if($data[$i] == 4 && $service[$i] == 'Integrity'){
    //         $integ5 = '';
    //         $integ4 = 'report/TA/pages/correct.png';
    //         $integ3 = '';
    //         $integ2 = '';
    //         $integ1 = '';
    //     }
    //     else if($data[$i] == 3 && $service[$i] == 'Integrity'){
    //         $integ5 = '';
    //         $integ4 = '';
    //         $integ3 = 'report/TA/pages/correct.png';
    //         $integ2 = '';
    //         $integ1 = '';
    //     }
    //     else if($data[$i] == 2 && $service[$i] == 'Integrity'){
    //         $integ5 = '';
    //         $integ4 = '';
    //         $integ3 = '';
    //         $integ2 = 'report/TA/pages/correct.png';
    //         $integ1 = '';
    //     }
    //     else if($data[$i] == 1 && $service[$i] == 'Integrity'){
    //         $integ5 = '';
    //         $integ4 = '';
    //         $integ3 = '';
    //         $integ2 = '';
    //         $integ1 = 'report/TA/pages/correct.png';
    //     }
    
    //     if($data[$i] == 5 && $service[$i] == 'Assurance')
    //     {
    //         $ass5 = 'report/TA/pages/correct.png';
    //         $ass4 = '';
    //         $ass3 = '';
    //         $ass2 = '';
    //         $ass1 = '';
    //     }else if($data[$i] == 4 && $service[$i] == 'Assurance'){
    //         $ass5 = '';
    //         $ass4 = 'report/TA/pages/correct.png';
    //         $ass3 = '';
    //         $ass2 = '';
    //         $ass1 = '';
    //     }
    //     else if($data[$i] == 3 && $service[$i] == 'Assurance'){
    //         $ass5 = '';
    //         $ass4 = '';
    //         $ass3 = 'report/TA/pages/correct.png';
    //         $ass2 = '';
    //         $ass1 = '';
    //     }
    //     else if($data[$i] == 2 && $service[$i] == 'Assurance'){
    //         $ass5 = '';
    //         $ass4 = '';
    //         $ass3 = '';
    //         $ass2 = 'report/TA/pages/correct.png';
    //         $ass1 = '';
    //     }
    //     else if($data[$i] == 1 && $service[$i] == 'Assurance'){
    //         $ass5 = '';
    //         $ass4 = '';
    //         $ass3 = '';
    //         $ass2 = '';
    //         $ass1 = 'report/TA/pages/correct.png';
    //     }
    
    //     if($data[$i] == 5 && $service[$i] == 'Outcome')
    //     {
    //         $out5 = 'report/TA/pages/correct.png';
    //         $out4 = '';
    //         $out3 = '';
    //         $out2 = '';
    //         $out1 = '';
    //     }else if($data[$i] == 4 && $service[$i] == 'Outcome'){
    //         $out5 = '';
    //         $out4 = 'report/TA/pages/correct.png';
    //         $out3 = '';
    //         $out2 = '';
    //         $out1 = '';
    //     }
    //     else if($data[$i] == 3 && $service[$i] == 'Outcome'){
    //         $out5 = '';
    //         $out4 = '';
    //         $out3 = 'report/TA/pages/correct.png';
    //         $out2 = '';
    //         $out1 = '';
    //     }
    //     else if($data[$i] == 2 && $service[$i] == 'Outcome'){
    //         $out5 = '';
    //         $out4 = '';
    //         $out3 = '';
    //         $out2 = 'report/TA/pages/correct.png';
    //         $out1 = '';
    //     }
    //     else if($data[$i] == 1 && $service[$i] == 'Outcome'){
    //         $out5 = '';
    //         $out4 = '';
    //         $out3 = '';
    //         $out2 = '';
    //         $out1 = 'report/TA/pages/correct.png';
    //     }
    // }
      
$PHPJasperXML = new PHPJasperXML();

// $checked = '';
$i=0;
foreach ($view_req as $key => $data) {  
if($data['rating_scale'] != '' || !empty($data['rating_scale']))
{
$parameter= param("rating_scale",$data['service_dimension'],$data['rating_scale']);
}
// print_r($parameter);
// echo $data['service_dimension'].'-'.$checked.'<br>';

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
            "service_dimension" => $data['service_dimension'],
            "suggestion" => $data['suggestion'],
       
            "rating_scale_rel5"=>$rel5,
            "rating_scale_rel4"=>$rel4,
            "rating_scale_rel3"=>$rel3,
            "rating_scale_rel2"=>$rel2,
            "rating_scale_rel1"=>$rel1,
    
            "rating_scale_res5"=>$rs5,
            "rating_scale_res4"=>$rs4,
            "rating_scale_res3"=>$rs3,
            "rating_scale_res2"=>$rs2,
            "rating_scale_res1"=>$rs1,
            
            "rating_scale_af5"=>$af5,
            "rating_scale_af4"=>$af4,
            "rating_scale_af3"=>$af3,
            "rating_scale_af2"=>$af2,
            "rating_scale_af1"=>$af1,
    
            "rating_scale_com5"=>$com5,
            "rating_scale_com4"=>$com4,
            "rating_scale_com3"=>$com3,
            "rating_scale_com2"=>$com2,
            "rating_scale_com1"=>$com1,
    
            "rating_scale_cost5"=>$cost5,
            "rating_scale_cost4"=>$cost4,
            "rating_scale_cost3"=>$cost3,
            "rating_scale_cost2"=>$cost2,
            "rating_scale_cost1"=>$cost1,
    
            "rating_scale_integ5"=>$integ5,
            "rating_scale_integ4"=>$integ4,
            "rating_scale_integ3"=>$integ3,
            "rating_scale_integ2"=>$integ2,
            "rating_scale_integ1"=>$integ1,
    
            "rating_scale_ass5"=>$ass5,
            "rating_scale_ass4"=>$ass4,
            "rating_scale_ass3"=>$ass3,
            "rating_scale_ass2"=>$ass2,
            "rating_scale_ass1"=>$ass1,
    
            "rating_scale_out5"=>$out5,
            "rating_scale_out4"=>$out4,
            "rating_scale_out3"=>$out3,
            "rating_scale_out2"=>$out2,
            "rating_scale_out1"=>$out1
            

     
          
        
    );
        
        // $PHPJasperXML->arrayParameter=$array_new;
}
}


 /* 
         * To change this template, choose Tools | Templates
         * and open the template in the editor.
         */
        // include_once("../PHPJasperXML.inc.php");
        

        
       

print_r($scale);    







$PHPJasperXML->load_xml_file("report/TA/pages/report1.jrxml");
$PHPJasperXML->transferDBtoArray('localhost', 'fascalab_2020', 'w]zYV6X9{*BN', 'fascalab_2020');
$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file