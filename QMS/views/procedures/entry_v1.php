<div class="col-md-12">
	<div class="box box-primary dropbox">
		<div class="box-header">
			<h3 class="box-title"><i class="fa fa-info-circle"></i> Quality Objective Entry</h3>
		</div>
  		<div class="box-body no-padding">
  			<table id="exp_class" class="table table-bordered">
        		<tbody id="box-entries">
        			<tr>
        				<td rowspan="2" style="width:20%; background-color: #e8e8e8; vertical-align: middle;"><b>QUALITY OBJECTIVE</b></td>
        				<td rowspan="2" style="width:40%;"><?= group_textarea('Quality Objective', 'quality_obj', '', 0, true, false, 5); ?></td>
        				<td style="width:20%; background-color: #e8e8e8; vertical-align: middle;"><b>TARGET(%)</b></td>
        				<td style="width:20%;"><?= group_textnew('Target(%)', 'target_percent', '', 'target_percentage', false, 0); ?></td>
        			</tr>
        			<tr>
        				<td style="width:20%; background-color: #e8e8e8; vertical-align: middle;"><b>FREQUENCY OF MONITORING</b></td>
        				<td style="width:20%;"><?= group_select('Frequency Of Monitoring', 'frequency', $office_opts, '', 'office', 0, $is_readonly); ?></td>
        			</tr>
        			<tr>
        				<td style="width:20%; background-color: #e8e8e8; vertical-align: middle;"><b>INDICATOR A</b></td>
        				<td colspan="2" style="width:40%;"><?= group_textarea('Indicator A', 'indicator_a', '', 0, true, false, 3); ?></td>
        			</tr>
        			<tr>
        				<td style="width:20%; background-color: #e8e8e8; vertical-align: middle;"><b>INDICATOR B</b></td>
        				<td colspan="2" style="width:40%;"><?= group_textarea('Indicator B', 'indicator_b', '', 0, true, false, 3); ?></td>
        			</tr>
        			<tr>
        				<td style="width:20%; background-color: #e8e8e8; vertical-align: middle;"><b>INDICATOR C</b></td>
        				<td colspan="2" style="width:40%;"><?= group_textarea('Indicator C', 'indicator_c', '', 0, true, false, 3); ?></td>
        			</tr>
        			
        		</tbody>
      		</table>
  		</div>
  	</div>		
</div>