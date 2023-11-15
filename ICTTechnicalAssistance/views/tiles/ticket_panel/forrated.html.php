<div class="box box-solid dropbox">
    <div class="box-header" style="background:linear-gradient(90deg,#81C784,#1B5E20);">
        <h3 class="box-title"><i class="fa fa-check-square-o"></i> For Rating</h3>
        <div class="box-tools pull-right">



        </div>
    </div>
    <div class="box-body workspace done_list" style="overflow-y: scroll; height: 500px; background-color: #f0f0f09e;">
        <?= group_text("Search", "search", "R4A-", false, 0, null, "search_completed", null, true); ?>
        <?php foreach ($tasks['for rating'] as $key => $data) : ?>
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

                                    <img class="img-circle custom-profile" src="images/logo.png">
                                </div>

                                <b style="color: #e41616; float: right; mes-size: 8pt;">
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
                                        <small><i class="fa fa-building"></i><?= $data['office']; ?></small>
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
                        <?php

                        //FOR RATED BUTTON
                        $role = $_GET['role'];
                        $id = $data['id'];
                        $emp_id = $data['emp_id'];
                        $quarter = $_GET['quarter'];
                        $control_number = $data['id'];
                        $url1 = "dash_rate_service.php?role=$role&id=$id&quarter=$quarter";
                        $url2 = "base_view_cssReport.php?control_no=$control_number&id=$emp_id";
                        if (date('m', strtotime($data['start_date'])) == 1 || date('m', strtotime($data['start_date'])) == 2 || date('m', strtotime($data['start_date'])) == 3) {
                            $view_rating = "report/TA/pages/viewCSS.php?control_no=" . $control_number . "&id=" . $data['emp_id'];
                        } else {
                            $view_rating = "base_view_cssReport.php?control_no=" . $control_number . "&id=" . $data['emp_id'];
                        }
                                                $text = ($data['is_rated'] == 1) ? 'View Ratings' : 'Rate Service';
                        $class = ($data['is_rated'] == 1) ? 'btn-warning' : 'btn-danger';
                        $url = ($data['is_rated'] == 1) ? $url2 : $url1;

               ?>

                        <a style="margin-bottom:-38%" class="btn btn-success btn-xs" target="_blank" rel="noopener noreferrer" href="viewTA.php?month=''&id=<?= $data['control_number']; ?>">View</a>
                        <a style="margin-bottom:-38%;" href="<?php echo $view_rating; ?>" class="btn <?= $class; ?> btn-xs" data-id="<?= $control_number; ?>"><?php echo $text; ?></a>

                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>