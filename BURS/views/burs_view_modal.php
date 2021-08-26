
<div class="modal fade" id="viewPanel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 50%;">
        <div class="modal-content view-body">
            <div class="ribbon ribbon-top-right"><span class="status"></span></div>

            <div class="modal-header" style="padding: 1rem;">
                <h3 class="modal-title text-light" id="exampleModalLabel">BURS: Viewing ORS Data</h3>
            </div>
            <div class="modal-body  ">
                <br><br>
                <div>
                <div class="row">
                    <div class="col-md-12">
                    
                                <div>
                                    <div class="box-header with-border">
                                        <div class="class-bordered well">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>BURS Serial Number</label>
                                                    <input type=" text" value="" class="form-control burs" style="height: 35px;" id="" placeholder="Enter ORS Number" name="ors" value="" disabled>
                                                    <label>PO NO.</label>
                                                    <input type=" text" class="typeahead form-control ponum" style="height: 35px;" id="" placeholder="Search PO Number" name="ponum" value="" disabled>
                                                </div>

                                                <div class="col-md-6">
                                                    <label>Date Received</label>
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="text" class="form-control pull-right datereceived" id="datepicker1" placeholder='Enter Date' name="datereceived" value="" disabled>
                                                    </div>

                                                    <label>Date Processed</label>
                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="text" class="form-control pull-right datereprocessed" id="datepicker2" placeholder='Enter Date' name="datereprocessed" value="" disabled>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="class well">
                                            <!-- ORS -->
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <label>Payee/Supplier</label>
                                                    <input type="text" class="form-control payee" style="height: 35px;" id="payee" placeholder="Payee" name="payee" value="" disabled>

                                                    <label>Particular/Purpose</label>
                                                    <input type="text" readonly class="form-control particular" style="height: 35px;" id="particular" placeholder="Particular" name="particular" value="" disabled>

                                                </div>



                                                <div class="col-md-6">
                                                    <label>Date Returned</label>

                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="text" class="form-control pull-right datereturned" id="datepicker3" placeholder='Enter Date' name="datereturned" value="" disabled>
                                                    </div>


                                                    <label>Date Released</label>

                                                    <div class="input-group date">
                                                        <div class="input-group-addon">
                                                            <i class="fa fa-calendar"></i>
                                                        </div>
                                                        <input type="text" class="form-control pull-right datereleased" id="datepicker4" placeholder='Enter Date' name="datereleased" value="" disabled>

                                                    </div>

                                                </div>

                                            </div>


                                            <br>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label>Fund Source</label>
                                                    <input type="text" class="form-control saronumber" style="height: 40px;" id="saronum" placeholder="Fund Source" name="saronum" value="" class="typeahead" disabled />
                                                    <!-- <input type="text" name="txtCountry" id="txtCountry" class="typeahead"/> -->
                                                    <table class="table table-striped table-hover" id="main1">
                                                        <tbody id="result1">
                                                        </tbody>
                                                    </table>
                                                </div>


                                                <div class="col-md-3">
                                                    <label>PPA</label>
                                                    <input type="text" class="form-control ppa" style="height: 40px;" id="ppa" placeholder="PPA" name="ppa" value="" disabled>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>UACS Code</label>
                                                    <input type="text" class="form-control uacs" style="height: 40px;" id="uacs" placeholder="UACS Code" name="uacs" value="" disabled>
                                                </div>
                                                <div class="col-md-2">
                                                    <label>Amount</label>
                                                    <input type="text" class="form-control amount" style="height: 40px;" id="" placeholder="Amount" name="amount" value="" readonly>
                                                </div>

                                            </div>



                                            <!-- END SARO -->


                                        </div>
                                        <!-- End Menu -->
                                        <!-- End Panel -->
                                        <!-- Submit -->
                                    </div>
                                </div>
                    </div>
                </div>
                </div
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>