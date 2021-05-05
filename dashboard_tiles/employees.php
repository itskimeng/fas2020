<?php 
  $dashboard = new Dashboard();
  $employees = $dashboard->getEmployees();
  $overviews = $dashboard->getOverviews();
  $regional = $dashboard->getRegionalOfficeTotal();
  $batangas = $dashboard->getProvinces('Batangas');
  $cavite = $dashboard->getProvinces('Cavite');
  $laguna = $dashboard->getProvinces('Laguna');
  $rizal = $dashboard->getProvinces('Rizal');
  $quezon = $dashboard->getProvinces('Quezon');
  $lucena = $dashboard->getProvinces('Lucena');

  $colors = ['ORD'=>"#3c8dbc", 'FAD'=>"#f56954", 'LGCDD'=>"#00a65a", 'LGMED'=>"#ac8686", 'LGCDD-MBTRG'=>"#69b0ac", 'LGMED-PDMU'=>"#b7c718"];

  $colors2 = ['Male'=>"#b85b50", 'Female'=>"#ca3928"];
  $colors3 = ['Male'=>"#3b5998", 'Female'=>"#25478f", 'total'=>'#003199'];

  $rodepreg = ['Male'=>"#3c8dbc", 'Female'=>"#f56954"];
  $rodepcon = ['Male'=>"#dfc6c6", 'Female'=>"#8fddd8"];

  $regreg = ['Male'=>"#dd4b39", 'Female'=>"#b85b50"];
  $regcon = ['Male'=>"#d5e347", 'Female'=>"#b2be35", 'total'=>'#959505'];

  $batreg = ['Male'=>"#0de030", 'Female'=>"#0cb528", 'total'=>'#087f1c'];
  $batcon = ['Male'=>"#06cdc1", 'Female'=>"#03aca2", 'total'=>'#06837c'];

  $cavreg = ['Male'=> "#ffa500", 'Female'=>"#d38b06", 'total'=>'#b77908'];
  $cavcon = ['Male'=> "#dd4b39", 'Female'=>"#b73d2e", 'total'=>'#923024'];

  $lagreg = ['Male'=> "#3ac0bd", 'Female'=>"#0d9694", 'total'=>'#11ceca'];
  $lagcon = ['Male'=> "#c84c77", 'Female'=>"#ed86aa", 'total'=>'#c68ca0'];

  $rizalreg = ['Male'=> "#e98f39", 'Female'=>"#df9f62", 'total'=>'#cca077'];
  $rizalcon = ['Male'=> "#c4504d", 'Female'=>"#ed7c78", 'total'=>'#ce231f'];

  $quezreg = ['Male'=> "#acc0c4", 'Female'=>"#9ab2b7", 'total'=>'#a39b9b'];
  $quezcon = ['Male'=> "#5e9aca", 'Female'=>"#5280a6", 'total'=>'#3184a7'];
  #5e9aca', '#84c3f6

  $lucreg = ['Male'=> "#e98f39", 'Female'=>"#df9f62", 'total'=>'#f6b06e'];
  $luccon = ['Male'=> "#48c449", 'Female'=>"#19d11b", 'total'=>'#49a74a'];
?>  

<div class="col-md-4 col-sm-4 col-xs-12">
  <!-- Custom Tabs (Pulled to the right) -->
          <div class="nav-tabs-custom" style="box-shadow: 0 1px 2px rgb(0 0 0 / 47%);">
            <ul class="nav nav-tabs pull-right bg-maroon">
              <li class="dropdown" style="border-top-color: #d81b60!important;">
                <a class="dropdown-toggle" data-toggle="dropdown" href="#" style="background-color: white;">
                  <b>Tabs</b> <span class="caret"></span>
                </a>
                <ul class="dropdown-menu">
                  <li role="presentation" class="tab1"><a role="menuitem" tabindex="-1" href="#tab_1-1" data-toggle="tab">Overview</a></li>
                  <li role="presentation" class="tab2"><a role="menuitem" tabindex="-1" href="#tab_1-2" data-toggle="tab">RO per Division</a></li>
                  <li role="presentation" class="tab3"><a role="menuitem" tabindex="-1" href="#tab_1-3" data-toggle="tab">Regional Office</a></li>
                  <li role="presentation" class="tab4"><a role="menuitem" tabindex="-1" href="#tab_1-4" data-toggle="tab">Batangas Province</a></li>
                  <li role="presentation" class="tab5"><a role="menuitem" tabindex="-1" href="#tab_1-5" data-toggle="tab">Cavite Province</a></li>
                  <li role="presentation" class="tab6"><a role="menuitem" tabindex="-1" href="#tab_1-6" data-toggle="tab">Laguna Province</a></li>
                  <li role="presentation" class="tab7"><a role="menuitem" tabindex="-1" href="#tab_1-7" data-toggle="tab">Rizal Province</a></li>
                  <li role="presentation" class="tab8"><a role="menuitem" tabindex="-1" href="#tab_1-8" data-toggle="tab">Quezon Province</a></li>
                  <li role="presentation" class="tab9"><a role="menuitem" tabindex="-1" href="#tab_1-9" data-toggle="tab">Lucena City</a></li>
                </ul>
              </li>
              <li class="pull-left header" style="font-size: 16px; color:white;"><i class="fa fa-line-chart"></i> <b>STATISTICS</b></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1-1">
                <?php include 'dashboard_tiles/employee_tabs/overview.php'; ?>  
              </div>
              <div class="tab-pane" id="tab_1-2">
                <?php include 'dashboard_tiles/employee_tabs/ro_department.php'; ?>
              </div>
              <div class="tab-pane" id="tab_1-3">
                <?php include 'dashboard_tiles/employee_tabs/regional_office.php'; ?>
              </div>
              <div class="tab-pane" id="tab_1-4">
                <?php include 'dashboard_tiles/employee_tabs/batangas_province.php'; ?>
              </div>
              <div class="tab-pane" id="tab_1-5">
                <?php include 'dashboard_tiles/employee_tabs/cavite_province.php'; ?>
              </div>
              <div class="tab-pane" id="tab_1-6">
                <?php include 'dashboard_tiles/employee_tabs/laguna_province.php'; ?>
              </div>
              <div class="tab-pane" id="tab_1-7">
                <?php include 'dashboard_tiles/employee_tabs/rizal_province.php'; ?>
              </div>
              <div class="tab-pane" id="tab_1-8">
                <?php include 'dashboard_tiles/employee_tabs/quezon_province.php'; ?>
              </div>
              <div class="tab-pane" id="tab_1-9">
                <?php include 'dashboard_tiles/employee_tabs/lucena_city.php'; ?>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->  
