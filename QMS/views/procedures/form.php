<?php require_once 'QMS/controller/QMSProcedureController.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Quality Procedures <?= $is_new ? 'New' : ''; ?></h1>
    
    <ol class="breadcrumb"> 
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
      <li class="active">Quality Procedures</li>
    </ol> 
  </section>
  <section class="content">
    <form method="POST" action="<?= $route; ?>">
      <div class="row">
        <?php include 'head.php'; ?>
      </div>

      <?php if (!$is_new): ?>
        <div class="row">
          <?php include 'entry.php'; ?>
        </div>
      <?php endif ?>
    </form>
    
  </section>
</div>

<?php include 'modal_generate_report.php'; ?>

<style type="text/css">
  .todo-list { 
    list-style-type: none; margin: 0; padding: 0;}
  .todo-list li { margin: 0 5px 5px 5px; padding: 5px; font-size: 1.2em; height: 2em; }
  .ui-state-highlight { height: 1.5em; line-height: 1.2em; }
</style>

<script type="text/javascript">
  <?php
      // toastr output & session reset
      session_start();
      if (isset($_SESSION['toastr'])) {
          echo 'toastr.'.$_SESSION['toastr']['type'].'("'.$_SESSION['toastr']['message'].'", "'.$_SESSION['toastr']['title'].'")';
          unset($_SESSION['toastr']);
      }
  ?>
  
  function generateQualityObjective()
  {
    let el = '<div class="col-md-12 qb-obj">';
        el+= '<div class="box box-primary dropbox">';
        el+= '<div class="box-header">';
        el+= '<h3 class="box-title"><i class="fa fa-info-circle"></i> Quality Objective Entry</h3>';
        el+= '<div class="box-tools">';
        el+= '<div class="btn-group">';
        el+= '<a type="button" class="btn btn-danger btn-sm btn-view btn-qb_remove" title="Delete"> <i class="fa fa-trash-o"></i></a>';
        el+= '</div>';
        el+= '</div>';
        el+= '</div>';
        el+= '<div class="box-body no-padding">';
        el+= '<table id="exp_class" class="table table-bordered">';
        el+= '<tbody id="box-entries">';
        el+= '<tr>';
        el+= '<td rowspan="2" style="width:20%; background-color: #e8e8e8; vertical-align: middle;"><b>QUALITY OBJECTIVE</b></td>';
        el+= '<td rowspan="2" style="width:40%;"><?= group_textarea('Quality Objective', 'quality_obj', '', 0, true, false, 5); ?></td>';
        el+= '<td style="width:20%; background-color: #e8e8e8; vertical-align: middle;"><b>TARGET(%)</b></td>';
        el+= '<td style="width:20%;"><?= group_textnew('Target(%)', 'target_percent', '', 'target_percentage', false, 0); ?></td>';
        el+= '</tr>';
        el+= '<tr>';
        el+= '<td style="width:20%; background-color: #e8e8e8; vertical-align: middle;"><b>FREQUENCY OF MONITORING</b></td>';
        el+= '<td style="width:20%;"><?= group_select('Frequency Of Monitoring', 'frequency', $office_opts, '', 'office', 0, $is_readonly); ?></td>';
        el+= '</tr>';
        el+= '<tr>';
        el+= '<td style="width:20%; background-color: #e8e8e8; vertical-align: middle;"><b>INDICATOR A</b></td>';
        el+= '<td colspan="2" style="width:40%;"><?= group_textarea('Indicator A', 'indicator_a', '', 0, true, false, 3); ?></td>';
        el+= '</tr>';
        el+= '<tr>';
        el+= '<td style="width:20%; background-color: #e8e8e8; vertical-align: middle;"><b>INDICATOR B</b></td>';
        el+= '<td colspan="2" style="width:40%;"><?= group_textarea('Indicator B', 'indicator_b', '', 0, true, false, 3); ?></td>';
        el+= '</tr>';
        el+= '<tr>';
        el+= '<td style="width:20%; background-color: #e8e8e8; vertical-align: middle;"><b>INDICATOR C</b></td>';
        el+= '<td colspan="2" style="width:40%;"><?= group_textarea('Indicator C', 'indicator_c', '', 0, true, false, 3); ?></td>';
        el+= '</tr>';
        el+= '</tbody>';
        el+= '</table>';
        el+= '</div>';
        el+= '</div>';
        el+= '</div>';

        return el;
  }

  // $( ".todo-list" ).sortable();

  $( ".todo-list" ).sortable({
      placeholder: "ui-state-highlight"
    });
    $( ".todo-list" ).disableSelection();

  $('.coverage, .office, .process_owner, .frequency, .current_period').select2();

  $(document).on('click', '.btn-add_qobj', function(e){
    let obj = generateQualityObjective();
    $('.quality-objective').append(obj);
  })

  $(document).on('click', '.btn-qb_remove', function(e){
    let row = $(this).closest('.qb-obj');
    row.remove();
  });

  $("#uploadForm").on('submit', function(e){
    e.preventDefault();

    let formData = new FormData();
    let period = $('#cform-current_period').val();
    let id = '<?= $_GET['id']; ?>';

    formData.append('period', period);

    window.location = 'QMS/route/export_qop.php?id='+id+'&period='+period;
  })

</script>