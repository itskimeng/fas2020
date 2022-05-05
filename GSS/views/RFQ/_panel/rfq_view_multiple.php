<!-- here -->
<!-- <div class="col-md-12">
    <form id="rfq_form" class="form-vertical">
        <div class="box box-info dropbox">
            <div class="box-body">
                <div class="row">
                    <div class="col-md-6">
                        <div class="btn-group">
                            <button type="button" class="btn-style btn-2 btn-sep icon-back" id="back">
                                <a href="procurement_request_for_quotation.php?division=<?= $_GET['division']; ?>" style="color:#fff;"> Back </a>
                            </button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="pull-right">
                            <div class="btn-group">
                                <button type="button" class="btn-style btn-1 btn-sep icon-download" data-toggle="modal" data-target="#modal-default"> Download POS</button>
                                <?php if (($is_multiple_pr['is_multiple'])) { ?>

                                <?php } else { ?>
                                    <button type="button" class="btn-style btn-3 btn-sep icon-save" id="btn_rfq_save"><i class="fa fa-save"></i> Save</button>

                                <?php } ?>


                                <button type="button" class="btn-style btn-4 btn-sep icon-export pull-right" style="margin-left:5px;">
                                    <a href="procurement_export_rfq.php?is_multiple=1&rfq_no=<?= $_GET['rfq_no']; ?>&pr_no=<?= $_GET['id']; ?>" style="color:#fff;"> Export </a>
                                </button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box box-info hideme" style="box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
            <div class="box-header with-border">
                <b> Request for Quotation Entries
                </b>


            </div>
            <div class="box-body">
                <div class="table-responsive">
                    <table class="table table-condensed table-striped" id="multiple_pr_table">
                        <thead class="bg-primary">
                            <tr>
                                <th width="18%">PR NO</th>
                                <th width="18%">RFQ NO</th>

                                <th width="10%">OFFICE</th>
                                <th width="18%">MODE OF PROCUREMENT</th>
                                <th width="15%">RFQ DATE</th>
                            </tr>
                        </thead>

                        <tbody id="multiple_pr">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </form>
