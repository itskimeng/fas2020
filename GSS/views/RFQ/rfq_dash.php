<?php require_once 'GSS/controller/RFQController.php'; ?>
<?php require_once 'GSS/controller/PurchaseRequestController.php'; ?>

<style>
    
    /* Custom nav-tabs */
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
</style>
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

        </div>
        <div class="row">
        <?php include('_panel/box.html.php'); ?>
           
            <?php include '_panel/pending_pr.php'; 
            ?>
            <?php include '_panel/pos.php'; ?>
            <?php //include '_panel/rfq_entries_table.php'; 
            ?>
            <?php //include '_panel/modal_pos.php';
            ?>
        </div>
    </section>
</div>
<style>
    .table-cell {
        display: table-cell;
        max-width: 0px;
    }
</style>
<script src="GSS/views/backend/js/rfq_custom_button.js"></script>

<script>
    $(document).ready(function() {
        let flag = "<?= $_GET['flag']; ?>";
        let rfq = "<?= $_GET['rfq_no']; ?>";
        if (flag == 1) {
            toastr.success("You have successfully created RFQ-NO-" + rfq);
        } else {

        }
    })
    $(".select2").select2({
        dropdownParent: $("#modal-default")
    });
    $('.select2').on('change', function() {
        let pr = $(this).val();
        let path = 'GSS/route/post_rfq.php';
        let data = {
            pr_no: pr,
        };

        $.post(path, data, function(data, status) {
            let lists = JSON.parse(data);
            sample(lists);
            // appendAPPItems(lists);
        });

        function sample($data) {
            $.each($data, function(key, item) {
                $('#cform-rfq').val(item.rfq_no);
                $('#cform-pr-no').val(item.pr_no);
                $('#cform-office').val(item.office);
                $('#cform-textarea').val(item.purpose);
            });

            return $data;
        }


    })
</script>