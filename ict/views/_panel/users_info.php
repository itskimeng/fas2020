<form method="POST" enctype="multipart/form-data" class="myformStyle" action="JASPER/sample/sample1.php">
    <?php include 'document_code.php';?>   
    <?php include 'tbl_info.php';?>   
   
    
    <div class="box">

        <div class="box box-primary box-solid dropbox">
            <div class="box-header with-border" style="background-color: #585f62;">
            <div class="ribbon ribbon-top-right"><span>Required</span></div>
                <h5 class="box-title"> TYPE OF REQUEST (CHOOSE THAT ALL APPLY)</h5>

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
                        <div class="media-body">

                            <?php include 'checklist.php'; ?>

                        </div>
                    </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="box">
        <div class="row">
            <div class="col-lg-6">
                <div class="box box-primary box-solid dropbox">
                    <div class="box-header with-border" style="background-color: #585f62;" style="background-color: #585f62;" style="background-color: black;">
                    <div class="ribbon ribbon-top-right"><span>Required</span></div>

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
                                    <textarea cols="118" rows="10" name="issue" required>

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
                        <h5 class="box-title">ACTION TAKEN/RESOLUTION/RECOMMENDATION:</h5>

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
                                    <textarea cols="118" rows="10" style="border:1px solid white;resize:none;width:100%;text-align:left;background-color:#EEEEEE;" class="disabletxtarea">

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
        <div class="box-body box-emp">
            <div class="list-group contact-group zoom">
                <div class="media">
                    <div class="pull-left">
                    </div>
                    <div class="media-body">
                        <h4>A. SERVICE DIMENSIONS</h4>
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
                                    <td style="width:15%;" class="table-text">Responsiveness</td>
                                    <td colspan=3 style="width:25%;padding:5px 5px 5px 5px;">
                                        Service was willingly and promptly extended to client/customer
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]"  class="chk_list sd_chklist_res form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]"  class="chk_list sd_chklist_res form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]"  class="chk_list sd_chklist_res form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]"  class="chk_list sd_chklist_res form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]"  class="chk_list sd_chklist_res form-check-input" /> </center>
                                    </td>

                                </tr>
                                <tr>
                                    <td style="width:15%;" class="table-text">Reliability</td>
                                    <td colspan=3 style="width:15%;padding:5px 5px 5px 5px;">
                                        Performs the service within the expectations of the citizen’s/client served.
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]"  class="chk_list sd_chklist_rel form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]"  class="chk_list sd_chklist_rel form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]"  class="chk_list sd_chklist_rel form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]"  class="chk_list sd_chklist_rel form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]"  class="chk_list sd_chklist_rel form-check-input" /> </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:15%;" class="table-text">Access & Facilities</td>
                                    <td colspan=3 style="width:15%;padding:5px 5px 5px 5px;">
                                        Facility / resources /modes of technology were readily available for convenienttransactions
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]"  class="chk_list sd_chklist_af form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]"  class="chk_list sd_chklist_af form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]"  class="chk_list sd_chklist_af form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]"  class="chk_list sd_chklist_af form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]"  class="chk_list sd_chklist_af form-check-input" /> </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:15%;" class="table-text">Communication</td>
                                    <td colspan=3 style="width:15%;padding:5px 5px 5px 5px;">
                                        Access to information of the service rendered easily understood and feedbackmechanisms were present relevant to client’s concern.
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]"  class="chk_list sd_chklist_comm form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]"  class="chk_list sd_chklist_comm form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]"  class="chk_list sd_chklist_comm form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]"  class="chk_list sd_chklist_comm form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]"  class="chk_list sd_chklist_comm form-check-input" /> </center>
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
                                        <center><input type="checkbox" name="rating[]"  class="chk_list sd_chklist_int form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]"  class="chk_list sd_chklist_int form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]"  class="chk_list sd_chklist_int form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]"  class="chk_list sd_chklist_int form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]"  class="chk_list sd_chklist_int form-check-input" /> </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:15%;" class="table-text">Assurance</td>
                                    <td colspan=3 style="width:15%;padding:5px 5px 5px 5px;">
                                        Service was provided by competent personnel.
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]"  class="chk_list sd_chklist_assurance form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]"  class="chk_list sd_chklist_assurance form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]"  class="chk_list sd_chklist_assurance form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]"  class="chk_list sd_chklist_assurance  form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]"  class="chk_list  sd_chklist_assurance form-check-input" /> </center>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:15%;" class="table-text">Outcome</td>
                                    <td colspan=3 style="width:15%;padding:5px 5px 5px 5px;">
                                        Overall expectations of clients are met.
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]"  class="chk_list sd_chklist_outcome form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]"  class="chk_list sd_chklist_outcome form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]"  class="chk_list sd_chklist_outcome form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]"  class="chk_list sd_chklist_outcome form-check-input" /> </center>
                                    </td>
                                    <td style="width: 5%;">
                                        <center><input type="checkbox" name="rating[]"  class="chk_list sd_chklist_outcome form-check-input" /> </center>
                                    </td>
                                </tr>


                            </tbody>
                        </table>
                        <h4>B. COMMENT/SUGGESTION FOR IMPROVEMENT</h4>
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
                                <h2 style="text-align: center;font-weight:bolder;font-size:17px;"><u><?= strtoupper($_SESSION['complete_name']); ?></u> </h2>
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
                    <h5 class="box-title">ICT TECHNICAL PERSONNEL</h5>

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
                                <h2 style="text-align: center;font-weight:bolder;font-size:17px;">___________________________________</h2>

                                <h5 style="text-align: center;">Signature over Printed Name</h5>

                            </div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <button class="btn btn-success col-lg-12" type="submit" style="font-size:17px;"><i class="fa fa-save"></i> Save</button>
