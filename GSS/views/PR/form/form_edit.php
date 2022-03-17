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
    <form id="pr_edit_form" class="form-vertical" method="post" role="form">

        <div class="row">

            <div class="col-lg-12">
                <p>
                    <button type="button"  class="btn btn-flat bg-orange" value=""><a href="procurement_purchase_request_view.php?division=<?= $_GET['division']; ?>&id=<?= $_GET['id']; ?>" style="color: #fff;"><i class=" fa fa-arrow-circle-left"></i> RETURN</a></button>
                    <button type="button"  class="btn btn-flat bg-green " id="btn_edit_pr" value="<?= $_GET['id'];?>"> <i class=" fa fa-save"></i> SAVE</a></button>
                    <button type="button"  class="btn btn-flat bg-purple pull-right " value="/documentroute/createreject?routeno=1751014&amp;docno=R4A-2021-07-27-001&amp;receivedfrom=1551&amp;userid=8516"><i class="fa fa-file-excel-o"></i><a style="color:#fff;" href="export_pr.php?pr_no=<?= $_GET['id']; ?>"> EXPORT PR</a></button>
                </p>
                <div class="box box-info">
                    <div class="box-header with-border">
                        <b>Purchase Request Information</b>
                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                <i class="fa fa-minus"></i>
                            </button>
                        </div>
                    </div>

                    <div class="box-body">
                            <input type="hidden" name="_csrf" value="">
                            <?= proc_text_input('hidden', '', 'pr_no', 'pr_no', $required = false, $pr_data['pr_no']) ?>
                            <?= proc_text_input('hidden', '', 'division', 'division', $required = false, $_GET['division']) ?>
                            <div id="w1-container" class="kv-view-mode">
                                <div class="kv-detail-view">
                                    <table id="w1" class="table table-bordered table-striped detail-view" data-krajee-kvdetailview="kvDetailView_4eb2b924">
                                        <tbody>
                                            <tr class="kv-child-table-row">
                                                <td class="kv-child-table-cell" colspan="2">
                                                    <table class="kv-child-table">
                                                        <tbody>
                                                            <tr>
                                                                <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Purchase No.</th>
                                                                <td>
                                                                    <div class="kv-attribute">
                                                                        <?= $pr_data['pr_no']; ?>
                                                                    </div>
                                                                 
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr class="kv-child-table-row">
                                                <td class="kv-child-table-cell" colspan="2">
                                                    <table class="kv-child-table">
                                                        <tbody>
                                                            <tr>
                                                                <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Office/Province:</th>
                                                                <td>
                                                                    <div class="kv-attribute"><?= $pr_data['office']; ?></div>
                                                                    <div class="kv-form-attribute" style="display:none">
                                                                        <div class="form-group highlight-addon field-documentroute-doc_no required">
                                                                            <div><input type="text" id="documentroute-doc_no" class="form-control" name="Documentroute[DOC_NO]" value="R4A-2021-07-27-001" aria-required="true">
                                                                                <div class="help-block"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr class="kv-child-table-row">
                                                <td class="kv-child-table-cell" colspan="2">
                                                    <table class="kv-child-table">
                                                        <tbody>
                                                            <tr>
                                                                <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">PR Date</th>
                                                                <td>
                                                                    <div class="kv-attribute">
                                                                        <div class="form-group">
                                                                            <div class="input-group date">
                                                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                                                <?= proc_text_input("text", "form-control pull-right info-dates", "datepicker2", "pr_date", true, $pr_data['pr_date']) ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="kv-form-attribute" style="display:none">
                                                                        <div class="form-group highlight-addon field-documentroute-route_date">
                                                                            <div><input type="text" id="documentroute-route_date" class="form-control" name="Documentroute[ROUTE_DATE]" value="2021-07-27 12:03:00">
                                                                                <div class="help-block"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr class="kv-child-table-row">
                                                <td class="kv-child-table-cell" colspan="2">
                                                    <table class="kv-child-table">
                                                        <tbody>
                                                            <tr>
                                                                <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Target Date</th>
                                                                <td>
                                                                    <div class="kv-attribute">
                                                                        <div class="form-group">
                                                                            <div class="input-group date">
                                                                                <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                                                <?= proc_text_input("text", "form-control pull-right info-dates", "datepicker1", "target_date", true, $pr_data['target_date']) ?>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="kv-form-attribute" style="display:none">
                                                                        <div class="form-group highlight-addon field-documentroute-route_date">
                                                                            <div><input type="text" id="documentroute-route_date" class="form-control" name="Documentroute[ROUTE_DATE]" value="2021-07-27 12:03:00">
                                                                                <div class="help-block"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>

                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr class="kv-child-table-row">
                                                <td class="kv-child-table-cell" colspan="2">
                                                    <table class="kv-child-table">
                                                        <tbody>
                                                            <tr>
                                                                <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Type</th>
                                                                <td>
                                                                    <div class="kv-attribute"><span class="text-justify">
                                                                       
                                                                                <select class="form-control" style="width: 100%;" name="type">
                                                                                    <?php foreach ($app_type as $key => $data):?>
                                                                                        <option value = '<?= $data['id'];?>'><?= $data['type'];?></option>
                                                                                    <?php endforeach; ?>
                                                                                </select>

                                                                        
                                                                    </div>
                                                                    <div class="kv-form-attribute" style="display:none">
                                                                        <div class="form-group highlight-addon field-documentroute-docsubject">
                                                                            <div><textarea id="documentroute-docsubject" class="form-control" name="Documentroute[docSubject]" rows="4">RSAKM IMPLAN: GUIDE FOR PREPARATION OF RSAKM ACCOMPLISHMENT PRESENTATION IN THE ERIC CALABARZON AND MIMAROPA MEETINGS ON 28 JULY 2021</textarea>
                                                                                <div class="help-block"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr class="kv-child-table-row">
                                                <td class="kv-child-table-cell" colspan="2">
                                                    <table class="kv-child-table">
                                                        <tbody>
                                                            <tr>
                                                                <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Purpose</th>
                                                                <td>
                                                                    <div class="kv-attribute"><textarea style="width: 971px; height: 68px;resize:none;" name="purpose"><?= $pr_data['purpose']; ?></textarea></div>
                                                                    <div class="kv-form-attribute" style="display:none">
                                                                        <div class="form-group highlight-addon field-documentroute-docdesc">
                                                                            <div><textarea id="documentroute-docdesc" class="form-control" name="" rows="2">RSAKM IMPLAN: GUIDE FOR PREPARATION OF RSAKM ACCOMPLISHMENT PRESENTATION IN THE ERIC CALABARZON AND MIMAROPA MEETINGS ON 28 JULY 2021</textarea>
                                                                                <div class="help-block"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr class="kv-child-table-row">
                                                <td class="kv-child-table-cell" colspan="2">
                                                    <table class="kv-child-table">
                                                        <tbody>
                                                            <tr></tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr class="kv-child-table-row">
                                                <td class="kv-child-table-cell" colspan="2">
                                                    <table class="kv-child-table">
                                                        <tbody>
                                                            <tr>
                                                                <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">ABC</th>
                                                                <td>
                                                                    <div class="kv-attribute">₱ <?= number_format($pr_data['abc'], 2); ?></div>
                                                                    <div class="kv-form-attribute" style="display:none">
                                                                        <div class="form-group highlight-addon field-documentroute-actionname">
                                                                            <div><input type="text" id="documentroute-actionname" class="form-control" name="Documentroute[actionName]" value="APPROPRIATE STAFF ACTION">
                                                                                <div class="help-block"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr class="kv-child-table-row">
                                                <td class="kv-child-table-cell" colspan="2">
                                                    <table class="kv-child-table">
                                                        <tbody>
                                                            <tr>
                                                                <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Current Status</th>
                                                                <td>
                                                                    <div class="kv-attribute"><b><?= $pr_data['status']; ?></b></div>
                                                                    <div class="kv-form-attribute" style="display:none">
                                                                        <div class="form-group highlight-addon field-documentroute-route_remarks">
                                                                            <div><textarea id="documentroute-route_remarks" class="form-control" name="Documentroute[ROUTE_REMARKS]" rows="4"></textarea>
                                                                                <div class="help-block"></div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>
                                            <tr class="kv-child-table-row">
                                                <td class="kv-child-table-cell" colspan="2">
                                                    <table class="kv-child-table">
                                                        <tbody>
                                                            <tr></tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>

                                          
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </form>


                        <!-- All attached files -->
                        <!-- <p><span class="fa fa-info-circle fa-fw"></span><i>There are <b class="text-danger">5 ITEMS</b> in this Purchase Request.</i></p> -->
                        <hr>
                        <p><a class="btn btn-sm btn-info collapsed" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="true" aria-controls="multiCollapseExample1">PR ITEM <i class="fa fa-angle-double-down fa-fw"></i></a></p>
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="collapse multi-collapse" id="multiCollapseExample1">
                                    <div class="card card-body"  style="height: 500px; max-height: 250px; overflow-y: auto;" >
                                        <table class="table table-responsive">
                                            <tbody>
                                                <tr>
                                                    <th>Item</th>
                                                    <th>Item Description</th>
                                                    <th>Unit</th>
                                                    <th>Quantity</th>
                                                    <th>Unit Cost</th>
                                                    <th>Total Cost</th>
                                                    <th>Action</th>
                                                </tr>
                                                <?php foreach ($pr_items as $key => $data) : ?>
                                                    <tr>
                                                        <td hidden><input type="hidden" value="<?= $data['id']; ?>" id="id" /></td>
                                                        <td><?= $data['items']; ?></td>
                                                        <td><?= $data['description']; ?></td>
                                                        <td><?= $data['unit']; ?></td>
                                                        <td><?= $data['qty']; ?></td>
                                                        <td>₱ <?= number_format($data['total'], 2); ?></td>
                                                        <td>₱ <?= number_format($data['abc'], 2); ?></td>
                                                        <td>
                                                            <button type ="button" class="btn btn-flat bg-blue col-lg-5" id="btn_pr_edit" value="<?= $data['id']; ?>"><i class="fa fa-edit"></i> </button>
                                                            <button type ="button" class="btn btn-flat bg-red col-lg-5" id="btn_pr_del" value="<?= $data['id']; ?>"><i class="fa fa-trash"></i></button>
                                                        </td>

                                                    </tr>
                                                <?php endforeach; ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

