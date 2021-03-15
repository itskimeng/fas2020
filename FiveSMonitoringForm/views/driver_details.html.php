<div class="box">
    <div class="box-body">
        <div class="col-md-12" style="margin-bottom: 1%;">
            <div class="btn-group">
                <a href='base_fives_monitoring_form.html.php?username=<?php echo $_SESSION['username']; ?>&division=<?php echo $_GET['division']; ?>' class="btn btn-block btn-default"><i class="glyphicon glyphicon-chevron-left"></i> Cancel</a>  
            </div>
        </div>
        <div class="col-md-12" id="myWizard">
            <div class="row">
                <div class="col-xs-10 col-md-10">
                    <!-- <h3><span class="glyphicon glyphicon-lock"></span>&nbsp;Secure Checkout</h3> -->
                </div>
            </div>
            <div class="progress">
                <?php include 'driver_progress_bar.html.php'; ?>    
            </div>
            <div class="navbar">
                <?php include 'driver_navbar.html.php'; ?>
            </div>
            <div class="tab-content">
                <?php if (!$ltab_show): ?>
                    <div class="tab-pane fade in active" id="step1">
                        <?php include 'driver_legends.html.php'; ?>
                        <?php include 'forms/initial_form.html.php'; ?>
                    </div>
                <?php else: ?>
                    <div class="tab-pane fade in" id="step1">
                        <?php include 'driver_legends.html.php'; ?>
                        <?php include 'forms/initial_form.html.php'; ?>
                    </div>
                <?php endif ?>

                <?php if (!$seiri_show AND !$seiton_show AND !$seiso_show AND $ltab_show): ?>    
                <div class="tab-pane fade in active" id="step2">
                    <?php include 'forms/final.html.php'; ?> 
                </div>
                <?php endif ?>
            </div>
        </div>
    </div>
</div>

<?php include 'css.html.php'; ?>    
<?php include 'js.html.php'; ?>