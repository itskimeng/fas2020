<style>


    /* common */
    .ribbon {
        width: 150px;
        height: 150px;
        overflow: hidden;
        position: absolute;
    }

    .ribbon::before,
    .ribbon::after {
        position: absolute;
        z-index: -1;
        content: '';
        display: block;
        border: 5px solid #2980b9;
    }

    .ribbon span {
        position: absolute;
        display: block;
        width: 225px;
        padding: 15px 0;
        background-color: #3498db;
        box-shadow: 0 5px 10px rgba(0, 0, 0, .1);
        color: #fff;
        font: 700 18px/1 'Lato', sans-serif;
        text-shadow: 0 1px 1px rgba(0, 0, 0, .2);
        text-transform: uppercase;
        text-align: center;
    }


    /* top right*/
    .ribbon-top-right {
        top: -10px;
        right: -10px;
    }

    .ribbon-top-right::before,
    .ribbon-top-right::after {
        border-top-color: transparent;
        border-right-color: transparent;
    }

    .ribbon-top-right::before {
        top: 0;
        left: 0;
    }

    .ribbon-top-right::after {
        bottom: 0;
        right: 0;
    }

    .ribbon-top-right span {
        left: -25px;
        top: 30px;
        transform: rotate(45deg);
    }
</style>
<div class="modal fade" id="viewPanel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="width: 50%;">
        <div class="modal-content view-body">
            <div class="ribbon ribbon-top-right"><span class="status"></span></div>

            <div class="modal-header" style="padding: 1rem;">
                <h3 class="modal-title text-light" id="exampleModalLabel">ORS: Viewing ORS Data</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
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
                                                    <label>ORS Serial Number</label>
                                                    <input type=" text" value="" class="form-control ors" style="height: 35px;" id="" placeholder="Enter ORS Number" name="ors" value="" disabled>
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