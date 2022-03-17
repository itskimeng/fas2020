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
                            <a href="procurement_supplier_awarding.php">
                                <i class="fa fa-calendar"></i>
                                <label>For Awarding</label>
                            </a>
                        </li>
                        <li>
                            <a href="procurement_purchase_order_create.php">
                                <i class="fa fa-cog"></i> <label>Purchase Order</label>
                            </a>
                        </li>
                    </ul>

                </div>
                <div class="box">
                    <div class="box-header with-border">
                        <div class="box-tools pull-right">

                        </div>
                    </div>

                    <div class="box-body">

                        <div class="form-group">
                            <div class="switchToggle">
                                <input type="checkbox" id="cform-dfunds" class="dfunds" name="dfunds"><label for="cform-dfunds">Assign Multiple PR's</label>
                                <span>&nbsp; <b>Assign Multiple PR's</b></span>
                            </div>
                        </div>


                        <div class="col-lg-12">
                            <div class="col-lg-3">
                                <?php include 'GSS/views/RFQ/_panel/pending_pr.php'; ?>
                                <?php include 'GSS/views/RFQ/_panel/pos.php'; ?>
                            </div>
                            <div class="col-lg-9">
                                <?php include 'GSS/views/RFQ/_panel/rfq_assign_multiple.php'; ?>
                                <?php include 'GSS/views/RFQ/_panel/rfq_create.php'; ?>
                            </div>

                        </div>

                       

                        <div class="col-md-12">

                        </div>
                    </div>
                </div>
            </div>


        </div>
</div>
</section>
</div>

<script>
    function selectRefresh() {
        $('.select2').select2({
            tags: true,
            placeholder: "Select an Option",
            allowClear: true,
            width: '100%'
        });
    }
    $('#tbl_rfq_panel').hide();
    // $('#pos_panel').hide();
    let count_id = 0;
    $(document).ready(function() {
        $(".hideme").hide();
        $('#datepicker1').datepicker({
            autoclose: true
        })
        $(".switchToggle input").on("change", function(e) {
            const isOn = e.currentTarget.checked;

            if (isOn) {
                $(".hideme").show();
                // $("#tbl_rfq_panel").hide();
                // $("#pr_item_list").hide();
                // $("#pos_panel").hide();


            } else {
                $(".hideme").hide();
                // $("#pr_item_list").show();
                // $("#pos_panel").show();


            }
        });
        selectRefresh();

    });


    $(document).ready(function() {
        $('#rfq_table').DataTable({
            "lengthChange": false,
            "dom": '<"pull-left"f><"pull-right"l>tip',
            "lengthMenu": [4, 40, 60, 80, 100],
        });
    })

   
    $(document).on('click', '.btn-create-rfq', function() {
        let form = $('#rfq_form').serialize();
        let path = 'GSS/route/post_create_rfq.php?' + form;
        let pr = $(this).val();
        let division = $('#division').val();
        update(path);

        function update(path) {
            $.get({
                url: path,
                data: {
                    pr_no: pr,
                    rfq_no: $('#rfq_no').val()
                },
                success: function(data) {
                    window.location = "procurement_request_for_quotation.php?division=" + division + "";

                }
            })
        }
    })
    $(document).on('click', '#btn_add_multiple', function() {
        let row = '';
        row += '<tr>';
        row += '<td>',
            row += '<?= group_select('', 'pr_no[]', $rfq_pr_opts, '', 'form-control select2', 0, false, '', true) ?>',
            row += '</td>',
            row += '<td>',
            row += '<?= group_select('', 'mode[]', $rfq_mode_opts, '', 'form-control select2', 0, false, '', true) ?>',
            row += '</td>',
            row += '<td>',
            row += '<?= proc_text_input('text', 'form-control col-lg-6', 'rfq', 'rfq',  true, $rfq_no['rfq_no']) ?>',
            row += '</td>',
            row += '<td>',
            row += '<div class="input-group date" id="datepicker-group" data-provide="datepicker" data-date-format="dd/mm/yyyy" data-date-autoclose="true"><div class="input-group-addon"><i class="fa fa-calendar"></i></div><input type="text" class="form-control pull-right info-dates" id="datepicker1" name="rfq_date[]" "required=" required" "="" value=" March 14, 2022"> </div>',
            row += '</td>',
            row += '<td><button type = "button" class="btn btn-md btn-flat bg-green" data-toggle="modal" data-target="#exampleModal"><i class="fa fa-eye"></i></button>' +
            '<button type = "button" class="btn btn-md btn-flat bg-red" id="btn_del_multiple"><i class="fa fa-trash"></i></button>' +
            '</td>',

            row += '</tr>';

        $('#multiple_pr').append(row);
        $('.select2', '#multiple_pr').select2();



    });
    $(document).on('click', '#btn_del_multiple', function() {
        $('#multiple_pr tr:eq(1)').remove();
        toastr.warning("Successfully removed this item");
    })
</script>
<style type="text/css">
    .dropbox {
        box-shadow: 0 1px 2px rgb(0 0 0 / 50%);
    }

    .custom-tb-header {
        background-color: #a0cfea !important;
    }

    .delete_modal_header {
        text-align: center;
        background-color: #f15e5e;
        color: white;
        padding: 5% !important;
        border-top-left-radius: 4px;
        border-top-right-radius: 4px;
    }

    * {
        box-sizing: border-box;
    }

    .fade-scale {
        transform: scale(0);
        opacity: 0;
        -webkit-transition: all .25s linear;
        -o-transition: all .25s linear;
        transition: all .25s linear;
    }

    .fade-scale.in {
        opacity: 1;
        transform: scale(1);
    }

    .switchToggle input[type=checkbox] {
        height: 0;
        width: 0;
        visibility: hidden;
        position: absolute;
    }

    .switchToggle label {
        cursor: pointer;
        text-indent: -99999px;
        width: 70px;
        max-width: 60px;
        height: 25px;
        background: #d1d1d1;
        /*display: block; */
        border-radius: 100px;
        position: relative;
    }

    .switchToggle label:after {
        content: '';
        position: absolute;
        top: 2px;
        left: 2px;
        width: 20px;
        height: 20px;
        background: #fff;
        border-radius: 90px;
        transition: 0.3s;
    }

    .switchToggle input:checked+label,
    .switchToggle input:checked+input+label {
        background: #3e98d3;
    }

    .switchToggle input+label:before,
    .switchToggle input+input+label:before {
        content: 'No';
        position: absolute;
        top: 3px;
        left: 35px;
        width: 26px;
        height: 26px;
        border-radius: 90px;
        transition: 0.3s;
        text-indent: 0;
        color: #fff;
    }


    .switchToggle input:checked+label:before,
    .switchToggle input:checked+input+label:before {
        content: 'Yes';
        position: absolute;
        top: 3px;
        left: 10px;
        width: 26px;
        height: 26px;
        border-radius: 90px;
        transition: 0.3s;
        text-indent: 0;
        color: #fff;
    }

    .switchToggle input:checked+label:after,
    .switchToggle input:checked+input+label:after {
        left: calc(100% - 2px);
        transform: translateX(-100%);
    }

    .switchToggle label:active:after {
        width: 60px;
    }

    .toggle-switchArea {
        margin: 10px 0 10px 0;
    }
</style>