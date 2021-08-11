<div class="card">
    <div class="box-header with-border">      
            <div class="class-bordered well">
                <div class="row">
                    <div class="col-md-6">
                        <label>ORS Serial Number</label>
                        <input type=" text" class="form-control" style="height: 35px;" id="" placeholder="Enter ORS Number" name="ors" value="333333">
                        <label>PO NO.</label>
                        <input type=" text" class="typeahead form-control" style="height: 35px;" id="ponum" placeholder="Search PO Number" name="ponum" value="2020-003">
                    </div>

                    <div class="col-md-6">
                        <label>Date Received</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="datepicker1" placeholder='Enter Date' name="datereceived" value="08/11/2021" required>
                        </div>

                        <label>Date Processed</label>
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="datepicker2" placeholder='Enter Date' name="datereprocessed" value="08/11/2021" required>
                        </div>
                    </div>
                </div>
            </div>

            <div class="class well">
                <!-- ORS -->
                <div class="row">
                    <div class="col-md-6">
                        <label>Payee/Supplier</label>
                        <input type="text" class="form-control" style="height: 35px;" id="payee" placeholder="Payee" name="payee" value="aaaaaaaaa">
                    
                        <label>Particular/Purpose</label>
                        <input type="text" readonly class="form-control" style="height: 35px;" id="particular" placeholder="Particular" name="particular" value=" Maintenance of ICT Resources in the Regional Office for FY 2020  ">

                    </div>


            
                    <div class="col-md-6">
                        <label>Date Returned</label>
                        
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="datepicker3" placeholder='Enter Date' name="datereturned" value="">
                        </div>
                        

                        <label>Date Released</label>
                        
                        <div class="input-group date">
                            <div class="input-group-addon">
                                <i class="fa fa-calendar"></i>
                            </div>
                            <input type="text" class="form-control pull-right" id="datepicker4" placeholder='Enter Date' name="datereleased" value="08/11/2021" required>
                            
                        </div>

                    </div>

                </div>

                
       <br>
                <div class="row">
                    <div class="col-md-3">
                        <label>Fund Source</label>
                        <input type="text" class="form-control" style="height: 40px;" id="saronum" placeholder="Fund Source" name="saronum" value="TF-REG" class="typeahead" />
                        <!-- <input type="text" name="txtCountry" id="txtCountry" class="typeahead"/> -->
                        <table class="table table-striped table-hover" id="main1">
                            <tbody id="result1">
                            </tbody>
                        </table>
                    </div>

                   
                    <div class="col-md-3">
                        <label>PPA</label>
                        <input type="text" class="form-control" style="height: 40px;" id="ppa" placeholder="PPA" name="ppa" value="0000000">
                    </div>
                    <div class="col-md-2">
                        <label>UACS Code</label>
                        <input type="text" class="form-control" style="height: 40px;" id="uacs" placeholder="UACS Code" name="uacs" value="5-02-01-010-00">
                    </div>
                    <div class="col-md-2">
                        <label>Amount</label>
                        <input type="text" class="form-control" style="height: 40px;" id="" placeholder="Amount" name="amount" value="22222" readonly>
                    </div>
                    <div class="col-md-2">
                        <label>New Amount</label>
                        <input type="text" class="form-control" style="height: 40px;" id="" placeholder="New Amount" name="newamount" value="" required>
                    </div>
                </div>

                
                
                <!-- END SARO -->
                

            </div>
            <!-- End Menu -->
            <!-- End Panel -->
            <!-- Submit -->
</div>
</div>
