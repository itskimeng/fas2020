<div>
  <div class="row">
    <div class="col-xs-3">
      <label style="font-size: 13px;"><b>REGULAR:</b> </label>
    </div>  

    <?php foreach ($lucena['regular'] as $key => $emp): ?>
      <div class="col-xs-3">
        <span class="pull-right-container">
            <small class="label bg-red" style="background-color:<?php echo $lucreg[$key]; ?>!important"><?php echo $emp; ?></small>
          </span>
          <label for="fname" style="font-size: 11px;"><?php echo strtoupper($key); ?> </label>
      </div>
    <?php endforeach ?>
  </div>

  <div class="row">
    <div class="col-xs-3">
      <label style="font-size: 13px;"><b>CONTRACTUAL:</b> </label>
    </div>  

    <?php foreach ($lucena['contractual'] as $key => $emp): ?>
      <div class="col-xs-3">
        <span class="pull-right-container">
            <small class="label bg-red" style="background-color:<?php echo $luccon[$key]; ?>!important"><?php echo $emp; ?></small>
          </span>
          <label for="fname" style="font-size: 11px;"><?php echo strtoupper($key); ?> </label>
      </div>
    <?php endforeach ?>
  </div>

  <div class="chart" id="sales-chart9" style="height: 300px; position: relative; text-align: right;"></div>
  <div class="row">
    <div class="col-xs-12 float-right">
      <label>Lucena City</label>
    </div>
  </div>
</div>

  