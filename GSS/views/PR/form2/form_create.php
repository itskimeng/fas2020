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
                                            <button type="button" class="btn-style btn-1 btn-sep icon-download" id="btn_submit">Save and Proceed</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="box box-primary" style="height: 780px;overflow-y: auto;">
                        <div class="box-header">
                            <?= proc_text_input('text', 'form-control col-lg-12', 'cform-app-code', 'cform-app-code', $required = true, 'Choose app item here!', 'data-target="#exampleModal"') ?>
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
                                    <th>ACTION</th>
                                </thead>
                                <tbody id="items">

                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box box-primary">
                        <div class="box-header">
                            <h3 class="box-title" style="color: red;font-weight:bold;font-size: 40px;">GRAND TOTAL:</h3>
                        </div>
                        <div class="box-body">
                            <h1 id="total_abc" style="font-weight:bold;"></h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="box box-primary">
                        <div class="box-header">
                        <input type="checkbox" class="minimal form-check-input" name="chk-urgent" value="1" />
                            <label STYLE="line-height:35px;">URGENT</label>
                        </div>
                        <div class="box-body">
                            <div class="form-group">
                                <label>Purchase Number:</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="datepicker" value="<?= $get_pr['pr_no']; ?>" name="pr_no">
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Office:</label>
                                <div class="input-group date">
                                    <div class="input-group-addon"><i class="fa fa-building"></i>
                                    </div>
                                    <select class="form-control" name="cform-pmo" id="pmo" name="cform-pmo" style="width: 100%;">
                                        <?php foreach ($pmo as $key => $pmo_data) : ?>
                                            <?php if ($pmo_data['id'] == $_GET['division']) : ?>
                                                <option value="<?php echo $pmo_data['id']; ?>" data-code="<?php echo $pmo_data['office']; ?>" selected><?php echo $pmo_data['office']; ?></option>
                                            <?php else : ?>
                                                <option value="<?php echo $pmo_data['id']; ?>" data-code="<?php echo $pmo_data['office']; ?>"><?php echo $pmo_data['office']; ?></option>
                                            <?php endif ?>
                                        <?php endforeach ?>
                                    </select>
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
                                    <input type="text" class="form-control pull-right" id="datepicker1" name="pr_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Purchase Request Target Date:</label>

                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input type="text" class="form-control pull-right" id="datepicker2" name="target_date"  >
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Particulars:</label>

                                <div class="input-group">

                                    <textarea style="width: 370px; height: 138px;resize:none;" id="cform-particulars" name="purpose" ></textarea>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
