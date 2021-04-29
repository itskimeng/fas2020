<div>
  <div class="row">
    <div class="col-xs-3">
      <label style="font-size: 13px;"><b>REGULAR:</b> </label>
    </div>  

    <?php foreach ($batangas['regular'] as $key => $emp): ?>
      <div class="col-xs-3">
        <span class="pull-right-container">
            <small class="label bg-red" style="background-color:<?php echo $batreg[$key]; ?>!important"><?php echo $emp; ?></small>
          </span>
          <label for="fname" style="font-size: 11px;"><?php echo strtoupper($key); ?> </label>
      </div>
    <?php endforeach ?>
  </div>

  <div class="row">
    <div class="col-xs-3">
      <label style="font-size: 13px;"><b>CONTRACTUAL:</b> </label>
    </div>  

    <?php foreach ($batangas['contractual'] as $key => $emp): ?>
      <div class="col-xs-3">
        <span class="pull-right-container">
            <small class="label bg-red" style="background-color:<?php echo $batcon[$key]; ?>!important"><?php echo $emp; ?></small>
          </span>
          <label for="fname" style="font-size: 11px;"><?php echo strtoupper($key); ?> </label>
      </div>
    <?php endforeach ?>
  </div>

  <div class="chart" id="sales-chart4" style="height: 300px; position: relative; text-align: right;"></div>
  <div class="row">
    <div class="col-xs-12 float-right">
      <label>Batangas Province</label>
    </div>
  </div>
</div>

  