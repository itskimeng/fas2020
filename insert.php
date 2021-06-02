<?php
$flag = getStartDate('2021-05-01');
if($flag ==1)
{
    echo $flag;
}else{
echo 'a';
}
function getStartDate($date){
    include 'conn.php';
    $sqlcheck = mysqli_query($conn, "SELECT start, end, title FROM `events` where MONTH(start) = '05'");
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
    for($i=0; $i< $row_count; $i++){
        if($aryRange[$i] == $date)
        {
           $flag = true;
            break;
        }else{
            $flag = false;
            break;
        }
           }
    }
    return $flag;
}
?>



