<style>
    #myDiv {
        opacity: 0;
        visibility: hidden;
        transition: opacity 0.5s ease-in-out, visibility 0.5s ease-in-out;
    }

    #myDiv.show {
        opacity: 1;
        visibility: visible;
    }

    .card {
        background-color: #fff;
        border-radius: 4px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        padding: 24px;
        width: 320px;
    }

    .card:hover {
        box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
    }
</style>

<div class="box  box-solid dropbox">
    <div class="box-header with-border" style="background:linear-gradient(90deg,#CFD8DC,#37474F);">
        <h3 class="box-title"><i class="fa fa-tasks"></i> Drafts</h3>
        <div class="tools pull-right">
            <span class="pull-right-container">
                <span class="label label-primary pull-right" style="font-size: 12pt;"><?php echo !empty($tasks['created']) ? count($tasks['created']) : 0; ?></span>
            </span>
        </div>
    </div>
    <div class="box-body workspace origin created_list ui-droppable" value="created" style="overflow-y: scroll; height: 500px; background-color: #f0f0f09e;">
        <?= group_text("Search", "search", "R4A-", false, 0, null, "search_draft", null, true); ?>

        <?php foreach ($tasks['created'] as $key => $data) : ?>


            <div class="ui-draggable ui-draggable-handle" value="created">
                <div class="source sidekick-ongoing external-event well profile_view ui-draggable ui-draggable-handle" value="created" style="background-color: white; margin-bottom: 10px; min-height: 200px;" cloned="true">
                    <?php echo input_hidden('control_no', 'control_no[]', 'control_no', $data['control_number']) ?>
                    <?php echo input_hidden('status', 'status[]', 'status', $data['status']) ?>
                    <span hidden class="search_txtdraft"><?= $data['control_number']; ?></span>

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
                                                                                ?></small>
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
                    <a style="margin-bottom:-38%"  class="btn btn-success btn-xs" target="_blank" rel="noopener noreferrer" href="viewTA.php?month=''&id=<?= $data['control_number']; ?>">View</a>
                        <?php $btn = '<button style="margin-bottom:-38%" class="btn btn-primary btn-xs" id="toggleButton" >See More</button>'; ?>
                        <?= $btn = ($_GET['role'] == '21232f297a57a5a743894a0e4a801fc3') ? $btn : ''; ?>

                    </div>
                </div>
            </div>
            <div class="card" id="myDiv">
                <div class="card-body">
                    Concern: <?= $data['issue']; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<script>
    const btn = document.getElementById("toggleButton");
    const myDiv = document.getElementById("myDiv");

    btn.addEventListener("click", () => {
        myDiv.classList.toggle("show");
    });
</script>