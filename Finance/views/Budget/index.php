<?php require_once 'Finance/controller/BudgetController.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>
          Sub-Allotment Release Order(SARO)
        </h1>
        
        <ol class="breadcrumb"> 
          <li>
            <a href="home.php">
              <i class="fa fa-dashboard"></i> 
              Home
            </a>
          </li> 
          <li>Finance</li>
          <li>Budget Section</li>
          <li class="active">
            SARO
          </li>
          
        </ol> 
    </section>
    <section class="content">
      <div class="row">
        <?php include('Finance/views/Budget/filter.php'); ?>
        <?php include('Finance/views/Budget/table.php'); ?>
      </div> 
    </section>
</div>

<style type="text/css">
  .dropbox {
    box-shadow: 0 1px 2px rgb(0 0 0 / 50%);
  }

  #list_table {
    box-shadow: 0 1px 2px rgb(0 0 0 / 15%);
  }


  td.details-control {
    background: url('../resources/details_open.png') no-repeat center center;
    cursor: pointer;
}
tr.shown td.details-control {
    background: url('../resources/details_close.png') no-repeat center center;
}

</style>


<!-- <script type="text/javascript">

</script> -->

<script src="Finance/views/Budget/custom_js.js" type="text/javascript"></script>

