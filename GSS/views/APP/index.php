<?php require_once 'GSS/controller/APPController.php'; ?>


<!-- test -->
<style>
  /* Custom nav-tabs */
  .tab-content {
    border-bottom: 1px solid #ddd;
    border-left: 1px solid #ddd;
    border-right: 1px solid #ddd;
    display: block;
    border-radius: 0 0 0.25em 0.25em;
  }

  .tab-content .tab-pane {
    text-align: left;
    padding: 10px;
  }

  .tab-content .tab-pane h3 {
    margin: 0;
  }

  .cd-breadcrumb {
    padding: 6px 7px;
    margin: 0;
    background-color: transparent;
    border-radius: 0.25em 0.25em 0 0;
  }

  .cd-breadcrumb.nav-tabs {
    border-left: 1px solid #ddd;
    border-top: 1px solid #ddd;
    border-right: 1px solid #ddd;
    border-bottom: none;
  }

  .cd-breadcrumb.nav-tabs>li.active>a,
  .cd-breadcrumb.nav-tabs>li.active>a:hover,
  .cd-breadcrumb.nav-tabs>li.active>a:focus {
    color: #fff;
    background-color: #144677;
    border: 0px solid #144677;
    cursor: default;
  }

  .cd-breadcrumb.nav-tabs>li>a {
    margin-right: inherit;
    line-height: inherit;
    height: 48px;
    border: inherit;
    border-radius: inherit;
    border-color: #edeff0;
  }

  .cd-breadcrumb li {
    display: inline-block;
    float: left;
    margin: 0.5em 0;
  }

  .cd-breadcrumb li::after {
    /* this is the separator between items */
    display: inline-block;
    content: '\00bb';
    margin: 0 0.6em;
    color: tint(#144677, 50%);
  }

  .cd-breadcrumb li:last-of-type::after {
    /* hide separator after the last item */
    display: none;
  }

  .cd-breadcrumb li>* {
    /* single step */
    display: inline-block;
    font-size: 1.4rem;
    color: #144677;
  }

  .cd-breadcrumb li.current>* {
    /* selected step */
    color: #144677;
  }

  .cd-breadcrumb a:hover {
    /* steps already visited */
    color: #144677;
  }

  .cd-breadcrumb.custom-separator li::after {
    /* replace the default arrow separator with a custom icon */
    content: '';
    height: 16px;
    width: 16px;
    vertical-align: middle;
  }

  .cd-breadcrumb li {
    margin: 1.2em 0;
  }

  .cd-breadcrumb li::after {
    margin: 0 1em;
  }

  .cd-breadcrumb li>* {
    font-size: 1.6rem;
  }

  .cd-breadcrumb.triangle li {
    position: relative;
    padding: 0;
    margin: 0 4px 0 0;
  }

  .cd-breadcrumb.triangle li:last-of-type {
    margin-right: 0;
  }

  .cd-breadcrumb.triangle li .octicon {
    margin-right: 10px;
  }

  .cd-breadcrumb.triangle li>* {
    position: relative;
    padding: 0.8em 0.8em 0.7em 2.5em;
    color: #333;
    background-color: #edeff0;
    /* the border color is used to style its ::after pseudo-element */
    border-color: #edeff0;
  }

  .cd-breadcrumb.triangle li.active>* {
    /* selected step */
    color: #fff;
    background-color: #144677;
    border-color: #144677;
  }

  .cd-breadcrumb.triangle li:first-of-type>* {
    padding-left: 1.6em;
    border-radius: 4px 0 0 4px;
  }

  .cd-breadcrumb.triangle li:last-of-type>* {
    padding-right: 1.6em;
    border-radius: 0 0.25em 0.25em 0;
  }

  .cd-breadcrumb.triangle a:hover {
    /* steps already visited */
    color: #fff;
    background-color: #144677;
    border-color: #144677;
    text-decoration: none;
  }

  .cd-breadcrumb.triangle li::after,
  .cd-breadcrumb.triangle li>*::after {
    /* li > *::after is the colored triangle after each item li::after is the white separator between two items */
    content: '';
    position: absolute;
    top: 0;
    left: 100%;
    content: '';
    height: 0;
    width: 0;
    /* 48px is the height of the <a> element */
    border: 24px solid transparent;
    border-right-width: 0;
    border-left-width: 20px;
  }

  .cd-breadcrumb.triangle li::after {
    /* this is the white separator between two items */
    z-index: 1;
    -webkit-transform: translate(4px, 0);
    -ms-transform: translate(4px, 0);
    -o-transform: translate(4px, 0);
    transform: translate(4px, 0);
    border-left-color: #fff;
    /* reset style */
    margin: 0;
  }

  .cd-breadcrumb.triangle li>*::after {
    /* this is the colored triangle after each element */
    z-index: 2;
    border-left-color: inherit;
  }

  .cd-breadcrumb.triangle li:last-of-type::after,
  .cd-breadcrumb.triangle li:last-of-type>*::after {
    /* hide the triangle after the last step */
    display: none;
  }
</style>
<?php
function setActiveTabs($year,$fy)
{
  $isactive = ($year === $fy) ? 'active' :'';
  return $isactive; 

}
?>
<div class="content-wrapper">
  <section class="content-header">
    <h1>
      Annual Procurement Plan </h1>

    <ol class="breadcrumb">
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li>
      <li><a href="#">GSS Section</a></li>
      <li class="active">APP</li>
    </ol>
  </section>
  <section class="content">
  <div class="box-body">
            <div class="box-group" id="accordion">
                <div class="panel box box-primary">
                    <div class="box-header with-border">
       
                    </div>
    <div class="row">
      <div class="col-md-4">
        <?php //include '_panel/app_item_info.php'; 
        ?>
      </div>


    </div>
    <div class="row">
      <div class="col-md-12">
        <?php //require_once '_panel/filter_app.php'; 
        ?>
      </div>
      <div class="col-md-12">
        <div id="collapseOne" class="panel-collapse collapseing" aria-expanded="true">
          <div class="box-body">
            <div class="table-responsive">
              <ul class="cd-breadcrumb triangle nav nav-tabs" role="tablist">
                <li role="presentation" class="<?= setActiveTabs($_GET['year'],'2019')?>">
                  <a href="procurement_app.php?division=<?= $_GET['division'];?>&year=2019">
                    <i class="fa fa-list" aria-hidden="true"></i> APP F.Y 2019
                  </a>
                </li>
                <li role="presentation" class="<?= setActiveTabs($_GET['year'],'2020')?>">
                <a href="procurement_app.php?division=<?= $_GET['division'];?>&year=2020">
                    <span class="octicon octicon-diff-added"></span>APP F.Y 2020
                  </a>
                </li>
                <li role="presentation" class="<?= setActiveTabs($_GET['year'],'2021')?>">
                <a href="procurement_app.php?division=<?= $_GET['division'];?>&year=2021">
                    <span class="octicon octicon-comment-discussion"></span>APP F.Y 2021
                  </a>
                </li>
                <li role="presentation" class="<?= setActiveTabs($_GET['year'],'2022')?>">
                <a href="procurement_app.php?division=<?= $_GET['division'];?>&year=2022">
                    <span class="octicon octicon-verified"></span>APP F.Y 2022
                  </a>
                </li>
                <li role="presentation" class="<?= setActiveTabs($_GET['year'],'2023')?>">
                <a href="procurement_app.php?division=<?= $_GET['division'];?>&year=2023">
                    <span class="octicon octicon-tools"></span>APP F.Y 2023
                  </a>
                </li>

              </ul>
              <div class="tab-content">
                <div role="tabpanel" class="tab-pane active">
                  <?php require_once 'form_upload_csv.php' ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
                </div>
            </div>
          </div>
  </section>
</div>
<script>
  $(function() {
    $('.select2').select2();

    $('#datepicker').datepicker({
      showOtherMonths: true,
      selectOtherMonths: true,
      autoclose: true,
      changeMonth: true,
      changeYear: true,
      orientation: "bottom"
    })
    $('#app_table').DataTable({
      "lengthChange": false,
      'paging': true,
      'searching': true,
      "order": [
        [7, "desc"]
      ],
      'info': false,
      'autoWidth': false,
      "dom": '<"top"f>rt<"bottom"lp><"clear">', // Positions table elements


    });
  });
</script>