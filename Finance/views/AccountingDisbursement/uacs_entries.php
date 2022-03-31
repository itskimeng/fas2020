
<div class="box box-warning  dropbox">
	<div class="box-header">
			<h3 class="box-title"><i class="fa fa-info-circle"></i> Summary</h3>
	</div>

	<div class="box-body">
		<table class="table table-striped table-bordered">
		<thead>
			<tr class="custom-tb-header">
      		<th class="text-center">FUND SOURCE</th>
      		<th class="text-center">PPA</th>
          <th class="text-center">UACS</th>
      		<th class="text-center" width="300">AMOUNT</th>
  		</tr>
		</thead>
  		<tbody>
          <?php 
            // $sql = "SELECT `id`, `ob_id`, `fund_source`, `mfo_ppa`, `uacs`, `amount` FROM `tbl_obentries` WHERE `ob_id` = ".$ors." ";
            $sql = "SELECT
            oe.fund_source,
            oe.amount,
            fe.uacs as uacs,
            oe.amount as amount,
            fs.ppa as mfo_ppa,
            fs.source as fund_source
            FROM tbl_obentries oe
            LEFT JOIN tbl_obligation ob ON ob.id = oe.ob_id
            LEFT JOIN tbl_fundsource_entry fe ON fe.id = oe.uacs
            LEFT JOIN tbl_fundsource fs ON fs.id = fe.source_id
            LEFT JOIN supplier s ON s.id = ob.supplier
            WHERE oe.ob_id = $ors";
            $exec = $conn->query($sql);
            $ttl = 0;
            while ($list = $exec->fetch_assoc()){ ?>

            <tr>
              <td align="center"><?php echo $list['fund_source']; ?></td>
              <td align="center"><?php echo $list['mfo_ppa']; ?></td>
              <td align="center"><?php echo $list['uacs']; ?></td>
              <td align="center"><?php echo '₱'.number_format($list['amount'], 2); ?></td>
            </tr>

          <?php $ttl += $list['amount']; } ?>
  		</tbody>
      <tfoot>
            <tr>
              <td class="text-right" colspan="3"><strong>Total</strong></td>
              <td colspan="1">
                <b>
                  <div class="input-group">
                    <span class="input-group-addon">₱</span>
                    <input type="text" class="form-control" disabled="" value="<?php echo number_format($ttl, 2); ?>">
                  </div>
                </b>
              </td>
            </tr>
      </tfoot> 
		</table>
	</div>

	<div class="box-footer">
	</div>
</div>
