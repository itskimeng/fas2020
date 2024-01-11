<div class="row">
  <div class="col-lg-3 col-xs-6">


    <div class="small-box bg-gray dropbox">
      <div class="inner" style="color:white">
        <h3>33</h3>
        <p>Created</p>
      </div>
      <div class="icon">
        <i class="fa fa-tasks"></i>
      </div>
      <a href="ActivityPlanner/views/pdf.html.php?status=Created&amp;username=jamonteiro&amp;division=17" class="small-box-footer">
        More info <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">


    <div class="small-box bg-yellow dropbox">
      <div class="inner" style="color:white">
        <h3>1</h3>
        <p>Ongoing</p>
      </div>
      <div class="icon">
        <i class="fa fa-refresh"></i>
      </div>
      <a href="ActivityPlanner/views/pdf.html.php?status=Ongoing&amp;username=jamonteiro&amp;division=17" class="small-box-footer">
        More info <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">


    <div class="small-box bg-aqua dropbox">
      <div class="inner" style="color:white">
        <h3>8</h3>
        <p>For Checking</p>
      </div>
      <div class="icon">
        <i class="fa fa-calendar-check-o"></i>
      </div>
      <a href="ActivityPlanner/views/pdf.html.php?status=For Checking&amp;username=jamonteiro&amp;division=17" class="small-box-footer">
        More info <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <div class="col-lg-3 col-xs-6">


    <div class="small-box bg-green dropbox">
      <div class="inner" style="color:white">
        <h3>23</h3>
        <p>Done</p>
      </div>
      <div class="icon">
        <i class="fa fa-check-square-o"></i>
      </div>
      <a href="ActivityPlanner/views/pdf.html.php?status=Done&amp;username=jamonteiro&amp;division=17" class="small-box-footer">
        More info <i class="fa fa-arrow-circle-right"></i>
      </a>
    </div>
  </div>
  <div class="col-lg-12 col-md-12 col-xs-12">
  <div class="box box-primary dropbox">
      <div class="box-body">
        <h1> TOTAL INCOME: </h1>
      </div>
    </div>
    <div class="box box-primary dropbox">
      <div class="box-body">
        <table class="table table-bordered table-striped display">
          <thead>
            <th>PR No.</th>
            <th>RFQ No.</th>
            <th>Abstract No.</th>
            <th>Total ABC</th>
            <th>Particulars</th>
            <th>Office</th>
     
          </thead>
          <tbody>
            <?php foreach($supplier_opts as $key => $item):?>
              <td><?= $item['pr_no'];?></td>
              <td><?= $item['rfq_no'];?></td>
              <td><?= $item['abstract_no'];?></td>
              <td><?= $item['abc'];?></td>
              <td><?= $item['particulars'];?></td>
              <td><?= $item['office'];?></td>
            <?php endforeach;?>
            <tr>
              <td></td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>
    
  </div>

</div>


<style type="text/css">
  #list_table {
    box-shadow: 0 1px 2px rgb(0 0 0 / 15%);
  }

  .dataTables_filter {
    text-align: right !important;
  }

  .card {
    background-color: white;
    box-shadow: 0px 2px 4px rgba(0, 0, 0, 0.2);
    border-radius: 4px;
    padding: 16px;
    width: 300px;
  }

  .card-header {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 64px;
    margin-bottom: 16px;
    background-color: #2196F3;
    color: white;
    border-radius: 4px 4px 0 0;
  }

  .card-header h2 {
    margin: 0;
  }

  .card-body {
    color: #444444;
    font-size: 14px;
    line-height: 1.5;
  }
</style>