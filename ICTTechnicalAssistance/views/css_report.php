<style>
    .quarter-label {
        margin-right: 10px;
    }

    .main {
        margin-top: 10px;
    }

    .card {
        border: 1px solid #ccc;
        border-radius: 5px;
        padding: 10px;
        background-color: black;
        box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
    }

    .small-box {
        margin-bottom: 4px !important;
    }

    /*CSS*/
    * {
        box-sizing: border-box;
    }

    .tab {
        float: left;
        width: 100%;
    }

    /* Style the buttons that are used to open the tab content */
    .tab button {
        display: block;
        background-color: inherit;
        color: black;
        padding: 2rem;
        width: 100%;
        border: none;
        outline: none;
        cursor: pointer;
        transition: 0.3s;
        text-align: left;
    }

    .tablinks.active {
        background-color: #243866 !important;
        color: #fff;
        border-radius: 5px;

    }

    .tabcontent {
        float: left;
        padding: 0px 12px;
        width: 100%;
        border-left: none;
        height: 100%;
        display: none;
        text-align: center;
    }

    table {
        font-size: 15pt;
    }

    .td-style {
        width: 20%;
        text-align: left;

    }

    .grid-container {
        display: grid;
        grid-template-columns: repeat(7, 1fr);
        gap: 10px;
        border: 1px solid #ccc;
        padding: 10px;
        color: black;
    }

    .grid-client {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        gap: 10px;
        border: 1px solid #ccc;
        padding: 10px;
        color: black;
    }

    .grid-item {
        padding: 10px;
    }
