    <div class="box box-primary" id="pr_item_list" style="  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);">
        <div class="box-header with-border">
            <b> Create Purchase Order
            </b>
            <div class="box-tools pull-right">
                <div class="switchToggle pull-right">
                    <input type="checkbox" id="cform-dfunds" class="dfunds" name="dfunds"><label for="cform-dfunds">Assign Multiple PR's</label>
                    <span>&nbsp; <b>Create Multiple PO's</b></span>
                </div>

            </div>
        </div>
        <div class="box-body" id="po_create">
            <div id="w1-container" class="kv-view-mode">
                <div class="kv-detail-view">
                    <table id="w1" class="table table-bordered table-striped detail-view" data-krajee-kvdetailview="kvDetailView_4eb2b924">
                        <tbody>
                            <tr class="kv-child-table-row">
                                <td class="kv-child-table-cell" colspan="2">
                                    <table class="kv-child-table">
                                        <tbody>
                                            <tr>
                                                <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Purchase Order No</th>
                                                <td>
                                                    <div class="kv-attribute">
                                                        <?= proc_text_input('text', 'form-control col-lg-6', 'cform-po-no', 'cform-po-no', false,$po_no['po_no']); ?>
                                                        <!-- $po_no['po_no'] -->
                                                    </div>
                                                </td>
                                                <th style=" width: 20%; text-align: LEFT; vertical-align: MIDDLE;">RFQ No</th>
                                                <td>
                                                    <div class="kv-attribute">
                                                        <?= proc_text_input('text', 'form-control col-lg-6', 'cform-rfq-no', 'cform-rfq-no', false, $_GET['rfq_no']); ?>
                                                        <?= proc_text_input('hidden', 'form-control col-lg-6', 'cform-rfq-id', 'cform-rfq-id', false, $ids['id']); ?>
                                                        <?= proc_text_input('hidden', 'form-control col-lg-6', 'cform-pr-id', 'cform-pr-id', false, $pr_id['id']); ?>

                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr class="kv-child-table-row">
                                <td class="kv-child-table-cell" colspan="2">
                                    <table class="kv-child-table">
                                        <tbody>
                                            <tr>
                                                <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Supplier</th>
                                                <td>
                                                    <div class="kv-attribute">
                                                        <?= proc_text_input('text', 'form-control', 'winner_supplier', 'supplier', false, $po['supplier']); ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr class="kv-child-table-row">
                                <td class="kv-child-table-cell" colspan="2">
                                    <table class="kv-child-table">
                                        <tbody>
                                            <tr>
                                                <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">PO Amount</th>
                                                <td>
                                                    <div class="kv-attribute">
                                                        <div id="cgroup-total_amount" class="input-group col-lg-6">
                                                            <span class="input-group-addon"><strong>₱</strong></span>
                                                            <?= proc_text_input('text', 'form-control col-lg-6', 'amount', 'amount', false, $po['po_amount']); ?>
                                                            <?= proc_text_input('hidden', 'form-control col-lg-6', 'cform-amount', 'cform-amount', false, $po['amount']); ?>

                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>

                            <tr class="kv-child-table-row">
                                <td class="kv-child-table-cell" colspan="2">
                                    <table class="kv-child-table">
                                        <tbody>
                                            <tr>
                                                <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">PO Date</th>
                                                <td>
                                                    <div class="kv-attribute">
                                                        <div class="input-group date">
                                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                            <input type="text" class="form-control pull-right info-dates" id="cform-po-date" name="cform-po-date" value="">
                                                        </div>
                                                    </div>
                                                </td>
                                                <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">NTP Date</th>
                                                <td>
                                                    <div class="kv-attribute">
                                                        <div class="input-group date">
                                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                            <input type="text" class="form-control pull-right info-dates" id="cform-ntp-date" name="cform-ntp-date" value="">
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                            <tr class="kv-child-table-row">
                                <td class="kv-child-table-cell" colspan="2">
                                    <table class="kv-child-table">
                                        <tbody>
                                            <tr>
                                                <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">NOA Date</th>
                                                <td>
                                                    <div class="kv-attribute">
                                                        <div class="input-group date">
                                                            <div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                            <input type="text" class="form-control pull-right info-dates" id="cform-noa-date" name="cform-noa-date" "required=" required" "="" value="">
                                                                        </div>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                    </table>
                                                </td>
                                            </tr>

                                        </tbody>
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class=" box-body" id="multiple_po">
                    
        </div>
    </div>
                

            <style>
                .dropbox {
                    box-shadow: 0 1px 2px rgb(0 0 0 / 50%);
                }

                .custom-tb-header {
                    background-color: #a0cfea !important;
                }

                .delete_modal_header {
                    text-align: center;
                    background-color: #f15e5e;
                    color: white;
                    padding: 5% !important;
                    border-top-left-radius: 4px;
                    border-top-right-radius: 4px;
                }

                * {
                    box-sizing: border-box;
                }

                .fade-scale {
                    transform: scale(0);
                    opacity: 0;
                    -webkit-transition: all .25s linear;
                    -o-transition: all .25s linear;
                    transition: all .25s linear;
                }

                .fade-scale.in {
                    opacity: 1;
                    transform: scale(1);
                }

                .switchToggle input[type=checkbox] {
                    height: 0;
                    width: 0;
                    visibility: hidden;
                    position: absolute;
                }

                .switchToggle label {
                    cursor: pointer;
                    text-indent: -99999px;
                    width: 70px;
                    max-width: 60px;
                    height: 25px;
                    background: #d1d1d1;
                    /*display: block; */
                    border-radius: 100px;
                    position: relative;
                }

                .switchToggle label:after {
                    content: '';
                    position: absolute;
                    top: 2px;
                    left: 2px;
                    width: 20px;
                    height: 20px;
                    background: #fff;
                    border-radius: 90px;
                    transition: 0.3s;
                }

                .switchToggle input:checked+label,
                .switchToggle input:checked+input+label {
                    background: #3e98d3;
                }

                .switchToggle input+label:before,
                .switchToggle input+input+label:before {
                    content: 'No';
                    position: absolute;
                    top: 3px;
                    left: 35px;
                    width: 26px;
                    height: 26px;
                    border-radius: 90px;
                    transition: 0.3s;
                    text-indent: 0;
                    color: #fff;
                }


                .switchToggle input:checked+label:before,
                .switchToggle input:checked+input+label:before {
                    content: 'Yes';
                    position: absolute;
                    top: 3px;
                    left: 10px;
                    width: 26px;
                    height: 26px;
                    border-radius: 90px;
                    transition: 0.3s;
                    text-indent: 0;
                    color: #fff;
                }

                .switchToggle input:checked+label:after,
                .switchToggle input:checked+input+label:after {
                    left: calc(100% - 2px);
                    transform: translateX(-100%);
                }

                .switchToggle label:active:after {
                    width: 60px;
                }

                .toggle-switchArea {
                    margin: 10px 0 10px 0;
                }
            </style>
            <script>
                $(document).ready(function() {
                    $("#multiple_po").hide();
                    $(".switchToggle input").on("change", function(e) {
                        const isOn = e.currentTarget.checked;
                        if (isOn) {
                            $("#po_create").hide();
                            $("#multiple_po").show();

                        } else {
                            $("#multiple_po").hide();
                            $("#po_create").show();

                        }
                    });
                })
            </script>