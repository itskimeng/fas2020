
<div class="row">

  <div class="col-md-8">
    <div class="box box-success dropbox">
      <div class="box-header with-border">
        <h3 class="box-title">Monthly Overview</h3>
      </div>
      <div class="box-body">
        <div class="chart">
          <canvas id="barChart" style="height: 365px; width: 594px;" width="742" height="286"></canvas>
        </div>
      </div>
    </div>
  </div>

  <div class="col-md-4">
    <div class="box box-danger dropbox">
      <div class="box-header with-border">
        <h3 class="box-title">Overview</h3>
      </div>
      <div class="box-body chart-responsive">
        <!-- <div class="chart" id="sales-chart" style="height: 300px; position: relative;"></div> -->
        <div>
          <div class="row">
            <ul class="custom-ol">
                <li><b><span class="badge bg-red">TOTAL FUND SOURCE</span> : 1,000,000.00</b></li>
                <li><b><span class="badge bg-green">TOTAL ALLOCATED</span> : 800,000.00</b></li>
                <li><b><span class="badge bg-blue">TOTAL BALANCE</span> : 200,000.00</b></li>
            </ul>  
          </div>

          <div class="chart" id="sales-chart" style="height: 300px; position: relative; text-align: right;"></div>
          
        </div>

      </div>
    </div>
  </div>
</div>

<br>
<div style="position: absolute;">
  <div class="btn-group">
    <button type="button" id="btn-advance_search" value="close" class="btn btn-block btn-secondary btn-sm">
      <i class="fa fa-search-plus"></i> Advance Filter
    </button>
  </div>
</div>
<table id="example2" class="table table-bordered table-striped display">
  <thead>
    <tr style="color: white; background-color:#68bbea; color:black;">
      <th class="text-center">LDDAP NO.</th>
      <th class="text-center">LDDAP DATE</th>
      <th class="text-center">TOTAL AMOUNT</th>
      <th class="text-center">TOTAL ALLOCATED</th>
      <th class="text-center">TOTAL BALANCE</th>
      <th class="text-center">STATUS</th>
      <th class="text-center">Action</th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td>LDDAP-01-0001</td>
      <td>03/20/2022</td>
      <td>1,000,000.00</td>
      <td>800,000.00</td>
      <td>200,000.00</td>
      <td>---</td>
      <td>
        <div class="btn-group">
          <a href="#" class="btn btn-primary btn-sm btn-view" title="Edit"> <i class="fa fa-edit"></i></a>
        </div>
      </td>
    </tr>
    <tr>
      <td>LDDAP-01-0002</td>
      <td>03/21/2022</td>
      <td>1,000,000.00</td>
      <td>800,000.00</td>
      <td>200,000.00</td>
      <td>---</td>
      <td>
        <div class="btn-group">
          <a href="#" class="btn btn-primary btn-sm btn-view" title="Edit"> <i class="fa fa-edit"></i></a>
        </div>
      </td>
    </tr>
  </tbody>
</table>