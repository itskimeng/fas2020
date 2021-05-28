<?php
date_default_timezone_set('Asia/Manila');
include('functions.php');
$connect = new PDO("mysql:host=localhost;dbname=fascalab_2020", "fascalab_2020", "w]zYV6X9{*BN");
$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
$rfq_id = $_GET['rfq_id'];
$rfq_items_id = $_GET['rfq_items'];
$remarks = $_GET['remarks'];
$date_opened1 = $_GET['date_opened'];
$supplier_id_create = $_GET['supplier_id_create'];
$abstract_no = $_GET['abstract_no'];
$supplier_title_c = $_GET['supplier_title_c'];
$date_opened = date("m/d/Y",strtotime($date_opened1));
$date_opened2 = date("H:i",strtotime($date_opened1));
$date =  date("m/d/Y") ;
$time =  date("H:i") ;
function Allsupplier($connect)  
{ 
  $output = '';
  $query = "SELECT * FROM supplier GROUP BY supplier_title ASC ";
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
    $output .= '<option text="text" value="'.$row["id"].'">'.$row["supplier_title"].'</option>';
  }
  return $output;
}

function supplier($connect)
{ 
  $conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
  $rfq_id = $_GET['rfq_id'];
  $SELECT_rfq = mysqli_query($conn,"SELECT * FROM rfq_items WHERE rfq_id = $rfq_id");
  $rowR = mysqli_fetch_array($SELECT_rfq);
  $rid = $rowR['id'];

  $output = '';
  $query = "SELECT sq.supplier_id,rq.rfq_id,sq.id,s.supplier_title,s.supplier_address,s.contact_details,s.remarks FROM supplier s LEFT JOIN supplier_quote sq on s.id = sq.supplier_id LEFT JOIN rfq_items rq on rq.id = sq.rfq_item_id WHERE sq.rfq_item_id = $rid ";
  $statement = $connect->prepare($query);
  $statement->execute();
  $result = $statement->fetchAll();
  foreach($result as $row)
  {
    $output .= '<option text="text" value="'.$row["supplier_id"].'">'.$row["supplier_title"].'</option>';
  }
  return $output;
}



function table($pr_no){
  $conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
  $rfq_id = $_GET['rfq_id'];

   $select_items_sup = mysqli_query($conn,"SELECT app.procurement,rq.id FROM rfq_items rq LEFT JOIN app on app.id = rq.app_id WHERE rq.rfq_id = $rfq_id");
//   $select_items_sup = mysqli_query($conn," SELECT app.procurement,rfq_items.id  FROM pr_items 

//   LEFT JOIN rfq_items on rfq_items.pr_no = pr_items.pr_no
//   LEFT JOIN app on app.id = rfq_items.app_id
//   WHERE pr_items.pr_no = '$pr_no' GROUP by app.procurement order by id");

 

  //  $select_items_sup = mysqli_query($conn,"SELECT pr.id,item.item_unit_title,app.procurement,pr.unit,pr.qty,pr.abc FROM 
  //  pr_items pr 
  //  LEFT JOIN app on app.id = pr.items 
  //  left join item_unit item on item.id = pr.unit 
  //  WHERE pr_no = '$pr_no'");


  while ($row_sup1 = mysqli_fetch_assoc($select_items_sup)) {
    $procurement_sup = $row_sup1['procurement'];
    $item_id_sup = $row_sup1['id'];

    echo   '<table id="example1" class="table table-bordered-striped table-bordered " style="width:;background-color: white;">
    <thead>
    <tr style="background-color: white;color:black;">
    <th>Item</th>
    <th>Price per Unit</th>
    </tr>
    </thead>' ;

    echo  '<td width="400">';
    echo $procurement_sup;
    echo '</td>';
    echo '<td hidden><textarea id="remarks_sup" name="remarks_sup[]">';
    echo $procurement_sup;    
    echo '</textarea></td>';
    echo '<td hidden><textarea id="item_id_sup" name="item_id_sup[]">';
    echo $item_id_sup;    
    echo '</textarea></td>';
    echo  '<td>
    <input type="text" required id="ppu_sup" name="ppu_sup[]" class="form-control col-md-6" onCopy="return false" onDrag="return false" onDrop="return false" onPaste="return false" onKeyPress="return dec(event)" >
    </td>';
  }
  echo '</table>';
}
$pr_no = '';
$select = mysqli_query($conn,"SELECT rfq.rfq_date,rfq.rfq_no,rfq.purpose,pr.pmo,rfq.pr_no,rfq.pr_received_date FROM rfq LEFT JOIN pr on pr.pr_no = rfq.pr_no WHERE rfq.id = '$rfq_id' ");
$row = mysqli_fetch_array($select);
$rfq_no = $row['rfq_no'];
$rfq_date = $row['rfq_date'];
$purpose = $row['purpose'];
$pmo = $row['pmo'];
$pr_no = $row['pr_no'];
$pr_date = $row['pr_received_date'];

// $select_abs_latest = mysqli_query($conn,"SELECT ")

$idGet='';
$getDate = date('Y');
$m = date('m');
$auto = mysqli_query($conn,"SELECT max(id)+3 as a FROM abstract_of_quote order by id desc limit 1");
while ($row = mysqli_fetch_assoc($auto)) {
  $idGet = $row["a"];
}
// $autoNo = $getDate.'-'.$m.'-'.$idGet;
$autoNo = $getDate.'-'.$idGet;


