<style>

</style>
<?php 

?>
<div class="content-wrapper">
    <section class="content-header">
        <h1>Vehicle Request Form</h1>

        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">RICTU</a></li>
            <li class="active">Vehicle Request Form</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <?php //include('_panel/box.html.php'); 
            ?>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <button class="btn btn-success"><a href="base_vehicleReq.html.php">Back</a></button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary dropbox">
                    <div class="box-header">
                        <h3 class="box-title">A. To be accomplished by requisitioner</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <?= group_text("Purpose",'txt_purpose', $value = '', $disabled = '', $label_size = 1, $readonly = false, "form-control", $type = 'text', $required = true)?>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Passenger</label><br>
                                            <input type="text" class="form-control" name="cform-date-received" required="" style="height: 55px;">
                                        </div>


                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Destinations</label><br>
                                            <textarea class="form-control" name="cform-client_type">

                                           </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Itenerary:</label><br>
                                            <textarea class="form-control" name="cform-client_type">

                                        </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Date:</label><br>
                                            <input type="text" class="form-control" name="cform-date-received" required="" style="height: 55px;">
                                        </div>


                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Time</label><br>
                                            <textarea class="form-control" name="cform-client_type">

                                           </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Contact Person:</label><br>
                                            <input type="text" class="form-control" name="cform-date-received" required="" style="height: 55px;">

                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Contact Number:</label><br>
                                            <input type="text" class="form-control" name="cform-date-received" required="" style="height: 55px;">

                                        </div>
                                    </div>
                                    <div class="col-md-4">


                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Requisitioner:</label><br>
                                            <textarea class="form-control" name="cform-client_type">

                                           </textarea>
                                        </div>
                                        <div class="form-group">
                                            <label class="control-label">Position/Office:</label><br>
                                            <textarea class="form-control" name="cform-client_type">

                                           </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
        <div class="row">

            <div class="col-md-12">
                <div class="box box-primary dropbox">
                    <div class="box-header">
                        <h3 class="box-title">A. To be accomplished by dispatcher</h3>
                    </div>
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Vehicle:</label><br>
                                            <textarea class="form-control" name="cform-client_type">

                                        </textarea><br>
                                            <textarea class="form-control" name="cform-client_type">

                                        </textarea><br>
                                            <textarea class="form-control" name="cform-client_type">

                                        </textarea>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Driver(s)</label><br>
                                            <input type="text" class="form-control" name="cform-date-received" required="" style="height: 55px;"><br>
                                            <input type="text" class="form-control" name="cform-date-received" required="" style="height: 55px;"><br>
                                            <input type="text" class="form-control" name="cform-date-received" required="" style="height: 55px;">
                                        </div>


                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label class="control-label">Plate Number</label><br>
                                            <textarea class="form-control" name="cform-client_type">

                                           </textarea><br>
                                            <textarea class="form-control" name="cform-client_type">

                                        </textarea><br>
                                            <textarea class="form-control" name="cform-client_type">

                                        </textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </section>
</div>