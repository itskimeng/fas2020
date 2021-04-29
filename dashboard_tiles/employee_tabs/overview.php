<div>
  <div class="row">
    <div class="col-xs-3">
      <label style="font-size: 13px;"><b>REGULAR:</b> </label>
    </div>  

    <?php foreach ($overviews['regular'] as $key => $overview): ?>
      <div class="col-xs-3">
        <span class="pull-right-container">
            <small class="label bg-red" style="background-color:<?php echo $colors2[$key]; ?>!important"><?php echo $overview; ?></small>
          </span>
          <label for="fname" style="font-size: 11px;"><?php echo strtoupper($key); ?> </label>
      </div>
    <?php endforeach ?>
  </div>

  <div class="row">
    <div class="col-xs-3">
      <label style="font-size: 13px;"><b>CONTRACTUAL:</b> </label>
    </div>  

    <?php foreach ($overviews['contractual'] as $key => $overview): ?>
      <div class="col-xs-3">
        <span class="pull-right-container">
            <small class="label bg-red" style="background-color:<?php echo $colors3[$key]; ?>!important"><?php echo $overview; ?></small>
          </span>
          <label for="fname" style="font-size: 11px;"><?php echo strtoupper($key); ?> </label>
      </div>
    <?php endforeach ?>
  </div>

  <div class="chart" id="sales-chart1" style="height: 300px; position: relative; text-align: right;"></div>
  <div class="row">
    <div class="col-xs-12 float-right">
      <label>DILG IV-A CALABARZON</label>
    </div>
  </div>
</div>

  