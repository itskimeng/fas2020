
<?php
$con = mysqli_connect("localhost","calaba9_intra","{^-LouqU_vpV", "calaba9_intranetdb");

$directory = "files/";
  $sql = "SELECT * FROM `tblrecords` AS `ud` LEFT JOIN `tblrouting` AS `u` ON `u`.`RECORD_N` = `ud`.`RECORD_N` 
  LEFT JOIN  `tblpersonneldivision` AS `ude` ON `u`.`ROUTED_TO` = `ude`.`DIVISION_N`
  LEFT JOIN `tblpersonneldivision` AS  `udf` ON  `u`.`ROUTED_FROM` = `udf`.`DIVISION_N` 
  LEFT JOIN `tblrecordsources` AS `udg` ON `ud`.`SOURCE` = `udg`.`SOURCE_N`
  LEFT JOIN `tblrecordcategory` AS `udh` ON `ud`.`CATEGORY` = `udh`.`CATEGORY_N` WHERE  `date_routed` BETWEEN '2018-01-01' AND '2019-01-01'
   GROUP BY ud.RECORD_N";
  $result = mysqli_query($con, $sql);
while($row = mysqli_fetch_array($result))
  {
    $query = "DELETE FROM tblrecords WHERE md5(RECORD_N) = '" . md5($row['RECORD_N']) . "' LIMIT 1";
    $filecheckQuery = "select * from tblrecordfiles where md5(RECORD_N)='" . md5($row['RECORD_N']) . "'";
  
    $result1 = mysqli_query($con, $filecheckQuery);

      while($delrow = mysqli_fetch_array($filecheckQuery))
      {
          if (file_exists($directory . $delrow['FILE_PATH'])) 
          unlink($directory. $delrow['FILE_PATH']);
          echo "Record No:".$row['RECORD_N'].'deleted';

      }

    }
mysqli_close($conn);

// ================================================
?>
