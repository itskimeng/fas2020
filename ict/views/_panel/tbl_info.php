
<div class="box box-primary box-solid dropbox">
        <div class="box-header with-border" style="background-color: #585f62;" style="background-color: #585f62;">
            <h1 class="box-title">&nbsp;</h1>


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
                        <table border="1" style="width:100%;">
                            <tbody>
                                <tr>
                                    <td class="table-text"><span style="color:red;">*</span>Date</td>
                                    <td style="width:15%;padding:5px 5px 5px 5px;">
                                        <input class="form-control" readonly value="<?= date('F, d, Y'); ?>" name="request_date" />
                                    </td>
                                    <td class="table-text"><span style="color:red;">*</span>Time</td>
                                    <td style="width:15%;  padding:5px 5px 5px 5px;">
                                        <input class="form-control" readonly value="<?= date('h:m:s A'); ?>" name="request_time" />
                                    </td>
                                    <td colspan=4 class="table-label" style="text-align:center">HARDWARE INFORMATION (if needed)</td>
                                </tr>
                                <tr>
                                    <td style="width:15%;" class="table-text"><span style="color:red;">*</span>Requested By:</td>
                                    <td colspan=3 style="width:15%;padding:5px 5px 5px 5px;">
                                        <input required type="hidden" name="requested_by" value="<?= $user_info['EMP_N'] ?>" />
                                        <input readonly type="text" class="form-control" value="<?php echo $user_info['FIRST_M'] . ' ' . $user_info['MIDDLE_M'][0] . '. ' . $user_info['LAST_M'] . ' '; ?>">
                                    </td>

                                    <!-- date("H:i A",strtotime(date("h:m A"))) -->
                                    <td colspan=2 class="table-text" style="text-align:left">Equipment Type:</td>
                                    <td colspan=2 class="label-text" style="text-align:left">
                                        <input style="width:100%;" type="text" name="equipment_type" class="form-control" />

                                    </td>
                                </tr>
                                <tr>
                                    <td style="width:15%;" class="table-text"><span style="color:red;">*</span>Office/Service/Bureau/Section/Division/Unit:</td>
                                    <td colspan=3 style="width:15%;padding:5px 5px 5px 5px;">
                                        <input class="form-control" readonly id="office" placeholder="Office" type="text" name="office" class="sizeMax alphanum subtxt" value="<?php echo $user_info['DIVISION_M']; ?>" />
                                    </td>

                                    </td>

                                    <!-- date("H:i A",strtotime(date("h:m A"))) -->
                                    <td class="table-text" colspan=2 class="label-text" style="text-align:left">Brand/Model:</td>
                                    <td colspan=2 class="label-text" style="text-align:left">
                                        <input type="text" name="brand_model" class="form-control" value="" />
                                    </td>

                                    </td>
                                </tr>
                                <tr>
                                    <td class="table-text" style="width:15%;" class="label-text left-text">Contact Number:</td>
                                    <td colspan=3 style="width:15%;padding:5px 5px 5px 5px;">
                                        <input readonly id="phone" placeholder="Contact Number" type="text" name="contact_no" class="form-control" value="<?= $user_info['MOBILEPHONE']; ?>" />
                                    </td>

                                    </td>

                                    <!-- date("H:i A",strtotime(date("h:m A"))) -->
                                    <td class="table-text" colspan=2 class="label-text" style="text-align:left">Property No.:</td>
                                    <td colspan=2 class="label-text" style="text-align:left">
                                        <input type="text" name="property_no" class="form-control" value="" />
                                    </td>

                                    </td>
                                </tr>
                                <tr>
                                    <td colspan=4 style="width:15%;padding:5px 5px 5px 5px;">

                                    </td>

                                    <!-- date("H:i A",strtotime(date("h:m A"))) -->
                                    <td colspan=2 class="table-text" style="text-align:left">Equipment SN:</td>
                                    <td colspan=2 class="label-text" style="text-align:left">
                                        <input type="text" name="serial_no" class="form-control" />
                                    </td>

                                    </td>
                                </tr>

                            </tbody>
                        </table>

                    </div>
                </div>
                </a>
            </div>
        </div>
    </div>