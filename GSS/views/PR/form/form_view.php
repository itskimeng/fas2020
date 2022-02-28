<?php require_once 'GSS/controller/PurchaseRequestController.php'; ?>
<?php require_once 'GSS/controller/APPController.php'; ?>


<div class="content-wrapper">
    <section class="content-header">
        <h1>Purchase Request</h1>

        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Procurement</a></li>
            <li class="active">Purchase No <?= $pr_data['pr_no']; ?></li>
        </ol>
    </section>
    <section class="content">
        <?php include 'form_view_info.php'; ?>
    </section>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 1000px;">
        <div class="modal-content">

            <div class="modal-body box item-list-table box-primary box-solid dropbox" style="height:700px;">
                <div class="box-header with-border">
                    APP Item List
                </div>
                <form method="POST" action="GSS/route/post_add_pr_items.php">
                    <div class="box-body box-emp">
                        <div class="box-header with-border">
                            <div class="row" class="box-body box-emp">
                                <div class="col-lg-12">
                                    <label>APP Item <font style="color: Red;">*</font> </label>

                                    <?= group_select('Item', 'unit', $app_item_list, '', 'select2', '', false, '', true); ?>
                                    <?= proc_text_input('hidden', '', '', 'pr_no', false, $pr_data['pr_no']); ?>
                                    <?= proc_text_input('hidden', '', 'app_items', 'app_items', false, ''); ?>
                                    <?= proc_text_input('hidden', '', 'item_title', 'item_title', false, ''); ?>
                                </div>
                                <div class="col-lg-12">
                                    <label>Stock/Property No. <font style="color: Red;">*</font> </label>
                                    <input type="text" id="stocknumber" class="form-control" readonly>
                                    <br>
                                    <label>Quantity <font style="color: Red;">*</font></label>
                                    <br>
                                    <input class="form-control" type="number" id="qty" name="qty">

                                    <label>Unit <font style="color: Red;">*</font></label>
                                    <input type="text" class="form-control" id="unit" name="unit" readonly>
                                    <br>
                                    <label>Description/Specification </label>
                                    <textarea id="desc" name="desc" rows="20" cols="50" class="form-control" style="height: 140px; width: 929px;resize:none;outline:none"></textarea>


                                    <label>Unit Cost <font style="color: Red;">*</font></label>
                                    <br>
                                    <input class="form-control" type="text" id="abc" name="unit_cost" readonly>
                                    <input input type="hidden" class="form-control" type="text" id="total_cost" readonly>
                                    <input input type="hidden" class="form-control" type="text" id="items1" readonly>

                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-success col-lg-12"> Add Item </button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<script>
    $(document).ready(function() {

        if ($('#stat').val() == 0) {
            $('#stat-submitted').addClass("active");
        } else if ($('#stat').val() == 3) {
            $('#stat-submitted').addClass("active");
        } else if ($('#stat').val() == 4) {
            $('#stat-submitted').addClass("active");
            $('#stat-processed').addClass("active");

        } else if ($('#stat').val() == 5) {
            $('#stat-rfq').addClass("active");
            $('#stat-submitted').addClass("active");
            $('#stat-processed').addClass("active");

        } else if ($('#stat').val() == 8) {
            $('#stat-obligated').addClass("active");
            $('#stat-rfq').addClass("active");
            $('#stat-submitted').addClass("active");
            $('#stat-processed').addClass("active");

        } else if ($('#stat').val() == 11) {
            $('#stat-disbursed').addClass("active");
            $('#stat-obligated').addClass("active");
            $('#stat-rfq').addClass("active");
            $('#stat-submitted').addClass("active");
            $('#stat-processed').addClass("active");

        } else if ($('#stat').val() == 9) {
            $('#stat-delivered').addClass("active");
            $('#stat-disbursed').addClass("active");
            $('#stat-obligated').addClass("active");
            $('#stat-rfq').addClass("active");
            $('#stat-submitted').addClass("active");
            $('#stat-processed').addClass("active");

        }

    })
</script>