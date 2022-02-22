<?php include 'document_code.php'; ?>
<?php include 'view_ta_info.php'; ?>
<form method="POST" enctype="multipart/form-data" class="myformStyle" autocomplete="off" id="submit">

    <div class="box box-primary box-solid dropbox ">
        <div class="box-header with-border" style="background-color: #585f62;">
            <h5 class="box-title"> TYPE OF REQUEST (CHOOSE ALL THAT APPLY)</h5>

            <div class="box-tools pull-right">

                <button type="button" class="btn btn-box-tool">
                </button>
            </div>
        </div>
        <div class="box-body box-emp" style="height: 475px; max-height: 475px; overflow-y: scroll;">
            <div class="list-group contact-group zoom" style="margin-bottom: 5px;">
                <div class="media">
                    <div class="pull-left" style="width:65px; height:65px;">
                    </div>
                    <div class="media-body div-disable">

                        <?php include 'type_request.php'; ?>

                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>

    <div class="box">
        <div class="row">
            <div class="col-lg-6">
                <div class="box box-primary box-solid dropbox">
                    <div class="box-header with-border" style="background-color: #585f62;" style="background-color: #585f62;" style="background-color: black;">

                        <h5 class="box-title"> ADDITIONAL INFORMATION/REMARKS (if any):</h5>

                        <div class="box-tools pull-right">

                            <button type="button" class="btn btn-box-tool">
                            </button>
                        </div>
                    </div>
                    <div class="box-body box-emp">
                        <div class="list-group contact-group zoom">
                            <div class="media">
                                <div class="pull-left">
                                </div>
                                <div class="media-body">
                                    <textarea cols="118" rows="10" name="issue" style="border:1px solid white;resize:none;width:100%;text-align:left;background-color:#EEEEEE;" class="disabletxtarea">
                                        <?= $view_ta['issue']; ?>
                                        </textarea>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="box box-primary box-solid dropbox">
                    <div class="box-header with-border" style="background-color: #585f62;" style="background-color: #585f62;" style="background-color: black;">
                        <div class="ribbon ribbon-top-right"><span>Required</span></div>

                        <h5 class="box-title">ADDITIONAL INFORMATION/REMARKS (if any): ACTION TAKEN/RESOLUTION/RECOMMENDATION:</h5>

                        <div class="box-tools pull-right">

                            <button type="button" class="btn btn-box-tool">
                            </button>
                        </div>
                    </div>
                    <div class="box-body box-emp">
                        <div class="list-group contact-group zoom">
                            <div class="media">
                                <div class="pull-left">
                                </div>
                                <div class="media-body">
                                    <textarea cols="118" rows="10" name="STATUS_DESC" id="sol" style="resize:none">
                                   <?= $view_ta['status_desc']; ?>
                                    </textarea>
                                </div>
                            </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="box box-primary box-solid dropbox">
        <div class="box-header with-border" style="background-color: #585f62;">
            <h1 class="box-title" style="text-align: center;">
                <center> CUSTOMER SATISFACTION SURVEY</center>
            </h1>


            <div class="box-tools pull-right">

                <button type="button" class="btn btn-box-tool">
                </button>
            </div>
        </div>
        <div class="box-body box-emp div-disable">
            <div class="list-group contact-group zoom">
                <div class="media">
                    <div class="pull-left">
                    </div>
                    <div class="media-body">
                        <h4>A. SERVICE DIMENSION</h4>
                        <H4>
                            <center>RATING SCALE (5) - Strongly Agree (4) - Agree (3) - Neutral (2) - Disagree (1) - Strongly Disagree</center>
                        </H4>
                        <table border="1" style="width:100%;" id="tbl_checklist">
                            <tbody>
                                <tr>
                                    <td colspan="4"></td>
                                    <td style="text-align:center;font-weight:bold;" class="tdSpacing">
                                        (5)
                                    </td>
                                    <td style="text-align:center;font-weight:bold;" class="tdSpacing">
                                        (4)
                                    </td>
                                    <td style="text-align:center;font-weight:bold;" class="tdSpacing">
                                        (3)
                                    </td>
                                    <td style="text-align:center;font-weight:bold;" class="tdSpacing">
                                        (2)
                                    </td>
                                    <td style="text-align:center;font-weight:bold;" class="tdSpacing">
                                        (1)
                                    </td>

                                </tr>
                                <tr>
                                    <td style="width:5%;" class="table-text">Responsiveness</td>
                                    <td colspan=3 style="width:5%;padding:5px 5px 5px 5px;">
                                        Service was willingly and promptly extended to client/customer
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]" id="chk_list" class="sd_chklist_res form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]" id="chk_list" class="sd_chklist_res form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]" id="chk_list" class="sd_chklist_res form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]" id="chk_list" class="sd_chklist_res form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]" id="chk_list" class="sd_chklist_res form-check-input" /> </center>
                                    </td>

                                </tr>
                                <tr>
                                    <td style="width:5%;" class="table-text">Reliability</td>
                                    <td colspan=3 style="width:5%;padding:5px 5px 5px 5px;">
                                        Performs the service within the expectations of the citizen’s/client served.
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]" id="chk_list" class="sd_chklist_rel form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]" id="chk_list" class="sd_chklist_rel form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]" id="chk_list" class="sd_chklist_rel form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]" id="chk_list" class="sd_chklist_rel form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]" id="chk_list" class="sd_chklist_rel form-check-input" /> </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:5%;" class="table-text">Access & Facilities</td>
                                    <td colspan=3 style="width:5%;padding:5px 5px 5px 5px;">
                                        Facility / resources /modes of technology were readily available for convenienttransactions
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]" id="chk_list" class="sd_chklist_af form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]" id="chk_list" class="sd_chklist_af form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]" id="chk_list" class="sd_chklist_af form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]" id="chk_list" class="sd_chklist_af form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]" id="chk_list" class="sd_chklist_af form-check-input" /> </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:5%;" class="table-text">Communication</td>
                                    <td colspan=3 style="width:5%;padding:5px 5px 5px 5px;">
                                        Access to information of the service rendered easily understood and feedbackmechanisms were present relevant to client’s concern.
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]" id="chk_list" class="sd_chklist_comm form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]" id="chk_list" class="sd_chklist_comm form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]" id="chk_list" class="sd_chklist_comm form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]" id="chk_list" class="sd_chklist_comm form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]" id="chk_list" class="sd_chklist_comm form-check-input" /> </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:5%;" class="table-text">Cost</td>
                                    <td colspan=3 style="width:5%;padding:5px 5px 5px 5px;">
                                        Value for money spent in services rendered.
                                    </td>
                                    <td colspan="5" style="text-align: center;">Service if free of chargee</td>

                                </tr>
                                <tr>
                                    <td style="width:5%;" class="table-text">Integrity</td>
                                    <td colspan=3 style="width:5%;padding:5px 5px 5px 5px;">
                                        Provided services with high morale and spirit of honest
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]" id="chk_list" class="sd_chklist_int form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]" id="chk_list" class="sd_chklist_int form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]" id="chk_list" class="sd_chklist_int form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]" id="chk_list" class="sd_chklist_int form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]" id="chk_list" class="sd_chklist_int form-check-input" /> </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:5%;" class="table-text">Assurance</td>
                                    <td colspan=3 style="width:5%;padding:5px 5px 5px 5px;">
                                        Service was provided by competent personnel.
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]" id="chk_list" class="sd_chklist_assurance form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]" id="chk_list" class="sd_chklist_assurance form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]" id="chk_list" class="sd_chklist_assurance form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]" id="chk_list" class="sd_chklist_assurance  form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]" id="chk_list" class=" sd_chklist_assurance form-check-input" /> </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:5%;" class="table-text">Outcome</td>
                                    <td colspan=3 style="width:5%;padding:5px 5px 5px 5px;">
                                        Overall expectations of clients are met.
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]" id="chk_list" class="sd_chklist_outcome form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]" id="chk_list" class="sd_chklist_outcome form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]" id="chk_list" class="sd_chklist_outcome form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]" id="chk_list" class="sd_chklist_outcome form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]" id="chk_list" class="sd_chklist_outcome form-check-input" /> </center>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                        <h4>B. COMMENTS/SUGGESTION FOR IMPROVEMENT</h4>
                        <textarea cols="252" rows="7" style="resize: none;" disabled></textarea>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6">
            <div class="box box-primary box-solid dropbox">
                <div class="box-header with-border" style="background-color: #585f62;" style="background-color: #585f62;" style="background-color: black;">
                    <h5 class="box-title">ACCEPTANCE OF SERVICE RENDERED:</h5>

                    <div class="box-tools pull-right">

                        <button type="button" class="btn btn-box-tool">
                        </button>
                    </div>
                </div>
                <div class="box-body box-emp">
                    <div class="list-group contact-group zoom">
                        <div class="media">
                            <div class="pull-left">
                            </div>
                            <div class="media-body">
                                <h2 style="text-align: center;font-weight:bolder;font-size:17px;"><u><?= $view_ta['request_by']; ?></u> </h2>
                                <h5 style="text-align: center;">Signature over Printed Name</h5>
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-6">
            <div class="box box-primary box-solid dropbox">
                <div class="box-header with-border" style="background-color: #585f62;" style="background-color: #585f62;" style="background-color: black;">
                    <h5 class="box-title">ICT TECHNICAL PERSONNEL:</h5>

                    <div class="box-tools pull-right">

                        <button type="button" class="btn btn-box-tool">
                        </button>
                    </div>
                </div>
                <div class="box-body box-emp">
                    <div class="list-group contact-group zoom">
                        <div class="media">
                            <div class="pull-left">
                            </div>
                            <div class="media-body" >
                                <div class="col-sm-6">

                                <h2 style="font-weight:bolder;font-size:17px;text-align:center"><U><?= $view_ta['assisted_by']; ?></U></h2>
                                <h5 style="text-align: center;">Signature over Printed Name</h5>

                                </div>
                                <div class="col-sm-6">
                                <input type="datetime-local" name="completed_date" id="date">
                                <h5 style="text-align: center;">Date and Time</h5>

                                </div>

          
                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
     
    </div>
    <input type="hidden" value = <?= $_GET['id']; ?> name="control_no" />
    <button class="btn btn-success col-lg-12 sweet-14" type="button" style="font-size:17px;"><i class="fa fa-save"></i> Save</button>
</form>
<script>
    //Date picker,
    $(".datePicker1").datepicker();

    document.querySelector('.sweet-14').onclick = function() {

        var text = $('textarea#sol').val();
        var cd = $('#completed_date').val();



        if (text == ' ' || cd == '') {
            alert('Required Field:All fields with * are required!.')
            exit();
        } else {
            swal({
                title: "Are you sure you want to save?",
                text: "Control No:" + "<?= $_GET['id']; ?>",
                type: "info",
                showCancelButton: true,
                confirmButtonClass: 'btn-danger',
                confirmButtonText: 'Yes',
                closeOnConfirm: false,
                showLoaderOnConfirm: true
            }, function() {
                var queryString = $('#submit').serialize();
                var d = $('#diagnose').val();

                $.ajax({
                    url: "entity/post_complete_ta.php",
                    method: "POST",
                    data: $("#submit").serialize(),
                    success: function(data) {
                        setTimeout(function() {
                            console.log($("#submit").serialize());
                            swal("Record saved successfully!");

                        }, 1000);
                        window.location = "processing.php?division=<?php echo $_GET['division']; ?>";
                    }
                });


            });
        }






    }
</script>