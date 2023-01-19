<div class="col-md-12">
    <div class="box box-solid">
        <div class="box-header with-border">
            <h3 class="box-title">Monitoring F.Y 2023</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="box-group" id="accordion">
                <div class="panel box box-primary">
                    <div class="box-header with-border">
       
                    </div>
                    <div id="collapseOne" class="panel-collapse collapseing" aria-expanded="true">
                        <div class="box-body">
                            <div class="table-responsive">
                                <ul class="cd-breadcrumb triangle nav nav-tabs" role="tablist">
                                    <li role="presentation" class="active">
                                        <a href="#Ideate" aria-controls="ideate" role="tab" data-toggle="tab" aria-expanded="true">
                                        <i class="fa fa-list" aria-hidden="true"></i> Monitoring 
                                        </a>
                                    </li>
                                    <li role="presentation" class="">
                                        <a href="#Submit" aria-controls="submit" role="tab" data-toggle="tab" aria-expanded="false">
                                            <span class="octicon octicon-diff-added"></span>Create RFQ
                                        </a>
                                    </li>
                                    <li role="presentation" class="">
                                        <a href="#Discuss" aria-controls="discuss" role="tab" data-toggle="tab" aria-expanded="false">
                                            <span class="octicon octicon-comment-discussion"></span>Create Abstract
                                        </a>
                                    </li>
                                    <li role="presentation" class="">
                                        <a href="#GetValidated" aria-controls="get-validated" role="tab" data-toggle="tab" aria-expanded="false">
                                            <span class="octicon octicon-verified"></span>Philgeps Monitoring
                                        </a>
                                    </li>
                                    <li role="presentation" class="">
                                        <a href="#Work" aria-controls="work" role="tab" data-toggle="tab" aria-expanded="false">
                                            <span class="octicon octicon-tools"></span>Meals Monitoring
                                        </a>
                                    </li>
                                    <li role="presentation" class="">
                                        <a href="#Work" aria-controls="work" role="tab" data-toggle="tab" aria-expanded="false">
                                            <span class="octicon octicon-tools"></span>RESO
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div role="tabpanel" class="tab-pane active" id="Ideate">
                                    <?php include 'tiles/monitoring.php' ?>

                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="Submit">
                                        <?php include 'tiles/rfq_table.php'; ?>


                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="Discuss">
                                    <?php include 'tiles/abstract_table.php'; ?>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="GetValidated">
                                    <?php //include 'tiles/philgeps_table.php'; ?>

                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="Work">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>

<!-- Modal -->

<?php include 'tiles/modal_create_rfq.php'; ?>
<?php include 'tiles/modal_create_abstract.php'; ?>
<?php include 'tiles/modal_show_abstract.php'; ?>
<script>
    $(document).ready(function() {
        var table = $('#rfq_table').DataTable({
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
                [5, 20, -1],
                [5, 20, 'All']
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
       
        let count_supp = '';
        
        var abstract = $('#abstract_table').DataTable(
            {

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
                [5, 20, -1],
                [5, 20, 'All']
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
        
        }
        )
        $(document).on('click', '#rfq_collapse', function() {
            let val = $(this).attr('class');
            if (val == 'collapsed') {
                $('#btn-create-rfq').hide()
            } else {
                $('#btn-create-rfq').show()

            }

        })

        $(document).on('click', '#btn-create-rfq', function() {
            var form = $('#form-rfq').val();
            var rows_selected = table.column(0).checkboxes.selected();
            $.each(rows_selected, function(index, rowId) {
                $(form).append(
                    $('<input>')
                    .attr('type', 'hidden')
                    .attr('name', 'id[]')
                    .val(rowId)
                );
            });

            let data_id = "'" + rows_selected.join("','") + "'";
        prDataList(data_id); // show selected pr on the table
            $('#rfq_modal').modal('show');
        })
        $(document).on('click', '#btn-create-abstract', function() {
            var form = $('#form-abstract').val();
            var rows_selected = abstract.column(0).checkboxes.selected();
            $.each(rows_selected, function(index, rowId) {
                $(form).append(
                    $('<input>')
                    .attr('type', 'hidden')
                    .attr('name', 'id[]')
                    .val(rowId)
                );
            });

            let data_id = "'" + rows_selected.join("','") + "'";
        let pr_id = $(this).data('value');
        let rfq = $(this).attr('data-value');
        let rno = $(this).attr('data-rno');
        $('#btn-proceed').val(pr_id);
        $('#abstract_modal').modal('show');
        $('#btn-proceed').val($(this).attr('data-pr'));
        $('#btn-proceed').attr('data-rfq', rfq);
        $('#btn-proceed').attr('data-rfq_no', rno);
    })


      

        $(document).on('click', '#btn-award', function() {
            // fetch all supplier quotation
            // insert to db

            let form_serialize = $('#form-abstract').serialize();
            award(form_serialize);




        })
        // F U N C T I O N S
        function prDataList(item) {
            $.post({
                url: 'GSS/views/RFQ/_panel/tiles/pr_item_table.php',
                data: {
                    id: item,
                },
                success: function(data) {
                    $('#items').html(data);
                    $('#data-pr-id').val(item)
                }
            })

        }
        

       

       

        function countSupplierQuote() {
            $.post({
                url: 'GSS/views/RFQ/_panel/tiles/fetch_pr_item.php',
                data: {
                    id: id,
                    supplier_id: item
                },
                success: function(data) {
                    return data;
                }
            })
        }

        function award(form) {
            let path = 'GSS/route/post_awarding_version2.php?'
            $.get({
                url: path + "" + form,
                success: function(result) {
                    toastr.success("You have successfully awarded this RFQ!");

                    // location.reload();


                }
            })
        }

    })
</script>