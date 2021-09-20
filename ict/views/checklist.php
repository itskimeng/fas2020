<?php
  function category($pointer) 
{ 
  $menu = [
  	'DESKTOP/LAPTOP REPAIR' => false,
    'INTERNET CONNECTIVITY' => false,
    'APPLICATION/SOFTWARE/SYSTEM ASSISTANCE' => false,
    'HARDWARE INSTALLATION' => false,
    'GOVMAIL ASSISTANCE' =>false,
    'POSTING/UPDATING OF INFORMATION IN THE DILG WEBSITE' => false,
    'PRINTER/SCANNER/COPIER' => false,
    'IP TELEPHONY' => false,
    'OTHERS (please specify)' => false
  ];  

  if (array_key_exists($pointer, $menu)) {
  	$menu[$pointer] = true;
  }
  return $menu;
}
function sub_category($pointer)
{
  $code = [
    '1' => false,
    '2' => false,
    '3' => false,
    '4' => false,
    '5' => false,
    '6' => false,
    '7' => false,
    '8' => false,
    '9' => false,
    '10' => false,
    '11' => false,
    '12' => false,
    '13' => false,
    '14' => false,
    '15' => false,
    '16' => false,
    '17' => false,
    '18' => false,
    '19' => false,
    '20' => false,
    '21' => false,
    '22' => false,
    '23' => false,
    '24' => false,
    '25' => false,
    '25' => false,
    '25' => false,
    '26'=> false,
    '27'=> false,
    '28'=> false,
    '29'=> false,
    '30'=> false,
    '31'=> false,
    '32'=> false,
    '33'=> false,
    '34'=> false,
    '35'=> false,
    '36'=> false,
  ];
  if (array_key_exists($pointer, $code)) {
  	$code[$pointer] = true;
  }
  return $code;

}

function rating_scale($pointer)
{
  $menu = [
  	'5' => false,
  	'4' => false,
  	'3' => false,
  	'2' => false,
  	'1' => false,
  ];  

  if (array_key_exists($pointer, $menu)) {
  	$menu= [$pointer,true];
  }
  return $menu;

}

function param($name,$service,$value)
{
    $array=[];
    $service_checlist = [
      "Responsiveness",
      "Reliability",
      "Access & Facilities",
      "Communication",
      "Costs",
      "Integrity",
      "Assurance",  
      "Outcome",
    ];
    for ($i=0; $i < 9 ; $i++) { 
      if($service == $service_checlist[$i])
      {
        for ($h=1; $h < 6; $h++) { 
          if($value == $h){
            $b =  "report/TA/pages/correct.png";
            array_push($array,$b);
  
          }else{
            $b =  "''";
            array_push($array,$b);
          }
        }
       
      }
        
        
    } 
    // print_r($array);
    // print_r($b."\n");
    return $array;
}
    

// function checklist($cn)
// {
//   $conn=mysqli_connect('localhost','fascalab_2020','w]zYV6X9{*BN','fascalab_2020');

//   $query = "SELECT * FROM `tblcustomer_satisfaction_survey` 
//   INNER JOIN tblservice_dimension ON tblcustomer_satisfaction_survey.SD_ID = tblservice_dimension.CONTROL_NO 
//   WHERE tblcustomer_satisfaction_survey.`SD_ID` LIKE '%$cn%'";
//   $name = '';
//   $result = mysqli_query($conn, $query);
//   $val = array();
//   $rating_scale = '';
//   $service_dimension = '';
//   $service_provided = '';
//   $office = '';
//   $action_officer = '';
//   $rs5 = ''; $rs4 = ''; $rs3 = ''; $rs2 = ''; $rs1 = '';
//   $rel5 = ''; $rel4 = ''; $rel3 = ''; $rel2 = ''; $rel1 = '';
//   $af5 = ''; $af4 = ''; $af3 = ''; $af2 = ''; $af1 = '';
//   $com5 = ''; $com4 = ''; $com3 = ''; $com2 = ''; $com1 = '';
//   $cost5 = ''; $cost4 = ''; $cost3 = ''; $cost2 = ''; $cost1 = '';
//   $integ5 = ''; $integ4 = ''; $integ3 = ''; $integ2 = ''; $integ1 = '';
//   $ass5 = ''; $ass4 = ''; $ass3 = ''; $ass2 = ''; $ass1 = '';
//   $out5 = ''; $out4 = ''; $out3 = ''; $out2 = ''; $out1 = '';
  
  
  
//   $client = '';$date_accomplished = '';
  
