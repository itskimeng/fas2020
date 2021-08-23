<?PHP
include('config.php');
// include('vendorr/autoload.php');

?>
<div class="container box box-primary direct-chat direct-chat-primary " style="padding:10px">

    <div class="box-body">

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
                 
                    foreach ($data as $key => $ors_data) {
                        echo '<tr>';
                        echo '<td ' . $ors_data['ors_gss'] . '>' . $n++ . '</td>';
                        echo '<td ' . $ors_data['ors_gss'] . '>' . $ors_data['date_received'] . '</td>';
                        echo '<td ' . $ors_data['ors_gss'] . '>' . $ors_data['date_obligated'] . '</td>';
                        echo '<td ' . $ors_data['ors_gss'] . '><input type="hidden" class = "id" value="' . $ors_data['id'] . '" />' . $ors_data['date_return'] . '</td>';
                        echo '<td ' . $ors_data['ors_gss'] . '>' . $ors_data['date_released'] . '</td>';
                        echo '<td ' . $ors_data['ors_gss'] . '>' . $ors_data['ors'] . '</td>';
                        echo '<td ' . $ors_data['ors_gss'] . '>' . $ors_data['ponum'] . '</td>';
                        echo '<td ' . $ors_data['ors_gss'] . '>' . $ors_data['payee'] . '</td>';
                        echo '<td ' . $ors_data['ors_gss'] . '>' . $ors_data['particular'] . '</td>';
                        echo '<td ' . $ors_data['ors_gss'] . '>' . $ors_data['amount'] . '</td>';
                        echo '<td ' . $ors_data['ors_gss'] . '>' . $ors_data['remarks'] . '</td>';
                        echo '<td ' . $ors_data['ors_gss'] . ' ' . $ors_data['style'] . '>' . $ors_data['status'] . '</td>';
                        echo ' <td colspan="1"  ' . $ors_data['ors_gss'] . ' ' . $ors_data['style'] . '> <center>
                                ' . $ors_data['action'] . '
                              </center></td>';
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