<div class="box box-solid dropbox">
    <div class="box-header " style="background:linear-gradient(90deg,#90CAF9,#0D47A1);">
        <h3 class="box-title"><i class="fa fa-calendar-check-o"></i>Completed</h3>
        <div class="tools pull-right">
            <span class="pull-right-container">
                <span class="label label-primary pull-right" style="font-size: 12pt;"><?php echo !empty($tasks['completed']) ? count($tasks['completed']) : 0; ?></span>
            </span>
        </div>
    </div>
    <div class="box-body workspace destination forchecking_list ui-droppable" value="completed" style="overflow-y: scroll; height: 500px; background-color: #f0f0f09e;">
        <?= group_text("Search", "search", "R4A-", false, 0, null, "search_completed", null, true); ?>
        <?php foreach ($tasks['completed'] as $key => $data) : ?>
            <div class="ui-draggable ui-draggable-handle" value="completed">

                <div class="source sidekick-ongoing external-event well profile_view ui-draggable ui-draggable-handle" value="completed" style="background-color: white; margin-bottom: 10px; min-height: 200px;" cloned="true">
                    <?php echo input_hidden('control_no', 'control_no[]', 'control_no', $data['control_number']) ?>
                    <?php echo input_hidden('status', 'status[]', 'status', $data['status']) ?>
                    <span hidden class="search_txtcompleted"><?= $data['control_number']; ?></span>

                    <div class="col-md-12">
                        <div class="row" style="max-height: 85px;">

                            <div class="advance-ongoing_collab" style="padding:1%; min-height: 85px; max-height: 85px;">
                                <!-- <div class="advance-collab"> -->
                                <div class="widget-user-image" style="width:58px; height:58px; float: right; ">

                                    <img class="img-circle custom-profile" src="images/profile/logo.png">
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
                                        <small><i class="fa fa-building"></i><?= $data['office'];
                                                                                d ?></small>
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
                    <div class="timeline-footer">
                        <a class="btn btn-success btn-xs" href="viewTA.php?month=''&id=<?= $data['control_number']; ?>">View</a>
                        <?php $btn = '<a class="btn btn-info btn-xs" id="btn-take-action" data-id="' . $data['control_number'] . '">Take Action</a>'; ?>
                        <?= $btn = ($_GET['role'] == '21232f297a57a5a743894a0e4a801fc3') ? $btn : ''; ?>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<script>
    <?php if ($_GET['role'] == '21232f297a57a5a743894a0e4a801fc3') : ?>

        $(document).on('click', '#btn-take-action', function(e) {
            e.preventDefault();
            var ids = $(this).data('id');
            swal({
                title: "Are you sure you already finished with this request?",
                text: "Control No:" + ids,
                type: "info",
                showCancelButton: true,
                showCancelButton: true,
                confirmButtonText: 'Yes',
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }).then(function() {
                $.ajax({
                    url: "_ticketReleased.php",
                    method: "POST",
                    data: {
                        id: ids,
                        option: 'test'
                    },

                    success: function(data) {
                        setTimeout(function() {
                            swal("Service Complete!");
                        }, 3000);
                        window.location = "dash_complete_ta.php?role=<?= $_GET['role']; ?>&quarter=<?= $_GET['quarter']; ?>&id=" + ids;
                    }
                });
            });
        });
    <?php endif; ?>
</script>