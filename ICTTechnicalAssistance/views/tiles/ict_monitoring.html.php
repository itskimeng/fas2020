<div class="box box-primary dropbox">
    <div class="box-header">
    </div>
    <div class="box-body custom-box-body">
        <div class="table-responsive">
            <ul class="cd-breadcrumb triangle nav nav-tabs" role="tablist">
             
                <!-- <li role="presentation" class="">
                    <a href="#pml" aria-controls="ideate" role="tab" data-toggle="tab" aria-expanded="true">
                        <i class="fa fa-list" aria-hidden="true"></i> PML Monitoring
                    </a>
                </li>
                <li role="presentation" class="">
                    <a href="#psl" aria-controls="ideate" role="tab" data-toggle="tab" aria-expanded="true">
                        <i class="fa fa-list" aria-hidden="true"></i> PSL Monitoring
                    </a>
                </li>
                <li role="presentation" class="">
                    <a href="#css" aria-controls="ideate" role="tab" data-toggle="tab" aria-expanded="true">
                        <i class="fa fa-list" aria-hidden="true"></i> CSS Monitoring
                    </a>
                </li> -->
                <li role="presentation" class="<?= ($_GET['report_type'] == 'summary_log_sheet' || $_GET['quarter'] == '1' || $_GET['quarter'] == '2'|| $_GET['quarter'] == '3'|| $_GET['quarter'] == '4') ? '' : 'active'; ?>">
                    <a href="base_ticket_monitoring.html.php?role=<?= $_GET['role'] ?>&quarter=0">
                        <i class="fa fa-list" aria-hidden="true"></i> Monitoring
                    </a>
                </li>
                <li role="presentation" class="<?= ($_GET['report_type'] == 'summary_log_sheet') ? 'active' : ''; ?>">
                    <a href="base_ticket_monitoring.html.php?role=<?= $_GET['role'] ?>&report_type=summary_log_sheet&quarter=1">
                        <i class="fa fa-list" aria-hidden="true"></i> Summary Log Sheet
                    </a>
                </li>
                <li role="presentation" class="<?= ($_GET['quarter'] == 1) ? 'active' : ''; ?>">
                    <a href="base_ticket_monitoring.html.php?role=<?= $_GET['role'] ?>&quarter=1">
                        <i class="fa fa-list" aria-hidden="true"></i> 1st Quarter
                    </a>
                </li>
                <li role="presentation" class="<?= ($_GET['quarter'] == 2) ? 'active' : ''; ?>">
                    <a href="base_ticket_monitoring.html.php?role=<?= $_GET['role'] ?>&quarter=2">
                        <i class="fa fa-list" aria-hidden="true"></i> 2nd Quarter
                    </a>
                </li>
                <li role="presentation" class="<?= ($_GET['quarter'] == 3) ? 'active' : ''; ?>">
                    <a href="base_ticket_monitoring.html.php?role=<?= $_GET['role'] ?>&quarter=3">
                        <i class="fa fa-list" aria-hidden="true"></i> 3rd Quarter
                    </a>
                </li>
                <li role="presentation" class="<?= ($_GET['quarter'] == 4) ? 'active' : ''; ?>">
                    <a href="base_ticket_monitoring.html.php?role=<?= $_GET['role'] ?>&quarter=4">
                        <i class="fa fa-list" aria-hidden="true"></i> 4th Quarter
                    </a>
                </li> 
            </ul>
            <div class="tab-content">
                <div role="tabpanel" class="tab-pane <?= ($_GET['report_type'] == 'summary_log_sheet' || $_GET['quarter'] == '1' || $_GET['quarter'] == '2'|| $_GET['quarter'] == '3'|| $_GET['quarter'] == '4') ? '' : 'active'; ?>" id="monitoring">
                    <?php include('monitoring_panel.php'); ?>
                </div>
                <div role="tabpanel" class="tab-pane <?= ($_GET['report_type'] == 'summary_log_sheet') ? 'active' : ''; ?>" id="monitoring">
                    <?php include('summary_logsheet.php'); ?>
                
                </div>
                <div role="tabpanel" class="tab-pane <?= ($_GET['quarter'] == 1) ? 'active' : ''; ?>" id="quarter1">
                    <?php include('ticket_panel.php'); ?>
                </div>
                <div role="tabpanel" class="tab-pane <?= ($_GET['quarter'] == 2) ? 'active' : ''; ?>" id="Discuss">
                    <?php include('ticket_panel.php'); ?>
                </div>
                <div role="tabpanel" class="tab-pane <?= ($_GET['quarter'] == 3) ? 'active' : ''; ?>" id="Discuss">
                    <?php include('ticket_panel.php'); ?>
                </div>
                <div role="tabpanel" class="tab-pane <?= ($_GET['quarter'] == 4) ? 'active' : ''; ?>" id="Discuss">
                    <?php include('ticket_panel.php'); ?>
                </div>

            </div>
        </div>
    </div>
