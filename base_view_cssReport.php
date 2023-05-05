<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
// include_once("../report/PHPJasperXML.inc.php");
include 'report/TA/PHPJasperXML.inc.php';
include 'controller/TechnicalAssistanceController.php';
$conn = mysqli_connect('localhost', 'fascalab_2020', 'w]zYV6X9{*BN', 'fascalab_2020');
function citizenChecker($checker)
{
  $list = [
    '1' => false,
    '2' => false,
    '3' => false,
  ];
  if (array_key_exists($checker, $list)) {
    $list[$checker] = 'report/TA/pages/correct.png';
  }
  foreach ($list as $key => $value) {
    if ($value === 'report/TA/pages/correct.png') {
      return $value;
    }
  }
  return null; // return null if no matching value is found
}
function jasperParameters($checker)
{
  $arr_elements =
    [
      "1" => "client_type1",
      "2" => "client_type2",
      "3" => "client_type3",

      "Below 18" => 'age1',
      "18-24" => 'age2',
      "25-34" => 'age3',
      "35-44" => 'age4',
      "45-54" => 'age5',
      "55-64" => 'age6',
      "65 and over" => 'age7',

      'CC11' => 'cc11',
      'CC12' => 'cc12',
      'CC13' => 'cc13',

      'CC21' => 'cc21',
      'CC22' => 'cc22',
      'CC23' => 'cc23',

      'CC31' => 'cc31',
      'CC32' => 'cc32',

      'SQD01' => 'sqd01',
      'SQD02' => 'sqd02',
      'SQD03' => 'sqd03',
      'SQD04' => 'sqd04',
      'SQD05' => 'sqd05',

      'SQD11' => 'sqd11',
      'SQD12' => 'sqd12',
      'SQD13' => 'sqd13',
      'SQD14' => 'sqd14',
      'SQD15' => 'sqd15',

      'SQD21' => 'sqd21',
      'SQD22' => 'sqd22',
      'SQD23' => 'sqd23',
      'SQD24' => 'sqd24',
      'SQD25' => 'sqd25',

      'SQD31' => 'sqd31',
      'SQD32' => 'sqd32',
      'SQD33' => 'sqd33',
      'SQD34' => 'sqd34',
      'SQD35' => 'sqd35',

      'SQD41' => 'sqd41',
      'SQD42' => 'sqd42',
      'SQD43' => 'sqd43',
      'SQD44' => 'sqd44',
      'SQD45' => 'sqd45',

      

      'SQD61' => 'sqd61',
      'SQD62' => 'sqd62',
      'SQD63' => 'sqd63',
      'SQD64' => 'sqd64',
      'SQD65' => 'sqd65',

      'SQD71' => 'sqd71',
      'SQD72' => 'sqd72',
      'SQD73' => 'sqd73',
      'SQD74' => 'sqd74',
      'SQD75' => 'sqd75',

      'SQD81' => 'sqd81',
      'SQD82' => 'sqd82',
      'SQD83' => 'sqd83',
      'SQD84' => 'sqd84',
      'SQD85' => 'sqd85',



    ];
  if (array_key_exists($checker, $arr_elements)) {
    return $arr_elements[$checker];
  }
}




$PHPJasperXML = new PHPJasperXML();

// $checked = '';
$i = 0;

foreach ($css_report as $key => $data) {
  $client_type = citizenChecker($data['client_type']);
  $age_bracket = jasperParameters($data['age']);
  $cc_param   = jasperParameters($data['client_type']);
  $cc1_param  = jasperParameters($data['cc1']);
  $cc2_param  = jasperParameters($data['cc2']);
  $cc3_param  = jasperParameters($data['cc3']);
  $sqd_param0 = jasperParameters($data['sqd0']);
  $sqd_param1 = jasperParameters($data['sqd1']);
  $sqd_param2 = jasperParameters($data['sqd2']);
  $sqd_param3 = jasperParameters($data['sqd3']);
  $sqd_param4 = jasperParameters($data['sqd4']);
  $sqd_param6 = jasperParameters($data['sqd6']);
  $sqd_param7 = jasperParameters($data['sqd7']);
  $sqd_param8 = jasperParameters($data['sqd8']);


  $is_checked = ($client_type == 'report/TA/pages/correct.png') ? $client_type : 'white.png';



  $PHPJasperXML->arrayParameter = array(
    "requested_by" => $data['requested_by'],
    $cc_param   => $is_checked,
    $age_bracket => $is_checked,
    'gender' => $data['gender'],
    'region' => $data['region'],
    'suggestions' => $data['suggestions'],
    'contact_details' => $data['contact_details'],
    'email' => $data['email'],
    "strongly_agree" => "images/strongly_agree.png",
    "agree" => "images/agree.png",
    "neither" => "images/neither.png",
    "disagree" => "images/disagree.png",
    "strongly_disagree" => "images/strongly_disagree.png",
    $cc1_param => $is_checked,
    $cc2_param => $is_checked,
    $cc3_param => $is_checked,
    $sqd_param0 => $is_checked,
    $sqd_param1 => $is_checked,
    $sqd_param2 => $is_checked,
    $sqd_param3 => $is_checked,
    $sqd_param4 => $is_checked,
    $sqd_param6 => $is_checked,
    $sqd_param7 => $is_checked,
    $sqd_param8 => $is_checked,
    

  );
}



$PHPJasperXML->load_xml_file("report/TA/pages/client_satisfaction_report.jrxml");
$PHPJasperXML->transferDBtoArray('localhost', 'fascalab_2020', 'w]zYV6X9{*BN', 'fascalab_2020');
$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file