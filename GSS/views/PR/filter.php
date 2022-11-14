<div class="row">
            <div class="col-lg-12">
                <div class="panel panel-primary">
                    <div class="panel-heading">
                        <span><i class="fa fa-bar-chart-o fa-fw"></i>Advanced Filtering</span>
                       
                    </div>
                   
                    <div class="box-body box-emp">
                        <div class="row">
                            <div class="col-md-3">
                                <div id="cgroup-filter_year" class="form-group"><label
                                        class=" control-label">Year:</label><br><select id="cform-filter_year"
                                        name="filter_year" class="form-control select2 filter_year"
                                        data-placeholder="-- Select Year --" required="1" style="width:100%;">
                                        <option disabled="" selected="">-- Please select Year --</option>
                                        <option selected="" value="2020" data-id="2020" data-value="0">2020</option>
                                        <option value="2021" data-id="2021" data-value="2021">2021</option>
                                        <option value="2022" data-id="2022" data-value="2022">2022</option>
                                        <option value="2023" data-id="2023" data-value="2023">2023</option>
                                    </select><input type="hidden" name="hidden-filter_year" value=""></div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group"><label
                                        class=" control-label">Quarter:</label><br>
                                        <select id="cform-filter_quarter" name="filter_month" class="form-control select2 filter_month" data-placeholder="-- Select Month --" required="1" style="width:100%;">
                                            <option disabled="" selected="">-- Please select quarter --</option>
                                            <option value="1" data-id="1" data-value="1">1st Quarter</option>
                                            <option value="2" data-id="2" data-value="2">2nd Quarter</option>
                                            <option value="3" data-id="3" data-value="3">3rd Quarter</option>
                                            <option value="4" data-id="4" data-value="4" selected>4th Quarter</option>
                                    </select>
                                    <input type="hidden" name="hidden-filter_month" value=""></div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group"><label
                                        class=" control-label">Office:</label><br>
                                        <select id="cform-filter_office" name="filter_payee" class="form-control select2 filter_payee" data-placeholder="-- Select Payee --" required="1" style="width:100%;">
                                        <option value="1" data-id="1" data-value="1">ORD</option>
                                        <option value="17" data-id="17" data-value="17">LGMED</option>
                                        <option value="18" data-id="18" data-value="18">LGCDD</option>
                                        <option value="10" data-id="10" data-value="10">FAD</option>
                                        </select>
                                        <input type="hidden" name="hidden-filter_payee" value=""></div>
                            </div>
                            <div class="col-md-3">
                            <div class="form-group" style="margin-top:4px;">
                                <br>
                         

                                <div class="btn-group">
                                <button type="button" id="btn-advance_search" value="close" class="btn btn-block btn-primary btn-sm"><i class="fa fa-search-plus"></i> Filter</button>
                                </div>
                            </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
        </div>