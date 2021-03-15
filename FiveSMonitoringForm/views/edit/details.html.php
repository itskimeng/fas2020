<div class="box">
    <div class="box-body">
        <div class="col-md-12" id="myWizard">
            <div class="row">
                <div class="col-xs-10 col-md-10">
                    <!-- <h3><span class="glyphicon glyphicon-lock"></span>&nbsp;Secure Checkout</h3> -->
                </div>
            </div>
            <div class="progress">
                <?php include 'progress_bar.html.php'; ?>    
            </div>
            <div class="navbar">
                <?php include 'navbar.html.php'; ?>
            </div>
            <div class="tab-content">
                <div class="tab-pane fade in active" id="step1">
                    <?php include 'legends.html.php'; ?>
                    <?php include 'forms/sort.html.php'; ?>
                </div>
                <div class="tab-pane fade" id="step2">
                    <?php include 'legends.html.php'; ?>
                    <?php include 'forms/set_in_order.html.php'; ?>
                </div>
                <div class="tab-pane fade" id="step3">
                    <?php include 'legends.html.php'; ?>
                    <?php include 'forms/shining.html.php'; ?> 
                </div>
                <div class="tab-pane fade" id="step4">
                </div>
            </div>
        </div>
    </div>
</div>

<?php include 'css.html.php'; ?>    
<?php include 'js.html.php'; ?>