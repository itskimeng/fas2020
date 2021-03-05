<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
include_once("../PHPJasperXML.inc.php");

function splitName($name){
    $names = explode(' ', $name);
    $lastname = $names[count($names) - 1];
    unset($names[count($names) - 1]);
    $firstname = join(' ', $names);
    return $firstname . ' ' . $lastname;
}

// $conn=mysqli_connect('localhost','fascalab_2020','w]zYV6X9{*BN','fascalab_2020');


//               if(mysqli_connect_errno()){echo mysqli_connect_error();}  
//              $cn = $_GET['id'];


//                 $query = "SELECT * FROM `tbltechnical_assistance` WHERE `CONTROL_NO` = '$cn'";
            
//                 $name = '';
//                 $result = mysqli_query($conn, $query);
//                 $val = array();
//                 while($row = mysqli_fetch_array($result))
//                 {
    

$PHPJasperXML = new PHPJasperXML();
// $PHPJasperXML->debugsql=true;



$PHPJasperXML->load_xml_file("view.jrxml");
$PHPJasperXML->transferDBtoArray('localhost','fascalab_2020','w]zYV6X9{*BN','fascalab_2020');
    $PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file


?>
