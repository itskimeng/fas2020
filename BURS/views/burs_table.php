<?PHP
include('config.php');
// include('vendorr/autoload.php');

?>
<div class="container box box-danger direct-chat direct-chat-primary " style="padding:10px">

    <div class="box-body">
    <li class="btn btn-success"><a href="ObligationCreate.php" style="color:white;text-decoration: none;">Create</a></li>

<li class="btn btn-warning   "><i class="fa fa-backward"></i> <a href="obligation.php?page=<?php echo $_GET['page'];?>&ipp=<?php echo $_GET['ipp'];?>&division=<?php echo $_GET['division'];?>" style="color:white;text-decoration: none;">Back</a></li>

        <table id="example1" class="table table-bordered table-striped" >
            <thead style="background-color:#bce8f1;color:#31708f;">
                <tr>
                    <th>#</th>
                    <th>DATE RECEIVED</th>
                    <th>DATE OBLIGATED</th>
                    <th>DATE RETURNED</th>
                    <th>DATE RELEASED</th>
                    <th>ORS NUMBER</th>
                    <th>PO NUMBER</th>
                    <th>PAYEE</th>
                    <th>PARTICULAR</th>
                    <th>AMOUNT</th>
                    <th>REMARKS</th>
                    <th>STATUS</th>
                    <th width='130' style="border-right: 0px; text-align: center;">ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if ($pages->items_total > 0) {
                    $n  =   1;
                 
                    foreach ($data as $key => $burs_data) {
                        echo '<tr>';
                        echo '<td ' . $burs_data['ors_gss'] . '>' . $n++ . '</td>';

                        echo '<td '.$burs_data['ors_gss'].'>' . $burs_data['date_received'] . '</td>';
                        echo '<td '.$burs_data['ors_gss'].'>' . $burs_data['date_obligated'] . '</td>';
                        echo '<td '.$burs_data['ors_gss'].'><input type="hidden" class = "id" value="'.$burs_data['id'].'" />' . $burs_data['date_return'] . '</td>';
                        echo '<td '.$burs_data['ors_gss'].'>' . $burs_data['date_released'] . '</td>';
                        echo '<td '.$burs_data['ors_gss'].'>' . $burs_data['ors'] . '</td>';
                        echo '<td '.$burs_data['ors_gss'].'>' . $burs_data['ponum'] . '</td>';
                        echo '<td '.$burs_data['ors_gss'].'>' . $burs_data['payee'] . '</td>';
                        echo '<td '.$burs_data['ors_gss'].'>' . $burs_data['particular'] . '</td>';
                        echo '<td '.$burs_data['ors_gss'].'> ₱' . $burs_data['amount'] . '</td>';
                        echo '<td '.$burs_data['ors_gss'].'>' . $burs_data['remarks'] . '</td>';  
                        echo '<td '.$burs_data['ors_gss'].' ' . $burs_data['style'] . '>' . $burs_data['status'] . '</td>';
                        echo ' <td colspan="1" style="border-right: 0px; margin-left:0px">   ' . $burs_data['action'] . '</td>';
                        echo '</tr>';
                      }
                } else { ?>
                    <tr>
                        <td colspan="6" align="center"><strong>No Record(s) Found!</strong></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <div class="clearfix"></div>

        <div class="row marginTop">
            <div class="col-sm-12 paddingLeft pagerfwt">
                <?php if ($pages->items_total > 0) { ?>
                    <?php echo $pages->display_pages(); ?>
                    <?php echo $pages->display_items_per_page(); 
                    ?>
                    <?php  echo $pages->display_jump_menu(); 
                    ?>
                <?php } ?>
            </div>
            <div class="clearfix"></div>
        </div>

        <div class="clearfix"></div>

    </div>
</div>