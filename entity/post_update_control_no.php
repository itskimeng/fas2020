<?php 
 
$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");

              if(mysqli_connect_errno()){echo mysqli_connect_error();}  


              $query = "SELECT ID, YEAR(REQ_DATE) AS year , MONTH(REQ_DATE) AS month ,req_date,CONTROL_NO FROM tbltechnical_assistance where REQ_DATE >= '2021-06-15'";
              $name = '';
              $result = mysqli_query($conn, $query);
              $val = array();
              $i=1;
              while($row = mysqli_fetch_array($result))
              {
              	$cn = str_pad($i, 4, "0", STR_PAD_LEFT);
              	if($row['month'] < 10)
              	{
              		$month = '0'.$row['month'];
              	}
               $new_cn = 'R4A'.'-'.$row['year'].'-'.$month.'-'.''.$cn;

                $query = mysqli_query($conn,  "UPDATE tbltechnical_assistance SET CONTROL_NO = '".$new_cn."'  WHERE id = '".$row['ID']."' ");
               echo "UPDATE tbltechnical_assistance SET CONTROL_NO = '".$new_cn."'  WHERE id = '".$row['ID']."' ".'<br>';
                $i++;
              }

?>