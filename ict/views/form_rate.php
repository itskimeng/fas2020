<?php include 'controller/TechnicalAssistanceController.php'; ?>
<style>
    .checkbox {
        display: inline-block;
        margin-right: 9%;
        margin-bottom: 10px;

    }

    .img-scale {
        width: 50px;
        height: 50px;
        display: block;
        margin: 0 auto;
        text-align: center;
    }

    .modal-header {
        background: linear-gradient(90deg, #43A047, #1B5E20);
        color: #fff;
    }

    .fit-img {
        width: 100%;
        max-width: 300px;
        height: auto;
        float: right;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Client Satisfaction Survey (Online)</h1>

        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">RICTU</a></li>
            <li class="active">Client Satisfaction Survey</li>
        </ol>
    </section>
    <section class="content">
        <form id="checklist">
            <div class="row">
                <div class="col-md-12">
                    <table style="margin-bottom:20px;">
                        <tr>
                            <td rowspan="2" style="width:10%;"><img src="images/logo.png" style="width:80%;height:50%;"></td>
                            <td style="font-family:'Cambria';font-size:15pt;">DEPARTMENT OF THE INTERIOR AND LOCAL GOVERNMENT</td>
                            <td rowspan="2"><img src="images/css_doccode.png" class="fit-img"></td>
                        </tr>
                        <tr>

                            <td style="font-family:'Cambria';font-style:bold;font-size:24pt;vertical-align:top;">CLIENT SATISFACTION SURVEY</td>

                        </tr>
                    </table>
                </div>
                <div class="col-md-12">
                    <table style="width:100%;  border: 2px solid black;" class="table table-striped">
                        <tr>
                            <td rowspan="2" style="background-color:black;color:#fff;font-family:'Cambria';width:10%;">To be accomplished by DILG Personnel</td>
                            <td style="font-family:'Cambria';font-style:italic;">Name of Office/Operating Unit:</td>
                        </tr>
                        <tr>
                            <td style="font-family:'Cambria';font-style:italic;">Name of Service Provided:</td>

                        </tr>
                    </table>
                </div>
                <div class="col-md-12">
                    <div class="box box-primary dropbox">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-info-circle"></i> Dear Client, </h3>
                            <p>Kindly fill-up this survey form and let us know your experience while transacting official business with us. DILG shall comply with the Republic Act No. 10173 or the Data Privacy Act of 2012; any personal information you choose to share will be kept confidential.</p>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div id="cgroup-source_no" class="form-group">
                                                <label class="control-label">Client Type:</label><br>
                                                <select class="form-control select2" name="cform-client_type">
                                                    <option value="1">Citizen</option>
                                                    <option value="2">Business</option>
                                                    <option value="3">Government (Employee or from another agency)</option>
                                                </select>
                                            </div>
                                            <div id="cgroup-source_no" class="form-group">
                                                <label class="control-label">Age:</label><br>
                                                <select class="form-control select2" name="cform-age">
                                                    <option value="Below 18">Below 18</option>
                                                    <option value="25-34">25-34</option>
                                                    <option value="25-34">25-34</option>
                                                    <option value="35-44">35-44</option>
                                                    <option value="45-54">45-54</option>
                                                    <option value="55-64">55-64</option>
                                                    <option value="65 and over">65 and over</option>
                                                </select>

                                            </div>
                                            <div id="cgroup-source_no" class="form-group">
                                                <label class="control-label">Region of residence:</label><br>
                                                <input type="text" name="cform-region" class="form-control" />
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div id="cgroup-source_no" class="form-group">
                                                <label class="control-label">Date</label><br>
                                                <input type="date" class="form-control" name="cform-date-received" />
                                            </div>
                                            <div id="cgroup-source_no" class="form-group">
                                                <label class="control-label">Gender:</label><br>
                                                <select class="form-control select2" name="cform-gender">
                                                    <option value="M">Male</option>
                                                    <option value="F">Female</option>
                                                    <option value="LGBTQIA+1">LGBTQIA+!</option>
                                                    <option value="null">Did not specify</option>
                                                </select>
                                            </div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="box box-primary dropbox">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-info-circle"></i> Instructions: </h3>
                            <p>Put a check mark () beside the statement that best describes your awareness and experience in using the DILG Citizen’s Charter (CC). The Citizen’s Charter (CC) is an official document that reflects the services of a government agency/office including its requirements, fees, and processing times, among others.</p>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <input id="cform-source_id" class="source_id" type="hidden" name="source_id" value="107">
                                            <div id="cgroup-source_no" class="form-group">
                                                <label class="control-label">CC1. Do you know about the Citizen’s Charter?</label><br>
                                                <select class="form-control select2" name="cform-cc1">
                                                    <option value="1">Yes, aware before my transaction with this office.</option>
                                                    <option value="2">Yes, but aware only when I saw the CC of this office.</option>
                                                    <option value="3">No, not aware of the CC. (Skip questions CC2 and CC3.)</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <input id="cform-source_id" class="source_id" type="hidden" name="source_id" value="107">
                                            <div id="cgroup-source_no" class="form-group">
                                                <label class="control-label">CC2. If your answer to the previous question is Yes, did you see this office’s CC?</label><br>
                                                <select class="form-control select2" name="cform-cc2">
                                                    <option value="1">Yes, the CC was easy to find.</option>
                                                    <option value="2">Yes, but the CC was hard to find.</option>
                                                    <option value="3">No, I did not see this office’s CC.</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <input id="cform-source_id" class="source_id" type="hidden" name="source_id" value="107">
                                            <div id="cgroup-source_no" class="form-group">
                                                <label class="control-label">CC3.If your answer to the previous question is Yes, did you use the CC as a guide for the services you availed?</label><br>
                                                <select class="form-control select2" name="cform-cc3">
                                                    <option value="1">Yes, I was able to use the CC.</option>
                                                    <option value="2">No, I was not able to use the CC.</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="box box-primary dropbox">
                        <div class="box-header">
                            <h3 class="box-title"><i class="fa fa-info-circle"></i> Instructions: </h3>
                            <p>Instructions: For the following items, put a check mark () on the column that best describes your satisfaction level.</p>
                        </div>
                        <div class="box-body">
                            <div class="row">
                                <div class="col-md-12">

                                    <table border="1" style="width:100%;" id="tbl_checklist" class="table table-responsive table-bordered table-striped">
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td style="text-align:center;font-weight:bold;" class="tdSpacing">
                                                    <img src="images/strongly_disagree.png" class="img-scale" />
                                                    Strongly Disagree
                                                </td>
                                                <td style="text-align:center;font-weight:bold;" class="tdSpacing">
                                                    <img src="images/disagree.png" class="img-scale" />

                                                    Disagree
                                                </td>
                                                <td style="text-align:center;font-weight:bold;" class="tdSpacing">
                                                    <img src="images/neither.png" class="img-scale" />

                                                    Neither Agree nor Disagree
                                                </td>
                                                <td style="text-align:center;font-weight:bold;" class="tdSpacing">
                                                    <img src="images/agree.png" class="img-scale" />

                                                    Agree
                                                </td>
                                                <td style="text-align:center;font-weight:bold;" class="tdSpacing">
                                                    <img src="images/strongly_agree.png" class="img-scale" />

                                                    Strongly Agree
                                                </td>
                                                <td style="text-align:center;font-weight:bold;" class="tdSpacing">
                                                    Not Applicable
                                                </td>
                                            </tr>
                                            <?php foreach ($css_opts as $key => $item) : ?>
                                                <tr>
                                                    <td style="width:15%;" class="table-text"><?= $item['checklist']; ?></td>

                                                    <td style="width: 5%;">
                                                        <center><input type="checkbox" name="rating[]" value="5" class="chk_list sqd<?= $key; ?> form-check-input" value="1" /> </center>
                                                    </td>
                                                    <td style="width: 5%;">
                                                        <center><input type="checkbox" name="rating[]" value="4" id="chk_list" class="chk_list sqd<?= $key; ?> form-check-input" value="1" /> </center>
                                                    </td>
                                                    <td style="width: 5%;">
                                                        <center><input type="checkbox" name="rating[]" value="3" id="chk_list" class="chk_list sqd<?= $key; ?> form-check-input" value="1" /> </center>
                                                    </td>
                                                    <td style="width: 5%;">
                                                        <center><input type="checkbox" name="rating[]" value="2" id="chk_list" class="chk_list sqd<?= $key; ?> form-check-input" value="1" /> </center>
                                                    </td>
                                                    <td style="width: 5%;">
                                                        <center><input type="checkbox" name="rating[]" value="1" id="chk_list" class="chk_list sqd<?= $key; ?> form-check-input" value="1" /> </center>
                                                    </td>
                                                    <td style="width: 5%;">
                                                        <center><input type="checkbox" name="rating[]" value="0" id="chk_list" class="chk_list sqd<?= $key; ?> form-check-input" value="1" /> </center>
                                                    </td>

                                                </tr>
                                            <?php endforeach; ?>




                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="box box-primary dropbox">
                        <div class="box-header">
                            <p>Suggestions on how we can further improve our services</p>
                        </div>
                        <div class="box-body">
                            <textarea name="cform-suggestion" id="cform-suggestion" style="width:100%; height: 159px;decoration:none;resize:none;"></textarea>
                            <div class="col-md-6">
                                <div id="cgroup-source_no" class="form-group">
                                    <label class="control-label">Name (optional):</label><br>
                                    <input type="text" class="form-control" name="cform-name" readonly />
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div id="cgroup-source_no" class="form-group">
                                    <label class="control-label">Contact Number:</label><br>
                                    <input type="text" class="form-control" name="cform-name" readonly/>
                                </div>
                                <div id="cgroup-source_no" class="form-group">
                                    <label class="control-label">Email Address:</label><br>
                                    <input type="text" class="form-control" name="cform-name" readonly/>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <button type="button" data-toggle="modal" data-target="#exampleModal" class="btn btn-success col-lg-12 col-xs-12 col-md-12 col-sm-12"><i class="fa fa-send"></i> Submit </button>
                </div>

            </div>
        </form>
    </section>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Suggestions on how we can further improve our services:</h5>
            </div>
            <div class="modal-body">
                <textarea name="cform-suggestion" id="cform-suggestion" style="width: 572px; height: 159px;decoration:none;resize:none;"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" id="btn_css_submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        toastr.options = {
            "closeButton": true,
            "debug": true,
            "newestOnTop": false,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1500",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
        }
        // Users choose only 1 checkbox per row
        for (let i = 0; i < 9; i++) {
            $('.sqd' + i).click(function() {
                $('.sqd' + i).not(this).prop("checked", false);
            });
        }
    })
    $(document).on('click', '#btn_css_submit', function() {
        let numChecked = $('input[type="checkbox"]:checked').length;
        if (numChecked < 9) {
            toastr.error("Kindly check all checkboxes in the field", "Error Message");
        } else {
            insertClientSurveyData();
            toastr.success("Submit successfully", "Success Message");
        }
    });

    function insertClientSurveyData() {
        const formData = new FormData($('#checklist')[0]);
        const urlParams = new URLSearchParams(window.location.search);
        const controlNo = urlParams.get('id');
        const sugg_data = $('#cform-suggestion').text();

        formData.append('id', controlNo);
        formData.append('cform-suggestion', sugg_data);

        $.ajax({
            type: 'POST',
            url: 'entity/post_rate_service.php',
            data: formData,
            processData: false,
            contentType: false,
            success: function(data) {}
        });
    }
</script>