</div>

<style>
    /* Custom nav-tabs */
    h3 {
        color: #fff;
    }

    .dropbox {
        margin-top: 0 !important;
    }

    .tab-content {
        border-bottom: 1px solid #ddd;
        border-left: 1px solid #ddd;
        border-right: 1px solid #ddd;
        display: block;
        border-radius: 0 0 0.25em 0.25em;
    }

    .tab-content .tab-pane {
        text-align: left;
        padding: 10px;
    }

    .tab-content .tab-pane h3 {
        margin: 0;
    }

    .cd-breadcrumb {
        padding: 6px 7px;
        margin: 0;
        background-color: transparent;
        border-radius: 0.25em 0.25em 0 0;
    }

    .cd-breadcrumb.nav-tabs {
        border-left: 1px solid #ddd;
        border-top: 1px solid #ddd;
        border-right: 1px solid #ddd;
        border-bottom: none;
    }

    .cd-breadcrumb.nav-tabs>li.active>a,
    .cd-breadcrumb.nav-tabs>li.active>a:hover,
    .cd-breadcrumb.nav-tabs>li.active>a:focus {
        color: #fff;
        background-color: #144677;
        border: 0px solid #144677;
        cursor: default;
    }

    .cd-breadcrumb.nav-tabs>li>a {
        margin-right: inherit;
        line-height: inherit;
        height: 48px;
        border: inherit;
        border-radius: inherit;
        border-color: #edeff0;
    }

    .cd-breadcrumb li {
        display: inline-block;
        float: left;
        margin: 0.5em 0;
    }

    .cd-breadcrumb li::after {
        /* this is the separator between items */
        display: inline-block;
        content: '\00bb';
        margin: 0 0.6em;
        color: tint(#144677, 50%);
    }

    .cd-breadcrumb li:last-of-type::after {
        /* hide separator after the last item */
        display: none;
    }

    .cd-breadcrumb li>* {
        /* single step */
        display: inline-block;
        font-size: 1.4rem;
        color: #144677;
    }

    .cd-breadcrumb li.current>* {
        /* selected step */
        color: #144677;
    }

    .cd-breadcrumb a:hover {
        /* steps already visited */
        color: #144677;
    }

    .cd-breadcrumb.custom-separator li::after {
        /* replace the default arrow separator with a custom icon */
        content: '';
        height: 16px;
        width: 16px;
        vertical-align: middle;
    }

    .cd-breadcrumb li {
        margin: 1.2em 0;
    }

    .cd-breadcrumb li::after {
        margin: 0 1em;
    }

    .cd-breadcrumb li>* {
        font-size: 1.6rem;
    }

    .cd-breadcrumb.triangle li {
        position: relative;
        padding: 0;
        margin: 0 4px 0 0;
    }

    .cd-breadcrumb.triangle li:last-of-type {
        margin-right: 0;
    }

    .cd-breadcrumb.triangle li .octicon {
        margin-right: 10px;
    }

    .cd-breadcrumb.triangle li>* {
        position: relative;
        padding: 0.8em 0.8em 0.7em 2.5em;
        color: #333;
        background-color: #edeff0;
        /* the border color is used to style its ::after pseudo-element */
        border-color: #edeff0;
    }

    .cd-breadcrumb.triangle li.active>* {
        /* selected step */
        color: #fff;
        background-color: #144677;
        border-color: #144677;
    }

    .cd-breadcrumb.triangle li:first-of-type>* {
        padding-left: 1.6em;
        border-radius: 4px 0 0 4px;
    }

    .cd-breadcrumb.triangle li:last-of-type>* {
        padding-right: 1.6em;
        border-radius: 0 0.25em 0.25em 0;
    }

    .cd-breadcrumb.triangle a:hover {
        /* steps already visited */
        color: #fff;
        background-color: #144677;
        border-color: #144677;
        text-decoration: none;
    }

    .cd-breadcrumb.triangle li::after,
    .cd-breadcrumb.triangle li>*::after {
        /* li > *::after is the colored triangle after each item li::after is the white separator between two items */
        content: '';
        position: absolute;
        top: 0;
        left: 100%;
        content: '';
        height: 0;
        width: 0;
        /* 48px is the height of the <a> element */
        border: 24px solid transparent;
        border-right-width: 0;
        border-left-width: 20px;
    }

    .cd-breadcrumb.triangle li::after {
        /* this is the white separator between two items */
        z-index: 1;
        -webkit-transform: translate(4px, 0);
        -ms-transform: translate(4px, 0);
        -o-transform: translate(4px, 0);
        transform: translate(4px, 0);
        border-left-color: #fff;
        /* reset style */
        margin: 0;
    }

    .cd-breadcrumb.triangle li>*::after {
        /* this is the colored triangle after each element */
        z-index: 2;
        border-left-color: inherit;
    }

    .cd-breadcrumb.triangle li:last-of-type::after,
    .cd-breadcrumb.triangle li:last-of-type>*::after {
        /* hide the triangle after the last step */
        display: none;
    }


    .banner_rank0 span {
        position: absolute;
        top: 0;
        width: 0;
        height: 0;
        right: 0;
        text-align: center;
        font-size: 16px;
        font-family: arial;
        transform: rotate(45deg);
    }

    .banner_rank1 span {
        position: absolute;
        top: 0;
        width: 0;
        height: 0;
        right: 0;
        text-align: center;
        font-size: 16px;
        font-family: arial;
        transform: rotate(45deg);
    }

    .banner_rank2 span {
        position: absolute;
        top: 0;
        width: 0;
        height: 0;
        right: 0;
        text-align: center;
        font-size: 16px;
        font-family: arial;
        transform: rotate(45deg);
    }

    .banner_rank3 span {
        position: absolute;
        top: 0;
        width: 0;
        height: 0;
        right: 0;
        text-align: center;
        font-size: 16px;
        font-family: arial;
        transform: rotate(45deg);
    }

    .banner_rank0:after {
        content: '';
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 0 60px 60px 0;
        border-color: transparent #B71C1C transparent transparent;
        right: 0;
        top: 0;
        position: absolute;
    }

    .banner_rank1:after {
        content: '';
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 0 60px 60px 0;
        border-color: transparent #1B5E20 transparent transparent;
        right: 0;
        top: 0;
        position: absolute;
    }

    .banner_rank2:after {
        content: '';
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 0 60px 60px 0;
        border-color: transparent #1A237E transparent transparent;
        right: 0;
        top: 0;
        position: absolute;
    }

    .banner_rank3:after {
        content: '';
        width: 0;
        height: 0;
        border-style: solid;
        border-width: 0 60px 60px 0;
        border-color: transparent #FFEA00 transparent transparent;
        right: 0;
        top: 0;
        position: absolute;
    }
</style>