?>
<?php
if (isset($_POST['submit'])) {
  $abstract_no = $_POST['abstract_no'];
  $supplier_id = $_POST['supplier_id_create'];
  $date_opened1 = $_POST['date_opened'];
  $time_opened = $_POST['time_opened'];
  $date_opened = date('Y-m-d H:i:s', strtotime("$date_opened1 $time_opened"));
  $remarks = $_POST['remarks'];

  $ifExist = mysqli_query($conn,"SELECT aoq_no FROM aoq_data WHERE aoq_no = '$abstract_no'");

  if (mysqli_num_rows($ifExist)>0) {
    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Abstract No. is already Exist!')
      </SCRIPT>");
  }else{
    $INSERT_aoq = mysqli_query($conn,"INSERT INTO aoq_data(aoq_no,action_officer,datetime_created,date,remarks) VALUES('$abstract_no',14,'$date_opened','$date_opened','$remarks')");

    $selectT = mysqli_query($conn,"SELECT id FROM aoq_data ORDER BY id DESC LIMIT 1 ");
    $rowT = mysqli_fetch_array($selectT);
    $aoq_id = $rowT['id'];

    $UPDATE = mysqli_query($conn,"UPDATE abstract_of_quote SET abstract_no = '$aoq_id' WHERE rfq_id = $rfq_id AND supplier_id = $supplier_id");


    $select_rid = mysqli_query($conn,"SELECT id FROM rfq_items WHERE rfq_id = $rfq_id");
    while ($rowRID = mysqli_fetch_assoc($select_rid)){
      $ritemsid = $rowRID['id'];

      $selectsq = mysqli_query($conn,"SELECT id FROM supplier_quote WHERE rfq_item_id = $ritemsid AND supplier_id = $supplier_id");
      $rowsqq = mysqli_fetch_array($selectsq);
      $supplier_quote_id = $rowsqq['id'];

      $INSERT_selected = mysqli_query($conn,"INSERT INTO selected_quote(rfq_id,supplier_quote_id,aoq_id) VALUES('$rfq_id','$supplier_quote_id','$aoq_id')");

    }

    $selectAOQ = mysqli_query($conn,"SELECT id FROM aoq_data WHERE aoq_no = '$abstract_no' ");
    $rowAOQ = mysqli_fetch_array($selectAOQ);
    $aoqID =$rowAOQ['id'];

    $selectabsid = mysqli_query($conn,"SELECT id FROM abstract_of_quote WHERE abstract_no = $aoqID AND rfq_id = $rfq_id ORDER BY id DESC");
    $rowabsid = mysqli_fetch_array($selectabsid);
    $abstract_id = $rowabsid['id'];

    echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Successfuly Created!')
      window.location.href='UpdateAoq.php?rfq_id=$rfq_id&abstract_id=$abstract_id&supplier_id=$supplier_id&rfq_items_id=$rfq_items_id';
      </SCRIPT>");
  }
}
 // insert suppliers quote 
