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
                    $control_no = $row['CONTROL_NO'];
                    $reqby = $row['REQUESTED_BY'];
                    $reqtime = $row['REQUESTED_TIME'];
                    $reqdate = $row['REQUESTED_DATE'];
                    $recdate = $row['RECEIVED_DATE'];
                    $rectime = $row['RECEIVED_TIME'];
                    $posdate = $row['POSTED_DATE'];
                    $postime = $row['POSTED_TIME'];
                    $confdate = $row['CONFIRMED_DATE'];
                    $conftime = $row['CONFIRMED_TIME'];
                    $office = $row['OFFICE'];
                    $position = $row['POSITION'];
                    $mobile = $row['MOBILE_NO'];
                    $purpose = $row['PURPOSE'];
                    $attachments = $row['ATTACHMENT']; 
                    $posted_by = $row['POSTED_BY']; 
                    $remarks = $row['REMARKS'];
                    $confirmed_by = $row['CONFIRMED_BY'];
                    $approved_by = $row['APPROVED_BY'];

                    $time = new DateTime($reqtime);
                    $date = new DateTime($reqdate);
                    $rtime = new DateTime($rectime);
                    $rdate = new DateTime($recdate);
                    $ptime = new DateTime($postime);
                    $pdate = new DateTime($posdate);
                    $condate = new DateTime($confdate);
                    $contime = new DateTime($conftime);
                    if (in_array($row['CATEGORY'],$a))
                        {                   
                            $PHPJasperXML = new PHPJasperXML();
                            $PHPJasperXML->arrayParameter=array(
                            "control_no"=>$control_no,
                            "requested_by"=>$reqby,
                            "requested_time"=>$time->format('g:i A'),
                            "requested_date"=>$date->format('F d, Y'),
                            "received_date"=>$rdate->format('F d, Y'),
                            "received_time"=>$rtime->format('g:i A'),
                            "posted_date"=>$pdate->format('F d, Y'),
                            "posted_time"=>$ptime->format('g:i A'),
                            "confirmed_date"=>$condate->format('F d, Y'),
                            "confirmed_time"=>$contime->format('g:i A'),
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
                            "attachment"=>$attachments,
                            "posted_by"=>$posted_by,
                            "remarks"=>$remarks,
                            "confirmed_by"=>$confirmed_by,
                            "section_chief_position"=>setSectionChief($reqby),
                            "approved_by"=>$approved_by,
                        
                      
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
function setSectionChief($name)
{
    if($name == 'cmfiscal' || $name == 'ctronquillo' || $name == 'sglee')
    {
        return 'Chief, GSS Section';
    }else if($name == 'hpsolis' || $name == 'caporras' || $name == 'jrsilva')
    {
        return 'SAO, Personnel Section';
    }
}
    


// $PHPJasperXML->debugsql=true;


$PHPJasperXML->load_xml_file("view.jrxml");
$PHPJasperXML->transferDBtoArray('localhost','fascalab_2020','w]zYV6X9{*BN','fascalab_2020');
$PHPJasperXML->outpage("I");    //page output method I:standard output  D:Download file


?>
