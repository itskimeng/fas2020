<?php 
$conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
$id = $_GET['id'];
$select = mysqli_query($conn,"SELECT * FROM app WHERE id = '$id' ");
$row = mysqli_fetch_array($select);
$procurement = $row['procurement'];
$app_id = $row['id'];
?>
<html>
<head>
  <title>View PR</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<div class="row">
    <div class="col-md-12">
        <div class="box">
            <div class="box-header with-border" align="left">
                <div class="col-md-11">
                    <h1>APP ITEM : <?php echo $procurement;?></h1>
                </div>
            </div>
            <div class="box-body table-responsive no-padding">
                <div class="box-body">
                   <a class="btn btn-success" href="procurement_app.php">Back</a>


                   <h4>Item(s)</h4>
                   <table id="example1" class="table table-striped table-bordered" style="width:;background-color: white;">
                    <thead>
                        <tr style="background-color: white;color:blue;">
                            <th>PR No.</th>
                            <th>RFQ No.</th>
                            <th>PR Date</th>
                        </tr>
                    </thead>
                    <?php 
                    $view_query = mysqli_query($conn, "SELECT a.id,a.procurement,p.pr_no,p.pr_date, rfq.rfq_no FROM pr_items PI
                    LEFT JOIN app a ON a.id = PI.items
                    LEFT JOIN pr p ON p.id = PI.pr_id
                    LEFT JOIN rfq ON rfq.pr_id = p.id
                    WHERE YEAR(p.pr_date) = 2023 AND a.id = $app_id ");

                    while ($row = mysqli_fetch_assoc($view_query)) {
                        // $id = $row["id"];
                        $pr_no = $row["pr_no"];
                        $rfq = $row["rfq_no"];
                        $pr_date = date('F d, Y',strtotime($row["pr_date"]));

                        echo "<tr align = ''>
                        <td>$pr_no</td>
                        <td>$rfq</td>
                        <td>$pr_date</td>
                        </tr>"; 
                    }
                    ?>
                </table>
            </div>
        </div>
    </div>
</div>




</body>
</html>


