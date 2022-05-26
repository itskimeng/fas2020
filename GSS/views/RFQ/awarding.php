<?php include 'GSS/controller/RFQController.php'; ?>
<?php require_once 'GSS/controller/PurchaseRequestController.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <h2>ABSTRACT NO:<?= $abstract_no['abstract_no']; ?></h2>

        <ol class="breadcrumb">
            <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#">Procurement</a></li>
            <li class="active">Abstract of Quotation</li>
        </ol>
    </section>
    <section class="content">
        <div class="row">
            <?php include('_panel/box.html.php'); ?>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <?php include 'GSS/views/RFQ/awarding/action_buttons.php'; ?>
            </div>
            <div class="col-lg-12">

                <div class="box box-primary" id="rfq_items" style="  box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);">
                    <div class="box-header with-border">
                        <b>RFQ Items</b>
                        <div class="box-tools pull-right">

                        </div>
                    </div>
                    <div class="box-body">

                        <div class="chart" style="position: relative;">
                        <div id="chartContainer" style="height: 370px; width: 100%;"></div>

                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-3">
                <?php include 'GSS/views/RFQ/awarding/add_supplier_quotation.php' ?>
            </div>
            <div class="col-lg-9">
                <?php include 'GSS/views/RFQ/awarding/supplier_quotation_table.php'; ?>
            </div>

        </div>
        <div>
    </section>
</div>

<script src="GSS/views/backend/js/custom.js"></script>
<script src="GSS/views/backend/js/rfq_custom.js"></script>

<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	title:{
		text: "REQUEST FOR QUOTATION ITEMS"
	},
	axisY: {
		title: "PRICE PER ITEM",
		includeZero: true,
		prefix: "₱",
		suffix:  "k"
	},
	data: [{
        color:"#009688",
		type: "column",
		yValueFormatString: "₱#,##0",
		indexLabel: "{y}",
		indexLabelPlacement: "inside",
		indexLabelFontWeight: "bolder",
		indexLabelFontColor: "white",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>    