<form method="POST" action="GSS/route/post_supplier_winner.php">
    <div class="box box-primary" style="  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);">
        <div class="box-header with-border">
            <b>Supplier Quotation Table</b>
            <div class="box-tools pull-right">
                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modal-settings">
                    <i class="fa fa-cog"></i>Settings
                </button>
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
                    <?= proc_text_input('hidden', 'form-control col-lg-6', 'flag', 'flag',  false, $_GET['flag']); ?>
                    <?= proc_text_input('hidden', 'form-control col-lg-6', 'abstract_no', 'abstract_no',  false, $abstract_no['abstract_no']); ?>
                    <?= proc_text_input('hidden', '', 'cform-rfq-id', 'rfq_id', $required = false, $ids['id']) ?>


                    <table class="table table-striped table-bordered" id="rfq_items">
                        <thead class="bg-primary">
                            <th>Supplier</th>
                            <th>Item</th>
                            <th>Price Per Unit</th>
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
<table class="table table-striped table-bordered" id="quotation_table" style="max-height: 500px;height: 210px !important;overflow: auto !important;">
    <thead>
        <tr>
            <th>Item</th>
            <?= setHeader($supplier_winner);?>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>Cignal Load Card</td>
            <td hidden=""><input type="text" name="rfq_item_id[]" value="3570"></td>
        <?= setPPU($supplier_winner,$supplier_item_total);?>

        </tr>
        <tr>
            <td>Collapsible Water Tumbler</td>
            <td hidden=""><input type="text" name="rfq_item_id[]" value="3597"></td>
        <?= setPPU($supplier_winner,$supplier_item_total);?>

        </tr>
        <tr>
            <td>Change Oil and diesoline</td>
            <td hidden=""><input type="text" name="rfq_item_id[]" value="3658"></td>
        </tr>
        <tr>
            <td>Conference Mic</td>
            <td hidden=""><input type="text" name="rfq_item_id[]" value="3673"></td>
        </tr>
    </tbody>
</table>
<?php
function setPPU($supplier_winner,$supplier_item_total){
    foreach ($supplier_winner as $key => $item) {

     
foreach ($supplier_winner as $key => $item) {
    $ppu = '';
    $supplier_title = $item['supplier'];

    
    if ($item['winner'] == 1) {
    } else {
    }
    echo $key;
    foreach ($supplier_item_total[10] as $i => $data) {
        $ppu .= '<td>'.$data['price_per_unit'].'</td>';

        if ($data['winner'] == 1) {
        } else {
        }
    }
}
    }
return $ppu;
}


function setHeader($supplier_winner)
{
    $supplier_title = '';

    foreach ($supplier_winner as $key => $item) {

        $supplier_title .= '<th>'.$item['supplier'].'</th>';
    }
    return $supplier_title;
    //SUPPLIER 1                    SUPPLIER 2
    //10
    //20

    //30
    //40
    
}

?>