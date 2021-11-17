<?php include 'controller/TechnicalAssistanceController.php'; ?>
<?php
// exit();
include 'checklist.php';

$id = $_GET['id'];
$request = $_GET['req'];
$sub = $_GET['sub_req'];
include 'connection.php';
$sql = "SELECT * from tbltechnical_assistance as ta where ta.CONTROL_NO = '$id'";


$result = mysqli_query($conn, $sql);
if ($row = mysqli_fetch_array($result)) {
  $is_checked = category($row['TYPE_REQ']);
  $is_selected = sub_category(($row['TYPE_REQ_DESC']));
  $sub = sub_category(($row['TEXT1']));
  $sub_req = $row['TYPE_REQ_DESC'];
}

?>
<div class="content-wrapper">
  <section class="content-header">

    <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">ICT TA</a></li>
      <li class="active">Create ICT TA Request</li>
    </ol><br>
  </section>
  <section class="content">
    <div class="box">
      <div class="panel panel-default">
        <div class="box-body">
          <div class="row">
            <div class="col-md-12 ">
              <?php include('_panel/view_info.php'); ?>
            </div>
          <div class="row">
            <div class="col-md-4">
            </div>

            <div class="col-md-8">
           
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</div>

<?php //include('css.html.php');
?>
<?php //include('modal_edit.html.php'); 
?>
<?php //include('modal_delete.html.php'); 
?>