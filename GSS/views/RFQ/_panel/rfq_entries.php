<div class="col-md-12">
    <div class="box box-info dropbox">
        <div class="box-header">
            <h3 class="box-title"><i class="fa fa-info-circle"></i> Information</h3>
            <div class="box-tools">
                <span class="label label-info" style="font-size: 14.5px; background-color: #06313b !important;"></span>
            </div>
        </div>  
        <div class="box-body">
            <div class="row">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-3">
                            <input id="cform-is_admin" class="is_admin" type="hidden" name="is_admin" value="">
                            <input id="cform-source_id" class="source_id" type="hidden" name="source_id" value="">
                            <div id="cgroup-ob_type" class="form-group">
                                <label class=" control-label"> Type:</label><br>
                                <select id="cform-ob_type" name="ob_type" class="form-control select2 ob_type select2-hidden-accessible" data-placeholder="-- Select Obligation Type --" required="1" style="width: 100%;" data-select2-id="cform-ob_type" tabindex="-1" aria-hidden="true">
                                    <option disabled="" selected="" data-select2-id="2">-- Please select Obligation Type --</option>
                                    <option value="burs" data-id="Budget Utilization Request (BURS)" data-value="burs">Budget Utilization Request (BURS)</option>
                                    <option value="ors" data-id="Obligation Request and Status (ORS)" data-value="ors">Obligation Request and Status (ORS)</option>
                                </select><span class="select2 select2-container select2-container--default" dir="ltr" data-select2-id="1" style="width: 100%;"><span class="selection"><span class="select2-selection select2-selection--single" role="combobox" aria-haspopup="true" aria-expanded="false" tabindex="0" aria-labelledby="select2-cform-ob_type-container"><span class="select2-selection__rendered" id="select2-cform-ob_type-container" role="textbox" aria-readonly="true" title="-- Please select Obligation Type --"><span class="select2-selection__clear" title="Remove all items" data-select2-id="3">×</span>-- Please select Obligation Type --</span><span class="select2-selection__arrow" role="presentation"><b role="presentation"></b></span></span></span><span class="dropdown-wrapper" aria-hidden="true"></span></span><input type="hidden" name="hidden-ob_type" value="">
                            </div>
                        </div>
                        <div class="col-md-3">
                        </div>
                        <div class="col-md-3"></div>
                        <div class="col-md-3">
                            <div id="cgroup-date_created" class="form-group"><label class="control-label">Date Created:</label><br><input id="cform-date_created" placeholder="Date Created" type="text" name="date_created" class="form-control date_created" value="03/04/2022" required="" novalidate="" readonly=""></div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-3">
                            <div class="row">
                                
                            </div>


                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <div class="switchToggle"><input type="checkbox" id="cform-dfunds" class="dfunds" name="dfunds"><label for="cform-dfunds">Download of Funds?</label><span>&nbsp; <b>Download of Funds?</b></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-3">
                            <div class="row">
                                <div class="col-md-12">
                                    <div class="form-group">

                                        <label class="control-label">Amount:</label><br>
                                        <div id="cgroup-total_po_amount" class="input-group"><span class="input-group-addon"><strong>₱</strong></span><input id="cform-total_po_amount" placeholder="Amount" type="text" name="total_po_amount" class="form-control amount" value="0.00" "required=" required" "="" novalidate=""></div>					  										  					<input id=" cform-po_amount" class="po_amount" type="hidden" name="po_amount" value=""> </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group"><label>Address:</label><textarea id="cform-address" name="address" class="form-control address" rows="3" placeholder="Address" "required=" required" "=""></textarea></div>		  							
		  						</div>
		  					</div>
		  				</div>

		  				<div class=" col-md-3">
		  					<div class="row">
		  						<div class="col-md-12">
		  							<div class="form-group"><label>Particulars:</label><textarea id="cform-particulars" name="particulars" class="form-control particulars" rows="7" placeholder="Particulars" "required="required" "=""></textarea></div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="cgroup-status" class="form-group"><label class="control-label">Status:</label><br><input id="cform-status" placeholder="Status" type="text" name="status" class="form-control status" value="Draft" required="" novalidate="" readonly=""></div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div id="cgroup-created_by" class="form-group"><label class="control-label">Created By:</label><br><input id="cform-created_by" placeholder="Created By" type="text" name="created_by" class="form-control created_by" value="" required="" novalidate="" readonly=""></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>