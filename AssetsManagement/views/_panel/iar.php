<div class="col-lg-12">
    <h1>Inspection Acceptance Report</h1>
    <div class="box box-primary box-solid dropbox">
        <div class="box-header with-border">
            <h3 class="box-title">&nbsp;</h3>
            <div class="tools pull-right">
                <span class="pull-right-container">
                    <span class="label label-primary pull-right" style="font-size: 12pt;"></span>
                </span>
            </div>
        </div>
        <div class="box-body workspace destination ongoing_list ui-droppable" value="ongoing" style="overflow-y: scroll; height: 500px; background-color: #f0f0f09e;">
        <li class="btn btn-success"><a href="index.php" style="color:white;text-decoration: none;">Create</a></li>

        <table id="example1" class="table table-bordered" style="background-color: white;" align="left">
                <thead>
                    <tr style="background-color: white; color:blue;">
                        <th>PO NUMBER</th>
                        <th>PO DATE</th>
                        <th>IAR NUMBER</th>
                        <th>IAR DATE</th>
                        <th>REQUISITION DEPT.</th>
                        <th>ACTION</th>
                    </tr>
                </thead>
                <?php 
                $conn=mysqli_connect("localhost","fascalab_2020","w]zYV6X9{*BN","fascalab_2020");
                $view_query = mysqli_query($conn, "SELECT * FROM iar order by id DESC  ");
                while ($row = mysqli_fetch_assoc($view_query)) {
                    $id = $row["id"];
                    $po_no = $row["po_no"];  
                    $po_date = $row["po_date"];
                    $dept = $row["dept"];
                    $ccode = $row["ccode"];
                    $iar_no = $row['iar_no'];
                    $iar_date = date('F d, Y',strtotime($row['iar_date']));
                    if ($iar_date == 'January 01, 1970') {
                      # code...
                      $iar_date='';
                    }
                    $invoice_no = $row['invoice_no'];
                    $invoice_date = $row['invoice_date'];
                    $stock_no = $row['stock_no'];
                    echo "<tr align = ''>
                   
                    <td>$po_no</td>
                    <td>$po_date</td>
                    <td>$iar_no</td>
                    <td>$iar_date</td>
                    <td>$dept</td>
                    
                    <td>
                    <a href='UpdateIAR.php?id=$id' ' class='btn btn-primary btn-xs'> <i class='fa'>&#xf044;</i> Edit</a> | 
                    <a href='export_iar.php?getiar=$id' class='btn btn-success btn-xs' > <i class='fa fa-fw fa-download'></i> Export</a>
                    </td>
                    </tr>"; 
                }
                echo "</table>";
                ?>
            </table>
        </div>
    </div>
</div>