//   $data = array();
//   $service = array();
//   while($row = mysqli_fetch_assoc($result))
//   {
//       $office = $row['OFFICE'];
//       $service_provided = $row['SERVICE_PROVIDED'];
//       $action_officer = $row['ACTION_OFFICER'];
//       $service_dimension = $row['SERVICE_DIMENTION'];
//       $rating_scale= $row['RATING_SCALE'];
//       $client = $row['CLIENT'];
//       $date_accomplished = date('m/d/Y',strtotime($row['DATE_ACCOMPLISHED']));
//       $data[] = $rating_scale;
//       $service[] = $service_dimension;
  
//   }
//   for ($i=0; $i < 8 ; $i++) { 
  
//       if($data[$i] == 5 && $service[$i] == 'Responsiveness')
//       {
//           $rs5 = 'black.png';
//           $rs4 = 'white.png';
//           $rs3 = 'white.png';
//           $rs2 = 'white.png';
//           $rs1 = 'white.png';
//       }else if($data[$i] == 4 && $service[$i] == 'Responsiveness'){
//           $rs5 = 'white.png';
//           $rs4 = 'black.png';
//           $rs3 = 'white.png';
//           $rs2 = 'white.png';
//           $rs1 = 'white.png';
//       }
//       else if($data[$i] == 3 && $service[$i] == 'Responsiveness'){
//           $rs5 = 'white.png';
//           $rs4 = 'white.png';
//           $rs3 = 'black.png';
//           $rs2 = 'white.png';
//           $rs1 = 'white.png';
//       }
//       else if($data[$i] == 2 && $service[$i] == 'Responsiveness'){
//           $rs5 = 'white.png';
//           $rs4 = 'white.png';
//           $rs3 = 'white.png';
//           $rs2 = 'black.png';
//           $rs1 = 'white.png';
//       }
//       else if($data[$i] == 1 && $service[$i] == 'Responsiveness'){
//           $rs5 = 'white.png';
//           $rs4 = 'white.png';
//           $rs3 = 'white.png';
//           $rs2 = 'white.png';
//           $rs1 = 'black.png';
//       }
  
//        if($data[$i] == 5 && $service[$i] == 'Reliability')
//       {
//           $rel5 = 'black.png';
//           $rel4 = 'white.png';
//           $rel3 = 'white.png';
//           $rel2 = 'white.png';
//           $rel1 = 'white.png';
//       }else if($data[$i] == 4 && $service[$i] == 'Reliability'){
//           $rel5 = 'white.png';
//           $rel4 = 'black.png';
//           $rel3 = 'white.png';
//           $rel2 = 'white.png';
//           $rel1 = 'white.png';
//       }
//       else if($data[$i] == 3 && $service[$i] == 'Reliability'){
//           $rel5 = 'white.png';
//           $rel4 = 'white.png';
//           $rel3 = 'black.png';
//           $rel2 = 'white.png';
//           $rel1 = 'white.png';
//       }
//       else if($data[$i] == 2 && $service[$i] == 'Reliability'){
//           $rel5 = 'white.png';
//           $rel4 = 'white.png';
//           $rel3 = 'white.png';
//           $rel2 = 'black.png';
//           $rel1 = 'white.png';
//       }
//       else if($data[$i] == 1 && $service[$i] == 'Reliability'){
//           $rel5 = 'white.png';
//           $rel4 = 'white.png';
//           $rel3 = 'white.png';
//           $rel2 = 'white.png';
//           $rel1 = 'black.png';
//       }
  
//       if($data[$i] == 5 && $service[$i] == 'Access & Facilities')
//       {
//           $af5 = 'black.png';
//           $af4 = 'white.png';
//           $af3 = 'white.png';
//           $af2 = 'white.png';
//           $af1 = 'white.png';
//       }else if($data[$i] == 4 && $service[$i] == 'Access & Facilities'){
//           $af5 = 'white.png';
//           $af4 = 'black.png';
//           $af3 = 'white.png';
//           $af2 = 'white.png';
//           $af1 = 'white.png';
//       }
//       else if($data[$i] == 3 && $service[$i] == 'Access & Facilities'){
//           $af5 = 'white.png';
//           $af4 = 'white.png';
//           $af3 = 'black.png';
//           $af2 = 'white.png';
//           $af1 = 'white.png';
//       }
//       else if($data[$i] == 2 && $service[$i] == 'Access & Facilities'){
//           $af5 = 'white.png';
//           $af4 = 'white.png';
//           $af3 = 'white.png';
//           $af2 = 'black.png';
//           $af1 = 'white.png';
//       }
//       else if($data[$i] == 1 && $service[$i] == 'Access & Facilities'){
//           $af5 = 'white.png';
//           $af4 = 'white.png';
//           $af3 = 'white.png';
//           $af2 = 'white.png';
//           $af1 = 'black.png';
//       }
  
