<?php include 'document_code.php'; ?>
<?php include 'view_ta_info.php'; ?>
<form id="tbl_checklist">

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
                                    <textarea cols="118" disabled rows="10" name="issue" style="border:1px solid white;resize:none;width:100%;text-align:left;background-color:#EEEEEE;" class="disabletxtarea">
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
                                    <textarea cols="118" rows="10" name="STATUS_DESC" id="sol" style="resize:none" disabled>
                                    <?= $view_ta['ict_comments']; ?>
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
            <div class="ribbon ribbon-top-right"><span>Required</span></div>

            <h1 class="box-title" style="text-align: center;">
                <center> CUSTOMER SATISFACTION SURVEY</center>
            </h1>


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
                        <h4>A. SERVICE DIMENSION</h4>
                        <H4>
                            <center>RATING SCALE (5) - Strongly Agree (4) - Agree (3) - Neutral (2) - Disagree (1) - Strongly Disagree</center>
                        </H4>
                        <table border="1" style="width:100%;">
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
                                    <td style="width:15%;" class="table-text">Responsiveness</td>
                                    <td colspan=3 style="width:25%;padding:5px 5px 5px 5px;">
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
                                    <td style="width:15%;" class="table-text">Reliability</td>
                                    <td colspan=3 style="width:15%;padding:5px 5px 5px 5px;">
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
                                    <td style="width:15%;" class="table-text">Access & Facilities</td>
                                    <td colspan=3 style="width:15%;padding:5px 5px 5px 5px;">
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
                                    <td style="width:15%;" class="table-text">Communication</td>
                                    <td colspan=3 style="width:15%;padding:5px 5px 5px 5px;">
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
                                    <td style="width:15%;" class="table-text">Cost</td>
                                    <td colspan=3 style="width:15%;padding:5px 5px 5px 5px;">
                                        Value for money spent in services rendered.
                                    </td>
                                    <td colspan="5" style="text-align: center;">Service if free of chargee</td>

                                </tr>
                                <tr>
                                    <td style="width:15%;" class="table-text">Integrity</td>
                                    <td colspan=3 style="width:25%;padding:5px 5px 5px 5px;">
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
                                    <td style="width:15%;" class="table-text">Assurance</td>
                                    <td colspan=3 style="width:15%;padding:5px 5px 5px 5px;">
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
                                    <td style="width:15%;" class="table-text">Outcome</td>
                                    <td colspan=3 style="width:15%;padding:5px 5px 5px 5px;">
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
                        <textarea cols="252" rows="7" style="resize: none;" name="suggestion"></textarea>
                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-4">
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
        <div class="col-lg-4">
&nbsp;
</div>
        <div class="col-lg-4">
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
                            <div class="media-body">
                                <h2 style="text-align: center;font-weight:bolder;font-size:17px;"><U><?= $view_ta['assisted_by']; ?></U></h2>

                                <h5 style="text-align: center;">Signature over Printed Name</h5>

                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
       
    </div>
    <input type="hidden" value=<?= $_GET['id'];?> id="control_no" />
    <button class="btn btn-success col-lg-12 sweet-14" type="button" style="font-size:17px;"><i class="fa fa-save"></i> Save</button>
</form>

<script>
    $(document).ready(function() {
        $(document).on('click', '.sweet-14', function() {
            let count = $('#chk_list:checked').length;
            let c_n = $('#control_no').val();
            if (count == 0 || count < 7) {

                alert('Kindly checked all checkboxes in the field.');

            } else {
                swal({
                    title: "Are you sure you want to proceed?",
                    text: "Control No:" + c_n,
                    type: "info",
                    showCancelButton: true,
                    confirmButtonClass: 'btn-danger',
                    confirmButtonText: 'Yes',
                    closeOnConfirm: false,
                    showLoaderOnConfirm: true
                }, function() {
                    let fuck = $('#tbl_checklist').serialize();

                    $.get({
                        url: 'entity/post_rate_service.php?flag=<?php echo $_GET['flag'] ?>&' + fuck,
                        data: {
                            cn: c_n,


                        },
                        success: function(data) {
                            console.log(data);
                            setTimeout(function() {
                                swal("Record saved successfully!");
                            }, 3000);
                            <?php
                            if ($username == 'ljbanalan' || $username == 'mmmonteiro' || $username == 'masacluti' || $username == 'seolivar' || $username == 'jsodsod' || $username == 'jecastillo') {
                            ?>

                                window.location = "processing.php?division=<?php //echo $_GET['division']; 
                                                                            ?>&ticket_id=";

                            <?php
                            } else {
                            ?>
                                window.location = "techassistance.php?division=<?php // echo $_GET['division']; 
                                                                                ?>&ticket_id=";

                            <?php
                            }
                            ?>
                        }
                    })
                });
            }

        })
    });
