<?php require_once 'GSS/controller/PurchaseRequestController.php'; ?>


<div class="content-wrapper">
    <section class="content-header">
        <h1>Purchase Request</h1>

        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Procurement</a></li>
            <li class="active">Purchase No <?= $pr_data['pr_no']; ?></li>
        </ol>
    </section>
    <section class="content">
        <form id="form_pr_item">
            <div class="row">
             
                <div class="col-lg-12">
                <p>
                    <button type="button" id="modalButton" class="btn btn-flat bg-orange" value=""><a href="procurement_purchase_request.php?division=<?= $_GET['division'];?>" style="color: #fff;"><i class=" fa fa-arrow-circle-left"></i> RETURN</a></button>
                    <button type="button" id="modalButton" class="btn btn-flat bg-green " value=""><a href="procurement_purchase_request_edit.php?id=<?= $_GET['id'];?>&division=<?= $_GET['division'];?>" style="color: #fff;"><i class=" fa fa-edit"></i> EDIT</a></button>
                    <button type="button" id="modalButton" class="btn btn-flat bg-purple pull-right " value="/documentroute/createreject?routeno=1751014&amp;docno=R4A-2021-07-27-001&amp;receivedfrom=1551&amp;userid=8516"><i class="fa fa-file-excel-o"></i><a style="color:#fff;" href="export_pr.php?pr_no=<?= $_GET['id'];?>"> EXPORT PR</a></button>
                </p>
                    <div class="box box-info">
                        <div class="box-header with-border">
                            <b>Purchase Request Information</b>
                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                        </div>

                        <div class="box-body">
                            <form id="w0" class="form-vertical" action="/documentroute/incomingview?id=&amp;routeno=1751014" method="post" role="form">
                                <input type="hidden" name="_csrf" value="4PINMeoPoUwA0CHj9Eji8Y2wtLsVAqLR92FPDzlhe-G4wEJr00z2G0Szc7q5L5G-xv_97Xtk1PyfUhV8blQt0A==">
                                <div id="w1-container" class="kv-view-mode">
                                    <div class="kv-detail-view">
                                        <table id="w1" class="table table-bordered table-striped detail-view" data-krajee-kvdetailview="kvDetailView_4eb2b924">
                                            <tbody>
                                                <tr class="kv-child-table-row">
                                                    <td class="kv-child-table-cell" colspan="2">
                                                        <table class="kv-child-table">
                                                            <tbody>
                                                                <tr>
                                                                    <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Purchase No.</th>
                                                                    <td>
                                                                        <div class="kv-attribute"><?= $pr_data['pr_no'];?></div>
                                                                        <div class="kv-form-attribute" style="display:none">
                                                                            <div class="form-group highlight-addon field-documentroute-id">
                                                                                <div><input type="text" id="documentroute-id" class="form-control" name="Documentroute[id]" value="1751014">
                                                                                    <div class="help-block"></div>
                                                                                </div>
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
                                                                    <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Office/Province:</th>
                                                                    <td>
                                                                        <div class="kv-attribute"><?= $pr_data['office'];?></div>
                                                                        <div class="kv-form-attribute" style="display:none">
                                                                            <div class="form-group highlight-addon field-documentroute-doc_no required">
                                                                                <div><input type="text" id="documentroute-doc_no" class="form-control" name="Documentroute[DOC_NO]" value="R4A-2021-07-27-001" aria-required="true">
                                                                                    <div class="help-block"></div>
                                                                                </div>
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
                                                                    <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">PR Date</th>
                                                                    <td>
                                                                        <div class="kv-attribute"><?= $pr_data['pr_date']; ?></div>
                                                                        <div class="kv-form-attribute" style="display:none">
                                                                            <div class="form-group highlight-addon field-documentroute-route_date">
                                                                                <div><input type="text" id="documentroute-route_date" class="form-control" name="Documentroute[ROUTE_DATE]" value="2021-07-27 12:03:00">
                                                                                    <div class="help-block"></div>
                                                                                </div>
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
                                                                    <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Target Date</th>
                                                                    <td>
                                                                        <div class="kv-attribute"><?= $pr_data['target_date'];?></div>
                                                                        <div class="kv-form-attribute" style="display:none">
                                                                            <div class="form-group highlight-addon field-documentroute-route_date">
                                                                                <div><input type="text" id="documentroute-route_date" class="form-control" name="Documentroute[ROUTE_DATE]" value="2021-07-27 12:03:00">
                                                                                    <div class="help-block"></div>
                                                                                </div>
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
                                                                    <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Type</th>
                                                                    <td>
                                                                        <div class="kv-attribute"><span class="text-justify"><em><?= $pr_data['type'];?></em></span></div>
                                                                        <div class="kv-form-attribute" style="display:none">
                                                                            <div class="form-group highlight-addon field-documentroute-docsubject">
                                                                                <div><textarea id="documentroute-docsubject" class="form-control" name="Documentroute[docSubject]" rows="4">RSAKM IMPLAN: GUIDE FOR PREPARATION OF RSAKM ACCOMPLISHMENT PRESENTATION IN THE ERIC CALABARZON AND MIMAROPA MEETINGS ON 28 JULY 2021</textarea>
                                                                                    <div class="help-block"></div>
                                                                                </div>
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
                                                                    <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Purpose</th>
                                                                    <td>
                                                                        <div class="kv-attribute"><?= $pr_data['purpose'];?></div>
                                                                        <div class="kv-form-attribute" style="display:none">
                                                                            <div class="form-group highlight-addon field-documentroute-docdesc">
                                                                                <div><textarea id="documentroute-docdesc" class="form-control" name="Documentroute[docDesc]" rows="2">RSAKM IMPLAN: GUIDE FOR PREPARATION OF RSAKM ACCOMPLISHMENT PRESENTATION IN THE ERIC CALABARZON AND MIMAROPA MEETINGS ON 28 JULY 2021</textarea>
                                                                                    <div class="help-block"></div>
                                                                                </div>
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
                                                                <tr></tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>
                                                
                                                <tr class="kv-child-table-row">
                                                    <td class="kv-child-table-cell" colspan="2">
                                                        <table class="kv-child-table">
                                                            <tbody>
                                                                <tr>
                                                                    <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">ABC</th>
                                                                    <td>
                                                                        <div class="kv-attribute">₱ <?= number_format($pr['total'],2);?></div>
                                                                        <div class="kv-form-attribute" style="display:none">
                                                                            <div class="form-group highlight-addon field-documentroute-actionname">
                                                                                <div><input type="text" id="documentroute-actionname" class="form-control" name="Documentroute[actionName]" value="APPROPRIATE STAFF ACTION">
                                                                                    <div class="help-block"></div>
                                                                                </div>
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
                                                                    <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Current Status</th>
                                                                    <td>
                                                                    <div class="kv-attribute"><b><?= $pr_data['status'];?></b></div>
                                                                        <div class="kv-form-attribute" style="display:none">
                                                                            <div class="form-group highlight-addon field-documentroute-route_remarks">
                                                                                <div><textarea id="documentroute-route_remarks" class="form-control" name="Documentroute[ROUTE_REMARKS]" rows="4"></textarea>
                                                                                    <div class="help-block"></div>
                                                                                </div>
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
                                                                <tr></tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr>

                                                <!-- <tr class="kv-child-table-row">
                                                    <td class="kv-child-table-cell" colspan="2">
                                                        <table class="kv-child-table">
                                                            <tbody>
                                                                <tr>
                                                                    <th style="width: 20%; text-align: LEFT; vertical-align: MIDDLE;">Received by</th>
                                                                    <td>
                                                                        <div class="kv-attribute"><b><?= $pr_data['received_by'];?></b><br><small>REGION 4A-<?= $pr_data['office'];?></small></div>
                                                                        <div class="kv-form-attribute" style="display:none">
                                                                            <div class="form-group highlight-addon field-documentroute-sendername">
                                                                                <div><input type="text" id="documentroute-sendername" class="form-control" name="Documentroute[senderName]" value="MARY JANICE BALAHADIA">
                                                                                    <div class="help-block"></div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </td>
                                                </tr> -->
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </form>


                            <!-- All attached files -->
                            <!-- <p><span class="fa fa-info-circle fa-fw"></span><i>There are <b class="text-danger">5 ITEMS</b> in this Purchase Request.</i></p> -->
                            <hr>
                            <p><a class="btn btn-sm btn-info" data-toggle="collapse" href="#multiCollapseExample1" role="button" aria-expanded="false" aria-controls="multiCollapseExample1">PR ITEM <i class="fa fa-angle-double-down fa-fw"></i></a></p>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="collapse multi-collapse" id="multiCollapseExample1">
                                        <div class="card card-body">
                                            <p><b><i>Here is the list of the other recipients in this routed document:</i></b></p>
                                            <table class="table table-responsive">
                                                <tbody>
                                                <tr>
                                                <th>Item</th>
                                                <th>Item Description</th>
                                                <th>Unit</th>
                                                <th>Quantity</th>
                                                <th>Unit Cost</th>
                                                <th>Total Cost</th>
                                                </tr>
                                                    <?php foreach ($pr_items as $key => $data): ?>
                                                        <tr>
                                                        <td><?= $data['items'];?></td>
                                                        <td style="width:80%"><?= $data['description'];?></td>
                                                        <td><?= $data['unit'];?></td>
                                                        <td><?= $data['qty'];?></td>
                                                        <td>₱ <?= number_format($data['abc'],2);?></td>
                                                        <td>₱ <?= $data['total'];?></td>
                                            
                                                    </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
