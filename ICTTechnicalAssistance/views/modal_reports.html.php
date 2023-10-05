<div class="modal fade" id="reports" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content" style="width: 900px;margin-left:-15%;margin-top:15%;border-radius: 20px;">
            <div class="modal-header">
                <div style="    width: 75px; height: 75px; border-radius: 50%; display: flex; align-items: center; justify-content: center; position: absolute; top: -18px; background-color: white; color: #4cae4c; left: 48%;">
                    <img src="GSS/views/backend/images/logo.png" style="width:60px; height:60px;" />
                </div>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form>
                    <div id='multi_rfq_panel'>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="box box-primary hideme" style="height: 322px; box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;">
                                    <div class="box-header with-border">
                                        Assigning multiple Purchase Request Number
                                    </div>
                                    <div class="box-body">
                                        <div class="col-lg-6">
                                            <!-- Color Picker -->
                                            <div class="form-group">
                                                <label><input class="report_type" id="monthly" type="checkbox"> Monthly </label>
                                                <label><input class="report_type" id="quarterly" type="checkbox"> Quarterly </label>
                                            </div>
                                            <div id="quarterlyReport">
                                                <div class="form-group">
                                                    <label>Select Month:</label>
                                                    <select id="monthSelect" class="form-control">
                                                        <option value="">Select a month</option>
                                                    </select>
                                                </div>
                                                <div class="form-group">
                                                    <label>Select Year:</label>
                                                    <select class="form-control form-control" data-placeholder="-- Select  --" required="1" style="width:100%;" id="year">
                                                        <option disabled="" selected="">-- Please select --</option>
                                                        <option value="2023">2023</option>
                                                        <option value="2022">2022</option>
                                                        <option value="2021">2021</option>
                                                        <option value="2020">2020</option>
                                                        <option value="2019">2019</option>


                                                    </select>
                                                </div>
                                                <!-- /.form group -->

                                                <!-- Color Picker -->
                                                <div class="form-group">
                                                    <label>Type of Report:</label>

                                                    <div class="form-group">
                                                        <select class="form-control form-control" data-placeholder="-- Select  --" required="1" style="width:100%;" id="report_type">
                                                            <option disabled="" selected="">-- Please select --</option>
                                                            <option value="PML" data-img="pmlcode.png">PML</option>
                                                            <option value="PSL" data-img="pslcode.png">PSL</option>
                                                            <option value="CSS" data-img="css_doccode.png">CSS Data Sheet</option>
                                                            <option value="CSR" data-img="css_doccode.png">Client Satisfaction Report </option>

                                                        </select>
                                                        <input type="hidden" name="hidden-mode[]" value="">
                                                    </div>
                                                    <!-- /.input group -->
                                                </div>
                                            </div>

                                            <!-- /.form group -->

                                            <!-- time Picker -->

                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label>Document Code:</label>
                                                <img id="document_code" src="images/pmlcode.png" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <button type="button" class="btn btn-success" style="width: 100%;" id="btn-export-report">Export</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<script>
    $(document).on('click', '#btn-export-report', function() {
        let covered_period = $('#monthSelect').val();
        let year = $('#year').val();
        let report_type = $('#report_type').val();


        switch (report_type) {
            case 'PML':
                if ($covered_period > 4) {
                    window.location = 'FM-QP-DILG-ISTMS-RO-17-02 _ICT_TA.php?month=' + covered_period + '&year=' + year + '&report_type=' + report_type + "'";
                }else{
                window.location = 'FM-QP-DILG-ISTMS-RO-17-02 _ICT_TA.php?quarter=' + covered_period + '&year=' + year + '&report_type=' + report_type + "'";

                }
                break;
            case 'PSL':
                window.location = 'FM-QP-DILG-ISTMS-RO-17-03_ICT_TA.php?quarter=' + covered_period + '&year=' + year + '&report_type=' + report_type + "'";
                break;
            case 'CSS':
                window.location = 'cssDataSheet.php?month=' + covered_period + '&year=' + year + '&report_type=' + report_type + "'";
                break;
            case 'CSR':
                window.location = 'ClientSatisFactionReport.php?month=' + covered_period + '&year=' + year + '&report_type=' + report_type + "'";
                break;
            default:
                break;
        }
    })
    $(document).on('change', '#report_type', function() {
        $("#document_code").attr("src", 'images/' + $(":selected", this).data('img'));
    })
    $(document).ready(function() {
        $('.report_type').click(function() {
            $('.report_type').not(this).prop("checked", false);
        });
    })
    $(document).on('change', '#monthly, #quarterly', function() {
        if ($('#monthly').is(":checked")) {
            appendMonths();
        } else {
            appendQuarter();
        }
    });

    function appendMonths() {
        var options = '';
        for (var i = 1; i <= 12; i++) {
            options += '<option value="' + i + '">' + getMonthName(i) + '</option>';
        }
        $('#monthSelect').empty().append(options);
    }

    function appendQuarter() {
        var options = '';
        for (var i = 1; i <= 4; i++) {
            options += '<option value="' + i + '">' + getQuarter(i) + '</option>';
        }
        $('#monthSelect').empty().append(options);

    }

    function getMonthName(month) {
        var names = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        return names[month - 1];
    }

    function getQuarter(quarter) {
        var q = ['1st Quarter', '2nd Quarter', '3rd Quarter', '4th Quarter'];
        return q[quarter - 1];
    }
</script>