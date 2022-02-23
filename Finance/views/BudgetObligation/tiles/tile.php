<div class="col-lg-3 col-6">
  <div class="small-box bg-aqua bg-aqua-custom dropbox">
    <div class="inner">
      <h3><?= $ob_count['for_receiving']; ?></h3>

      <p>RECEIVED</p>
    </div>
    <div class="icon">
      <i class="ion ion-bag"></i>
    </div>
    <a type="button" disabled class="small-box-footer"><i class="fa fa-ellipsis-h"></i></a>
  </div>
</div>

<div class="col-lg-3 col-6">
  <div class="small-box bg-yellow bg-yellow-custom dropbox">
    <div class="inner">
      <h3><?= $ob_count['obligated']; ?></h3>

      <p>OBLIGATED</p>
    </div>
    <div class="icon">
      <i class="ion ion-stats-bars"></i>
    </div>
    <a type="button" disabled class="small-box-footer"><i class="fa fa-ellipsis-h"></i></a>
  </div>
</div>

<div class="col-lg-3 col-6">
  <div class="small-box bg-red bg-red-custom dropbox">
    <div class="inner">
      <h3><?= $ob_count['returned']; ?></h3>

      <p>RETURNED</p>
    </div>
    <div class="icon">
      <i class="ion ion-person-add"></i>
    </div>
    <a type="button" disabled class="small-box-footer"><i class="fa fa-ellipsis-h"></i></a>
  </div>
</div>

<div class="col-lg-3 col-6">
  <div class="small-box bg-green bg-green-custom dropbox">
    <div class="inner">
      <h3><?= $ob_count['released']; ?></h3>

      <p>RELEASED</p>
    </div>
    <div class="icon">
      <i class="ion ion-pie-graph"></i>
    </div>
    <a type="button" disabled class="small-box-footer"><i class="fa fa-ellipsis-h"></i></a>
  </div>
</div>