</form>

<script>
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

        //Datemask dd/mm/yyyy
        $('#datemask').inputmask('dd/mm/yyyy', {
            'placeholder': 'dd/mm/yyyy'
        })
        //Datemask2 mm/dd/yyyy
        $('#datemask2').inputmask('mm/dd/yyyy', {
            'placeholder': 'mm/dd/yyyy'
        })
        //Money Euro
        $('[data-mask]').inputmask()

        //Date range picker
        $('#reservation').daterangepicker()
        //Date range picker with time picker
        $('#reservationtime').daterangepicker({
            timePicker: true,
            timePickerIncrement: 30,
            locale: {
                format: 'MM/DD/YYYY hh:mm A'
            }
        })
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

        //Date picker
        $('#datepicker').datepicker({
            autoclose: true
        })

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        })
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        })
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        })

        //Colorpicker
        $('.my-colorpicker1').colorpicker()
        //color picker with addon
        $('.my-colorpicker2').colorpicker()

        //Timepicker
        $('.timepicker').timepicker({
            showInputs: false
        })
    })
</script>
<script>
    var coll = document.getElementsByClassName("collapsible");
    var i;

    for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function() {
            this.classList.toggle("activecollap");
            var content = this.nextElementSibling;
            if (content.style.display === "block") {
                content.style.display = "none";
            } else {
                content.style.display = "block";
            }
        });
    }
    $('#submit').click(function() {

        var cb1 = document.getElementById("checkboxgroup_g1").checked;
        var cb2 = document.getElementById("checkboxgroup_g2").checked;
        var cb3 = document.getElementById("checkboxgroup_g3").checked;
        var cb4 = document.getElementById("checkboxgroup_g4").checked;
        var cb5 = document.getElementById("checkboxgroup_g5").checked;
        var cb6 = document.getElementById("checkboxgroup_g6").checked;
        var cb7 = document.getElementById("checkboxgroup_g7").checked;
        var cb8 = document.getElementById("checkboxgroup_g8").checked;
        var cb9 = document.getElementById("checkboxgroup_g9").checked;


        if (cb1 == '' && cb2 == '' && cb3 == '' && cb4 == '' && cb5 == '' && cb6 == '' && cb7 == '' && cb8 == '' && cb9 == '') {
            alert('Required Field:Choose at least one Type of Request');
            return false;
        }
        return true;
    })
</script>
<script>
    $(function() {

        //Date picker,
        $(".datePicker1").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: "1950:2020",
            dateFormat: 'M dd, yy'
        });
        $(".datePicker1").datepicker().datepicker("setDate", new Date());


        $('#datepicker2').datepicker({
            autoclose: true
        })
        $('#datepicker3').datepicker({
            autoclose: true
        })
        $('#datepicker4').datepicker({
            autoclose: true
        })


    })
