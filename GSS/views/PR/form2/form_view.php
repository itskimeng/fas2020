<?php require_once 'GSS/controller/PurchaseRequestFormController.php'; ?>
<?php require_once 'GSS/controller/APPController.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Purchase Request</h1>

        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Procurement</a></li>
            <li class="active">Create Purchase Request</li>
        </ol>
    </section>
    <section class="content">
    <div class="col-md-12">
    <div class="callout callout-info callout-dismissable" style="background-color: #3F51B5 !important;">
        <p><i class="fa fa-info-circle"></i>&nbsp; REMINDER</p>
        <ul style="margin-left: -2.5%;">
            <li></i>To add an item to this purchase request, click the "Choose item " to select an item.</li>
            <li></i> To finish the purchase request, click <b>"Save and Proceed."</b></li>
        </ul>
    </div>
</div>
        <form id="form_pr_item">
            <div class="row">
                <div class="col-lg-12">
                    <div class="box box-primary dropbox">
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="btn-group">
                                        <button class="btn btn-warning"><i class="fa fa-arrow-circle-left"></i> <a class="link" href="procurement_purchase_request.php?division=<?= $_GET['division']; ?>">Back</a></button>

                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="pull-right">
                                    <div class="btn-group">
                                            <button type="button" class="btn-style btn-4 btn-sep icon-export"><a style="color:#fff;" href="export_pr.php?id=<?= $_GET['id']; ?>"> EXPORT PR</a></button>
                                        </div>
                                        <?php if ($pr_stat['status'] > 0) { ?>
                                        <?php } else { ?>
                                            <div class="btn-group">
                                                &nbsp;&nbsp;<button type="button" class="btn-style btn-1 btn-sep icon-save" id="btn_submit">Save and Proceed</button>
                                            </div>
                                        <?php } ?>

                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">

                    <div class="box box-primary">
                        <div class="box-header">
                            <?php if ($pr_data['is_urgent'] == 1) : ?>
                                <?php $checked = "checked"; ?>
                            <?php endif; ?>
                            <input type="checkbox" <?= $checked; ?> class="minimal form-check-input" name="chk-urgent" value="1" />
                            <label STYLE="line-height:35px;">URGENT</label>
                            <div class="ribbon ribbon-top-right"><span>Required</span></div>

                        </div>
                        <div class="box-body" style="margin-top:25px;">
                            <div class="form-group">
                                <label>Purchase Request Number:</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="datepicker" value="<?= $pr_data['pr_no']; ?>" readonly name="pr_no">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Office:</label>
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-building"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="cform-pmo" name="cform-pmo" value="<?= $pr_data['office']; ?>" readonly />


                                </div>
                            </div>
                            <div class="form-group">
                                <label>Type:</label>

                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-wrench"></i>
                                    </div>
                                    <select required class="form-control " style="width: 100%;" name="type" id="type">
                                        <option value="1">Catering Services</option>
                                        <option value="2">Meals, Venue and Accommodation</option>
                                        <option value="5">Other Services</option>
                                        <option value="3">Repair and Maintenance</option>
                                        <option value="6">Reimbursement and Petty Cash</option>
                                        <option value="4">Supplies, Materials and Devices</option>
                                    </select>

                                </div>
                            </div>
                            <div class="form-group">
                                <label>Purchase Request Date:</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <?= proc_text_input("text", "form-control pull-right info-dates", "datepicker1", "pr_date", false, $pr_data['pr_date']); ?>

                                </div>
                            </div>
                            <div class="form-group">
                                <label>Purchase Request Target Date:</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <?= proc_text_input("text", "form-control pull-right info-dates", "datepicker2", "target_date", false, $pr_data['target_date']); ?>

                                </div>
                            </div>
                            <div class="form-group">
                                <label>Particulars:</label>

                                <div class="input-group">

                                    <input class="form-control" style="width: 370px; height: 138px;" id="cform-particulars" name="purpose" value="<?= $pr_data['purpose']; ?>" />

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="box box-primary" style="height: 780px;overflow-y: auto;">
                        <div class="box-header">

                            <h3 class="box-title pull-right" style="font-weight:bold;font-size: 40px;">GRAND TOTAL: Php <span id="total_abc" style="font-weight:bold;"></span></h3>
                                <?php if($pr_data['stat'] >= 1):?>

                                <?php else:?>
                                    <?= proc_text_input('text', 'form-control col-lg-12', 'cform-app-code', 'cform-app-code', $required = true, 'Choose  item here!', 'data-target="#itemModal"') ?>

                                <?php endif;?>
                        </div>
                        <div class="box-body">
                            <table class="table table-bordered" id="monitoring">
                                <thead class="bg-primary">
                                    <th>STOCK NUMBER</th>
                                    <th>UNIT</th>
                                    <th>ITEM</th>
                                    <th>DESCRIPTION</th>
                                    <th>QUANTITY</th>
                                    <th>UNIT COST</th>
                                    <th>TOTAL COST</th>
                                    <th>ACTION</th>
                                </thead>
                                <tbody id="items">
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>


            </div>
        </form>

    </section>
