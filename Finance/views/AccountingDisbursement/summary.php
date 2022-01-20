
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-primary zoom" style="background-image: linear-gradient(45deg, #08667c, transparent) !important;">
      <div class="inner">
        <?php foreach ($getTotalPaid as $key => $totalPaid):  ?>
        <h3><?php echo $totalPaid['totalPaid']; ?></h3>
        <?php endforeach ?>
        <p>Total Paid</p>
      </div>
      <div class="icon">
        <img class="zoom" src="Finance/views/AccountingDisbursement/img/paid1.png" style="width:70px;margin-top:20px;margin-right:10px;" align="right" alt="">
      </div>
    </div>
  </div>

    <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-success zoom" style="background-color: #4c9d6a; color:white; background-image: linear-gradient(45deg, #0cc04f, transparent) !important;">
      <div class="inner">
        <?php foreach ($getTotalReceived as $key => $totalReceived):  ?>
        <h3><?php echo $totalReceived['totalReceived']; ?></h3>
        <?php endforeach ?>
        <p>Total Received</p>
      </div>
      <div class="icon">
        <img class="zoom" src="Finance/views/AccountingDisbursement/img/received.png" style="width:70px;margin-top:20px;margin-right:10px;" align="right" alt="">
      </div>
    </div>
  </div>

    <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-warning zoom" style="background-color: #b7b749; color:white; background-image: linear-gradient(45deg, #707435, transparent) !important;">
      <div class="inner">
        <?php foreach ($getTotalDisbursed as $key => $totalDisbursed):  ?>
        <h3><?php echo $totalDisbursed['totalDisbursed']; ?></h3>
        <?php endforeach ?>
        <p>Total Disbursed</p>
      </div>
      <div class="icon">
        <img class="zoom" src="Finance/views/AccountingDisbursement/img/disbursed.png" style="width:70px;margin-top:20px;margin-right:10px;" align="right" alt="">
      </div>
    </div>
  </div>

    <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-danger zoom" style="background-color: #e57a65; color:white; background-image: linear-gradient(45deg, #9e4f36, transparent) !important;">
      <div class="inner">
        <?php foreach ($getTotalReleased as $key => $totalReleased):  ?>
        <h3><?php echo $totalReleased['totalReleased']; ?></h3>
        <?php endforeach ?>
        <p>Total Released</p>
      </div>
      <div class="icon">
        <img class="zoom" src="Finance/views/AccountingDisbursement/img/release.png" style="width:70px;margin-top:20px;margin-right:10px;" align="right" alt="">
      </div>
    </div>
  </div>