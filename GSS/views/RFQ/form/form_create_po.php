<div class="box box-info">
    <div class="box-header with-border">
        <div class="box-tools pull-right">

        </div>
    </div>

    <div class="box-body">
            <div class="container">
          


            </div>
            <div class="col-lg-12">
                <div class="box" id="pr_item_list" style="  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);">
                    <div class="box-header with-border">
                        <b> Create Purchase Order
                        </b>
                        <div class="box-tools pull-right">

                        </div>
                    </div>
                    <div class="box-body">
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
                                                                        <?= proc_text_input('text', 'form-control col-lg-6', 'cform-po-no', 'cform-po-no', false, $po_no['po_no']); ?>
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
                                                                        <?= proc_text_input('text','form-control','winner_supplier','supplier',false,$po['supplier']); ?>
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
                                                                            <?= proc_text_input('text', 'form-control col-lg-6', 'cform-amount', 'cform-amount', false, $po['po_amount']); ?>

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
                                </div>
                            </div>
                    </div>
                </div>
            </div>

    </div>
</div>
