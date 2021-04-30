<div>
  <div class="row">
    <?php foreach ($employees as $key => $emp): ?>
      <div class="col-xs-4">
        <span class="pull-right-container">
          <small class="label bg-red" style="background-color:<?php echo $colors[$key]; ?>!important"><?php echo $emp; ?></small>
        </span>
        <label for="fname" style="font-size: 11px;"><?php echo $key; ?> </label>
      </div>
    <?php endforeach ?>
  </div>
  <div class="chart" id="sales-chart2" style="height: 300px; position: relative; text-align: right;"></div>
  <div class="row">
    <div class="col-xs-12 float-right">
      <label>Regional Office Department</label>
    </div>
  </div>
</div>
