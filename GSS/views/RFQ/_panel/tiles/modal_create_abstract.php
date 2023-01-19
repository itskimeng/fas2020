<div class="modal fade" id="abstract_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 1500px;">
        <div class="modal-content" style="border-radius: 20px;height:750px;">
            <div class="modal-header">
                <div style="font-size: 15pt;margin-left:25%;font-family:'Times New Roman">DEPARTMENT OF THE INTERIOR
                </div>
                <div
                    style="width: 75px; height: 75px; border-radius: 50%; display: flex; align-items: center; justify-content: center; position: absolute; top: -18px; background-color: white; color: #4cae4c; left: 48%;">
                    <img src="GSS/views/backend/images/logo.png" style="width:60px; height:60px;" />
                </div>
                <div
                    style="position:relative;font-size: 15pt;margin-left:55%;margin-top:-30px;font-family:'Times New Roman">
                    AND LOCAL GOVERNMENT</div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="form-abstract">
                    <div id='multi_rfq_panel'>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-primary hideme table-abstract" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
                                    <div class="box-header with-border">
                                        <img src="GSS/views/backend/images/1.png" style="width:25px;" /> Choose supplier
                                        for the creation of abstract number.
                                        <button type="button" class="btn btn-xs btn-success" data-rfq= "" data-rfq_no = "" id="btn-proceed"> Proceed
                                        </button>
                                    </div>
                                    <div class="box-body">
                                        <table class="table table-condensed table-striped" id="supplier_table">
                                            <thead class="bg-primary">
                                                <tr>
                                                    <th></th>
                                                    <th>Supplier</th>
                                                    <th>Address</th>
                                                    <th>Contact Number</th>
                                                    <th>Rankings</th>
                                                    <th>Category</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php foreach($supplier_list as $key => $item):?>
                                                <tr>
                                                    <td> <?= $item['id'];?></td>
                                                    <td> <?= $item['supplier']; ?> </td>
                                                    <td> <?= $item['supplier_address'];?> </td>
                                                    <td> <?= $item['contact_person'];?> </td>
                                                    <td> <?= 1;?> </td>
                                                    <td> <?= $item['industry'];?> </td>
                                                </tr>
                                                <?php endforeach;?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="box box-primary hideme table-item" style="display:none">
                                    <div class="box-header with-border">
                                        <img src="GSS/views/backend/images/2.png" style="width:25px" /> Filled-up all data capture to complete awarding. <button type="button" class="btn btn-sm btn-warning" id="btn-back">Back
                                        </button>
                                        <button type="button" class="btn btn-sm btn-success" id="btn-award">Award
                                        </button>
                                        <button type="button" class="btn btn-sm btn-primary" id="btn-draft">Save as
                                            Draft </button>
                                    </div>
                                    <div class="box-body"
                                        style="height: 500px!important; max-height: 500px!important; overflow-y: auto;">
                                        <div class="panel panel-primary">
                                            <div class="panel-heading">
                                                <span><i class="fa fa-bar-chart-o fa-fw"></i>AWARDING</span>

                                            </div>

                                            <div class="box-body box-emp">
                                                <div class="row">
                                                    <div class="col-md-3">
                                                        <div id="cgroup-filter_year" class="form-group">
                                                            <label class=" control-label">Abstract No.: </label>
                                                            <input type="text" class="form-control" value="<?= $abstract_no['abstract_no'];?>" name="cform-abstract_no" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div id="cgroup-filter_year" class="form-group">
                                                            <label class=" control-label">RFQ No.: </label>
                                                            <input type="text" class="form-control" id="cform-rfq_no" name="cform-rfq_no" disabled />
                                                            <input type="hidden" class="form-control" id="cform-hidden-rfq_no" name="cform-rfq_no"  />
                                                            <input type="text" class="form-control" id="cform-rfq_id" name="cform-rfq_id"  />
                                                            <input type="hidden" class="form-control" id="cform-pr_id" name="cform-pr_id"  />

                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div id="cgroup-filter_year" class="form-group">
                                                            <label class=" control-label">PR No.: </label>
                                                            <input type="text" class="form-control" id="cform-pr_no" disabled/>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div id="cgroup-filter_year" class="form-group">
                                                            <label class=" control-label">Total ABC: </label>
                                                            <input type="text" class="form-control" id="cform_abc" disabled />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div id="cgroup-filter_year" class="form-group">
                                                            <label class=" control-label">Abstract Date: </label>
                                                            <input type="date" class="form-control" name="cform-abstract_date" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div id="cgroup-filter_year" class="form-group">
                                                            <label class=" control-label">RFQ Date: </label>
                                                            <input type="text" class="form-control" id="cform-rfq_date" disabled  />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <div id="cgroup-filter_year" class="form-group">
                                                            <label class=" control-label">PR Date: </label>
                                                            <input type="text" class="form-control" id="cform-pr_date" />
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="col-md-3">
                                                    <div id="cgroup-filter_year" class="form-group">
                                                            <label class=" control-label">Office: </label>
                                                            <input type="text" class="form-control" id="cform-office" disabled/>
                                                        </div>
                                                    </div>
                                                  

                                                </div>
                                            </div>
                                        </div>
                                        <table class="table table-condensed table-striped">
                                            <thead class="bg-primary" id="awarding">

                                            </thead>
                                            <tbody id="pr_item">

                                            </tbody>
                                        </table>
                                       
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <input type="hidden" id="data-pr-id" name="data-pr-id" />
                                <!-- <button type="button" class="btn btn-success" style="width: 100%;"
                                 >Save</button> -->

                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    var supplier_table = $('#supplier_table').DataTable({
            "bInfo": false,
            'lengthChange': false,
            "dom": '<"pull-left"f><"pull-right"l>tip',
            'ordering': false,
            "bFilter": true,
            "bAutoWidth": false,
            "dom": '<"pull-left"f><"pull-right"l>tip',
            'paging': true,
            "searching": true,
            "paging": true,
            "info": false,
            "bLengthChange": false,
            "lengthMenu": [
                [8, 20, -1],
                [8, 20, 'All']
            ],
            'columnDefs': [{
                'targets': 0,
                'checkboxes': {
                    'selectRow': true
                }
            }],
            'select': {
                'style': 'multi'
            },
        })
    $('#datepicker1').datepicker({
        autoclose: true
    })
    
 
    $(document).on('click', '#btn-back', function() {
        $('.table-abstract').show(1000);
        $('.table-item').addClass('fadeInUp');
        $('.table-item').hide(1000);

    })

    function showData(id,rfq_no) {
            let path = 'GSS/views/RFQ/_panel/tiles/showData.php'
            $.post({
                url: path,
                data: {
                    pr_id: id,
                    rfq:rfq_no
                },
                success: function(result) {
                    var data = jQuery.parseJSON(result);
                    $('#cform-rfq_no').val(data.rfq_no)
                    $('#cform-hidden-rfq_no').val(data.rfq_no)
                    $('#cform-rfq_id').val(data.rfq_id)
                    $('#cform-pr_id').val(data.pr_id)
                    $('#cform-pr_no').val(data.pr_no)
                    $('#cform_abc').val(data.total_abc)
                    $('#cform-rfq_date').val(data.rfq_date)
                    $('#cform-pr_date').val(data.pr_date)
                    $('#cform-office').val(data.office)
                    $('#cform-rfq_no').val(data.rfq_no)
                }
            })

        }
        function showMultipleData(rfq_id) {
            let path = 'GSS/views/RFQ/_panel/tiles/showMultipleData.php'
            $.post({
                url: path,
                data: {
                    rfq:rfq_id
                },
                success: function(result) {
                    var data = jQuery.parseJSON(result);
                    $('#cform-pr_no').val(data.pr_no)
                    $('#cform-rfq_no').val(data.rfq_no)
                    $('#cform-hidden-rfq_no').val(data.rfq_no)
                    $('#cform-rfq_id').val(data.rfq_id)
                    $('#cform-pr_id').val(data.pr_id)
                    $('#cform_abc').val(data.total_abc)
                    $('#cform-rfq_date').val(data.rfq_date)
                    $('#cform-pr_date').val(data.pr_date)
                    $('#cform-office').val(data.office)
                    $('#cform-rfq_no').val(data.rfq_no)
                }
            })

        }
        function fetchSelectedSupplier(item) {
            $.post({
                url: 'GSS/views/RFQ/_panel/tiles/awarding_item_table.php',
                data: {
                    id: item,
                },
                success: function(data) {
                    $('#awarding').html(data);
                    // $('#data-pr-id').val(item)
                }
            })

        }
        function fetchItem(id,rid,rfq_no, item,flag) {
            $.post({
                url: 'GSS/views/RFQ/_panel/tiles/fetch_pr_item.php',
                data: {
                    pr_id: id,
                    rfq_id:rid,
                    rfq:rfq_no,
                    supplier_id: item
                },
                success: function(data) {
                    $('#pr_item').html(data);
                }
            })
        }

    $(document).on('click', '#btn-proceed', function() {
        $('.table-abstract').hide(1000);
        $('.table-item').removeClass('hidden');
        $('.table-item').show(1000);

            var form = $('#form-abstract').val();
            var rows_selected = supplier_table.column(0).checkboxes.selected();
            $.each(rows_selected, function(index, rowId) {
                $(form).append(
                    $('<input>')
                    .attr('type', 'hidden')
                    .attr('name', 'id[]')
                    .val(rowId)
                );
            });
            let data_id = "'" + rows_selected.join("','") + "'";
            count_supp = data_id.split(',').length;
            // console.log($(this).val()
            <?php if (($is_multiple_pr['is_multiple'])): ?>
            showMultipleData($(this).attr('data-rfq_no'));
            <?php else:?>
            showData($(this).val(),$(this).attr('data-rfq'));
            <?php endif; ?>
            fetchSelectedSupplier(data_id);
            fetchItem($(this).val(),$(this).attr('data-rfq'),$(this).attr('data-rfq_no'), data_id);

        })

})
</script>