</div>

</section>
</div>
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 1000px;">
        <div class="modal-content">

            <div class="modal-body box item-list-table box-primary box-solid dropbox" style="height:600px;" id="list">

            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        $(".select2").select2();
    })
    $(document).on('click', '#btn_pr_edit', function() {
        let item_id = $(this).val();
        let path = 'GSS/route/post_item_list.php';
        let data = {
            id: item_id,
            pr_no: $('#pr_no').val()
        };

        $.post(path, data, function(data, status) {
            //$('#app_table').empty();
            let lists = JSON.parse(data);
            sample(lists);
            $('#exampleModal').modal();
            $(".select2").select2({
                dropdownParent: $("#exampleModal")
            });


        });

        function sample($data) {
            $.each($data, function(key, item) {
                let row = '<form id="item_form"><div class="box-header with-border bg-blue">PR NO.' + item['pr_no'] + ' </div><div class="box-body box-emp">';
                row += '<div class="box-header with-border">';
                row += '<div class="row" class="box-body box-emp">';
                row += '<div class="col-lg-12">';
                row += '<label>APP Item <font style="color: Red;">*</font> </label>';

                row += '<?= group_select('Item', 'item', $app_item_list, '', 'select2', '', false, '', true); ?>';
                row += '</div>';
                row += '<div class="col-lg-12">';
                row += '<div hidden>';
                row += '<input type="text" id="app_items" class="form-control"  />';
                row += '</div>';
                row += '<div hidden>';
                row += '<input type="text" id="item_title" class="form-control" />';
                row += '</div>';
                row += '<br>';
                row += '<label>Stock/Property No. <font style="color: Red;">*</font> </label>';
                row += '<input type="text" id="stocknumber" class="form-control" readonly  value=' + item['sn'] + '>';
                row += '<br>';
                row += '<label>Quantity <font style="color: Red;">*</font></label>';
                row += '<br>';
                row += '<input class="form-control" type="number" id="qty" value=' + item['qty'] + '>';

                row += '<label>Unit <font style="color: Red;">*</font></label>';
                row += '<?= group_select('Item', 'unit', $pr_unit_opts, '', 'select2', '', false, '', true); ?>';
                row += '<input type="hidden" id="unit" class="form-control" value = ' + item['unit'] + '>';
                row += '<br>';
                row += '<label>Description/Specification </label>';
                row += '<textarea id="desc" rows="1" cols="50" class="form-control" style="resize:none;outline:none;">' + item['description'] + '</textarea>';


                row += '<label>Unit Cost <font style="color: Red;">*</font></label>';
                row += '<br>';
                row += '<input class="form-control" type="text" id="abc" readonly value = ' + item['abc'] + '>';
                row += '<input input type="hidden" class="form-control" type="text" id="total_cost" value = ' + item['total'] + ' readonly>';
                row += '<input input type="hidden" class="form-control" type="text" id="items1" readonly>';

                row += '</div>';

                row += '</div>';
                row += '</div>';
                row += '</div>';
                row += '<div class="col-lg-3">';

                row += '<button type="button" id="btn_update_item" class="btn btn-flat bg-green col-lg-12"> Update Item </button>';
                row += '</div>';
                row += '</div></div>';
                $('#list').append(row);
            });

            return $data;
        }
        $("#list").html("");

    })
    $(document).on('click','#btn_pr_del',function(){
        let item_id = $(this).val();
        console.log(item_id);
        let path = 'GSS/route/post_del_item.php';


        $.post({
                url: path,
                data: {
                    id: item_id
                },
                success: function (data) {
                        toastr.success("Successfully Added APP Item!");
                        setTimeout(
                            function () {
                                window.location = "procurement_purchase_request_edit.php?id="+$('#pr_no').val()+"&division=" + $('#division').val();
                            },
                            1000);

                    }
                
            })
    })

    $(document).on('click', '#btn_update_item', function() {
        let path = 'GSS/route/post_edit_pr_item.php';
        update(path);

        function update(path) {
            $.post({
                url: path,
                data: {
                    'id': $('#id').val(),
                    'pr_no': $('#pr_no').val(),
                    'app_item': $('#app_items').val(),
                    'procurement': $('#item_title').val(),
                    'qty': $('#qty').val(),
                    'unit': $('#cform-unit').val(),
                    'description': $('#desc').val(),
                    'unit_cost': $('#abc').val()
                },
                success: function(data) {
                   //window.location = "procurement_purchase_request_edit.php?id="+$('#pr_no').val()+"&division="+$('#divisions').val();

                }
            })
        }
    })
    
</script>