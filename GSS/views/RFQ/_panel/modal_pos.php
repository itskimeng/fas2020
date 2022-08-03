<div class="modal fade" id="modal-default" style="display: none;">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span></button>
                <h4 class="modal-title"><i class="fa fa-book"></i>Suppliers</h4>
            </div>
            <div class="modal-body" style="height: 120px;">
                <?= group_select('Type', 'type', $fetch_rfq_pos,'', '', '', false, '', true); ?>
                <?=proc_text_input('hidden', '', 'cform-rfq', 'rfq_no', $required = true, $_GET['rfq_no']) ?>
                <?=proc_text_input('hidden', '', 'cform-pr-no', 'pr_no', $required = true, $pr_id['id']) ?>

                <button class="btn btn-success btn-md col-lg-12" id="export_pos">Proceed</button>
            </div>

        </div>
    </div>
</div>
<script>
     $(document).on('click', '#export_pos', function () {
        let path = 'export_pos.php';

        let rfq_no = $('#cform-rfq').val();
        
        let pr_no = $('#cform-pr-no').val();
        let pmo = $('#cform-office').val();
        let purpose = $('#cform-textarea').val();
    
        let supplier_id = $('#cform-type').val();
        generate_pos(path);

        function generate_pos(path) {

            window.location = 'procurement_export_pos.php?&supplier_id=' + supplier_id + '&rfq_id='+<?= $_GET['rfq_id'];?>+'&rfq_no=' + rfq_no + '&pmo=' + pmo + '&purpose=' + purpose + '&pr_no=' + pr_no;

        }
        $('#modal-default').modal('hide');


    })
   
</script>