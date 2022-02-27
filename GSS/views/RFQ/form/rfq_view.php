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
            <div class="col-lg-12">
                <div class="w3-panel w3-pale-red w3-border w3-leftbar w3-border-red">
                    <h3>REMINDER!</h3>
                    <div><label class="label label-danger">URGENT</label> - the status of this purchase request is urgent and must be processed on the date submitted by the user. </div><br>
                </div>

            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div id="tab">
                    <ul role="tablist" class="nav nav-tabs bs-adaptive-tabs" id="myTab">
                        <li class="active">
                            <a href="procurement_request_for_quotation.php">
                                <i class="fa fa-archive"></i>
                                <label>Request for Quotation</label>
                            </a>
                        </li>
                        <li>
                            <a href="procurement_request_for_quotation.php">
                                <i class="fa fa-calendar"></i>
                                <label>For Awarding</label>
                            </a>
                        </li>
                        <li>
                            <a href="procurement_request_for_quotation.php">
                                <i class="fa fa-cog"></i> <label>Purchase Order</label>
                            </a>
                        </li>
                    </ul>

                    <?php include '_panel/tabs_target.php'; ?>
                </div>
                <div class="box box-danger">
                    <div class="box-header with-border">
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="box-body">
                        <div class="col-md-12">
                            <div class="box">
                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="btn-group">
                                                <button class="btn-style btn-2 btn-sep icon-back" id="back">
                                                    <a href="procurement_request_for_quotation.php?division=<?= $_GET['division']; ?>" style="color:#fff;"> Back </a>
                                                </button>
                                            </div>
                                            <!-- <div class="btn-group">
                                <button class="btn-style btn-1 btn-sep icon-multiple" id="btn-multiple">
                                    Multiple Assigning
                                 </button>
                            </div> -->



                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <?php include 'GSS/views/RFQ/_panel/pending_pr.php'; ?>
                        </div>
                        <div class="col-lg-9">
                            <?php //include 'GSS/views/RFQ/_panel/rfq_entries.php'; 
                            ?>
                            <?php //include 'GSS/views/RFQ/_panel/rfq_create.php'; 
                            ?>
                            <?php //include 'GSS/views/RFQ/_panel/rfq_multiple.php'; 
                            ?>
                            <?php include 'GSS/views/RFQ/_panel/rfq_view.php';
                            ?>
                            </form>
                        </div>
                    </div>
                </div>
            </div>


        </div>
</div>
</section>
</div>
<script>
    $(document).ready(function() {
        $('#cform-rfqdate').datepicker({
            autoclose: true
        })
        let rfq_no = "<?= $_GET['rfq_no']; ?>";
        let path = 'GSS/route/post_rfq.php';
        let data = {
            id: rfq_no,
        };

        $.post(path, data, function(data, status) {
            let lists = JSON.parse(data);
            sample(lists);
        });

        function sample($data) {
            $.each($data, function(key, item) {
                $('#cform-rfq').val(item.rfq_no);
                $('#cform-pr-no').val(item.pr_no);
                $('#cform-amount').val(item.amount);
                $('#cform-textarea').val(item.purpose);
                $('#cform-rfqdate').val(item.rfq_date);
                $('#cform-office').val(item.office);
                $('#cform-pr_date').val(item.pr_date);
                $('#cform-target_date').val(item.target_date);
                $('#cform-mode').val(item.mode);
            });

            return $data;
        }
    })
    $(document).on('click', '#btn_rfq_save', function() {
        let path = "GSS/route/";
        let division = $('#division').val();
        let rfq = "<?= $_GET['rfq_no']; ?>";
        let rfq_date = $('#cform-rfqdate').val();
        $.post({
            url: path + "post_update_rfq.php",
            data: {
                rfq_no: rfq,
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