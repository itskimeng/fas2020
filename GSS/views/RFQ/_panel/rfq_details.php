<div class="box box-info">
    <div class="box-header with-border">
        <b>RFQ Details</b>
        <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse">
                <i class="fa fa-minus"></i>
            </button>
        </div>
    </div>
    <div class="box-body">
        <form id="w3" class="form-vertical" action="/documentroute/incomingview?id=&amp;routeno=1751014" method="post" role="form">
            <input type="hidden" name="_csrf" value="vGRFeQruDnCyGAJ-LaZs_mOYugb6I9jgKuz8B-KvmtWMCi1OSNp6IcNZOyh4nj22EtPMVqtCq6Jj2rhdipzxrA==">
            <div id="kv-demo" class="kv-view-mode">
                <div class="kv-detail-view">
                    <table id="w4" class="table table-hover table-bordered table-condensed table-striped detail-view" data-krajee-kvdetailview="kvDetailView_b14ca971">
                        <tbody>
                        <tr class="kv-child-table-row">
                                <td class="kv-child-table-cell" colspan="2">
                                    <table class="kv-child-table">
                                        <tbody>
                                            <tr>
                                                <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">RFQ No</th>
                                                <td style="width:90%">
                                                    <div class="kv-attribute"><span id="cform-rfq-no"><?= $rfq_details['rfq_no'];?></span></div>
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
                                                <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">RFQ Date</th>
                                                <td style="width:90%">
                                                    <div class="kv-attribute"><span id="cform-rfq-rfq_date"><?= $rfq_details['rfq_date'];?></span></div>
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
                                                <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Purpose</th>
                                                <td style="width:90%">
                                                    <div class="kv-attribute"><span id="cform-rfq-purpose"><?= $rfq_details['purpose']; ?></span></div>
                                                    <div class="kv-form-attribute" style="display:none"><span class="text-justify"><em></em></span></div>
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
                                                <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Office</th>
                                                <td style="width:90%">
                                                    <div class="kv-attribute"><span id="cform-rfq-office"><?= $rfq_details['office'];?></span></div>
                                                    <div class="kv-form-attribute" style="display:none">APPROPRIATE STAFF ACTION</div>
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
                                                <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">PR No</th>
                                                <td style="width:90%">
                                                    <div class="kv-attribute"><span class="text-justify" id="cform-rfq-pr-no"><em><?= $rfq_details['pr_no'];?></em></span></div>
                                                    <div class="kv-form-attribute" style="display:none"><span class="text-justify"><em></em></span></div>
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
                                                <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Current Status</th>
                                                <td style="width:90%">
                                                    <div class="kv-attribute"><span id="cform-rfq-status"></span></div>
                                                    <div class="kv-form-attribute" style="display:none">APPROPRIATE STAFF ACTION</div>
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
        </form>
    </div>
</div>