</div>

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
                            <label>Purchase Number:</label>
                            <div class="input-group date">
                                <?= proc_group_select('Item', 'unit', $app_item_list, '1', '', '', false, '', true); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <?= proc_text_input('hidden', 'form-control', 'cform-app-items', 'cform-app-items', $required = true, ''); ?>
                            <?= proc_text_input('hidden', 'form-control', 'cform-item-title', 'cform-item-title', $required = true, ''); ?>
                            <?= proc_text_input('hidden', 'form-control', 'cform-stocknumber', 'cform-stocknumber', $required = true, ''); ?>
                            <?= proc_text_input('hidden', 'form-control', 'cform-unit-id', 'cform-unit-id', $required = true, ''); ?>
                            <?= proc_text_input('hidden', 'form-control', 'cform-pr-id', 'cform-pr-id', $required = true, $get_pr_id['id']); ?>
                            <?= proc_text_input('hidden', 'form-control', 'cform-pr-no', 'cform-pr-no', $required = true, $get_pr['pr_no']); ?>
                            <?php foreach ($pmo as $key => $pmo_data) : ?>
                                <?php if ($pmo_data['id'] == $_GET['division']) : ?>
                                    <?= proc_text_input('text', 'form-control', 'cform-pmo', 'cform-pmo', $required = true, $pmo_data['id']); ?>
                                <?php endif; ?>

                            <?php endforeach ?>
                        </div>
                        <div class="form-group">
                            <label>Unit:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <?= proc_text_input('text', 'form-control', 'cform-unit-title', 'cform-unit', $required = true, ''); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <label>Quantity:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <?= proc_text_input('text', 'form-control', 'cform-quantity', 'cform-quantity', $required = true, ''); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>ABC:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
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
                            <label>Purchase Number:</label>
                            <div class="input-group date">
                                <?= proc_group_select('Item', 'unit_item', $app_item_list, '1', '', '', false, '', true); ?>
                                <?= proc_text_input('hidden', 'form-control', 'app-items', 'app-items', $required = true, ''); ?>

                            </div>
                        </div>
                        <div class="form-group">

                            <?= proc_text_input('hidden', 'form-control', 'item-title', 'item-title', $required = true, ''); ?>
                            <?= proc_text_input('hidden', 'form-control', 'stocknumber', 'stocknumber', $required = true, ''); ?>
                            <?= proc_text_input('hidden', 'form-control', 'unit-id', 'unit-id', $required = true, ''); ?>
                            <?= proc_text_input('hidden', 'form-control', 'pr-id', 'pr-id', $required = true, $get_pr_id['id']); ?>
                            <?= proc_text_input('hidden', 'form-control', 'pr-no', 'pr-no', $required = true, $get_pr['pr_no']); ?>
                            <?php foreach ($pmo as $key => $pmo_data) : ?>
                                <?php if ($pmo_data['id'] == $_GET['division']) : ?>
                                    <?= proc_text_input('text', 'form-control', 'pmo', 'pmo', $required = true, $pmo_data['id']); ?>
                                <?php endif; ?>

                            <?php endforeach ?>
                        </div>
                        <div class="form-group">
                            <label>Unit:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <?= proc_text_input('text', 'form-control', 'unit', 'unit', $required = true, ''); ?>

                            </div>
                        </div>
                        <div class="form-group">
                            <label>Quantity:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <?= proc_text_input('text', 'form-control', 'quantity', 'quantity', $required = true, ''); ?>
                            </div>
                        </div>
                        <div class="form-group">
                            <label>ABC:</label>
                            <div class="input-group">
                                <div class="input-group-addon">
                                    <i class="fa fa-calendar"></i>
                                </div>
                                <?= proc_text_input('text', 'form-control', 'abc', 'abc', $required = true, ''); ?>
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

    //   BUTTONS
    //   things to do
    // 1. end-user can copy others pr
    // 2. end-user must recieved an email if their pr was already awarded

    //   TASK
    // 1. insert selected item from db with out refreshing the page
    // 2. able to edit quantity and pr item by the end-user
    // 3. before saving this PR,  system will check first if the current pr no is already exist
    //    otherwise assign a new pr number
    function generateItemsTable() {
        $.post({
            url: 'GSS/views/PR/form2/items_table.php',
            data: {
                id: '<?= $get_pr_id['id']; ?>',
                pr_no: '<?= $get_pr['pr_no']; ?>'
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
                id: '<?= $get_pr_id['id']; ?>',
            },
            success: function(data) {
                $('#total_abc').html(data);
            }
        })

    }

    function ScanPRTable($id) {
        $.post({
            url: 'GSS/route/post_scan.php',
            data: {
                pr_no: '<?= $get_pr['pr_no']; ?>'
            },
            success: function(data) {
                alert(data);
                toastr.warning("Oops! PR-Number: <?= $_GET['pr_no'];?> is already exist!.");
            }
        })

    }

    $(document).on('click', '#btn_submit', function () {
        ScanPRTable(<?= $_GET['pr_no']; ?>);
        // let serialize_data = $('#form_pr_item').serialize();
        // let pmo = $('#pmo').val();


        // if ($('#cform-particulars').val() == '') {
        //     toastr.error("Error! All fields are required!");
        // } else {
        //     $.get({
        //         url: 'GSS/route/post_create_pr.php?cform-pmo=' + pmo + '&' + serialize_data,
        //         success: function (data) {
        //             toastr.success("Successfully Added this PR!");
        //             window.location = "procurement_purchase_request.php?division=" + pmo;


        //         }
        //     })
        // }

    })
    $(document).on('click', '#btn-add-item', function() {
        let form = $('#form-add-item').serialize();
        $.get({
            url: 'GSS/route/post_create_pr_item.php?' + form,
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
            pr_id: <?= $get_pr_id['id']; ?>
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
                    $('#quantity').val(item['qty']);
                    $('#stocknumber').val(item['sn']);
                    $('#abc').val(item['price']);
                    $('#unit').val(item['unit_id']);
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
            url: 'GSS/route/post_edit_item.php?' + form + '&id=<?= $get_pr_id['id']; ?>+',
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
                $('#unit').val(data.unit_id);
                $('#unit-id').val(data.unit);
            }
        })
    });
    $(document).ready(function() {
        generateItemsTable();
        fetchABC();
        $("#cform-app-code").click(function() {
        $("#exampleModal").modal("show");
        $('#cform-unit').select2({
            dropdownParent: $('#exampleModal'),
            width: '550'
        });
        $('#cform-unit_item').select2({
            dropdownParent: $('#editItemModal'),
            width: '550'

        });

    
       
    })
    $('#datepicker1').datepicker({
            autoclose: true
        })
        $('#datepicker2').datepicker({
            autoclose: true
        })
    })
</script>