</script>
<script>
    let val1 = 5;
    let val2 = 5;
    let val3 = 5;
    let val4 = 5;
    let val5 = 5;
    let val6 = 5;
    let val7 = 5;
    $(".sd_chklist_res").each(function() {

        $(this).attr("value", val1);
        val1--
    });
    $(".sd_chklist_rel").each(function() {

        $(this).attr("value", val2);
        val2--
    });
    $(".sd_chklist_af").each(function() {

        $(this).attr("value", val3);
        val3--
    });
    $(".sd_chklist_comm").each(function() {

        $(this).attr("value", val4);
        val4--
    });
    $(".sd_chklist_int").each(function() {

        $(this).attr("value", val5);
        val5--
    });
    $(".sd_chklist_assurance").each(function() {

        $(this).attr("value", val6);
        val6--
    });
    $(".sd_chklist_outcome").each(function() {

        $(this).attr("value", val7);
        val7--
    });




    //Date picker,
</script>
<script>
    $('.myformStyle').submit(function() {
        if ($('input:checkbox', this).is(':checked')) {
            // everything's fine...
        } else {
            alert('All required fields must be properly field-up!.');
            return false;
        }
    });
    $(document).ready(function() {
        $('#div1').removeClass("contentDiv");
        $(".chk_list").attr("disabled", true);




        // append
        $('#addmore').click(function() {
            $('.myTemplate2')
                .clone()
                .removeClass("myTemplate2")
                .show()
                .appendTo('#append');

            myCounter++;
            $('.additionalDate .datePicker22').each(function(index) {
                $('.datePicker22').addClass("myDate2");
                $(this).attr("name", $(this).attr("name") + myCounter);
            });
        });
        $('#submitBtn').click(function() {
            var prog = []
            var accounts = []
            let value = '';
            let intranet = ["employee_id", "designation", "fname", "mname", "lname", "exname", "region", "province", "municipality", "bdate", "gender", "phonenum", "emailadd", "uname", "pass", "cpass", ];
            let intranetProg = ["program", "roles", "focalperson"];

            let val1 = ["Employee ID No.", "Office", "First Name", "Middle Name", "Last Name", "Extension Name", "Region", "Province", "Municipality", "Birth Date", "Gender", "Phone No.", "Email", "Username", "Password", "Confirm Password"];
            let val2 = ["Programs", "Roles", "Assign To"];
            let val3 = ["Complete Name", "Office", "Username", "Old Password", "New Password"];

            let append = document.getElementsByName("append");
            let retaccounts = document.getElementsByName("retaccounts");


            //  INTRANET
            for (let index = 0; index < intranet.length; index++) {
                let info = $('#' + intranet[index]).val();
                if (info == '') {
                    title1 = '';
                } else {
                    title1 += "\nt\t" + val1[index] + ": " + info + "";
                }
            }

            for (let index = 0; index < append.length; index++) {
                if (append[index].value == '') {
                    title2 == '';
                } else {
                    val2.push(val2[index]);
                    prog.push("\t" + val2[index] + ":" + append[index].value);
                }

            }


            //LOOP
            for (let index = 0; index < retaccounts.length; index++) {
                if (retaccounts[index].value == '') {
                    title3 = ''
                } else {
                    accounts.push("\t" + val3[index] + ":" + retaccounts[index].value)
                }
            }


            title2 += '\n' + prog.join('\n');
            title3 += '\n' + accounts.join('\n');
            $('#issue').val(title1 + "\n" + title2 + title3);



        })
        $('.link').click(function() {
            var e = $(this);
            var target = $("#" + e.data("div"));
            target.show("slow").siblings().hide("slow");
        });

    });
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()



        //Date range as a button
        $('#daterange-btn').daterangepicker({
                ranges: {
                    'Today': [moment(), moment()],
                    'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
                    'Last 7 Days': [moment().subtract(6, 'days'), moment()],
                    'Last 30 Days': [moment().subtract(29, 'days'), moment()],
                    'This Month': [moment().startOf('month'), moment().endOf('month')],
                    'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
                },
                startDate: moment().subtract(29, 'days'),
                endDate: moment()
            },
            function(start, end) {
                $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
            }
        )


    })
</script>

<script>
    $('.sd_chklist_outcome').click(function() {
        $('.sd_chklist_outcome').not(this).prop("checked", false);
    });
    $('.sd_chklist_assurance').click(function() {
        $('.sd_chklist_assurance').not(this).prop("checked", false);
    });
    $('.sd_chklist_int').click(function() {
        $('.sd_chklist_int').not(this).prop("checked", false);
    });
    $('.sd_chklist_comm').click(function() {
        $('.sd_chklist_comm').not(this).prop("checked", false);
    });
    $('.sd_chklist_af').click(function() {
        $('.sd_chklist_af').not(this).prop("checked", false);
    });
    $('.sd_chklist_rel').click(function() {
        $('.sd_chklist_rel').not(this).prop("checked", false);
    });
    $('.sd_chklist_res').click(function() {
        $('.sd_chklist_res').not(this).prop("checked", false);
    });
</script>