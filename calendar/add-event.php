<?php
session_start();
date_default_timezone_set('Asia/Manila');

require_once "db.php";

$title      =       isset($_POST['title']) ? $_POST['title'] : "";
$start      =       isset($_POST['start']) ? $_POST['start'] : "";
$startdate  =       date('Y-m-d',strtotime($_POST['startdatetxtbox']));
$enddate    =       date('Y-m-d',strtotime($_POST['enddatetxtbox']));
$description=       $_POST['descriptiontxtbox'];
$venue      =       $_POST['venuetxtbox']; 
$enp        =       $_POST['enptxtbox'];
$title      =       $_POST['titletxtbox'];
$color      =       $_POST['colortxtbox'];
$end        =       isset($_POST['end']) ? $_POST['end'] : "";
$starttime  =       date("H:i:s", mktime(0, 0, 0));
$endtime    =       date("H:i:s", mktime(0, 0, 0));
$today      =       date("Y-m-d h:i:s"); 
$startdatetime =    $startdate . "\n" . $starttime;
$postedby   =       $name;
$posteddate =       $today;
$realenddate=       $enddate . "\n" . $endtime;

$dateplusone=       new DateTime($realenddate);
$dateplusone->modify('+12');
$enddatetime=       $dateplusone->format('Y-m-d h:i:s');
$remarks    =       $_POST['remarks'];
$datetime1  =       strtotime($startdatetime);
$datetime2  =       strtotime($enddatetime);
$secs       =       $datetime2 - $datetime1;
$days       =       $secs / 86400;
$cancelflag =       0;
$office     =       $_SESSION['division'];
$currentuser=       $_SESSION['currentuser'];
$program    =       isset($_POST['program']) ? $_POST['program'] : "";
$is_proceed =       '';

// date('Y-m-d',strtotime('04/30/2020' . ' +1 day'));
if($office == 2 || $office == 3 || $office == 5 || $office == 25 )
{
    $office = 1;//ord
}

if($office == 7)
{
    $office = 7;//mbrtg
}
if($office == 9)
{
    $office = 9;//pdmu
}
if($office == 10 || $office == 11 || $office == 12 || $office == 13 || $office == 14 || $office == 15 || $office == 16 ||$office == 26 ||  $office == 54 )
{
    $office = 10;//fad
}
if($office == 17 || $office == 8)
{
    $office = 17;//lgcdd
}   
if($office == 18)
{
    $office = 18;//lgmed
}
if($office == 20 || $office == 34 || $office == 35 || $office == 36 || $office == 45)
{
    $office = 20;//cavite
}
if($office == 21 || $office == 40 || $office == 41 || $office == 42 || $office== 47 || $office == 51 || $office==52 )
{
    $office = 21;//laguna
}
if($office == 19 || $office == 28 || $office == 29 || $office == 30 || $office == 44)
{
    $office = 19;//batangas
}
if($office == 23 || $office == 37 || $office == 38 || $office == 39 || $office == 46 || $office == 50)
{
    $office = 23;//rizal
}
if($office == 22 || $office == 31 || $office == 32 || $office == 33 || $office == 48 || $office == 49 || $office == 53)
{
    $office = 22;//Quezon
}
if($office == 24)
{
    $office = 24;   
}
// check before saving activity if there is conflict with date.
$flag = getStartDate($conn,'2021-05-01');



function getCodeSeries($conn, $id) {
    $data= [];
    $sql = "SELECT year, parent, child FROM conf_code_series where id = '".$id."'";

    $result = mysqli_query($conn, $sql);
    $result = mysqli_fetch_array($result);

    $data['parent'] = '0001' + $result['parent'];
    $data['year'] = $result['year'];

    if (strlen($data['parent']) == 1) {
        $data['parent'] = "000".$data['parent'];
    } else if (strlen($data['parent']) == 2) {
        $data['parent'] = "00".$data['parent'];
    } else if (strlen($data['parent']) == 3) {
        $data['parent'] = "0".$data['parent'];
    }

    return $data;
}  

function setCodeSeries($conn, $id, $parent) {
    $sql = "UPDATE conf_code_series SET parent = ".$parent." where id = '".$id."'";

    $result = mysqli_query($conn, $sql);
    
    return $result;
}  

function getStartDate($conn,$date){
    $date_format = date('m',strtotime($date));
    $sqlcheck = mysqli_query($conn, "SELECT start, end, title FROM `events` where MONTH(start) = $date_format ");
    if (mysqli_num_rows($sqlcheck) > 0) { 
        $row_count = 0;
    while ($row = mysqli_fetch_array($sqlcheck)) {
        $row_count = mysqli_num_rows($sqlcheck);

        $aryRange = [];
        $strDateFrom = $row['start'];
        
        $strDateTo = $row['end'];

     $iDateFrom = mktime(1, 0, 0, substr($strDateFrom, 5, 2), substr($strDateFrom, 8, 2), substr($strDateFrom, 0, 4));
     $iDateTo = mktime(1, 0, 0, substr($strDateTo, 5, 2), substr($strDateTo, 8, 2), substr($strDateTo, 0, 4));
     if ($iDateTo >= $iDateFrom) {
         array_push($aryRange, date('Y-m-d', $iDateFrom)); // first entry
         while ($iDateFrom < $iDateTo) {
             $iDateFrom += 86400; // add 24 hours
             array_push($aryRange, date('Y-m-d', $iDateFrom));
         }
      
    }

    }

    for($i=0; $i < count($aryRange); $i++){
        if($aryRange[$i] == $date)
        {
           $flag = 1;
            break;
        }else{
            $flag = 0;
            break;
        }

           }
    }
    return $flag;
}

if($flag == 1)
{
    //header('location:../ViewCalendar.php?division='.$_SESSION['division'].'&flag=0');

}else{

    


    $code_series = getCodeSeries($conn, $program);

    $lap_code = $program.$code_series['year'] .'-'.$code_series['parent'];
    
    
    $sql = "INSERT IdNTO events 
    (office,title, 
    color, start, 
    end, description, 
    venue, enp, 
    postedby, posteddate, 
    realenddate, cancelflag, 
    status,remarks, code_series, program) 
    VALUES 
    ('$office','$title','$color','$startdatetime','$realenddate','$description','$venue','$enp','$currentuser','$posteddate','$realenddate','$cancelflag','1','$remarks', '$lap_code', '$program')";
    
    $result = mysqli_query($conn, $sql);
    
    setCodeSeries($conn, $program, $code_series['parent']);
    
    if (! $result) {
        $result = mysqli_error($conn);
    }
    //header('location:../ViewCalendar.php?division='.$_SESSION['division'].'&flag=1');

    
}



?>
