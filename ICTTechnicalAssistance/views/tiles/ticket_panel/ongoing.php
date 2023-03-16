<div class="box box-solid dropbox">
    <div class="box-header with-border" style="background:linear-gradient(90deg,#FFD54F,#FF6F00);">
        <h3 class="box-title"><i class="fa fa-refresh"></i> Ongoing</h3>
        <div class="tools pull-right">
            <span class="pull-right-container">
                <span class="label label-primary pull-right" style="font-size: 12pt;"><?php echo !empty($tasks['ongoing']) ? count($tasks['ongoing']) : 0; ?></span>
            </span>
        </div>
    </div>
    <div class="box-body workspace destination ongoing_list ui-droppable" value="ongoing" style="overflow-y: scroll; height: 500px; background-color: #f0f0f09e;">
        <?= group_text("Search", "search", "R4A-", false, 0, null, "search_ongoing", null, true); ?>

        <?php foreach ($tasks['ongoing'] as $key => $data) : ?>

            <div class="ui-draggable ui-draggable-handle" value="ongoing">

                <div class="source sidekick-ongoing external-event well profile_view ui-draggable ui-draggable-handle" value="ongoing" style="background-color: white; margin-bottom: 10px; min-height: 200px;" cloned="true">
                    <?php echo input_hidden('control_no', 'control_no[]', 'control_no', $data['control_number']) ?>
                    <?php echo input_hidden('status', 'status[]', 'status', $data['status']) ?>
                    <span hidden class="search_txtongoing"><?= $data['control_number']; ?></span>

                    <div class="col-md-12">
                        <div class="row" style="max-height: 85px;">

                            <div class="advance-ongoing_collab" style="padding:1%; min-height: 85px; max-height: 85px;">
                                <!-- <div class="advance-collab"> -->
                                <div class="widget-user-image" style="width:58px; height:58px; float: right; ">

                                    <img class="img-circle custom-profile" src="images/logo.png">
                                </div>

                                <b style="color: #e41616; float: right; font-size: 8pt;">
                                </b>

                                <b style="color: #455A64;">
                                    <i class="fa fa-arrow-circle-up"></i>

                                    <?= $data['control_number']; ?> </b><br>


                                <p><?= $data['requested_by']; ?><br> </p>
                                <div class="media-body">

                                    <div class="media-content" style="margin-top: -1%;">
                                        <i class="fa fa-phone"></i> <b class="media-heading" style="font-size: 10pt;"> <?= $data['contact_no']; ?></b>
                                    </div>
                                    <div class="media-content" style="margin-top: -1%;">
                                        <i class="fa fa-calendar"></i> <b class="media-heading" style="font-size: 10pt;"> <?= $data['requested_date']; ?></b>
                                    </div>

                                    <div class="media-content" style="margin-top: -1%;">
                                        <small><i class="fa fa-building"></i><?= $data['office'];?></small>
                                    </div><br><br>




                                </div>
                            </div>
                            <div class="advance-ongoing_collab advance-ongoing_collab2" style="padding:1%; margin-top: -26%; display: none; visible:hidden; min-height: 85px; max-height: 85px;">
                                <b>Other Collaborators:</b>
                                <p style="font-size: 10pt;">
                                </p>
                            </div>
                        </div>

                    </div>
                    <div class="timeline-footer"><br>
                        <a style="margin-bottom:-38%" class="btn btn-success btn-xs" href="viewTA.php?month=''&id=<?= $data['control_number']; ?>">View</a>
                        <?php $btn = '<a style="margin-bottom:-38%" class="btn btn-warning btn-xs sweet-14" data-id="' . $data['control_number'] . '">Assign</a>'; ?>
                        <?= $btn = ($_GET['role'] == '21232f297a57a5a743894a0e4a801fc3') ? $btn : ''; ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<link href="_includes/sweetalert2.min.css" rel="stylesheet" />
<script src="_includes/sweetalert2.min.js" type="text/javascript"></script>
<script>
    <?php if ($_GET['role'] == '21232f297a57a5a743894a0e4a801fc3') : ?>

        $('.sweet-14').click(function() {
            var control_no = $(this).data('id');
            swal({
                title: 'Assign to:',
                input: 'select',
                inputOptions: {
                    'Mark Kim A. Sacluti': 'Mark Kim A. Sacluti',
                    // 'Louie Jake P. Banalan': 'Louie Jake P. Banalan',
                    // 'Shiela Mei E. Olivar':'Shiela Mei E. Olivar',
                    // 'Jan Eric C. Castillo':'Jan Eric C. Castillo',
                    'Maybelline M. Monteiro': 'Maybelline Monteiro',
                },
                inputPlaceholder: 'Select ICT Staff',
                showCancelButton: true,
                inputValidator: function(value) {
                    return new Promise(function(resolve, reject) {
                        if (value === 'Mark Kim A. Sacluti') {
                            resolve()
                        } else if (value == 'Louie Jake P. Banalan') {
                            resolve()
                        } else if (value == 'Shiela Mei E. Olivar') {
                            resolve()
                        } else if (value == 'Jan Eric C. Castillo') {
                            resolve()
                        } else {
                            resolve()
                        }
                    })
                }
            }).then(function(result) {
                swal({
                    type: 'success',
                    html: 'Successfully approved by:' + result,
                    closeOnConfirm: false
                })
                $.ajax({
                    url: "_approvedTA.php",
                    method: "POST",
                    data: {
                        ict_staff: result,
                        control_no: control_no
                    },
                    success: function(data) {
                        setTimeout(function() {
                            swal("Control No." + control_no + " already assigned!");
                        }, 3000);
                        // location.reload();
                    }
                });
            });
        });
    <?php endif; ?>
</script>