if (isset($_POST['insert_supplierQ'])) {
  $supplier_id_show = $_POST['supplier_id_show'];
  $item_id_sup = $_POST['item_id_sup'];
  $ppu_sup = $_POST['ppu_sup'];
  $remarks_sup = $_POST['remarks_sup'];

  for($count = 0; $count < count($_POST["ppu_sup"]); $count++){
    $ppu_sup = $_POST['ppu_sup'][$count]; 
    $remarks_sup = $_POST['remarks_sup'][$count]; 
    $item_id_sup = $_POST['item_id_sup'][$count]; 

    $INSERT = mysqli_query($conn,"INSERT INTO supplier_quote(id,supplier_id,rfq_item_id,ppu,remarks) VALUES(null,'$supplier_id_show','$item_id_sup','$ppu_sup','$remarks_sup')");
    if ($INSERT) {

      echo ("<SCRIPT LANGUAGE='JavaScript'>
        window.alert('Supplier Quote Created!')
        window.location.href='CreateAoq.php?rfq_id=$rfq_id&rfq_items=$rfq_items_id';
        </SCRIPT>");

    }else{
     echo ("<SCRIPT LANGUAGE='JavaScript'>
      window.alert('Error Occured!');
      </SCRIPT>");


   }

 }

 $insertAOQ = mysqli_query($conn,"INSERT INTO abstract_of_quote(supplier_id,rfq_id) VALUES('$supplier_id_show','$rfq_id')");




}


if (isset($_POST['create'])) {
  $abstract_no = $_POST['abstract_no'];
  $supplier_id_create = $_POST['supplier_id_create'];
  $date_opened = $_POST['date_opened'];
  $remarks = $_POST['remarks'];


  $selec_sup_title = mysqli_query($conn,"SELECT supplier_title FROM supplier WHERE id = $supplier_id_create");
  $rowsupt = mysqli_fetch_array($selec_sup_title);
  $supplier_title_c = $rowsupt['supplier_title'];

  echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.location.href='CreateAoq.php?rfq_id=$rfq_id&rfq_items=$rfq_items_id&remarks=$remarks&date_opened=$date_opened&supplier_id_create=$supplier_id_create&abstract_no=$abstract_no&supplier_title_c=$supplier_title_c';
    </SCRIPT>");




}

if(isset($_POST['create1']))
{
 
  $abstract_no = $_POST['abstract_no'];
  $supplier_id = $_POST['supplier_id_create'];
  $date_opened1 = $_POST['date_opened'];
  $time_opened = $_POST['time_opened'];
  $date_opened = date('Y-m-d H:i:s', strtotime("$date_opened1 $time_opened"));
  $remarks = $_POST['remarks'];

    $INSERT_aoq = mysqli_query($conn,"INSERT INTO aoq_data(aoq_no,action_officer,datetime_created,date,remarks) VALUES('$abstract_no',14,'$date_opened','$date_opened','$remarks')");
// echo "INSERT INTO aoq_data(aoq_no,action_officer,datetime_created,date,remarks) VALUES('$abstract_no',14,'$date_opened','$date_opened','$remarks')";
// exit();
}

if (isset($_POST['update_changes'])) {
  $supplier_id_update = $_POST['supplier_id_update'];
  $suppQ_id = $_POST['suppQ_id'];
  $ppu = $_POST['ppu'];
  $remarks = $_POST['remarks'];

   for($count = 0; $count < count($_POST["ppu"]); $count++){
        $ppu = $_POST['ppu'][$count]; 
        $remarks = $_POST['remarks'][$count]; 
        $suppQ_id = $_POST['suppQ_id'][$count]; 

        
  $INSERT = mysqli_query($conn,"UPDATE supplier_quote SET ppu = '$ppu',supplier_id = '$supplier_id_update' WHERE id = $suppQ_id");

  if ($INSERT) {
   echo ("<SCRIPT LANGUAGE='JavaScript'>
    window.alert('Supplier Qoute Updated!')
    window.location.href='CreateAoq.php?rfq_id=$rfq_id&rfq_items=$rfq_items_id';
    </SCRIPT>");
 }else{

 }

 $update = mysqli_query($conn,"UPDATE abstract_of_quote SET supplier_id = $supplier_id WHERE supplier_id = $supplier_id AND rfq_id = $rfq_id");
}
}

 // S U P P L I E R S     Q U O T E      Q U E R Y


$sql = mysqli_query($conn, "SELECT rq.id FROM rfq_items rq LEFT JOIN app on app.id = rq.app_id LEFT JOIN item_unit iu on iu.id = rq.unit_id WHERE rq.rfq_id = '$rfq_id' ");
$row = mysqli_fetch_array($sql);
$rid = $row['id'];

$suppliers1 = mysqli_query($conn, "SELECT sq.id,s.id as sid,s.supplier_title FROM supplier s LEFT JOIN supplier_quote sq on sq.supplier_id = s.id LEFT JOIN rfq_items rq on rq.id = sq.rfq_item_id WHERE sq.rfq_item_id = $rid  ");
$rowS1 = mysqli_fetch_assoc($suppliers1);
$supplier_title1 = $rowS1['supplier_title'];
$sid1 = $rowS1['sid'];

$suppliers2 = mysqli_query($conn, "SELECT s.id,rq.rfq_id,sq.id,s.id as sid,s.supplier_title,s.supplier_address,s.contact_details,s.remarks FROM supplier s LEFT JOIN supplier_quote sq on sq.supplier_id = s.id LEFT JOIN rfq_items rq on rq.id = sq.rfq_item_id WHERE sq.rfq_item_id = $rid  AND s.supplier_title != '$supplier_title1' ");
$rowS2 = mysqli_fetch_assoc($suppliers2);
$supplier_title2 = $rowS2['supplier_title'];
$sid2 = $rowS2['sid'];


$suppliers3 = mysqli_query($conn, "SELECT s.id,rq.rfq_id,sq.id,s.id as sid,s.supplier_title,s.supplier_address,s.contact_details,s.remarks FROM supplier s LEFT JOIN supplier_quote sq on sq.supplier_id = s.id LEFT JOIN rfq_items rq on rq.id = sq.rfq_item_id WHERE sq.rfq_item_id = $rid  AND s.id != $sid1 AND s.id != $sid2 ");
$rowS3 = mysqli_fetch_assoc($suppliers3);
$supplier_title3 = $rowS3['supplier_title'];
$sid3 = $rowS3['sid'];

$suppliers4 = mysqli_query($conn, "SELECT s.id,rq.rfq_id,sq.id,s.id as sid,s.supplier_title,s.supplier_address,s.contact_details,s.remarks FROM supplier s LEFT JOIN supplier_quote sq on sq.supplier_id = s.id LEFT JOIN rfq_items rq on rq.id = sq.rfq_item_id WHERE sq.rfq_item_id = $rid  AND s.id != $sid1 AND s.id != $sid2 AND s.id != $sid3");
$rowS4 = mysqli_fetch_assoc($suppliers4);
$supplier_title4 = $rowS4['supplier_title'];
$sid4 = $rowS4['sid'];

$sql_items = mysqli_query($conn, "SELECT sq.ppu,rq.id,app.procurement,rq.description,rq.qty,rq.abc,iu.item_unit_title 
FROM rfq_items rq 
LEFT JOIN app on app.id = rq.app_id 
LEFT JOIN item_unit iu on iu.id = rq.unit_id 
LEFT JOIN  supplier_quote sq on sq.rfq_item_id = rq.id  
WHERE rq.rfq_id = '$rfq_id' AND sq.supplier_id = $sid1 ");



$sql_items1 = mysqli_query($conn, "SELECT sq.ppu,rq.id,app.procurement,rq.description,rq.qty,rq.abc,iu.item_unit_title 
FROM rfq_items rq LEFT JOIN app on app.id = rq.app_id 
LEFT JOIN item_unit iu on iu.id = rq.unit_id 
LEFT JOIN  supplier_quote sq on sq.rfq_item_id = rq.id  
WHERE rq.rfq_id = '$rfq_id' AND sq.supplier_id = $sid1 ");

$sql_items11 = mysqli_query($conn, "SELECT sum(sq.ppu * rq.qty) as totalppu,rq.id,app.procurement,rq.description,rq.qty,rq.abc,iu.item_unit_title 
FROM rfq_items rq 
LEFT JOIN app on app.id = rq.app_id 
LEFT JOIN item_unit iu on iu.id = rq.unit_id 
LEFT JOIN  supplier_quote sq on sq.rfq_item_id = rq.id  
WHERE rq.rfq_id = '$rfq_id' AND sq.supplier_id = $sid1 ");

$rowtots11 = mysqli_fetch_array($sql_items11);
$totsppu11 = $rowtots11['totalppu'];

$sql_items2 = mysqli_query($conn, "SELECT sq.ppu,rq.id,app.procurement,rq.description,rq.qty,rq.abc,iu.item_unit_title FROM rfq_items rq LEFT JOIN app on app.id = rq.app_id LEFT JOIN item_unit iu on iu.id = rq.unit_id LEFT JOIN  supplier_quote sq on sq.rfq_item_id = rq.id  WHERE rq.rfq_id = '$rfq_id' AND sq.supplier_id = $sid2 ");

$sql_items22 = mysqli_query($conn, "SELECT sum(sq.ppu * rq.qty) as totalppu,rq.id,app.procurement,rq.description,rq.qty,rq.abc,iu.item_unit_title FROM rfq_items rq LEFT JOIN app on app.id = rq.app_id LEFT JOIN item_unit iu on iu.id = rq.unit_id LEFT JOIN  supplier_quote sq on sq.rfq_item_id = rq.id  WHERE rq.rfq_id = '$rfq_id' AND sq.supplier_id = $sid2 ");
$rowtots22 = mysqli_fetch_array($sql_items22);
$totsppu22 = $rowtots22['totalppu'];

$sql_items3 = mysqli_query($conn, "SELECT sq.ppu,rq.id,app.procurement,rq.description,rq.qty,rq.abc,iu.item_unit_title FROM rfq_items rq LEFT JOIN app on app.id = rq.app_id LEFT JOIN item_unit iu on iu.id = rq.unit_id LEFT JOIN  supplier_quote sq on sq.rfq_item_id = rq.id  WHERE rq.rfq_id = '$rfq_id' AND sq.supplier_id = $sid3 ");

$sql_items33 = mysqli_query($conn, "SELECT sum(sq.ppu * rq.qty) as totalppu,rq.id,app.procurement,rq.description,rq.qty,rq.abc,iu.item_unit_title FROM rfq_items rq LEFT JOIN app on app.id = rq.app_id LEFT JOIN item_unit iu on iu.id = rq.unit_id LEFT JOIN  supplier_quote sq on sq.rfq_item_id = rq.id  WHERE rq.rfq_id = '$rfq_id' AND sq.supplier_id = $sid3 ");
$rowtots33 = mysqli_fetch_array($sql_items33);
$totsppu33 = $rowtots33['totalppu'];

$sql_items4 = mysqli_query($conn, "SELECT sq.ppu,rq.id,app.procurement,rq.description,rq.qty,rq.abc,iu.item_unit_title FROM rfq_items rq LEFT JOIN app on app.id = rq.app_id LEFT JOIN item_unit iu on iu.id = rq.unit_id LEFT JOIN  supplier_quote sq on sq.rfq_item_id = rq.id  WHERE rq.rfq_id = '$rfq_id' AND sq.supplier_id = $sid4 ");

$sql_items44 = mysqli_query($conn, "SELECT sum(sq.ppu * rq.qty) as totalppu,rq.id,app.procurement,rq.description,rq.qty,rq.abc,iu.item_unit_title FROM rfq_items rq LEFT JOIN app on app.id = rq.app_id LEFT JOIN item_unit iu on iu.id = rq.unit_id LEFT JOIN  supplier_quote sq on sq.rfq_item_id = rq.id  WHERE rq.rfq_id = '$rfq_id' AND sq.supplier_id = $sid4 ");
$rowtots44 = mysqli_fetch_array($sql_items44);
$totsppu44 = $rowtots44['totalppu'];


$select_rfqitems = mysqli_query($conn,"SELECT id,rfq_id FROM rfq_items WHERE id = $rfq_items_id");
$r1 = mysqli_fetch_array($select_rfqitems);
$rfqitemsid = $r1['id'];
$rfqid = $r1['rfq_id'];
$select_rfq1= mysqli_query($conn,"SELECT rfq_no,rfq_date FROM rfq WHERE id = $rfqid");
$r11 = mysqli_fetch_array($select_rfq1);
$rfqno = $r11['rfq_no'];
$rfqdate1 = $r11['rfq_date'];
$rfqdate = date('F d, Y', strtotime($rfqdate1));

$view_query_sup = mysqli_query($conn, "SELECT sq.rfq_item_id,sq.supplier_id,rq.rfq_id,sq.id,s.supplier_title,s.supplier_address,s.contact_details,s.remarks 
FROM supplier s 
LEFT JOIN supplier_quote sq on s.id = sq.supplier_id 
LEFT JOIN rfq_items rq on rq.id = sq.rfq_item_id 
WHERE sq.rfq_item_id = $rfqitemsid ");
// $view_query_sup1 = mysqli_query($conn, "SELECT sum(sq.ppu) as ppu,sq.supplier_id,rq.rfq_id,sq.id,s.supplier_title,s.supplier_address,s.contact_details,s.remarks FROM supplier s LEFT JOIN supplier_quote sq on s.id = sq.supplier_id LEFT JOIN rfq_items rq on rq.id = sq.rfq_item_id WHERE sq.rfq_item_id = $rfqitemsid ");
// while ($rowppu = mysqli_fetch_assoc($view_query_sup1)) {
//   $ppu_total = 
// }

$selectRFQ = mysqli_query($conn,"SELECT rfq_id FROM rfq_items WHERE id = $rfq_items_id");
$rowRFQ = mysqli_fetch_array($selectRFQ);
$rfq_id1 = $rowRFQ['rfq_id'];

?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<div class="row">
  <div class="col-md-8">
    <div class="box">
      <div class="box-header with-border" align="left">
        <div class="col-md-11">
          <h1>Awarding of RFQ No. &nbsp <?php echo $rfq_no;?></h1>
        </div>
      </div>
      <div class="box-body table-responsive no-padding">
        <div class="box-body">
          <h4>Item(s)</h4>
          <table id="" class="table table-striped table-bordered" style="background-color: white;">
            <thead>
              <tr style="background-color: white;color:blue;">
                <th width="500">Item</th>
                <th width="500">Quantity</th>
                <th width="500">Unit</th>
                <th width="500">Unit Cost</th>
                <th width="500">Total Cost</th>
              </tr>
            </thead>
            <?php 
            $view_query1 = mysqli_query($conn, "SELECT  sum(abc*qty) as aa from pr_items WHERE pr_no = '$pr_no' ");
            while ($row = mysqli_fetch_assoc($view_query1)) {
              $abc111 = $row["aa"];
            }
            $view_query = mysqli_query($conn, "SELECT pr.id,item.item_unit_title,app.procurement,pr.unit,pr.qty,pr.abc FROM pr_items pr LEFT JOIN app on app.id = pr.items left join item_unit item on item.id = pr.unit WHERE pr_no = '$pr_no' ");
            while ($row = mysqli_fetch_assoc($view_query)) {
              $id = $row["id"];
              $items = $row["procurement"];  
              $unit = $row["item_unit_title"];
              $qty = $row["qty"];
              $abc1 = $row["abc"];
              $abc11 = number_format($abc1,2);
              $total_cost = $qty * $abc1;
              $total_cost11 = number_format($total_cost,2);
              echo "<tr align = ''>
              <td>$items</td>
              <td>$qty</td>
              <td>$unit</td>
              <td>$abc11</td>
              <td>$total_cost11</td>
              </tr>"; 
            }
            ?>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-4">
    <div class="box box-success">
      <div class="box-header with-border" align="left">
        <h4>RFQ Details</h4>
      </div>
      <div class="box-body table-responsive no-padding">
        <div class="box-body">
          <table id="" class="table table-striped " style="background-color: white;">
            <tr>
              <th  class="pull-left text-black">RFQ Date</th>
              <td><?php echo $rfq_date;?></td>
            </tr>
            <tr>
              <th class="pull-left text-black">Purpose</th>
              <td><?php echo $purpose;?></td>
            </tr>
            <tr>
              <th class="pull-left text-black">Office</th>
              <td><?php echo $pmo;?></td>
            </tr>

            <tr>
              <th class="pull-left text-black">PR No.</th>
              <td><?php echo $pr_no;?></td>
            </tr>
            <tr>
              <th class="pull-left text-black"  >PR Date Received</th>
              <td width="200"><?php echo $pr_date;?></td>
            </tr>
            <tr>
              <th  class="pull-left text-black" >ABC</th>
              <td><?php echo number_format($abc111,2);?></td>
            </tr>
          </table>
        </div>
      </div>
    </div>
  </div>
  <div class="col-md-12" >
    <div class="box box-success">
      <div class="box-body table-responsive no-padding">
        <div class="box-body">
          <form method="POST">
            <div class="panel panel-success" id="item_table">
             <div class="panel-heading">
              <i class="fa fa-list-alt"></i> &nbsp&nbsp&nbsp<font style="color:black;font-size: 20px;"><b>Add Supplier Quote</b></font>
              <div class="clearfix"></div>
            </div>
            <p id="alert_message"></p>
            <div class="panel-body container-items">
              <div class=""><!-- widgetBody -->
                <div class="row">
                  <div class="col-md-6 well" style="padding-left: 30px;padding-top:10px;">
                    <div class="form-group">
                      <label>Select Supplier</label>
                      <select required class="form-control select2" style="width: 100%;" autocomplete="off" id="supplier_id_show" name="supplier_id_show" >
                       <option disabled selected></option>
                       <?php echo Allsupplier($connect); ?>
                     </select> 
                   </div>
                   <div class="form-group">
                     <?php echo table($pr_no)?>
                   </div>

                   <button class="btn btn-primary pull-right" id="insert_supplierQ" type="submit" name="insert_supplierQ">Add Quote</button>
                 </form>
               </div>
               <div class="col-md-6">
                <div class="form-group">
                  <table id="example1" class="table table-striped table-bordered" style="width:;background-color: white;">
                    <thead>
                      <tr style="background-color: white;color:blue;">
                        <!-- <th>RFQ No.</th> -->
                        <!-- <th>DATE</th> -->
                        <th width="50">Quote No.</th>
                        <th width="150">Supplier</th>
                        <!-- <th>Remarks</th> -->
                        <th width="120">Action</th>
                      </tr>
                    </thead>

                    <?php
                    $count = 0;
                        # code...

                    while ($row_sup = mysqli_fetch_assoc($view_query_sup)) {
                      $rfq_id_sup = $row_sup["rfq_id"]; 
                      $supplier_id_sup = $row_sup["supplier_id"]; 
                      $ids_sup = $row_sup["id"]; 
                      $supplier_title_sup = $row_sup["supplier_title"];  
                      $supplier_address_sup = $row_sup["supplier_address"];
                      $contact_details_sup = $row_sup["contact_details"];
                      $remarks_sup = $row_sup["remarks"];
                      $rfq_item_id = $row_sup["rfq_item_id"];
                      $count++;
                      ?>
                      <tr>
                        <td><?php echo $count;?></td>
                        <td><?php echo $supplier_title_sup;?></td>
                        <td>
                         <!-- <a class="btn btn-primary btn-xs"  href='UpdateSupplierQuote.php?rfq_id=<?php echo $rfq_id_sup; ?>&supplier_id=<?php echo $supplier_id_sup?>' title="View"><i class="fa fa-fw fa-edit"></i>Edit</a>  -->
                         <!-- <a data-toggle="modal" data-target="#modal-info_<?php echo $row_sup['id']; ?>" class="btn btn-primary btn-xs"><i class="fa fa-edit"></i>Edit</a> -->
                         <a data-toggle="modal"  data-target="#modal-info_<?php echo $row_sup['id']; ?>"   class = "btn btn-primary btn-xs"><i class='fa'>&#xf044;</i>Edit</a>   

                         | <a class="btn btn-danger btn-xs" onclick="return confirm('Are you sure you want to Delete this?');" href='delete_supplier.php?rfq_id=<?php echo $rfq_id; ?>&supplier_id=<?php echo $supplier_id_sup?>&rfq_items_id=<?php echo $rfq_items_id?>' title="View"><i class="fa fa-fw fa-trash"></i>Delete</a>

                       </td>
                     </tr>
                     <div class="modal modal-default fade" id="modal-info_<?php echo $row_sup['id']; ?>">
                      <div class="modal-dialog">
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span></button>
                              <h4 class="modal-title">Edit Supplier</h4>
                            </div>
                            <div class="modal-body">
                              <form method="POST" >
                               <div class="col-md-11">
                                <label>Select Supplier</label>
                                <select class="form-control select2" style="width: 100%;" autocomplete="off"  name="supplier_id_update" >
                                 <option value="<?php echo $supplier_id_sup?>" ><?php echo $supplier_title_sup?></option>
                                 <?php echo Allsupplier($connect); ?>
                               </select> 
                             </div>
                             <br>
                             <br>
                             <br>
                             <br>
                             <?php 
                             $select_items = mysqli_query($conn,"SELECT sq.id,sq.ppu,sq.remarks,app.procurement  FROM supplier_quote sq LEFT JOIN rfq_items rq on rq.id = sq.rfq_item_id LEFT JOIN app on app.id = rq.app_id WHERE rq.rfq_id = $rfq_id AND sq.supplier_id = $supplier_id_sup");
                             while ($row = mysqli_fetch_assoc($select_items)) {
                              $remarks = $row['remarks'];
                              $ppu = $row['ppu'];
                              $suppQ_id = $row['id'];
                              ?>
                              <div class="row">
                                <div hidden>
                                  <input type="text" name="suppQ_id[]" value="<?php echo $suppQ_id?>">
                                </div>
                                <div class="col-md-8">
                                 <div class="form-group" >
                                  <!-- <input type='text'  name='remarks[]' value='<?php echo $remarks?>' class='form-control col-md-6' > -->
                                  <textarea readonly class='form-control col-md-6'><?php echo $remarks?></textarea>
                                  <br>
                                  <br>
                                  <br>
                                  <br>
                                </div>
                              </div>
                              <div class="col-md-3">
                                <div class="form-group" >
                                  <input type='text' name='ppu[]' value='<?php echo $ppu?>' class='form-control col-md-6' >
                                  <br>
                                  <br>
                                </div>
                              </div>
                            </div>


                          <?php } ?>
                        <div style="padding-right: 50px;">
                                <button class="btn btn-primary " style="float: right;" type="submit" name="update_changes">Save Changes</button>
                                <br>
                                <br>
                                <br>
                        </div>
                        </form>
                      </div>
                    </div>
                  <?php } ?>

                </table>

              </div>
            </div>
            <form method="POST">
              <?php if ($supplier_id_create != ''): ?>

               <div class="col-md-3">
                <div class="form-group">
                  <label>Select Supplier</label>
                  <select required class="form-control " style="width: 100%;" autocomplete="off" id="supplier_id_create" name="supplier_id_create" >
                   <option value="<?php echo $supplier_id_create; ?>" selected><?php echo $supplier_title_c; ?></option>
                   <?php echo supplier($connect); ?>
                 </select> 
               </div>
               <div class="form-group">
                 <label>Abstract No.</label>
                 <input required type="text"  name="abstract_no" class="form-control" value="<?php echo $autoNo;?>">
               </div>
             </div>
             <div class="col-md-3">
              <!--  <div class="form-group">
                <label>Date Opened</label>
                <input required type="date" value="<?php echo $date_opened?>" name="date_opened" class="form-control">
              </div> -->
              <div class="form-group">
                  <label>Date Opened</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" name="date_opened" id="datepicker2"  value="<?php echo $date_opened?>" required placeholder="mm/dd/yyyy">
                    </div>
              </div>
              <div class="form-group">
                <label>Time Opened</label>
                <input required type="time" value="<?php echo $date_opened2?>" name="time_opened" class="form-control">
              </div>
              <div class="form-group">
                <label>Remarks</label>
                <textarea class="form-control" name="remarks" rows="8"><?php echo $remarks?></textarea>
              </div>
              <button class="btn btn-primary pull-right" type="submit" name="create1">Create</button>
            </div>

            <?php else: ?>
             <div class="col-md-3">
              <div class="form-group">
                <label>Select Supplier</label>
                <select required class="form-control " style="width: 100%;" autocomplete="off" id="supplier_id_create" name="supplier_id_create" >
                 <option  disabled selected></option>
                 <?php echo supplier($connect); ?>
               </select> 
             </div>
             <div class="form-group">
               <label>Abstract No.</label>
               <input required type="text" name="abstract_no" class="form-control" value="<?php echo $autoNo;?>">
             </div>
           </div>
           <div class="col-md-3">
             <!-- <div class="form-group">
              <label>Date Opened</label>
              <input required type="date" value="<?php echo $date;?>" name="date_opened" class="form-control">
            </div> -->
            <div class="form-group">
                  <label>Date Opened</label>
                  <div class="input-group date">
                    <div class="input-group-addon">
                      <i class="fa fa-calendar"></i>
                    </div>
                    <input type="text" class="form-control pull-right" value="<?php echo $date;?>" name="date_opened" id="datepicker2"  required placeholder="mm/dd/yyyy">
                    </div>
              </div>
            <div class="form-group">
              <label>Time Opened</label>
              <input required type="time" value="<?php echo $time?>" name="time_opened" class="form-control">
            </div>
            <div class="form-group">
              <label>Remarks</label>
              <textarea class="form-control" name="remarks" rows="8"></textarea>
            </div>
            <button class="btn btn-success pull-right" type="submit" name="create">Create Abstract</button>
          </div>

        <?php endif ?>


      </div>
    </div>
  </div>

  <div class="col-md-12" >
    <div class="box box-primary">
      <div class="box-header with-border" align="left">
        <h4>Suppliers Quotations</h4>
      </div>
      <div class="box-body table-responsive no-padding">
        <div class="box-body">
          <!-- S U P P L I E R      1  [PAG DLWA LANG ANG SUPPLIER] -->
          <?php if ($supplier_title3 == ''): ?>
            <div class="box-body">
              <div class="row" id="boxed">
                <div class="col-xs-6">
                  <table id="" class="  table-responsive" style="width:500px;background-color: white;" align="center">
                    <thead>
                      <th style="float: left;" >Item(s)</th>
                      <th style="float: right;" ><?php echo $supplier_title1;?></th>
                    </thead>
                  </table>
                  <table id="" class="table table-striped  table-responsive" style="width:500px;background-color: white;" align="center">
                   <thead >
                    <th style="float: left;">&nbsp</th>
                    <th width="" >&nbsp</th>
                  </thead>   
                  <?php 
                  $b = 1;
                  while($rowrfid1 = mysqli_fetch_assoc($sql_items) ){
                    $qty11 = $rowrfid1['qty'];
                    $ppu11 = $rowrfid1['ppu'];
                    $tpu = $qty11 * $ppu11;
                    $procurement = $rowrfid1['procurement'];
                    $b++;
                    ?>
                    <tr>
                      <td><?php echo $procurement;?></td>
                      <?php if ($supplier_id_create == $sid1): ?>
                        <td><input checked type="radio" name="supplier_id<?php echo $b;?>" value="<?php echo $sid1 ?>"> &nbsp&nbsp
                          <?php echo number_format($tpu,2);?></td>
                          <?php else: ?>
                            <td><input type="radio" name="supplier_id<?php echo $b;?>" value="<?php echo $sid1 ?>"> &nbsp&nbsp
                              <?php echo number_format($tpu,2);?></td>
                            <?php endif ?>
                          </tr>
                        <?php } ?>
                        <thead >
                    <th style="float: left;">Total Quote</th>
                    <th width="" ><?php echo number_format($totsppu11,2)?></th>
                  </thead> 
                      </table>
                    </div>
                    <!-- S U P P L I E R      2  -->
                    <div class="col-xs-6">
                     <table id="example1" class="  table-responsive" style="width:500px;background-color: white;" align="center">
                      <thead style="width:500px;">
                        <th width="" ><?php echo $supplier_title2;?></th>
                      </thead>
                    </table>
                    <table id="example1" class="table table-striped  table-responsive" style="width:500px;background-color: white;" align="center">
                     <thead style="width:500px;">
                      <th width="" >&nbsp</th>
                    </thead>   
                    <?php 
                    $b = 1;
                    while($rowrfid12 = mysqli_fetch_assoc($sql_items2) ){
                      $qty112 = $rowrfid12['qty'];
                      $ppu112 = $rowrfid12['ppu'];
                      $tpu2 = $qty112 * $ppu112;
                      $procurement2 = $rowrfid12['procurement'];
                      $b++;
                      ?>
                      <tr>
                        <?php if ($supplier_id_create == $sid2): ?>
                          <td ><input  checked type="radio" name="supplier_id<?php echo $b;?>" value="<?php echo $sid2 ?>">&nbsp&nbsp
                            <?php echo number_format($tpu2,2);?></td>
                            <?php else: ?>
                              <td ><input  type="radio" name="supplier_id<?php echo $b;?>" value="<?php echo $sid2 ?>">&nbsp&nbsp
                                <?php echo number_format($tpu2,2);?></td>
                              <?php endif ?>
                            </tr>
                          <?php } ?>
                          <thead style="width:500px;">
                      <th width="" ><?php echo number_format($totsppu22,2)?></th>
                    </thead> 
                        </table>
                      </div>
                    </div>
                  </div>
                <?php endif ?>
                <?php if ($supplier_title3 != '' AND $supplier_title4 == ''): ?>

                  <div class="box-body">
                    <div class="row" id="boxed">
                      <!-- P R O C U R E M E N T [PAGE TATLO ANG SUPPIER] -->
                      <div class="col-xs-3">
                        <table id="example1" class="  table-responsive" style="width:300px;background-color: white;">
                          <thead>
                            <th style="float:left ;">Item(s)</th>
                          </thead>
                        </table>
                        <table id="example1" class="table table-striped  table-responsive" style="width:300px;background-color: white;">
                         <thead>
                          <th style="float:left ;" >Total Quote</th>
                        </thead>   
                        <?php 
                        while($rowrfid1 = mysqli_fetch_assoc($sql_items) ){
                          $procurement = $rowrfid1['procurement'];
                          ?>
                          <tr>
                            <td><?php echo $procurement;?></td>
                          </tr>
                        <?php } ?>
                      </table>

                    </div>

                    <!-- S U P P L I E R    1-->
                    <div class="col-xs-3">
                      <table id="example1" class="  table-responsive" style="width:300px;background-color: white;">
                        <thead>
                          <th style="float: ;"><?php echo $supplier_title1;?></th>
                        </thead>
                      </table>
                      <table id="example1" class="table table-striped  table-responsive" style="width:300px;background-color: white;">
                       <thead>
                        <th width="" >&nbsp</th>
                      </thead>   
                      <?php 
                      $b = 1;
                      while($rowrfid1 = mysqli_fetch_assoc($sql_items1) ){
                        $qty11 = $rowrfid1['qty'];
                        $ppu11 = $rowrfid1['ppu'];
                        $tpu = $qty11 * $ppu11;
                        $b++;
                        ?>
                        <tr>
                          <?php if ($supplier_id_create == $sid1): ?>
                            <td><input checked type="radio" name="supplier_id<?php echo $b;?>" value="<?php echo $sid1 ?>"> &nbsp&nbsp
                              <?php echo number_format($tpu,2);?></td>
                              <?php else: ?>
                                <td><input type="radio" name="supplier_id<?php echo $b;?>" value="<?php echo $sid1 ?>"> &nbsp&nbsp
                                  <?php echo number_format($tpu,2);?></td>
                                <?php endif ?>

                              </tr>
                            <?php } ?>
                            <thead>
                        <th width="" ><?php echo number_format($totsppu11,2)?></th>
                      </thead>
                          </table>

                        </div>
                        <!-- S U P P L I E R     2  -->
                        <div class="col-xs-3">
                         <table id="example1" class="  table-responsive" style="width:300px;background-color: white;">
                          <thead>
                            <th  ><?php echo $supplier_title2;?></th>
                          </thead>
                        </table>
                        <table id="example1" class="table table-striped  table-responsive" style="width:400px;background-color: white;">
                         <thead>
                          <th  >&nbsp</th>
                        </thead>   
                        <?php 
                        $b = 1;
                        while($rowrfid12 = mysqli_fetch_assoc($sql_items2) ){
                          $qty112 = $rowrfid12['qty'];
                          $ppu112 = $rowrfid12['ppu'];
                          $tpu2 = $qty112 * $ppu112;
                          $procurement2 = $rowrfid12['procurement'];
                          $b++;
                          ?>
                          <tr >
                            <?php if ($supplier_id_create == $sid2): ?>
                              <td ><input  checked type="radio" name="supplier_id<?php echo $b;?>" value="<?php echo $sid2 ?>">&nbsp&nbsp
                                <?php echo number_format($tpu2,2);?></td>
                                <?php else: ?>
                                  <td ><input  type="radio" name="supplier_id<?php echo $b;?>" value="<?php echo $sid2 ?>">&nbsp&nbsp
                                    <?php echo number_format($tpu2,2);?></td>
                                  <?php endif ?>
                                </tr>
                              <?php } ?>
                               <thead>
                          <th  ><?php echo number_format($totsppu22,2)?></th>
                        </thead>
                            </table>
                          </div>
                          <!-- S U P P L I E R     3  -->
                          <div class="col-xs-3">
                           <table id="example1" class="  table-responsive" style="width:300px;background-color: white;">
                            <thead>
                              <th width="" ><?php echo $supplier_title3;?></th>
                            </thead>
                          </table>
                          <table id="example1" class="table table-striped  table-responsive" style="width:300px;background-color: white;">
                           <thead>
                            <th width="" >&nbsp</th>
                          </thead>   
                          <?php 
                          $b = 1;
                          while($rowrfid13 = mysqli_fetch_assoc($sql_items3) ){
                            $qty113 = $rowrfid13['qty'];
                            $ppu113 = $rowrfid13['ppu'];
                            $tpu3 = $qty113 * $ppu113;
                            $procurement3 = $rowrfid13['procurement'];
                            $b++;
                            ?>
                            <tr>
                              <?php if ($supplier_id_create == $sid3): ?>
                                <td><input checked type="radio" name="supplier_id<?php echo $b;?>" value="<?php echo $sid3 ?>">&nbsp&nbsp
                                  <?php echo number_format($tpu3,2);?></td>
                                  <?php else: ?>
                                   <td><input type="radio" name="supplier_id<?php echo $b;?>" value="<?php echo $sid3 ?>">&nbsp&nbsp
                                    <?php echo number_format($tpu3,2);?></td>
                                  <?php endif ?>
                                </tr>
                              <?php } ?>
                               <thead>
                              <th width="" ><?php echo number_format($totsppu33,2)?></th>
                            </thead>
                            </table>
                          </div>

                        </div>
                      </div>

                    <?php endif ?>
                    <?php if ($supplier_title4 !='' AND $supplier_title3 !=''): ?>
                     <div class="box-body">
                      <div class="row" id="boxed">
                        <!-- S U P P L I E R      1 [PAG APAT ANG SUPPLIER] -->
                        <div class="col-xs-3">
                          <table id="example1" class="  table-responsive" style="width:200px;background-color: white;">
                            <thead>
                              <th width="" ><?php echo $supplier_title1;?></th>
                            </thead>
                          </table>
                          <table id="example1" class="table table-striped  table-responsive" style="width:200px;background-color: white;">
                           <thead>
                            <th style="float:left;" >Total Quote</th>
                            <th width="100" > <?php echo number_format($totsppu11,2)?></th>
                          </thead>   
                          <?php 
                          $b = 1;
                          while($rowrfid1 = mysqli_fetch_assoc($sql_items) ){
                            $ppu11 = $rowrfid1['ppu'];
                            $procurement = $rowrfid1['procurement'];
                            $b++;
                            ?>
                            <tr>
                              <td><?php echo $procurement;?></td>
                              <?php if ($supplier_id_create == $sid1): ?>
                                <td><input type="radio" checked name="supplier_id<?php echo $b;?>" value="<?php echo $sid1 ?>">&nbsp&nbsp<?php echo $ppu11;?></td>
                                <?php else: ?>
                                  <td><input type="radio" name="supplier_id<?php echo $b;?>" value="<?php echo $sid1 ?>">&nbsp&nbsp<?php echo $ppu11;?></td>
                                <?php endif ?>
                              </tr>
                            <?php } ?>
                          </table>

                        </div>
                        <!-- S U P P L I E R     2  -->
                        <div class="col-xs-3">
                         <table id="example1" class="  table-responsive" style="width:200px;background-color: white;">
                          <thead>
                            <th width="" ><?php echo $supplier_title2;?></th>
                          </thead>
                        </table>
                        <table id="example1" class="table table-striped  table-responsive" style="width:200px;background-color: white;">
                         <thead>
                          <th width="" >PPU Total Quote: <?php echo number_format($totsppu22,2)?></th>
                        </thead>   
                        <?php 
                        $b = 1;
                        while($rowrfid12 = mysqli_fetch_assoc($sql_items2) ){
                          $ppu112 = $rowrfid12['ppu'];
                          $procurement2 = $rowrfid12['procurement'];
                          $b++;
                          ?>
                          <tr>
                            <?php if ($supplier_id_create == $sid2): ?>
                              <td><input type="radio" checked name="supplier_id<?php echo $b;?>" value="<?php echo $sid2 ?>">&nbsp&nbsp<?php echo $ppu112;?></td>
                              <?php else: ?>
                                <td><input type="radio" name="supplier_id<?php echo $b;?>" value="<?php echo $sid2 ?>">&nbsp&nbsp<?php echo $ppu112;?></td>
                              <?php endif ?>
                            </tr>
                          <?php } ?>
                        </table>
                      </div>
                      <!-- S U P P L I E R     3  -->
                      <div class="col-xs-3">
                       <table id="example1" class="  table-responsive" style="width:200px;background-color: white;">
                        <thead>
                          <th width="" ><?php echo $supplier_title3;?></th>
                        </thead>
                      </table>
                      <table id="example1" class="table table-striped  table-responsive" style="width:200px;background-color: white;">
                       <thead>
                        <th width="" >PPU Total Quote: <?php echo number_format($totsppu33,2)?></th>
                      </thead>   
                      <?php 
                      $b = 1;
                      while($rowrfid13 = mysqli_fetch_assoc($sql_items3) ){
                        $ppu113 = $rowrfid13['ppu'];
                        $procurement3 = $rowrfid13['procurement'];
                        $b++;
                        ?>
                        <tr>
                          <?php if ($supplier_id_create == $sid3): ?>
                            <td><input type="radio" checked name="supplier_id<?php echo $b;?>" value="<?php echo $sid3 ?>">&nbsp&nbsp<?php echo $ppu113;?></td>
                            <?php else: ?>
                              <td><input type="radio" name="supplier_id<?php echo $b;?>" value="<?php echo $sid3 ?>">&nbsp&nbsp<?php echo $ppu113;?></td>
                            <?php endif ?>
                          </tr>
                        <?php } ?>
                      </table>
                    </div>
                    <!-- S U P P L I E R     4  -->
                    <div class="col-xs-3">
                     <table id="example1" class="  table-responsive" style="width:200px;background-color: white;">
                      <thead>
                        <th width="" ><?php echo $supplier_title4;?></th>
                      </thead>
                    </table>
                    <table id="example1" class="table table-striped  table-responsive" style="width:200px;background-color: white;">
                     <thead>
                      <th width="" >PPU Total Quote: <?php echo number_format($totsppu44,2)?></th>
                    </thead>   
                    <?php 
                    $b = 1;
                    while($rowrfid14 = mysqli_fetch_assoc($sql_items4) ){
                      $ppu114 = $rowrfid14['ppu'];
                      $procurement4 = $rowrfid14['procurement'];
                      $b++;
                      ?>
                      <tr>
                        <?php if ($supplier_id_create == $sid3): ?>
                          <td><input type="radio" checked name="supplier_id<?php echo $b;?>" value="<?php echo $sid4 ?>">&nbsp&nbsp<?php echo $ppu114;?></td>
                          <?php else: ?>
                            <td><input type="radio" name="supplier_id<?php echo $b;?>" value="<?php echo $sid4 ?>">&nbsp&nbsp<?php echo $ppu114;?></td>
                          <?php endif ?>
                        </tr>
                      <?php } ?>
                    </table>
                  </div>
                </div>
              </div>
            <?php endif ?>
          </div>
        </div>
      </div>
      <button class="btn btn-success" name="submit" type="subtmit" >Award</button>
      <!-- <button class="btn btn-success" name="submit" type="subtmi" style="width: 1260px;">Award</button> -->
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
      <br>
    </form>
    <!-- end of div class row -->
  </div>
<!-- <script>
$('#supplier_id_create').on('change', function() {
  alert( this.value );
});
</script> -->
<!-- <script>  
  $(document).on('click', '#insert_supplierQ', function(){
   var supplier_id_show = $('#supplier_id_show').val();
   var remarks_sup = $('#remarks_sup').val();
   var item_id_sup = $('#item_id_sup').val();
   var ppu_sup = $('#ppu_sup').val();

   if(remarks_sup != '' && item_id_sup != '' && ppu_sup != '' )
   {
    $.ajax({
     url:"insert_suppQ.php",
     method:"POST",
     data:{supplier_id_show:supplier_id_show, remarks_sup:remarks_sup, item_id_sup:item_id_sup, ppu_sup:ppu_sup},
     success:function(data)
     {
      $('#alert_message').html('<div class="alert alert-success">'+data+'</div>');
     }
    });
    setInterval(function(){
     $('#alert_message').html('');
    }, 5000);
   }
   else
   {
    alert("All Fields is required");
   }
  });
 </script>
-->

