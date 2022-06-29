
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
                            <input class="form-control" disabled value="₱ <?= number_format($fetch_rfq_abc['total_abc'],2);?>" >
                        </div>
                    </div>                        
                    <div class="col-md-3">
                        <div id="cgroup-date_created" class="form-group">
                            <label class="control-label">RFQ Date:</label><br>
                            <input id="cform-date_created" disabled placeholder="Date Created" type="text" name="date_created" class="form-control date_created"  required="" novalidate="" ></div>
                    </div>
                </div>
                <div class="row">
                <div class="col-md-3">
                        <div id="cgroup-ob_type" class="form-group">
                            <label class=" control-label">Mode of Procurement:</label><br>
                            <input class="form-control" disabled id="cform-mode" value="<?= $mode_n;?>" >
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
                            <input class="form-control" disabled id="cform-created-by" >
                        </div>
                    </div>                        <div class="col-md-3">
                        <div id="cgroup-date_created" class="form-group">
                            <label class="control-label">PR Date:</label><br>
                        <input id="cform-pr-date" disabled placeholder="Date Created" type="text" name="date_created" class="form-control date_created" value="" required="" novalidate="" ></div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                    <div class="form-group"><label>Purpose</label><textarea id="cform-particulars" name="particulars" class="form-control particulars" rows="7" placeholder="Particulars" "required="required" "=""></textarea></div>
                    </div>
                </div>
                
            
            </div>
        </div>
    </div>
</div>
<div class="box box-primary dropbox">
    <div class="box-header">
        <h3 class="box-title"><i class="fa fa-info-circle"></i> RFQ Items</h3>
        <div class="box-tools">
            <span class="label label-info" style="font-size: 14.5px; background-color: #06313b !important;"></span>
        </div>
    </div>
    <div class="box-body">
    <table id="example2" class="table table-bordered table-striped display">
                                    <thead>
                                        <tr style="color: white; background-color: #367fa9;">
                                            <th class="hidden"></th>
                                            <th class="text-center">Purchase Request No.</th>
                                            <th class="text-center">Office</th>
                                            <th class="text-center">Type</th>
                                            <th class="text-center">Price</th>
                                            <th class="text-center">Purpose</th>
                                            <th class="text-center">PR Date</th>
                                            <th class="text-center">Target Date</th>
                                
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                        <?php foreach ($pr_details as $key => $data) : ?>

                                            <?php $td = 'style="background-color:;"'; ?>
                                                <tr>
                                                    <td class="hidden" style="vertical-align: middle;"><?php echo $ors['id']; ?></td>

                                                    <td <?= $td; ?>><?= $data['pr_no']; ?><br><label class="label label-danger"><?= $status; ?></label><br></td>
                                                    <td <?= $td; ?>><?= $data['division']; ?></td>
                                                    <td <?= $td; ?>><?= $data['type']; ?></td>
                                                    <td <?= $td; ?>><?= $data['total_abc']; ?></td>
                                                    <td <?= $td; ?>><?= $data['purpose']; ?></td>
                                                    <td <?= $td; ?>><?= $data['pr_date']; ?></td>
                                                    <td <?= $td; ?>><?= $data['target_date']; ?></td>
                                                   
                                                </tr>

                                        
                                        <?php endforeach ?>
                                    </tbody>
                                </table>
    </div>
</div>

    <?php include 'modal_pos.php'; ?>
<script>
    $(document).ready(function() {
        $('.select2').select2();
    })
    $(document).on('change', '.select2', function() {
        $('#supplier_id').val($(this).val());
        // $('#pr_no').val($(this).val());
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

    function generateMainTable(data) {
              
       
        $.each(data, function(key, item) {
        // let arr = ['"'+data[key]['pr_no']+'"'];
            $('#rfq_no').val('RFQ-NO:'+item['rfq_no']);
            $('#cform-amount').val(item['amount']);
            $('#pr_no').val(item['pr_no']);
            $('#cform-mode').val(item['mode']);
            $('#cform-created-by').val(item['created_by']);
            $('#cform-date_created').val(item['rfq_date']);
            $('#cform-pr-date').val(item['pr_date']);
            $('#cform-particulars').val(item['particulars']);

       
            
        });


        return data;
    }
</script>