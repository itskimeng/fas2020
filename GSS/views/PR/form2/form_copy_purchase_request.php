<div class="col-md-12">
    <div class="callout callout-success callout-dismissable">
        <p><i class="fa fa-info-circle"></i>&nbsp; <b>INSTRUCTION</b></p>
        <ul style="margin-left: -2.5%;">
            <li></i>Select item from the table by ticking the <b>CHECKBOX</b>.</li>
            <li></i> To continue, click the <b>MOVE AND COPY BUTTON</b> selecting an item.</li>
        </ul>
    </div>
</div>
<form id="frm-example">
    <div class="row">
        <div class="col-lg-12">
            <div class="box box-success dropbox">
                <div class="box-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="btn-group">
                                <button class="btn btn-warning"><i class="fa fa-arrow-circle-left"></i> <a class="link" href="procurement_purchase_request_createv2.php?id=<?= $_GET['id']; ?>&pr_no=<?= $_GET['pr_no']; ?>&stat=draft&division=<?= $_GET['division']; ?>">Back</a></button>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="pull-right">
                                <div class="btn-group">
                                    &nbsp;&nbsp;<button class="btn-style btn-1 btn-sep icon-copy" id="btn_copy">Move and Copy</button>
                                </div>
                            </div>&nbsp;
                            <div class="pull-right">
                                <div class="btn-group">
                                    &nbsp;&nbsp;<button type="button" class="btn-style btn-3 btn-sep icon-save" id="btn_save">Save and Continue</button>
                                </div>
                            </div>&nbsp;

                        </div>


                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-8">
            <div class="box box-success">

                <div class="box-body">
                    <table class="table table-bordered" id="example">
                        <thead class="bg-success">
                            <th></th>
                            <th>PURCHASE NO.</th>
                            <th>ITEM</th>
                            <th>DESCRIPTION</th>
                            <th>QUANTITY</th>
                            <th>PRICE PER ITEM</th>
                            <th>TOTAL AMOUNT</th>
                        </thead>
                        <tbody>

                            <?php foreach ($pr_copy_opts as $key => $item) : ?>
                                <tr>
                                    <td><?= $item['id']; ?></td>
                                    <td><?= $item['pr_no']; ?></td>
                                    <td><?= $item['item']; ?></td>
                                    <td><?= $item['description']; ?></td>
                                    <td><?= $item['quantity']; ?></td>
                                    <td><?= $item['abc']; ?></td>
                                    <td><?= $item['total_abc']; ?></td>

                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
        <div class="col-lg-4">
            
            <div class="box box-success" style="height: 780px;overflow-y: auto;">
            <div class="box-header">
            <h3 class="box-title"><i class="fa fa-book"></i> List of APP Item </h3>
        </div>
                <div class="box-body">
                    <table class="table table-bordered" id="monitoring">
                        <thead class="bg-success">
                            <th>ITEM</th>
                            <th>UNIT</th>
                            <th>QUANTITY</th>
                            <th>ABC AMOUNT</th>
                            <th>TOTAL AMOUNT</th>

                        </thead>
                        <tbody id="items">

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
</form>
</div>
<link type="text/css" href="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/css/dataTables.checkboxes.css" rel="stylesheet" />
<script type="text/javascript" src="//gyrocode.github.io/jquery-datatables-checkboxes/1.2.12/js/dataTables.checkboxes.min.js"></script>

<script>
    $(document).ready(function() {

        function generateItemsTable() {
            $.post({
                url: 'GSS/views/PR/form2/clients_item_table.php',
                data: {
                    id: '<?= $_GET['id']; ?>',
                    pr_no: '<?= $get_pr['pr_no']; ?>'
                },
                success: function(data) {
                    $('#items').html(data);
                }
            })

        }
        generateItemsTable();
        var table = $('#example').DataTable({
            "dom": '<"pull-left"f><"pull-right"l>tip',
            'paging': true,
            "searching": true,
            "paging": true,
            "info": false,
            "bLengthChange": false,
            "lengthMenu": [
                [10, 20, -1],
                [10, 20, 'All']
            ],
            "ordering": true,
            'columnDefs': [{
                'targets': 0,
                'checkboxes': {
                    'selectRow': true
                }
            }],
            'select': {
                'style': 'multi'
            },

        });
        $('#frm-example').on('submit', function(e) {
            var form = this;
            var rows_selected = table.column(0).checkboxes.selected();
            $.each(rows_selected, function(index, rowId) {
                // Create a hidden element 
                $(form).append(
                    $('<input>')
                    .attr('type', 'text')
                    .attr('name', 'id[]')
                    .val(rowId)
                );
            });

            let data_id = "'" + rows_selected.join("','") + "'";
            console.log(data_id);
            

            $.post({
                url: 'GSS/route/post_pr_copy.php',
                data: {
                    id: data_id,
                    pr_id: "<?= $_GET['id']; ?>",
                    pr_no: "<?= $_GET['pr_no']; ?>"
                },
                success: function(data) {
                    generateItemsTable();
                    toastr.success("This item was successfully copied into your purchasing table.");


                }
            })

            e.preventDefault();
        });
    });
    $(document).on('click', '#btn_save', function() {

        setTimeout(
            function() {
                window.location = "procurement_purchase_request_createv2.php?id=<?= $_GET['id'];?>&pr_no=<?= $_GET['pr_no'];?>&stat=draft";
            },
            1000);
    })
</script>