</div>

<style type="text/css">
  .active {
    color: black!important;
  }
</style>


<script type="text/javascript">
  
  $(document).ready(function(){

    var dd1 = [
      <?php foreach ($overviews['regular'] as $key => $emp): ?>
        <?php if ($key != 'total'): ?>
          {label: "Regular <?php echo $key; ?>", value: <?php echo $emp; ?>},
        <?php endif ?>
      <?php endforeach ?>
      <?php foreach ($overviews['contractual'] as $key => $emp): ?>
        <?php if ($key != 'total'): ?>
          {label: "COS <?php echo $key; ?>", value: <?php echo $emp; ?>},
        <?php endif ?>
      <?php endforeach ?>
    ];

    var dd2 = [
      <?php foreach ($employees as $key => $emp): ?>
        {label: "<?php echo $key; ?>", value: <?php echo $emp; ?>},
      <?php endforeach ?>
    ];

    var dd3 = [
      <?php foreach ($regional['regular'] as $key => $emp): ?>
        <?php if ($key != 'total'): ?>
          {label: "Regular <?php echo $key; ?>", value: <?php echo $emp; ?>},
        <?php endif ?>
      <?php endforeach ?>
      <?php foreach ($regional['contractual'] as $key => $emp): ?>
        <?php if ($key != 'total'): ?>
          {label: "COS <?php echo $key; ?>", value: <?php echo $emp; ?>},
        <?php endif ?>
      <?php endforeach ?>
    ];

    var dd4 = [
      <?php foreach ($batangas['regular'] as $key => $emp): ?>
        <?php if ($key != 'total'): ?>
          {label: "Regular <?php echo $key; ?>", value: <?php echo $emp; ?>},
        <?php endif ?>
      <?php endforeach ?>
      <?php foreach ($batangas['contractual'] as $key => $emp): ?>
        <?php if ($key != 'total'): ?>
          {label: "COS <?php echo $key; ?>", value: <?php echo $emp; ?>},
        <?php endif ?>
      <?php endforeach ?>
    ];

    var dd5 = [
      <?php foreach ($cavite['regular'] as $key => $emp): ?>
        <?php if ($key != 'total'): ?>
          {label: "Regular <?php echo $key; ?>", value: <?php echo $emp; ?>},
        <?php endif ?>
      <?php endforeach ?>
      <?php foreach ($cavite['contractual'] as $key => $emp): ?>
        <?php if ($key != 'total'): ?>
          {label: "COS <?php echo $key; ?>", value: <?php echo $emp; ?>},
        <?php endif ?>
      <?php endforeach ?>
    ];

    var dd6 = [
      <?php foreach ($laguna['regular'] as $key => $emp): ?>
        <?php if ($key != 'total'): ?>
          {label: "Regular <?php echo $key; ?>", value: <?php echo $emp; ?>},
        <?php endif ?>
      <?php endforeach ?>
      <?php foreach ($laguna['contractual'] as $key => $emp): ?>
        <?php if ($key != 'total'): ?>
          {label: "COS <?php echo $key; ?>", value: <?php echo $emp; ?>},
        <?php endif ?>
      <?php endforeach ?>
    ];

    var dd7 = [
      <?php foreach ($rizal['regular'] as $key => $emp): ?>
        <?php if ($key != 'total'): ?>
          {label: "Regular <?php echo $key; ?>", value: <?php echo $emp; ?>},
        <?php endif ?>
      <?php endforeach ?>
      <?php foreach ($rizal['contractual'] as $key => $emp): ?>
        <?php if ($key != 'total'): ?>
          {label: "COS <?php echo $key; ?>", value: <?php echo $emp; ?>},
        <?php endif ?>
      <?php endforeach ?>
    ];

    var dd8 = [
      <?php foreach ($quezon['regular'] as $key => $emp): ?>
        <?php if ($key != 'total'): ?>
          {label: "Regular <?php echo $key; ?>", value: <?php echo $emp; ?>},
        <?php endif ?>
      <?php endforeach ?>
      <?php foreach ($quezon['contractual'] as $key => $emp): ?>
        <?php if ($key != 'total'): ?>
          {label: "COS <?php echo $key; ?>", value: <?php echo $emp; ?>},
        <?php endif ?>
      <?php endforeach ?>
    ];

    var dd9 = [
      <?php foreach ($lucena['regular'] as $key => $emp): ?>
        <?php if ($key != 'total'): ?>
          {label: "Regular <?php echo $key; ?>", value: <?php echo $emp; ?>},
        <?php endif ?>
      <?php endforeach ?>
      <?php foreach ($lucena['contractual'] as $key => $emp): ?>
        <?php if ($key != 'total'): ?>
          {label: "COS <?php echo $key; ?>", value: <?php echo $emp; ?>},
        <?php endif ?>
      <?php endforeach ?>
    ];

    var chart1 = new Morris.Donut({
      element: 'sales-chart1',
      resize: true,
      colors: ["#b85b50", "#ca3928", "#3b5998", '#25478f'],
      data: dd1,
      hideHover: 'auto',
      resize: true
    });

    var chart2 = new Morris.Donut({
        element: 'sales-chart2',
        resize: true,
        colors: ["#3c8dbc", "#f56954", "#00a65a", '#dfc6c6', '#8fddd8', '#ebfa58'],
        data: dd2,
        hideHover: 'auto',
        resize: true
      });

    var chart3 = new Morris.Donut({
        element: 'sales-chart3',
        resize: true,
        colors: ["#dd4b39", "#b85b50", "#d5e347", "#b2be35"],
        data: dd3,
        hideHover: 'auto',
        resize: true
      });

    // BATANGAS
    var chart4 = new Morris.Donut({
        element: 'sales-chart4',
        resize: true,
        colors: ["#0de030", "#0cb528", '#06cdc1', '#03aca2'],
        data: dd4,
        hideHover: 'auto',
        resize: true
      });

    // CAVITE
    var chart5 = new Morris.Donut({
        element: 'sales-chart5',
        resize: true,
        colors: ["#ffa500", "#d38b06", '#dd4b39', '#b73d2e'],
        data: dd5,
        hideHover: 'auto',
        resize: true
      });

    // LAGUNA
    var chart6 = new Morris.Donut({
        element: 'sales-chart6',
        resize: true,
        colors: ["#3ac0bd", "#0d9694", '#c84c77', '#ed86aa'],
        data: dd6,
        hideHover: 'auto',
        resize: true
      });

    var chart7 = new Morris.Donut({
        element: 'sales-chart7',
        resize: true,
        colors: ["#e98f39", "#df9f62", '#c4504d', '#ed7c78'],
        data: dd7,
        hideHover: 'auto',
        resize: true
      });

    var chart8 = new Morris.Donut({
        element: 'sales-chart8',
        resize: true,
        colors: ["#acc0c4", "#d1e5e9", '#5e9aca', '#84c3f6'],
        data: dd8,
        hideHover: 'auto',
        resize: true
      });

    var chart9 = new Morris.Donut({
        element: 'sales-chart9',
        resize: true,
        colors: ["#e98f39", "#df9f62", '#48c449', '#37e739'],
        data: dd9,
        hideHover: 'auto',
        resize: true
      });


    $('a[data-toggle="tab"]').on('shown.bs.tab', function(e) {
      var target = $(e.target).attr("href") // activated tab

      switch (target) {
        case "#tab_1-1":
          chart1.redraw();
          $(window).trigger('resize');
          break;
        case "#tab_1-2":
          chart2.redraw();
          $(window).trigger('resize');
          break;
        case "#tab_1-3":
          chart3.redraw();
          $(window).trigger('resize');
          break;
        case "#tab_1-4":
          chart4.redraw();
          $(window).trigger('resize');
          break;
        case "#tab_1-5":
          chart5.redraw();
          $(window).trigger('resize');
          break;
        case "#tab_1-6":
          chart6.redraw();
          $(window).trigger('resize');
          break;  
        case "#tab_1-7":
          chart7.redraw();
          $(window).trigger('resize');
          break; 
        case "#tab_1-8":
          chart8.redraw();
          $(window).trigger('resize');
          break; 
        case "#tab_1-9":
          chart9.redraw();
          $(window).trigger('resize');
          break;   
      }
    });
  
  });

</script>