//       if($data[$i] == 5 && $service[$i] == 'Communication')
//       {
//           $com5 = 'black.png';
//           $com4 = 'white.png';
//           $com3 = 'white.png';
//           $com2 = 'white.png';
//           $com1 = 'white.png';
//       }else if($data[$i] == 4 && $service[$i] == 'Communication'){
//           $com5 = 'white.png';
//           $com4 = 'black.png';
//           $com3 = 'white.png';
//           $com2 = 'white.png';
//           $com1 = 'white.png';
//       }
//       else if($data[$i] == 3 && $service[$i] == 'Communication'){
//           $com5 = 'white.png';
//           $com4 = 'white.png';
//           $com3 = 'black.png';
//           $com2 = 'white.png';
//           $com1 = 'white.png';
//       }
//       else if($data[$i] == 2 && $service[$i] == 'Communication'){
//           $com5 = 'white.png';
//           $com4 = 'white.png';
//           $com3 = 'white.png';
//           $com2 = 'black.png';
//           $com1 = 'white.png';
//       }
//       else if($data[$i] == 1 && $service[$i] == 'Communication'){
//           $com5 = 'white.png';
//           $com4 = 'white.png';
//           $com3 = 'white.png';
//           $com2 = 'white.png';
//           $com1 = 'black.png';
//       }
  
//       if($data[$i] == 5 && $service[$i] == 'Costs')
//       {
//           $cost5 = 'black.png';
//           $cost4 = 'white.png';
//           $cost3 = 'white.png';
//           $cost2 = 'white.png';
//           $cost1 = 'white.png';
//       }else if($data[$i] == 4 && $service[$i] == 'Costs'){
//           $cost5 = 'white.png';
//           $cost4 = 'black.png';
//           $cost3 = 'white.png';
//           $cost2 = 'white.png';
//           $cost1 = 'white.png';
//       }
//       else if($data[$i] == 3 && $service[$i] == 'Costs'){
//           $cost5 = 'white.png';
//           $cost4 = 'white.png';
//           $cost3 = 'black.png';
//           $cost2 = 'white.png';
//           $cost1 = 'white.png';
//       }
//       else if($data[$i] == 2 && $service[$i] == 'Costs'){
//           $cost5 = 'white.png';
//           $cost4 = 'white.png';
//           $cost3 = 'white.png';
//           $cost2 = 'black.png';
//           $cost1 = 'white.png';
//       }
//       else if($data[$i] == 1 && $service[$i] == 'Costs'){
//           $cost5 = 'white.png';
//           $cost4 = 'white.png';
//           $cost3 = 'white.png';
//           $cost2 = 'white.png';
//           $cost1 = 'black.png';
//       }
  
//       if($data[$i] == 5 && $service[$i] == 'Integrity')
//       {
//           $integ5 = 'black.png';
//           $integ4 = 'white.png';
//           $integ3 = 'white.png';
//           $integ2 = 'white.png';
//           $integ1 = 'white.png';
//       }else if($data[$i] == 4 && $service[$i] == 'Integrity'){
//           $integ5 = 'white.png';
//           $integ4 = 'black.png';
//           $integ3 = 'white.png';
//           $integ2 = 'white.png';
//           $integ1 = 'white.png';
//       }
//       else if($data[$i] == 3 && $service[$i] == 'Integrity'){
//           $integ5 = 'white.png';
//           $integ4 = 'white.png';
//           $integ3 = 'black.png';
//           $integ2 = 'white.png';
//           $integ1 = 'white.png';
//       }
//       else if($data[$i] == 2 && $service[$i] == 'Integrity'){
//           $integ5 = 'white.png';
//           $integ4 = 'white.png';
//           $integ3 = 'white.png';
//           $integ2 = 'black.png';
//           $integ1 = 'white.png';
//       }
//       else if($data[$i] == 1 && $service[$i] == 'Integrity'){
//           $integ5 = 'white.png';
//           $integ4 = 'white.png';
//           $integ3 = 'white.png';
//           $integ2 = 'white.png';
//           $integ1 = 'black.png';
//       }
  
