<?php require_once 'GSS/controller/RFQController.php'; ?>
<?php require_once 'GSS/controller/PurchaseRequestController.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Request for Quotation</h1>

        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Procurement</a></li>
            <li class="active">Request for Quotation</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <?php include('_panel/box.html.php'); ?>
        </div>
        <div class="row">
            <?php include '_panel/pending_pr.php'; ?>
            <?php include '_panel/pos.php'; ?>
            <?php include '_panel/rfq_entries_table.php'; ?>
            <?php include '_panel/modal_pos.php';?>
        </div>
    </section>
</div>
<style>
    .table-cell {
        display: table-cell;
        max-width: 0px;
    }
</style>
<script src="GSS/views/backend/js/rfq_custom_button.js"></script>
<script>
    $(document).ready(function(){
        let flag="<?= $_GET['flag'];?>";
        let rfq ="<?= $_GET['rfq_no'];?>";
        if(flag == 1)
        {
            toastr.success("You have successfully created RFQ-NO-"+rfq);
        }else{

        }
    })
    $(".select2").select2({
        dropdownParent: $("#modal-default")
    });
    $('.select2').on('change', function() {
        let pr = $(this).val();
        let path = 'GSS/route/post_rfq.php';
        let data = {
            pr_no: pr,
        };

        $.post(path, data, function(data, status) {
            let lists = JSON.parse(data);
            sample(lists);
            // appendAPPItems(lists);
        });

        function sample($data) {
            $.each($data, function(key, item) {
                $('#cform-rfq').val(item.rfq_no);
                $('#cform-pr-no').val(item.pr_no);
                $('#cform-office').val(item.office);
                $('#cform-textarea').val(item.purpose);
            });

            return $data;
        }

        // function appendAPPItems($data) {
        //     $.each($data, function(key, item) {
        //         let tr = '<tr>';
        //         tr += '<td> <input type="hidden" value="' + item['items'] + '" name="app_id[]" /></td>';
        //         tr += '</tr>';
        //         $('#app_items').append(tr);
        //     });
        //     return $data;
        // }
    })
</script>