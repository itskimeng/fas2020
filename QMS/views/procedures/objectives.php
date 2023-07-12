<?php require_once 'QMS/controller/QMSObjectivesController.php'; ?>

<div class="content-wrapper">
  <section class="content-header">
    <h1>Quality Procedures <?= $is_new ? 'New' : ''; ?></h1>
    
    <ol class="breadcrumb"> 
      <li><a href="home.php"><i class="fa fa-dashboard"></i> Home</a></li> 
      <li class="active">Quality Procedures</li>
    </ol> 
  </section>
  <section class="content">
      <div class="row">
        <?php if (isset($procedure['frequency_monitoring'])): ?>
          <?php if ($procedure['frequency_monitoring'] == 1): ?>
            <?php include 'quality_objectives_monthly.php'; ?>  
          <?php elseif ($procedure['frequency_monitoring'] == 2): ?>
            <?php include 'quality_objectives_quarterly.v1.php'; ?>  
          <?php elseif ($procedure['frequency_monitoring'] == 3): ?>
            <?php include 'quality_objectives_annualy.v1.php'; ?>  
          <?php endif ?>
        <?php else: ?>
          <?php include 'quality_objectives.v1.php'; ?>
        <?php endif ?>
      </div>  
  </section>
</div>

<style type="text/css">
  table {
    text-align: center;
  }

  .disable-switch {
    pointer-events: none;
  }

  .dropbox {
    box-shadow: 0 1px 2px rgb(0 0 0 / 50%);
  }

  .switchToggle input[type=checkbox]{
    height: 0; 
    width: 0; 
    visibility: hidden; 
    position: absolute; 
  }

  .switchToggle label {
    cursor: pointer; 
    text-indent: -9999px; 
    width: 70px; 
    max-width: 70px; 
    height: 30px; 
    background: #d1d1d1; 
    /*display: block; */
    border-radius: 100px; 
    position: relative; 
    border: 1px solid white; 
  }

  .switchToggle label:after {
    content: ''; 
    position: absolute; 
    top: 1px; 
    left: 1px; 
    width: 26px; 
    height: 26px; 
    background: #fff; 
    border-radius: 90px; 
    transition: 0.3s; 
  }

  .switchToggle input:checked + label, .switchToggle input:checked + input + label  {
    background: #3e98d3; 
  }

  .switchToggle input + label:before, .switchToggle input + input + label:before {
    content: 'No'; 
    position: absolute; 
    top: 5px; 
    left: 35px; 
    width: 26px; 
    height: 26px; 
    border-radius: 90px; 
    transition: 0.3s; 
    text-indent: 0; 
    color: #fff; 
  }

  .switchToggle input:checked + label:before, .switchToggle input:checked + input + label:before {
    content: 'Yes'; 
    position: absolute; 
    top: 5px; 
    left: 10px; 
    width: 26px; 
    height: 26px; 
    border-radius: 90px; 
    transition: 0.3s; 
    text-indent: 0; 
    color: #fff; 
  }

  .switchToggle input:checked + label:after, .switchToggle input:checked + input + label:after {
    left: calc(100% - 1px); 
    transform: translateX(-100%); 
  }

  .switchToggle label:active:after {
    width: 60px; 
  } 

  .toggle-switchArea { 
    margin: 10px 0 10px 0; 
  }

</style>

<script type="text/javascript">
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

  $(document).on('click', '.btn-add_qobj', function(e){
    let obj = generateQualityObjective();
    $('.quality-objective').append(obj);
  })

  $(document).on('click', '.btn-qb_remove', function(e){
    let row = $(this).closest('.qb-obj');
    row.remove();
  })

  <?php
      // toastr output & session reset
      session_start();
      if (isset($_SESSION['toastr'])) {
          echo 'toastr.'.$_SESSION['toastr']['type'].'("'.$_SESSION['toastr']['message'].'", "'.$_SESSION['toastr']['title'].'")';
          unset($_SESSION['toastr']);
      }
  ?>
  
</script>