//       if($data[$i] == 5 && $service[$i] == 'Assurance')
//       {
//           $ass5 = 'black.png';
//           $ass4 = 'white.png';
//           $ass3 = 'white.png';
//           $ass2 = 'white.png';
//           $ass1 = 'white.png';
//       }else if($data[$i] == 4 && $service[$i] == 'Assurance'){
//           $ass5 = 'white.png';
//           $ass4 = 'black.png';
//           $ass3 = 'white.png';
//           $ass2 = 'white.png';
//           $ass1 = 'white.png';
//       }
//       else if($data[$i] == 3 && $service[$i] == 'Assurance'){
//           $ass5 = 'white.png';
//           $ass4 = 'white.png';
//           $ass3 = 'black.png';
//           $ass2 = 'white.png';
//           $ass1 = 'white.png';
//       }
//       else if($data[$i] == 2 && $service[$i] == 'Assurance'){
//           $ass5 = 'white.png';
//           $ass4 = 'white.png';
//           $ass3 = 'white.png';
//           $ass2 = 'black.png';
//           $ass1 = 'white.png';
//       }
//       else if($data[$i] == 1 && $service[$i] == 'Assurance'){
//           $ass5 = 'white.png';
//           $ass4 = 'white.png';
//           $ass3 = 'white.png';
//           $ass2 = 'white.png';
//           $ass1 = 'black.png';
//       }
  
//       if($data[$i] == 5 && $service[$i] == 'Outcome')
//       {
//           $out5 = 'black.png';
//           $out4 = 'white.png';
//           $out3 = 'white.png';
//           $out2 = 'white.png';
//           $out1 = 'white.png';
//       }else if($data[$i] == 4 && $service[$i] == 'Outcome'){
//           $out5 = 'white.png';
//           $out4 = 'black.png';
//           $out3 = 'white.png';
//           $out2 = 'white.png';
//           $out1 = 'white.png';
//       }
//       else if($data[$i] == 3 && $service[$i] == 'Outcome'){
//           $out5 = 'white.png';
//           $out4 = 'white.png';
//           $out3 = 'black.png';
//           $out2 = 'white.png';
//           $out1 = 'white.png';
//       }
//       else if($data[$i] == 2 && $service[$i] == 'Outcome'){
//           $out5 = 'white.png';
//           $out4 = 'white.png';
//           $out3 = 'white.png';
//           $out2 = 'black.png';
//           $out1 = 'white.png';
//       }
//       else if($data[$i] == 1 && $service[$i] == 'Outcome'){
//           $out5 = 'white.png';
//           $out4 = 'white.png';
//           $out3 = 'white.png';
//           $out2 = 'white.png';
//           $out1 = 'black.png';
//       }
//   }
//       $PHPJasperXML = new PHPJasperXML();
//       $PHPJasperXML->arrayParameter=array(
//       "office"=>$office,
//       "service_provided"=>$service_provided,
//       "action_officer"=>$action_officer,
//       "rating_scale_rel5"=>$rel5,
//       "rating_scale_rel4"=>$rel4,
//       "rating_scale_rel3"=>$rel3,
//       "rating_scale_rel2"=>$rel2,
//       "rating_scale_rel1"=>$rel1,
  
//       "rating_scale_res5"=>$rs5,
//       "rating_scale_res4"=>$rs4,
//       "rating_scale_res3"=>$rs3,
//       "rating_scale_res2"=>$rs2,
//       "rating_scale_res1"=>$rs1,
      
//       "rating_scale_af5"=>$af5,
//       "rating_scale_af4"=>$af4,
//       "rating_scale_af3"=>$af3,
//       "rating_scale_af2"=>$af2,
//       "rating_scale_af1"=>$af1,
  
//       "rating_scale_com5"=>$com5,
//       "rating_scale_com4"=>$com4,
//       "rating_scale_com3"=>$com3,
//       "rating_scale_com2"=>$com2,
//       "rating_scale_com1"=>$com1,
  
//       "rating_scale_cost5"=>$cost5,
//       "rating_scale_cost4"=>$cost4,
//       "rating_scale_cost3"=>$cost3,
//       "rating_scale_cost2"=>$cost2,
//       "rating_scale_cost1"=>$cost1,
  
//       "rating_scale_integ5"=>$integ5,
//       "rating_scale_integ4"=>$integ4,
//       "rating_scale_integ3"=>$integ3,
//       "rating_scale_integ2"=>$integ2,
//       "rating_scale_integ1"=>$integ1,
  
//       "rating_scale_ass5"=>$ass5,
//       "rating_scale_ass4"=>$ass4,
//       "rating_scale_ass3"=>$ass3,
//       "rating_scale_ass2"=>$ass2,
//       "rating_scale_ass1"=>$ass1,
  
//       "rating_scale_out5"=>$out5,
//       "rating_scale_out4"=>$out4,
//       "rating_scale_out3"=>$out3,
//       "rating_scale_out2"=>$out2,
//       "rating_scale_out1"=>$out1,
  
  
//   );
  
  
  
// }


