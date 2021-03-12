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

$conn=mysqli_connect('localhost','fascalab_2020','w]zYV6X9{*BN','fascalab_2020');


                if(mysqli_connect_errno()){echo mysqli_connect_error();}  
             $cn = $_GET['id'];


                $query = "SELECT * FROM `tblwebposting` WHERE `CONTROL_NO` = '$cn'";
            
                $name = '';
                $result = mysqli_query($conn, $query);
            
        
                $a = ["News","Procurement","Banner","Transparency","LGUs","Procurement","Vacancies","Photo","Video","Forms"];
       
                if($row = mysqli_fetch_array($result))
                {
                    $reqby = $row['REQUESTED_BY'];
                    $reqtime = $row['REQUESTED_TIME'];
                    $reqdate = $row['REQUESTED_DATE'];
                    $office = $row['OFFICE'];
                    $position = $row['POSITION'];
                    $mobile = $row['MOBILE_NO'];
                    $purpose = $row['PURPOSE'];
                    $attachements = $row['ATTACHMENT'];

                    $time = new DateTime($reqtime);
                    $daate = new DateTime($reqdate);
                    if (in_array($row['CATEGORY'],$a))
                        {                   
                            $PHPJasperXML = new PHPJasperXML();
                            $PHPJasperXML->arrayParameter=array(
                            "requested_by"=>$reqby,
                            "requested_time"=>$time->format('g:i A'),
                            "requested_date"=>$time->format('F d, Y'),
                            "office"=>$office,
                            "position"=>$position,
                            "mobile_no"=>$mobile,
                            "purpose"=>$purpose,
                            "category1"=>setParam("News",$row['CATEGORY']),
                            "category2"=>setParam("Banner",$row['CATEGORY']),
                            "category3"=>setParam("Transparency",$row['CATEGORY']),
                            "category4"=>setParam("LGUs",$row['CATEGORY']),
                            "category5"=>setParam("Procurement",$row['CATEGORY']),
                            "category6"=>setParam("Vacancies",$row['CATEGORY']),
                            "category7"=>setParam("Photo",$row['CATEGORY']),
                            "category8"=>setParam("Video",$row['CATEGORY']),
                            "category9"=>setParam("Forms",$row['CATEGORY']),
                            "attachements"=>$
                        );
                        }else{

                        }
                        // print_r($PHPJasperXML);
                }
            
                    function setParam($category,$val)
                {
                    if($category == $val)
                    {
                        return 'correct.png';
                    }else{
                        return '';
                    }
                }
    


// $PHPJasperXML->debugsql=true;



$PHPJasperXML->load_xml_file("view.jrxml");
$PHPJasperXML->transferDBtoArray('localhost','fascalab_2020','w]zYV6X9{*BN','fascalab_2020');
$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file


?>
