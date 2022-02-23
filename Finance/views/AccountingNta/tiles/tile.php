  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-success zoom" style="color:white; background-image: linear-gradient(45deg, #158d29, transparent) !important;">
      <div class="inner">
        <?php foreach ($getTotalNta as $key => $totalNta):  ?>
        <h4><?php echo $totalNta['totalNta']; ?></h4>
        <?php endforeach ?>
        <p>Total NTA/NCA Amount</p>
      </div>
      <div class="icon">
        <img class="zoom" src="Finance/views/AccountingDisbursement/img/disbursed.png" style="width:70px;margin-top:20px;margin-right:10px;" align="right" alt="">
      </div>
    </div>
  </div>

  <div class="col-lg-4 col-xs-6">
    <div class="small-box zoom" style="background-color: #3b71c2; color:white; background-image: linear-gradient(45deg, #5d95b6, transparent) !important;">
      <div class="inner">
        <?php foreach ($getTotalDisbursedNta as $key => $totalDisbursedNta):  ?>
        <h4><?php echo $totalDisbursedNta['totalDisbursedNta']; ?></h4>
        <?php endforeach ?>
        <p>Disbursed</p>
      </div>
      <div class="icon">
        <img class="zoom" src="Finance/views/AccountingDisbursement/img/disbursed1.png" style="width:60px;margin-top:20px;margin-right:10px;" align="right" alt="">
      </div>
    </div>
  </div>

  <div class="col-lg-4 col-xs-6">
    <div class="small-box bg-danger zoom" style="background-color: #e57a65; color:white; background-image: linear-gradient(45deg, #9e4f36, transparent) !important;">
      <div class="inner">
        <!-- <?php foreach ($getTotalBalance as $key => $totalBalance):  ?> -->
        <!-- <h4><?php echo $totalBalance['totalBalance']; ?></h4> -->
        <!-- <?php endforeach ?> -->
        <h4><?php echo $getTotalBalance; ?></h4>
        <p>Total Remaining Balance</p>
      </div>
      <div class="icon">
        <img class="zoom" src="Finance/views/AccountingDisbursement/img/release.png" style="width:60px;margin-top:20px;margin-right:10px;" align="right" alt="">
      </div>
    </div>
  </div>