</div> -->
<div class="col-md-12">
<div class="box box-primary dropbox">
    <div class="box-body">
        <div class="row">
            <div class="col-md-6">
                <div class="btn-group">
                    <button class="btn btn-war  ning"><i class="fa fa-arrow-circle-left"></i> <a class="link" href="<?= $path ?>/../../../procurement_request_for_quotation.php?division=<?= $_GET['division']; ?>">Back</a></button>

                </div>
            </div>
            <div class="col-md-6">
                <div class="pull-right">
                    <div class="btn-group">

                    <button type="button" class="btn-style btn-1 btn-sep icon-download" data-toggle="modal" data-target="#modal-default"> Download POS</button>

                                    <button type="button" class="btn-style btn-4 btn-sep icon-export pull-right" style="margin-left:5px;">
                                        <a href="procurement_export_rfq.php?pr_no=<?= $_GET['id'];?>&rfq_no=<?= $_GET['rfq_no']?>&rfq_id=<?= $_GET['rfq_id'];?>&id=<?= $_GET['id']; ?>" style="color:#fff;"> Export </a>
                                    </button>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
    <div class="box box-primary dropbox">
        <div class="box-header">
            <h3 class="box-title"><i class="fa fa-info-circle"></i> Information</h3>
            <div class="box-tools">
                <span class="label label-info" style="font-size: 14.5px; background-color: #06313b !important;"></span>
            </div>
        </div>
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3">
                            <div id="cgroup-ob_type" class="form-group">
                                <label class=" control-label">RFQ Number:</label><br>
                                <input class="form-control" id="rfq_no" readonly=''>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div id="cgroup-ob_type" class="form-group">
                             
                                <label class=" control-label">Purchase Number:</label><br>
                                <input class="form-control" id="pr_no" readonly='' value="<?= $pr_n; ?>" >
                            </div>
                        </div>
                     
                        <div class="col-md-3">
                            <div id="cgroup-ob_type" class="form-group">
                                <label class=" control-label">Amount:</label><br>
                                <input class="form-control" value="₱ <?= number_format($fetch_rfq_abc['total_abc'],2);?>" >
                            </div>
                        </div>                        
                        <div class="col-md-3">
                            <div id="cgroup-date_created" class="form-group">
                                <label class="control-label">RFQ Date:</label><br>
                                <input id="cform-date_created" placeholder="Date Created" type="text" name="date_created" class="form-control date_created"  required="" novalidate="" ></div>
                        </div>
                    </div>
                    <div class="row">
                    <div class="col-md-3">
                            <div id="cgroup-ob_type" class="form-group">
                                <label class=" control-label">Mode of Procurement:</label><br>
                                <input class="form-control" id="cform-mode" value="<?= $mode_n;?>" >
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div id="cgroup-ob_type" class="form-group">
                                <label class=" control-label">Office:</label><br>
                                <input class="form-control" id="cform-office" readonly="false" value="<?= $pmo_n;?>" >

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div id="cgroup-ob_type" class="form-group">
                                <label class=" control-label">Created By:</label><br>
                                <input class="form-control" id="cform-created-by" >
                            </div>
                        </div>                        <div class="col-md-3">
                            <div id="cgroup-date_created" class="form-group">
                                <label class="control-label">PR Date:</label><br>
                            <input id="cform-pr-date" placeholder="Date Created" type="text" name="date_created" class="form-control date_created" value="" required="" novalidate="" ></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                        <div class="form-group"><label>Particulars</label><textarea id="cform-particulars" name="particulars" class="form-control particulars" rows="7" placeholder="Particulars" "required="required" "=""></textarea></div>
                        </div>
                    </div>
                  
                
                </div>
            </div>
        </div>
    </div>
    <?php include 'modal_pos.php'; ?>
    <script>
        $(document).ready(function() {
            $('.select2').select2();
        })
        $(document).on('change', '.select2', function() {
            $('#supplier_id').val($(this).val());
            $('#pr_no').val($(this).val());
        })
        $(document).ready(function() {
            let path = 'GSS/route/fetch_multiple_pr.php';
            let rfq_no = '<?= $_GET['rfq_no']; ?>';
            let data = {
                id: rfq_no
            };

            $.post(path, data, function(data, status) {
                // $('#multiple_pr_table').empty();
                let lists = JSON.parse(data);


                // $('#multiple_pr_table').dataTable().fnClearTable();
                // $('#multiple_pr_table').dataTable().fnDestroy();
                generateMainTable(lists);

                // $('#multiple_pr_table').DataTable({
                //     "dom": '<"pull-left"f><"pull-right"l>tip',
                //     'paging': true,
                //     "searching": true,
                //     "paging": true,
                //     "info": false,
                //     "bLengthChange": false,
                //     "lengthMenu": [
                //         [10, 20, -1],
                //         [10, 20, 'All']
                //     ]

                // })
            });

        });

        function generateMainTable($data) {

            $.each($data, function(key, item) {
                $('#rfq_no').val('RFQ-NO:'+item['rfq_no']);
                $('#cform-amount').val(item['amount']);
                // $('#cform-office').val(item['office']);
                $('#cform-mode').val(item['mode']);
                $('#cform-created-by').val(item['created_by']);
                $('#cform-date_created').val(item['rfq_date']);
                $('#cform-pr-date').val(item['pr_date']);
                $('#cform-particulars').val(item['particulars']);
                // let tr = '';
                // tr += '<tr>';
                // tr += '<td>PR-NO-' + item['pr_no'] + '</td>';
                // tr += '<td>RFQ-NO-' + item['rfq_no'] + '</td>';
                // tr += '<td>' + item['office'] + '</td>';
                // tr += '<td>' + item['mode'] + '</td>';
                // tr += '<td>' + item['rfq_date'] + '</td>';
                // tr += '</tr>';

                // $('#multiple_pr').append(tr);
            });

            return $data;
        }
    </script>