</div>


<!-- Modal Create-->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="col-lg-12">
            <form id="form-add-item" method="GET">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Item:</label>
                            <div class="input-group date">
                                <?= proc_group_select('Item', 'unit', $app_item_list, '1', '', '', false, '', true); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?= proc_text_input('hidden', 'form-control', 'cform-app-items', 'cform-app-items', $required = true, ''); ?>
                            <?= proc_text_input('hidden', 'form-control', 'cform-item-title', 'cform-item-title', $required = true, ''); ?>
                            <?= proc_text_input('hidden', 'form-control', 'cform-stocknumber', 'cform-stocknumber', $required = true, ''); ?>
                            <?= proc_text_input('hidden', 'form-control', 'cform-unit-id', 'cform-unit-id', $required = true, ''); ?>
                            <?= proc_text_input('hidden', 'form-control', 'cform-pr-id', 'cform-pr-id', $required = true, $_GET['id']); ?>
                            <?= proc_text_input('hidden', 'form-control', 'cform-pr-no', 'cform-pr-no', $required = true, $pr_data['pr_no']); ?>

                            <?php foreach ($pmo as $key => $pmo_data) : ?>
                                <?php if ($pmo_data['id'] == $_GET['division']) : ?>
                                    <?= proc_text_input('hidden', 'form-control', 'cform-pmo', 'cform-pmo', $required = true, $pmo_data['id']); ?>
                                <?php endif; ?>

                            <?php endforeach ?>
                        </div>
                        <div class="form-group">
                            <label>Unit:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-balance-scale"></i>
                                </div>
                                <?= proc_text_input('text', 'form-control', 'cform-unit-title', 'cform-unit', $required = true, ''); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <label>Quantity:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                
                                </div>
                                <?= proc_text_input('text', 'form-control', 'cform-quantity', 'cform-quantity', $required = true, ''); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>ABC:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-money"></i>
                                </div>
                                <?= proc_text_input('text', 'form-control', 'cform-abc', 'cform-abc', $required = true, ''); ?>
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Description:</label>
                            <div class="input-group">
                                <textarea style="width: 550px; height: 138px;resize:none;" id="cform-description" name="cform-description"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-success btn-md col-lg-12" type="button" id="btn-add-item"> Add Item</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- Model Edit -->
