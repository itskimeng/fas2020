<!-- Modal -->

<?php include 'tiles/modal_create_rfq.php'; ?>

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
                                    <li role="presentation" class="<?= $active_state1;?>">
                                        <a href="procurement_request_for_quotation.php?type=monitoring">
                                            <i class="fa fa-list" aria-hidden="true"></i> Monitoring
                                        </a>
                                    </li>

                                    <li role="presentation" class="<?= $active_state2;?>">
                                        <a href="procurement_request_for_quotation.php?type=rfq">
                                            <span class="octicon octicon-diff-added"></span>Request for Quotation
                                        </a>
                                    </li>

                                    <li role="presentation" class="<?= $active_state3;?>">
                                        <a href="procurement_request_for_quotation.php?type=abstract">
                                            <span class="octicon octicon-comment-discussion"></span>Abstract of Quotation
                                        </a>
                                    </li>
                                    <li role="presentation" class="<?= $active_state4;?>">
                                        <a href="procurement_request_for_quotation.php?type=po">
                                            <span class="octicon octicon-comment-discussion"></span>Purchase Order
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
                                        <?php
                                        switch ($_GET['type']) {
                                            case 'monitoring':
                                                include 'tiles/monitoring.php';
                                                break;
                                            case 'rfq':
                                                include 'tiles/rfq_table.php';
                                                break;
                                            case 'abstract':
                                                include 'tiles/abstract_table.php';
                                                break;
                                            case 'po':
                                                include 'tiles/po_table.php';
                                                break;
                                        }
                                        ?>

                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="Submit">
                                        <?php //include 'tiles/rfq_table.php'; 
                                        ?>


                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="Discuss">
                                        <?php //include 'tiles/abstract_table.php'; 
                                        ?>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="po">
                                        <?php //include 'tiles/po_table.php'; 
                                        ?>
                                    </div>
                                    <div role="tabpanel" class="tab-pane" id="GetValidated">
                                        <?php //include 'tiles/philgeps_table.php'; 
                                        ?>

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


<script>
    $(document).ready(function() {
       

        let count_supp = '';

        var po = $('#po_table').DataTable({

                "bInfo": false,
                'lengthChange': false,
                "dom": '<"pull-left"f><"pull-right"l>tip',
                'ordering': true,
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

     
        $(document).ready(function() {
            //fetchSelectedSupplier(data_id);

            function fetchSelectedSupplier(item) {
                $.post({
                    url: 'GSS/views/RFQ/_panel/tiles/awarding_item_table.php',
                    data: {
                        id: item,
                    },
                    success: function(data) {
                        $('#awarding').html(data);
                    }
                })

            }

        })



        $(document).on('click', '#btn-award', function() {
            // fetch all supplier quotation
            // insert to db

            let form_serialize = $('#form-abstract').serialize();
            award(form_serialize);




        })
        // F U N C T I O N S
       






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
                    setTimeout(() => {
                        toastr.success("You have successfully awarded this RFQ!");
                        // location.reload();
                    }, 1000)


                }
            })
        }

    })
</script>