</div>

</section>
</div>
<style>
    /*!
 * @package   yii2-detail-view
 * @author    Kartik Visweswaran <kartikv2@gmail.com>
 * @copyright Copyright &copy; Kartik Visweswaran, Krajee.com, 2014 - 2020
 * @version   1.8.3
 *
 * Styles for yii2-detail-view extension 
 * 
 * Author: Kartik Visweswaran
 * Copyright: 2014 - 2020, Kartik Visweswaran, Krajee.com
 * For more JQuery plugins visit http://plugins.krajee.com
 * For more Yii related demos visit http://demos.krajee.com
 */
    .kv-container-bs4 .form-group:not(.has-error),
    .kv-container-bs4 .table {
        margin: 0
    }

    .kv-container-bs4 .table-bordered .kv-child-table-cell td,
    .kv-container-bs4 .table-bordered .kv-child-table-cell th {
        border-top: none;
        border-bottom: none
    }

    .kv-container-bs4 .card>.kv-detail-view>.table-bordered>tbody>tr>td:first-child,
    .panel>.kv-detail-view>.table-bordered>tbody>tr>td:first-child {
        border-left: 0
    }

    .kv-container-bs4 .card>.kv-detail-view>.table-bordered>tbody>tr>td:last-child,
    .panel>.kv-detail-view>.table-bordered>tbody>tr>td:last-child {
        border-right: 0
    }

    .kv-flat-b .card>.kv-detail-view:last-child,
    .kv-flat-b .panel>.kv-detail-view:last-child {
        border-bottom-right-radius: .25rem;
        border-bottom-left-radius: .25rem
    }

    .kv-form-attribute .help-block {
        margin-bottom: -15px
    }

    .kv-edit-mode .kv-edit-hidden,
    .kv-view-mode .kv-view-hidden {
        display: none
    }

    .kv-edit-mode .kv-view-hidden,
    .kv-view-mode .kv-edit-hidden {
        display: table-row
    }

    .kv-edit-hidden.kv-view-hidden {
        display: none
    }

    .kv-detail-loading {
        opacity: .3;
        background: url(../img/loading.gif) top 15px right 15px no-repeat #fff
    }

    .kv-detail-loading * {
        background: 0 0 !important
    }

    .kv-detail-loading td {
        border-color: #efefef !important
    }

    .kv-edit-mode .kv-detail-view {
        overflow-y: hidden
    }

    .kv-form-attribute .row {
        margin-bottom: -5px
    }

    .kv-edit-mode table {
        overflow: hidden
    }

    .kv-child-table {
        width: 100%
    }

    .kv-child-table-row,
    .kv-child-table-row>td {
        vertical-align: middle;
        padding: 0 !important;
        margin: 0 !important
    }

    .kv-child-table-cell {
        margin: 0;
        padding: 0;
        width: 100%;
        overflow: hidden
    }

    .kv-child-table-row th {
        border-left: 1px #ddd solid;
        border-right: 1px #ddd solid
    }

    .kv-child-table td,
    .kv-child-table th {
        margin: 0;
        background: 0 0
    }

    .table .kv-child-table>tbody>tr>td,
    .table .kv-child-table>tbody>tr>th {
        padding: 8px
    }

    .table-condensed .kv-child-table>tbody>tr>td,
    .table-condensed .kv-child-table>tbody>tr>th {
        padding: 5px
    }

    .kv-action-btn {
        margin: 0 2px;
        padding: 0 5px;
        background: 0 0;
        border: none;
        font-size: 16px;
        cursor: pointer
    }

    .kv-action-btn:focus {
        outline: 0
    }

    .kv-action-btn.disabled,
    .kv-action-btn[disabled] {
        cursor: not-allowed
    }

    .card .kv-action-btn {
        color: #fff
    }

    .card .kv-action-btn:focus,
    .card .kv-action-btn:hover {
        color: #fff;
        outline: 0;
        opacity: .8
    }

    .card.border-default .kv-action-btn,
    .card.border-default .kv-action-btn:focus,
    .card.border-default .kv-action-btn:hover,
    .panel-default .kv-action-btn {
        color: #333
    }

    .panel-primary .kv-action-btn:hover {
        color: #c4e3f3
    }

    .panel-info .kv-action-btn {
        color: #31708f
    }

    .panel-info .kv-action-btn:hover {
        color: #245269
    }

    .panel-warning .kv-action-btn {
        color: #8a6d3b
    }

    .panel-warning .kv-action-btn:hover {
        color: #66512c
    }

    .panel-danger .kv-action-btn {
        color: #a94442
    }

    .panel-danger .kv-action-btn:hover {
        color: #843534
    }

    .panel-success .kv-action-btn {
        color: #3c763d
    }

    .panel-success .kv-action-btn:hover {
        color: #2b542c
    }
</style>