<div class="modal fade" id="editItemModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="col-lg-12">
            <form id="form-edit-item" method="GET">
                <div class="box box-primary">
                    <div class="box-body">
                        <div class="form-group">
                            <label>Item:</label>
                            <div class="input-group date">
                                <?= proc_group_select('Item', 'unit_item', $app_item_list, '1', '', '', false, '', true); ?>
                                <?= proc_text_input('hidden', 'form-control', 'app-items', 'app-items', $required = true, ''); ?>
                                <?= proc_text_input('hidden', 'form-control', 'app-id', 'app-id', $required = true, ''); ?>


                            </div>
                        </div>
                        <div class="form-group">

                            <?= proc_text_input('hidden', 'form-control', 'item-title', 'item-title', $required = true, ''); ?>
                            <?= proc_text_input('hidden', 'form-control', 'stocknumber', 'stocknumber', $required = true, ''); ?>
                            <?= proc_text_input('hidden', 'form-control', 'unit-id', 'unit-id', $required = true, ''); ?>
                            <?= proc_text_input('hidden', 'form-control', 'pr-id', 'pr-id', $required = true, $_GET['id']); ?>
                            <?= proc_text_input('hidden', 'form-control', 'pr-no', 'pr-no', $required = true, $_GET['pr_no']); ?>
                            <?php foreach ($pmo as $key => $pmo_data) : ?>
                                <?php if ($pmo_data['id'] == $_GET['division']) : ?>
                                    <?= proc_text_input('hidden', 'form-control', 'pmo', 'pmo', $required = true, $pmo_data['id']); ?>
                                <?php endif; ?>

                            <?php endforeach ?>
                        </div>
                        <div class="form-group">
                            <label>Unit:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-balance-scale"></i>
                                </div>
                                <?= proc_text_input('hidden', 'form-control', 'unit', 'unit', $required = true, ''); ?>
                                <input type="text" class="form-control" id="unit_title" disabled/>

                            </div>
                        </div>
                        <div class="form-group">
                            <label>Quantity:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                 
                                </div>
                                <?= proc_text_input('text', 'form-control', 'quantity', 'quantity', $required = true, ''); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <label>ABC:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-money"></i>
                                </div>
                                <?= proc_text_input('hidden', 'form-control', 'abc', 'abc', $required = true, ''); ?>
                                <input type="text" class="form-control" id="abc_hidden" disabled/>

                            </div>
                        </div>

                        <div class="form-group">
                            <label>Description:</label>
                            <div class="input-group">
                                <textarea style="width: 550px; height: 138px;resize:none;" id="description" name="description"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary btn-md col-lg-12 pull-right" type="button" id="btn-edit-item"><i class="fa fa-edit"></i> Update Item</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function generateItemsTable() {
        $.post({
            url: 'GSS/views/PR/form2/items_table.php',
            data: {
                id: '<?= $_GET['id']; ?>',
                pr_no: '<?= $_GET['pr_no']; ?>'
            },
            success: function(data) {
                $('#items').html(data);
            }
        })

    }

    function fetchABC() {
        $.post({
            url: 'GSS/views/PR/form2/fetch_abc.php',
            data: {
                id: '<?= $_GET['id']; ?>',
            },
            success: function(data) {
                $('#total_abc').html(data);
            }
        })

    }

    function fetchDraftPR(id) {

        let path = 'GSS/views/PR/form2/fetch_draft_pr.php';
        let data = {
            pr_id: id
        }
        $.post(path, data, function(data, status) {
            let lists = JSON.parse(data);
            prInfo(lists);
        });

        function prInfo($data) {
            $.each($data, function(key, item) {
                $('select[name="type"]').val(item.type);
            });


            return $data;
        }

    }

    $(document).on('click', '#btn_submit', function() {
        let serialize_data = $('#form_pr_item').serialize();
        let pmo = $('#cform-particulars').val();

        if (
            $('#cform-particulars').val() == null ||
            $('#cform-particulars').val() == '' ||
            $('#type option:selected').length == 0 ||
            $('#datepicker2').val() == 'November 30, -0001' ||
            $('#datepicker2').val() == '0000-00-00' ||
            $('#datepicker2').val() == null ||
            $('#datepicker2').val() == '0000-00-00') {
            toastr.error("Error! All fields are required!");

        } else {
            if ($('#monitoring tr').length == 1) {
                toastr.error("Please fill in at least 1 (one) item in the item table.");

            } else {
                $.get({
                    url: 'GSS/route/post_create_pr.php?cform-pmo=' + pmo + '&' + serialize_data,
                    success: function(data) {
                        toastr.success("This Purchase Request has been successfully added!");
                        window.location = "procurement_purchase_request.php?division=" + pmo;
                    }
                })
            }
        }
    })
    $(document).on('click', '#btn-add-item', function() {
        let form = $('#form-add-item').serialize();
        $.get({
            url: 'GSS/route/post_add_pr_item.php?' + form,
            success: function(data) {
                generateItemsTable();
                fetchABC();

                $('#exampleModal').modal('hide');


            }
        })
    })
    $(document).on('click', '#btn-edit', function() {
        $('#selected_item').val($(this).val());
        let sn = $(this).val();
        let path = 'GSS/route/fetch_app_items.php';
        let data = {
            stock_n: sn,
            pr_id: <?= $_GET['id']; ?>
        };
        $.post(path, data, function(data, status) {
            let lists = JSON.parse(data);
            itemInfo(lists);
        });

        function itemInfo($data) {

            $.each($data, function(key, item) {
                if (sn == item['sn']) {

                    $('#cform-unit_item').append($("<option selected />").val(item['id']).text(item['procurement']));
                    $('#app-items').val(item['item']);
                    $('#app-id').val(item['id']);
                    $('#quantity').val(item['qty']);
                    $('#stocknumber').val(item['sn']);
                    $('#abc').val(item['price']);
                    $('#abc_hidden').val(item['price']);
                    $('#unit').val(item['unit_id']);
                    $('#unit_title').val(item['unit_id']);
                    $('#unit-id').val(item['unit']);
                    $('#description').text(item['desc']);

                } else {
                    $('#cform-unit_item').append($("<option />").val(item['id']).text(item['procurement']));

                }




            });


            return $data;
        }
    })
    $(document).on('click', '#btn-edit-item', function() {
        let form = $('#form-edit-item').serialize();
        $.get({
            url: 'GSS/route/post_edit_item.php?' + form + '&id=<?= $_GET['id']; ?>+',
            success: function(data) {
                generateItemsTable();
                fetchABC();

                $('#editItemModal').modal('hide');
            }
        })
    })
    $(document).on('click', '#btn-delete-item', function() {
        $.post({
            url: 'GSS/route/post_del_item.php',
            data: {
                'id': $(this).val()
            },
            success: function(data) {
                generateItemsTable();
                fetchABC();
                toastr.success("Successfully remove this item!");

            }
        })
    })
    $(document).on('change', '#cform-unit', function() {
        let selected_item = $('#cform-unit').val();
        let path = 'GSS/route/post_app_item.php';
        $.get({
            url: path,
            data: {
                procurement: selected_item
            },
            success: function(result) {
                var data = jQuery.parseJSON(result);
                $('#cform-app-items').val(data.id);
                $('#cform-item-title').val(data.procurement);
                $('#cform-stocknumber').val(data.sn);
                $('#cform-abc').val(data.price);
                $('#cform-unit-title').val(data.unit_id);

                $('#cform-unit-id').val(data.unit);
            }
        })
    });
    $(document).on('change', '#cform-unit_item', function() {
        let selected_item = $('#cform-unit_item').val();
        let path = 'GSS/route/post_app_item.php';
        $.get({
            url: path,
            data: {
                procurement: selected_item
            },
            success: function(result) {
                var data = jQuery.parseJSON(result);
                $('#app-items').val(data.id);
                $('#item-title').val(data.procurement);
                $('#stocknumber').val(data.sn);
                $('#abc').val(data.price);
                $('#abc_hidden').val(data.price);
                $('#unit').val(data.unit_id);
                $('#unit-id').val(data.unit);
                $('#unit_title').val(data.unit_id);

            }
        })
    });
    $(document).ready(function() {
      
            $('#cform-unit_item').select2({
                dropdownParent: $('#editItemModal'),
                width: '550'

            });
        generateItemsTable();
        fetchABC();
        fetchDraftPR(<?= $_GET['id']; ?>)
        $("#cform-app-code").click(function() {
            $("#exampleModal").modal("show");
            $('#cform-unit').select2({
                dropdownParent: $('#exampleModal'),
                width: '550'
            });
           



        })
        $('#datepicker1').datepicker({
            autoclose: true
        })
        $('#datepicker2').datepicker({
            autoclose: true
        })
        $('#cform-app-code').prop('disabled', false);
        $('#cform-pmo').prop('disabled', false);
        $('#cform-quantity').prop('disabled', false);
        $('#cform-pr-id').prop('disabled', false);
        $('#cform-pr-no').prop('disabled', false);
        $('#cform-stocknumber').prop('disabled', false);
        $('#cform-app-items').prop('disabled', false);
        $('#cform-unit-id').prop('disabled', false);
        $('#cform-abc').prop('disabled', false);
        $('#quantity').prop('disabled', false);
        $('#stocknumber').prop('disabled', false);
        $('#unit-id').prop('disabled', false);
        $('#pr-id').prop('disabled', false);
        $('#pr-no').prop('disabled', false);
        $('#pmo').prop('disabled', false);
        $('#cform-unit_item').prop('disabled',true);
    })
</script>