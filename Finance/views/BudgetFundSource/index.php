<?php require_once 'Finance/controller/FundSourceController.php'; ?>

<div class="content-wrapper">
    <section class="content-header">
        <h1>Fund Source</h1>
        
        <ol class="breadcrumb"> 
          <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
          <li>Finance</li>
          <li>Budget Section</li>
          <li class="active">Fund Source</li>
        </ol> 
    </section>
    
    <section class="content">
      <div class="row">
        <?php include('Finance/views/BudgetFundSource/filter.php'); ?>
        <?php include('Finance/views/BudgetFundSource/table.php'); ?>
      </div> 
    </section>
</div>

<?php include('Finance/views/BudgetFundSource/modal_delete_fundsource.php'); ?>

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

  .dataTables_filter {
    text-align: right !important;
  }

  .activity_content, .delete_modal {
    border-radius: 5px!important;
  }

  .delete_modal_header {
    text-align: center;
    background-color: #f15e5e;
    color: white;
    padding:5% !important;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
  }

  * {
    box-sizing: border-box;
  }

  .fade-scale {
    transform: scale(0);
    opacity: 0;
    -webkit-transition: all .25s linear;
    -o-transition: all .25s linear;
    transition: all .25s linear;
  }

  .fade-scale.in {
    opacity: 1;
    transform: scale(1);
  }




</style>

<script type="text/javascript">
  $(document).on('click', '.button',  function(){
    var buttonId = $(this).attr('id');
    $('#modal-container').removeAttr('class').addClass(buttonId);
    $('body').addClass('modal-active');
  })

  $('#modal-container').click(function(){
    $(this).addClass('out');
    $('body').removeClass('modal-active');
  });

  <?php include 'custom_js.js'; ?>
</script>

