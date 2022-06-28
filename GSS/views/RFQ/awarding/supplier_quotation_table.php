<form method="POST" action="GSS/route/post_supplier_winner.php">
    <div class="box box-primary" style="  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);">
        <div class="box-header with-border">
            <b>Supplier Quotation Table</b>
            <div class="box-tools pull-right">
                <button type="submit" class="btn btn-success">
                    <i class="fa fa-trophy"></i>Award
                </button>


            </div>
        </div>
        <div class="box-body" style="height: 450px; max-height:380px; overflow-y: auto;">
            <input type="hidden" name="_csrf" value="vGRFeQruDnCyGAJ-LaZs_mOYugb6I9jgKuz8B-KvmtWMCi1OSNp6IcNZOyh4nj22EtPMVqtCq6Jj2rhdipzxrA==">
            <div id="kv-demo" class="kv-view-mode">
                <div class="kv-detail-view">
                    <?= proc_text_input('hidden', 'form-control col-lg-6', 'rfq_no', 'rfq_no',  false, $_GET['rfq_no']); ?>
                    <?= proc_text_input('hidden', 'form-control col-lg-6', 'pr_no', 'pr_no',  false, $_GET['pr_no']); ?>
                    <?= proc_text_input('hidden', 'form-control col-lg-6', 'pr_id', 'pr_id',  false, $_GET['pr_id']); ?>
                    <?= proc_text_input('hidden', 'form-control col-lg-6', 'flag', 'flag',  false, $_GET['flag']); ?>
                    <?= proc_text_input('hidden', 'form-control col-lg-6', 'abstract_no', 'abstract_no',  false, $abstract_no['abstract_no']); ?>
                    <?= proc_text_input('hidden', '', 'cform-rfq-id', 'rfq_id', $required = false, $ids['id']) ?>


                    <table class="table table-striped table-bordered" id="rfq_items">
                        <thead class="bg-primary">
                            <?= setHeader($supplier_winner); ?>
                        </thead>
                        <tbody id="quotation">

                        </tbody>
                    </table>



                </div>
            </div>
        </div>
    </div>
    <?php include 'GSS/views/RFQ/awarding/modal_settings.php'; ?>
</form>
<?php
function setHeader($supplier_winner)
{
    $supplier_title = '';

    foreach ($supplier_winner as $key => $item) {

        $supplier_title .= '<th>' . $item['supplier'] . '</th>';
    }
    return $supplier_title;
}
function setPPU($supp_ppu,$count)
{
 $max_columns = $count+1;
 $record_id = 0;
 while (true) {
     for ($column = 1; $column < $max_columns; $column++) {
         if (!isset($supp_ppu[$record_id])) {
             return;
         }
         if ($column == 1) {
           echo '<tr>';
         }
         if($supp_ppu[$record_id]['winner']==1)
         {
         }else{
            echo '<td>₱'.$supp_ppu[$record_id]['ppu'].'</td>';

         }
         if ($column == $max_columns) {
            echo '</tr>';
         }
         $record_id++;
     }
 }
 
}
 ?>