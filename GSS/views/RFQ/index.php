<?php require_once 'GSS/controller/PurchaseRequestController.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Request for Quotation</h1>

        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Procurement</a></li>
            <li class="active">Request for Quotation</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <?php include('_panel/box.html.php'); ?>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="w3-panel w3-pale-red w3-border w3-leftbar w3-border-red">
                    <h3>REMINDER!</h3>
                    <div><label class="label label-danger">URGENT</label> - the status of this purchase request is urgent and must be processed on the date submitted by the user. </div><br>
                </div>
                <?php include('_panel/settings.php'); ?>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
               <?php include '_panel/tabs.php';?>
               <?php include '_panel/tabs_target.php';?>
            </div>


        </div>
</div>
</section>
</div>
<style>
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
<script>
    $(document).ready(function() {
        $('#tbl_rfq_panel').hide();

    })
    $(document).on('click', '#btn_create_rfq', function() {
        $('#tbl_pr_entries').hide();
        $('#tbl_rfq_panel').show();
    })
</script>