</style>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Client Satisfaction Report</h1>

        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">RICTU</a></li>
            <li class="active">Client Satisfaction Report</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <?php //include('_panel/box.html.php'); 
            ?>
        </div>
        <div class="row">
            <div class="col-md-4">
                <?php //include('tiles/ict_status.html.php');
                ?>
            </div>
            <div class="col-md-4">
                <?php //include('tiles/ict_frequent_issues.html.php');
                ?>

            </div>
            <div class="col-md-4">

            </div>

            <div class="col-md-12">
                <div class="col-lg-12">
                    <div class="box box-primary dropbox">

                        <div class="box-body custom-box-body">
                            <button id="btn_create" class="btn-lg  btn-default" style="background:linear-gradient(90deg,#64B5F6,#0D47A1);color:black;"><i class="fa fa-arrow-circle-left"> </i>Back</button>


                        </div>
                    </div>

                </div>

                <div class="col-lg-3 col-md-3 col-sm-3 main">
                    <div class="box box-primary dropbox">
                        <div class="box-body custom-box-body">


                            <select class="form-control select2" id="cform-month">
                                <?php
                                for ($month = 1; $month <= 12; $month++) {
                                    $monthName = date("F", mktime(0, 0, 0, $month, 1));
                                    echo '<option value="' . $month . '">' . $monthName . '</option>';
                                }
                                ?>
                            </select><br>


                            <input type="radio" id="first_quarter" name="quarter" value="1">
                            <label class="quarter-label" for="first_quarter">1st Quarter</label><br>

                            <input type="radio" id="second_quarter" name="quarter" value="2">
                            <label class="quarter-label" for="second_quarter">2nd Quarter</label><br>

                            <input type="radio" id="third_quarter" name="quarter" value="3">
                            <label class="quarter-label" for="third_quarter">3rd Quarter</label><br>

                            <input type="radio" id="fourth_quarter" name="quarter" value="4">
                            <label class="quarter-label" for="fourth_quarter">4th Quarter</label><br>



                        </div>
                    </div>
                    <div class="box box-primary dropbox">
                        <div class="box-body custom-box-body" style="height:300px;overflow:auto;">
                            <div class="tab">
                                <button class="tablinks" onclick="JavaScript:selectTab('tab1');">
                                    PART I. CLIENT DEMOGRAPHIC
                                </button>
                                <button class="tablinks" onclick="JavaScript:selectTab('tab2');">
                                    PART II. CITIZEN'S CHARTER (CC) QUESTION
                                </button>
                                <button class="tablinks" onclick="JavaScript:selectTab('tab3');">
                                    PART III. SERVICE QUALITY DIMENSION (SQD) RATINGS
                                </button><br>
                               



                            </div>


                        </div>
                    </div>



                </div>
                <div class="col-lg-9 col-md-9 col-sm-9 main">
                    <div class="box box-primary dropbox">
                        <div class="box-body custom-box-body">
                            <div id="tab1" class="tabcontent" style="display:block;">
                                <div class="box box-solid dropbox">
                                    <div class="box-header" style="background:linear-gradient(90deg,#90CAF9,#0D47A1);color:#fff;">
                                        <h3 class="box-title "> Respondents per Client Type </h3>
                                    </div>
                                    <div class="box-body" id="client_type_panel">
                                        <div class="grid-client">

                                            <div class="grid-item">
                                                <h3 style="font-size:50pt;color:black;"><b>0</b></h3>
                                                <p>Citizen</p>
                                            </div>
                                            <div class="grid-item">
                                                <h3 style="font-size:50pt;color:black;"><b>0</b></h3>
                                                <p>Business</p>
                                            </div>
                                            <div class="grid-item">
                                                <h3 style="font-size:50pt;color:black;"><b>0</b></h3>
                                                <p>Government</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="box box-solid dropbox">
                                    <div class="box-header" style="background:linear-gradient(90deg,#90CAF9,#0D47A1);color:#fff;">
                                        <h3 class="box-title"> Respondents per Age </h3>

                                    </div>
                                    <div class="box-body">

                                        <table class="table table-bordered" style="font-size:10pt;">

                                            <tbody id="age_panel">





                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="box box-solid dropbox">
                                    <div class="box-header" style="background:linear-gradient(90deg,#90CAF9,#0D47A1);color:#fff;">
                                        <h3 class="box-title"> Respondents per Gender </h3>

                                    </div>
                                    <div class="box-body">

                                        <table class="table table-bordered" style="font-size:10pt;">

                                            <tbody id="gender_panel">

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                            <div id="tab2" class="tabcontent">

                                <div role="tabpanel" class="tab-pane active" id="Ideate">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th rowspan="2" class="header_pink" style="vertical-align: middle;text-align:center;font-weight:20pt;font-weight:bold;">Online Clients</th>
                                                <th rowspan="2" class="header_pink" style="vertical-align: middle;text-align:center;font-weight:20pt;font-weight:bold;">Total No. of Respondents</th>
                                            </tr>
                                        </thead>
                                        <tbody id="list_body">

                                        </tbody>
                                    </table>
                                </div>

                            </div>
                            <div id="tab3" class="tabcontent">
                                <table class="table table-bordered" style="font-size:10pt;">
                                    <thead style="background-color:#ECEFF1;">
                                        <tr>
                                            <th rowspan="4" width="15%" class="header_pink" style="vertical-align: middle;text-align:center;">Service Quality Dimension</th>
                                            <th rowspan="3" colspan="5" class="header_pink" style="vertical-align: middle;text-align:center;">Number of Responses</th>
                                        <tr>
                                        </tr>
                                        <tr>
                                            <th rowspan="4" width="15%" class="header_pink" style="vertical-align: middle;text-align:center;">Total Count of Desired Response2</th>
                                            <th rowspan="4" width="15%" class="header_pink" style="vertical-align: middle;text-align:center;">Percentage of Desired Response2</th>
                                        </tr>


                                        <th rowspan="2">Strongly Disagree</th>
                                        <th rowspan="2">Disagree</th>
                                        <th rowspan="2">Neither Agree Nor Disagree</th>
                                        <th rowspan="2">Agree</th>
                                        <th rowspan="2">Strongly Agree</th>
                                        </tr>



                                    </thead>
                                    <tbody id="sqd_body">

                                    </tbody>
                                </table>
                                <table class="table table-bordered" style="font-size:10pt;" border="1" style="width:100%;">
                                    <tr>
                                        <td style='background-color:#ECEFF1;width:50%;font-size:10pt; text-align: center; vertical-align: middle;font-weight:bolder;'>Number of Respondents with Desired Response2 for All SQDs (1-8)</td>
                                        <td style='background-color:#ECEFF1;width:50%;font-size:10pt; text-align: center; vertical-align: middle;font-weight:bolder;'>Percentage</td>
                                    </tr>
                                    <tr>
                                        <td id="td_desire" style='font-size:20pt; text-align: center; vertical-align: middle;font-weight:bolder;'>a</td>
                                        <td id="td_percentage" style='font-size:20pt; text-align: center; vertical-align: middle;font-weight:bolder;'>a</td>
                                    </tr>

                                </table>


                            </div>
                            
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>
<script>
    $('#cform-month').on('change', function() {
        let sel_month = $('#cform-month').val();

        let path = 'ICTTechnicalAssistance/route/get_clientCCQuestions.php';
        let data = {
            month: $(this).val()
        };
        $('#list_body').empty();
        $.post({
            url: path,
            data: {
                month: $(this).val()
            },
            success: function(result) {
                var data = jQuery.parseJSON(result);
                generateCCTable(data);
            }
        })
        ///////////////////////////////////////////////////////////////////
        fetchRespondentperAge(sel_month);
        fetchRespondentperGender(sel_month);
        showSQDData(sel_month);
        showTotalDesire(sel_month);
        fetchRespondentperClientType(sel_month);
        //showClientDemographicData(sel_month);

    })
    $(document).ready(function() {
        fetchRespondentperAge(9);
        fetchRespondentperGender(9);
        fetchRespondentperClientType(9)

        // Click event handler for all quarter radio buttons
        $('[name="quarter"]').click(function() {
            let path = 'ICTTechnicalAssistance/route/get_SQD.php';
            let cssdata = {
                quarter: $(this).val()
            };
            $('#sqd_body').empty();
            // fetch all data
            $.post({
                url: path,
                data: cssdata,
                success: function(result) {
                    var data = jQuery.parseJSON(result);
                    var array = $.map(jQuery.parseJSON(result), function(value, index) {
                        return [value];
                    });
                    populateTable(array);
                    $('#sqd_body').append(data);
                }
            })
            //fetch total desire
            $.post({
                url: 'ICTTechnicalAssistance/route/get_TotalDesire.php',
                data: cssdata,
                success: function(result) {
                    let data = jQuery.parseJSON(result);
                    let total_desire = 0;
                    let total_respondent = 0;
                    let res = 0;

                    total_desire = parseInt(data[0].total_desire_repondent);
                    total_respondent = parseInt(data[1].total_respondents);
                    res = Math.round(total_desire / total_respondent * 100);
                    $('#td_desire').text(total_desire);
                    $('#td_percentage').text(res + "%");
                }
            });
        });
    });
    //PART 1
    function showClientDemographicData(sel_month) {
        let path = 'ICTTechnicalAssistance/route/getCDemoData.php';
        $.post({
            url: path,
            data: {
                month: sel_month,
            },
            success: function(result) {
                let data = jQuery.parseJSON(result);

                let citizen = parseInt(data[0].citizen);
                let business = parseInt(data[0].business);
                let government = parseInt(data[0].government);

                $('#citizen-data').text(citizen);
                $('#business-data').text(business);
                $('#government-data').text(government);
            }
        });
    }

    $('.tablinks').on('click', function() {
        $('.tablinks').removeClass('active');
        $(this).addClass('active');
    });
    function fetchRespondentperClientType(sel_month)
    {
        let path = 'ICTTechnicalAssistance/route/fetchRespondentPerClientType.php';

        $('#client_type_panel').empty();
        $.post({
            url: path,
            data: {
                month: sel_month
            },
            success: function(result) {
                var data = jQuery.parseJSON(result);
                var array = $.map(jQuery.parseJSON(result), function(value, index) {
                    return [value];
                });
                let row = '';
                $.each(data, function(key, item) {
                    row += '<div class="grid-item">';
                    row += '<h3 style="font-size:50pt;color:black;"><b>0</b></h3>';
                    row += '<p>Citizen</p>';
                    row += '</div>';
                    row += '<div class="grid-item">';
                    row += '<h3 style="font-size:50pt;color:black;"><b>0</b></h3>';
                    row += '<p>Business</p>';
                    row += '</div>';
                    row += '<div class="grid-item">';
                    row += '<h3 style="font-size:50pt;color:black;"><b>'+item.count+'</b></h3>';
                    row += '<p>Government</p>';
                    row += '</div>';
                })
                $('#client_type_panel').append(row)


            }
        })
    }
    function fetchRespondentperAge(sel_month) {
        let path = 'ICTTechnicalAssistance/route/fetchRespondentPerAge.php';

        $('#age_panel').empty();
        $.post({
            url: path,
            data: {
                month: sel_month
            },
            success: function(result) {
                var data = jQuery.parseJSON(result);
                var array = $.map(jQuery.parseJSON(result), function(value, index) {
                    return [value];
                });
                let row = '';
                $.each(data, function(key, item) {
                    row += '<tr style="color:black;font-size:30pt;">';
                    row += '<td style="text-align: center; vertical-align: middle;"><b>' + item.agebracket + '</b></td>';
                    row += '<td style="font-size:20pt; text-align: center; vertical-align: middle;"><b>' + item.count + '</b></td>';
                    row += '</tr>';
                    row += '</tr>';
                })
                $('#age_panel').append(row)


            }
        })
    }

    function fetchRespondentperGender(sel_month) {
        let path = 'ICTTechnicalAssistance/route/fetchRespondentPerGender.php';

        $('#gender_panel').empty();
        $.post({
            url: path,
            data: {
                month: sel_month
            },
            success: function(result) {
                var data = jQuery.parseJSON(result);
                var array = $.map(jQuery.parseJSON(result), function(value, index) {
                    return [value];
                });
                let row = '';
                $.each(data, function(key, item) {
                    row += '<tr style="color:black;font-size:30pt;">';
                    row += '<td style="text-align: center; vertical-align: middle;"><b>' + item.gender + '</b></td>';
                    row += '<td style="font-size:20pt; text-align: center; vertical-align: middle;"><b>' + item.count + '</b></td>';
                    row += '</tr>';
                    row += '</tr>';
                })
                $('#gender_panel').append(row)


            }
        })
    }

    function selectTab(tabIndex) {
        let sel_month = $('#cform-month').val();

        // Declare all variables
        var i, tabcontent;

        // Get all elements with class="tabcontent" and hide them
        tabcontent = document.getElementsByClassName("tabcontent");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }
        //Show the Selected Tab
        document.getElementById(tabIndex).style.
        display = "block";
        if (tabIndex == 'tab2') {
            showStatData(sel_month);
        } else if (tabIndex == 'tab3') {
            showSQDData(sel_month);
            showTotalDesire(sel_month);
        }


    }

    function showTotalDesire(sel_month) {
        let path = 'ICTTechnicalAssistance/route/get_TotalDesire.php';
        $.post({
            url: path,
            data: {
                month: sel_month
            },
            success: function(result) {
                let data = jQuery.parseJSON(result);
                let total_desire = 0;
                let total_respondent = 0;
                let res = 0;

                total_desire = parseInt(data[0].total_desire_repondent);
                total_respondent = parseInt(data[1].total_respondents);
                res = Math.round(total_desire / total_respondent * 100);
                $('#td_desire').text(total_desire);
                $('#td_percentage').text(res + "%");
            }
        });
    }

    function showStatData(sel_month) {
        let path = 'ICTTechnicalAssistance/route/get_clientCCQuestions.php';

        $('#list_body').empty();
        $.post({
            url: path,
            data: {
                month: sel_month
            },
            success: function(result) {
                var data = jQuery.parseJSON(result);

                generateCCTable(data);
            }
        })
    }

    function showSQDData(sel_month) {
        let path = 'ICTTechnicalAssistance/route/get_SQD.php';

        $('#sqd_body').empty();
        $.post({
            url: path,
            data: {
                month: sel_month
            },
            success: function(result) {
                var data = jQuery.parseJSON(result);
                var array = $.map(jQuery.parseJSON(result), function(value, index) {
                    return [value];
                });
                populateTable(array);
                $('#sqd_body').append(data);
            }
        })
    }

    function generateCCTable(data) {
        let row = '';
        items = [
            'CC1-1. Yes, aware before my transaction with this office.',
            'CC1-2. Yes, but aware only when I saw the CC of this office.',
            'CC1-3. No, not aware of the CC.',
            'CC2-1. Yes, the CC was easy to find.',
            'CC2-2. Yes, but the CC was hard to find.',
            'CC2-3. No, I did not see this office’s CC.',
            'CC3-1. Yes, I was able to use the CC.',
            'CC3-2. No, I was not able to use the CC.'
        ];

        $.each(data, function(key, item) {
            row += '<tr style="font-size:15pt; text-align:left; vertical-align: middle;">';
            row += '<td>' + items[key] + '</td>';
            row += '<td style="text-align:center;">' + item.data + '</td>';
            row += '</tr>';
        });
        $('#list_body').append(row)
    }

    function populateTable(numbersArray) {
        let sqd_items = [
            'Overall Satisfaction (SQD0)',
            'Responsiveness (SQD1)',
            'Reliability (SQD2)',
            'Access and Facilities (SQD3)',
            'Communication (SQD4)',
            'Costs (SQD5)',
            'Integrity (SQD6)',
            'Assurance (SQD7)',
            'Outcome (SQD8)',
        ];

        var table = $('#sqd_body');
        var row = $("<tr>");
        var colIndex = 0;

        // Add the SQD item to the first cell of the first row
        var sqdCell = $("<td style='font-size:10pt; text-align: center; vertical-align: middle;font-weight:bolder;'>").text(sqd_items[0]);
        row.append(sqdCell);

        $.each(numbersArray, function(index, number) {

            // Create a new row every 5 numbers in column

            if (index % 5 == 0 && index != 0) {
                // Add an empty cell to the end of the row
                var emptyCell = $("<td style='background-color:#1B5E20;color:#fff;font-size:20pt; text-align: center; vertical-align: middle;font-weight:bolder;'>");
                row.append(emptyCell);

                var emptyCell1 = $("<td style='background-color:#880E4F;color:#fff;font-size:20pt; text-align: center; vertical-align: middle;font-weight:bolder;'>");
                row.append(emptyCell1);


                // Get the sum of the last two cells and set it to the empty cell
                var col0Cells = row.children('.col-0');
                var col1Cells = row.children('.col-1');
                var col2Cells = row.children('.col-2');
                var col3Cells = row.children('.col-3');
                var col4Cells = row.children('.col-4');
                var sum = 0;
                var result = 0;
                var total_res = 0;
                col0Cells.each(function() {
                    var num = parseInt($(this).text());
                    if (!isNaN(num)) {
                        result += num;
                    }
                });
                col1Cells.each(function() {
                    var num = parseInt($(this).text());
                    if (!isNaN(num)) {
                        result += num;
                    }
                });
                col2Cells.each(function() {
                    var num = parseInt($(this).text());
                    if (!isNaN(num)) {
                        result += num;
                    }
                });
                col3Cells.each(function() {
                    var num = parseInt($(this).text());
                    if (!isNaN(num)) {
                        sum += num;
                    }
                });
                col4Cells.each(function() {
                    var num = parseInt($(this).text());
                    if (!isNaN(num)) {
                        sum += num;
                    }
                });

                total_res = sum + result;
                emptyCell1.text(Math.round(sum / total_res * 100) + "%");
                emptyCell.text(sum);
                // Append the row to the table and create a new one
                table.append(row);
                row = $("<tr>");
                colIndex = 0;

                // Add the next SQD item to the first cell of the new row
                sqdCell = $("<td style='font-size:10pt; text-align: center; vertical-align: middle;font-weight:bolder;'>").text(sqd_items[(index / 5)]);

                row.append(sqdCell);
            }

            // Create a new cell in the column and add the number

            var cell = $("<td style='font-size:20pt; text-align: center; vertical-align: middle;font-weight:bolder;'>").text(numbersArray[index].count_sd_entry);
            cell.addClass("col-" + colIndex);
            row.append(cell);


            colIndex++;

        });

        var sqd8Row = $("<tr>");
        var sqd8Cell = $("<td style='font-size:10pt;color:#fff; text-align: center; vertical-align: middle;font-weight:bolder;'>").text(sqd_items[8]);
        sqd8Row.append(sqd8Cell);

        // Calculate and add the total for SQD8
        var sqd8Total = 0;
        var sqd8Index = 40;
        colIndex = 0;
        let sum = 0;
        let num = 0;
        let res = 0;
        let result = 0;
        let total_res = 0;


        $.each(numbersArray, function(index, number) {

            if (number.dimension == 'SQD8') {
                var sqd8TotalCell = $("<td style='font-size:20pt; text-align: center; vertical-align: middle;font-weight:bolder;'>").text(numbersArray[sqd8Index++].count_sd_entry);
                sqd8TotalCell.addClass("col-" + colIndex);
                sqd8Row.append(sqd8TotalCell);
                colIndex++;
            }



        });
        // console.log(Math.round(sum / total_res * 100) + "%");
        total_res = sum + res;

        var col0Cells = row.children('.col-0');
        var col1Cells = row.children('.col-1');
        var col2Cells = row.children('.col-2');
        var col3Cells = row.children('.col-3');
        var col4Cells = row.children('.col-4');
        col0Cells.each(function() {
            num = parseInt($(this).text());
            if (!isNaN(num)) {
                result += num;
            }
        });
        col1Cells.each(function() {
            num = parseInt($(this).text());
            if (!isNaN(num)) {
                result += num;
            }
        });
        col2Cells.each(function() {
            num = parseInt($(this).text());
            if (!isNaN(num)) {
                result += num;
            }
        });
        col3Cells.each(function() {
            num = parseInt($(this).text());
            if (!isNaN(num)) {
                sum += num;
            }
        });
        col4Cells.each(function() {
            num = parseInt($(this).text());
            if (!isNaN(num)) {
                sum += num;
            }
        });
        total_res = sum + result;


        var sqd8TotalResponse = $("<td style='background-color:#1B5E20;color:black;font-size:20pt; text-align: center; vertical-align: middle;font-weight:bolder;'>").text(sum);
        sqd8Row.append(sqd8TotalResponse);
        var sqd8PercentageDesire = $("<td style='background-color:#880E4F;color:black;font-size:20pt; text-align: center; vertical-align: middle;font-weight:bolder;'>").text(Math.round(sum / total_res * 100) + "%");
        sqd8Row.append(sqd8PercentageDesire);

        // Add the SQD8 row to the table
        table.append(sqd8Row);

    }
</script>