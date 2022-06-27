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
            <?php include 'GSS/views/RFQ/dash_panel.php'; ?>
            <?php if (($is_multiple_pr['is_multiple'])) { ?>
                <?php include 'GSS/views/RFQ/_panel/rfq_view_multiple.php'; ?>
            <?php } else { ?>
                <?php include 'GSS/views/RFQ/_panel/rfq_view.php'; ?>
            <?php } ?>
        </div>
    </section>
</div>
<script src="GSS/views/backend/js/rfq_custom_button.js"></script>

<script>

    $(document).on('click', '#btn_rfq_save', function() {
        let path = "GSS/route/";
        let division = $('#division').val();
        let rfq = "<?= $_GET['rfq_no']; ?>";
        let rfq_date = $('#cform-rfqdate').val();
        $.post({
            url: path + "post_update_rfq.php",
            data: {
                rfq_no: $('#cform-rfq').val(),
                rfq_id: '<?= $_GET['rfq_id'];?>',
                date: rfq_date
            },
            success: function(data) {
                toastr.success("You have successfully changed this RFQ!");
                setTimeout(
                    function() {
                        window.location = "procurement_request_for_quotation.php?division=" + division;
                    },
                    1000);


            }
        })
    })
</script>