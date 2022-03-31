
  <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-primary zoom" style="background-image: linear-gradient(45deg, #08667c, transparent) !important;">
      <div class="inner">
        <h3><?php echo $receiving['for_receiving']; ?></h3>
        <p>For Receiving</p>
      </div>
      <div class="icon">
        <img class="zoom" src="Finance/views/AccountingDisbursement/img/incoming.png" style="width:65px;margin-top:20px;margin-right:10px;" align="right" alt="">
      </div>
    </div>
  </div>

    <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-success zoom" style="background-color: #4c9d6a; color:white; background-image: linear-gradient(45deg, #0cc04f, transparent) !important;">
      <div class="inner">
        <h3><?php echo $draft['draft']; ?></h3>
        <p>Draft</p>
      </div>
      <div class="icon">
        <img class="zoom" src="Finance/views/AccountingDisbursement/img/draft.png" style="width:65px;margin-top:20px;margin-right:10px;" align="right" alt="">
      </div>
    </div>
  </div>

    <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-warning zoom" style="background-color: #b7b749; color:white; background-image: linear-gradient(45deg, #707435, transparent) !important;">
      <div class="inner">
        <h3><?php echo $paid['paid']; ?></h3>
        <p>Delivered to Bank</p>
      </div>
      <div class="icon">
        <img class="zoom" src="Finance/views/AccountingDisbursement/img/disbursed.png" style="width:70px;margin-top:20px;margin-right:10px;" align="right" alt="">
      </div>
    </div>
  </div>

    <div class="col-lg-3 col-xs-6">
    <div class="small-box bg-danger zoom" style="background-color: #e57a65; color:white; background-image: linear-gradient(45deg, #9e4f36, transparent) !important;">
      <div class="inner">
        <h3><?php echo $returned['returned']; ?></h3>
        <p>Returned</p>
      </div>
      <div class="icon">
        <img class="zoom" src="Finance/views/AccountingDisbursement/img/return.png" style="width:65px;margin-top:25px;margin-right:10px;" align="right" alt="">
      </div>
    </div>
  </div>