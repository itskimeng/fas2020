<?php
 $a = checkConflictDate('2021-04-30','2021-05-10', '2021-05-02','');

// function getStartDate($date){
//     include 'conn.php';
//     $sqlcheck = mysqli_query($conn, "SELECT start, end, title FROM `events` where MONTH(start) = '05'");
//     if (mysqli_num_rows($sqlcheck) > 0) { 
//     while ($row = mysqli_fetch_array($sqlcheck)) {
//         $a = checkConflictDate($row['start'], $row['end'], $date, '');
//         if($a == 'conflict'){
//             echo 'd';
//             break;
//         }else{
//             echo 'proceed';
//             break;
//         }
//     }
//     }


// return $a;
// }

function checkConflictDate($strDateFrom, $strDateTo, $strDateSave, $flag)
{
    $aryRange = [];
    $iDateFrom = mktime(1, 0, 0, substr($strDateFrom, 5, 2), substr($strDateFrom, 8, 2), substr($strDateFrom, 0, 4));
    $iDateTo = mktime(1, 0, 0, substr($strDateTo, 5, 2), substr($strDateTo, 8, 2), substr($strDateTo, 0, 4));
    if ($iDateTo >= $iDateFrom) {
        array_push($aryRange, date('Y-m-d', $iDateFrom)); // first entry
        while ($iDateFrom < $iDateTo) {
            $iDateFrom += 86400; // add 24 hours
            array_push($aryRange, date('Y-m-d', $iDateFrom));
        }
    }
    for ($i=0; $i < count($aryRange) ; $i++) { 
        
        if($aryRange[$i] == $strDateSave)
        {
            echo 'conflict found'.'<br>';
        }else{
            echo $aryRange[$i].'<br>';
          

        }
    }
 

    return $flag;
}
?>
