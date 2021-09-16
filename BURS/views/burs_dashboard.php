<div class="row">
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3><?= $total_count['FROM GSS'] + $total_count['FOR RECEIVING']; ?></h3>

                <p style="font-weight:bold;">BURS FOR RECEIVING</p>
              </div>
              <div class="icon">
                <i class="fa fa-shopping-received"></i>
              </div>
              <a href="#" class="small-box-footer">
                &nbsp;
              </a>
            </div>
          </div>
          
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3><?= $total_count['OBLIGATED']; ?></h3>

                <p style="font-weight:bold">BURS OBLIGATED</p>
              </div>
              <div class="icon">
                
              </div>
              <a href="#" class="small-box-footer">
                &nbsp;
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3><?= $total_count['RETURN']; ?></h3>

                <p style="font-weight:bold;">BURS RETURN</p>
              </div>
              <div class="icon">
              </div>
              <a href="#" class="small-box-footer">
               &nbsp;
              </a>
            </div>
          </div>
          <!-- ./col -->
          <div class="col-lg-3 col-xs-6">
            <!-- small box -->
            <div class="small-box bg-red">
              <div class="inner">
                <h3><?= $total_count['RELEASED']; ?></h3>

                <p style="font-weight: bold;">BURS RELEASED</p>
              </div>
              <div class="icon">
              </div>
              <a href="#" class="small-box-footer">
                &nbsp;
              </a>
            </div>
          </div>
          <!-- ./col -->
        </div>