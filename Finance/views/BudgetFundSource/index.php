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
<?php include('Finance/views/BudgetFundSource/modal_conflict.php'); ?>

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
  $(document).ready(function(e){
    <?php
      session_start();
      if (isset($_SESSION['toastr'])) {
          echo 'toastr.'.$_SESSION['toastr']['type'].'("'.$_SESSION['toastr']['message'].'", "'.$_SESSION['toastr']['title'].'")';
          unset($_SESSION['toastr']);
      }
    ?> 
  })


  $(document).on('click', '.button',  function(){
    var buttonId = $(this).attr('id');
    $('#modal-container').removeAttr('class').addClass(buttonId);
    $('body').addClass('modal-active');
  })

  $('#modal-container').click(function(){
    $(this).addClass('out');
    $('body').removeClass('modal-active');
  });

  $(document).on('click', '.btn-clear', function(){
    location.reload();
  });

  $(document).on('click', '.btn-filter', function(el){
    let d1 = $('.daterange').data('daterangepicker').startDate.format('YYYYMMDD');
    let d2 = $('.daterange').data('daterangepicker').endDate.format('YYYYMMDD');
    let data = {date1:d1, date2:d2};
    
    getReport(data);
  })

  function getReport($data) {
      let $path = 'Finance/route/filter_report.php';

      $.get($path, $data, function(dd, key){
        let data = JSON.parse(dd);
      
        $('#example').dataTable().fnClearTable();
        $('#example').dataTable().fnDestroy();
        generateTable(data);

        $('#example').DataTable({
          "bFilter": true,
          "columns": [
            { "data": "id", "visible": false },
            { "data": "source", "width": "15%", "className": 'text-center' },
            { "data": "fund", "className": 'text-center' },
            { "data": "total_allotment", "width": "12%", "className": 'text-center' },
            { "data": "total_obligated", "width": "12%", "className": 'text-center'  },
            { "data": "total_balance", "width": "12%", "className": 'text-center'  },      
            { "data": "date_created", "width": "10%", "className": 'text-center' },
            { "data": "action", "width": "12%", "sortable": false, "className": 'text-center' }  
          ],"order": [[1, 'desc']],
          'searching'   : true,
        });
      });
      
      return 0;
    }

    function generateTable($data) {
      let tr='';
      $.each($data, function(key, item){
        tr += '<tr>';
        tr += '<td class="hidden" style="vertical-align: middle;">'+key+'</td>';
        tr += '<td style="vertical-align: middle;">';
        tr += '<span class="badge bg-info">'+item['source']+'</span>';
        tr += '</td>';
        tr += '<td style="vertical-align: middle;">'+item['name']+'</td>';
        tr += '<td style="vertical-align: middle;">'+item['total_allotment_amount']+'</td>';
        tr += '<td style="vertical-align: middle;">'+item['total_allotment_obligated']+'</td>';
        tr += '<td style="vertical-align: middle;">'+item['total_balance']+'</td>';
        tr += '<td style="vertical-align: middle;">'+item['date_created']+'</td>';
        tr += '<td style="vertical-align: middle;">';
        tr += '<div class="form-inline">';
        tr += '<div class="btn-group">';
        tr += '<a href="budget_fundsource_edit.php?source='+key+'" class="btn btn-block btn-primary btn-sm" title="Edit"><i class="fa fa-edit"></i></a>';
        tr += '</div>';
        tr += '<?php if ($is_admin): ?>';
        tr += '<div class="btn-group">';
        tr += '<a type="button" class="btn btn-block btn-danger btn-sm btn-remove_fsource" data-toggle="modal" data-target="#modal_delete_fundsource" data-source_id="'+key+'"><i class="fa fa-trash"></i></a>';
        tr += '</div>';
        tr += '<?php endif ?>';
        tr += '</div>';
        tr += '</td>';
        tr += '</tr>';
      });

    $('#fs-body').append(tr);

    return 0;
  }


  <?php include 'custom_js.js'; ?>
</script>