</script>
<script>
    $(function() {
        enable_cb1();
        enable_cb2();
        enable_cb3();
        enable_cb4();
        enable_cb5();
        enable_cb6();
        enable_cb7();
        enable_cb8();
        enable_cb9();
        $("#checkboxgroup_g1").click(enable_cb1);
        $("#checkboxgroup_g2").click(enable_cb2);
        $("#checkboxgroup_g3").click(enable_cb3);
        $("#checkboxgroup_g4").click(enable_cb4);
        $("#checkboxgroup_g5").click(enable_cb5);
        $("#checkboxgroup_g6").click(enable_cb6);
        $("#checkboxgroup_g7").click(enable_cb7);
        $("#checkboxgroup_g8").click(enable_cb8);
        $("#checkboxgroup_g9").click(enable_cb9);





    });
    $('#cb3_4').on('change', function(e) {
        if (e.target.checked) {
            $('#myModal').modal();
        }
    });

    function enable_cb1() {
        if (this.checked) {
            if ($('.checkboxgroup_g1').val() == '1') {
                $('#cb1').not(this).prop('checked', true);
                $("input.txt1").attr("disabled", true);
                $("input.txt2").attr("disabled", true);
                $("input.txt3").attr("disabled", true);
                $("input.txt4").attr("disabled", true);
            }

            // $('#others1').val('');
            // $('#others2').val('');
            // $('#others3').val('');



            $(".checkboxgroup_g1").removeAttr("disabled");
            $(".checkboxgroup_g2").attr("disabled", true);
            $(".checkboxgroup_g3").attr("disabled", true);
            $(".checkboxgroup_g4").attr("disabled", true);
            $(".checkboxgroup_g5").attr("disabled", true);
            $(".checkboxgroup_g6").attr("disabled", true);
            $(".checkboxgroup_g7").attr("disabled", true);
            $(".checkboxgroup_g8").attr("disabled", true);
            $(".checkboxgroup_g9").attr("disabled", true);

            $('.checkboxgroup_g2').not(this).prop('checked', false);
            $('.checkboxgroup_g3').not(this).prop('checked', false);
            $('.checkboxgroup_g4').not(this).prop('checked', false);
            $('.checkboxgroup_g5').not(this).prop('checked', false);
            $('.checkboxgroup_g6').not(this).prop('checked', false);
            $('.checkboxgroup_g7').not(this).prop('checked', false);
            $('.checkboxgroup_g8').not(this).prop('checked', false);
            $('.checkboxgroup_g9').not(this).prop('checked', false);




        } else {

            $('.checkboxgroup_g1').not(this).prop('checked', false);


            $(".checkboxgroup_g1").attr("disabled", true);
            $(".checkboxgroup_g2").attr("disabled", true);
            $(".checkboxgroup_g3").attr("disabled", true);
            $(".checkboxgroup_g4").attr("disabled", true);
            $(".checkboxgroup_g5").attr("disabled", true);
            $(".checkboxgroup_g6").attr("disabled", true);
            $(".checkboxgroup_g7").attr("disabled", true);
            $(".checkboxgroup_g8").attr("disabled", true);
            $(".checkboxgroup_g9").attr("disabled", true);

        }
    }

    function enable_cb2() {
        if (this.checked) {
            if ($('.checkboxgroup_g2').val() == '6') {
                $('#cb2').not(this).prop('checked', true);
                $("#portals").removeAttr("disabled");
                $("input.txt1").attr("disabled", true);
                $("input.txt2").attr("disabled", true);
                $("input.txt3").attr("disabled", true);
                $("input.txt4").attr("disabled", true);

            }




            $(".checkboxgroup_g2").removeAttr("disabled");
            $('.checkboxgroup_g1').not(this).prop('checked', false);

            $(".checkboxgroup_g1").attr("disabled", true);
            $(".checkboxgroup_g3").attr("disabled", true);
            $(".checkboxgroup_g4").attr("disabled", true);
            $(".checkboxgroup_g5").attr("disabled", true);
            $(".checkboxgroup_g6").attr("disabled", true);
            $(".checkboxgroup_g6").attr("disabled", true);
            $(".checkboxgroup_g7").attr("disabled", true);
            $(".checkboxgroup_g8").attr("disabled", true);
            $(".checkboxgroup_g9").attr("disabled", true);


            $('.checkboxgroup_g3').not(this).prop('checked', false);
            $('.checkboxgroup_g4').not(this).prop('checked', false);
            $('.checkboxgroup_g5').not(this).prop('checked', false);
            $('.checkboxgroup_g6').not(this).prop('checked', false);
            $('.checkboxgroup_g7').not(this).prop('checked', false);
            $('.checkboxgroup_g8').not(this).prop('checked', false);
            $('.checkboxgroup_g9').not(this).prop('checked', false);
        } else {
            // $('#site').val('');
            // $('#purpose').val('');
            // $('#purpose2').val('');

            $('.checkboxgroup_g2').not(this).prop('checked', false);

            $(".checkboxgroup_g1").attr("disabled", true);
            $(".checkboxgroup_g2").attr("disabled", true);
            $(".checkboxgroup_g3").attr("disabled", true);
            $(".checkboxgroup_g4").attr("disabled", true);
            $(".checkboxgroup_g5").attr("disabled", true);
            $(".checkboxgroup_g6").attr("disabled", true);
            $(".checkboxgroup_g7").attr("disabled", true);
            $(".checkboxgroup_g8").attr("disabled", true);
            $(".checkboxgroup_g9").attr("disabled", true);


            // document.getElementById("site").disabled = true;
            // document.getElementById("purpose").disabled = true;
            // document.getElementById("purpose2").disabled = true;
        }
    }

    function enable_cb3() {
        if (this.checked) {
            if ($('.checkboxgroup_g3').val() == '10') {
                $('#cb3').not(this).prop('checked', true);
                $("input.txt1").attr("disabled", true);
                $("input.txt2").attr("disabled", true);
                $("input.txt3").attr("disabled", true);
                $("input.txt4").attr("disabled", true);
            }
            // $('#site').val('');
            // $('#purpose').val('');
            // $('#purpose2').val('');
            // $('#softwares').val('');
            // $('#changeaccount').val('');
            // $('#others1').val('');
            // $('#others2').val('');
            // $('#others3').val('');

            $(".checkboxgroup_g3").removeAttr("disabled");
            // document.getElementById("softwares").disabled = false;
            $(".checkboxgroup_g1").attr("disabled", true);
            $(".checkboxgroup_g2").attr("disabled", true);
            $(".checkboxgroup_g4").attr("disabled", true);
            $(".checkboxgroup_g5").attr("disabled", true);
            $(".checkboxgroup_g6").attr("disabled", true);
            $(".checkboxgroup_g7").attr("disabled", true);
            $(".checkboxgroup_g8").attr("disabled", true);
            $(".checkboxgroup_g9").attr("disabled", true);

            $('.checkboxgroup_g1').not(this).prop('checked', false);
            $('.checkboxgroup_g2').not(this).prop('checked', false);
            $('.checkboxgroup_g4').not(this).prop('checked', false);
            $('.checkboxgroup_g5').not(this).prop('checked', false);
            $('.checkboxgroup_g6').not(this).prop('checked', false);
            $('.checkboxgroup_g7').not(this).prop('checked', false);
            $('.checkboxgroup_g8').not(this).prop('checked', false);
            $('.checkboxgroup_g9').not(this).prop('checked', false);

        } else {
            // document.getElementById("softwares").disabled = true;

            // $('#softwares').val('');
            $('.checkboxgroup_g3').not(this).prop('checked', false);

            $(".checkboxgroup_g1").attr("disabled", true);
            $(".checkboxgroup_g2").attr("disabled", true);
            $(".checkboxgroup_g3").attr("disabled", true);
            $(".checkboxgroup_g4").attr("disabled", true);
            $(".checkboxgroup_g5").attr("disabled", true);
            $(".checkboxgroup_g6").attr("disabled", true);
            $(".checkboxgroup_g7").attr("disabled", true);
            $(".checkboxgroup_g8").attr("disabled", true);
            $(".checkboxgroup_g9").attr("disabled", true);


        }
    }

    function enable_cb4() {
        if (this.checked) {
            if ($('.checkboxgroup_g4').val() == '13') {
                $('#cb4').not(this).prop('checked', true);
                $("input.txt1").removeAttr("disabled");
                $("input.txt1").prop("required", true);
                $("input.txt3").attr("disabled", true);
                $("input.txt4").attr("disabled", true);
            }




            $(".checkboxgroup_g4").removeAttr("disabled");
            $(".checkboxgroup_g1").attr("disabled", true);
            $(".checkboxgroup_g2").attr("disabled", true);
            $(".checkboxgroup_g3").attr("disabled", true);
            $(".checkboxgroup_g5").attr("disabled", true);
            $(".checkboxgroup_g6").attr("disabled", true);
            $(".checkboxgroup_g7").attr("disabled", true);
            $(".checkboxgroup_g8").attr("disabled", true);
            $(".checkboxgroup_g9").attr("disabled", true);


            $('.checkboxgroup_g1').not(this).prop('checked', false);
            $('.checkboxgroup_g2').not(this).prop('checked', false);
            $('.checkboxgroup_g3').not(this).prop('checked', false);
            $('.checkboxgroup_g5').not(this).prop('checked', false);
            $('.checkboxgroup_g6').not(this).prop('checked', false);
            $('.checkboxgroup_g7').not(this).prop('checked', false);
            $('.checkboxgroup_g8').not(this).prop('checked', false);
            $('.checkboxgroup_g9').not(this).prop('checked', false);

        } else {
            $('.checkboxgroup_g4').not(this).prop('checked', false);
            $("input.txt1").attr("disabled", true);
            $("input.txt2").attr("disabled", true);
            $(".checkboxgroup_g1").attr("disabled", true);
            $(".checkboxgroup_g2").attr("disabled", true);
            $(".checkboxgroup_g3").attr("disabled", true);
            $(".checkboxgroup_g4").attr("disabled", true);
            $(".checkboxgroup_g5").attr("disabled", true);
            $(".checkboxgroup_g6").attr("disabled", true);
            $(".checkboxgroup_g7").attr("disabled", true);
            $(".checkboxgroup_g8").attr("disabled", true);
            $(".checkboxgroup_g9").attr("disabled", true);
        }
    }

    function enable_cb5() {
        if (this.checked) {
            // document.getElementById("changeaccount").disabled = false;
            if ($('.checkboxgroup_g5').val() == '20') {
                $('#cb5').not(this).prop('checked', true);
                $("input.txt1").attr("disabled", true);
                $("input.txt2").attr("disabled", true);
                $("input.txt3").attr("disabled", true);
                $("input.txt4").attr("disabled", true);
            }
            // $('#site').val('');
            // $('#purpose').val('');
            // $('#purpose2').val('');
            // $('#softwares').val('');
            // $('#changeaccount').val('');
            $('#others1').val('');
            $('#others2').val('');
            $('#others3').val('');



            $(".checkboxgroup_g5").removeAttr("disabled");
            $(".checkboxgroup_g1").attr("disabled", true);
            $(".checkboxgroup_g2").attr("disabled", true);
            $(".checkboxgroup_g3").attr("disabled", true);
            $(".checkboxgroup_g4").attr("disabled", true);
            $(".checkboxgroup_g6").attr("disabled", true);
            $(".checkboxgroup_g7").attr("disabled", true);
            $(".checkboxgroup_g8").attr("disabled", true);
            $(".checkboxgroup_g9").attr("disabled", true);

            $('.checkboxgroup_g1').not(this).prop('checked', false);
            $('.checkboxgroup_g2').not(this).prop('checked', false);
            $('.checkboxgroup_g3').not(this).prop('checked', false);
            $('.checkboxgroup_g4').not(this).prop('checked', false);
            $('.checkboxgroup_g6').not(this).prop('checked', false);
            $('.checkboxgroup_g7').not(this).prop('checked', false);
            $('.checkboxgroup_g8').not(this).prop('checked', false);
            $('.checkboxgroup_g9').not(this).prop('checked', false);

        } else {
            // document.getElementById("changeaccount").disabled = true;
            // $('#changeaccount').val('');
            $('.checkboxgroup_g5').not(this).prop('checked', false);

            $(".checkboxgroup_g1").attr("disabled", true);
            $(".checkboxgroup_g2").attr("disabled", true);
            $(".checkboxgroup_g3").attr("disabled", true);
            $(".checkboxgroup_g4").attr("disabled", true);
            $(".checkboxgroup_g5").attr("disabled", true);
            $(".checkboxgroup_g6").attr("disabled", true);
            $(".checkboxgroup_g7").attr("disabled", true);
            $(".checkboxgroup_g8").attr("disabled", true);
            $(".checkboxgroup_g9").attr("disabled", true);



        }
    }

    function enable_cb6() {
        if (this.checked) {
            if ($('.checkboxgroup_g6').val() == '22') {
                $('#cb6').not(this).prop('checked', true);
                $("input.txt1").attr("disabled", true);
                $("input.txt2").attr("disabled", true);
                $("input.txt3").attr("disabled", true);
                $("input.txt4").attr("disabled", true);
            };


            // $('#others1').val('');
            // $('#others2').val('');
            // $('#others3').val('');



            $(".checkboxgroup_g6").removeAttr("disabled");
            $(".checkboxgroup_g2").attr("disabled", true);
            $(".checkboxgroup_g3").attr("disabled", true);
            $(".checkboxgroup_g4").attr("disabled", true);
            $(".checkboxgroup_g5").attr("disabled", true);
            $(".checkboxgroup_g1").attr("disabled", true);
            $(".checkboxgroup_g7").attr("disabled", true);
            $(".checkboxgroup_g8").attr("disabled", true);
            $(".checkboxgroup_g9").attr("disabled", true);

            $('.checkboxgroup_g1').not(this).prop('checked', false);
            $('.checkboxgroup_g2').not(this).prop('checked', false);
            $('.checkboxgroup_g3').not(this).prop('checked', false);
            $('.checkboxgroup_g4').not(this).prop('checked', false);
            $('.checkboxgroup_g5').not(this).prop('checked', false);
            $('.checkboxgroup_g7').not(this).prop('checked', false);
            $('.checkboxgroup_g8').not(this).prop('checked', false);
            $('.checkboxgroup_g9').not(this).prop('checked', false);




        } else {

            $('.checkboxgroup_g6').not(this).prop('checked', false);


            $(".checkboxgroup_g1").attr("disabled", true);
            $(".checkboxgroup_g2").attr("disabled", true);
            $(".checkboxgroup_g3").attr("disabled", true);
            $(".checkboxgroup_g4").attr("disabled", true);
            $(".checkboxgroup_g5").attr("disabled", true);
            $(".checkboxgroup_g6").attr("disabled", true);
            $(".checkboxgroup_g7").attr("disabled", true);
            $(".checkboxgroup_g8").attr("disabled", true);
            $(".checkboxgroup_g9").attr("disabled", true);

        }
    }

    function enable_cb7() {
        if (this.checked) {
            if ($('.checkboxgroup_g7').val() == '24') {
                $('#cb7').not(this).prop('checked', true);
                $("input.txt1").attr("disabled", true);
                $("input.txt2").attr("disabled", true);
                $("input.txt3").attr("disabled", true);
                $("input.txt4").attr("disabled", true);
            } else {
                $('#cb7').not(this).prop('checked', false);

            }
            // $('#site').val('');
            // $('#purpose').val('');
            // $('#purpose2').val('');
            // $('#softwares').val('');
            // $('#changeaccount').val('');
            // $('#others1').val('');
            // $('#others2').val('');
            // $('#others3').val('');



            $(".checkboxgroup_g1").attr("disabled", true);
            $(".checkboxgroup_g2").attr("disabled", true);
            $(".checkboxgroup_g3").attr("disabled", true);
            $(".checkboxgroup_g4").attr("disabled", true);
            $(".checkboxgroup_g5").attr("disabled", true);
            $(".checkboxgroup_g6").attr("disabled", true);
            $(".checkboxgroup_g7").removeAttr("disabled");
            $(".checkboxgroup_g8").attr("disabled", true);
            $(".checkboxgroup_g9").attr("disabled", true);

            $('.checkboxgroup_g1').not(this).prop('checked', false);
            $('.checkboxgroup_g2').not(this).prop('checked', false);
            $('.checkboxgroup_g3').not(this).prop('checked', false);
            $('.checkboxgroup_g4').not(this).prop('checked', false);
            $('.checkboxgroup_g5').not(this).prop('checked', false);
            $('.checkboxgroup_g6').not(this).prop('checked', false);
            $('.checkboxgroup_g8').not(this).prop('checked', false);
            $('.checkboxgroup_g9').not(this).prop('checked', false);




        } else {

            $('.checkboxgroup_g7').not(this).prop('checked', false);


            $(".checkboxgroup_g1").attr("disabled", true);
            $(".checkboxgroup_g2").attr("disabled", true);
            $(".checkboxgroup_g3").attr("disabled", true);
            $(".checkboxgroup_g4").attr("disabled", true);
            $(".checkboxgroup_g5").attr("disabled", true);
            $(".checkboxgroup_g6").attr("disabled", true);
            $(".checkboxgroup_g7").attr("disabled", true);
            $(".checkboxgroup_g8").attr("disabled", true);
            $(".checkboxgroup_g9").attr("disabled", true);

        }
    }

    function enable_cb8() {
        if (this.checked) {
            if ($('.checkboxgroup_g8').val() == '32') {
                $('#cb9').not(this).prop('checked', true);
                $("input.txt1").attr("disabled", true);
                $("input.txt2").attr("disabled", true);
                $("input.txt3").attr("disabled", true);
                $("input.txt4").attr("disabled", true);
            }
            // $('#site').val('');
            // $('#purpose').val('');
            // $('#purpose2').val('');
            // $('#softwares').val('');
            // $('#changeaccount').val('');
            $('#others1').val('');
            $('#others2').val('');
            $('#others3').val('');



            $(".checkboxgroup_g1").attr("disabled", true);
            $(".checkboxgroup_g2").attr("disabled", true);
            $(".checkboxgroup_g3").attr("disabled", true);
            $(".checkboxgroup_g4").attr("disabled", true);
            $(".checkboxgroup_g5").attr("disabled", true);
            $(".checkboxgroup_g6").attr("disabled", true);
            $(".checkboxgroup_g7").attr("disabled", true);
            $(".checkboxgroup_g8").removeAttr("disabled");
            $(".checkboxgroup_g9").attr("disabled", true);

            $('.checkboxgroup_g1').not(this).prop('checked', false);
            $('.checkboxgroup_g2').not(this).prop('checked', false);
            $('.checkboxgroup_g3').not(this).prop('checked', false);
            $('.checkboxgroup_g4').not(this).prop('checked', false);
            $('.checkboxgroup_g5').not(this).prop('checked', false);
            $('.checkboxgroup_g6').not(this).prop('checked', false);
            $('.checkboxgroup_g7').not(this).prop('checked', false);
            $('.checkboxgroup_g9').not(this).prop('checked', false);




        } else {

            $('.checkboxgroup_g8').not(this).prop('checked', false);


            $(".checkboxgroup_g1").attr("disabled", true);
            $(".checkboxgroup_g2").attr("disabled", true);
            $(".checkboxgroup_g3").attr("disabled", true);
            $(".checkboxgroup_g4").attr("disabled", true);
            $(".checkboxgroup_g5").attr("disabled", true);
            $(".checkboxgroup_g6").attr("disabled", true);
            $(".checkboxgroup_g7").attr("disabled", true);
            $(".checkboxgroup_g8").attr("disabled", true);
            $(".checkboxgroup_g9").attr("disabled", true);

        }
    }

    function enable_cb9() {

        if (this.checked) {
            if ($('.checkboxgroup_g4').val() == '9') {
                $('#cb4').not(this).prop('checked', true);
                $("input.txt1").removeAttr("disabled");
                $("input.txt2").attr("disabled", true);
                $("input.txt3").attr("disabled", true);
                $("input.txt4").prop("required", true);

            }
            $("#others1").removeAttr("disabled");
            $("input.txt1").attr("disabled", true);
            $("input.txt2").attr("disabled", true);
            $("input.txt3").attr("disabled", true);
            $("input.txt4").attr("disabled", false);







            $(".checkboxgroup_g1").attr("disabled", true);
            $(".checkboxgroup_g2").attr("disabled", true);
            $(".checkboxgroup_g3").attr("disabled", true);
            $(".checkboxgroup_g4").attr("disabled", true);
            $(".checkboxgroup_g5").attr("disabled", true);
            $(".checkboxgroup_g6").attr("disabled", true);
            $(".checkboxgroup_g7").attr("disabled", true);
            $(".checkboxgroup_g8").attr("disabled", true);
            $(".checkboxgroup_g9").removeAttr("disabled");

            $('.checkboxgroup_g1').not(this).prop('checked', false);
            $('.checkboxgroup_g2').not(this).prop('checked', false);
            $('.checkboxgroup_g3').not(this).prop('checked', false);
            $('.checkboxgroup_g4').not(this).prop('checked', false);
            $('.checkboxgroup_g5').not(this).prop('checked', false);
            $('.checkboxgroup_g6').not(this).prop('checked', false);
            $('.checkboxgroup_g7').not(this).prop('checked', false);
            $('.checkboxgroup_g8').not(this).prop('checked', false);




        } else {

            $('.checkboxgroup_g9').not(this).prop('checked', false);
            $("input.txt1").attr("disabled", true);
            $("input.txt2").attr("disabled", true);
            $("input.txt3").attr("disabled", true);
            $("input.txt4").attr("disabled", true);



            $(".checkboxgroup_g1").attr("disabled", true);
            $(".checkboxgroup_g2").attr("disabled", true);
            $(".checkboxgroup_g3").attr("disabled", true);
            $(".checkboxgroup_g4").attr("disabled", true);
            $(".checkboxgroup_g5").attr("disabled", true);
            $(".checkboxgroup_g6").attr("disabled", true);
            $(".checkboxgroup_g7").attr("disabled", true);
            $(".checkboxgroup_g8").attr("disabled", true);
            $(".checkboxgroup_g9").attr("disabled", true);

        }
    }

    $('.checkboxgroup_g1').on('change', function() {
        $('.checkboxgroup_g1').not(this).prop('checked', false);
    });
    $('.checkboxgroup_g2').on('change', function() {
        $('.checkboxgroup_g2').not(this).prop('checked', false);
    });
    $('.checkboxgroup_g3').on('change', function() {
        $('.checkboxgroup_g3').not(this).prop('checked', false);
    });
    $('.checkboxgroup_g4').on('change', function() {
        $('.checkboxgroup_g4').not(this).prop('checked', false);
        $('.checkboxgroup_g4:checked').each(function() {
            if (this.value == "13") {
                $("input.txt1").removeAttr("disabled");


            } else if (this.value == "18") {
                $("input.txt1").attr("disabled", true);
                $("input.txt2").removeAttr("disabled");
                $("input.txt2").prop("required", true);

            } else {
                $("input.txt1").attr("disabled", true);
                $("input.txt2").attr("disabled", true);

            }
        })
    });
    $('.checkboxgroup_g5').on('change', function() {
        $('.checkboxgroup_g5').not(this).prop('checked', false);
    });
    $('.checkboxgroup_g6').on('change', function() {
        $('.checkboxgroup_g6').not(this).prop('checked', false);

    });

    $('.checkboxgroup_g7').on('change', function() {
        $('.checkboxgroup_g7').not(this).prop('checked', false);
        $('.checkboxgroup_g7:checked').each(function() {
            if (this.value == "30") {
                $("input.txt3").removeAttr("disabled");
                $("input.txt3").prop("required", true);
            } else {
                $("input.txt3").attr("disabled", true);

            }
        })
    });


    $('.checkbox_group').on('change', function() {
        $('.checkbox_group').not(this).prop('checked', false);
        $('.checkboxsubgroup7').not(this).prop('checked', false);

    });

    $('.checkboxsubgroup7').on('change', function() {
        $('.checkboxsubgroup7').not(this).prop('checked', false);

    });




    // DATE PICKER
    $(function() {
        $(".datePicker1").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: "1950:2020",
            dateFormat: 'M dd, yy'
        });
        $(".datePicker2").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: "1950:2020",
            dateFormat: 'M dd, yy'
        });
        $(".datePicker3").datepicker({
            changeMonth: true,
            changeYear: true,
            yearRange: "1950:2020",
            dateFormat: 'M dd, yy'
        });


    });
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